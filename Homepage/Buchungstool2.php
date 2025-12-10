<!DOCTYPE html> 
<?php $PageTitle = "Larissa"; 
include_once('header.php'); 
?> 

<?php
// POST-Handler und gebuchte Daten müssen vor jeglicher HTML-Ausgabe stehen
$storageFile = __DIR__ . '/storage.json';
if (!file_exists($storageFile)) file_put_contents($storageFile, json_encode(new stdClass()));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (empty($input)) $input = $_POST;

    if (isset($input['date']) && isset($input['name'])) {
        $booked = json_decode(file_get_contents($storageFile), true) ?: [];
        $booked[$input['date']] = ['name' => $input['name'], 'tier' => ($input['tier'] ?? '')];
        file_put_contents($storageFile, json_encode($booked, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        header('Content-Type: application/json');
        echo json_encode(['status' => 'ok']);
        exit;
    }

    header('Content-Type: application/json', true, 400);
    echo json_encode(['status' => 'error', 'message' => 'missing fields']);
    exit;
}

// Für das Frontend: gebuchte Daten laden
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

        <!-- Interaktiver Kalender -->
        <div class="calendar">
          <div class="calendar-header">
            <button id="prevBtn">◀</button>
            <span id="month"></span> <span id="year"></span>
            <button id="nextBtn">▶</button>
          </div>

          <table class="calendar-table">
            <thead>
              <tr>
                <th>Mo</th>
                <th>Di</th>
                <th>Mi</th>
                <th>Do</th>
                <th>Fr</th>
                <th>Sa</th>
                <th>So</th>
              </tr>
            </thead>
            <tbody id="calendar-body"></tbody>
          </table>
        </div>

                <!-- Ausgewähltes Datum anzeigen -->
        <div id="selected-date-display" style="margin-top: 20px; font-size: 18px; font-weight: bold; color: #2196F3;">
          Kein Datum ausgewählt
        </div>

        <!-- Buchungsformular -->
        <div style="margin-top: 30px; padding: 20px; border: 1px solid #ddd; border-radius: 4px; background-color: #f9f9f9;">
          <h3>Buchung abschließen</h3>
          
          <label for="name" style="display: block; margin-top: 15px; font-weight: bold;">Dein Name:</label>
          <input type="text" id="name" placeholder="Vorname und Nachname" style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px;">

           <label for="tierart" style="display: block; margin-top: 15px; font-weight: bold;">Tierart:</label>
          <input type="text" id="tierart" placeholder="An welcher Tierart sind Sie interessiert?" style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px;">
          
          <button id="bookBtn" style="margin-top: 20px; padding: 12px 30px; background-color: #2196F3; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
            Termin buchen
          </button>
          
          <div id="booking-status" style="margin-top: 15px; font-weight: bold;"></div>
        </div>

      </div>
    </div>
  </div>

  <?php include 'footer.php'; ?>
</div>

<script>
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();
let selectedCell = null;
let bookedDates = <?php echo json_encode($bookedDatesForJs); ?>; // PHP füllt bereits gebuchte Termine

function renderCalendar(month, year) {
  const monthNames = [
    "Januar", "Februar", "März", "April", "Mai", "Juni",
    "Juli", "August", "September", "Oktober", "November", "Dezember"
  ];

  document.getElementById("month").textContent = monthNames[month];
  document.getElementById("year").textContent = year;

  const firstDay = new Date(year, month, 1).getDay();
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const calendarBody = document.getElementById("calendar-body");
  calendarBody.innerHTML = "";

  let date = 1;
  const today = new Date();

  for (let i = 0; i < 6; i++) {
    let row = document.createElement("tr");

    for (let j = 1; j <= 7; j++) {
      let cell = document.createElement("td");

      const correctedFirstDay = firstDay === 0 ? 7 : firstDay;

      if (i === 0 && j < correctedFirstDay) {
        cell.innerHTML = "";
        row.appendChild(cell);
      } else if (date > daysInMonth) {
        break;
      } else {
        cell.textContent = date;
        const dateString = `${date}.${month + 1}.${year}`;

        // Heute hervorheben
        if (
          date === today.getDate() &&
          month === today.getMonth() &&
          year === today.getFullYear()
        ) {
          cell.classList.add("today");
        }

        // Prüfe ob Datum gebucht ist
        if (bookedDates.includes(dateString)) {
          cell.classList.add("booked");
        } else {
          // Klickaktion nur wenn nicht gebucht
          cell.addEventListener("click", (function(currentDate) {
            return function () {
              if (selectedCell) {
                selectedCell.classList.remove("selected");
              }
              selectedCell = cell;
              cell.classList.add("selected");

              const monthNames = ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"];
              const selectedDateText = `${currentDate}. ${monthNames[month]} ${year}`;
              document.getElementById("selected-date-display").textContent = selectedDateText;

              console.log("Ausgewählter Tag:", currentDate, month + 1, year);
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

// Navigation
document.getElementById("prevBtn").addEventListener("click", () => {
  currentMonth--;
  if (currentMonth < 0) {
    currentMonth = 11;
    currentYear--;
  }
  renderCalendar(currentMonth, currentYear);
});

document.getElementById("nextBtn").addEventListener("click", () => {
  currentMonth++;
  if (currentMonth > 11) {
    currentMonth = 0;
    currentYear++;
  }
  renderCalendar(currentMonth, currentYear);
});

// Erste Darstellung
renderCalendar(currentMonth, currentYear);

// Buchungs-Funktion
document.getElementById("bookBtn").addEventListener("click", () => {
  const name = document.getElementById("name").value;
  const tierart = document.getElementById("tierart").value;
  const selectedDate = document.getElementById("selected-date-display").textContent;
  const statusDiv = document.getElementById("booking-status");

  if (!name.trim()) {
    statusDiv.textContent = "❌ Bitte gib deinen Namen ein!";
    statusDiv.style.color = "red";
    return;
  }

  if (selectedDate === "Kein Datum ausgewählt") {
    statusDiv.textContent = "❌ Bitte wähle ein Datum!";
    statusDiv.style.color = "red";
    return;
  }

  const dateString = `${selectedCell.textContent}.${currentMonth + 1}.${currentYear}`;

  // Fehlermeldung, falls Datum schon gebucht
  if (bookedDates.includes(dateString)) {
    statusDiv.textContent = "❌ Dieser Tag ist bereits gebucht.";
    statusDiv.style.color = "red";
    return;
  }

  // Anfrage senden (keine Vorweg-Änderung von bookedDates)
  const btn = document.getElementById("bookBtn");
  btn.disabled = true;
  btn.textContent = "Speichere...";

  fetch(window.location.href, {
    method: 'POST',
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    body: new URLSearchParams({ date: dateString, name: name, tier: tierart })
  })
  .then(res => res.text())
  .then(text => {
    let data = null;
    try {
      data = JSON.parse(text);
    } catch (e) {
      const start = text.indexOf('{');
      const end = text.lastIndexOf('}');
      if (start !== -1 && end !== -1 && end > start) {
        try { data = JSON.parse(text.substring(start, end + 1)); } catch (e2) { data = null; }
      }
    }

    if ((data && data.status === 'ok') || text.includes('"status":"ok"')) {
      // Nach erfolgreichem Speichern im Frontend eintragen und Kalender neu rendern
      bookedDates.push(dateString);
      statusDiv.textContent = `✅ Buchung erfolgreich! ${name}, dein Termin am ${selectedDate} für ${tierart} wurde gebucht.`;
      statusDiv.style.color = "green";
      renderCalendar(currentMonth, currentYear);
      document.getElementById("name").value = "";
      document.getElementById("tierart").value = "";
    } else {
      statusDiv.textContent = "❌ Fehler beim Speichern.";
      statusDiv.style.color = "red";
    }
  })
  .catch(() => {
    statusDiv.textContent = "❌ Netzwerkfehler beim Speichern.";
    statusDiv.style.color = "red";
  })
  .finally(() => {
    btn.disabled = false;
    btn.textContent = "Termin buchen";
  });
});
</script>

<?php include 'footer.php'; ?>


