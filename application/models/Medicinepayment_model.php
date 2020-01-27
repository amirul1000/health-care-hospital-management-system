<?php

/**
 * Author: Amirul Momenin
 * Desc:Medicinepayment Model
 */
class Medicinepayment_model extends CI_Model
{
	protected $medicinepayment = 'medicinepayment';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get medicinepayment by id
	 *@param $id - primary key to get record
	 *
     */
    function get_medicinepayment($id){
        $result = $this->db->get_where('medicinepayment',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all medicinepayment
	 *
     */
    function get_all_medicinepayment(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('medicinepayment')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit medicinepayment
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_medicinepayment($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('medicinepayment')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count medicinepayment rows
	 *
     */
	function get_count_medicinepayment(){
       $result = $this->db->from("medicinepayment")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new medicinepayment
	 *@param $params - data set to add record
	 *
     */
    function add_medicinepayment($params){
        $this->db->insert('medicinepayment',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update medicinepayment
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_medicinepayment($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('medicinepayment',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete medicinepayment
	 *@param $id - primary key to delete record
	 *
     */
    function delete_medicinepayment($id){
        $status = $this->db->delete('medicinepayment',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
