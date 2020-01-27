<a  href="<?php echo site_url('admin/payment_category/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Payment_category'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/payment_category/save/'.$payment_category['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
          <label for="Category" class="col-md-4 control-label">Category</label> 
          <div class="col-md-8"> 
           <input type="text" name="category" value="<?php echo ($this->input->post('category') ? $this->input->post('category') : $payment_category['category']); ?>" class="form-control" id="category" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Description" class="col-md-4 control-label">Description</label> 
          <div class="col-md-8"> 
           <input type="text" name="description" value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $payment_category['description']); ?>" class="form-control" id="description" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="C Price" class="col-md-4 control-label">C Price</label> 
          <div class="col-md-8"> 
           <input type="text" name="c_price" value="<?php echo ($this->input->post('c_price') ? $this->input->post('c_price') : $payment_category['c_price']); ?>" class="form-control" id="c_price" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="D Commission" class="col-md-4 control-label">D Commission</label> 
          <div class="col-md-8"> 
           <input type="text" name="d_commission" value="<?php echo ($this->input->post('d_commission') ? $this->input->post('d_commission') : $payment_category['d_commission']); ?>" class="form-control" id="d_commission" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="H Commission" class="col-md-4 control-label">H Commission</label> 
          <div class="col-md-8"> 
           <input type="text" name="h_commission" value="<?php echo ($this->input->post('h_commission') ? $this->input->post('h_commission') : $payment_category['h_commission']); ?>" class="form-control" id="h_commission" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($payment_category['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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