<?php
	namespace Home\Widget;
	use Think\Controller;
	class PublicWidget extends Controller{
		// 头部函数
		public function header(){
			if(isset($_POST['data'])){
				//1开启session
				session_start();
				  
				//2、清空session信息
				$_SESSION = array();
				  
				//3、清楚客户端sessionid
				if(isset($_COOKIE[session_name()]))
				{
				  setCookie(session_name(),'',time()-3600,'/');
				}
				//4、彻底销毁session
				session_destroy();
			}else{
				$username=$_SESSION['username'];
			}

			

			$this->assign('username',$username);
			$this->display('Public/header');
		}

		

		//尾部函数
		public function footer(){
			$this->display('Public/footer');
		}

	}