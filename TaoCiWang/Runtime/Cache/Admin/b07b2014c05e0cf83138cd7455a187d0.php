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
            
    <h1>添加分类</h1>
    <hr/>
    <span>你的位置：</span>
    <a href=""><span>商品信息</span></a>
    <span>></span>
    <span>修改商品信息</span>
	 <section>
        <!-- 添加商品 -->
        <form action="<?php echo U('Modify/goods');?>" method="post" enctype="multipart/form-data"> 
        <input type="hidden" name='gid' value="<?php echo ($data["id"]); ?>">
        <input type="hidden" name='aid' value="<?php echo ($data["tid"]); ?>">
        <h2><strong style="color:grey;">添加商品</strong></h2> 
        <span>一级分类：</span>
        <select id="first" class='textbox' style='height: 38px;width: 292px;margin-bottom: 10px'>
          <option value="<?php echo ($one["id"]); ?>" selected id='selected'><?php echo ($one["name"]); ?></option>
          <?php if(is_array($first)): $k = 0; $__LIST__ = $first;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <br />
        <span>二级分类：</span>
        <select name="pid" id="secend" class='textbox' style='height: 38px;width: 292px;margin-bottom: 10px'>
          
           <option id='sec' value="<?php echo ($sec["id"]); ?>" selected><?php echo ($sec["name"]); ?></option>
        </select>
        <br />
        <span>商品名称：</span><input name='name' class="textbox" placeholder="商品名称" type="text" value="<?php echo ($data["name"]); ?>" required><br>
        <span>商品价格：</span><input name='price' class="textbox" placeholder="商品价格" type="text" value="<?php echo ($data["price"]); ?>" required><br>
        <span>商品描述：</span><input name='desc' class="textbox" placeholder="商品描述" type="text" value="<?php echo ($data["desc"]); ?>" required><br>
        <span>商品打折：</span><input name='discount' class="textbox" placeholder="商品打折" type="text" value="<?php echo ($data["discount"]); ?>" required><br>
        <span>商品状态：</span>
        <select name="status" id="status" class='textbox' style='height: 38px;width: 292px;margin-bottom: 10px'>
          <option value="<?php echo ($data["status"]); ?>" id='option'>
            <?php switch($data["status"]): case "0": ?>正常商品<?php break;?>
              <?php case "1": ?>新品首发<?php break;?>
              <?php case "2": ?>特价商品<?php break;?>
              <?php case "3": ?>热卖商品<?php break;?>
              <?php case "4": ?>推荐产品<?php break; endswitch;?>
          </option>
          
          <option value="0">正常商品</option>
          <option value="1">新品首发</option>
          <option value="2">特价商品</option>
          <option value="3">热卖商品</option>
          <option value="4">推荐产品</option>
        </select>
        <br />
        <span>商品数量：</span><input name='num' class="textbox" placeholder="商品数量" type="text" value="<?php echo ($data["num"]); ?>" required><br>
        <span>商品图片：</span><input name='photo' class="textbox"  type="file" value="<?php echo ($data["photo"]); ?>"><br>
        <span>商品预览图：</span>
        <!-- 加载编辑器的容器 -->
        <script id="container" name="maxpic" type="text/plain"></script>
        <!-- 配置文件 -->
        <script type="text/javascript" src="/xiangmu/TaoCiWang/Public/UEditor/ueditor.config.js"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="/xiangmu/TaoCiWang/Public/UEditor/ueditor.all.js"></script>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            var ue = UE.getEditor('container',{
              toolbars: [
                  ['fullscreen', 'source', 'undo', 'redo', 'simpleupload','insertimage']
              ]
            });
        </script>

        <input value="添加" class="group_btn" type="submit">
      </form>
     </section>
      <!-- <script src="/xiangmu/TaoCiWang/Public/Admin/js/jquery.js"></script> -->
      <script type="text/javascript">

      function demo(){
         var pid=$('#first').val();
          $.ajax({
            type:"POST",
            url:"find",
            data:"pid="+pid,
            success:function(msg){
              var str='';
              for(var i in msg){
                str+='<option value="'+msg[i]['id']+'">'+msg[i]['name']+'</option>';
              }
              // console.log(str);
              $('#secend').html(str);
            }
          })
        }
        // demo();
        $('#first').change(function(){
          $('#sec').css('display','none');
          demo();
        })

        $('#first').click(function(){
          $('#selected').css('display','none');
        })
        $('#secend').click(function(){
          $('#sec').css('display','none');
        })

        $('#status').click(function(){
          $('#option').css('display','none');
        })

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