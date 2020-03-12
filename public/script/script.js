$(document).ready(function() {
  $("input[type = file").change(function(e){
    var contTxt = 'txt'+$(this).attr('data-index');
    $(`[data-select=${contTxt}]`).val(e.target.files[0].name)
  })



  $(".browse-btn-js").removeAttr('for')
  $(".lbl-sel input[type='radio']").change(function() {
    if ($(".lbl-sel-none input[type='radio']").is(':checked')) {
        $("#aud-text2").val('')
       $(".browse-btn-js").removeAttr('for');
    }else {
      $(".browse-btn-js").attr('for', 'mp3-file-2');
    }
  });

  
});
