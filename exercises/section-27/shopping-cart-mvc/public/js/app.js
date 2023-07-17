$(document).ready(function(){
    $("#num_order[data-id]").change(function(){
        let id = $(this).attr('data-id');
        let num_order = $(this).val();
        let data = {id: id, num_order: num_order};
        $.ajax({
            url: "?mod=cart&action=update",
            method: "POST",
            data: data,
            dataType: 'json',
            success: function(data){
                // console.log(data);
                $(`#sub_total[data-id='${id}']`).text(data.sub_total);
                $(`#total`).text(data.total);
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    })
})