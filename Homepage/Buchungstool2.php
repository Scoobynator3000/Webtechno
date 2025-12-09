<!DOCTYPE html> 
<?php $PageTitle = "Larissa"; 
include_once('header.php'); 
?> 
<div class="container">

<div>
        
    <h1>Wähle bitte unten deinen passenden Termin aus: </h1>
</div>
<p class="big-text"> Aus Kapazitätsgründen ist zurzeit leider nur eine Buchung pro Tag möglich. </p>
<div class="calendar-wrapper">
<div class="calendar">
  <div class="calendar-header">
    <button id="prev">◀</button>
    <span id="month"></span> <span id="year"></span>
    <button id="next">▶</button>
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
    <tbody id="body"></tbody>
  </table>
</div>
</div>

<style>

  /* Zentrierung */
.calendar-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
}

.calendar {
  max-width: 350px;
  padding: 15px;
  border-radius: 12px;
  border: 1px solid #ddd;
  background: #fafafa;
  font-family: sans-serif;
}

.calendar-header {
  display: flex;
  justify-content: space-between;
  font-size: 20px;
  font-weight: bold;
  margin-bottom: 12px;
}

.calendar-header button {
  background: #eaeaea;
  border: 1px solid #ccc;
  padding: 4px 8px;
  border-radius: 6px;
  cursor: pointer;
}

.calendar-header button:hover {
  background: #dcdcdc;
}

.calendar-table {
  width: 100%;
  border-collapse: collapse;
  text-align: center;
}

.calendar-table th {
  padding: 6px;
  background: #f0f0f0;
  border-radius: 6px;
}

.calendar-table td {
  padding: 8px;
  border-radius: 6px;
}

.today {
  background: #ffe2a8;
  border: 1px solid #d6a545;
  font-weight: bold;
}
</style>

<script>
let m = new Date().getMonth();
let y = new Date().getFullYear();

function render() {
  const names = [
    "Januar","Februar","März","April","Mai","Juni",
    "Juli","August","September","Oktober","November","Dezember"
  ];

  document.getElementById("month").textContent = names[m];
  document.getElementById("year").textContent = y;

  const body = document.getElementById("body");
  body.innerHTML = "";

  let first = new Date(y, m, 1).getDay();
  first = first === 0 ? 7 : first; // Sonntag -> 7
  let days = new Date(y, m + 1, 0).getDate();

  const today = new Date();

  let date = 1;

  for (let i = 0; i < 6; i++) {
    let row = document.createElement("tr");

    for (let j = 1; j <= 7; j++) {
      let cell = document.createElement("td");
      let index = i * 7 + j;

      if (index >= first && date <= days) {

        cell.textContent = date;

        // heutigen Tag markieren
        if (
          date === today.getDate() &&
          m === today.getMonth() &&
          y === today.getFullYear()
        ) {
          cell.classList.add("today");
        }

        date++;
      }

      row.appendChild(cell);
    }

    body.appendChild(row);
  }
}

document.getElementById("prev").onclick = () => {
  m--; if (m < 0) { m = 11; y--; }
  render();
};

document.getElementById("next").onclick = () => {
  m++; if (m > 11) { m = 0; y++; }
  render();
};

render();
</script>
</div>
  <?php include 'footer.php'; ?>    
