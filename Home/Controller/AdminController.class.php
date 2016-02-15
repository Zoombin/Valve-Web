<?php
namespace Home\Controller;
class AdminController extends CommonController {
        public function index(){
            $this->meta_title = '我的账户';
            $this->display();
        }
        public function save(){
            if(IS_POST&&$_POST){
                $model=D("Admin");
                $data=$model->create();
                if(!$data){
                    $this->error($model->getError());
                }else{
                    $data['upwd']=md5($data['upwd']);
                    $model->save($data);    
                    session('user',$model->where('id='.$data['id'])->find());
                }
            }
            $this->success("保存成功");
        }
        
}