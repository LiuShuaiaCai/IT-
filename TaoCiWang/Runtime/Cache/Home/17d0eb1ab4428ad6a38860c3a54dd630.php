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
<!--个人信息 start-->
        <div class="l_gr_r">
            <div class="l_t_rntlftx">
                <div style="width: 100px; float: left;">
                	<?php if($data["photo"] == ''): ?><img src="/xiangmu/TaoCiWang/Public/Home/images/noPerson.jpg" height="90" width="90" class="oImg">
                    <?php else: ?>
                    	<img src="/xiangmu/TaoCiWang<?php echo ($data["photo"]); ?>" height="90" width="90" class="oImg"><?php endif; ?>
                </div>
            </div>
            <div style="width: 600px; float: left; height: 80px; font-size: 16px; padding-left: 30px;">
                <div class="j_personal_name"><font style="color: #d1005e"><?php echo ($adress["userName"]); ?></font></div>
                <div class="j_personal_infor">
                    <div class="fl">我的资料:</div>
                    <div class="j_truename"><?php echo ($adress["userName"]); ?></div>
                    <div class="fl j_lxdh"><?php echo ($adress["userPhone"]); ?></div>

                    <div class="fl j_addre"><?php echo ($adress["province"]); echo ($adress["city"]); echo ($adress["county"]); echo ($adress["more"]); ?></div>

                    </div>
                    
            </div>
            <div class="l_gg">
                <div style="float: left;">
                    <div class="l_sll"><?php echo ($shopdata); ?> </div>
                    <img src="/xiangmu/TaoCiWang/Public/Home/images/l_gwcc.png" style="margin-top: 22px;">
                </div>

                <div style="margin-top: 25px; font-family: microsoft yahei; font-size: 15px; font-weight: bold;"><a href="<?php echo U('Shop/shop');?>">我的购物车</a></div>
            </div>
        </div>
        <!--个人信息end-->

        <div class="j_personal_frall fr">

            <div class="j_personal_gytl">基本信息&nbsp;&nbsp;<font style="color: #333333; font-family: simsun; font-size: 12px;">(带<font class="j_green">* </font> 为必填)</font></div>
            <div class="">

                <form id="form1" action="<?php echo U('Person/modifyinfo');?>" method="post" enctype="multipart/form-data">
                    <table style="padding: 20px 0;" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody><tr>
                            <td align="right" width="15%">当前头像：</td>
                            <td colspan="2" class="j_tdfr" style="position: relative; vertical-align: bottom;">
                                <div id="imgdiv" style="padding: 3px; border: 1px solid #eaeae8; overflow: hidden; display: block; width: 96px; float: left">
                                    <?php if($data["photo"] == ''): ?><img src="/xiangmu/TaoCiWang/Public/Home/images/noPerson.jpg" height="90" width="90" class="oImg">
				                    <?php else: ?>
				                    	<img src="/xiangmu/TaoCiWang<?php echo ($data["photo"]); ?>" height="90" width="90" class="oImg"><?php endif; ?>
                                </div>
                                <div class="j_bdsc">
                                	<input name='photo' type="file" id='pic'>
                                    <!-- <input name='photo' id="pic" value="更换图片" style="cursor: pointer; text-align: center; height: 25px; line-height: 25px; color: #fff; padding: 1px 10px; border: none;" type="file"> -->
                                </div>

                                <div style="width: 300px; float: left; margin-top: 81px; margin-left: 47px;">&nbsp;&nbsp; 建议图片尺寸200px*200px,图片格式：jpg/gif/png</div>

                            </td>
                        </tr>
                       
                        <tr>
                            <td align="right" height="45"><font class="j_green">* </font>用 户 名：</td>
                            <td colspan="2" class="j_tdfr">
                                <input class="j_inptext" id="UserName" name="username" value="<?php echo ($data["username"]); ?>" type="text">
                            </td>
                        </tr>
                        <tr>
                            <td align="right" height="45">性&nbsp;&nbsp;&nbsp;&nbsp;别：</td>
                            <td colspan="2" class="j_tdfr">
                                <label for="J_gender1" class="except">
                                    <input id="Sex" name="sex" value="1" type="radio" <?php echo ($data['sex']=='1'?"checked":""); ?>>男</label>
                                <label for="J_gender2" class="except">
                                    <input id="Sex" name="sex" value="2" type="radio" <?php echo ($data['sex']=='2'?"checked":""); ?>>女</label></td>
                        </tr>

                        <tr>
                            <td align="right" height="45"><font class="j_green">*</font>手&nbsp;&nbsp;&nbsp;&nbsp;机：</td>
                            <td class="j_tdfr" width="58%">
                                <input class="j_inptext" id="Tel" name="phone" value="<?php echo ($data["phone"]); ?>" type="text">
                            </td>
                            <td width="27%">&nbsp;</td>
                        </tr>

                        <tr>
                            <td style="border-bottom: 1px solid #e9e9e9; padding-bottom: 20px; vertical-align: top;" align="right" height="45"><font class="j_green">*</font>居住地址：</td>
                            <td class="j_tdfr" colspan="2" style="border-bottom: 1px solid #e9e9e9; padding-bottom: 20px;"><span><?php echo ($adress["province"]); echo ($adress["city"]); echo ($adress["county"]); echo ($adress["more"]); ?></span><a href="<?php echo U('Person/modifyads');?>" style="margin-left:20px">修改</a></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="j_tdbc" align="center" height="55" valign="middle">
                            	<input type="submit" value='保存' style="width: 60px;height: 30px;background: #BA3378;border:0;color:#FFF" class="save">
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
	/////////////////////////////////////// 上传图片显示功能部分	
	$("#pic").change(function(){
		var objUrl = getObjectURL(this.files[0]) ;
		if (objUrl) {
			$(".oImg").attr("src", objUrl).css("display","block");
			// img图片的Id
		}
	}) ;


// 将flie的url 转换为可以 负值的src 地址;
	function getObjectURL(file) {
		var url = null ; 
		if (window.createObjectURL!=undefined) { // basic
			url = window.createObjectURL(file) ;
		} else if (window.URL!=undefined) { // mozilla(firefox)
			url = window.URL.createObjectURL(file) ;
		} else if (window.webkitURL!=undefined) { // webkit or chrome
			url = window.webkitURL.createObjectURL(file) ;
		}
		return url ;
	}

</script>


	<!-- 引入尾部 -->
	<?php echo W('Public/footer');?>;
</body>
</html>