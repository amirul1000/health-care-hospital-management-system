<?php

/**
 * Author: Amirul Momenin
 * Desc:Medicine Model
 */
class Medicine_model extends CI_Model
{
	protected $medicine = 'medicine';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get medicine by id
	 *@param $id - primary key to get record
	 *
     */
    function get_medicine($id){
        $result = $this->db->get_where('medicine',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all medicine
	 *
     */
    function get_all_medicine(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('medicine')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit medicine
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_medicine($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('medicine')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count medicine rows
	 *
     */
	function get_count_medicine(){
       $result = $this->db->from("medicine")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new medicine
	 *@param $params - data set to add record
	 *
     */
    function add_medicine($params){
        $this->db->insert('medicine',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update medicine
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_medicine($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('medicine',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete medicine
	 *@param $id - primary key to delete record
	 *
     */
    function delete_medicine($id){
        $status = $this->db->delete('medicine',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
