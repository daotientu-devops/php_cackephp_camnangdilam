<!-- Content Header (Page header) -->
<script type="text/javascript">
    $("ul.sidebar-menu").find("li#menu_item_user").addClass("active");
</script>
<section class="content-header">
<h1>User Manager
<small>Edit User</small></h1>
	<ol class="breadcrumb">
		<li><a href="/camnangdilam"><i class="fa fa-dashboard"></i>Home</a></li>
		<li><a href="/camnangdilam/users">Users</a></li>
		<li class="active">Edit User</li>
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
					<h3 class="box-title">Account Details</h3>
				</div>
				<div class="box-body">
						<div class="form-group" >
							<label>Name</label>
							<?php foreach ($user_info as $user_info) {
								# code...
							}?>
							<?php //print_r($user_info);
								echo $this->Form->input('name',array('type'=>'text','class'=>'form-control','id'=>'name','value'=>$user_info['name']));
							?>
						</div>
						<div class="form-group" >
							<label>Login Name</label>
							<?php 
								echo $this->Form->input('username',array('type'=>'text','class'=>'form-control','id'=>'username','value'=>$user_info['username']));	
							?>
						</div>
<!--
						<div class="form-group" >
							<label>Password</label>
							<?php 
								//echo $this->Form->input('password',array('type'=>'password','class'=>'form-control','id'=>'password','value'=>$user_info['password']));	
							?>
						</div>
						<div class="form-group" >
							<label>Confirm Password</label>
							<?php 
								//echo $this->Form->input('confirm_password',array('type'=>'password','class'=>'form-control','id'=>'confirm_password'));	
							?>
						</div>
-->
						<div class="form-group" >
							<label>Email</label>
							<?php 
								echo $this->Form->input('email',array('type'=>'text','class'=>'form-control','id'=>'email','value'=>$user_info['email']));	
							?>
						</div>
						<div class="form-group" >
							<label>Registration Date</label>
							<?php 
								echo $this->Form->input('registerDate',array('type'=>'text','class'=>'form-control','id'=>'registerDate','value'=>$user_info['registerDate'],'disabled'=>true));	
							?>
						</div>
						<div class="form-group" >
							<label>Last Visit Date</label>
							<?php 
								echo $this->Form->input('lastvisitDate',array('type'=>'text','class'=>'form-control','id'=>'lastvisitDate','value'=>$user_info['lastvisitDate'],'disabled'=>true));	
							?>
						</div>
						<div class="form-group" style="width:20%;">
							<label>Status</label> 
							<?php 
								echo $this->Form->input('status',array('type'=>'select','options'=>array(1=>'Yes',0=>'No'),'empty'=>'--Select--','selected'=>$user_info['status'],'class'=>'form-control'));
							?>
						</div>	
						<div class="form-group" style="width:20%;">
							<label>Active this User</label> 
							<?php 
								echo $this->Form->input('activation',array('type'=>'select','options'=>array(1=>'Yes',0=>'No'),'empty'=>'--Select--','selected'=>$user_info['activation'],'class'=>'form-control'));
							?>
						</div>
						<div class="form-group" style="width:10%;">
							<label>ID</label>
							<?php
								echo $this->Form->input('_id',array('type'=>'text','class'=>'form-control','id'=>'_id','value'=>$user_info['id'],'disabled'=>true));
							?>
						</div>
						<div class="form-group" >
							<label>User Type</label>
							<?php
								echo $this->Form->input('usertype',array('type'=>'select','options'=>array(0=>'Admin',1=>'Staff'),'empty'=>'--Select--','selected'=>$user_info['usertype'],'class'=>'form-control'))
							?>
						</div>
				</div>
				<div class="box-footer">
                	<button type="submit" class="btn btn-primary">Submit</button>
                </div>
			</div>
		</div>
		<!---->
<!--
		<div class="col-md-6">
			<div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Publishing Options</h3>
                </div>
                <div class="box-body">
                	<div class="form-group" style="width:50%;">
						<label>Created By</label>
						<?php
							//echo $this->Form->input('created_by',array('type'=>'text','class'=>'form-control','id'=>'created_by','value'=>$user_info['created_by'],'disabled'=>true));
						?>
					</div>
					<div class="form-group" style="width:50%;">
						<label>Created Date</label>
						<?php
							//echo $this->Form->input('created_at',array('type'=>'text','class'=>'form-control','id'=>'created_at','value'=>$user_info['created_at']));
						?>
					</div>
                </div>
            </div>
        </div>
-->
        <!---->
		</div>
	</div>
</section>

					<?php 
    					echo $this->Form->end();
					?>