<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Nurse'); ?></h5>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/nurse/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/nurse/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/nurse/search/',array("class"=>"form-horizontal")); ?>
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
   
<!--Data display of nurse-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>Branch</th>
<th>Img Url</th>
<th>Name</th>
<th>Email</th>
<th>Address</th>
<th>Phone</th>
<th>X</th>
<th>Y</th>
<th>Z</th>

		<th>Actions</th>
    </tr>
	<?php foreach($nurse as $c){ ?>
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
<td><?php echo $c['address']; ?></td>
<td><?php echo $c['phone']; ?></td>
<td><?php echo $c['x']; ?></td>
<td><?php echo $c['y']; ?></td>
<td><?php echo $c['z']; ?></td>

		<td>
            <a href="<?php echo site_url('admin/nurse/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/nurse/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/nurse/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of nurse//--> 

<!--No data-->
<?php
	if(count($nurse)==0){
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
