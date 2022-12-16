<?php

/**
 * Class : Common_model
 * Common Class to control over all the Data from Database
 * Author       : Vasanth(SVK)
 * version      : 1.0
 * Created-By   : Vasanth(SVK)
**/

namespace App\Models;
use CodeIgniter\Model;
class Common_model extends Model {
 
	protected $db;
	
    public function __construct(){
        parent::__construct();
        $this->db         = \Config\Database::connect();
    }
	
	// INSERT DATA INTO DATABASE
	public function build_query($json){
		$insert_query     = 'INSERT INTO cr_history (`string`) VALUES (\''.$json.'\');';
		$this->db->query($insert_query);
    }
	
	// DEFAULT QUERY EXECUTOR
	public function runQuery($query , $result_type = ''){
		$get_query        = $this->db->query($query);
		if($result_type == 'getRow'){
			$get_result = $get_query->getRow();
		}
		else{
			$get_result = $get_query->getResult();
		}
		return $get_result;
    }
	
	// GET LAST INSERTED ID
	public function get_last_insert_id(){
		$last_insert_id_query = "SELECT LAST_INSERT_ID() as insert_id;";
		$last_insert_id       = $this->runQuery($last_insert_id_query,'getRow');
		return $last_insert_id->insert_id;
	}
	
	// GET COUNT OF THE TABLE
	public function get_count(){
		$last_insert_id_query = "SELECT count(*) as count from cr_history where is_delete = 0;";
		$last_insert_id       = $this->runQuery($last_insert_id_query,'getRow');
		return $last_insert_id->count;
	}
	
	// GET ALL INFORMATION OF TABLE
	public function get_all(){
		$query = "SELECT * from cr_history where is_delete = 0 order by id desc limit 5;";
		return $this->runQuery($query);
	}
	
	// DELETE INFORMATION FROM THE TABLE
	public function delete_query($id){
		$query = "update cr_history set is_delete = 1 where id = $id;";
		$this->db->simpleQuery($query);
	}
}