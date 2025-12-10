<?php
// Lade gebuchte Termine vor jeglicher Ausgabe
$storageFile = __DIR__ . '/storage.json';
$bookedData = [];
if (file_exists($storageFile)) {
    $bookedData = json_decode(file_get_contents($storageFile), true) ?: [];
}

$PageTitle = "Gebuchte Termine";
include_once('header.php');
?>
<div class= "text-div">
<div class="container my-4">
  <div class="card shadow-sm">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
          <h2 class="mb-0">Gebuchte Termine</h2>
          <small class="text-muted"><?php echo count($bookedData); ?> Termin(e) insgesamt</small>
        </div>
        <div class="d-flex gap-2">
          <input id="filterInput" class="form-control form-control-sm" type="search" placeholder="Suche nach Name, Datum oder Tierart" style="min-width:250px;">
        </div>
      </div>

      <?php if (empty($bookedData)): ?>
        <div class="text-center text-muted py-4">
        </div>
      <?php else: ?>
        <div class="table-responsive">
          <table id="bookingsTable" class="table table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th style="width:20%;">Datum</th>
                <th style="width:40%;">Name</th>
                <th style="width:30%;">Tierart</th>
                <th style="width:10%;">Aktion</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($bookedData as $date => $info): 
                // Versuche Datum leserlich darzustellen (erwartet Format d.m.Y)
                $displayDate = htmlspecialchars($date, ENT_QUOTES, 'UTF-8');
                $dt = DateTime::createFromFormat('j.n.Y', $date) ?: DateTime::createFromFormat('d.m.Y', $date);
                if ($dt) $displayDate = $dt->format('d.m.Y');
              ?>
                <tr>
                  <td><?php echo $displayDate; ?></td>
                  <td><?php echo htmlspecialchars($info['name'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php echo htmlspecialchars($info['tier'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                  <td>
                    <button class="btn btn-sm btn-outline-danger btn-delete" data-date="<?php echo htmlspecialchars($date, ENT_QUOTES, 'UTF-8'); ?>">
                      Löschen
                    </button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
</div>

<script>
// Einfaches Client-seitiges Filtern
document.getElementById('filterInput')?.addEventListener('input', function () {
  const q = this.value.toLowerCase();
  const rows = document.querySelectorAll('#bookingsTable tbody tr');
  rows.forEach(r => {
    r.style.display = (q === '' || r.textContent.toLowerCase().includes(q)) ? '' : 'none';
  });
});

// Optional: einfache Löschfunktion (Frontend + POST zum Server nötig)
document.querySelectorAll('.btn-delete').forEach(btn => {
  btn.addEventListener('click', function () {
    if (!confirm('Termin wirklich löschen?')) return;
    const date = this.dataset.date;
    fetch(window.location.pathname, {
      method: 'POST',
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      body: new URLSearchParams({ action: 'delete', date: date })
    })
    .then(() => location.reload());
  });
});
</script>

<?php include 'footer.php'; ?>
