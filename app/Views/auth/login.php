<?= $this->extend('layouts/main') ?>

<?php $show_footer = false; ?>

<?= $this->section('styles') ?>
  body{background:linear-gradient(135deg, #e91e8c 0%, #ff4f9e 40%, #ff8ec1 100%); min-height:100vh;}
  .page{box-shadow:none;}
  .navbar{background:transparent;}
  .auth-wrap{display:flex; align-items:center; justify-content:center; padding:40px 16px 80px 16px;}
  .card{width:100%; max-width:900px; background:#fbd6e4; border-radius:26px; display:grid; grid-template-columns:1fr 1.15fr; overflow:hidden; box-shadow:0 30px 60px rgba(120,20,70,0.35);}
  .art-panel{position:relative; background:#fff; margin:16px; border-radius:18px; overflow:hidden; display:flex; flex-direction:column; padding:20px 18px;}
  .brand{font-family:'Brush Script MT','Segoe Script',cursive; font-size:24px; color:var(--pink-deep); font-style:italic; margin:0; font-weight:700; text-decoration:none;}
  .form-panel{padding:46px 46px 36px 30px; display:flex; flex-direction:column; justify-content:center;}
  .form-panel h1{font-size:40px; color:#fff; margin:0 0 26px 0; font-weight:800;}
  label{display:block; font-size:13px; font-weight:700; color:var(--ink); margin-bottom:6px;}
  .field{display:flex; align-items:center; gap:10px; background:#fff; border-radius:10px; padding:12px 14px; margin-bottom:20px;}
  .field input{border:none; outline:none; font-size:14px; width:100%; background:transparent; color:#333;}
  .row-end{display:flex; justify-content:space-between; margin:-10px 0 22px 0; font-size:12.5px;}
  .row-end a{color:var(--pink-deep); text-decoration:none; font-weight:600;}
  .btn-login{width:100%; padding:14px; border:none; border-radius:10px; background:linear-gradient(180deg, #f7c948 0%, #e8ae2c 100%); color:#fff; font-size:16px; font-weight:800; cursor:pointer; box-shadow:0 8px 18px rgba(232,174,44,0.45);}
  .alert{padding:10px 14px; border-radius:8px; font-size:12.5px; margin-bottom:16px;}
  .alert-error{background:#fde2e2; color:#b3261e;}
  .alert-success{background:#dff5e1; color:#1e7a34;}
  @media (max-width:720px){ .card{grid-template-columns:1fr;} .art-panel{min-height:200px;} .form-panel{padding:34px 26px;} }
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="auth-wrap">
  <div class="card">

    <div class="art-panel">
      <a href="<?= site_url('/') ?>" class="brand">Mirae.</a>
    </div>

    <div class="form-panel">
      <h1>Login</h1>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-error"><?= esc(session()->getFlashdata('error')) ?></div>
      <?php endif; ?>
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
      <?php endif; ?>

      <?= form_open('login') ?>
        <label for="email">Email</label>
        <div class="field">
          <input id="email" name="email" type="email" placeholder="you@email.com" value="<?= old('email') ?>">
        </div>

        <label for="password">Password</label>
        <div class="field">
          <input id="password" name="password" type="password" placeholder="••••••••••">
        </div>

        <div class="row-end">
          <a href="<?= site_url('register') ?>">Belum punya akun? <b>Daftar</b></a>
          <a href="#">Forgot Password?</a>
        </div>

        <button class="btn-login" type="submit">Login</button>
      <?= form_close() ?>
    </div>

  </div>
</div>

<?= $this->endSection() ?>
