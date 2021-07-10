
<section class="content-header">
<h1>Add new article
<small>Preview</small></h1>
	<ol class="breadcrumb">
		<li><a href="/camnangdilam"><i class="fa fa-dashboard"></i>Home</a></li>
		<li><a href="/camnangdilam/articles">Articles</a></li>
		<li class="active">Add new article</li>
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
							<!--<input type="text" class="form-control" placeholder="Enter..." value="<?php //echo $category_info['Tbl_category']['category_name']; ?>" disabled/>-->
							<?php
								echo $this->Form->input('title',array('type'=>'text','class'=>'form-control','id'=>'title'));
							?>
						</div>
						<div class="form-group" >
							<label>Category</label>
							<?php //print_r($parent_id);
								//echo $this->Form->select('parent_id',$parent_id,array('empty'=>array('0'=>'--Main--'),'default'=>$category_info['Tbl_category']['parent_id'],'class'=>'form-control'));
								echo $this->Form->input('catid',array('options'=>$arrayCategories,'empty'=>'--Main--','class'=>'form-control'));
							?>
						</div>
						<div class="form-group" style="width:20%;">
							<label>Status</label> 
							<?php 
								echo $this->Form->input('state',array('type'=>'select','options'=>array(1=>'Hiển thị',0=>'Ẩn'),'empty'=>'--Select--','class'=>'form-control'))
							?>
						</div>	
						<div class="form-group">
							<label>Image</label><br/>
							<?php
								echo $this->Form->file('images',array('class'=>'','id'=>'images'));
							?>
						</div>
						<div class="form-group" >
							<label>Summary</label>
							<?php
								echo $this->Form->textarea('summary',array('class'=>'form-control','id'=>'summary','rows'=>3,'cols'=>80));
							?>
						</div>
						<div class="form-group" >
							<label>Content</label>
							<?php
								echo $this->Form->textarea('content',array('class'=>'form-control ckeditor','id'=>'editor1','rows'=>10,'cols'=>80));
							?>
						</div>
				</div>
				<div class="box-footer">
                	<button type="submit" class="btn btn-primary">Submit</button>
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
							echo $this->Form->input('created_by',array('type'=>'text','class'=>'form-control','id'=>'created_by','value'=>$current_user['name'],'disabled'=>true));
						?>
					</div>
					<div class="form-group">
						<label>Created By Alias</label>
						<?php
							echo $this->Form->input('created_by_alias',array('type'=>'text','class'=>'form-control','id'=>'created_by_alias'));
						?>
					</div>
					<div class="form-group">
						<label>Created Date</label>
						<?php
							echo $this->Form->input('created_at',array('type'=>'text','class'=>'form-control datetimepicker','id'=>'created_at'));
						?>
					</div>
					<!-- <div class="form-group">
						<label>Updated By</label>
						<?php
							echo $this->Form->input('updated_by',array('type'=>'text','class'=>'form-control','id'=>'updated_by','value'=>$article_info['Tbl_article']['updated_by']));
						?>
					</div>
					<div class="form-group">
						<label>Updated Date</label>
						<?php
							echo $this->Form->input('updated_at',array('type'=>'text','class'=>'form-control','id'=>'updated_at','value'=>$article_info['Tbl_article']['updated_at']));
						?>
					</div> -->
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