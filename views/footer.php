<div class="bot_sep"></div>
</div>
<div class="footer">
    <p>Designed by dimateon</p>

</div>
</div>



<<<<<<< HEAD
=======

>>>>>>> d5da951c95dc7a5ca39c6964291a5374ae28ec94
<script>
    $(document).ready(function(){
        $('.like').click(function(){
            var id = $(this).attr('data-id');
            $.post("/likes/add/"+id, {}, function (data) {
                $("#res_"+id).html(data);
            });

        });
    });
</script>
<<<<<<< HEAD
=======

>>>>>>> d5da951c95dc7a5ca39c6964291a5374ae28ec94
</body>
<html>