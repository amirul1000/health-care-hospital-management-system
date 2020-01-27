<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Users'); ?></h5>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/users/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/users/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/users/search/',array("class"=>"form-horizontal")); ?>
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
   
<!--Data display of users-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>Ip Address</th>
<th>Username</th>
<th>Password</th>
<th>Salt</th>
<th>Email</th>
<th>Activation Code</th>
<th>Forgotten Password Code</th>
<th>Forgotten Password Time</th>
<th>Remember Code</th>
<th>Created On</th>
<th>Last Login</th>
<th>Active</th>
<th>First Name</th>
<th>Last Name</th>
<th>Company</th>
<th>Phone</th>

		<th>Actions</th>
    </tr>
	<?php foreach($users as $c){ ?>
    <tr>
		<td><?php echo $c['ip_address']; ?></td>
<td><?php echo $c['username']; ?></td>
<td><?php echo $c['password']; ?></td>
<td><?php echo $c['salt']; ?></td>
<td><?php echo $c['email']; ?></td>
<td><?php echo $c['activation_code']; ?></td>
<td><?php echo $c['forgotten_password_code']; ?></td>
<td><?php echo $c['forgotten_password_time']; ?></td>
<td><?php echo $c['remember_code']; ?></td>
<td><?php echo $c['created_on']; ?></td>
<td><?php echo $c['last_login']; ?></td>
<td><?php echo $c['active']; ?></td>
<td><?php echo $c['first_name']; ?></td>
<td><?php echo $c['last_name']; ?></td>
<td><?php echo $c['company']; ?></td>
<td><?php echo $c['phone']; ?></td>

		<td>
            <a href="<?php echo site_url('admin/users/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/users/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/users/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of users//--> 

<!--No data-->
<?php
	if(count($users)==0){
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
