<!DOCTYPE html>
<?php
$PageTitle = "New Page Title";
require "db.php";
$sql = "SELECT Name, Foto, 'Beschreibung' from vögel";
$result = $db->query($sql);

function customPageHeader() {
}

include_once('header.php');
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-utilities.min.css">
<link rel="stylesheet" href="style.css">


<div>
        
    <h2>Lernen Sie unsere Vögel kennen:</h2>
    <p class="big-text"> Auf dieser Seite sehen Sie tagesaktuell alle Vögel, die ein neues Zuhause suchen.</p>

</div>

<div class="img-box">
     <h1 class="left-h1">
    <a href="http://localhost/Webtechno/Webtechno/Homepage/UnsereTiere.php" class="button">Zurück zur Übersicht</a>
  </h1>
</div>
   Wenn du an einem Tier interessiert bist, dann buche gerne hier einen Termin: <a href="http://localhost/Webtechno/Webtechno/Homepage/Buchungstool.php"> Unser Buchungstool </a> </br></br>
  <br><br></p>
<div class="img-box">

 <img src="Vogel-Vögel.jpg" alt="Vögel" style="width:500px; height:270px;">
</div>

<div class ="grid">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class = "card">
        <img src="<?php echo htmlspecialchars($row["Foto"]); ?>" alt="Vogel">
        <h3><?php echo htmlspecialchars($row["Name"]); ?></h3>
    </div>
    <?php endwhile; ?>
    </div>





</body>
<?php include 'footer.php'; ?>
</html>
