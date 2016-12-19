$(document).ready(function() {
    $('#profile-layer-open').mousedown(function(e){
        $('#setting-layer').show();
    });
    $('#setting-layer-close').mousedown(function(e){
        $('#setting-layer').hide();
    });
    $('.profile-popup-dim').mousedown(function(e){
        $('#setting-layer').hide();
    });
});
