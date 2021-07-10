<?php
/**
* Following code will get single article details
* A article is identified by article id (id)
*/
//array for JSON response
$response=array();
//include db connect class
require_once "../config.d/db_connect.php";
//connecting to db
$db=new DB_CONNECT();
mysql_query("set names 'utf8'");
//check for get data
if(isset($_GET['artid'])){
    $artid=$_GET['artid'];
    //get a article from articles table
    $result=mysql_query("SELECT * FROM tbl_articles WHERE _id=$artid");
     if(!empty($result)){
        //check for empty result
        if(mysql_num_rows($result)>0){
            $row=mysql_fetch_array($result);
            $article=array();
            $article["_id"]=$row["_id"];
            $article["title"]=$row["title"];
			$article["summary"]=$row["summary"];
            $article["content"]=$row["content"];
            $article["state"]=$row["state"];
            $article["created_at"]=$row["created_at"];
            $article["created_by"]=$row["created_by"];
            $article["updated_at"]=$row["updated_at"];
            $article["updated_by"]=$row["updated_by"];
            $article["images"]=$row["images"];
            $article["ordering"]=$row["ordering"];
            $article["catid"]=$row["catid"]; //print_r ($article);
            //success
            //$response["success"]=1;
            //user node
            $response["Articles"]=array();
            array_push($response["Articles"],$article);
            //echoing JSON response
            echo json_encode($response);
        }else{
            //no product found
            $response["success"]=0;
            $response["message"]="No article found";
            //echo no users JSON
            echo json_encode($response);
        }
    }else{
      //no product found
      $response["success"]=0;
      $response["message"]="No article found";
      //echo no users JSON
      echo json_encode($response);
    }
}else{
  //required field is missing
  $response["success"]=0;
  $response["message"]="Required field(s) is missing";
  //echoing JSON response
  echo json_encode($response);
}
?>