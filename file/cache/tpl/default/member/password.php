<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header',$module);?>
<?php echo load('profile.js');?>
<?php if($is_company && !$_edittime) { ?>
<div class="warn">您的详细资料尚未完善！请尽快完善</div>
<?php } ?>
<?php if(isset($success)) { ?>
<div class="ok">密码修改成功！</div>
<?php } ?>
<div class="right fr">
<h2><b>修改密码</b></h2>
<div class="upd_pass mt20">
<form method="post" action="?" onsubmit="return Dcheck();" id="dform">
<ul>
<li><span>旧登录密码</span><input type="password" name="post[oldpassword]" id="oldpassword" autocomplete="off"/><br/><span></span><em id="doldpassword" class="f_red"></em></li>
<li><span>新登录密码</span><input type="password" name="post[password]" id="password" onblur="validator('password');" autocomplete="off"/>
<br/><span></span><em id="dpassword" class="f_red"></em></li>
<li><span>确认新登录密码</span><input type="password" name="post[cpassword]" id="cpassword" autocomplete="off"/><br/><span></span><em id="dcpassword" class="f_red"></em></li>
</ul>
<div class="upd_passbtn">
<input type="submit" name="submit" value="确 认" >
<!-- <a href="" class="on">确 认</a> --><a href="<?php echo $MODULE['2']['linkurl'];?>">取 消</a></div>
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
if(Dd('oldpassword').value == '') {
Dmsg('请输入密码', 'oldpassword');
return false;
}
if(Dd('cpassword').value == '') {
Dmsg('请重复输入密码', 'cpassword');
return false;
}
if(Dd('password').value != Dd('cpassword').value) {
Dmsg('两次输入的密码不一致', 'password');
return false;
}

return true;
}
</script>
<?php include template('footer',$module);?>