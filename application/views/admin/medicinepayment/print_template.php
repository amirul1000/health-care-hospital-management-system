<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Medicinepayment'); ?></h3>
Date: <?php echo date("Y-m-d");?>
<hr>
<!--*************************************************
*********mpdf header footer page no******************
****************************************************-->
<htmlpageheader name="firstpage" class="hide">
</htmlpageheader>

<htmlpageheader name="otherpages" class="hide">
    <span class="float_left"></span>
    <span  class="padding_5"> &nbsp; &nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp;</span>
    <span class="float_right"></span>         
</htmlpageheader>      
<sethtmlpageheader name="firstpage" value="on" show-this-page="1" />
<sethtmlpageheader name="otherpages" value="on" /> 
   
<htmlpagefooter name="myfooter"  class="hide">                          
     <div align="center">
               <br><span class="padding_10">Page {PAGENO} of {nbpg}</span> 
     </div>
</htmlpagefooter>    

<sethtmlpagefooter name="myfooter" value="on" />
<!--*************************************************
*********#////mpdf header footer page no******************
****************************************************-->
<!--Data display of medicinepayment-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
    <tr>
		<th>Branch</th>
<th>Category</th>
<th>Medicine</th>
<th>Customer</th>
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

    </tr>
	<?php foreach($medicinepayment as $c){ ?>
    <tr>
		<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Branch_model');
									   $dataArr = $this->CI->Branch_model->get_branch($c['branch_id']);
									   echo $dataArr['name'];?>
									</td>
<td><?php echo $c['category']; ?></td>
<td><?php echo $c['medicine']; ?></td>
<td><?php echo $c['customer']; ?></td>
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

    </tr>
	<?php } ?>
</table>
<!--End of Data display of medicinepayment//--> 