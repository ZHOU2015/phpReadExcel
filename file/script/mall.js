/*
	Copyright (c) 2008-2016
	
*/
function Mshow(i) {
	// if(i == 'detail') {
	// 	Dd('t_detail').className = 'mall_tab_2';
	// 	Dd('t_comment').className = 'mall_tab_1';
	// 	Dd('t_order').className = 'mall_tab_1';
	// 	Ds('c_detail');
	// 	Dh('c_comment');
	// 	Dh('c_order');
	// } else if(i == 'comment') {
	// 	Dd('t_detail').className = 'mall_tab_1';
	// 	Dd('t_comment').className = 'mall_tab_2';
	// 	Dd('t_order').className = 'mall_tab_1';
	// 	Dh('c_detail');
	// 	Ds('c_comment');
	// 	Dh('c_order');
	// 	load_comment(0);
	// } else if(i == 'order') {
	// 	Dd('t_detail').className = 'mall_tab_1';
	// 	Dd('t_comment').className = 'mall_tab_1';
	// 	Dd('t_order').className = 'mall_tab_2';
	// 	Dh('c_detail');
	// 	Dh('c_comment');
	// 	Ds('c_order');
	// 	load_order(0);
	// }
	// $("html, body").animate({scrollTop:$('.mall_tab').offset().top-40}, 200);
}
function load_comment(p) {
	if(n_c == 0) {
		Dd('c_comment').innerHTML = '<div class="comment_no">'+m_l.no_comment+'</div>';
		return;
	}
	if(p == 0 && Dd('c_comment').innerHTML != c_c) return;
	makeRequest('action=mall&job=comment&moduleid=16&sum='+n_c+'&itemid='+mallid+'&page='+p, AJPath, '_load_comment');
}
function _load_comment() {
	if(xmlHttp.readyState==4 && xmlHttp.status==200) {
		Dd('c_comment').innerHTML= xmlHttp.responseText;
	}
}
function load_order(p) {
	if(n_o == 0) {
		Dd('c_order').innerHTML = '<div class="order_no">'+m_l.no_order+'</div>';
		return;
	}
	if(p == 0 && Dd('c_order').innerHTML != c_o) return;
	makeRequest('action=mall&job=order&moduleid=16&sum='+n_o+'&itemid='+mallid+'&page='+p, AJPath, '_load_order');

}
function _load_order() {
	if(xmlHttp.readyState==4 && xmlHttp.status==200) {
		Dd('c_order').innerHTML= xmlHttp.responseText;
	}
}
function addE(i) {
	$('#p'+i+' li').mouseover(function() {
		if(this.className == 'nv_1') this.className = 'nv_3';
	});
	$('#p'+i+' li').mouseout(function() {
		if(this.className == 'nv_3') this.className = 'nv_1';
	});
	$('#p'+i+' li').click(function() {
		$('#p'+i+' li')[s_s[i]].className = 'nv_1';
		this.className = 'nv_2';
		s_s[i] = $(this).index();
	});
}
function BuyNow() {
	var s1 = $('input[name="guige"]:checked').val();
	if (s1 === undefined) { s1 = 0;}
	Go(mallurl+'buy.php?itemid='+mallid+'&s1='+s1+'&s2=0&s3=0&a='+Dd('amount').value);
}
function AddCart() {
	var s1 = $('input[name="guige"]:checked').val();
	if (s1 === undefined) { s1 = 0;}
	Go(mallurl+'cart.php?itemid='+mallid+'&s1='+s1+'&s2=0&s3=0&a='+Dd('amount').value);
}
function Malter(t, min, max) {
	if(t == '+') {
		if(Dd('amount').value >= max) {
			Dd('amount').value = max;
			Dd('amount2').innerHTML = max;
		} else {
			Dd('amount').value = parseInt(Dd('amount').value) + 1;
			Dd('amount2').innerHTML = parseInt(Dd('amount').value);
		}
	} else if(t == '-') {
		if(Dd('amount').value <= min) {
			Dd('amount').value = min;
			Dd('amount2').innerHTML = min;
		} else {
			Dd('amount').value = parseInt(Dd('amount').value) - 1;
			Dd('amount2').innerHTML = parseInt(Dd('amount').value);
		}
	} else {
		if(Dd('amount').value > max) Dd('amount').value = max;
		if(Dd('amount').value > max) Dd('amount2').innerHTML = max;
		if(Dd('amount').value < min) Dd('amount').value = min;
		if(Dd('amount').value < min) Dd('amount2').innerHTML = min;
	}
	get_num_price();
}
function get_num_price(){
	var num = Dd('amount').value;
	var price = 0;
	$('input[name="guige"]').each(function() {
		if ($(this).is(':checked')) {
			price = $(this).attr('data-price');
		}
	}) 
	if (!mallid || !num) return;
	$.ajax({
		url: '/ajax.php?action=goodsnumprice',
		type: 'GET',
		dataType: 'html',
		data: {mallid: mallid, num: num, price: price},
		success: function(msg){
			$('#total_price').html(msg);
		}
	});
	
}