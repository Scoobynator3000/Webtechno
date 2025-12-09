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

    <div id="inputArea" style="margin-top: 15px; display: none;">
      <p id="selectedInfo">Kein Tag ausgewählt</p>
      <input id="username" type="text" placeholder="Dein Name">
      <button id="saveBtn">Verbuchen</button>
    </div>
  </div>
</div>

<style>
.calendar-wrapper {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.calendar {
  max-width: 350px;
  padding: 15px;
  border-radius: 12px;
  border: 1px solid #ddd;
  background: #fafafa;
  font-family: sans-serif;
  text-align: center;
}

.calendar-header {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
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
  cursor: pointer;
}

.today {
  background: #ffe2a8;
  border: 1px solid #d6a545;
  font-weight: bold;
}

.booked {
  background: #ff4c4c;
  border: 1px solid #a94444;
  color: #fff;
  font-weight: bold;
  cursor: default; /* Nicht mehr klickbar */
}
</style>

<script>
let m = new Date().getMonth();
let y = new Date().getFullYear();

let selectedDay = null;
let booked = {}; // gebuchte Tage: key -> Name oder "geschlossen"

function key(y,m,d){ return `${y}-${m}-${d}`; }
function isMonday(y,m,d){ return new Date(y,m,d).getDay()===1; }

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
  first = first === 0 ? 7 : first;
  let days = new Date(y, m+1, 0).getDate();
  const today = new Date();
  let date = 1;

  for (let i=0;i<6;i++){
    let row = document.createElement("tr");
    for (let j=1;j<=7;j++){
      let cell = document.createElement("td");
      let index = i*7+j;

      if(index >= first && date <= days){
        let k = key(y,m,date);

        // Montag = geschlossen
        if(isMonday(y,m,date) && !booked[k]){
          booked[k] = "geschlossen";
        }

        // Zelltext & Klasse
        if(booked[k]){
          cell.classList.add("booked");
          if(booked[k]==="geschlossen") cell.textContent = date;
          else cell.textContent = date + " (" + booked[k] + ")";
        } else {
          cell.textContent = date;
        }

        if(date===today.getDate() && m===today.getMonth() && y===today.getFullYear()){
          cell.classList.add("today");
        }

        // nur klickbar wenn nicht gebucht
        if(!booked[k]){
          cell.onclick = () => selectDay(date);
        }

        date++;
      }

      row.appendChild(cell);
    }
    body.appendChild(row);
  }
}

function selectDay(day){
  selectedDay = day;
  const k = key(y,m,day);
  const info = document.getElementById("selectedInfo");

  if(booked[k]==="geschlossen"){
    info.textContent = "Das Tierheim hat an diesem Tag nicht geöffnet.";
    document.getElementById("inputArea").style.display = "none";
  } else {
    info.textContent = "Ausgewählter Tag: "+day+"."+(m+1)+"."+y;
    document.getElementById("inputArea").style.display = "block";
  }
}

document.getElementById("saveBtn").onclick = () => {
  if(!selectedDay) return;
  let name = document.getElementById("username").value.trim();
  if(!name) return;

  booked[key(y,m,selectedDay)] = name;
  document.getElementById("username").value = "";
  selectedDay = null;
  document.getElementById("inputArea").style.display = "none";
  render();
};

document.getElementById("prev").onclick = () => { m--; if(m<0){m=11;y--} render(); };
document.getElementById("next").onclick = () => { m++; if(m>11){m=0;y++} render(); };

render();
</script>

  <?php include 'footer.php'; ?>    
