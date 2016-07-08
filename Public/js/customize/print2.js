function pagesetup_null()
{

    var RegWsh = new ActiveXObject("WScript.Shell");
    hkey_key="header";
    RegWsh.RegWrite(hkey_root+hkey_path+hkey_key,"");
    hkey_key="footer";
    RegWsh.RegWrite(hkey_root+hkey_path+hkey_key,"");

}
function load(){

    //校验编码自定义显示
    var rnum= document.getElementById("txtrnum").value;
    var modifyrum = rnum.substring(6,15);
    document.getElementById("rnum").innerHTML= '<div style="text-align: center;">'+modifyrum+'</div>';


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

}
pagesetup_null();
