<a  href="<?php echo site_url('admin/patient/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Patient'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/patient/save/'.$patient['id'],array("class"=>"form-horizontal")); ?>
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
            <option value="<?=$dataArr[$i]['id']?>" <?php if($patient['branch_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['name']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
                                        <label for="Img Url" class="col-md-4 control-label">Img Url</label> 
          <div class="col-md-8"> 
           <input type="file" name="img_url"  id="img_url" value="<?php echo ($this->input->post('img_url') ? $this->input->post('img_url') : $patient['img_url']); ?>" class="form-control-file"/> 
          </div> 
            </div>
<div class="form-group"> 
          <label for="Name" class="col-md-4 control-label">Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $patient['name']); ?>" class="form-control" id="name" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Email" class="col-md-4 control-label">Email</label> 
          <div class="col-md-8"> 
           <input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $patient['email']); ?>" class="form-control" id="email" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Doctor" class="col-md-4 control-label">Doctor</label> 
          <div class="col-md-8"> 
           <input type="text" name="doctor" value="<?php echo ($this->input->post('doctor') ? $this->input->post('doctor') : $patient['doctor']); ?>" class="form-control" id="doctor" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Address" class="col-md-4 control-label">Address</label> 
          <div class="col-md-8"> 
           <input type="text" name="address" value="<?php echo ($this->input->post('address') ? $this->input->post('address') : $patient['address']); ?>" class="form-control" id="address" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Phone" class="col-md-4 control-label">Phone</label> 
          <div class="col-md-8"> 
           <input type="text" name="phone" value="<?php echo ($this->input->post('phone') ? $this->input->post('phone') : $patient['phone']); ?>" class="form-control" id="phone" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Sex" class="col-md-4 control-label">Sex</label> 
          <div class="col-md-8"> 
           <input type="text" name="sex" value="<?php echo ($this->input->post('sex') ? $this->input->post('sex') : $patient['sex']); ?>" class="form-control" id="sex" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Birthdate" class="col-md-4 control-label">Birthdate</label> 
          <div class="col-md-8"> 
           <input type="text" name="birthdate" value="<?php echo ($this->input->post('birthdate') ? $this->input->post('birthdate') : $patient['birthdate']); ?>" class="form-control" id="birthdate" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Age" class="col-md-4 control-label">Age</label> 
          <div class="col-md-8"> 
           <input type="text" name="age" value="<?php echo ($this->input->post('age') ? $this->input->post('age') : $patient['age']); ?>" class="form-control" id="age" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Bloodgroup" class="col-md-4 control-label">Bloodgroup</label> 
          <div class="col-md-8"> 
           <input type="text" name="bloodgroup" value="<?php echo ($this->input->post('bloodgroup') ? $this->input->post('bloodgroup') : $patient['bloodgroup']); ?>" class="form-control" id="bloodgroup" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Disease" class="col-md-4 control-label">Disease</label> 
          <div class="col-md-8"> 
           <input type="text" name="disease" value="<?php echo ($this->input->post('disease') ? $this->input->post('disease') : $patient['disease']); ?>" class="form-control" id="disease" /> 
          </div> 
           </div>
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
            <option value="<?=$dataArr[$i]['id']?>" <?php if($patient['patient_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['img_url']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
          <label for="Add Date" class="col-md-4 control-label">Add Date</label> 
          <div class="col-md-8"> 
           <input type="text" name="add_date" value="<?php echo ($this->input->post('add_date') ? $this->input->post('add_date') : $patient['add_date']); ?>" class="form-control" id="add_date" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($patient['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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