<?php
	namespace Home\Controller;
	use Think\Controller;
	header("Content-type: text/html; charset=utf-8");
	class OrderController extends Controller
	{
		public function order(){
			$order=M('goods g,taoci_order o');
			$where['o.uname']=$_SESSION['username'];
			$where['o.gid']=array('EXP','=g.id');
			if(isset($_GET['order_status'])){
				$where['o.order_status']=$_GET['order_status'];
			}
			//调用分页方法
			$page=getpage($order,$where,5);
			$show=$page->show();
			$this->assign('show',$show);

			$data=$order->where($where)->order('o.id desc')->select();

			$this->assign('data',$data);
			$this->display();
		}

		public function insert(){
			$code=orderId();
			$_POST['code']=$code;
			$_POST['uname']=$_SESSION['username'];
			$order=M('order');
			$check=$order->create();
			if($check){
				$data=$order->add();
				if($data){
					$this->ajaxReturn('ok');
				}else{
					$this->ajaxReturn('no');
				}
			}else{
				$this->ajaxReturn('no');
			}
		}

		public function recive(){
			$_SESSION['orderId']=$_GET['id'];
		}

		public function detail(){
			$where['o.id']=$_SESSION['orderId'];
			$where['o.gid']=array('EXP','=g.id');
			$where['o.aid']=array('EXP','=a.id');
			$order=M();
			$data=$order->table('taoci_goods g,taoci_order o,taoci_adress a')->where($where)->find();
			echo $order->_sql();
			$this->assign('data',$data);
			$this->display();
		}

		//删除订单
		public function delete(){
			$order=M('order');
			$where['id']=$_POST['id'];
			$data=$order->where($where)->delete();
			if($data){
				$this->ajaxReturn('ok');
			}else{
				$this->ajaxReturn('no');
			}
		}
	}