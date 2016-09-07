<?php
	namespace Home\Controller;
	use Think\Controller;
	/**
	* 
	*/
	class PersonController extends Controller
	{
		//基本信息
		public function baseinfo()
		{
			//查询个人信息
			$user=M('user');
			$adress=M('adress');
			$where['username']=$_SESSION['username'];
			$whereadress['status']='1';
			$adressdata=$adress->where($whereadress)->find();
			$data=$user->where($where)->find();
			$this->assign('adress',$adressdata);
			$this->assign('data',$data);

			$shop=M('shop');
			$shopwhere['uname']=$_SESSION['username'];
			$shopdata=$shop->where($shopwhere)->count();
			$this->assign('shopdata',$shopdata);
			$this->display();
		}
		//修改基本信息
		public function modifyinfo(){
			if($_FILES['photo']['error']=='0'){
				//1、实例化上传类
				$upload=new \Think\Upload();
				//2、设置图片限制
				$upload->maxSize=1024*1024;		//设置图片上传大小
				$upload->exts=array('png','jpg','jpeg','gif');	//设置图片类型
				$upload->rootPath='./Public/';	//设置上传根目录
				$upload->subName=array('date','Ymd');	//创建子目录
				$upload->savePath='Upload/';	//文件保存路径

				//上传文件
				$info=$upload->upload();
				if($info){
					$user=M('user');
					$where['username']=$_SESSION['username'];
					$information=array(
							'username' => $_POST['username'],
							'sex'	   => $_POST['sex'],
							'phone'	   => $_POST['phone'],
							'photo'	   => "/Public/".$info['photo']['savepath'].$info['photo']['savename']
						);
					$data=$user->where($where)->save($information);

					$adress=M('adress');
					$adsinfo=array(
							'userName' => $_POST['username'],
							'userPhone'=> $_POST['phone']
						);
					$whs['userName']=$_SESSION['username'];
					$ads=$adress->where($whs)->save($adsinfo);

					$shop=M('shop');
					$order=M('order');
					$shopuname['uname']=$_POST['username'];
					$orderuname['uname']=$_POST['username'];
					$oswhere['uname']=$_SESSION['username'];
					$shopdata=$shop->where($oswhere)->save($shopuname);
					echo $shop->_sql();
					$orderdata=$order->where($oswhere)->save($orderuname);

					if($data){
						$_SESSION['username']=$_POST['username'];
						$this->success('修改成功',"baseinfo",3);
					}else{
						$this->ajaxReturn('no');
					}
				}

			}else{
				$this->error('上传失败');
			}
		}

		//修改密码
		public function modifypwd(){
			$this->display();
		}
		//验证密码
		public function check(){
			$user=M('user');
			$where['username']=$_SESSION['username'];
			$data=$user->field('password')->where($where)->find();
			if($data['password']!=$_POST['password']){
				$this->ajaxReturn('no');
			}else{
				$this->ajaxReturn('ok');
			}
		}
		//修改密码
		public function update(){
			$user=M('user');
			$pwd['password']=$_POST['password'];
			$where['username']=$_SESSION['username'];
			$data=$user->where($where)->save($pwd);
			if($data){
				$this->ajaxReturn('ok');
			}else{
				$this->ajaxReturn('no');
			}
		}

		//修改地址
		public function modifyads(){
			$adress=M('adress');
			$where['userName']=$_SESSION['username'];
			$data=$adress->where($where)->select();
			$this->assign('data',$data);
			$this->display();
		}

		//删除地址
		public function delete(){
			$order=M('adress');
			$where['id']=$_POST['id'];
			$data=$order->where($where)->delete();
			if($data){
				$this->ajaxReturn('ok');
			}else{
				$this->ajaxReturn('no');
			}
		}
	}