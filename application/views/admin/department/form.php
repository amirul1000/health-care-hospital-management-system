<a  href="<?php echo site_url('admin/department/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Department'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/department/save/'.$department['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
          <label for="Name" class="col-md-4 control-label">Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $department['name']); ?>" class="form-control" id="name" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Description" class="col-md-4 control-label">Description</label> 
          <div class="col-md-8"> 
           <input type="text" name="description" value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $department['description']); ?>" class="form-control" id="description" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="X" class="col-md-4 control-label">X</label> 
          <div class="col-md-8"> 
           <input type="text" name="x" value="<?php echo ($this->input->post('x') ? $this->input->post('x') : $department['x']); ?>" class="form-control" id="x" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Y" class="col-md-4 control-label">Y</label> 
          <div class="col-md-8"> 
           <input type="text" name="y" value="<?php echo ($this->input->post('y') ? $this->input->post('y') : $department['y']); ?>" class="form-control" id="y" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($department['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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