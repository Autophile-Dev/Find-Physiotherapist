
$("#myForm").unbind('submit').bind('submit', function () {
    // e.preventDefault();
    event.preventDefault();
    var form = $(this);
    // console.log(form);
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        // data: form.serialize(),
        // dataType: 'json',
        data: new FormData($('#myForm')[0]),
        processData: false,
        
        contentType: false,
        success:function(response){
            response = JSON.parse(response);
            
            alert(response.messages);
            location.reload();
            // $(document).Toasts('create', {
            //     class: response.class,
            //     title: response.title,
            //     // subtitle: 'Subtitle',
            //     body: response.messages
            // });
            // $('#add_stock_form')[0].reset();
        },
        error:function(e){
            console.log(e);
        }
    })
})