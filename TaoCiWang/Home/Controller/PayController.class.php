<?php
	namespace Home\Controller;
	use Think\Controller;
	/**
	*  
	*/
	class PayController extends Controller
	{
		function pay()
		{
			$order=M('order');
			$data=$order->field('id,code,total,uname')->where($_GET)->find();

			//获得虚拟货币
			$user=M('user');
			$where['username']=$_SESSION['username'];
			$money=$user->field('password,money')->where($where)->find();

			$this->assign('money',$money);
			$this->assign('data',$data);
			$this->display();
		}

		//更新数据
		public function update(){
			//更新账户余额
			$user=M('user');
			$update['money']=$_POST['money'];
			$where['username']=$_SESSION['username'];
			$money=$user->where($where)->save($update);

			//更新订单状态
			$order=M('order');
			$id['id']=$_POST['id'];
			$data['order_status']=2;
			$status=$order->where($id)->save($data);

			if($status){
				if($money){
					$this->ajaxReturn('ok');
				}else{
					$this->ajaxReturn('no2');
				}
			}else{
				$this->ajaxReturn('no1');
			}
		}
	}