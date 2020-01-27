<?php

/**
 * Author: Amirul Momenin
 * Desc:Patient Model
 */
class Patient_model extends CI_Model
{
	protected $patient = 'patient';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get patient by id
	 *@param $id - primary key to get record
	 *
     */
    function get_patient($id){
        $result = $this->db->get_where('patient',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all patient
	 *
     */
    function get_all_patient(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('patient')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit patient
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_patient($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('patient')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count patient rows
	 *
     */
	function get_count_patient(){
       $result = $this->db->from("patient")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new patient
	 *@param $params - data set to add record
	 *
     */
    function add_patient($params){
        $this->db->insert('patient',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update patient
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_patient($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('patient',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete patient
	 *@param $id - primary key to delete record
	 *
     */
    function delete_patient($id){
        $status = $this->db->delete('patient',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
