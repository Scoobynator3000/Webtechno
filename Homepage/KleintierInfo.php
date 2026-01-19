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

$kleintier = $result->fetch_assoc();
$PageTitle = $kleintier["Name"];

function customPageHeader() {
}

include_once('header.php');
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-utilities.min.css">
<link rel="stylesheet" href="style.css">
<html>
<body>

<div class="container">
  <div class="row align-items-start">
    <div class="text-div">
        <div class="img2">
          <img src="<?php echo htmlspecialchars($kleintier['Foto']); ?>" alt="Kleintier" width=100% height="auto">
        </div>
        <h1><?php echo htmlspecialchars($kleintier['Name']); ?> </h1>
         <p class="info-text"> Vermittelbarkeitsstatus: <?php echo htmlspecialchars($kleintier['Vermittelbar']); ?> </p>
       
        <p class="info-text"><?php echo htmlspecialchars($kleintier['Beschreibung']); ?> </p>

      
        
        
      </div>
       </div>
    </div>
    

</body>
</html>

<?php include 'footer.php'; ?>