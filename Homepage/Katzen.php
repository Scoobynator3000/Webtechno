<!DOCTYPE html>
<?php
$PageTitle = "Unsere Katzen";
require "db.php";

/* 
 * Dynamische SQL-Abfrage für Name + Freigänger-Filter
 */
$sql = "SELECT id, Name, Foto FROM katzen WHERE 1=1";
$params = [];
$types = "";

// Name filtern
if (!empty($_GET['name'])) {
    $sql .= " AND Name LIKE ?";
    $params[] = "%" . $_GET['name'] . "%";
    $types .= "s";
}

// Freigänger filtern
if (isset($_GET['freiganger'])) {
    $sql .= " AND Freiganger = 1"; // oder `Freigänger` falls DB so heißt
}

$stmt = $db->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

function customPageHeader() {
}

include_once('header.php');
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-utilities.min.css">
<link rel="stylesheet" href="style.css">

<div>

    <h2>Lernen Sie unsere Katzen kennen:</h2>
    <p class="big-text">
        Auf dieser Seite sehen Sie tagesaktuell alle Katzen, die ein neues Zuhause suchen.
        <br><br>
        Wenn du an einem Tier interessiert bist, dann buche gerne hier einen Termin:
        <a href="http://localhost/Webtechno/Webtechno/Homepage/Buchungstool2.php">
            Unser Buchungstool
        </a>
    </p>

    <p class="big-text-left">
        <a href="http://localhost/Webtechno/Webtechno/Homepage/UnsereTiere.php" class="button">
            Zurück zur Übersicht
        </a>
    </p>

    <!-- Suchformular -->
    <form method="GET">
        <input type="text" name="name" placeholder="Name der Katze"
               value="<?= $_GET['name'] ?? '' ?>">

        <label>
            <input type="checkbox" name="freiganger" value="1"
                   <?= isset($_GET['freiganger']) ? 'checked' : '' ?>>
            Nur Katzen anzeigen, die allein bleiben können
        </label>

        <button type="submit">Suchen</button>
    </form>

</div>

<!-- Katzen-Grid -->
<div class="grid">
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="card">
            <img src="<?= htmlspecialchars($row["Foto"]); ?>" alt="Katze">
            <h3><?= htmlspecialchars($row["Name"]); ?></h3>
            <a href="KatzeInfo.php?id=<?= $row['id']; ?>">Ansehen</a>
        </div>
    <?php endwhile; ?>
</div>

</body>
<?php include 'footer.php'; ?>
</html>
