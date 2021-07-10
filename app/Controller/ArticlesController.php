<?php
class ArticlesController extends AppController{
	var $uses=array("Tbl_article","Tbl_category");
	var $name="Articles";
	var $layout="admin";
	var $paginate=array();
	var $components = array('Upload');
	var $helpers=array("Session","Paginator");
	public function index(){
		$this->set("title","Cẩm Nang Đi Làm");
		$this->paginate=array(
			//'conditions'=>array(
				//'state'=>1
			//),
			'limit'=>1000,
			'order'=>array('id'=>'desc')
			,'recursive'=>-1
		);
		$data=$this->paginate("Tbl_article");
		$this->set("article_info",$data);
	}
	//Add new article
	public function admin_add(){
		$arrayCategories=$this->getAllCategories();
		$this->set('arrayCategories',$arrayCategories);	
		$this->layout="admin";
		$this->set("title","Add new article");
		if($this->request->is('Post')){
			$param=$this->data;
			$file = $param['Tbl_article']['images'];                                
                $destination = WWW_ROOT . 'img' . DS . 'articles' . DS;
                if(empty($file['name'])){
                    $param['Tbl_article']['images'] = '';
                }else{
                    $this->Upload->upload($file, $destination, null, null, null);
                    if($this->Upload->errors){
                        $this->Session->setFlash( implode('<br />',$this->Upload->errors) );
                        $this->redirect('/articles/admin_add');                        
                    }else{
                        $param['Tbl_article']['images'] = $this->Upload->result;
                    }
                }
			$now=date('Y/m/d H:i:s');
			$param['Tbl_article']['created_by']=AuthComponent::user('id');
			$param['Tbl_article']['updated_at']=$now;
			$param['Tbl_article']['updated_by']=AuthComponent::user('id');
			$this->Tbl_article->save($param['Tbl_article']);
			$this->redirect(array("action"=>"index"));
		}
	}
	//View article
	public function admin_view($id=null){
		$arrayCategories=$this->getAllCategories();
		$this->set('arrayCategories',$arrayCategories);	
		$this->checkExistId($id);
		$this->layout="admin";
		$this->set("title","View article");
		$this->set("article_info",$this->Tbl_article->find("all",
		array(
				"conditions"=>array(
					"Tbl_article.id=".$id
				)
			)
		));
	}
	//Copy article
	public function admin_copy($id=null){
		$arrayCategories=$this->getAllCategories();
		$this->set('arrayCategories',$arrayCategories);	
		$this->checkExistId($id);
		$this->layout="admin";
		$this->set("title","Copy article");
		$this->set("article_info",$this->Tbl_article->find("all",
		array(
				"conditions"=>array(
					"Tbl_article.id=".$id
				)
			)
		));
		if($this->request->is('Post')){
			$param=$this->data;
			$now=date('Y/m/d H:i:s');
			$param['Tbl_article']['created_by']=AuthComponent::user('id');
			$param['Tbl_article']['updated_at']=$now;
			$param['Tbl_article']['updated_by']=AuthComponent::user('id');
			$this->Tbl_article->save($param['Tbl_article']);
			$this->redirect(array('action'=>'index'));
		}
	}
	//Edit article
	public function admin_edit($id=null){
		$arrayCategories=$this->getAllCategories();
		$this->set('arrayCategories',$arrayCategories);	
		$this->checkExistId($id);
		$this->layout="admin";
		$this->set("title","Modify article");
		$this->set("article_info",$this->Tbl_article->find("all",
		array(
				"conditions"=>array(
					"Tbl_article.id=".$id
				)
			)
		));
		if($this->request->is('Post')){
			$param=$this->data;
			$now=date('Y/m/d H:i:s');
			$param['Tbl_article']['created_by']=AuthComponent::user('id');
			$param['Tbl_article']['updated_at']=$now;
			$param['Tbl_article']['updated_by']=AuthComponent::user('id');
			$param['Tbl_article']['id']=$id;
			if(!$this->Tbl_article->exists()){
				$this->Tbl_article->create();
			}
			$this->Tbl_article->save($param['Tbl_article']);
			$this->redirect(array('action'=>'index'));
		}
	}
	
	//Delete article
	public function admin_delete($id=null){
		$temp=$this->Tbl_article->find('first',array('conditions'=>array('Tbl_article.id='.$id)));
		if($temp['Tbl_article']['id']==""){
			$this->redirect(array('action'=>'index'));	
		}
		$param=$this->data;
		$now=date('Y/m/d H:i:s');
		$param['Tbl_article']['updated_at']=$now;
		$param['Tbl_article']['updated_by']=AuthComponent::user('id');
		$param['Tbl_article']['state']=0;
		$param['Tbl_article']['id']=$id;
		if(!$this->Tbl_article->exists()){
			$this->Tbl_article->create();
		}
		$this->Tbl_article->save($param['Tbl_article']);
		$this->redirect(array('action'=>'index'));
	}
	//Export to JSON data
	public function admin_json_data_get_all_articles(){
		$this->layout="";
		$data=$this->Tbl_article->find("all"
			//,array(
				//"conditions"=>array(
					//"Tbl_article.catid=7"
				//)
			//)
		);
		//$arr_encode=json_encode($data);
		$this->set("article_info_json",$data);
	}
	function admin_changeStatus($id=null,$value=null){
		$temp=$this->Tbl_article->find('first',array('conditions'=>array(
			'Tbl_article.id='.$id)));
		if($temp['Tbl_article']['id']==""){
			$this->redirect(array('action'=>'index'));	
		}
		//print_r($this->data); die();
		$param['Tbl_article']['id']=$id; //echo $param['Tbl_category']['id']; die();
		if($value=='hide'){
			$param['Tbl_article']['state']=0;
		}else{
			$param['Tbl_article']['state']=1;
		}
		//$this->Tbl_category->read(null,1);
		$this->Tbl_article->set(array(
			'id'=>$id
			,'id'=>$id
			,'state'=>$param['Tbl_article']['state']
		));
		//print_r($param['Tbl_category']);die();
		$this->Tbl_article->save();
		$this->redirect(array('action'=>'index'));
	}
	function checkExistId($id){
		if(is_numeric($id)){
			$data=$this->Tbl_article->find('first',array(
				'conditions'=>array(//'published=1 AND 
				'Tbl_article.id='.$id),
				'recursive'=>-1
				)
			);
			if(count($data)==0){
				$this->redirect('/articles');	
			}else{
				$this->set('data',$data);
			}
		}else{
			$this->redirect('/articles');	
		}	
	}
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