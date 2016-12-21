// 공통 변수
var mask = $('#mask');
var width = $(window).width();
var nav = $(".navigation");
var aside = $(".aside");



(function(global, $) {
	'use strict';

	var align_status = null;
	var text_align = $('#align-status');

	// resize
	$(global).resize(function() {
		width = $(window).width();
		if(width >= 1440) {
			// navigation
			if(nav.hasClass('off')){
				nav.css('left', '-414px');
			} else {
				nav.css('left', 0);
			}
			// aside
			if(aside.hasClass('off')){
				changeOffOnClass('1440right');
			}
			aside.css('right', 0);
		}
		else {
			// navigation
			if(nav.hasClass('off')) {
				nav.css('left', '-310px');
			} else {
				nav.css('left', 0);
			}
			// aside
			if(aside.hasClass('off')) {
				aside.css('right', '-310px');
			} else if(aside.hasClass('1440on')) {
				changeOnOffClass('1440right');
				aside.css('right', '-310px');
			} else {
				aside.css('right', 0);
			}
		}
	});

	// slide menu (click)
	$("#btn-menu").on('click', function(e) {
		changeOffOnClass('left');

		// 링크 기본동작은 작동하지 않도록 함
		e.preventDefault();
		// 검은 막 띄우기
		wrapWindowByMask();
		// 메뉴 펼치기
		nav.animate({left: 0}, 500);
	});
	closeBox('left');

	$("#btn-date").on('click', function(e) {
		changeOffOnClass('right');

		e.preventDefault();
		wrapWindowByMask();
		aside.animate({right: 0}, 500);
	});
	closeBox('right');


	// text align
	text_align.on('click', function() {
		if( text_align.hasClass('left') ) {
			text_align.removeClass('left');
			text_align.addClass('center');
			$(".input-text-align").val("center");

			align_status = text_align.attr('class');
			textAlignCss(align_status);
		} else {
			text_align.removeClass('center');
			text_align.addClass('left');
			$(".input-text-align").val("left");

			align_status = text_align.attr('class');
			textAlignCss(align_status);
		}
	});
})(this, this.jQuery);



/* ---------------------------------------
 * 	dim 처리
 *
 * 	2016.11.30
 * 	@eunju.K
 * ------------------------------------ */
function wrapWindowByMask() {
	// 화면의 높이와 너비 구하기
	var maskHeight = $(document).height();
	var maskWidth = $(window).width();

	// 마스크의 높이와 너비를 화면 것으로 만들어 전체 화면 채우기
	mask.css({
		'width' : maskWidth + 'vw',
		'height' : maskHeight + 'vh'
	});

	if(maskWidth >= 1440) {
		mask.css('z-index', '999999');
		$('.aside').css('z-index', '999990')
	}

	// 80% 불투명도
	mask.fadeTo("slow", 0.8);
}

/* ---------------------------------------------------
 * 	change class name (navigation / aside)
 *
 * 	2016.12.17
 * 	@eunju.K
 * ------------------------------------------------ */
function changeOffOnClass($dir) {
	switch($dir){
		case 'left':
			if(nav.hasClass('off')) {
				nav.removeClass('off');
				nav.addClass('on');
			}
			break;
		case 'right':
			if(aside.hasClass('off')) {
				aside.removeClass('off');
				aside.addClass('on');
			}
			break;
		case '1440right':
			if(aside.hasClass('off')) {
				aside.removeClass('off');
				aside.addClass('1440on');
			}
			break;
		default:
			break;
	}
}
function changeOnOffClass($dir) {
	switch($dir){
		case 'left':
			if(nav.hasClass('on')) {
				nav.removeClass('on');
				nav.addClass('off');
			}
			break;
		case 'right':
			if(aside.hasClass('on')) {
				aside.removeClass('on');
				aside.addClass('off');
			}
			break;
		case '1440right':
			if(aside.hasClass('1440on')) {
				aside.removeClass('1440on');
				aside.addClass('off');
			}
			break;
		default:
			break;
	}
}

/* ---------------------------------------
 * 	menu slide (메뉴 on/off)
 *
 * 	2016.11.30
 * 	@eunju.K
 * ------------------------------------ */
function closeBox($dir) {
	var closeLeft = $("#nav-btn-close");
	var closeRight = $("#aside-btn-close");

	// close 버튼 눌렀을 때
	if($dir == "left") {
		closeLeft.on('click', function(e) {
			e.preventDefault();
			// 메뉴 숨김
			if(width >= 1440)
				nav.animate({left: '-414px'}, 500);
			else
				nav.animate({left: '-310px'}, 500);
			// 검은막 제거
			mask.hide();
			changeOnOffClass($dir);
		});
	} else {
		closeRight.on('click', function(e) {
			e.preventDefault();
			aside.animate({right: '-310px'}, 500);
			mask.hide();
			changeOnOffClass($dir);
		});
	}

	// 검은 막 눌렀을 때
	mask.click(function() {
		if($dir == "left") {
			if(width >= 1440)
				nav.animate({left: '-414px'}, 500);
			else
				nav.animate({left: '-310px'}, 500);
			changeOnOffClass($dir);
		} else {
			if(width >= 1440)
				aside.animate({right: '0'}, 500);
			else
				aside.animate({right: '-310px'}, 500);
			changeOnOffClass($dir);
		}
		mask.hide();
	});
}

/* ---------------------------------------
 * 	text align (글 정렬)
 *
 * 	2016.12.01
 * 	@eunju.K
 * ------------------------------------ */
 function textAlignCss(align) {
 	var textBox = $('.write');
 	var img = $('#align-status > img');

 	// text-align
 	textBox.css({
		'text-align' : align
	});

 	// change image
	img.attr('src', '');
	img.attr('src', '/static/images/icons/ic_align_' + align + '.svg');
 }
