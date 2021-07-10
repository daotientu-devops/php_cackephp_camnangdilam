<!-- Content Header (Page header) -->
<!--
<script type="text/javascript">
    $("ul.sidebar-menu").find("li#menu_item_category").addClass("active");
</script>
-->
<section class="content-header">
    <h1>
         Quản lý danh mục
         <small>Danh mục</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/camnangdilam"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li class="active">Thông tin danh mục</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
       <div class="col-xs-12">
            <div class="box">
                <div class="box-header" style="padding-bottom:0px;">
                    <h3 class="box-title">Thông tin danh mục</h3>
                    <a href="/camnangdilam/categories/admin_add"><button class="btn btn-primary btn-flat" style="float:right;margin-right:10px;margin-top:10px;">Add new category</button></a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;">Title</th>
                                <th style="text-align:center;">Status</th>
                                <th style="text-align:center;">Ordering</th>
                                <th style="text-align:center;">ID</th>
                                <th style="text-align:center;" colspan="4">Controls</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($cat as $cat){
                                $_id=$cat["id"];
                                $category_name=$cat["category_name"];
                                $published=$cat["published"];
                                $ordering=$cat["ordering"];
                        ?>
                            <tr>
                                <td><?php echo $category_name; ?></td>
                                <td style="text-align:center;">
                                    <?php
                                    $imageShow=$this->Html->image('message_type_solution.png',array('alt'=>'Show','title'=>'Show'));
                                    $imageHide=$this->Html->image('delete.png',array('alt'=>'Hide','title'=>'Hide'));
                                    $published=substr($published,strlen($published)-1);
                                        if($published=='1'){
                                            echo $this->Html->link($imageShow,array('controller'=>'categories','action'=>'admin_changeStatus',$_id,'hide'),array('escape'=>false));
                                        }else{
                                            echo $this->Html->link($imageHide,array('controller'=>'categories','action'=>'admin_changeStatus',$_id,'show'),array('escape'=>false));                                                    
                                        }
                                    ?>
                                </td>
                                <td style="text-align:center;"><?php echo $ordering; ?></td>
                                <td style="text-align:center;"><?php echo $_id; ?></td>
                                <td style="text-align:center;">
                                    <?php
                                        echo $this->Html->link('View',array('controller'=>'categories','action'=>'admin_view',$_id))
                                    ?>
                                </td>
                                <td style="text-align:center;">
                                    <?php
                                        echo $this->Html->link('Copy',array('controller'=>'categories','action'=>'admin_copy',$_id))
                                    ?>
                                </td>
                                <td style="text-align:center;">
                                    <?php
                                        echo $this->Html->link('Update',array('controller'=>'categories','action'=>'admin_edit',$_id))
                                    ?>
                                </td>
                                <td style="text-align:center;">
                                    <?php
                                        echo $this->Form->postLink('Delete',array('action'=>'admin_delete',$_id),array('confirm'=>'Are you sure to delete '.$category_name.' ?'));
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align:center;">Title</th>
                                <th style="text-align:center;">Status</th>
                                <th style="text-align:center;">Ordering</th>
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