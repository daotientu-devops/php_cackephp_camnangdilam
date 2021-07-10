<?php
class LogsController extends AppController{
	var $uses=array("Tbl_log","Tbl_user");
	var $name="Logs";
	public function index(){
		$this->layout="admin";
		$this->set("title","Cẩm Nang Đi Làm");
		$this->paginate=array(
			//'conditions'=>array(
				//'state'=>1
			//),
			'limit'=>10000,
			'order'=>array('_id'=>'desc')
			,'recursive'=>-1
		);
		$data=$this->paginate("Tbl_log");
		$this->set("log_info",$data);	
	}
}
?>