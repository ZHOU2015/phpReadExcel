<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo DT_CHARSET;?>"/>
<title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?>
<?php if($city_sitename) { ?><?php echo $city_sitename;?><?php } else { ?><?php echo $DT['sitename'];?><?php } ?>
<?php } ?>
</title>
<?php if($head_keywords) { ?>
<meta name="keywords" content="<?php echo $head_keywords;?>"/>
<?php } ?>
<?php if($head_description) { ?>
<meta name="description" content="<?php echo $head_description;?>"/>
<?php } ?>
<?php if($head_mobile) { ?>
<meta http-equiv="mobile-agent" content="format=html5;url=<?php echo $head_mobile;?>">
<?php } ?>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DT_STATIC;?>favicon.ico"/>
<link rel="bookmark" type="image/x-icon" href="<?php echo DT_STATIC;?>favicon.ico"/>
<?php if($head_canonical) { ?>
<link rel="canonical" href="<?php echo $head_canonical;?>"/>
<?php } ?>
<?php if($EXT['archiver_enable']) { ?>
<link rel="archives" title="<?php echo $DT['sitename'];?>" href="<?php echo $EXT['archiver_url'];?>"/>
<?php } ?>
<link href="<?php echo DT_SKIN;?>css/base.css" rel="stylesheet">
<link href="<?php echo DT_SKIN;?>css/page.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>css/style_ybt.css" />
<link href="http://libs.baidu.com/fontawesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<?php if($moduleid>4) { ?><link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?><?php echo $module;?>.css"/><?php } ?>
<?php if($CSS) { ?>
<?php if(is_array($CSS)) { foreach($CSS as $css) { ?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?><?php echo $css;?>.css"/>
<?php } } ?>
<?php } ?>
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>ie6.css"/>
<![endif]-->
<?php if(!DT_DEBUG) { ?><script type="text/javascript">window.onerror=function(){return true;}</script><?php } ?>
<script type="text/javascript" src="<?php echo DT_STATIC;?>lang/<?php echo DT_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/config.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/page.js"></script>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/jquery.superslide.js"></script>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/main.js"></script>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/jquery.hovertree.0.1.2.min.js" charset="utf-8"></script>
<?php if($lazy) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery.lazyload.js"></script><?php } ?>
<?php if($JS) { ?>
<?php if(is_array($JS)) { foreach($JS as $js) { ?>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/<?php echo $js;?>.js"></script>
<?php } } ?>
<?php } ?>
<?php $searchid = ($moduleid > 3 && $MODULE[$moduleid]['ismenu'] && !$MODULE[$moduleid]['islink']) ? $moduleid : 5;?>
<script type="text/javascript">
var searchid = <?php echo $searchid;?>;
<?php if($itemid && $DT['anticopy']) { ?>
document.oncontextmenu=function(e){return false;};
document.onselectstart=function(e){return false;};
<?php } ?>
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
</head>
<body>
<div class="m"><div id="search_tips" style="display:none;"></div></div>
<div class="header">
<div class="top">
<div class="m clearfix">
<div class="left fl" id="destoon_member">您好，欢迎来到仪表堂平台!<a href="">登录</a><a href="" class="reg">免费注册</a></div>
<ul class="right fr clearfix">
<li class="fl"><script type="text/javascript">addFav('收藏本页');</script></li>
<li class="fl line">|</li>
<li class="fl buy_car"><a href="<?php echo $MODULE['16']['linkurl'];?>cart.php" target="_blank" rel="nofollow">购物车(<small id="destoon_cart">0</small>)</a></li>
                <li class="fl line">|</li>
                <li class="fl help"><a href="<?php echo DT_PATH;?>about">帮助中心</a></li>
</ul>
</div>
</div>
<div class="m clearfix">
<div class="ilogo fl"><a href="<?php echo $MODULE['1']['linkurl'];?>"><img src="<?php if($MODULE[$moduleid]['logo']) { ?><?php echo DT_SKIN;?>image/logo_<?php echo $moduleid;?>.gif<?php } else if($DT['logo']) { ?><?php echo $DT['logo'];?><?php } else { ?><?php echo DT_SKIN;?>images/logo.png<?php } ?>
" height="73" width="249" alt="<?php echo $DT['sitename'];?>" /></a></div>
<div class="isearch fl">
<?php $sea_mid = in_array($moduleid, array(16, 4)) ? $moduleid : 5; ?>
<ul class="isearch_tab" id="search_globel">
<li><a href="javascript:;" <?php if($sea_mid == 5) { ?>class="on"<?php } ?>
 data-mid="5">产品</a></li>
                <li><a href="javascript:;" <?php if($sea_mid == 16) { ?>class="on"<?php } ?>
 data-mid="16">商城</a></li>
<li><a href="javascript:;" <?php if($sea_mid == 4) { ?>class="on"<?php } ?>
 data-mid="4">企业</a></li>
</ul>
<div class="isearch_con" id="search_sly">
<form action="<?php echo $MODULE[$sea_mid]['linkurl'];?>search.php" onsubmit="return search_sly();">
<input type="hidden" name="moduleid" value="<?php echo $sea_mid;?>" id="destoon_moduleid"/>
<input type="hidden" name="spread" value="0" id="destoon_spread"/>
<input type="text" name="kw" class="isearch_txt" value="<?php echo $kw;?>" autocomplete="off"/>
<input type="submit" name="submit" class="isearch_btn" />
</form>
<div class="ajax_search_keyw" id="ajax_search_keyw"></div>
</div>
<ul class="isearch_key" id="destoon_word">
<?php echo tag("moduleid=$searchid&table=keyword&condition=moduleid=$searchid and status=3&pagesize=10&order=total_search desc&template=list-search_kw");?>
</ul>
</div>
<div class="ihotline fr">
<p>服务热线：</p>
<h1><?php echo $DT['telephone'];?></h1>
</div>
</div>
</div>
