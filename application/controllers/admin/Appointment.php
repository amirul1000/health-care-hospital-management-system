<?php

 /**
 * Author: Amirul Momenin
 * Desc:Appointment Controller
 *
 */
class Appointment extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Appointment_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of appointment table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['appointment'] = $this->Appointment_model->get_limit_appointment($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/appointment/index');
		$config['total_rows'] = $this->Appointment_model->get_count_appointment();
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
		
        $data['_view'] = 'admin/appointment/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save appointment
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		
		
		$params = array(
					 'branch_id' => html_escape($this->input->post('branch_id')),
'patient' => html_escape($this->input->post('patient')),
'doctor_id' => html_escape($this->input->post('doctor_id')),
'date_app' => html_escape($this->input->post('date_app')),
'time_slot' => html_escape($this->input->post('time_slot')),
's_time' => html_escape($this->input->post('s_time')),
'e_time' => html_escape($this->input->post('e_time')),
'remarks' => html_escape($this->input->post('remarks')),
'add_date' => html_escape($this->input->post('add_date')),
's_time_key' => html_escape($this->input->post('s_time_key')),

				);
		 
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['appointment'] = $this->Appointment_model->get_appointment($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Appointment_model->update_appointment($id,$params);
                redirect('admin/appointment/index');
            }else{
                $data['_view'] = 'admin/appointment/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $appointment_id = $this->Appointment_model->add_appointment($params);
                redirect('admin/appointment/index');
            }else{  
			    $data['appointment'] = $this->Appointment_model->get_appointment(0);
                $data['_view'] = 'admin/appointment/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details appointment
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['appointment'] = $this->Appointment_model->get_appointment($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/appointment/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting appointment
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $appointment = $this->Appointment_model->get_appointment($id);

        // check if the appointment exists before trying to delete it
        if(isset($appointment['id'])){
            $this->Appointment_model->delete_appointment($id);
            redirect('admin/appointment/index');
        }
        else
            show_error('The appointment you are trying to delete does not exist.');
    }
	
	/**
     * Search appointment
	 * @param $start - Starting of appointment table's index to get query
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
$this->db->or_like('patient', $key, 'both');
$this->db->or_like('doctor_id', $key, 'both');
$this->db->or_like('date_app', $key, 'both');
$this->db->or_like('time_slot', $key, 'both');
$this->db->or_like('s_time', $key, 'both');
$this->db->or_like('e_time', $key, 'both');
$this->db->or_like('remarks', $key, 'both');
$this->db->or_like('add_date', $key, 'both');
$this->db->or_like('s_time_key', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['appointment'] = $this->db->get('appointment')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/appointment/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('branch_id', $key, 'both');
$this->db->or_like('patient', $key, 'both');
$this->db->or_like('doctor_id', $key, 'both');
$this->db->or_like('date_app', $key, 'both');
$this->db->or_like('time_slot', $key, 'both');
$this->db->or_like('s_time', $key, 'both');
$this->db->or_like('e_time', $key, 'both');
$this->db->or_like('remarks', $key, 'both');
$this->db->or_like('add_date', $key, 'both');
$this->db->or_like('s_time_key', $key, 'both');

		$config['total_rows'] = $this->db->from("appointment")->count_all_results();
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
		$data['_view'] = 'admin/appointment/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export appointment
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'appointment_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $appointmentData = $this->Appointment_model->get_all_appointment();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Branch Id","Patient","Doctor Id","Date App","Time Slot","S Time","E Time","Remarks","Add Date","S Time Key"); 
		   fputcsv($file, $header);
		   foreach ($appointmentData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $appointment = $this->db->get('appointment')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/appointment/print_template.php');
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
//End of Appointment controller