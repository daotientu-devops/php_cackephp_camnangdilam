<!-- Content Header (Page header) -->
<script type="text/javascript">
    $("ul.sidebar-menu").find("li#menu_item_dashboard").addClass("active");
</script>
                <section class="content-header" style="margin-top:50px;">
                    <h1>
                        Trang tổng quan
                        <small>Bảng điều khiển</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
                        <li class="active">Bảng điều khiển</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!--Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php 
                                            echo $numcat;
                                        ?>
                                    </h3>
                                    <p>
                                        Danh mục
                                    </p>
                                </div>
                                <div class="icon">
<!--                                    <i class="ion ion-bag"></i>-->
                                    <?php
                                        echo $this->Html->image('category-64.png',array('height'=>'64px'));
                                    ?>
                                </div>
                                <a href="/camnangdilam/categories" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-green">
								<div class="inner">
                                    <h3>
                                        <?php
                                            echo $numart;
                                        ?>
                                    </h3>
                                    <p>
                                        Bài viết
                                    </p>
								</div>
								<div class="icon">
<!--                                    <i class="ion ion-stats-bars"></i>-->
                                    <?php
                                        echo $this->Html->image('article.png',array('height'=>'64px'));
                                    ?>
								</div>
								<a href="/camnangdilam/articles" class="small-box-footer">
									More info <i class="fa fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            echo $numuser;
                                        ?>
                                    </h3>
                                    <p>
                                        Tài khoản đang hoạt động
                                    </p>
                                </div>
                                <div class="icon">
<!--                                    <i class="ion ion-person-add"></i>-->
                                    <?php
                                        echo $this->Html->image('user_sticker.png',array('height'=>'64px'));
                                    ?>
                                </div>
                                <a href="/camnangdilam/users" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php
                                            echo $numlog;
                                        ?>
                                    </h3>
                                    <p>
                                        Trạng thái thao tác với dữ liệu
                                    </p>
                                </div>
                                <div class="icon">
<!--                                    <i class="ion ion-pie-graph"></i>-->
                                    <?php
                                        echo $this->Html->image('logs.png',array('height'=>'64px'));
                                    ?>
                                </div>
                                <a href="/camnangdilam/logs" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- top row -->
                    <div class="row">
                        <div class="col-xs-12 connectedSortable">
                        </div>
                    </div>
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                       <section class="col-lg-6 connectedSortable">
                            <!-- Calendar -->
<!--
                            <div class="box box-info">
                                <div class="box-header">
                                    <i class="fa fa-calendar"></i>
                                    <div class="box-title">Calendar</div>

                                </div>
                                <div class="box-body no-padding">
-->
                                    <!-- The calendar -->
<!--
                                    <div id="calendar">
                                        
                                    </div>
                                </div>
                            </div>-->
                        </section>

                        <!-- right col -->
                        <section class="col-lg-6 connectedSortable">
                            <!-- quick email widget -->
                            <div class="box box-info">
                                <div class="box-header">
                                    <i class="fa fa-envelope"></i>
                                    <h3 class="box-title">Quick Email</h3>
                                </div>
<!--                                <form action="#" method="post">-->
                                <?php echo $this->Form->create(array('inputDefaults'=>array('label'=>false,'div'=>false))); ?>
                                
                                <div class="box-body">
                                    <?php echo $this->Session->flash(); ?>
<!--
                                        <div class="form-group">
                                            <?php 
                                                //echo $this->Form->input('emailfrom',array('type'=>'email','class'=>'form-control','placeholder'=>'Email from:'));
                                            ?>
                                        </div>
-->
                                        <div class="form-group">
<!--                                            <input type="email" class="form-control" name="emailto" placeholder="Email to:"/>-->
                                            <?php 
                                                echo $this->Form->input('emailto',array('type'=>'email','class'=>'form-control','placeholder'=>'Email to:'));
                                            ?>
                                        </div>
                                        <div class="form-group">
<!--                                            <input type="text" class="form-control" name="subject" placeholder="Subject"/>-->
                                            <?php 
                                                echo $this->Form->input('subject',array('type'=>'text','class'=>'form-control','placeholder'=>'Subject'));
                                            ?>
                                        </div>
                                        <div>
<!--                                            <textarea class="" placeholder="Message" style="width:100%;height:125px;font-size:14px;line-height:18px;border:1px solid #ddd;padding:10px;"></textarea>-->
                                            <?php 
                                                echo $this->Form->textarea('message',array('class'=>'form-control ckeditor','placeholder'=>'Message','style'=>'width:100%;height:125px;font-size:14px;line-height:18px;border:1px solid #ddd;padding:10px;'));
                                            ?>
                                        </div>
                                </div>
                                <div class="box-footer clearfix">
                                    <button type="submit" class="pull-right btn btn-primary" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
<!--                                </form>-->
                                <?php echo $this->Form->end(); ?>
                            </div>
                        </section>
                    </div>
                </section>
