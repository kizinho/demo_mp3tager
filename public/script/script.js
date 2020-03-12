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

  /**
   * Loading the tags using XHR.
   */
  //sample.mp3 sits on your domain
  ID3.loadTags("../songs/sample.mp3", function() {
    showTags("../songs/sample.mp3");
  }, {
    tags: ["title","artist","album","picture"]
  });
  /**
   * Loading the tags using the FileAPI.
   */
  function loadFile(input) {
    var file = input.files[0],
      url = file.urn || file.name;

    ID3.loadTags(url, function() {
      showTags(url);
    }, {
      tags: ["title","artist","album","picture"],
      dataReader: ID3.FileAPIReader(file)
    });
  }
  /**
   * Generic function to get the tags after they have been loaded.
   */
  function showTags(url) {
    var tags = ID3.getAllTags(url);
    document.getElementById('title').textContent = tags.title || "";
    // document.getElementById('artist').textContent = tags.artist || "";
    // document.getElementById('album').textContent = tags.album || "";
    var image = tags.picture;
    if (image) {
      var base64String = "";
      for (var i = 0; i < image.data.length; i++) {
          base64String += String.fromCharCode(image.data[i]);
      }
      var base64 = "data:" + image.format + ";base64," +
              window.btoa(base64String);
      document.getElementById('picture').setAttribute('src',base64);
    } else {
      document.getElementById('picture').style.display = "none";
    }
  }
});
