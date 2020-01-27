<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Users'); ?></h3>
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
<!--Data display of users-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
    <tr>
		<th>Ip Address</th>
<th>Username</th>
<th>Password</th>
<th>Salt</th>
<th>Email</th>
<th>Activation Code</th>
<th>Forgotten Password Code</th>
<th>Forgotten Password Time</th>
<th>Remember Code</th>
<th>Created On</th>
<th>Last Login</th>
<th>Active</th>
<th>First Name</th>
<th>Last Name</th>
<th>Company</th>
<th>Phone</th>

    </tr>
	<?php foreach($users as $c){ ?>
    <tr>
		<td><?php echo $c['ip_address']; ?></td>
<td><?php echo $c['username']; ?></td>
<td><?php echo $c['password']; ?></td>
<td><?php echo $c['salt']; ?></td>
<td><?php echo $c['email']; ?></td>
<td><?php echo $c['activation_code']; ?></td>
<td><?php echo $c['forgotten_password_code']; ?></td>
<td><?php echo $c['forgotten_password_time']; ?></td>
<td><?php echo $c['remember_code']; ?></td>
<td><?php echo $c['created_on']; ?></td>
<td><?php echo $c['last_login']; ?></td>
<td><?php echo $c['active']; ?></td>
<td><?php echo $c['first_name']; ?></td>
<td><?php echo $c['last_name']; ?></td>
<td><?php echo $c['company']; ?></td>
<td><?php echo $c['phone']; ?></td>

    </tr>
	<?php } ?>
</table>
<!--End of Data display of users//--> 