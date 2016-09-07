<?php
	namespace Home\Controller;
	use Think\Controller;
	class ShopController extends Controller
	{
		public function shop(){
			$shop=M();
			$where['s.gid']=array('EXP','=g.id');
			$where['s.uname']=$_SESSION['username'];
			$data=$shop->table('taoci_shop s,taoci_goods g')->field('g.*, s.id sid,s.number,s.total')->where($where)->select();
			$this->assign('data',$data);
			$this->display();
		}

		public function insert(){
			if(!isset($_SESSION['username'])){
				echo 'NO_login';
				exit();
			}
			$shop=M('shop');
			$where['gid']=$_POST['gid'];
			$where['uname']=$_SESSION['username'];
			$find=$shop->where($where)->find();
			if($find){
				echo 'exist';
				exit();
			}
			$_POST['uname']=$_SESSION['username'];
			$check=$shop->create();
			if($check){
				$data=$shop->add();
				if($data){
					echo 'yes';
				}else{
					echo 'no';
				}
			}else{
				echo 'no';
			}
		}

		//删除商品
		public function delete(){
			$shop=M('shop');
			$data=$shop->where($_POST)->delete();
			if($data){
				$this->ajaxReturn('ok');
			}else{
				$this->ajaxReturn('no');
			}
		}

		//删除多个
		public function dels(){
			$shop=M('shop');
			$where['gid']=array('in',$_POST['arr']);
			$where['uname']=$_SESSION['username'];
			$data=$shop->where($where)->delete();
			if($data){
				$this->ajaxReturn('ok');
			}else{
				$this->ajaxReturn('no');
			}
		}
		
	}