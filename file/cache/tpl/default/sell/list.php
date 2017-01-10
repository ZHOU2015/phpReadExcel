<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<script type="text/javascript">var sh = '<?php echo $MOD['linkurl'];?>search.php?catid=<?php echo $catid;?>';</script>
<style type="text/css">
.item p{ height: 28px; overflow: hidden;}
.item p.ah{ height: auto; overflow: hidden;}
.hn{display: none;}
</style>
<div class="mlist_wrp m">
<div class="crumb">
<ul>
<a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a>&gt; <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a>&gt; <?php echo cat_pos($CAT, ' &raquo; ');?> <?php if($level) { ?><?php echo $level_status[$level];?><?php } ?>
<?php if($brandid) { ?>品牌：<?php echo get_brand_name($brandid);?><?php } ?>
</li>
</ul>
</div>
<div class="list_group pr">
<div class="group_tit"> 
<p><b><span><?php echo $catname;?></span></b><?php if($_userid) { ?><a href="javascript:;" class="guanzhulei" onclick="guanzhulei(<?php echo $catid;?>)">+ 关注</a><?php } ?>
<b>产品筛选</b><i>共计<?php echo $items;?>个产品</i><a href="search.php?catid=<?php echo $catid;?>&brnad=<?php echo $brand;?>&gys=<?php echo $gys;?>&xinghao=<?php echo $xinghao;?>" class="mseach fr">高级查询<span></span></a></p>
</div>
<div class="item clearfix">
<h3 class="fl">分类：</h3>
<p class="fl">
<?php if(is_array($maincat)) { foreach($maincat as $k => $c) { ?>
<a href="<?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>" <?php if($catid == $c['catid']) { ?>class="current"<?php } ?>
><?php echo $c['catname'];?></a>
<?php } } ?>
</p>
<?php if($k > 10) { ?><a href="javascript:;" class="more fr">更多<span class="fr"></span></a><?php } ?>
</div>
<div class="item clearfix">
<?php $cont = tag("moduleid=$moduleid&catid=$catid&condition=status=3&fields=distinct(brand)&pagesize=15&order=level desc,addtime desc&template=null");?>
<h3 class="fl">品牌：</h3>
<p class="fl">
<a href="javascript:;" onclick="sell_search('', '1', 'brand')" <?php if($brand == '') { ?>class="current"<?php } ?>
>全部</a>
<?php if(is_array($cont)) { foreach($cont as $t) { ?>
<a href="javascript:;" onclick="sell_search(<?php echo $t['brand'];?>, '1', 'brand')" <?php if($brand == $t['brand']) { ?>class="current"<?php } ?>
><?php echo get_brand_name($t['brand'],13);?></a>
<?php } } ?>
</p>
<?php if(count($cont) > 10) { ?><a href="" class="more fr">更多<span class="fr"></span></a><?php } ?>
</div>
<?php if($cont) { ?>
<div class="item clearfix dn">
<h3 class="fl">型号：</h3>
<p class="fl">
<a href="javascript:;" onclick="sell_search('', '1', 'xinghao')" <?php if($xinghao == '') { ?>class="current"<?php } ?>
>全部</a>
<?php if(is_array($cont)) { foreach($cont as $t) { ?>
<a href="javascript:;" onclick="sell_search('<?php echo $t['xinghao'];?>', '1', 'xinghao')" <?php if($xinghao == $t['xinghao']) { ?>class="current"<?php } ?>
><?php echo $t['xinghao'];?></a>
<?php } } ?>
</p>
<?php if(count($cont) > 10) { ?><a href="" class="more fr">更多<span class="fr updowen"></span></a><?php } ?>
</div>
<?php } ?>
<?php if($attr_infos) { ?>
<div class="moresx" id="box2"  <?php if(!$attr) { ?>style="display:none;"<?php } else { ?>style="display:block;"<?php } ?>
>
<?php if(is_array($attr_infos)) { foreach($attr_infos as $f) { ?>
<div class="item clearfix">
<h3 class="fl"><?php echo $f['fd_info']['title'];?>：</h3>
<p class="fl">
<?php if(is_array($f['fd_cont'])) { foreach($f['fd_cont'] as $k => $t) { ?>
<?php if(!$k) { ?>
<a href="javascript:;" onclick="sell_search('', '<?php echo $f['fd_info']['name'];?>', 'attr')" <?php if(!$attr[$f['fd_info']['name']]) { ?>class="current"<?php } ?>
>全部</a>
<?php } else { ?>
<a href="javascript:;" onclick="sell_search('<?php echo $t['min'];?>|<?php echo $t['max'];?>|<?php echo $t['unit'];?>', '<?php echo $f['fd_info']['name'];?>', 'attr')" <?php if($attr[$f['fd_info']['name']] == $t['cur']) { ?>class="current"<?php } ?>
><?php echo $t['val'];?></a>
<?php } ?>
<?php } } ?>
</p>
</div>
<?php } } ?>
</div>
<div class="box04">
<div class="morejs pa">
<button class="btn01" onclick="openShutManager(this,'box2',false,'更多属性检索<img src=/skin/default/images/icon03.jpg />','更多属性检索<img src=/skin/default/images/icon02.png />')">
更多属性检索<img src="/skin/default/images/icon02.png" /></button>
</div>
</div> 
<?php } ?>
</div>

<div class="mlist_main clearfix">
<div class="m_main1">
<?php $cont = tag("moduleid=$moduleid&condition=status=3 and thumb != '' and level = 6&pagesize=7&order=addtime desc&template=null");?>
<div class="left fl">
<h3><b class="pl10">推荐产品</b><a href="hotlist.php?level=6" class="fr">更多 </a></h3>
<ul>
<?php if(is_array($cont)) { foreach($cont as $t) { ?>
<li>
<a href="<?php echo $t['linkurl'];?>" target="_blank">
<img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['alt'];?>" title="<?php echo $t['title'];?>"/>
<span title="型号：<?php echo $t['xinghao'];?>"><?php echo $t['title'];?><br />型号：<?php echo $t['xinghao'];?></span>
<i><font class="normalsfont">参考报价：</font><?php echo get_avg_price($t['itemid']);?></i>
</a>
</li>
<?php } } ?>
</ul>
</div>
<div class="right fr">
<div class="m_sort clearfix">
<h3 class="fl clearfix">
<a href="list.php?catid=<?php echo $catid;?>&brand=<?php echo $brand;?>&gys=<?php echo $gys;?>&xinghao=<?php echo $xinghao;?>&od=1" <?php if($od != 2) { ?>class="xl"<?php } ?>
>上架时间<span></span></a>
<a href="list.php?catid=<?php echo $catid;?>&brand=<?php echo $brand;?>&gys=<?php echo $gys;?>&xinghao=<?php echo $xinghao;?>&od=2" <?php if($od == 2) { ?>class="xl"<?php } ?>
>点击量<span></span></a>
</h3>
</div>
<?php include template('list-'.$module, 'tag');?>
</div>
</div>

</div>
<?php if($_userid) { ?>
<?php $cont = read_history($_userid, 5);?>
<?php if($cont) { ?>
<div class="mlist_zjll mb20">
<h3><b>最近浏览</b><a href="javascript:;" onclick="huanliulan();" class="fr"><span class="fl"></span>换一批</a></h3>
<ul class="clearfix" id="huanliulan">
<?php if(is_array($cont)) { foreach($cont as $t) { ?>
<li>
<a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo $t['thumb'];?>" alt="<?php echo $t['title'];?>" /></a>
<p><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?><br />型号：<i><?php echo $t['xinghao'];?></i></a><span><font class="normalsfont">参考报价：</font><?php echo get_avg_price($t['itemid']);?></span></p>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>
<?php } ?>
</div>
<div class="dbrg_box" id="dbrg_box" <?php if(!$duibi_cookie_num) { ?>style="display:none;"<?php } ?>
>
<h3>[<span id="duibi_num"><?php echo $duibi_cookie_num;?></span>/4]对比框</h3>
<div><form action='<?php echo $MOD['linkurl'];?>compare.php' method="get" target="_blank">
<p>
<?php echo $duibi_html;?>
</p>
<input type="submit" value="对比" name="submit" class="button">
<a href="javascript:;" onclick="clear_dbrg();" class="dbl_clear">清空对比栏</a>
</form></div>
</div>
<script type="text/javascript">
function sell_search(z, c, t){
var catid = "<?php echo $catid;?>";
var brand = "<?php echo $brand;?>";
var gys = "<?php echo $gys;?>";
var xinghao = "<?php echo $xinghao;?>";
var od = "<?php echo $od;?>";
var attr = {};
<?php if($attr) { ?>
<?php if(is_array($attr)) { foreach($attr as $k => $v) { ?>
var k = "<?php echo $k;?>";
var v = "<?php echo $v;?>";
attr[k] = v;
<?php } } ?>
<?php } ?>
 
if (t == 'gys') gys = z;
if (t == 'xinghao') xinghao = z;
if (t == 'brand') brand = z;
if (t == 'attr') attr[c] = z; 
var ot = '';
$.each(attr, function(i, n)
        {
            // alert("Item #" + i.toString() + ": " + n ); //第一个参数i表示属性的key(object), this表示属性值
            ot += "&attr["+i.toString()+"]="+n;
        });
location.href="list.php?catid="+catid+"&brand="+brand+"&gys="+gys+"&xinghao="+xinghao+"&od="+od+ot;
}
function huanliulan(){
$.ajax({
url: '/ajax.php?action=huanliulan',
type: 'GET',
dataType: 'html',
success: function(msg){
if (msg) {
$('#huanliulan').html(msg);
}
}
});
}
/*清除对比框*/
function clear_dbrg(){
$('#dbrg_box p a').each(function(index, el) {
var itd = $(this).attr('date-id'); 
$('#check_'+itd).removeAttr('checked');  // 清除选择框
$(this).remove();
});
changduibi_num();
$('#dbrg_box').hide();
}
/*对比*/
$(document).on('click', '#dbrg_box p a', function(event) {
event.preventDefault();
var itd = $(this).attr('date-id'); 
$('#check_'+itd).removeAttr('checked');  // 清除选择框
$(this).remove();
if ($('#dbrg_box p a').length == 0) {
$('#dbrg_box').hide();
}
changduibi_num();
});
// 对比框内对比产品的数量
function changduibi_num(){
var n = $('#dbrg_box p a img').size();
$('#duibi_num').text(n);
var duibi_cookie = '';
$('#dbrg_box p a').each(function(index, el) {
duibi_cookie += $(this).attr('date-id')+',';
});
set_cookie('duibi_cookie',duibi_cookie,0.3);
// var a = get_cookie('duibi_cookie'); alert(a);
}
$(document).on('mouseover mouseout', '#dbrg_box p a', function(event) {
$(this).toggleClass('on');
});
$(document).on('click', 'input.dbrg_check', function(event) {
if ($('#dbrg_box p a').length > 3) {
if ($(this).is(':checked')) {  // 选中
alert('最多只能添加4个产品进行对比...');
event.preventDefault();
return false;
}
}
var itd = $(this).val();
if ($(this).is(':checked')) {  // 选中
var img = $('#img_'+itd).attr('src');
var tit = $('#title_'+itd).text();
var html = '';
html += '<a herf="javascript:;" date-id="'+itd+'">';
html += '<img src="'+img+'" width="50" height="50"/>';
html += '<span>'+tit+'</span>';
html += '<i></i>';
html += '<input type="hidden" name="itemid[]" value="'+itd+'">';
html += '</a>';
$('#dbrg_box').show();
$('#dbrg_box p').append(html);
}else{  // 取消选中，从对比框里删除此ID
$('#dbrg_box p a').each(function(index, el) {
if ($(this).attr('date-id') == itd) {
$(this).remove();
}
});
if ($('#dbrg_box p a').length == 0) {
$('#dbrg_box').hide();
}
}
changduibi_num();
});
// 关注类
function guanzhulei(catid){
var uid = <?php echo $_userid;?>;
if (uid == 0){
alert('请登录后关注');
return false;
}
if (!catid) {
alert('页面错误，请刷新重试');
return false;
}
$.ajax({
url: '/ajax.php?action=guanzhulei',
type: 'GET',
dataType: 'json',
data: {catid: catid},
success: function(msg){
alert(msg.tips);
}
});
}
//更多下拉
$(document).on('click', '.item a.more', function(event) {
event.preventDefault();
$(this).parent().find('p.fl').toggleClass('ah');
});
$(document).on('click', '.morejs', function(event) {
event.preventDefault();
$(this).parent().find('.moresx').toggleClass('hn');
});

// 显示隐藏选项 sunliya 2016-09-03
$(function() {
var is_open_xx = get_cookie('is_open_xx');
if (is_open_xx == 1 && $('#box2').is(':hidden')) {
$('#box2').show();
}
})

 $ (".updowen").click (function ()
        {
            $ ("updowen").toggleClass("updowen");
            $ (this).toggleClass("dte");
            $ (this).toggle("updowen");
            $ (this).toggle ("dte");
        });
</script>
<script>
function openShutManager(oSourceObj,oTargetObj,shutAble,oOpenTip,oShutTip){
var sourceObj = typeof oSourceObj == "string" ? document.getElementById(oSourceObj) : oSourceObj;
var targetObj = typeof oTargetObj == "string" ? document.getElementById(oTargetObj) : oTargetObj;
var openTip = oOpenTip || "";
var shutTip = oShutTip || "";
if(targetObj.style.display!="none"){
   if(shutAble) return;
   targetObj.style.display="none";
   if(openTip  &&  shutTip){
    sourceObj.innerHTML = shutTip; 
   }
   set_cookie('is_open_xx',0,0.3);
} else {
   targetObj.style.display="block";
   if(openTip  &&  shutTip){
    sourceObj.innerHTML = openTip; 
   }
   set_cookie('is_open_xx',1,0.3);
}
}

</script>
<?php include template('footer');?>