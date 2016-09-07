<?php
	namespace Admin\Controller;
	use Think\Controller;
	class ModifyController extends Controller
	{
		public function modify(){
			$model=M('goods');
			$data=$model->where('id='.$_GET['id'])->find();
			$this->assign('data',$data);
			dump($data);

			$first=M('type');
			$sec=$first->where('id='.$data['pid'])->find();
			$this->assign('sec',$sec);

			$one=$first->where('id='.$sec['pid'])->find();
			$this->assign('one',$one);

	        $fir_data=$first->where('pid=0')->select();
	        $this->assign('first',$fir_data);
			$this->display();
		}
		//添加商品
	    public function goods(){
	        if($_FILES['photo']['error']==0){
	            $upload=new \Think\Upload();     //实例化上传类
	            $upload->maxSize=1024*1024;
	            $upload->exts=array('jpg','jpeg','png','gif');
	            $upload->rootPath='./Public/';
	            $upload->savePath='Upload/';
	            $upload->subName=array('date','Ymd');

	            //上传文件
	            $info=$upload->upload();
	            // dump($info);
	            // exit();
	            if($info){
	                $_POST['photo']='/Public/'.$info['photo']['savepath'].$info['photo']['savename'];
	            }else{
	                $this->error($upload->getError());
	            }
	        }else{
	            $this->error('上传失败');
	            exit();
	        }
	        
	        $type=M('type');
	        $post['name']=$_POST['name'];
	        $post['pid']=$_POST['pid'];
	        // dump($post);exit();
	        $typeres=$type->create($post);
	        if($typeres){
	            $typedata=$type->add();
	            if(!$typedata){
	                $this->error('添加失败');
	                exit();
	            }
	        }else{
	            $type->getError($this->error());
	        }
	        

	        $goods=M('goods');
	        $_POST['addtime']=date('Y-m-d H:i:s',time());
	        $_POST['tid']=$typedata;
	        $res=$goods->create();
	        if($res){
	            $data=$goods->add();
	            if($data){
	            	$tdel=$type->where('id='.$_POST['aid'])->delete();
	            	$gdel=$goods->where('id='.$_POST['gid'])->delete();
	            	if($tdel && $gdel){
	            		 $this->success('添加成功',U('TypeList/lists'),1);
	            	}
	               
	            }else{
	                $this->error('添加失败');
	            }
	        }else{
	            $goods->getError($this->error());
	        }
	    }

	    //商品分类
	    public function find(){
	        $model=M('type');
	        $data=$model->where($_POST)->select();
	        // echo json_encode($data);
	        // dump($data); 
	        $this->ajaxReturn($data);
	    }
	}