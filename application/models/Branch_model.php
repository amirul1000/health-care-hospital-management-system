<?php

/**
 * Author: Amirul Momenin
 * Desc:Branch Model
 */
class Branch_model extends CI_Model
{
	protected $branch = 'branch';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get branch by id
	 *@param $id - primary key to get record
	 *
     */
    function get_branch($id){
        $result = $this->db->get_where('branch',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all branch
	 *
     */
    function get_all_branch(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('branch')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit branch
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_branch($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('branch')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count branch rows
	 *
     */
	function get_count_branch(){
       $result = $this->db->from("branch")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new branch
	 *@param $params - data set to add record
	 *
     */
    function add_branch($params){
        $this->db->insert('branch',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update branch
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_branch($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('branch',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete branch
	 *@param $id - primary key to delete record
	 *
     */
    function delete_branch($id){
        $status = $this->db->delete('branch',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
