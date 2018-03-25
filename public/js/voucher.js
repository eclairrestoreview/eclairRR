var ifEmailgoodTogo = true;

$('#email').change(function () {
  var email = $('#email').val() != "" ? $('#email').val() : 'test';
  $.ajax({
    url: '/checkIfExist/' + email,
    type: 'get',
    success: function(data) {
      if(data === 'true') {
        $("#emailLabel").text("You can get a promo");
        ifEmailgoodTogo = true;
      } else {
        $("#emailLabel").text("You have to register your account");
        ifEmailgoodTogo = false;
      }
      console.log(ifEmailgoodTogo);
        // console.log(data);
        // alert(data);
    }
  });
});

$("button").click(function() {
  var buttonId = $(this).attr('id');
  var email = $('#email').val() != "" ? $('#email').val() : 'test';
  if(ifEmailgoodTogo) {
    $.ajax({
      url: '/checkIfGetPromo/' + email + '/'+ buttonId,
      type: 'get',
      success: function(data) {
        if(data === 'true') {
          $("#emailLabel").text("You already get the promo");
        } else {
          var data = {
            code: buttonId,
            email: email
          };
          $.ajax({
              url: '/sendemail',
              type: 'get',
              data: data,
              success: function(data) {
                  console.log(data);
                  // alert(data);
                  $("#emailLabel").text("You get the promo, check your email!!");
              }
          });
        }
        console.log(ifEmailgoodTogo);
          // console.log(data);
          // alert(data);
      }
    });
  }
});