<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
  .dashboard{background:linear-gradient(180deg, #e0407a 0%, #f299bc 40%, #ffffff 100%); padding:36px 48px 70px 48px;}
  .dashboard h1{font-size:24px; font-weight:800; color:#ffffff; margin-bottom:4px;}
  .dashboard .subtitle{font-size:13px; color:rgba(255,255,255,0.9); margin-bottom:26px;}
  .stat-row{display:grid; grid-template-columns:repeat(3, 1fr); background:#ffffff; border-radius:14px; box-shadow:0 16px 32px rgba(120,10,55,0.2); padding:20px 26px; margin-bottom:28px;}
  .stat{display:flex; align-items:center; gap:14px; border-right:1px solid #eee; padding-right:20px;}
  .stat:last-child{border-right:none;}
  .stat .icon{width:44px; height:44px; border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0; font-size:18px;}
  .icon-pink{background:#fbe0ea; color:var(--pink-deep);}
  .icon-orange{background:#fde3d0; color:#e08a3d;}
  .icon-blue{background:#dbeafc; color:#3d8fd9;}
  .stat .label{font-size:12px; color:var(--muted); font-weight:600;}
  .stat .value{font-size:15px; color:var(--ink); font-weight:800; margin-top:2px;}
  .content-row{display:grid; grid-template-columns:1.6fr 1fr; gap:24px;}
  .chart-card, .summary-card{background:#ffffff; border-radius:14px; box-shadow:0 16px 32px rgba(120,10,55,0.2); padding:24px 26px;}
  .chart-card h2, .summary-card h2{font-size:16px; font-weight:800; color:var(--ink); display:inline-block; margin-right:20px;}
  .summary-item{display:flex; align-items:center; gap:12px; margin-bottom:20px;}
  .summary-item .icon{width:34px; height:34px; border-radius:9px; display:flex; align-items:center; justify-content:center; flex-shrink:0; font-size:14px;}
  .summary-item .label{font-size:11px; color:var(--muted);}
  .summary-item .value{font-size:13.5px; color:var(--ink); font-weight:800;}
  @media (max-width:900px){.content-row{grid-template-columns:1fr;} .stat-row{grid-template-columns:1fr; gap:16px;} .stat{border-right:none; padding-right:0; border-bottom:1px solid #eee; padding-bottom:14px;} .stat:last-child{border-bottom:none;}}
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php

$totalIncome = $totalIncome ?? 0;
$totalPrograms = $totalPrograms ?? 0;
$totalTarget = $totalTarget ?? 0;
$donorCount = $donorCount ?? 0;
$chartData = $chartData ?? [];

?>
<section class="dashboard">
    <h1>Laporan Donasi</h1>
    <p class="subtitle">Ringkasan pemasukan dan pengeluaran dana donasi</p>

    <div class="stat-row">
      <div class="stat">
        <div class="icon icon-pink">💳</div>
        <div><div class="label">Total Pemasukan</div><div class="value">Rp<?= number_format($totalIncome ?? 0, 0, ',', '.') ?></div></div>
      </div>
      <div class="stat">
        <div class="icon icon-orange">📦</div>
        <div><div class="label">Total Program Aktif</div><div class="value"><?= (int) ($totalPrograms ?? 0) ?> Program</div></div>
      </div>
      <div class="stat">
        <div class="icon icon-blue">🧑‍🤝‍🧑</div>
        <div><div class="label">Total Donatur</div><div class="value"><?= (int) ($donorCount ?? 0) ?> Orang</div></div>
      </div>
    </div>

    <div class="content-row">
      <div class="chart-card">
        <h2>Pemasukan Donasi per Bulan (<?= date('Y') ?>)</h2>
        <?php
          $maxValue = max($chartData) ?: 1;
          $barWidth = 40;
          $gap      = 24;
          $chartHeight = 200;
        ?>
        <svg width="100%" height="260" viewBox="0 0 560 260" preserveAspectRatio="xMidYMid meet">
          <line x1="40" y1="220" x2="540" y2="220" stroke="#333"/>
          <?php $x = 50; foreach ($chartData as $label => $value): ?>
            <?php $barHeight = $maxValue > 0 ? ($value / $maxValue) * $chartHeight : 0; ?>
            <rect x="<?= $x ?>" y="<?= 220 - $barHeight ?>" width="<?= $barWidth ?>" height="<?= $barHeight ?>" rx="3" fill="#8b7cd6"/>
            <text x="<?= $x + $barWidth / 2 ?>" y="236" font-size="10" fill="#8a7a86" text-anchor="middle"><?= $label ?></text>
            <?php $x += $barWidth + $gap; ?>
          <?php endforeach; ?>
        </svg>
      </div>

      <div class="summary-card">
        <h2>Ringkasan</h2>
        <div class="summary-item">
          <div class="icon" style="background:#e9e2fb; color:var(--purple);">📥</div>
          <div><div class="label">Total Pemasukan</div><div class="value">Rp<?= number_format($totalIncome ?? 0, 0, ',', '.') ?></div>
        </div>
        <div class="summary-item">
          <div class="icon icon-pink">💳</div>
          <div><div class="label">Total Target Program</div><div class="value">Rp<?= number_format($totalTarget ?? 0,0,',','.') ?>
</div></div>
        </div>
        <div class="summary-item">
          <div class="icon" style="background:#fdf0c9; color:#d9a520;">🧑‍🤝‍🧑</div>
          <div><div class="label">Donatur</div><div class="value"><?= (int) $donorCount ?> Orang</div></div>
        </div>
      </div>
    </div>
</section>

<?= $this->endSection() ?>
