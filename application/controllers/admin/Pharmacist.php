<?php

 /**
 * Author: Amirul Momenin
 * Desc:Pharmacist Controller
 *
 */
class Pharmacist extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Pharmacist_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of pharmacist table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['pharmacist'] = $this->Pharmacist_model->get_limit_pharmacist($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/pharmacist/index');
		$config['total_rows'] = $this->Pharmacist_model->get_count_pharmacist();
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
		
        $data['_view'] = 'admin/pharmacist/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save pharmacist
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
'address' => html_escape($this->input->post('address')),
'phone' => html_escape($this->input->post('phone')),
'x' => html_escape($this->input->post('x')),
'y' => html_escape($this->input->post('y')),

				);
		
						$config['upload_path']          = "./public/uploads/images/pharmacist";
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
										$img_url = "uploads/images/pharmacist/".$_FILES['img_url']['name'];
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
			$data['pharmacist'] = $this->Pharmacist_model->get_pharmacist($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Pharmacist_model->update_pharmacist($id,$params);
                redirect('admin/pharmacist/index');
            }else{
                $data['_view'] = 'admin/pharmacist/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $pharmacist_id = $this->Pharmacist_model->add_pharmacist($params);
                redirect('admin/pharmacist/index');
            }else{  
			    $data['pharmacist'] = $this->Pharmacist_model->get_pharmacist(0);
                $data['_view'] = 'admin/pharmacist/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details pharmacist
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['pharmacist'] = $this->Pharmacist_model->get_pharmacist($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/pharmacist/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting pharmacist
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $pharmacist = $this->Pharmacist_model->get_pharmacist($id);

        // check if the pharmacist exists before trying to delete it
        if(isset($pharmacist['id'])){
            $this->Pharmacist_model->delete_pharmacist($id);
            redirect('admin/pharmacist/index');
        }
        else
            show_error('The pharmacist you are trying to delete does not exist.');
    }
	
	/**
     * Search pharmacist
	 * @param $start - Starting of pharmacist table's index to get query
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
$this->db->or_like('address', $key, 'both');
$this->db->or_like('phone', $key, 'both');
$this->db->or_like('x', $key, 'both');
$this->db->or_like('y', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['pharmacist'] = $this->db->get('pharmacist')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/pharmacist/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('branch_id', $key, 'both');
$this->db->or_like('img_url', $key, 'both');
$this->db->or_like('name', $key, 'both');
$this->db->or_like('email', $key, 'both');
$this->db->or_like('address', $key, 'both');
$this->db->or_like('phone', $key, 'both');
$this->db->or_like('x', $key, 'both');
$this->db->or_like('y', $key, 'both');

		$config['total_rows'] = $this->db->from("pharmacist")->count_all_results();
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
		$data['_view'] = 'admin/pharmacist/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export pharmacist
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'pharmacist_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $pharmacistData = $this->Pharmacist_model->get_all_pharmacist();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Branch Id","Img Url","Name","Email","Address","Phone","X","Y"); 
		   fputcsv($file, $header);
		   foreach ($pharmacistData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $pharmacist = $this->db->get('pharmacist')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/pharmacist/print_template.php');
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
//End of Pharmacist controller