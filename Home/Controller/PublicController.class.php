<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {
        public function index(){
            $this->meta_title = '登录首页';
            $this->display();
        }
        public function login(){
        	$this->meta_title = '登录';
            $this->display();
        }
        public function checkLogin(){
        	header("Content-type: text/html; charset=utf-8");
            $map = I("post.");
            if(!$map){
                $this->error("请重新登录!",U('Public/login')); 
            }else{
                $map['upwd']=md5($map['upwd']);
                $User = M("admin"); // 实例化Admin对象
                $map=$User->create($map);
                // 查找用户数据
                $data = $User->where(array('uname'=>$map['uname']))->find();
                if($data){
                	if ($data['upwd']==$map["upwd"]) {
                		$_SESSION["user"]=$data;
                		$redirect_url=U("Index/index");
                		if (isset($_SESSION['redirect_url'])&&$_SESSION['redirect_url']){
                			$redirect_url=$_SESSION['redirect_url'];
                			unset($_SESSION['redirect_url']);
                		}
                		redirect($redirect_url,1,"登陆成功，跳转中...");
                	}else{
                        $this->error('密码错误.');
                    }
                } else {
                    $this->error('用户名错误!');
                }
            }
        }
        
        public function logout(){
        	session_destroy();
        	$this->success("登出成功!",U('Public/login'));
        }
        function info(){
        	phpinfo();
        }
}