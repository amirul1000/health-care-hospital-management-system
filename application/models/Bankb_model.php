<?php

/**
 * Author: Amirul Momenin
 * Desc:Bankb Model
 */
class Bankb_model extends CI_Model
{
	protected $bankb = 'bankb';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get bankb by id
	 *@param $id - primary key to get record
	 *
     */
    function get_bankb($id){
        $result = $this->db->get_where('bankb',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all bankb
	 *
     */
    function get_all_bankb(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('bankb')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit bankb
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_bankb($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('bankb')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count bankb rows
	 *
     */
	function get_count_bankb(){
       $result = $this->db->from("bankb")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new bankb
	 *@param $params - data set to add record
	 *
     */
    function add_bankb($params){
        $this->db->insert('bankb',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update bankb
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_bankb($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('bankb',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete bankb
	 *@param $id - primary key to delete record
	 *
     */
    function delete_bankb($id){
        $status = $this->db->delete('bankb',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
