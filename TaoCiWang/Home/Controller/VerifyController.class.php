<?php
	namespace Home\Controller;
	use Think\Controller;
	/**
	* 
	*/
	class VerifyController extends Controller
	{
		//生成验证码
		public function code()
		{
			$config=array(
					'fontSize'=>16,
					'imageH'=>27,
					'useCurve'=>false,
					'useNoise'=>false,
					'length'=>4,
					'codeSet'=>'1234567890'
				);
			$verify=new \Think\Verify($config);
			$verify->entry();
		}

		//验证验证码
		public function check_code(){
			$code=I('post.code');
			$check=new \Think\Verify();
			$res=$check->check($code);
			if($res){
				echo 'yes';
			}else{
				$this->ajaxReturn('no');
			}
		}
	}