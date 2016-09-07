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
            <div class="j_personal_gytl">修改密码&nbsp;</div>

            <input type="text" style="display:none;" /> <!--为了隐藏360自动输入用-->
            <input type="password" style="display:none;" /> <!--为了隐藏360自动输入用-->

            <div class="j_personal_dd">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding: 20px 0;">
                    <tr>
                        <td height="85" colspan="3" align="left" style="line-height: 30px; padding-left: 150px;">提示：<br>
                            为保障您的密码安全，请尽量以字母（区分大小写）、数字组合的密码，一旦发生密码被盗情况，请您及时与我们联系！</td>
                    </tr>
                    <tr>
                        <td width="29%" height="45" align="right">现用密码：</td>
                        <td colspan="2" class="j_tdfr">
                            <input id="OldPwd" type="password" class="j_inptext" required /></td>
                    </tr>

                    <tr>
                        <td align="right" height="45">修改密码：</td>
                        <td width="44%" class="j_tdfr">
                            <input id="NewPwd" type="password" class="j_inptext" /><span>密码长度6~32位</span></td>
                        <td width="27%">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="right" height="45">确认密码：</td>
                        <td width="44%" class="j_tdfr">
                            <input id="NewPwd2" type="password" class="j_inptext" /><span></span></td>
                        <td width="27%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="j_tdbc" align="center" valign="middle" height="55"><a href="javascript:void(0);" id="submit">保存</a></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
<script>
    var bool=false;
    $('#OldPwd').blur(function(){
        var value=$(this).val();
        if(value==''){
            layer.open({
                type: 1,
                title:'淘瓷网',
                time:3000,
                area: ['300px', '150px'],
                shadeClose: true, //点击遮罩关闭
                content: '<div style="padding:20px;text-align:center;font-size:13px"><h3>密码不能为空</h3></div>'
            });
            bool=false;
        }else{
            $.ajax({
                type:"POST",
                url:"<?php echo U('Person/check');?>",
                data:"password="+value,
                success:function(msg){
                    if(msg=='no'){
                        layer.open({
                            type: 1,
                            title:'淘瓷网',
                            time:3000,
                            area: ['300px', '150px'],
                            shadeClose: true, //点击遮罩关闭
                            content: '<div style="padding:20px;text-align:center;font-size:13px"><h3>密码不正确</h3></div>'
                        });
                    }
                }
            })
            bool=false
        }
    })

    $('#NewPwd').blur(function(){
        var password=$(this).val().replace(/(^\s*)|(\s*$)/g,'');
        var preg='/^[a-z0-9]{6,32}$/';
        // var res=preg.test(password);
        var length=password.length;
        if(length==0){
            $(this).next().html('密码不能为空').css('color','red');
            $(this).css('border','1px solid red');
            bool=false;
        }else if(length>=6 && length<=32){
            $(this).next().html('正确').css('color','green');
            $(this).css('border','1px solid green');
            $('#rePassWord').removeAttr("readonly");
        }else{
            $(this).next().html('密码长度6~32位').css('color','red');
            $(this).css('border','1px solid red');
            bool=false;
        }
    })
    $('#NewPwd2').blur(function(){
            var repass=$(this).val();
            var pass=$('#NewPwd').val();
            if(repass==pass){
                $(this).next().html('密码正确').css('color','green');
                $(this).css('border','1px solid green');
                bool=true;
            }else{
                $(this).next().html('两次密码不一致').css('color','red');
                $(this).css('border','1px solid red');
                bool=false;
            }
    })
    

    $('#submit').click(function(){
        if(bool==true){
            var pwd=$('#NewPwd').val();
            $.ajax({
                type:"POST",
                url:"<?php echo U('Person/update');?>",
                data:"password="+pwd,
                success:function(msg){
                    if(msg=='ok'){
                        layer.open({
                            type: 1,
                            title:'淘瓷网',
                            time:3000,
                            area: ['300px', '150px'],
                            shadeClose: true, //点击遮罩关闭
                            content: '<div style="padding:20px;text-align:center;font-size:13px"><h3>密码修改完成</h3></div>'
                        });
                    }else{
                        layer.open({
                            type: 1,
                            title:'淘瓷网',
                            time:3000,
                            area: ['300px', '150px'],
                            shadeClose: true, //点击遮罩关闭
                            content: '<div style="padding:20px;text-align:center;font-size:13px"><h3>密码修改失败</h3></div>'
                        });
                    }
                }
            })
        }
    })
</script>

	<!-- 引入尾部 -->
	<?php echo W('Public/footer');?>;
</body>
</html>