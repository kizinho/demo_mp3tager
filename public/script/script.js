$(document).ready(function () {

  // navigation bar slider

  $("#chk-list-hide").click(function () {
    $(".nav-links ul").toggleClass('fade-nav');
  });


  $('.browse-btn-js').attr('for', '');


  setInterval(function () {
    if ($('html').hasClass('translated-ltr')) {
      $('.navbar').css('margin-top', '30px');
    } else {
      $('.navbar').css('margin-top', '0px');
    }
  }, 3000);
});
AOS.init();

