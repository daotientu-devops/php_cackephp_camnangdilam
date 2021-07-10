<?php
class AdminController extends AppController{
var $name="Admin";
var $layout="admin";
public function index(){
    $this->set("title","Cẩm Nang Đi Làm");
}
}
?>