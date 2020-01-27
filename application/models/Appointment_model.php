<?php

/**
 * Author: Amirul Momenin
 * Desc:Appointment Model
 */
class Appointment_model extends CI_Model
{
	protected $appointment = 'appointment';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get appointment by id
	 *@param $id - primary key to get record
	 *
     */
    function get_appointment($id){
        $result = $this->db->get_where('appointment',array('id'=>$id))->row_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all appointment
	 *
     */
    function get_all_appointment(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('appointment')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit appointment
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_appointment($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('appointment')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count appointment rows
	 *
     */
	function get_count_appointment(){
       $result = $this->db->from("appointment")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new appointment
	 *@param $params - data set to add record
	 *
     */
    function add_appointment($params){
        $this->db->insert('appointment',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update appointment
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_appointment($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('appointment',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete appointment
	 *@param $id - primary key to delete record
	 *
     */
    function delete_appointment($id){
        $status = $this->db->delete('appointment',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
