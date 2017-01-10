<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html>
<html style="overflow-x:hidden;background:#3090E6">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo DT_CHARSET;?>"/>
<meta http-equiv="Cache-Control" content="no-cache"/>
<meta name="viewport" content="width=device-width; initial-scale=1.0;  minimum-scale=1.0; maximum-scale=1.0"/>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta http-equiv="Cache-Control" content="no-transform" />
<meta name="robots" content="nofollow"/>
<meta http-equiv="x-ua-compatible" content="IE=8"/>
<title><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?>
会员中心<?php echo $DT['seo_delimiter'];?><?php if($city_sitename) { ?><?php echo $city_sitename;?><?php } else { ?><?php echo $DT['sitename'];?><?php } ?>
<?php echo $DT['seo_delimiter'];?></title>
<link rel="shortcut icon" href="<?php echo DT_STATIC;?>favicon.ico"/>
<link rel="bookmark" href="<?php echo DT_STATIC;?>favicon.ico"/>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>css/base.css" />
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>ie6.css"/>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/ie6png.js"></script>
<script type="text/javascript">DD_belatedPNG.fix('*');</script>
<![endif]-->
<?php if(!DT_DEBUG) { ?><script type="text/javascript">window.onerror= function(){return true;}</script><?php } ?>
<script type="text/javascript" src="<?php echo DT_STATIC;?>lang/<?php echo DT_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/admin.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/member.js"></script>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript">var destoon_userid = <?php echo $_userid;?>;</script>
</head>
<body>
<div id="msgbox" style="display:none;"></div>
<?php echo dmsg();?>
<div class="vipheader" id="head" style="display: none;">
<div class="vip_top m">
<p>您好，欢迎来到仪表堂会员中心！</p>
<?php if($_userid) { ?>
<p class="p2"><span><a href="message.php">您有（<?php echo $_message;?>）条未读消息</a></span></p>
<?php } else { ?>
<p class="p2"><a href="<?php echo $DT['file_login'];?>">立即登录</a> |
<a href="<?php echo $DT['file_register'];?>">注册会员</a></p>
<?php } ?>
<p class="fr">
<a href="<?php echo $MODULE['5']['linkurl'];?>mylist.php">我的关注</a> |
<a href="<?php echo $MODULE['16']['linkurl'];?>mylist.php">我的收藏</a> |
<a href="<?php echo $MODULE['16']['linkurl'];?>cart.php">我的购物车(<small id="destoon_cart">0</small>)</a> |
<a href="logout.php?forward=">退出</a>
</p>
</div>
<div class="vip_logo">
<div class="m clearfix">
<!--<a href="<?php echo $MODULE['2']['linkurl'];?>"><img src="<?php echo DT_SKIN;?>images/vip_logo.png" alt="会员中心" class="fl" /></a>-->
<a href="<?php echo $MODULE['1']['linkurl'];?>" target="_blank"><img src="<?php if($MODULE[$moduleid]['logo']) { ?><?php echo DT_SKIN;?>image/logo_<?php echo $moduleid;?>.gif<?php } else if($DT['logo']) { ?><?php echo $DT['logo'];?><?php } else { ?><?php echo DT_SKIN;?>image/logo.gif<?php } ?>
" class="fl" alt="<?php echo $DT['sitename'];?>"/></a>
<div class="vip_nav fr">
<a href="<?php echo $MODULE['2']['linkurl'];?>">会员中心</a>
<a href="authen.php" <?php if($filename_sly == 'authen') { ?>class="current"<?php } ?>
>企业认证</a>
<a href="kaidian.php" <?php if($filename_sly == 'kaidian') { ?>class="current"<?php } ?>
>开通商铺</a>
<a href="/about/11.html">帮助中心</a>
</div>
</div>
</div>
</div>
<!-- <div class="head_s" id="destoon_space">&nbsp;</div> -->
<?php $filename_sly= str_replace('.php','',basename($_SERVER['PHP_SELF'])); ?>
<div class="left fl sideMenu" style="display: none;">
<ul id="left_nav">
<h3><a href="javascript:;"><b>购买订单</b><span class="fr">+</span></a></h3>
<p>
<a href="trade.php?action=order" <?php if(($filename_sly == 'trade' && $action=='order') || ($step == 'detail' && $td['buyer'] == $_username)) { ?>class="current"<?php } ?>
>购买订单</a>
<a href="address.php" <?php if($filename_sly == 'address') { ?>class="current"<?php } ?>
>收货地址管理</a>
</p>
<h3><a href="javascript:;"><b>销售订单</b><span class="fr">+</span></a></h3>
<p style="display: none;">
<a href="trade.php?action=index" <?php if(($step == 'detail' && $td['buyer'] != $_username) || ($action=='index' && $filename_sly == 'trade')) { ?>class="current"<?php } ?>
>销售订单</a>
<a href="cash.php?action=setting" <?php if($filename_sly == 'cash') { ?>class="current"<?php } ?>
>收款账号管理</a>
</p>
<h3><a href="javascript:;"><b>企业产品</b><span class="fr">+</span></a></h3>
<p style="display: none;">
<a href="fenlei.php" <?php if($filename_sly == 'fenlei') { ?>class="current"<?php } ?>
>产品分类</a>
<a href="<?php echo $DT['file_my'];?>?mid=23" <?php if($filename_sly == 'my' && $mid == 23) { ?>class="current"<?php } ?>
>厂商管理</a>
<a href="<?php echo $DT['file_my'];?>?mid=13" <?php if($filename_sly == 'my' && $mid == 13) { ?>class="current"<?php } ?>
>品牌管理</a>
<a href="<?php echo $DT['file_my'];?>?mid=5&action=addchoose" <?php if($filename_sly == 'my' && $mid == 5 && ($action=='addchoose' || $action == 'add')) { ?>class="current"<?php } ?>
>发布产品</a>
<a href="<?php echo $DT['file_my'];?>?mid=5&status=2" <?php if($filename_sly == 'my' && $mid == 5 && $status==2) { ?>class="current"<?php } ?>
>待审核产品</a>
<a href="<?php echo $DT['file_my'];?>?mid=5" <?php if($filename_sly == 'my' && $mid == 5 && $status==3) { ?>class="current"<?php } ?>
>已通过产品</a>
<a href="<?php echo $DT['file_my'];?>?mid=5&status=1" <?php if($filename_sly == 'my' && $mid == 5 && $status==1) { ?>class="current"<?php } ?>
>未通过产品</a>
<a href="<?php echo $DT['file_my'];?>?mid=5&status=4" <?php if($filename_sly == 'my' && $mid == 5 && $status==4) { ?>class="current"<?php } ?>
>停产产品</a>
<a href="<?php echo $DT['file_my'];?>?mid=25" <?php if($filename_sly == 'my' && $mid == 25) { ?>class="current"<?php } ?>
>营销管理</a>
</p>
<h3><a href="javascript:;"><b>店铺管理</b><span class="fr">+</span></a></h3>
<p style="display: none;">
<a href="kaidian.php" <?php if($filename_sly == 'kaidian') { ?>class="current"<?php } ?>
>商铺信息</a>
<a href="shopfenlei.php" <?php if($filename_sly == 'shopfenlei') { ?>class="current"<?php } ?>
>商品分类</a>
<a href="<?php echo $DT['file_my'];?>?mid=16&action=addchoose" <?php if($filename_sly == 'my' && $mid == 16 && ($action=='addchoose' || $action == 'add')) { ?>class="current"<?php } ?>
>发布商品</a>
<a href="<?php echo $DT['file_my'];?>?mid=16" <?php if($filename_sly == 'my' && $mid == 16 && $status==3) { ?>class="current"<?php } ?>
>已发布商品</a>
<a href="express.php" <?php if($filename_sly == 'express') { ?>class="current"<?php } ?>
>运费模板</a>
<a href="<?php echo $DT['file_my'];?>?mid=16&status=4" <?php if($filename_sly == 'my' && $mid == 16 && $status==4) { ?>class="current"<?php } ?>
>下架商品</a>
</p>
<h3><a href="javascript:;"><b>消息管理</b><span class="fr">+</span></a></h3>
<p style="display: none;">
<a href="message.php" <?php if($filename_sly == 'message') { ?>class="current"<?php } ?>
>系统消息</a>
<a href="<?php echo $MODULE['5']['linkurl'];?>mylist.php" target="_blank">我的关注</a>
<a href="<?php echo $MODULE['16']['linkurl'];?>mylist.php" target="_blank">我的收藏</a>
</p>
<h3><a href="javascript:;"><b>账号管理</b><span class="fr">+</span></a></h3>
<p style="display: none;">
<a href="edit.php" <?php if($filename_sly == 'edit' || $filename_sly == 'avatar') { ?>class="current"<?php } ?>
>基本信息</a>
<a href="password.php" <?php if($filename_sly == 'password') { ?>class="current"<?php } ?>
>修改密码</a>
<a href="authen.php" <?php if($filename_sly == 'authen') { ?>class="current"<?php } ?>
>企业信息</a>
<a href="home_set.php" <?php if($filename_sly == 'home_set') { ?>class="current"<?php } ?>
>主页设置</a>
</p>
<h3><a href="javascript:;"><b>增值服务</b><span class="fr">+</span></a></h3>
<p style="display: none;">
<a href="charge.php?action=pay" <?php if($filename_sly == "charge") { ?>class="current"<?php } ?>
>在线充值</a>
<a href="record.php" <?php if($filename_sly == "record") { ?>class="current"<?php } ?>
>财务流水</a>
<?php if($_groupid == 8) { ?>
<a href="pushed.php" <?php if($filename_sly == "pushed") { ?>class="current"<?php } ?>
>推送管理</a>
<!-- <a href="<?php echo $MODULE['24']['linkurl'];?>" target="_blank"><?php echo $MODULE['24']['name'];?></a> -->
<?php } ?>
<?php if($_groupid == 7 || $_groupid == 6) { ?><a href="pushlog.php" <?php if($filename_sly == "pushlog") { ?>class="current"<?php } ?>
>推送记录</a><?php } ?>
</p>
</ul>
</div>
