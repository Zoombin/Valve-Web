<?php
namespace Home\Controller;

use Think\Page;

class ProjectController extends CommonController {

	public function index() {
		$this->meta_title = '安全阀报告';
		$model=M('project');
		$where="1=1";
		$key=I('get.key');
		if($key){
		    $where.=" and CONCAT(`rnum`,address) LIKE '%".$key."%'";
		    $this->assign("key",$key);
		}
		$count=$model->where($where)->count();
		$page = new Page($count);
		if($key){
		    $page->parameter["key"]=urlencode($key);
		}
		$list = $model->where($where)->order('id desc')->limit($page->firstRow, $page->listRows)->select();
		//dump($list);
		$this->assign('list', $list); // 赋值数据集
		$this->assign('page', $page->show());
		$this->display ();
	}
	
	public function add() {
	    $id=I("get.id");
	    $project=array();
	    $repairs=getRepairs();
	    if($id){
	        $project=M("project")->where("id='".$id."'")->find();
	        $project['repairs']=explode(",", $project['repairs']);
	    }else{
	        $project["type"]=1;
	        $project["verifyType"]=1;
	        $project["standard"]=1;
	        $project["verifydate"]=date("Y-m-d");
	        $project["nextverifydate"]=date("Y-m-d",time()+365*24*60*60);
	        $project["verifymandate"]=date("Y-m-d");
	        $project["auditmandate"]=date("Y-m-d");
	        $project["checkmandate"]=date("Y-m-d");
	        $project['repairs']=array();
	        $project['sendfrom']=1;
	        $project['useto']='R';
	        $project['rnum']=getNextRnum($project['sendfrom'],$project['useto']);;
	    }
	    $repairsList=array();
	    foreach ($repairs as $k=>$v){
	        $tmp=array();
	        $tmp["isselected"]=0;
	        $tmp["id"]=$k;
	        $tmp["text"]=$v;
	        if(in_array($k, $project['repairs'])){
	            $tmp["isselected"]=1;
	        }
	        $repairsList[]=$tmp;
	    }
	    $this->assign('repairs', $repairsList);
	    $this->assign('project', $project); 
	    $this->assign('types', getTypes());
	    $this->assign('verifyTypes', getVerifyTypes());
	    $this->assign('sendfroms', getSendfrom()); 
	    $this->assign('usetos', seitchToDataArray(getUseto())); 
	    $this->assign('standards', getStandards()); 
	    $this->display ();
	}
	
	public function save(){
	    if(IS_POST&&$_POST){
	        $model=M('project');
	        $data=$model->create();
	        if (isset($_POST['repairs'])&&$_POST['repairs']){
	            $data['repairs']=implode(",", $_POST['repairs']);
	        }
	        if($data["id"]){
	            if($model->where("rnum='".$data['rnum']."' and id!='".$data["id"]."' ")->count()>0){
	                $this->error("报告编号为:".$data['rnum'].'的报告已经存在了,请修改报告编号！');
	            }else{
	                $model->where("id='".$data["id"]."'")->save($data);
	            }
	        }else{
	            $data['rnum']=getNextRnum($data['sendfrom'],$data['useto']);;
	            $model->add($data);
	        }
	        $this->success("数据已经保存成功",U("Project/index"));
	    }else{
	        $this->error("接收不到数据");
	    }
	}
	
	function remove(){
	    $id=I("post.id");
	    M("project")->where("id='".$id."'")->delete();
	    echo '已经删除！';
	}
	
	function toprint(){
	    $id=I("get.id");
	    $type=I("get.type",1);
	    $project=M("project")->where("id='".$id."'")->find();
	    $project['repairs']=explode(",", $project['repairs']);
	    $repairs=getRepairs();
	    $repairsList=array();
	    foreach ($repairs as $k=>$v){
	        $tmp=array();
	        $tmp["isselected"]=0;
	        $tmp["id"]=$k;
	        $tmp["text"]=$v;
	        if(in_array($k, $project['repairs'])){
	            $tmp["isselected"]=1;
	        }
	        $repairsList[]=$tmp;
	    }
	    $this->assign('year', date("Y",time()));
	    $project["verifydate"]=date("Y年  m月 d日",strtotime($project['verifydate']));
	    $project["nextverifydate"]=date("Y年  m月 d日",strtotime($project['nextverifydate']));
	    $project["verifymandate"]=date("Y年 m月  d日",strtotime($project['verifymandate']));
	    $project["auditmandate"]=date("Y年 m月 d日",strtotime($project['auditmandate']));
	    $project["checkmandate"]=date("Y年 m月 d日",strtotime($project['checkmandate']));

	    $this->assign('repairs', $repairsList);
	    $this->assign('type', $type);
	    $this->assign('project', $project);
	    $this->assign('types', getTypes());
	    $this->assign('verifyTypes', getVerifyTypes());
	    $this->assign('standards', getStandards());
	    if($type==1){
	        $this->display ("print1");//报告
	    }else{
	        $this->display ("print2");//校验记录
	    }
	}
	
	
	
	function getnextno(){
	    echo getNextRnum($_REQUEST['sendfrom'],$_REQUEST['useto']);
	}

	function fonts(){
	    $text = $_GET['font']?$_GET['font']:"test...";
	    $size=iconv_strlen($text,'utf-8');
	    $text2= preg_replace('/[^0-9A-Za-z]/', '', $text);
	    $size2=strlen($text2);
	    $width=$size2*10+($size-$size2)*30;
	    
	    //$width=iconv_strlen($text,'utf-8')*30;
	    header('Content-Type: image/png');
	    // Create the image
	    $im = imagecreatetruecolor($width, 30);
	    
	    // Create some colors
	    $white = imagecolorallocate($im, 255, 255, 255);
	    $grey = imagecolorallocate($im, 232, 232, 232);
	    $black = imagecolorallocate($im, 0, 0, 0);
	    imagefilledrectangle($im, 0, 0, $width, 30, $white);	    
	    // The text to draw
	    // Replace path by your own font path
	     $font='Public/fonts/gjfttf.ttf';
	    // Add some shadow to the text
	    imagettftext($im, 20, 0, 0, 29, $grey, $font, $text);
	    // Add the text
	    imagettftext($im, 20, 0, 0, 28, $black, $font, $text);
	    // Using imagepng() results in clearer text compared with imagejpeg()
	    imagepng($im);
	    imagedestroy($im);
	}
}
