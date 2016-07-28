
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $("a[data-lightbox]").lightbox({
            fitToScreen: true,
            imageClickClose: false,
            fileLoadingImage : '__PUBLIC__/images/loading.gif',
            fileBottomNavCloseImage : '__PUBLIC__/images/closelabel.gif'
        });
    });


//导出excel
var exportToExcel = (function() {
    var excelhtml = '<tr>'+
        '<th>日期</th>'+
        '<th>使用单位</th>'+
        '<th>设备名称</th>'+
        '<th>设备代码</th>'+
        '<th>新/旧</th>'+
        '<th>安全阀型号</th>'+
        '<th>公称通径</th>'+
        '<th>工作压力MPa</th>'+
        '<th>整定压力MPa</th>'+
        '<th>结论</th>'+
        '<th>校验报告编号</th>'+
        '</tr>'+
        '<volist name="list" id="vo">'+
        '<tr>'+
        '<td>{$vo.verifydate}</td>'+
        '<td>{$vo.company}</td>'+
        '<td>{$vo.installposition}</td>'+
        '<td>{$vo.devnum}</td>'+
        '<td>{$vo.newold}</td>'+
        '<td>{$vo.model}</td>'+
        '<td>{$vo.gctj}</td>'+
        '<td>{$vo.workpressure}</td>'+
        '<td>{$vo.needpressure}</td>'+
        '<td>{$vo.verifyresult}</td>'+
        '<td>{$vo.rnum}</td>'+
        '</tr>'+
        '</volist>';
    var uri = 'data:application/vnd.ms-excel;base64,'
        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>'+excelhtml+'</table></body></html>'
        , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
        , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) };
    return function(table, name) {
        if (!table.nodeType) table = document.getElementById(table);
        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML};
        window.location.href = uri + base64(format(template, ctx))
    }
})();


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

    var pageSize = 15;    //每页显示的记录条数
    var curPage=0;        //当前页
    var lastPage;        //最后页
    var direct=0;        //方向
    var len;            //总行数
    var page;            //总页数
    var begin;
    var end;

    len =$("#mytable tr").length - 2;    // 求这个表的总行数，剔除第一行介绍
    page=len % pageSize==0 ? len/pageSize : Math.floor(len/pageSize)+1;//根据记录条数，计算页数
    // alert("page==="+page);
    curPage=1;    // 设置当前为第一页
    displayPage(1);//显示第一页

    document.getElementById("btn0").innerHTML="当前 " + curPage + "/" + page + " 页    每页 ";    // 显示当前多少页
    document.getElementById("sjzl").innerHTML="数据总量 " + len + "";        // 显示数据量
    document.getElementById("pageSize").value = pageSize;



    $("#btn1").click(function firstPage(){    // 首页
        curPage=1;
        direct = 0;
        displayPage();
    });
    $("#btn2").click(function frontPage(){    // 上一页
        direct=-1;
        displayPage();
    });
    $("#btn3").click(function nextPage(){    // 下一页
        direct=1;
        displayPage();
    });
    $("#btn4").click(function lastPage(){    // 尾页
        curPage=page;
        direct = 0;
        displayPage();
    });
    $("#btn5").click(function changePage(){    // 转页
        curPage=document.getElementById("changePage").value * 1;
        if (!/^[1-9]\d*$/.test(curPage)) {
            alert("请输入正整数");
            return ;
        }
        if (curPage > page) {
            alert("超出数据页面");
            return ;
        }
        direct = 0;
        displayPage();
    });


    $("#pageSizeSet").click(function setPageSize(){    // 设置每页显示多少条记录
        pageSize = document.getElementById("pageSize").value;    //每页显示的记录条数
        if (!/^[1-9]\d*$/.test(pageSize)) {
            alert("请输入正整数");
            return ;
        }
        len =$("#mytable tr").length - 1;
        page=len % pageSize==0 ? len/pageSize : Math.floor(len/pageSize)+1;//根据记录条数，计算页数
        curPage=1;        //当前页
        direct=0;        //方向
        firstPage();
    });


    function displayPage(){
        if(curPage <=1 && direct==-1){
            direct=0;
            alert("已经是第一页了");
            return;
        } else if (curPage >= page && direct==1) {
            direct=0;
            alert("已经是最后一页了");
            return ;
        }

        lastPage = curPage;

        // 修复当len=1时，curPage计算得0的bug
        if (len > pageSize) {
            curPage = ((curPage + direct + len) % len);
        } else {
            curPage = 1;
        }


        document.getElementById("btn0").innerHTML="当前 " + curPage + "/" + page + " 页    每页 ";        // 显示当前多少页

        begin=(curPage-1)*pageSize + 1;// 起始记录号
        end = begin + 1*pageSize - 1;    // 末尾记录号


        if(end > len ) end=len;
        $("#mytable tr").hide();    // 首先，设置这行为隐藏
        $("#mytable tr").each(function(i){    // 然后，通过条件判断决定本行是否恢复显示
            if((i>=begin && i<=end) || i==0 )//显示begin<=x<=end的记录
                $(this).show();
        });
    }
}

function areaChange(){
    document.forms["areaForm"].submit();
}

