<!--Left Menu-->
<nav>
    <ul class="sidebar-menu" data-widget="tree">
        <li class="sidemenu-user-profile d-flex align-items-center">
            <div class="user-thumbnail">
                <?php
				  if(is_file(APPPATH.'../public/'.$this->session->userdata['file_picture'])&&file_exists(APPPATH.'../public/'.$this->session->userdata['file_picture']))
				   {
				 ?>
					  <img  src="<?php echo base_url().'public/'.$this->session->userdata['file_picture']?>" alt="">
				<?php
					}
					else
					{
				?>
					  <img class="border-radius-50" src="<?php echo base_url()?>public/uploads/no_image.jpg">
				<?php		
					}
				  ?>
            </div>
            <div class="user-content">
                <h6><?php echo $this->session->userdata['first_name']?> <?php echo $this->session->userdata['last_name']?></h6>
                <!--<span>Pro User</span>-->
            </div>
        </li>
        <li <?php if($this->router->fetch_class()=="homecontroller"){?>
					class="active" <?php }?>><a href="<?php echo site_url('homecontroller'); ?>"><i class="icon_lifesaver"></i> <span>Dashboard</span></a></li>
        <?php
		     $menu_open =  false; 
		     if(
			    $this->router->fetch_class()=="country" ||
				$this->router->fetch_class()=="company" ||
				$this->router->fetch_class()=="users" 
			 )
			 {
				$menu_open =  true; 
			 }
		?>
        <li class="treeview <?php if($menu_open==true){?>menu-open<?php }?>">
            <a href="javascript:void(0)"><i class="icon_document_alt"></i> <span>Settings</span> <i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu" <?php if($menu_open==true){?>style="display: block;"<?php }?>>
                <li <?php if($this->router->fetch_class()=="country"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/country/index'); ?>">- Country</a></li>
                <li <?php if($this->router->fetch_class()=="company"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/company/index'); ?>">- Company</a></li>
                <li <?php if($this->router->fetch_class()=="users"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/users/index'); ?>">- Users</a></li>
            </ul>
        </li> 
        <li <?php if($this->router->fetch_class()=="accountant"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/accountant/index'); ?>"><i class="icon_table"></i>Accountant</a></li>
<li <?php if($this->router->fetch_class()=="appointment"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/appointment/index'); ?>"><i class="icon_table"></i>Appointment</a></li>
<li <?php if($this->router->fetch_class()=="bankb"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/bankb/index'); ?>"><i class="icon_table"></i>Bankb</a></li>
<li <?php if($this->router->fetch_class()=="branch"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/branch/index'); ?>"><i class="icon_table"></i>Branch</a></li>
<li <?php if($this->router->fetch_class()=="department"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/department/index'); ?>"><i class="icon_table"></i>Department</a></li>
<li <?php if($this->router->fetch_class()=="disease"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/disease/index'); ?>"><i class="icon_table"></i>Disease</a></li>
<li <?php if($this->router->fetch_class()=="doctor"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/doctor/index'); ?>"><i class="icon_table"></i>Doctor</a></li>
<li <?php if($this->router->fetch_class()=="expense"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/expense/index'); ?>"><i class="icon_table"></i>Expense</a></li>
<li <?php if($this->router->fetch_class()=="expense_category"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/expense_category/index'); ?>"><i class="icon_table"></i>Expense Category</a></li>
<li <?php if($this->router->fetch_class()=="groups"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/groups/index'); ?>"><i class="icon_table"></i>Groups</a></li>
<li <?php if($this->router->fetch_class()=="laboratorist"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/laboratorist/index'); ?>"><i class="icon_table"></i>Laboratorist</a></li>
<li <?php if($this->router->fetch_class()=="medical_history"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/medical_history/index'); ?>"><i class="icon_table"></i>Medical History</a></li>
<li <?php if($this->router->fetch_class()=="medicine"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/medicine/index'); ?>"><i class="icon_table"></i>Medicine</a></li>
<li <?php if($this->router->fetch_class()=="medicine_category"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/medicine_category/index'); ?>"><i class="icon_table"></i>Medicine Category</a></li>
<li <?php if($this->router->fetch_class()=="medicinepayment"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/medicinepayment/index'); ?>"><i class="icon_table"></i>Medicinepayment</a></li>
<li <?php if($this->router->fetch_class()=="nurse"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/nurse/index'); ?>"><i class="icon_table"></i>Nurse</a></li>
<li <?php if($this->router->fetch_class()=="patient"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/patient/index'); ?>"><i class="icon_table"></i>Patient</a></li>
<li <?php if($this->router->fetch_class()=="payment"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/payment/index'); ?>"><i class="icon_table"></i>Payment</a></li>
<li <?php if($this->router->fetch_class()=="payment_category"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/payment_category/index'); ?>"><i class="icon_table"></i>Payment Category</a></li>
<li <?php if($this->router->fetch_class()=="pharmacist"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/pharmacist/index'); ?>"><i class="icon_table"></i>Pharmacist</a></li>
<li <?php if($this->router->fetch_class()=="settings"){?>class="active"<?php }?>><a href="<?php echo site_url('admin/settings/index'); ?>"><i class="icon_table"></i>Settings</a></li>

    </ul>
</nav>
<!--End of Left Menu//-->