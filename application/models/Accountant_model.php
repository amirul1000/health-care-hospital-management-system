<?php

/**
 * Author: Amirul Momenin
 * Desc:Accountant Model
 */
class Accountant_model extends CI_Model
{
	protected $accountant = 'accountant';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get accountant by id
	 *@param $id - primary key to get record
	 *
     */
    function get_accountant($id){
        $result = $this->db->get_where('accountant',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all accountant
	 *
     */
    function get_all_accountant(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('accountant')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit accountant
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_accountant($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('accountant')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count accountant rows
	 *
     */
	function get_count_accountant(){
       $result = $this->db->from("accountant")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new accountant
	 *@param $params - data set to add record
	 *
     */
    function add_accountant($params){
        $this->db->insert('accountant',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update accountant
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_accountant($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('accountant',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete accountant
	 *@param $id - primary key to delete record
	 *
     */
    function delete_accountant($id){
        $status = $this->db->delete('accountant',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
