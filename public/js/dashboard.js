$('#update-title').submit(function()  {
  var data = {
    title: $('#title').val()
  };
  $.ajax({
      url: '/updateTitle',
      type: 'post',
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      data: data,
      success: function(data) {
          // console.log(data);
          // alert(data);
      }
  });
});

$('#update-about').submit(function()  {
  var data = {
    about: $('#about').val()
  };
  $.ajax({
      url: '/updateAbout',
      type: 'post',
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      data: data,
      success: function(data) {
          // console.log(data);
          // alert(data);
      }
  });
});

$('#update-info').submit(function()  {
  var data = {
    information: $('#information').val()
  };
  $.ajax({
      url: '/updateMemberInformation',
      type: 'post',
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      data: data,
      success: function(data) {
          // console.log(data);
          // alert(data);
      }
  });
});


$('#update-contact').submit(function()  {
  var data = {
    email: $('#email').val(),
    address: $('#address').val(),
    phone_number: $('#phone_number').val(),
  };
  $.ajax({
      url: '/updateContact',
      type: 'post',
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      data: data,
      success: function(data) {
          // console.log(data);
          // alert(data);
      }
  });
});