<!DOCTYPE html>
<?php

require "db.php";

if(!isset($_GET["id"])){
    die("kein tier ausgewählt");
}

$id = (int)$_GET["id"];

$stmt = $db->prepare("SELECT * FROM hunde WHERE id =?");
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

<div class="container">
  <div class="row align-items-start">
    
    <div class="text-div">
        <div class="img2">
          <img src="<?php echo htmlspecialchars($hund['Foto']); ?>" alt="Hund" width=100% height="auto">
        </div>
        <h1><?php echo htmlspecialchars($hund['Name']); ?> </h1>
        <p class="info-text"> <img src="Age.png" alt="Alter" class="img-fluid rounded" style="width:50px; height:40px;"> <?php echo htmlspecialchars($hund['Age']); ?> </p>
        <p class="info-text"><?php echo htmlspecialchars($hund['Beschreibung']); ?> </p>

      
        
        
      </div>
      </div>
    </div>
  </div>   




</body>
</html>

<?php include 'footer.php'; ?>