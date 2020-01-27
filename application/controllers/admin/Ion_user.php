<?php

 /**
 * Author: Amirul Momenin
 * Desc:Ion_user Controller
 *
 */
class Ion_user extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Ion_user_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of ion_user table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['ion_user'] = $this->Ion_user_model->get_limit_ion_user($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/ion_user/index');
		$config['total_rows'] = $this->Ion_user_model->get_count_ion_user();
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
		
        $data['_view'] = 'admin/ion_user/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save ion_user
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		
		
		$params = array(
					 'cccc' => html_escape($this->input->post('cccc')),
'ccccccc' => html_escape($this->input->post('ccccccc')),
'cc' => html_escape($this->input->post('cc')),

				);
		 
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['ion_user'] = $this->Ion_user_model->get_ion_user($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Ion_user_model->update_ion_user($id,$params);
                redirect('admin/ion_user/index');
            }else{
                $data['_view'] = 'admin/ion_user/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $ion_user_id = $this->Ion_user_model->add_ion_user($params);
                redirect('admin/ion_user/index');
            }else{  
			    $data['ion_user'] = $this->Ion_user_model->get_ion_user(0);
                $data['_view'] = 'admin/ion_user/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details ion_user
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['ion_user'] = $this->Ion_user_model->get_ion_user($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/ion_user/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting ion_user
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $ion_user = $this->Ion_user_model->get_ion_user($id);

        // check if the ion_user exists before trying to delete it
        if(isset($ion_user['id'])){
            $this->Ion_user_model->delete_ion_user($id);
            redirect('admin/ion_user/index');
        }
        else
            show_error('The ion_user you are trying to delete does not exist.');
    }
	
	/**
     * Search ion_user
	 * @param $start - Starting of ion_user table's index to get query
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
$this->db->or_like('cccc', $key, 'both');
$this->db->or_like('ccccccc', $key, 'both');
$this->db->or_like('cc', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['ion_user'] = $this->db->get('ion_user')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/ion_user/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('cccc', $key, 'both');
$this->db->or_like('ccccccc', $key, 'both');
$this->db->or_like('cc', $key, 'both');

		$config['total_rows'] = $this->db->from("ion_user")->count_all_results();
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
		$data['_view'] = 'admin/ion_user/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export ion_user
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'ion_user_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $ion_userData = $this->Ion_user_model->get_all_ion_user();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Cccc","Ccccccc","Cc"); 
		   fputcsv($file, $header);
		   foreach ($ion_userData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $ion_user = $this->db->get('ion_user')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/ion_user/print_template.php');
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
//End of Ion_user controller