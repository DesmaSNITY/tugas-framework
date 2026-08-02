<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
  .dashboard{background:linear-gradient(180deg, #e0407a 0%, #f299bc 40%, #ffffff 100%); padding:36px 48px 70px 48px;}
  .dashboard h1{font-size:24px; font-weight:800; color:#ffffff; margin-bottom:4px;}
  .dashboard .subtitle{font-size:13px; color:rgba(255,255,255,0.9); margin-bottom:26px;}
  .stat-row{max-width:1200px; margin:0 auto 28px auto; display:flex; align-items:center; background:#ffffff; border-radius:14px; box-shadow:0 16px 32px rgba(120,10,55,0.2); padding:18px 26px;}
  .stat{display:flex; align-items:center; gap:14px; padding-right:26px;}
  .stat-divider{width:1px; align-self:stretch; background:#eee; margin:0 26px 0 0;}
  .stat .icon{width:44px; height:44px; border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0; font-size:18px;}
  .icon-pink{background:#fbe0ea; color:var(--pink-deep);}
  .icon-orange{background:#fde3d0; color:#e08a3d;}
  .icon-blue{background:#dbeafc; color:#3d8fd9;}
  .stat .label{font-size:12px; color:var(--muted); font-weight:600;}
  .stat .value{font-size:15px; color:var(--ink); font-weight:800; margin-top:2px;}
  .content-row{max-width:1200px; margin:0 auto; display:grid; grid-template-columns:1.6fr 1fr; gap:24px;}
  .chart-card, .summary-card{background:#ffffff; border-radius:14px; box-shadow:0 16px 32px rgba(120,10,55,0.2); padding:24px 26px;}
  .chart-card h2, .summary-card h2{font-size:16px; font-weight:800; color:var(--ink); display:inline-block; margin-right:20px;}
  .legend{display:inline-flex; gap:16px; font-size:11px; color:var(--muted); vertical-align:middle;}
  .legend span{display:inline-flex; align-items:center; gap:5px;}
  .dot{width:9px; height:9px; border-radius:50%;}
  .dot-purple{background:#8b7cd6;}
  .dot-blue{background:#9fd3ea;}
  .summary-item{display:flex; align-items:center; gap:12px; margin-bottom:20px;}
  .summary-item .icon{width:34px; height:34px; border-radius:9px; display:flex; align-items:center; justify-content:center; flex-shrink:0; font-size:14px;}
  .summary-item .label{font-size:11px; color:var(--muted);}
  .summary-item .value{font-size:13.5px; color:var(--ink); font-weight:800;}
  @media (max-width:900px){.content-row{grid-template-columns:1fr;} .stat-row{flex-direction:column; align-items:stretch; gap:14px;} .stat{padding-right:0;} .stat-divider{display:none;}}

  /* TABEL GABUNGAN DONASI + PENGELUARAN */
  .table-card{
    max-width:1200px; margin:24px auto 0 auto;
    background:#ffffff; border-radius:14px;
    box-shadow:0 16px 32px rgba(120,10,55,0.2);
    padding:24px 26px;
  }
  .table-card h2{font-size:16px; font-weight:800; color:var(--ink); margin-bottom:18px;}
  .table-wrap{overflow-x:auto;}
  table.report-table{width:100%; border-collapse:collapse; min-width:640px;}
  table.report-table thead th{
    text-align:left; font-size:11.5px; text-transform:uppercase; letter-spacing:0.4px;
    color:var(--muted); font-weight:700;
    padding:12px 14px; border-bottom:1px solid #f0e6ea;
  }
  table.report-table tbody td{
    padding:14px; font-size:13px; color:var(--ink);
    border-bottom:1px solid #f5eef1; vertical-align:middle;
  }
  table.report-table tbody tr:last-child td{border-bottom:none;}
  table.report-table tbody tr:hover{background:#fdf6f9;}

  .type-badge{display:inline-block; padding:4px 12px; border-radius:16px; font-size:11px; font-weight:700;}
  .type-donasi{background:#f3edfb; color:var(--purple);}
  .type-pengeluaran{background:#fbe0ea; color:var(--pink-deep);}

  .status-pill{display:inline-block; padding:5px 14px; border-radius:20px; font-size:11px; font-weight:700; color:#fff;}
  .status-paid{background:linear-gradient(90deg,#c084e8,#8b7cd6);}
  .status-pending{background:#f0b94d;}
  .status-other{background:#c8c3c9;}

  .amount-col{font-weight:700;}

  .table-footer{display:flex; align-items:center; justify-content:space-between; margin-top:16px; font-size:12px; color:var(--muted);}
  .pagination{display:flex; align-items:center; gap:6px;}
  .pagination a, .pagination span{
    display:flex; align-items:center; justify-content:center;
    width:28px; height:28px; border-radius:8px;
    font-size:12px; font-weight:700; text-decoration:none; color:var(--ink);
  }
  .pagination a:hover{background:#f5eef1;}
  .pagination .active{background:var(--purple); color:#fff;}
  .empty-row td{text-align:center; padding:40px 0; color:var(--muted);}
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="dashboard">
    <h1>Laporan Donasi</h1>
    <p class="subtitle">Ringkasan pemasukan dan pengeluaran dana donasi</p>

    <div class="stat-row">
      <div class="stat">
        <div class="icon icon-pink">💳</div>
        <div><div class="label">Saldo bersih</div><div class="value">Rp<?= number_format($saldoBersih, 0, ',', '.') ?></div></div>
      </div>
      <div class="stat-divider"></div>
      <div class="stat">
        <div class="icon icon-blue">🔄</div>
        <div><div class="label">Dana Tersalurkan</div><div class="value">Rp<?= number_format($totalExpense, 0, ',', '.') ?></div></div>
      </div>
    </div>

    <div class="content-row">
      <div class="chart-card">
        <h2>Pemasukan &amp; Pengeluaran (<?= date('Y') ?>)</h2>
        <span class="legend">
          <span><span class="dot dot-purple"></span>Pemasukan Donasi</span>
          <span><span class="dot dot-blue"></span>Pengeluaran</span>
        </span>
        <?php
          $allValues = [];
          foreach ($chartData as $row) {
              $allValues[] = $row['income'];
              $allValues[] = $row['expense'];
          }
          $maxValue    = max($allValues) ?: 1;
          $barWidth    = 16;
          $groupGap    = 8;
          $groupWidth  = ($barWidth * 2) + $groupGap;
          $gapBetween  = 20;
          $chartHeight = 190;
        ?>
        <svg width="100%" height="260" viewBox="0 0 560 260" preserveAspectRatio="xMidYMid meet">
          <line x1="10" y1="220" x2="550" y2="220" stroke="#333"/>
          <?php $x = 20; foreach ($chartData as $label => $row): ?>
            <?php
              $incomeHeight  = $maxValue > 0 ? ($row['income']  / $maxValue) * $chartHeight : 0;
              $expenseHeight = $maxValue > 0 ? ($row['expense'] / $maxValue) * $chartHeight : 0;
            ?>
            <rect x="<?= $x ?>" y="<?= 220 - $incomeHeight ?>" width="<?= $barWidth ?>" height="<?= $incomeHeight ?>" rx="3" fill="#8b7cd6"/>
            <rect x="<?= $x + $barWidth + 2 ?>" y="<?= 220 - $expenseHeight ?>" width="<?= $barWidth ?>" height="<?= $expenseHeight ?>" rx="3" fill="#9fd3ea"/>
            <text x="<?= $x + $groupWidth / 2 ?>" y="236" font-size="9.5" fill="#8a7a86" text-anchor="middle"><?= $label ?></text>
            <?php $x += $groupWidth + $gapBetween; ?>
          <?php endforeach; ?>
        </svg>
      </div>

      <div class="summary-card">
        <h2>Ringkasan</h2>
        <div class="summary-item">
          <div class="icon" style="background:#e9e2fb; color:var(--purple);">📥</div>
          <div><div class="label">Total Pemasukan</div><div class="value">Rp<?= number_format($totalIncome, 0, ',', '.') ?></div></div>
        </div>
        <div class="summary-item">
          <div class="icon" style="background:#dbeafc; color:#3d8fd9;">📤</div>
          <div><div class="label">Total Pengeluaran</div><div class="value">Rp<?= number_format($totalExpense, 0, ',', '.') ?></div></div>
        </div>
        <div class="summary-item">
          <div class="icon icon-pink">💳</div>
          <div><div class="label">Total Target Program</div><div class="value">Rp<?= number_format($totalTarget, 0, ',', '.') ?></div></div>
        </div>
        <div class="summary-item">
          <div class="icon" style="background:#fdf0c9; color:#d9a520;">🧑‍🤝‍🧑</div>
          <div><div class="label">Donatur</div><div class="value"><?= (int) $donorCount ?> Orang</div></div>
        </div>
      </div>
    </div>

    <div class="table-card">
      <h2>Table of Donation Transactions and Expenses</h2>

      <div class="table-wrap">
        <table class="report-table">
          <thead>
            <tr>
              <th>Date</th>
              <th>Transactions</th>
              <th>Name</th>
              <th>Jumlah</th>
              <th>Penerima</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($tableRows)): ?>
              <tr class="empty-row"><td colspan="6">Belum ada data transaksi maupun pengeluaran.</td></tr>
            <?php else: ?>
              <?php foreach ($tableRows as $row): ?>
                <tr>
                  <td><?= date('d-m-Y', strtotime($row['date'])) ?></td>
                  <td>
                    <?php if ($row['type'] === 'Donasi'): ?>
                      <span class="type-badge type-donasi">Donasi</span>
                    <?php else: ?>
                      <span class="type-badge type-pengeluaran">Pengeluaran</span>
                    <?php endif; ?>
                  </td>
                  <td><?= esc($row['name']) ?></td>
                  <td class="amount-col">Rp<?= number_format($row['amount'], 0, ',', '.') ?></td>
                  <td><?= esc($row['penerima']) ?></td>
                  <td>
                    <?php if ($row['status'] === 'paid'): ?>
                      <span class="status-pill status-paid">Terbayar</span>
                    <?php elseif ($row['status'] === 'pending'): ?>
                      <span class="status-pill status-pending">Menunggu</span>
                    <?php else: ?>
                      <span class="status-pill status-other"><?= esc(ucfirst($row['status'])) ?></span>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <div class="table-footer">
        <span>Showing <?= $showingFrom ?> to <?= $showingTo ?> of <?= $totalRows ?> entries</span>

        <?php if ($totalPages > 1): ?>
          <div class="pagination">
            <a href="?page=<?= max(1, $currentPage - 1) ?>">‹</a>
            <?php for ($p = 1; $p <= $totalPages; $p++): ?>
              <?php if ($p === $currentPage): ?>
                <span class="active"><?= $p ?></span>
              <?php else: ?>
                <a href="?page=<?= $p ?>"><?= $p ?></a>
              <?php endif; ?>
            <?php endfor; ?>
            <a href="?page=<?= min($totalPages, $currentPage + 1) ?>">›</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
</section>

<?= $this->endSection() ?>
