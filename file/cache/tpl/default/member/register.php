<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header-reg');?>
<!--头部2 结束-->
<div class="reg_m">
<div class="m">
<iframe src="" name="send" id="send" style="display:none;"></iframe>
<div class="reg_box clearfix">
<div class="fl"><img src="<?php echo DT_SKIN;?>images/reg_ico.png" alt="" /></div>
<div class="fr">
<ul class="reg_form">
<form action="<?php echo $DT['file_register'];?>" method="post" target="send" onsubmit="return check();">
<input name="action" type="hidden" id="action" value="<?php echo crypt_action('register');?>"/>
<input name="forward" type="hidden" value="<?php echo $forward;?>"/>
<label style="display:none;"> <input type="radio" name="post[regid]" value="5" id="g_5" onclick="reg(1);" checked/><?php echo $GROUP['5']['groupname'];?></label>
<li>
<label><i>*</i>用户名</label>
<input type="text" name="post[username]" id="username"  placeholder="请输入您的手机号或邮箱"  datatype="*" nullmsg="请输入您的手机号或邮箱" onblur="validator('username');" autocomplete="off" <?php if($username) { ?> value="<?php echo $username;?>" readonly<?php } ?>
/>
<span class="uuser"></span>
</li>
<li class="Validform_checktip" id="dusername"></li>
<li>
<label><i>*</i>设置密码</label>
<input type="password" placeholder="请输入密码" name="post[password]" datatype="*6-18" id="password" onblur="validator('password');" nullmsg="请输入密码" errormsg="密码长度6-18位，建议字母、数字符号两种以上组合" autocomplete="off">
<span class="unlock"></span>
</li>
<li class="Validform_checktip" id="dpassword"></li>
<li>
<label><i>*</i>密码确认</label>
<input type="password" placeholder="请再次输入密码" datatype="*" recheck="password" nullmsg="请再次输入密码" errormsg="您两次输入的账号密码不一致" name="post[cpassword]" id="cpassword" onblur="validate('cpassword');" autocomplete="off">
<span class="unlock"></span>
</li>
<li class="Validform_checktip" id="dcpassword"></li>
<!-- <li>
<label><i>*</i>手机号码</label>
<input type="text" name="post[mobile]" id="mobile"<?php if($could_mobilecode) { ?> onblur="validator('mobile');"<?php } ?>
 placeholder="请输入手机号码，接收认证信息" datatype="m" nullmsg="请输入您的手机号码" errormsg="请输入正确的手机号码">
</li> 
<li class="Validform_checktip" id="dmobile"></li>-->
<li>
<label><i>*</i>验证码</label>
<input type="text" class="sfcode" name="post[mobilecode]" id="mobilecode" onblur="validator('mobilecode');" placeholder="请输入验证码">
<input type="button" id="send_code" onclick="SendCode();" value="获取验证码">
<!--<img src="images/sfcode.png" alt="" />-->
</li>
<li id="dmobilecode" class="Validform_checktip"></li>
<li class="dn">
<label id="temailcode">&nbsp;</label>
<span id="demailcode" class="f_red"></span>&nbsp;
</li>
<li id="sendok" class="dn">
<span id="dsendok">&nbsp;</span>
</li>
<li class="checkboxs">
<input type="checkbox" checked="checked" name="legal" datatype="checkbox" errormsg="阅读并同意仪表堂注册协议才能注册">
<label>我已阅读并接受<a href="?read=1" target="_blank">《仪表堂注册协议》</a></label>
</li>
<li class="checkboxs">
<label>会员资费按月计费，每月10元。</label>
</li>
<li style="padding-left: 68px;"><a href="javascript:;" onclick="javascript:alert('VIP注册正在开通中')"><img src="/skin/default/images/bank.jpg" alt=""></a></li>
<li class="Validform_checktip"></li>
<li><input type="submit" name="submit" value="注册"></li>
<li style="margin-left: 70px;" class="mt10">已有账号,<a href="<?php echo $MODULE['2']['linkurl'];?>login.php" class="b">立即登录</a></li>
</form>
</ul>
</div>
</div>
</div>
</div>
<!--底部2 开始-->
<?php include template('footer-reg');?>
<!--底部2结束-->
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/guest.js"></script>
<script type="text/javascript">
if(Dd('username').value == '') Dd('username').focus();
var vid = '';
function validator(id) {
vid = id;
makeRequest('moduleid=<?php echo $moduleid;?>&action=member&job='+id+'&value='+Dd(id).value, AJPath, '_validator');
}
function _validator() {
if(xmlHttp.readyState==4 && xmlHttp.status==200) {
Dd('d'+vid).innerHTML = xmlHttp.responseText ? '<img src="<?php echo DT_SKIN;?>image/check_error.gif" align="absmiddle"/> '+xmlHttp.responseText : '<img src="<?php echo DT_SKIN;?>image/check_right.gif" align="absmiddle"/> ';
}
}
function err_msg(str, id) {
<?php if($DT_TOUCH) { ?>alert(str);<?php } ?>
Dd('d'+id).innerHTML = '<img src="<?php echo DT_SKIN;?>image/check_'+(str ? 'error' : 'right')+'.gif" align="absmiddle"/> '+str;
}
function validate(type) {
if(type == 'cpassword') {
if(Dd('cpassword').value != Dd('password').value) {
err_msg('两次输入的密码不一致', type);
} else {
err_msg('', type);
}
}
if(type == 'truename') {
if(Dd('truename').value.length < 2) {
err_msg('请输入真实姓名', type);
} else {
err_msg('', type);
}
}
}
function reg(type) {
if(type) {
Ds('company_detail');
} else {
Dh('company_detail');
}
}
function Df(ID) {
Dd(ID).focus();
}
function check() {
var f,p;
f = 'username';
if(Dd(f).value == '') {
err_msg('请输入您的手机号或邮箱', f);
Df(f);
return false;
}
if(Dd('d'+f).innerHTML.indexOf('error') != -1) {
Df(f);
return false;
}
f = 'password';
if(Dd(f).value.length < 6) {
err_msg('请填写会员登录密码', f);
Df(f);
return false;
}
if(Dd('d'+f).innerHTML.indexOf('error') != -1) {
Df(f);
return false;
}
f = 'cpassword';
if(Dd(f).value == '') {
err_msg('请重复输入密码', f);
Df(f);
return false;
}
if(Dd('password').value != Dd(f).value) {
err_msg('两次输入的密码不一致', f);
Df(f);
return false;
}
f = 'mobilecode';
if(!Dd(f).value.match(/^[0-9]{6}$/)) {
Dmsg('请填写验证码', f);
return false;
}
<?php if($MOD['question_register']) { ?>
f = 'answer';
if(Dd(f).value == '') {
Dmsg('请回答验证问题', f);
return false;
}
<?php } ?>
<?php if($MOD['captcha_register']) { ?>
f = 'captcha';
if(!is_captcha(Dd(f).value)) {
Dmsg('请填写验证码', f);
return false;
}
<?php } ?>
return true;
}
function SendCode() {
if(Dd('dusername').innerHTML.indexOf('right') == -1) {
Dd('username').focus();
return;
}
var username = Dd('username').value;
var reg = /^1[3|4|5|7|8]\d{9}$/;
if (reg.test(username)) {
makeRequest('action=<?php echo $action_sendscode;?>&value='+username, '<?php echo $DT['file_register'];?>', '_SendSCode');
Dd('send_code').value = '正在发送';
Dd('send_code').disabled = true;
}else{
makeRequest('action=<?php echo $action_sendcode;?>&value='+username, '<?php echo $DT['file_register'];?>', '_SendCode');
Dd('send_code').value = '正在发送';
Dd('send_code').disabled = true;
}
}
function _SendCode() {
var f = 'username';
if(xmlHttp.readyState==4 && xmlHttp.status==200) {
Dd('send_code').value = xmlHttp.responseText == 1 ? '发送成功' : '立即发送';
Dd('send_code').disabled = xmlHttp.responseText == 1 ? true : false;
if(xmlHttp.responseText == 1) {
Dd('dsendok').innerHTML = '<img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/ico_mailok.gif" align="absmiddle"/> <span class="f_green">邮件发送成功，</span> <a href="goto.php?action=emailcode&email='+Dd(f).value+'" target="_blank">立即查收</a>';
StopCode();
} else if(xmlHttp.responseText == 2) {
err_msg('邮件格式错误，请检查', f);
Df(f);
} else if(xmlHttp.responseText == 3) {
err_msg('邮件地址已存在，请更换', f);
Df(f);
} else if(xmlHttp.responseText == 4) {
err_msg('此邮件域名已经被禁止注册，请更换', f);
Df(f);
} else if(xmlHttp.responseText == 5) {
alert('邮件发送过快，请稍后再试');
} else if(xmlHttp.responseText == 6) {
alert('尝试发送次数太多，请稍后再试');
} else {
alert('未知错误，请重试');
}
}
}
function StopCode() {
Dd('send_code').disabled = true;
var i = 60;
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
function SendSCode() {
if(Dd('dmobile').innerHTML.indexOf('right') == -1) {
Dd('mobile').focus();
return;
}
makeRequest('action=<?php echo $action_sendscode;?>&value='+Dd('mobile').value, '<?php echo $DT['file_register'];?>', '_SendSCode');
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
