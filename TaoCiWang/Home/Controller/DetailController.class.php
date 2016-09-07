<?php
	namespace Home\Controller;
	use Think\Controller;
	class DetailController extends Controller
	{
		public function detail(){
			//查找商品的父类
			$type=M('type');
			$goods=M('goods');
			$data=$goods->where($_GET)->find();

			//转义大图
			$data['maxpic']=htmlspecialchars_decode($data['maxpic']); 
			$tdata=$type->field('id,name')->where('id='.$data['pid'])->find();
			
			//看了又看
			$where['status']='3';
			$where['pid']=$data['pid'];
			$tui=$goods->field('photo,price')->where($where)->limit(0,3)->select();

			//分配变量
			$this->assign('tui',$tui);
			$this->assign('data',$data);
			$this->assign('tdata',$tdata);
			$this->display();
		}
	}