/**
 * 
 */
$(function(){
	$('.datepicker').click(function(){
		WdatePicker();
	});
	//返回顶部
	$("#toTop").click(function(){         
		$("html").animate({"scrollTop": "0px"},100); //IE,FF
  		$("body").animate({"scrollTop": "0px"},100); //Webkit
	});
	/**提示 */
	$('[data-toggle="tooltip"]').tooltip();
});

function reload(){
	setTimeout(function(){location.reload();}, arguments[0]?arguments[0]:200);
}