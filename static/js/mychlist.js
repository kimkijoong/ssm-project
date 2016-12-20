(function(global, $){
    setTimeout(function(){
        $('.openclosebtn').on('click', function(event){
            event.preventDefault();
            console.log("a");
            $(this).attr('aria-hidden', true).siblings().attr('aria-hidden', false);
        });
    }, 2000)

})(this, this.jQuery);
