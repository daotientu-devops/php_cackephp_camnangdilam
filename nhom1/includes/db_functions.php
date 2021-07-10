<?php
class DB_FUNCTIONS{
	private $db;
	//put your code here
	//constructor
	function __construct(){
		require_once "../config.d/db_connect.php";
		//connecting to database
		$this->db=new DB_CONNECT();
		$this->db->connect();
	}
	//destructor
	function __destruct(){

	}
	/**
	* Registering new information through E-mail
	*/
	public function registerEmail($email){ 
		$current=date("Y-m-d h:i:s");
		$result=mysql_query("INSERT INTO tbl_users(name,username,email,password,usertype,state,activation,registerDate,lastvisitDate,created_at,created_by,updated_at,updated_by) 
			VALUES('','','$email','',2,1,0,'$current','$current','$current',0,'$current',0)");

		//check for successful registry
		if($result){
			$id=mysql_insert_id();//last inserted id
			$result=mysql_query("SELECT * FROM tbl_users WHERE _id=$id");
			//return user details
			return mysql_fetch_array($result);
		}else{
			return false;
		}
	}
	/**
	* Check user is existed or not
	*/
	public function isUserExisted($email){
		$result=mysql_query("SELECT * FROM tbl_users WHERE email='$email'");
		$num_rows=mysql_num_rows($result);
		if($num_rows>0){
			//user existed
			return true;
		}else{
			//user is not existed
			return false;
		}
	}
}
?>