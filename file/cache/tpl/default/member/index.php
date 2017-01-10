<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $module);?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/index.css"/>
<div id="warn">
<?php if($_groupid == 4) { ?>
<div class="warn f_red">尊敬的会员，您的帐号<span class="f_red">正在审核中..</span>，本站部分功能和服务可能受到一定的使用限制，<?php if($MOD['checkuser']==2) { ?><a href="send.php?action=check" class="l">请点这里验证您的邮箱</a>，系统将自动审核<?php } else { ?>请稍候，等待网站审核<br/>完善的商业信息有助于获得别人的信任，结交潜在的商业伙伴，获取商业机会，增加系统审核通过的概率&nbsp;&nbsp;<a href="edit.php?tab=2" class="t">现在就去完善&raquo;</a><?php } ?>
</div>
<?php } ?>
<?php if($_groupid >4 && !$_edittime) { ?>
<div class="warn f_red">您尚未完善详细资料！完善的资料信息有助于获得别人的信任，结交潜在的商业伙伴，获取商业机会&nbsp;&nbsp;<a href="edit.php?tab=2" class="t">现在就去完善&raquo;</a></div>
<?php } ?>
<?php if($vip && $havedays < 30 && $havedays > 0) { ?>
<div class="warn f_red">尊敬的<?php echo $MG['groupname'];?>，您的<?php echo VIP;?>服务将在 <strong class="f_red"><?php echo $havedays;?></strong> 天后到期，为了不影响您的正常使用，请您尽快续费&nbsp;&nbsp;<a href="vip.php?action=renew" class="t">立即续费&raquo;</a></div>
<?php } ?>
</div>
<div class="v_idx_tp pr">
<h3><b><?php if($_company) { ?><?php echo $_company;?><?php } else { ?><?php echo $_truename;?><?php } ?>
</b><?php if($vip) { ?><img src="images/v_index1.jpg"/><?php } ?>
<i><?php echo $MG['groupname'];?>  <?php if($validated) { ?>已认证<?php } ?>
</i><!--<span><?php echo $_truename;?>，欢迎您！</span>--></h3>
<ul>
<li class="clearfix">
<p class="p1"><a href="<?php echo $MODULE['16']['linkurl'];?>cart.php" target="_blank">购物车（<script type="text/javascript">document.write(get_cart());</script>）</a></p>
<p class="p2 w215"><a href="message.php">新消息（<?php echo $_message;?>）</a></p>
</li>
<li class="clearfix">
<p class="p3">用户名：<?php echo $_username;?></p>
<p class="p4 w215">手机号：<?php echo $mobile;?></p>
</li>
<li class="clearfix">
<p class="p5-1">QQ:<?php echo $qq;?></p>
<p class="p6 w215">邮箱：<?php echo $email;?></p>
<p class="p7">微信：<?php echo $weixin;?></p>
</li>
</ul>
<!-- <a href="" class="v_idxtp_btn pa">开设商铺</a> -->
</div>
<div class="v_idx_yc mt10">
<div class="v_idxtit">
<b>您可以</b>
</div>
<dl>
<dt class="clearfix">
<h3 class="fl">找产品</h3>
<div class="isearch fr">
<ul class="isearch_tab" id="search_globel">
<li><a href="javascript:;" class="on" data-mid="5">产品</a></li>
<li><a href="javascript:;" data-mid="4">公司</a></li>
<li><a href="javascript:;" data-mid="16">商城</a></li>
</ul>
<div class="isearch_con" id="search_sly">
<form action="<?php echo $MODULE['5']['linkurl'];?>search.php" target="_blank" onsubmit="return search_sly();">
<input type="hidden" name="moduleid" value="5" id="destoon_moduleid"/>
<input type="hidden" name="spread" value="0" id="destoon_spread"/>
<input type="text" name="kw" class="isearch_txt"  autocomplete="off"/>
<input type="submit" class="isearch_btn" name="submit" values="搜索" />
</form>
<div class="ajax_search_keyw" id="ajax_search_keyw"></div>
</div>
</div>
</dt>
<dd class="clearfix pt20">
<h3 class="fl">发布产品</h3>
<p class="fr">您需要填写企业的详细信息，进行企业认证，认证通过后，您就可以发布产品，也可以再<br />
申请开设商铺销售产品。<a href="<?php echo $DT['file_my'];?>?mid=5&action=add">发布产品</a></p>
</dd>
</dl>
</div>
<div class="v_idx_bom mt10">
<div class="v_idxtit" style="border: 0;">
<b>最新消息</b><a href="/announce" class="fr">更多</a>
</div>
<div>
<!--<h3>
<span class="on">系统信息</span>
<span>商城信息</span>
</h3>-->
<ul class="pt10">
<?php $cont = tag("table=announce&condition=(totime=0 or totime>$today_endtime-86400)&areaid=$cityid&pagesize=8&order=listorder desc,addtime desc&template=null")?>
<?php if(is_array($cont)) { foreach($cont as $t) { ?>
<li class="clearfix"><span class="fr"><?php echo timetodate($t['addtime'], 3);?></span>&nbsp;<a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['title'];?>" target="_blank" class="fl"><?php echo $t['title'];?></a></li>
<?php } } ?>
</ul>
</div>
</div>
<script type="text/javascript">
$(function(){
$('#search_globel a').click(function(){
var mid = $(this).attr('data-mid');
$('#destoon_moduleid').val(mid);
if (mid == '4') {
act = "<?php echo $MODULE['4']['linkurl'];?>search.php";
}else if(mid == '16'){
act = "<?php echo $MODULE['16']['linkurl'];?>search.php";
}else{
act = "<?php echo $MODULE['5']['linkurl'];?>search.php";
}
$('#search_sly form').attr('action',act);
$('#search_globel a').removeClass('on');
$(this).addClass('on');
});
});
</script>
<?php include template('footer', $module);?>