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
<body onload="load()">
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
								<form action="<?php echo U('Project/index');?>" method="post" id="searchForm">
									<div class="col-md-4">
										<div class="form-group ">
											<div class="input-group">
												<span class="input-group-addon">关键词</span>
												<input class="form-control" placeholder="编号/公司名称/地址" name="key" value="<?php echo ($key); ?>" type="text">
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
							<div class="search-section">
								<div class="input-group">
									<form action="<?php echo U('Project/index');?>" method="post" id="areaForm">
									<label class="control-label col-md-1" style="padding-top: 8px;">区域:</label>
									<div class="col-md-3">
										<!--为了翻页时保留搜索条件-->
										<div hidden><input class="form-control" placeholder="编号/公司名称" name="key" value="<?php echo ($key); ?>" type="text" id="key"></div>
										<div hidden><input class="form-control" id="currentarea" name="currentarea" value="<?php echo ($currentarea); ?>" type="text"></div>
										<select id="area" name="area" class="form-control" onchange="areaChange()">
											<option value="0">请选择</option>
											<option value="1">相城区容器上</option>
											<option value="2">相城区锅炉上</option>
											<option value="3">相城区管道上</option>
											<option value="4">吴中区容器上</option>
											<option value="5">吴中区锅炉上</option>
											<option value="6">吴中区管道上</option>
											<option value="7">在线容器上</option>
											<option value="8">在线锅炉上</option>
											<option value="9">在线管道上</option>
										</select>
									</div>

									<label class="control-label col-md-1" style="padding-top: 8px;">年份:</label>
									<div class="col-md-2">
										<input type="text" class="form-control" name="search_year" id="search_year" value="<?php echo ($search_year); ?>" onchange="areaChange()">
									</div>

									<div class="col-md-12">
										<a  href="#"  onclick="areaChange('first')">首页</a>&nbsp;&nbsp;
										<a  href="#"  onclick="areaChange('previous')">上一页</a>&nbsp;&nbsp;
										当前页：<input id="pageNo" value="<?php echo ($pageNo); ?>" size="2">&nbsp;&nbsp;
										<a  href="#"  onclick="areaChange('next')">下一页</a>&nbsp;&nbsp;
										<a  href="#"  onclick="areaChange('last')">尾页</a>&nbsp;&nbsp;
										共有 <?php echo ($total); ?> 条记录
									</div>
									</form>
								</div>
							</div>

							<div id="page">

								<a href="<?php echo U('Project/export');?>" id="excel_area"><input style="float: right; margin-bottom: 5px;" type="button"  value="导出Excel" id="btnExport" hidden></a>
								<!--<div id="myTable"></div>-->
								<!--<div><?php echo ($page); ?></div>-->

								<table class="table table-striped" id="mytable">
									<tr>
										<th>日期</th>
										<th>使用单位</th>
										<th>设备名称</th>
										<th>设备代码</th>
										<th>新/旧</th>
										<th>安全阀型号</th>
										<th>公称通径</th>
										<th>工作压力MPa</th>
										<th>整定压力MPa</th>
										<th>结论</th>
										<th>编号</th>
										<th>操作</th>
									</tr>
									<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
											<td style="font-size:12px;"><?php echo ($vo["verifydate"]); ?></td>
											<td style="font-size:12px;"><?php echo ($vo["company"]); ?></td>
											<td style="font-size:12px;"><?php echo ($vo["installposition"]); ?></td>
											<td style="font-size:12px;"><?php echo ($vo["devnum"]); ?></td>
											<td style="font-size:12px;"><?php echo ($vo["newold"]); ?></td>
											<td style="font-size:12px;"><?php echo ($vo["model"]); ?></td>
											<td style="font-size:12px;"><?php echo ($vo["gctj"]); ?></td>
											<td style="font-size:12px;"><?php echo ($vo["workpressure"]); ?></td>
											<td style="font-size:12px;"><?php echo ($vo["needpressure"]); ?></td>
											<td style="font-size:12px;"><?php echo ($vo["verifyresult"]); ?></td>
											<td style="font-size:12px;"><?php echo ($vo["rnum"]); ?></td>
											<td style="font-size:12px;">
												<div class="action-buttons">
													<a href="<?php echo U('Project/add','id='.$vo['id']);?>" class="table-actions" title="编辑" data-toggle="tooltip"><i class="icon-edit"></i></a>
													<a target="_blank" href="<?php echo U('Project/toprint','type=1&id='.$vo['id']);?>" class="table-actions" title="打印报告书" data-toggle="tooltip"><i class="icon-print"></i></a>
													<a target="_blank" href="<?php echo U('Project/toprint','type=2&id='.$vo['id']);?>" class="table-actions" title="打印校验记录" data-toggle="tooltip"><i class="icon-save"></i></a>
													<a href="javascript:void(0);" class="table-actions" title="删除" data-toggle="tooltip" onclick="removeProduct(<?php echo ($vo["id"]); ?>);"><i class="icon-trash"></i></a>
												</div>
											</td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
									<!--<?php if(empty($listxiangcheng)): ?>-->
										<!--<tr>-->
											<!--<td colspan="5">没有数据</td>-->
										<!--</tr>-->
									<!--<?php endif; ?>-->
								</table>
								<!--<div><?php echo ($page); ?></div>-->
							</div>
							<div></div>
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
<script src="/valve/Public/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="/valve/Public/js/bootstrap.min.js"></script>
<script src="/valve/Public/js/Validform_v5.3.2_min.js"></script>
<script src="/valve/Public/js/Validform_Datatype.js"></script>
<script src="/valve/Public/js/alertify.min.js"></script>
<script src="/valve/Public/js/My97DatePicker/WdatePicker.js"></script>
<script src="/valve/Public/js/common.js"></script>
<script src="/valve/Public/js/bootstrap-typeahead.js"></script>

	<script type="text/javascript" src="/valve/Public/js/customize/index.js">
	</script>
	<script>
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