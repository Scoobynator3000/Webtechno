<?php
session_start(); 

if(!isset($_SESSION["role"]) || $_SESSION["role"] !== "ITmitarbeiter")
{
  header("Location: Login.php");
  exit;
}
$PageTitle = "ItView"; 
include_once('header.php'); 
?> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-utilities.min.css">
<link rel="stylesheet" href="style.css">
<div class= "text-div">


</head>
<body>

<h2>Datei Upload</h2>

<form method="post" enctype="multipart/form-data" action="AboutUs.php">

  <div class="mb-3">
    <label class="form-label">Textdatei hochladen</label>
    <input type="file" name="datei" accept="text/*" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Bild hochladen</label>
    <input type="file" id="bildInput" name="bilddatei" accept="image/*" class="form-control" required>
  </div>

  <img id="preview" style="max-width:300px; display:none; margin-top:10px;">

  <button type="submit" class="btn btn-primary mt-3">Hochladen</button>

</form>

<script>
document.getElementById('bildInput').addEventListener('change', function () {
  const file = this.files[0];
  const preview = document.getElementById('preview');

  if (file && file.type.startsWith('image/')) {
    preview.src = URL.createObjectURL(file);
    preview.style.display = 'block';

    preview.onload = () => URL.revokeObjectURL(preview.src);
  } else {
    preview.style.display = 'none';
  }
});
</script>

</body>
</html>
