<?php
/*
 * Following code will list all the categories
*/
//array for JSON response
$response=array();
//include db connect class
require_once '../config.d/db_connect.php';
//connecting to db
$db=new DB_CONNECT();
mysql_query("set names 'utf8'");
//get all categories from categories table
$result=mysql_query("SELECT * FROM tbl_categories") or die(mysql_error());
//check for empty result
if(mysql_num_rows($result)>0){
    //Looping through all results
    //categories node
    $response["categories"]=array();
    while($row=mysql_fetch_array($result)){
        //temp user array
        $category=array();
        $category["category_id"]=$row["category_id"];
        $category["category_name"]=$row["category_name"];
        $category["icon"]=$row["icon"];
        //$category["description"]=$row["description"];
        $category["created_at"]=$row["created_at"];
        $category["created_by"]=$row["created_by"];
        $category["updated_at"]=$row["updated_at"];
        $category["updated_by"]=$row["updated_by"];
        $category["ordering"]=$row["ordering"];
        $category["published"]=$row["published"];
        $category["parent_id"]=$row["parent_id"];

        //push single categories into final response array
        array_push($response["categories"]
                    ,$category
                    );
        //print_r($category["name"]);
    }
    //header("Content-type: application/json; charset=utf-8");
    //success
    //$response["success"]=1;
    //echoing JSON response
    $response= json_encode($response);
    //print_r($response);
    //print_r(json_decode($response));
    echo $response;
}else{
    //no products found
    $response["success"]=0;
    $response["message"]="No categories found";
    //echo no users JSON
    echo json_encode($response);
}
?>