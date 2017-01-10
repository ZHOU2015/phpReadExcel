<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header-index');?>
<div class="m clearfix">
<div class="itype fl" id="mod-menu">
<h1><span>全部产品分类</span></h1>
<div class="column-left hovertree idx_sjm" id="keleyihovertree" style="top:0;">
<?php $sellcat = get_maincat(0,5,1);?>
<div class="hovertreeitem hvtcurrent">
<ul class="menu-item1">
<?php if(is_array($sellcat)) { foreach($sellcat as $k => $t) { ?>
<?php $k++; $k = sprintf ( "%02d",$k);?>
<li class="itype_li_<?php echo $k;?>"><a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['catname'];?></a>
<?php $child = get_maincat($t['catid'], 5,1);?>
<?php if($child) { ?>
<ul class="menu-item2">
<?php if(is_array($child)) { foreach($child as $c) { ?>
<li>
<h3>
<a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $c['linkurl'];?>"><?php echo $c['catname'];?></a>
<?php $sub = get_maincat($c['catid'], 5,1);?>
<?php if($sub) { ?>
<p>
<?php if(is_array($sub)) { foreach($sub as $s) { ?>
<a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $s['linkurl'];?>">
<?php echo $s['catname'];?></a>
<?php } } ?>
</p></h3>

<!--<ul class="menu-item3">
<li>

</li>
</ul>-->
<?php } ?>
</li>
<?php } } ?>
</ul>
<?php } ?>
</li>
<?php } } ?>
</ul>
</div>
</div>
</div>
<script type="text/javascript">
$("#keleyihovertree").hovertree({
"width": "keleyi",
"initStatus": 'keleyi'
});
</script>
<div class="box fl">
<div class="nav clearfix">
<ul class="meun clearfix fl">
<li <?php if($moduleid<4) { ?>class="on"<?php } ?>
><a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a></li>
<li<?php if($moduleid==5) { ?> class="on"<?php } ?>
><a href="<?php echo $MODULE['5']['linkurl'];?>"><span<?php if($MODULE['5']['style']) { ?> style="color:<?php echo $MODULE['5']['style'];?>;"<?php } ?>
><?php echo $MODULE['5']['name'];?></span></a></li>
<li<?php if($moduleid==16) { ?> class="on"<?php } ?>
><a href="<?php echo $MODULE['16']['linkurl'];?>"><span<?php if($MODULE['16']['style']) { ?> style="color:<?php echo $MODULE['16']['style'];?>;"<?php } ?>
><?php echo $MODULE['16']['name'];?></span></a></li>
<li<?php if($moduleid==4) { ?> class="on"<?php } ?>
><a href="<?php echo $MODULE['4']['linkurl'];?>"><span<?php if($MODULE['4']['style']) { ?> style="color:<?php echo $MODULE['4']['style'];?>;"<?php } ?>
><?php echo $MODULE['4']['name'];?></span></a></li>
<li<?php if($moduleid==13) { ?> class="on"<?php } ?>
><a href="<?php echo $MODULE['13']['linkurl'];?>"><span<?php if($MODULE['13']['style']) { ?> style="color:<?php echo $MODULE['13']['style'];?>;"<?php } ?>
>品牌街</span></a></li>
<li<?php if($moduleid==21) { ?> class="on"<?php } ?>
><a href="<?php echo $MODULE['21']['linkurl'];?>"><span<?php if($MODULE['21']['style']) { ?> style="color:<?php echo $MODULE['21']['style'];?>;"<?php } ?>
>行业资讯</span></a></li>
</ul>
<div class="ishare bdsharebuttonbox fr">
<ul class="clearfix">
<li><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a></li>
<li><a href="#" class="bds_more" data-cmd="more"></a></li>
</ul>
</div>
</div>
<div class="box1">
<div class="row1 clearfix">
<div class="slide1 fl">
<div class="hd">
<ul></ul>
</div>
<div class="bd">
<?php $now=time(); $ads=tag("table=ad&condition=pid=14 AND fromtime <".$now." AND totime>".$now."&order=listorder asc&pagesize=5&template=null");?>
<ul>
<?php if(is_array($ads)) { foreach($ads as $v) { ?>
<li><a href="<?php echo $v['image_url'];?>" target="_blank"><img src="<?php echo $v['image_src'];?>" alt="<?php echo $v['title'];?>" title="<?php echo $v['title'];?>" /></a></li>
<?php } } ?>
</ul>
</div>
</div>
<div class="igg fr">
<h1>网站公告</h1>
<?php $cont = tag("table=announce&condition=(totime=0 or totime>$today_endtime-86400)&areaid=$cityid&pagesize=8&order=listorder desc,addtime desc&template=null")?>
<ul>
<?php if(is_array($cont)) { foreach($cont as $t) { ?>
<li><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></li>
<?php } } ?>
</ul>
</div>
</div>
<div class="row2">
<div class="hd">
<span class="find"><a href="<?php echo $MODULE['5']['linkurl'];?>find.php" target="_blank">找设备</a></span>
<ul>
<li><a href="<?php echo $MODULE['5']['linkurl'];?>hotlist.php?level=1">推荐产品</a></li>
<li><a href="<?php echo $MODULE['16']['linkurl'];?>hotlist.php?level=1">促销商品</a></li>
<li><a href="<?php echo $MODULE['5']['linkurl'];?>hotlist.php?level=2">热卖推荐</a></li>
</ul>
</div>
<div class="bd">
<?php $cont=tag("moduleid=5&condition=status=3 and level = 1&areaid=$cityid&pagesize=4&order=addtime desc&template=null");?>
<ul>
<?php if(is_array($cont)) { foreach($cont as $t) { ?>
<li>
<a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['title'];?>" /></a>
<p><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></p>
<span>型号：<?php echo $t['xinghao'];?></span>
<!-- <div><?php if($t['price']) { ?><small>￥</small><?php echo $t['price'];?><?php } else { ?>价格面议<?php } ?>
</div> -->
</li>
<?php } } ?>
</ul>
<?php $cont=tag("moduleid=16&condition=status=3 and level = 1&areaid=$cityid&pagesize=4&order=addtime desc&template=null");?>
<ul>
<?php if(is_array($cont)) { foreach($cont as $t) { ?>
<li>
<a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['title'];?>"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>" /></a>
<p><a href="<?php echo $t['linkurl'];?>" title="<?php echo $t['title'];?>" target="_blank"><?php echo $t['title'];?></a></p>
<span title="型号：<?php echo get_sell_xinghao($t['sellid']);?>">型号：<?php echo get_sell_xinghao($t['sellid']);?></span>
<div><small>￥</small><?php echo $t['price'];?></div>
</li>
<?php } } ?>
</ul>
<?php $cont=tag("moduleid=5&condition=status=3 and level = 2&areaid=$cityid&pagesize=4&order=addtime desc&template=null");?>
<ul>
<?php if(is_array($cont)) { foreach($cont as $t) { ?>
<li>
<a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>" /></a>
<p><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></p>
<span>型号：<?php echo $t['xinghao'];?></span>
<!-- <div><small>￥</small><?php echo $t['price'];?></div> -->
</li>
<?php } } ?>
</ul>
</div>
</div>
</div>
</div>
</div>
<div id="ipad_tips" style="display:none;"></div>
<div class="m">
<ul class="item">
<!--重复楼层开始-->
<?php if(is_array($sellcat)) { foreach($sellcat as $k => $t) { ?>
<li>
<div class="item_head clearfix">
<span class="item_title"><small><?php echo $k+1;?>F</small><?php echo $t['catname'];?></span>
<?php $sub = get_maincat($t['catid'],5);?>
<span class="item_type fr">
<?php if(is_array($sub)) { foreach($sub as $j => $s) { ?><?php if($j < 5) { ?>
<a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $s['linkurl'];?>" target="_blank"><?php echo $s['catname'];?></a>
<?php } ?>
<?php } } ?>
<a href="<?php echo $MODULE['5']['linkurl'];?><?php echo $t['linkurl'];?>" target="_blank">更多</a>
</span>
</div>
<div class="item_box clearfix">
<?php $cont=tag("moduleid=5&catid=".$t['catid']."&condition=status=3 and level = 3&areaid=$cityid&pagesize=3&order=addtime desc&template=null");?>
<ul class="mid fl clearfix">
<?php if(is_array($cont)) { foreach($cont as $tt) { ?>
<li>
<div class="pic"><a href="<?php echo $tt['linkurl'];?>" target="_blank" title="<?php echo $tt['title'];?>"><img src="<?php echo $tt['thumb'];?>" alt="<?php echo $tt['alt'];?>" /></a></div>
<p><a href="<?php echo $tt['linkurl'];?>" target="_blank" title="<?php echo $tt['title'];?>"><?php echo $tt['title'];?></a></p>
<span title="型号：<?php echo $tt['xinghao'];?>">型号：<?php echo $tt['xinghao'];?></span>
<!-- <div class="pay"><?php if($tt['linkurl'] > 0) { ?><small>￥</small><?php echo $tt['linkurl'];?><?php } else { ?>面议<?php } ?>
</div> -->
</li>
<?php } } ?>
</ul>
<div class="right fr">
<div class="ilev_sell">
<?php $cont=tag("moduleid=5&catid=".$t['catid']."&condition=status=3 and level = 4&areaid=$cityid&pagesize=4&order=addtime desc&template=null");?>
<div class="hd">
<span>推荐产品</span>
<ul>
<li></li>
<li></li>
</ul>
</div>
<div class="bd">
<?php if(is_array($cont)) { foreach($cont as $kk => $tt) { ?>
<?php if($kk%2 == 0) { ?><ul><?php } ?>
<li>
<a href="<?php echo $tt['linkurl'];?>" target="_blank">
<img src="<?php echo $tt['thumb'];?>" alt="<?php echo $tt['alt'];?>" title="<?php echo $tt['title'];?>"/>
<p title="<?php echo $tt['title'];?>"><?php echo $tt['title'];?></p>
</a>
</li>
<?php if($kk%2 == 1) { ?></ul><?php } ?>
<?php } } ?>
</div>
</div>
<div class="ilev_comp">
<h4>推荐厂商<small><a href="<?php echo $MODULE['23']['linkurl'];?>" target="_blank">更多</a></small></h4>
<?php
$res = $db->query("SELECT b.* FROM yy_brand_23 b LEFT JOIN yy_brand_cat_23 c ON b.itemid = c.itemid WHERE c.catid = ".$t['catid']." and b.level > 0 ORDER BY b.level desc, b.addtime desc LIMIT 3");
$cont = array();
while($r = $db->fetch_array($res)){
$cont[] = $r;
}
?>
<ul>
<?php if(is_array($cont)) { foreach($cont as $tt) { ?>
<li class="clearfix">
<div class="left fl"><a href="<?php echo $MODULE['23']['linkurl'];?><?php echo $tt['linkurl'];?>" title="<?php echo $tt['title'];?>" target="_blank"><?php echo $tt['title'];?></a></div>
<div class="right fr" title="主营：<?php echo $tt['business'];?>">主营：<?php echo $tt['business'];?></div>
</li>
<?php } } ?>
</ul>

</div>
</div>
</div>
</li>
<?php } } ?>

</ul>
</div>
<!-- [主体部分结束] -->
<div class="mt5">&nbsp;</div>
<div class="m ilinks">
<dl class="clearfix">
<dt>友情链接：</dt>
<?php $cont = tag("table=link&condition=status=3 and username=''&areaid=$cityid&pagesize=".$DT['page_text']."&order=listorder desc,itemid desc&template=null");?>
<?php if(is_array($cont)) { foreach($cont as $t) { ?>
<dd><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['introduce'];?>"><?php echo $t['title'];?></a><i>|</i></dd>
<?php } } ?>
<!-- <dd><a href="" target="_blank">更多</a></dd> -->
</dl>
</div>
<script type="text/javascript">
$(function(){
// var nh = $('.menu-item1').height();
if ($('.menu-item1 > li:gt(12)').size() > 0) { 
$('.menu-item1 > li:gt(12)').hide(); 
$('.menu-item1').append('<p class="Js-sly-more menu-more"><a href="javascript:;">显示更多</a><em></em></p>');
}
$('.menu-item1 > p.Js-sly-more').click(function() {
if ($('.menu-item1 > p.Js-sly-more s').size() > 0) {
$('.menu-item1 > li:gt(12)').slideUp(); 
$('.menu-item1 > p.Js-sly-more').html('<a href="javascript:;">显示更多</a><em></em>'); 
}else{
$('.menu-item1 > li').slideDown();
$('.menu-item1 > p.Js-sly-more').html('<a href="javascript:;">隐藏显示</a><s></s>');
}

});
});
</script>
<script type="text/javascript">
if(get_cookie('auth')) {
$('.iuser_l')[0].title = '会员中心';
$('.iuser_l')[0].href = '<?php echo $MODULE['2']['linkurl'];?>';
$('.iuser_l')[0].className = 'iuser_u';
$('.iuser_r')[0].title = '完善我的资料';
$('.iuser_r')[0].href = '<?php echo $MODULE['2']['linkurl'];?>edit.php';
$('.iuser_r')[0].className = 'iuser_e';
}
</script>
<?php include template('footer');?>