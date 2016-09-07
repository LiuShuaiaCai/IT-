<?php
	namespace Home\Controller;
	use Think\Controller;
	/**
	* 
	*/
	header('Content-type:text/html;charset=utf-8');
	class GoodsListController extends Controller
	{
		public function goodslist()
		{
			//商品分类
			$tmodel=M('type');
			$type=$tmodel->where('pid=0')->select();
			$this->assign('type',$type);

			//商品列表
			$model=M('goods');

			//调用分页函数
			$page=getpage($model,$where,8);
			$show=$page->show();

			//搜索
			if(isset($_GET['name'])){
				$where['name']=array('like',"%{$_GET['name']}%");
			}

			//显示二级分类，如果点击一级分类的时候，显示当前一级分类的二级分类，默认显示所有的二级分类
			if(isset($_GET['id'])){
				$select=$tmodel->where('pid='.$_GET['id'])->select();
				$id_arr=[];
				foreach ($select as $key => $value) {
					$res=$model->where('pid='.$value['id'])->select();
					foreach ($res as $key => $value2) {
						////////////////////////////////
						// dump($value2['id']); //
						////////////////////////////////
						$id_arr[]=$value2['id'];
					}
				}
			$where['id']=array('in',$id_arr);
			$tuijian['id']=array('in',$id_arr);
			}else{
				$id_sec=[];
				foreach ($type as $key => $value) {
					$id_sec[]=$value['id'];
				}
				$where_sec['pid']=array('IN',$id_sec);
				$select=$tmodel->where($where_sec)->select();
			}

			//点击二级分类的时候，显示二级分类下的商品，默认显示一级分类的商品
			if(isset($_GET['pid'])){
				$where=[];
				$where['pid']=$_GET['pid'];
				$data=$model->where($where)->select();
			}else{
				$data=$model->where($where)->select();
			}
					
			//分配变量	
			$this->assign('show',$show);
			$this->assign('select',$select);
			$this->assign('data',$data);

			//推荐产品
			$tuijian['status']=array('eq','3');
			$status=$model->where($tuijian)->limit(0,3)->select();
			$this->assign('status',$status);

			$this->display();
		}



		//二级商品查询
		// public function search(){
		// 	$goods=M('goods');
		// 	$where=$_POST;
		// 	$page=getpage($goods,$where,8);
		// 	$show=$page->show();
		// 	$data=$goods->where($where)->select();
		// 	echo json_encode($data);
		// }
	}