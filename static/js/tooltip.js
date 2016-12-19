(function(global, $){
    var setAria = $(".setting-aria");
    var toolTipBtn = setAria.find(".setting-profileimg-btn");
    var toolTipContent = setAria.find(".setting-tooltip-content");

    function action(status)
    {
        var ariaHiddenStatus;
        switch (status.type)
        {
            case "mouseenter":
            case "focus":
                ariaHiddenStatus = false;
                break;
            case "mouseleave":
            case "blur":
                ariaHiddenStatus = true;
                break;
            case "keydown":
            // 27 = esc
                if (status.keyCode === 27) {
                    ariaHiddenStatus = true;
                }
        }
        toolTipContent.attr({
            "aria-hidden": ariaHiddenStatus
        });
    }
    toolTipBtn.on("mouseenter mouseleave keydown", action);
    toolTipBtn.on("focus blur", action);
})(this, this.jQuery);
