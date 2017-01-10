<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header-wapreg');?>
<!--头部2 结束-->
<body>
<div class="wap_reg_m">
<div class="wap_m">
<iframe src="" name="send" id="send" style="display:none;"></iframe>
<div class="wap_poster" style="background: #05204f;height: auto;">
<div class="wap_reg_box clearfix" style="text-align: center;">
<img src="/skin/default/images/wapweb_title.gif" width="50%" height="auto" alt="" style="margin-top: -0.7em;display: none;">
<table style="width: 100%">
<tr>
<td>邀请好友个数：</td>
<td>当前积分：</td>
</tr>
</table>
<ol>
<ul>温馨提示</ul>
<li>用户的积分再兑换奖品后不能重复使用。</li>
<li>用户兑换的奖品数量有限，奖品兑换完时只能兑换其他有货奖品</li>
<li>兑换的奖品包邮，不再收取额外费用。</li>
<li>收货地址必须真实有效，奖品发放后不能再更改收货地址。</li>
<li>本次活动奖品为正规渠道采购，收到货后如发现质量问题及时致电网站客服人员，网站协助用户进行奖品换货手续，其产生的费用用户需自行承担。</li>
</ol>
<div id="before" class="fr" style="float: none; margin:0 auto;display: block;">
<table>
<tr>
<td>奖品设置</td>
<td>奖品内容</td>
<td>剩余个数</td>
<td>操作</td>
</tr>
<tr></tr>
<tr></tr>
<tr></tr>
</table>
</div>
</div>
</div>
</div>
</div>
</body>
<!--底部2 开始-->
<!--底部2结束-->
<style type="text/css">
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
</style>
<link rel="stylesheet" href="<?php echo DT_SKIN;?>assets/css/layer.css">
<script src="/skin/default/js/jquery.min.js"> </script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/guest.js"></script>
<script src="<?php echo DT_SKIN;?>assets/js/layer.js" ></script>
<script type="text/javascript">
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
function validator() {
//makeRequest('moduleid=<?php echo $moduleid;?>&action=wapmember&job='+id+'&value='+Dd(id).value, AJPath, '_validator');
var username = $("#username").val();
var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
if(!myreg.test(username))
{
//信息框
layer.open({
content: '请输入有效的手机号码'
,btn: '确定'
});
return false;
}
//$.ajax({
//url: "/member/wapregister.php",
//type: "POST",
//data: {usrname: username},
//dataType: "json",
//error: function (data) {
//layer.open({
//content: '注册失败！'
//,skin: 'msg'
//,time: 2 //2秒后自动关闭
//});
//},
//success: function (data) {//如果调用php成功
//if (data == "3") {
////询问框
//layer.open({
//content: '您已经注册过了，是否直接登录？'
//,btn: ['去登录', '不登录']
//,yes: function(index){
//window.location.href = "http://www.yibiaotang.com/member/waplogin.php?username="+$("#username").val();
//layer.close(index);
//}
//});
//}
//}
//});
}
//function _validator() {
//if(xmlHttp.readyState==4 && xmlHttp.status==200) {
//Dd('d'+vid).innerHTML = xmlHttp.responseText ? '<img src="<?php echo DT_SKIN;?>image/check_error.gif" align="absmiddle"/> '+xmlHttp.responseText : '<img src="<?php echo DT_SKIN;?>image/check_right.gif" align="absmiddle"/> ';
//}
////当用户已经注册过，直接跳转到积分页面
//if($("#dusername").text() == " 会员登录名已经被注册")
//{
////询问框
//layer.open({
//content: '您已经注册过了，是否直接登录？'
//,btn: ['去登录', '不登录']
//,yes: function(index){
//window.location.href = "http://www.yibiaotang.com/member/waplogin.php?username="+$("#username").val();
//layer.close(index);
//}
//});
//}
//}
function err_msg(str, id) {
<?php if($DT_TOUCH) { ?>alert(str);<?php } ?>
Dd('d'+id).innerHTML = '<img src="<?php echo DT_SKIN;?>image/check_'+(str ? 'error' : 'right')+'.gif" align="absmiddle"/> '+str;
}
//function validate(type) {
//if(type == 'cpassword') {
//if(Dd('cpassword').value != Dd('password').value) {
//err_msg('两次输入的密码不一致', type);
//} else {
//var str='';
//Dd('d'+type).innerHTML = '<img src="<?php echo DT_SKIN;?>image/check_'+(str ? 'error' : 'right')+'.gif" align="absmiddle"/> '+str;
////err_msg('', type);
//}
//}
//if(type == 'truename') {
//if(Dd('truename').value.length < 2) {
//err_msg('请输入真实姓名', type);
//} else {
//err_msg('', type);
//}
//}
//}
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
//function check() {
//var f,p;
//f = 'username';
//if(Dd(f).value == '') {
//err_msg('请输入您的手机号或邮箱', f);
//Df(f);
//return false;
//}
//if(Dd('d'+f).innerHTML.indexOf('error') != -1) {
//Df(f);
//return false;
//}
//f = 'password';
//if(Dd(f).value.length < 6) {
//err_msg('请填写会员登录密码', f);
//Df(f);
//return false;
//}
//if(Dd('d'+f).innerHTML.indexOf('error') != -1) {
//Df(f);
//return false;
//}
//f = 'cpassword';
//if(Dd(f).value == '') {
//err_msg('请重复输入密码', f);
//Df(f);
//return false;
//}
//if(Dd('password').value != Dd(f).value) {
//err_msg('两次输入的密码不一致', f);
//Df(f);
//return false;
//}
//
//f = 'mobilecode';
//if(!Dd(f).value.match(/^[0-9]{6}$/)) {
//Dmsg('请填写验证码', f);
////return false;
//}
//
//<?php if($MOD['question_register']) { ?>
//f = 'answer';
//if(Dd(f).value == '') {
//Dmsg('请回答验证问题', f);
//return false;
//}
//<?php } ?>
//<?php if($MOD['captcha_register']) { ?>
//f = 'captcha';
//if(!is_captcha(Dd(f).value)) {
//Dmsg('请填写验证码', f);
//return false;
//}
//<?php } ?>
//return true;
//}
function SendCode() {
//当用户已经注册过，直接跳转到积分页面
if($("#dusername").text() == " 会员登录名已经被注册")
{
//询问框
layer.open({
content: '您已经注册过了，是否直接登录？'
,btn: ['去登录', '不登录']
,yes: function(index){
window.location.href = "http://www.yibiaotang.com/member/waplogin.php?username="+$("#username").val();
layer.close(index);
}
});
}
if(Dd('dusername').innerHTML.indexOf('right') == -1) {
Dd('username').focus();
return;
}
var username = Dd('username').value;
var reg = /^1[3|4|5|7|8]\d{9}$/;
if (reg.test(username)) {
makeRequest('action=<?php echo $action_sendscode;?>&value='+username, '<?php echo $DT['file_wapregister'];?>', '_SendSCode');
Dd('send_code').value = '正在发送';
Dd('send_code').disabled = true;
}else{
makeRequest('action=<?php echo $action_sendcode;?>&value='+username, '<?php echo $DT['file_wapregister'];?>', '_SendCode');
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
makeRequest('action=<?php echo $action_sendscode;?>&value='+Dd('mobile').value, '<?php echo $DT['file_wapregister'];?>', '_SendSCode');
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
jsApiList: ['onMenuShareTimeline','onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
});
wx.ready(function(){
wx.onMenuShareTimeline({
title: '邀请好友注册，赢豪礼！', // 分享标题
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
title: '邀请好友注册，赢豪礼！', // 分享标题
desc: '邀请好友注册，赢豪礼！', // 分享描述
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
});
});
function subregsubmit(){
if(($("#username").val() != "") && ($("#mobilecode").val() != ""))
{
$("#before").hide();
$("#after").show();
}
else
{
layer.open({
content: '请填写手机号和验证码后再点击注册按钮'
,btn: '我知道了'
});
}
}
$("#showpoint").click(function(){
document.cookie="username="+$("#username").val();
window.location.href = "http://www.yibiaotang.com/member/wappoint.php";
});
$("#existshowpoint").click(function(){
document.cookie="username="+$("#username").val();
window.location.href = "http://www.yibiaotang.com/member/wappoint.php";
});
function showAgreement(){
var html = demo5a.value;
var pageii = layer.open({
type: 1
,content: html
,anim: 'up'
,style: 'overflow: auto; position:fixed; left:0; top:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
});
}
</script>
