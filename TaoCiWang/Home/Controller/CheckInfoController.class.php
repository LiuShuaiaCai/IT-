<?php
	namespace Home\Controller;
	use Think\Controller;
	class CheckInfoController extends Controller
	{
		public function checkinfo(){
			//收货地址
			$adress=M('adress');
			$where['userName']=$_SESSION['username'];
			$adressData=$adress->where($where)->select();
			$this->assign('adressData',$adressData);


			//收货信息
			$data=$_SESSION['data'];
			$this->assign('data',$data);
			$this->display();
		}

		//接收购物车传递过来的数据
		public function recive(){
			$model=M();
			$where['g.id']=array('IN',$_POST['arr']);
			$where['s.gid']=array('EXP','=g.id');
			$where['s.uname']=$_SESSION['username'];
			$data=$model->table('taoci_shop s,taoci_goods g')->field('g.*, s.id sid,s.number,s.total')->where($where)->select();
			$_SESSION['data']=$data;
		}

		//删除地址
		public function delete(){
			$adress=M('adress');
			$data=$adress->where($_POST)->delete();
			if($data){
				$this->ajaxReturn('ok');
			}else{
				$this->ajaxReturn('no');
			}
		}
	}