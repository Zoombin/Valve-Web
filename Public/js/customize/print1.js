function pagesetup_null()
{

    var RegWsh = new ActiveXObject("WScript.Shell");
    hkey_key="header";
    RegWsh.RegWrite(hkey_root+hkey_path+hkey_key,"");
    hkey_key="footer";
    RegWsh.RegWrite(hkey_root+hkey_path+hkey_key,"");

}
pagesetup_null();


function load()
{
    //安全阀类型改为显示checkbox
    var type= document.getElementById("typetxt").value;
    if(type=="1"){
        var typehtml = '<input type="checkbox" onclick="return false;">弹簧式'+'&nbsp;&nbsp;'+'<input type="checkbox" onclick="return false;" align="right">先导式'+'<br>'+'<input type="checkbox" onclick="return false;">重锤式';
        document.getElementById("type").innerHTML= shtml;
    }
    if(type=="弹簧式"){
        var typehtml = '<input type="checkbox" checked onclick="return false;">弹簧式'+'&nbsp;&nbsp;'+'<input type="checkbox" onclick="return false;" align="right">先导式'+'<br>'+'<input type="checkbox" onclick="return false;">重锤式';
        document.getElementById("type").innerHTML= shtml;
    }
    if(type=="先导式"){
        var typehtml = '<input type="checkbox" onclick="return false;">弹簧式'+'&nbsp;&nbsp;'+'<input type="checkbox" onclick="return false;" checked>先导式'+'<br>'+'<input type="checkbox" onclick="return false;">重锤式';

    }
    if(type=="重锤式"){
        var typehtml = '<input type="checkbox" onclick="return false;">弹簧式'+'&nbsp;&nbsp;'+'<input type="checkbox" onclick="return false;" align="right">先导式'+'<br>'+'<input type="checkbox"  checked onclick="return false;">重锤式';

    }
    document.getElementById("type").innerHTML= typehtml;

    //校验方式改为显示checkbox
    var verifyType= document.getElementById("VerifyTypetxt").value;
    if(verifyType=="离线校验"){
        var shtml = '<input type="checkbox"  checked onclick="return false;">离线校验'+'&nbsp;'+'<input type="checkbox"  onclick="return false;" align="right">在线校验';
    }
    if(verifyType=="在线校验"){
        var shtml = '<input type="checkbox" onclick="return false;">离线校验'+'&nbsp;'+'<input type="checkbox"  checked onclick="return false;">在线校验';
    }
    if(verifyType==""){
        var shtml = '<input type="checkbox" onclick="return false;">离线校验'+'&nbsp;'+'<input type="checkbox" onclick="return false;">在线校验';
    }
    document.getElementById("verifyType").innerHTML= shtml;

    //校验标牌号自定义显示
    var rnum= document.getElementById("txtrnum").value;
    var modifyrum = rnum.substring(6,9)+rnum.substring(10,15);
    document.getElementById("rnum").innerHTML= '<div style="text-align: center;">'+modifyrum+'</div>';

    //设备代码为空时显示不明
    var devnum= document.getElementById("txtdevnum").value;
    if(devnum.trim()=='') {
        document.getElementById("devnum").innerHTML = '<div style="text-align: center;">' + '不明' + '</div>';
    }

    var checkman = document.getElementById('checkman').value;
    var auditman = document.getElementById('auditman').value;
    var verifyman = document.getElementById('verifyman').value;

    if(checkman!=0){
        var shenheImg = document.getElementById("shenheImg");
        shenheImg.src= checkman;
    }

    if(verifyman!=0){
        var jiaoyanImg = document.getElementById("jiaoyanImg");
        jiaoyanImg.src= verifyman;
    }

    if(auditman!=0){
        var shenpiImg = document.getElementById("shenpiImg");
        shenpiImg.src= auditman;
    }






}
