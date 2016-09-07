<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>淘瓷网注册</title>
	<link href="/xiangmu/TaoCiWang/Public/Home/css/homestyle.css" rel="stylesheet">
</head>
<body>
	<script src="/xiangmu/TaoCiWang/Public/Home/js/jquery.min.js"></script>
    <script src="/xiangmu/TaoCiWang/Public/layer/layer.js"></script>
    <script src="/xiangmu/TaoCiWang/Public/Home/js/jquery.cookie.js"></script>
<div style="background:#e4e4e4; padding-bottom:10px;">
    
<!--头部代码开始-->
<div class="l_zc1"> 
<div class="l_zcz"> <img src="/xiangmu/TaoCiWang/Public/Home/images/zclogo.png" style="margin-top:10px;"> </div>
</div>
<!--中间代码开始-->
<div class="l_zcm"> 
<div class="l_zcdh"> 帐号信息 <span> (注：带<font color="#FF0000">*</font>号的为必填项)</span></div>
<form action="<?php echo U('Registr/insert');?>" method="post" id='submit'>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px;margin-bottom: 88px">
    <tbody>
    <tr class="fl_ys01">
      <td class="fl_text"><font color="#FF0000">*</font> 用&nbsp;&nbsp;户&nbsp;&nbsp;名：</td>
      <td style="text-align:left; text-indent:10px;">
          <input class="fl_bd" id="userName" name="username" type="text" placeholder="输入姓名" required><span>至少4个字符</span></td>
    </tr>
    <tbody>
    <tr class="fl_ys01">
      <td class="fl_text"><font color="#FF0000">*</font> 手&nbsp;&nbsp;机&nbsp;&nbsp;号：</td>
      <td style="text-align:left; text-indent:10px;">
          <input class="fl_bd" id="phone" name="phone" type="text" placeholder="输入手机号" required><span>11位手机号</span></td>
    </tr>
    <tr class="fl_ys02">
      <td class="fl_text"><font color="#FF0000">*</font> 登录密码：</td>
      <td style="text-align:left; text-indent:10px;">
          <input class="fl_bd" id="passWord" name="password" type="password" placeholder="输入密码" required><span>密码长度6~32位</span></td>
    </tr>
    <tr class="fl_ys02">
      <td class="fl_text"><font color="#FF0000">*</font> 确认密码：</td>
      <td style="text-align:left; text-indent:10px;">
            <input class="fl_bd" id="rePassWord" type="password" placeholder="再次输入密码" required readonly /><span></span></td>
    </tr>
    <tr class="fl_ys02">
        <td class="fl_text"><font color="#FF0000">*</font> 验证码：</td>
        <td style="text-align:left; text-indent:10px;">
            <input class="fl_bd" id="code" name="code" type="text" placeholder="输入验证码" required>
            <img class='code' src="<?php echo U('Verify/code');?>" alt="验证码" style="cursor:pointer">
        </td>
    </tr>
    <tr class="fl_ys02">
      <td class="fl_text"> </td>
      <td><input type="submit" value="提交" style="cursor:pointer" class="l_tjan"> </td>
    </tr>
  </tbody>
  </table>
  </form>
  
</div>
<!--底部代码开始-->
<div class="bottom">
<div class="t_guzm">
<ul>

<li><span><a href="http://www.redroses1960.com/Home/AboutFile?Index=11">新手教程</a></span><br>
<a href="http://www.redroses1960.com/Home/AboutFile?Index=12">会员介绍</a><br>
<a href="http://www.redroses1960.com/Home/AboutFile?Index=13">购物流程</a><br>
<a href="http://www.redroses1960.com/Home/AboutFile?Index=14">常见问题</a></li>

<li><span><a href="http://www.redroses1960.com/Home/AboutFile?Index=21">支付方式</a></span><br>
<a href="http://www.redroses1960.com/Home/AboutFile?Index=22">货到付款</a><br>
<a href="http://www.redroses1960.com/Home/AboutFile?Index=23">在线支付</a></li>

<li><span><a href="http://www.redroses1960.com/Home/AboutFile?Index=31">配送服务</a></span><br>
<a href="http://www.redroses1960.com/Home/AboutFile?Index=32">配送政策</a><br>
<a href="http://www.redroses1960.com/Home/AboutFile?Index=33">开箱验货</a><br>
<a href="http://www.redroses1960.com/Home/AboutFile?Index=34">配送运费</a><br>
<a href="http://www.redroses1960.com/Home/AboutFile?Index=35">配送范围</a></li>

<li><span><a href="http://www.redroses1960.com/Home/AboutFile?Index=41">帮助中心</a></span><br>
<a href="http://www.redroses1960.com/Home/AboutFile?Index=42">退款说明</a><br>
<a href="http://www.redroses1960.com/Home/AboutFile?Index=43">退换货流程</a><br>
<a href="http://www.redroses1960.com/Home/AboutFile?Index=44">退换货政策</a><br>
<a href="http://www.redroses1960.com/Home/AboutFile?Index=45">隐私条款</a></li>
<li class="t_bottom_wx">
    陶瓷网官方微信<br>
  <img src="/xiangmu/TaoCiWang/Public/Home/images/z_ewm.png" width="98" height="95" title="扫一扫,更精彩">
    扫一扫更精彩
</li>
</ul>
</div>
<div class="t_bottom_gywm"><span style="padding-top:8px; padding-right:25px;float:left;margin-left:214px;">
        <a href="http://www.redroses1960.com/Home/AboutFile?Index=51">关于我们</a>
        <a href="http://www.redroses1960.com/Home/AboutFile?Index=52">联系我们</a>
        <a href="http://www.redroses1960.com/Home/AboutFile?Index=53">招聘人才</a>
        <a href="http://www.redroses1960.com/Home/AboutFile?Index=54">友情链接</a>
        <a href="http://www.redroses1960.com/?cache=635944204909003169#">供应商申请</a>Cppyright？ 版权所有 陶瓷网<br>
京公网安备110235353366526号 京ICP备1425522号 企业营业执照</span></div>
</div>
     
                           <div style="text-align:center; display:none;">
        <script language="javascript" type="text/javascript" src="./红玫瑰陶瓷商城_files/17862029.js"></script><a href="http://www.51.la/?17862029" target="_blank" title="51.La 网站流量统计系统"><img alt="51.La 网站流量统计系统" src="/xiangmu/TaoCiWang/Public/Home/images/icon_0.gif" style="border:none"></a>

    <noscript>&lt;a href="http://www.51.la/?17862029" target="_blank"&gt;&lt;img alt="&amp;#x6211;&amp;#x8981;&amp;#x5566;&amp;#x514D;&amp;#x8D39;&amp;#x7EDF;&amp;#x8BA1;" src="http://img.users.51.la/17862029.asp" style="border:none" /&gt;&lt;/a&gt;</noscript>

<!--陶瓷官网统计-->
    <script src="/xiangmu/TaoCiWang/Public/Home/js/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="/xiangmu/TaoCiWang/Public/Home/js/AccessCount.js"></script>
    <script language="javascript" type="text/javascript" src="/xiangmu/TaoCiWang/Public/layer/layer.js"></script>
    <script type="text/javascript">
        $(function ()
        {
            var accessCount = new AccessCount();
            accessCount.save(1);
        });
    </script>
</div>             

</body>
</html>

<script>
    var bool=false;
    var url='/xiangmu/TaoCiWang/index.php/Home';
    $('.code').click(function(){
        $(this).attr('src',url+"/Verify/code?a="+Math.random());
    })
    $('#code').blur(function(){
        var value=$(this).val().replace(/(^\s*)|(\s*$)/g,'');
        $.ajax({
            type:'POST',
            url:'<?php echo U("Verify/check_code");?>',
            data:'code='+value,
            success:function(msg){
                if(msg=='yes'){
                    $('#code').css('border','1px solid green');
                }else{
                    $('#code').css('border','1px solid red');
                    layer.open({
                        type: 1,
                        title:'淘瓷网',
                        time:1000,
                        area: ['300px', '150px'],
                        shadeClose: true, //点击遮罩关闭
                        content: '<div style="padding:20px;text-align:center;font-size:13px">验证码错误</div>'
                    });
                    bool=false;
                }
            }
        })
    })

    $('#userName').blur(function(){
        var username=Number($(this).val().length);
        if(username==0){
            $(this).next().html('不能为空').css('color','red');
            $(this).css('border','1px solid red');
            bool=false;
        }else if(username<4){
            $(this).next().html('至少4个字符').css('color','red');
            $(this).css('border','1px solid red');
            bool=false;
        }else{
            var value=$(this).val();
            $.ajax({
                type:'POST',
                url:"<?php echo U('Registr/username');?>",
                data:'username='+value,
                success:function(msg){
                    if(msg=='no'){
                        $('#userName').next().html('该用户名已被注册').css('color','red');
                        $('#userName').css('border','1px solid red');
                        bool=false;
                    }else{
                        $('#userName').next().html('正确').css('color','green');
                        $('#userName').css('border','1px solid green');
                        bool=true;
                    }
                }
            })
        }
    })

    //手机号验证
    $('#phone').blur(function(){
        var phone=$(this).val();
        if(phone.length==0){
            $(this).next().html('手机号不能为空').css('color','red');
            $(this).css('border','1px solid red');
            bool=false;
        }else{
            var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
           if(!myreg.test(phone)) 
           { 
               $(this).next().html('请输入有效的手机号码！').css('color','red');
               bool=false;
           }else{
               $(this).css('border','1px solid green'); 
               $(this).next().html('正确').css('color','green');
           } 
        }
    })

    $('#passWord').blur(function(){
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
    $('#rePassWord').blur(function(){
            var repass=$(this).val();
            var pass=$('#passWord').val();
            if(repass==pass){
                $(this).next().html('密码正确').css('color','green');
                $(this).css('border','1px solid green');
            }else{
                $(this).next().html('两次密码不一致').css('color','red');
                $(this).css('border','1px solid red');
                bool=false;
            }
    })
    

    $('#submit').submit(function(){
        if(bool==false){
            return false;
        }else{
            return true;
        }
    })
</script>