<?php

/**
 * Author: Amirul Momenin
 * Desc:Medical_history Model
 */
class Medical_history_model extends CI_Model
{
	protected $medical_history = 'medical_history';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get medical_history by id
	 *@param $id - primary key to get record
	 *
     */
    function get_medical_history($id){
        $result = $this->db->get_where('medical_history',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all medical_history
	 *
     */
    function get_all_medical_history(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('medical_history')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit medical_history
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_medical_history($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('medical_history')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count medical_history rows
	 *
     */
	function get_count_medical_history(){
       $result = $this->db->from("medical_history")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new medical_history
	 *@param $params - data set to add record
	 *
     */
    function add_medical_history($params){
        $this->db->insert('medical_history',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update medical_history
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_medical_history($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('medical_history',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete medical_history
	 *@param $id - primary key to delete record
	 *
     */
    function delete_medical_history($id){
        $status = $this->db->delete('medical_history',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
