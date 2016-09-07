<?php
namespace Admin\Controller;
use Think\Controller;
header('Content-type:text/html;charset=utf-8');
class TypeListController extends Controller
{
	public function lists(){
		$model=M('type');
		$data=$model->select();
		$tree=\Org\LAMP\CatTree::getTree($data);
		// dump($tree);
		$this->assign('tree',$tree);
		$this->display();
	}

	public function del(){
		$model=M('type');
		$goods=M('goods');
		$data=$model->where($_POST)->find();
		if($data){
			echo 'no';
		}else{
			$id=$_POST['pid'];
			$model->where("id=$id")->delete();
			$goods->where("tid=$id")->delete();
			echo 'yes';
		}
	}

	public function find(){
		$model=M('type');
		$data=$model->where('id='.$_POST['id'])->find();
		$this->ajaxReturn($data);
	}

	public function update(){
		$model=M('type');
		$name['name']=$_POST['name'];
		$data=$model->where('id='.$_POST['id'])->save($name);
		if($data){
			$this->redirect('TypeList/lists','',1,'修改成功,页面跳转中...');
		}else{
			$this->error('修改错误');
		}
	}
}