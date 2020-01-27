<a  href="<?php echo site_url('admin/settings/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Settings'); ?></h5>
<!--Data display of settings with id--> 
<?php
	$c = $settings;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>System Vendor</td><td><?php echo $c['system_vendor']; ?></td></tr>

<tr><td>Title</td><td><?php echo $c['title']; ?></td></tr>

<tr><td>Address</td><td><?php echo $c['address']; ?></td></tr>

<tr><td>Phone</td><td><?php echo $c['phone']; ?></td></tr>

<tr><td>Email</td><td><?php echo $c['email']; ?></td></tr>

<tr><td>Currency</td><td><?php echo $c['currency']; ?></td></tr>

<tr><td>Discount</td><td><?php echo $c['discount']; ?></td></tr>

<tr><td>Vat</td><td><?php echo $c['vat']; ?></td></tr>

<tr><td>Codec Username</td><td><?php echo $c['codec_username']; ?></td></tr>

<tr><td>Codec Purchase Code</td><td><?php echo $c['codec_purchase_code']; ?></td></tr>


</table>
<!--End of Data display of settings with id//--> 