<?php
	namespace Home\Controller;
	use Think\Controller;
	class RegistrController extends Controller
	{
		public function registr(){
			$this->display();
		}
		public function insert(){
			$user=M('user');
			$check=$user->create();
			if($check){
				$data=$user->add();
				if($data){
					$this->success('注册成功，请先登录',U('Login/login'),2);
				}else{
					$this->error('注册失败，请重新注册');
				}
			}else{
				$this-error($user->getError());
			}
		}
		public function username(){
			$user=M('User');
			$data=$user->where($_POST)->find();
			if($data){
				echo 'no';
			}else{
				echo 'yes';
			}
		}
	}