<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Patient'); ?></h3>
Date: <?php echo date("Y-m-d");?>
<hr>
<!--*************************************************
*********mpdf header footer page no******************
****************************************************-->
<htmlpageheader name="firstpage" class="hide">
</htmlpageheader>

<htmlpageheader name="otherpages" class="hide">
    <span class="float_left"></span>
    <span  class="padding_5"> &nbsp; &nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp;</span>
    <span class="float_right"></span>         
</htmlpageheader>      
<sethtmlpageheader name="firstpage" value="on" show-this-page="1" />
<sethtmlpageheader name="otherpages" value="on" /> 
   
<htmlpagefooter name="myfooter"  class="hide">                          
     <div align="center">
               <br><span class="padding_10">Page {PAGENO} of {nbpg}</span> 
     </div>
</htmlpagefooter>    

<sethtmlpagefooter name="myfooter" value="on" />
<!--*************************************************
*********#////mpdf header footer page no******************
****************************************************-->
<!--Data display of patient-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
    <tr>
		<th>Branch</th>
<th>Img Url</th>
<th>Name</th>
<th>Email</th>
<th>Doctor</th>
<th>Address</th>
<th>Phone</th>
<th>Sex</th>
<th>Birthdate</th>
<th>Age</th>
<th>Bloodgroup</th>
<th>Disease</th>
<th>Patient</th>
<th>Add Date</th>

    </tr>
	<?php foreach($patient as $c){ ?>
    <tr>
		<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Branch_model');
									   $dataArr = $this->CI->Branch_model->get_branch($c['branch_id']);
									   echo $dataArr['name'];?>
									</td>
<td><?php
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
										</td>
<td><?php echo $c['name']; ?></td>
<td><?php echo $c['email']; ?></td>
<td><?php echo $c['doctor']; ?></td>
<td><?php echo $c['address']; ?></td>
<td><?php echo $c['phone']; ?></td>
<td><?php echo $c['sex']; ?></td>
<td><?php echo $c['birthdate']; ?></td>
<td><?php echo $c['age']; ?></td>
<td><?php echo $c['bloodgroup']; ?></td>
<td><?php echo $c['disease']; ?></td>
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Patient_model');
									   $dataArr = $this->CI->Patient_model->get_patient($c['patient_id']);
									   echo $dataArr['img_url'];?>
									</td>
<td><?php echo $c['add_date']; ?></td>

    </tr>
	<?php } ?>
</table>
<!--End of Data display of patient//--> 