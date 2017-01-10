<?php defined('IN_DESTOON') or exit('Access Denied');?><html>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=<?php echo DT_CHARSET;?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>会员积分</title>
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
    <link href="http://libs.baidu.com/fontawesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <?php if($moduleid>4) { ?>
    <link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?><?php echo $module;?>.css"/>
    <?php } ?>
    <?php if($CSS) { ?>
    <?php if(is_array($CSS)) { foreach($CSS as $css) { ?>
    <link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?><?php echo $css;?>.css"/>
    <?php } } ?>
    <?php } ?>
    <!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>ie6.css"/>
    <![endif]-->
    <?php if(!DT_DEBUG) { ?>
    <script type="text/javascript">window.onerror = function () {
        return true;
    }</script>
    <?php } ?>
    <script type="text/javascript" src="<?php echo DT_STATIC;?>lang/<?php echo DT_LANG;?>/lang.js"></script>
    <script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/config.js"></script>
    <script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery.js"></script>
    <script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/common.js"></script>
    <script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/page.js"></script>
    <script type="text/javascript" src="<?php echo DT_SKIN;?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo DT_SKIN;?>js/jquery.superslide.js"></script>
    <script type="text/javascript" src="<?php echo DT_SKIN;?>js/main.js"></script>
    <?php if($lazy) { ?>
    <script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery.lazyload.js"></script>
    <?php } ?>
    <?php if($JS) { ?>
    <?php if(is_array($JS)) { foreach($JS as $js) { ?>
    <script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/<?php echo $js;?>.js"></script>
    <?php } } ?>
    <?php } ?>
    <?php $searchid = ($moduleid > 3 && $MODULE[$moduleid]['ismenu'] && !$MODULE[$moduleid]['islink']) ? $moduleid : 5;?>
    <script type="text/javascript">
        var searchid = <?php echo $searchid;?>;
        {
            if $itemid && $DT[anticopy]}
        document.oncontextmenu = function (e) {
            return false;
        };
        document.onselectstart = function (e) {
            return false;
        };
        {/
            if}
    </script>
    
    
    
    <!--禁止微信浏览器以外的网页打开链接-->
    <script type="text/javascript">
        // 对浏览器的UserAgent进行正则匹配，不含有微信独有标识的则为其他浏览器
        var useragent = navigator.userAgent;
        if ((useragent.match(/MicroMessenger/i) != 'MicroMessenger') && (useragent.match(/QQ/i) != 'QQ')) {
            // 这里警告框会阻塞当前页面继续加载
            alert('已禁止本次访问：您必须使用微信内置浏览器或者QQ浏览器访问本页面！');
            // 以下代码是用javascript强行关闭当前页面
            var opened = window.open('about:blank', '_self');
            opened.opener = null;
            opened.close();
        }
    </script>
</head>
<!--头部2-->
<div class="head2" style="width:100%;padding-bottom: 10px;">
    <div class="minilogo">
        <!--<a href="<?php echo $MODULE['1']['linkurl'];?>" class="fl db"><img src="<?php echo DT_SKIN;?>images/minilogo.png" alt="<?php echo $DT['sitename'];?>" /></a>-->
        <a href="<?php echo $MODULE['1']['linkurl'];?>" class="fl db"><img
                src="<?php if($MODULE[$moduleid]['logo']) { ?><?php echo DT_SKIN;?>image/logo_<?php echo $moduleid;?>.gif<?php } else if($DT['logo']) { ?><?php echo $DT['logo'];?><?php } else { ?><?php echo DT_SKIN;?>images/logo.png<?php } ?>
"
                height="73" width="249" alt="<?php echo $DT['sitename'];?>"/></a></a>
        <span class="fl">会员积分</span>
    </div>
</div>