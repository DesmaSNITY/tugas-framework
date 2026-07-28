<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
  .listing{background:linear-gradient(180deg, #ffe0ea 0%, #f78bb0 35%, #e0407a 75%, #c72868 100%); padding:56px 48px 80px 48px; text-align:center;}
  .listing h1{font-family:Georgia, 'Times New Roman', serif; font-size:32px; font-weight:700; color:var(--ink);}
  .listing h1 span{color:var(--purple-dark);}
  .listing .subtitle{font-size:13.5px; color:#5c4550; margin-top:8px; margin-bottom:34px;}
  .filter-row{display:flex; justify-content:flex-end; max-width:1080px; margin:0 auto 22px auto;}
  .filter-btn{display:inline-flex; align-items:center; gap:8px; background:linear-gradient(90deg,#f186ad,#8b7cd6); color:#fff; font-weight:700; font-size:13.5px; padding:10px 20px; border-radius:24px; border:none; cursor:pointer;}
  .cards{max-width:1080px; margin:0 auto; display:grid; grid-template-columns:repeat(3, 1fr); gap:24px; text-align:left;}
  .card{background:#ffffff; border-radius:16px; overflow:hidden; box-shadow:0 16px 30px rgba(120,10,55,0.18);}
  .card-img{position:relative; height:150px; background:linear-gradient(135deg,#f2b6b0,#c96a72); overflow:hidden;}
  .card-img .figure{position:absolute; bottom:0; left:50%; transform:translateX(-50%); width:70%; height:80%;}
  .card-img .progress-pill{position:absolute; top:8px; left:8px; right:8px; background:rgba(255,255,255,0.92); border-radius:20px; padding:5px 10px; font-size:9.5px; font-weight:700; color:var(--ink);}
  .card-body{padding:16px 18px 18px 18px;}
  .card-body h3{font-size:15px; color:var(--ink); line-height:1.35; margin-bottom:4px;}
  .tag-category{font-size:12px; color:var(--pink-light); font-weight:700; margin-bottom:8px; display:block;}
  .card-body .desc{font-size:11.5px; color:var(--muted); line-height:1.6; margin-bottom:14px;}
  .meta-row{display:flex; gap:16px; font-size:10.5px; color:var(--muted); margin-bottom:16px;}
  .btn-donasi{display:inline-flex; align-items:center; gap:8px; background:linear-gradient(90deg,#9f8de0,var(--purple-dark)); color:#fff; font-weight:700; font-size:12.5px; padding:9px 16px; border-radius:20px; text-decoration:none;}
  @media (max-width:900px){.cards{grid-template-columns:1fr 1fr;}}
  @media (max-width:820px){.cards{grid-template-columns:1fr;}}
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="listing">
    <h1>Program Donasi <span>Terbaru</span></h1>
    <p class="subtitle">Mari bersama wujudkan kebaikan untuk yang membutuhkan</p>

    <div class="filter-row">
        <button class="filter-btn">Filter ▾</button>
    </div>

    <div class="cards">
      <?php if (empty($programs)): ?>
        <p style="color:#fff;">Belum ada program donasi aktif saat ini.</p>
      <?php endif; ?>

      <?php foreach ($programs as $program): ?>
        <div class="card">
          <div class="card-img">
            <svg class="figure" viewBox="0 0 100 100" preserveAspectRatio="xMidYMax slice">
              <circle cx="35" cy="30" r="14" fill="#f2d9c7"/>
              <rect x="15" y="42" width="40" height="45" rx="8" fill="#e7e7ea"/>
              <circle cx="70" cy="55" r="12" fill="#8a5a3c"/>
              <rect x="58" y="65" width="24" height="30" rx="7" fill="#f4f1ec"/>
            </svg>
            <div class="progress-pill">
              Rp<?= number_format($program['collected_amount'], 0, ',', '.') ?> terkumpul dari Rp<?= number_format($program['target_amount'], 0, ',', '.') ?>
            </div>
          </div>
          <div class="card-body">
            <h3><?= esc($program['title']) ?></h3>
            <span class="tag-category"><?= esc($program['category']) ?></span>
            <p class="desc"><?= esc($program['description']) ?></p>
            <div class="meta-row">
              <span>👥 <?= (int) $program['donor_count'] ?> Donatur</span>
              <span>🗓 <?= (int) $program['days_left'] ?> Hari lagi</span>
            </div>
            <a href="<?= site_url('donate/checkout/' . $program['id']) ?>" class="btn-donasi">Donasi Sekarang →</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
</section>

<?= $this->endSection() ?>
