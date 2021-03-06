<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Job extends MX_Controller {
        
        function __construct()
        {
            parent::__construct ();
            $this->load->helper ( 'url' );
            $this->load->helper ( 'cookie' );
            $fb_config = parse_ini_file ( APPPATH . "config/FB.ini" );
        }
        
        public function addJob (){
        	$param = array();
        	$param['user_role'] = 7;
        	$this->load->library('dispatcher/JobLib');
        	$this->load->library('dispatcher/AdminLib');
        	$param['client_id'] = $this->session->userdata('admin')['client_id'];
        	$field_worker = $this->adminlib->getAllAdmin ($param);
        	$param['client_id'] = $this->session->userdata('admin')['client_id'];
        	$this->load->library('dispatcher/UserLibNew');
        	$this->load->library('dispatcher/BranchLib');
        	$hospital_list = $this->userlibnew->gettAllHospital ();
        	$this->template->set ('hospitallist', $hospital_list );
        	$branch_list = $this->branchlib->getAllBranch ($param);
        	$this->template->set ('branchlist', $branch_list );
        	$this->template->set ( 'field_worker', $field_worker );
        	$this->template->set ( 'page', 'Job List' );
        	$this->template->set_theme('default_theme');
        	$this->template->set_layout ('default')
        	->title ( 'Dispatcher | Job List' )
        	->set_partial ( 'header', 'partials/header' )
        	->set_partial ( 'side_menu', 'partials/side_menu' )
        	->set_partial ( 'chat_model', 'partials/chat_model' )
        	->set_partial ( 'footer', 'partials/footer' );
        	$this->template->build ('client_add_job');
        }
        
        public function saveClientJob()
        {
	        	$admin = $this->session->userdata('admin');
	        	$contact = array();
	        	$job = array();
	        	$patient = array();
	       
	        	
	        $contact = $this->input->post('contact');
	        $contact['client_id'] = $this->session->userdata('admin')['client_id'];
	        $contact['created_date'] = date('Y-m-d H:i:s');
	        $contact['created_by'] =  $this->session->userdata('admin')['id'];
	        
	        $job = $this->input->post('job');
	        if($admin['user_role']==3 || $admin['user_role']==5 || $admin['user_role']==4)
	        {
		        	if(isset($contact['pickup_hospital_id']))
		       	 	$job['hospital_id'] = $contact['pickup_hospital_id'];
		        	else 
		        		$job['hospital_id'] = 0;
	        } else {
	        		$job['hospital_id'] = $this->session->userdata('admin')['hospital_id'];
	        }
	        $job['client_id'] = $this->session->userdata('admin')['client_id'];
	        $job['delivery_date'] = date('Y-m-d');
	        $job['delivery_time'] = date('H:i:s');
	        $job['created_date'] = date('Y-m-d H:i:s');
	        $job['created_by'] =  $this->session->userdata('admin')['id'];
	        
	        $patient = $this->input->post('patient');
	        if($admin['user_role']==3 || $admin['user_role']==5 || $admin['user_role']==4)
	        {
		        	if(isset($contact['pickup_hospital_id']))
		        		$patient['hospital_id'] = $contact['pickup_hospital_id'];
		        	else
		        		$patient['hospital_id'] = 0;
	        } else {
	        		$patient['hospital_id'] = $this->session->userdata('admin')['hospital_id'];
	        }
	        $patient['client_id'] = $this->session->userdata('admin')['client_id'];
	        $patient['created_date'] = date('Y-m-d H:i:s');
	        $patient['created_by'] =  $this->session->userdata('admin')['id'];
	        	$this->load->library('dispatcher/JobLib');
	        	$id = $this->joblib->saveClientJob ($patient,$contact,$job);
	        	$userdata = array();
	        	if($id) {
	        		if($admin['user_role']==3 || $admin['user_role']==5 || $admin['user_role']==4) {
	        			$params = array();
	        			$params = $this->input->post('data');
	        			$params['id'] = $id;
	        			$params['start_date'] = date("Y-m-d",strtotime($params['start_date']));
	        			$params['start_time'] = date("H:i:s",strtotime($params['start_time']));
	        			$params['assigned_by'] = $this->session->userdata('admin')['id'];
	        			$params['assigned_date'] = date("Y-m-d H:i:s");
	        			
	        			$this->load->library('dispatcher/JobLib');
	        			$res = $this->joblib->updateJobAssignment ($params);
	        		}
	        		$userdata['id'] = $id;
	        		$userdata['status'] = 1;
	        		$userdata['msg'] = "Job added successfully.";
	        	} else {
	        		$userdata['status'] = 0;
	        		$userdata['msg'] = "Error! Please check your data.";
	        	}
	        	echo json_encode($userdata);
        }
        
        public function edit_client_job($jobid)
        {
        
        	$this->load->library('dispatcher/HospitalLib');
        	$job = $this->hospitallib->getJobById ($jobid)[0];
        	$patient = $this->hospitallib->getPatientListByPatientId ($job['patient_id'])[0];
        	$contact = $this->hospitallib->getCustomerListByCustomerId ($job['job_contact_id'])[0];
        	$param = array();
        	$param['user_role'] = 7;
        	$this->load->library('dispatcher/JobLib');
        	$this->load->library('dispatcher/AdminLib');
        	$param['client_id'] = $this->session->userdata('admin')['client_id'];
        	$field_worker = $this->adminlib->getAllAdmin ($param);
        	$param['client_id'] = $this->session->userdata('admin')['client_id'];
        	$this->load->library('dispatcher/UserLibNew');
        	$this->load->library('dispatcher/BranchLib');
        	$hospital_list = $this->userlibnew->gettAllHospital ();
        	$this->template->set ('hospitallist', $hospital_list );
        	$branch_list = $this->branchlib->getAllBranch ($param);
        	$this->template->set ('branchlist', $branch_list );
        	$this->template->set ( 'field_worker', $field_worker );
        	$this->template->set ( 'patient', $patient );
        	$this->template->set ( 'contact', $contact );
        	$this->template->set ( 'job', $job );
        	$this->template->set ( 'page', 'User' );
        	$this->template->set_theme('default_theme');
        	$this->template->set_layout ('default')
        	->title ( 'Dispatcher | Edit User' )
        	->set_partial ( 'header', 'partials/header' )
        	->set_partial ( 'side_menu', 'partials/side_menu' )
        	->set_partial ( 'chat_model', 'partials/chat_model' )
        	->set_partial ( 'footer', 'partials/footer' );
        	$this->template->build ('edit_client_job');
        }
        
        public function updateJobClient()
        {
	        	$admin = $this->session->userdata('admin');
	        	$patient = array();
	        	$contact = array();
	        	$job = array();
	        	$contact = $this->input->post('contact');
	        	$contact['updated_date'] = date('Y-m-d H:i:s');
	        	$contact['updated_by'] =  $this->session->userdata('admin')['id'];
	        	$job = $this->input->post('job');
	        	if($admin['user_role']==3 || $admin['user_role']==5 || $admin['user_role']==4)
	        	{
	        		if(isset($contact['pickup_hospital_id']))
	        			$job['hospital_id'] = $contact['pickup_hospital_id'];
	        			else
	        				$job['hospital_id'] = 0;
	        	} else {
	        		$job['hospital_id'] = $this->session->userdata('admin')['hospital_id'];
	        	}
	        	$job['delivery_date'] = date('Y-m-d');
	        	$job['delivery_time'] = date('H:i:s');
	        	$job['updated_date'] = date('Y-m-d H:i:s');
	        	$job['updated_by'] =  $this->session->userdata('admin')['id'];
	        	$patient = $this->input->post('patient');
	        	if($admin['user_role']==3 || $admin['user_role']==5 || $admin['user_role']==4)
	        	{
	        		if(isset($contact['pickup_hospital_id']))
	        			$patient['hospital_id'] = $contact['pickup_hospital_id'];
	        			else
	        				$patient['hospital_id'] = 0;
	        	} else {
	        		$patient['hospital_id'] = $this->session->userdata('admin')['hospital_id'];
	        	}
	        	$patient['updated_date'] = date('Y-m-d H:i:s');
	        	$patient['updated_by'] =  $this->session->userdata('admin')['id'];
	        	
	      
	        	$this->load->library('dispatcher/JobLib');
	        	$this->load->library('dispatcher/PatientLib');
	        
	        	//print_r($data);
	        	$res = $this->joblib->updateJob ($job);
	        	$res = $this->patientlib->updatePatient ($patient);
	        	$res = $this->joblib->updateJobContact ($contact);
	        	
	        	$userdata = array();
	        	if($res) {
	        		if($admin['user_role']==3 || $admin['user_role']==5 || $admin['user_role']==4) {
	        			$params = array();
	        			$params = $this->input->post('data');
	        			$params['id'] = $job['id'];
	        			$params['start_date'] = date("Y-m-d",strtotime($params['start_date']));
	        			$params['start_time'] = date("H:i:s",strtotime($params['start_time']));
	        			$params['assigned_by'] = $this->session->userdata('admin')['id'];
	        			$params['assigned_date'] = date("Y-m-d H:i:s");
	        		
	        			$this->load->library('dispatcher/JobLib');
	        			$res = $this->joblib->updateJobAssignment ($params);
	        		}
	        		$userdata['status'] = 1;
	        		$userdata['msg'] = "Client Job updated successfully.";
	        	} else {
	        		$userdata['status'] = 0;
	        		$userdata['msg'] = "Error! Please check your data.";
	        	}
	        	echo json_encode($userdata);
        }
        
        public function job_list (){
            $this->load->library('dispatcher/GeneralLib');
            $this->load->library('dispatcher/JobLib');
            $branch_list = array();
            $job_status_list = array();
            $job_action_list = array();
            $company_list = array();
            //$branch_list = $this->generallib->getBranchByCompanyID ($this->session->userdata('user')['company_id']);
            $job_status_list = $this->joblib->getAllJobStatus ();
            $job_action_list = $this->joblib->getAllJobAction ();
            $data = array();
            $data = $this->input->post();
            $data = $this->input->get();
            $data['is_deleted'] = 0;
            $data['client_id'] = $this->session->userdata('admin')['client_id'];
            if($this->session->userdata('admin')['user_role'] == '6') {
            	$data['hospital_id'] = $this->session->userdata('admin')['hospital_id'];
            }
            $job = $this->joblib->getAllClientJob ($data);
            $this->template->set ( 'job', $job );
            $this->template->set ( 'company_list', $company_list );
            $this->template->set ( 'branch_list', $branch_list );
            $this->template->set ( 'job_status_list', $job_status_list );
            $this->template->set ( 'job_action_list', $job_action_list );
            $this->template->set ( 'page', 'Job List' );
            $this->template->set_theme('default_theme');
            $this->template->set_layout ('default')
            ->title ( 'Dispatcher | Job List' )
            ->set_partial ( 'header', 'partials/header' )
            ->set_partial ( 'side_menu', 'partials/side_menu' )
            ->set_partial ( 'chat_model', 'partials/chat_model' )
            ->set_partial ( 'footer', 'partials/footer' );
            $this->template->build ('job_list');
        }
        
        
        public function job_assignment ($id) {
            $param = array();
            $data = array();
            $param['user_role'] = 7;
            $this->load->library('dispatcher/JobLib');
            $this->load->library('dispatcher/AdminLib');
            
            $param['client_id'] = $this->session->userdata('admin')['client_id'];
          
            $field_worker = $this->adminlib->getAllAdmin ($param);
            $param['id'] = $id;
            $data['id'] = $id;
            $data['client_id'] = $this->session->userdata('admin')['client_id'];
            if($this->session->userdata('admin')['user_role'] == '6') {
            	$data['hospital_id'] = $this->session->userdata('admin')['hospital_id'];
            }
            $advisor = $this->joblib->getAdvisorInsight ($param);
            $job = $this->joblib->getJobByID ($data);
            if(count($job)) {
                $this->template->set ( 'job', $job[0] );
            }
            $this->template->set ( 'field_worker', $field_worker );
            $field_worker_id = $this->input->post("field_worker_id");
            $this->template->set ( 'field_worker_id', $field_worker_id );
            $this->template->set ( 'job_id', $id );
            $this->template->set ( 'advisor', $advisor );
            $this->template->set ( 'page', 'Job Detail' );
            
            if(count($job)) {
                $this->template->set_theme('default_theme');
                $this->template->set_layout ('default')
                ->title ( 'Dispatcher | Job Detail' )
                ->set_partial ( 'header', 'partials/header' )
                ->set_partial ( 'side_menu', 'partials/side_menu' )
                ->set_partial ( 'chat_model', 'partials/chat_model' )
                ->set_partial ( 'footer', 'partials/footer' );
                $this->template->build ('job_assignment');
            } else {
                $this->template->set ( 'page', 'Error ' );
                $this->template->set_theme('default_theme');
                $this->template->set_layout ('login')
                ->title ( 'Dispatcher | Error' )
                ->set_partial ( 'header', 'partials/header_home' );
                $this->template->build ('error_404');
            }
        }
        
        public function update_job_assignment () {
            $params = array();
            $params = $this->input->post('data');
            $params['start_date'] = date("Y-m-d",strtotime($params['start_date']));
            $params['start_time'] = date("H:i:s",strtotime($params['start_time']));
            $params['assigned_by'] = $this->session->userdata('admin')['id'];
            $params['assigned_date'] = date("Y-m-d H:i:s");
            
            $this->load->library('dispatcher/JobLib');
            $res = $this->joblib->updateJobAssignment ($params);
            $response = array();
            if($res) {
                $response['status'] = 1;
                $response['msg'] = "Field Worker Assigned successfully.";
            } else {
                $response['status'] = 0;
                $response['msg'] = "Error! Please check your data.";
            }
            echo json_encode($response);
        }
        
        public function update_jobList_through_pusher () {
            $this->load->library('dispatcher/JobLib');
            $data['client_id'] = $this->session->userdata('admin')['client_id'];
            if($this->session->userdata('admin')['user_role'] == '6') {
            	$data['hospital_id'] = $this->session->userdata('admin')['hospital_id'];
            }
            $job = $this->joblib->getAllClientJob ($data);
            
            $i=0;
            $sr=1;
            $data = array();
            foreach($job as $row) {
            	$data[$i]['id']=$row['id'];
            	$data[$i]['sr']=$sr;
            	$data[$i]['job_id'] = getJobID ($row['id']);
            	if($row['created_date'] == '0000-00-00 00:00:00' OR $row['created_date'] == NULL)
            		$data[$i]['created_date'] = 'NA';
            	else
            		$data[$i]['created_date']=date('d-m-Y g:i A',strtotime($row['created_date']));
            	
            	if($row['delivery_date'] == '0000-00-00' OR $row['delivery_date'] == NULL)
            		$data[$i]['delivery_date'] = 'NA';
            	else
            		$data[$i]['delivery_date']=date('d-m-Y',strtotime($row['delivery_date']));
            	
            	if($row['delivery_time'] == '00:00:00' OR $row['delivery_time'] == NULL)
            		$data[$i]['delivery_time'] = 'NA';
            	else
            		$data[$i]['delivery_time']=date('g:i A',strtotime($row['delivery_time']));
            	
            	if($row['start_date'] == NULL)
            		$data[$i]['start_date'] = 'NA';
            	else
            		$data[$i]['start_date']=date('d-m-Y',strtotime($row['start_date']));
            	
            	if($row['start_time'] == NULL)
            		$data[$i]['start_time'] = 'NA';
            	else
            		$data[$i]['start_time']=date(' g:i A',strtotime($row['start_time']));
            	
            	if($row['end_date'] == NULL)
            		$data[$i]['end_date'] = 'NA';
            	else
            		$data[$i]['end_date']=date('d-m-Y',strtotime($row['end_date']));
            	
            	if($row['end_time'] == NULL)
            		$data[$i]['end_time'] = 'NA';
            	else
            		$data[$i]['end_time']=date('g:i A',strtotime($row['end_time']));
            	
            	$data[$i]['patient_name']=$row['patient_name'];
            	$data[$i]['pick_address']=$row['pick_address'];
            	$data[$i]['drop_address']=$row['drop_address'];
            	$data[$i]['business_name']=$row['business_name'];
            	$data[$i]['job_name']=$row['job_name'];
            	if($row['fieldworker_name'] == "" OR $row['fieldworker_name'] == NULL) {
				$data[$i]['fieldworker_name'] = "Not Assigned";
			} else {
				$data[$i]['fieldworker_name'] = $row['fieldworker_name'];
			}
			$data[$i]['assign_to']=$row['assign_to'];
			$data[$i]['status']=$row['status'];
			$data[$i]['action']=$row['action'];
			$data[$i]['status_id']=$row['status_id'];
			$data[$i]['action_id']=$row['action_id'];
			if($row['priority'] == 0) {
				$data[$i]['priority']="AM";
			} else if($row['priority'] == 1) {
				$data[$i]['priority']="Timed";
			} else if($row['priority'] == 2) {
				$data[$i]['priority']="Stat";
			} else if($row['priority'] == 3) {
				$data[$i]['priority']="Today";
			} else {
				$data[$i]['priority']="Not Define";
			}
                
                $i++;
                $sr++;
            }
            echo json_encode($data);
        }
        
        public function filter_job () {
            $params = array();
            $params = $this->input->post();
            
            $params['is_deleted'] = 0;
            $params['client_id'] = $this->session->userdata('admin')['client_id'];
            if($this->session->userdata('admin')['user_role'] == '6') {
            	$params['hospital_id'] = $this->session->userdata('admin')['hospital_id'];
            }
            $this->load->library('dispatcher/JobLib');
            //print_r($params);
            $result = $this->joblib->getAllClientJob ($params);
            
            $i=0;
            $sr=1;
            $data = array();
            foreach($result as $row) {
                $data[$i]['id']=$row['id'];
                $data[$i]['sr']=$sr;
                $data[$i]['job_id'] = getJobID ($row['id']);
                if($row['created_date'] == '0000-00-00 00:00:00' OR $row['created_date'] == NULL)
                    $data[$i]['created_date'] = 'NA';
                else
                    $data[$i]['created_date']=date('d-m-Y g:i A',strtotime($row['created_date']));
                
                if($row['delivery_date'] == '0000-00-00' OR $row['delivery_date'] == NULL)
                    $data[$i]['delivery_date'] = 'NA';
                else
                    $data[$i]['delivery_date']=date('d-m-Y',strtotime($row['delivery_date']));
                
                if($row['delivery_time'] == '00:00:00' OR $row['delivery_time'] == NULL)
                    $data[$i]['delivery_time'] = 'NA';
                else
                    $data[$i]['delivery_time']=date('g:i A',strtotime($row['delivery_time']));
                
                if($row['start_date'] == NULL)
                    $data[$i]['start_date'] = 'NA';
                else
                    $data[$i]['start_date']=date('d-m-Y',strtotime($row['start_date']));
                
                if($row['start_time'] == NULL)
                    $data[$i]['start_time'] = 'NA';
                else
                    $data[$i]['start_time']=date(' g:i A',strtotime($row['start_time']));
                
                if($row['end_date'] == NULL)
                    $data[$i]['end_date'] = 'NA';
                else
                    $data[$i]['end_date']=date('d-m-Y',strtotime($row['end_date']));
                
                if($row['end_time'] == NULL)
                    $data[$i]['end_time'] = 'NA';
                else
                    $data[$i]['end_time']=date('g:i A',strtotime($row['end_time']));
                
                $data[$i]['patient_name']=$row['patient_name'];
                $data[$i]['pick_address']=$row['pick_address'];
                $data[$i]['drop_address']=$row['drop_address'];
                $data[$i]['business_name']=$row['business_name'];
                $data[$i]['job_name']=$row['job_name'];
                if($row['fieldworker_name'] == "" OR $row['fieldworker_name'] == NULL) {
                    $data[$i]['fieldworker_name'] = "Not Assigned";
                } else {
                    $data[$i]['fieldworker_name'] = $row['fieldworker_name'];
                }
                $data[$i]['assign_to']=$row['assign_to'];
                $data[$i]['status']=$row['status'];
                $data[$i]['action']=$row['action'];
                $data[$i]['status_id']=$row['status_id'];
                $data[$i]['action_id']=$row['action_id'];
                if($row['priority'] == 0) {
                	$data[$i]['priority']="AM";
                } else if($row['priority'] == 1) {
                	$data[$i]['priority']="Timed";
                } else if($row['priority'] == 2) {
                	$data[$i]['priority']="Stat";
                } else if($row['priority'] == 3) {
                	$data[$i]['priority']="Today";
                } else {
                	$data[$i]['priority']="Not Define";
                }
                
                $i++;
                $sr++;
            }
            echo json_encode($data);
        }
        
        public function job_not_started (){
            $this->load->library('dispatcher/JobLib');
            $job = $this->joblib->getJobNotStarted ();
            $this->template->set ( 'job', $job );
            $this->template->set ( 'page', 'Job List' );
            $this->template->set_theme('default_theme');
            $this->template->set_layout ('default')
            ->title ( 'Dispatcher | Job List' )
            ->set_partial ( 'header', 'partials/header' )
            ->set_partial ( 'side_menu', 'partials/side_menu' )
            ->set_partial ( 'chat_model', 'partials/chat_model' )
            ->set_partial ( 'footer', 'partials/footer' );
            $this->template->build ('job_list');
        }
        
        public function job_detail ($id){
        	$this->load->library('dispatcher/JobLib');
            $job_detail = $this->joblib->getJobDetailById ($id);
            $job_action = $this->joblib->getJobActionHistoryByID ($id);
            $this->template->set ( 'job_details',$job_detail );
            $this->template->set ( 'job_action',$job_action );
            $this->template->set ( 'page', 'Job Detail' );
            $this->template->set_theme('default_theme');
            $this->template->set_layout ('default')
            ->title ( 'Dispatcher | Job Detail' )
            ->set_partial ( 'header', 'partials/header' )
            ->set_partial ( 'side_menu', 'partials/side_menu' )
            ->set_partial ( 'chat_model', 'partials/chat_model' )
            ->set_partial ( 'footer', 'partials/footer' );
            $this->template->build ('job_detail');
        }
        
        
        public function edit_assign_fieldworker () {
            $param = array();
            $param['user_role'] = 7;
            $param['client_id'] = $this->session->userdata('admin')['client_id'];
            if($this->session->userdata('admin')['user_role'] == '6') {
            	$param['hospital_id'] = $this->session->userdata('admin')['hospital_id'];
            }
            $this->load->library('dispatcher/AdminLib');
            $field_worker = $this->adminlib->getAllAdmin ($param);
            $this->template->set ( 'field_worker', $field_worker );
            $field_worker_id = $this->input->post("field_worker_id");
            $this->template->set ( 'field_worker_id', $field_worker_id );
            $job_id = $this->input->post("job_id");
            $this->template->set ( 'job_id', $job_id );
            $this->template->set ( 'page', 'Job' );
            
            $this->template->set_theme( 'default_theme' );
            $this->template->set_layout ( false)
            ->title ( 'Dispatcher | Job' );
            $this->template->build ( 'update_job',true );
        }
        
        public function save_fieldworker_to_job () {
            $params = array();
            $params = $this->input->post();
            $this->load->library('dispatcher/JobLib');
            $res = $this->joblib->updateJob ($params);
            $response = array();
            if($res) {
                $response['status'] = 1;
                $response['msg'] = "Field Worker Assigned successfully.";
            } else {
                $response['status'] = 0;
                $response['msg'] = "Error! Please check your data.";
            }
            echo json_encode($response);
        }
        
        public function edit_job_action () {
            $this->load->library('dispatcher/JobLib');
            $action = $this->joblib->getAllJobAction ();
            $this->template->set ( 'action', $action );
            $id = $this->input->post("id");
            $this->template->set ( 'id', $id );
            $action_id = $this->input->post("action_id");
            $this->template->set ( 'action_id', $action_id );
            $this->template->set ( 'page', 'Job' );
            
            $this->template->set_theme( 'default_theme' );
            $this->template->set_layout ( false)
            ->title ( 'Dispatcher | Job' );
            $this->template->build ( 'update_job',true );
        }
        
        public function update_job_action () {
            $params = array();
            $params = $this->input->post();
            $params['updated_by'] = $this->session->userdata('admin')['id'];
            $params['updated_date'] = date("Y-m-d H:i:s");
            $this->load->library('dispatcher/JobLib');
            $res = $this->joblib->updateJob ($params);
            $response = array();
            if($res) {
                $response['status'] = 1;
                $response['msg'] = "Action updated successfully.";
            } else {
                $response['status'] = 0;
                $response['msg'] = "Error! Please check your data.";
            }
            echo json_encode($response);
        }
        
        public function all_job_on_map (){
            $this->load->library('dispatcher/googlemaps');
            $config['center'] = '37.4419, -122.1419';
            $config['zoom'] = 'auto';
            $this->googlemaps->initialize($config);
            
            $marker = array();
            $marker['position'] = '37.429, -122.1519';
            $marker['infowindow_content'] = '1 - Hello World!';
            $marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
            $this->googlemaps->add_marker($marker);
            
            $marker = array();
            $marker['position'] = '37.409, -122.1319';
            $marker['draggable'] = TRUE;
            $marker['animation'] = 'DROP';
            $this->googlemaps->add_marker($marker);
            
            $marker = array();
            $marker['position'] = '37.449, -122.1419';
            $marker['onclick'] = 'alert("You just clicked me!!")';
            $this->googlemaps->add_marker($marker);
            $data['map'] = $this->googlemaps->create_map();
            $this->template->set ( 'map', $data);
            $this->template->set ( 'page', 'Job Detail' );
            $this->template->set_theme('default_theme');
            $this->template->set_layout ('default')
            ->title ( 'Dispatcher | Job Detail' )
            ->set_partial ( 'header', 'partials/header' )
            ->set_partial ( 'side_menu', 'partials/side_menu' )
            ->set_partial ( 'chat_model', 'partials/chat_model' )
            ->set_partial ( 'footer', 'partials/footer' );
            $this->template->build ('all_job_on_map');
        }
        public function field_worker_route()
        {
            $this->load->library('dispatcher/googlemaps');
            $config['center'] = '37.4419, -122.1419';
            $config['zoom'] = 'auto';
            $this->googlemaps->initialize($config);
            $polyline = array();
            $polyline['points'] = array('37.429, -122.1319',
                                        '37.429, -122.1419',
                                        '37.4419, -122.1219');
            $this->googlemaps->add_polyline($polyline);
            $data['map'] = $this->googlemaps->create_map();
            $this->template->set ( 'map', $data);
            $this->template->set_theme('default_theme');
            $this->template->set_layout ('default')
            ->title ( 'Dispatcher | Dashboard' )
            ->set_partial ( 'header', 'partials/header' )
            ->set_partial ( 'side_menu', 'partials/side_menu' )
            ->set_partial ( 'chat_model', 'partials/chat_model' )
            ->set_partial ( 'footer', 'partials/footer' );
            $this->template->build ('field_worker_route');
        }
        public function job_on_map()
        {
            $this->load->library('dispatcher/googlemaps');
            $config['center'] = '37.4419, -122.1419';
            $config['zoom'] = 'auto';
            $this->googlemaps->initialize($config);
            $polyline = array();
            $polyline['points'] = array('37.429, -122.1319',
                                        '37.429, -122.1419',
                                        '37.4419, -122.1219');
            $this->googlemaps->add_polyline($polyline);
            $data['map'] = $this->googlemaps->create_map();
            $this->template->set ( 'map', $data);
            $this->template->set_theme('default_theme');
            $this->template->set_layout ('default')
            ->title ( 'Dispatcher | Dashboard' )
            ->set_partial ( 'header', 'partials/header' )
            ->set_partial ( 'side_menu', 'partials/side_menu' )
            ->set_partial ( 'chat_model', 'partials/chat_model' )
            ->set_partial ( 'footer', 'partials/footer' );
            $this->template->build ('job_on_map');
        }
        public function job_direction()
        {
            $this->load->library('dispatcher/googlemaps');
            $config['center'] = '37.4419, -122.1419';
            $config['zoom'] = 'auto';
            $config['directions'] = TRUE;
            $config['directionsStart'] = 'empire state building';
            $config['directionsEnd'] = 'statue of liberty';
            $config['directionsDivID'] = 'directionsDiv';
            $this->googlemaps->initialize($config);
            $data['map'] = $this->googlemaps->create_map();
            $this->template->set ( 'map', $data);
            $this->template->set_theme('default_theme');
            $this->template->set_layout ('default')
            ->title ( 'Dispatcher | Dashboard' )
            ->set_partial ( 'header', 'partials/header' )
            ->set_partial ( 'side_menu', 'partials/side_menu' )
            ->set_partial ( 'chat_model', 'partials/chat_model' )
            ->set_partial ( 'footer', 'partials/footer' );
            $this->template->build ('direction');
        }
        public function job_street()
        {
            $this->load->library('dispatcher/googlemaps');
            $config['center'] = '18.5883366, 73.78399460000003';
            $config['map_type'] = 'STREET';
            $config['streetViewPovHeading'] = 90;
            $this->googlemaps->initialize($config);
            $data['map'] = $this->googlemaps->create_map();
            $this->template->set ( 'map', $data);
            $this->template->set_theme('default_theme');
            $this->template->set_layout ('default')
            ->title ( 'Dispatcher | Dashboard' )
            ->set_partial ( 'header', 'partials/header' )
            ->set_partial ( 'side_menu', 'partials/side_menu' )
            ->set_partial ( 'chat_model', 'partials/chat_model' )
            ->set_partial ( 'footer', 'partials/footer' );
            $this->template->build ('street');
        }
        public function job_location ()
        {
            $this->load->library('dispatcher/googlemaps');
            $config['center'] = '37.4419, -122.1419';
            $this->googlemaps->initialize($config);
            $marker = array();
            $marker['position'] = '37.449, -122.1419';
            $marker['icon'] = base_url().'assets/images/bike.png';
            $marker['infowindow_content'] = 'Current Status';
            $this->googlemaps->add_marker($marker);
            $data['map'] = $this->googlemaps->create_map();
            $this->template->set ( 'map', $data);
            $this->template->set ( 'page', 'Job Detail' );
            $this->template->set_theme('default_theme');
            $this->template->set_layout ('default')
            ->title ( 'Dispatcher | Job Detail' )
            ->set_partial ( 'header', 'partials/header' )
            ->set_partial ( 'side_menu', 'partials/side_menu' )
            ->set_partial ( 'chat_model', 'partials/chat_model' )
            ->set_partial ( 'footer', 'partials/footer' );
            $this->template->build ('job_location');
        }
        function get_distance($lat1 = 37.429, $lat2 = 37.4419, $long1 = -122.1419, $long2 = -122.1219)
        {
            $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&language=pl-PL";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            curl_close($ch);
            $response_a = json_decode($response, true);
            $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
            $time = $response_a['rows'][0]['elements'][0]['duration']['text'];
            
            return array('distance' => $dist, 'time' => $time);
        }
        
        public function job_details($job_id)
        {
        	$this->load->library('dispatcher/JobLib');
        	$job_details = $this->joblib->getJobDetailById($job_id);
        	$delivery = $this->joblib->getDeliveryStatusByJobId($job_id);
        	$this->template->set ( 'delivery_status1', $delivery);
        	$this->template->set ( 'job_details', $job_details);
        	$this->template->set ( 'page', 'Job List' );
        	$this->template->set_theme('default_theme');
        	$this->template->set_layout ('default')
        	->title ( 'Dispatcher | Job List' )
        	->set_partial ( 'header', 'partials/header' )
        	->set_partial ( 'side_menu', 'partials/side_menu' )
        	->set_partial ( 'chat_model', 'partials/chat_model' )
        	->set_partial ( 'footer', 'partials/footer' );
        	$this->template->build ('job_detail');
        }
		
		 function test($id)
        {
        	$this->load->library('dispatcher/JobLib');
        	$userdata = $this->joblib->getAssignJobDetailByFieldworker($id);
        	$userdata ['status'] = 1;
        	$userdata ['msg'] = "Updated successfully";
        	echo json_encode($userdata);
        }
    }
    
    ?>