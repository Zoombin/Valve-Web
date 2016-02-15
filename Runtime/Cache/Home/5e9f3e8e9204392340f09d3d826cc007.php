<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head lang="en">
		<link href="/Public/css/screen.css" media="screen" rel="stylesheet">
		<link href="/Public/css/print.css" media="print" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid main-content">
			<div class="row">
				<div class="col-sm-12 rcontent">
					<form class="form-horizontal" action="<?php echo U('Project/save');?>" method="post" id="form">
						<input type="hidden" name="id" id="id" value="<?php echo ($project["id"]); ?>">
						<div class="widget-container fluid-height tab-panel show">
							<div class="widget-content padded clearfix">
								<fieldset>
									<legend>基本信息</legend>
									<div class="form-group col-md-12">
										<label class="control-label col-md-2">报告编号:</label>
										<div class="col-md-8">
											<input name="rnum" id="rnum" maxlength="30" class="form-control" value="<?php echo ($project["rnum"]); ?>">
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
										<div class="col-md-8">
										<?php if(is_array($types)): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$to): $mod = ($i % 2 );++$i; if($to["checked"] == 1 ): ?><label class="checkbox-inline"><input type="checkbox" name="type[]" value="<?php echo ($to["id"]); ?>" checked><span><?php echo ($to["text"]); ?></span></label>
												<?php else: ?>
												<label class="checkbox-inline"><input type="checkbox" name="type[]" value="<?php echo ($to["id"]); ?>"><span><?php echo ($to["text"]); ?></span></label><?php endif; endforeach; endif; else: echo "" ;endif; ?>
										</div>
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
									           <input type="text" name="workPressure" id="workPressure" value="<?php echo ($project["workpressure"]); ?>" dataType="n" ignore="ignore" class="form-control"><span class="input-group-addon">Mpa</span>
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
										<div class="col-md-8">
											<div class="input-group">
									           <input type="text" name="needPressure" id="needPressure" value="<?php echo ($project["needpressure"]); ?>" class="form-control" dataType="n" ignore="ignore"><span class="input-group-addon">Mpa</span>
									        </div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">执行标准:</label>
										<div class="col-md-8">
											<?php if(is_array($standards)): $skey = 0; $__LIST__ = $standards;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($skey % 2 );++$skey; if($skey == $project["standard"] ): ?><label class="radio-inline"><input name="standard" value="<?php echo ($skey); ?>" type="radio" checked><span><?php echo ($so); ?></span></label>
												<?php else: ?>
												<label class="radio-inline"><input name="standard" value="<?php echo ($skey); ?>" type="radio"><span><?php echo ($so); ?></span></label><?php endif; endforeach; endif; else: echo "" ;endif; ?>
										</div>
									</div>
									<div class="form-group col-md-6 clear">
										<label class="control-label col-md-4">校验方式:</label>
										<div class="col-md-8">
											<input type="text" name="verifyType" id="verifyType" value="<?php echo ($project["verifytype"]); ?>" class="form-control">
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
									           <input type="text" name="setPressure" id="setPressure" value="<?php echo ($project["setpressure"]); ?>" class="form-control" dataType="n" ignore="ignore"><span class="input-group-addon">Mpa</span>
									        </div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">密封试验压力:</label>
										<div class="col-md-8">
											<div class="input-group">
									           <input type="text" class="form-control" name="finalPressure" id="finalPressure" value="<?php echo ($project["finalpressure"]); ?>" dataType="n" ignore="ignore"><span class="input-group-addon">Mpa</span>
									        </div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">校验结果:</label>
										<div class="col-md-8">
											<input type="text" name="verifyResult" id="verifyResult" value="<?php echo ($project["verifyresult"]); ?>" class="form-control">
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
												<input type="text" name="verifyDate" id="verifyDate" value="<?php echo ($project["verifydate"]); ?>" readonly="readonly" class="form-control datepicker">
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
									              <input type="text" placeholder="校验人" id="verifyMan" name="verifyMan" value="<?php echo ($project["verifyman"]); ?>" class="form-control">
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
										<label class="control-label col-md-4">审批:</label>
										<div class="col-md-8">
											<div class="form-group">
									            <div class="col-sm-6">
									              <input type="text" placeholder="审批人" id="auditMan" name="auditMan" value="<?php echo ($project["auditman"]); ?>" class="form-control">
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
								</fieldset>
								<fieldset>
									<legend>校验记录</legend>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">公称通径:</label>
										<div class="col-md-8">
											<div class="input-group">
									           <input type="text" class="form-control" id="gctj" name="gctj" value="<?php echo ($project["gctj"]); ?>" dataType="n" ignore="ignore"><span class="input-group-addon">mm</span>
									        </div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label class="control-label col-md-4">阀座口径:</label>
										<div class="col-md-8">
											<div class="input-group">
									           <input type="text" class="form-control" id="fztj" name="fztj" value="<?php echo ($project["fztj"]); ?>" dataType="n" ignore="ignore"><span class="input-group-addon">mm</span>
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
												<input name="pLevelFrom" id="pLevelFrom" value="<?php echo ($project["plevelfrom"]); ?>" class="form-control" type="text" dataType="n" ignore="ignore">
												<span class="input-group-addon">Mpa</span>
											</div>
											</div>
											<label class="control-label col-sm-2" style="text-align: center;">至</label>
											<div class="col-sm-5">
											<div class="input-group">
												<input name="pLevelTo" id="pLevelTo" value="<?php echo ($project["plevelto"]); ?>" class="form-control" type="text" dataType="n" ignore="ignore">
												<span class="input-group-addon">Mpa</span>
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
													<input name="temperature" id="temperature" value="<?php echo ($project["temperature"]); ?>" class="form-control" type="text" dataType="n" ignore="ignore">
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
												<input name="truePressure1" id="truePressure1" value="<?php echo ($project["truepressure1"]); ?>" placeholder="第1次" class="form-control" type="text" dataType="n" ignore="ignore">
												<span class="input-group-addon">Mpa</span>
												</div>
												</div>
												<div class="col-sm-4">
												 <div class="input-group">
												<input name="truePressure2" id="truePressure2" value="<?php echo ($project["truepressure2"]); ?>" placeholder="第2次" class="form-control" type="text" dataType="n" ignore="ignore">
												<span class="input-group-addon">Mpa</span>
												</div>
												</div>
												<div class="col-sm-4">
												 <div class="input-group">
													<input name="truePressure3" id="truePressure3" value="<?php echo ($project["truepressure3"]); ?>" placeholder="第3次" class="form-control" type="text" dataType="n" ignore="ignore">
													<span class="input-group-addon">Mpa</span>
												 </div>
												</div>
										</div>
									</div>
									<div class="form-group col-md-12">
										<label class="control-label col-md-2">密封试验压力:</label>
										<div class="col-md-8">
											   <div class="col-sm-4">
									           <div class="input-group">
												<input name="closePressure1" id="closePressure1" value="<?php echo ($project["closepressure1"]); ?>" placeholder="第1次" class="form-control" type="text" dataType="n" ignore="ignore">
												<span class="input-group-addon">Mpa</span>
												</div>
												</div>
												<div class="col-sm-4">
												 <div class="input-group">
												<input name="closePressure2" id="closePressure2" value="<?php echo ($project["closepressure2"]); ?>" placeholder="第2次" class="form-control" type="text" dataType="n" ignore="ignore">
												<span class="input-group-addon">Mpa</span>
												</div>
												</div>
												<div class="col-sm-4">
												 <div class="input-group">
													<input name="closePressure3" id="closePressure3" value="<?php echo ($project["closepressure3"]); ?>" placeholder="第3次" class="form-control" type="text" dataType="n" ignore="ignore">
													<span class="input-group-addon">Mpa</span>
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
										<label class="control-label col-md-6"></label>
										<div class="col-md-6">
											<input type="submit" value="保存报告" onclick="window.print();" class="btn btn-primary">
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
		/**验证表单 */
		myform=$("#form").Validform({
			tiptype: function (msg, o, cssctl) {
				switch (o.type) {
					case 1:
						alertify.log('正在检测...');
						break;
					case 2:
						//alertify.success(msg, 5000);
						break;
					case 3:
						alertify.error(msg, 5000);
						break;
					case 4:
						//alertify.log(msg);
						break;
				}			
				//msg：提示信息;
				//o:{obj:*,type:*,curform:*},
				//obj指向的是当前验证的表单元素（或表单对象，验证全部验证通过，提交表单时o.obj为该表单对象），
				//type指示提示的状态，值为1、2、3、4， 1：正在检测/提交数据，2：通过验证，3：验证失败，4：提示ignore状态, 
				//curform为当前form对象;
				//cssctl:内置的提示信息样式控制函数，该函数需传入两个参数：显示提示信息的对象 和 当前提示的状态（既形参o中的type）;
			},
			postonce: true
		});
		</script>
	</body>

</html>