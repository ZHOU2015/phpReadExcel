<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header-wapreg');?>
<!--头部2 结束-->
<body>
<div class="wap_reg_m">
<div class="wap_m">
<div class="wap_poster">
<div style="position: absolute;width: 100%;text-align: center;margin-top: 6em;-webkit-tap-highlight-color:rgba(255,255,255,0);color:#fbae05;height: 5em;">
<span id="ybt" style="float: right;margin-right: 10%;margin-top: 5.5em;">&gt;&gt;了解更多</span>
                <span style="float: left;margin-left: 3%;width: 70%;height: 10em;margin-top: -11em;" id="headernav"></span>
</div>
<img src="/skin/default/images/wapweb_01.gif" width="100%" height="auto" alt="">
            <p style="text-align: center;font-size: 1.5em;font-weight: bold;padding-bottom: 0.5em;background: #05204f;color: white;padding-left: 0.5em;margin-top: -0.2em;">
                <span style="color: red;">注册或登录</span>后分享才有积分哦！</p>
</div>
<iframe src="" name="send" id="send" style="display:none;"></iframe>
<div class="wap_poster" style="background: #05204f;height: auto;">
<div class="wap_reg_box clearfix" style="text-align: center;">
<img src="/skin/default/images/wapweb_title.gif" width="50%" height="auto" alt="" style="margin-top: -0.7em;">
<a href="javascript:;" class="button" onclick="rules();" style="float: right;color: #FF8400; cursor: pointer;margin-top: 0.5em;margin-right: 0.5em;position: absolute;">>>积分规则</a>
<ol class="pawards" style="text-align: left;">
<ul>一等奖： iPhone 7</ul>
<ul>二等奖： 华为P9</ul>
<ul>三等奖： 山地自行车</ul>
</ol>
<a href="javascript:;" class="button" onclick="morePrize();" style="float: right;color: #FF8400; cursor: pointer;margin-top: 0.5em;margin-right: 1.5em;position: relative;">>>更多奖品</a>
<div id="before" class="fr" style="float: none; margin:0 auto;display: block;">
<ul class="wap_reg_form" style="padding-top: 2em;">
<form action="<?php echo $DT['file_wapregister'];?>" method="post" target="send" onsubmit="return subregsubmit();">
<input name="action" type="hidden" id="action" value="<?php echo crypt_action('wapregister');?>"/>
<input name="forward" type="hidden" value="<?php echo $forward;?>"/>
<label style="display:none;"> <input type="radio" name="post[regid]" value="5" id="g_5" onclick="reg(1);" checked/><?php echo $GROUP['5']['groupname'];?></label>
<li>
<label><i>*</i>用户名</label>
<input type="text" name="post[username]" id="username"  placeholder="请输入您的手机号"  datatype="*" nullmsg="请输入您的手机号" onblur="validator('username');" autocomplete="off" <?php if($username) { ?> value="<?php echo $username;?>" readonly<?php } ?>
/>
<span class="uuser"></span>
</li>
<li class="Validform_checktip" id="dusername" style="display: none;"></li>
<li style="display: none;">
<label><i>*</i>设置密码</label>
<input type="password" placeholder="请输入密码" name="post[password]" datatype="*6-18" id="password" onblur="validator('password');" nullmsg="请输入密码" errormsg="密码长度6-18位，建议字母、数字符号两种以上组合" autocomplete="off">
<span class="unlock"></span>
</li>
<li class="Validform_checktip" id="dpassword" style="display: none;"></li>
<li style="display: none;">
<label><i>*</i>密码确认</label>
<input type="password" placeholder="请再次输入密码" datatype="*" recheck="password" nullmsg="请再次输入密码" errormsg="您两次输入的账号密码不一致" name="post[cpassword]" id="cpassword" onblur="validate('cpassword');" autocomplete="off">
<span class="unlock"></span>
</li>
<li class="Validform_checktip" id="dcpassword" style="display: none;"></li>
<!-- <li>
                                <label><i>*</i>手机号码</label>
                                    <input type="text" name="post[mobile]" id="mobile"<?php if($could_mobilecode) { ?> onblur="validator('mobile');"<?php } ?>
 placeholder="请输入手机号码，接收认证信息" datatype="m" nullmsg="请输入您的手机号码" errormsg="请输入正确的手机号码">
                            </li>
                            <li class="Validform_checktip" id="dmobile"></li>-->
<li style="margin-top: 2em;">
<label><i>*</i>验证码</label>
<input type="hidden" id="session_mobile" value="<?php echo $session_mobile;?>">
<input type="text" class="sfcode" name="post[mobilecode]" id="mobilecode" onblur="validator('mobilecode');" placeholder="请输入验证码">
<input type="button" id="send_code" onclick="SendCode();" value="获取验证码">
<!--<img src="images/sfcode.png" alt="" />-->
</li>
<li class="dn">
<label id="temailcode">&nbsp;</label>
<span id="demailcode" class="f_red"></span>&nbsp;
</li>
<li id="sendok" class="dn">
<span id="dsendok">&nbsp;</span>
</li>
<li class="checkboxs" style="width: 70%;">
<input type="checkbox" checked="checked" id="legal" name="legal" datatype="checkbox" errormsg="阅读并同意仪表堂注册协议才能注册">
<!--<label>我已阅读并接受<a href="?read=1" target="_blank">《仪表堂注册协议》</a></label>-->
<label>我已阅读并接受<a href="javascript:;"  class="button" onclick="showAgreement();">《仪表堂注册协议》</a></label>
</li>
<li style="text-align: center;"><button class="btn" id="subreg" name="submit">注册</button></li>
<li style="text-align: center;" class="mt10">已有账号,<a href="<?php echo $MODULE['2']['linkurl'];?>waplogin.php" class="b">立即登录</a></li>
<input type="hidden" id="gotologin" value="<?php echo $gotologin;?>">
</form>
</ul>
</div>
</div>
</div>
<div class="wap_poster" style="background: #05204f;height: auto;padding-top: 5em;">
<ol>
<li style="color: #9fb5cf; text-align: center;font-size: 2em;font-family: Microsoft YaHei;">
——活动细节——
</li>
<li>1.      参与活动需先用手机号成功注册为网站会员，奖品兑换时以注册手机号为兑换依据。</li>
<li>
2.      活动用户每成功邀请一位好友注册为网站会员获得相应积分，最终用户根据积分数量兑换相应奖品。
</li>
<li>
3.      积分不能转赠，不能兑换现金。用户需通过登录仪表堂网站或微信公众号申请兑换奖品。
</li>
<li>
4.      活动结束后用户兑换完奖品剩余的积分系统不清零，将持续有效。剩余积分可以延续到仪表堂其他活动继续使用。
</li>
<li>
5.      建议用户时时关注仪表堂网站或仪表堂微信公众号的公告，活动结束后需两周内及时兑换奖品，逾期系统将停止兑换奖品。
</li>
<li>
6.      仪表堂保留法律范围内允许对活动的解释权，如有任何疑问请联系活动客服：010-82119375-635。
</li>
</ol>
</div>
<div class="wap_poster" style="background: #05204f; text-align: center;">
<img src="/skin/default/images/wapweb_middle.gif" width="90%" height="auto" alt="" style="background: repeat-x;padding-top: 1em;">
</div>
<div class="wap_poster" style="background: #05204f; text-align: center; padding-top: 3em;">
<div>
<p style="color: #9fb5cf; text-align: center;font-size: 1.8em;font-family: Microsoft YaHei;">欢迎关注仪表堂公众号</p>
</div>
<div style="padding-top: 3em;"></div>
<div>
<p style="color: #9fb5cf; text-align: center;font-size: 1.8em;font-family: Microsoft YaHei;">查询好友信息！</p>
</div>
<div style="padding-top: 3.5em;">
<img src="/skin/default/images/wapweb_qrcode.gif" width="60%" height="auto" alt="">
</div>
<div style="padding-top: 3.5em;padding-bottom: 2em;">
<p style="color: #9fb5cf; text-align: center;font-family: Microsoft YaHei;font-size: 1.2em;">北京瑞风协同科技股份有限公司</p>
<p style="color: #9fb5cf; text-align: center;font-family: Microsoft YaHei;font-size: 1.2em;">www.rainfe.com</p>
</div>
</div>
</div>
</div>
<?php include template('waplayer','member');?>
</body>
<!--底部2 开始-->
<!--底部2结束-->
<style type="text/css">
.btn{
background: #fbae05;
text-align: center;
line-height: 2em;
width: 50%;
color: #fff;
margin-bottom: 2em;
}
ol > li{
color: #9fb5cf;
font-size: 1.3em;
font-family: Microsoft YaHei;
padding: 0.8em;
}
.pawards{
color: #000;
font-size: 1.3em;
font-family: Microsoft YaHei;
padding: 0.8em;
padding-left: 28%;
}
.gray {
color: #e9e9e9;
border: solid 1px #555;
background: #6e6e6e;
background: -webkit-gradient(linear, left top, left bottom, from(#888), to(#575757));
background: -moz-linear-gradient(top, #888, #575757);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#888888', endColorstr='#575757');
}
.hwq2button {
display: inline-block;
zoom: 1;
vertical-align: baseline;
margin: 0 2px;
outline: none;
cursor: pointer;
text-align: center;
text-decoration: none;
font: 14px/100% Arial, Helvetica, sans-serif;
padding: .5em 2em .55em;
text-shadow: 0 1px 1px rgba(0,0,0,.3);
-webkit-border-radius: .5em;
-moz-border-radius: .5em;
border-radius: .5em;
-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
-moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
box-shadow: 0 1px 2px rgba(0,0,0,.2);
}
.rulecolor{
color: #05204f;
}
.border-table td {
border: solid #05204f 1px;
text-align: center;
}
.border-table th {
border: solid #05204f 1px;
text-align: center;
}
</style>
<link rel="stylesheet" href="<?php echo DT_SKIN;?>assets/css/layer.css">
<script src="<?php echo DT_SKIN;?>js/jquery-1.7.1.min.js"> </script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/guest.js"></script>
<script src="<?php echo DT_SKIN;?>assets/js/layer.js" ></script>
<script type="text/javascript">
var rspmsg;
MathRand();
function MathRand()
{
var Num="";
for(var i=0;i<6;i++)
{
Num+=Math.floor(Math.random()*10);
}
$("#password").val(Num);
$("#cpassword").val(Num);
}
//if(Dd('username').value == '') Dd('username').focus();
var vid = '';
function validator(id) {
vid = id;
makeRequest('moduleid=<?php echo $moduleid;?>&action=member&job='+id+'&value='+Dd(id).value, AJPath, '_validator');
}
function _validator() {
if(xmlHttp.readyState==4 && xmlHttp.status==200) {
Dd('d'+vid).innerHTML = xmlHttp.responseText ? '<img src="<?php echo DT_SKIN;?>image/check_error.gif" align="absmiddle"/> '+xmlHttp.responseText : '<img src="<?php echo DT_SKIN;?>image/check_right.gif" align="absmiddle"/> ';
msgalert();
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
function subregsubmit(){
if($("#legal").attr("checked")!="checked"){
layer.open({
content: '请阅读用户协议'
,btn: '我知道了'
});
return false;
}
if(($("#username").val() != "") && ($("#mobilecode").val() != ""))
{
//$("#before").hide();
//$("#after").show();
}
else
{
layer.open({
content: '请填写手机号和验证码后再点击注册按钮'
,btn: '我知道了'
});
return false;
}
}
//验证码倒计时60s++
var countdown=60;
function settime(obj) {
if (countdown == 0) {
obj.removeAttribute("disabled");
obj.value="获取验证码";
countdown = 60;
return;
} else {
obj.setAttribute("disabled", true);
obj.value=countdown + "s后，重新获取";
countdown--;
}
setTimeout(function() {
settime(obj) }
,1000)
}
//验证码倒计时45s--
//由于程序先执行validate之后是_validate之后是sendcode，由于都有makrequest里的http通信，所以增加settimeout延时，解决冲突
//从而实现了输入手机号后点击发送验证码，不用中间操作失去焦点的行为，最终直接发送验证码
function SendCode() {
if($("#username").val() == "")
{
//信息框
layer.open({
content: '请输入手机号'
,btn: '知道了'
});
return false;
}
//if(Dd('dusername').innerHTML.indexOf('right') == -1) {
//Dd('username').focus();
//return;
//}
var username = Dd('username').value;
var reg = /^1[3|4|5|7|8]\d{9}$/;
if (reg.test(username)) {
setTimeout(function(){
makeRequest('action=<?php echo $action_sendscode;?>&value='+username, '<?php echo $DT['file_wapregister'];?>');
if(rspmsg != "会员登录名已经被注册")
{
var obj = document.getElementById("send_code");
settime(obj);
Dd('send_code').value = '正在发送';
Dd('send_code').disabled = true;
}
},2000);
}
else{
//信息框
layer.open({
content: '请输入正确的手机号'
,btn: '知道了'
});
return false;
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
err_msg('手机格式错误，请检查', f);
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
makeRequest('action=<?php echo $action_sendscode;?>&value='+Dd('mobile').value, '<?php echo $DT['file_wapregister'];?>', '_SendSCode');
Dh('sendsok');
Dd('send_scode').value = '正在发送';
Dd('send_scode').disabled = true;
}
function _SendSCode() {
var f = 'mobile';
if(xmlHttp.readyState==4 && xmlHttp.status==200) {
msgalert();
Dd('send_scode').value = xmlHttp.responseText == 1 ? '发送成功' : '立即发送';
Dd('send_scode').disabled = xmlHttp.responseText == 1 ? true : false;
if(xmlHttp.responseText == 1) {
Dd('dsendok').innerHTML = '<img src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/ico_mailok.gif" align="absmiddle"/> <span class="f_green">短信发送成功</span>';
StopSCode();
} else if(xmlHttp.responseText == 2) {
alert("手机号码格式错误，请检查");
return;
//err_msg('手机号码格式错误，请检查', f);
//Df(f);
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
//海报链接导航
$("#headernav").click(function(){
window.location.href="http://www.yibiaotang.com";
});
function showAgreement(){
var html = demo5a.value;
layer.open({
type: 1
,content: html
,anim: 'up'
,style: 'position:fixed; left:0; bottom:0; width: 100%; height: 70%; border:none;background: #c3d8ed;overflow: auto'
});
}
function morePrize(){
var html = more.value;
layer.open({
type: 1
,content: html
,anim: 'up'
,style: 'position:fixed; left:0; width: 100%; height: 50%; border:none;background: #c3d8ed;'
});
}
function rules(){
var html = rule.value;
layer.open({
type: 1
,content: html
,anim: 'up'
,style: 'position:fixed; left:0; width: 100%; height: 50%; border:none;background: #c3d8ed;'
});
}
function msgalert(){
if($("#dusername").text() == " 会员名应为手机号或邮箱")
{
//信息框
layer.open({
content: '会员名应为手机号'
,btn: '知道了'
});
return false;
}
if($("#dusername").text() == " 手机号或邮箱不合法")
{
//信息框
layer.open({
content: '手机号不合法'
,btn: '知道了'
});
return false;
}
if($("#dusername").text() == " 会员登录名已经被注册")
{
rspmsg = "会员登录名已经被注册"
var gotologin = $("#gotologin").val();
console.log("xmlHttp.responseText"+xmlHttp.responseText);
//询问框
layer.open({
content: '您已经注册过了，是否直接登录？'
,btn: ['去登录', '不登录']
,yes: function(index){
window.location.href = gotologin;
layer.close(index);
}
});
return;
}
}
$("#ybt").click(function(){
var html = ybttxt.value;
layer.open({
type: 1
,content: html
,anim: 'up'
,style: 'position:fixed; left:0; bottom:0; width: 100%; height: 70%; border:none;background: #c3d8ed;overflow: auto'
});
});
</script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
//单次定位20分钟有效 20分钟内
$(document).ready(function(){
// 默认获取用户地理位置和openid
wx.config({
debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
appId:"wx6dab503cd0fd3141", // 必填，公众号的唯一标识
timestamp: "<?php echo $arr['timestamp'];?>", // 必填，生成签名的时间戳
nonceStr: "<?php echo $arr['noncestr'];?>", // 必填，生成签名的随机串
signature: "<?php echo $arr['signature'];?>",// 必填，签名，见附录1
jsApiList: ['onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
});
wx.ready(function(){
wx.onMenuShareTimeline({
title: '分享好友注册仪表堂赢豪礼，iphone7等你来拿~', // 分享标题
link: "http://www.yibiaotang.com/member/wapregister.php?fromUserId=<?php echo $userid;?>", // 分享链接
imgUrl: 'http://www.yibiaotang.com/skin/default/img/singlelogo.jpeg', // 分享图标
success: function () {
console.log("分享成功");
alert('分享成功');
},
cancel: function () {
console.log("分享已取消");
alert('分享已取消');
}
});
wx.onMenuShareAppMessage({
title: '分享好友注册仪表堂赢豪礼，iphone7等你来拿~', // 分享标题
desc: '包罗海量仪器设备的仪表堂开始分享好友注册赢豪礼活动啦，分享给更多好友注册，可获得意想不到的精美礼品，更有iphone7等你来拿，赶紧发动起身边的童靴们一起来注册吧~', // 分享描述
link: 'http://www.yibiaotang.com/member/wapregister.php?fromUserId=<?php echo $userid;?>', // 分享链接
imgUrl: 'http://www.yibiaotang.com/skin/default/img/singlelogo.jpeg', // 分享图标
type: '', // 分享类型,music、video或link，不填默认为link
dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
success: function () {
// 用户确认分享后执行的回调函数
alert("发送成功");
},
cancel: function () {
// 用户取消分享后执行的回调函数
alert("取消发送");
}
});
wx.onMenuShareQQ({
title: '分享好友注册仪表堂赢豪礼，iphone7等你来拿~', // 分享标题
desc: '包罗海量仪器设备的仪表堂开始分享好友注册赢豪礼活动啦，分享给更多好友注册，可获得意想不到的精美礼品，更有iphone7等你来拿，赶紧发动起身边的童靴们一起来注册吧~', // 分享描述
link: 'http://www.yibiaotang.com/member/wapregister.php?fromUserId=<?php echo $userid;?>', // 分享链接
imgUrl: 'http://www.yibiaotang.com/skin/default/img/singlelogo.jpeg', // 分享图标
success: function () {
// 用户确认分享后执行的回调函数
alert("发送成功");
},
cancel: function () {
// 用户取消分享后执行的回调函数
alert("取消发送");
}
});
});
});
</script>
