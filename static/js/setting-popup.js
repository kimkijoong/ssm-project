$(document).ready(function() {
    $('#profile-layer-open').click(function(e){
        $('#setting-layer').show();
    });
    $('#setting-layer-close').click(function(e){
        $('#setting-layer').hide();
    });
    $('.profile-popup-dim').click(function(e){
        $('#setting-layer').hide();
    });
});
