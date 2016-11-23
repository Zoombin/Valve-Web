
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $("a[data-lightbox]").lightbox({
            fitToScreen: true,
            imageClickClose: false,
            fileLoadingImage : '__PUBLIC__/images/loading.gif',
            fileBottomNavCloseImage : '__PUBLIC__/images/closelabel.gif'
        });
    });




function load(){
    if($('#currentarea').val()==1){
        $('#area').val('1');
    }
    if($('#currentarea').val()==2){
        $('#area').val('2');
    }
    if($('#currentarea').val()==3){
        $('#area').val('3');
    }
    if($('#currentarea').val()==4){
        $('#area').val('4');
    }
    if($('#currentarea').val()==5){
        $('#area').val('5');
    }
    if($('#currentarea').val()==6){
        $('#area').val('6');
    }
    if($('#currentarea').val()==7){
        $('#area').val('7');
    }
    if($('#currentarea').val()==8){
        $('#area').val('8');
    }
    if($('#currentarea').val()==9){
        $('#area').val('9');
    }


    //按区域导出excel
    $("#excel_area").attr("href", "/valve/index.php?s=/Home/Project/export/area/"+$('#currentarea').val()+"/key/"+$('#key').val()+".html");
    $("#btnExport").show();
}

function areaChange(pageTo){
    var pageno = $("#pageNo").val();
    var url = "/valve/index.php?s=/Home/Project/index";
    if(pageTo){
        var url = "/valve/index.php?s=/Home/Project/index/pageno/"+pageno;
    }

    if(pageTo=='next'){
        url += "/pageto/next.html";
    }
    if(pageTo=='previous'){
        if(pageno==1){
            return;
        }
        url += "/pageto/previous.html";
    }
    if(pageTo=='first'){
        url += "/pageto/first.html";
    }
    if(pageTo=='last'){
        url += "/pageto/last.html";
    }

    $("#areaForm").attr("action", url);
    document.forms["areaForm"].submit();
}


