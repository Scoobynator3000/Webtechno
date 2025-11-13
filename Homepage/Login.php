<!DOCTYPE html>
<?php
$PageTitle = "New Page Title";

function customPageHeader() {
}

include_once('header.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['uname'] === 'larissa' && $_POST['psw'] === 'pisse') {
    header('Location: https://undojesus.org');
    exit;
  } else {
    $error = "Falscher Benutzername oder Passwort!";
  }
}
?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-utilities.min.css">
<link rel="stylesheet" href="style.css">


<div>
        
    <h1>Hier können sich unsere Mitarbeiter und Admins einloggen!</h1>
    <p class="big-text"> Bitte geben Sie Ihr Passwort und Ihren Benutzernamen ein:</p>

</div>


<div class="img-box">


<div class="container">
  <div class="row align-items-start">
    <div class="col">
    <form method="POST">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </form>
    </div>
  </div>
  <div class="row align-items-center">
    <div class="col">
      <img src="Login-2.png" alt="Login" class="center" style="width:270px; height:270px;">
    </div>
  </div>
</div>







</body>
</html>
