(function(global, $){
    var setAria = $(".setting-aria");
    var toolTipBtn = setAria.find(".tooltip-btn");
    var toopTipContent = setAria.find(".setting-tooltip-content");

    function action(status){
        var ariaHiddenStatus;
        switch(status.type){
            case "mouseenter":
            case "focus":
                ariaHiddenStatus = false;
                break;
            case "mouseleave":
            case "blur":
                ariaHiddenStatus = ture;
                break;
            case "keydown":
            // 27 = esc
                if (status.keyCode === 27) {
                    ariaHiddenStatus = true;
                }
        }
        tooltipContent.attr({
            "aria-hidden": ariaHiddenStatus;
        });
    }
    setAria.on("mouseenter mouseleave keydown", action);
    toolTipBtn.on("focus blur", action);
})(this, this.jQuery);
