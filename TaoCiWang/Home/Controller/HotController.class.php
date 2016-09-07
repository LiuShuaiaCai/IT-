<?php
	namespace Home\Controller;
	use Think\Controller;
	class HotController extends Controller
	{
		public function hot(){
			//新品首发
			$goods=M('goods');
			$where['status']='2';
			$data=$goods->where($where)->select();
			$this->assign('data',$data);

			//推荐商品
			
			$this->display();
		}
	}