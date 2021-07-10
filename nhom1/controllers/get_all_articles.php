<?php
/*
* Following code will get single articles details A article is identified by id
*/
//array for JSON response
$response=array();
//include db connect class
require_once '../config.d/db_connect.php';
//connecting to db
$db=new DB_CONNECT();
mysql_query("set names 'utf8'");
//check for post data
//if(isset($_GET["catid"])){
    //$catid=$_GET["catid"];
    //get a article from list articles table
    $result=mysql_query("SELECT * FROM tbl_articles");// WHERE catid=$catid");
    if(!empty($result)){
        //check for empty result
		
            //article node
            $response["Articles"]=array();
        if(mysql_num_rows($result)>0){//echo mysql_num_rows($result);
            while($row=mysql_fetch_array($result)){
			//print_r($row);
            $article=array();
            $article["id"]=$row["id"];
            $article["title"]=$row["title"];
			$article["summary"]=$row["summary"];
            $article["content"]=$row["content"];
            $article["state"]=$row["state"];
            $article["created_at"]=$row["created_at"];
            $article["created_by"]=$row["created_by"];
			$article["created_by_alias"]=$row["created_by_alias"];
            $article["updated_at"]=$row["updated_at"];
            $article["updated_by"]=$row["updated_by"];
            $article["images"]=$row["images"];
            $article["ordering"]=$row["ordering"];
            $article["catid"]=$row["catid"];
            //success
            //$response["success"]=1;
            array_push($response["Articles"],$article);
			}
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
//}else{
  //required field is missing
  //$response["success"]=0;
  //$response["message"]="Required field(s) is missing";
  //echoing JSON response
  //echo json_encode($response);
//}
?>