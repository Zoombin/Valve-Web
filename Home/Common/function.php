<?php
use Think\Upload;
/**
 * 一些常用函数  任何地方都可以使用
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/6/17
 * Time: 12:57
 */ 

function uploadFile($ext='xls|xlsx|jpg|png|gif'){
	$config = array(
			'maxSize'    =>    100*1024*1024,  //单位是b
			'savePath'   =>    '/Uploads/',
			'saveName'   =>    array('date','Y-m-d-H-i-s'),
			'rootPath'   =>    $_SERVER["DOCUMENT_ROOT"].'/control/',
			'exts'       =>    explode("|", $ext),
			'autoSub'    =>    true,
			'subName'    =>    array('date','Ymd'),
	);
	$upload=new Upload($config);
	$info   =   $upload->upload();
	$result["erro"]="";
	if(!$info) {// 上传错误提示错误信息
		$result["erro"]=$upload->getError();
	}else{// 上传成功
		foreach ($info as $v){
			$result[]=array(
					"name"=>$v["key"],
					"ext"=>$v["ext"],
					"name"=>$v["name"],
					"type"=>$v["type"],
					"savename"=>$v["savepath"].$v["savename"]
			);
		}
	}
	return $info;
}


function getTypes($id=''){
    $arr=array(
        1=>'弹簧式',
        2=>'先导式',
        3=>'重锤式'
    );
    if($id&&isset($arr[$id])){
        return $arr[$id];
    }
    return $arr;
}
function getRepairs($id=''){
    $arr=array(
        1=>'油漆',
        2=>'密封面研磨',
        3=>'换弹簧',
        4=>'更换阀瓣',
        5=>'无'
    );
    if($id&&isset($arr[$id])){
        return $arr[$id];
    }
    return $arr;
}
function getSendfrom($id=''){
    $arr=array(
        1=>'相城区',
        2=>'吴中区'
    );
    if($id&&isset($arr[$id])){
        return $arr[$id];
    }
    return $arr;
}
function getUseto($id=''){
    $arr=array(
        'R'=>'容器上',
        'G'=>'锅炉上',
        'D'=>'管道上'
    );
    if($id&&isset($arr[$id])){
        return $arr[$id];
    }
    return $arr;
}
function getStandards($id=''){
    $arr=array(
        1=>'TSG ZF001-2006',
        2=>'GB/T 12242-2005',
        3=>'GB/T 12243-2005'
    );
    if($id&&isset($arr[$id])){
        return $arr[$id];
    }
    return $arr;
}
function seitchToDataArray($arr){
    $result=array();
    if($arr){
        foreach ($arr as $k=>$v){
            $temp=array();
            $temp['key']=$k;
            $temp['value']=$v;
            $result[]=$temp;
        }
    }
    return $result;
}
function getNextRnum($sendfrom='',$useto=''){
    $year=date("Y",time());
    $cnt=M("project")->where("sendfrom='".$sendfrom."' and useto='".$useto."' and rnum like '%".$year."'")->count();
    $cnt=sprintf("%04d",$cnt+1);
    return  $rnum='SZZTA-'.$sendfrom.$useto.'X-'.$cnt.'-'.date("Y",time());
}