<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header',$module);?>
<?php echo load('profile.js');?>
<?php if($is_company && !$_edittime) { ?>
<div class="warn">您的详细资料尚未完善！请尽快完善</div>
<?php } ?>
<?php if(isset($success)) { ?>
<div class="ok">资料保存成功！</div>
<?php } ?>
<div class="right fr">
<h2><b>基本信息</b></h2>
<div class="upd_phone mt20">
<form method="post" action="?" onsubmit="return Dcheck();" id="dform">
<div class="upd_phnitm clearfix">
<h3 class="fl">用户名：</h3>
<p class="fl tac"><?php echo $_username;?></p>
</div>
<div class="upd_phnitm clearfix">
<h3 class="fl mt20">会员头像：</h3>
<p class="fl tac"><span><a href="avatar.php" style="padding:0;"><img src="<?php echo useravatar($_username, 'large');?>&time=<?php echo $DT_TIME;?>" width="100" />修改头像</a></span></p>
</div>
<?php if($vmobile) { ?>
<div class="upd_phnitm clearfix">
<h3 class="fl"><span class="f_red">*</span> 手机号：</h3>
<p class="fl">
<input type="hidden" name="post[mobile]" id="mobile" value="<?php echo $mobile;?>"/><?php echo $mobile;?><a href="send.php?action=mobile" class="t">[修改]</a>
<!-- <input type="" name="" id="" value="" /><input type="" name="" id="" value="" class="w138" /><i class="yzm">获取验证码</i><a href="">保存</a> -->
</p>
</div>
<?php } else { ?>
<div class="upd_phnitm clearfix">
<h3 class="fl"><span class="f_red">*</span> 手机号：</h3>
<p class="fl">
<input type="text" name="post[mobile]" id="mobile" value="<?php echo $mobile;?>" onblur="validator('mobile')"/>
<input type="text" name="yzm" id="yzm" value="" class="w138" />
            <input type="button" class="yzm" id="send_scode" onclick="SendSCode();" value="获取验证码">
            <!--
            <i class="yzm">获取验证码</i>
            -->
            &nbsp;<span id="dmobile" class="f_red"></span></a>
</p>
</div>
<?php } ?>
<?php if($vtruename) { ?>
<div class="upd_phnitm clearfix">
<h3 class="fl"><span class="f_red">*</span> 姓名：</h3>
<p class="fl"><input type="hidden" name="post[truename]" id="truename" value="<?php echo $truename;?>"/><?php echo $truename;?>&nbsp;&nbsp;已认证</p>
</div>
<?php } else { ?>
<div class="upd_phnitm clearfix">
<h3 class="fl"><span class="f_red">*</span> 姓名：</h3>
<p class="fl"><input type="text" size="10" name="post[truename]" id="truename" value="<?php echo $truename;?>"/>&nbsp;<span id="dtruename" class="f_red"></span></p>
</div>
<?php } ?>
<div class="upd_phnitm clearfix">
<h3 class="fl"><span class="f_red">*</span> 性别：</h3>
<p class="fl">
<input type="radio" name="post[gender]" value="1" <?php if($gender==1) { ?>checked="checked"<?php } ?>
/> 先生 &nbsp; &nbsp;
<input type="radio" name="post[gender]" value="2" <?php if($gender==2) { ?>checked="checked"<?php } ?>
/> 女士
</p>
</div>
<?php if($vemail) { ?>
<div class="upd_phnitm clearfix">
<h3 class="fl"><span class="f_hid">*</span> 邮箱：</h3>
<p class="fl"><?php echo $_email;?><?php if($DT['mail_type'] != 'close') { ?>&nbsp;&nbsp;<a href="send.php?action=email" class="t">[修改]</a><?php } ?>
</p>
</div>
<?php } else { ?>
<div class="upd_phnitm clearfix">
<h3 class="fl"><span class="f_hid">*</span> 邮箱：</h3>
<p class="fl"><input type="text" size="20" name="post[email]" id="email" value="<?php echo $email;?>"/></p>
</div>
<?php } ?>
<div class="upd_phnitm clearfix">
<h3 class="fl"><span class="f_red">*</span> 所在地区：</h3>
<p class="fl"><?php echo ajax_area_select('post[areaid]', '请选择', $areaid);?>&nbsp;<span id="dareaid" class="f_red"></span></p>
</div>
<div class="upd_phnitm clearfix">
<h3 class="fl">联系地址：</h3>
<p class="fl"><input type="text" size="40" name="post[address]" id="daddress" value="<?php echo $address;?>"/>&nbsp;<span id="ddaddress" class="f_red"></span></p>
</div>
<div class="upd_phnitm clearfix">
<h3 class="fl">邮政编码：</h3>
<p class="fl"><input type="text" size="8" name="post[postcode]" id="postalcode" value="<?php echo $postcode;?>"/></p>
</div>
<div class="upd_phnitm clearfix">
<h3 class="fl">联系电话：</h3>
<p class="fl"><input type="text" size="20" name="post[telephone]" id="telephone" value="<?php echo $telephone;?>"/>&nbsp;<span id="dtelephone" class="f_red"></span></p>
</div>
<div class="upd_phnitm clearfix">
<h3 class="fl">部门：</h3>
<p class="fl"><input type="text" size="20" name="post[department]" id="department" value="<?php echo $department;?>"/></p>
</div>
<div class="upd_phnitm clearfix">
<h3 class="fl">职位：</h3>
<p class="fl"><input type="text" size="20" name="post[career]" id="career" value="<?php echo $career;?>"/></p>
</div>
<?php if($DT['im_qq']) { ?>
<div class="upd_phnitm clearfix">
<h3 class="fl">QQ：</h3>
<p class="fl"><input type="text" name="post[qq]" id="qq" value="<?php echo $qq;?>"/></p>
</div>
<?php } ?>
<div class="upd_phnitm clearfix">
<h3 class="fl">微信：</h3>
<p class="fl"><input type="text" name="post_fields[weixin]" id="weixin" value="<?php echo $weixin;?>"/></p>
</div>
<?php if($_groupid > 5) { ?>
<input type="hidden" name="post[catid]" value="<?php echo $catid;?>">
<input type="hidden" name="post[type]" value="<?php echo $type;?>">
<input type="hidden" name="post[thumb]" value="<?php echo $thumb;?>">
<input type="hidden" name="post[business]" value="<?php echo $business;?>">
<input type="hidden" name="post[mail]" value="<?php echo $mail;?>">
<input type="hidden" name="post[capital]" value="<?php echo $capital;?>">
<input type="hidden" name="post[regyear]" value="<?php echo $regyear;?>">
<input type="hidden" name="post[mode]" value="<?php echo $mode;?>">
<input type="hidden" name="post[regunit]" value="<?php echo $regunit;?>">
<input type="hidden" name="post[address]" value="<?php echo $address;?>">
<input type="hidden" name="post[telephone]" value="<?php echo $telephone;?>">
<p style="display:none;"><input type="text" name="post[content]" value="<?php echo $content;?>"></p>
<?php } ?>

<div class="upd_phnitm clearfix" style="display:none;">
<h3 class="fl">站内信提示音</h3>
<div id="audition"></div>
<p class="fl">
<input type="radio" name="post[sound]" value="0" <?php if($sound==0) { ?>checked="checked"<?php } ?>
 id="sound_0"/><label for="sound_0"> 无</label>&nbsp;&nbsp;
<input type="radio" name="post[sound]" value="1" <?php if($sound==1) { ?>checked="checked"<?php } ?>
 id="sound_1"/> <a href="javascript:Inner('audition', sound('message_1'));Dd('sound_1').checked=true;void(0);" title="点击试听">提示音1</a>&nbsp;&nbsp;
<input type="radio" name="post[sound]" value="2" <?php if($sound==2) { ?>checked="checked"<?php } ?>
 id="sound_2"/> <a href="javascript:Inner('audition', sound('message_2'));Dd('sound_2').checked=true;void(0);" title="点击试听">提示音2</a>&nbsp;&nbsp;
<input type="radio" name="post[sound]" value="3" <?php if($sound==3) { ?>checked="checked"<?php } ?>
 id="sound_3"/> <a href="javascript:Inner('audition', sound('message_3'));Dd('sound_3').checked=true;void(0);" title="点击试听">提示音3</a>&nbsp;&nbsp;
</p>
</div>
<?php if($MFD) { ?><?php echo fields_html('<td class="tl">', '<td class="tr">', $user, $MFD);?><?php } ?>
<div class="upd_phnitm clearfix">
<h3 class="fl">&nbsp;&nbsp;</h3>
<p class="fl"><input type="submit" name="submit" value=" 保 存 " class="btn_g"/></p>
</div>
</form>
</div>
</div>
<?php echo load('clear.js');?>
<script type="text/javascript">
var vid = '';
function validator(id) {
if(!Dd(id).value) return false;
vid = id;
makeRequest('moduleid=<?php echo $moduleid;?>&action=member&job='+id+'&value='+Dd(id).value+'&userid=<?php echo $userid;?>', AJPath, '_validator');
}
function _validator() {
if(xmlHttp.readyState==4 && xmlHttp.status==200) {
Dd('d'+vid).innerHTML = xmlHttp.responseText ? xmlHttp.responseText : '';
}
}
function Dcheck() {
if (Dd('mobile').value == '') {
Dmsg('请填写手机号', 'mobile');
return false;
}
if(Dd('truename').value == '') {
Dmsg('请填写真实姓名', 'truename');
return false;
}
if(Dd('areaid_1').value == 0) {
Dmsg('请选择所在地', 'areaid');
return false;
}
<?php if($MFD) { ?><?php echo fields_js($MFD);?><?php } ?>
return true;
}
function SendSCode() {
if(Dd('dmobile').innerHTML.indexOf('right') == -1) {
Dd('mobile').focus();
//return;
}
makeRequest('action=<?php echo $action_sendscode;?>&value='+Dd('mobile').value, 'edit.php', '_SendSCode');
Dh('sendsok');
Dd('send_scode').value = '正在发送';
Dd('send_scode').disabled = true;
}
function _SendSCode() {
var f = 'mobile';
if(xmlHttp.readyState==4 && xmlHttp.status==200) {
Dd('send_scode').value = xmlHttp.responseText == 1 ? '发送成功' : '立即发送';
Dd('send_scode').disabled = xmlHttp.responseText == 1 ? true : false;
if(xmlHttp.responseText == 1) {
Dd('dsendok').innerHTML = '<img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/ico_mailok.gif" align="absmiddle"/> <span class="f_green">短信发送成功</span>';
StopSCode();
} else if(xmlHttp.responseText == 2) {
err_msg('手机号码格式错误，请检查', f);
Df(f);
} else if(xmlHttp.responseText == 3) {
err_msg('手机号码已存在，请更换', f);
Df(f);
} else if(xmlHttp.responseText == 5) {
alert('短信发送过快，请稍后再试');
} else if(xmlHttp.responseText == 6) {
alert('尝试发送次数太多，请稍后再试');
} else {
alert('未知错误，请重试');
}
}
}
function StopSCode() {
Dd('send_scode').disabled = true;
var i = 180;
var interval=window.setInterval(
function() {
if(i == 0) {
Dd('send_code').value = '立即发送';
Dd('send_code').disabled = false;
clearInterval(interval);
} else {
Dd('send_code').value = '重新发送('+i+')';
i--;
}
},
1000);
}
</script>
<?php include template('footer',$module);?>