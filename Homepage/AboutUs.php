<?php
session_start(); 

$PageTitle = "AboutUs"; 
include_once('header.php'); 

$text = '';
$bildPfad = '';

// TEXTDATEI LESEN
if (!empty($_FILES['datei']['tmp_name'])) {
    $text = file_get_contents($_FILES['datei']['tmp_name']);
        $_SESSION['text'] = $text;
} elseif (isset($_SESSION['text'])) {
    $text = $_SESSION['text'];
}

// BILD SPEICHERN
if (!empty($_FILES['bilddatei']['tmp_name'])) {

    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }

    $bildPfad = 'uploads/' . basename($_FILES['bilddatei']['name']);
    move_uploaded_file($_FILES['bilddatei']['tmp_name'], $bildPfad);

    $_SESSION['bildPfad'] = $bildPfad;

} elseif (isset($_SESSION['bildPfad'])) {
    $bildPfad = $_SESSION['bildPfad'];
}

?> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-utilities.min.css">
<link rel="stylesheet" href="style.css">

<div class="title text-center my-5">
  <h1 class="fw-bold">Seit 2025 finden bei uns alle Tiere ein Zuhause</h1>
  <p class="text-muted mt-2">Mit Herz, Verantwortung und Liebe</p>
</div>


<body>
<div class="container my-5">
  <div class="row">
    
    <!-- Text -->
    <div class="col-md-7">
        <div class="soft-section">
      <p class="info-text">
     Seit der Gründung des Tierheims Fellfreunde im September 2025 haben wir bereits unzähligen Tieren ein neues, liebevolles Zuhause vermitteln können. Jede vermittelte Taube, jede gerettete Ratte und jedes Tier, das durch unsere Patenschaften Unterstützung erhält, ist für uns ein kleiner, aber bedeutender Erfolg. Es zeigt, dass Mitgefühl und Engagement einen echten Unterschied machen können.<br><br> Trotz unserer Erfolge stoßen wir immer wieder an Grenzen. Unser Tierheim, so lebendig und voller Herzblut es auch ist, könnte noch so viel mehr erreichen, wenn wir von der Stadt Wien mehr Unterstützung erhielten, sei es durch finanzielle Förderung, Ressourcen oder offizielle Anerkennung unserer Arbeit. Mit zusätzlicher Hilfe könnten wir noch mehr Tieren Schutz bieten, noch mehr Pflegestellen ausstatten und noch mehr Menschen für den Tierschutz begeistern.<br><br> Wir träumen von einer Stadt, die nicht nur ihre historischen Gebäude und Parks, sondern auch die Tiere ihrer Gemeinschaft schützt und fördert. Wir hoffen, dass Wien unsere Arbeit stärker wertschätzt und uns die Unterstützung gibt, die unsere tierischen Schützlinge verdienen.
    <br> <br> Wenn du an einem unserer Schützlinge interessiert bist, dann lerne gerne einen unserer  <a href="http://localhost/Webtechno/Webtechno/Homepage/UnsereTiere.php">Schützlinge </a> kennen! </p>

    </div>
</div>
    

    <!-- Bilder -->
    <div class="col-md-5">
      <div class="img2 mb-3">
        <img src="Rattis.jpg" alt="Ratten im Tierheim Foto" class="img-fluid rounded" style="width:480px; height:280px;">
      </div>
       <div class="img2 mb-3">
        <img src="Taubenschlag.jpg" alt="Taubenschlag Foto" class="img-fluid rounded" style="width:480px; height:280px;">
      </div>


    </div>

  </div>
</div>



<div class="title text-center my-5">
  <h1 class="fw-bold">Aktuelle Informationen über das Tierheim</h1>
</div>

  <p class="text-muted mt-2" style = "text-align:left; margin-left: 110px;" >Dezember 2025</p>

<div class="container my-5">
  <div class="row">
    
    <!-- Text -->
    <div class="col-md-7">
        <div class="soft-section">
      <p class="info-text">
   <hr>

<h3>Text</h3>
<?php if ($text): ?>
  <pre><?= htmlspecialchars($text) ?></pre>
<?php else: ?>
  <p>Kein Text hochgeladen.</p>
<?php endif; ?>

<hr>
     <br>
     <br>


    </div>
</div>
    

    <!-- Bilder -->
    <div class="col-md-5">
      <div class="img2 mb-3">
                <h3>Bild</h3>
<?php if ($bildPfad): ?>
  <img src="<?= $bildPfad ?>" style="max-width:400px;">
<?php else: ?>
  <p>Kein Bild hochgeladen.</p>
<?php endif; ?>

      </div>

    </div>



  </div>
</div>

<?php include 'footer.php'; ?>


</body>

<style>
.soft-section {
  background: #93b9e1;
  padding: 40px;
  border-radius: 24px;
}
</style>


<br><br>



