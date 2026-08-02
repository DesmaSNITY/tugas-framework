<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
  .history-bg{background:linear-gradient(180deg, #e0407a 0%, #f299bc 40%, #ffffff 100%); padding:36px 48px 70px 48px;}
  .history-bg h1{font-size:24px; font-weight:800; color:#ffffff; margin-bottom:4px;}
  .history-bg .subtitle{font-size:13px; color:rgba(255,255,255,0.9); margin-bottom:26px;}

  .summary-strip{
    max-width:1200px; margin:0 auto 24px auto;
    background:#ffffff; border-radius:14px;
    box-shadow:0 16px 32px rgba(120,10,55,0.2);
    padding:20px 26px;
    display:flex; align-items:center; gap:16px;
  }
  .summary-strip .icon{
    width:44px; height:44px; border-radius:12px;
    background:#fbe0ea; color:var(--pink-deep);
    display:flex; align-items:center; justify-content:center; font-size:18px; flex-shrink:0;
  }
  .summary-strip .label{font-size:12px; color:var(--muted); font-weight:600;}
  .summary-strip .value{font-size:17px; color:var(--ink); font-weight:800; margin-top:2px;}

  .history-table-wrap{
    max-width:1200px; margin:0 auto;
    background:#ffffff; border-radius:14px;
    box-shadow:0 16px 32px rgba(120,10,55,0.2);
    padding:12px 12px 20px 12px;
    overflow-x:auto;
  }
  table{width:100%; border-collapse:collapse; min-width:640px;}
  thead th{
    text-align:left; font-size:11.5px; text-transform:uppercase; letter-spacing:0.4px;
    color:var(--muted); font-weight:700;
    padding:16px 14px; border-bottom:1px solid #f0e6ea;
  }
  tbody td{
    padding:16px 14px; font-size:13px; color:var(--ink);
    border-bottom:1px solid #f5eef1;
    vertical-align:middle;
  }
  tbody tr:last-child td{border-bottom:none;}
  tbody tr:hover{background:#fdf6f9;}

  .program-cell{display:flex; flex-direction:column; gap:2px;}
  .program-cell .name{font-weight:700;}
  .program-cell .cat{font-size:11px; color:var(--pink-light);}

  .amount-cell{font-weight:800; color:var(--pink-deep);}

  .badge-status{
    display:inline-flex; align-items:center; gap:6px;
    padding:5px 12px; border-radius:20px;
    font-size:11px; font-weight:700;
  }
  .badge-paid{background:#e2f6e6; color:#1e7a34;}
  .badge-pending{background:#fdf0c9; color:#a8790f;}
  .badge-failed{background:#fde2e2; color:#b3261e;}

  .payment-cell{display:flex; align-items:center; gap:8px; font-weight:600;}
  .payment-dot{width:8px; height:8px; border-radius:50%; background:var(--purple);}

  .empty-state{text-align:center; padding:60px 20px; color:var(--muted); font-size:13.5px;}
  .empty-state a{color:var(--pink-deep); font-weight:700; text-decoration:none;}

  @media (max-width:640px){
    .summary-strip{flex-direction:column; align-items:flex-start; gap:10px;}
  }
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="history-bg">
  <h1>Donasi Saya</h1>
  <p class="subtitle">Riwayat semua donasi yang pernah kamu lakukan di Mirae</p>

  <div class="summary-strip">
    <div class="icon">💖</div>
    <div>
      <div class="label">Total Donasi Terkumpul (berhasil)</div>
      <div class="value">Rp<?= number_format($totalDonated, 0, ',', '.') ?></div>
    </div>
  </div>

  <div class="history-table-wrap">
    <?php if (empty($history)): ?>
      <div class="empty-state">
        Kamu belum pernah melakukan donasi. <a href="<?= site_url('donate') ?>">Yuk mulai donasi sekarang →</a>
      </div>
    <?php else: ?>
      <table>
        <thead>
          <tr>
            <th>Program</th>
            <th>Nominal</th>
            <th>Metode</th>
            <th>Status</th>
            <th>Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($history as $item): ?>
            <tr>
              <td>
                <div class="program-cell">
                  <span class="name"><?= esc($item['post_title'] ?? '-') ?></span>
                </div>
              </td>
              <td class="amount-cell">Rp<?= number_format($item['amount'], 0, ',', '.') ?></td>
              <td>
                <span class="payment-cell">
                  <span class="payment-dot"></span>
                  <?= esc($item['payment_method'] ?? '-') ?>
                </span>
              </td>
              <td>
                <?php if ($item['status'] === 'paid'): ?>
                  <span class="badge-status badge-paid">✓ Berhasil</span>
                <?php elseif ($item['status'] === 'pending'): ?>
                  <span class="badge-status badge-pending">⏳ Menunggu</span>
                <?php else: ?>
                  <span class="badge-status badge-failed"><?= esc(ucfirst($item['status'])) ?></span>
                <?php endif; ?>
              </td>
              <td><?= date('d M Y, H:i', strtotime($item['created_at'])) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</section>

<?= $this->endSection() ?>
