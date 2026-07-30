<?php
$hide_layout = true;
$show_footer = false;
?>

<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
body.auth-login-page{
    background:
        radial-gradient(circle at top right,#ff6eb6 0%,transparent 28%),
        linear-gradient(135deg,#e61d7b 0%,#f33d91 45%,#ff79b7 100%) !important;
    min-height:100vh !important;
    margin:0;
    padding:0;
    overflow:hidden;
}

body.auth-login-page .page{
    width:100%;
    max-width:100%;
    margin:0;
    background:transparent;
    box-shadow:none;
}

body.auth-login-page .navbar,
body.auth-login-page footer,
body.auth-login-page #contact{
    display:none !important;
}

/*=========================
      LOGIN WRAPPER
==========================*/

.al-wrap{
    width:100%;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

.al-card{
    width:1020px;
    height:610px;
    background:#f9ccda;
    border-radius:22px;
    display:grid;
    grid-template-columns:43% 57%;
    position:relative;
    overflow:hidden;
    box-shadow:0 25px 55px rgba(120,20,70,.28);
}

/*=========================
        LEFT PANEL
==========================*/

.al-art{
    margin:16px;
    border-radius:18px;
    background:#fff;
    position:relative;
    overflow:hidden;
}

.al-brand{
    position:absolute;
    top:18px;
    left:22px;
    z-index:20;
    font-family:"Brush Script MT",cursive;
    font-size:34px;
    color:#ef4d87;
    text-decoration:none;
    font-weight:bold;
}

.al-art-body{
    width:100%;
    height:100%;
    position:relative;
}

/* Character */

.al-art-body .char{
    position:absolute;
    bottom:0;
    left:-15px;
    width:88%;
    max-width:none;
    height:auto;
    object-fit:contain;
    z-index:2;
}

/* Donation Card */

.al-art-body .dcard{
    position:absolute;
    top:28px;
    right:28px;
    width:115px;
    transform:rotate(8deg);
    z-index:5;
}

/*=========================
      CENTER BUTTON
==========================*/

.middle-button{
    position:absolute;
    left:42.7%;
    top:50%;
    transform:translateY(-50%);
    z-index:100;
}

.middle-button span{
    display:block;
    width:44px;
    height:12px;
    background:#8977d9;
    border-radius:8px;
    margin:12px 0;
    position:relative;
    box-shadow:0 2px 5px rgba(0,0,0,.15);
}

.middle-button span::before{
    content:"";
    width:12px;
    height:12px;
    border-radius:50%;
    background:#8977d9;
    position:absolute;
    left:-18px;
}

/*=========================
      RIGHT PANEL
==========================*/

.al-form{
    padding:58px 56px 42px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.al-form h1{
    margin:0;
    font-size:58px;
    line-height:1;
    color:#fff;
    font-weight:900;
}

.al-sub{
    color:rgba(255,255,255,.85);
    font-size:14px;
    margin:10px 0 35px;
}

.al-form label{
    display:block;
    margin-bottom:8px;
    color:#4d2340;
    font-size:13px;
    font-weight:700;
}

.al-field{
    display:flex;
    align-items:center;
    background:#fff;
    border-radius:8px;
    height:48px;
    padding:0 15px;
    margin-bottom:20px;
    border:2px solid transparent;
    transition:.2s;
}

.al-field:focus-within{
    border-color:#f19ac4;
}

.al-field .fi{
    width:18px;
    height:18px;
    color:#cb6f9d;
    margin-right:10px;
}

.al-field input{
    flex:1;
    border:none;
    outline:none;
    background:transparent;
    font-size:14px;
    color:#333;
}

.al-field input::placeholder{
    color:#c39cb0;
}

.al-forgot{
    text-align:right;
    margin:-8px 0 24px;
}

.al-forgot a{
    color:#e03b84;
    text-decoration:none;
    font-size:13px;
}

.al-forgot a:hover{
    text-decoration:underline;
}

/*=========================
        BUTTON
==========================*/

.al-btn{
    width:100%;
    height:54px;
    border:none;
    border-radius:10px;
    background:linear-gradient(180deg,#ffd156,#f0b228);
    color:#fff;
    font-size:19px;
    font-weight:700;
    cursor:pointer;
    box-shadow:0 10px 22px rgba(233,174,40,.35);
    transition:.2s;
}

.al-btn:hover{
    transform:translateY(-2px);
}

.al-btn:active{
    transform:translateY(0);
}

/*=========================
       DIVIDER
==========================*/

.al-div{
    display:flex;
    align-items:center;
    margin:28px 0 22px;
    color:#fff;
    font-size:12px;
}

.al-div::before,
.al-div::after{
    content:"";
    flex:1;
    height:1px;
    background:rgba(255,255,255,.45);
}

.al-div::before{
    margin-right:12px;
}

.al-div::after{
    margin-left:12px;
}

/*=========================
      SOCIAL BUTTON
==========================*/

.al-social{
    display:flex;
    justify-content:center;
    gap:16px;
    margin-bottom:26px;
}

.al-sb{
    width:46px;
    height:46px;
    display:flex;
    justify-content:center;
    align-items:center;
    border-radius:12px;
    border:1px solid rgba(255,255,255,.5);
    background:rgba(255,255,255,.18);
    transition:.2s;
}

.al-sb:hover{
    background:#fff;
}

.al-sb svg{
    width:20px;
    height:20px;
}

/*=========================
      BOTTOM
==========================*/

.al-bottom{
    text-align:center;
    color:#fff;
    font-size:13px;
}

.al-bottom a{
    color:#fff;
    font-weight:bold;
    text-decoration:none;
}

/*=========================
        ALERT
==========================*/

.al-alert{
    padding:10px 15px;
    border-radius:8px;
    margin-bottom:20px;
}

.al-err{
    background:#ffe5e5;
    color:#b3261e;
}

.al-ok{
    background:#dff7df;
    color:#21743c;
}

/*=========================
      RESPONSIVE
==========================*/

@media(max-width:900px){

    .al-card{
        width:100%;
        height:auto;
        grid-template-columns:1fr;
    }

    .al-art{
        min-height:280px;
    }

    .al-art-body .char{
        width:58%;
        left:20%;
    }

    .al-art-body .dcard{
        width:90px;
        right:25px;
    }

    .middle-button{
        display:none;
    }

    .al-form{
        padding:35px 25px;
    }

    .al-form h1{
        font-size:42px;
    }
}
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="middle-button">
    <span></span>
    <span></span>
</div>
<div class="al-wrap">
  <div class="al-card">

    <!-- LEFT -->
    <div class="al-art">
      <a href="<?= site_url('/') ?>" class="al-brand">Mirae.</a>
      <div class="al-art-body">
        <img class="char"
     src="<?= base_url('uploads/login/character.png') ?>"
     alt="Character">

        <img class="dcard"
     src="<?= base_url('uploads/login/donation-card.png') ?>"
     alt="Donation Card">
      </div>
    </div>

    <!-- RIGHT -->
    <div class="al-form">
      <h1>Login</h1>
      <p class="al-sub">Welcome back! Please login to continue.</p>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="al-alert al-err"><?= esc(session()->getFlashdata('error')) ?></div>
      <?php endif; ?>
      <?php if (session()->getFlashdata('success')): ?>
        <div class="al-alert al-ok"><?= esc(session()->getFlashdata('success')) ?></div>
      <?php endif; ?>

      <?= form_open('login') ?>
        <label for="email">Email</label>
        <div class="al-field">
          <svg class="fi" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="3"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
          <input id="email" name="email" type="email" placeholder="Suprianto@gmail.com" value="<?= old('email') ?>">
        </div>

        <label for="password">Password</label>
        <div class="al-field">
          <svg class="fi" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          <input id="password" name="password" type="password" placeholder="••••••••••">
        </div>

        <div class="al-forgot">
          <a href="#">Forgot Password?</a>
        </div>

        <button class="al-btn" type="submit">Login</button>
      <?= form_close() ?>

      <div class="al-div">Or Continue With</div>

      <div class="al-social">
        <a href="#" class="al-sb" title="Google">
          <svg viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 0 1-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
        </a>
        <a href="#" class="al-sb" title="Facebook">
          <svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="#1877F2"/></svg>
        </a>
        <a href="#" class="al-sb" title="Apple">
          <svg viewBox="0 0 24 24"><path d="M17.05 20.28c-.98.95-2.05.88-3.08.4-1.09-.5-2.08-.48-3.24 0-1.44.62-2.2.44-3.06-.4C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.09zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.32 2.32-2.12 4.52-3.74 4.25z" fill="#000"/></svg>
        </a>
      </div>

      <div class="al-bottom">
        Don't Have Account? <a href="<?= site_url('register') ?>">Sign up Here</a>
      </div>
    </div>

  </div>
</div>

<?= $this->endSection() ?>