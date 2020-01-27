<?php

 /**
 * Author: Amirul Momenin
 * Desc:Payment Controller
 *
 */
class Payment extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Payment_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of payment table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['payment'] = $this->Payment_model->get_limit_payment($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/payment/index');
		$config['total_rows'] = $this->Payment_model->get_count_payment();
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
		
        $data['_view'] = 'admin/payment/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save payment
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		
		
		$params = array(
					 'branch_id' => html_escape($this->input->post('branch_id')),
'category' => html_escape($this->input->post('category')),
'patient' => html_escape($this->input->post('patient')),
'doctor_id' => html_escape($this->input->post('doctor_id')),
'date' => html_escape($this->input->post('date')),
'amount' => html_escape($this->input->post('amount')),
'vat' => html_escape($this->input->post('vat')),
'x_ray' => html_escape($this->input->post('x_ray')),
'flat_vat' => html_escape($this->input->post('flat_vat')),
'discount' => html_escape($this->input->post('discount')),
'flat_discount' => html_escape($this->input->post('flat_discount')),
'gross_total' => html_escape($this->input->post('gross_total')),
'hospital_amount' => html_escape($this->input->post('hospital_amount')),
'doctor_amount' => html_escape($this->input->post('doctor_amount')),
'category_amount' => html_escape($this->input->post('category_amount')),
'category_name' => html_escape($this->input->post('category_name')),
'amount_received' => html_escape($this->input->post('amount_received')),
'status' => html_escape($this->input->post('status')),

				);
		 
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['payment'] = $this->Payment_model->get_payment($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Payment_model->update_payment($id,$params);
                redirect('admin/payment/index');
            }else{
                $data['_view'] = 'admin/payment/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $payment_id = $this->Payment_model->add_payment($params);
                redirect('admin/payment/index');
            }else{  
			    $data['payment'] = $this->Payment_model->get_payment(0);
                $data['_view'] = 'admin/payment/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details payment
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['payment'] = $this->Payment_model->get_payment($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/payment/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting payment
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $payment = $this->Payment_model->get_payment($id);

        // check if the payment exists before trying to delete it
        if(isset($payment['id'])){
            $this->Payment_model->delete_payment($id);
            redirect('admin/payment/index');
        }
        else
            show_error('The payment you are trying to delete does not exist.');
    }
	
	/**
     * Search payment
	 * @param $start - Starting of payment table's index to get query
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
$this->db->or_like('category', $key, 'both');
$this->db->or_like('patient', $key, 'both');
$this->db->or_like('doctor_id', $key, 'both');
$this->db->or_like('date', $key, 'both');
$this->db->or_like('amount', $key, 'both');
$this->db->or_like('vat', $key, 'both');
$this->db->or_like('x_ray', $key, 'both');
$this->db->or_like('flat_vat', $key, 'both');
$this->db->or_like('discount', $key, 'both');
$this->db->or_like('flat_discount', $key, 'both');
$this->db->or_like('gross_total', $key, 'both');
$this->db->or_like('hospital_amount', $key, 'both');
$this->db->or_like('doctor_amount', $key, 'both');
$this->db->or_like('category_amount', $key, 'both');
$this->db->or_like('category_name', $key, 'both');
$this->db->or_like('amount_received', $key, 'both');
$this->db->or_like('status', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['payment'] = $this->db->get('payment')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/payment/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('branch_id', $key, 'both');
$this->db->or_like('category', $key, 'both');
$this->db->or_like('patient', $key, 'both');
$this->db->or_like('doctor_id', $key, 'both');
$this->db->or_like('date', $key, 'both');
$this->db->or_like('amount', $key, 'both');
$this->db->or_like('vat', $key, 'both');
$this->db->or_like('x_ray', $key, 'both');
$this->db->or_like('flat_vat', $key, 'both');
$this->db->or_like('discount', $key, 'both');
$this->db->or_like('flat_discount', $key, 'both');
$this->db->or_like('gross_total', $key, 'both');
$this->db->or_like('hospital_amount', $key, 'both');
$this->db->or_like('doctor_amount', $key, 'both');
$this->db->or_like('category_amount', $key, 'both');
$this->db->or_like('category_name', $key, 'both');
$this->db->or_like('amount_received', $key, 'both');
$this->db->or_like('status', $key, 'both');

		$config['total_rows'] = $this->db->from("payment")->count_all_results();
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
		$data['_view'] = 'admin/payment/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export payment
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'payment_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $paymentData = $this->Payment_model->get_all_payment();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Branch Id","Category","Patient","Doctor Id","Date","Amount","Vat","X Ray","Flat Vat","Discount","Flat Discount","Gross Total","Hospital Amount","Doctor Amount","Category Amount","Category Name","Amount Received","Status"); 
		   fputcsv($file, $header);
		   foreach ($paymentData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $payment = $this->db->get('payment')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/payment/print_template.php');
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
//End of Payment controller