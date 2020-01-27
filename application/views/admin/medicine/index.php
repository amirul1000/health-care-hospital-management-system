<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Medicine'); ?></h5>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/medicine/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/medicine/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/medicine/search/',array("class"=>"form-horizontal")); ?>
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
   
<!--Data display of medicine-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>Branch</th>
<th>Name</th>
<th>Prodcode</th>
<th>Category</th>
<th>Price</th>
<th>Quantity</th>
<th>Remaining Quantity</th>
<th>Generic</th>
<th>Company</th>
<th>Effects</th>
<th>E Date</th>
<th>Add Date</th>

		<th>Actions</th>
    </tr>
	<?php foreach($medicine as $c){ ?>
    <tr>
		<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Branch_model');
									   $dataArr = $this->CI->Branch_model->get_branch($c['branch_id']);
									   echo $dataArr['name'];?>
									</td>
<td><?php echo $c['name']; ?></td>
<td><?php echo $c['prodcode']; ?></td>
<td><?php echo $c['category']; ?></td>
<td><?php echo $c['price']; ?></td>
<td><?php echo $c['quantity']; ?></td>
<td><?php echo $c['remaining_quantity']; ?></td>
<td><?php echo $c['generic']; ?></td>
<td><?php echo $c['company']; ?></td>
<td><?php echo $c['effects']; ?></td>
<td><?php echo $c['e_date']; ?></td>
<td><?php echo $c['add_date']; ?></td>

		<td>
            <a href="<?php echo site_url('admin/medicine/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/medicine/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/medicine/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of medicine//--> 

<!--No data-->
<?php
	if(count($medicine)==0){
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
