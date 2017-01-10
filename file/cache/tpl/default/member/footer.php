<?php defined('IN_DESTOON') or exit('Access Denied');?></div>
</div>
<div class="footer2 cb">
<div class="m">
<div class="tac">
<?php $cont = tag("table=webpage&condition=item=4&areaid=$cityid&order=listorder desc,itemid desc&template=null");?>
<?php if(is_array($cont)) { foreach($cont as $k => $t) { ?>
<?php if($k) { ?><i>|</i><?php } ?>
<a href="<?php if($t['domain']) { ?><?php echo $t['domain'];?><?php } else { ?><?php echo linkurl($t['linkurl'], 1);?><?php } ?>
" target="_blank"><?php echo $t['title'];?></a>
<?php } } ?>
<?php $cont = tag("table=webpage&condition=item=1&areaid=$cityid&order=listorder desc,itemid desc&template=null");?>
<?php if(is_array($cont)) { foreach($cont as $k => $t) { ?>
<i>|</i><a href="<?php if($t['domain']) { ?><?php echo $t['domain'];?><?php } else { ?><?php echo linkurl($t['linkurl'], 1);?><?php } ?>
" target="_blank"><?php echo $t['title'];?></a>
<?php } } ?>
</div>
<p><?php echo $DT['copyright'];?><a href="http://www.miitbeian.gov.cn" target="_blank"><?php echo $DT['icpno'];?></a></p>
</div>
</div>
<div class="back2top"><a href="javascript:void(0);" title="返回顶部">&nbsp;</a></div>
<script type="text/javascript">
//if(document.body.clientHeight > Dd('main').scrollHeight) Dd('main').style.height=document.body.clientHeight+'px';
var destoon_message = <?php echo $_message;?>;
var destoon_chat = <?php echo $_chat;?>;
<?php if($_message && $_sound) { ?>
if(window.location.href.indexOf('message.php') == -1) $('#destoon_space').html(sound('message_<?php echo $_sound;?>'));
<?php } ?>
<?php if($_message) { ?>
Dnotification('new_message', '<?php echo $MODULE['2']['linkurl'];?>message.php', '<?php echo useravatar($_username, 'large');?>', '站内信 (<?php echo $_message;?>)', '收到新的站内信件，点击查看');
<?php } ?>
<?php if($_userid && $DT['pushtime']) { ?>
window.setInterval('PushNew()',<?php echo $DT['pushtime'];?>*5000);
<?php } ?>
if($('#mini_profile').length > 0) {
$('#my_profile').mouseover(function(){
$('#mini_profile').show('fast');
$('#my_profile').bind('mouseleave',function(){ 
$('#mini_profile').hide(); 
});
}); 
}
var destoon_cart = get_cart();
$('#destoon_cart').text(destoon_cart);
//jQuery(".sideMenu").slide({titCell:"h3", targetCell:"p",effect:"slideDown",delayTime:300,trigger:"click"});2016.12.23周毅注释
$(function(){
// var curr_sly = 0;
// <?php if($curr_sly) { ?>
// curr_sly = <?php echo $curr_sly;?>;
// <?php } ?>
// // $(".sideMenu h3.on").find("span").html("-");
// if (curr_sly) {
// $(".sideMenu h3").click(function(){
// $(this).find("span").html("-");
// $(this).siblings("h3").find("span").html("+");
// });
// $(".sideMenu h3").eq(curr_sly).click();
// } else {
$(".sideMenu p a").each(function(index, el) {
if($(this).hasClass('current')){
$(this).parent('p').prev('h3').click();
}
});
//}
/*关闭OK提示层*/
setTimeout(function(){
$('.ok').fadeOut('400');
},5000); 

});
</script>
</body>
</html>
