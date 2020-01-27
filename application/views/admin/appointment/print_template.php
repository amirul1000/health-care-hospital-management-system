<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Appointment'); ?></h3>
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
<!--Data display of appointment-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
    <tr>
		<th>Branch</th>
<th>Patient</th>
<th>Doctor</th>
<th>Date App</th>
<th>Time Slot</th>
<th>S Time</th>
<th>E Time</th>
<th>Remarks</th>
<th>Add Date</th>
<th>S Time Key</th>

    </tr>
	<?php foreach($appointment as $c){ ?>
    <tr>
		<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Branch_model');
									   $dataArr = $this->CI->Branch_model->get_branch($c['branch_id']);
									   echo $dataArr['name'];?>
									</td>
<td><?php echo $c['patient']; ?></td>
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Doctor_model');
									   $dataArr = $this->CI->Doctor_model->get_doctor($c['doctor_id']);
									   echo $dataArr['img_url'];?>
									</td>
<td><?php echo $c['date_app']; ?></td>
<td><?php echo $c['time_slot']; ?></td>
<td><?php echo $c['s_time']; ?></td>
<td><?php echo $c['e_time']; ?></td>
<td><?php echo $c['remarks']; ?></td>
<td><?php echo $c['add_date']; ?></td>
<td><?php echo $c['s_time_key']; ?></td>

    </tr>
	<?php } ?>
</table>
<!--End of Data display of appointment//--> 