<!DOCTYPE html>
<?php
$PageTitle = "New Page Title";
require "db.php";
$sql = "SELECT * from kleintiere";
$result = $db->query($sql);

function customPageHeader() {
}

include_once('header.php');
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-utilities.min.css">
<link rel="stylesheet" href="style.css">


<div>
        
    <h2 style="margin: 20px;">Lernen Sie unsere Kleintiere kennen:</h2>
    <p class="big-text"> Auf dieser Seite sehen Sie tagesaktuell alle Kleintiere, die ein neues Zuhause suchen.<br>


   Wenn du an einem Tier interessiert bist, dann buche gerne hier einen Termin: <a href="http://localhost/Webtechno/Webtechno/Homepage/Buchungstool.php"> Unser Buchungstool </a> 
  <br><br></p>

  
  <p class="big-text-left">
    <a href="http://localhost/Webtechno/Webtechno/Homepage/UnsereTiere.php" class="button">Zurück zur Übersicht</a>
  </p>

</div>

<div class ="grid">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class = "card">
        <img src="<?php echo htmlspecialchars($row["Foto"]); ?>" alt="Kleintiere">
        <h3><?php echo htmlspecialchars($row["Name"]); ?></h3>
        <a href="KleintierInfo.php?id=<?php echo $row['id']; ?>"> Ansehen </a>
    </div>
    <?php endwhile; ?>
    </div>







</body>
<?php include 'footer.php'; ?>
</html>
