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
			<div class="page-title mytitle">
				<h1>
					<i class="icon-plus"></i>新增报告
					<a href="<?php echo U('Project/index');?>" class="pull-right"><i class="icon-list"></i>返回列表页</a>
					<!-- <a href="javascript:;" onclick="savepPoduct();" class="pull-right"><i class="icon-save"></i>保存报告</a>-->
				</h1>
			</div>
			<div class="form-group col-md-12">
				<form class="form-horizontal" action="<?php echo U('Project/add');?>" method="post" id="searchform">
					<label class="control-label col-md-4">搜索公司</label>
					<div class="col-md-4" id="innercompanys"></div>
					<div id="listcompanys" hidden>'[<?php if(is_array($companys)): $i = 0; $__LIST__ = $companys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>"<?php echo ($vo); ?>",<?php endforeach; endif; else: echo "" ;endif; ?>]'</div>
					<input type="button" id="btnSearch" value="导出公司信息">
				</form>
			</div>
			<div class="row">
				<div class="col-sm-12 rcontent">
					<form class="form-horizontal" action="<?php echo U('Project/save');?>" method="post" id="form">
						<input type="hidden" name="id" id="id" value="<?php echo ($project["id"]); ?>">
						<div class="widget-container fluid-height tab-panel show">
							<div class="heading">
								<i class="icon-info"></i>具体信息</div>
							<div class="widget-content padded clearfix">
								<fieldset>
									<legend>基本信息</legend>

									<div class="form-group col-md-6">
										<label class="control-label col-md-4">送达地:</label>
										<div class="col-md-8">
											<?php if(is_array($sendfroms)): $tpkey = 0; $__LIST__ = $sendfroms;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tpo): $mod = ($tpkey % 2 );++$tpkey; if($tpkey == $project["sendfrom"] ): ?><label class="checkbox-inline"><input type="radio" name="sendfrom" value="<?php echo ($tpkey); ?>" checked><span><?php echo ($tpo); ?></span></label>
												<?php else: ?>
												<label class="checkbox-inline"><input type="radio" name="sendfrom" value="<?php echo ($tpkey); ?>"><span><?php echo ($tpo); ?></span></label><?php endif; endforeach; endif; else: echo "" ;endif; ?>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">用途:</label>
										<div class="col-md-8">
											<?php if(is_array($usetos)): $i = 0; $__LIST__ = $usetos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$uo): $mod = ($i % 2 );++$i; if($uo["key"] == $project['useto']): ?><label class="checkbox-inline"><input type="radio" name="useto" value="<?php echo ($uo["key"]); ?>" checked><span><?php echo ($uo["value"]); ?></span></label>
												<?php else: ?>
												<label class="checkbox-inline"><input type="radio" name="useto" value="<?php echo ($uo["key"]); ?>"><span><?php echo ($uo["value"]); ?></span></label><?php endif; endforeach; endif; else: echo "" ;endif; ?>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">报告编号:</label>
										<div class="col-md-8">
											<input name="rnum" id="rnum" maxlength="30" class="form-control" value="<?php echo ($project["rnum"]); ?>">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">新旧情况:</label>
										<div class="col-md-8">
											<div class="col-md-8" hidden>
												<input type="text"  id="newold" value="<?php echo ($project["newold"]); ?>" class="form-control" >
											</div>
											<div class="col-md-8">
												<label class="checkbox-inline"><input type="radio" name="newold" value="新" id="new"><span>新</span></label>
												<label class="checkbox-inline"><input type="radio" name="newold" value="旧" id="old"><span>旧</span></label>
											</div>
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="control-label col-md-2">使用单位:</label>
										<div class="col-md-8">
											<input type="text" name="company" id="company" value="<?php echo ($project["company"]); ?>" maxlength="255" class="form-control">
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="control-label col-md-2">单位地址:</label>
										<div class="col-md-8">
											<input type="text" name="address" id="address" value="<?php echo ($project["address"]); ?>" maxlength="255" class="form-control">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">联系人:</label>
										<div class="col-md-8">
											<input type="text" name="contact" id="contact" value="<?php echo ($project["contact"]); ?>" maxlength="30" class="form-control">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">联系电话:</label>
										<div class="col-md-8">
											<input type="text" name="phone" id="phone" value="<?php echo ($project["phone"]); ?>" maxlength="20" class="form-control">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">设备代码:</label>
										<div class="col-md-8">
											<input type="text" name="devnum" id="devnum" value="<?php echo ($project["devnum"]); ?>" maxlength="50" class="form-control">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">安装位置:</label>
										<div class="col-md-8">
											<input type="text" name="installPosition" value="<?php echo ($project["installposition"]); ?>" id="installPosition" maxlength="255" class="form-control">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">安全阀类型:</label>
										<div class="col-md-8" hidden>
											<input type="text"  id="type" value="<?php echo ($project["type"]); ?>" class="form-control" >
										</div>
											<div class="col-md-8">
												<label class="checkbox-inline"><input type="radio" name="type" value="弹簧式" id="type1"><span>弹簧式</span></label>
												<label class="checkbox-inline"><input type="radio" name="type" value="先导式" id="type2"><span>先导式</span></label>
												<label class="checkbox-inline"><input type="radio" name="type" value="重锤式" id="type3"><span>重锤式</span></label>
											</div>
										<!--</div>-->
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">安全阀型号:</label>
										<div class="col-md-8">
											<input type="text" name="model" id="model" value="<?php echo ($project["model"]); ?>" maxlength="50" class="form-control">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">工作压力:</label>
										<div class="col-md-8">
											<div class="input-group">
									           <input type="text" name="workPressure" id="workPressure" value="<?php echo ($project["workpressure"]); ?>" dataType="decimal" ignore="ignore" class="form-control"><span class="input-group-addon">MPa</span>
									        </div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">工作介质:</label>
										<div class="col-md-8">
											<input type="text" name="workMedium" id="workMedium" value="<?php echo ($project["workmedium"]); ?>" class="form-control">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">要求整定压力:</label>
										<div class="col-md-4">
											<div class="input-group">
									           <input type="text" name="needPressure" id="needPressure" value="<?php echo ($project["needpressure"]); ?>" class="form-control" dataType="decimal" ignore="ignore"><span class="input-group-addon">MPa</span>
									        </div>
										</div>
										<div class="col-md-4">
											<div class="input-group">
												<input type="button" class="btn btn-info" value="生成数据" id="btnMakeData">
											</div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">执行标准:</label>
										<div class="col-md-8">
											<?php if(is_array($standards)): $skey = 0; $__LIST__ = $standards;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($skey % 2 );++$skey;?><label class="radio-inline"><span><?php echo ($so); ?></span></label><?php endforeach; endif; else: echo "" ;endif; ?>
										</div>
									</div>
									<div class="form-group col-md-6 clear">
										<label class="control-label col-md-4">校验方式:</label>
										<div class="col-md-8" hidden>
											<input type="text"  id="verifyType" value="<?php echo ($project["verifytype"]); ?>" class="form-control" >
										</div>
										<div class="col-md-8">
										<label class="checkbox-inline"><input type="radio" name="verifyType" value="离线校验" id="verifyType1"><span>离线校验</span></label>
										<label class="checkbox-inline"><input type="radio" name="verifyType" value="在线校验" id="verifyType2"><span>在线校验</span></label>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">校验介质:</label>
										<div class="col-md-8">
											<input type="text" name="verifyMedium" id="verifyMedium" value="<?php echo ($project["verifymedium"]); ?>" class="form-control">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">整定压力:</label>
										<div class="col-md-8">
											<div class="input-group">
									           <input type="text" name="setPressure" id="setPressure" value="<?php echo ($project["setpressure"]); ?>" class="form-control" dataType="decimal" ignore="ignore"><span class="input-group-addon">MPa</span>
									        </div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">密封试验压力:</label>
										<div class="col-md-8">
											<div class="input-group">
									           <input type="text" class="form-control" name="finalPressure" id="finalPressure" value="<?php echo ($project["finalpressure"]); ?>" dataType="decimal" ignore="ignore"><span class="input-group-addon">MPa</span>
									        </div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">校验结果:</label>
										<div class="col-md-8">
											<div id="verifyResult" hidden>
											<input type="text" name="verifyResult" id="txtverifyResult" value="<?php echo ($project["verifyresult"]); ?>" class="form-control">
											</div>
											<select class="form-control" id="lstverifyResult" name="verifyResult">
												<option value="合格">合格</option>
												<option value="不合格">不合格</option>
											</select>

										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">校验标牌号:</label>
										<div class="col-md-8">
											<input type="text" name="verifyNum" id="verifyNum" value="<?php echo ($project["verifynum"]); ?>" class="form-control">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">校验日期:</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="text" name="verifyDate" id="verifyDate" value="<?php echo ($project["verifydate"]); ?>" readonly="readonly" class="form-control datepicker" onchange="verifyDateChange()">
												<span class="input-group-addon">
													<i class="icon-calendar"></i>
												</span>
											</div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">下次校验日期:</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="text" name="nextVerifyDate" id="nextVerifyDate" value="<?php echo ($project["nextverifydate"]); ?>" readonly="readonly" class="form-control datepicker">
												<span class="input-group-addon">
													<i class="icon-calendar"></i>
												</span>
											</div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">校验:</label>
										<div class="col-md-8">
											<div class="form-group">
									            <div class="col-sm-6">
									              <!--<input type="text" placeholder="校验人" id="verifyMan" name="verifyMan" value="<?php echo ($project["verifyman"]); ?>" class="form-control">-->
													<div hidden><input type="text"  id="txtverifyman" value="<?php echo ($project["verifyman"]); ?>" class="form-control"></div>
													<select id="verifyMan" class="form-control" name="verifyMan">
														<option value="0">请选择</option>
														<option value="/valve/Public/images/feng.jpg">丰晟涵</option>
														<option value="/valve/Public/images/pu.jpg">浦一顺</option>
														<option value="/valve/Public/images/zhou.jpg">周志刚</option>
														<option value="/valve/Public/images/ma.jpg">马龙</option>
														<option value="/valve/Public/images/xu.jpg">徐智杰</option>
														<option value="/valve/Public/images/lixin.jpg">李欣</option>
														<option value="/valve/Public/images/liwei.jpg">李伟</option>邵学敏
														<option value="/valve/Public/images/shao.jpg">邵学敏</option>
														<option value="/valve/Public/images/fugengxing.png">府根兴</option>
														<option value="/valve/Public/images/xuyongqian.png">徐永前</option>
													</select>
									            </div>
									            <div class="col-sm-6">
									            	<div class="input-group">
										              	<input type="text" placeholder="校验时间" id="verifyManDate" name="verifyManDate" value="<?php echo ($project["verifymandate"]); ?>" readonly="readonly" class="form-control datepicker"><span class="input-group-addon">
														<i class="icon-calendar"></i>
														</span>
													</div>
									            </div>
									         </div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">审核人:</label>
										<div class="col-md-8">
											<div class="form-group">
									            <div class="col-sm-6">
													<div hidden><input type="text"  id="txtcheckman" value="<?php echo ($project["checkman"]); ?>" class="form-control"></div>
													<select id="checkman" class="form-control" name="checkman">
														<option value="0">请选择</option>
														<option value="/valve/Public/images/feng.jpg">丰晟涵</option>
														<option value="/valve/Public/images/pu.jpg">浦一顺</option>
														<option value="/valve/Public/images/zhou.jpg">周志刚</option>
														<option value="/valve/Public/images/ma.jpg">马龙</option>
														<option value="/valve/Public/images/xu.jpg">徐智杰</option>
														<option value="/valve/Public/images/lixin.jpg">李欣</option>
														<option value="/valve/Public/images/liwei.jpg">李伟</option>
														<option value="/valve/Public/images/shao.jpg">邵学敏</option>
														<option value="/valve/Public/images/fugengxing.png">府根兴</option>
														<option value="/valve/Public/images/xuyongqian.png">徐永前</option>
													</select>
									            </div>
									            <div class="col-sm-6">
									            	<div class="input-group">
										              	<input type="text" placeholder="审核时间" id="checkmandate" name="checkmandate" value="<?php echo ($project["checkmandate"]); ?>" readonly="readonly" class="form-control datepicker">
										              	<span class="input-group-addon">
															<i class="icon-calendar"></i>
														</span>
													</div>
									            </div>
									         </div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">审批:</label>
										<div class="col-md-8">
											<div class="form-group">
									            <div class="col-sm-6">
									              <div hidden><input type="text"  id="txtauditMan" value="<?php echo ($project["auditman"]); ?>" class="form-control"></div>
													<select id="auditMan" class="form-control" name="auditMan">
														<option value="0">请选择</option>
														<option value="/valve/Public/images/feng.jpg">丰晟涵</option>
														<option value="/valve/Public/images/pu.jpg">浦一顺</option>
														<option value="/valve/Public/images/zhou.jpg">周志刚</option>
														<option value="/valve/Public/images/ma.jpg">马龙</option>
														<option value="/valve/Public/images/xu.jpg">徐智杰</option>
														<option value="/valve/Public/images/lixin.jpg">李欣</option>
														<option value="/valve/Public/images/liwei.jpg">李伟</option>
														<option value="/valve/Public/images/shao.jpg">邵学敏</option>
														<option value="/valve/Public/images/fugengxing.png">府根兴</option>
														<option value="/valve/Public/images/xuyongqian.png">徐永前</option>
													</select>
									            </div>
									            <div class="col-sm-6">
									            	<div class="input-group">
										              	<input type="text" placeholder="审批时间" id="auditManDate" name="auditManDate" value="<?php echo ($project["auditmandate"]); ?>" readonly="readonly" class="form-control datepicker">
										              	<span class="input-group-addon">
															<i class="icon-calendar"></i>
														</span>
													</div>
									            </div>
									         </div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">维护检修情况:</label>
										<div class="col-md-8">
										<?php if(is_array($repairs)): $i = 0; $__LIST__ = $repairs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i; if($ro["isselected"] == 1): ?><label class="checkbox-inline"><input type="checkbox" name="repairs[]" value="<?php echo ($ro["id"]); ?>" checked><span><?php echo ($ro["text"]); ?></span></label>
												<?php else: ?>
												<label class="checkbox-inline"><input type="checkbox" name="repairs[]" value="<?php echo ($ro["id"]); ?>"><span><?php echo ($ro["text"]); ?></span></label><?php endif; endforeach; endif; else: echo "" ;endif; ?>
											<input type="text" name="otherRepair" id="otherrepair" value="<?php echo ($project["otherrepair"]); ?>" class="form-control" placeholder="其他情况">
										</div>
									</div>
								</fieldset>
								<fieldset>
									<legend>校验记录</legend>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">公称通径:</label>
										<div class="col-md-8">
											<div class="input-group">
									           <input type="text" class="form-control" id="gctj" name="gctj" value="<?php echo ($project["gctj"]); ?>" dataType="decimal" ignore="ignore"><span class="input-group-addon">mm</span>
									        </div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">阀座口径:</label>
										<div class="col-md-8">
											<div class="input-group">
									           <input type="text" class="form-control" id="fztj" name="fztj" value="<?php echo ($project["fztj"]); ?>" dataType="decimal" ignore="ignore"><span class="input-group-addon">mm</span>
									        </div>
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="control-label col-md-2">制造单位:</label>
										<div class="col-md-8">
									           <input type="text" id="madeCompany" name="madeCompany" value="<?php echo ($project["madecompany"]); ?>" maxlength="150" class="form-control">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">制造许可证编号:</label>
										<div class="col-md-8">
											<input name="mlnum" id="mlnum" value="<?php echo ($project["mlnum"]); ?>" maxlength="50" class="form-control" type="text">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">压力级别范围:</label>
										<div class="col-md-8">
											<div class="col-sm-5">
											<div class="input-group">
												<input name="pLevelFrom" id="pLevelFrom" value="<?php echo ($project["plevelfrom"]); ?>" class="form-control" type="text" dataType="decimal" ignore="ignore">
												<span class="input-group-addon">MPa</span>
											</div>
											</div>
											<label class="control-label col-sm-2" style="text-align: center;">至</label>
											<div class="col-sm-5">
											<div class="input-group">
												<input name="pLevelTo" id="pLevelTo" value="<?php echo ($project["plevelto"]); ?>" class="form-control" type="text" dataType="decimal" ignore="ignore">
												<span class="input-group-addon">MPa</span>
											</div>
											</div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">产品编号:</label>
										<div class="col-md-8">
											<input name="sku" id="sku" value="<?php echo ($project["sku"]); ?>" maxlength="30" class="form-control" type="text">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">出厂日期:</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="text" name="madeDate" id="madeDate" value="<?php echo ($project["madedate"]); ?>" readonly="readonly" class="form-control datepicker">
												<span class="input-group-addon">
													<i class="icon-calendar"></i>
												</span>
											</div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">校验编号:</label>
										<div class="col-md-8">
											<input name="recVerifyNum" id="recVerifyNum" value="<?php echo ($project["recverifynum"]); ?>" class="form-control" type="text">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">校验介质温度:</label>
										<div class="col-md-8">
											<div class="input-group">
													<input name="temperature" id="temperature" value="<?php echo ($project["temperature"]); ?>" class="form-control" type="text" dataType="decimal" ignore="ignore">
													<span class="input-group-addon">℃</span>
												 </div>
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="control-label col-md-2">外观检查:</label>
										<div class="col-md-8">
									           <input type="text" id="wgjc" name="wgjc" value="<?php echo ($project["wgjc"]); ?>" class="form-control">
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="control-label col-md-2">拆卸检查维修:</label>
										<div class="col-md-8">
									           <input type="text" id="cxjcwx" name="cxjcwx" value="<?php echo ($project["cxjcwx"]); ?>" class="form-control">
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="control-label col-md-2">实际整定压力:</label>
										<div class="col-md-8">
											   <div class="col-sm-4">
									           <div class="input-group">
												<input name="truePressure1" id="truePressure1" value="<?php echo ($project["truepressure1"]); ?>" placeholder="第1次" class="form-control" type="text" dataType="decimal" ignore="ignore">
												<span class="input-group-addon">MPa</span>
												</div>
												</div>
												<div class="col-sm-4">
												 <div class="input-group">
												<input name="truePressure2" id="truePressure2" value="<?php echo ($project["truepressure2"]); ?>" placeholder="第2次" class="form-control" type="text" dataType="decimal" ignore="ignore">
												<span class="input-group-addon">MPa</span>
												</div>
												</div>
												<div class="col-sm-4">
												 <div class="input-group">
													<input name="truePressure3" id="truePressure3" value="<?php echo ($project["truepressure3"]); ?>" placeholder="第3次" class="form-control" type="text" dataType="decimal" ignore="ignore">
													<span class="input-group-addon">MPa</span>
												 </div>
												</div>
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="control-label col-md-2">密封试验压力:</label>
										<div class="col-md-8">
											   <div class="col-sm-4">
									           <div class="input-group">
												<input name="closePressure1" id="closePressure1" value="<?php echo ($project["closepressure1"]); ?>" placeholder="第1次" class="form-control" type="text" dataType="decimal" ignore="ignore">
												<span class="input-group-addon">MPa</span>
												</div>
												</div>
												<div class="col-sm-4">
												 <div class="input-group">
												<input name="closePressure2" id="closePressure2" value="<?php echo ($project["closepressure2"]); ?>" placeholder="第2次" class="form-control" type="text" dataType="decimal" ignore="ignore">
												<span class="input-group-addon">MPa</span>
												</div>
												</div>
												<div class="col-sm-4">
												 <div class="input-group">
													<input name="closePressure3" id="closePressure3" value="<?php echo ($project["closepressure3"]); ?>" placeholder="第3次" class="form-control" type="text" dataType="decimal" ignore="ignore">
													<span class="input-group-addon">MPa</span>
												 </div>
												</div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">校验结论:</label>
										<div class="col-md-8">
											<input name="recVerifyResult" id="recVerifyResult" value="<?php echo ($project["recverifyresult"]); ?>" class="form-control" type="text">
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">校验有效期:</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="text" name="verifyValidateDate" id="verifyValidateDate" value="<?php echo ($project["verifyvalidatedate"]); ?>" readonly="readonly" class="form-control datepicker">
												<span class="input-group-addon">
													<i class="icon-calendar"></i>
												</span>
											</div>
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="control-label col-md-2">备注:</label>
										<div class="col-md-8">
									           <input type="text" id="remarks" name="remarks" value="<?php echo ($project["remarks"]); ?>" class="form-control">
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="control-label col-md-6">数量</label>
										<div class="col-md-1">
											<input type="number" value="1" id="autoAddNum" name="autoAddNum" class="form-control">
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="control-label col-md-6"></label>
										<div class="col-md-6">
											<input type="submit" value="保存报告" class="btn btn-primary">
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</form>
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

		<script type="text/javascript" src="/valve/Public/js/customize/add.js">

		</script>
	</body>

</html>