<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>淘瓷网注册</title>
	<link href="/xiangmu/TaoCiWang/Public/Home/css/homestyle.css" rel="stylesheet">
</head>
<body>
	<script src="/xiangmu/TaoCiWang/Public/Home/js/jquery-1.7.1.js"></script>

<script src="/xiangmu/TaoCiWang/Public/Home/js/layer.min.js"></script>
<script src="/xiangmu/TaoCiWang/Public/Home/js/jquery.cookie.js"></script>

<script type="text/javascript">
    var _view = {
        imgerr:'<img src="/Images/error_ico.gif" />',
        UserName: $(),
        PassWord: $(),
        PassWord2: $(),
        //
        ShowName: $(),
        ucAreaId: $(),
        Address: $(),
        Tel: $(),
        ValiCode:$(),
        sumbit: function () { }  //提交表单
    };

    $(function ()
    {
        GetCode(); //初始化验证码

        _view.UserName = $("#UserName");
        _view.PassWord = $("#PassWord");
        _view.PassWord2 = $("#PassWord2");

        _view.ShowName = $("#ShowName");
        _view.ucAreaId = $("#ucAreaId");
        _view.Address = $("#Address");
        _view.Tel = $("#Tel");
        _view.ValiCode = $("#ValiCode");
    });

    _view.sumbit = function ()
    {
        var username = $.trim(_view.UserName.val());
        var password = $.trim(_view.PassWord.val());
        var password2 = $.trim(_view.PassWord2.val());
        //
        var showname = $.trim(_view.ShowName.val());
        var ucareaId = _view.ucAreaId.val();
        var address = $.trim(_view.Address.val());
        var tel = $.trim(_view.Tel.val());
        var valicode = $.trim(_view.ValiCode.val());

        if (username == "")
        {
            layer.tips("用户名必填",_view.UserName);
            _view.UserName.focus();
        }
        else if (password == "")
        {
            layer.tips("密码必填", _view.PassWord);
            _view.PassWord.focus();
        }
        else if (password2 == "")
        {
            layer.tips("确认密码必填", _view.PassWord2);
            _view.PassWord2.focus();
        }
        else if (password != password2)
        {
            layer.tips("两次密码不一致", _view.PassWord2);
            _view.PassWord2.focus();

        }
        else if (showname == "")
        {
            layer.tips("用户名必填", _view.ShowName);
            _view.ShowName.focus();
        }
        else if (ucareaId == "0")
        {
            layer.tips("所在地区必选", _view.ucAreaId);
            _view.ucAreaId.focus();
        }
        else if (address == "")
        {
            layer.tips("详细地址必填", _view.Address);
            _view.Address.focus();
        }
        else if (tel == "")
        {
            layer.tips("电话必填", _view.Tel);
            _view.Tel.focus();
        }
        else if (valicode == "")
        {
            layer.tips("验证码必填", _view.ValiCode);
            _view.ValiCode.focus();
        }
        else
        {

            var index = 0;

            $.ajax({
                url: "/Home/RegisterSumbit",
                data: {
                    UserName: username,
                    PassWord: password,
                    ShowName: showname,
                    ucAreaId: ucareaId,
                    Address: address,
                    Tel: tel,
                    ValidateCodeToken: $.cookie("ValidateCodeToken"),
                    ValiCode: valicode
                },
                dataType: "json",
                type: "post",
                cache: false,
                beforeSend: function () { index = layer.load(); },
                complete: function () { layer.close(index); },
                error: function () { alert("ajax错误"); },
                success: function (r)
                {
                    if (r && r.success)
                    {
                        window.location.href = "/Home/Index";
                    }
                    else
                    {

                        if (r.data == 0)
                        {
                            layer.alert("验证码不正确", { icon: 0 });
                            GetCode();
                            _view.ValiCode.focus();
                        }
                        if (r.data == 2)
                        {
                            layer.tips(r.msg, _view.UserName);
                            _view.UserName.focus();
                        }
                        else
                        {
                            layer.alert(r.msg, { icon: 0 });
                        }
                    }

                }
            });
        }

    };



    function GetCode()
    {
        //注意后面一定要加随机数，这样<img>才能更新为新的验证码
        $("#validateImg").attr("src", "/xiangmu/TaoCiWang/Public/Home/images/GetValidateCode?token=" + $.cookie("ValidateCodeToken") + "&cache=" + (new Date()).valueOf());
    }
</script>




<div style="background:#e4e4e4; padding-bottom:10px;">
    
<!--头部代码开始-->
<div class="l_zc1"> 
<div class="l_zcz"> <img src="/xiangmu/TaoCiWang/Public/Home/images/zclogo.png" style="margin-top:10px;"> </div>
</div>
<!--中间代码开始-->
<div class="l_zcm"> 
<div class="l_zcdh"> 帐号信息 <span> (注：带<font color="#FF0000">*</font>号的为必填项)</span></div>
<form action='Registr/insert' method="post">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px;">
    <tbody><tr class="fl_ys01">
      <td class="fl_text"><font color="#FF0000">*</font> 用&nbsp;&nbsp;户&nbsp;&nbsp;名：</td>
      <td>
          <input class="fl_bd" id="UserName" name="UserName" type="text" value="">
      </td>
        
    </tr>
    <tr class="fl_ys02">
      <td class="fl_text"><font color="#FF0000">*</font> 登录密码：</td>
      <td style="text-align:left; text-indent:10px;">
          <input class="fl_bd" id="PassWord" name="PassWord" type="password">
           支持中英文、数字</td>
    </tr>
    
    <tr class="fl_ys02">
      <td class="fl_text"><font color="#FF0000">*</font> 确认密码：</td>
      <td style="text-align:left; text-indent:10px;">
            <input class="fl_bd" id="PassWord2" name="PassWord2" type="password"> 密码长度6~32位</td>
    </tr>

  </tbody></table>

<div class="l_zcdh"> 联系方式</div>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px;margin-left: 40px;">
    <tbody><tr class="fl_ys01">
      <td class="fl_text"> <font color="#FF0000">*</font>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</td>
      <td>
          <input class="fl_bd" id="ShowName" name="ShowName" type="text" value="">
      </td>
    </tr>
    
    <tr class="fl_ys02">
      <td class="fl_text"> <font color="#FF0000">*</font>所在地区：</td>
      <td style="text-align:left;">

<div id="ucAddressSelectDiv">
  <select name="provinceID" onchange="_ucAddressSelect.sel1()" class="l_dxk"><option value="0">-请选择省-</option></select>
        <img name="provinceLoading" src="/xiangmu/TaoCiWang/Public/Home/images/loading2.gif" style="width:15px; height:15px; display:none;">
<select name="cityID" onchange="_ucAddressSelect.sel2()" style="margin-left:2px;margin-right:2px;" class="l_dxk"><option value="0">-请选择市-</option></select>
<select id="ucAreaId" name="areaID" class="l_dxk"><option value="0">-请选择区-</option></select>  <!--这个给出Id值，为了tips能找找到这个dom ，以便进行提示-->
        <img name="areaLoading" src="/xiangmu/TaoCiWang/Public/Home/images/loading2.gif" style="width:15px; height:15px; display:none;">
</div> 

        <script type="text/javascript">
            $(function ()
            {
                _ucAddressSelect.SelClass = "l_dxk";
                _ucAddressSelect.Init();
            });

        </script>
    </td></tr>
    
    <tr class="fl_ys01">
      <td class="fl_text"> <font color="#FF0000">*</font>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：</td>
      <td>
          <input class="fl_bd1" id="Address" name="Address" type="text" value="">
      </td>
    </tr>
    <tr class="fl_ys02">
      <td class="fl_text"> <font color="#FF0000">*</font>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：</td>
      <td style="text-align:left; text-indent:10px;">
          <input class="fl_bd" id="Tel" name="Tel" type="text" value="">
      </td>
    </tr>
    
    <tr class="fl_ys02">
      <td class="fl_text"><font color="#FF0000">*</font> 验&nbsp;&nbsp;证&nbsp;&nbsp;码：</td>
      <td style="text-align:left; text-indent:10px;">
          <input type="text" value=" " maxlength="" id="ValiCode" name="ValiCode" class="fl_bd"> 
          <img id="validateImg" width="101" height="29" src="/xiangmu/TaoCiWang/Public/Home/images/GetValidateCode"> <a href="javascript:;" onclick="GetCode()">换一个</a></td>
    </tr>
    <tr class="fl_ys02">
      <td class="fl_text"> </td>
      <td><input type="submit" value="提交" style="cursor:pointer" class="l_tjan" onclick="_view.sumbit()"> </td>
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
    红玫瑰官方微信<br>
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
        <a href="http://www.redroses1960.com/?cache=635944204909003169#">供应商申请</a>Cppyright？ 版权所有 唐山市红玫瑰陶瓷商城<br>
京公网安备110235353366526号 京ICP备1425522号 企业营业执照</span></div>
</div>
     
                           <div style="text-align:center; display:none;">
        <script language="javascript" type="text/javascript" src="./红玫瑰陶瓷商城_files/17862029.js"></script><a href="http://www.51.la/?17862029" target="_blank" title="51.La 网站流量统计系统"><img alt="51.La 网站流量统计系统" src="/xiangmu/TaoCiWang/Public/Home/images/icon_0.gif" style="border:none"></a>

    <noscript>&lt;a href="http://www.51.la/?17862029" target="_blank"&gt;&lt;img alt="&amp;#x6211;&amp;#x8981;&amp;#x5566;&amp;#x514D;&amp;#x8D39;&amp;#x7EDF;&amp;#x8BA1;" src="http://img.users.51.la/17862029.asp" style="border:none" /&gt;&lt;/a&gt;</noscript>

<!--陶瓷官网统计-->
            
            <script language="javascript" type="text/javascript" src="/xiangmu/TaoCiWang/Public/Home/js/AccessCount.js"></script>
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