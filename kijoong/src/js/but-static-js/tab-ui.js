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
  // tab 요소에 탭키 이벤트 추가한다.
  // 탭요소는 컨텐츠 탐색할때 사용
  $('[role="tab"]').keydown(function(event){
    // firefox는 event.keyCode값을 0을 리턴하기 때문에,
    // event.which로 값을 가져와야한다.
    var keyCode = event.keyCode || event.which;

    if(keyCode == 9){
      event.preventDefault();
      var selectedId = "#"+ $(this).attr('aria-controls');
      console.log($(selectedId).children().eq(0).focus());
    }
  });
  // 키보드 오른쪽 방향키 , 왼쪽 방향키로 탭 인덱스 탐색
  $('[role="tab"]').keyup(function(event){
    var keyCode = event.keyCode || event.which;
    // 오른쪽 방향키
    if(keyCode == 39){
        event.preventDefault();
        $(this).next().attr('aria-selected', true).siblings().attr('aria-selected', false);

        var selectedId = '#' + $(this).next().attr('aria-controls');
        $(selectedId).removeClass('unvisual').siblings().addClass('unvisual');
        $(this).next().focus();

        //여기까지하면 우측으로 이동되서 현재의 $(this)값이 section2로 바뀜
        //밑의 코드는 그다음 한번더 오른쪽방향키 누르면 실행되는 구문임
        if($(this).next().prevObject.attr('aria-controls')=='section2'){
          //tab, tabpanel,focus 모두 처음으로 이동
          $('#tab1').attr('aria-selected', true).siblings().attr('aria-selected', false);
          $('#section1').removeClass('unvisual').siblings().addClass('unvisual');
          $('#tab1').focus();
        }
    }
    // 왼쪽 방향키
    if(keyCode == 37){
      event.preventDefault();
      $(this).prev().attr('aria-selected', true).siblings().attr('aria-selected', false);

      var selectedId = '#' + $(this).prev().attr('aria-controls');
      $(selectedId).removeClass('unvisual').siblings().addClass('unvisual');
      $(this).prev().focus();

      if($(this).prev().prevObject.attr('aria-controls')=='section1'){
        $('#tab2').attr('aria-selected', true).siblings().attr('aria-selected', false);
        $('#section2').removeClass('unvisual').siblings().addClass('unvisual')
        $('#tab2').focus();
      }



    }

		});
});
