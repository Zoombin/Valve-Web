<?php
namespace Home\Controller;
class IndexController extends CommonController {
        public function index(){
            $this->meta_title = '后台管理面板';
            $this->display();
        }
		public function info(){
            phpinfo();
        }
}