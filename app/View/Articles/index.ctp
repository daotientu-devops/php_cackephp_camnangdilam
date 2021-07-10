<!-- Content Header (Page header) -->
<script type="text/javascript">
    $("ul.sidebar-menu").find("li#menu_item_article").addClass("active");
</script>
<section class="content-header">
    <h1>
         Quản lý bài viết
         <small>Bài viết</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/camnangdilam"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li class="active">Thông tin bài viết</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
       <div class="col-xs-12">
            <div class="box">
                <div class="box-header" style="padding-bottom:0px;">
                    <h3 class="box-title">Thông tin bài viết</h3>
<!--                    <a href="/camnangdilam/articles/admin_json_data_get_all_articles"><button class="btn btn-primary btn-flat" style="float:right;margin-right:10px;margin-top:10px;">Export to JSON data</button></a>-->
                    <a href="../../../nhom1/controllers/index.php"><button class="btn btn-primary btn-flat" style="float:right;margin-right:10px;margin-top:10px;">Export to JSON data</button></a>
                    <a href="/camnangdilam/articles/admin_add"><button class="btn btn-primary btn-flat" style="float:right;margin-right:10px;margin-top:10px;">Add new article</button></a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;">Title</th>
                                <th style="text-align:center;">Status</th>
                                <th style="text-align:center;">Category</th>
                                <th style="text-align:center;">Ordering</th>
                                <th style="text-align:center;">Created By</th>
                                <th style="text-align:center;">Created Date</th>
                                <th style="text-align:center;">ID</th>
                                <th style="text-align:center;" colspan="4">Controls</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($article_info as $article_info){
                                $_id=$article_info["Tbl_article"]["id"];
                                $title=$article_info["Tbl_article"]["title"];
                                $state=$article_info["Tbl_article"]["state"];
                                $catid=$article_info["Tbl_article"]["catid"];
                                $ordering=$article_info["Tbl_article"]["ordering"];
                                $created_by=$article_info["Tbl_article"]["created_by"];
                                $created_at=$article_info["Tbl_article"]["created_at"];
                        ?>
                        	<tr>
                                <td><?php echo $title; ?></td>
                                <td style="text-align:center;">
                                    <?php
                                    $imageShow=$this->Html->image('message_type_solution.png',array('alt'=>'Show','title'=>'Show'));
                                    $imageHide=$this->Html->image('delete.png',array('alt'=>'Hide','title'=>'Hide'));
                                    $state=substr($state,strlen($state)-1);
                                        if($state=='1'){
                                            echo $this->Html->link($imageShow,array('controller'=>'articles','action'=>'admin_changeStatus',$_id,'hide'),array('escape'=>false));
                                        }else{
                                            echo $this->Html->link($imageHide,array('controller'=>'articles','action'=>'admin_changeStatus',$_id,'show'),array('escape'=>false));                                                    
                                        }
                                    ?>
                                </td>
                                <td style="text-align:center;"><?php echo $catid; ?></td>
                                <td style="text-align:center;"><?php echo $ordering; ?></td>
                                <td style="text-align:center;"><?php echo $created_by; ?></td>
                                <td style="text-align:center;"><?php echo $created_at; ?></td>
                                <td style="text-align:center;"><?php echo $_id; ?></td>
                                <td style="text-align:center;">
                                    <?php
                                        echo $this->Html->link('View',array('controller'=>'articles','action'=>'admin_view',$_id))
                                    ?>
                                </td>
                                <td style="text-align:center;">
                                    <?php
                                        echo $this->Html->link('Copy',array('controller'=>'articles','action'=>'admin_copy',$_id))
                                    ?>
                                </td>
                                <td style="text-align:center;">
                                    <?php
                                        echo $this->Html->link('Update',array('controller'=>'articles','action'=>'admin_edit',$_id))
                                    ?>
                                </td>
                                <td style="text-align:center;">
                                    <?php
                                        echo $this->Form->postLink('Delete',array('action'=>'admin_delete',$_id),array('confirm'=>'Are you sure to delete '.$title.' ?'));
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align:center;">Title</th>
                                <th style="text-align:center;">Status</th>
                                <th style="text-align:center;">Category</th>
                                <th style="text-align:center;">Ordering</th>
                                <th style="text-align:center;">Created By</th>
                                <th style="text-align:center;">Created Date</th>
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