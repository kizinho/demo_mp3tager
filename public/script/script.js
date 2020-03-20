$(document).ready(function () {

    // navigation bar slider

    $("#chk-list-hide").click(function () {
        $(".nav-links ul").toggleClass('fade-nav');
    });


$('.browse-btn-js').attr('for','');

$('select').change(function(){
  var selectedOption = $(this).children("option:selected").val();
  var parentIndex = $(this).parent().attr('data-render');
  var inpt="mp3-file-2-"+parentIndex;
  var txtclear="#aud-text2-"+parentIndex;
  var lbl="#lbl-"+parentIndex;
  if(selectedOption ==='none'){
    $(txtclear).val('');
    $(lbl).attr('for', '');
  }else{
    $(lbl).attr('for', inpt);
  }  
});





$("input[type = file]").change(function(e){
  var parentIndex = $(this).parent().parent().parent().attr('data-render');
  var txtclear="#aud-text2-"+parentIndex;
  if($(this).attr('data-type') ==='txt')
  $(txtclear).val(e.target.files[0].name);
});
$("input[type = file]").change(function(e){
  var parentIndexImg = $(this).parent().parent().parent().attr('data-render');
  var mylbltext="#img-text-"+parentIndexImg; 
  if($(this).attr('data-type') ==='img')
  $(mylbltext).val(e.target.files[0].name);
});
setInterval(function(){ 
if ( $('html').hasClass('translated-ltr')) {
  $('.navbar').css('margin-top','30px');
}else{
  $('.navbar').css('margin-top','0px');
}
}, 3000);
});

