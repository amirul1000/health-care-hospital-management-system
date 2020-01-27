<?php

/**
 * Author: Amirul Momenin
 * Desc:Expense Model
 */
class Expense_model extends CI_Model
{
	protected $expense = 'expense';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get expense by id
	 *@param $id - primary key to get record
	 *
     */
    function get_expense($id){
        $result = $this->db->get_where('expense',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all expense
	 *
     */
    function get_all_expense(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('expense')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit expense
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_expense($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('expense')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count expense rows
	 *
     */
	function get_count_expense(){
       $result = $this->db->from("expense")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new expense
	 *@param $params - data set to add record
	 *
     */
    function add_expense($params){
        $this->db->insert('expense',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update expense
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_expense($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('expense',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete expense
	 *@param $id - primary key to delete record
	 *
     */
    function delete_expense($id){
        $status = $this->db->delete('expense',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
