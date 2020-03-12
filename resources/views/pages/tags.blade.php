<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tags</title>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/font.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/tags.css">
  <link rel="stylesheet" href="../css/responsive.css">
</head>
<body>


  <!-- --------------Start of navigation bar--------- -->
      <div class="navbar">
        <div class="logo">
          <a href="../index.html"><i class="fas fa-compact-disc"></i>
          KizitoAdike <span>Music</span></a>
        </div>
      <div class="nav-links">
        <input type="checkbox" id="chk-list-hide">
        <label for="chk-list-hide">
          <i class="fa fa-bars"></i>
        </label>
        <ul>
          <li><a href="../index.html">home</a></li>
          <li><a href="../index.html#aboutUs">about us</a></li>
          <li><a href="../index.html#contactUs">contact Us</a></li>
          <li><a href="./upload.html"> start uploading</a></li>
        </ul>
      </div>
      </div>
  <!-- --------------Start of Body----------->
<!-- Start of tags pages -->
<div class="container">
<div class="upload-container">
  <form action="">
    <div class="tag-field">
        <div class="row">
            <div class="col-sm tag-title" onchange="loadFile(this)">
              <label class="tag-responsive-p" id="title"></label>
          </div>
      </div>
    </div>
    <div class="tag-field">
        <div class="row">
            <div class="col-sm">
              <label class="tag-responsive-p">Existing image</label>
          </div>
        <div class="col-sm browse-btn-cont preview-field"  onchange="loadFile(this)">
          <img id="picture" src="" alt= "uploaded Song has no cover art" />
        </div>
      </div>
    </div>
<div class="tag-field tag-field-join">
    <div class="row">
        <div class="col-sm">
          <label class="tag-responsive-p">Join anther song ?</label>
          <input type="file" id="mp3-file-2" data-index="2"  class="d-nn" accept=".mp3">
      </div>
    <div class="col-sm browse-btn-cont">
          <label for="mp3-file-2" class="browse-btn browse-btn-js">Browse</label>
          <input type="text" placeholder="mp3 ,  wav"  data-select="txt2" id="aud-text2" readonly>
    </div>
  </div>
  <div class="select-btn">
    <div class="lbl-sel lbl-sel-none">
          <label for="none-song">none</label>
          <input type="radio" name="JoinSelect" value="none" id='none-song' class="none-song-rad" checked='checked'>
          <label for="none-song" class="none-song-lbl">✔</label>
      </div>
      <div class="lbl-sel">
          <label for="start-song">start</label>
            <input type="radio" name="JoinSelect" value="strat" id='start-song'class="start-song-rad">
          <label for="start-song" class="start-song-lbl">✔</label>
      </div>
      <div class="lbl-sel">
          <label for="end-song">end</label>
          <input type="radio" name="JoinSelect" value="end" id='end-song' class="end-song-rad" >
          <label for="end-song" class="end-song-lbl">✔</label>
      </div>
  </div>
</div>

<div class="tag-field">
    <div class="row">
        <div class="col-sm">
          <label class="tag-responsive-p">Select image file (up to 25Mb)</label>
          <input type="file" id='img-file'  data-index='0' class="d-nn" accept=".png,.jpg,.jpeg">
      </div>
    <div class="col-sm browse-btn-cont">
          <label for="img-file" class="browse-btn">Browse</label>
          <input type="text" placeholder="png , jpg , jpeg" data-select="txt0"  id="img-text" readonly>
    </div>
  </div>
</div>

<div class="tag-field tag-responsive">
    <div class="row">
      <div class="col-sm">
        <label>Title</label>
      </div>
      <div class="col-sm">
        <input type="text" placeholder='my song'>
      </div>
    </div>
</div>
<div class="tag-field tag-responsive">
    <div class="row">
      <div class="col-sm">
        <label>Artist</label>
      </div>
      <div class="col-sm">
        <input type="text" placeholder='my name'>
      </div>
    </div>
</div>
<div class="tag-field tag-responsive">
    <div class="row">
      <div class="col-sm">
        <label>Album</label>
      </div>
      <div class="col-sm">
        <input type="text" placeholder='My Album'>
      </div>
    </div>
</div>
<div class="tag-field tag-responsive">
    <div class="row">
      <div class="col-sm">
        <label>Track Number</label>
      </div>
      <div class="col-sm">
        <input type="text" placeholder='12'>
      </div>
    </div>
</div>
<div class="tag-field tag-responsive">
    <div class="row">
      <div class="col-sm">
        <label>Genre</label>
      </div>
      <div class="col-sm">
        <input type="text" placeholder='country'>
      </div>
    </div>
</div>
<div class="tag-field tag-responsive">
    <div class="row">
      <div class="col-sm">
        <label>Comments</label>
      </div>
      <div class="col-sm">
        <input type="text" placeholder='my comments'>
      </div>
    </div>
</div>
<div class="tag-field tag-responsive">
    <div class="row">
      <div class="col-sm">
        <label>Year</label>
     </div>
      <div class="col-sm">
        <input type="text" placeholder='2020'>
      </div>
    </div>
  </div>

  <div class="tag-field tag-responsive tag-field-save">
      <div class="row">
        <div class="col-sm">
          <div class="lbl-sel-data">
              <label for="temp-data">(save data for 10 mins)</label>
              <input type="radio" name="saveData" value="10mins" id='temp-data' class="temp-data-chk" checked='checked'>
              <label for="temp-data" class="temp-data">✔</label>
          </div>
          <div class="lbl-sel-data">
              <label for="forever-data" >(save data forever)</label>
              <input type="radio" name="saveData" value="forever" id='forever-data' class="forever-data-chk">
              <label for="forever-data" class="forever-data">✔</label>
          </div>
        </div>
      </div>
    </div>
<div class="tag-field tag-responsive">
    <div class="row">
      <div class="col-sm sub-btn-form">
        <input type="submit" value="apply and save">
      </div>
    </div>
  </div>

</form>
  <!-- End of container -->
  </div>
</div>
<div class="footer">
    <p>all copyrights reserved</p>
    <a href="#"><i class="fab fa-facebook"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
    <a href="#"><i class="fab fa-youtube"></i></a>
    <a href="#"><i class="fab fa-whatsapp"></i></a>
</div>
<!-- End of tags pages -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="../script/id3-minimized.js" type="text/javascript"></script>
  <script src="../script/script.js"></script>
</body>
</html>
