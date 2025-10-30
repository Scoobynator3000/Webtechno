<!DOCTYPE html>
<?php
$PageTitle = "New Page Title";

function customPageHeader() {
  // optional: zusätzliche Tags oder CSS
}

include_once('header.php');
?>

 <style>
body {background-color: #d7d8edff;}

h1   {color: #171718ff;
    align-items: center;
    margin: auto;
    text-align: center;
    font-family:arial; 
  }

h2   {color: #171718ff;
    align-items: center;
    margin: auto;
    text-align: center;
    font-family:arial 
  }

p    {color: grey;
    font-family:arial}

.header-text div {
  width: 1400px;
  border: 5px #5b82b6ff;
  background-color: #ffffffff;
  border-radius: 25px;
  padding: 10px;
  margin: 5px;
  display: flex;
  align-items: center; 
  text-align: center;
  gap: 10px;  
}
.yellow-div {
  width: 1400px;
  background-color: #dfaf3fff;
  padding: 5px;
  margin: 2px;
  display: flex;
  align-items: center; 
  text-align: center;
  gap: 2px;  
}
.text-div {
  width: 1000px;
  background-color: #ffffffff;
  padding: 2px;
  margin: 2px;
  display: flex;
  align-items: center; 
  text-align: center;
  gap: 2px;  
   margin-left: 50px;
   border-radius: 0; 
}
.header-text h1 {
  margin-right: 450px; 
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
.info-text{
  color: black;
  font-family:arial;
  font-size: 17px;
  text-align: left;
  margin-left: 15px;
  margin-right: 15px;
}


</style>

<div class="header-text">
        
    <h2>Willkommen auf der Tierheim Homepage!</h2>

        
</div>
<div class="yellow-div">     
</div>

<p><img src="Homepage-Foto 2.png" alt="Homepage Foto" style="width:1400px; height:170px;" class="center"></p>


<div class ="text-div">
    <p class ="info-text"> Wir freuen uns, dass du hier bist! </br>Wenn du mehr über unser Tierheim, oder unsere Tiere erfahren möchtest,
  dann findest du mit einem Klick auf die folgenden Links weitere Infos!</br> </br>
  Hast du ein Tier in Not gefunden oder warst Zeuge von Tierquälerei? </br>Dann findest du auf unserer Notruf-Seite Hilfe! </br></br>
  Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, 
  sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem </br>
  ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore </br></br>
   magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, 
   no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
</div>


</body>
</html>
