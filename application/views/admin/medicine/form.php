<a  href="<?php echo site_url('admin/medicine/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Medicine'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/medicine/save/'.$medicine['id'],array("class"=>"form-horizontal")); ?>
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
            <option value="<?=$dataArr[$i]['id']?>" <?php if($medicine['branch_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['name']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
          <label for="Name" class="col-md-4 control-label">Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $medicine['name']); ?>" class="form-control" id="name" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Prodcode" class="col-md-4 control-label">Prodcode</label> 
          <div class="col-md-8"> 
           <input type="text" name="prodcode" value="<?php echo ($this->input->post('prodcode') ? $this->input->post('prodcode') : $medicine['prodcode']); ?>" class="form-control" id="prodcode" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Category" class="col-md-4 control-label">Category</label> 
          <div class="col-md-8"> 
           <input type="text" name="category" value="<?php echo ($this->input->post('category') ? $this->input->post('category') : $medicine['category']); ?>" class="form-control" id="category" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Price" class="col-md-4 control-label">Price</label> 
          <div class="col-md-8"> 
           <input type="text" name="price" value="<?php echo ($this->input->post('price') ? $this->input->post('price') : $medicine['price']); ?>" class="form-control" id="price" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Quantity" class="col-md-4 control-label">Quantity</label> 
          <div class="col-md-8"> 
           <input type="text" name="quantity" value="<?php echo ($this->input->post('quantity') ? $this->input->post('quantity') : $medicine['quantity']); ?>" class="form-control" id="quantity" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Remaining Quantity" class="col-md-4 control-label">Remaining Quantity</label> 
          <div class="col-md-8"> 
           <input type="text" name="remaining_quantity" value="<?php echo ($this->input->post('remaining_quantity') ? $this->input->post('remaining_quantity') : $medicine['remaining_quantity']); ?>" class="form-control" id="remaining_quantity" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Generic" class="col-md-4 control-label">Generic</label> 
          <div class="col-md-8"> 
           <input type="text" name="generic" value="<?php echo ($this->input->post('generic') ? $this->input->post('generic') : $medicine['generic']); ?>" class="form-control" id="generic" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Company" class="col-md-4 control-label">Company</label> 
          <div class="col-md-8"> 
           <input type="text" name="company" value="<?php echo ($this->input->post('company') ? $this->input->post('company') : $medicine['company']); ?>" class="form-control" id="company" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Effects" class="col-md-4 control-label">Effects</label> 
          <div class="col-md-8"> 
           <input type="text" name="effects" value="<?php echo ($this->input->post('effects') ? $this->input->post('effects') : $medicine['effects']); ?>" class="form-control" id="effects" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="E Date" class="col-md-4 control-label">E Date</label> 
          <div class="col-md-8"> 
           <input type="text" name="e_date" value="<?php echo ($this->input->post('e_date') ? $this->input->post('e_date') : $medicine['e_date']); ?>" class="form-control" id="e_date" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Add Date" class="col-md-4 control-label">Add Date</label> 
          <div class="col-md-8"> 
           <input type="text" name="add_date" value="<?php echo ($this->input->post('add_date') ? $this->input->post('add_date') : $medicine['add_date']); ?>" class="form-control" id="add_date" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($medicine['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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