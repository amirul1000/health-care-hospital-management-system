<?php

/**
 * Author: Amirul Momenin
 * Desc:Expense_category Model
 */
class Expense_category_model extends CI_Model
{
	protected $expense_category = 'expense_category';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get expense_category by id
	 *@param $id - primary key to get record
	 *
     */
    function get_expense_category($id){
        $result = $this->db->get_where('expense_category',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all expense_category
	 *
     */
    function get_all_expense_category(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('expense_category')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit expense_category
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_expense_category($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('expense_category')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count expense_category rows
	 *
     */
	function get_count_expense_category(){
       $result = $this->db->from("expense_category")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new expense_category
	 *@param $params - data set to add record
	 *
     */
    function add_expense_category($params){
        $this->db->insert('expense_category',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update expense_category
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_expense_category($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('expense_category',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete expense_category
	 *@param $id - primary key to delete record
	 *
     */
    function delete_expense_category($id){
        $status = $this->db->delete('expense_category',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
