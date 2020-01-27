<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Settings'); ?></h3>
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
<!--Data display of settings-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
    <tr>
		<th>System Vendor</th>
<th>Title</th>
<th>Address</th>
<th>Phone</th>
<th>Email</th>
<th>Currency</th>
<th>Discount</th>
<th>Vat</th>
<th>Codec Username</th>
<th>Codec Purchase Code</th>

    </tr>
	<?php foreach($settings as $c){ ?>
    <tr>
		<td><?php echo $c['system_vendor']; ?></td>
<td><?php echo $c['title']; ?></td>
<td><?php echo $c['address']; ?></td>
<td><?php echo $c['phone']; ?></td>
<td><?php echo $c['email']; ?></td>
<td><?php echo $c['currency']; ?></td>
<td><?php echo $c['discount']; ?></td>
<td><?php echo $c['vat']; ?></td>
<td><?php echo $c['codec_username']; ?></td>
<td><?php echo $c['codec_purchase_code']; ?></td>

    </tr>
	<?php } ?>
</table>
<!--End of Data display of settings//--> 