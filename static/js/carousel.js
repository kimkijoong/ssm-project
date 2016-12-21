/* ---------------------------------------
 * 	carousel (캐러셀)
 *
 * 	2016.12.02
 * 	@eunju.K
 * ------------------------------------ */
(function(global, $) {
 	'use strict';


	var slide_content = $('.slide-content');
	var slide_content_height = slide_content.height();
	var slide_content_box = $('.slide-content-box');
	var slide_content_box_height = null;
	var btn_prev = $('.btn-up');
	var btn_next = $('.btn-down');
	var total_page = $('.total-page');
	var current_page = $('.current-page');

	setTimeout(function() {
		var length = $('.slide-content').length;
		var count = 2;
		var last_page = null;
		var page = 1;
		var margin_top = parseInt($('.slide-content').css('margin-top'));
		var currunt_top = 0;

		last_page = totalPage(length, count);
		slide_content_box_height = (slide_content_height + margin_top) * count;

		// slide_content 전체 출력
		// console.log(slide_content.length);
		
		// btn_prev 버튼 상태 disabled로 설정
		btn_prev.attr('disabled', 'true');
		btn_prev.css('opacity', 0.6);


		btn_prev.on('click', function() {
			currunt_top += slide_content_box_height;
			page -= 1;

			slide_content_box.css('top', currunt_top);

			btn_next.removeAttr('disabled');
			btn_next.css('opacity', 1);

			if(page == 1) {
				page = 1;
				btn_prev.attr('disabled', 'true');
				btn_prev.css('opacity', 0.6);
			}
			current_page.text(page);
		});

		btn_next.on('click', function() {
			currunt_top -= slide_content_box_height;
			page += 1;
			
			slide_content_box.css('top', currunt_top);

			btn_prev.removeAttr('disabled');
			btn_prev.css('opacity', 1);

			if(page == last_page) {
				page = last_page;
				btn_next.attr('disabled', 'true');
				btn_next.css('opacity', 0.6);
			} 
			current_page.text(page);
		});		

		// page number 설정
		total_page.text(last_page);
		current_page.text(page);
	}, 2000);
	
	function totalPage($length, $count) {
		// console.log(Math.ceil($length/$count));
		return Math.ceil($length/$count);
	}
})(this, this.jQuery);

// totalPage(8,2);