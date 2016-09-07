<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>订单详情</title>
	<link href="/xiangmu/TaoCiWang/Public/Home/css/homestyle.css" rel="stylesheet">
</head>
<body>
	<div class="l_lgw">
    <div class="l_lgwl" style="margin-left: 10px">订单详情 </div>
</div>

<div class="l_lgww">
        <div style="margin-bottom: 10px; margin-top: 10px;">
            <table style="text-align: left; width: 98%; margin: 0 auto; clear: both; overflow: hidden; line-height: 40px; font-size: 12px;" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td class="l1_mc_a" width="11%">用户名:</td>
                        <td class="l1_nr_a" width="30%"><?php echo ($data["uname"]); ?></td>
                        <td class="l1_mc1_a" width="15%">订单名称：</td>
                        <td class="l1_nr_a" width="44%">[担保交易]<?php echo ($data["uname"]); ?></td>
                    </tr>
                    <tr>
                        <td class="l1_mc">订单号:</td>
                        <td class="l1_nr"><?php echo ($data["code"]); ?></td>
                        <td class="l1_mc1">支付宝交易号：</td>
                        <td class="l1_nr"></td>
                    </tr>
                    <tr>
                        <td class="l1_mc">交易价格:</td>
                        <td class="l1_nr">￥<?php echo ($data["price"]); ?> 元</td>
                        <td class="l1_mc1">运费:</td>
                        <td class="l1_nr">￥<?php echo ($data["luggage"]); ?> 元</td>
                    </tr>
                    <tr>
                        <td class="l1_mc">优惠或涨价</td>
                        <td class="l1_nr">￥0.00 元</td>
                        <td class="l1_mc1">总金额:</td>
                        <td class="l1_nr">￥<?php echo ($data["total"]); ?> 元</td>
                    </tr>

                    <tr>
                        <td class="l1_mc">物流类型：</td>
                        <td class="l1_nr">EXPRESS</td>
                        <td class="l1_mc1">运费承担：</td>
                        <td class="l1_nr">
                            &nbsp;&nbsp;运费承担:买方承担运费</td>
                    </tr>
                    <tr>
                        <td class="l1_mc">订单描述:</td>
                        <td class="l1_nr">共<?php echo ($data["number"]); ?>件商品</td>
                        <td class="l1_mc1">状态：</td>
                        <td class="l1_nr">
                            <?php if($data["order_status"] == 1): ?><span>等待买方付款 </span>
                            <?php elseif($data["order_status"] == 2): ?>
                            <span>买方已付款 待收货 </span>   
                            <?php elseif($data["order_status"] == 3): ?>
                            <span>买方已收货 待评价</span>
                            <?php elseif($data["order_status"] == 4): ?>
                            <span>买方已评价</span>
                            <?php elseif($data["order_status"] == 5): ?>
                            <span>买方退款中 </span><?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="background: #eceded; text-indent: 10px; font-size: 14px; margin-top: 10px; margin-bottom: 10px;"><b>收货人信息：</b></td>
                    </tr>

                    <tr>
                        <td class="l1_mc">姓名:</td>
                        <td class="l1_nr"><?php echo ($data["reciveName"]); ?></td>
                        <td class="l1_mc1">地址:</td>
                        <td class="l1_nr"><?php echo ($data["provice"]); echo ($data["city"]); echo ($data["county"]); echo ($data["more"]); ?></td>
                    </tr>
                    <tr>
                        <td class="l1_mc">邮编:</td>
                        <td class="l1_nr"></td>
                        <td class="l1_mc1">电话:</td>
                        <td class="l1_nr"><?php echo ($data["recivePhone"]); ?></td>
                    </tr>
                    <tr>
                        <td class="l1_mc">买方留言：</td>
                        <td class="l1_nr"><?php echo ($data["message"]); ?></td>
                        <td class="l1_mc1">卖方留言:</td>
                        <td class="l1_nr"></td>
                    </tr>

                    <!-- <tr>
                        <td colspan="4" style="padding-left: 10px; text-align: center;">
                            <form id="payForm" action="/AliPartner/Pay" method="post" style="display: none;">
                                <input id="OrderId" name="OrderId" value="335" type="hidden">;
                            </form>
                            <?php if($vo["order_status"] == 1): ?><span>
                                    <input onclick="_view.payOrder(335)" class="l1_an" value="付款" type="button">&nbsp; &nbsp;
                                    <input onclick="_view.cancelOrder(335)" class="l1_an" value="取消订单" type="button">
                                </span>
                            <?php elseif($vo["order_status"] == 2): ?>
                                <input onclick="_view.cancelOrder(335)" class="l1_an" value="取消订单" type="button">
                            <?php elseif($vo["order_status"] == 3): ?>
                                <input onclick="_view.payOrder(335)" class="l1_an" value="马上评价" type="button">&nbsp; &nbsp;
                                <input onclick="_view.cancelOrder(335)" class="l1_an" value="删除订单" type="button">
                            <?php elseif($vo["order_status"] == 4): ?>
                                <input onclick="_view.cancelOrder(335)" class="l1_an" value="删除订单" type="button">
                            <?php elseif($vo["order_status"] == 5): ?>
                                <input onclick="_view.cancelOrder(335)" class="l1_an" value="删除订单" type="button"><?php endif; ?> 
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
	</div>
</body>
</html>