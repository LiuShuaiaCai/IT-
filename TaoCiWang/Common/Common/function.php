<?php
	/**
	 * TODO 基础分页的相同代码封装，使前台的代码更少
	 * param $m 模型，引用传递
	 * param $where 查询条件
	 * param int $pagesize 每页查询条数
	 * return \Think\Page
	 */
	function getpage(&$m,$where,$pagesize=2)
	{
		$m1=clone $m;		//浅复制一个模型
		$count=$m->where($where)->count();		//连贯操作后会对jion等操作进行重置
		$m=$m1;				//为保持连贯操作，浅复制一个模型
		$p=new Think\Page($count,$pagesize);	//实例化分页Page类
		$p->lastSuffix=true;		//是否显示最后一页的页码
		$p->setConfig('first','首页');
		$p->setConfig('prev','上一页');
		$p->setConfig('next','下一页');
		$p->setConfig('last','尾页');
		$p->setConfig('theme',"共 %TOTAL_ROW% 条记录 %FIRST% &nbsp; %UP_PAGE% &nbsp; %LINK_PAGE% &nbsp; %DOWN_PAGE% %END%&nbsp;&nbsp; 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页");
		$m->limit($p->firstRow,$p->listRows);
		return $p;
	}

	function orderId(){
		//生成24位唯一订单号码，格式：YYYY-MMDD-HHII-SS-NNNN,NNNN-CC，其中：YYYY=年份，MM=月份，DD=日期，HH=24格式小时，II=分，SS=秒，NNNNNNNN=随机数，CC=检查码
 
		@date_default_timezone_set("PRC");
		 
		 
		  //订购日期
		 
		  $order_date = date('Y-m-d');
		 
		  //订单号码主体（YYYYMMDDHHIISSNNNNNNNN）
		 
		  $order_id_main = date('YmdHis') . rand(10000000,99999999);
		 
		  //订单号码主体长度
		 
		  $order_id_len = strlen($order_id_main);
		 
		  $order_id_sum = 0;
		 
		  for($i=0; $i<$order_id_len; $i++){
		 
		  	$order_id_sum += (int)(substr($order_id_main,$i,1));
		 
		  }
		 
		  //唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
		 
		  $order_id = $order_id_main . str_pad((100 - $order_id_sum % 100) % 100,2,'0',STR_PAD_LEFT);

		return $order_id;
	}