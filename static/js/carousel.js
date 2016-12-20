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
	var slide_content_box = $('.slide-contnet-box');
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
		var last_page = totalPage(length, count);
		var page = 1;

		// 1. slide_content 전체 출력
		console.log(slide_content.length);

		// 2. 화면 size에 따라 slide_content 갯수 다르게 보여지기
		// height >= 500
		// width, 
		if(width < 1024) {
			slide_content_box_height = slide_content_height * count;
			console.log("1024이하");

			btn_prev.on('click', function() {
				current_idx -= count;
				last_idx = current_idx + (count-1);
				page -= 1;

				slide_content_box.css('top', -slide_content_box_height);

				if(page < 1 || current_idx < 0) {
					page = 1;
					current_idx = 0;
					last_idx = 1;
				} 
				current_page.text(page);
			});

			btn_next.on('click', function() {
				current_idx += count;
				last_idx = current_idx + (count-1);
				page += 1;
				
				slide_content_box.css('top', slide_content_box_height);

				if(page > last_page || current_idx > last_page) {
					page = last_page;
					current_idx = (page*count)-2;
					last_idx = current_idx + (count-1);
				} 
				current_page.text(page);
				console.log(page);
			});
		} else {
			count = 3;
			slide_content_box_height = slide_content_height * count;
			console.log("1024이상");

			btn_prev.on('click', function() {
				current_idx -= count;
				last_idx = current_idx + (count-1);
				page -= 1;

				slide_content_box.css('top', -slide_content_box_height);
				slide_content_box.addClass('top');

				if(page < 1 || current_idx < 0) {
					page = 1;
					current_idx = 0;
					last_idx = 1;
				}
				console.log(page);
				current_page.text(page);
			});

			btn_next.on('click', function() {
				current_idx += count;
				last_idx = current_idx + (count-1);
				page += 1;
				
				slide_content_box.css('top', slide_content_box_height);

				if(page > last_page || current_idx > last_page) {
					page = last_page;
					current_idx = (page*count)-2;
					last_idx = current_idx + (count-1);
				}
				console.log(page);
				current_page.text(page);
			});
		}


		// 3. prev or next 누를 시 slide-box 변경
		// position: absolute
		// btn_prev: -px(prev)		slide-content-box크기만큼 -
		// btn_next: +px(next)		slide-content-box크기만큼 +
			

		// 4. prev or next 누를 때 page number 변경
		total_page.text(last_page);
		current_page.text(page);
	}, 2000);
	
	function totalPage($length, $count) {
		// console.log(Math.ceil($length/$count));
		return Math.ceil($length/$count);
	}
})(this, this.jQuery);

// totalPage(8,2);