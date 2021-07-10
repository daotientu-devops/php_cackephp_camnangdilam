
<section class="content-header">
<h1>View article
<small>Preview</small></h1>
	<ol class="breadcrumb">
		<li><a href="/camnangdilam"><i class="fa fa-dashboard"></i>Home</a></li>
		<li><a href="/camnangdilam/articles">Articles</a></li>
		<li class="active">View article</li>
	</ol>
</section>
					<?php 
						echo $this->Form->create(array('id'=>'appForm','enctype'=>'multipart/form-data','inputDefaults'=>array('label'=>false,'div'=>false)));
					?>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title">Chi tiết</h3>
				</div>
				<div class="box-body">
						<div class="form-group" >
							<label>Title</label>
							<?php foreach ($article_info as $article_info) {
								# code...
							}?>
							<!--<input type="text" class="form-control" placeholder="Enter..." value="<?php //echo $category_info['Tbl_category']['category_name']; ?>" disabled/>-->
							<?php
								echo $this->Form->input('title',array('type'=>'text','class'=>'form-control','id'=>'title','value'=>$article_info['Tbl_article']['title'],'disabled'=>true));
							?>
						</div>
						<div class="form-group" >
							<label>Category</label>
							<?php //print_r($parent_id);
								//echo $this->Form->select('parent_id',$parent_id,array('empty'=>array('0'=>'--Main--'),'default'=>$category_info['Tbl_category']['parent_id'],'class'=>'form-control'));
								echo $this->Form->input('catid',array('options'=>$arrayCategories,'empty'=>'--Main--','value'=>$article_info['Tbl_article']['catid'],'class'=>'form-control','disabled'=>true));
							?>
						</div>
						<div class="form-group" style="width:20%;">
							<label>Status</label> 
							<?php 
								echo $this->Form->input('state',array('type'=>'select','options'=>array(1=>'Hiển thị',0=>'Ẩn'),'empty'=>'--Select--','selected'=>$article_info['Tbl_article']['state'],'class'=>'form-control','disabled'=>true))
							?>
						</div>	
						<div class="form-group" style="width:10%;">
							<label>ID</label>
							<?php
								echo $this->Form->input('_id',array('type'=>'text','class'=>'form-control','id'=>'_id','value'=>$article_info['Tbl_article']['id'],'disabled'=>true));
							?>
						</div>
						<div class="form-group">
							<label>Current Image</label><br/>
							<?php
								echo $this->Html->image('articles/'.$article_info['Tbl_article']['images'],array('alt'=>$article_info['Tbl_article']['images'],'width'=>'150px'));
							?>
						</div>
						<div class="form-group" >
							<label>Summary</label>
							<?php
								echo $this->Form->textarea('summary',array('class'=>'form-control','id'=>'summary','value'=>$article_info['Tbl_article']['summary'],'rows'=>3,'cols'=>80,'disabled'=>true));
							?>
						</div>
						<div class="form-group" >
							<label>Content</label>
							<?php
								echo $this->Form->textarea('content',array('class'=>'form-control ckeditor','id'=>'editor1','value'=>$article_info['Tbl_article']['content'],'rows'=>10,'cols'=>80,'disabled'=>true));
							?>
						</div>
				</div>
			</div>
		</div>
		<!---->
		<div class="col-md-3">
			<div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Tùy chọn xuất bản</h3>
                </div>
                <div class="box-body">
                	<div class="form-group">
						<label>Created By</label>
						<?php
							echo $this->Form->input('created_by',array('type'=>'text','class'=>'form-control','id'=>'created_by','value'=>$article_info['Tbl_article']['created_by'],'disabled'=>true));
						?>
					</div>
					<div class="form-group">
						<label>Created By Alias</label>
						<?php
							echo $this->Form->input('created_by_alias',array('type'=>'text','class'=>'form-control','id'=>'created_by_alias','value'=>$article_info['Tbl_article']['created_by_alias'],'disabled'=>true));
						?>
					</div>
					<div class="form-group">
						<label>Created Date</label>
						<?php
							echo $this->Form->input('created_at',array('type'=>'text','class'=>'form-control','id'=>'created_at','value'=>$article_info['Tbl_article']['created_at'],'disabled'=>true));
						?>
					</div>
					<div class="form-group">
						<label>Updated By</label>
						<?php
							echo $this->Form->input('updated_by',array('type'=>'text','class'=>'form-control','id'=>'updated_by','value'=>$article_info['Tbl_article']['updated_by'],'disabled'=>true));
						?>
					</div>
					<div class="form-group">
						<label>Updated Date</label>
						<?php
							echo $this->Form->input('updated_at',array('type'=>'text','class'=>'form-control','id'=>'updated_at','value'=>$article_info['Tbl_article']['updated_at'],'disabled'=>true));
						?>
					</div>
                </div>
            </div>
        </div>
        <!---->
		</div>
	</div>
</section>

					<?php 
    					echo $this->Form->end();
					?>