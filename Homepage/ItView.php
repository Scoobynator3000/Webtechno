<?php
// Lade gebuchte Termine vor jeglicher Ausgabe
$storageFile = __DIR__ . '/storage.json';
$bookedData = [];
if (file_exists($storageFile)) {
    $bookedData = json_decode(file_get_contents($storageFile), true) ?: [];
}

$PageTitle = "Upload";
include_once('header.php');
?>
<div class= "text-div">
    hier kannst du fotos und etxt hochladen
</div>

<?php include 'footer.php'; ?>
