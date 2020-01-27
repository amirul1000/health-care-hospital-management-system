<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Medicine'); ?></h3>
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
<!--Data display of medicine-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
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

    </tr>
	<?php } ?>
</table>
<!--End of Data display of medicine//--> 