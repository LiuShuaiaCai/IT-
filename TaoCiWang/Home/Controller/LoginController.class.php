<?php
	namespace Home\Controller;
	use Think\Controller;
	class LoginController extends Controller
	{
		public function login(){
			$this->display();
		}
		public function check(){
			$user=M('user');
			$data=$user->where($_POST)->find();
			if($data){
				echo 'yes';
			}else{
				echo 'no';
				exit();
			}
			
		}
		public function password(){
			$user=M('user');
			$where['username']=$_POST['username'];
			$pwd=$user->field('password')->where($where)->find();
			echo $user->_sql();
			if($pwd['password']==$_POST['password']){
				echo 'ok';
				$_SESSION['username']=$_POST['username'];
			}else{
				echo 'no';
			}
		}
	}