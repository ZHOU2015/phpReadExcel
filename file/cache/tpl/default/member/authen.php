<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header',$module);?>
<?php echo load('profile.js');?>
<?php if(isset($success)) { ?>
<div class="ok">资料保存成功！请等待管理员审核！</div>
<?php } ?>
<style>
.fujian_list{ display:block;}
.fujian_list li{ display:block; height: 28px; border-bottom: 1px dashed #f1f1f1; margin-bottom: 5px;}
.fujian_list li b, .fujian_list li em{ font-size: 16px; font-weight:700; cursor: pointer; width: 15px; color: #f00; display: inline-block;}
</style>
<div class="right fr">
<?php
if ($validated && $vcompany) {
$sunliya_tips = '注意：您的企业资料已经通过审核，如果修改需要再次提交审核，在审核成功之前，会以旧数据继续展示。';
}else{
$sunliya_tips = '提示：请完善您的企业资料，并提交审核以认证企业！';
}
?>
<div class="clearfix">
<p class="f_red mb20"><?php echo $sunliya_tips;?></p>
</div>
<form method="post" action="?" onsubmit="return Dcheck();" id="dform">
<h2><b>企业基本信息</b></h2>
<div class="add_pro_itm clearfix">
<h3 class="fl"><span>*</span>公司名称：</h3>
<div class="fl">
<input type="text" name="post[company]" id="company" value="<?php echo $company;?>" class="fl w440" /> <?php if(in_array('company', $_E)) { ?>&nbsp;<?php if(isset($_U['company'])) { ?><span class="f_red">审核中</span><?php } else { ?><span class="f_gray">需审核</span><?php } ?>
<?php } ?>
<span id="dcompany" class="f_red"></span>
</div>
</div>
<div class="add_pro_itm clearfix">
<h3 class="fl"><span>*</span>形象图片：</h3>
<div class="fl">
        <input name="post[thumb]" id="thumb" type="text" size="80" value="<?php echo $thumb;?>"/>&nbsp;&nbsp;<span onclick="Dthumb(2,200,200, Dd('thumb').value,'','thumb');" class="jt">[上传]</span>&nbsp;&nbsp;<span onclick="_preview(Dd('thumb').value);" class="jt">[预览]</span>&nbsp;&nbsp;<span onclick="Dd('thumb').value='';" class="jt">[删除]</span>
            <!--
<p><img src="<?php if($thumb) { ?><?php echo $thumb;?><?php } else { ?>/skin/default/image/waitpic.gif<?php } ?>
" width="120px" height="120px" id="thumbover"></p>
<input name="post[thumb]" type="hidden" size="60" id="thumb" value="<?php echo $thumb;?>" readonly/>&nbsp;&nbsp;
<a href="javascript:UpImage('thumb');" class="addpro_btn ml20">本地上传</a>
<!-- <span onclick="Dthumb(<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb').value, true);" class="jt">[上传]</span> -->
            
<?php if(in_array('thumb', $_E)) { ?>&nbsp;<?php if(isset($_U['thumb'])) { ?><span class="f_red">审核中</span><?php } else { ?><span class="f_gray">需审核</span><?php } ?>
<?php } ?>
<br/><span class="f_gray">建议使用LOGO、办公环境等标志性图片，最佳大小为<?php echo $MOD['thumb_width'];?>px*<?php echo $MOD['thumb_height'];?>px</span>
</div>
</div>
<div class="add_pro_itm clearfix">
<h3 class="fl"><span>*</span>注册资本：</h3>
<div class="fl">
<?php echo dselect($MONEY_UNIT, 'post[regunit]', '', $regunit, '', 0);?> 
<input type="text" name="post[capital]" id="capital" value="<?php echo $capital;?>" class="w330" /> 万
<?php if(in_array('capital', $_E)) { ?>&nbsp;<?php if(isset($_U['capital'])) { ?><span class="f_red">审核中</span><?php } else { ?><span class="f_gray">需审核</span><?php } ?>
<?php } ?>
<span id="dcapital" class="f_red"></span>
</div>
</div>
<div class="add_pro_itm clearfix">
<h3 class="fl"><span>*</span>所在地区：</h3>
<div class="fl">
<?php echo ajax_area_select('post[areaid]', '请选择', $areaid);?><?php if(in_array('areaid', $_E)) { ?>&nbsp;<?php if(isset($_U['areaid'])) { ?><span class="f_red">审核中</span><?php } else { ?><span class="f_gray">需审核</span><?php } ?>
<?php } ?>
&nbsp;<span id="dareaid" class="f_red"></span></span>
</div>
</div>
<div class="add_pro_itm clearfix">
<h3 class="fl"><span>*</span>详细地址：</h3>
<div class="fl">
<input type="text" name="post[address]" id="daddress" value="<?php echo $address;?>" class="fl w440" /><?php if(in_array('address', $_E)) { ?>&nbsp;<?php if(isset($_U['address'])) { ?><span class="f_red">审核中</span><?php } else { ?><span class="f_gray">需审核</span><?php } ?>
<?php } ?>
&nbsp;<span id="ddaddress" class="f_red"></span>
</div>
</div>
<div class="add_pro_itm clearfix">
<h3 class="fl"><span>*</span>公司电话：</h3>
<div class="fl">
<input type="text"  name="post[telephone]" id="telephone" value="<?php echo $telephone;?>" class="fl w440" /><?php if(in_array('telephone', $_E)) { ?>&nbsp;<?php if(isset($_U['telephone'])) { ?><span class="f_red">审核中</span><?php } else { ?><span class="f_gray">需审核</span><?php } ?>
<?php } ?>
&nbsp;<span id="dtelephone" class="f_red"></span>
</div>
</div>
<div class="add_pro_itm clearfix">
<h3 class="fl">公司规模：</h3>
<div class="fl"><?php echo dselect($COM_SIZE, 'post[size]', '请选择规模', $size, '', 0);?></div>
</div>
<div class="add_pro_itm clearfix">
<h3 class="fl">公司传真：</h3>
<div class="fl">
<input type="text" name="post[fax]" id="fax" value="<?php echo $fax;?>" class="fl w440" /> &nbsp; <span id="dfax" class="f_red">
</div>
</div>
<div class="add_pro_itm clearfix">
<h3 class="fl"><span>*</span>公司邮箱：</h3>
<div class="fl">
<input type="text" name="post[mail]" id="mail" value="<?php echo $mail;?>" class="fl w440" /> &nbsp; <span id="dmail" class="f_red">
</div>
</div>
<div class="add_pro_itm clearfix">
<h3 class="fl"><span>*</span>联系人：</h3>
<div class="fl">
<input type="text" name="post[truename]" id="truename" value="<?php echo $truename;?>" class="fl w440" /> &nbsp; <span id="dtruename" class="f_red">
</div>
</div>
<!-- <div class="add_pro_itm clearfix">
<h3 class="fl"><span>*</span>联系电话：</h3>
<div class="fl">
<input type="text" name="post[mobile]" id="mobile" value="<?php echo $mobile;?>" class="fl w440" /> &nbsp; <span id="dmobile" class="f_red">
</div>
</div> -->
<div class="add_pro_itm clearfix">
<h3 class="fl">联系QQ：</h3>
<div class="fl">
<input type="text" name="post[qq]" id="qq" value="<?php echo $qq;?>" class="fl w440" /> &nbsp; <span id="dqq" class="f_red">
</div>
</div>
<div class="add_pro_itm clearfix">
<h3 class="fl"><span>*</span>公司简介：<br/><?php if(in_array('content', $_E)) { ?><?php if(isset($_U['content'])) { ?><span class="f_red">审核中</span><?php } else { ?><span class="f_gray">需审核&nbsp;</span><?php } ?>
&nbsp;<?php } ?>
</h3>
<textarea name="post[content]" id="content"><?php echo $content;?></textarea> &nbsp; <span id="dcontent" class="f_red"></span>
</div>
<h2 class="mt20"><b>经营销售信息</b></h2>
<div class="add_pro_itm clearfix">
<h3 class="fl"><span>*</span>公司类型：</h3>
<div class="fl">
<?php echo dselect($COM_TYPE, 'post[type]', '请选择', $type, 'id="type"', 0);?>
<?php if(in_array('type', $_E)) { ?>&nbsp;<?php if(isset($_U['type'])) { ?><span class="f_red">审核中</span><?php } else { ?><span class="f_gray">需审核</span><?php } ?>
<?php } ?>
&nbsp;<span id="dtype" class="f_red"></span>
</div>
<input type="hidden" name="post[catid]" value="1,4,8" id="catid">
</div>
<div class="add_pro_itm clearfix">
<h3 class="fl"><span>*</span>经营范围：<br/><?php if(in_array('business', $_E)) { ?>&nbsp;<?php if(isset($_U['business'])) { ?><span class="f_red">审核中</span><?php } else { ?><span class="f_gray">需审核&nbsp;</span><?php } ?>
<?php } ?>
&nbsp;&nbsp;</h3>
<div class="fl">
<textarea name="post[business]" id="business" style="padding:10px;"><?php echo $business;?></textarea>&nbsp;<span id="dbusiness" class="f_red"></span>
</div>
</div>
<div class="add_pro_itm clearfix">
<h3 class="fl"><span>*</span>经营模式：</h3>
<div class="fl">
<?php echo dselect($COM_MODE, 'post[mode]', '请选择', $mode, 'id="mode"', 0);?><?php if(in_array('mode', $_E)) { ?>&nbsp;<?php if(isset($_U['mode'])) { ?><span class="f_red">审核中</span><?php } else { ?><span class="f_gray">需审核</span><?php } ?>
<?php } ?>
 &nbsp; <span id="dmode" class="f_red"></span>
</div>
</div>
<div class="add_pro_itm clearfix">
<h3 class="fl"><span>*</span>成立年份：</h3>
<div class="fl">
<input type="text" name="post[regyear]" id="regyear" value="<?php echo $regyear;?>" maxlength="4"/><?php if(in_array('regyear', $_E)) { ?>&nbsp;<?php if(isset($_U['regyear'])) { ?><span class="f_red">审核中</span><?php } else { ?><span class="f_gray">需审核</span><?php } ?>
<?php } ?>
&nbsp;<span id="dregyear" class="f_red"></span> <span class="f_gray">(年份，如：2004)</span>
</div>
</div>
<!-- <div class="add_pro_itm clearfix">
<h3 class="fl"><span>*</span>经营地区：</h3>
<div class="fl">
<select name="" class="w440">
<option value="">传感器</option>
</select>
<p>
<span>北京<em>x</em></span>
<span>北京<em>x</em></span>
<span>北京<em>x</em></span>
</p>
</div>
</div> -->
<div class="add_pro_itm clearfix">
<h3 class="fl"><span>*</span>营销管理：</h3>
<div class="fl" style="width: 650px;">
<ul class="fujian_list" id="fujian_list">
<?php if($yingxiao_arr) { ?>
<?php if(is_array($yingxiao_arr)) { foreach($yingxiao_arr as $k => $t) { ?>
<li>
<?php if(!$k) { ?><b>+</b><?php } else { ?><em> - </em><?php } ?>
<input name="post[yingxiao][]" type="text" size="40" value="<?php echo $t['name'];?>" placeholder="营销人姓名">&nbsp;&nbsp;
<input name="post[yingxiaot][]" type="text" size="40" value="<?php echo $t['tel'];?>" placeholder="联系电话">&nbsp;&nbsp;
</li>
<?php } } ?>
<?php } else { ?>
<li>
<b>+</b>
<input name="post[yingxiao][]" type="text" size="40" placeholder="营销人姓名">&nbsp;&nbsp;
<input name="post[yingxiaot][]" type="text" size="40" placeholder="联系电话">&nbsp;&nbsp;
</li>
<?php } ?>
</ul>
</div>
</div>
<h2 class="mt20"><b>上传企业资质</b></h2>
<?php if($zhizhao && $vcompany) { ?>
<div class="add_pro_itm clearfix">
<h3 class="fl" style="width: 120px;"><span>*</span>营业执照：</h3>
<div class="fl">
        <input name="post_fields[zhizhao]" id="zhizhao" type="text" size="80" value="<?php echo $zhizhao;?>"/>&nbsp;&nbsp;<span onclick="Dthumb(2,800,600, Dd('zhizhao').value,'','zhizhao');" class="jt">[上传]</span>&nbsp;&nbsp;<span onclick="_preview(Dd('zhizhao').value);" class="jt">[预览]</span>&nbsp;&nbsp;<span onclick="Dd('zhizhao').value='';" class="jt">[删除]</span>
        <!--
<p><img src="<?php if($zhizhao) { ?><?php echo $zhizhao;?><?php } else { ?>/skin/default/image/waitpic.gif<?php } ?>
" width="193" height="193" id="zhizhaoover"></p>
<input type="hidden" name="post_fields[zhizhao]" id="zhizhao" value="<?php echo $zhizhao;?>" class="fl w340" /><a href="javascript:UpImage('zhizhao');" class="addpro_btn ml20">本地上传</a><span id="dzhizhao" class="f_red"></span>
            -->
</div>
</div>
<div class="add_pro_itm clearfix">
<h3 class="fl" style="width: 120px;"><span>*</span>其他证件：</h3>
<div class="fl">
        <input name="post_fields[suuiwu]" id="suuiwu" type="text" size="80" value="<?php echo $suuiwu;?>"/>&nbsp;&nbsp;<span onclick="Dthumb(2,800,600, Dd('suuiwu').value,'','suuiwu');" class="jt">[上传]</span>&nbsp;&nbsp;<span onclick="_preview(Dd('suuiwu').value);" class="jt">[预览]</span>&nbsp;&nbsp;<span onclick="Dd('suuiwu').value='';" class="jt">[删除]</span><span id="dsuuiwu" class="f_red"></span>
        <!--
<p><img src="<?php if($suuiwu) { ?><?php echo $suuiwu;?><?php } else { ?>/skin/default/image/waitpic.gif<?php } ?>
" width="193" height="193" id="suuiwuover"></p>
<input type="hidden" name="post_fields[suuiwu]" id="suuiwu" value="<?php echo $suuiwu;?>" class="fl w340" /><a href="javascript:UpImage('suuiwu');" class="addpro_btn ml20">本地上传</a><span id="dsuuiwu" class="f_red"></span>
            -->
</div>
</div>
    <!--
<div class="qyxx_main">
<ul class="tac">
<li><a href="<?php echo $zhizhao;?>" target="_blank"><img src="<?php echo $zhizhao;?>" width="193" alt="营业执照">营业执照</a><span id="dzhizhao" class="f_red"></span></li>
<li><a href="<?php echo $suuiwu;?>" target="_blank"><img src="<?php echo $suuiwu;?>" width="193" alt="税务登记证">营业执照副本</a><span id="dsuuiwu" class="f_red"></span></li>
<li style="display:none;"><a href="<?php echo $jigou;?>" target="_blank"><img src="<?php echo $jigou;?>" width="193" alt="组织机构代码证">组织机构代码证</a><span id="djigou" class="f_red"></span></li>
<input type="hidden" name="post_fields[zhizhao]" id="zhizhao" value="<?php echo $zhizhao;?>"/>
<input type="hidden" name="post_fields[suuiwu]" id="suuiwu" value="<?php echo $suuiwu;?>"/>
<input type="hidden" name="post_fields[jigou]" id="jigou" value="<?php echo $jigou;?>"/>
</ul>
</div>
    -->
<?php } else { ?>
<div class="add_pro_itm clearfix">
<h3 class="fl" style="width: 120px;"><span>*</span>营业执照：</h3>
<div class="fl">
        <input name="post_fields[zhizhao]" id="zhizhao" type="text" size="80" value="<?php echo $zhizhao;?>"/>&nbsp;&nbsp;<span onclick="Dthumb(2,800,600, Dd('zhizhao').value,'','zhizhao');" class="jt">[上传]</span>&nbsp;&nbsp;<span onclick="_preview(Dd('zhizhao').value);" class="jt">[预览]</span>&nbsp;&nbsp;<span onclick="Dd('zhizhao').value='';" class="jt">[删除]</span><span id="dzhizhao" class="f_red"></span>
        <!--
<p><img src="<?php if($zhizhao) { ?><?php echo $zhizhao;?><?php } else { ?>/skin/default/image/waitpic.gif<?php } ?>
" width="193" height="193" id="zhizhaoover"></p>
<input type="hidden" name="post_fields[zhizhao]" id="zhizhao" value="<?php echo $zhizhao;?>" class="fl w340" /><a href="javascript:UpImage('zhizhao');" class="addpro_btn ml20">本地上传</a><span id="dzhizhao" class="f_red"></span>
            -->
</div>
</div>
<div class="add_pro_itm clearfix">
<h3 class="fl" style="width: 120px;"><!--<span>*</span>-->其他证件：</h3>
<div class="fl">
        <input name="post_fields[suuiwu]" id="suuiwu" type="text" size="80" value="<?php echo $suuiwu;?>"/>&nbsp;&nbsp;<span onclick="Dthumb(2,800,600, Dd('suuiwu').value,'','suuiwu');" class="jt">[上传]</span>&nbsp;&nbsp;<span onclick="_preview(Dd('suuiwu').value);" class="jt">[预览]</span>&nbsp;&nbsp;<span onclick="Dd('suuiwu').value='';" class="jt">[删除]</span><span id="dsuuiwu" class="f_red"></span>
        <!--
<p><img src="<?php if($suuiwu) { ?><?php echo $suuiwu;?><?php } else { ?>/skin/default/image/waitpic.gif<?php } ?>
" width="193" height="193" id="suuiwuover"></p>
<input type="hidden" name="post_fields[suuiwu]" id="suuiwu" value="<?php echo $suuiwu;?>" class="fl w340" /><a href="javascript:UpImage('suuiwu');" class="addpro_btn ml20">本地上传</a><span id="dsuuiwu" class="f_red"></span>
            -->
</div>
</div>
<!-- <div class="add_pro_itm clearfix" style="display:none;">
<h3 class="fl" style="width: 120px;"><span>*</span>组织机构代码证：</h3>
<div class="fl">
<p><img src="<?php if($jigou) { ?><?php echo $jigou;?><?php } else { ?>/skin/default/image/waitpic.gif<?php } ?>
" width="193" height="193" id="jigouover"></p>
<input type="hidden" name="post_fields[jigou]" id="jigou" value="<?php echo $jigou;?>" class="fl w340" /><a href="javascript:UpImage('jigou');" class="addpro_btn ml20">本地上传</a><span id="djigou" class="f_red"></span>
</div>
</div> -->
<?php } ?>
<input type="submit" class="upd_btn" name="submit" value="提 交">
<!-- <a href="" class="upd_btn">提 交</a> -->
</form>
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
if(Dd('company').value == '') {
Dmsg('公司名称不能为空', 'company');
return false;
}
if(Dd('capital').value == '') {
Dmsg('请填写注册资金', 'capital');
return false;
}
if(Dd('areaid_1').value == 0) {
Dmsg('请选择公司所在地', 'areaid');
return false;
}
if(Dd('daddress').value.length < 5) {
Dmsg('请填写公司详细地址', 'daddress');
return false;
}
if(Dd('telephone').value.length < 6) {
Dmsg('请填写公司电话', 'telephone');
return false;
}
if(Dd('mail').value.length < 6) {
Dmsg('请填写公司邮箱', 'mail');
return false;
}

var reg= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if(!reg.test(Dd('mail').value)){
 Dmsg('公司邮箱填写错误', 'mail');
  return false;
}


if(Dd('truename').value == '') {
Dmsg('请填写联系人姓名', 'truename');
return false;
}
if(Dd('type').value == '') {
Dmsg('请选择公司类型', 'type');
return false;
}

if(Dd('business').value.length < 4) {
Dmsg('主要经营范围最少3字', 'business');
return false;
}
if(Dd('mode').value.length < 1) {
Dmsg('请选择经营模式', 'mode');
return false;
}
if(Dd('regyear').value.length < 4) {
Dmsg('请填写公司成立年份', 'regyear');
return false;
}
if(Dd('content').value.length < 10) {
Dmsg('公司介绍最少10字，当前已经输入'+Dd('content').value.length+'字', 'content');
return false;
}
<?php if(!$vcompany) { ?>
if(Dd('zhizhao').value.length < 20) {
Dmsg('请上传营业执照', 'zhizhao');
return false;
}
/*if(Dd('suuiwu').value.length < 20) {
Dmsg('请上传税务登记证', 'suuiwu');
return false;
}*/
// if(Dd('jigou').value.length < 20) {
// Dmsg('请上传组织机构代码证', 'jigou');
// return false;
// }
<?php } ?>
<?php if($CFD) { ?><?php echo fields_js($CFD);?><?php } ?>
return true;
}
//增加 减少类 列数
$(function(){
$(document).on('click', '#fujian_list li:first b', function(event) {
var txt = $('#fujian_list li:first').html();
var len = $('#fujian_list li').length;
txt = txt.replace('<b>+</b>','<em>-</em>');
txt = '<li>'+txt+'</li>';
$('#fujian_list li:last').after(txt);
});
$(document).on('click', '#fujian_list li em', function(event) {
var t = $(this).parent().index();
$('#fujian_list li').eq(t).remove();
});
});
</script>
<div class="dbox" style="display:none;"><iframe name="UploadFile" style="display:none;" src=""></iframe>
<form method="post" target="UploadFile" enctype="multipart/form-data" action="/upload.php" onsubmit="return isImg('upfile','jpg|gif|png|jpeg');"><input type="hidden" name="moduleid" value="2"><input type="hidden" name="from" value="file"><input type="hidden" name="ppp" value="1"><input type="hidden" name="old" id="oldimg_sly" value=""><input type="hidden" name="fid" id="upfid_sly" value="huzhao"><table cellpadding="2"><tbody><tr><td><input id="upfile" type="file" size="20" name="upfile" onchange="if(isImg('upfile','jpg|gif|png|jpeg')){this.form.submit();}"></td></tr></tbody></table></form></div>
<script type="text/javascript">
    function UpImage(id){
        var old = $('#'+id).val();
        $('#oldimg_sly').val(old);
        $('#upfid_sly').val(id);
        $('#upfile').click();
    }
$('#thumb,#zhizhao,#suuiwu').css('width','390px');
</script>
<?php include template('footer',$module);?>