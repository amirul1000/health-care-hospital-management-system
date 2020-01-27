<a  href="<?php echo site_url('admin/expense/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Expense'); ?></h5>
<!--Data display of expense with id--> 
<?php
	$c = $expense;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Branch</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Branch_model');
									   $dataArr = $this->CI->Branch_model->get_branch($c['branch_id']);
									   echo $dataArr['name'];?>
									</td></tr>

<tr><td>Category</td><td><?php echo $c['category']; ?></td></tr>

<tr><td>Date</td><td><?php echo $c['date']; ?></td></tr>

<tr><td>Amount</td><td><?php echo $c['amount']; ?></td></tr>

<tr><td>User</td><td><?php echo $c['user']; ?></td></tr>


</table>
<!--End of Data display of expense with id//--> 