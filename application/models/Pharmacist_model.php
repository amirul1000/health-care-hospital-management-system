<?php

/**
 * Author: Amirul Momenin
 * Desc:Pharmacist Model
 */
class Pharmacist_model extends CI_Model
{
	protected $pharmacist = 'pharmacist';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get pharmacist by id
	 *@param $id - primary key to get record
	 *
     */
    function get_pharmacist($id){
        $result = $this->db->get_where('pharmacist',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all pharmacist
	 *
     */
    function get_all_pharmacist(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('pharmacist')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit pharmacist
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_pharmacist($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('pharmacist')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count pharmacist rows
	 *
     */
	function get_count_pharmacist(){
       $result = $this->db->from("pharmacist")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new pharmacist
	 *@param $params - data set to add record
	 *
     */
    function add_pharmacist($params){
        $this->db->insert('pharmacist',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update pharmacist
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_pharmacist($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('pharmacist',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete pharmacist
	 *@param $id - primary key to delete record
	 *
     */
    function delete_pharmacist($id){
        $status = $this->db->delete('pharmacist',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
