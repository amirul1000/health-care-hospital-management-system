<?php

/**
 * Author: Amirul Momenin
 * Desc:Laboratorist Model
 */
class Laboratorist_model extends CI_Model
{
	protected $laboratorist = 'laboratorist';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get laboratorist by id
	 *@param $id - primary key to get record
	 *
     */
    function get_laboratorist($id){
        $result = $this->db->get_where('laboratorist',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all laboratorist
	 *
     */
    function get_all_laboratorist(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('laboratorist')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit laboratorist
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_laboratorist($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('laboratorist')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count laboratorist rows
	 *
     */
	function get_count_laboratorist(){
       $result = $this->db->from("laboratorist")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new laboratorist
	 *@param $params - data set to add record
	 *
     */
    function add_laboratorist($params){
        $this->db->insert('laboratorist',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update laboratorist
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_laboratorist($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('laboratorist',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete laboratorist
	 *@param $id - primary key to delete record
	 *
     */
    function delete_laboratorist($id){
        $status = $this->db->delete('laboratorist',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
