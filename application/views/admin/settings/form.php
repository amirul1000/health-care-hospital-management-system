<a  href="<?php echo site_url('admin/settings/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Settings'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/settings/save/'.$settings['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
          <label for="System Vendor" class="col-md-4 control-label">System Vendor</label> 
          <div class="col-md-8"> 
           <input type="text" name="system_vendor" value="<?php echo ($this->input->post('system_vendor') ? $this->input->post('system_vendor') : $settings['system_vendor']); ?>" class="form-control" id="system_vendor" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Title" class="col-md-4 control-label">Title</label> 
          <div class="col-md-8"> 
           <input type="text" name="title" value="<?php echo ($this->input->post('title') ? $this->input->post('title') : $settings['title']); ?>" class="form-control" id="title" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Address" class="col-md-4 control-label">Address</label> 
          <div class="col-md-8"> 
           <input type="text" name="address" value="<?php echo ($this->input->post('address') ? $this->input->post('address') : $settings['address']); ?>" class="form-control" id="address" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Phone" class="col-md-4 control-label">Phone</label> 
          <div class="col-md-8"> 
           <input type="text" name="phone" value="<?php echo ($this->input->post('phone') ? $this->input->post('phone') : $settings['phone']); ?>" class="form-control" id="phone" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Email" class="col-md-4 control-label">Email</label> 
          <div class="col-md-8"> 
           <input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $settings['email']); ?>" class="form-control" id="email" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Currency" class="col-md-4 control-label">Currency</label> 
          <div class="col-md-8"> 
           <input type="text" name="currency" value="<?php echo ($this->input->post('currency') ? $this->input->post('currency') : $settings['currency']); ?>" class="form-control" id="currency" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Discount" class="col-md-4 control-label">Discount</label> 
          <div class="col-md-8"> 
           <input type="text" name="discount" value="<?php echo ($this->input->post('discount') ? $this->input->post('discount') : $settings['discount']); ?>" class="form-control" id="discount" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Vat" class="col-md-4 control-label">Vat</label> 
          <div class="col-md-8"> 
           <input type="text" name="vat" value="<?php echo ($this->input->post('vat') ? $this->input->post('vat') : $settings['vat']); ?>" class="form-control" id="vat" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Codec Username" class="col-md-4 control-label">Codec Username</label> 
          <div class="col-md-8"> 
           <input type="text" name="codec_username" value="<?php echo ($this->input->post('codec_username') ? $this->input->post('codec_username') : $settings['codec_username']); ?>" class="form-control" id="codec_username" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Codec Purchase Code" class="col-md-4 control-label">Codec Purchase Code</label> 
          <div class="col-md-8"> 
           <input type="text" name="codec_purchase_code" value="<?php echo ($this->input->post('codec_purchase_code') ? $this->input->post('codec_purchase_code') : $settings['codec_purchase_code']); ?>" class="form-control" id="codec_purchase_code" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($settings['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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