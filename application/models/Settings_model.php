<?php

/**
 * Author: Amirul Momenin
 * Desc:Settings Model
 */
class Settings_model extends CI_Model
{
	protected $settings = 'settings';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get settings by id
	 *@param $id - primary key to get record
	 *
     */
    function get_settings($id){
        $result = $this->db->get_where('settings',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all settings
	 *
     */
    function get_all_settings(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('settings')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit settings
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_settings($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('settings')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count settings rows
	 *
     */
	function get_count_settings(){
       $result = $this->db->from("settings")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new settings
	 *@param $params - data set to add record
	 *
     */
    function add_settings($params){
        $this->db->insert('settings',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update settings
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_settings($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('settings',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete settings
	 *@param $id - primary key to delete record
	 *
     */
    function delete_settings($id){
        $status = $this->db->delete('settings',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
