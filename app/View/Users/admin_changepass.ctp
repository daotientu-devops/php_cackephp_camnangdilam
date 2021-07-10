<section class="content-header">
<h1>User Manager
<small>Change Password</small></h1>
	<ol class="breadcrumb">
		<li><a href="/camnangdilam"><i class="fa fa-dashboard"></i>Home</a></li>
		<li><a href="/camnangdilam/users">Users</a></li>
		<li class="active">Change Password</li>
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
							<label>Old password</label>
							<?php //print_r($user_info);
								echo $this->Form->input('currentpassword',array('type'=>'password','class'=>'form-control'));
							?>
						</div>
						<div class="form-group" >
							<label>New password</label>
							<?php 
								echo $this->Form->input('password',array('type'=>'password','class'=>'form-control'));	
							?>
						</div>
						<div class="form-group" >
							<label>Confirm password</label>
							<?php 
								echo $this->Form->input('confirm_password',array('type'=>'password','class'=>'form-control'));	
							?>
						</div>
				</div>
				<div class="box-footer">
                	<button type="submit" class="btn btn-primary">Submit</button>
                </div>
			</div>
		</div>
    </div>
	</div>
</section>

					<?php 
    					echo $this->Form->end();
					?>