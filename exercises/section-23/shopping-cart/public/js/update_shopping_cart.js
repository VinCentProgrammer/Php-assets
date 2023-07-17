
$(document).ready(function(){
    $('#num_order[data-id]').change(function(){
        let num_order = $(this).val();
        let id = $(this).attr('data-id');
        let data = {id: id, num_order: num_order};
        // console.log(data);
        $.ajax({
            url: "?mod=cart&act=ajax",
            method: "POST",
            data: data,
            dataType: 'json',
            success: function(data){
                // console.log(data);
                $(`#sub_total[data-id='${data.id}']`).text(data.sub_total);
                $("#total-price span").text(data.total);
                $("#num").text(data.num);
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    })

    
})