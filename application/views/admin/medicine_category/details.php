<a  href="<?php echo site_url('admin/medicine_category/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Medicine_category'); ?></h5>
<!--Data display of medicine_category with id--> 
<?php
	$c = $medicine_category;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Category</td><td><?php echo $c['category']; ?></td></tr>

<tr><td>Description</td><td><?php echo $c['description']; ?></td></tr>


</table>
<!--End of Data display of medicine_category with id//--> 