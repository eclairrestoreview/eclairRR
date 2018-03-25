$('#search').keypress(function(event) {
  if (event.keyCode == 13) {
    location.href = "/search/" + $('#search').val();
  }
});