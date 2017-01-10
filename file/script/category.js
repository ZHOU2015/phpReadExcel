/*
	Copyright (c) 2008-2016
	
*/
var cat_id;
function load_category(catid, id) {
	cat_id = id; category_catid[id] = catid;
	$.post(AJPath, 'action=category&category_title='+category_title[id]+'&category_moduleid='+category_moduleid[id]+'&category_extend='+category_extend[id]+'&category_deep='+category_deep[id]+'&cat_id='+cat_id+'&catid='+catid, function(data) {
		$('#catid_'+cat_id).val(category_catid[cat_id]);
		if(data) {
			$('#load_category_'+cat_id).html(data);
			if($('#cat_attr_sly')) get_cat_attr(catid);
		}else{ 
			if($('#cat_attr_sly')) get_cat_attr(catid);
		}
		if($('input.ajax_click_sly').size() > 0){  // 立即 点搜索按钮
			$('input.ajax_click_sly').click();
		}
	});
}

function get_cat_attr(cid){
	if (cid) {
		$.ajax({
			url: '../ajax.php?action=getcatattr&catid='+cid,
			type: 'GET',
			dataType: 'html',
			success: function(msg){
				$('#cat_attr_sly').html(msg);
			}
		});
		
	}
}