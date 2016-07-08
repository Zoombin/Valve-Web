function checkNum(){
    var url="{:U('Project/getnextno')}";
    var id=$.trim($("#id").val());
    if(id==''){
        var sendfrom=$("input[name=sendfrom]:checked").val();
        var useto=$("input[name=useto]:checked").val();
        if(sendfrom!=''&&useto!=''){
            $.post(url, { sendfrom: sendfrom, useto: useto },
                function(data){
                    $("#rnum").val(data);
                });
        }
    }
}
$(function(){
    $("input[name=sendfrom],input[name=useto]").change(function(){
        checkNum();
    });

});


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

function load(){
    //判断当前安全阀类型并选中
    var type= document.getElementById("type").value;
    if(type=="弹簧式"){
        document.getElementById("type1").setAttribute("checked","checked");
    }
    if(type=="先导式"){
        document.getElementById("type2").setAttribute("checked","checked");
    }
    if(type=="重锤式"){
        document.getElementById("type3").setAttribute("checked","checked");
    }

    //判断当前校验方式并选中
    var verifyType= document.getElementById("verifyType").value;
    if(verifyType=="在线校验"){
        document.getElementById("verifyType2").setAttribute("checked","checked");
    }
    if(verifyType=="离线校验"){
        document.getElementById("verifyType1").setAttribute("checked","checked");
    }

    //判断当前校验结果并选中
    var verifyResult= document.getElementById("txtverifyResult").value;
    if(verifyResult=="不合格"){
        var opts = document.getElementById('lstverifyResult');
        for(var i=0;i<opts.options.length;i++){
            if('不合格'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }


    //显示新旧
    var newold= document.getElementById("newold").value;
    if(newold=="新"){
        document.getElementById("new").setAttribute("checked","checked");
    }
    if(newold=="旧"){
        document.getElementById("old").setAttribute("checked","checked");
    }

    
    //selectlist选中那个人
    var auditman= document.getElementById("txtauditMan").value;
    if(auditman=="vavle/Public/images/feng.jpg"){
        var opts = document.getElementById('auditMan');
        for(var i=0;i<opts.options.length;i++){
            if('vavle/Public/images/feng.jpg'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }
    else if(auditman=="vavle/Public/images/pu.jpg"){
        var opts = document.getElementById('auditMan');
        for(var i=0;i<opts.options.length;i++){
            if('vavle/Public/images/pu.jpg'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }
    else if(auditman=="vavle/Public/images/zhou.jpg"){
        var opts = document.getElementById('auditMan');
        for(var i=0;i<opts.options.length;i++){
            if('vavle/Public/images/zhou.jpg'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }
    else if(auditman=="vavle/Public/images/ma.jpg"){
        var opts = document.getElementById('auditMan');
        for(var i=0;i<opts.options.length;i++){
            if('vavle/Public/images/ma.jpg'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }
    else if(auditman=="vavle/Public/images/xu.jpg"){
        var opts = document.getElementById('auditMan');
        for(var i=0;i<opts.options.length;i++){
            if('vavle/Public/images/xu.jpg'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }
    else{
        var opts = document.getElementById('auditMan');
        for(var i=0;i<opts.options.length;i++){
            if('0'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }



    var checkman= document.getElementById("txtcheckman").value;
    if(checkman=="vavle/Public/images/feng.jpg"){
        var opts = document.getElementById('checkman');
        for(var i=0;i<opts.options.length;i++){
            if('vavle/Public/images/feng.jpg'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }
    else if(checkman=="vavle/Public/images/pu.jpg"){
        var opts = document.getElementById('checkman');
        for(var i=0;i<opts.options.length;i++){
            if('vavle/Public/images/pu.jpg'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }
    else if(checkman=="vavle/Public/images/zhou.jpg"){
        var opts = document.getElementById('checkman');
        for(var i=0;i<opts.options.length;i++){
            if('vavle/Public/images/zhou.jpg'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }
    else if(checkman=="vavle/Public/images/ma.jpg"){
        var opts = document.getElementById('checkman');
        for(var i=0;i<opts.options.length;i++){
            if('vavle/Public/images/ma.jpg'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }
    else if(checkman=="vavle/Public/images/xu.jpg"){
        var opts = document.getElementById('checkman');
        for(var i=0;i<opts.options.length;i++){
            if('vavle/Public/images/xu.jpg'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }
    else{
        var opts = document.getElementById('checkman');
        for(var i=0;i<opts.options.length;i++){
            if('0'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }





    var verifyman= document.getElementById("txtverifyman").value;
    if(verifyman=="vavle/Public/images/feng.jpg"){
        var opts = document.getElementById('verifyMan');
        for(var i=0;i<opts.options.length;i++){
            if('vavle/Public/images/feng.jpg'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }
    else if(verifyman=="vavle/Public/images/pu.jpg"){
        var opts = document.getElementById('verifyMan');
        for(var i=0;i<opts.options.length;i++){
            if('vavle/Public/images/pu.jpg'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }
    else if(verifyman=="vavle/Public/images/zhou.jpg"){
        var opts = document.getElementById('verifyMan');
        for(var i=0;i<opts.options.length;i++){
            if('vavle/Public/images/zhou.jpg'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }
    else if(verifyman=="vavle/Public/images/ma.jpg"){
        var opts = document.getElementById('verifyMan');
        for(var i=0;i<opts.options.length;i++){
            if('vavle/Public/images/ma.jpg'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }
    else if(verifyman=="vavle/Public/images/xu.jpg"){
        var opts = document.getElementById('verifyMan');
        for(var i=0;i<opts.options.length;i++){
            if('vavle/Public/images/xu.jpg'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }
    else{
        var opts = document.getElementById('verifyMan');
        for(var i=0;i<opts.options.length;i++){
            if('0'==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }


}
