<?php

 /**
 * Author: Amirul Momenin
 * Desc:Users Controller
 *
 */
class Users extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Users_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of users table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['users'] = $this->Users_model->get_limit_users($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/users/index');
		$config['total_rows'] = $this->Users_model->get_count_users();
		$config['per_page'] = 10;
		//Bootstrap 4 Pagination fix
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';
		$config['next_tag_close']   = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']   = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close']  = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']   = '</span></li>';		
		$this->pagination->initialize($config);
        $data['link'] =$this->pagination->create_links();
		
        $data['_view'] = 'admin/users/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save users
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		
		
		$params = array(
					 'ip_address' => html_escape($this->input->post('ip_address')),
'username' => html_escape($this->input->post('username')),
'password' => html_escape($this->input->post('password')),
'salt' => html_escape($this->input->post('salt')),
'email' => html_escape($this->input->post('email')),
'activation_code' => html_escape($this->input->post('activation_code')),
'forgotten_password_code' => html_escape($this->input->post('forgotten_password_code')),
'forgotten_password_time' => html_escape($this->input->post('forgotten_password_time')),
'remember_code' => html_escape($this->input->post('remember_code')),
'created_on' => html_escape($this->input->post('created_on')),
'last_login' => html_escape($this->input->post('last_login')),
'active' => html_escape($this->input->post('active')),
'first_name' => html_escape($this->input->post('first_name')),
'last_name' => html_escape($this->input->post('last_name')),
'company' => html_escape($this->input->post('company')),
'phone' => html_escape($this->input->post('phone')),

				);
		 
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['users'] = $this->Users_model->get_users($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Users_model->update_users($id,$params);
                redirect('admin/users/index');
            }else{
                $data['_view'] = 'admin/users/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $users_id = $this->Users_model->add_users($params);
                redirect('admin/users/index');
            }else{  
			    $data['users'] = $this->Users_model->get_users(0);
                $data['_view'] = 'admin/users/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details users
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['users'] = $this->Users_model->get_users($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/users/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting users
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $users = $this->Users_model->get_users($id);

        // check if the users exists before trying to delete it
        if(isset($users['id'])){
            $this->Users_model->delete_users($id);
            redirect('admin/users/index');
        }
        else
            show_error('The users you are trying to delete does not exist.');
    }
	
	/**
     * Search users
	 * @param $start - Starting of users table's index to get query
     */
	function search($start=0){
		if(!empty($this->input->post('key'))){
			$key =$this->input->post('key');
			$_SESSION['key'] = $key;
		}else{
			$key = $_SESSION['key'];
		}
		
		$limit = 10;		
		$this->db->like('id', $key, 'both');
$this->db->or_like('ip_address', $key, 'both');
$this->db->or_like('username', $key, 'both');
$this->db->or_like('password', $key, 'both');
$this->db->or_like('salt', $key, 'both');
$this->db->or_like('email', $key, 'both');
$this->db->or_like('activation_code', $key, 'both');
$this->db->or_like('forgotten_password_code', $key, 'both');
$this->db->or_like('forgotten_password_time', $key, 'both');
$this->db->or_like('remember_code', $key, 'both');
$this->db->or_like('created_on', $key, 'both');
$this->db->or_like('last_login', $key, 'both');
$this->db->or_like('active', $key, 'both');
$this->db->or_like('first_name', $key, 'both');
$this->db->or_like('last_name', $key, 'both');
$this->db->or_like('company', $key, 'both');
$this->db->or_like('phone', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['users'] = $this->db->get('users')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/users/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('ip_address', $key, 'both');
$this->db->or_like('username', $key, 'both');
$this->db->or_like('password', $key, 'both');
$this->db->or_like('salt', $key, 'both');
$this->db->or_like('email', $key, 'both');
$this->db->or_like('activation_code', $key, 'both');
$this->db->or_like('forgotten_password_code', $key, 'both');
$this->db->or_like('forgotten_password_time', $key, 'both');
$this->db->or_like('remember_code', $key, 'both');
$this->db->or_like('created_on', $key, 'both');
$this->db->or_like('last_login', $key, 'both');
$this->db->or_like('active', $key, 'both');
$this->db->or_like('first_name', $key, 'both');
$this->db->or_like('last_name', $key, 'both');
$this->db->or_like('company', $key, 'both');
$this->db->or_like('phone', $key, 'both');

		$config['total_rows'] = $this->db->from("users")->count_all_results();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		$config['per_page'] = 10;
		// Bootstrap 4 Pagination fix
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';
		$config['next_tag_close']   = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']   = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close']  = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']   = '</span></li>';
		$this->pagination->initialize($config);
        $data['link'] =$this->pagination->create_links();
		
		$data['key'] = $key;
		$data['_view'] = 'admin/users/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export users
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'users_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $usersData = $this->Users_model->get_all_users();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Ip Address","Username","Password","Salt","Email","Activation Code","Forgotten Password Code","Forgotten Password Time","Remember Code","Created On","Last Login","Active","First Name","Last Name","Company","Phone"); 
		   fputcsv($file, $header);
		   foreach ($usersData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $users = $this->db->get('users')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/users/print_template.php');
			$html = ob_get_clean();
			include(APPPATH."third_party/mpdf60/mpdf.php");					
			$mpdf=new mPDF('','A4'); 
			//$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 
			//$mpdf->mirrorMargins = true;
		    $mpdf->SetDisplayMode('fullpage');
			//==============================================================
			$mpdf->autoScriptToLang = true;
			$mpdf->baseScript = 1;	// Use values in classes/ucdn.php  1 = LATIN
			$mpdf->autoVietnamese = true;
			$mpdf->autoArabic = true;
			$mpdf->autoLangToFont = true;
			$mpdf->setAutoBottomMargin = 'stretch';
			$stylesheet = file_get_contents(APPPATH."third_party/mpdf60/lang2fonts.css");
			$mpdf->WriteHTML($stylesheet,1);
			$mpdf->WriteHTML($html);
			//$mpdf->AddPage();
			$mpdf->Output($filePath);
			$mpdf->Output();
			//$mpdf->Output( $filePath,'S');
			exit;	
	  }
	   
	}
}
//End of Users controller