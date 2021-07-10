<?php
class DashboardController extends AppController{
var $uses=array("Tbl_category","Tbl_article","Tbl_user","Tbl_log");
var $name="Dashboard";
var $layout="admin";
public function index(){
	
    $this->set("title","Cẩm Nang Đi Làm");
	$categories=$this->Tbl_category->find('all',array(
		'conditions'=>array(
			'published'=>1
		)
	));
	$this->set('numcat',count($categories));
	$articles=$this->Tbl_article->find('all',array(
		'conditions'=>array(
			'state'=>1
		)
	));
	$this->set('numart',count($articles));
	$users=$this->Tbl_user->find('all',array(
		'conditions'=>array(
			'activation'=>1
		)
	));
	$this->set('numuser',count($users));
	$logs=$this->Tbl_log->find('all');
	$this->set('numlog',count($logs));
	//send mail
	if(!empty($this->request->data)){
		App::uses('CakeEmail','Network/Email');
		/*instance CakeEmail class*/
		$email=new CakeEmail('smtp');
		//$email->from($this->request->data['Tbl_category']['emailfrom']);
		$email->to($this->request->data['Tbl_category']['emailto']);
		$email->subject($this->request->data['Tbl_category']['subject']);
		$email->send($this->request->data['Tbl_category']['message']);
		//echo 'Email sent.'; die();
		$this->Session->setFlash('Email sent.');
	}
	$this->render('index');
}
}
?>















