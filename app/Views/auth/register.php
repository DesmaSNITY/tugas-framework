<?= $this->extend('layouts/main') ?>

<?php
$hide_layout = true;
$show_footer = false;
?>
<?= $this->section('styles') ?>
body{
    background:linear-gradient(135deg,#e91e8c 0%,#ff4f9e 40%,#ff8ec1 100%) !important;
    min-height:100vh;
    margin:0;
}

.page{
    max-width:100% !important;
    margin:0 !important;
    box-shadow:none !important;
    background:transparent !important;
}

.navbar,
footer,
#contact{
    display:none !important;
}

.auth-wrap{
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:40px;
}

.card{
    width:100%;
    max-width:980px;
    background:#fbd6e4;
    border-radius:24px;
    display:grid;
    grid-template-columns:1fr 1fr;
    overflow:hidden;
    box-shadow:0 25px 55px rgba(0,0,0,.2);
}

.form-panel{
    padding:50px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.form-panel h1{
    font-size:34px;
    margin-bottom:8px;
    font-weight:800;
}

.subtitle{
    font-size:14px;
    margin-bottom:28px;
}

.subtitle a{
    color:#d63384;
    text-decoration:none;
    font-weight:bold;
}

.row-2{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:14px;
    margin-bottom:16px;
}

.field{
    background:#fff;
    border-radius:10px;
    padding:14px;
    margin-bottom:16px;
}

.row-2 .field{
    margin-bottom:0;
}

.field input{
    width:100%;
    border:none;
    outline:none;
    background:none;
    font-size:14px;
}

.agree{
    display:flex;
    align-items:center;
    gap:8px;
    margin:16px 0 22px;
    font-size:13px;
}

.agree a{
    color:#d63384;
    font-weight:bold;
    text-decoration:none;
}

.btn-create{
    width:100%;
    padding:15px;
    border:none;
    border-radius:10px;
    background:linear-gradient(180deg,#ff738c,#d93d5b);
    color:#fff;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
    box-shadow:0 8px 20px rgba(217,58,88,.35);
}

.art-panel{
    position:relative;
    margin:0;
    border-radius:0 24px 24px 0;
    overflow:hidden;
    background:#fff;
    padding:0;
}


.art-panel img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
}
.alert{
    padding:12px;
    margin-bottom:16px;
    border-radius:8px;
}

.alert-error{
    background:#fde2e2;
    color:#b3261e;
}

.errors{
    margin-bottom:16px;
    padding-left:20px;
    color:#b3261e;
}

@media(max-width:768px){

.card{
    grid-template-columns:1fr;
}

.art-panel{
    order:-1;
    height:260px;
}

.form-panel{
    padding:30px;
}

.row-2{
    grid-template-columns:1fr;
}

}
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

    <div class="art-panel">
    <img src="<?= base_url('uploads/register/registerimg.png') ?>" alt="Register Illustration">
</div>

  </div>
</div>

<?= $this->endSection() ?>
