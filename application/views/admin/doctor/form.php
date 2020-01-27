<a  href="<?php echo site_url('admin/doctor/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Doctor'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/doctor/save/'.$doctor['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
                                    <label for="Branch" class="col-md-4 control-label">Branch</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Branch_model'); 
             $dataArr = $this->CI->Branch_model->get_all_branch(); 
          ?> 
          <select name="branch_id"  id="branch_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($doctor['branch_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['name']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
                                        <label for="Img Url" class="col-md-4 control-label">Img Url</label> 
          <div class="col-md-8"> 
           <input type="file" name="img_url"  id="img_url" value="<?php echo ($this->input->post('img_url') ? $this->input->post('img_url') : $doctor['img_url']); ?>" class="form-control-file"/> 
          </div> 
            </div>
<div class="form-group"> 
          <label for="Name" class="col-md-4 control-label">Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $doctor['name']); ?>" class="form-control" id="name" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Email" class="col-md-4 control-label">Email</label> 
          <div class="col-md-8"> 
           <input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $doctor['email']); ?>" class="form-control" id="email" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Address" class="col-md-4 control-label">Address</label> 
          <div class="col-md-8"> 
           <input type="text" name="address" value="<?php echo ($this->input->post('address') ? $this->input->post('address') : $doctor['address']); ?>" class="form-control" id="address" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Phone" class="col-md-4 control-label">Phone</label> 
          <div class="col-md-8"> 
           <input type="text" name="phone" value="<?php echo ($this->input->post('phone') ? $this->input->post('phone') : $doctor['phone']); ?>" class="form-control" id="phone" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Department" class="col-md-4 control-label">Department</label> 
          <div class="col-md-8"> 
           <input type="text" name="department" value="<?php echo ($this->input->post('department') ? $this->input->post('department') : $doctor['department']); ?>" class="form-control" id="department" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Profile" class="col-md-4 control-label">Profile</label> 
          <div class="col-md-8"> 
           <input type="text" name="profile" value="<?php echo ($this->input->post('profile') ? $this->input->post('profile') : $doctor['profile']); ?>" class="form-control" id="profile" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="X" class="col-md-4 control-label">X</label> 
          <div class="col-md-8"> 
           <input type="text" name="x" value="<?php echo ($this->input->post('x') ? $this->input->post('x') : $doctor['x']); ?>" class="form-control" id="x" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Y" class="col-md-4 control-label">Y</label> 
          <div class="col-md-8"> 
           <input type="text" name="y" value="<?php echo ($this->input->post('y') ? $this->input->post('y') : $doctor['y']); ?>" class="form-control" id="y" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($doctor['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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