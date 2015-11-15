/**
 * Created by sett on 16.11.15.
 */
$(document).ready(function(){
    $('.like').click(function(){
        var id = $(this).attr('data-id');
        $.post("/likes/add/"+id, {}, function (data) {
            $("#res_"+id).html(data);
        });

    });
});