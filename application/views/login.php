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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div id="alert-sms" class="alert alert-success alert-dismissable hidden">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p id="sms-p"><p>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="用户名" id="username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="密码" id="password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button id="login" type="button" class="btn btn-lg btn-success btn-block">登录</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('bootstrap-sb-admin/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('bootstrap-sb-admin/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('bootstrap-sb-admin/bower_components/metisMenu/dist/metisMenu.min.js'); ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('bootstrap-sb-admin/dist/js/sb-admin-2.js'); ?>"></script>

    <script type="text/javascript">
    $("#login").click(function(){
        var login = {
            username: $("#username").val(),
            password: $("#password").val()
        }
        //alert(JSON.stringify(login));
        $.ajax({
            //请求类型，这里为POST
            type: "POST",
            //你要请求的api的URL
            //url: "http://localhost/sms_ser/index.php/index/test2",
            url: "http://<?php echo $this->config->item('addr'); ?>/login",
            //是否使用缓存
            cache: false,
            //数据类型，这里我用的是json
            dataType: "json",
            //必要的时候需要用JSON.stringify() 将JSON对象转换成字符串
            data: JSON.stringify(login), //data: {key:value}, 
            //请求成功的回调函数
            beforeSend: function(request) {
                request.setRequestHeader("Content-Type", "application/json");
            },
            success: function(data, status, xhr){
                $.ajaxSetup({  
                    async : false  
                }); 
                $.post("<?php echo site_url('index/login'); ?>", { username: $("#username").val(), password: $("#password").val() } );
                window.location = "<?php echo site_url('index/admin'); ?>"
            },
            error: function () {
                alert('用户名或密码错误');
            }
        });
    });

    </script>

</body>

</html>
