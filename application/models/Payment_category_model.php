<?php

/**
 * Author: Amirul Momenin
 * Desc:Payment_category Model
 */
class Payment_category_model extends CI_Model
{
	protected $payment_category = 'payment_category';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get payment_category by id
	 *@param $id - primary key to get record
	 *
     */
    function get_payment_category($id){
        $result = $this->db->get_where('payment_category',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all payment_category
	 *
     */
    function get_all_payment_category(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('payment_category')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit payment_category
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_payment_category($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('payment_category')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count payment_category rows
	 *
     */
	function get_count_payment_category(){
       $result = $this->db->from("payment_category")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new payment_category
	 *@param $params - data set to add record
	 *
     */
    function add_payment_category($params){
        $this->db->insert('payment_category',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update payment_category
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_payment_category($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('payment_category',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete payment_category
	 *@param $id - primary key to delete record
	 *
     */
    function delete_payment_category($id){
        $status = $this->db->delete('payment_category',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
