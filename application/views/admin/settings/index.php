<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Settings'); ?></h5>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/settings/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/settings/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/settings/search/',array("class"=>"form-horizontal")); ?>
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
   
<!--Data display of settings-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>System Vendor</th>
<th>Title</th>
<th>Address</th>
<th>Phone</th>
<th>Email</th>
<th>Currency</th>
<th>Discount</th>
<th>Vat</th>
<th>Codec Username</th>
<th>Codec Purchase Code</th>

		<th>Actions</th>
    </tr>
	<?php foreach($settings as $c){ ?>
    <tr>
		<td><?php echo $c['system_vendor']; ?></td>
<td><?php echo $c['title']; ?></td>
<td><?php echo $c['address']; ?></td>
<td><?php echo $c['phone']; ?></td>
<td><?php echo $c['email']; ?></td>
<td><?php echo $c['currency']; ?></td>
<td><?php echo $c['discount']; ?></td>
<td><?php echo $c['vat']; ?></td>
<td><?php echo $c['codec_username']; ?></td>
<td><?php echo $c['codec_purchase_code']; ?></td>

		<td>
            <a href="<?php echo site_url('admin/settings/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/settings/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/settings/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of settings//--> 

<!--No data-->
<?php
	if(count($settings)==0){
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
