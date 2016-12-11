<script type="text/javascript" src="/static/lib/SelectInspiration/js/classie.js"></script>
<script type="text/javascript" src="/static/lib/SelectInspiration/js/selectFx.js"></script>
<script>
    jQuery(document).ready(function(){
        (function () {
            [].slice.call(document.querySelectorAll('select.cs-select')).forEach(function (el) {
                new SelectFx(el);
                (function () {
                    SelectFx.prototype.options = {
                        onChange: function (val) { select_case(val); return false; }
                    }
                })();
            });
        })();



    function select_case (num){
        switch (num){
            case "1":
            jQuery(".content-3-2 .overlay-aqua .container .home_content_text").html("광고를 기획하고 집행할때가 가장 즐겁고<br/> 행복한 사람들이 모인곳이 아인해즈입니다.")
            break;
            case "2":
                jQuery(".content-3-2 .overlay-aqua .container .home_content_text").html("광고대행사를 찾아온 이유는 광고가 어렵기 때문이라고 생각합니다.<br/>그 어려움에 해답을 드리기위해 아인해즈가 있습니다.")
                break;
            case "3":
                jQuery(".content-3-2 .overlay-aqua .container .home_content_text").html("아인해즈의 광고는 강렬합니다.<br/>접하는순간 놀라고 자꾸 생각납니다.마치 매운맛처럼!")
                break;
            case "4":
                jQuery(".content-3-2 .overlay-aqua .container .home_content_text").html("아인해즈의 는 광고주에 성향에 맞는<br/>광고주만의 하나뿐인 광고를 제공합니다.")
                break;
            case "5":
                jQuery(".content-3-3 .overlay-aqua .container .home_content_text").html("입에서 입으로, 블로그에서 블로그로 최소한의 광고로 최대의 광고효과를<br/> 얻을수있는 바이럴마케팅. 물량이아닌 품질높은 바이럴마케팅을 제공합니다.")
                break;
            case "6":
                jQuery(".content-3-3 .overlay-aqua .container .home_content_text").html("22222.")
                break;
            case "7":
                jQuery(".content-3-3 .overlay-aqua .container .home_content_text").html("33333.")
                break;
            case "8":
                jQuery(".content-3-3 .overlay-aqua .container .home_content_text").html("444444.")
                break;
            case "9":
                jQuery(".content-3-3 .overlay-aqua .container .home_content_text").html("55555.")
                break;
            case "10":
                jQuery(".content-3-4 .overlay-aqua .container .home_content_text").html("체계적인 클라이언트 분석과 해결책을 통하여<br/> 놀라운 성과를 보게 될 것입니다.")
                break;
            case "11":
                jQuery(".content-3-4 .overlay-aqua .container .home_content_text").html("777777.")
                break;
            case "12":
                jQuery(".content-3-4 .overlay-aqua .container .home_content_text").html("88888.")
                break;
            case "13":
                jQuery(".content-3-4 .overlay-aqua .container .home_content_text").html("999999.")
                break;
        }
    }
        jQuery(".cs-select_01").addClass("active cs-active");
    })

</script>
