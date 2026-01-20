
<?php
session_start();

$PageTitle = "New Page Title";
require "db.php";
include_once('header.php');

if(isset($_SESSION["role"]) && $_SESSION["role"] === "mitarbeiter")
{
  header("Location: MitarbeiterView.php");
  exit;
}
else if(isset($_SESSION["role"]) && $_SESSION["role"] === "ITmitarbeiter")
{
  header("Location: ItView.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = ($_POST['username'] ?? '');
    $password = ($_POST['password'] ?? '');

   $stmt = $db-> prepare("SELECT id, MApw FROM mauser WHERE mitarbeiter = ?");
   $stmt->bind_param("s", $username);
   $stmt->execute();
   $result = $stmt->get_result();

   if($user = $result->fetch_assoc()){
    if(password_verify($password, $user["MApw"]))
    {
      $_SESSION["user_id"] = $user["id"];
      $_SESSION["role"] = "mitarbeiter";

      header("Location: MitarbeiterView.php");
      exit;
    }
   }

   $stmt = $db-> prepare("SELECT id, ITpw FROM ITuser WHERE ITmitarbeiter = ?");
   $stmt->bind_param("s", $username);
   $stmt->execute();
   $result = $stmt->get_result();

   if($user = $result->fetch_assoc()){
    if(password_verify($password, $user["ITpw"]))
    {
      $_SESSION["user_id"] = $user["id"];
      $_SESSION["role"] = "ITmitarbeiter";

      header("Location: ItView.php");
      exit;
    }
      
  }
$error = "Benutzername oder Password falsch";
}

function customPageHeader() {
}
?>

<!DOCTYPE html>


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
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </form>
    <?php if (!empty($error)): ?>
  <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

    </div>
  </div>
  <div class="row align-items-center">
    <div class="col">
      <img src="Login-2.png" alt="Login" class="center" style="width:270px; height:270px;">
    </div>
  </div>
</div>
</div>


</body>
<?php include 'footer.php'; ?>
</html>
