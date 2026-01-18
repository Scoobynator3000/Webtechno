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
  <h2>Unsere Tiere:</h2>
  <p class="big-text" style = "text-align:left;">An welcher Tierart sind Sie interessiert?</p>
</div>


<div class="img-box d-flex flex-wrap justify-content-start gap-4">

    <div class="img-item text-center">
        <img src="Hund1.png" alt="Hund" style="width:240px; height:210px; padding:25px;">
        <br>
        <a href="http://localhost/Webtechno/Webtechno/Homepage/Hunde.php" class="button">Hunde</a>
    </div>

    <div class="img-item text-center">
        <img src="Katze1.png" alt="Katze" style="width:240px; height:210px; padding:25px;">
        <br>
        <a href="http://localhost/Webtechno/Webtechno/Homepage/Katzen.php" class="button">Katzen</a>
    </div>

    <div class="img-item text-center">
        <img src="Kleintier1.png" alt="Kleintier" style="width:240px; height:210px; padding:25px;">
        <br>
        <a href="http://localhost/Webtechno/Webtechno/Homepage/Kleintiere.php" class="button">Kleintiere</a>
    </div>

    <div class="img-item text-center">
        <img src="Vogel1.png" alt="Vogel" style="width:240px; height:210px; padding:25px;">
        <br>
        <a href="http://localhost/Webtechno/Webtechno/Homepage/Vogel.php" class="button">Vögel</a>
    </div>

</div>




</body>
<?php include 'footer.php'; ?>
</html>
