$('#reviewForm').submit(function()  {
    var data = {
        restaurant_id: $('#restaurant_id').val(),
        name: $('#name').val(),
        email: $('#email').val(),
        review: $('#review').val(),
        rating: $("input[name='star']:checked").val()
    };
    $.ajax({
        url: '/insertReview',
        type: 'post',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: data,
        success: function(data) {
            // console.log(data);
            // alert(data);
        },
        error: function (ajaxContext) {
            // console.log(ajaxContext.responseText);
            // alert(ajaxContext.responseText);
        }
    });
});