<?php

/**
 * Author: Amirul Momenin
 * Desc:Department Model
 */
class Department_model extends CI_Model
{
	protected $department = 'department';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get department by id
	 *@param $id - primary key to get record
	 *
     */
    function get_department($id){
        $result = $this->db->get_where('department',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all department
	 *
     */
    function get_all_department(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('department')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit department
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_department($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('department')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count department rows
	 *
     */
	function get_count_department(){
       $result = $this->db->from("department")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new department
	 *@param $params - data set to add record
	 *
     */
    function add_department($params){
        $this->db->insert('department',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update department
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_department($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('department',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete department
	 *@param $id - primary key to delete record
	 *
     */
    function delete_department($id){
        $status = $this->db->delete('department',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
