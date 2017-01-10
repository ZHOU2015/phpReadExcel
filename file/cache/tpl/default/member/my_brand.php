<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(!$ajax) { ?>
<?php include template('header', 'member');?>
<?php } else { ?>
<?php include template('header-ajax', 'member');?>
<?php } ?>
<?php if($action=='add' || $action=='edit') { ?>
<div class="right fr">
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="?mid=<?php echo $mid;?>&action=add&ajax=<?php echo $ajax;?>"><span>添加<?php echo $MOD['name'];?></span></a></td>
<?php if($_userid && !$ajax) { ?>
<td class="tab" id="s3"><a href="?mid=<?php echo $mid;?>"><span>已发布<span class="px10">(<?php echo $nums['3'];?>)</span></span></a></td>
<td class="tab" id="s2"><a href="?mid=<?php echo $mid;?>&status=2"><span>审核中<span class="px10">(<?php echo $nums['2'];?>)</span></span></a></td>
<td class="tab" id="s1"><a href="?mid=<?php echo $mid;?>&status=1"><span>未通过<span class="px10">(<?php echo $nums['1'];?>)</span></span></a></td>
<?php } ?>
</tr>
</table>
</div>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<table cellpadding="6" cellspacing="1" class="tb">
<?php if($status==1 && $action=='edit' && $note) { ?>
<tr>
<td class="tl">未通过原因</td>
<td class="tr f_blue"><?php echo $note;?></td>
</tr>
<?php } ?>
<tr>
<td class="tl"><span class="f_red">*</span> 所属分类</td>
<td class="tr"><?php echo category_select('post[catid]', '选择分类', $catid, $moduleid);?> <span id="dcatid" class="f_red"></span></td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> <?php echo $MOD['name'];?>名称</td>
<td class="tr"><input name="post[title]" type="text" id="title" size="50" value="<?php echo $title;?>"/> <span id="dtitle" class="f_red"></span></td>
</tr>
<?php if($action=='add' && $could_color) { ?>
<tr>
<td class="tl">标题颜色</td>
<td class="tr">
<?php echo dstyle('color');?>&nbsp;
设置信息标题颜色需消费 <strong class="f_red"><?php echo $MOD['credit_color'];?></strong> <?php echo $DT['credit_name'];?>
</td>
</tr>
<?php } ?>
<tr>
<td class="tl"><span class="f_red">*</span> <?php echo $MOD['name'];?>LOGO</td>
<td class="tr"><input name="post[thumb]" id="thumb" type="text" size="60" value="<?php echo $thumb;?>" readonly/>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Dthumb(<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb').value, true);" class="t">[上传]</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="_preview(Dd('thumb').value);" class="t">[预览]</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="Dd('thumb').value='';" class="t">[删除]</a> <span id="dthumb" class="f_red"></span>建议图片尺寸：<?php echo $MOD['thumb_width'];?>*<?php echo $MOD['thumb_height'];?></td>
</tr>

<?php if($mid == 13) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 所属厂商</td>
<td class="tr">
<select name="post_fields[changshang]" id="changshang">
<option value="">请选择</option>
<?php if(is_array($changshang_arr)) { foreach($changshang_arr as $v) { ?>
<option value="<?php echo $v['itemid'];?>" <?php if($v['itemid'] == $changshang) { ?>selected<?php } ?>
 > <?php echo $v['title'];?> </option>
<?php } } ?>
</select> <span id="dchangshang"></span> <a href="javascript:;" class="btn_sly">新建厂商</a>
</td>
</tr>
<?php } ?>

<tr>
<td class="tl"><span class="f_red">*</span> <?php echo $MOD['name'];?>地区</td>
<td class="tr">
<?php echo ajax_area_select('post[areaid]', '请选择', $areaid);?>
<span id="dareaid"></span>
</td>
</tr>
<tr style="display:none;">
<td class="tl">官方网站</td>
<td class="tr"><input name="post[homepage]" id="homepage" type="text" size="60" value="<?php echo $homepage;?>"/></td>
</tr>
<?php if($CP) { ?>
<script type="text/javascript">
var property_catid = <?php echo $catid;?>;
var property_itemid = <?php echo $itemid;?>;
var property_admin = 0;
</script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/property.js"></script>
<tbody id="load_property" style="display:none;">
<tr><td></td><td></td></tr>
</tbody>
<?php } ?>
<?php if($FD) { ?><?php echo fields_html('<td class="tl">', '<td class="tr">', $item);?><?php } ?>
<tr>
<td class="tl">详细说明</td>
<td class="tr"><textarea name="post[content]" id="content" class="dsn"><?php echo $content;?></textarea><?php echo deditor($moduleid, 'content', $group_editor, '100%', 350);?><br/><span id="dcontent" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl"><span class="f_hid">*</span>关键词</td>
<td>
<input type="text" size="60" name="post[keyword]" value="<?php echo $keyword;?>"> &nbsp;<span class="f_gray">多个关键词以英文半角逗号,隔开</span>
</td>
</tr>
<?php if(!$_userid) { ?>
<?php include template('guest_contact', 'chip');?>
<?php } ?>
<?php if($fee_add) { ?>
<tr>
<td class="tl">发布此信息需消费</td>
<td class="tr"><span class="f_b f_red"><?php echo $fee_add;?></span> <?php echo $fee_unit;?></td>
</tr>
<?php if($fee_currency == 'money') { ?>
<tr>
<td class="tl"><?php echo $DT['money_name'];?>余额</td>
<td class="tr"><span class="f_blue f_b"><?php echo $_money;?><?php echo $fee_unit;?></span> <a href="charge.php?action=pay" target="_blank" class="t">[充值]</a></td>
</tr>
<?php } else { ?>
<tr>
<td class="tl"><?php echo $DT['credit_name'];?>余额</td>
<td class="tr"><span class="f_blue f_b"><?php echo $_credit;?><?php echo $fee_unit;?></span> <a href="credit.php?action=buy" target="_blank" class="t">[购买]</a></td>
</tr>
<?php } ?>
<?php } ?>
<?php if($need_password) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 支付密码</td>
<td class="tr"><?php include template('password', 'chip');?> <span id="dpassword" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($need_question) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 验证问题</td>
<td class="tr"><?php include template('question', 'chip');?> <span id="danswer" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($need_captcha) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($action=='add') { ?>
<tr style="display:none;" id="weibo_sync">
<td class="tl">同步主题</td>
<td class="tr" id="weibo_show"></td>
</tr>
<?php } ?>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 提 交 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
</form>
</div>
<?php echo load('clear.js');?>
<script type="text/javascript">s('mid_<?php echo $mid;?>');m('add');</script>
<?php } else { ?>
<script type="text/javascript" src="<?php echo DT_SKIN;?>/js/jquery.form.js"></script>
<style type="text/css">
.thumb_list{ overflow: hidden; display:block; margin-left: 30px;}
.thumb_list li{display:block; float: left; width:110px; padding:0px; text-align: center; border-bottom: none;}
.thumb_list li p{text-align: center;}
.thumb_list li p span{display:inline-block;}
.v_cjgl_main div.ajax_content{ display: block; overflow:hidden; float:none; border:1px solid #ccc; padding:5px; min-height: 80px;}
.ajax_content label{width: 33.33%; float:left; line-height: 2.4; border-bottom: 1px dashed #ccc;}
.v_cjgl_main form div.add_infos{display: block; overflow: hidden; border:1px solid #ccc; float: none; text-align: center;}
.v_cjgl_main form div.add_infos_tit{ line-height: 32px; font-weight: 600; border-bottom: 1px solid #ccc; display: block; float: none; padding-left:15px; text-align: left;}
.v_cjgl_main form div.add_item{ float: none; display: block; overflow: hidden; padding:10px;}
.v_cjgl_main form div.add_item .add_item_img{ background: #eee; margin-bottom:5px; padding:5px; }
</style>
<div class="right fr">
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="?mid=<?php echo $mid;?>&action=add&ajax=<?php echo $ajax;?>"><span>添加<?php echo $MOD['name'];?></span></a></td>
<?php if($_userid && !$ajax) { ?>
<td class="tab" id="s3"><a href="?mid=<?php echo $mid;?>"><span>已发布<span class="px10">(<?php echo $nums['3'];?>)</span></span></a></td>
<td class="tab" id="s2"><a href="?mid=<?php echo $mid;?>&status=2"><span>审核中<span class="px10">(<?php echo $nums['2'];?>)</span></span></a></td>
<td class="tab" id="s1"><a href="?mid=<?php echo $mid;?>&status=1"><span>未通过<span class="px10">(<?php echo $nums['1'];?>)</span></span></a></td>
<?php } ?>
</tr>
</table>
</div>
<div class="v_cjgl_main">
<!-- <form action="?">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="ajax" value="<?php echo $ajax;?>"/>
<div class="sel">
<label for="">地区：</label><?php echo ajax_area_select('areaid', '请选择地区', $areaid);?>
</div>
<div class="search"><input type="text" name="kw" id="kw" placeholder="请输入关键字" value="<?php echo $kw;?>"></div>
<div class="btn_wrp clearfix">
<input type="submit" class="btn" name="submit" value="搜索">
<a href="?mid=<?php echo $mid;?>&action=add&ajax=<?php echo $ajax;?>" class="btn">新建<?php echo $MOD['name'];?></a>
</div>
</form> -->
<?php if($ajax) { ?>
<div class="cjgl_itm">
<form action="my.php?mid=<?php echo $moduleid;?>&action=addbrand" method="post" id="dform">
<input type="hidden" name="mid" value="<?php echo $moduleid;?>">
<input type="hidden" name="action" value="addbrand">
<input type="hidden" name="mid" value="<?php echo $mid;?>">
<?php if($lists) { ?>
<?php if($mid == 13) { ?>
<div class="ppgl_main">
<?php if(is_array($lists)) { foreach($lists as $t) { ?>
<p>
<input type="radio" name="check[]" id="check_<?php echo $t['itemid'];?>" value="<?php echo $t['itemid'];?>">
<span><a href="javascript:;" target="_blank"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['title'];?>" width="166" height="56"><?php echo $t['title'];?></a></span>
</p>
<?php } } ?>
</div>
<?php } else { ?>
<ul>
<?php if(is_array($lists)) { foreach($lists as $t) { ?>
<li class="clearfix">
<h3 class="fl"><input type="radio" name="check[]" id="check_<?php echo $t['itemid'];?>" value="<?php echo $t['itemid'];?>"></h3>
<p class="fl">
<a href="javascript:;" target="_blank"><b><?php echo $t['title'];?></b></a>
地区：<?php echo area_pos($t['areaid'], '/');?> <br>主营行业：<?php echo $t['business'];?>
</p>
</li>
<?php } } ?>
</ul>
<?php } ?>
<!-- <div class="ipages"><?php echo $pages;?></div> -->
<?php } else { ?>
<p class="f_red">暂无品牌，您可以<a href="?mid=<?php echo $mid;?>&action=add&ajax=<?php echo $ajax;?>">添加品牌</a></p>
<?php } ?>
</form>
</div>
<script type="text/javascript">
$("input[name='check[]']").click(function(event) {
$('#dform').submit();
window.parent.cDialog();
});
</script>
<?php } else { ?>

<?php if($status == 3) { ?>
<!-- <h2><b>已有<?php echo $MOD['name'];?></b></h2> -->
<div class="cjgl_itm">
<form action="?" method="post" id="dform">
<input type="hidden" name="mid" value="<?php echo $moduleid;?>">
<input type="hidden" name="action" value="upbrand">
<?php if($user_changsheng) { ?>
<?php if($mid == 13) { ?>
<div class="add_infos">
<div class="add_infos_tit">已选择品牌</div>
<?php if(is_array($user_changsheng)) { foreach($user_changsheng as $t) { ?>
<div class="add_item" data-ids="<?php echo $t['itemid'];?>" id="add_item_<?php echo $t['itemid'];?>">
<div class="fl">
<div class="add_item_img">
<input type="hidden" name="post[]" value="<?php echo $t['itemid'];?>">
<img src="<?php echo $t['thumb'];?>" width="180">
<br><?php echo $t['title'];?>
</div>
<p><a href="javascript:;" class="del_item" onclick="del_brand_id(<?php echo $t['itemid'];?>)">删除</a></p>
</div>
<div class="fr">
<ul class="thumb_list">
<?php if($thumb[$t['itemid']]) { ?>
<?php if(is_array($thumb[$t['itemid']])) { foreach($thumb[$t['itemid']] as $m) { ?>
<li><!-- <input type="hidden" name="post[]" class="input_brand_id" value="467"> -->
<input type="hidden" name="post[thumb][<?php echo $t['itemid'];?>][]" class="input_brand_img" value="<?php echo $m;?>">
<img src="<?php if($m) { ?><?php echo $m;?><?php } else { ?><?php echo DT_SKIN;?>image/waitpic.gif<?php } ?>
" width="90" height="90" class="input_brand_up" title="预览图片" alt=""><br>
<span>授权证书</span>
<span><a href="javascript:;" class="edit_thumb">【修改】</a></span>
<span><a href="javascript:;" class="del_thumb">【删除】</a></span>
</li>
<?php } } ?>
<?php } else { ?>
<li><!-- <input type="hidden" name="post[]" class="input_brand_id" value="467"> -->
<input type="hidden" name="post[thumb][<?php echo $t['itemid'];?>][]" class="input_brand_img" value="">
<img src="<?php echo DT_SKIN;?>image/waitpic.gif" width="90" height="90" class="input_brand_up" title="暂无图片" alt=""><br>
<span>授权证书</span>
</li>
<?php } ?>
<li>
<img src="http://app.tt/skin/default//image/addpic.gif" width="90" height="90" title="增加一张图片" class="addthumb">
<p><span><a href="javascript:;" class="addthumb">增加一张图片</a></span></p>
</li>
</ul>
</div>
</div>
<?php } } ?>
</div>
<div class="cjgl_itmb clearfix">
<p class="fl">
<!-- <span><label for="checkall2"><input type="checkbox" type="checkbox" name="checkall" id="checkall2" value="1">全选</label></span> -->
<input type="submit" name="submit" id="submit" value="保存更改">
<!-- <a href="">加入已有厂家</a></p> -->
<!-- <?php if($pages) { ?><div class="mlist_fy fr"><?php echo $pages;?></div><?php } ?>
 -->
</div>
<?php } else { ?>
<ul>
<?php if(is_array($user_changsheng)) { foreach($user_changsheng as $t) { ?>
<li class="clearfix">
<h3 class="fl"><input type="checkbox" name="itemid[]" id="check_<?php echo $t['itemid'];?>" value="<?php echo $t['itemid'];?>"></h3>
<p class="fl">
<a href="<?php echo $t['linkurl'];?>" target="_blank"><b><?php echo $t['title'];?></b></a>
地区：<?php echo area_pos($t['areaid'], '/');?> <br>主营行业：<?php echo $t['business'];?>
</p>
<div class="fr">
<a href="?mid=<?php echo $mid;?>&action=edit&itemid=<?php echo $t['itemid'];?>">编辑</a>
<a href="javascript:;" onclick="del_one(<?php echo $t['itemid'];?>);">删除</a>
</div>
</li>
<?php } } ?>
</ul>

<div class="cjgl_itmb clearfix">
<p class="fl">
<span><label for="checkall2"><input type="checkbox" type="checkbox" name="checkall" id="checkall2" value="1">全选</label></span>
<input type="submit" name="submit" id="submit2" value="删除选中">
<!-- <a href="">加入已有厂家</a></p> -->
<!-- <?php if($pages) { ?><div class="mlist_fy fr"><?php echo $pages;?></div><?php } ?>
 -->
</div>
<?php } ?>
<?php } else { ?>
<p class="f_red">暂未选择</p>
<?php } ?>
</form>
</div>
<?php } ?>
<?php } ?>
</div>
</div>
<form method="post" style="display:none;" id="ff_form">
<input type="hidden" name="idss" id="ff_ids" value="">
<input type="hidden" name="inss" id="ff_ins" value="">
<input type="file" name="upfile" value="" id="ff_file"/>
</form>
<script type="text/javascript">
$(function(){
//反选
$('#checkall').click(function(event) {
$("input[name='check[]']").click(); 
});
//反选
$('#checkall2').click(function(event) {
$("input[name='itemid[]']").click();
});
});
//发布单个产品
function add_one(itemid){
$("input[name='check[]']").removeAttr('checked');
$('#check_'+itemid).click();
$('#submit').click();
}
//删除
function del_one(itemid){
$("input[name='itemid[]']").removeAttr('checked');
$('#check_'+itemid).click();
$('#submit2').click();
}
function Dcheck(){
var n = $("input[name='check[]']:checked").length; 
if (n == 0) {
return false;
}else{
return true;
}

}
function Dcheck2(){
var n = $("input[name='itemid[]']:checked").length; 
if (n == 0) {
return false;
}else{
return true;
}
}
</script>
<script type="text/javascript">s('mid_<?php echo $mid;?>');m('s<?php echo $status;?>');</script>
<?php } ?>
<?php if($action == 'add' || $action == 'edit') { ?>
<script type="text/javascript">
function check() {
var l;
var f;
f = 'catid_1';
if(Dd(f).value == 0) {
Dmsg('请选择所属分类', 'catid', 1);
return false;
}
f = 'title';
l = Dd(f).value.length;
if(l < 2 || l > 30) {
Dmsg('标题应为2-30字，当前已输入'+l+'字', f);
return false;
}
f = 'thumb';
l = Dd(f).value.length;
if(l < 10) {
Dmsg('请上传LOGO', f);
return false;
}
<?php if(!$_userid) { ?>
f = 'company';
l = Dd(f).value.length;
if(l < 2) {
Dmsg('请填写公司名称', f);
return false;
}
if(Dd('areaid_1').value == 0) {
Dmsg('请选择所在地区', 'areaid');
return false;
}
f = 'truename';
l = Dd(f).value.length;
if(l < 2) {
Dmsg('请填写联系人', f);
return false;
}
f = 'mobile';
l = Dd(f).value.length;
if(l < 7) {
Dmsg('请填写手机', f);
return false;
}
<?php } ?>
<?php if($FD) { ?><?php echo fields_js();?><?php } ?>
<?php if($CP) { ?><?php echo property_js();?><?php } ?>
<?php if($need_password) { ?>
f = 'password';
l = Dd(f).value.length;
if(l < 6) {
Dmsg('请填写支付密码', f);
return false;
}
<?php } ?>
<?php if($need_question) { ?>
f = 'answer';
l = Dd(f).value.length;
if(l < 1) {
Dmsg('请填写验证问题', f);
return false;
}
if(Dd('c'+f).innerHTML.indexOf('error') != -1) {
Dd(f).focus();
return false;
}
<?php } ?>
<?php if($need_captcha) { ?>
f = 'captcha';
l = Dd(f).value;
if(!is_captcha(l)) {
Dmsg('请填写正确的验证码', f);
return false;
}
if(Dd('c'+f).innerHTML.indexOf('error') != -1) {
Dd(f).focus();
return false;
}
<?php } ?>
return true;
}
var destoon_oauth = '<?php echo $EXT['oauth'];?>';
$(function(){
//新建厂商 
$('.btn_sly').click(function(event){ 
if (confirm('添加厂商本页数据会丢失，是否继续')) {
location.href='my.php?mid=23&action=add';
}else{
return false;
}
});
});
</script>
<?php } else { ?>
<script type="text/javascript">
// 上传图片
$(document).on('click', '.add_item .input_brand_up', function(event) { 
// event.preventDefault();
var img_src = $(this).attr('src');
if (img_src.indexOf('waitpic.gif') == -1) { 
window.open(img_src,'_blank');
}else{
var bid = $(this).parents('.add_item').data('ids');
var ins = $(this).parent('li').index();
$('#ff_ids').val(bid);
$('#ff_ins').val(ins);
$('#ff_file').click();
}
});
$('#ff_file').change(function(event) {
console.log($(this).val());
var a = 'jpg|gif|png';
var v = $(this).val();
if (!v) {
return false;
}
var t = ext(v);
if (a.indexOf(t) == -1) {
alert('格式不允许，请上传jpg|gif|png格式的文件');
return false;
}
var ids = $('#ff_ids').val();
var ins = $('#ff_ins').val(); 
$("#ff_form").ajaxSubmit({
            type:'post',
            url:'/upload_sly.php',
            success:function(data){
            console.log(ids);
            console.log(ins);
                $('.add_infos .add_item').each(function(index, el) {
                if($(this).data('ids') == ids){ 
                $(this).find('.thumb_list li').eq(ins).find('.input_brand_img').val(data);
                $(this).find('.thumb_list li').eq(ins).find('.input_brand_up').attr('src',data);
                }
                });
            },
            error:function(XmlHttpRequest,textStatus,errorThrown){
                console.log(XmlHttpRequest);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
// $.ajax({
// url: '/upload_sly.php',
// type: 'POST',
// dataType: 'html',
// data: $('#ff_form').serialize(),
// success: function(msg){
// alert(msg);
// }
// });
});
//增加一张图片
$(document).on('click', '.addthumb', function(event) {
event.preventDefault();
/* Act on the event */
var brand_id = $(this).parents('.add_item').data('ids');
var thispt = $(this).parents('ul.thumb_list');
var html = '';
html += '<li>';
html += '<input type="hidden" name="post[thumb]['+brand_id+'][]" class="input_brand_img" value="">';
html += '<img src="<?php echo DT_SKIN;?>/image/waitpic.gif" width="90" height="90" class="input_brand_up" title="预览图片" alt="">';
html += '<br><span>授权证书</span>';
html += '</li>';
thispt.find('li:last').before(html);
});
//修改图片
$(document).on('click', 'a.edit_thumb', function(event) {
event.preventDefault();
var bid = $(this).parents('.add_item').data('ids');
var ins = $(this).parents('li').index();
$('#ff_ids').val(bid);
$('#ff_ins').val(ins);
$('#ff_file').click();
});
//删除图片
$(document).on('click', 'a.del_thumb', function(event) {
event.preventDefault();
var bid = $(this).parents('.add_item').data('ids');
var ins = $(this).parents('li').index();
if (ins > 0) {
$(this).parents('li').remove();
}else{
$(this).parents('li').find('input.input_brand_img').val('');
$(this).parents('li').find('img.input_brand_up').attr('src',"<?php echo DT_SKIN;?>/image/waitpic.gif");
// $(this).parent('span').remove();
}
});
// 删除品牌
function del_brand_id(itemid) {
if (itemid == '') {
return false;
}
if (!confirm('确定要删除此品牌？此操作不可恢复')) {
return false;
}
$.ajax({
url: '/ajax.php?action=deluserbrand',
type: 'POST',
dataType: 'json',
data: {itemid: itemid},
success:function(msg){
if (msg.err == 1) {
alert(msg.tips);
}else{
$('#add_item_'+itemid).remove();
}
}
});
}
</script>
<?php } ?>
<?php if($action=='add' && strlen($EXT['oauth']) > 1) { ?><?php echo load('weibo.js');?><?php } ?>
<?php if(!$ajax) { ?>
<?php include template('footer', 'member');?>
<?php } ?>
