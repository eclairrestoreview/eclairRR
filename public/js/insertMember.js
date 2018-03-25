$('#memberForm').submit(function()  {
  var data = {
      name: $('#name').val(),
      password: $('#password').val(),
      email: $('#email').val(),
      phone_number: $('#phone_number').val()
  };
  $.ajax({
      url: '/insertMember',
      type: 'post',
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      data: data,
      success: function(data) {
        //   console.log(data);
        //   alert(data);
      }
  });
});