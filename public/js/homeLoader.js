function getLoadData() {
  var restaurant_id = $('#btn-more').data('id');
  var counter = $('#btn-more').data('counter');
  var order = 'asc';
  $("#btn-more").html("Loading....");
  $.ajax({
    url : 'home/ajax/loaddata',
    method : "get",
    cache: false,
    data : {
      restaurant_id : restaurant_id,
      counter : counter,
      order : order
    },
    dataType : "text",
    success : function (data)
    {
      console.log(data);
      if(data != '') 
      {
          $('#remove-row').remove();
          $('#load-data').append(data);
      }
      else
      {
          $('#btn-more').html("No Data");
      }
    }
  });
}