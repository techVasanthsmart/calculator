<?php
/**
 * Class : Common_model
 * Common Class to control over all the Data from Database
 * Author       : Vasanth(SVK)
 * version      : 1.0
 * Created-By   : Vasanth(SVK)
 * Created-Date : 15-12-2022
**/
namespace App\Controllers;
use App\Models\Common_model;

class Home extends BaseController{
    public $common_model;
	public function __construct(){
		parent::__construct();
        $this->common_model = new Common_model();
	}
	
    public function index(){
        return view('index');
    }
	
	// SAVE THE HISTORY INFORMATION
    public function save(){
		$equation = str_replace(" ","",$this->request->getPost('display'));
		$value    = eval('return '.$equation.';');
		$this->common_model->build_query((json_encode(array($equation=>$value),true)));
		echo json_encode(array("success"=>true,"equation"=>$equation,"value"=>$value,"data"=>$this->common_model->get_all()));
    }
	
	// GET ALL HISTORY INFORMATION
    public function get_history(){
		echo json_encode(array("success"=>true,"data"=>$this->common_model->get_all()));
    }
	
	// DELETE A PARTICULAR HISTORY INFORMATION
    public function delete_history(){
		$id = $this->request->getPost('id');
		$this->common_model->delete_query($id);
		echo json_encode(array("success"=>true,"message"=>"Deleted Successfully","data"=>$this->common_model->get_all()));
    }
}
