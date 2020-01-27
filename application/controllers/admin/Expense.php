<?php

 /**
 * Author: Amirul Momenin
 * Desc:Expense Controller
 *
 */
class Expense extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Expense_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of expense table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['expense'] = $this->Expense_model->get_limit_expense($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/expense/index');
		$config['total_rows'] = $this->Expense_model->get_count_expense();
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
		
        $data['_view'] = 'admin/expense/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save expense
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		
		
		$params = array(
					 'branch_id' => html_escape($this->input->post('branch_id')),
'category' => html_escape($this->input->post('category')),
'date' => html_escape($this->input->post('date')),
'amount' => html_escape($this->input->post('amount')),
'user' => html_escape($this->input->post('user')),

				);
		 
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['expense'] = $this->Expense_model->get_expense($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Expense_model->update_expense($id,$params);
                redirect('admin/expense/index');
            }else{
                $data['_view'] = 'admin/expense/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $expense_id = $this->Expense_model->add_expense($params);
                redirect('admin/expense/index');
            }else{  
			    $data['expense'] = $this->Expense_model->get_expense(0);
                $data['_view'] = 'admin/expense/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details expense
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['expense'] = $this->Expense_model->get_expense($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/expense/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting expense
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $expense = $this->Expense_model->get_expense($id);

        // check if the expense exists before trying to delete it
        if(isset($expense['id'])){
            $this->Expense_model->delete_expense($id);
            redirect('admin/expense/index');
        }
        else
            show_error('The expense you are trying to delete does not exist.');
    }
	
	/**
     * Search expense
	 * @param $start - Starting of expense table's index to get query
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
$this->db->or_like('date', $key, 'both');
$this->db->or_like('amount', $key, 'both');
$this->db->or_like('user', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['expense'] = $this->db->get('expense')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/expense/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('branch_id', $key, 'both');
$this->db->or_like('category', $key, 'both');
$this->db->or_like('date', $key, 'both');
$this->db->or_like('amount', $key, 'both');
$this->db->or_like('user', $key, 'both');

		$config['total_rows'] = $this->db->from("expense")->count_all_results();
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
		$data['_view'] = 'admin/expense/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export expense
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'expense_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $expenseData = $this->Expense_model->get_all_expense();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Branch Id","Category","Date","Amount","User"); 
		   fputcsv($file, $header);
		   foreach ($expenseData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $expense = $this->db->get('expense')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/expense/print_template.php');
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
//End of Expense controller