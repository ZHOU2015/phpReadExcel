<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header-wapreg');?>
<!--头部2 结束-->
<body>
<style type="text/css">
.pcontent{
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
ol > li{
color: #9fb5cf;
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
.btn{
background: #fbae05;
text-align: center;
line-height: 2em;
width: 50%;
color: #fff;
margin-bottom: 2em;
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
<div class="wap_reg_m">
<div class="wap_m">
<div class="wap_poster">
<div style="position: absolute;width: 100%;text-align: center;margin-top: 6em;-webkit-tap-highlight-color:rgba(255,255,255,0);color:#fbae05;height: 5em;">
<span id="ybt" style="float: right;margin-right: 10%;margin-top: 4.5em;">&gt;&gt;了解更多</span>
<span style="float: right;margin-right: 3%;width: 50%;height: 6em;" id="headernav"></span>
</div>
<img src="/skin/default/images/wapweb_01.gif" width="100%" height="auto" alt="">
</div>
<div class="wap_poster" style="background: #05204f;height: auto;">
<div class="wap_login_box" style="text-align: center;">
<img src="/skin/default/images/wapweb_title.gif" width="50%" height="auto" alt="" style="margin-top: -0.7em;">
<a href="javascript:;" class="button" onclick="rules();" style="float: right;color: #0C2E56; cursor: pointer;margin-top: 0.5em;margin-right: 0.5em;position: absolute;">>>积分规则</a>
<ol class="pawards" style="text-align: left;">
<ul>一等奖： iPhone 7</ul>
<ul>二等奖： 华为P9</ul>
<ul>三等奖： 山地自行车</ul>
</ol>
<a href="javascript:;" class="button" onclick="morePrize();" style="float: right;color: #0C2E56; cursor: pointer;margin-top: 0.5em;margin-right: 1.5em;position: relative;">>>更多奖品</a>
<div class="wap_login_box_form">
<ul style="margin-top: 2em;">
<div>
<input name="forward" type="hidden" value="<?php echo $forward;?>"/>
<input name="auth" type="hidden" value="<?php echo $auth;?>"/>
<li>
<label>用户名</label>
<p style="display:none;"><select name="option">
<option value="username" selected>用户名</option>
</select></p>
<input name="username" type="text" id="username" value="<?php echo $username;?>" placeholder="请输入您的用户名">
<span class="uuser"></span>
</li>
<li>
<label>密码</label>
<input style="margin-left: 1em;" type="password" name="password" id="password" <?php if(isset($password)) { ?> value="<?php echo $password;?>"<?php } ?>
 placeholder="请输入密码">
<span class="unlock"></span>
</li>
<?php if($MOD['captcha_login']) { ?>
<li>
<label>验证码：</label>
<?php include template('captcha', 'chip');?>
</li>
<?php } ?>
<li class="checkboxs clearfix">
<div class="fl">
<input type="checkbox" name="cookietime" value="1" id="cookietime" checked><label>记住用户名</label>
</div>
<div class="rembero fl">
<a href="send.php" style="display: none;">忘记密码？</a><i style="display: none;">|</i><a href="<?php echo $MODULE['2']['linkurl'];?>wapregister.php">免费注册</a>
</div>
</li>
<li style="text-align: center;">
<button class="btn" id="subloginsubmit" name="submit">登 录</button>
</li>
</div>
</ul>
</div>
<?php if($oa) { ?>
<div class="wap_other_lg" style="display: none;">
<div class="other_lg_t">
<h4>使用合作账号登录</h4>
</div>
<ul class="other_lg_box clearfix">
<?php if(is_array($OAUTH)) { foreach($OAUTH as $k => $v) { ?>
<?php if($v['enable']) { ?>
<li><a href="<?php echo DT_PATH;?>api/oauth/<?php echo $k;?>/connect.php" title="<?php echo $v['name'];?>">
<img src="<?php echo DT_PATH;?>api/oauth/<?php echo $k;?>/ico.png" class="fimg"/>
<img src="<?php echo DT_PATH;?>api/oauth/<?php echo $k;?>/ico_hover.png" alt="" class="limg"/>
</a></li>
<?php } ?>
<?php } } ?>
</ul>
</div>
<?php } ?>
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
<link rel="stylesheet" href="<?php echo DT_SKIN;?>assets/css/layer.css">
<script src="/skin/default/js/jquery-1.7.1.min.js"> </script>
<script src="<?php echo DT_SKIN;?>assets/js/layer.js" ></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
$("#subloginsubmit").click(function(){
if(($("#username").val() == "") || ($("#password").val() == ""))
{
layer.open({
content: '请填写手机号和密码后再点击登录按钮'
,btn: '确定'
});
}
else
{
var username = $("#username").val();
var password = $("#password").val();
var myreg = /^1[3|4|5|7|8]\d{9}$/;
if(!myreg.test(username))
{
//信息框
layer.open({
content: '请输入有效的手机号码'
,btn: '确定'
});
return false;
}else{
$.ajax({
url: "/member/waplogin.php?action=check",
type: "POST",
data: {usrname: username, pwd: password},
dataType: "json",
error: function (data) {
layer.open({
content: '登录失败！'
,skin: 'msg'
,time: 2 //2秒后自动关闭
});
},
success: function (data) {//如果调用php成功
if (data == "1") {
window.location.href="/member/wapregsucc.php";
}
if (data == "2") {
layer.open({
content: '您输入的密码错误'
,btn: '确定'
});
}
}
});
}
}
});
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
$("#ybt").click(function(){
var html = ybttxt.value;
layer.open({
type: 1
,content: html
,anim: 'up'
,style: 'position:fixed; bottom:0; left:0; width: 100%; height: 35em; padding:1em 0; border:none;background: #c3d8ed;'
});
});
//海报链接导航
$("#headernav").click(function(){
window.location.href="http://www.yibiaotang.com";
});
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
</body>
</html>