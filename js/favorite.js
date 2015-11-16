/**
 * Created by sett on 16.11.15.
 */
$(document).ready(function(){
    $('.favorite').click(function(){
        var id = $(this).attr('data-id');
        $.post("/favorite/add/"+id, {}, function(data) {
            $('#favorite_'+id).html(data);
        });
    });
})