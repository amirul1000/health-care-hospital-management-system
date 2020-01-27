<?php

 /**
 * Author: Amirul Momenin
 * Desc:Medical_history Controller
 *
 */
class Medical_history extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Medical_history_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of medical_history table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['medical_history'] = $this->Medical_history_model->get_limit_medical_history($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/medical_history/index');
		$config['total_rows'] = $this->Medical_history_model->get_count_medical_history();
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
		
        $data['_view'] = 'admin/medical_history/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save medical_history
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		$img_url = "";
 
		
		
		$params = array(
					 'patient_id' => html_escape($this->input->post('patient_id')),
'description' => html_escape($this->input->post('description')),
'img_url' => $img_url,
'date' => html_escape($this->input->post('date')),

				);
		
						$config['upload_path']          = "./public/uploads/images/medical_history";
						$config['allowed_types']        = "gif|jpg|png";
						$config['max_size']             = 100;
						$config['max_width']            = 1024;
						$config['max_height']           = 768;
						$this->load->library('upload', $config);
						
						if(isset($_POST) && count($_POST) > 0)     
							{  
							  if(strlen($_FILES['img_url']['name'])>0 && $_FILES['img_url']['size']>0)
								{
									if ( ! $this->upload->do_upload('img_url'))
									{
										$error = array('error' => $this->upload->display_errors());
									}
									else
									{
										$img_url = "uploads/images/medical_history/".$_FILES['img_url']['name'];
									    $params['img_url'] = $img_url;
									}
								}
								else
								{
									unset($params['img_url']);
								}
							}
							
						    
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['medical_history'] = $this->Medical_history_model->get_medical_history($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Medical_history_model->update_medical_history($id,$params);
                redirect('admin/medical_history/index');
            }else{
                $data['_view'] = 'admin/medical_history/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $medical_history_id = $this->Medical_history_model->add_medical_history($params);
                redirect('admin/medical_history/index');
            }else{  
			    $data['medical_history'] = $this->Medical_history_model->get_medical_history(0);
                $data['_view'] = 'admin/medical_history/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details medical_history
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['medical_history'] = $this->Medical_history_model->get_medical_history($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/medical_history/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting medical_history
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $medical_history = $this->Medical_history_model->get_medical_history($id);

        // check if the medical_history exists before trying to delete it
        if(isset($medical_history['id'])){
            $this->Medical_history_model->delete_medical_history($id);
            redirect('admin/medical_history/index');
        }
        else
            show_error('The medical_history you are trying to delete does not exist.');
    }
	
	/**
     * Search medical_history
	 * @param $start - Starting of medical_history table's index to get query
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
$this->db->or_like('patient_id', $key, 'both');
$this->db->or_like('description', $key, 'both');
$this->db->or_like('img_url', $key, 'both');
$this->db->or_like('date', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['medical_history'] = $this->db->get('medical_history')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/medical_history/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('patient_id', $key, 'both');
$this->db->or_like('description', $key, 'both');
$this->db->or_like('img_url', $key, 'both');
$this->db->or_like('date', $key, 'both');

		$config['total_rows'] = $this->db->from("medical_history")->count_all_results();
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
		$data['_view'] = 'admin/medical_history/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export medical_history
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'medical_history_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $medical_historyData = $this->Medical_history_model->get_all_medical_history();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Patient Id","Description","Img Url","Date"); 
		   fputcsv($file, $header);
		   foreach ($medical_historyData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $medical_history = $this->db->get('medical_history')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/medical_history/print_template.php');
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
//End of Medical_history controller