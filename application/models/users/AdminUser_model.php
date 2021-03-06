<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

/**
 * AdminUser model
 *
 * <p>
 * We are using this model to add, update, delete and get admin users.
 * </p>
 *
 * @package AdminUser
 * @author Nushrat
 * @copyright Copyright &copy; 2015, Dispatcher
 * @category CI_Model API
 */
class adminUser_model extends CI_Model {
	
	function __construct() {
		parent::__construct ();
	}

	
	public function getAdminByUserName($username) {
		$this->db->select ( 'a.*,ar.name as role_name' );
		$this->db->from ( TABLES::$ADMIN.' AS a' );
		$this->db->join ( TABLES::$ADMIN_USER_ROLE.' AS ar',"ar.id=a.user_role","left" );
		$this->db->where ( 'a.is_deleted', 0 ); 
		$this->db->where ( 'a.verified', 1 );
		$this->db->where ( "(a.email='".$username."' OR a.mobile='".$username."')",'',FALSE );
		$query = $this->db->get ();
	//  echo $this->db->last_query();
		$result = $query->result_array ();
		return $result;
	}
	
	public function getAllAdmin ($param) {
		$this->db->select ( 'a.*,ar.name as role_name' );
		$this->db->from ( TABLES::$ADMIN.' AS a' );
		$this->db->join ( TABLES::$ADMIN_USER_ROLE.' AS ar',"ar.id=a.user_role","left" );
		$this->db->where ( 'a.is_deleted', 0 );
		if(isset($param['user_role'])) {
			$this->db->where ( 'a.user_role', $param['user_role'] );
		}
		if(isset($param['client_id'])) {
			$this->db->where ( 'a.client_id', $param['client_id'] );
		}
		if(isset($param['hospital_id'])) {
			$this->db->where ( 'a.hospital_id', $param['hospital_id'] );
		}
		$query = $this->db->get ();
		//echo $this->db->last_query();
		$result = $query->result_array ();
		return $result;
	}
	
	public function getChatPeople ($param) {
		$this->db->select ( 'a.*,ar.name as role_name' );
		$this->db->from ( TABLES::$ADMIN.' AS a' );
		$this->db->join ( TABLES::$ADMIN_USER_ROLE.' AS ar',"ar.id=a.user_role","left" );
		$this->db->where ( 'a.is_deleted', 0 );
		if($param['user_role'] == 6) {
			$this->db->where ( " (a.hospital_id ='".$param['hospital_id']."' OR a.hospital_id is NULL ) ",'',FALSE );
		}
		if(isset($param['client_id'])) {
			$this->db->where ( 'a.client_id', $param['client_id'] );
		}
		if(isset($param['session_id'])) {
			$this->db->where ( 'a.id !=', $param['session_id'] );
		}
		
		$query = $this->db->get ();
		//echo $this->db->last_query();
		$result = $query->result_array ();
		return $result;
	}
	
	public function getAdminById ($id) {
		$this->db->select ( 'a.*,ar.name as role_name' );
		$this->db->from ( TABLES::$ADMIN.' AS a' );
		$this->db->join ( TABLES::$ADMIN_USER_ROLE.' AS ar',"ar.id=a.user_role","left" );
		$this->db->where ( 'a.is_deleted', 0 );
		$this->db->where ( 'a.id', $id );
		$query = $this->db->get ();
		//echo $this->db->last_query();
		$result = $query->result_array ();
		return $result;
	}
	
	public function addAdminLog ($data)
	{
		$this->db->insert(TABLES::$ADMINLOG,$data);
		return $this->db->insert_id();
	}
	
	public function addAdmin ($data)
	{
		$this->db->insert(TABLES::$ADMIN,$data);
		return $this->db->insert_id();
	}
	
	public function updateAdminById ($data)
	{
		$this->db->where ( 'id', $data['id'] );
		return $this->db->update(TABLES::$ADMIN,$data);
	}
	public function updateCurrentLocationById($data)
	{
		$this->db->where ( 'id', $data['id'] );
		unset($data['id']);
		return $this->db->update(TABLES::$ADMIN,$data);
	}
	
	public function editPassword($data)
	{
		$oldpassword = $data['oldpassword'];
		unset($data['oldpassword']);
		$this->db->where('id',$data['id']);
		$this->db->where('text_password',$oldpassword);
		$query = $this->db->update(TABLES::$ADMIN ,$data );
		if($query)
			return 1;
		else
			return 0; 
	}
	
	public function checkPassword($data)
	{
		$this->db->select ( 'id,first_name' );
		$this->db->from ( TABLES::$ADMIN);
		$this->db->where('id',$data['id']);
		$this->db->where ( 'text_password', $data['oldpassword'] );
		$query = $this->db->get ();
		//echo $this->db->last_query ();
		$result = $query->result_array ();
		return $result;
	}
	
	/**
	 *  Reset User Password
	 */
	public  function resetPassword ($param){
		$this->db->where( 'email',$param['email'] );
		return $this->db->update(TABLES::$ADMIN,$param);
	}
}

