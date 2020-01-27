<?php

/**
 * Author: Amirul Momenin
 * Desc:Nurse Model
 */
class Nurse_model extends CI_Model
{
	protected $nurse = 'nurse';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get nurse by id
	 *@param $id - primary key to get record
	 *
     */
    function get_nurse($id){
        $result = $this->db->get_where('nurse',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all nurse
	 *
     */
    function get_all_nurse(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('nurse')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit nurse
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_nurse($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('nurse')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count nurse rows
	 *
     */
	function get_count_nurse(){
       $result = $this->db->from("nurse")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new nurse
	 *@param $params - data set to add record
	 *
     */
    function add_nurse($params){
        $this->db->insert('nurse',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update nurse
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_nurse($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('nurse',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete nurse
	 *@param $id - primary key to delete record
	 *
     */
    function delete_nurse($id){
        $status = $this->db->delete('nurse',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
