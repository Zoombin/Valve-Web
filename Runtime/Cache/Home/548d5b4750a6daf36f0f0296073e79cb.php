<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>登录后台管理系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
<title><?php echo ($meta_title); ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/valve/Public/css/bootstrap.min.css" rel="stylesheet">
<link href="/valve/Public/css/font-awesome.min.css" rel="stylesheet">
<link href="/valve/Public/css/alertify.core.css" rel="stylesheet">
<link href="/valve/Public/css/alertify.bootstrap.css" rel="stylesheet">
<link href="/valve/Public/css/style.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="login-content">
                <h1>登录后台管理系统</h1>
                <hr/>
                <form class="form-horizontal" id="loginForm" action="<?php echo U('Public/checkLogin');?>" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="uname">用户名:</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user login-icon"></i></span>
                                <input type="text" class="form-control" id="uname" name="uname" placeholder="账号" datatype="s4-16" nullmsg="请输入账号！" errormsg="账号至少4个字符,最多16个字符！">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="upwd">密码:</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock login-icon"></i></span>
                                <input type="password" class="form-control" id="upwd" name="upwd"  placeholder="密码" datatype="*4-16" nullmsg="请输入密码！" errormsg="密码至少4个字符,最多16个字符！">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <span id="msgdemo2" style="margin-left:30px;"></span>
                        <button type="submit" class="btn btn-success pull-right">登录</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="toTop" style="background:#6289F6;color:#444;width:60px;
	height:60px;font-size:48px;line-height:60px;border-radius:50%;position:fixed;
	z-index:9999;bottom:30px;right:50px;text-align:center;cursor:pointer;"><i class="icon-arrow-up"></i></div>
<script src="/valve/Public/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="/valve/Public/js/bootstrap.min.js"></script>
<script src="/valve/Public/js/Validform_v5.3.2_min.js"></script>
<script src="/valve/Public/js/Validform_Datatype.js"></script>
<script src="/valve/Public/js/alertify.min.js"></script>
<script src="/valve/Public/js/My97DatePicker/WdatePicker.js"></script>
<script src="/valve/Public/js/common.js"></script>
<script src="/valve/Public/js/bootstrap-typeahead.js"></script>

<script type="text/javascript">
    $(".form-horizontal").Validform({
        tiptype:function(msg,o,cssctl){
            var objtip=$("#msgdemo2");
            cssctl(objtip,o.type);
            objtip.text(msg);
        }
    });
</script>
</body>
</html>