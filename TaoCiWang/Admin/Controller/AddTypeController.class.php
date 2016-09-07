<?php
namespace Admin\Controller;
use Think\Controller;
header('Content-type:text/html;charset=utf-8');
class AddTypeController extends Controller {
    public function add(){
        $first=M('type');
        $fir_data=$first->where('pid=0')->select();
        $this->assign('first',$fir_data);
    	$this->display();
    }

    public function insert(){
    	//实例化type表
    	$type=M('type');
    	//创建数据对象
    	$data=$type->create();
    	//判断对象
    	if($data){
    		$insert=$type->add();
    		// echo $type->_sql();
    		if($insert){
    			$this->success('添加成功',U('TypeList/lists'),1);
                // echo 'ok';
    		}else{
    			$this->error('添加失败');
    		}
    	}else{
    		$type->getError();
    	}
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
        dump($_POST);
        $res=$goods->create();
        if($res){
            $data=$goods->add();
            if($data){
                $this->success('添加成功',U('TypeList/lists'),1);
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