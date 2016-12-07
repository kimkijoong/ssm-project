$(document).ready(function(){
  // tab 요소에 클릭 이벤트를 추가한다.
  $('[role="tab"]').on('click',function(event) {
    // 브라우저의 기본동작을 취소한다.
    event.preventDefault();
    // 다음 tab 요소에 aria-selected=true로 지정하고
    // 형제요소중에 자신 tab 이외의 나머지 tab 요소들을 aria-selected=false로 지정한다.
    $(this).attr('aria-selected', true).siblings().attr('aria-selected', false);

    console.log($(this).attr('aria-controls'));

    // 클릭한 대상에게 aria-contorl
    var selectedId = "#" + $(this).attr('aria-controls');
    // 자신은 보이게하고 다른 tabpanel은 보이지 않게 지정한다.
    $(selectedId).removeClass('unvisual').siblings().addClass('unvisual');
  });
});
