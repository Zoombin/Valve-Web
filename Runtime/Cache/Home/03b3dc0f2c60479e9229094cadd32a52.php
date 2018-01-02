<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<link href="/valve/Public/css/screen.css" media="screen" rel="stylesheet">
	<link href="/valve/Public/css/print.css" media="print" rel="stylesheet">
</head>
<body onload="load()">

<div class="container-fluid main-content">
	<div class="left-num">ZTABG02-<?php echo ($year); ?></div>
	<table class="data-table noborder">
		<caption>安 全 阀 校 验 记 录<!--<span><?php echo ($project["rnum"]); ?></span>--></caption>
		<tr>
			<td colspan="2" class="w50 noborder"></td>
			<td colspan="2" class="noborder text-right rnum" style="padding-right: 0%">编号：<span><?php echo ($project["rnum"]); ?></span></td>
		</tr>
		<tr>
			<td class="w25 hbt hbl">使用单位</td>
			<td class="w75 hand-write hbt hbr" colspan="3"><?php echo ($project["company"]); ?></td>
		</tr>
		<tr>
			<td class="w25 hbl">设备代码</td>
			<td class="w25 hand-write"><?php echo ($project["devnum"]); ?></td>
			<td class="w25">要求整定压力</td>
			<td class="w25 hand-write hbr"><span class="text-info">&nbsp;&nbsp;<?php echo ($project["needpressure"]); ?></span><span class="text-unit">MPa</span></td>
		</tr>
		<tr>
			<td class="w25 hbl">工作介质</td>
			<td class="w25 hand-write"><?php echo ($project["workmedium"]); ?></td>
			<td class="w25">安全阀型号</td>
			<td class="w25 hand-write hbr"><?php echo ($project["model"]); ?></td>
		</tr>
		<tr>
			<td class="w25 hbl">公称通径</td>
			<td class="w25 hand-write"><span class="text-info">&nbsp;&nbsp;<?php echo ($project["gctj"]); ?></span><span class="text-unit">mm</span></td>
			<td class="w25">阀座口径</td>
			<td class="w25 hand-write hbr"><span class="text-info">&nbsp;&nbsp;<?php echo ($project["fztj"]); ?></span><span class="text-unit">mm</span></td>
		</tr>
		<tr>
			<td class="w25 hbl">制造单位</td>
			<td colspan="3" class="w75 hand-write hbr"><?php echo ($project["madecompany"]); ?></td>
		</tr>
		<tr>
			<td class="w25 hbl">制造许可证编号</td>
			<td class="w25 hand-write"><?php echo ($project["mlnum"]); ?></td>
			<td class="w25">压力级别范围</td>
			<td class="w25 hand-write hbr">
				<span style="float: left;">&nbsp;<?php echo ($project["plevelfrom"]); ?></span>
				<span>MPa至</span>
				<span>&nbsp;<?php echo ($project["plevelto"]); ?></span>
				<span style="float: right;">MPa</span>
			</td>
		</tr>
		<tr>
			<td class="w25 hbl">产品编号</td>
			<td class="w25 hand-write"><?php echo ($project["sku"]); ?></td>
			<td class="w25">出厂日期</td>
			<td class="w25 hand-write hbr"><?php echo ($project["madedate"]); ?></td>
		</tr>
		<tr style="height: 30px;">
			<td class="w25 hbl">校验方式</td>
			<td class="w25 hand-write"><?php echo ($project["verifytype"]); ?></td>
			<td class="w25">校验编号</td>
			<td class="w25 hand-write hbr"><?php echo ($project["verifynum"]); ?></td>
		</tr>
		<tr>
			<td class="w25 hbl">校验介质</td>
			<td class="w25 hand-write"><?php echo ($project["verifymedium"]); ?></td>
			<td class="w25">校验介质温度</td>
			<td class="w25 hand-write hbr"><span class="text-info">&nbsp;&nbsp;<?php echo ($project["temperature"]); ?></span><span class="text-unit">℃</span></td>
		</tr>
		<tr>
			<td class="w100 hbl hbr hbr" colspan="4">检查与校验</td>
		</tr>
		<tr>
			<td class="w25 hbl">外观<br>检查</td>
			<td class="w75 hand-write hbr" colspan="3"><?php echo ($project["wgjc"]); ?></td>
		</tr>
		<tr>
			<td class="w25 hbl">拆卸<br>检查<br>维修</td>
			<td colspan="3" class="w75 hand-write hbr"><?php echo ($project["cxjcwx"]); ?> </td>
		</tr>
		<tr>
			<td class="w25 hbl">试验次数</td>
			<td class="w25">第1次</td>
			<td class="w25">第2次</td>
			<td class="w25 hbr">第3次</td>
		</tr>
		<tr>
			<div hidden><input type="text" id="verifyResult" value="<?php echo ($project["verifyresult"]); ?>"></div>
			<td class="w25 hbl">实际整定压力</td>
			<td class="w25 hand-write"><span class="text-info" id="truepressure1">&nbsp;&nbsp;<?php echo ($project["truepressure1"]); ?></span><span class="text-unit">MPa</span></td>
			<td class="w25 hand-write"><span class="text-info" id="truepressure2">&nbsp;&nbsp;<?php echo ($project["truepressure2"]); ?></span><span class="text-unit">MPa</span></td>
			<td class="w25 hand-write"><span class="text-info" id="truepressure3">&nbsp;&nbsp;<?php echo ($project["truepressure3"]); ?></span><span class="text-unit">MPa</span></td>
		</tr>
		<tr>
			<td class="w25 hbl">密封试验压力</td>
			<td class="w25 hand-write"><span class="text-info" id="closepressure1">&nbsp;&nbsp;<?php echo ($project["closepressure1"]); ?></span><span class="text-unit">MPa</span></td>
			<td class="w25 hand-write"><span class="text-info" id="closepressure2">&nbsp;&nbsp;<?php echo ($project["closepressure2"]); ?></span><span class="text-unit">MPa</span></td>
			<td class="w25 hand-write"><span class="text-info" id="closepressure3">&nbsp;&nbsp;<?php echo ($project["closepressure3"]); ?></span><span class="text-unit">MPa</span></td>
		</tr>
		<tr>
			<td class="w25 hbl">校验结论</td>
			<td class="w25 hand-write"><?php echo ($project["recverifyresult"]); ?></td>
			<td class="w25">校验有效期</td>
			<td class="w25 hand-write hbr"><span id="verifyvalidatedate"><?php echo ($project["verifyvalidatedate"]); ?></span></td>
		</tr>
		<tr>
			<td colspan="4" class="w100 text-left hbl hbr" style="height: 40px;">备注： <span class="hand-write"><?php echo ($project["remarks"]); ?></span></td>
		</tr>
		<tr>
			<td colspan="2" class="w50 hbl" style="text-align: left;height: 40px;"> 校验： <div hidden>
				<input type="text" value="<?php echo ($project["verifyman"]); ?>" id="verifyman"></div><img id="jiaoyanImg"> <span style="float: right;margin-top: 7px;padding-right: 5px;"><?php echo ($project["verifymandate"]); ?></span></td>
			<td colspan="2" rowspan="2" class="w50 hbr hbb">校验报告编号：<span><?php echo ($project["rnum"]); ?></span></td>
		</tr>
		<tr>
			<td colspan="2" class="w50 hbl hbb" style="text-align: left;height: 40px;"> 审核： <div hidden><input type="text" value=<?php echo ($project["checkman"]); ?> id="checkman"></div><img id="shenheImg">
				<span style="float: right;margin-top: 7px;padding-right: 5px;"><?php echo ($project["checkmandate"]); ?></span></td>
		</tr>
		<tr>
			<td colspan="4" class="text-right text-small noborder">苏州中特安安全阀检测研究有限公司<br>苏州市相城区澄阳路18号</td>
		</tr>
		<tr>
			<td colspan="4"  class="text-right text-small noborder">电话：0512-65786922</td>
		</tr>
	</table>
	<button class="printbtn" onclick="window.print();">打印</button>
</div>
<script type="text/javascript" src="/valve/Public/js/customize/print2.js">
</script>
</body>

</html>