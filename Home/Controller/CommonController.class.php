<?php

namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller {
	function _initialize() {
		if(!isset($_SESSION["user"])){
			if(isset($_SERVER["REDIRECT_URL"])){
				$from_url=$_SERVER["REDIRECT_URL"];
				$from_url=parse_url($from_url,PHP_URL_PATH);
				if($from_url!=U("Public/logout")){
					$_SESSION['redirect_url']=$from_url;
				}
			}
            redirect(U("Public/login"));
        }
	}
}