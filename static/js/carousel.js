/* ---------------------------------------
 * 	carousel (캐러셀)
 *
 * 	2016.12.02
 * 	@eunju.K
 * ------------------------------------ */
(function(global, $) {
 	'use strict';

 	var height = $(window).height();
 	
	var slide_content = $('.slide-content');
	var slide_content_height = slide_content.height();
	var slide_content_box = $('.slide-content-box');
	var slide_content_box_height = null;
	var btn_prev = $('.btn-up');
	var btn_next = $('.btn-down');
	var total_page = $('.total-page');
	var current_page = $('.current-page');
	console.log(slide_content_box);
	setTimeout(function() {
		var length = $('.slide-content').length;
		var count = 2;
		var current_idx = 0;
		var last_idx = 1;
		var first_page = 1;
		var last_page = null;
		var page = 1;
		var margin_top = parseInt($('.slide-content').css('margin-top'));
		var currunt_top = 0;


		console.log(margin_top);
		last_page = totalPage(length, count);
		slide_content_box_height = (slide_content_height + margin_top) * count;
		console.log(slide_content_height);
		console.log(slide_content_box_height);

		// slide_content 전체 출력
		// console.log(slide_content.length);
		
		// btn_prev 버튼 상태 disabled로 설정
		btn_prev.attr('disabled', 'true');
		btn_prev.css('opacity', 0.6);


		btn_prev.on('click', function() {
			currunt_top += slide_content_box_height;
			current_idx -= count;
			last_idx = current_idx + (count-1);
			page -= 1;

			slide_content_box.css('top', currunt_top);

			btn_next.removeAttr('disabled');
			btn_next.css('opacity', 1);

			if(page == 1 || current_idx == 0) {
				page = 1;
				current_idx = 0;
				last_idx = 1;
				btn_prev.attr('disabled', 'true');
				btn_prev.css('opacity', 0.6);
			}
			current_page.text(page);
		});

		btn_next.on('click', function() {
			currunt_top -= slide_content_box_height;
			current_idx += count;
			last_idx = current_idx + (count-1);
			page += 1;
			
			slide_content_box.css('top', currunt_top);

			btn_prev.removeAttr('disabled');
			btn_prev.css('opacity', 1);

			if(page == last_page || current_idx == last_idx) {
				page = last_page;
				current_idx = (page*count)-2;
				last_idx = current_idx + (count-1);
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