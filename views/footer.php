<div class="bot_sep"></div>
</div>
<div class="footer">
    <p>Designed by dimateon</p>

</div>
</div>



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
</body>
<html>