/**
 * create by ouyangyibin on 2015-11-27 15:59:19
 */
$(function(){

	var get_appad_url = '/commonajax/getActActivity';
	$.get(get_appad_url, {}, function(json) {
		if (json && json.data && json.data.success && json.data.data && json.data.data.GTInfo) {
			var appadv_data = json.data.data;
			var appadv = template('appadv', appadv_data);
			if (window.location.href.indexOf("i.tuniu.com/list") > -1 || window.location.href == "https://i.tuniu.com/") {
				$("#order_list").after(appadv);
			}else {
				$('.mainDiv').append(appadv);
			}
		}
	}, "json");

	var usercenterAppadv = {
		flag: false,
		/* 初始化 */
		init: function(){
			var container = $('.container');
			var pagebody = $('.pagebody');		// 一元夺宝

			if( container.length == 1 ){
				this.dom = container;
			}else if( pagebody.length == 1 ){
				this.dom = pagebody;
			}else{
				return;
			}
			flag = true;
		},
		/* 获取 container 的宽度 然后 设置 二维码的广告 */
		setAppadv2D: function(){
			if( !flag ) return;
			var body_c_w = this.dom[0].offsetWidth + 20;
			$('.d_usercenter_appadv_2D').css({
				'margin-left': (parseInt(body_c_w / 2) + 'px')
			});
		}
	}

	usercenterAppadv.init();
	usercenterAppadv.setAppadv2D();

	var body_class_old = $('body').hasClass('index1200') ? 'index1200': 'index1000';

	/* 自适应内容宽度 重新设置 二维码广告位置 */
	$(window).resize(function(){
		var body_cname = $('body').attr('class');
		if( !!body_cname && body_cname.indexOf(body_cname) >= 0 ){
			body_class_old = $('body').hasClass('index1200') ? 'index1200': 'index1000';
			setTimeout(function(){
				usercenterAppadv.setAppadv2D();
			}, 5);
		}
	});

})