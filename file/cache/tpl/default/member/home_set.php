<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<script type="text/javascript">c(3);</script>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="Tab0"><a href="javascript:Tab(0);"><span>主页设置</span></a></td>
</tr>
</table>
</div>
<form method="post" action="?" id="dform">
<input type="hidden" name="tab" id="tab" value="<?php echo $tab;?>"/>
<div id="Tabs0" style="display:;">
<table cellspacing="1" cellpadding="6" class="tb">
<tr>
<td class="tl">首页SEO标题</td>
<td class="tr f_gray"><input type="text" size="60" name="setting[seo_title]" value="<?php echo $seo_title;?>"/>&nbsp; 留空则显示公司名称</td>
</tr>
<tr>
<td class="tl">网站关键词</td>
<td class="tr"><input type="text" size="80" name="setting[seo_keywords]" value="<?php echo $seo_keywords;?>"/></td>
</tr>
<tr>
<td class="tl">网站描述</td>
<td class="tr"><input type="text" size="80" name="setting[seo_description]" value="<?php echo $seo_description;?>"/></td>
</tr>
<tr>
<td class="tl">横幅宽度</td>
<td class="tr">
<input type="text" size="5" name="setting[bannerw]" value="<?php echo $bannerw;?>" id="bannerw" disabled/> px
&nbsp;&nbsp;&nbsp;&nbsp;高度
<input type="text" size="5" name="setting[bannerh]" value="<?php echo $bannerh;?>" id="bannerh" disabled/> px
</td>
</tr>
<tr style="display:none;">
<td class="tl">横幅显示方式</td>
<td class="tr">
<input name="setting[bannert]" type="radio" id="bannert_0" value="0"<?php if($bannert==0) { ?> checked<?php } ?>
 onclick="Ds('bt_0');Dh('bt_1');Dh('bt_2');"/> <label for="bannert_0">图片</label>&nbsp;&nbsp;
<input name="setting[bannert]" type="radio" id="bannert_1" value="1"<?php if($bannert==1) { ?> checked<?php } ?>
 onclick="Dh('bt_0');Ds('bt_1');Dh('bt_2');"/> <label for="bannert_1">Flash</label>&nbsp;&nbsp;
<input name="setting[bannert]" type="radio" id="bannert_2" value="2"<?php if($bannert==2) { ?> checked<?php } ?>
 onclick="Dh('bt_0');Dh('bt_1');Ds('bt_2');"/> <label for="bannert_2">幻灯片</label>&nbsp;&nbsp;
</td>
</tr>
<tr id="bt_0" style="display:<?php if($bannert!=0) { ?>none<?php } ?>
;">
<td class="tl">横幅图片地址</td>
<td class="tr"><input name="setting[banner]" type="text" size="60" id="banner" value="<?php echo $banner;?>" readonly/>&nbsp;&nbsp;<span onclick="Dthumb(<?php echo $moduleid;?>,0,0, Dd('banner').value, true, 'banner');" class="jt">[上传]</span>&nbsp;&nbsp;<span onclick="_preview(Dd('banner').value);" class="jt">[预览]</span>&nbsp;&nbsp;<span onclick="Dd('banner').value='';" class="jt">[删除]</span></td>
</tr>
<tr id="bt_1" style="display:<?php if($bannert!=1) { ?>none<?php } ?>
;">
<td class="tl">横幅Flash地址</td>
<td class="tr"><input name="setting[bannerf]" type="text" size="60" id="bannerf" value="<?php echo $bannerf;?>" readonly/>&nbsp;&nbsp;<span onclick="Dfile(<?php echo $moduleid;?>, Dd('bannerf').value, 'bannerf', 'swf');" class="jt">[上传]</span>&nbsp;&nbsp;<span onclick="if(Dd('bannerf').value) window.open(Dd('bannerf').value);" class="jt">[预览]</span>&nbsp;&nbsp;<span onclick="Dd('bannerf').value='';" class="jt">[删除]</span> <span id="dflash" class="f_red"></span></td>
</tr>
<tbody id="bt_2" style="display:<?php if($bannert!=2) { ?>none<?php } ?>
;">
<tr>
<td class="tl f_red">系统提示</td>
<td class="tr f_gray">&nbsp;仅支持jpg格式图片，且最少上传2张</td>
</tr>
<tr>
<td class="tl">横幅图片地址1</td>
<td class="tr"><input name="setting[banner1]" type="text" size="60" id="banner1" value="<?php echo $banner1;?>" readonly/>&nbsp;&nbsp;<span onclick="Dthumb(<?php echo $moduleid;?>,Dd('bannerw').value,Dd('bannerh').value, Dd('banner1').value, true, 'banner1', 'jpg');" class="jt">[上传]</span>&nbsp;&nbsp;<span onclick="_preview(Dd('banner1').value);" class="jt">[预览]</span>&nbsp;&nbsp;<span onclick="Dd('banner1').value='';" class="jt">[删除]</span></td>
</tr>
<tr>
<td class="tl">横幅图片地址2</td>
<td class="tr"><input name="setting[banner2]" type="text" size="60" id="banner2" value="<?php echo $banner2;?>" readonly/>&nbsp;&nbsp;<span onclick="if(Dd('banner1').value==''){alert('请先上传横幅图片地址1');return false;}Dthumb(<?php echo $moduleid;?>,Dd('bannerw').value,Dd('bannerh').value, Dd('banner2').value, true, 'banner2');" class="jt">[上传]</span>&nbsp;&nbsp;<span onclick="_preview(Dd('banner2').value);" class="jt">[预览]</span>&nbsp;&nbsp;<span onclick="Dd('banner2').value='';" class="jt">[删除]</span></td>
</tr>
<tr>
<td class="tl">横幅图片地址3</td>
<td class="tr"><input name="setting[banner3]" type="text" size="60" id="banner3" value="<?php echo $banner3;?>" readonly/>&nbsp;&nbsp;<span onclick="if(Dd('banner2').value==''){alert('请先上传横幅图片地址2');return false;}Dthumb(<?php echo $moduleid;?>,Dd('bannerw').value,Dd('bannerh').value, Dd('banner3').value, true, 'banner3');" class="jt">[上传]</span>&nbsp;&nbsp;<span onclick="_preview(Dd('banner3').value);" class="jt">[预览]</span>&nbsp;&nbsp;<span onclick="Dd('banner3').value='';" class="jt">[删除]</span></td>
</tr>
<tr>
<td class="tl">横幅图片地址4</td>
<td class="tr"><input name="setting[banner4]" type="text" size="60" id="banner4" value="<?php echo $banner4;?>" readonly/>&nbsp;&nbsp;<span onclick="if(Dd('banner3').value==''){alert('请先上传横幅图片地址3');return false;}Dthumb(<?php echo $moduleid;?>,Dd('bannerw').value,Dd('bannerh').value, Dd('banner4').value, true, 'banner4');" class="jt">[上传]</span>&nbsp;&nbsp;<span onclick="_preview(Dd('banner4').value);" class="jt">[预览]</span>&nbsp;&nbsp;<span onclick="Dd('banner4').value='';" class="jt">[删除]</span></td>
</tr>
<tr>
<td class="tl">横幅图片地址5</td>
<td class="tr"><input name="setting[banner5]" type="text" size="60" id="banner5" value="<?php echo $banner5;?>" readonly/>&nbsp;&nbsp;<span onclick="if(Dd('banner4').value==''){alert('请先上传横幅图片地址4');return false;}Dthumb(<?php echo $moduleid;?>,Dd('bannerw').value,Dd('bannerh').value, Dd('banner5').value, true, 'banner5');" class="jt">[上传]</span>&nbsp;&nbsp;<span onclick="_preview(Dd('banner5').value);" class="jt">[预览]</span>&nbsp;&nbsp;<span onclick="Dd('banner5').value='';" class="jt">[删除]</span></td>
</tr>
</tbody>
<tr style="display:none;">
<td class="tl">形象视频地址</td>
<td class="tr"><input name="setting[video]" type="text" size="60" id="video" value="<?php echo $video;?>" onblur="UpdateURL();"/>&nbsp;&nbsp;<span onclick="Dfile(<?php echo $moduleid;?>, Dd('video').value, 'video', 'mp4|flv|wma|wav');" class="jt">[上传]</span>&nbsp;&nbsp;<span onclick="vs();" class="jt">[预览]</span>&nbsp;&nbsp;<span onclick="Dd('video').value='';" class="jt">[删除]</span>
<div id="v_player"></div>
<?php echo load('player.js');?>
<?php echo load('url2video.js');?>
<script type="text/javascript">
function vs() {
UpdateURL();
if(Dd('video').value.length > 5) {
Ds('v_player');
Inner('v_player', player(Dd('video').value,480,400,'',1)+'<br/><a href="javascript:" onclick="vh();" class="t">[关闭预览]</a>');
} else {
vh();
}
}
function vh() {Inner('v_player', '');Dh('v_player');}
function UpdateURL() {
var str = url2video(Dd('video').value);
if(str) Dd('video').value = str;
}
</script>
</td>
</tr>
<tr style="display:none;">
<td class="tl">网站公告</td>
<td class="tr f_gray"><textarea name="setting[announce]" id="announce" style="width:500px;height:60px;"><?php echo $announce;?></textarea><br/>支持HTML语法</td>
</tr>
<tr style="display:none;">
<td class="tl">访问次数</td>
<td class="tr">
<input type="radio" name="setting[show_stats]" value="1" id="s_s_1"<?php if($show_stats==1) { ?> checked<?php } ?>
/><label for="s_s_1"> 显示</label>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="setting[show_stats]" value="0" id="s_s_0"<?php if($show_stats==0) { ?> checked<?php } ?>
/><label for="s_s_0"> 不显示</label> 
</td>
</tr>
</table>
</div>
<table cellspacing="1" cellpadding="6" class="tb">
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 保存设置 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value=" 清空设置 " class="btn" onclick="if(confirm('确定要清空设置吗？商铺所有设置将被清空')){this.form.action='?reset=1';}else{return false;}"/></td>
</tr>
</table>
</form>
<?php echo load('clear.js');?>
<script type="text/javascript">
s('homepage');
<?php if($tab) { ?>
Tab(<?php echo $tab;?>);
<?php } else { ?>
m('Tab0');
<?php } ?>
<?php if($api_stats && $MG['stats']) { ?>
function stats_type(type) {
var stats_types = [<?php if(is_array($api_stats)) { foreach($api_stats as $k => $v) { ?><?php if($k) { ?>,<?php } ?>
'<?php echo $v;?>'<?php } } ?>];
var stats_pass = 0;
for(var i = 0; i < stats_types.length; i++) {
if(type == stats_types[i]) {
stats_pass = 1;
break;
}
}
if(stats_pass == 0) type = stats_types[0];
for(var i = 0; i < stats_types.length; i++) {
if(type == stats_types[i]) {
Ds('stats_post_'+stats_types[i]);
} else {
Dh('stats_post_'+stats_types[i]);
}
}
$('#stats_type_s').val(type);
}
stats_type('<?php echo $stats_type;?>');
<?php } ?>
<?php if($api_kf && $MG['kf']) { ?>
function kf_type(type) {
var kf_types = [<?php if(is_array($api_kf)) { foreach($api_kf as $k => $v) { ?><?php if($k) { ?>,<?php } ?>
'<?php echo $v;?>'<?php } } ?>];
var kf_pass = 0;
for(var i = 0; i < kf_types.length; i++) {
if(type == kf_types[i]) {
kf_pass = 1;
break;
}
}
if(kf_pass == 0) type = kf_types[0];
for(var i = 0; i < kf_types.length; i++) {
if(type == kf_types[i]) {
Ds('kf_post_'+kf_types[i]);
} else {
Dh('kf_post_'+kf_types[i]);
}
$('#kf_type_s').val(type);
}
}
kf_type('<?php echo $kf_type;?>');
<?php } ?>
</script>
<?php include template('footer', 'member');?>