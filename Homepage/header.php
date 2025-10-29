<!doctype html>
<html>
  <head>

    <style>
body {background-color: #d7d8edff;}
h1   {color: blue;}
p    {color: grey;}
div {
  width: 1400px;
  border: 5px #5b82b6ff;
  background-color: #ffffffff;
  border-radius: 25px;
  padding: 10px;
  margin: 20px;
  display: flex;
  align-items: center; 
  gap: 20px;  
}
.header-text h1 {
  margin-right: 450px; 
}

</style>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title><?= isset($PageTitle) ? $PageTitle : "Default Title"?></title>
    <!-- Additional tags here -->
    <?php if (function_exists('customPageHeader')){
      customPageHeader();
    }?>
    <body>
    <header>
      <div class="header-text">
        
        <img src="Logo.png">
        <h1>Tierheim</h1>
        <img src="Login.png">
        <p>Telefonnummer</p>
        <img src="Notruf.png">
         <p>Telefonnummer</p>
        <img src="Kontakt.png">
         <p>Telefonnummer</p>
      </div>
    </header>
  </head>
  <body>