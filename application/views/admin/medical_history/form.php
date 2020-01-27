<a  href="<?php echo site_url('admin/medical_history/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Medical_history'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/medical_history/save/'.$medical_history['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
                                    <label for="Patient" class="col-md-4 control-label">Patient</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Patient_model'); 
             $dataArr = $this->CI->Patient_model->get_all_patient(); 
          ?> 
          <select name="patient_id"  id="patient_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($medical_history['patient_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['img_url']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
          <label for="Description" class="col-md-4 control-label">Description</label> 
          <div class="col-md-8"> 
           <input type="text" name="description" value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $medical_history['description']); ?>" class="form-control" id="description" /> 
          </div> 
           </div>
<div class="form-group"> 
                                        <label for="Img Url" class="col-md-4 control-label">Img Url</label> 
          <div class="col-md-8"> 
           <input type="file" name="img_url"  id="img_url" value="<?php echo ($this->input->post('img_url') ? $this->input->post('img_url') : $medical_history['img_url']); ?>" class="form-control-file"/> 
          </div> 
            </div>
<div class="form-group"> 
          <label for="Date" class="col-md-4 control-label">Date</label> 
          <div class="col-md-8"> 
           <input type="text" name="date" value="<?php echo ($this->input->post('date') ? $this->input->post('date') : $medical_history['date']); ?>" class="form-control" id="date" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($medical_history['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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