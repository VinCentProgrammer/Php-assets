$(document).ready(function(){
    // alert("ok");
    $("#num_order").change(function(){
        let num_order = $(this).val();
        let price = $("#price").text();
        let data = {num_order : num_order, price : price};
        // console.log(data);
        $.ajax({
            url: 'process.php',
            method: 'POST',
            data: data,
            dataType: 'text',
            success: function(data){
                // $("#res").text(data);
                $("#res").html("<strong>"+data+"</strong>");

                // console.log(data);
                // alert(data.total);
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    })
})