<?php
	namespace Home\Controller;
	use Think\Controller;
	class NewgoodsController extends Controller
	{
		public function newgoods(){
			//新品首发
			$goods=M('goods');
			$where['status']='0';
			$data=$goods->where($where)->select();
			$this->assign('data',$data);

			//推荐商品
			
			$this->display();
		}
	}