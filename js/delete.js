/**
 * Created by sett on 17.11.15.
 */
$(document).ready(function(){
    $('.delete').click(function(){
        var id = $(this).attr('data-id');
        $.post('/myposts/delete/'+id, {}, function(data){
            $('#delete_'+id).html(data);
        })
    })

})