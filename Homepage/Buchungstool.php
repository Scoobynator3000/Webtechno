<!DOCTYPE html> 
<?php $PageTitle = "Larissa"; 
include_once('header.php'); 
?> 
<div class="container">

<div>
        
    <h1>Wähle bitte unten deinen passenden Termin aus: </h1>
</div>

<div class="text-div">
<br>
   <label for="months">Monat:</label>

<select name="months" id="months">
  <option value="Januar">Januar</option>
  <option value="Februar">Febrauar</option>
  <option value="März">März</option>
  <option value="April">April</option>
  <option value="Mai">Mai</option>
  <option value="Juni">Juni</option>
  <option value="Juli">Juli</option>
  <option value="August">August</option>
  <option value="September">September</option>
  <option value="Oktober">Oktober</option>
  <option value="November">November</option>
  <option value="Dezember">Dezember</option>
</select> 

   <label for="Jahr">Jahr:</label>

<select name="Jahr" id="Jahr">
  <option value="2025">2025</option>
  <option value="2026">2026</option>
  <option value="2027">2027</option>

</select> 

        <p class="info-text">
            Aus Kapazitätsgründen ist zurzeit leider nur eine Buchung pro Tag möglich.
</p>


<div class="container">
  <div class="text-div">
    <div class="row align-items-start">
    
      <div class="col">
        <p class="info-text">
           <ul>
             Wochentage Hier sind die Tage der woche
            </ul>
        </p>
        
      </div>
</div>
</div>
      
  <?php include 'footer.php'; ?>    
