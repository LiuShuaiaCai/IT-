<?php
	namespace Home\Controller;
	use Think\Controller;
	class SpecialController extends Controller
	{
		public function special(){
			//新品首发
			$goods=M('goods');
			$where['status']='1';
			$data=$goods->where($where)->select();
			$this->assign('data',$data);

			//推荐商品
			
			$this->display();
		}
	}