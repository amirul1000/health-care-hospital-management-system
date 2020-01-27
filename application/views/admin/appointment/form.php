<a  href="<?php echo site_url('admin/appointment/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Appointment'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/appointment/save/'.$appointment['id'],array("class"=>"form-horizontal")); ?>
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
            <option value="<?=$dataArr[$i]['id']?>" <?php if($appointment['branch_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['name']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
          <label for="Patient" class="col-md-4 control-label">Patient</label> 
          <div class="col-md-8"> 
           <input type="text" name="patient" value="<?php echo ($this->input->post('patient') ? $this->input->post('patient') : $appointment['patient']); ?>" class="form-control" id="patient" /> 
          </div> 
           </div>
<div class="form-group"> 
                                    <label for="Doctor" class="col-md-4 control-label">Doctor</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Doctor_model'); 
             $dataArr = $this->CI->Doctor_model->get_all_doctor(); 
          ?> 
          <select name="doctor_id"  id="doctor_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($appointment['doctor_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['img_url']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
                                       <label for="Date App" class="col-md-4 control-label">Date App</label> 
            <div class="col-md-8"> 
           <input type="text" name="date_app"  id="date_app"  value="<?php echo ($this->input->post('date_app') ? $this->input->post('date_app') : $appointment['date_app']); ?>" class="form-control-static datepicker"/> 
            </div> 
           </div>
<div class="form-group"> 
          <label for="Time Slot" class="col-md-4 control-label">Time Slot</label> 
          <div class="col-md-8"> 
           <input type="text" name="time_slot" value="<?php echo ($this->input->post('time_slot') ? $this->input->post('time_slot') : $appointment['time_slot']); ?>" class="form-control" id="time_slot" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="S Time" class="col-md-4 control-label">S Time</label> 
          <div class="col-md-8"> 
           <input type="text" name="s_time" value="<?php echo ($this->input->post('s_time') ? $this->input->post('s_time') : $appointment['s_time']); ?>" class="form-control" id="s_time" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="E Time" class="col-md-4 control-label">E Time</label> 
          <div class="col-md-8"> 
           <input type="text" name="e_time" value="<?php echo ($this->input->post('e_time') ? $this->input->post('e_time') : $appointment['e_time']); ?>" class="form-control" id="e_time" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Remarks" class="col-md-4 control-label">Remarks</label> 
          <div class="col-md-8"> 
           <input type="text" name="remarks" value="<?php echo ($this->input->post('remarks') ? $this->input->post('remarks') : $appointment['remarks']); ?>" class="form-control" id="remarks" /> 
          </div> 
           </div>
<div class="form-group"> 
                                       <label for="Add Date" class="col-md-4 control-label">Add Date</label> 
            <div class="col-md-8"> 
           <input type="text" name="add_date"  id="add_date"  value="<?php echo ($this->input->post('add_date') ? $this->input->post('add_date') : $appointment['add_date']); ?>" class="form-control-static datepicker"/> 
            </div> 
           </div>
<div class="form-group"> 
          <label for="S Time Key" class="col-md-4 control-label">S Time Key</label> 
          <div class="col-md-8"> 
           <input type="text" name="s_time_key" value="<?php echo ($this->input->post('s_time_key') ? $this->input->post('s_time_key') : $appointment['s_time_key']); ?>" class="form-control" id="s_time_key" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($appointment['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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