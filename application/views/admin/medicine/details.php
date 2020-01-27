<a  href="<?php echo site_url('admin/medicine/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Medicine'); ?></h5>
<!--Data display of medicine with id--> 
<?php
	$c = $medicine;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Branch</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Branch_model');
									   $dataArr = $this->CI->Branch_model->get_branch($c['branch_id']);
									   echo $dataArr['name'];?>
									</td></tr>

<tr><td>Name</td><td><?php echo $c['name']; ?></td></tr>

<tr><td>Prodcode</td><td><?php echo $c['prodcode']; ?></td></tr>

<tr><td>Category</td><td><?php echo $c['category']; ?></td></tr>

<tr><td>Price</td><td><?php echo $c['price']; ?></td></tr>

<tr><td>Quantity</td><td><?php echo $c['quantity']; ?></td></tr>

<tr><td>Remaining Quantity</td><td><?php echo $c['remaining_quantity']; ?></td></tr>

<tr><td>Generic</td><td><?php echo $c['generic']; ?></td></tr>

<tr><td>Company</td><td><?php echo $c['company']; ?></td></tr>

<tr><td>Effects</td><td><?php echo $c['effects']; ?></td></tr>

<tr><td>E Date</td><td><?php echo $c['e_date']; ?></td></tr>

<tr><td>Add Date</td><td><?php echo $c['add_date']; ?></td></tr>


</table>
<!--End of Data display of medicine with id//--> 