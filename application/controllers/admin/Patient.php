<?php

 /**
 * Author: Amirul Momenin
 * Desc:Patient Controller
 *
 */
class Patient extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Patient_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of patient table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['patient'] = $this->Patient_model->get_limit_patient($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/patient/index');
		$config['total_rows'] = $this->Patient_model->get_count_patient();
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
		
        $data['_view'] = 'admin/patient/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save patient
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		$img_url = "";
 
		
		
		$params = array(
					 'branch_id' => html_escape($this->input->post('branch_id')),
'img_url' => $img_url,
'name' => html_escape($this->input->post('name')),
'email' => html_escape($this->input->post('email')),
'doctor' => html_escape($this->input->post('doctor')),
'address' => html_escape($this->input->post('address')),
'phone' => html_escape($this->input->post('phone')),
'sex' => html_escape($this->input->post('sex')),
'birthdate' => html_escape($this->input->post('birthdate')),
'age' => html_escape($this->input->post('age')),
'bloodgroup' => html_escape($this->input->post('bloodgroup')),
'disease' => html_escape($this->input->post('disease')),
'patient_id' => html_escape($this->input->post('patient_id')),
'add_date' => html_escape($this->input->post('add_date')),

				);
		
						$config['upload_path']          = "./public/uploads/images/patient";
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
										$img_url = "uploads/images/patient/".$_FILES['img_url']['name'];
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
			$data['patient'] = $this->Patient_model->get_patient($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Patient_model->update_patient($id,$params);
                redirect('admin/patient/index');
            }else{
                $data['_view'] = 'admin/patient/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $patient_id = $this->Patient_model->add_patient($params);
                redirect('admin/patient/index');
            }else{  
			    $data['patient'] = $this->Patient_model->get_patient(0);
                $data['_view'] = 'admin/patient/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details patient
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['patient'] = $this->Patient_model->get_patient($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/patient/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting patient
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $patient = $this->Patient_model->get_patient($id);

        // check if the patient exists before trying to delete it
        if(isset($patient['id'])){
            $this->Patient_model->delete_patient($id);
            redirect('admin/patient/index');
        }
        else
            show_error('The patient you are trying to delete does not exist.');
    }
	
	/**
     * Search patient
	 * @param $start - Starting of patient table's index to get query
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
$this->db->or_like('branch_id', $key, 'both');
$this->db->or_like('img_url', $key, 'both');
$this->db->or_like('name', $key, 'both');
$this->db->or_like('email', $key, 'both');
$this->db->or_like('doctor', $key, 'both');
$this->db->or_like('address', $key, 'both');
$this->db->or_like('phone', $key, 'both');
$this->db->or_like('sex', $key, 'both');
$this->db->or_like('birthdate', $key, 'both');
$this->db->or_like('age', $key, 'both');
$this->db->or_like('bloodgroup', $key, 'both');
$this->db->or_like('disease', $key, 'both');
$this->db->or_like('patient_id', $key, 'both');
$this->db->or_like('add_date', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['patient'] = $this->db->get('patient')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/patient/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('branch_id', $key, 'both');
$this->db->or_like('img_url', $key, 'both');
$this->db->or_like('name', $key, 'both');
$this->db->or_like('email', $key, 'both');
$this->db->or_like('doctor', $key, 'both');
$this->db->or_like('address', $key, 'both');
$this->db->or_like('phone', $key, 'both');
$this->db->or_like('sex', $key, 'both');
$this->db->or_like('birthdate', $key, 'both');
$this->db->or_like('age', $key, 'both');
$this->db->or_like('bloodgroup', $key, 'both');
$this->db->or_like('disease', $key, 'both');
$this->db->or_like('patient_id', $key, 'both');
$this->db->or_like('add_date', $key, 'both');

		$config['total_rows'] = $this->db->from("patient")->count_all_results();
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
		$data['_view'] = 'admin/patient/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export patient
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'patient_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $patientData = $this->Patient_model->get_all_patient();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Branch Id","Img Url","Name","Email","Doctor","Address","Phone","Sex","Birthdate","Age","Bloodgroup","Disease","Patient Id","Add Date"); 
		   fputcsv($file, $header);
		   foreach ($patientData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $patient = $this->db->get('patient')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/patient/print_template.php');
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
//End of Patient controller