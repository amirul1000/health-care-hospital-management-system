<?php

/**
 * Author: Amirul Momenin
 * Desc:Disease Model
 */
class Disease_model extends CI_Model
{
	protected $disease = 'disease';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get disease by id
	 *@param $id - primary key to get record
	 *
     */
    function get_disease($id){
        $result = $this->db->get_where('disease',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all disease
	 *
     */
    function get_all_disease(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('disease')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit disease
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_disease($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('disease')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count disease rows
	 *
     */
	function get_count_disease(){
       $result = $this->db->from("disease")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new disease
	 *@param $params - data set to add record
	 *
     */
    function add_disease($params){
        $this->db->insert('disease',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update disease
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_disease($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('disease',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete disease
	 *@param $id - primary key to delete record
	 *
     */
    function delete_disease($id){
        $status = $this->db->delete('disease',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
