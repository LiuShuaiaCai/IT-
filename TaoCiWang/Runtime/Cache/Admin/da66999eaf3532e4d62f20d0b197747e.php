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
        <dt class="menu">Banner管理</dt>
        <dd><a href="<?php echo U('Banner/add');?>">添加Banner</a></dd>
        <dd><a href="<?php echo U('Banner/lists');?>">Banner列表</a></dd>
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
            
	 <section>
      <div class="page_title">
       <h2 class="fl">例如产品详情标题</h2>
      </div>
      <table class="table">
       <tr>
        <th>项目1</th>
        <th>项目2</th>
        <th>项目3</th>
        <th>项目4</th>
        <th>项目5</th>
        <th>项目6</th>
        <th>项目7</th>
       </tr>
       <tr>
        <td style="width:265px;"><div class="cut_title ellipsis">265px宽·长标题字符串截取，仅适合单行截取，多行截取程序定义一下。</div></td>
        <td>内容二</td>
        <td>内容三</td>
        <td>内容四</td>
        <td>内容五</td>
        <td>内容六</td>
        <td>
         <a href="#">表内链接</a>
         <a href="#" class="inner_btn">表内按钮</a>
        </td>
       </tr>
       <tr>
        <td style="width:265px;"><div class="cut_title ellipsis">265px宽·长标题字符串截取，仅适合单行截取，多行截取程序定义一下。</div></td>
        <td>内容二</td>
        <td>内容三</td>
        <td>内容四</td>
        <td>内容五</td>
        <td>内容六</td>
        <td>
         <a href="#">表内链接</a>
         <a href="#" class="inner_btn">表内按钮</a>
        </td>
       </tr>
       <tr>
        <td style="width:265px;"><div class="cut_title ellipsis">265px宽·长标题字符串截取，仅适合单行截取，多行截取程序定义一下。</div></td>
        <td>内容二</td>
        <td>内容三</td>
        <td>内容四</td>
        <td>内容五</td>
        <td>内容六</td>
        <td>
         <a href="#">表内链接</a>
         <a href="#" class="inner_btn">表内按钮</a>
        </td>
       </tr>
      </table>
      <aside class="paging">
       <a>第一页</a>
       <a>1</a>
       <a>2</a>
       <a>3</a>
       <a>…</a>
       <a>1004</a>
       <a>最后一页</a>
      </aside>
     </section>
            
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