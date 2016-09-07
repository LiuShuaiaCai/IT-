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
	
	<script src="/xiangmu/TaoCiWang/Public/Home/js/jquery-1.7.1.js"></script>
	<script src="/xiangmu/TaoCiWang/Public/Home/js/Dictionary.js"></script>

<!--关键字模板-->
<div id="keyTemp" style="display: none;">
    <label>
        <span class="fl" style="padding: 0px 6px">&gt;</span>
        <span class="fl" style="border: 1px dotted #c40000; padding: 0px 8px; height: 24px; line-height: 24px; text-align: center; position: relative; padding-right: 20px; margin-top: 10px">
            <font name="keyname"></font>
            <a href="javascript:;" style="width: 7px; height: 7px; background: url(/Images/T186tKFDR_XXaYpYLe-35-30.png) -20px 0px no-repeat; display: block; position: absolute; top: 8px; right: 5px;"></a>
        </span>
    </label>
</div>

<div class="l_main">
    <div class="j_location">
        <span class="fl">您当前的位置&nbsp;&gt;
         <span id="navigator"><a navname="homeIndex" style="color:black" target="_blank" href="<?php echo U('Index/index');?>">首页</a> &gt; <a navname="columnId" style="color:#ba3378 " target="_blank" href="<?php echo U('Newgoods/newgoods');?>">新品首发</a><a navname="TypeId" href=""></a><a navname="PropValueId" href=""></a></span>
            <script type="text/javascript">
                _view.keywordsUrl = '/Home/GoodsList?columnId=NewGoods&amp;NavLastName=columnId';
                _view.TypeUrl = "/Home/GoodsList?columnId=NewGoods&NavLastName=TypeId";
            </script>
        </span>
        <span id="keySpan"></span>
        <form method="get" action="">
            <span class="j_search_loac fl">
                <input id="tbSearch" name="name" type="text" class="j_seainp" placeholder="在当前结果中搜索">
            </span>
            <input style='margin:14px 5px;width:30px' type="submit" class="j_seabtn" value='搜索'>
        </form>
    </div>

    <div class="j_bwidth fl">

        <div class="j_shaixuan">

            <table id="propValueTb" width="100%" border="0" cellpadding="0" cellspacing="0" class="j_sxtable">
                <tbody>
                	<tr id="prop_0">
	                    <td width="12%" height="32" class="j_huibg">所有分类</td>
	                    <td width="88%" class="j_huibg">
	                        <a href="javascript:;" onclick="_view.TypeClick(1)">餐具</a>
	                        <a href="javascript:;" onclick="_view.TypeClick(2)">茶具/咖啡具</a>
	                        <a href="javascript:;" onclick="_view.TypeClick(3)">最新单品</a>
	                        <a href="javascript:;" onclick="_view.TypeClick(4)">艺术瓷/礼品瓷</a>
	                    </td>
                	</tr>
            	</tbody>
            </table>
        </div>

        <div class="j_pro_list">
            <ul>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="height:300px;">
                    <div class="j_list_pic">
                        <a href="<?php echo U('Detail/detail');?>?id=<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["name"]); ?>">
                        <img src="/xiangmu/TaoCiWang<?php echo ($vo["photo"]); ?>" width="209" height="209">
						</a>
                    </div>
                    <div class="j_gyjiage">
                        <span class="j_prodes_list">
                            <a href="javascript:;" target="_blank" title="title=" <?php echo ($vo["name"]); ?>""=""><?php echo ($vo["name"]); ?></a>
                        </span>
                        <font class="j_preoprice_list">
							<font class="j_shee_list">￥<?php echo ($vo["price"]); ?></font>
						</font>

                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div style="clear: both"></div>
        <!--翻页 start-->
        


<link href="/xiangmu/TaoCiWang/Public/Home/css/ucPagination.css" rel="stylesheet">
</div>

	<!-- 推荐产品 -->
	<div class="j_swidth fr">
		<div class="j_swidtn_one">
		    <div class="j_swonetl">推荐产品</div>
		    <div class="j_swonecon">
		        <ul class="j_tjcp">
		            <li>
		                <a href="">
			                <img src="/xiangmu/TaoCiWang/Public/Home/images/635717850053676891_790_small.jpg" width="183" height="183">

			                <span class="j_prodes">花辰月夕56头餐具</span>
			                <span class="j_preoprice">
			                    <font class="j_sheep">￥</font>
			                    <font class="j_price">900.00</font>
			                </span>
		                </a>
		            </li>
		        </ul>
		    </div>
		</div>
	</div>

	<br>
	<div style="display: block; width: 100px; height: 600px;"></div>
	<br>
</div>

	<!-- 引入尾部 -->
	<?php echo W('Public/footer');?>;
</body>
</html>