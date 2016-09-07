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
	

<!-- 添加编辑对话框 -->
<!-- 新增收货地址 -->
<div class="l_gwc1">
    <div class="l_gwcr">
        <table class="l_hdxx1" border="0" width="974">
            <tbody>
	            <tr>
	                <td width="32%">1、我的购物车</td>
	                <td style="color: #fff;" width="33%">2、填写并核对订单信息</td>
	                <td width="35%">3、订单详情</td>
	            </tr>
        	</tbody>
        </table>
    </div>
</div>

<div class="y_order_infor">
    <!--收件人信息-->
    <div class="y_order_infor_tit">填写并核对订单信息</div>
    <div class="y_order_infor_part1">
        <div id="addressDiv" class="dzhij">
            <?php if(!empty($adressData)): ?><div id='info'>
                    <div class="y_titlemas">
                        收货人信息
                    </div>
                    <?php if(is_array($adressData)): $i = 0; $__LIST__ = $adressData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$avo): $mod = ($i % 2 );++$i;?><div class="y_dza">
                            <?php if($avo['status'] == 1): ?><input name="status" checked="checked" class="rowAddress" type="radio" value='<?php echo ($avo["id"]); ?>'>
                            <?php else: ?>
                                <input name="status" class="rowAddress" type="radio" value='<?php echo ($avo["id"]); ?>'><?php endif; ?>
                            <font class="fhei">
                                姓名：<?php echo ($avo["reciveName"]); ?> &nbsp;&nbsp;&nbsp;&nbsp;
                                电话: <?php echo ($avo["recivePhone"]); ?> &nbsp;&nbsp;&nbsp;&nbsp;
                                收货点：<?php echo ($avo["province"]); echo ($avo["city"]); echo ($avo["county"]); echo ($avo["more"]); ?>
                            </font>
                            <a href="<?php echo U('Person/modifyads');?>" data="<?php echo ($avo["id"]); ?>" class="modify">修改</a>
                            <a href="javascript:void(0)" data="<?php echo ($avo["id"]); ?>" class="delete">删除</a>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div><?php endif; ?>
            <div class="y_dza2" id="addressAfter" style="float: left;">
                <a href="javascript:void(0)" id='adress'><img src="/xiangmu/TaoCiWang/Public/home/images/jia.gif">添加新收货人地址</a>
            </div>
        </div>
    </div>

    <div class="y_order_infor_part1">
        <div class="dzhij">
            <div class="y_titlemas" style="float: left">商品信息</div>
            <div class="y_dza2" id="addressAfter2" style="float: right; height: 35px; line-height: 35px; padding-top: 10px; padding-left: 5px;">
                <a href="javascript:;" style="color: #196193;" id='goback'>返回修改购物车</a>
            </div>

            <div style="font-size: 12px; border-top: 1px solid #e6e6e6; margin-top: 20px;">

	<!--表格模板-->
<table id="temTable" style="display: none;">
    <tbody><tr>
        <td class="l_tdk">
            <input name="Identifier" value="0" type="hidden">
            <!--保存Identifier-->
            <label name="rowNumber" for="rowCkbox_id" style="cursor: pointer;"></label>
        </td>
        <td class="l_tdk">
            <a href="">
                <img src="" height="80" width="80">
            </a>
        </td>
        <td class="l_tdk">
            <p class="l_aa"><a href="" name="GoodsName">GoodsName</a></p>
            <p class="l_aaa"><a href="" name="GoodsInfo">商品信息</a></p>
        </td>
        <td class="l_tdk"><span class="l_lysw1" name="OldPrice">￥OldPrice</span>
            <br>
            ￥<span name="Price">Price</span></td>
        <td class="l_tdk">
            <div class="l_jj">
                <ul>
                    <li style="cursor: pointer; width: 24px;" name="dec">- </li>
                    <li style="width: 50px;">
                        <input style="width: 46px; height: 22px; border: none; text-align: center;" name="Quantity" type="text"></li>
                    <li style="border-right: 0; cursor: pointer; width: 24px;" name="add">+ </li>
                </ul>
            </div>
        </td>
        <td class="l_tdk" width="10%"><span name="SkuQuantity">库存</span>件</td>
        <td class="l_lysw" width="10%"><span name="RowSum">￥(m.Price * m.Quantity) </span></td>
    </tr>
</tbody></table>

<!--表格开始-->
<div class="l_lgww">
    <table id="listTable" style="margin-top: 0px; font-size: 14px;" border="0" cellpadding="0" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td style="background: #f3f3f3;" height="30" width="38">编号</td>
                <td style="background: #f3f3f3;" height="30" width="10%">
                    <label width="70" for="ckboxAll1" style="cursor: pointer;">商品图片</label></td>
                <td style="background: #f3f3f3;" height="30" width="25%">商品信息</td>
                <td style="background: #f3f3f3;" height="30" width="15%">单价（元）</td>
                <td style="background: #f3f3f3;" height="30" width="15%">数量</td>
                <td style="background: #f3f3f3;" height="30" width="10%">金额（元）</td>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="hidden" value="<?php echo ($vo["id"]); ?>" class="gid">
	        <tr class='goodsinfo'>
		        <td class="l_tdk">
		            <!--保存Identifier-->
		            <label name="rowNumber" class="rowNumber" for="rowCkbox_id" style="cursor: pointer;"></label>
		        </td>
		        <td class="l_tdk">
		            <a href="<?php echo U('Detail/detail');?>?id=<?php echo ($vo["id"]); ?>">
		                <img src="/xiangmu/TaoCiWang<?php echo ($vo["photo"]); ?>" height="80" width="80">
		            </a>
		        </td>
		        <td class="l_tdk" >
		            <p class="l_aa"><a href="" name="GoodsName" style="text-align: center;display: block;"><?php echo ($vo["name"]); ?></a></p>
		            <p class="l_aaa"><a href="" name="GoodsInfo"  style="text-align: center;display: block;">描述：<?php echo ($vo["desc"]); ?></a></p>
		        </td>
		        <td class="l_tdk"><span class="l_lysw1" name="OldPrice">￥<?php echo ($vo["price"]); ?></span>
		            <br>
		            ￥<span name="Price"><?php echo ($vo["price"]); ?></span></td>
		        <td class="l_tdk"><?php echo ($vo["number"]); ?></td>
		        <td class="l_lysw" width="10%"><span name="RowSum">￥<span class="total"><?php echo ($vo["total"]); ?></span></span></td>
		    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	    </tbody>
    </table>
</div>

    <!--150819留言板块新家内容开始-->
    <div style="width: 100%; margin: 0 auto; background: #f9f9f9; padding: 20px 0; clear: both; overflow: hidden;">
        <div style="width: 500px; float: left; margin-left: 20px">
            <font color="#b63576">给卖家留言：</font>
            <input id="message" style="width: 400px; height: 30px; border: 1px solid #dcdcdc; text-indent: 5px;" type="text" name="message">
        </div>
        <div style="width: 500px; float: right;">
            <font color="#b63576">优惠券：</font>

            <select id="selCoupon" onchange="_ucShopCar.selCouponChange()" style="width: 120px; height: 30px; border: 1px solid #dcdcdc; font-family:microsoft yahei; font-size:12px;">
                <option selected="selected" value="0">请选择</option>
                <option value="1">优惠券</option>
                <option value="2">兑换码</option>
            </select>

            <select id="selCouponItems" onchange="_ucShopCar.selCouponItemsChange()" style="width: 120px; height: 30px; border: 1px solid #dcdcdc; display: none; font-family:microsoft yahei; font-size:12px;">
                <option selected="selected" value="0">-请选择-</option>
                <!--从后台读取已经领取的优惠券 开始-->
                
                <!--从后台读取已经领取的优惠券 结束-->
            </select>

            <span id="spanRedeemCode" style="display: none;ont-family: microsoft yahei; font-size:12px;">
                <input id="RedeemCode" placeholder="输入优惠券兑换码" style="width: 170px; height: 30px; border: 1px solid #dcdcdc; text-indent: 5px;" type="text">
                <input onclick="_ucShopCar.RedeemCodeClick()" value="确定" style="cursor: pointer; width: 80px; height: 32px; text-align: center; line-height: 32px; border: none; background: #8D0049; color: #fff;" type="button">
            </span>
        </div>
    </div>
    <!--150819留言板块新家内容结束-->

<div class="l_jsp">
    <div class="l_jspl">
        <div id="FeeNote" class="l_jspll" style="width: 340px; color: gray; font-size: 16px;">满199元包邮，普通邮件10元/件(套)</div>
        <div class="l_jsplr" style="text-align: right; padding-right: 10px;">
            已选商品<font class="l_sz" id="selectRowCount"></font>件
            &nbsp;&nbsp;&nbsp; 
            合计:商品<font id="CashSum" class="l_sz">￥<span id='total'></span></font>
            +运费<font class="l_sz" id="FeeSum">￥<span id="yunfei">10.00</span></font>

            <label id="sumRedeemCode" style="display: none">
                -优惠<font class="l_sz" name="cash">￥0.00</font>
            </label>
            =<span id="TotalCash">￥<span class="last"></span></span>
        </div>
    </div>
        <div class="l_jspr" style="cursor: pointer;" id="submit">提交</div>
		</div>

        </div>
        </div>
    </div>
</div>

<script>
	//返回购物车修改
	$('#goback').click(function(){
		history.go(-1);
	})

    //添加新地址
	$('#adress').click(function(){
        var num=0;
        $('.y_dza').each(function(){
            num++;
        })
        if(num>=5){
            layer.open({
                type: 1,
                title:'淘瓷网',
                time:3000,
                area: ['300px', '150px'],
                shadeClose: true, //点击遮罩关闭
                content: '<div style="padding:20px;text-align:center;font-size:13px"><h3>最多添加5条地址</h3></div>'
            });
        }else{
            layer.open({
              type: 2,
              title: '陶瓷网',
              shadeClose: true,
              shade: 0.3,
              area: ['800px', '550px'],
              content: '<?php echo U("Adress/adress");?>' //iframe的url
            });
            loaction.reload();
        }
	})

    //显示收货地址
    function info(){
        $.ajax({
            type:'POST',
            url:"<?php echo U('CheckInfo/adressinfo');?>",
            success:function(msg){
                console.log(unicode(msg));
            }
        })
    }
    info();

    //编号显示
    var floor=0;
    var zongji=0;
    $('.goodsinfo').each(function(eq){
        floor++;
        $(this).children().find('.rowNumber').html(eq+1);
    })
    $('#selectRowCount').html(floor);

    //显示应付总的钱
    var total=0;
    $('.total').each(function(){
        total+=Number($(this).html());
    })
    $('#total').html(total);
    //加上运费
    if(total>=199){
        $('#yunfei').html(0);
        zongji=total;
        $('.last').html(total);
    }else{
        var yunfei=Number($('#yunfei').html());
        zongji=total+yunfei;
        $('.last').html(zongji);
    }

    //提交订单
    $('#submit').click(function(){
        //商品ID
        var gid='';
        var boolern=false;
        $('.gid').each(function(){
            gid+=$(this).val()+'&';
        })

        //选中地址ID
        var aid=$('.rowAddress').val();
        if(typeof(aid) == "undefined"){
            boolern=false;
            layer.open({
                type: 1,
                title:'淘瓷网',
                time:3000,
                area: ['300px', '150px'],
                shadeClose: true, //点击遮罩关闭
                content: '<div style="padding:20px;text-align:center;font-size:13px"><h3>请填写地址</h3></div>'
            });
        }else{
            $('.rowAddress').each(function(){
                boolern1=$(this).is(':checked');
                 if(boolern1){
                    aid = $(this).val();
                    boolern=true;

                 }
            })
            if(boolern==false){
                layer.open({
                    type: 1,
                    title:'淘瓷网',
                    time:3000,
                    area: ['300px', '150px'],
                    shadeClose: true, //点击遮罩关闭
                    content: '<div style="padding:20px;text-align:center;font-size:13px"><h3>请选择地址</h3></div>'
                });
            }
        }
        //运费
        var luggage=Number($('#yunfei').html());
        //商品件数
        var number=floor;
        //商品总价
        var total=zongji;
        //客户留言
        var message=$('#message').val();
        //发送数据
        if(boolern){
            $.ajax({
                type:'POST',
                url:"<?php echo U('Order/insert');?>",
                data:{"gid":gid,"aid":aid,"number":number,"total":total,"message":message,"luggage":luggage},
                success:function(msg){
                    if(msg=='ok'){
                       window.location.href="<?php echo U('Order/order');?>";
                    }else{
                        layer.open({
                            type: 1,
                            title:'淘瓷网',
                            time:3000,
                            area: ['300px', '150px'],
                            shadeClose: true, //点击遮罩关闭
                            content: '<div style="padding:20px;text-align:center;font-size:13px">提交失败</div>'
                        });
                    }
                }
            })
        }
    })

    //删除地址
    $('.delete').click(function(){
        var bool=$(this).parent().find('.rowAddress').is(':checked');
        if(bool){
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
    function mod(id){

    }
</script>


	<!-- 引入尾部 -->
	<?php echo W('Public/footer');?>;
</body>
</html>