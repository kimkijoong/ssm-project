(function(global, $){
    $('.openclosebtn').on('click', function(event){
        event.preventDefault();
        $(this).attr('aria-hidden', true).siblings().attr('aria-hidden', false);
    });
})(this, this.jQuery);
