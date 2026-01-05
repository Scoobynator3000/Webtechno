<!DOCTYPE html>
<?php

require "db.php";

if(!isset($_GET["id"])){
    die("kein tier ausgewählt");
}

$id = (int)$_GET["id"];

$stmt = $db->prepare("SELECT * FROM kleintiere WHERE id =?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();


if($result->num_rows === 0)
{
    die("Tier nicht gefunden");
}

$hund = $result->fetch_assoc();
$PageTitle = $hund["Name"];

function customPageHeader() {
}

include_once('header.php');
?>
<html>
<body>
    <h1><?php echo htmlspecialchars($hund['Name']); ?> </h1>
    

</body>
</html>

<?php include 'footer.php'; ?>