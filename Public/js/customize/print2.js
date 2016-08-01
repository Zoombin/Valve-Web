function pagesetup_null()
{

    var RegWsh = new ActiveXObject("WScript.Shell");
    hkey_key="header";
    RegWsh.RegWrite(hkey_root+hkey_path+hkey_key,"");
    hkey_key="footer";
    RegWsh.RegWrite(hkey_root+hkey_path+hkey_key,"");

}
function load(){


    //显示电子签名
    var checkman = document.getElementById('checkman').value;
    var verifyman = document.getElementById('verifyman').value;

    if(checkman!=0){
        var shenheImg = document.getElementById("shenheImg");
        shenheImg.src= checkman;
    }

    if(verifyman!=0){
        var jiaoyanImg = document.getElementById("jiaoyanImg");
        jiaoyanImg.src= verifyman;
    }

    //若为不合格，记录中的3次实际整定压力和3次密封试验压力都变为/。校验有效期变为/。
    var verifyResult = document.getElementById("verifyResult").value;

    if(verifyResult=='不合格') {
        document.getElementById("truepressure1").innerHTML = '<span class="text-info" id="truepressure1">&nbsp;&nbsp;/</span>';
        document.getElementById("truepressure2").innerHTML = '<span class="text-info" id="truepressure2">&nbsp;&nbsp;/</span>';
        document.getElementById("truepressure3").innerHTML = '<span class="text-info" id="truepressure3">&nbsp;&nbsp;/</span>';
        document.getElementById("closepressure1").innerHTML = '<span class="text-info" id="closepressure1">&nbsp;&nbsp;/</span>';
        document.getElementById("closepressure2").innerHTML = '<span class="text-info" id="closepressure2">&nbsp;&nbsp;/</span>';
        document.getElementById("closepressure3").innerHTML = '<span class="text-info" id="closepressure3">&nbsp;&nbsp;/</span>';
        document.getElementById("verifyvalidatedate").innerHTML = '<span id="verifyvalidatedate">/</span>'
    }

}
pagesetup_null();
