<!-- Content Header (Page header) -->
<script type="text/javascript">
    $("ul.sidebar-menu").find("li#menu_item_log").addClass("active");
</script>
<section class="content-header">
    <h1>
         Logs Manager
         <small>Log</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/camnangdilam"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Log Info</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
       <div class="col-xs-12">
            <div class="box">
                <div class="box-header" style="padding-bottom:0px;">
                    <h3 class="box-title">Details</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:left;">ID</th>
                                <th style="text-align:left;">Time</th>
                                <th style="text-align:left;">UID</th>
                                <th style="text-align:left;">Application</th>
                                <th style="text-align:left;">Tag</th>
                                <th style="text-align:left;">Text</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            foreach($log_info as $log){ //print_r($log);
                                $_id=$log["Tbl_log"]["id"]; 
                                $action_name=$log["Tbl_log"]["action_name"];
                                $time_at=$log["Tbl_log"]["time_at"];
                                $user_id=$log["Tbl_log"]["user_id"];
                        ?>
                            <tr>
                                <td style="text-align:left;"><?php echo $_id; ?></td>
                                <td style="text-align:left;"><?php echo $time_at; ?></td>
                                <td style="text-align:left;"><?php echo $user_id; ?></td>
                                <td style="text-align:left;"><?php echo "camnangdilam"; ?></td>
                                <td style="text-align:left;"></td>
                                <td style="text-align:left;"><?php echo $action_name; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align:left;">ID</th>
                                <th style="text-align:left;">Time</th>
                                <th style="text-align:left;">UID</th>
                                <th style="text-align:left;">Application</th>
                                <th style="text-align:left;">Tag</th>
                                <th style="text-align:left;">Text</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
       </div> 
    </div>
</section><!-- /.content -->