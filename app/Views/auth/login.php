<?= $this->extend('layouts/main') ?>

<?php $show_footer = false; ?>

<?= $this->section('styles') ?>
  body{background:linear-gradient(135deg, #e91e8c 0%, #ff4f9e 40%, #ff8ec1 100%); min-height:100vh;}
  .auth-wrap{display:flex; align-items:center; justify-content:center; padding:40px 16px 80px 16px;}
  .card{width:100%; max-width:900px; background:#fbd6e4; border-radius:26px; display:grid; grid-template-columns:1fr 1.15fr; overflow:hidden; box-shadow:0 30px 60px rgba(120,20,70,0.35);}

  /* ART PANEL (kiri) */
  .art-panel{position:relative; background:#fff; margin:16px; border-radius:18px; overflow:hidden; display:flex; flex-direction:column; padding:20px 18px;}
  .brand{font-family:'Brush Script MT','Segoe Script',cursive; font-size:24px; color:var(--pink-deep); font-style:italic; margin:0 0 4px 0; font-weight:700; text-decoration:none; display:inline-block;}
  .donation-card{position:absolute; top:44px; right:10px; width:110px; background:#fff; border:1.5px dashed #f2c9d8; border-radius:8px; box-shadow:0 8px 16px rgba(0,0,0,0.12); padding:8px 8px 10px 8px; transform:rotate(6deg);}
  .donation-card .title{font-size:9px; font-weight:800; color:var(--pink-deep); margin:0 0 6px 0;}
  .mascot-wrap{margin-top:auto; display:flex; justify-content:center; align-items:flex-end;}
  .dots{position:absolute; left:12px; top:calc(50% - 10px); display:flex; flex-direction:column; gap:10px; z-index:2;}
  .dot-row{display:flex; align-items:center; gap:8px;}
  .dot{width:11px; height:11px; border-radius:50%; background:var(--purple); flex-shrink:0;}
  .bar{width:44px; height:8px; border-radius:6px; background:var(--purple);}

  /* FORM PANEL (kanan) */
  .form-panel{padding:46px 46px 36px 30px; display:flex; flex-direction:column; justify-content:center;}
  .form-panel h1{font-size:40px; color:#fff; margin:0 0 26px 0; font-weight:800; letter-spacing:0.5px;}
  label{display:block; font-size:13px; font-weight:700; color:var(--ink); margin-bottom:6px;}
  .field{display:flex; align-items:center; gap:10px; background:#fff; border-radius:10px; padding:12px 14px; margin-bottom:20px;}
  .field input{border:none; outline:none; font-size:14px; width:100%; background:transparent; color:#333;}
  .field svg{flex-shrink:0;}
  .row-end{display:flex; justify-content:space-between; margin:-10px 0 22px 0; font-size:12.5px;}
  .row-end a{color:var(--ink); text-decoration:none;}
  .row-end a b{color:var(--pink-deep);}
  .btn-login{width:100%; padding:14px; border:none; border-radius:10px; background:linear-gradient(180deg, #f7c948 0%, #e8ae2c 100%); color:#fff; font-size:16px; font-weight:800; letter-spacing:0.4px; cursor:pointer; box-shadow:0 8px 18px rgba(232,174,44,0.45); transition:transform .15s ease, box-shadow .15s ease;}
  .btn-login:hover{transform:translateY(-2px); box-shadow:0 12px 22px rgba(232,174,44,0.55);}
  .alert{padding:10px 14px; border-radius:8px; font-size:12.5px; margin-bottom:16px;}
  .alert-error{background:#fde2e2; color:#b3261e;}
  .alert-success{background:#dff5e1; color:#1e7a34;}
  ul.errors{margin:0 0 16px 0; padding-left:18px; font-size:12px; color:#fff; background:rgba(255,255,255,0.15); border-radius:8px; padding:10px 14px 10px 30px;}

  @media (max-width:720px){
    .card{grid-template-columns:1fr;}
    .art-panel{min-height:260px;}
    .form-panel{padding:34px 26px;}
  }
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="auth-wrap">
  <div class="card">

    <!-- ART PANEL: ilustrasi maskot -->
    <div class="art-panel">
      <a href="<?= site_url('/') ?>" class="brand">Mirae.</a>

      <div class="donation-card">
        <p class="title">✦ Donation</p>
        <svg width="100%" height="26" viewBox="0 0 100 26">
          <rect x="4" y="10" width="9" height="16" fill="#f472a6" rx="1.5"/>
          <rect x="17" y="4" width="9" height="22" fill="#e0407a" rx="1.5"/>
          <rect x="30" y="14" width="9" height="12" fill="#f7c948" rx="1.5"/>
          <circle cx="62" cy="9" r="7" fill="none" stroke="#a99be0" stroke-width="2"/>
          <circle cx="62" cy="6.5" r="2.3" fill="#a99be0"/>
          <circle cx="82" cy="9" r="7" fill="none" stroke="#f472a6" stroke-width="2"/>
          <circle cx="82" cy="6.5" r="2.3" fill="#f472a6"/>
        </svg>
      </div>

      <div class="dots">
        <div class="dot-row"><div class="dot"></div><div class="bar"></div></div>
        <div class="dot-row"><div class="dot"></div><div class="bar"></div></div>
      </div>

      <div class="mascot-wrap">
        <svg width="220" height="260" viewBox="0 0 240 290" xmlns="http://www.w3.org/2000/svg">
          <ellipse cx="120" cy="282" rx="70" ry="8" fill="#f4c9d6" opacity="0.6"/>
          <path d="M55 210 Q52 165 120 160 Q188 165 185 210 L192 270 Q120 288 48 270 Z" fill="#9184dd"/>
          <path d="M120 160 Q188 165 185 210 L192 270 Q160 280 120 283 Z" fill="#8172d1" opacity="0.55"/>
          <path d="M55 205 Q30 225 35 255" stroke="#9184dd" stroke-width="30" stroke-linecap="round" fill="none"/>
          <circle cx="34" cy="258" r="17" fill="#ffdcc0"/>
          <path d="M178 200 Q210 175 205 125" stroke="#9184dd" stroke-width="30" stroke-linecap="round" fill="none"/>
          <g transform="translate(205,100)">
            <circle r="20" fill="#ffdcc0"/>
            <rect x="-4" y="-30" width="8" height="20" rx="4" fill="#ffdcc0"/>
            <rect x="-16" y="-26" width="8" height="18" rx="4" fill="#ffdcc0" transform="rotate(-18)"/>
            <rect x="8" y="-26" width="8" height="18" rx="4" fill="#ffdcc0" transform="rotate(18)"/>
            <rect x="-22" y="-14" width="8" height="16" rx="4" fill="#ffdcc0" transform="rotate(-34)"/>
          </g>
          <circle cx="120" cy="235" r="18" fill="#ffffff"/>
          <text x="120" y="243" font-size="20" font-weight="800" fill="#9184dd" text-anchor="middle" font-family="Segoe UI, sans-serif">M</text>
          <rect x="105" y="145" width="30" height="24" rx="10" fill="#ffdcc0"/>
          <circle cx="120" cy="115" r="66" fill="#ffe3c6"/>
          <path d="M56 100 Q52 70 75 55 Q70 90 80 100 Z" fill="#4fb8b0"/>
          <path d="M184 100 Q188 70 165 55 Q170 90 160 100 Z" fill="#4fb8b0"/>
          <path d="M100 60 Q120 45 140 60 Q135 80 120 78 Q105 80 100 60 Z" fill="#4fb8b0"/>
          <circle cx="58" cy="118" r="9" fill="#ffdcc0"/>
          <circle cx="182" cy="118" r="9" fill="#ffdcc0"/>
          <ellipse cx="82" cy="140" rx="11" ry="7" fill="#ff9fb0" opacity="0.65"/>
          <ellipse cx="158" cy="140" rx="11" ry="7" fill="#ff9fb0" opacity="0.65"/>
          <path d="M78 122 Q86 128 94 122" stroke="#3a1030" stroke-width="5" fill="none" stroke-linecap="round"/>
          <circle cx="150" cy="120" r="6.5" fill="#3a1030"/>
          <circle cx="152" cy="117" r="2" fill="#fff"/>
          <circle cx="120" cy="132" r="3.5" fill="#ffb98f"/>
          <path d="M96 148 Q120 172 146 148 Q136 165 120 165 Q104 165 96 148 Z" fill="#7a2b3a"/>
          <path d="M108 155 Q120 166 133 155 Q126 162 120 162 Q114 162 108 155 Z" fill="#ff7a90"/>
          <path d="M50 105 Q54 38 120 33 Q188 36 192 108 Q192 122 176 122 L64 122 Q50 122 50 105 Z" fill="#f9cb4a"/>
          <circle cx="66" cy="100" r="3" fill="#eab52e"/>
          <circle cx="174" cy="100" r="3" fill="#eab52e"/>
          <rect x="62" y="98" width="116" height="38" rx="19" fill="#eab52e"/>
          <circle cx="92" cy="117" r="18" fill="#e7f1fb"/>
          <circle cx="148" cy="117" r="18" fill="#e0407a"/>
          <rect x="108" y="108" width="24" height="18" rx="4" fill="#eab52e"/>
          <path d="M66 130 Q120 154 174 130" stroke="#eab52e" stroke-width="7" fill="none" stroke-linecap="round"/>
        </svg>
      </div>
    </div>

    <!-- FORM PANEL -->
    <div class="form-panel">
      <h1>Login</h1>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-error"><?= esc(session()->getFlashdata('error')) ?></div>
      <?php endif; ?>
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
      <?php endif; ?>
      <?php if (session()->getFlashdata('errors')): ?>
        <ul class="errors">
          <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <?= form_open('login') ?>
        <label for="email">Email</label>
        <div class="field">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e0407a" stroke-width="2"><path d="M4 4h16v16H4z"/><path d="M4 6l8 7 8-7"/></svg>
          <input id="email" name="email" type="email" placeholder="you@email.com" value="<?= old('email') ?>">
        </div>

        <label for="password">Password</label>
        <div class="field">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e0407a" stroke-width="2"><circle cx="8" cy="15" r="4"/><path d="M10.5 12.5L20 3M16 7l3 3M13 10l2 2"/></svg>
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
