<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo DT_CHARSET;?>"/>
<meta name="robots" content="nofollow"/>
<meta http-equiv="x-ua-compatible" content="IE=8"/>
<title><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?>
会员中心<?php echo $DT['seo_delimiter'];?><?php if($city_sitename) { ?><?php echo $city_sitename;?><?php } else { ?><?php echo $DT['sitename'];?><?php } ?>
<?php echo $DT['seo_delimiter'];?></title>
<link rel="shortcut icon" href="<?php echo DT_STATIC;?>favicon.ico"/>
<link rel="bookmark" href="<?php echo DT_STATIC;?>favicon.ico"/>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>css/amazeui.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>css/base.css" />
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>css/style_ybt.css" />
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
<?php if($DT_TOUCH) { ?><script type="text/javascript" src="<?php echo $EXT['mobile_url'];?>static/js/fix.js"></script><?php } ?>
<script type="text/javascript">var destoon_userid = <?php echo $_userid;?>;</script>
</head>
<body>
<div id="msgbox" style="display:none;"></div>
<?php echo dmsg();?>
<div class="vipheader" id="head">
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
<section style="width: 100%;background-size: cover;">
<img src="<?php echo DT_SKIN;?>image/person-homepage.jpg" alt="" >
<div>aaa</div>
</section>
<div class="vip_logo" style="display: none;">
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
<div class="m">
<div class="mhlf"></div>
<div class="mhrg">
</div>
</div>
<div class="vip_main m clearfix" style="display: none;">
<div class="left fl sideMenu">
<ul id="left_nav">
<h3><a href="javascript:;"><b>账号管理</b><span class="fr">+</span></a></h3>
<p>
<a href="edit.php" <?php if($filename_sly == 'edit' || $filename_sly == 'avatar') { ?>class="current"<?php } ?>
>基本信息</a>
<a href="authen.php" <?php if($filename_sly == 'authen') { ?>class="current"<?php } ?>
>企业信息</a>
<a href="home_set.php" <?php if($filename_sly == 'home_set') { ?>class="current"<?php } ?>
>主页设置</a>
<a href="address.php" <?php if($filename_sly == 'address') { ?>class="current"<?php } ?>
>收货地址管理</a>
<a href="password.php" <?php if($filename_sly == 'password') { ?>class="current"<?php } ?>
>密码修改</a>
</p>
<h3><a href="javascript:;"><b>我的品牌</b><span class="fr">+</span></a></h3>
<p style="display: block;">
<a href="<?php echo $DT['file_my'];?>?mid=13&action=add_list" <?php if($mid == 13 && $action == 'add_list') { ?>class="current"<?php } ?>
>签约品牌</a>
<a href="<?php echo $DT['file_my'];?>?mid=13" <?php if($filename_sly == 'my' && $action != 'add_list') { ?>class="current"<?php } ?>
>我的品牌</a>
</p>
<h3><a href="javascript:;"><b>产品中心</b><span class="fr">+</span></a></h3>
<p style="display: block;">
<a href="<?php echo $DT['file_my'];?>?mid=5&action=addchoose" <?php if($filename_sly == 'my' && $mid == 5 && ($action=='addchoose' || $action == 'add')) { ?>class="current"<?php } ?>
>发布产品</a>
<a href="<?php echo $DT['file_my'];?>?mid=5" <?php if($filename_sly == 'my' && $mid == 5 && $status==3) { ?>class="current"<?php } ?>
>产品管理</a>
</p>
<h3><a href="javascript:;"><b>商城中心</b><span class="fr">+</span></a></h3>
<p style="display: block;">
<a href="kaidian.php" <?php if($filename_sly == 'kaidian') { ?>class="current"<?php } ?>
>商铺信息</a>
<a href="<?php echo $DT['file_my'];?>?mid=16" <?php if($filename_sly == 'my' && $mid == 16) { ?>class="current"<?php } ?>
>商品管理</a>
<a href="express.php" <?php if($filename_sly == 'express') { ?>class="current"<?php } ?>
>运费模板</a>
</p>
<h3><a href="javascript:;"><b>订单管理</b><span class="fr">+</span></a></h3>
<p style="display: block;">
<a href="trade.php?action=index" <?php if(($step == 'detail' && $td['buyer'] != $_username) || ($action=='index' && $filename_sly == 'trade')) { ?>class="current"<?php } ?>
>销售订单</a>
<a href="trade.php?action=order" <?php if(($filename_sly == 'trade' && $action=='order') || ($step == 'detail' && $td['buyer'] == $_username)) { ?>class="current"<?php } ?>
>购买订单</a>
</p>
<h3><a href="javascript:;"><b>财务管理</b><span class="fr">+</span></a></h3>
<p style="display: block;">
<a href="record.php" <?php if($filename_sly == "record") { ?>class="current"<?php } ?>
>财务流水</a>
<a href="charge.php?action=pay" <?php if($filename_sly == "charge") { ?>class="current"<?php } ?>
>在线充值</a>
<a href="cash.php?action=index" <?php if($filename_sly == 'cash') { ?>class="current"<?php } ?>
>申请提现</a>
</p>
<h3><a href="javascript:;"><b>消息管理</b><span class="fr">+</span></a></h3>
<p style="display: block;">
<a href="message.php" <?php if($filename_sly == 'message') { ?>class="current"<?php } ?>
>系统消息</a>
<?php if($_groupid == 8) { ?>
<a href="pushed.php" <?php if($filename_sly == "pushed") { ?>class="current"<?php } ?>
>推送管理</a>
<?php } ?>
<?php if($_groupid == 7 || $_groupid == 6) { ?><a href="pushlog.php" <?php if($filename_sly == "pushlog") { ?>class="current"<?php } ?>
>推送记录</a><?php } ?>
<a href="<?php echo $MODULE['5']['linkurl'];?>mylist.php" target="_blank">我的关注</a>
<a href="<?php echo $MODULE['16']['linkurl'];?>mylist.php" target="_blank">我的收藏</a>
</p>
</ul>
</div>
<div class="v_idx_rg fr">