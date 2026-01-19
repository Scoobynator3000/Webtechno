<!DOCTYPE html>
<?php

require "db.php";

if(!isset($_GET["id"])){
    die("kein tier ausgewählt");
}

$id = (int)$_GET["id"];

$stmt = $db->prepare("SELECT * FROM vögel WHERE id =?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();


if($result->num_rows === 0)
{
    die("Tier nicht gefunden");
}

$vogel = $result->fetch_assoc();
$PageTitle = $vogel["Name"];

function customPageHeader() {
}

include_once('header.php');
?>
<html>
<body>
    <div class="container">
  <div class="row align-items-start">
    <div class="text-div">
        <div class="img2">
          <img src="<?php echo htmlspecialchars($vogel['Foto']); ?>" alt="vogel" width=100% height="auto">
        </div>
        <h1><?php echo htmlspecialchars($vogel['Name']); ?> </h1>
       
        <p class="info-text"><?php echo htmlspecialchars($vogel['Beschreibung']); ?> </p>

      
        
        </div>
       </div>
      </div>
    

</body>
</html>

<?php include 'footer.php'; ?>