<?php

/**
 * Author: Amirul Momenin
 * Desc:Ion_user Model
 */
class Ion_user_model extends CI_Model
{
	protected $ion_user = 'ion_user';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get ion_user by id
	 *@param $id - primary key to get record
	 *
     */
    function get_ion_user($id){
        $result = $this->db->get_where('ion_user',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all ion_user
	 *
     */
    function get_all_ion_user(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('ion_user')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit ion_user
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_ion_user($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('ion_user')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count ion_user rows
	 *
     */
	function get_count_ion_user(){
       $result = $this->db->from("ion_user")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new ion_user
	 *@param $params - data set to add record
	 *
     */
    function add_ion_user($params){
        $this->db->insert('ion_user',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update ion_user
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_ion_user($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('ion_user',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete ion_user
	 *@param $id - primary key to delete record
	 *
     */
    function delete_ion_user($id){
        $status = $this->db->delete('ion_user',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
