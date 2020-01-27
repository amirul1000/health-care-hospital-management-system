<a  href="<?php echo site_url('admin/users/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Users'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/users/save/'.$users['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
          <label for="Ip Address" class="col-md-4 control-label">Ip Address</label> 
          <div class="col-md-8"> 
           <input type="text" name="ip_address" value="<?php echo ($this->input->post('ip_address') ? $this->input->post('ip_address') : $users['ip_address']); ?>" class="form-control" id="ip_address" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Username" class="col-md-4 control-label">Username</label> 
          <div class="col-md-8"> 
           <input type="text" name="username" value="<?php echo ($this->input->post('username') ? $this->input->post('username') : $users['username']); ?>" class="form-control" id="username" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Password" class="col-md-4 control-label">Password</label> 
          <div class="col-md-8"> 
           <input type="text" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $users['password']); ?>" class="form-control" id="password" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Salt" class="col-md-4 control-label">Salt</label> 
          <div class="col-md-8"> 
           <input type="text" name="salt" value="<?php echo ($this->input->post('salt') ? $this->input->post('salt') : $users['salt']); ?>" class="form-control" id="salt" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Email" class="col-md-4 control-label">Email</label> 
          <div class="col-md-8"> 
           <input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $users['email']); ?>" class="form-control" id="email" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Activation Code" class="col-md-4 control-label">Activation Code</label> 
          <div class="col-md-8"> 
           <input type="text" name="activation_code" value="<?php echo ($this->input->post('activation_code') ? $this->input->post('activation_code') : $users['activation_code']); ?>" class="form-control" id="activation_code" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Forgotten Password Code" class="col-md-4 control-label">Forgotten Password Code</label> 
          <div class="col-md-8"> 
           <input type="text" name="forgotten_password_code" value="<?php echo ($this->input->post('forgotten_password_code') ? $this->input->post('forgotten_password_code') : $users['forgotten_password_code']); ?>" class="form-control" id="forgotten_password_code" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Forgotten Password Time" class="col-md-4 control-label">Forgotten Password Time</label> 
          <div class="col-md-8"> 
           <input type="text" name="forgotten_password_time" value="<?php echo ($this->input->post('forgotten_password_time') ? $this->input->post('forgotten_password_time') : $users['forgotten_password_time']); ?>" class="form-control" id="forgotten_password_time" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Remember Code" class="col-md-4 control-label">Remember Code</label> 
          <div class="col-md-8"> 
           <input type="text" name="remember_code" value="<?php echo ($this->input->post('remember_code') ? $this->input->post('remember_code') : $users['remember_code']); ?>" class="form-control" id="remember_code" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Created On" class="col-md-4 control-label">Created On</label> 
          <div class="col-md-8"> 
           <input type="text" name="created_on" value="<?php echo ($this->input->post('created_on') ? $this->input->post('created_on') : $users['created_on']); ?>" class="form-control" id="created_on" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Last Login" class="col-md-4 control-label">Last Login</label> 
          <div class="col-md-8"> 
           <input type="text" name="last_login" value="<?php echo ($this->input->post('last_login') ? $this->input->post('last_login') : $users['last_login']); ?>" class="form-control" id="last_login" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Active" class="col-md-4 control-label">Active</label> 
          <div class="col-md-8"> 
           <input type="text" name="active" value="<?php echo ($this->input->post('active') ? $this->input->post('active') : $users['active']); ?>" class="form-control" id="active" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="First Name" class="col-md-4 control-label">First Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="first_name" value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $users['first_name']); ?>" class="form-control" id="first_name" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Last Name" class="col-md-4 control-label">Last Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="last_name" value="<?php echo ($this->input->post('last_name') ? $this->input->post('last_name') : $users['last_name']); ?>" class="form-control" id="last_name" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Company" class="col-md-4 control-label">Company</label> 
          <div class="col-md-8"> 
           <input type="text" name="company" value="<?php echo ($this->input->post('company') ? $this->input->post('company') : $users['company']); ?>" class="form-control" id="company" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Phone" class="col-md-4 control-label">Phone</label> 
          <div class="col-md-8"> 
           <input type="text" name="phone" value="<?php echo ($this->input->post('phone') ? $this->input->post('phone') : $users['phone']); ?>" class="form-control" id="phone" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($users['id'])){?>Save<?php }else{?>Update<?php } ?></button>
    </div>
</div>
<?php echo form_close(); ?>
<!--End of Form to save data//-->	
<!--JQuery-->
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '<?php echo base_url(); ?>public/datepicker/images/calendar.gif',
	});
</script>  			