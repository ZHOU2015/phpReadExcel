<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header-wappoint');?>
<!--头部2 结束-->
<div class="wap_reg_m">
<div class="wap_m">
<div class="wap_login_box">
<div class="wap_login_box_form">
<div style="padding:20px; overflow:auto">
<ul>
<li>
<label>您已邀请好友个数:</label>
<input name="suminvite" value="<?php echo $suminvite;?>" placeholder="邀请好友个数" style="border: none;margin-left: 15px;width: 60%;background: #C3D8ED;" readonly>
<input name="useridme" value="<?php echo $userid;?>" type="hidden">
</li>
<li>
<label>积分:</label>
<input name="point" value="<?php echo $point;?>" placeholder="积分" style="border: none;margin-left: 15px;width: 60%;background: #C3D8ED;" readonly>
</li>
</ul>
<table cellpadding="2" cellspacing="1" class="tb" style="margin-left: auto;margin-right: auto;width: 100%;">
<tbody>
<tr>
<th width="100" style="text-align: center;">奖品设置</th>
<th style="text-align: center;">奖品</th>
</tr>
<?php if(is_array($prize)) { foreach($prize as $k => $v) { ?>
<tr onmouseover="this.className='on';" onmouseout="this.className='';" align="center" class="">
<td><?php echo $v['title'];?></td>
<td><input name="area[392][parentid]" type="text" size="10" value="<?php echo $v['prize'];?>" style="background: #C3D8ED;border: #C3D8ED"></td>
</tr>
<?php } } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<!--底部2 开始-->
<script src="/skin/default/js/jquery.min.js"> </script>
</body>
</html>