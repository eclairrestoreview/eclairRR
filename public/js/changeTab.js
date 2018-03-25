$(document).ready(function() {
  if(window.location.pathname.match(/home/g)) {
    $('#in-home').addClass('active');
  } else if(window.location.pathname.match(/member/g)) {
    $('#in-member').addClass('active');
  } else if(window.location.pathname.match(/promo/g)) {
    $('#in-promo').addClass('active');
  } else if(window.location.pathname.match(/partnership/g)) {
    $('#in-partnership').addClass('active');
  } else if(window.location.pathname.match(/about/g)) {
    $('#in-about').addClass('active');
  } else if(window.location.pathname.match(/review/g)) {
    $('#in-home').addClass('active');
  } 
});