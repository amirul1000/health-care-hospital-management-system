<?php

/**
 * Author: Amirul Momenin
 * Desc:Users_groups Model
 */
class Users_groups_model extends CI_Model
{
	protected $users_groups = 'users_groups';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get users_groups by id
	 *@param $id - primary key to get record
	 *
     */
    function get_users_groups($id){
        $result = $this->db->get_where('users_groups',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all users_groups
	 *
     */
    function get_all_users_groups(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('users_groups')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users_groups
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_groups($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('users_groups')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users_groups rows
	 *
     */
	function get_count_users_groups(){
       $result = $this->db->from("users_groups")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new users_groups
	 *@param $params - data set to add record
	 *
     */
    function add_users_groups($params){
        $this->db->insert('users_groups',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update users_groups
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_users_groups($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('users_groups',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete users_groups
	 *@param $id - primary key to delete record
	 *
     */
    function delete_users_groups($id){
        $status = $this->db->delete('users_groups',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
