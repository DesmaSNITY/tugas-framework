<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
  .success-bg{background:linear-gradient(180deg, #e0407a 0%, #f299bc 55%, #ffd6e6 100%); padding:80px 48px; text-align:center;}
  .success-card{max-width:480px; margin:0 auto; background:#fff; border-radius:18px; padding:44px 34px; box-shadow:0 20px 40px rgba(120,10,55,0.25);}
  .success-card .icon{font-size:48px; margin-bottom:16px;}
  .success-card h1{font-size:22px; color:var(--ink); margin-bottom:10px;}
  .success-card p{font-size:13.5px; color:var(--muted); margin-bottom:22px; line-height:1.6;}
  .btn-back{display:inline-block; padding:12px 28px; background:linear-gradient(90deg,#9f8de0,var(--purple-dark)); color:#fff; border-radius:24px; text-decoration:none; font-weight:700; font-size:13.5px;}
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="success-bg">
  <div class="success-card">
    <div class="icon">🎉</div>
    <h1>Terima Kasih, <?= esc(session()->get('user_name') ?: 'Donatur') ?>!</h1>
    <p>Donasi anda sebesar <b>Rp<?= number_format($donation['amount'], 0, ',', '.') ?></b> telah berhasil diproses. Semoga kebaikan ini membawa manfaat bagi yang membutuhkan.</p>
    <a href="<?= site_url('donate') ?>" class="btn-back">Lihat Program Lainnya</a>
  </div>
</section>

<?= $this->endSection() ?>
