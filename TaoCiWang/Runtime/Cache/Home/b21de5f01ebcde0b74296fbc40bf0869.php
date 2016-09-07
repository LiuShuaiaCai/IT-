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
	
	<!--中间代码开始-->
	 <div class="l_gwc1"> 
	 <div class="l_gwcr">
	 <table class="l_hdxx" border="0" width="974">
	  <tbody><tr>
	    <td style="color:#fff;" width="32%">1、我的购物车</td>
	    <td width="33%">2、填写并核对订单信息</td>
	    <td width="35%">3、订单详情</td>
	  </tr>
	 </tbody></table>
	 </div>
	 </div>
	 
	 <div class="l_lgw"> 
	 <div class="l_lgwl">我的购物车 </div>
	 </div>



	<!--表格开始-->
	<div class="l_lgww">
	    <table id="listTable" style="margin-top: 0px; font-size: 14px;" border="0" cellpadding="0" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	                    <td style="background: #f3f3f3;" width="5%" height="30">
	                        <input  id="ckboxAll1" style="float: right" class="checkall" type="checkbox" onclick="selectAll(this);">
	                    </td>
	                <td style="background: #f3f3f3;" width="10%" height="30">
	                    <label width="70" for="ckboxAll1" style="cursor: pointer;">商品图片</label></td>
	                <td style="background: #f3f3f3;" width="25%" height="30">商品信息</td>
	                <td style="background: #f3f3f3;" width="15%" height="30">单价（元）</td>
	                <td style="background: #f3f3f3;" width="15%" height="30">数量</td>
	                <td style="background: #f3f3f3;" width="10%" height="30">库存</td>
	                <td style="background: #f3f3f3;" width="10%" height="30">金额（元）</td>
	                    <td style="background: #f3f3f3;" width="10%" height="30">操作</td>
	            </tr>
	        </thead>
	        <tbody>
	        <script>
	        	$('#ceshi').change(function(){
	        		var value=$('#ceshi').val();
	        		console.log(value);
	        	})
	        </script>
	        	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				        <td class="l_tdk">
				            <!--保存Identifier-->
				                <input id="rowCkbox_505" class="checked" name="rowCkbox" style="float: right" type="checkbox" value='<?php echo ($vo["id"]); ?>'>
				            <!-- <label name="rowNumber" for="rowCkbox_undefined" style="cursor: pointer;">1</label> -->
				        </td>
				        <td class="l_tdk">
				            <a href="<?php echo U('Detail/detail');?>?id=<?php echo ($vo["id"]); ?>">
				                <img src="/xiangmu/TaoCiWang<?php echo ($vo["photo"]); ?>" width="80" height="80">
				            </a>
				        </td>
				        <td class="l_tdk">
				            <p class="l_aa"><a href="" name="GoodsName" style='text-align: center;display: block;'>商品名：<?php echo ($vo["name"]); ?></a></p>
				            <p class="l_aaa"><a href="" name="GoodsInfo" style='text-align: center;display: block;'>介绍：<?php echo ($vo["desc"]); ?></a></p>
				        </td>
				        <td class="l_tdk"><span class="l_lysw1" name="OldPrice">￥<?php echo ($vo["price"]); ?></span>
				            <br>
				            ￥<span name="Price" class='price'><?php echo ($vo["price"]); ?></span></td>
				        <td class="l_tdk">
				            <div class="l_jj">
				                <ul>
				                    <li style="cursor: pointer; width: 24px;" name="dec" class="dec">- </li>
				                    <li style="width: 50px;">
				                        <input value="<?php echo ($vo["number"]); ?>" style="width: 46px; height: 22px; border: none; text-align: center;" class="num" name="Quantity" type="text" readonly>
				                    </li>
				                    <li style="border-right: 0; cursor: pointer; width: 24px;" name="add" class="add">+ </li>
				                </ul>
				            </div>
				        </td>
				        <td class="l_tdk" width="10%"><span name="SkuQuantity" class="kc"><?php echo ($vo["num"]); ?></span>件</td>
				        <td class="l_lysw" width="10%"><span name="RowSum">￥<span class="total"><?php echo ($vo["total"]); ?></span></span></td>
			            <td class="l_tdk" width="18%"><a style="cursor: pointer;" data='<?php echo ($vo["sid"]); ?>' class="delete">删除 </a></td>
				    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
		    </tbody>
		    </table>
		        <!--分页-->
	        <div>


	<div class="l_jsp">
	    <div class="l_jspl">
	            <div class="l_jspll">
	                <input id="ckboxAll2" class="checkall" type="checkbox" onclick="selectAll(this);">
	                <label for="ckboxAll2" style="cursor: pointer;">全选</label>&nbsp;&nbsp; 
	                <a style="cursor:pointer;" id='delete'>删除选择</a>
	            </div>
	        <div id="FeeNote" class="l_jspll" style="width: 340px; color: gray; font-size: 16px;">满199元包邮，普通邮件10元/件(套)</div>
	        <div class="l_jsplr" style="text-align: right; padding-right: 10px;">
	            已选商品<font class="l_sz" id="selectRowCount">0</font>件
	            &nbsp;&nbsp;&nbsp; 
	            合计:商品<font id="CashSum" class="l_sz">￥<span id='total'>0</span></font>
	            +运费<font class="l_sz" id="FeeSum">￥<span>10.00</span></font>

	            <label id="sumRedeemCode" style="display: none">
	                -优惠<font class="l_sz" name="cash">￥0.00</font>
	            </label>
	            =<span id="TotalCash">￥<span>10.00</span></span>
	        </div>
	    </div>
	        <div class="l_jspr" id='balance' style="cursor: pointer;">结算</div>
	</div>


	 

	<div class="l_lgw_a"> 
	 <div class="l_lgwl_a">猜你喜欢的</div>
	 <div class="l_lgwr_a"> </div>
	</div>
	<div class="xp_l">
		<ul> 
			<li> 
			   <a href="" title="雅典神话22头"><img src="" width="200" height="200"></a>
			   <p style="border-bottom:1px dotted #cfccc5"><span class="l_ys1">￥1080.00</span> <span class="l_ys2">￥1080.00</span></p>
			   <p><a href="" title="雅典神话22头">雅典神话22头</a></p>
		  </li>           
		</ul>
	</div>

	<script>
		//删除商品
		$('.delete').click(function(){
			var sid=$(this).attr('data');
			$.ajax({
				type:"POST",
				url:"<?php echo U('Shop/delete');?>",
				data:"id="+sid,
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
		})


		// $.('.price').each(function(){
		// 	var dan=Number($(this).val());
		// 	var shu=Number($(this).parents('.l_tdk').next().find('.num').val());
		// 	var zong=dan*shu;
		// 	alert(zong)
		// 	$(this).parents('.l_tdk').siblings('.l_lysw').find('.total').html(zong);
		// })
		//商品数目的增加、减少
		$('.dec').click(function(){
			var price=Number($(this).parents('.l_tdk').prev().find('.price').html());
			var num=Number($(this).next().find('.num').val());
			var total=price*(num-1);
			var res=$(this).parents('.l_tdk').siblings('.l_lysw').find('.total').html(total);
			var now=$(this).next().find('.num').val(num-1);
			if(num<=1){
				$(this).next().find('.num').val(1);
				$(this).parents('.l_tdk').siblings('.l_lysw').find('.total').html(price);
			}
			totals()
		})

		$('.add').click(function(){
			var price=Number($(this).parents('.l_tdk').prev().find('.price').html());
			var num=Number($(this).prev().find('.num').val());
			var total=price*(num+1);
			var res=$(this).parents('.l_tdk').siblings('.l_lysw').find('.total').html(total);
			var now=$(this).prev().find('.num').val(num+1);
			var kc=Number($(this).parents('.l_tdk').next().find('.kc').html());
			if(num>=kc){
				$(this).prev().find('.num').val(kc);
				alert('库存不足');
			}
			totals()
		})

		//全选
		function selectAll(checkbox) {
                $('input[type=checkbox]').prop('checked', $(checkbox).prop('checked'));
        }

        //选中的商品
        function totals(){
        	zongji=0
	        $('.l_tdk>input[type=checkbox]').each(function(eq){
	        	var bool=$(this).is(':checked');
	        	if(bool)
	        	{
	        		var res=Number($(this).parents('.l_tdk').siblings('.l_lysw').find('.total').html());
	        		zongji=zongji+res;
	        	}
	        });
	        //运费
	        if(zongji>=199){
	        	$('#FeeSum').children().html('0');
	        }
	        //总价（不含运费）
	        $('#total').html(zongji);
	        //运费
	        var yun=Number($('#FeeSum').children().html());
	        //总价（含运费）
	        var total_y=zongji+yun;
	        $('#TotalCash').children().html(total_y);
	        
        }
        
        var arr=new Array();
        function checkeds(){
        	$('input[type=checkbox]').change(function(){
	        	totals();
	        	arr=new Array();
	        	$('.l_tdk>input[type=checkbox]').each(function(){
	        		var bool=$(this).is(':checked');
		        	if(bool)
		        	{
		        		var checked=$(this).val();
		        		arr.push(checked);
		        	}
	        	})
	        	//件数
	      		$('#selectRowCount').html(arr.length);
	        })
        }
        checkeds();
        totals();

        //删除所选
        $("#delete").click(function(){
        	$.ajax({
        		type:'POST',
        		url:"<?php echo U('Shop/dels');?>",
        		data:"arr="+arr,
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
        })

        //结算
        $('#balance').click(function(){
        	if(arr.length==0){
        		layer.open({
                            type: 1,
                            title:'淘瓷网',
                            time:3000,
                            area: ['300px', '150px'],
                            shadeClose: true, //点击遮罩关闭
                            content: '<div style="padding:20px;text-align:center;font-size:13px">请选择商品</div>'
                        });
        	}else{
        		$.ajax({
	        		type:'POST',
	        		async:false,
	        		url:"<?php echo U('CheckInfo/recive');?>",
	        		data:"arr="+arr,
	        		success:function(msg){
	        			window.location.href='<?php echo U("CheckInfo/checkinfo");?>';
	        		}
	        	})
        	}
        })

	</script>

	<!-- 引入尾部 -->
	<?php echo W('Public/footer');?>;
</body>
</html>