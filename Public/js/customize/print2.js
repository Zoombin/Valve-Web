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


}
pagesetup_null();
