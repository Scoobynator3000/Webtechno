<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
        rel="stylesheet">

   
    <link rel="stylesheet" href="style.css">

    <title><?= isset($PageTitle) ? $PageTitle : "Tierheim" ?></title>

    <style>
        body {
            background-color: #d7d8edff;
            font-family: sans-serif;
        }

        .header-text {
          width: 100%;     
          background-color: #fff;
          border: 5px solid #5b82b6ff;
          border-radius: 25px;
          padding: 20px;
          margin: 0 auto;  
          display: flex;
          flex-wrap: wrap;
          align-items: center;
          justify-content: center;
          gap: 20px;
        }

        .nav-buttons a {
            padding: 7px 15px;
            border: 2px solid black;
            border-radius: 4px;
            color: black;
            background-color: #94b3dbff;
            text-decoration: none;
            margin: 5px;
        }

        .nav-buttons a:hover {
            background-color: #242170ff;
            color: white;
        }
    </style>
</head>

<body>



    <!-- HEADER BOX -->
    <div class="header-text text-center">
        <img src="Logo.png" alt="Logo" style="height:60px;">
        <h1 class="m-0">Tierheim</h1>

        <div class="d-flex align-items-center gap-2">
            <img src="Login.png" alt="Login" style="height:40px;">
            <p class="m-0">Telefonnummer</p>
        </div>

        <div class="d-flex align-items-center gap-2">
            <img src="Notruf.png" alt="Notruf" style="height:40px;">
            <p class="m-0">Telefonnummer</p>
        </div>

        <div class="d-flex align-items-center gap-2">
            <img src="Kontakt.png" alt="Kontakt" style="height:40px;">
            <p class="m-0">Telefonnummer</p>
        </div>

        <img src="Dackel.gif" alt="Dackel GIF" style="width:180px; height:80px;">
    </div>

    <!<div class="nav-buttons"> 
      <a href="http://localhost/Webtechno/Webtechno/Homepage/index.php" 
      class="button">Homepage</a> <a href="http://localhost/Webtechno/Webtechno/Homepage/UnsereTiere.php" 
      class="button">Unsere Tiere</a> <a href="http://localhost/Webtechno/Webtechno/Homepage/AboutUs.php" 
      class="button">About Us</a> <a href="http://localhost/Webtechno/Webtechno/Homepage/Tiernotruf.php" 
      class="button">Tiernotruf</a> <a href="http://localhost/Webtechno/Webtechno/Homepage/Login.php" 
      class="button">Login</a> </div>


