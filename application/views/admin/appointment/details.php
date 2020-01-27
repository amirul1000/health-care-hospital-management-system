<a  href="<?php echo site_url('admin/appointment/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Appointment'); ?></h5>
<!--Data display of appointment with id--> 
<?php
	$c = $appointment;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Branch</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Branch_model');
									   $dataArr = $this->CI->Branch_model->get_branch($c['branch_id']);
									   echo $dataArr['name'];?>
									</td></tr>

<tr><td>Patient</td><td><?php echo $c['patient']; ?></td></tr>

<tr><td>Doctor</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Doctor_model');
									   $dataArr = $this->CI->Doctor_model->get_doctor($c['doctor_id']);
									   echo $dataArr['img_url'];?>
									</td></tr>

<tr><td>Date App</td><td><?php echo $c['date_app']; ?></td></tr>

<tr><td>Time Slot</td><td><?php echo $c['time_slot']; ?></td></tr>

<tr><td>S Time</td><td><?php echo $c['s_time']; ?></td></tr>

<tr><td>E Time</td><td><?php echo $c['e_time']; ?></td></tr>

<tr><td>Remarks</td><td><?php echo $c['remarks']; ?></td></tr>

<tr><td>Add Date</td><td><?php echo $c['add_date']; ?></td></tr>

<tr><td>S Time Key</td><td><?php echo $c['s_time_key']; ?></td></tr>


</table>
<!--End of Data display of appointment with id//--> 