<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
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
	<meta charset="UTF-8">
<div class="navbar navbar-fixed-top scroll-hide"
	style="overflow: visible;">
	<div class="container-fluid top-bar">
		<div class="pull-right">
			<ul class="nav navbar-nav pull-right">
				<li class="dropdown user hidden-xs"><a href="#"
					class="dropdown-toggle" data-toggle="dropdown"> <img width="34"
						height="34" src="/valve/Public/images/avatar-male.jpg">管理员<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo U('Admin/index');?>"> <i class="icon-user"></i>我的账户</a></li>
						<!--<li><a href="###"> <i class="icon-gear"></i>账户设置</a></li> -->
						<li><a href="<?php echo U('Public/logout');?>"> <i class="icon-signout"></i>登出
						</a></li>
					</ul></li>
			</ul>
		</div>
		<button class="navbar-toggle">
			<span class="icon-bar"></span><span class="icon-bar"></span><span
				class="icon-bar"></span>
		</button>
		<a href="<?php echo U('Index/index');?>" class="logo">后台管理系统</a>
	</div>
	<div class="container-fluid main-nav clearfix">
		<div class="nav-collapse">
			<ul class="nav">
				<li><a href="<?php echo U('Index/index');?>"><span
						class="icon-dashboard" aria-hidden="true"></span>主页</a></li>
				<li><a href="<?php echo U('Project/index');?>"><span
						class="icon-list" aria-hidden="true"></span>报告管理</a></li>
				<li><a href="<?php echo U('Project/add');?>"><span
						class="icon-plus" aria-hidden="true"></span>新增报告</a></li>
			</ul>
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

</body>
</html>