<?php
	namespace Home\Controller;
	use Think\Controller;
	class AdressController extends Controller
	{
		public function adress(){
			$this->display();
		}

		public function insert(){
			//根据$_SESSION['username']查询用户手机号
			$user=M('user');
			$where['username']=$_SESSION['username'];
			$phone=$user->field('phone')->where($where)->find();

			$adress=M('adress');
			$_POST['userName']=$_SESSION['username'];
			$_POST['userPhone']=$phone['phone'];
			$check=$adress->create();
			if($check){
				$data=$adress->add();
				if($data){
					$this->ajaxReturn('ok');
				}else{
					$this->ajaxReturn('no');
				}
			}else{
				$this->ajaxReturn('no');
			}
		}

		//更新地址状态
		public function update(){
			$adress=M('adress');
			$data['status']='0';
			$where['userName']=$_SESSION['username'];
			$res=$adress->where($where)->save($data);
			$id['id']=$_POST['id'];
			$update=$adress->where($id)->save($_POST);
			if($update){
				$this->ajaxReturn('ok');
			}else{
				$this->ajaxReturn('no');
			}
		}

		//修改地址
		public function modifyid(){
			$bool=setcookie('id',$_GET['id'],time()+3600);
			if($bool){
				$this->ajaxReturn('ok');
			}else{
				$this->ajaxReturn('no');
			}
		}
		public function modify(){
			$where['id']=$_COOKIE['id'];
			$adress=M('adress');
			$data=$adress->where($where)->find();
			$this->assign('data',$data);
			$this->display();
		}
	}