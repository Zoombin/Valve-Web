<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title><?php echo ($meta_title); ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/css/font-awesome.min.css" rel="stylesheet">
<link href="/Public/css/alertify.core.css" rel="stylesheet">
<link href="/Public/css/alertify.bootstrap.css" rel="stylesheet">
<link href="/Public/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="/Public/css/lightbox.css" rel="stylesheet">
<link href="/Public/css/style.css" rel="stylesheet">
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
						height="34" src="/Public/images/avatar-male.jpg">管理员<b class="caret"></b></a>
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

	<div class="container-fluid main-content">
		<div class="row">
			<div class="col-lg-12">
				<div class="widget-container fluid-height clearfix">
					<div class="heading">
						<i class="icon-table"></i><?php echo ($meta_title); ?>
						<a href="<?php echo U('Project/add');?>" class="pull-right" ><i class="icon-plus"></i>新增报告</a> 
					</div>
					<div class="widget-content padded clearfix">
						<div id="dataTable1_wrapper" class="dataTables_wrapper"
							role="grid">
							<div class="search-section">
								<form action="<?php echo U('Project/index');?>" method="get" id="searchForm">
									<div class="col-md-4">
										<div class="form-group ">
											<div class="input-group">
												<span class="input-group-addon">关键词</span>
												<input class="form-control" placeholder="编号编号/公司名称" name="key" value="<?php echo ($key); ?>" type="text">
											</div>
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group ">
											<div class="input-group">
												<button class="btn btn-primary" type="submit">Search</button>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div><?php echo ($page); ?></div>
							<table class="table table-striped" style="clear: both;">
									<tr>
										<th>编号</th>
										<th>使用单位</th>
										<th>联系人</th>
										<th>添加日期</th>
										<th>操作</th>
									</tr>
									<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
											<td><?php echo ($vo["rnum"]); ?></td>
											<td><?php echo ($vo["company"]); ?></td>
											<td><?php echo ($vo["contact"]); ?></td>
											<td><?php echo ($vo["createtime"]); ?></td>
											<td>
												<div class="action-buttons">
						                           <a href="<?php echo U('Project/add','id='.$vo['id']);?>" class="table-actions" title="编辑" data-toggle="tooltip"><i class="icon-edit"></i></a>
						                           <a target="_blank" href="<?php echo U('Project/toprint','type=1&id='.$vo['id']);?>" class="table-actions" title="打印报告书" data-toggle="tooltip"><i class="icon-print"></i></a>
												   <a target="_blank" href="<?php echo U('Project/toprint','type=2&id='.$vo['id']);?>" class="table-actions" title="打印校验记录" data-toggle="tooltip"><i class="icon-save"></i></a>
						                           <a href="javascript:void(0);" class="table-actions" title="删除" data-toggle="tooltip" onclick="removeProduct(<?php echo ($vo["id"]); ?>);"><i class="icon-trash"></i></a>
						                        </div>
					                        </td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
									<?php if(empty($list)): ?><tr>
										<td colspan="5">没有数据</td>										
									</tr><?php endif; ?>
									
							</table>
							<div><?php echo ($page); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	
<!-- end show detail -->
	<div id="toTop" style="background:#6289F6;color:#444;width:60px;
	height:60px;font-size:48px;line-height:60px;border-radius:50%;position:fixed;
	z-index:9999;bottom:30px;right:50px;text-align:center;cursor:pointer;"><i class="icon-arrow-up"></i></div>
<script src="/Public/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="/Public/js/bootstrap.min.js"></script>
<script src="/Public/js/Validform_v5.3.2_min.js"></script>
<script src="/Public/js/Validform_Datatype.js"></script>
<script src="/Public/js/alertify.min.js"></script>
<script src="/Public/js/bootstrap-datetimepicker.min.js"></script>
<script src="/Public/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="/Public/js/common.js"></script>
	<script type="text/javascript">	
		$(function() {
			$('[data-toggle="tooltip"]').tooltip();
			$("a[data-lightbox]").lightbox({
			    fitToScreen: true,
			    imageClickClose: false,
			    fileLoadingImage : '/Public/images/loading.gif',
				fileBottomNavCloseImage : '/Public/images/closelabel.gif'
		    });
		});
		function removeProduct(id){
			alertify.confirm("确定要删除该报告？", function (e) {
				if (e) {
					$.post("<?php echo U('Project/remove');?>", { id: id},
						   	function(data){
						     alertify.log(data);
						     reload(500);
						   });
				} 
			});
		}
	</script>
</body>
</html>