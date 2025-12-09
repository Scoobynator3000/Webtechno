<!DOCTYPE html> 
<?php $PageTitle = "Larissa"; 
include_once('header.php'); 
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
          
          <label for="email" style="display: block; margin-top: 15px; font-weight: bold;">Deine Email:</label>
          <input type="email" id="email" placeholder="deine@email.com" style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px;">
          
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

        // Heute hervorheben
        if (
          date === today.getDate() &&
          month === today.getMonth() &&
          year === today.getFullYear()
        ) {
          cell.classList.add("today");
        }

         // Klickaktion
        cell.addEventListener("click", (function(currentDate) {
          return function () {
            if (selectedCell) {
              selectedCell.classList.remove("selected");
            }
            selectedCell = cell;
            cell.classList.add("selected");

            // Ausgewähltes Datum anzeigen
            const monthNames = ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"];
            const selectedDateText = `${currentDate}. ${monthNames[month]} ${year}`;
            document.getElementById("selected-date-display").textContent = selectedDateText;

            console.log("Ausgewählter Tag:", currentDate, month + 1, year);
          };
        })(date));
        
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
</script>

<?php include 'footer.php'; ?>


