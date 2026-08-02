<?= $this->extend('layouts/main') ?>

<?php $show_footer = false; ?>

<?= $this->section('styles') ?>
  body{background:linear-gradient(135deg, #e91e8c 0%, #ff4f9e 40%, #ff8ec1 100%); min-height:100vh;}
  .auth-wrap{display:flex; align-items:center; justify-content:center; padding:40px 16px 80px 16px;}
  .card{width:100%; max-width:850px; background:#fbd6e4; border-radius:26px; display:grid; grid-template-columns:1.05fr 0.85fr; overflow:hidden; box-shadow:0 30px 60px rgba(120,20,70,0.35);}

  /* FORM PANEL (kiri) */
  .form-panel{padding:44px 40px 38px 44px; display:flex; flex-direction:column; justify-content:center;}
  .form-panel h1{font-size:26px; color:var(--ink); margin:0 0 6px 0; font-weight:800;}
  .subtitle{font-size:13px; color:var(--ink); margin:0 0 22px 0;}
  .subtitle a{color:var(--pink-deep); font-weight:700; text-decoration:none;}
  .row-2{display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:14px;}
  .field{display:flex; align-items:center; gap:9px; background:#fff; border-radius:9px; padding:12px 13px; margin-bottom:14px;}
  .row-2 .field{margin-bottom:0;}
  .field input{border:none; outline:none; font-size:13.5px; width:100%; background:transparent; color:#333;}
  .field svg{flex-shrink:0;}
  .agree{display:flex; align-items:flex-start; gap:8px; font-size:12px; color:var(--ink); margin:14px 0 20px 0; line-height:1.5;}
  .agree input{margin-top:2px;}
  .agree a{color:var(--pink-deep); font-weight:700; text-decoration:none;}
  .btn-create{width:100%; padding:14px; border:none; border-radius:10px; background:linear-gradient(180deg, #ff6f88 0%, #d93a58 100%); color:#fff; font-size:15px; font-weight:800; cursor:pointer; box-shadow:0 8px 18px rgba(217,58,88,0.45); transition:transform .15s ease, box-shadow .15s ease;}
  .btn-create:hover{transform:translateY(-2px); box-shadow:0 12px 22px rgba(217,58,88,0.55);}
  .alert{padding:10px 14px; border-radius:8px; font-size:12.5px; margin-bottom:16px;}
  .alert-error{background:#fde2e2; color:#b3261e;}
  ul.errors{margin:0 0 16px 0; padding-left:18px; font-size:12px; color:#b3261e; background:#fde2e2; border-radius:8px; padding:10px 14px 10px 30px;}

  /* ART PANEL (kanan): ilustrasi kotak donasi */
  .art-panel{position:relative; margin:16px; border-radius:20px; overflow:hidden; background:linear-gradient(180deg,#ffb199 0%,#f4547a 45%,#c6285e 100%);}
  .sparkle{position:absolute; top:16px; left:16px; color:#fff; font-size:16px; opacity:0.9;}

  @media (max-width:720px){
    .card{grid-template-columns:1fr;}
    .art-panel{min-height:220px; order:-1;}
    .form-panel{padding:34px 26px;}
  }
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="auth-wrap">
  <div class="card">

    <!-- FORM PANEL -->
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
          <div class="field">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#e0407a" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 4-6 8-6s8 2 8 6"/></svg>
            <input type="text" name="first_name" placeholder="First name" value="<?= old('first_name') ?>">
          </div>
          <div class="field">
            <input type="text" name="last_name" placeholder="Last name" value="<?= old('last_name') ?>">
          </div>
        </div>

        <div class="field">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#e0407a" stroke-width="2"><path d="M4 4h16v16H4z"/><path d="M4 6l8 7 8-7"/></svg>
          <input type="email" name="email" placeholder="Email address" value="<?= old('email') ?>">
        </div>

        <div class="field">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#e0407a" stroke-width="2"><circle cx="8" cy="15" r="4"/><path d="M10.5 12.5L20 3M16 7l3 3M13 10l2 2"/></svg>
          <input type="password" name="password" placeholder="Password">
        </div>

        <label class="agree">
          <input type="checkbox" name="agree" value="1" checked>
          I agree to the <a href="#">terms &amp; conditions</a>
        </label>

        <button class="btn-create" type="submit">Create an account</button>
      <?= form_close() ?>
    </div>

    <!-- ART PANEL: ilustrasi kotak donasi -->
    <div class="art-panel">
      <span class="sparkle">✦</span>
      <svg width="100%" height="100%" viewBox="0 0 300 460" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
        <rect width="300" height="460" fill="url(#sky)"/>
        <defs>
          <linearGradient id="sky" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="#ffb199"/>
            <stop offset="45%" stop-color="#f4547a"/>
            <stop offset="100%" stop-color="#b21f52"/>
          </linearGradient>
          <linearGradient id="boxshade" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="#ff7288" stop-opacity="0.5"/>
            <stop offset="100%" stop-color="#7a1030" stop-opacity="0.4"/>
          </linearGradient>
        </defs>

        <circle cx="40" cy="50" r="1.4" fill="#fff" opacity="0.8"/>
        <circle cx="90" cy="30" r="1" fill="#fff" opacity="0.6"/>
        <circle cx="230" cy="40" r="1.4" fill="#fff" opacity="0.8"/>
        <circle cx="260" cy="70" r="1" fill="#fff" opacity="0.6"/>
        <circle cx="60" cy="90" r="1" fill="#fff" opacity="0.5"/>

        <circle cx="150" cy="230" r="70" fill="#ffe9c2" opacity="0.25"/>

        <path d="M0 220 L60 150 L110 210 L160 130 L220 210 L260 170 L300 220 L300 460 L0 460 Z" fill="#8a2452" opacity="0.9"/>
        <path d="M0 260 L80 190 L140 250 L210 180 L300 250 L300 460 L0 460 Z" fill="#a4295e"/>
        <path d="M120 460 Q150 340 150 260 Q150 340 180 460 Z" fill="#c94a75" opacity="0.5"/>
        <rect x="0" y="330" width="300" height="130" fill="#7a1f47"/>

        <g fill="#3d1030" opacity="0.95">
          <ellipse cx="222" cy="288" rx="7" ry="8"/>
          <path d="M212 300 Q222 292 232 300 L230 330 L214 330 Z"/>
          <ellipse cx="246" cy="290" rx="7" ry="8"/>
          <path d="M236 302 Q246 294 256 302 L254 330 L238 330 Z"/>
        </g>
        <rect x="228" y="295" width="14" height="12" rx="1" fill="#5a1830"/>

        <rect x="95" y="310" width="110" height="100" rx="4" fill="#e63c60"/>
        <rect x="95" y="310" width="110" height="100" rx="4" fill="url(#boxshade)"/>
        <rect x="95" y="310" width="110" height="14" fill="#c92f52"/>
        <rect x="138" y="304" width="24" height="10" rx="2" fill="#7a1030"/>
        <text x="150" y="368" font-size="20" fill="#ffffff" font-weight="800" text-anchor="middle" font-family="Segoe UI, sans-serif">♥</text>
        <text x="150" y="396" font-size="17" fill="#ffffff" font-weight="800" text-anchor="middle" font-family="Segoe UI, sans-serif" letter-spacing="1">DONATE</text>
        <text x="150" y="408" font-size="6.5" fill="#ffd7dd" text-anchor="middle" font-family="Segoe UI, sans-serif" letter-spacing="0.5">SHARE LOVE, CREATE HOPE</text>

        <g transform="translate(150,275)">
          <circle r="22" fill="#fff4d8" opacity="0.35"/>
          <path d="M0 8 C-14 -4 -12 -18 0 -12 C12 -18 14 -4 0 8 Z" fill="#fff6da"/>
        </g>

        <g transform="rotate(-8 55 380)">
          <rect x="20" y="360" width="70" height="55" rx="3" fill="#7a4a3a"/>
          <text x="55" y="376" font-size="8" fill="#ffe3d0" font-weight="700" text-anchor="middle" font-family="Segoe UI, sans-serif">YOUR KINDNESS</text>
          <text x="55" y="388" font-size="8" fill="#ffe3d0" font-weight="700" text-anchor="middle" font-family="Segoe UI, sans-serif">CAN CHANGE</text>
          <text x="55" y="400" font-size="8" fill="#ffe3d0" font-weight="700" text-anchor="middle" font-family="Segoe UI, sans-serif">SOMEONE'S</text>
          <text x="55" y="412" font-size="8" fill="#ffe3d0" font-weight="700" text-anchor="middle" font-family="Segoe UI, sans-serif">TOMORROW ♥</text>
        </g>

        <g>
          <ellipse cx="225" cy="418" rx="16" ry="6" fill="#c8283f"/>
          <ellipse cx="225" cy="412" rx="16" ry="6" fill="#e0405e"/>
          <ellipse cx="225" cy="406" rx="16" ry="6" fill="#f0567a"/>
        </g>
        <g>
          <ellipse cx="255" cy="428" rx="13" ry="5" fill="#c8283f"/>
          <ellipse cx="255" cy="423" rx="13" ry="5" fill="#e0405e"/>
          <ellipse cx="255" cy="418" rx="13" ry="5" fill="#f0567a"/>
        </g>

        <ellipse cx="70" cy="440" rx="18" ry="7" fill="#5c1735"/>
        <ellipse cx="270" cy="450" rx="20" ry="8" fill="#5c1735"/>
      </svg>
    </div>

  </div>
</div>

<?= $this->endSection() ?>
