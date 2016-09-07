<?php
namespace Home\Controller;
use Think\Controller;
header('Content-type:text/html;charset=utf8');
class IndexController extends Controller {
    public function index(){
    	//商品分类
    	$model=M('type');
    	$data=$model->select();
    	$tree=\Org\LAMP\CatTree::getTree($data);
    	// dump($tree);
    	$this->assign('tree',$tree);

    	//商品
    	$goods=M('goods');
    	$newwhere['status']='0';
    	$hotwhere['status']='1';
    	$specialwhere['status']='2';
    	$new=$goods->where($newwhere)->limit(0,4)->select();
    	$hot=$goods->where($hotwhere)->limit(0,4)->select();
    	$special=$goods->where($specialwhere)->limit(0,4)->select();

    	//Banner
    	$banner=M('banner');
    	$banner_data=$banner->select();
    	foreach ($banner_data as $key => $value) {
    		$banner_data[$key]['banner']=htmlspecialchars_decode($value['banner']);
    	}
    	
    	$this->assign('banner',$banner_data);
    	$this->assign('new',$new);
    	$this->assign('hot',$hot);
    	$this->assign('special',$special);
       	$this->display();
    }

    public function shop(){
        //购物车
        if(isset($_SESSION['username'])){
            $this->ajaxReturn('ok');
        }else{
            $this->ajaxReturn('no');
        }
    }
}