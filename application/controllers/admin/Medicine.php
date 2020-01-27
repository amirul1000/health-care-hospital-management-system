<?php

 /**
 * Author: Amirul Momenin
 * Desc:Medicine Controller
 *
 */
class Medicine extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Medicine_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of medicine table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['medicine'] = $this->Medicine_model->get_limit_medicine($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/medicine/index');
		$config['total_rows'] = $this->Medicine_model->get_count_medicine();
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
		
        $data['_view'] = 'admin/medicine/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save medicine
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		
		
		$params = array(
					 'branch_id' => html_escape($this->input->post('branch_id')),
'name' => html_escape($this->input->post('name')),
'prodcode' => html_escape($this->input->post('prodcode')),
'category' => html_escape($this->input->post('category')),
'price' => html_escape($this->input->post('price')),
'quantity' => html_escape($this->input->post('quantity')),
'remaining_quantity' => html_escape($this->input->post('remaining_quantity')),
'generic' => html_escape($this->input->post('generic')),
'company' => html_escape($this->input->post('company')),
'effects' => html_escape($this->input->post('effects')),
'e_date' => html_escape($this->input->post('e_date')),
'add_date' => html_escape($this->input->post('add_date')),

				);
		 
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['medicine'] = $this->Medicine_model->get_medicine($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Medicine_model->update_medicine($id,$params);
                redirect('admin/medicine/index');
            }else{
                $data['_view'] = 'admin/medicine/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $medicine_id = $this->Medicine_model->add_medicine($params);
                redirect('admin/medicine/index');
            }else{  
			    $data['medicine'] = $this->Medicine_model->get_medicine(0);
                $data['_view'] = 'admin/medicine/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details medicine
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['medicine'] = $this->Medicine_model->get_medicine($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/medicine/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting medicine
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $medicine = $this->Medicine_model->get_medicine($id);

        // check if the medicine exists before trying to delete it
        if(isset($medicine['id'])){
            $this->Medicine_model->delete_medicine($id);
            redirect('admin/medicine/index');
        }
        else
            show_error('The medicine you are trying to delete does not exist.');
    }
	
	/**
     * Search medicine
	 * @param $start - Starting of medicine table's index to get query
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
$this->db->or_like('name', $key, 'both');
$this->db->or_like('prodcode', $key, 'both');
$this->db->or_like('category', $key, 'both');
$this->db->or_like('price', $key, 'both');
$this->db->or_like('quantity', $key, 'both');
$this->db->or_like('remaining_quantity', $key, 'both');
$this->db->or_like('generic', $key, 'both');
$this->db->or_like('company', $key, 'both');
$this->db->or_like('effects', $key, 'both');
$this->db->or_like('e_date', $key, 'both');
$this->db->or_like('add_date', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['medicine'] = $this->db->get('medicine')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/medicine/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('branch_id', $key, 'both');
$this->db->or_like('name', $key, 'both');
$this->db->or_like('prodcode', $key, 'both');
$this->db->or_like('category', $key, 'both');
$this->db->or_like('price', $key, 'both');
$this->db->or_like('quantity', $key, 'both');
$this->db->or_like('remaining_quantity', $key, 'both');
$this->db->or_like('generic', $key, 'both');
$this->db->or_like('company', $key, 'both');
$this->db->or_like('effects', $key, 'both');
$this->db->or_like('e_date', $key, 'both');
$this->db->or_like('add_date', $key, 'both');

		$config['total_rows'] = $this->db->from("medicine")->count_all_results();
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
		$data['_view'] = 'admin/medicine/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export medicine
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'medicine_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $medicineData = $this->Medicine_model->get_all_medicine();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Branch Id","Name","Prodcode","Category","Price","Quantity","Remaining Quantity","Generic","Company","Effects","E Date","Add Date"); 
		   fputcsv($file, $header);
		   foreach ($medicineData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $medicine = $this->db->get('medicine')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/medicine/print_template.php');
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
//End of Medicine controller