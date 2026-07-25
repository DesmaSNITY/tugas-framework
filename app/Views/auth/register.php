<?= $this->extend('layouts/main') ?>

<?php $show_footer = false; ?>

<?= $this->section('styles') ?>
  body{background:linear-gradient(135deg, #e91e8c 0%, #ff4f9e 40%, #ff8ec1 100%); min-height:100vh;}
  .page{box-shadow:none;}
  .navbar{background:transparent;}
  .auth-wrap{display:flex; align-items:center; justify-content:center; padding:40px 16px 80px 16px;}
  .card{width:100%; max-width:850px; background:#fbd6e4; border-radius:26px; display:grid; grid-template-columns:1.05fr 0.85fr; overflow:hidden; box-shadow:0 30px 60px rgba(120,20,70,0.35);}
  .form-panel{padding:44px 40px 38px 44px; display:flex; flex-direction:column; justify-content:center;}
  .form-panel h1{font-size:26px; color:var(--ink); margin:0 0 6px 0; font-weight:800;}
  .subtitle{font-size:13px; color:var(--ink); margin:0 0 22px 0;}
  .subtitle a{color:var(--pink-deep); font-weight:700; text-decoration:none;}
  .row-2{display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:14px;}
  .field{display:flex; align-items:center; gap:9px; background:#fff; border-radius:9px; padding:12px 13px; margin-bottom:14px;}
  .row-2 .field{margin-bottom:0;}
  .field input{border:none; outline:none; font-size:13.5px; width:100%; background:transparent; color:#333;}
  .agree{display:flex; align-items:center; gap:8px; font-size:12.5px; color:var(--ink); margin:14px 0 20px 0;}
  .agree a{color:var(--pink-deep); font-weight:700; text-decoration:none;}
  .btn-create{width:100%; padding:14px; border:none; border-radius:10px; background:linear-gradient(180deg, #ff6f88 0%, #d93a58 100%); color:#fff; font-size:15px; font-weight:800; cursor:pointer; box-shadow:0 8px 18px rgba(217,58,88,0.45);}
  .art-panel{position:relative; margin:16px; border-radius:20px; overflow:hidden; background:linear-gradient(180deg,#ffb199 0%,#f4547a 45%,#c6285e 100%);}
  .alert{padding:10px 14px; border-radius:8px; font-size:12.5px; margin-bottom:16px;}
  .alert-error{background:#fde2e2; color:#b3261e;}
  ul.errors{margin:0 0 16px 0; padding-left:18px; font-size:12px; color:#b3261e;}
  @media (max-width:720px){ .card{grid-template-columns:1fr;} .art-panel{min-height:200px; order:-1;} .form-panel{padding:34px 26px;} }
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="auth-wrap">
  <div class="card">

    <div class="form-panel">
      <h1>Create An Account</h1>
      <p class="subtitle">Already Have Account? <a href="<?= site_url('login') ?>">Login</a></p>

      <?php if (session()->getFlashdata('errors')): ?>
        <ul class="errors">
          <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <?= form_open('register') ?>
        <div class="row-2">
          <div class="field"><input type="text" name="first_name" placeholder="First name" value="<?= old('first_name') ?>"></div>
          <div class="field"><input type="text" name="last_name" placeholder="Last name" value="<?= old('last_name') ?>"></div>
        </div>

        <div class="field"><input type="email" name="email" placeholder="Email address" value="<?= old('email') ?>"></div>

        <div class="field"><input type="password" name="password" placeholder="Password"></div>

        <label class="agree">
          <input type="checkbox" name="agree" value="1" checked>
          I agree to the <a href="#">terms &amp; conditions</a>
        </label>

        <button class="btn-create" type="submit">Create an account</button>
      <?= form_close() ?>
    </div>

    <div class="art-panel"></div>

  </div>
</div>

<?= $this->endSection() ?>
