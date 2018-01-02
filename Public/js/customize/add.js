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
    else if(type=="先导式"){
        document.getElementById("type2").setAttribute("checked","checked");
    }
    else if(type=="重锤式"){
        document.getElementById("type3").setAttribute("checked","checked");
    }
    else{
        document.getElementById("type1").setAttribute("checked","checked");
    }

    //判断当前校验方式并选中
    var verifyType= document.getElementById("verifyType").value;
    if(verifyType=="在线校验"){
        document.getElementById("verifyType2").setAttribute("checked","checked");
    }
    else if(verifyType=="离线校验"){
        document.getElementById("verifyType1").setAttribute("checked","checked");
    }
    else{
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



    //默认氮气
    if(document.getElementById("verifyMedium").value==''){
        document.getElementById("verifyMedium").value='氮气';
    }

    var feng = "/valve/Public/images/feng.jpg";
    var pu = "/valve/Public/images/pu.jpg";
    var zhou = "/valve/Public/images/zhou.jpg";
    var ma = "/valve/Public/images/ma.jpg";
    var xu = "/valve/Public/images/xu.jpg";
    var lixin = "/valve/Public/images/lixin.jpg"
    var liwei = "/valve/Public/images/liwei.jpg";
    var shao = "/valve/Public/images/shao.jpg";
    var fugengxing = "/valve/Public/images/fugengxing.png";
    var xuyongqiang = "/valve/Public/images/xuyongqian.png";
    var defaultSign = "0";
    //校验
    var auditman= document.getElementById("txtauditMan").value;
    switch(auditman) {
        case feng:
            doAuditManSelect(feng);
            break;
        case pu:
            doAuditManSelect(pu);
            break;
        case zhou:
            doAuditManSelect(zhou);
            break;
        case ma:
            doAuditManSelect(ma);
            break;
        case xu:
            doAuditManSelect(xu);
            break;
        case lixin:
            doAuditManSelect(lixin);
            break;
        case liwei:
            doAuditManSelect(liwei);
            break;
        case shao:
            doAuditManSelect(shao);
            break;         
        case fugengxing:
            doAuditManSelect(fugengxing);
            break; 
        case xuyongqiang:
            doAuditManSelect(xuyongqiang);
            break;    
        default:
            doAuditManSelect(defaultSign);
    }

    function doAuditManSelect(param){
        var opts = document.getElementById('auditMan');
        for(var i=0;i<opts.options.length;i++){
            if(param==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }
    //审核签名
    var checkman= document.getElementById("txtcheckman").value;
    switch(checkman) {
        case feng:
            doCheckManSelect(feng);
            break;
        case pu:
            doCheckManSelect(pu);
            break;
        case zhou:
            doCheckManSelect(zhou);
            break;
        case ma:
            doCheckManSelect(ma);
            break;
        case xu:
            doCheckManSelect(xu);
            break;
        case lixin:
            doCheckManSelect(lixin);
            break;
        case liwei:
            doCheckManSelect(liwei);
            break;
        case shao:
            doCheckManSelect(shao);
            break;       
        case fugengxing:
            doCheckManSelect(fugengxing);
            break; 
        case xuyongqiang:
            doCheckManSelect(xuyongqiang);
            break;       
        default:
            doCheckManSelect(defaultSign);
    }

    function doCheckManSelect(param){
        var opts = document.getElementById('checkman');
        for(var i=0;i<opts.options.length;i++){
            if(param==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }

    //审批签名
    var verifyman= document.getElementById("txtverifyman").value;
    switch(verifyman) {
        case feng:
            doVerifyManSelect(feng);
            break;
        case pu:
            doVerifyManSelect(pu);
            break;
        case zhou:
            doVerifyManSelect(zhou);
            break;
        case ma:
            doVerifyManSelect(ma);
            break;
        case xu:
            doVerifyManSelect(xu);
            break;
        case lixin:
            doVerifyManSelect(lixin);
            break;
        case liwei:
            doVerifyManSelect(liwei);
            break;
        case shao:
            doVerifyManSelect(shao);
            break;      
        case fugengxing:
            doVerifyManSelect(fugengxing);
            break; 
        case xuyongqiang:
            doVerifyManSelect(xuyongqiang);
            break;        
        default:
            doVerifyManSelect(defaultSign);
    }

    function doVerifyManSelect(param){
        var opts = document.getElementById('verifyMan');
        for(var i=0;i<opts.options.length;i++){
            if(param==opts.options[i].value){
                opts.options[i].selected = 'selected';
            }
        }
    }




    var listcompanys = $('#listcompanys').html();
    listcompanys =listcompanys.substr(0,listcompanys.length-3)+"]'";
    var html = '<input  type="text" class="form-control" id="searchcompany" name="searchcompany" data-provide="typeahead" data-source='+listcompanys+'>';
    $('#innercompanys').html(html);

}


$('#companys').typeahead({
    source: function(query, process) {
        return listcompanys;
    }
});


$('#btnSearch').click(function(){
    document.forms["searchform"].submit();
});


//校验日期选好后，校验，审核，审批的日期自动和校验日期一样
function verifyDateChange(){
    var verifyDate = $('#verifyDate').val();
    $('#verifyManDate').val(verifyDate);
    $('#checkmandate').val(verifyDate);
    $('#auditManDate').val(verifyDate);

    function stringToDate(_date,_format,_delimiter)
    {
        var formatLowerCase=_format.toLowerCase();
        var formatItems=formatLowerCase.split(_delimiter);
        var dateItems=_date.split(_delimiter);
        var monthIndex=formatItems.indexOf("mm");
        var dayIndex=formatItems.indexOf("dd");
        var yearIndex=formatItems.indexOf("yyyy");
        var month=parseInt(dateItems[monthIndex]);
        month-=1;
        var formatedDate = new Date(dateItems[yearIndex],month,dateItems[dayIndex]);
        return formatedDate;
    }
    var date = stringToDate(verifyDate,"yyyy-mm-dd","-");

    $('#nextVerifyDate').val((date.getFullYear()+1).toString()+'-'+(date.getMonth()+1).toString()+'-'+(date.getDate()-1).toString());
    $('#verifyValidateDate').val((date.getFullYear()+1).toString()+'-'+(date.getMonth()+1).toString()+'-'+(date.getDate()-1).toString());

};

//若新旧选择新，则维护检查情况和拆卸检查维修变为无
$('#new').click(function(){
    $('[name="repairs[]"]').each(function(){
        if($(this).val()=="3"){
            $(this).prop("checked",true);
        }
    });

    $('#cxjcwx').val('无');
});

//若新旧选旧，则维修检查情况为密封面研磨，拆卸也变为密封面研磨
$('#old').click(function(){
    $('[name="repairs[]"]').each(function(){
        if($(this).val()=="1"){
            $(this).prop("checked",true);
        }
    });

    $('#cxjcwx').val('密封面研磨');
});

//当校验结果选择不合格时：①报告中的新旧情况变为旧。②报告中的维修检查情况变为阀瓣和阀座密封面严重损坏，无法修复。③记录中的拆卸检查维修一项变为密封面研磨。④记录中的校验结论变为不合格。⑤记录中的备注变为阀瓣和阀座密封面严重损坏，无法修复。
$('#lstverifyResult').change(function(){
    if($('#lstverifyResult').val()=='不合格'){
        $('#old').prop('checked',true);
        $('[name="repairs[]"]').each(function(){
            if($(this).val()=="2"){
                $(this).prop("checked",true);
            }
        });
        $('#cxjcwx').val('密封面研磨');
        $('#recVerifyResult').val('不合格');
        $('#remarks').val('阀瓣和阀座密封面严重损坏，无法修复。');
        $('#verifyValidateDate').val('');

    }
});


//根据概率生成压力
$('#btnMakeData').click(function(){
    var needPressure = parseFloat($('#needPressure').val());
    var finalPressure;
    if(needPressure<=0.3){
        finalPressure = (needPressure-0.03).toFixed(2);
    }
    else{
        finalPressure = (needPressure *.9).toFixed(2);
    }
    $('#setPressure').val(needPressure.toFixed(2));
    $('#finalPressure').val(finalPressure);
    $('#truePressure3').val(needPressure.toFixed(2));
    $('#closePressure1').val(finalPressure);
    $('#closePressure2').val(finalPressure);
    $('#closePressure3').val(finalPressure);
    if(needPressure){
        var random = Math.random()*10+1;
        if(random<=4){
            $('#truePressure1').val(needPressure.toFixed(2));
        }
        else if(random>4 && random<=7){
            var t1 = needPressure+0.01;
            $('#truePressure1').val(t1);
        }
        else{
            $('#truePressure1').val((needPressure-0.01));
        }

        var random2 = Math.random()*20+1;
        if(random2<=1.5){
            $('#truePressure2').val((needPressure+0.01));
        }
        else if(random2>1.5 && random2<=3){
            $('#truePressure2').val((needPressure-0.01));
        }
        else{
            $('#truePressure2').val(needPressure.toFixed(2));
        }
    }
});