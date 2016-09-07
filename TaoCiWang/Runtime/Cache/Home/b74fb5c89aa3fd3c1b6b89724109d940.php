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
	
    <!--商品详情页面-->
    <div class="l_bt">
        您当前的位置： <a href="<?php echo U('Index/index');?>">首页</a> &gt; <a href="<?php echo U('GoodsList/goodslist');?>?pid=<?php echo ($tdata["id"]); ?>" class=""><?php echo ($tdata["name"]); ?></a> &gt;<font style="color:#ba3378 "><?php echo ($data['name']); ?></font>
    </div>
    <div class="l_spxq">
        <div class="l_xq_z">
        <style type="text/css">
            .ucImgMagnifierBody {
                float: left;
                width: 380px;
                height: 450px;
                position: relative;
                margin: 20px;
            }

                .ucImgMagnifierBody .ucImgLargeDiv {
                    display: none;
                    position: absolute;
                    overflow: hidden;
                    border: 1px solid #ccc;
                    width: 350px;
                    height: 350px;
                    margin: 0px;
                    padding: 0px;
                    z-index: 100000;
                }

                .ucImgMagnifierBody .shadow {
                    position: absolute;
                    display: none;
                    z-index: 2;
                    opacity: 0.4;
                    filter: alpha(opacity = 40); /* IE下使用 */
                    width: 400px;
                    height: 200px;
                    cursor: pointer;
                    left: 200px;
                    top: 400px;
                    display: none;
                    background-color: rgb(170, 228, 101);
                }


            /*****图片放大效果开始****/
            .thumbnails {
                margin-top: 5px;
                height: 70px;
                position:absolute; 
                float:left;   
                top: 385px;
                left:0px;
            }

            .thumbnails_l {
                float: left;
                padding-top: 8px;
                display: none;
            }

            .thumbnails_r {
                float: right;
                padding-top: 8px;
                display: none;
            }

            .thumbnails_c {
                float: left;
            }

                .thumbnails_c li {
                    float: left;
                    width: 61px;
                    height: 58px;
                }

                    .thumbnails_c li a {
                        display: block;
                        width: 52px;
                        height: 52px;
                        border: 4px solid white !important;
                    }

                        .thumbnails_c li a:hover {
                            border: 4px solid #D6D5D5 !important;
                        }

                        .thumbnails_c li a img {
                            display: block;
                            border: 1px solid #D6D5D5;
                        }

            .curr_thumbnails_c a {
                display: block;
                width: 52px;
                height: 52px;
                border: 4px solid #f0efef !important;
            }

            .curr_thumbnails_c li a img {
                display: block;
                border: 1px solid #D6D5D5;
            }

            .l_xxk {
                width: 1198px;
                clear: both;
                overflow: hidden;
                margin-top: 15px;
                border: 1px solid #e6e6e6;
            }
            .j_zt_right_box { width: 100%; margin: 0 auto; clear: both; }
        </style>
    <div class="ucImgMagnifierBody" id="ucImgMagnifierBody">
        <div name="ucImgSamllDiv" style="width: 380px; height: 380px; display: block; float: left; margin-bottom: 10px; border: 1px solid #e6e6e6; text-align: center;">
            <img style="position: relative; width: 100%; height:100%; top: 0px; left: 0px;" src="/xiangmu/TaoCiWang<?php echo ($data["photo"]); ?>">
        </div>
        <div name="ucImgShadow" class="shadow" style="display: none; width: 166px; height: 166px; left: 198px; top: 214px;"></div>
        <!--阴影-->
        <div name="ucImgMsg" class="shadow"></div>
        <div name="ucImgLargeDiv" class="ucImgLargeDiv" style="left: 400px; top: 15px; display: none;">
            <img name="LageImage" style="position: absolute; left: 0px; top: 0px;" src="/xiangmu/TaoCiWang/Public/Home/images/635757658756034110_849.jpg">
        </div>
        <!--缩略图画廊-->
        <div class="thumbnails" name="gallery">
            <table style="padding: 0; margin: 0; width: 395px; position: absolute !important;">
                <tbody><tr>
                    <td>
                        <!--左箭头-->
                        <div class="thumbnails_l" name="ucImgThumbLeft" style="display: none;">
                            <a href="javascript:;;" onclick="_ucImgMagnifier.ThumbLiToLeft()">
                                <img src="/xiangmu/TaoCiWang/Public/Home/images/detail_2012_img8.jpg"></a>
                        </div>
                    </td>
                    <td>
                        <!--缩略图列表-->
                        <ul name="ucImgThumbUl" class="thumbnails_c">
                            <li style="display:" index="1">
                                    <!--先隐藏 用Js显示-->
                                    <a href="javascript:void(0)" onclick="_ucImgMagnifier.GalleryClick(this)">
                                        <img src="/xiangmu/TaoCiWang<?php echo ($data["photo"]); ?>" style="width:50px; height:50px;">
                                    </a>
                            </li>                   
                        </ul>
                    </td>
                    <td>
                        <!--右箭头-->
                        <div class="thumbnails_r" name="ucImgThumbRight" style="display: none;">
                            <a href="javascript:;;" onclick="_ucImgMagnifier.ThumbLiToRight()">
                                <img src="/xiangmu/TaoCiWang/Public/Home/images/detail_2012_img9.jpg"></a>
                        </div>
                    </td>
                </tr>

            </tbody>
           </table>
        </div>
        <!-- 收藏 -->
       <!--  
        <div style="padding: 10px; clear: both; margin: 0 auto; top: 444px;position: absolute; left:0px;">
            <div style="width: 75px; float: left;">
                <img src="/xiangmu/TaoCiWang/Public/Home/images/scc.jpg" onclick="_view.CollectGoods(2389)" style="cursor: pointer;">
            </div>
        </div>
 -->
    </div>
    <div class="l_sp_m">

         <div class="j_zt_miaoshu">
            <div class="j_zt_miaoshu_titl"><?php echo ($data["name"]); ?>
                <p><?php echo ($data["desc"]); ?></p>
            </div>

            <div class="l_jgxx">
                <span>价格 ：</span>  
                    <span style="color: #ba3378; font-size: 20px; font-weight: bold;"><span id="Price">￥<span class="price"><?php echo ($data["price"]); ?></span>元</span>
                </span> 
    			<br>
                原&nbsp;&nbsp;&nbsp;价 <span style="color: #999; text-decoration: line-through;">&nbsp;<?php echo ($data["price"]); ?> </span>
            </div>

            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="line-height: 37px; margin-left: 10px; padding: 10px 0;">
                <tbody>
                	<tr>
                        <td style="text-align: right; text-align: justify; width: 50px;"><b>运费：</b></td>
                        <td style="text-align: left;"><span>满199.00元包邮，普通邮件10.00元/件(套)</span></td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="line-height: 40px; margin-left: 10px;">
                <tbody>
                    <tr>
                        <td width="9%" style="text-align: right; text-align: justify;"><b id="SkuLable">分类：</b></td>
                        <td id="SkuLst" style="text-align: left">
                            <!---150811新加代码开始-->
                            <style type="text/css">
                                .l_tpwt {
                                    width: 100%;
                                    margin: 0 auto;
                                    clear: none;
                                    overflow: hidden;
                                }

                                .l_tpwt ul li {
                                    width: 50px;
                                    height: 50px;
                                    float: left;
                                    border: 2px solid #c7c6c6;
                                    margin-right: 4px;
                                    margin-left: 3px;
                                    white-space: nowrap;
                                    margin-top: 10px;
                                    position: relative;
                                }

                                .l_tpwt1 {
                                    position: absolute;
                                    bottom: 0;
                                    right: 0;
                                    width: 10px;
                                    height: 10px;
                                    overflow: hidden;
                                    text-indent: -99em;
                                    display: block;
                                    background-repeat: no-repeat;
                                    background: url(/Images/xdj.png) no-repeat;
                                }
                            </style>
                            <div class="l_tpwt">
                                <ul> 
                                    <li skuid="4024" style="border: 2px solid rgb(190, 1, 6);"><a href="javascript:void(0)" onclick="_view.SkuClick(this,{&quot;Identifier&quot;:4024,&quot;GoodsId&quot;:2389,&quot;SkuName&quot;:null,&quot;Price&quot;:1080.00,&quot;PromotionPrice&quot;:0.00,&quot;Quantity&quot;:0,&quot;Description&quot;:&quot;描述&quot;,&quot;TheOrder&quot;:0,&quot;Image&quot;:null,&quot;Thumbnail&quot;:null,&quot;Ids&quot;:null,&quot;inPromotion&quot;:2})" style="z-index: -111;"> 
                                        <img src="/xiangmu/TaoCiWang<?php echo ($data["photo"]); ?>" width="50" height="50"></a>
                                        <div name="xdjPng" class="l_tpwt1"> </div>
                                    </li>
                                </ul>
                            </div>
                            <!---150811新加代码结束-->
                        </td>
                    </tr>
                    <tr>
                        <td width="9%" style="text-align: right; text-align: justify;"><b>数量：</b></td>
                        <td width="91%" style="text-align: left;">

                            <div style="width: 200px; float: left">
                                <dl class="j_zt_clearfix">
                                    <dd>
                                        <span><input type="text" class="tb-text" value="1" title="请输入购买量" id="BuyCount"></span>
                                        <span class="mui-amount-btn">
        	                                <span class="mui-amount-increase"></span>
        	                                <span class="mui-amount-decrease"></span>
                                        </span>
                                        <span class="mui-amount-unit">件</span>
                                            <span style="display: inline;">&nbsp;&nbsp;库存<span id="SkuCount"><?php echo ($data["num"]); ?></span>件</span>
                                    </dd>
                                </dl>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="l_jgxx">
                <span>应付金额 ：</span>  
                <span style="color: #ba3378; font-size: 20px; font-weight: bold;">
                <span id="Price">￥<span id='total'><?php echo ($data["price"]); ?></span>元</span>
                </span> 
            </div>

            <div class="l_ann">
            <!--立即购买-->
            <a href="javascript:void(0)" onclick="_view.Pay()" data='<?php echo ($data["id"]); ?>' id='copy'>
                <img src="/xiangmu/TaoCiWang/Public/Home/images/an1.jpg" width="192" height="43">
            </a>
            <!--加入购物车-->
            <a href="javascript:void(0)" data='<?php echo ($data["id"]); ?>' id='shop'>
                <img src="/xiangmu/TaoCiWang/Public/Home/images/an2.jpg" width="192" height="43"></a>
            </div>
        </div>
                
        <div class="j_zt_see fr">
            <div class="j_zt_see_see "> <s></s><span>看了又看</span> </div>
            <div class="j_zt_see_con">
                <ul>
                <?php if(is_array($tui)): $i = 0; $__LIST__ = $tui;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tvo): $mod = ($i % 2 );++$i;?><li><a href=""> <img src="/xiangmu/TaoCiWang<?php echo ($tvo["photo"]); ?>" width="150" height="150"><p class="j_zt_see_price">￥<?php echo ($tvo["price"]); ?></p></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
     </div>
    </div>
        <!--商品属性2016-1-11 start-->
        <div class="j_canshu">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
            </table>
        </div>
        <!--商品属性2016-1-11 end-->
        <!--详情选项卡-->
        <div class="l_xxk" style="text-align: center;">
            <div class="j_zt_right_box">
                <div class="j_zt_frtitl t_right_box" style="position: static; top: 0px;">
                    <ul>
                        <li name="TabLi" index="1" onclick="_view.TabClick(this)" class="hover">商品详情</li>
                        <li name="TabLi" index="2" onclick="_view.TabClick(this)" class="">商品评论(0)</li>
                        <li name="TabLi" index="3" onclick="_view.TabClick(this)" class="">本月成交量(<font color="#FF0000">0</font>)</li>
                        <li name="TabLi" index="4" onclick="_view.TabClick(this)" class="">总成交量(<font color="#FF0000">0</font>)</li>
                    </ul>
                </div>
                <!--商品详情-->
                <div name="con_TabLi" index="1" style="display: block; text-align: left; padding: 10px; line-height: 25px;">
                    <div class="j_zt_frcon">
                        <div class="j_zt_spcs">
                            <div class="l_nz_xx">

                                <div style="font-size: 14px; float: left; padding-left: 20px; width: 100%; clear: both; padding: 20px auto; text-align: left;">
                                    
                                </div>

                                <table width="97%" border="0" cellpadding="0" cellspacing="0" style="line-height: 35px; font-size: 14px;">
                                        <tbody><tr>
                                                <td width="25%" style="text-align: left; text-indent: 20px;"><b>餐具型号:</b> <?php echo ($tdata["name"]); ?></td>     
                                                <td width="25%" style="text-align: left; text-indent: 20px;"><b>风格:</b> 贵族欧式</td>     
                                                <td width="25%" style="text-align: left; text-indent: 20px;"><b>装饰工艺:</b> 釉上彩</td>     
                                                <td width="25%" style="text-align: left; text-indent: 20px;"><b>适用人数:</b> 6人餐</td>     
                                        </tr>
                                        <tr>
                                                <td width="25%" style="text-align: left; text-indent: 20px;"><b>图案:</b> 几何图案</td>     
                                                <td width="25%" style="text-align: left; text-indent: 20px;"><b>主图来源:</b> 自主实拍图</td>     
                                                <td width="25%" style="text-align: left; text-indent: 20px;"><b>价格:</b>￥<?php echo ($data["price"]); ?></td>     
                                        </tr>


                                </tbody></table>
                            </div>

                            <style type="text/css">
                                .l_spqq {
                                    margin: 0 auto;
                                    clear: both;
                                    text-align: left;
                                }

                                    .l_spqq img {
                                        margin: 0 auto;
                                        display: block;
                                    }
                            </style>

                            <div class="l_spqq">
                                <?php echo ($data["maxpic"]); ?>
                            </div>
                        </div>

                    </div>
                    <div class="j_ztsp_pic">
                    </div>
                </div>
                <!--商品评论-->
                <div class="t_shop_xq" name="con_TabLi" index="2" style="display: none;">
                    <div class="t_ztpj">
                        <div class="t_zdf">
                            <span>整体评价</span><span class="t_fshuz" id="emStarValue">0</span><span class="t_start">
                                <em id="emStar" style="width: 0px;"></em></span>
                        </div>
                        <div class="t_fez">
                            <span class="t_xst"><em id="emStarValue2" style="left: 0px;">0</em></span> <span class="t_ddd">
                                <ul>
                                    <li>非常不满意</li>
                                    <li>不满意</li>
                                    <li>一般</li>
                                    <li>满意</li>
                                    <li>非常满意</li>
                                </ul>
                            </span>
                        </div>
                    </div>
                    <div class="t_pl_hp" id="radioDiv">
                        <span class="t_xx">
                            <input id="raall" name="radio" type="radio" value="0" onchange="_comment.GetDate(0)" checked="checked">
                            <label for="raall">全部</label></span>
                        <span>
                            <input id="ragood" name="radio" type="radio" value="5" onchange="_comment.GetDate(5)">
                            <label for="ragood">好评<font id="fontGood">（0）</font></label></span>
                        <span>
                            <input id="rageneral" name="radio" type="radio" value="3" onchange="_comment.GetDate(3)">
                            <label for="rageneral">中评<font id="fontGeneral">（0）</font></label></span>
                        <span>
                            <input id="rabad" name="radio" type="radio" value="1" onchange="_comment.GetDate(1)">
                            <label for="rabad">差评<font id="fontBad">（0）</font></label></span>
                    </div>
                    <div class="t_zblb">
                        <ul style="" id="CommentLstUl"></ul>
                        <ul id="UL_0"></ul>

                        <div>
                                    


        <link href="/xiangmu/TaoCiWang/Public/Home/images/ucPagination.css" rel="stylesheet">
    </div>
    </div>
   </div>

                <!--表格 模板 -->
                <table id="TempTurnover" style="display: none;">
                    <tbody><tr>
                        <td style="display: none;" name="Identifier"></td>
                        <td class="l_cjx" name="UserName"></td>
                        <td class="l_cjx" name="SkuName"></td>
                        <td class="l_cjx" name="Quantity"></td>
                        <td class="l_cjx"><font color="#FF0000" name="Price"></font></td>
                        <td class="l_cjx" name="CreateTime"></td>
                    </tr>
                </tbody></table>


                <!--月成交量-->
                <div class="t_shop_xq" name="con_TabLi" index="3" style="display: none;">
                    <style type="text/css">
                        .l_cjx {
                            border-bottom: 1px solid #E3E3E3;
                            border-right: 1px solid #E3E3E3;
                        }
                    </style>
                    <table width="200" border="0" cellpadding="0" cellspacing="0" style=" border: 1px solid #ccc; height: 30px;line-height: 30px;  border-bottom: 0px;
  border-right: 0px;">
                        <thead>
                            <tr>
                                <td class="l_cjx"><b>买家</b></td>
                                <td class="l_cjx"><b>分类</b></td>
                                <td class="l_cjx"><b>数量</b></td>
                                <td class="l_cjx"><b>价格</b></td>
                                <td class="l_cjx"><b>成交时间</b></td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <!--总成交量-->
                <div class="t_shop_xq" name="con_TabLi" index="4" style="display: none;">
                    <style type="text/css">
                        .l_cjx {
                            border-bottom: 1px solid #E3E3E3;
                            border-right: 1px solid #E3E3E3;
                        }
                    </style>
                    <table width="200" border="0" cellpadding="0" border-bottom:="" 0px;="" border-right:="" cellspacing="0" style=" border: 1px solid #ccc; height: 30px;line-height: 30px;  border-bottom: 0px;
  border-right: 0px;">
                        <thead>
                            <tr>
                                <td class="l_cjx"><b>买家</b></td>
                                <td class="l_cjx"><b>分类</b></td>
                                <td class="l_cjx"><b>数量</b></td>
                                <td class="l_cjx"><b>价格</b></td>
                                <td class="l_cjx"><b>成交时间</b></td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <script>
        var ku=Number($('#SkuCount').html());
        var price=Number($('.price').html());
        var value=Number($('#BuyCount').val());
        $('#total').html(price*value);
        $('.mui-amount-increase').click(function(){
            var value=Number($('#BuyCount').val());
            $('#BuyCount').val(value+1);
            if(value>=ku){
                alert('库存不足');
               $('#BuyCount').val(ku);
                $('#total').html(price*ku);
            }else{
                $('#total').html(price*(value+1));
            }
        })
        $('.mui-amount-decrease').click(function(){
            var value=Number($('#BuyCount').val());
            var cut=$('#BuyCount').val(value-1);
            if(value<=1){
                $('#BuyCount').val(1);
                $('#total').html(price);
            }else{
                $('#total').html(price*(value-1));
            }
            
        })

        //加入购物车
        $('#shop').click(function(){
            var data=$('#shop').attr('data');
            var number=Number($('#BuyCount').val());
            var total=Number($('#total').html());
            $.ajax({
                type:"POST",
                url:"<?php echo U('Shop/insert');?>",
                data:"gid="+data+"&number="+number+"&total="+total,
                success:function(msg){
                    if(msg=='yes'){
                        layer.open({
                            type: 1,
                            title:'淘瓷网',
                            area: ['300px', '150px'],
                            shadeClose: true, //点击遮罩关闭
                            content: '<div style="padding:20px;text-align:center;font-size:13px">加入购物车成功！确定去购物车结算？</div><div style="text-align:center"><a href="<?php echo U('Shop/shop');?>"><span style="background:#DDD;padding:8px">确定</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=""><span style="background:#DDD;padding:8px">取消</span></a></div>'
                        });
                    }else if(msg=='exist'){
                        layer.open({
                            type: 1,
                            title:'淘瓷网',
                            area: ['300px', '150px'],
                            shadeClose: true, //点击遮罩关闭
                            content: '<div style="padding:20px;text-align:center;font-size:13px">购物车已有此商品，去购物车结算？</div><div style="text-align:center"><a href="<?php echo U('Shop/shop');?>"><span style="background:#DDD;padding:8px">确定</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=""><span style="background:#DDD;padding:8px">取消</span></a></div>'
                        });
                    }else if(msg=='NO_login'){
                        window.location.href="<?php echo U('Login/login');?>";
                    }else{
                        alert('系统错误，请重新添加');
                    }
                }
            })
            
        })
    </script>

	<!-- 引入尾部 -->
	<?php echo W('Public/footer');?>;
</body>
</html>