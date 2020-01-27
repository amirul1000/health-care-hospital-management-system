<a  href="<?php echo site_url('admin/laboratorist/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Laboratorist'); ?></h5>
<!--Data display of laboratorist with id--> 
<?php
	$c = $laboratorist;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Branch</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Branch_model');
									   $dataArr = $this->CI->Branch_model->get_branch($c['branch_id']);
									   echo $dataArr['name'];?>
									</td></tr>

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

<tr><td>Name</td><td><?php echo $c['name']; ?></td></tr>

<tr><td>Email</td><td><?php echo $c['email']; ?></td></tr>

<tr><td>Address</td><td><?php echo $c['address']; ?></td></tr>

<tr><td>Phone</td><td><?php echo $c['phone']; ?></td></tr>

<tr><td>X</td><td><?php echo $c['x']; ?></td></tr>

<tr><td>Y</td><td><?php echo $c['y']; ?></td></tr>


</table>
<!--End of Data display of laboratorist with id//--> 