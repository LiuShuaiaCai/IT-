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

            <div class="j_personal_gytl">收货地址&nbsp;&nbsp;<font style="color:#333333; font-family:simsun; font-size:12px;">(带<font class="j_green">* </font> 为必填)</font>
                <font  style=" float:right; font-size:14px; font-weight:bold; color:#8d0049; font-size:16px; "><a href="javascript:void(0)" class='addadress'>新增收货地址</a></font>
            </div>

            <div class="j_personl_d">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #e7e7e7; border-top:none; margin-top:8px; font-size:14px;" class="j_table">
                  <tr height="40" style="background:#f2f2f2; color:#000; ">
                    <td width="17%">收货人</td>
                    <td width="34%">收货地址</td>
                    <td width="23%">电话/手机</td>
                    <td width="15%">操作</td>
                    <td width="11%">&nbsp;&nbsp;</td>
                  </tr>
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td height="50"><?php echo ($vo["reciveName"]); ?></td>
                    <td><?php echo ($vo["province"]); echo ($vo["city"]); echo ($vo["county"]); echo ($vo["more"]); ?></td>
                    <td><?php echo ($vo["recivePhone"]); ?></td>
                    <td>
                        <a href="javascript:void(0)" class="modify" data="<?php echo ($vo["id"]); ?>">修改</a>丨
                        <a href="javascript:void(0)" class="delete" data="<?php echo ($vo["id"]); ?>">删除</a>
                        <input type="hidden" value='<?php echo ($vo["status"]); ?>'>
                    </td>
                    <?php if($vo["status"] == 1): ?><td><span class="j_mradd">默认地址</span></td><?php endif; ?>     
                  </tr><?php endforeach; endif; else: echo "" ;endif; ?> 
                </table>
            </div>
        </div>
    </div>
<script>
    $('.addadress').click(function(){
        var id=$(this).attr('data');
        $.get("<?php echo U('Adress/adress');?>",{"id":id});
        layer.open({
          type: 2,
          title: '陶瓷网',
          shadeClose: true,
          shade: 0.3,
          area: ['1200px', '666px'],
          content: '<?php echo U("Adress/adress");?>' //iframe的url
        });
    })

    
    //删除地址
    $('.delete').click(function(){
        var bool=$(this).next().val();
        if(bool=='1'){
            layer.open({
                type: 1,
                title:'淘瓷网',
                time:3000,
                area: ['300px', '150px'],
                shadeClose: true, //点击遮罩关闭
                content: '<div style="padding:20px;text-align:center;font-size:13px">默认地址不能删除</div>'
            });
        }else{
            var id=$(this).attr('data');
            $.ajax({
                type:"POST",
                url:"<?php echo U('CheckInfo/delete');?>",
                data:"id="+id,
                success:function(msg){
                    if(msg=='ok'){
                        layer.open({
                            type: 1,
                            title:'淘瓷网',
                            time:3000,
                            area: ['300px', '150px'],
                            shadeClose: true, //点击遮罩关闭
                            content: '<div style="padding:20px;text-align:center;font-size:13px">删除成功</div>'
                        });
                        location.reload();
                    }else{
                        layer.open({
                            type: 1,
                            title:'淘瓷网',
                            time:3000,
                            area: ['300px', '150px'],
                            shadeClose: true, //点击遮罩关闭
                            content: '<div style="padding:20px;text-align:center;font-size:13px">删除失败</div>'
                        });
                    }
                }
            })
        }
    })

    //修改地址
    $('.modify').click(function(){
        var id=$(this).attr('data');
        $.get("<?php echo U('Adress/modifyid');?>",{"id":id},function(msg){
            if(msg=='ok'){
                layer.open({
                  type: 2,
                  title: '陶瓷网',
                  shadeClose: true,
                  shade: 0.3,
                  area: ['1200px', '666px'],
                  content: '<?php echo U("Adress/modify");?>' //iframe的url
                });
            }
        });
    })
</script>

	<!-- 引入尾部 -->
	<?php echo W('Public/footer');?>;
</body>
</html>