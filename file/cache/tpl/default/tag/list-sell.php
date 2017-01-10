<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="mlist_pros mt20 clearfix">
<?php if($tags) { ?>
<ul>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<li class="pr" id="item_<?php echo $t['itemid'];?>">
<a href="<?php echo $t['linkurl'];?>" target="_blank"><img src="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>" id="img_<?php echo $t['itemid'];?>" /></a>
<p>
<span><font class="normalsfont">参考报价：</font><?php echo get_avg_price($itemid);?></span>
<a href="<?php echo $t['linkurl'];?>" target="_blank">
<em id="title_<?php echo $t['itemid'];?>"><?php echo $t['title'];?></em>
<span class="norm_bkj">
<i>型号：<?php echo $t['xinghao'];?></i>
<i style="display:block;">生产商：<?php echo get_changshang_name($t['brand']);?></i>
</span>
</a>
</p>
<div class="pa clearfix">
<a href="<?php echo $t['linkurl'];?>" target="_blank">查看详情</a>
<a href="javascript:;" class="db">
<label>
<input type="checkbox" name="itemid[]" value="<?php echo $t['itemid'];?>" id="check_<?php echo $t['itemid'];?>" class="dbrg_check" />对比
</label>
</a>
</div>
</li>
<?php } } ?>
</ul>
<?php } else { ?>
<div style="padding:20px; color:#f00; font-size:14px;">暂无数据...</div>
<?php } ?>
</div>
<style>
.norm_bkj{display:block !important;overflow:hidden;white-space:nowrap;width:168px !important;padding:0 !important;}

</style>
<?php if($showpage && $pages) { ?><div class="ipages"><?php echo $pages;?></div><?php } ?>
