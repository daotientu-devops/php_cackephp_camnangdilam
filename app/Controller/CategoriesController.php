<?php
class CategoriesController extends AppController{
var $uses=array("Tbl_category","Tbl_log");
var $name="Categories";
var $layout="admin";
//var $helpers=array('Session','Paginator');
var $component=array('PostUrl','StringTag','Session','RequestHandler');
//Lấy list category trong admin
public function index(){
$this->set("title","Cẩm Nang Đi Làm");
$rows=$this->getListCategoryInAdmin(0);
$this->set("cat",$rows);
}
//Thêm category trong admin
public function admin_add(){
	$arrayCategories=$this->getAllCategories();
	$this->set('arrayCategories',$arrayCategories);
$this->layout="admin";
$this->set("title","Add category");
$this->set("sb",$this->Tbl_category->find("all",array(
    "conditions"=>array(
        "Tbl_category.parent_id"=>0,
        "published"=>1
    )
)));
if($this->request->is("post")){
$arr=$this->data["Tbl_category"];//lấy dữ liệu trong bảng tbl_categories
//print_r($arr); die();
//if($arr["category_name"]==null){
//$this->redirect(array("action"=>"admin_add"));
//}
$now = date('Y/m/d h:i:s');
$this->Tbl_category->set("category_name",$arr["category_name"]);
$this->Tbl_category->set("icon",$arr["icon"]);
$this->Tbl_category->set("description",$arr["description"]);
$this->Tbl_category->set("created_at",$now);
$this->Tbl_category->set("created_by",AuthComponent::user("id"));
$this->Tbl_category->set("updated_at",$now);
$this->Tbl_category->set("updated_by",AuthComponent::user("id"));

$this->Tbl_category->set("published",1);
if($arr["parent_id"]==NULL){
    $this->Tbl_category->set("parent_id",0);
}else{
    $this->Tbl_category->set("parent_id",$arr["parent_id"]);
}
$this->Tbl_category->save();
$this->saveLogs("Add category: ".$arr["category_name"],$now);
$this->redirect(array("action"=>"index"));
}
}
/**
* View category
*/
public function admin_view($id=null){
	$arrayCategories=$this->getAllCategories();
	$this->set('arrayCategories',$arrayCategories);
	$this->checkExistId($id);
	$this->layout="admin";
	$this->set("title","View category");
	$this->set("category_info",$this->Tbl_category->find("all",
    array(
            "conditions"=>array(
                "Tbl_category.id=".$id
            )
        )
    ));
	/*$this->set("parent_id",$this->Tbl_category->find("list",
    array(
            "conditions"=>array(
				"Tbl_category.parent_id"=>0
                ,"published"=>1
            )
        )
    ));*/
}
/**
* Copy category
*/
public function admin_copy($id=null){
	$arrayCategories=$this->getAllCategories();
	$this->set('arrayCategories',$arrayCategories);
	$this->checkExistId($id);
	$this->layout="admin";
	$this->set("title","Copy category");
	$this->set("category_info",$this->Tbl_category->find("all",
    array(
            "conditions"=>array(
                "Tbl_category.id=".$id
            )
        )
    ));
	if($this->request->is("post")){
$arr=$this->data["Tbl_category"];//lấy dữ liệu trong bảng tbl_categories
//print_r($arr); die();
//if($arr["category_name"]==null){
//$this->redirect(array("action"=>"admin_add"));
//}
$now = date('Y/m/d h:i:s');
$this->Tbl_category->set("category_name",$arr["category_name"]);
$this->Tbl_category->set("icon",$arr["icon"]);
$this->Tbl_category->set("description",$arr["description"]);
$this->Tbl_category->set("created_at",$now);
$this->Tbl_category->set("created_by",AuthComponent::user("id"));
$this->Tbl_category->set("updated_at",$now);
$this->Tbl_category->set("updated_by",AuthComponent::user("id"));

$this->Tbl_category->set("published",1);
if($arr["parent_id"]==NULL){
    $this->Tbl_category->set("parent_id",0);
}else{
    $this->Tbl_category->set("parent_id",$arr["parent_id"]);
}
$this->Tbl_category->save();
$this->saveLogs("Add category: ".$arr["category_name"],$now);
$this->redirect(array("action"=>"index"));
}
}
/**
Edit category
*/
public function admin_edit($id=null){
$arrayCategories=$this->getAllCategories();
$this->set('arrayCategories',$arrayCategories);
$this->checkExistId($id);//Kiểm tra sự tồn tại của ID
$this->layout="admin";
$this->set("title","Update category");
$this->set("category_info",$this->Tbl_category->find("all",
    array(
            "conditions"=>array(
                "Tbl_category.id=".$id
            )
        )
    ));
$this->set("parent_id",$this->Tbl_category->find("list",
    array(
            "conditions"=>array(
                "published"=>1
            )
        )
    ));
if($this->request->is("post")){
$arr=$this->data["Tbl_category"];    
    /*if($arr["category_name"]==null){
        $this->redirect(array("action"=>"index"));
    }*/
    $now = date('Y/m/d h:i:s');
	if($arr["parent_id"]==NULL){
		$parent_id=0;
	}else{
		$parent_id=$arr["parent_id"];
	}
    $data=array(
        "Tbl_category"=>array(
            "id"=>$id,
            "category_name"=>$arr["category_name"],
            "icon"=>$arr["icon"],
            "description"=>$arr["description"],
            "created_at"=>$now,
            "created_by"=>AuthComponent::user("id"),
            "updated_at"=>$now,
            "updated_by"=>AuthComponent::user("id"),
            "published"=>$arr["published"],
            "parent_id"=>$parent_id
        )
    );
    $this->Tbl_category->categoryid=$id;
    if(!$this->Tbl_category->exists()){
        $this->Tbl_category->create();
    }
    $this->Tbl_category->save($data);
    $this->saveLogs("Edit category: ".$arr["category_name"],$now);
    $this->redirect(array("action"=>"index"));
}   
}
//Delete category
public function admin_delete($id=null){
    $this->checkExistId($id);
    $data=$this->Tbl_category->find("all",
        array(
            "conditions"=>array(
                "published=1 AND Tbl_category.id=".$id
            ),
            "recursive"=>-1
        )
    );
    $arr=array(); 
    $arr["id"]=$id;
    $arr["published"]=0;
    $this->Tbl_category->id=$id;
    if(!$this->Tbl_category->exists()){
        $this->Tbl_category->create();
    }
    //$now = date('Y/m/d h:i:s');
    $now=date("Y/m/d h:i:s");
    $this->Tbl_category->save($arr);
    $this->saveLogs("Delete category: ".$arr["category_name"],$now);
    $this->redirect(array("action"=>"index"));
}
function admin_changeStatus($id=null,$value=null){
    $temp=$this->Tbl_category->find('all',array('conditions'=>array(
		'Tbl_category.id='.$id)));
	if($temp['Tbl_category']['id']==""){
		$this->redirect(array('action'=>'index'));	
	}
	//print_r($this->data); die();
	$param['Tbl_category']['id']=$id; //echo $param['Tbl_category']['id']; die();
	if($value=='hide'){
		$param['Tbl_category']['published']=0;
	}else{
		$param['Tbl_category']['published']=1;
	}
	//$this->Tbl_category->read(null,1);
	$this->Tbl_category->set(array(
		'id'=>$id
		//,'id'=>$id
		,'published'=>$param['Tbl_category']['published']
	));
	//print_r($param['Tbl_category']);die();
	$this->Tbl_category->save();
	$this->redirect(array('action'=>'index'));
}
//Kiem tra su ton tai cua category id truyen vao
function checkExistId($id){
    //Kiem tra id truyen vao de lay chi tiet danh muc
    if(is_numeric($id)){
		$data=$this->Tbl_category->find('first',array(
			'conditions'=>array(//'published=1 AND 
			'Tbl_category.id='.$id),
			'recursive'=>-1
			)
		);
		if(count($data)==0){
			$this->redirect('/categories');	
		}else{
			$this->set('data',$data);
		}
	}else{
		$this->redirect('/categories');	
	}
}
//Luu lich su
function saveLogs($action,$time){
    $this->Tbl_log->set(array(
        'action_name'=>$action,
        'time_at'=>$time,
        'user_id'=>AuthComponent::user("id")
    ));
    $this->Tbl_log->save();
}
//Sử dụng thuật toán đệ quy để lấy list category
public function getListCategoryInAdmin($parent_id=0,$html="",$kq=null){
    if(!$kq)
        $kq=array();
        $rows=$this->Tbl_category->find("all",array(
            'conditions'=>array(
                //'published'=>1,
                'parent_id'=>$parent_id
            )
			,'limit'=>'100'
			,'order'=>array('id'=>'asc')
        ));
        if(count($rows)>0){
            foreach($rows as $row){
                $kq[]=array(
                    'id'=>$row['Tbl_category']['id'],
                    'category_name'=>$row['Tbl_category']['category_name'],
                    'published'=>$row['Tbl_category']['published'],
                    'ordering'=>$row['Tbl_category']['ordering']
                );
                $kq=$this->getListCategoryInAdmin($row['Tbl_category']['id'],$html.'&nbsp;&nbsp;-- ',$kq);
            }
        }
        return $kq;
}
public function admin_get_category_info_json(){
    $this->layout=null;
    $data=$this->Tbl_category->find("all");
    $arr_encode=json_encode($data,true);
	//echo "<pre/>";
    $this->set("category_info_json",$arr_encode);
    //$this->render("/categories/admin_get_category_info_json");
}
//////////////////////////////////
function getAllCategories(){
	$arrayCat=$this->Tbl_category->find('all',array(
		'conditions'=>array('published'=>1)
	));
	$kq=array();
	foreach($arrayCat as $row){
		$kq[$row['Tbl_category']['id']]=$row['Tbl_category']['category_name'];
		foreach($arrayCat as $sub){
			if($row['Tbl_category']['id']==$sub['Tbl_category']['parent_id']){
				$kq[$sub['Tbl_category']['id']]=$sub['Tbl_category']['category_name'];
			}
		}
	}
	return $kq;
}
}
?>