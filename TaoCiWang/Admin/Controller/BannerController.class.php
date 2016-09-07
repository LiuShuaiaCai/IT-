<?php
	namespace Admin\Controller;
	use Think\Controller;
	/**
	* 
	*/
	class BannerController extends Controller
	{
		
		public function add()
		{
			$this->display();
		}

		public function insert(){
			$banner=M('banner');
			$check=$banner->create();
			if($check){
				$data=$banner->add();
				if($data){
					$this->success('添加成功',U("Banner/lists"),3);
				}else{
					$this->error('添加失败');
				}
			}else{
				$this->error($banner->getError());
			}
		}

		public function lists(){
			$this->display();
		}
	}