<a  href="<?php echo site_url('admin/users/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Users'); ?></h5>
<!--Data display of users with id--> 
<?php
	$c = $users;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Ip Address</td><td><?php echo $c['ip_address']; ?></td></tr>

<tr><td>Username</td><td><?php echo $c['username']; ?></td></tr>

<tr><td>Password</td><td><?php echo $c['password']; ?></td></tr>

<tr><td>Salt</td><td><?php echo $c['salt']; ?></td></tr>

<tr><td>Email</td><td><?php echo $c['email']; ?></td></tr>

<tr><td>Activation Code</td><td><?php echo $c['activation_code']; ?></td></tr>

<tr><td>Forgotten Password Code</td><td><?php echo $c['forgotten_password_code']; ?></td></tr>

<tr><td>Forgotten Password Time</td><td><?php echo $c['forgotten_password_time']; ?></td></tr>

<tr><td>Remember Code</td><td><?php echo $c['remember_code']; ?></td></tr>

<tr><td>Created On</td><td><?php echo $c['created_on']; ?></td></tr>

<tr><td>Last Login</td><td><?php echo $c['last_login']; ?></td></tr>

<tr><td>Active</td><td><?php echo $c['active']; ?></td></tr>

<tr><td>First Name</td><td><?php echo $c['first_name']; ?></td></tr>

<tr><td>Last Name</td><td><?php echo $c['last_name']; ?></td></tr>

<tr><td>Company</td><td><?php echo $c['company']; ?></td></tr>

<tr><td>Phone</td><td><?php echo $c['phone']; ?></td></tr>


</table>
<!--End of Data display of users with id//--> 