<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(in_array($action,array('one','two','three','four',''))) { ?>
<?php include template('header-reg');?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>css/style_ybt.css" />
<?php } ?>
<?php if($action == 'four') { ?> 
<div class="setpwd_wrp">
<div class="setpwd_main pt20">
<div class="success-pwd">
<h3><b></b>重置密码成功!</h3>
<p>下次登录请使用该密码</p>
<div class="btn-pwd"><a href="<?php echo $DT['file_login'];?>?username=<?php echo $username;?>&forward=<?php echo urlencode($MOD['linkurl']);?>">知  道  了</a></div>
</div>
</div>
</div>
<?php } else if($action == 'three') { ?> 
<div class="setpwd_wrp">
<div class="setpwd_main pt20">
<div class="step-pwd pt20">
<div class="num-step">
<div class="step on">1</div>
<div class="bor-step on">&nbsp;</div>
<div class="step on">2</div>
<div class="bor-step on">&nbsp;</div>
<div class="step on">3</div>
</div>
<div class="wz-step">
<div class="art on">输入手机／邮箱</div>
<div class="art on">验证手机／邮箱</div>
<div class="art on">重设密码</div>
</div>
</div>
<div class="thirdStep mt10">
<div class="num-user">
用户名：<?php echo $username;?>
</div>
<div class="one-password pr">
<input name="secretPWD" type="password" name="password" id="password" placeholder="输入<?php echo $MOD['minpassword'];?>～<?php echo $MOD['maxpassword'];?>位新密码" class="txt password-close">
<i class="pwd_icon"></i>
<span id="dpassword"></span>
</div>
<div class="two-password pr">
<input name="secretConfPWD" type="password" name="cpassword" id="cpassword" placeholder="再次输入新密码" class="txt password-close">
<i class="pwd_icon"></i>
<span id="dcpassword"></span>
</div>
<div class="btn-pwd" onclick="check()">确 定</div>
</div>
</div>
</div>
<script type="text/javascript">
function check() {
if(Dd('password').value.length > <?php echo $MOD['maxpassword'];?> || Dd('password').value.length < <?php echo $MOD['minpassword'];?>) {
Dmsg('密码长度应为<?php echo $MOD['minpassword'];?>-<?php echo $MOD['maxpassword'];?>字符', 'password');
return false;
}
if(Dd('password').value != Dd('cpassword').value) {
Dmsg('两次输入的密码不一致', 'cpassword');
return false;
}
var password = Dd('password').value;
var userid = <?php echo $userid;?>;
location.href="send.php?action=four&userid="+userid+"&password="+password;
}
</script>
<?php } else if($action == 'two') { ?> 
<div class="setpwd_wrp">
<div class="setpwd_main pt20">
<div class="step-pwd pt20">
<div class="num-step">
<div class="step on">1</div>
<div class="bor-step on">&nbsp;</div>
<div class="step on">2</div>
<div class="bor-step">&nbsp;</div>
<div class="step">3</div>
</div>
<div class="wz-step">
<div class="art on">输入手机／邮箱</div>
<div class="art on">验证手机／邮箱</div>
<div class="art">重置密码</div>
</div>
</div>
<div class="twoStep pt20">
<!-- 手机重置密码 -->
<div class="twoStep">
<div class="box-user">
<input id="telTxt" name="telTxt" type="text" placeholder="请输入注册或绑定的手机号" value="<?php echo $username;?>" disabled="disabled" class="txt">
</div>
<div class="box-code">
<input type="text" name="smsTxt" placeholder="请输入手机验证码" class="txt code" id="code">
<input type="button" class="img_btn" id="smsCode" value="重新获取(180s)" onclick="location.href='send.php'">
<b style="display:block; clear:both;"></b>
<span id="dcode"></span>
</div>
<div class="btn-pwd" id="resetPw" onclick="tochange();">重置密码</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
<?php if($seconds) { ?> 
Dd('smsCode').disabled = true;
var i = <?php echo $seconds;?>; 
var interval=window.setInterval(
function() {
if(i == 0) {
Dd('smsCode').value = '重新获取';
Dd('smsCode').disabled = false;
clearInterval(interval);
} else {
Dd('smsCode').value = '重新获取('+i+'s)';
i--;
}
},
1000);
<?php } ?>
function tochange(){
var code = Dd('code').value;
if(code.length < 6) { 
Dmsg('验证码不合法', 'code');
return false;
}
var userid = <?php echo $userid;?>;
if (!userid) {
alert('页面错误，请重试...');
location.href="send.php";
}
userid = '<?php echo $userid;?>';
location.href="send.php?action=three&userid="+userid+"&code="+code;
}
</script>
<?php } else if($action == 'email') { ?> 
<?php include template('header',$module);?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="Tab0"><a href="?action=<?php echo $action;?>"><span>1、修改邮件</span></a></td>
<td class="tab" id="Tab1"><a href="?action=<?php echo $action;?>"><span>2、邮件验证</span></a></td>
<td class="tab" id="Tab2"><a href="?action=<?php echo $action;?>"><span>3、修改成功</span></a></td>
</tr>
</table>
</div>
<?php if($step == 2) { ?>
<div class="ok">邮件地址修改成功，新邮件地址为：<?php echo $email;?></div>
<?php } else if($step == 1) { ?>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 邮件验证码</td>
<td class="tr"><input type="text" size="10" name="code" id="code"/> <span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr">系统已发送一封验证邮件至<?php echo $email;?>，请<a href="goto.php?email=<?php echo $email;?>" class="t" target="_blank">查收邮件</a>获取验证码</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 下一步 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 重新发送 " class="btn" onclick="Go('?action=<?php echo $action;?>&email=<?php echo $email;?>');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('code').value.length < 6) {
Dmsg('请填写您收到的邮件验证码', 'code');
return false;
}
return true;
}
</script>
<?php } else { ?>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="1"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 新Email</td>
<td class="tr"><input type="text" size="30" name="email" id="email" value="<?php echo $email;?>"/> <span id="demail" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 登录密码</td>
<td class="tr f_red"><?php include template('password', 'chip');?> <span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">提示信息</td>
<td class="tr lh18 f_gray">提交后，系统将发送一封验证邮件至新Email地址，请接收邮件完成验证<br/>登录密码请填写当前登录密码，以便系统验证当前操作为本人<br/>当前Email地址为：<?php echo $_email;?></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 下一步 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('email').value.length < 7) {
Dmsg('请填写新Email地址', 'email');
return false;
}
if(Dd('email').value == '<?php echo $_email;?>') {
Dmsg('新Email地址不能与当前Email地址相同', 'email');
return false;
}
if(Dd('password').value.length < 6) {
Dmsg('请填写登录密码', 'password');
return false;
}
if(!is_captcha(Dd('captcha').value)) {
Dmsg('请填写正确的验证码', 'captcha');
return false;
}
return true;
}
</script>
<?php } ?>
<script type="text/javascript">s('edit');m('Tab<?php echo $step;?>');</script>
<?php include template('footer', $module);?>
<?php } else if($action == 'mobile') { ?> 
<?php include template('header',$module);?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="Tab0"><a href="?action=<?php echo $action;?>"><span>1、修改手机</span></a></td>
<td class="tab" id="Tab1"><a href="?action=<?php echo $action;?>"><span>2、验证手机</span></a></td>
<td class="tab" id="Tab2"><a href="?action=<?php echo $action;?>"><span>3、修改成功</span></a></td>
</tr>
</table>
</div>
<?php if($step == 2) { ?>
<div class="ok">手机号码修改成功，新手机号码为：<?php echo $mobile;?></div>
<?php } else if($step == 1) { ?>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="2"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 短信验证码</td>
<td class="tr"><input type="text" size="10" name="code" id="code"/> <span id="dcode" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"></td>
<td class="tr">系统已发送一条验证短信至<?php echo $mobile;?>，请查收短信获取验证码</td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" value=" 下一步 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 重新发送 " class="btn" onclick="Go('?action=<?php echo $action;?>&mobile=<?php echo $mobile;?>');"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('code').value.length < 6) {
Dmsg('请填写您收到的短信验证码', 'code');
return false;
}
return true;
}
</script>
<?php } else { ?>
<form method="post" action="send.php" onsubmit="return check();" id="dform">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="step" value="1"/>
<table cellpadding="6" cellspacing="1" class="tb">
<tr>
<td class="tl"><span class="f_red">*</span> 新手机号</td>
<td class="tr"><input type="text" size="30" name="mobile" id="mobile" value="<?php echo $mobile;?>" class="inp"/> <span id="dmobile" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 登录密码</td>
<td class="tr"><?php include template('password', 'chip');?> <span id="dpassword" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">提示信息</td>
<td class="tr lh18 f_gray">提交后，系统将发送一条验证短信至您的手机号码，请注意接收<br/>登录密码请填写当前登录密码，以便系统验证当前操作为本人<br/>当前手机号码为：<?php echo $_mobile;?></td>
</tr>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="30"><input type="submit" name="submit" value=" 下一步 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
function check() {
if(Dd('mobile').value.length < 11) {
Dmsg('请填写新手机号码', 'mobile');
return false;
}
if(Dd('mobile').value == '<?php echo $_mobile;?>') {
Dmsg('新手机号码不能与当前号码相同', 'mobile');
return false;
}
if(Dd('password').value.length < 6) {
Dmsg('请填写登录密码', 'password');
return false;
}
if(!is_captcha(Dd('captcha').value)) {
Dmsg('请填写正确的验证码', 'captcha');
return false;
}
return true;
}
</script>
<?php } ?>
<script type="text/javascript">s('edit');m('Tab<?php echo $step;?>');</script>
<?php include template('footer', $module);?>
<?php } else { ?>
<div class="setpwd_wrp">
<div class="setpwd_main pt20">
<div class="step-pwd pt20">
<div class="num-step">
<div class="step on">1</div>
<div class="bor-step">&nbsp;</div>
<div class="step">2</div>
<div class="bor-step">&nbsp;</div>
<div class="step">3</div>
</div>
<div class="wz-step clearfix">
<div class="art on">输入手机／邮箱</div>
<div class="art">验证手机／邮箱</div>
<div class="art">重设密码</div>
</div>
</div>
<div class="oneStep pt20">
<div class="box-user">
<input name="username" id="username" type="text" placeholder="请输入注册或绑定的手机号／邮箱" value="" class="txt user">
<span id="dusername"></span>
</div>
<div class="img-mo on" id="img-mo">
<?php include template('captcha', 'chip');?> <b style="clear:both; display:block;"></b><span id="dcaptcha" class="f_red"></span>
</div>

<div class="btn-pwd" id="resetOne" onclick="check()">找回密码</div>
</div>
</div>
</div>
<script type="text/javascript">
function err_msg(str, id) {
Dd('d'+id).innerHTML = '<img src="<?php echo DT_SKIN;?>image/check_'+(str ? 'error' : 'right')+'.gif" align="absmiddle"/> '+str;
}
function Df(ID) {
Dd(ID).focus();
}
function check() {
var f,p;
f = 'username';
if(Dd(f).value.length < 7) {
err_msg('手机号／邮箱不合法', f);
Df(f);
return false;
}
p = 'captcha';
if (Dd(p).value == '') {
err_msg('请输入验证码', p);
Df(p);
return false;
}
var un = Dd(f).value;
var cap = Dd(p).value;
location.href="send.php?action=two&username="+un+"&captcha="+cap;
}
</script>
<?php } ?>
<?php if(in_array($action,array('one','two','three','four'))) { ?>
<?php include template('footer-reg');?>
<?php } ?>
