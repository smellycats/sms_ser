<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $this->config->item('title'); ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('bootstrap-sb-admin/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('bootstrap-sb-admin/bower_components/metisMenu/dist/metisMenu.min.css'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('bootstrap-sb-admin/dist/css/sb-admin-2.css'); ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('bootstrap-sb-admin/bower_components/morrisjs/morris.css'); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('bootstrap-sb-admin/bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
    
    <!-- DatetimePicker CSS-->
    <link href="<?php echo base_url('bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet" media="screen">

    <!-- Latest compiled and minified CSS -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/bootstrap-table.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">短信管理平台</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> 用户配置</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> 设置</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> 退出</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo site_url('index/admin'); ?>"><i class="fa fa-table fa-fw"></i> 短信记录</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('index/send'); ?>"><i class="fa fa-envelope fa-fw"></i> 发送短信</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">短信</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!--
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-5">
                        <div class="input-group">
                            <label for="dtp_input1" class="col-md-3 control-label">开始时间</label>
                            <div class="input-group date form_datetime col-md-9" data-date="" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="dtp_input1">
                                <input class="form-control" size="32" type="text" value="">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            </div>
                            <input type="hidden" id="dtp_input1" value="" /><br/>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <label for="dtp_input2" class="col-md-3 control-label">结束时间</label>
                            <div class="input-group date form_datetime col-md-9" data-date="" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="dtp_input2">
                                <input class="form-control" size="32" type="text" value="">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            </div>
                            <input type="hidden" id="dtp_input2" value="" /><br/>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary">查询</button>
                </div>
            </div>
            -->
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <table id="table"></table>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('bootstrap-sb-admin/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('bootstrap-sb-admin/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/bootstrap-table.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('bootstrap-sb-admin/bower_components/raphael/raphael-min.js'); ?>"></script>
    <script src="<?php echo base_url('bootstrap-sb-admin/bower_components/morrisjs/morris.min.js'); ?>"></script>
    <script src="<?php echo base_url('bootstrap-sb-admin/js/morris-data.js'); ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('bootstrap-sb-admin/dist/js/sb-admin-2.js'); ?>"></script>
    
    <!-- Latest compiled and minified Locales -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/locale/bootstrap-table-zh-CN.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('bootstrap-sb-admin/bower_components/metisMenu/dist/metisMenu.min.js'); ?>"></script>

    <!-- DatetimePicker JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'); ?>" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo base_url('bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.fr.js'); ?>" charset="UTF-8"></script>
    <script type="text/javascript">
        $('.form_datetime').datetimepicker({
            language: 'cn',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 0
        });

        $('#table').bootstrapTable({
            url: 'http://127.0.0.1:5000/sms',
            pagination: true,
            sidePagination: 'server',
            rowStyle: 'rowStyle',
            columns: [
                {
                    field: 'id',
                    title: 'ID'
                },
                {
                    field: 'date_send',
                    title: '发送时间'
                },
                {
                    field: 'mobiles',
                    title: '电话号码'
                },
                {
                    field: 'content',
                    title: '发送内容'
                },
                {
                    field: 'returned_value',
                    title: '返回值'
                },
                {
                    field: 'user_id',
                    title: '用户ID'
                }
            ],
            responseHandler: function (res) {
                return {
                    rows: res.items,
                    total: res.total_count
                }
            }
        });

        function rowStyle(row, index) {
            var classes = ['active', 'success', 'info', 'warning', 'danger'];
            
            if (row.returned_value != 0) {
                return {
                    classes: classes[3]
                };
            }
            return {};
        }

    </script>


</body>

</html>
