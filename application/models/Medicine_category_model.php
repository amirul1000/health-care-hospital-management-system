<?php

/**
 * Author: Amirul Momenin
 * Desc:Medicine_category Model
 */
class Medicine_category_model extends CI_Model
{
	protected $medicine_category = 'medicine_category';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get medicine_category by id
	 *@param $id - primary key to get record
	 *
     */
    function get_medicine_category($id){
        $result = $this->db->get_where('medicine_category',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all medicine_category
	 *
     */
    function get_all_medicine_category(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('medicine_category')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit medicine_category
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_medicine_category($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('medicine_category')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count medicine_category rows
	 *
     */
	function get_count_medicine_category(){
       $result = $this->db->from("medicine_category")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new medicine_category
	 *@param $params - data set to add record
	 *
     */
    function add_medicine_category($params){
        $this->db->insert('medicine_category',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update medicine_category
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_medicine_category($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('medicine_category',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete medicine_category
	 *@param $id - primary key to delete record
	 *
     */
    function delete_medicine_category($id){
        $status = $this->db->delete('medicine_category',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
