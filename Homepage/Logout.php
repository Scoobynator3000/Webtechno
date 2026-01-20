<?php
session_start();
session_unset();
session_destroy();

if(ini_get("session.use.cookies")){
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 420000, $params["path"],$params["domain"], $params["secure"], $params["hhtponly"]
    );
}

header("Location: Login.php");
exit;
?>