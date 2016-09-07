<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>淘瓷网后台管理系统</title>
    <link href="/xiangmu/TaoCiWang/Public/Admin/css/style.css" rel="stylesheet">
    <link href="/xiangmu/TaoCiWang/Public/Admin/css/page.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        #page-wrapper{
            width: 80%;
            float: right;
            margin-right: 20px;
        }
    </style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台管理系统</title>
<meta name="author" content="DeathGhost" />
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<script src="/xiangmu/TaoCiWang/Public/Admin/js/jquery.js"></script>
<script>
    (function($){
        $(window).load(function(){
            
            $("a[rel='load-content']").click(function(e){
                e.preventDefault();
                var url=$(this).attr("href");
                $.get(url,function(data){
                    $(".content .mCSB_container").append(data); //load new content inside .mCSB_container
                    //scroll-to appended content 
                    $(".content").mCustomScrollbar("scrollTo","h2:last");
                });
            });
            
            $(".content").delegate("a[href='top']","click",function(e){
                e.preventDefault();
                $(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
            });
            
        });
    })(jQuery);
</script>
</head>
<body>
    <!--header-->
    <header>
     <h1><img src="/xiangmu/TaoCiWang/Public/Admin/images/admin_logo.png"/></h1>
     <ul class="rt_nav">
      <li><a href="http://www.baidu.com" target="_blank" class="website_icon">站点首页</a></li>
      <li><a href="#" class="admin_icon">DeathGhost</a></li>
      <li><a href="#" class="set_icon">账号设置</a></li>
      <li><a href="login.php" class="quit_icon">安全退出</a></li>
     </ul>
    </header>
</body>
</html>
        </nav>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        dd{display: none}
    </style>
</head>
<body>
    <!--aside nav-->
    <aside class="lt_aside_nav content mCustomScrollbar">
     <h2><a href="index.php">起始页</a></h2>
     <ul>
      <li>
       <dl>
        <dt class="menu">商品信息</dt>
        <!--当前链接则添加class:active-->
        <dd><a href="<?php echo U('AddType/add');?>">添加分类</a></dd>
        <dd><a href="<?php echo U('TypeList/lists');?>">商品分类</a></dd>
        <dd><a href="<?php echo U('GoodsList/goodslist');?>">商品列表</a></dd>
        <dd><a href="<?php echo U('Modify/modify');?>">修改商品</a></dd>
        <dd><a href="#">商品属性</a></dd>
        <dd><a href="#">品牌管理</a></dd>
       </dl>
      </li>
      <li>
       <dl>
        <dt class="menu">订单信息</dt>
        <dd><a href="#">订单列表</a></dd>
        <dd><a href="#">添加订单</a></dd>
        <dd><a href="#">缺货登记</a></dd>
       </dl>
      </li>
      <li>
       <dl>
        <dt class="menu">会员管理</dt>
        <dd><a href="#">会员列表</a></dd>
        <dd><a href="#">添加会员</a></dd>
        <dd><a href="#">会员等级</a></dd>
        <dd><a href="#">资金管理</a></dd>
       </dl>
      </li>
      <li>
       <dl>
        <dt class="menu">基础设置</dt>
        <dd><a href="#">站点基础设置</a></dd>
        <dd><a href="#">SEO设置</a></dd>
        <dd><a href="#">SQL语句查询</a></dd>
        <dd><a href="#">模板管理</a></dd>
       </dl>
      </li>
      <li>
       <dl>
        <dt class="menu">营销管理</dt>
        <dd><a href="#">订阅列表</a></dd>
        <dd><a href="#">邮件群发</a></dd>
        <dd><a href="#">优惠打折</a></dd>
       </dl>
      </li>
      <li>
       <dl>
        <dt class="menu">配送与支付设置</dt>
        <dd><a href="#">配送方式</a></dd>
        <dd><a href="#">支付方式</a></dd>
       </dl>
      </li>
      <li>
       <dl>
        <dt class="menu">在线统计</dt>
        <dd><a href="#">流量统计</a></dd>
        <dd><a href="#">销售额统计</a></dd>
       </dl>
      </li>
     </ul>
    </aside>

     <script src="/xiangmu/TaoCiWang/Public/Admin/js/jquery.js"></script>
</body>
</html>
        <div id="page-wrapper" style="float: right;">
            
    <!-- 修改弹出框 -->
    <div id="popDiv" class="mydiv" style="display:none;">
      <a href="javascript:closeDiv()" class="close">关闭窗口</a>
      <div class="innerdiv" style="background: #EEE;position:relative;margin-top: 55px;padding: 78px">
        <form action="<?php echo U('TypeList/update');?>" method="post">
          <input type="hidden" name="id" class="update">
          <span class="name"></span>
          <input name="name" class="textbox" placeholder="分类名称" type="text" required>
          <input value="确定" class="group_btn" type="submit" id="button">
          <a href="javascript:closeDiv()">
          <input value="取消" class="group_btn" type="button">
          </a>
        </form>
      </div>
    </div>
    <div id="bg" class="bg" style="display:none;"></div>
    <iframe id='popIframe' class='popIframe' frameborder='0' ></iframe>


    <h1>添加分类</h1>
    <hr/>
    <span>你的位置：</span>
    <a href=""><span>商品信息</span></a>
    <span>></span>
    <span>分类列表</span>
    <a href="<?php echo U('AddType/add');?>"><span style="color: #19a97b;float: right;margin-right: 20px">添加分类/商品</span></a>
     <section style="margin-top:10px">
        <table class="table" style="text-align: center;">
           <tr>
            <th>一级分类</th>
            <th>二级分类</th>
            <th>商品</th>
            <th>操作</th>
           </tr>
           <?php if(is_array($tree)): $i = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["name"]); ?></td>
                <td></td>
                <td></td>
                <td>
                   <a href="javascript:showDiv()" data='<?php echo ($vo["id"]); ?>' class="modify">修改</a>
                   <a href="" data='<?php echo ($vo["id"]); ?>' class="inner_btn">删除</a>
                </td>
             </tr>
             <?php if(is_array($vo['subcat'])): $i = 0; $__LIST__ = $vo['subcat'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><tr>
                 <td></td>
                 <td><?php echo ($vo1["name"]); ?></td>
                 <td></td>
                 <td>
                   <a href="javascript:showDiv()" data='<?php echo ($vo1["id"]); ?>' class="smo">修改</a>
                   <a href="" data='<?php echo ($vo1["id"]); ?>' class="inner_btn">删除</a>
                 </td>
               </tr>
               <?php if(is_array($vo1['subcat'])): $i = 0; $__LIST__ = $vo1['subcat'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><tr>
                   <td></td>
                   <td></td>
                   <td><?php echo ($vo2["name"]); ?></td>
                   <td>
                     <a href="<?php echo U('GoodsList/goodslist');?>">查看</a>
                     <a href="" data='<?php echo ($vo2["id"]); ?>' class="inner_btn">删除</a>
                   </td>
                 </tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
        </table>
       </section>
       
       <script>
         $('.inner_btn').click(function(){
            var value=$(this).attr('data');
            $.post('del',{pid:value},function(msg){
                if(msg=='no'){
                  alert('不能删除');
                }else{
                  alert('删除成功');
                }
            })
         })

         $('.modify').click(function(){
            var first=$(this).attr('data');
            $('.update').val(first);
            $.post('find',{id:first},function(msg){
                $('.textbox').val(msg['name']);
            })
            $('.name').html('一级分类');
          })

         $('.smo').click(function(){
            var secend=$(this).attr('data');
            $('.update').val(secend);
            var a=$('.update').val();
            $.post('find',{id:secend},function(msg){
                $('.textbox').val(msg['name']);
            })
           $('.name').html('二级分类');
         })

        function showDiv(){
          document.getElementById('popDiv').style.display='block';
          document.getElementById('popIframe').style.display='block';
          document.getElementById('bg').style.display='block';
        }
        function closeDiv(){
          document.getElementById('popDiv').style.display='none';
          document.getElementById('bg').style.display='none';
          document.getElementById('popIframe').style.display='none';
        }
       </script>
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/xiangmu/TaoCiWang/Public/Admin/js/jquery.js"></script>
    <script src="/xiangmu/TaoCiWang/Public/Admin/js/html5.js"></script>
    <script src="/xiangmu/TaoCiWang/Public/Admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/xiangmu/TaoCiWang/Public/Admin/js/Particleground.js"></script>
    <script src="/xiangmu/TaoCiWang/Public/Admin/js/verificationNumbers.js"></script>
    <script src="/xiangmu/TaoCiWang/Public/Admin/js/menu.js"></script>

</body>

</html>