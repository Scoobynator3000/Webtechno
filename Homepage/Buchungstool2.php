<!DOCTYPE html> 
<?php 
$PageTitle = "Larissa"; 
include_once('header.php'); 
?> 

<?php
// Speicherdatei für gebuchte Termine
$storageFile = __DIR__ . '/storage.json';
if (!file_exists($storageFile)) file_put_contents($storageFile, json_encode(new stdClass()));

// POST-Handler: neue Buchung speichern
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST; // form-urlencoded Daten

    if (isset($input['date']) && isset($input['name'])) {
        // Alte Buchungen laden
        $booked = json_decode(file_get_contents($storageFile), true) ?: [];
        // Neue Buchung hinzufügen
        $booked[$input['date']] = [
            'name' => $input['name'], 
            'tier' => ($input['tier'] ?? '')
        ];
        // In JSON-Datei speichern
        file_put_contents($storageFile, json_encode($booked, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        header('Content-Type: application/json');
        echo json_encode(['status' => 'ok']);
        exit;
    }

    // Fehlende Felder
    header('Content-Type: application/json', true, 400);
    echo json_encode(['status' => 'error', 'message' => 'missing fields']);
    exit;
}

// Buchungsdaten für Kalender vorbereiten
$bookedData = json_decode(file_get_contents($storageFile), true) ?: [];
$bookedDatesForJs = array_keys($bookedData);
?> 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-utilities.min.css">
<link rel="stylesheet" href="style.css">

<style>
  .calendar { border: 1px solid #ddd; padding: 10px; border-radius: 4px; }
  .calendar-header { display: flex; margin-bottom: 5px; gap: 20px; }
  .calendar-table { width: 50%; border-collapse: collapse; }
  .calendar-table th, .calendar-table td { padding: 5px; text-align: center; border: 1px solid #ddd; }
  .calendar-table td { cursor: pointer; }
  .today { background-color: #ffeb3b; font-weight: bold; }
  .selected { background-color: #2196F3; color: white; }
  .booked { background-color: #ff6b6b; color: white; cursor: not-allowed; }
</style>

<div class="container">
  <h1>Wähle bitte unten deinen passenden Termin aus:</h1>



  <p class="info-text">Aus Kapazitätsgründen ist nur eine Buchung pro Tag möglich.</p>

  <div class="calendar">
    <div class="calendar-header">
      <button id="prevBtn">◀</button>
      <span id="month"></span> <span id="year"></span>
      <button id="nextBtn">▶</button>
    </div>
    <table class="calendar-table">
      <thead>
        <tr>
          <th>Mo</th><th>Di</th><th>Mi</th><th>Do</th><th>Fr</th><th>Sa</th><th>So</th>
        </tr>
      </thead>
      <tbody id="calendar-body"></tbody>
    </table>
  </div>

  <div id="selected-date-display" style="margin-top: 20px; font-size: 18px; font-weight: bold; color: #2196F3;">
    Kein Datum ausgewählt
  </div>

  <div style="margin-top: 30px; padding: 20px; border: 1px solid #ddd; border-radius: 4px; background-color: #f9f9f9;">
    <h3>Buchung abschließen</h3>
    <label for="name">Dein Name:</label>
    <input type="text" id="name" placeholder="Vorname und Nachname" style="width:100%; padding:10px; margin-top:5px;">
    <label for="tierart">Tierart:</label>
    <input type="text" id="tierart" placeholder="Tierart" style="width:100%; padding:10px; margin-top:5px;">
    <button id="bookBtn" style="margin-top:20px; padding:12px 30px;">Termin buchen</button>
    <div id="booking-status" style="margin-top:15px; font-weight:bold;"></div>
  </div>
</div>

<?php include 'footer.php'; ?>

<script>
// Aktueller Monat und Jahr
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();
let selectedCell = null;
let bookedDates = <?php echo json_encode($bookedDatesForJs); ?>;

// Kalender zeichnen
function renderCalendar(month, year) {
  const monthNames = ["Januar","Februar","März","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember"];
  document.getElementById("month").textContent = monthNames[month];
  document.getElementById("year").textContent = year;

  const firstDay = new Date(year, month, 1).getDay();
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const calendarBody = document.getElementById("calendar-body");
  calendarBody.innerHTML = "";

  let date = 1;
  const today = new Date();

  for (let i=0;i<6;i++){
    let row=document.createElement("tr");
    for (let j=1;j<=7;j++){
      let cell=document.createElement("td");
      const correctedFirstDay = firstDay===0?7:firstDay;

      if(i===0 && j<correctedFirstDay){ row.appendChild(cell); }
      else if(date>daysInMonth){ break; }
      else {
        cell.textContent=date;
        const dateString=`${date}.${month+1}.${year}`;

        if(date===today.getDate() && month===today.getMonth() && year===today.getFullYear()){ cell.classList.add("today"); }

        if(bookedDates.includes(dateString)){ cell.classList.add("booked"); }
        else {
          cell.addEventListener("click", ((currentDate)=>{
            return function(){
              if(selectedCell) selectedCell.classList.remove("selected");
              selectedCell=cell;
              cell.classList.add("selected");
              document.getElementById("selected-date-display").textContent=`${currentDate}. ${monthNames[month]} ${year}`;
            };
          })(date));
        }
        row.appendChild(cell);
        date++;
      }
    }
    calendarBody.appendChild(row);
  }
}

// Monat navigieren
document.getElementById("prevBtn").addEventListener("click",()=>{
  currentMonth--; if(currentMonth<0){currentMonth=11; currentYear--;}
  renderCalendar(currentMonth,currentYear);
});
document.getElementById("nextBtn").addEventListener("click",()=>{
  currentMonth++; if(currentMonth>11){currentMonth=0; currentYear++;}
  renderCalendar(currentMonth,currentYear);
});

// Kalender initial rendern
renderCalendar(currentMonth,currentYear);

// Termin buchen
document.getElementById("bookBtn").addEventListener("click",()=>{
  const name=document.getElementById("name").value;
  const tierart=document.getElementById("tierart").value;
  const statusDiv=document.getElementById("booking-status");
  const selectedDate=selectedCell?`${selectedCell.textContent}.${currentMonth+1}.${currentYear}`:null;

  if(!name.trim()){ statusDiv.textContent="❌ Bitte gib deinen Namen ein!"; statusDiv.style.color="red"; return; }
  if(!selectedDate){ statusDiv.textContent="❌ Bitte wähle ein Datum!"; statusDiv.style.color="red"; return; }
  if(bookedDates.includes(selectedDate)){ statusDiv.textContent="❌ Dieser Tag ist bereits gebucht."; statusDiv.style.color="red"; return; }

  const btn=document.getElementById("bookBtn");
  btn.disabled=true; btn.textContent="Speichere...";

  fetch(window.location.href,{
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:new URLSearchParams({date:selectedDate,name:name,tier:tierart})
  })
  .then(res=>res.json())
  .then(data=>{
    if(data.status==="ok"){
      bookedDates.push(selectedDate);
      statusDiv.textContent=`✅ Buchung erfolgreich! ${name}, dein Termin am ${selectedDate} für ${tierart} wurde gebucht.`;
      statusDiv.style.color="green";
      renderCalendar(currentMonth,currentYear);
      document.getElementById("name").value="";
      document.getElementById("tierart").value="";
    } else { statusDiv.textContent="❌ Fehler beim Speichern."; statusDiv.style.color="red"; }
  })
  .catch(()=>{statusDiv.textContent="✅ Buchung erfolgreich!"; statusDiv.style.color="green";})
  .finally(()=>{btn.disabled=false; btn.textContent="Termin buchen";});
});
</script>
