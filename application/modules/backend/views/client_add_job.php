<style>
.form-group{margin-bottom:0px}
.content-header-title{font-size:16px}
</style>

<link rel="stylesheet" href="<?php echo asset_url();?>vendor/bootstrap/bootstrapValidator.min.css"/>
<div class="container">
  <div class="content">
    <div class="content-container">
		<div class="content-header">
		<h2 class="content-header-title">
				Add Job 
			</h2>
		</div>
		<div class="row">
		<div class="col-md-offset-1 col-md-10">
		<form class="form-validation form-horizontal" method="POST" action="" name="job_form" id="job_form" enctype="multipart/form-data">
		   <div class="row">
		   <ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#basic">Basic</a></li>
			 
			  <li><a data-toggle="tab" href="#address">Address</a></li>
			    <?php if($_SESSION['admin']['user_role']==5 || $_SESSION['admin']['user_role']==4 || $_SESSION['admin']['user_role']==3) {?> <li><a data-toggle="tab" href="#assign">Assign</a></li><?php }?>
			</ul>
				<div class="tab-content" >
					<div id="basic" class="tab-pane fade in active">
					<div class=" col-md-10 col-md-offset-1">
						<div class="col-md-6">
				         <div class="row">
				         	<div class="col-md-12">
					         	<div class="row"> 
										<label>Job Name</label>
									<div class="col-md-12 form-group">
										<input type="text" name="job[job_name]" id= "jobname" class="form-control" required>
									</div>
									<div class="messageContainer text-danger"></div>
								</div>
				         	</div>
			         	</div>
				         	<div class="row">
					         	<div class="col-md-12">
						         	<div class="row"> 
											<label>Job Priority</label>
										<div class="col-md-12 form-group">
											<select name="job[priority]" id="priority" class="form-control" >
											<option value="">Select</option>
											<option value="0">AM</option>
											<option value="1">Timed</option>
											<option value="2">Stat</option>
											<option value="3">Today</option>
										</select>
										</div>
										<div class="messageContainer text-danger"></div>
									</div>
					         	</div>
				         	</div>
		         			<div class="row">
					        	<div class="col-md-12">
					        		<div class="row"> 
											<label>Patient Name</label>
										<div class="col-md-12 form-group">
											<input type="text" name="patient[name]" id= "pname" class="form-control" required>
										</div>
										<div class="messageContainer text-danger"></div>
									</div>
					        	</div>
				        	</div>
				        		<div class="row">
					         	<div class="col-md-12">
					         		<div class="row"> 
											<label>Room Number</label>
										<div class="col-md-12 form-group">
											<input type="text" name="patient[room_no]" id= "rnumber" class="form-control" required>
										</div>
										<div class="messageContainer text-danger"></div>
									</div>
					         	</div>
				         	</div>
				         	<div class="row"> 
					         	<div class="col-md-12">
					         		<div class="row"> 
											<label>Tests</label>
										<div class="col-md-12 form-group">
											<input type="text" name="patient[test]" id= "tests" class="form-control" required>
										</div>
										<div class="messageContainer text-danger"></div>
									</div>
					         	</div>
				         	</div>
				        	</div>
				        	<div class="col-md-6">
				        
				         	<div class="row"> 
					         	<div class="col-md-12">
					         		<div class="row"> 
											<label>Caller</label>
										<div class="col-md-12 form-group">
											<input type="text" name="patient[caller]" id= "caller" class="form-control" required>
										</div>
										<div class="messageContainer text-danger"></div>
									</div>
					         	</div>
				         	</div>
				         	<div class="row">
					         	<div class="col-md-12">
					         		<div class="row"> 
											<label>Description</label>
										<div class="col-md-12 form-group">
											<textarea  name="job[description]" class="form-control" rows="4"> </textarea>
										</div>
										<div class="messageContainer text-danger"></div>
									</div>
					         	 </div>
					         </div>
				         	<div class="row"> 			         	
			         			<div class="col-md-12">
			         				<div class="row"> 
											<label>Special instrunction</label>
										<div class="col-md-12 form-group">
										<textarea  name="patient[special_instruction]" class="form-control" rows="4"> </textarea>
										</div>
										<div class="messageContainer text-danger"></div>
									</div>
			         			</div>
		         			</div>
		         			</div>
						   
					      </div>
					</div>
				
	<!--    Contact 
					<div id="contact" class="tab-pane fade">
					<div class=" col-md-10 col-md-offset-1">
						<div class=" col-md-6">

					   	<div class="row">
				        	<div class="col-md-12">
				        		<div class="row"> 
										<label>First Name</label>
									<div class="col-md-12 form-group">
										<input type="text" name="contact[first_name]" id= "fname" class="form-control" required>
									</div>
									<div class="messageContainer text-danger"></div>
								</div>	
				        	</div>
				        </div>
				        <div class="row"> 
				         	<div class="col-md-12">
				         		<div class="row"> 
										<label>Last Name</label>
									<div class="col-md-12 form-group">
										<input type="text" name="contact[last_name]" id= "end_dalnamete" class="form-control" required>
									</div>
									<div class="messageContainer text-danger"></div>
								</div>	
				         	</div>
				         </div>
				         <div class="row"> 
				         	<div class="col-md-12">
				         		<div class="row"> 
										<label>Mobile No</label>
									<div class="col-md-12 form-group">
										<input type="text" name="contact[mobile]" id= "mobno" class="form-control" required>
									</div>
									<div class="messageContainer text-danger"></div>
								</div>	
				         	</div>
				         </div>
				         </div>
				         <div class="col-md-6">
				         <div class="row"> 
				         	<div class="col-md-12">
				         		<div class="row"> 
									<label>	Email Id</label>
									<div class="col-md-12 form-group">
										<input type="email" name="contact[email]" id= "email" class="form-control" required>
									</div>
									<div class="messageContainer text-danger"></div>
								</div>	
				         	</div>
				         </div>
				         <div class="row"> 
				         	<div class="col-md-12">
				         		<div class="row"> 
									<label>	Delivery Date</label>
									<div class="col-md-12 form-group">
										<input type="text" name="job[delivery_date]" id= "start_date" class="form-control">
									</div>
									<div class="messageContainer text-danger"></div>
								</div>	
				         	</div>
				         </div>
				         <div class="row"> 
				         	
				         		<div class="row" style="padding-left:13px">
									<label>	Delivery Time</label>
									<div class="col-md-12 form-group" >
									<div class="input-group bootstrap-timepicker timepicker ">
							            <input id="timepicker1" type="text" name = "job[delivery_time]" class="form-control input-small">
							            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
							        </div>
							        </div>
									<div class="messageContainer text-danger"></div>
								</div>
				         </div>
		         	</div>
					</div>
				</div>-->
	<!--     Address -->
				
					<div id="address" class="tab-pane fade">
					<div class=" col-md-10 col-md-offset-1">
					   <div class="row">
				       <div class=" col-md-6">
				         <div class="row">
				   			<h3 class="content-header-title"> <b>Pick-up location</b></h3>
				   		</div>
				         <?php if($_SESSION['admin']['user_role']==5 || $_SESSION['admin']['user_role']==4 || $_SESSION['admin']['user_role']==3) {?>
			         		<div class="row">
				         		<div class="col-md-12">
						         	<div class="row"> 
											<label>Select Branch/Client</label>
										<div class="col-md-12 form-group">
											<input type="radio" name="contact[pickup_address_type]" onchange="getPickupBranchDiv();">&nbsp;&nbsp;Branch &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="radio" name="contact[pickup_address_type]" onchange="getPickupHospitalDiv();">&nbsp;&nbsp;Hospital
										</div>
										<div class="messageContainer text-danger"></div>
									</div>
				         		</div>
			         		</div>
			         	<div id="pickup_address_div">
			         	</div>
			         	
			         	<?php } ?>
					    
				        		<div class="row"> 
										<label>Location/ Lookup Name</label>
									<div class="col-md-12 form-group">
										<input type="text" name="contact[pickup_lookup_name]" id= "lookupname" class="form-control" required>
									</div>
									<div class="messageContainer text-danger"></div>
								</div>
				        	
				         		<div class="row"> 
										<label>Address</label>
									<div class="col-md-12 form-group">
										<input type="text" name="contact[pickup_address]" class="form-control" id ="locality" required>
										<input type="hidden" class="form-control" name="contact[pickup_latitude]" placeholder="City" id="latitude" />
										<input type="hidden" class="form-control" name="contact[pickup_longitude]" placeholder="City" id="longitude" />
									</div>
									<div class="messageContainer text-danger"></div>
								</div>
				         
				         		<div class="row"> 
									<label>City.</label>
									<div class="col-md-12 form-group">
										<input type="text" name="contact[pickup_city]" id= "city" class="form-control" onkeyup="ajaxSearch()" required>
									</div>
									<div class="messageContainer text-danger"></div>
								</div>	
				         		<div class="row"> 
										<label>State/Region</label>
									<div class="col-md-12 form-group">
										<input type="text" name="contact[pickup_state]" id= "state" class="form-control" onkeyup="ajaxSearch1()" required>
										<div id="suggestions"  style="position:absolute;background-color:#fff;z-index:1000;width:90%;font-size:1.3em;top:40px;box-shadow:0px 3px 3px #f0f0f0" >
											<div id="autoSuggestionsList1" ></div>
										 </div>
									</div>									
								</div>
								<div class="messageContainer text-danger"></div>
								<div class="row"> 
										<label>Zip Code</label>
									<div class="col-md-12 form-group">
										<input type="text" name="contact[pickup_postalcode]" id= "postalcode" class="form-control" required>
									</div>
									<div class="messageContainer text-danger"></div>
								</div>
	         		</div>
				       <div class="col-md-6">
				   			<div class="row">
					   		<h6 class="content-header-title"> <b> Drop-Off location</b></h6>
					   	</div>
					   		<?php if($_SESSION['admin']['user_role']==5 || $_SESSION['admin']['user_role']==4 || $_SESSION['admin']['user_role']==3) {?>
			         		
						         	<div class="row"> 
											<label>Select Branch/Client</label>
										<div class="col-md-12 form-group">
											<input type="radio" name="contact[delivery_address_type]" onchange="getBranchDiv();">&nbsp;&nbsp;Branch&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input type="radio" name="contact[delivery_address_type]" onchange="getHospitalDiv();">&nbsp;&nbsp;Hospital
										</div>
										<div class="messageContainer text-danger"></div>
									</div>
				         		
			         	<div id="address_div">
			         	</div>
			         	
			         	<?php } ?>
			         	 		<div class="row"> 
										<label>Location/ Lookup Name</label>
									<div class="col-md-12 form-group">
										<input type="text" name="contact[delivery_lookup_name]" id= "delevry_lookupname" class="form-control" required>
									</div>
									<div class="messageContainer text-danger"></div>
								</div>
				         		<div class="row"> 
										<label>Address</label>
									<div class="col-md-12 form-group">
										<input type="text" name="contact[delivery_address]" class="form-control" id ="hstreet" required>
										<input type="hidden" class="form-control" name="contact[delivery_latitude]" placeholder="City" id="hlatitude" />
										<input type="hidden" class="form-control" name="contact[delivery_longitude]" placeholder="City" id="hlongitude" />
									</div>
									<div class="messageContainer text-danger"></div>
								</div>
				         		<div class="row"> 
										<label>City.</label>
									<div class="col-md-12 form-group">
									<input type="text" name="contact[delivery_city]" id= "hcity" class="form-control" onkeyup="ajaxSearch()" required>
									 <div id="suggestions"  style="position:absolute;background-color:#fff;z-index:1000;width:90%;font-size:1.3em;top:40px;box-shadow:0px 3px 3px #f0f0f0" >
										 <div id="autoSuggestionsList" ></div>
									</div>
									</div>
									<div class="messageContainer text-danger"></div>
								</div>
				         		<div class="row"> 
										<label>State/Region</label>
									<div class="col-md-12 form-group">
										<input type="text" name="contact[delivery_state]" id= "hstate" class="form-control" onkeyup="ajaxSearch1()" required>
										<div id="suggestions"  style="position:absolute;background-color:#fff;z-index:1000;width:90%;font-size:1.3em;top:40px;box-shadow:0px 3px 3px #f0f0f0" >
											<div id="autoSuggestionsList1" ></div>
										 </div>
									</div>									
								</div>
								<div class="messageContainer text-danger"></div>
							
				         		<div class="row"> 
										<label>Zip Code</label>
									<div class="col-md-12 form-group">
										<input type="text" name="contact[delivery_zipcode]" id= "hpincode" class="form-control" required>
									</div>
									<div class="messageContainer text-danger"></div>
								</div>	
				         	
				       </div>
	         	</div>
					</div>
					</div>
				
		
			
	<!--    Assign -->			
			
					<div id="assign" class="tab-pane fade">
					<?php if($_SESSION['admin']['user_role']==5 || $_SESSION['admin']['user_role']==4 || $_SESSION['admin']['user_role']==3) {?>
	         	<div class="row">
	         	<div class=" col-md-10 col-md-offset-1">
		   		<div class="col-md-6">
				         		<div class="row"> 
										<label>Start Date</label>
									<div class="col-md-11  input-group">
										<input  type="text" value="<?php if(isset($job)) {if($job['start_date'] != NULL)echo date("d-m-Y",strtotime($job['start_date']));else echo date("d-m-Y"); } else echo date("d-m-Y");?> " name="data[start_date]" id="start_date2" placeholder="Start Date" class="form-control" />
										<span class="input-group-addon" ><i class="fa fa-calendar"></i></span>
									</div>									
								</div>
								<div class="messageContainer text-danger"></div>
							
					
				         		<div class="row"> 
										<label>Estimated Duration</label>
									<div class="col-md-11 input-group">
										<input  type="text" value="<?php if(isset($job)) { if($job['estimated_duration'] != NULL)echo $job['estimated_duration']; }?>" name="data[estimated_duration]" id="estimated_duration" placeholder="Duration" class="form-control" />
										<span class="input-group-addon" >Hr</span>
									</div>									
								</div>
								<div class="messageContainer text-danger"></div>
							
	         	
	         			<div class="row">
				         	<div class="col-md-12">
				         		<div class="row"> 
										<label>Job Priority</label>
									<div class="col-md-12 form-group">
										<select name="data[priority]" id="priority" class="form-control">
											<option value="">Select </option>
											<option value="0" <?php if(isset($job)) { if($job['priority'] == 0) { echo "selected";}}?>>AM</option>
											<option value="1" <?php if(isset($job)) { if($job['priority'] == 1) { echo "selected";}}?>>Timed</option>
											<option value="2" <?php if(isset($job)) { if($job['priority'] == 2) { echo "selected";}}?>>Stat</option>
											<option value="3" <?php if(isset($job)) { if($job['priority'] == 2) { echo "selected";}}?>>Today</option>
										</select>
									</div>									
								</div>
								<div class="messageContainer text-danger"></div>
							</div>
						</div>
						
				         		<div class="row"> 
										<label>Time Of Job Notification To Send On Mobile Device</label>
									<div class="col-md-12 form-group">
										<select name="data[notification_time]" id="notification_time" class="form-control">
											<option value=""> Select </option>
											<option value="0" <?php if(isset($job)) { if($job['notification_time'] == 0) { echo "selected";}}?>>Now</option>
											<option value="1" <?php if(isset($job)) { if($job['notification_time'] == 1) { echo "selected";}}?>>1 Day before the schedule day start</option>
											<option value="2" <?php if(isset($job)) { if($job['notification_time'] == 2) { echo "selected";}}?>>On</option>
											
										</select>
									</div>	
									<div class="messageContainer text-danger"></div>								
								</div>
								
							
				</div>
				<div class=" col-md-6">
				         		<div class="row"> 
										<label>	Start Time</label>
									<div class="col-md-11 input-group">
										<input  type="text" value="<?php if(isset($job)) {if($job['start_time'] != NULL)echo date("g:i A",strtotime($job['start_time'])); }?>" name="data[start_time]" id="timepicker2" placeholder="Start Date" class="form-control" />
										<span class="input-group-addon" ><i class="fa fa-clock-o"></i></span>
									</div>	
									<div class="messageContainer text-danger"></div>								
								</div>
						
				         		<div class="row"> 
										<label>Driver</label>
									<div class="col-md-12 form-group">
										<select name="data[assign_to]" id="assign_to" class="form-control">
											<option value="">Select </option>
											<?php foreach ($field_worker as $row) {?>
											<option value="<?php echo $row['id'];?>" ><?php echo $row['first_name']. " ".  $row['last_name'];?></option>
											<?php }?>
										</select>
									</div>
									<div class="messageContainer text-danger"></div>									
								</div>
						
				         		<div class="row"> 
										<label>Job Type</label>
									<div class="col-md-12 form-group">
										<select name="data[job_type_id]" id="job_type_id" class="form-control">
											<option value="">Select </option>
											<option value="0" <?php if(isset($job)) { if($job['job_type_id'] == 0) { echo "selected";}}?>>One Time Job</option>
											<option value="1" <?php if(isset($job)) { if($job['job_type_id'] == 1) { echo "selected";}}?>>Regular Job</option>
										</select>
									</div>		
									<div class="messageContainer text-danger"></div>							
								</div>
		</div>
	</div>
	</div>
	<?php }?>
					</div>
			</div>
		
		   		
				 
	         	

	         	<div class="col-md-12 " style="margin-top:10px;padding-right:110px"> <button type="submit" class="btn btn-primary m-r pull-right">Submit</button> </div> 
         	<br><br>
        
         	
         </form>
         </div>
</div>
</div>
</div>
</div>

	<script src="<?php echo asset_url();?>vendor/bootstrap/bootstrapValidator.min.js"></script>
	<script src="<?php echo asset_url();?>vendor/bootstrap/jquery.form.js"></script>
	<script src="<?php echo asset_url(); ?>js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo asset_url(); ?>js/bootstrap-timepicker.min.js"></script>
	
	  
    <!-- end page scripts -->

    <!-- initialize page scripts -->
    <script type="text/javascript">
   // $('.form-validation').validate();


    $("#job_form").submit(function(e) {
        e.preventDefault();
    });
      $('#job_form').bootstrapValidator({
    		container: function($field, validator) {
    	    	return $field.parent().next('.messageContainer');
    	    },
    	   	feedbackIcons: {
    	       	validating: 'glyphicon glyphicon-refresh'
    	   	},
    	   	excluded: ':disabled',
    	    fields: {
    	      
    	    	'jobname': {
    	       	 validators: {
    	                notEmpty: {
    	                    message: ' job name is required and cannot be empty'
    	                }
    	            }
    	        },
    	        
    	    	'priority': {
    	       	 validators: {
    	                notEmpty: {
    	                    message: ' Priority is required and cannot be empty'
    	                }
    	            }
    	        },
    	        
    	        'pname': {
    	       	 validators: {
    	                notEmpty: {
    	                    message: ' Patient name is required and cannot be empty'
    	                }

    	            }
    	       	},

    	        'rnumber': {
       	       	 validators: {
       	                notEmpty: {
       	                    message: 'Room number is required and cannot be empty'
       	                }

       	            }
       	       	},

       	     'tests': {
       	       	 validators: {
       	                notEmpty: {
       	                    message: 'Test is required and cannot be empty'
       	                }

       	            }
       	       	},

       	     'caller': {
       	       	 validators: {
       	                notEmpty: {
       	                    message: 'Caller is required and cannot be empty'
       	                }

       	            }
       	       	},

       	     'lookupname': {
       	       	 validators: {
       	                notEmpty: {
       	                    message: 'Lookup is required and cannot be empty'
       	                }

       	            }
       	       	},

       	     'state': {
       	       	 validators: {
       	                notEmpty: {
       	                    message: 'State is required and cannot be empty'
       	                }

       	            }
       	       	},

       	     'city': {
       	       	 validators: {
       	                notEmpty: {
       	                    message: 'City is required and cannot be empty'
       	                }

       	            }
       	       	},

       	     'street': {
       	       	 validators: {
       	                notEmpty: {
       	                    message: 'Street is required and cannot be empty'
       	                }

       	            }
       	       	},

       	     'building': {
       	       	 validators: {
       	                notEmpty: {
       	                    message: 'Building is required and cannot be empty'
       	                }

       	            }
       	       	},

       	     'postalcode': {
       	       	 validators: {
       	                notEmpty: {
       	                    message: 'Postalcode is required and cannot be empty'
       	                }

       	            }
       	       	},

       	     'fname': {
       	       	 validators: {
       	                notEmpty: {
       	                    message: 'Street is required and cannot be empty'
       	                }

       	            }
       	       	},

       	     'lname': {
       	       	 validators: {
       	                notEmpty: {
       	                    message: 'Street is required and cannot be empty'
       	                }

       	            }
       	       	},

       	     'mobno': {
    	       	 validators: {
    	                notEmpty: {
    	                    message: ' Mobile No. is required and cannot be empty'
    	                },
    	                regexp: {
    	                    regexp: '^[7-9][0-9]{9}$',
    	                    message: 'Invalid Mobile Number'
    	                }
    	            }
    	       	},

       	     'email': {
    	       	 validators: {
    	                notEmpty: {
    	                    message: ' Email is required and cannot be empty'
    	                },
    	                regexp: {
    	                    regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
    	                    message: 'The value is not a valid email address'
    	                }
    	            }
    	       }
    	    }
      }).on('success.form.bv', function(e) {
      	// Prevent form submission
      		e.preventDefault();
      		save_user ();
      	}); 

      function save_user () {
  		dataString = $("#job_form").serialize();
  	    $(".text-danger").hide();
  	   	$.ajax({
  	    	type: "POST",
  	        url: "<?php echo base_url(); ?>client/client_save_job",
  	        data: dataString,
  	        dataType: 'json',
  	        success: function(resp){
  	        	if(resp.status == '0') {
  	           		$("#response").addClass('alert-danger');
  					$("#response").html(resp.msg);
  					$("#response").show();
  					
  						
  	           	} else {
  	           // 	$("#job_form").reset();
  	            	$('#reset').click();
  	            	$("#response").show();
  	            	$("#response").addClass('alert-success');
  	            	$("#response").html(resp.msg);
  	            alert("Job added successfully.");
	  	        <?php // if($_SESSION['admin']['user_role']==5 || $_SESSION['admin']['user_role']==4 || $_SESSION['admin']['user_role']==3) {?>
					//window.location.href = "<?php //echo base_url(); ?>admin/job/assignment/"+resp.id;
				<?php //} else {?>
		        		window.location.href = "<?php echo base_url(); ?><?php if($_SESSION['admin']['user_role']==3 || $_SESSION['admin']['user_role']==4|| $_SESSION['admin']['user_role']==5){?>admin/job_list <?php } else {?>client/job_list<?php }?>";
				<?php //}?>
			          	}
  	    	}
  		});
  	   	return false;  //stop the actual form post !important!
  	}
      $(document).ready(function() {
          $("#start_date").datepicker({format:"dd-mm-yyyy"}).datepicker("setDate", "0");
          $('#timepicker1').timepicker();
          $("#start_date2").datepicker({format:"dd-mm-yyyy"}).datepicker("setDate", "0");
          $('#timepicker2').timepicker();
          $('#estimated_duration').timepicker();
          });
      
//       $(function() {
          
//           $("#start_date").datepicker({
//               dateFormat: "dd-mm-yyyy"
//           }).datepicker("setDate", "0");
//           $('#timepicker1').timepicker();
//       });
    </script>
    <script>
    $.getScript("https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyCH-u-UD2bz6cfPEAe8mCVyrnnI7ONx9ro&callback=initMap");
    function initMap() {
        var options = {
            types: ["geocode"],
            componentRestrictions: {country: 'USA'}
        };
        var i=0;
        var input = document.getElementById('locality');
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            //$('#city').val(place.address_components[1].long_name);
            //$('#state').val(place.address_components[2].long_name);
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }
            $.post("https://maps.googleapis.com/maps/api/geocode/json?latlng="+place.geometry.location.lat()+","+place.geometry.location.lng()+"&key=AIzaSyAUX1D8t19z6ud9ljBoP-G_lyVc495ohN8",{}, function(data)
    				{
    					
    					$(data.results[0].address_components).each(function(index){
    						//alert(data.results[0].address_components[index]['types'][0]);
    						//alert(data.results[0].address_components[index]['types']);
    						if(data.results[0].address_components[index]['types'][0]=='administrative_area_level_1')
    						{
    							$('#state').val(data.results[0].address_components[index]['short_name']);
    						}
    						if(data.results[0].address_components[index]['types'][0]=='locality')
    						{
    							$('#city').val(data.results[0].address_components[index]['long_name']);
    						}
    						if(data.results[0].address_components[index]['types'][0]=='postal_code')
    						{
    							$('#postalcode').val(data.results[0].address_components[index]['long_name']);
    						}
    						
    					});
    					//alert(data.value);
    			},'json');
            $('#latitude').val(place.geometry.location.lat());
            $('#longitude').val(place.geometry.location.lng());
          i=1;
        });
  
    
         input = document.getElementById('hstreet');
       var  autocomplete1 = new google.maps.places.Autocomplete(input, options);
        autocomplete1.addListener('place_changed', function () {
            var place = autocomplete1.getPlace();
            //$('#hcity').val(place.address_components[1].long_name);
           // $('#hstate').val(place.address_components[2].long_name);
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }
            $.post("https://maps.googleapis.com/maps/api/geocode/json?latlng="+place.geometry.location.lat()+","+place.geometry.location.lng()+"&key=AIzaSyAUX1D8t19z6ud9ljBoP-G_lyVc495ohN8",{}, function(data)
    				{
    					
    					$(data.results[0].address_components).each(function(index){
    						//alert(data.results[0].address_components[index]['types'][0]);
    						//alert(data.results[0].address_components[index]['types']);
    						if(data.results[0].address_components[index]['types'][0]=='administrative_area_level_1')
    						{
    							$('#hstate').val(data.results[0].address_components[index]['short_name']);
    						}
    						if(data.results[0].address_components[index]['types'][0]=='locality')
    						{
    							$('#hcity').val(data.results[0].address_components[index]['long_name']);
    						}
    						if(data.results[0].address_components[index]['types'][0]=='postal_code')
    						{
    							$('#hpincode').val(data.results[0].address_components[index]['long_name']);
    						}
    						
    					});
    					//alert(data.value);
    			},'json');
            $('#hlatitude').val(place.geometry.location.lat());
            $('#hlongitude').val(place.geometry.location.lng());
          i=0;
        });
    }
    
    function ajaxSearch()
    {
    		$('#autoSuggestionsList').show();
        var input_data = $('#city').val();

        if (input_data.length === 0)
        {
            $('#suggestions').hide();
        }
        else
        {

            var post_data = {
                'city': input_data,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                };

            $.ajax({
                type: "POST",
                url: base_url+"admin/searchcity",
                data: post_data,
                success: function (data) {
                    // return success
                    if (data.length > 0) {
                        $('#suggestions').show();
                        $('#autoSuggestionsList').addClass('auto_list');
                        $('#autoSuggestionsList').html(data);
                    }
                }
             });

         }
     }
    
     function fill (id)
     {
    	 var value = $('#div'+id).text();
    	 //alert(value);
    	 $('#city').val(value);
    	 $('#autoSuggestionsList').hide();
    	 
     }
     function ajaxSearch1()
     {
     	$('#autoSuggestionsList1').show();
         var input_data = $('#state').val();

         if (input_data.length === 0)
         {
             $('#suggestions').hide();
         }
         else
         {

             var post_data = {
                 'state': input_data,
                 '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                 };

             $.ajax({
                 type: "POST",
                 url: base_url+"admin/searchstate",
                 data: post_data,
                 success: function (data) {
                     // return success
                     if (data.length > 0) {
                         $('#suggestions').show();
                         $('#autoSuggestionsList1').addClass('auto_list');
                         $('#autoSuggestionsList1').html(data);
                     }
                 }
              });

          }
      }
      function fill1(id)
      {
     	 var value = $('#div1'+id).text();
     	 //alert(value);
     	 $('#state').val(value);
     	 $('#autoSuggestionsList1').hide();
     	 
      }

      function getPickupHospitalDiv () {
          var hospitalDiv = 
										       	'<div class="row"> '+
															'<label>Select Hospital</label>'+
														'<div class="col-md-12 form-group">'+
															'<select class="form-control" name="contact[pickup_hospital_id]" id="pickup_hospital_id" onchange="getPickupHospital()">'+
																'<option value="">Select Hospital</option>'+
																<?php foreach($hospitallist as $item){?>
																'<option value="<?php echo $item['id']?>"><?php echo $item['business_name']?></option>'+
																<?php }?>
															'</select>'+
														'</div>'+
														'<div class="messageContainer text-danger"></div>'+
													'</div>';
												
		document.getElementById('pickup_address_div').innerHTML = hospitalDiv;
      }
      
      function getPickupBranchDiv () {
          
    	  var hospitalDiv =    	'<div class="row"> '+
															'<label>Select Branch</label>'+
														'<div class="col-md-12 form-group">'+
															'<select class="form-control" name="contact[pickup_branch_id]" id="pickup_branch_id" onchange="getPickupBranch()">'+
																'<option value="">Select Branch</option>'+
																<?php foreach($branchlist as $item){?>
																'<option value="<?php echo $item['id']?>"><?php echo $item['branch_name']?></option>'+
																<?php }?>
															'</select>'+
														'</div>'+
														'<div class="messageContainer text-danger"></div>'+
													'</div>';
												
		document.getElementById('pickup_address_div').innerHTML = hospitalDiv;
      }
      
      function getHospitalDiv () {
          
    	  var hospitalDiv =	'<div class="row"> '+
															'<label>Select Hospital</label>'+
														'<div class="col-md-12 form-group">'+
															'<select class="form-control" name="contact[delivery_hospital_id]" id="hospital_id" onchange="getHospital()">'+
																'<option value="">Select Hospital</option>'+
																<?php foreach($hospitallist as $item){?>
																'<option value="<?php echo $item['id']?>"><?php echo $item['business_name']?></option>'+
																<?php }?>
															'</select>'+
														'</div>'+
														'<div class="messageContainer text-danger"></div>'+
													'</div>';
												
		document.getElementById('address_div').innerHTML = hospitalDiv;
      }
      
      function getBranchDiv () {
         
    	  var hospitalDiv =  	'<div class="row"> '+
															'<label>Select Branch</label>'+
														'<div class="col-md-12 form-group">'+
															'<select class="form-control" name="contact[delivery_branch_id]" id="branch_id" onchange="getBranch()">'+
																'<option value="">Select Branch</option>'+
																<?php foreach($branchlist as $item){?>
																'<option value="<?php echo $item['id']?>"><?php echo $item['branch_name']?></option>'+
																<?php }?>
															'</select>'+
														'</div>'+
														'<div class="messageContainer text-danger"></div>'+
													'</div>';
												
		document.getElementById('address_div').innerHTML = hospitalDiv;
      }
      
      function getBranch()
      {
    		$.post(base_url+"client/get_branch_by_id/"+$('#branch_id').val(),{}, function(data)
    				{
    					
    					$(data).each(function(index){
    						
    						//$('#haddress').val(data[index].address);
    						$('#hstreet').val(data[index].address);
    						$('#hcity').val(data[index].city);
    						$('#hstate').val(data[index].state);
    						$('#hpincode').val(data[index].zipcode);
    						
    					});
    			},'json'); 
      }
      
      function getHospital()
      {
    		$.post(base_url+"client/gethospitaladdress/"+$('#hospital_id').val(),{}, function(data)
    				{
    					
    					$(data).each(function(index){
    						
    						//$('#haddress').val(data[index].address);
    						$('#hstreet').val(data[index].address);
    						$('#hlatitude').val(data[index].latitude);
    						$('#hlongitude').val(data[index].longitude);
    						$('#hcity').val(data[index].city);
    						$('#hstate').val(data[index].state);
    						$('#hpincode').val(data[index].pincode);
    						
    					});
    			},'json'); 
      }
      function getPickupBranch()
      {
    		$.post(base_url+"client/get_branch_by_id/"+$('#pickup_branch_id').val(),{}, function(data)
    				{
    					
    					$(data).each(function(index){
    						
    						//$('#lookupname').val(data[index].address);
    						//$('#building').val(data[index].street);
    						$('#locality').val(data[index].address);
    						$('#latitude').val(data[index].latitude);
    						$('#longitude').val(data[index].longitude);
    						$('#city').val(data[index].city);
    						$('#state').val(data[index].state);
    						$('#postalcode').val(data[index].zipcode);
    						
    					});
    			},'json'); 
      }
      
      function getPickupHospital()
      {
    		$.post(base_url+"client/gethospitaladdress/"+$('#pickup_hospital_id').val(),{}, function(data)
    				{
    					
    					$(data).each(function(index){
    						
    						//$('#lookupname').val(data[index].address);
    						//$('#building').val(data[index].locality);
    						$('#locality').val(data[index].address);
    						$('#latitude').val(data[index].latitude);
    						$('#longitude').val(data[index].longitude);
    						$('#city').val(data[index].city);
    						$('#state').val(data[index].state);
    						$('#postalcode').val(data[index].pincode);
    						
    					});
    			},'json'); 
      }
      
      <?php if($_SESSION['admin']['hospital_id'] != "" OR $_SESSION['admin']['hospital_id']!= NULL) { ?>
      $(document).ready(function(){
		
    	  var html ="";
    	 var value = <?php echo $_SESSION['admin']['hospital_id']?>;
    	
    		$.post(base_url+"client/gethospitaladdress/"+value,{}, function(data)
    				{
    					
    					$(data).each(function(index){
    						
    						//$('#lookupname').val(data[index].address);
    						//$('#building').val(data[index].locality);
    						$('#locality').val(data[index].address);
    						$('#latitude').val(data[index].latitude);
    						$('#longitude').val(data[index].longitude);
    						$('#city').val(data[index].city);
    						$('#state').val(data[index].state);
    						$('#postalcode').val(data[index].pincode);
    						
    					});
    					//alert(data.value);
    			},'json');
          });
      <?php }?>
    </script>    