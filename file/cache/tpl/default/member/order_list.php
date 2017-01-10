<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $module);?>
<div class="gmdd_right fr">
<div class="gmdd_search clearfix">
<form action="?"><input type="hidden" name="action" value="<?php echo $action;?>"/>
<div class="gmzt fl"><label for="">订单状态</label>&nbsp;<?php echo $status_select;?></div>
<div class="kwd fl" style="width: auto;"><label for="">订单编号</label><input type="text" name="kw" value="<?php echo $kw;?>" title="关键词" size="30"/>&nbsp;<button type="submit" class="am-btn am-btn-primary am-btn-xs" style="font-size: 1em;">查找</button></div>
<!--<div class="kwd fl"><input type="text" name="kw" value="<?php echo $kw;?>" title="关键词" size="30"/>&nbsp;<input type="submit" value="查找" class="btns"/></div>-->
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
<div class="gmdd_itm_t">下单时间：<?php echo $v['addtime'];?>       订单编号：<span><a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=detail"><?php echo $v['orderid'];?></a></span>   <!-- 订单ID：<span><?php echo $v['itemid'];?></span> --></div>
<dl class="clearfix">
<dt class="fl">
<ul>
<li class="clearfix"><a href="<?php echo $v['linkurl'];?>" target="_blank"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?><?php echo DT_SKIN;?>image/nopic60.gif<?php } ?>
" alt="<?php echo $v['title'];?>" width="50" height="50" class="fl"></a><p class="fl"><?php echo $v['title'];?><i>型号：<?php echo get_sell_xinghao_mall($v['mallid']);?></i></p><span class="fl">×<?php echo $v['number'];?></span></li>
</ul>
</dt>
<dd class="fl tac yf"><b>应付</b><br><?php echo $DT['money_sign'];?><?php echo $v['money'];?></dd>
<dd class="fl tac dd">
            <span><?php echo $_status[$v['status']];?></span>
            <a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=detail">订单详情</a></dd>
<dd class="fl tac cc pb10">
<!-- <?php if($v['status'] == 1) { ?><span>剩余23时14分</span><?php } ?>
 -->
<a href="<?php echo $MODULE['16']['linkurl'];?>down.php?orderid=<?php echo $v['orderid'];?>" class="hbor"><b>下载合同</b></a>
<?php if($v['cod'] && $v['status'] == 7) { ?><?php if($v['send_time'] && $v['send_type'] && $v['send_no']) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=express">快递追踪</a>
<?php } else { ?><?php } ?>
<?php } ?>
<?php if($v['status'] == 1) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=pay" target="_blank" class="hbor"><b>付款</b></a>
<?php } else if($v['status'] == 2) { ?>
<!-- <a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=remind" class="hbor">提醒发货</a> -->
<?php } else if($v['status'] == 3) { ?>
<?php if($v['lefttime']) { ?>
<span class="f_blue" title="如果逾期未处理，系统将自动付款给卖家"><img src="<?php echo DT_STATIC;?>file/image/clock.gif" width="12" height="12"/> 距处理此订单还剩<?php echo $v['lefttime'];?></span>&nbsp;
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=receive_goods" onclick="return confirm('确认已收到货且质量与数量无误吗？\n\n请注意:确认后您的钱将直接支付给卖家');">确认到货</a> | 
<?php if($v['send_type'] && $v['send_no']) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=express">快递追踪</a>
<?php } ?>
<?php } else { ?>
<span class="f_red">订单处理已超时，等待卖家收款</span>&nbsp;
<?php } ?>
<?php } else if($v['status'] == 4) { ?>
<?php if($v['mid'] == 16) { ?>
<?php if($v['seller_star']) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=comment_detail">评价详情</a> | 
<?php } else { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=comment">评价</a> | 
<?php } ?>
<?php } ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=refund">申请退款</a> | 
<?php } else if($v['status'] == 9) { ?>
<!--<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=close" onclick="return confirm('确实要删除此交易吗？此操作将不可撤销');">删除订单</a> | -->
<?php } ?>
<?php if($v['status'] == 0 || $v['status'] == 1) { ?>
<a href="?itemid=<?php echo $v['itemid'];?>&action=update&step=close" onclick="return confirm('确实要取消此订单吗？此操作将不可撤销');" class="nbor">取消订单</a>
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