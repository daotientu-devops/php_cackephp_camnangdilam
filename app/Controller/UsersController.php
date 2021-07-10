<?php
//Documents example: PHP5 Tutorials-Static Data Members and Methods
App::import('Xml');
App::uses("CakeEmail","Network/Email");
class UsersController extends AppController{
    public $name="Users";
    var $uses=array('Tbl_user','Tbl_log');
    var $layout="admin";
    var $paginate=array();
    var $alert="Username or Password doesn't exist.";
    var $alertChangePass="Change password successfully. Please login system again";
    /**
     * Login
     */
    public function login(){
		$this->layout="";
		$this->set("title","Login");
        if($this->request->is("post")){
			if($this->Auth->login()){
				return $this->redirect($this->Auth->redirectUrl().'/');
			}else{
            	$this->Session->setFlash('User name và password không khớp.');
			}
        }
    }
	public function admin_lockscreen(){
		$this->layout="";
		$this->set("title","Lockscreen");
        if($this->request->is("post")){
			if($this->Auth->login()){
				return $this->redirect($this->Auth->redirectUrl().'/');
			}else{
            	$this->Session->setFlash('User name và password không khớp.');
			}
        }
	}
    /*
     * Logout
     */
    public function admin_logout(){
        $this->redirect($this->Auth->logout());
    }
public function index(){
$this->set("title","Users Management");
$this->paginate=array("conditions"=>"status=1","limit"=>100,"recursive"=>-1);
$data=$this->paginate("Tbl_user");
$this->set("user_info",$data);
//$this->set("_id",AuthComponent::user_info("_id"));
//$this->set("usertype",AuthComponent::user_info("usertype"));
}
/**
 * Register
 */
public function admin_add(){
$this->set("title","Register User");
if($this->request->is("post")){
$now = date('Y/m/d h:i:s');
$this->Tbl_user->set(array("registerDate"=>$now));//#Name registerDate
$this->Tbl_user->set(array("lastvisitDate"=>"0000/00/00 00:00:00"));//#Name lastvisitDate
$this->Tbl_user->set(array("created_at"=>"0000/00/00 00:00:00"));//#Name created_at
$this->Tbl_user->set(array("created_by"=>0));//#Name created_by
$this->Tbl_user->set(array("updated_at"=>"0000/00/00 00:00:00"));//#Name updated_at
$this->Tbl_user->set(array("updated_by"=>0));//#Name updated_by
$this->Tbl_user->set(array("usertype"=>1));//#Name usertype
$this->Tbl_user->set(array("activation"=>0));//#Name block
$this->Tbl_user->set(array("status"=>1));//#Name state
if($this->Tbl_user->save($this->request->data)){
//$this->saveLogs("Add username: ".$this->request->data["Tbl_user"]["username"],$now);
$this->redirect(array("action"=>"index"));
}
}
}
/*
 * Edit User
 */
public function admin_edit($id=null){
$temp=$this->Tbl_user->find("first",array("conditions"=>array("Tbl_user.id=".$id)));
if($temp["Tbl_user"]["id"]==""){
$this->redirect(array("action"=>"index"));
}else{
$this->set("user_info",$temp);
$this->set("title","Modify User");
}
if($this->request->is("post")){ //echo $this->data["Tbl_user"]["username"]; die();
$now = date('Y/m/d h:i:s');
$this->Tbl_user->id=$id;
$this->Tbl_user->set(array("updated_at"=>$now));//#Name updated_at
$this->Tbl_user->set(array("updated_by"=>AuthComponent::user("id")));//#Name updated_by
if($this->Tbl_user->save($this->request->data)){
//$this->saveLogs("Edit username: ".$this->request->data["Tbl_user"]["username"],$now);
$this->redirect(array("action"=>"index"));
}
}
}
/**
 * View Detail User
 * @return type
 */
public function admin_view($id=null){
$temp=$this->Tbl_user->find("first",array("conditions"=>array("Tbl_user.id=".$id)));
if($temp["Tbl_user"]["id"]==""){
$this->redirect(array("action"=>"index"));
}else{
$this->set("user_info",$temp);
$this->set("title","View user");
}
}
/**
* Copy user
*/
public function admin_copy($id=null){
$temp=$this->Tbl_user->find("first",array("conditions"=>array("Tbl_user.id=".$id)));
if($temp["Tbl_user"]["id"]==""){
$this->redirect(array("action"=>"index"));
}else{
$this->set("user_info",$temp);
$this->set("title","Copy User");	
}
if($this->request->is("post")){
$now = date('Y/m/d h:i:s');
$this->Tbl_user->set(array("registerDate"=>$now));//#Name registerDate
$this->Tbl_user->set(array("lastvisitDate"=>"0000/00/00 00:00:00"));//#Name lastvisitDate
$this->Tbl_user->set(array("created_at"=>"0000/00/00 00:00:00"));//#Name created_at
$this->Tbl_user->set(array("created_by"=>0));//#Name created_by
$this->Tbl_user->set(array("updated_at"=>"0000/00/00 00:00:00"));//#Name updated_at
$this->Tbl_user->set(array("updated_by"=>0));//#Name updated_by
$this->Tbl_user->set(array("usertype"=>1));//#Name usertype
$this->Tbl_user->set(array("activation"=>0));//#Name block
$this->Tbl_user->set(array("state"=>1));//#Name state
if($this->Tbl_user->save($this->request->data)){
//$this->saveLogs("Add username: ".$this->request->data["Tbl_user"]["username"],$now);
$this->redirect(array("action"=>"index"));
}
}
}
/**
 * Delete User
 * @return type
 */
public function admin_delete($id=null){
$temp=$this->Tbl_user->find("first",array("conditions"=>array("Tbl_user.id=".$id)));
if($temp["Tbl_user"]["id"]==""){
$this->redirect(array("action"=>"index"));
}else{
$now = date('Y/m/d h:i:s');
$this->Tbl_user->id=$id;
$this->Tbl_user->set(array("updated_at"=>$now));//#Name updated_at
$this->Tbl_user->set(array("updated_by"=>AuthComponent::user("id")));//#Name updated_by
$this->Tbl_user->set(array('activation'=>1));
$this->Tbl_user->set(array("state"=>0));
if($this->Tbl_user->save($this->request->data)){
//$this->saveLogs("Delete username: ".$temp["Tbl_user"]["username"],$now);
$this->redirect(array("action"=>"index"));
}
}
}
/**
 * Change Password
 * @return type
 */
public function admin_changepass($id=null){
if($this->request->is("post")){
if($this->Tbl_user->validates(array("fieldList"=>array("currentpassword","password","confirm_password")))){
$now = date('Y/m/d h:i:s');
$newPassword=$this->request->data["Tbl_user"]["password"];
$newPassword=Security::hash($newPassword,'blowfish');
$data=array("Tbl_user"=>array(
    "id"=>$id,
    "password"=>$newPassword
));
$this->Tbl_user->id=$id;
if($this->Tbl_user->save($data)){
$this->Session->setFlash($alertChangePass);
$this->redirect(array("action"=>"admin_logout"));
}
}else{
$errors=$this->Tbl_user->validationErrors;
}
}
}
///////////////////////////////////////////
public function admin_get_user_info_json(){
$this->layout=null;
$data=$this->Tbl_user->find("all");
$arr_encode=json_encode($data,true);
$this->set("user_info_json",$arr_encode);
$this->render("/users/admin_get_user_info_json");
//return $arr_encode;
}

public function saveLogs($action,$time){
	$this->Tbl_log->set(array(
		'action_name'=>$action,
		'time_at'=>$time,
		'user_id'=>AuthComponent::user('id')
	));
	$this->Tbl_logs->save();	
}
}
?>