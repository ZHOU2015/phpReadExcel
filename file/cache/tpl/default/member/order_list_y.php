<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $module);?>
<div class="gmdd_right fr">
<div class="gmdd_search clearfix">
<form action="?"><input type="hidden" name="action" value="<?php echo $action;?>"/>
<div class="gmzt fl"><label for="">订单状态</label>&nbsp;<?php echo $status_select;?></div>
<div class="kwd fl"><input type="text" name="kw" value="<?php echo $kw;?>" title="关键词" size="30"/><input type="submit" value="查找" class="btns"/></div>
</form>
</div>
<div class="gmdd_tit clearfix">
<p class="name">产品名称</p>
<p class="num">数量</p>
<p class="pri">金额</p>
<p class="zt">订单状态</p>
<p class="do">操作</p>
</div>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<div class="gmdd_itm mt10">
<div class="gmdd_itm_t">下单时间：<?php echo $v['addtime'];?>       订单编号：<span><a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=detail"><?php echo $v['orderid'];?></a></span>  <!-- 订单ID：<span><?php echo $v['itemid'];?></span> --></div>
<dl class="clearfix">
<dt class="fl">
<ul>
<li class="clearfix"><a href="<?php echo $v['linkurl'];?>" target="_blank"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?><?php echo DT_SKIN;?>image/nopic60.gif<?php } ?>
" alt="<?php echo $v['title'];?>" width="50" height="50" class="fl"></a><p class="fl"><?php echo $v['title'];?><i>型号：<?php echo get_sell_xinghao_mall($v['mallid']);?></i></p><span class="fl">×<?php echo $v['number'];?></span></li>
</ul>
</dt>
<dd class="fl tac yf"><b>应付</b><br><?php echo $DT['money_sign'];?><?php echo $v['money'];?></dd>
<dd class="fl tac dd"><span><?php echo $_status[$v['status']];?></span><a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=detail">订单详情</a></dd>
<dd class="fl tac cc pb10">
<?php if($v['status'] == 1) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=edit_price" class="hbor">修改订单</a>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=close" onclick="return confirm('确实要关闭此交易吗？此操作将不可撤销');">关闭交易</a>
<?php } else if($v['status'] == 2) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=send_goods" class="hbor">确认发货</a>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=print" target="_blank">打印订单</a>
<?php } else if($v['status'] == 3) { ?>
<?php if($v['lefttime']) { ?>
<span class="f_blue"><img src="<?php echo DT_STATIC;?>file/image/clock.gif" width="12" height="12"/> 距买家处理订单还剩<?php echo $v['lefttime'];?></span>&nbsp;
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=add_time">延长时间</a>
<?php } else { ?>
<span class="f_blue">买家处理订单超时</span>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=get_pay">直接收款</a> 
<?php } ?>

<?php if($v['send_type'] && $v['send_no']) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=express">快递追踪</a>
<?php } ?>
<?php } else if($v['status'] == 4) { ?>
<?php if($v['mid'] == 16) { ?>
<?php if($v['buyer_star']) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=comment_detail">评价详情</a>
<?php } else { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=comment">评价</a>
<?php } ?>
<?php } ?>
<?php } else if($v['status'] == 5) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=refund_agree">同意退款</a>
<?php } else if($v['status'] == 7) { ?>
<?php if($v['send_time']) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=cod_success" onclick="return confirm('您确定已经收到货款，交易完成吗？此操作将不可撤销');">确认完成</a>
<?php } else { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=send_goods">确认发货</a>
<?php } ?>
<?php } else if($v['status'] == 8) { ?>
<!--<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=close" onclick="return confirm('确实要删除此订单吗？此操作将不可撤销');">删除订单</a>-->
<?php } ?>
<?php if($v['status'] == 0) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=edit_price&confirm=1" class="hbor">确认订单</a>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=edit_price" class="hbor">修改订单</a>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=close" onclick="return confirm('确实要关闭此交易吗？此操作将不可撤销');">关闭交易</a>
<?php } ?>
</dd>
</dl>
</div>
<?php } } ?>
<div class="mlist_fy" style="text-align: center;margin-top: 40px;margin-bottom: 40px;">
<?php echo $pages;?>
</div>
</div>
<?php include template('footer',$module);?>