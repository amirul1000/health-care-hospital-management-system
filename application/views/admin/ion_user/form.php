<a  href="<?php echo site_url('admin/ion_user/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Ion_user'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/ion_user/save/'.$ion_user['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
          <label for="Cccc" class="col-md-4 control-label">Cccc</label> 
          <div class="col-md-8"> 
           <input type="text" name="cccc" value="<?php echo ($this->input->post('cccc') ? $this->input->post('cccc') : $ion_user['cccc']); ?>" class="form-control" id="cccc" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Ccccccc" class="col-md-4 control-label">Ccccccc</label> 
          <div class="col-md-8"> 
           <input type="text" name="ccccccc" value="<?php echo ($this->input->post('ccccccc') ? $this->input->post('ccccccc') : $ion_user['ccccccc']); ?>" class="form-control" id="ccccccc" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Cc" class="col-md-4 control-label">Cc</label> 
          <div class="col-md-8"> 
           <input type="text" name="cc" value="<?php echo ($this->input->post('cc') ? $this->input->post('cc') : $ion_user['cc']); ?>" class="form-control" id="cc" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($ion_user['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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