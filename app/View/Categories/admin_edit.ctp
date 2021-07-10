
<section class="content-header">
<h1>Edit category
<small>Preview</small></h1>
	<ol class="breadcrumb">
		<li><a href="/camnangdilam"><i class="fa fa-dashboard"></i>Home</a></li>
		<li><a href="/camnangdilam/categories">Categories</a></li>
		<li class="active">Edit category</li>
	</ol>
</section>
					<?php 
						echo $this->Form->create(array('id'=>'appForm','enctype'=>'multipart/form-data','inputDefaults'=>array('label'=>false,'div'=>false)));
					?>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title">Chi tiết</h3>
				</div>
				<div class="box-body">
						<div class="form-group" >
							<label>Tên danh mục</label>
							<?php foreach ($category_info as $category_info) {
								# code...
							}?>
							<!--<input type="text" class="form-control" placeholder="Enter..." value="<?php //echo $category_info['Tbl_category']['category_name']; ?>" disabled/>-->
							<?php
								echo $this->Form->input('category_name',array('type'=>'text','class'=>'form-control','id'=>'category_name','value'=>$category_info['Tbl_category']['category_name']));
							?>
						</div>
						<div class="form-group" >
							<label>Loại danh mục</label>
							<?php //print_r($parent_id);
								//echo $this->Form->select('parent_id',$parent_id,array('empty'=>array('0'=>'--Main--'),'default'=>$category_info['Tbl_category']['parent_id'],'class'=>'form-control'));
								echo $this->Form->input('parent_id',array('options'=>$arrayCategories,'empty'=>'--Main--','value'=>$category_info['Tbl_category']['parent_id'],'class'=>'form-control'));
							?>
						</div>
						<div class="form-group" style="width:20%;">
							<label>Trạng thái</label> 
							<?php 
								echo $this->Form->input('published',array('type'=>'select','options'=>array(1=>'Hiển thị',0=>'Ẩn'),'empty'=>'--Select--','selected'=>$category_info['Tbl_category']['published'],'class'=>'form-control'))
							?>
						</div>	
						<div class="form-group" style="width:10%;">
							<label>ID</label>
							<?php
								echo $this->Form->input('_id',array('type'=>'text','class'=>'form-control','id'=>'_id','value'=>$category_info['Tbl_category']['id'],'disabled'=>true));
							?>
						</div>
						<div class="form-group" >
							<label>Mô tả</label>
							<?php
								echo $this->Form->textarea('description',array('class'=>'form-control','id'=>'description','value'=>$category_info['Tbl_category']['description'],'rows'=>3));
							?>
						</div>
				</div>
                <div class="box-footer">
                	<button type="submit" class="btn btn-primary">Submit</button>
                </div>
			</div>
		</div>
		<!---->
		<div class="col-md-6">
			<div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Tùy chọn xuất bản</h3>
                </div>
                <div class="box-body">
                	<div class="form-group" style="width:50%;">
						<label>Created By</label>
						<?php
							echo $this->Form->input('created_by',array('type'=>'text','class'=>'form-control','id'=>'created_by','value'=>$category_info['Tbl_category']['created_by'],'disabled'=>true));
						?>
					</div>
					<div class="form-group" style="width:50%;">
						<label>Created Date</label>
						<?php
							echo $this->Form->input('created_at',array('type'=>'text','class'=>'form-control','id'=>'created_at','value'=>$category_info['Tbl_category']['created_at'],'disabled'=>true));
						?>
					</div>
					<!--<div class="form-group" style="width:50%;">
						<label>Updated By</label>
						<?php
							//echo $this->Form->input('updated_by',array('type'=>'text','class'=>'form-control','id'=>'updated_by','value'=>$category_info['Tbl_category']['updated_by']));
						?>
					</div>
					<div class="form-group" style="width:50%;">
						<label>Updated Date</label>
						<?php
							//echo $this->Form->input('updated_at',array('type'=>'text','class'=>'form-control','id'=>'updated_at','value'=>$category_info['Tbl_category']['updated_at']));
						?>
					</div>-->
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