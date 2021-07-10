<!-- Content Header (Page header) -->
<script type="text/javascript">
    $("ul.sidebar-menu").find("li#menu_item_user").addClass("active");
</script>
<section class="content-header">
    <h1>
         User Manager
         <small>Users</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/camnangdilam"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">User Manager</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
       <div class="col-xs-12">
            <div class="box">
                <div class="box-header" style="padding-bottom:0px;">
                    <h3 class="box-title">Users</h3>
                    <a href="/camnangdilam/users/admin_add"><button class="btn btn-primary btn-flat" style="float:right;margin-right:10px;margin-top:10px;">Add new user</button></a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:left;">Name</th>
                                <th style="text-align:center;">User Name</th>
                                <th style="text-align:center;">Enabled</th>
                                <th style="text-align:center;">Activated</th>
                                <th style="text-align:center;">Email</th>
                                <th style="text-align:center;">Last Visit Date</th>
                                <th style="text-align:center;">Registration Date</th>
                                <th style="text-align:center;">ID</th>
                                <th style="text-align:center;" colspan="4">Controls</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($user_info as $user_info){
                                $_id=$user_info["Tbl_user"]["id"];
                                $name=$user_info["Tbl_user"]["name"];
                                $username=$user_info["Tbl_user"]["username"];
                                $status=$user_info["Tbl_user"]["status"];
                                $activation=$user_info["Tbl_user"]["activation"];
                                $email=$user_info["Tbl_user"]["email"];
                                $lastvisitDate=$user_info["Tbl_user"]["lastvisitDate"];
                                $registerDate=$user_info["Tbl_user"]["registerDate"];
                        ?>
                        	<tr>
                                <td style="text-align:left;"><?php echo $name; ?></td>
                                <td style="text-align:center;"><?php echo $username; ?></td>
                                <td style="text-align:center;">
                                	<?php
                                    $imageShow=$this->Html->image('message_type_solution.png',array('alt'=>'Show','title'=>'Show'));
                                    $imageHide=$this->Html->image('delete.png',array('alt'=>'Hide','title'=>'Hide'));
                                    $status=substr($status,strlen($status)-1);
                                        if($status=='1'){
                                            echo $this->Html->link($imageShow,array('controller'=>'users','action'=>'admin_changeStatus',$_id,'hide'),array('escape'=>false));
                                        }else{
                                            echo $this->Html->link($imageHide,array('controller'=>'users','action'=>'admin_changeStatus',$_id,'show'),array('escape'=>false));                                                    
                                        }
                                    ?>
                                </td>
                                <td style="text-align:center;">
                                	<?php
                                    $imageShow=$this->Html->image('message_type_solution.png',array('alt'=>'Show','title'=>'Show'));
                                    $imageHide=$this->Html->image('delete.png',array('alt'=>'Hide','title'=>'Hide'));
                                    $activation=substr($activation,strlen($activation)-1);
                                        if($activation=='1'){
                                            echo $this->Html->link($imageShow,array('controller'=>'users','action'=>'admin_changeLock',$_id,'hide'),array('escape'=>false));
                                        }else{
                                            echo $this->Html->link($imageHide,array('controller'=>'users','action'=>'admin_changeLock',$_id,'show'),array('escape'=>false));                                                    
                                        }
                                    ?>
                                </td>
                                <td style="text-align:center;"><?php echo $email; ?></td>
                                <td style="text-align:center;"><?php echo $lastvisitDate; ?></td>
                                <td style="text-align:center;"><?php echo $registerDate; ?></td>
                                <td style="text-align:center;"><?php echo $_id; ?></td>
                                <td style="text-align:center;">
                                    <?php
                                        echo $this->Html->link('View',array('controller'=>'users','action'=>'admin_view',$_id))
                                    ?>
                                </td>
                                <td style="text-align:center;">
                                    <?php
                                        echo $this->Html->link('Copy',array('controller'=>'users','action'=>'admin_copy',$_id))
                                    ?>
                                </td>
                                <td style="text-align:center;">
                                    <?php
                                        echo $this->Html->link('Update',array('controller'=>'users','action'=>'admin_edit',$_id))
                                    ?>
                                </td>
                                <td style="text-align:center;">
                                    <?php
                                        echo $this->Form->postLink('Delete',array('action'=>'admin_delete',$_id),array('confirm'=>'Are you sure to delete account '.$username.' ?'));
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align:left;">Name</th>
                                <th style="text-align:center;">User Name</th>
                                <th style="text-align:center;">Enabled</th>
                                <th style="text-align:center;">Activated</th>
                                <th style="text-align:center;">Email</th>
                                <th style="text-align:center;">Last Visit Date</th>
                                <th style="text-align:center;">Registration Date</th>
                                <th style="text-align:center;">ID</th>
                                <th style="text-align:center;" colspan="4">Controls</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
       </div> 
    </div>
</section><!-- /.content -->