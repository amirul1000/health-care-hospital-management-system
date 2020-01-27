<?php

/**
 * Author: Amirul Momenin
 * Desc:Groups Model
 */
class Groups_model extends CI_Model
{
	protected $groups = 'groups';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get groups by id
	 *@param $id - primary key to get record
	 *
     */
    function get_groups($id){
        $result = $this->db->get_where('groups',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all groups
	 *
     */
    function get_all_groups(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('groups')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit groups
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_groups($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('groups')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count groups rows
	 *
     */
	function get_count_groups(){
       $result = $this->db->from("groups")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new groups
	 *@param $params - data set to add record
	 *
     */
    function add_groups($params){
        $this->db->insert('groups',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update groups
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_groups($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('groups',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete groups
	 *@param $id - primary key to delete record
	 *
     */
    function delete_groups($id){
        $status = $this->db->delete('groups',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
