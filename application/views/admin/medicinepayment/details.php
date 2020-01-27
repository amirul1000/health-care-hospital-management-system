<a  href="<?php echo site_url('admin/medicinepayment/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Medicinepayment'); ?></h5>
<!--Data display of medicinepayment with id--> 
<?php
	$c = $medicinepayment;
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

<tr><td>Medicine</td><td><?php echo $c['medicine']; ?></td></tr>

<tr><td>Customer</td><td><?php echo $c['customer']; ?></td></tr>

<tr><td>Date</td><td><?php echo $c['date']; ?></td></tr>

<tr><td>Amount</td><td><?php echo $c['amount']; ?></td></tr>

<tr><td>Vat</td><td><?php echo $c['vat']; ?></td></tr>

<tr><td>X Ray</td><td><?php echo $c['x_ray']; ?></td></tr>

<tr><td>Flat Vat</td><td><?php echo $c['flat_vat']; ?></td></tr>

<tr><td>Discount</td><td><?php echo $c['discount']; ?></td></tr>

<tr><td>Flat Discount</td><td><?php echo $c['flat_discount']; ?></td></tr>

<tr><td>Gross Total</td><td><?php echo $c['gross_total']; ?></td></tr>

<tr><td>Hospital Amount</td><td><?php echo $c['hospital_amount']; ?></td></tr>

<tr><td>Doctor Amount</td><td><?php echo $c['doctor_amount']; ?></td></tr>

<tr><td>Category Amount</td><td><?php echo $c['category_amount']; ?></td></tr>

<tr><td>Category Name</td><td><?php echo $c['category_name']; ?></td></tr>

<tr><td>Amount Received</td><td><?php echo $c['amount_received']; ?></td></tr>

<tr><td>Status</td><td><?php echo $c['status']; ?></td></tr>


</table>
<!--End of Data display of medicinepayment with id//--> 