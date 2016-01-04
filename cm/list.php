<?php

    require_once '../include.php';
if(empty($_SESSION['username'])) {
    echo '<script language="javascript">
                        alert("你还没有登陆！！");
                        location.href="../login.php";
                        </script> ';
}
    $sql = "SELECT * FROM `store`";
    $royaltea = new royaltea('store');
    $numrow = $royaltea->totalRow($sql); //查询总行数
//    $fetch = $royaltea->fetch_array($sql)


        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Flatpoint - Responsive Web App Template</title>

            <meta name="description" content="">
            <meta name="author" content="">

            <!-- Le styles -->
            <link href="css/bootstrap.css" rel="stylesheet">
            <link href="css/bootstrap-responsive.css" rel="stylesheet">
            <link href="css/stylesheet.css" rel="stylesheet">
            <link href="css/index.css" rel="stylesheet">
            <link href="icon/font-awesome.css" rel="stylesheet">


            <!-- Le fav and touch icons -->
            <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.html">
            <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.html">
            <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.html">
            <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.html">


            <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
            <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
            <![endif]-->

        </head>

        <body>


        <div id="content"> <!-- Content start -->
            <div class="inner_content">
                <div class="widgets_area">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="daohanglink" style="">
                                <span class="daohang"></span>
                                <span>首页</span><span>></span>

                                <span>客户管理</span>
                                <a href="add.php" class="label label-warning" style="float:right; margin:8px;">添加门店</a>
                            </div>
                            <div class="well brown">


                                <div class="well-content" style="border:0px;">
                                    <table class="table table-striped table-bordered table-hover datatable">
                                        <thead>
                                        <tr>

                                            <th width="5%">ID</th>
                                            <th width="10%">店名</th>
                                            <th width="5%">区域</th>
                                            <th width="15%">管理操作</th>
                                        </tr>
                                        </thead>
                                        <?php
                    $sql = 'SELECT * FROM `store` ORDER BY `sid` ASC';
                    $query = mysql_query($sql);
                    while($fetch = mysql_fetch_array($query)) { ?>
                                        <tbody>
                                        <tr>
                                            <td><?php echo $fetch['sid'] ?></td>
                                            <td><?php echo $fetch['name'] ?></td>
                                            <td><?php echo $fetch['address'] ?></td>

                                            <td>
                                                <a class="btn" href="edit.php?sid=<?php echo $fetch['sid']; ?>" title="修改"><i class="icon-inbox"></i></a>
                                                <a class="btn" href="act.php?act=del&sid=<?php echo $fetch['sid']; ?>" title="删除"><i class="icon-trash"></i></a>
                                                <a class="btn" href="../store.php?sid=<?php echo $fetch['sid']; ?>" title="查看"><i class="icon-exclamation"></i></a>
                                                <a class="btn" href="../qrcode.php?sid=<?php echo $fetch['sid']; ?>" title="看码"><i class="icon-exclamation"></i></a>
                                            </td>
                                        </tr>
                                        <?php

                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/jquery-ui-1.10.3.js"></script>
        <script src="js/bootstrap.js"></script>

        <script src="js/library/jquery.collapsible.min.js"></script>
        <script src="js/library/jquery.mCustomScrollbar.min.js"></script>
        <script src="js/library/jquery.mousewheel.min.js"></script>
        <script src="js/library/jquery.uniform.min.js"></script>


        <script src="js/library/jquery.sparkline.min.js"></script>
        <script src="js/library/chosen.jquery.min.js"></script>
        <script src="js/library/jquery.easytabs.js"></script>
        <script src="js/library/flot/excanvas.min.js"></script>
        <script src="js/library/flot/jquery.flot.js"></script>
        <script src="js/library/flot/jquery.flot.pie.js"></script>
        <script src="js/library/flot/jquery.flot.selection.js"></script>
        <script src="js/library/flot/jquery.flot.resize.js"></script>
        <script src="js/library/flot/jquery.flot.orderBars.js"></script>
        <script src="js/library/maps/jquery.vmap.js"></script>
        <script src="js/library/maps/maps/jquery.vmap.world.js"></script>
        <script src="js/library/maps/data/jquery.vmap.sampledata.js"></script>
        <script src="js/library/jquery.autosize-min.js"></script>
        <script src="js/library/charCount.js"></script>
        <script src="js/library/jquery.minicolors.js"></script>
        <script src="js/library/jquery.tagsinput.js"></script>
        <script src="js/library/fullcalendar.min.js"></script>
        <script src="js/library/footable/footable.js"></script>
        <script src="js/library/footable/data-generator.js"></script>

        <script src="js/library/bootstrap-datetimepicker.js"></script>
        <script src="js/library/bootstrap-timepicker.js"></script>
        <script src="js/library/bootstrap-datepicker.js"></script>
        <script src="js/library/bootstrap-fileupload.js"></script>
        <script src="js/library/jquery.inputmask.bundle.js"></script>

<!--        <script src="js/library/jquery.dataTables.js"></script>-->

        <script src="js/flatpoint_core.js"></script>

        <script src="js/datatables.js"></script>

        </body>
        </html>
