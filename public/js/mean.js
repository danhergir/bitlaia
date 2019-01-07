$('.retire').on('click', function(event) {
    event.preventDefault();
    orderId =  $('input#order-retire').val();
    $.ajax({
        method: 'POST',
        url: urlRetire,
        data: {orderId: orderId, _token:token},
        success: function(json) {
            if(!json.error) location.reload(true);
        },
        error: function(e){ console.log(e.responseText); }
    })
});