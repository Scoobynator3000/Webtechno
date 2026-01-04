<!DOCTYPE html>
<?php
$PageTitle = "Info";
require "db.php";

$sql = "SELECT Name, 'Geschätztes Alter', Foto, 'Beschreibung' from hunde";
$result = $db->query($sql);

function customPageHeader() {
}

include_once('header.php');
?>
<body>
    <h1><?php echo htmlspecialchars($result["Name"]); ?> </h1>

</body>

<?php include 'footer.php'; ?>