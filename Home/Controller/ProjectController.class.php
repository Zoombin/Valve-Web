<?php
namespace Home\Controller;

use Think\Page;

class ProjectController extends CommonController {

	public function index() {
		$this->meta_title = '安全阀报告';
        		$model=M('project');
        		$where="1=1";
        		$key=$_POST["key"];

                $area=I("post.area");

                $pageNo = I("get.pageno");

                //分页
                if(!$pageNo){
                    $pageNo = 1;
                     $this->assign("pageNo",$pageNo);
                }
                $to = $pageNo * 15;
                $from = $to -15;
                $pageto = I("get.pageto");
                if($pageto=='next'){
                    $from +=15;
                    $this->assign("pageNo",$pageNo+1);
                }
                if($pageto=='previous'){
                    $from -=15;
                    $this->assign("pageNo",$pageNo-1);
                }
                if($pageto=='first'){
                    $from =0;
                    $this->assign("pageNo",1);
                }


                //分类
        		if($key){
        		    $where.=" and CONCAT(CONCAT(`rnum`,company),address) LIKE '%".$key."%'";
        		    $this->assign("key",$key);
        		}
        		if($area==1){
                    $where.=" and sendfrom = 1 and useto = 'R'";
                    $this->assign("currentarea",$area);
                }
        		if($area==2){
        		    $where.=" and sendfrom = 1 and useto = 'G'";
        		    $this->assign("currentarea",$area);
        		}
        		if($area==3){
                    $where.=" and sendfrom = 1 and useto = 'D'";
                    $this->assign("currentarea",$area);
                }
                if($area==4){
                    $where.=" and sendfrom = 2 and useto = 'R'";
                    $this->assign("currentarea",$area);
                }
                if($area==5){
                    $where.=" and sendfrom = 2 and useto = 'G'";
                    $this->assign("currentarea",$area);
                }
                if($area==6){
                    $where.=" and sendfrom = 2 and useto = 'D'";
                    $this->assign("currentarea",$area);
                }
                if($area==7){
                    $where.=" and sendfrom = 3 and useto = 'R'";
                    $this->assign("currentarea",$area);
                }
                if($area==8){
                    $where.=" and sendfrom = 3 and useto = 'G'";
                    $this->assign("currentarea",$area);
                }
                if($area==9){
                    $where.=" and sendfrom = 3 and useto = 'D'";
                    $this->assign("currentarea",$area);
                }

                //年份筛选
                $search_year=I("post.search_year");
                if($search_year){
                    $where.=" and substring(rnum, -4) = ".$search_year;
                    $this->assign("search_year",$search_year);
                }

        		$count=$model->where($where)->count();
        		//总页数
        		$this->assign("total",$count);
        		//最后一页
        		if($pageto=='last'){
                    $pageNo = Ceil($count/15);
                    if($pageNo>1){
                         $from = ($pageNo-1)*15;
                    }
                    else{
                        $from = 0;
                    }
                    $this->assign("pageNo",$pageNo);
                }

        		$page = new Page($count);
        		if($key){
        		    $page->parameter["key"]=urlencode($key);
        		    $page->parameter["area"]=urlencode($area);
        		}
        		$list = $model->where($where)->order('num')->limit($from,15)->select();

        		$this->assign('list', $list); // 赋值数据集
        		$this->assign('page', $page->show());

        		$this->display ();
	}
	
	public function add() {
	    $id=I("get.id");
	    $searchcompany=$_POST["searchcompany"];
	    $project=array();
	    $repairs=getRepairs();
	    if($id){
	        $project=M("project")->where("id='".$id."'")->find();
	        //当压力为0.00时显示空
            if($project['truepressure1']==0.00){
                $project["truepressure1"] ='';
            }
            if($project['truepressure2']==0.00){
                $project["truepressure2"] ='';
            }
            if($project['truepressure3']==0.00){
                $project["truepressure3"] ='';
            }
            if($project['closepressure1']==0.00){
                $project["closepressure1"] ='';
            }
            if($project['closepressure2']==0.00){
                $project["closepressure2"] ='';
            }
            if($project['closepressure3']==0.00){
                $project["closepressure3"] ='';
            }
            if($project['workpressure']==0.00){
                $project["workpressure"] ='';
            }
            if($project['setpressure']==0.00){
                $project["setpressure"] ='';
            }
            if($project['needpressure']==0.00){
                $project["needpressure"] ='';
            }
            if($project['finalpressure']==0.00){
                $project["finalpressure"] ='';
            }
            if($project['plevelfrom']==0.00){
                $project["plevelfrom"] ='';
            }
             if($project['plevelto']==0.00){
                $project["plevelto"] ='';
            }
	        $project['repairs']=explode(",", $project['repairs']);
	    }else{
	            //自动填充公司
	        if($searchcompany){
	            $model=M('project');
                $where="company = '".$searchcompany."'";
                $companyinfo = $model->where($where)->limit(1);
                $companyname = $companyinfo->getField('company');
                $companyinfo = $model->where($where)->limit(1);
                $address = $companyinfo->getField('address');
                $companyinfo = $model->where($where)->limit(1);
                $contact = $companyinfo->getField('contact');
                $companyinfo = $model->where($where)->limit(1);
                $phone = $companyinfo->getField('phone');
	            $project["company"]=$companyname;
	            $project["address"]=$address;
	            $project["contact"]=$contact;
	            $project["phone"]=$phone;
                $lastRecord = $model->order('id desc')->limit(1);
                $defaultverifydate = $lastRecord->getField('verifydate');
                $lastRecord = $model->order('id desc')->limit(1);
                $verifyman = $lastRecord->getField('verifyman');
                $lastRecord = $model->order('id desc')->limit(1);
                $checkman = $lastRecord->getField('checkman');
                $lastRecord = $model->order('id desc')->limit(1);
                $auditman = $lastRecord->getField('auditman');
                $lastRecord = $model->order('id desc')->limit(1);
                $auditmandate = $lastRecord->getField('auditmandate');
                $lastRecord = $model->order('id desc')->limit(1);
                $verifymandate = $lastRecord->getField('verifymandate');
                $lastRecord = $model->order('id desc')->limit(1);
                $checkmandate = $lastRecord->getField('checkmandate');
                $project["type"]=1;
                $project["verifyType"]=1;
                $project["standard"]=1;
                $project["verifydate"]=$defaultverifydate;
                $project["nextverifydate"]=date("Y-m-d",strtotime($defaultverifydate)+364*24*60*60);
                $project["verifyvalidatedate"]=date("Y-m-d",strtotime($defaultverifydate)+364*24*60*60);;
                $project["verifymandate"]=$verifymandate;
                $project["auditmandate"]=$auditmandate;
                $project["checkmandate"]=$checkmandate;
                $project['repairs']=array();
                $project['sendfrom']=1;
                $project['useto']='R';
                $project['verifyman']=$verifyman;
                $project['checkman']=$checkman;
                $project['auditman']=$auditman;
                $project['wgjc']='良好';
                $project['temperature']=15;
                $project['devnum']='不明';
                $project['recverifyresult']='合格';

                $project['rnum']=getNextRnum($project['sendfrom'],$project['useto']);
                $this->assign('project', $project); // 赋值数据集
            }
            else{
                $model=M('project');
                $lastRecord = $model->order('id desc')->limit(1);
                $defaultverifydate = $lastRecord->getField('verifydate');
                $lastRecord = $model->order('id desc')->limit(1);
                $verifyman = $lastRecord->getField('verifyman');
                $lastRecord = $model->order('id desc')->limit(1);
                $checkman = $lastRecord->getField('checkman');
                $lastRecord = $model->order('id desc')->limit(1);
                $auditman = $lastRecord->getField('auditman');
                $lastRecord = $model->order('id desc')->limit(1);
                $auditmandate = $lastRecord->getField('auditmandate');
                $lastRecord = $model->order('id desc')->limit(1);
                $verifymandate = $lastRecord->getField('verifymandate');
                $lastRecord = $model->order('id desc')->limit(1);
                $checkmandate = $lastRecord->getField('checkmandate');
                $project["type"]=1;
                $project["verifyType"]=1;
                $project["standard"]=1;
                $project["verifydate"]=$defaultverifydate;
                $project["nextverifydate"]=date("Y-m-d",strtotime($defaultverifydate)+364*24*60*60);
                $project["verifyvalidatedate"]=date("Y-m-d",strtotime($defaultverifydate)+364*24*60*60);;
                $project["verifymandate"]=$verifymandate;
                $project["auditmandate"]=$auditmandate;
                $project["checkmandate"]=$checkmandate;
                $project['repairs']=array();
                $project['sendfrom']=1;
                $project['useto']='R';
                $project['verifyman']=$verifyman;
                $project['checkman']=$checkman;
                $project['auditman']=$auditman;
                $project['wgjc']='良好';
                $project['temperature']=15;
                $project['devnum']='不明';
                $project['recverifyresult']='合格';

                //当压力为0.00时显示空
                if($project['truepressure1']==0.00){
                    $project["truepressure1"] ='';
                }
                if($project['truepressure2']==0.00){
                    $project["truepressure2"] ='';
                }
                if($project['truepressure3']==0.00){
                    $project["truepressure3"] ='';
                }
                if($project['closepressure1']==0.00){
                    $project["closepressure1"] ='';
                }
                if($project['closepressure2']==0.00){
                    $project["closepressure2"] ='';
                }
                if($project['closepressure3']==0.00){
                    $project["closepressure3"] ='';
                }
                if($project['workpressure']==0.00){
                    $project["workpressure"] ='';
                }
                if($project['setpressure']==0.00){
                    $project["setpressure"] ='';
                }
                if($project['needpressure']==0.00){
                    $project["needpressure"] ='';
                }
                if($project['finalpressure']==0.00){
                    $project["finalpressure"] ='';
                }
                if($project['plevelfrom']==0.00){
                    $project["plevelfrom"] ='';
                }
                 if($project['plevelto']==0.00){
                    $project["plevelto"] ='';
                }

                $project['rnum']=getNextRnum($project['sendfrom'],$project['useto']);
	        }
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
	    $companys = M("project")->Distinct(true)->getField('company',1000000);
	    $this->assign('companys', $companys);
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
	        //如果是保存修改
	        if($data["id"]){
	            if($model->where("rnum='".$data['rnum']."' and id!='".$data["id"]."' ")->count()>0){
	                $this->error("报告编号为:".$data['rnum'].'的报告已经存在了,请修改报告编号！');
	            }else{
	                    //如果送达地或用途 与编号的 1RX 这部分不匹配则无法修改
	                    $sendfrom= substr($data['rnum'],6,1);
	                    $useto = substr($data['rnum'],7,1);
	                    if($data['sendfrom']!= $sendfrom || $data['useto']!=$useto){
	                        $this->error('送达地或用途与编号不匹配');
	                    }
	                    else{
                            $num =substr($data['rnum'],10,5);
                            $data['num']= $num;
                            $model->where("id='".$data["id"]."'")->save($data);
	                    }
	            }
	        }else{
	              //这里是新增一个记录,此记录的编号会根据送达地与用途的值自动生成一个号码
	              $autoAddNum = $_POST['autoAddNum'];
	              for($i = 0; $i < $autoAddNum; $i++){
	                  $data['rnum']=getNextRnum($data['sendfrom'],$data['useto']);
                      $data['num']= getNum($data['sendfrom'],$data['useto']);
                      $model->add($data);
	              }
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
	    //这个值始终是2016
	    $this->assign('year', 2016);

	    $project["verifydate"]=date("Y年  m月 d日",strtotime($project['verifydate']));
	    $project["nextverifydate"]=date("Y年  m月 d日",strtotime($project['nextverifydate']));
	    $project["verifymandate"]=date("Y年 m月  d日",strtotime($project['verifymandate']));
	    $project["auditmandate"]=date("Y年 m月 d日",strtotime($project['auditmandate']));
	    $project["checkmandate"]=date("Y年 m月 d日",strtotime($project['checkmandate']));

        //当压力为0.00时显示空
	    if($project['truepressure1']==0.00){
	        $project["truepressure1"] ='';
	    }
	    if($project['truepressure2']==0.00){
        	$project["truepressure2"] ='';
        }
        if($project['truepressure3']==0.00){
        	$project["truepressure3"] ='';
        }
        if($project['closepressure1']==0.00){
        	$project["closepressure1"] ='';
        }
        if($project['closepressure2']==0.00){
        	$project["closepressure2"] ='';
        }
        if($project['closepressure3']==0.00){
        	$project["closepressure3"] ='';
        }
        if($project['workpressure']==0.00){
            $project["workpressure"] ='/';
        }
        if($project['setpressure']==0.00){
            $project["setpressure"] ='';
        }
        if($project['needpressure']==0.00){
            $project["needpressure"] ='';
        }
        if($project['finalpressure']==0.00){
            $project["finalpressure"] ='/';
        }
        if($project['plevelfrom']==0.00){
            $project["plevelfrom"] ='';
        }
         if($project['plevelto']==0.00){
            $project["plevelto"] ='';
        }

	    $this->assign('repairs', $repairsList);
	    $this->assign('type', $type);

	    $this->assign('types', getTypes());
	    $this->assign('verifyTypes', getVerifyTypes());
	    $this->assign('standards', getStandards());
	    if($type==1){
	         $this->assign('project', $project);
	        $this->display ("print1");//报告
	    }else{
	        $project["verifynum"]= substr($project["rnum"],6,9);
	        $project["verifyvalidatedate"]=date("Y年 m月 d日",strtotime($project['verifyvalidatedate']));
	        $this->assign('project', $project);
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

	function export(){
	    $xlsModel = M('project');
	    $where="1=1";
	    $area=I("get.area");
	    $key=I("get.key");
	    $year=I("get.year");

	    if($key){
            $where.=" and CONCAT(`rnum`,company) LIKE '%".$key."%'";
        }

        if($area==1){
            $where.=" and sendfrom = 1 and useto = 'R'";
            $this->assign("currentarea",$area);
        }
        if($area==2){
            $where.=" and sendfrom = 1 and useto = 'G'";
            $this->assign("currentarea",$area);
        }
        if($area==3){
            $where.=" and sendfrom = 1 and useto = 'D'";
            $this->assign("currentarea",$area);
        }
        if($area==4){
            $where.=" and sendfrom = 2 and useto = 'R'";
            $this->assign("currentarea",$area);
        }
        if($area==5){
            $where.=" and sendfrom = 2 and useto = 'G'";
            $this->assign("currentarea",$area);
        }
        if($area==6){
            $where.=" and sendfrom = 2 and useto = 'D'";
            $this->assign("currentarea",$area);
        }
        if($area==7){
            $where.=" and sendfrom = 3 and useto = 'R'";
            $this->assign("currentarea",$area);
        }
        if($area==8){
            $where.=" and sendfrom = 3 and useto = 'G'";
            $this->assign("currentarea",$area);
        }
        if($area==9){
            $where.=" and sendfrom = 3 and useto = 'D'";
            $this->assign("currentarea",$area);
        }
        if($area==9){
            $where.=" and sendfrom = 3 and useto = 'D'";
            $this->assign("currentarea",$area);
        }

        //年份筛选
        $search_year=I("get.search_year");
        if($search_year){
            $where.=" and substring(rnum, -4) = ".$search_year;
            $this->assign("search_year",$search_year);
        }

        $data  = $xlsModel->where($where)->Field('verifydate,company,installposition,devnum,newold,model,gctj,workpressure,needpressure,rnum,verifyresult')->order('num')->select();
	    $filename = '安全阀';
        exportexcel($data,array('日期','使用单位','设备名称','设备代码','新旧情况','安全阀型号','公称通径','工作压力MPa','整定压力MPa','编号','结论'),$filename);
	}
}
