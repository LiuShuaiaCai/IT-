<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>淘瓷网_首页</title>
	
	 <link rel="shortcut icon" type="image/x-icon" href="http://www.redroses1960.com../images/favicon.ico">
    <link href="/xiangmu/TaoCiWang/Public/Home/css/homestyle.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/xiangmu/TaoCiWang/Public/Home/css/page.css">
	
    <script src="/xiangmu/TaoCiWang/Public/Home/js/jquery-1.7.1.js"></script>
    <script src="/xiangmu/TaoCiWang/Public/Home/js/jquery.superslide.2.1.1.js"></script>
    <script src="/xiangmu/TaoCiWang/Public/Home/js/pptBox.js"></script>
    <script src="/xiangmu/TaoCiWang/Public/Home/js/layer.min.js"></script>
    <link rel="stylesheet" href="/xiangmu/TaoCiWang/Public/Home/css/layer.css" id="layui_layer_skinlayercss">


<!--QQ第三方登录-->
    
<!--QQ第三方登录 结束-->
<!--新浪微博 开始-->
<script src="/xiangmu/TaoCiWang/Public/Home/js/wb.js" type="text/javascript" charset="utf-8"></script>
<script charset="UTF-8" src="/xiangmu/TaoCiWang/Public/Home/images/query"></script>
<!--新浪微博 结束-->

<script type="text/javascript">
    $(function ()
    {
        $('.z_weixin2').each(function () {
            var distance = 10;
            var time = 250;
            var hideDelay = 500;
            var hideDelayTimer = null;
            var beingShown = false;
            var shown = false;
            var trigger = $('.trigger2', this);
            var info = $('.z_ewm2', this).css('opacity', 0);
            $([trigger.get(0), info.get(0)]).mouseover(function () {
                if (hideDelayTimer) clearTimeout(hideDelayTimer);
                if (beingShown || shown) {
                    // don't trigger the animation again
                    return;
                } else {
                    // reset position of info box
                    beingShown = true;

                    info.css({
                        top: 39,
                        left: -25,
                        display: 'block'
                    }).animate({
                        top: '-=' + distance + 'px',
                        opacity: 1
                    }, time, 'swing', function () {
                        beingShown = false;
                        shown = true;
                    });
                }

                return false;
            }).mouseout(function () {
                if (hideDelayTimer) clearTimeout(hideDelayTimer);
                hideDelayTimer = setTimeout(function () {
                    hideDelayTimer = null;
                    info.animate({
                        top: '-=' + distance + 'px',
                        opacity: 0
                    }, time, 'swing', function () {
                        shown = false;
                        info.css('display', 'none');
                    });

                }, hideDelay);

                return false;
            });
        });
    });

    var _master = {
        Logout:function(){},  //退出登录
        //
        SearchBy:"",  
        SearchText:"",  //搜索文本
        masterSearText:$(),
        searchClick: function () { }
    };

    _master.Logout = function ()
    {
        /*
        if (QC.Login.check())
        {
            QC.Login.signOut();  //退出QQ登录
        }
        if (WB2.checkLogin())
        {
            WB2.logout();  //退出新浪微博
        }
        */
        window.location.href="/Home/Logout";
    };

    $(function ()
    {
        //登录信息
        _master.SearTextBox = $("#masterSearText");
        //如果是
        if (_master.SearchBy == "Master")
        {
            _master.SearTextBox.val(_master.SearchText);
            _master.SearTextBox.focus();
            _master.SearTextBox.select();
        }

        _master.SearTextBox.keydown(function ()
        {
            document.onkeydown = function mykeyDown(e)
            {
                e = e || event;
                if (e.keyCode == 13) { _master.searchClick(); }
                return;
            }
        });

    });
    _master.searchClick = function ()
    {
        var txt = $.trim(_master.SearTextBox.val());
        if (txt == "")
        {

            layer.tips("搜索关键字不能为空", _master.SearTextBox);
            _master.SearTextBox.focus();
        }
        else
        {
            window.location.href = "/Home/GoodsList?SearchBy=Master&keywords=" + txt;
        }
    };
</script>

<style>
	.banner{
		padding: 0;
		margin:0;
	}
	.banner img{
		width:973px;
		height:358px;
	}
</style>

</head>
<body>
	<!-- 引入头部 -->
	<?php echo W('Public/header');?>;

	<!-- 主题部分 -->
	
<div class="l_main">
    <!--ucPersonalColumn 开始-->
    <div class="l_pgr_l01">
        <div id="firstpane01" class="menu_list">
            <!--个人资料-->
            <p onclick="_ucPserCol.headClick(1)" class="menu_head01" style="border-top: none;">
                <img src="/xiangmu/TaoCiWang/Public/Home/images/gr_j.png" height="12" width="16">个人资料</p>
            <div id="Body_1" style="display: none" class="menu_body01">
                <a href="<?php echo U('Person/baseinfo');?>" style="">基本信息</a>
                <a href="<?php echo U('Person/modifypwd');?>" style="">修改密码</a>
                <a href="<?php echo U('Person/modifyads');?>" style="color: #a50049; font-weight: bold;">收货地址</a>
            </div>
            
            <!--我的订单-->
            <p onclick="_ucPserCol.headClick(2)" class="menu_head01" style="background: #f4f8fb">
            <img src="/xiangmu/TaoCiWang/Public/Home/images/gr_j.png" height="12" width="16">我的订单</p>
            <div id="Body_2" style="display: none" class="menu_body01">
                <a href="<?php echo U('Order/order');?>" style="">全部订单</a>
                <a href="<?php echo U('Order/order');?>?order_status=1" style="">未付款</a>
                <a href="<?php echo U('Order/order');?>?order_status=2" style="">待收货</a>
                <a href="<?php echo U('Order/order');?>?order_status=3" style="">待评价</a>
                <a href="<?php echo U('Order/order');?>?order_status=4" style="">已完成</a>
                <a href="<?php echo U('Order/order');?>?order_status=5" style="">退款</a>
            </div>
            
        </div>

        <script type="text/javascript">
            var _ucPserCol = {
                column: "PersonalAddress",
                headClick: function (n) { }
            };
            $(function ()
            {
                if (_ucPserCol.column == "PersonalBaseInfo"
                    || _ucPserCol.column == "PersonalPassWord"
                    || _ucPserCol.column == "PersonalAddress"
                    )
                {
                    $("#Body_1").show();
                }
                else if (_ucPserCol.column == "WAIT_BUYER_PAY"
                    || _ucPserCol.column == "WAIT_BUYER_CONFIRM_GOODS"
                    || _ucPserCol.column == "WAIT_BUYER_COMMENT"
                    || _ucPserCol.column == "TRADE_FINISHED"
                    || _ucPserCol.column == "GOODS_REFUNDING"
                    ) {
                    $("#Body_2").show();
                }
                else if (_ucPserCol.column == "MyCouponList") {
                    $("#Body_3").show();
                }
            });
            _ucPserCol.headClick = function (n)
            {
                if (n == 0)
                {
                    $("#Body_1").slideUp("slow");
                    $("#Body_2").slideUp("slow");
                    $("#Body_3").slideUp("slow");
                }
                else if (n == 1)
                {
                    $("#Body_2").hide();
                    $("#Body_3").hide();
                    $("#Body_1").slideDown("slow");
                }
                else if(n==2)
                {
                    $("#Body_1").hide();
                    $("#Body_3").hide();
                    $("#Body_2").slideDown("slow");
                }
                else if (n == 3) {
                    $("#Body_1").hide();
                    $("#Body_2").hide();
                    $("#Body_3").slideDown("slow");
                }

            };
        </script>
    </div>

    <div class="j_peisonyou fr">
        <div class="j_personal_frall fr">
            <div class="j_personal_gytl">我的订单&nbsp;&nbsp;</div>
            <div class="j_personal_dd">
                <div class="j_personal_allbt">
                    <table style="height: 38px; line-height: 38px; background: #f7f7f7; border: 1px solid #e9e6e6; margin-top: 5px; font-size: 14px;" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td width="44%">商品</td>
                                <td width="16%">单价（元）</td>
                                <td width="12%">数量</td>
                                <td width="13%">小计（元）</td>
                                <td width="15%">状态</td>
                            </tr>
                        </tbody>
                    </table>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><table style="border: 1px solid #d7d6d6;" class="j_ddtable" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td colspan="4" style="background: #f5f5f5; height: 35px; line-height: 35px; text-align: left; padding: 0 10px; font-size: 12px;">
                                    <font class="j_family"></font>&nbsp;
                                    <b>订单号：<a href=""><?php echo ($vo["code"]); ?></a></b> &nbsp;&nbsp;
                                    <span>共 <?php echo ($vo["number"]); ?> 件商品</span>
                                    <span>商品：<?php echo ($vo["price"]); ?> 元  
                                            <span>运费 <?php echo ($vo["luggage"]); ?> 元</span>
                                    </span>
                                    <b>
                                    <a href="javascript:;" style="color:#8d0049;" class="detail" data='<?php echo ($vo["id"]); ?>'>详情</a> &nbsp;&nbsp;<span>[网站支付]</span>
                                    </b>
                                </td>
                                <td colspan="2" class="j_heji" style="text-align: center">合计：<font class="j_yang">￥<?php echo ($vo["total"]); ?> 元</font></td>
                            </tr>
                            
                            <tr class="j_trborder">
                                <td align="center" valign="middle" width="17%"><a href="">
                                    <img src="/xiangmu/TaoCiWang<?php echo ($vo["photo"]); ?>" height="60" width="60"></a>
                                </td>
                                <td align="left" valign="top" width="27%">
                                    <span class="j_redbt"><a href=""><?php echo ($vo["name"]); ?></a></span>
                                    <span class="j_redmg_des"><?php echo ($vo["desc"]); ?></span>
                                </td>
                                <td width="17%"><font class="j_yang">￥</font><font class="j_xianjia"><?php echo ($vo["price"]); ?></font></td>
                                <td class="j_jiege" width="11%"><?php echo ($vo["number"]); ?> 件</td>
                                <td width="13%">
                                    <font class="j_yang">￥</font>
                                    <font class="j_zongji"><?php echo ($vo["total"]); ?></font>
                                    <br>
                                    
                                </td>
                                <!--订单按钮-->

                                    <td rowspan="1" style="border-left:1px solid #d7d6d6; padding-top:5px;" align="center" valign="top" width="15%">
                                        <form id="payForm_335" action="/AliPartner/Pay" method="post" style="display:none;">
                                            <input name="OrderId" value="335" type="hidden">
                                        </form>
                                        <?php if($vo["order_status"] == 1): ?><span class="j_fukuan"><a href="<?php echo U('Pay/pay');?>?id=<?php echo ($vo["id"]); ?>">付款</a></span>
                                        <span class="j_fukuan"><a href="javascript:;" class="cancle" data="<?php echo ($vo["id"]); ?>">取消订单</a></span>
                                        <?php elseif($vo["order_status"] == 2): ?>
                                        <span class="j_fukuan"><a href="javascript:;" class="cancle" data="<?php echo ($vo["id"]); ?>">取消订单</a></span>
                                        <?php elseif($vo["order_status"] == 3): ?>
                                        <span class="j_fukuan"><a href="javascript:;">马上评价</a></span>
                                        <span class="j_fukuan"><a href="javascript:;" class="delete" data="<?php echo ($vo["id"]); ?>">删除订单</a></span>
                                        <?php elseif($vo["order_status"] == 4): ?>
                                        <span class="j_fukuan"><a href="javascript:;" class="delete" data="<?php echo ($vo["id"]); ?>">删除订单</a></span>
                                        <?php elseif($vo["order_status"] == 4): ?>
                                        <span class="j_fukuan"><a href="javascript:;" class="delete" data="<?php echo ($vo["id"]); ?>">删除订单</a></span><?php endif; ?>
                                    </td>
                            </tr>   
                        </tbody>
                    </table><?php endforeach; endif; else: echo "" ;endif; ?>  
                    <div><?php echo ($show); ?></div>
                </div>
            </div>
        </div>
    </div>
<script>
    //商品编号
    $('.j_family').each(function(eq){
        var num=eq+1;
        $(this).html(num);
    })

    $('.detail').click(function(){
        var id=$(this).attr('data');
        $.get("<?php echo U('Order/recive');?>",{"id":id});
        layer.open({
          type: 2,
          title: '陶瓷网',
          shadeClose: true,
          shade: 0.3,
          area: ['1200px', '666px'],
          content: '<?php echo U("Order/detail");?>' //iframe的url
        });
    })

    $('.cancle').click(function(){
        var id=$(this).attr('data');
        $.ajax({
            type:"POST",
            url:"<?php echo U('Order/delete');?>",
            data:"id="+id,
            success:function(msg){
                if(msg=='ok'){
                    layer.open({
                        type: 1,
                        title:'淘瓷网',
                        time:3000,
                        area: ['300px', '150px'],
                        shadeClose: true, //点击遮罩关闭
                        content: '<div style="padding:20px;text-align:center;font-size:13px">订单已取消</div>'
                    });
                    location.reload();
                }else{
                    layer.open({
                        type: 1,
                        title:'淘瓷网',
                        time:3000,
                        area: ['300px', '150px'],
                        shadeClose: true, //点击遮罩关闭
                        content: '<div style="padding:20px;text-align:center;font-size:13px">系统错误</div>'
                    });
                }
            }
        })
    })
    $('.delete').click(function(){
        var id=$(this).attr('data');
        $.ajax({
            type:"POST",
            url:"<?php echo U('Order/delete');?>",
            data:"id="+id,
            success:function(msg){
                if(msg=='ok'){
                    layer.open({
                        type: 1,
                        title:'淘瓷网',
                        time:3000,
                        area: ['300px', '150px'],
                        shadeClose: true, //点击遮罩关闭
                        content: '<div style="padding:20px;text-align:center;font-size:13px">订单已删除</div>'
                    });
                    location.reload();
                }else{
                    layer.open({
                        type: 1,
                        title:'淘瓷网',
                        time:3000,
                        area: ['300px', '150px'],
                        shadeClose: true, //点击遮罩关闭
                        content: '<div style="padding:20px;text-align:center;font-size:13px">系统错误</div>'
                    });
                }
            }
        })
    })
</script>

	<!-- 引入尾部 -->
	<?php echo W('Public/footer');?>;
</body>
</html>