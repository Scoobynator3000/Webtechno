<!DOCTYPE html>
<?php
$PageTitle = "Unsere Vögel";
require "db.php";

// SQL bleibt SELECT *, Art ist damit automatisch enthalten
$sql = "SELECT * FROM vögel";
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
    <p class="big-text">
        Auf dieser Seite sehen Sie tagesaktuell alle Vögel, die ein neues Zuhause suchen.
        <br><br>
        Wenn du an einem Tier interessiert bist, dann buche gerne hier einen Termin: 
        <a href="http://localhost/Webtechno/Webtechno/Homepage/Buchungstool2.php">Unser Buchungstool</a>
        <br><br>
    </p>
    <p class="big-text-left">
        <a href="http://localhost/Webtechno/Webtechno/Homepage/UnsereTiere.php" class="button">Zurück zur Übersicht</a>
    </p>
</div>

<div class="grid">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="card">
        <img src="<?= htmlspecialchars($row["Foto"]); ?>" alt="Vogel">
        <h3><?= htmlspecialchars($row["Name"]); ?></h3>
        <p><strong>Art:</strong> <?= htmlspecialchars($row["Art"]); ?></p> 
        <a href="VogelInfo.php?id=<?= $row['id']; ?>"> Ansehen </a>
      </div>
    <?php endwhile; ?>
</div>

</body>
<?php include 'footer.php'; ?>
</html>
