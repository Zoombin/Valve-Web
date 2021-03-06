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

function getVerifyTypes($id=''){
    $arr=array(
        1=>'离线校验',
        2=>'在线校验'
    );
    if($id&&isset($arr[$id])){
        return $arr[$id];
    }
    return $arr;
}

function getRepairs($id=''){
    $arr=array(
        1=>'密封面研磨',
        2=>'阀瓣和阀座密封面严重损坏，无法修复',
        3=>'无',
        4=>'更换零件',
        5=>'密封面漏气',
        6=>'螺纹接口损坏',
        7=>'表面油漆',
        8=>'清污'
    );
    if($id&&isset($arr[$id])){
        return $arr[$id];
    }
    return $arr;
}
function getSendfrom($id=''){
    $arr=array(
        1=>'相城区',
        2=>'吴中区',
        3=>'在线'
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
    $Users = array();
    $Users=M('project')->where("sendfrom='".$sendfrom."' and useto='".$useto."' and rnum like '%".$year."'");
    $Count = $Users->count();
    if($Count>0){
        $Users=M('project')->where("sendfrom='".$sendfrom."' and useto='".$useto."' and rnum like '%".$year."'");
        $numlist = $Users->order('num')->getField('num',$Count);
        for($i = 0; $i < $Count; $i++)
        {
            if($i != ($numlist[$i]-1)){
                $formatnum=sprintf("%05d",$i+1);
                $rnum = 'SZZTA-'.$sendfrom.$useto.'X-'.$formatnum.'-'.date("Y",time());
                return $rnum;
            }
            else{
                $num = $i+2;
                $formatnum=sprintf("%05d",$num);
                $rnum = 'SZZTA-'.$sendfrom.$useto.'X-'.$formatnum.'-'.date("Y",time());
            }
        }
    }
    else{
        $rnum = 'SZZTA-'.$sendfrom.$useto.'X-'.'00001'.'-'.date("Y",time());
    }
    return $rnum;

}

function getNum($sendfrom='',$useto=''){
    $year=date("Y",time());
    $Users = array();
    $Users=M('project')->where("sendfrom='".$sendfrom."' and useto='".$useto."' and rnum like '%".$year."'");
    $Count = $Users->count();
    if($Count>0){
        $Users=M('project')->where("sendfrom='".$sendfrom."' and useto='".$useto."' and rnum like '%".$year."'");
        $numlist = $Users->order('num')->getField('num',$Count);
        for($i = 0; $i < $Count; $i++)
        {
            if($i != ($numlist[$i]-1)){
                $num = $i+1;
                return $num;
            }
            else{
                $num = $i+2;
            }
        }
    }
    else{
        $num=1;
    }
    return $num;
}


function exportexcel($data=array(),$title=array(),$filename='report'){
    header("Content-type:application/octet-stream");
    header("Accept-Ranges:bytes");
    header("Content-type:application/vnd.ms-excel");
    header("Content-Disposition:attachment;filename=".$filename.".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    //导出xls 开始
    if (!empty($title)){
        foreach ($title as $k => $v) {
            $title[$k]=iconv("utf-8", "utf-8",$v);
        }
        $title= implode(",", $title);
        echo "$title\n";
    }
    if (!empty($data)){
        foreach($data as $key=>$val){
            foreach ($val as $ck => $cv) {
                $data[$key][$ck]=iconv("utf-8", "utf-8", $cv);
            }
            $data[$key]=implode(", ", $data[$key]);
        }
        echo implode("\n",$data);
    }
}