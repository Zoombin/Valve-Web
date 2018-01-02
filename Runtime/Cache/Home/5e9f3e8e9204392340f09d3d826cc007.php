<?php if (!defined('THINK_PATH')) exit();?><!--注明：代码里有用到&nbsp;是为了让文字对其-->
<!DOCTYPE html>
<html>
	<head lang="en">
    <meta charset="utf-8">
		<link href="/valve/Public/css/screen.css" media="screen" rel="stylesheet">
		<link href="/valve/Public/css/print.css" media="print" rel="stylesheet">
	</head>
	<body onload="load()">
		<!--hidden fields-->
		<div hidden>
			<input type="text" id="verifyResult" value="<?php echo ($project["verifyresult"]); ?>">
			<input type="text" id="gctj" value="<?php echo ($project["gctj"]); ?>">
			<input type="text" value="<?php echo ($project["type"]); ?>" id="typetxt">
			<input type="text" value="<?php echo ($project["devnum"]); ?>" id="txtdevnum">
		</div>
		<div class="container-fluid main-content">
		<div class="left-num">ZTABG03-<?php echo ($year); ?></div>
		<table class="data-table noborder">
		<caption>安 全 阀 校 验 报 告</caption>
        <tr>
        	<td colspan="2" class="w50 noborder"></td>
        	<td colspan="2" class="noborder text-right rnum" style="padding-right: 0%">报告编号：<span><?php echo ($project["rnum"]); ?></span></td>
        </tr>
	        <tr>
	          <td class="w25 hbt hbl">使用单位</td>
	          <td class="w75 hand-write hbt hbr" colspan="3"><?php echo ($project["company"]); ?></td>
            </tr>
	        <tr>
	          <td class="w25 hbl">单位地址</td>
	          <td colspan="3" class="w75 hand-write hbr"><?php echo ($project["address"]); ?></td>
            </tr>
	        <tr>
	          <td class="w25 hbl">联系人</td>
	          <td class="w25 hand-write"><?php echo ($project["contact"]); ?></td>
	          <td class="w25">联系电话</td>
	          <td  class="w25 hand-write hbr"><?php echo ($project["phone"]); ?></td>
            </tr>
	        <tr>
	          <td class="w25 hbl">设备代码</td>
				<td class="w25 hand-write"><div id="devnum"></div></td>
	          <td class="w25">安装位置</td>
	          <td class="w25 hand-write hbr"><?php echo ($project["installposition"]); ?></td>
            </tr>
	        <tr>
	          <td class="w25 hbl">安全阀类型</td>
	          <td class="w25 hand-write typecheckbox" style="font-size: 14px;"><div><div id="type" align="left"></div></div></td>
	          <td class="w25">安全阀型号</td>
	          <td class="w25 hand-write hbr"><?php echo ($project["model"]); ?><span id="gctjAfter" hidden>&nbsp;DN<?php echo ($project["gctj"]); ?></span></td>
            </tr>
	        <tr>
	          <td class="w25 hbl">工作压力</td>
	          <td class="w25 hand-write"><span class="text-info">&nbsp;&nbsp;<?php echo ($project["workpressure"]); ?></span><span class="text-unit">MPa</span></td>
	          <td class="w25">工作介质</td>
	          <td class="w25 hand-write hbr"><?php echo ($project["workmedium"]); ?></td>
            </tr>
	        <tr>
	          <td class="w25 hbl">要求整定压力</td>
	          <td class="w25 hand-write"><span class="text-info">&nbsp;&nbsp;<?php echo ($project["needpressure"]); ?></span><span class="text-unit">MPa</span></td>
	          <td class="w25">执行标准</td>
	          <td class="w25 hand-write standard hbr">
	          <?php if(is_array($standards)): $skey = 0; $__LIST__ = $standards;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($skey % 2 );++$skey;?><span><?php echo ($so); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
	          </td>
            </tr>
	        <tr>
	          <td class="w25 hbl">校验方式</td>
			  <td class="w25 hand-write"><?php echo ($project["verifytype"]); ?></td>
	          <td class="w25">校验介质</td>
	          <td class="w25 hand-write hbr"><?php echo ($project["verifymedium"]); ?></td>
            </tr>
	        <tr>
	          <td class="w25 hbl">整定压力</td>
	          <td class="w25 hand-write"><span class="text-info" id="spanSetPressure">&nbsp;&nbsp;<?php echo ($project["setpressure"]); ?></span><span class="text-unit">MPa</span></td>
	          <td class="w25">密封试验压力</td>
	          <td class="w25 hand-write hbr"><span class="text-info" id="spanFinalPressure">&nbsp;&nbsp;<?php echo ($project["finalpressure"]); ?></span><span class="text-unit">MPa</span></td>
            </tr>
	        <tr>
	          <td class="w25 hbl">校验结果</td>
	          <td class="w25 hand-write"><?php echo ($project["verifyresult"]); ?> </td>
	          <td class="w25">校验标牌号</td>
				<td class="w25 hand-write hbr"><div id="rnum">
					<input type="text" value="<?php echo ($project["rnum"]); ?>" id="txtrnum">
				</div></td>
            </tr>
	        <tr>
	          <td colspan="4" class="w100 hbr hbl nopadding" ><h3>维护检修情况说明：</h3><ul class="rlist">
	          	<li>1.该安全阀经校验合格并有标牌及铅封编号，本校验报告仅对委托校验的安全阀有效；</li>
	          	<li>2.本校验报告复印件无效，未加盖本单位&ldquo;专用章&rdquo;无效，有效期至下次校验日期止；</li>
	          	<li>3.使用单位不得自行拆卸铅封进行调试，铅封一旦损坏，本校验报告自行失效；  </li>
	          	<li>4.为了确保安全阀灵敏，可靠，按国家规定，安全阀一年应进行一次定期校验； </li>
	          	<li>5.使用单位应按规定的允许使用参数使用，严禁超温、超压使用。</li>
                <li>维护检修情况说明：<?php if(is_array($repairs)): $i = 0; $__LIST__ = $repairs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i; if($ro["isselected"] == 1): ?><label class="checkbox-inline"><?php echo ($ro["text"]); ?></label><?php endif; endforeach; endif; else: echo "" ;endif; echo ($project["otherrepair"]); ?></li>
	          </ul></td>
            </tr>
	        <tr>
	          <td class="w25 hbl">校验日期</td>
	          <td class="w25 hand-write"><?php echo ($project["verifydate"]); ?></td>
	          <td class="w25">下次校验日期</td>
	          <td class="w25 hand-write hbr"><span id="spanNextVerifyDate"><?php echo ($project["nextverifydate"]); ?></span></td>
            </tr>
       		<tr>
	          <td colspan="2" class="w50 hbl" style="height: 70px; text-align: left;"> 校验：<div hidden>
				  <input type="text" value="<?php echo ($project["verifyman"]); ?>" id="verifyman"></div><img id="jiaoyanImg">

	          <span style="float: right;margin-top: 7px;padding-right: 5px;"><?php echo ($project["verifymandate"]); ?></span></td>
				<td rowspan="3" colspan="2" class="hbr hbb" style="padding: 14px 0;text-align: center;" >
					苏州中特安安全阀检测研究有限公司<br><br>
					检验机构核准编号： <?php echo ($project["hzbh"]); ?><br>
					校验机构专用章 (章) <br><br>
					日期: <?php echo ($project["verifydate"]); ?>
				</td>
            </tr>
            <tr>
              <td colspan="2" class="w50 hbl" style="height: 70px;text-align: left;"> 审核：<div hidden><input type="text" value=<?php echo ($project["checkman"]); ?> id="checkman"></div><img id="shenheImg">
              <span style="float: right;margin-top: 7px;padding-right: 5px;"><?php echo ($project["checkmandate"]); ?></span></td>
            </tr>
	        <tr>
	          <td colspan="2" class="w50 hbl hbb" style="height: 70px; text-align: left;"> 审批：<div hidden><input type="text" value=<?php echo ($project["auditman"]); ?> id="auditman" ></div><img id="shenpiImg"><span style="float: right;margin-top: 7px;padding-right: 5px;"><?php echo ($project["auditmandate"]); ?></span></td>
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
    <script type="text/javascript" src="/valve/Public/js/customize/print1.js">
	 </script>
	</body>
</html>