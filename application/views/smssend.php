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

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('bootstrap-sb-admin/bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/bootstrap-table.min.css">

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
                    <h1 class="page-header">短信发送</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div id="alert-sms" class="alert alert-success alert-dismissable hidden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p id="sms-p"><p>
                </div>
                <div class="col-lg-12">
                    <form class="form-inline">
                        <div class="form-group">
                            <label>电话号码</label>
                            <textarea id="mobiles" class="form-control" rows="3" placeholder="电话号码用','分割"></textarea>
                        </div>
                        <div class="form-group">
                            <label>发送内容</label>
                            <textarea id="content" class="form-control" rows="3" placeholder="发送内容小于255字符"></textarea>
                        </div>
                        <button id="submit" type="button" class="btn btn-lg btn-primary">提交</button>
                    </form>
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

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('bootstrap-sb-admin/dist/js/sb-admin-2.js'); ?>"></script>
    
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('bootstrap-sb-admin/bower_components/metisMenu/dist/metisMenu.min.js'); ?>"></script>

    <script type="text/javascript">
    $("#submit").click(function(){
        var test = {
            mobiles: $("#mobiles").val(),
            content: $("#content").val()
        }

        $.ajax({
            //请求类型，这里为POST
            type: "POST",
            //你要请求的api的URL
            //url: "http://localhost/sms_ser/index.php/index/test2",
            url: "http://127.0.0.1:5000/sms",
            //是否使用缓存
            cache: false,
            //数据类型，这里我用的是json
            dataType: "json",
            //必要的时候需要用JSON.stringify() 将JSON对象转换成字符串
            data: JSON.stringify(test), //data: {key:value}, 
            //请求成功的回调函数
            beforeSend: function(request) {
                request.setRequestHeader("Content-Type", "application/json");
                //request.setRequestHeader("access_token", "123");
            },
            //请求成功的回调函数
            success: function(data, status, xhr){
                //alert(data.returned_value);
                if (data.returned_value == 0) {
                    $("#alert-sms").attr("class","alert alert-success alert-dismissable");
                    $("#sms-p").text("发送成功！");
                } else {
                    $("#alert-sms").attr("class","alert alert-danger alert-dismissable");
                    $("#sms-p").text("发送失败！返回状态码: " + data.returned_value);
                }
            },
            error: function () {
                $("#alert-sms").attr("class","alert alert-danger alert-dismissable");
                $("#sms-p").text("发送失败！");
            }
        });
    });

    </script>


</body>

</html>
