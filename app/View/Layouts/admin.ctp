<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title; ?></title>
        <?php
            echo $this->Html->css(array(
                "bootstrap.min.css"
                ,"font-awesome.min.css"
                ,"ionicons.min.css"
                ,"datatables/dataTables.bootstrap.css"
                ,"morris/morris.css"
                ,"jvectormap/jquery-jvectormap-1.2.2.css"
                ,"fullcalendar/fullcalendar.css"
                ,"daterangepicker/daterangepicker-bs3.css"
                ,"bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"
                ,"AdminLTE.css"
                ,"main.css"
                ,"datepicker.css"
                ,"jquery.dataTables.css"
//                ,"shCore.css"
//                ,"demo.css"
            ));
        ?>
        <?php
            echo $this->Html->script(array(
                "jquery.min.js"//jQuery 2.0.2
                ,"jquery-ui-1.10.3.min.js"//jQuery UI 1.10.3
                ,"bootstrap.min.js"//Bootstrap
                ,"plugins/datatables/jquery.dataTables.js"
                ,"plugins/datatables/dataTables.bootstrap.js"
                ,"plugins/morris/morris.min.js"//Morris.js charts
                ,"plugins/sparkline/jquery.sparkline.min.js"//Sparkline
                ,"plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"//jvectormap
                ,"plugins/jvectormap/jquery-jvectormap-world-mill-en.js"
                ,"plugins/fullcalendar/fullcalendar.min.js"//fullCalendar
                ,"plugins/jqueryKnob/jquery.knob.js"//jQuery Knob Chart
                ,"plugins/daterangepicker/daterangepicker.js"//daterangepicker
                ,"plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"//Bootstrap WYSIHTML5
                ,"plugins/iCheck/icheck.min.js"//iCheck
                ,"AdminLTE/app.js"//AdminLTE App
                ,"AdminLTE/demo.js"//AdminLTE for demo purposes
                ,"AdminLTE/dashboard.js"//AdminLTE dashboard demo (This is only for demo purposes)
                ,"ckeditor/ckeditor.js"
                ,"prototype-1.js"
                ,"prototype-base-extensions.js"
                ,"prototype-date-extensions.js"
                ,"behaviour.js"
                ,"datepicker.js"
                ,"behaviors.js"
//                ,"jquery.dataTables.js"
//                ,"shCore.js"
//                ,"demo.js"
            ));
        ?>
        <script type="text/javascript">
            $(document).ready(function(){ 
                $("#example1").css("display","none");
            });
        </script>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo to add the margining -->
                CẩmNangĐiLàm
            </a>
<!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button -->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>nhom1<i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <!-- <img src="img/avatar3.png" class="img-circle" alt="User Image"/> -->
                                    <?php echo $this->Html->image('avatar5.png',array('class'=>'img-circle','alt'=>'User Image')); ?>
                                    <p>
<!--                                        TuDT - Web Developer-->
                                        <?php echo $current_user['name']; ?>
                                        <small>Member since 2014</small>
                                    </p>
                                </li>
                                <!-- Menu Footer -->
                                <li class="user-footer">
                                    <div class="pull-left">
<!--                                        <a href="#" class="btn btn-default btn-flat">Hồ sơ cá nhân</a>-->
                                        <?php
                                            echo $this->Html->link('Hồ sơ cá nhân',array('controller'=>'users','action'=>'admin_edit',$current_user['id']),array('class'=>'btn btn-default btn-flat'));
                                        ?>
                                    </div>
                                    <div class="pull-left" style="margin-left:10px;">
<!--                                        <a href="#" class="btn btn-default btn-flat">Hồ sơ cá nhân</a>-->
                                        <?php
                                            echo $this->Html->link('Thay đổi mật khẩu',array('controller'=>'users','action'=>'admin_changepass',$current_user['id']),array('class'=>'btn btn-default btn-flat'));
                                        ?>
                                    </div>
                                    <div class="pull-right">
                                        <!--<a href="#" class="btn btn-default btn-flat">Đăng xuất</a>-->
                                        <?php
                                            echo $this->Html->link("Đăng xuất",array("controller"=>"users","action"=>"admin_logout"),array("class"=>"btn btn-default btn-flat"));
                                        ?>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <!-- <img src="img/avatar3.png" class="img-circle" alt="User Image"/> -->
                            <?php echo $this->Html->image('avatar5.png',array('class'=>'img-circle','alt'=>'User Image')); ?>
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $current_user['name']; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- sidebar menu -->
                    <ul class="sidebar-menu">
                        <li id="menu_item_dashboard"><!-- class="active" -->
                            <a href="/camnangdilam/dashboard">
                                <i class="fa fa-dashboard"></i><span>Bảng điều khiển</span>
                            </a>
                        </li>
                        <li id="menu_item_category">
                            <a href="/camnangdilam/categories">
                                <i class="fa fa-th"></i><span>
                                    <?php
                                    //echo $this->Html->link("Danh Mục",array("admin"=>true,"controller"=>"Categories","action"=>"index"));
                                    ?>
                                </span>Danh mục
                                <!-- new widget -->
                                <!--<small class="badge pull-right bg-green">new</small>-->
                            </a>
                        </li>
                        <!-- <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Charts</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-angle-double-right"></i>Morris</a></li>
                                <li><a href="charts_flot.html"><i class="fa fa-angle-double-right"></i>Flot</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i>Inline charts</a></li>                                
                            </ul>
                        </li> -->
                        <li id="menu_item_article"><!--class="treeview"-->
                            <a href="/camnangdilam/articles">
                                <i class="fa fa-edit"></i><span>Bài viết</span>
                                <!--<i class="fa fa-angle-left pull-right"></i>-->
                            </a>
                            <!--<ul class="treeview-menu">
                                <li><a href="forms_general.html"><i class="fa fa-angle-double-right"></i>General Elements</a></li>
                                <li><a href="forms_advanced.html"><i class="fa fa-angle-double-right"></i>Advanced Elements</a></li>
                                <li><a href="forms_editors.html"><i class="fa fa-angle-double-right"></i>Editors</a></li>
                            </ul>-->
                        </li>
                        <li id="menu_item_user"><!--class="treeview"-->
                            <a href="/camnangdilam/users">
                                <i class="fa fa-laptop"></i>
                                <span>Quản trị viên</span>
                                <!--<i class="fa fa-angle-left pull-right"></i>-->
                            </a>
                            <!--<ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-angle-double-right"></i>General</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i>Icons</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i>Buttons</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i>Sliders</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i>Timeline</a></li>
                            </ul>-->
                        </li>
                        <li class="treeview" id="menu_item_log">
                            <a href="/camnangdilam/logs">
                                <i class="fa fa-table"></i><span>Logs</span>
                                <!-- <i class="fa fa-angle-left pull-right"></i> -->
                            </a>
                            <!-- <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-angle-double-right"></i>Simple tables</a></li>
                                <li><a href="tables_data.html"><i class="fa fa-angle-double-right"></i>Data tables</a></li>
                            </ul> -->
                        </li>
                        <!-- <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i><span>Calendar</span>
                                <small class="badge pull-right bg-red">3</small>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-envelope"></i><span>Mailbox</span>
                                <small class="badge pull-right bg-yellow">12</small>
                            </a>
                        </li> -->
                        <li class="treeview">
                            <a href="/camnangdilam/users/admin_lockscreen">
                                <!-- <i class="fa fa-folder"></i><span>Start</span> -->
                                <i class="fa fa-folder"></i><span>Lockscreen</span>
                                <!-- <i class="fa fa-angle-left pull-right"></i> -->
                            </a>
                            <ul class="treeview-menu">
                                <!-- <li><a href="#"><i class="fa fa-angle-double-right"></i>Invoice</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i>Login</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i>Register</a></li> -->
                                <!-- <li><a href="lockscreen.html"><i class="fa fa-angle-double-right"></i>Lockscreen</a></li> -->
                                <!-- <li><a href="#"><i class="fa fa-angle-double-right"></i>404 Error</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i>500 Error</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i>Blank Page</a></li> -->
                            </ul>
                        </li>
                    </ul>
                </section>
            </aside>
            
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch("content"); ?>
            </aside>
            <!-- /.end aside -->
        </div>
    </body>
</html>
