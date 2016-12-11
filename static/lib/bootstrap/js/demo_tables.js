
    function delete_row(row){
        
        var box = $("#mb-remove-row");
        box.addClass("open");
        
        box.find(".mb-control-yes").on("click",function(){
            box.removeClass("open");
            jQuery.ajax({
                url: '/Admin/delete_member',
                async: true,
                dataType: "json",
                data:{seq : row},
                type: 'POST',
                success: function(data){
                    $("#"+row).hide("slow",function(){
                        $(this).remove();
                    });
                }
            });
        });
        
    }

    function delete_post(row){

        var box = $("#mb-remove-row");
        box.addClass("open");

        box.find(".mb-control-yes").on("click",function(){
            box.removeClass("open");
            jQuery.ajax({
                url: '/Admin/delete_post',
                async: true,
                dataType: "json",
                data:{seq : row},
                type: 'POST',
                success: function(data2){
                    $("#"+row).hide("slow",function(){
                        $(this).remove();
                    });
                }
            });
        });

    }
