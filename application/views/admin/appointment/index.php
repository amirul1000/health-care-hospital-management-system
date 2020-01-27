<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Appointment'); ?></h5>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/appointment/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/appointment/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/appointment/search/',array("class"=>"form-horizontal")); ?>
                    <input name="key" type="text"
				value="<?php echo isset($key)?$key:'';?>" placeholder="Search..."
				class="form-control">
				<button type="submit" class="mr-0">
					<i class="fa fa-search"></i>
				</button>
                <?php echo form_close(); ?>
            </li>
		</ul>
	</div>
</div>
<!--End of Action//--> 
   
<!--Data display of appointment-->       
<table class="table table-striped table-bordered">
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

		<th>Actions</th>
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

		<td>
            <a href="<?php echo site_url('admin/appointment/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/appointment/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/appointment/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of appointment//--> 

<!--No data-->
<?php
	if(count($appointment)==0){
?>
 <div align="center"><h3>Data is not exists</h3></div>
<?php
	}
?>
<!--End of No data//-->

<!--Pagination-->
<?php
	echo $link;
?>
<!--End of Pagination//-->
