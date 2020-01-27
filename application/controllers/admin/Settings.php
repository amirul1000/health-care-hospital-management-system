<?php

 /**
 * Author: Amirul Momenin
 * Desc:Settings Controller
 *
 */
class Settings extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Settings_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of settings table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['settings'] = $this->Settings_model->get_limit_settings($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/settings/index');
		$config['total_rows'] = $this->Settings_model->get_count_settings();
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
		
        $data['_view'] = 'admin/settings/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save settings
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		
		
		$params = array(
					 'system_vendor' => html_escape($this->input->post('system_vendor')),
'title' => html_escape($this->input->post('title')),
'address' => html_escape($this->input->post('address')),
'phone' => html_escape($this->input->post('phone')),
'email' => html_escape($this->input->post('email')),
'currency' => html_escape($this->input->post('currency')),
'discount' => html_escape($this->input->post('discount')),
'vat' => html_escape($this->input->post('vat')),
'codec_username' => html_escape($this->input->post('codec_username')),
'codec_purchase_code' => html_escape($this->input->post('codec_purchase_code')),

				);
		 
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['settings'] = $this->Settings_model->get_settings($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Settings_model->update_settings($id,$params);
                redirect('admin/settings/index');
            }else{
                $data['_view'] = 'admin/settings/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $settings_id = $this->Settings_model->add_settings($params);
                redirect('admin/settings/index');
            }else{  
			    $data['settings'] = $this->Settings_model->get_settings(0);
                $data['_view'] = 'admin/settings/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details settings
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['settings'] = $this->Settings_model->get_settings($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/settings/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting settings
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $settings = $this->Settings_model->get_settings($id);

        // check if the settings exists before trying to delete it
        if(isset($settings['id'])){
            $this->Settings_model->delete_settings($id);
            redirect('admin/settings/index');
        }
        else
            show_error('The settings you are trying to delete does not exist.');
    }
	
	/**
     * Search settings
	 * @param $start - Starting of settings table's index to get query
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
$this->db->or_like('system_vendor', $key, 'both');
$this->db->or_like('title', $key, 'both');
$this->db->or_like('address', $key, 'both');
$this->db->or_like('phone', $key, 'both');
$this->db->or_like('email', $key, 'both');
$this->db->or_like('currency', $key, 'both');
$this->db->or_like('discount', $key, 'both');
$this->db->or_like('vat', $key, 'both');
$this->db->or_like('codec_username', $key, 'both');
$this->db->or_like('codec_purchase_code', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['settings'] = $this->db->get('settings')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/settings/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('system_vendor', $key, 'both');
$this->db->or_like('title', $key, 'both');
$this->db->or_like('address', $key, 'both');
$this->db->or_like('phone', $key, 'both');
$this->db->or_like('email', $key, 'both');
$this->db->or_like('currency', $key, 'both');
$this->db->or_like('discount', $key, 'both');
$this->db->or_like('vat', $key, 'both');
$this->db->or_like('codec_username', $key, 'both');
$this->db->or_like('codec_purchase_code', $key, 'both');

		$config['total_rows'] = $this->db->from("settings")->count_all_results();
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
		$data['_view'] = 'admin/settings/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export settings
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'settings_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $settingsData = $this->Settings_model->get_all_settings();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","System Vendor","Title","Address","Phone","Email","Currency","Discount","Vat","Codec Username","Codec Purchase Code"); 
		   fputcsv($file, $header);
		   foreach ($settingsData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $settings = $this->db->get('settings')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/settings/print_template.php');
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
//End of Settings controller