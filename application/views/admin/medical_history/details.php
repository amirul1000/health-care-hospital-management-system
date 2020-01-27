<a  href="<?php echo site_url('admin/medical_history/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Medical_history'); ?></h5>
<!--Data display of medical_history with id--> 
<?php
	$c = $medical_history;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Patient</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Patient_model');
									   $dataArr = $this->CI->Patient_model->get_patient($c['patient_id']);
									   echo $dataArr['img_url'];?>
									</td></tr>

<tr><td>Description</td><td><?php echo $c['description']; ?></td></tr>

<tr><td>Img Url</td><td><?php
											if(is_file(APPPATH.'../public/'.$c['img_url'])&&file_exists(APPPATH.'../public/'.$c['img_url']))
											{
										 ?>
										  <img src="<?php echo base_url().'public/'.$c['img_url']?>" class="picture_50x50">
										  <?php
											}
											else
											{
										?>
										<img src="<?php echo base_url()?>public/uploads/no_image.jpg" class="picture_50x50">
										<?php		
											}
										  ?>	
										</td></tr>

<tr><td>Date</td><td><?php echo $c['date']; ?></td></tr>


</table>
<!--End of Data display of medical_history with id//--> 