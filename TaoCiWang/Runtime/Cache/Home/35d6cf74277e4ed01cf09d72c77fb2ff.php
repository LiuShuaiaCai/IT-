<?php if (!defined('THINK_PATH')) exit();?><!--顶部小导航-->
<div class="l_top"> 
<div class="l_top_z">
<?php if($username == ''): ?><div id="LoginInfo" class="l_top_zl">
        <span>您好，欢迎来到淘瓷网！</span>
        <a href="<?php echo U('Login/login');?>">[登录]</a> <a href="<?php echo U('Registr/registr');?>">[注册]</a>    
    </div>
<?php else: ?>
    <div id="LoginInfo" class="l_top_zl">
        <span>您好<b style='color: #ba3378;'> <?php echo ($username); ?> </b>,欢迎来到陶瓷网！ </span>
        <a href='javascript:;' class="exit">[退出]</a> <a href='<?php echo U("Person/baseinfo");?>'>[个人中心]</a>
    </div><?php endif; ?>

<div class="l_top_zr"> 

<div class="t_hear_right">
    
<span style="float: left;"><a href="" target="_blank">公司新闻</a>|
    <a href="" target="_blank">品牌故事</a>|
    <a href="" target="_blank">陶瓷知识</a>
    <a href="/xiangmu/TaoCiWang/Admin/Index/index" target="_blank"><font style="color:#ba3378;">企业管理后台</font></a>
</span>
    <!-- 微博加关注
<span class="t_wb">
    
    <wb:follow-button uid="3628122995" type="red_1" width="67" height="24" ></wb:follow-button>
</span>
        -->
<span class="t_wb" style="float:right;">
<a href="" style=" width:71px; float:left; line-height:31px;">
<img border="0" src="/xiangmu/TaoCiWang/Public/Home/images/pa" alt="点击这里给我发消息"></a>
</span>
    

<span class="t_wb z_weixin2">
    <span class="t_wx trigger2"><img src="/xiangmu/TaoCiWang/Public/Home/images/wx.jpg"></span>
<div class="z_ewm2" style="opacity: 0;"> 扫描二维码<br> 关注淘瓷网官方微信<div class="z_jt"></div></div>
</span>

</div>

</div>
</div>
</div>

        <!--LOGO及搜索-->
<div class="l_dahs">
<div class="l_logo fl"><a href=""><img src="/xiangmu/TaoCiWang/Public/Home/images/logoh.png"></a></div>
    <div class="l_serch fl">
        <div class="l_ssd">
        <form action="<?php echo U('GoodsList/goodslist');?>" method='get'>
            <span class="l_srk">
            <input id="masterSearText" type="text" class="l_serch_pt" name='name' placeholder="请输入关键字">
            </span>
            <span class="l_button">
                <button type="submit" style="cursor:pointer;"></button>
            </span></div>
        </form>
<div class="l_gjc"><span class="l_kb">
热门搜索：<a href="">餐具</a>  
    <a href="">茶具/咖啡具</a>  
    <a href="">精选单品</a>  
    <a href="">艺术瓷/礼品瓷</a>
</span><span class="l_phone">  咨询电话：18838141512   </span></div>  </div>
    <script type="text/javascript">
        function ucGotoShopCarClick()
        {
            window.location.href = "/Home/ShopCarList?catch="+(new Date().valueOf()) ; //防止缓存
        }
    </script>
<div class="l_gwcd fl">
    <div class="l_gwcl" style="cursor:pointer"></div>
    <br>
</div>

    <br>
</div>
<!--导航代码-->
<div class="l_menu">
<ul>
<li style="width:164px; margin-left:-2px; padding:0 30px; color:#fff; font-size:16px; "><a href="<?php echo U('GoodsList/goodslist');?>">全部分类</a></li>
<li class="l_dhbjs"><a href="<?php echo U('Index/index');?>">首页</a></li>
<li class=""><a href="<?php echo U('Newgoods/newgoods');?>">新品首发</a></li>
<li class=""><a href="<?php echo U('Special/special');?>"> <div class="l_hot"> <img src="/xiangmu/TaoCiWang/Public/Home/images/hot.png" width="23" height="14"></div>特价商品</a></li>
<li class=""><a href="<?php echo U('Hot/hot');?>"> <div class="l_hot"> <img src="/xiangmu/TaoCiWang/Public/Home/images/hot1.png" width="23" height="14"></div>热卖商品</a></li>
<li class=""><a href="<?php echo U('Promotion/promotion');?>">促销活动</a></li>
</ul>
</div>

<script>
    $('.exit').click(function(){
        $.ajax({
            type:"POST",
            data:'data=1',
            url:"<?php echo U(PublicWidget/header);?>",
            success:function(msg){
                location.reload();
            }
        })
    })

    //购物车
    $('.l_gwcl').click(function(){
        $.ajax({
            url:"<?php echo U('Index/shop');?>",
            success:function(msg){
                if(msg=='ok'){
                    window.location.href="<?php echo U('Shop/shop');?>";
                }else{
                    window.location.href="<?php echo U('Login/login');?>";
                }
            }
        })
    })
</script>