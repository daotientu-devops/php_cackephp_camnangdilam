<?php
/**
* File to handle all API requests
* Accepts GET and POST
* Each request will be indentified by TAG
* Response will be JSON data
*/
/**
* check for POST request
*/
if(isset($_GET['tag']) && $_GET['tag']!=''){
	//get tag
	$tag=$_GET['tag'];
	//include db handler
	require_once '../includes/db_functions.php';
	$db=new DB_FUNCTIONS();
	//response Array
	$response=array("tag"=>$tag,"success"=>0,"error"=>0);
	//check for tag type
	if($tag=='login'){

	}else if($tag=='register'){
		//Request type is register new email
		$email=$_GET['email']; //echo $email;
		//check if user is already existed
		if($db->isUserExisted($email)){
			//user is already existed - error response
			$response["error"]=2;
			$response["error_msg"]="User already existed";
			echo json_encode($response);
		}else{
			//register email
			$user=$db->registerEmail($email);
			if($user!=false){
				//user stored successfully
				$response["success"]=0;
				$response["_id"]=$user["_id"];
				$response["user"]["name"]=$user["name"];
				$response["user"]["username"]=$user["username"];
				$response["user"]["email"]=$user["email"];
				$response["user"]["password"]=$user["password"];
				$response["user"]["usertype"]=$user["usertype"];
				$response["user"]["state"]=$user["state"];
				$response["user"]["activation"]=$user["activation"];
				$response["user"]["registerDate"]=$user["registerDate"];
				$response["user"]["lastvisitDate"]=$user["lastvisitDate"];
				$response["user"]["created_at"]=$user["created_at"];
				$response["user"]["created_by"]=$user["created_by"];
				$response["user"]["updated_at"]=$user["updated_at"];
				$response["user"]["updated_by"]=$user["updated_by"];
				echo json_encode($response);
			}else{
				//user failed to store
				$response["error"]=1;
				$response["error_msg"]="Error occured in Registration";
				echo json_encode($response);
			}
		}
	}else{
		echo "Invalid Request";
	}
}else{
	echo "Access Denied";
}
?>