<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Payment'); ?></h5>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/payment/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/payment/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/payment/search/',array("class"=>"form-horizontal")); ?>
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
   
<!--Data display of payment-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>Branch</th>
<th>Category</th>
<th>Patient</th>
<th>Doctor</th>
<th>Date</th>
<th>Amount</th>
<th>Vat</th>
<th>X Ray</th>
<th>Flat Vat</th>
<th>Discount</th>
<th>Flat Discount</th>
<th>Gross Total</th>
<th>Hospital Amount</th>
<th>Doctor Amount</th>
<th>Category Amount</th>
<th>Category Name</th>
<th>Amount Received</th>
<th>Status</th>

		<th>Actions</th>
    </tr>
	<?php foreach($payment as $c){ ?>
    <tr>
		<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Branch_model');
									   $dataArr = $this->CI->Branch_model->get_branch($c['branch_id']);
									   echo $dataArr['name'];?>
									</td>
<td><?php echo $c['category']; ?></td>
<td><?php echo $c['patient']; ?></td>
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Doctor_model');
									   $dataArr = $this->CI->Doctor_model->get_doctor($c['doctor_id']);
									   echo $dataArr['img_url'];?>
									</td>
<td><?php echo $c['date']; ?></td>
<td><?php echo $c['amount']; ?></td>
<td><?php echo $c['vat']; ?></td>
<td><?php echo $c['x_ray']; ?></td>
<td><?php echo $c['flat_vat']; ?></td>
<td><?php echo $c['discount']; ?></td>
<td><?php echo $c['flat_discount']; ?></td>
<td><?php echo $c['gross_total']; ?></td>
<td><?php echo $c['hospital_amount']; ?></td>
<td><?php echo $c['doctor_amount']; ?></td>
<td><?php echo $c['category_amount']; ?></td>
<td><?php echo $c['category_name']; ?></td>
<td><?php echo $c['amount_received']; ?></td>
<td><?php echo $c['status']; ?></td>

		<td>
            <a href="<?php echo site_url('admin/payment/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/payment/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/payment/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of payment//--> 

<!--No data-->
<?php
	if(count($payment)==0){
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
