
<?php

require "db.php";

if(!isset($_GET["id"])){
    die("kein tier ausgewählt");
}

$id = (int)$_GET["id"];

$stmt = $db->prepare("SELECT * FROM katzen WHERE id =?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();


if($result->num_rows === 0)
{
    die("Tier nicht gefunden");
}

$katze = $result->fetch_assoc();
$PageTitle = $katze["Name"];

function customPageHeader() {
}

include_once('header.php');
?>
<!DOCTYPE html>
<html>
<body>
    <div class="container">
  <div class="row align-items-start">
    
    <div class="text-div">
        <div class="img2">
          <img src="<?php echo htmlspecialchars($katze['Foto']); ?>" alt="Katze" width=100% height="auto">
        </div>
        <h1><?php echo htmlspecialchars($katze['Name']); ?> </h1>
        <p class="info-text"> <img src="Age.png" alt="Alter" class="img-fluid rounded" style="width:50px; height:40px;"> <?php echo htmlspecialchars($katze['Age']); ?> </p>
        <p class="info-text"><?php echo htmlspecialchars($katze['Beschreibung']); ?> </p>

      
        
        <p class="info-text"></p>
      </div>
      </div>
    </div>
  </div>   

    

</body>
</html>

<?php include 'footer.php'; ?>