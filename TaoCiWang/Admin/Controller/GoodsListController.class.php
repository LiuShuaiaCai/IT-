<?php
	namespace Admin\Controller;
	use Think\Controller;
	/**
	* author:LiuShuaiCai
	* date:2016/5/5 10:05
	* des:商品详情列表
	*/
	class GoodsListController extends Controller
	{
		public function goodslist()
		{
			if(isset($_GET['name'])){
				$where['name']=array('like',$_GET['name'].'%');
			}else{
				$where=array();
			}
			$model=M('goods');
			$p=getpage($model,$where,2);
			$show=$p->show();
			$data=$model->where($where)->select();
			//查询商品的父类
			$type=M('type');
			foreach ($data as &$value) {
				$id['id']=$value['pid'];
				$pname=$type->where($id)->find();
				$value['pname']=$pname['name'];
			}
			$this->assign('show',$show);
			$this->assign('data',$data);
			$this->display();
		}

		//删除商品
		public function delete(){
			$model=M();
			$id['id']=$_POST['id'];
			$tid['id']=$_POST['tid'];
			// dump($data);exit();
			$tdel=$model->table('taoci_type')->where($tid)->delete();
			$gdel=$model->table('taoci_goods')->where($id)->delete();

			if($tdel && $gdel){
				echo 'yes';
			}else{
				echo 'no';
			}
		}
	}