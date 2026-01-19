<!DOCTYPE html>
<?php
$PageTitle = "New Page Title";

function customPageHeader() {
}

include_once('header.php');
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-utilities.min.css">
<link rel="stylesheet" href="style.css">



<div>
        
    <h2>Willkommen auf der Tierheim Homepage! </h2>
<p><img src="Homepage-Foto.png" alt="Homepage Foto" style="max-width: 100%; height:auto;" align-items: center;></p>
</div>


<div class="row text-center">
  <div class="col-lg-4 col-md-6 col-sm-12">
   <h1 class="h1" font-decoration: underlined;>
    1300
  </h1>
  vermittelte Tiere im Jahr <br>
  
  <img src="Dackel.png" alt="Dackel" style="width:300px; height:270px;">
  </div>
  <div class="col-lg-4 col-md-6 col-sm-12">
   <h1 class="h1">
    2300
      </h1>
  Tiere in unsere Obhut  <br>
  <img src="Katze.png" alt="Dackel" style="width:300px; height:270px;">
  </div>
  <div class="col-lg-4 col-md-12 col-sm-12">
    <h1 class="h1">
    500
  </h1>
  Wildtiere gerettet  <br>
  <img src="Luchs.png" alt="Dackel" style="width:300px; height:270px;">
  </div>

</div>


<div class ="text-div">
    <p class ="info-text"> Wir freuen uns, dass du hier bist! </br>Wenn du mehr über unser Tierheim, oder unsere Tiere erfahren möchtest,
  dann findest du mit einem Klick auf die folgenden Links weitere Infos!</br></br>
  Möchtest du einen unserer Schützlinge adoptieren? </br>Dann kannst du sie auf unserer <a href="http://localhost/Webtechno/Webtechno/Homepage/UnsereTiere.php">Adoptions-Seite </a>kennenlernen! </br></br>
  <br>
  Hast du ein Tier in Not gefunden oder warst Zeuge von Tierquälerei? </br>Dann findest du auf unserer <a href="http://localhost/Webtechno/Webtechno/Homepage/Tiernotruf.php">Tiernotruf-Seite </a>Hilfe! </br></br>
  <br>
  Wenn du mehr über uns und unsere Entstehungsgeschichte erfahren möchtest, dann besuch gerne unsere <a href="http://localhost/Webtechno/Webtechno/Homepage/AboutUs.php">About-Us Page! </a> </br></br>
  <br></p>

</div>




</body>



<?php include 'footer.php'; ?>
</html>
