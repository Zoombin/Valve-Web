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
	    if($id){
	        $project=M("project")->where("id='".$id."'")->find();
	        if(isset($project["type"])){
	            $project["type"]=explode(",", $project["type"]);
	        }
	    }else{
	        $project["type"]=array(1);
	        $project["standard"]=1;
	        $project["verifyDate"]=date("Y-m-d");
	        $project["nextVerifyDate"]=date("Y-m-d",time()+365*24*60*60);
	        $project["verifyManDate"]=date("Y-m-d");
	        $project["auditManDate"]=date("Y-m-d");
	    }
	    $types=getTypes();
	    $typeList=array();
	    if ($types) {
	        foreach ($types as $k=>$v){
	            $tmp=array('id'=>$k,'text'=>$v,'checked'=>'');
	            if (in_array($k, $project["type"])){
	                $tmp['checked']=1;
	            }
	            $typeList[]=$tmp;
	        }
	    }
	    $this->assign('project', $project); 
	    $this->assign('types', $typeList); 
	    $this->assign('standards', getStandards()); 
	    $this->display ();
	}
	
	public function save(){
	    if(IS_POST&&$_POST){
	        $model=M('project');
	        $data=$model->create();
	        if($_POST['type']){
	            $data['type']=implode(",", $_POST['type']);
	        }else{
	            unset($data['type']);
	        }
	        if($data["id"]){
	            $model->where("id='".$data["id"]."'")->save($data);
	        }else{
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
	    if(isset($project["type"])){
	        $project["type"]=explode(",", $project["type"]);
	    }
	    $types=getTypes();
	    $typeList=array();
	    if ($types) {
	        foreach ($types as $k=>$v){
	            $tmp=array('id'=>$k,'text'=>$v,'checked'=>'');
	            if (in_array($k, $project["type"])){
	                $tmp['checked']=1;
	            }
	            $typeList[]=$tmp;
	        }
	    }
	    $project['verifydate']=date('Y 年  m 月 d 日',strtotime($project['verifydate']));
	    $project['nextverifydate']=date('Y 年  m 月 d 日',strtotime($project['nextverifydate']));
	    $project['verifymandate']=date('Y 年  m 月 d 日',strtotime($project['verifymandate']));
	    $project['auditmandate']=date('Y 年  m 月 d 日',strtotime($project['auditmandate']));
	    $project['madedate']=date('Y 年  m 月 d 日',strtotime($project['madedate']));
	    $project['verifyvalidatedate']=date('Y 年  m 月 d 日',strtotime($project['verifyvalidatedate']));
	    $this->assign('type', $type);
	    $this->assign('project', $project);
	    $this->assign('types', $typeList);
	    $this->assign('standards', getStandards());
	    if($type==1){
	        $this->display ("print1");//报告
	    }else{
	        $this->display ("print2");//校验记录
	    }
	}
	
}