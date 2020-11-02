
function loadMore(){

    var row = Number($("#row").val());
    var all = Number($("#all").val());
    row = row + 5;

    if(row <= all) {
        $("#row").val(row);

        $.ajax({
            url: 'index.php',
            type: "POST",
            data: {row: row},
            beforeSend: function () {
                $('#load-more').text("Loading...");
            },
            success: function (response) {
                setTimeout(function () {

                    $(".post:last").after(response).show().fadeIn("slow");
                    var rowno = row + 3;
                    if(rowno > all){
                        $('#load-more').text("Hide");
                        $('#load-more').css("background","darkorchid");
                    }else{
                        $('#load-more').text("Load more");
                    }
                }, 1000);
            }
        });
    }else{
        $('#load-more').text("Loading...");

        setTimeout(function() {
            $('.post:nth-child(5)').nextAll('.post').remove().fadeIn("slow");
            $("#row").val(0);
            $('#load-more').text("Load more");
            $('#load-more').css("background","#15a9ce");

        }, 1000);
    }
}


