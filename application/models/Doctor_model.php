<?php

/**
 * Author: Amirul Momenin
 * Desc:Doctor Model
 */
class Doctor_model extends CI_Model
{
	protected $doctor = 'doctor';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get doctor by id
	 *@param $id - primary key to get record
	 *
     */
    function get_doctor($id){
        $result = $this->db->get_where('doctor',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all doctor
	 *
     */
    function get_all_doctor(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('doctor')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit doctor
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_doctor($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('doctor')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count doctor rows
	 *
     */
	function get_count_doctor(){
       $result = $this->db->from("doctor")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new doctor
	 *@param $params - data set to add record
	 *
     */
    function add_doctor($params){
        $this->db->insert('doctor',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update doctor
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_doctor($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('doctor',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete doctor
	 *@param $id - primary key to delete record
	 *
     */
    function delete_doctor($id){
        $status = $this->db->delete('doctor',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
