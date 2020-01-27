<a  href="<?php echo site_url('admin/payment_category/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Payment_category'); ?></h5>
<!--Data display of payment_category with id--> 
<?php
	$c = $payment_category;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Category</td><td><?php echo $c['category']; ?></td></tr>

<tr><td>Description</td><td><?php echo $c['description']; ?></td></tr>

<tr><td>C Price</td><td><?php echo $c['c_price']; ?></td></tr>

<tr><td>D Commission</td><td><?php echo $c['d_commission']; ?></td></tr>

<tr><td>H Commission</td><td><?php echo $c['h_commission']; ?></td></tr>


</table>
<!--End of Data display of payment_category with id//--> 