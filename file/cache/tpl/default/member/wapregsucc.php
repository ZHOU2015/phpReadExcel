<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header-wapreg');?>
<!--头部2 结束-->
<style type="text/css">
.btn{
background: #fbae05;
text-align: center;
line-height: 2em;
width: 40%;
color: #fff;
margin-bottom: 2em;
}
.strongfont{
font-weight: bold;
padding-left: 1em;
padding-right: 1.5em;
font-size: 0.9em;
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
.rulecolor{
color: #05204f;
}
.border-table {
border-collapse: collapse;
border: none;
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
<body>
<div class="wap_reg_m">
<div class="wap_m">
<div class="wap_poster">
<div style="position: absolute;width: 100%;text-align: center;margin-top: 6em;-webkit-tap-highlight-color:rgba(255,255,255,0);color:#fbae05;height: 5em;">
<span id="ybt" style="float: right;margin-right: 10%;margin-top: 4em;">&gt;&gt;了解更多</span>
<span style="float: right;margin-right: 3%;width: 50%;height: 5em;" id="headernav"></span>
</div>
<img src="/skin/default/images/wapweb_01.gif" width="100%" height="auto" alt="">
</div>
<iframe src="" name="send" id="send" style="display:none;"></iframe>
<div class="wap_poster" style="background: #05204f;height: auto;">
<div class="wap_reg_box clearfix" style="text-align: center;">
<img src="/skin/default/images/wapweb_title.gif" width="50%" height="auto" alt="" style="margin-top: -0.7em;">
<div id="after" class="fr" style="float: none; margin:0 auto;">
<ul class="wap_reg_form">
<div style="padding-top: 2em;padding-bottom: 2em;text-align: center;font-size: 1.5em;font-family: Microsoft YaHei;">
<?php if($flag == "1") { ?>
<p>恭喜您注册成功，恭喜获得10积分！</p>
<?php } else { ?>
<p>登录成功！</p>
<?php } ?>
<br>
<p class="strongfont">获取更多积分，点击右上角“...”，<span style="color: red">转发或分享</span>此页面邀请好友注册，赢取更多积分换大奖，详情参见活动细则。</p>
<p class="strongfont" style="margin-top: 0.5em;">邀请好友越多，获得积分越多哦！</p>
<br>
<p style="font-size: 0.8em;">兑换前，<a href="" style="color: red;">请完善您的个人信息>></a></p>
<br>
<p style="font-size: 0.8em;">为保证账户安全，<a href="/member/wappassword.php" style="color: red;">请及时更改密码>></a></p>
<input type="hidden" value="<?php echo $userid;?>">
</div>
</ul>
<img src="/skin/default/images/0.gif" style="width: 80%;padding-top: 1em;padding-bottom: 3em;">
<div>
<a href="javascript:;" class="button" onclick="rules();" style="float: right;color: #0C2E56; cursor: pointer;margin-top: 0.5em;margin-right: 0.5em;">>>积分规则</a>
<ol class="pawards" style="text-align: left;">
<ul>一等奖： iPhone 7</ul>
<ul>二等奖： 华为P9</ul>
<ul>三等奖： 山地自行车</ul>
</ol>
<a href="javascript:;" class="button" onclick="morePrize();" style="padding-bottom: 2em; float: right;color: #0C2E56; cursor: pointer;margin-top: 0.5em;margin-right: 0.5em;position: relative;">>>更多奖品</a>
</div>
<div style="width: 100%;float: left;">
<button class="btn" id="welcom">查看积分</button>
</div>
</div>
</div>
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
<link rel="stylesheet" href="<?php echo DT_SKIN;?>assets/css/layer.css">
<script src="/skin/default/js/jquery-1.7.1.min.js"> </script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/guest.js"></script>
<script src="<?php echo DT_SKIN;?>assets/js/layer.js" ></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
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
var userid = <?php echo $userid;?>;
$("#welcom").click(function(){
window.location.href="/member/waploginsucc.php";
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
