<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="max footer">
<div class="m footer_t clearfix">
<div class="fl clearfix">
<?php $cont=tag("table=webpage_item&condition=1&pagesize=4&order=orderlist desc,itemid asc&template=null");?>
<?php if(is_array($cont)) { foreach($cont as $j) { ?>
<dl>
<dt><?php echo $j['name'];?></dt>
<?php echo tag("table=webpage&condition=item=".$j['itemid']."&areaid=$cityid&order=listorder desc,itemid desc&template=list-webpage");?>
</dl>
<?php } } ?>
</div>
<div class="fr">
<h1>关注官方微信</h1>
<img src="<?php echo DT_SKIN;?>images/weixincd.jpg" height="119" width="119" alt="" />
</div>
</div>
<div class="m footer_b">
<p><?php echo $DT['copyright'];?><a href="http://www.miitbeian.gov.cn" target="_blank"><?php echo $DT['icpno'];?></a>未经书面授权,所有页面内容不得以任何形式进行复制  <script src="http://s4.cnzz.com/z_stat.php?id=1260225002&web_id=1260225002" language="JavaScript"></script></p>
<ul class="clearfix">
<?php $now=time(); $ads=tag("table=ad&condition=pid=28 AND fromtime <".$now." AND totime>".$now."&order=listorder asc&pagesize=5&template=null");?>
<ul>
<?php if(is_array($ads)) { foreach($ads as $v) { ?>
<li><a href="<?php echo $v['image_url'];?>" target="_blank"><img src="<?php echo $v['image_src'];?>" alt="<?php echo $v['title'];?>" title="<?php echo $v['title'];?>" /></a></li>
<?php } } ?>
</ul>
</div>
</div>
<div class="slid bdsharebuttonbox dn">
<a href="tencent://message/?Uin=1561651&websiteName=q-zone.qq.com&Menu=yes" class="s_qq"></a>
<a href="" class="s_sina bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
<a href="javascript:;" class="s_weixin"><div class="iprcode"><img src="<?php echo DT_SKIN;?>images/prcode.png" alt="" /><h1>关注官方微信</h1></div></a>
<a href="javascript:;" class="s_gotop"></a>
</div>
<?php if(DT_DEBUG) { ?><div class="px11"><?php echo debug();?></div><?php } ?>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/slide.js"></script>
<!--<div class="back2top"><a href="javascript:void(0);" title="返回顶部">&nbsp;</a></div>-->
<script type="text/javascript">
<?php if($destoon_task) { ?>
show_task('<?php echo $destoon_task;?>');
<?php } else { ?>
<?php include DT_ROOT.'/api/task.inc.php';?>
<?php } ?>
<?php if($lazy) { ?>$(function(){$("img").lazyload();});<?php } ?>
</script>
<div class="floating_ck">
<dl>
    <dt></dt>
<dd class="words">
        <span>服务热线</span>
            <div class="floating_left zsrx">
            <i style=" line-height:75px; color:#fff; font:14px; margin-right:10px; font-style:normal; ">400-618-1990</i>
            </div>
        </dd>
        <dd class="consult">
        <span>在线咨询</span>
        <div class="floating_left" style="height:120px !important;">
            <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=283329167&amp;site=qq&amp;menu=yes" style="line-height:50px !important;">客服咨询1：283329167</a><br>
<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=3224851323&amp;site=qq&amp;menu=yes" style="line-height:25px !important;">客服咨询2：3224851323</a><br>
            </div>
        </dd>
        
        <dd class="qrcord">
        <span>扫一扫</span>
            <div class="floating_left floating_ewm">
            <i></i>
            </div>         
        </dd>
        <dd class="return returntop">
        <span>返回顶部</span>
        </dd>
    </dl>
</div>
<style>
.floating_ck{position:fixed;right:0;top:30%;}
.floating_ck dl dd{position:relative;width:80px;height:80px;background-color:rgba(130, 130, 130, 0.83);border-bottom:solid 1px #FFFFFF;text-align:right;background-repeat:no-repeat;background-position:center 20%;cursor:pointer;}
.floating_ck dl dd:hover{background-color:#ae1c1c;border-bottom:solid 1px #a40324;}
.floating_ck dl dd:hover .floating_left{display:block;}
.words{background-image:url(/skin/default/image/zsrx.png);}
.consult{background-image:url(/skin/default/image/zxicon.png);}
.quote{background-image:url(/skin/default/image/kficon.png);}
.qrcord{background-image:url(/skin/default/image/erweima.png);}
.return{background-image:url(/skin/default/image/fanhui.png);}
.floating_ck dd span{color:#fff;display:block;padding-top:54px; text-align:center;}
.floating_left{position:absolute;left:-150px;top:0px;width:150px;height:80px;background: #ae1c1c;border-bottom:solid 1px #a40324;display:none;}
.floating_left a{color:#fff;line-height:80px; margin-right: 10px;}
.zsrx{background: #ae1c1c url(/skin/default/image/dh.png) no-repeat 20px 20px;}
.floating_ewm{height:150px;top:-70px;}
.floating_ewm i{background-image:url(/skin/default/images/weixincd.jpg);display:block;width:119px;height:119px;margin:auto;margin-top:15px;}
.floating_ewm p{color:#fff;margin-top:5px;}
.floating_ewm .qrcord_p02{font-size:18px;}
</style>
<script>
$(function(){
$(".returntop span").click(function(){
$("body,html").animate({scrollTop:0},300);
})
})
</script>
</body>
</html>