<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= esc($title ?? 'Mirae — SimplePay') ?></title>
<style>
  :root{
    --pink-deep:#e0407a;
    --pink-light:#5aa8d9;
    --purple:#8b7cd6;
    --purple-dark:#6f5cc4;
    --ink:#241326;
    --muted:#6b5c68;
    --line:#e6c9d4;
  }
  *{box-sizing:border-box; margin:0; padding:0;}
  html{scroll-behavior:smooth;}
  body{font-family:'Segoe UI', system-ui, sans-serif; background:#ffffff;}
  .page{width:100%; margin:0; overflow:hidden;}

  /* NAVBAR */
  .navbar{
    position:sticky; top:0; z-index:50;
    background:linear-gradient(180deg,#ffe7ef 0%, #ffd6e6 100%);
    padding:0 48px;
  }
  .navbar-inner{
    max-width:1200px; margin:0 auto;
    display:flex; align-items:center; justify-content:space-between;
    padding:22px 0;
  }
  .logo{display:flex; align-items:baseline; gap:8px; text-decoration:none;}
  .logo .name{
    font-family:'Brush Script MT','Segoe Script',cursive;
    font-style:italic; font-weight:700; font-size:30px;
    background:linear-gradient(90deg,#e0407a,#f4a3c0);
    -webkit-background-clip:text; background-clip:text; color:transparent;
  }
  .logo .tag{font-size:11px; color:var(--pink-light); font-weight:600; letter-spacing:0.5px; align-self:flex-end; margin-bottom:2px;}
  .nav-links{display:flex; align-items:center; gap:38px; list-style:none;}
  .nav-links a{text-decoration:none; color:var(--ink); font-size:16px; font-weight:600;}
  .nav-links a:hover, .nav-links a.active{color:var(--pink-deep);}
  .navbar-right{display:flex; align-items:center; gap:32px;}
  .menu-toggle{display:none; flex-direction:column; gap:5px; cursor:pointer; background:none; border:none;}
  .menu-toggle span{width:26px; height:3px; background:var(--ink); border-radius:2px;}

  /* PROFILE DROPDOWN */
  .profile-menu{position:relative;}
  .profile-trigger{
    display:flex; align-items:center; gap:10px;
    background:none; border:none; cursor:pointer; padding:4px;
  }
  .avatar-circle{
    width:38px; height:38px; border-radius:50%;
    background:linear-gradient(135deg,#c084e8,#e0407a);
    color:#fff; font-weight:800; font-size:15px;
    display:flex; align-items:center; justify-content:center;
    flex-shrink:0;
  }
  .avatar-circle.big{width:46px; height:46px; font-size:18px;}
  .profile-label{display:flex; flex-direction:column; align-items:flex-start; line-height:1.25;}
  .profile-name{font-size:14px; font-weight:800; color:var(--ink);}
  .profile-role{font-size:11px; color:var(--muted);}
  .chevron-icon{color:var(--ink); transition:transform .2s ease;}
  .profile-trigger.open .chevron-icon{transform:rotate(180deg);}

  .profile-dropdown{
    position:absolute; top:calc(100% + 12px); right:0;
    width:300px;
    background:#fff;
    border-radius:16px;
    box-shadow:0 20px 40px rgba(120,10,55,0.28);
    overflow:hidden;
    opacity:0; visibility:hidden; transform:translateY(-8px);
    transition:opacity .18s ease, transform .18s ease, visibility .18s ease;
    z-index:100;
  }
  .profile-dropdown.open{opacity:1; visibility:visible; transform:translateY(0);}
  .dropdown-header{
    display:flex; align-items:center; gap:14px;
    background:linear-gradient(135deg,#f472a6,#e0407a);
    padding:20px;
  }
  .dropdown-name{font-size:14.5px; font-weight:800; color:#fff;}
  .dropdown-email{font-size:11.5px; color:rgba(255,255,255,0.85);}
  .dropdown-body{padding:8px 0;}
  .dropdown-item{
    display:flex; align-items:center; gap:12px;
    padding:12px 20px;
    font-size:13.5px; font-weight:600; color:var(--ink);
    text-decoration:none;
    transition:background .15s ease;
  }
  .dropdown-item:hover{background:#fbeef3;}
  .dropdown-item.logout-item{color:var(--pink-deep); border-top:1px solid #f2e3e8; margin-top:4px;}

  @media (max-width:820px){
    .profile-label{display:none;}
  }

  /* FOOTER */
  footer{background:linear-gradient(180deg,#fdeef1 0%, #fce3e9 100%); padding:44px 56px 30px 56px;}
  .footer-top{max-width:1200px; margin:0 auto; display:grid; grid-template-columns:1.1fr 1fr 1fr 1fr 1fr; gap:24px; padding-bottom:34px;}
  .brand-col .name{
    font-family:'Brush Script MT','Segoe Script',cursive;
    font-style:italic; font-weight:700; font-size:32px;
    background:linear-gradient(90deg,#e0407a,#f4a3c0);
    -webkit-background-clip:text; background-clip:text; color:transparent;
    display:block;
  }
  .brand-col .tag{font-size:12px; color:var(--pink-light); font-weight:600; letter-spacing:0.5px; margin:-4px 0 20px 4px;}
  .lang-select{
    display:inline-flex; align-items:center; gap:8px; background:#ffffff; border-radius:8px;
    padding:9px 14px; box-shadow:0 4px 10px rgba(0,0,0,0.06); cursor:pointer;
  }
  .lang-select span{font-size:13px; font-weight:700; color:var(--pink-deep); text-decoration:underline;}
  .footer-col h4{font-size:14px; font-weight:800; color:var(--ink); letter-spacing:0.5px; margin-bottom:14px;}
  .footer-col ul{list-style:none;}
  .footer-col li{margin-bottom:9px;}
  .footer-col a{font-size:12.5px; color:var(--muted); text-decoration:none;}
  .footer-col a:hover{color:var(--pink-deep);}
  .divider{max-width:1200px; margin:0 auto 20px auto; height:1px; background:var(--line);}
  .footer-bottom{max-width:1200px; margin:0 auto;}
  .footer-bottom p{font-size:11.5px; color:var(--muted); line-height:1.9;}
  .footer-bottom p.copyright{font-weight:700; color:var(--ink);}

  <?= $this->renderSection('styles') ?>
</style>
</head>
<body>

<div class="page">

  <nav class="navbar">
   <div class="navbar-inner">
    <a href="<?= site_url('/') ?>" class="logo">
      <span class="name">Mirae</span>
      <span class="tag">SimplePay</span>
    </a>

    <div class="navbar-right">
    <ul class="nav-links" id="navLinks">
      <li><a href="<?= site_url('/') ?>" class="<?= (current_url() == base_url('/')) ? 'active' : '' ?>">Home</a></li>
      <li><a href="<?= site_url('about') ?>">About Me</a></li>
      <li><a href="<?= site_url('donate') ?>">Donate</a></li>
      <li><a href="<?= site_url('/#contact') ?>">Contact</a></li>
      <?php if (! session()->get('isLoggedIn')): ?>
        <li><a href="<?= site_url('login') ?>">Login</a></li>
      <?php endif; ?>
    </ul>

    <?php if (session()->get('isLoggedIn')): ?>
      <?php
        $userName  = session()->get('user_name') ?: 'User';
        $userEmail = session()->get('user_email') ?: '';
        $initial   = strtoupper(substr($userName, 0, 1));
      ?>
      <div class="profile-menu" id="profileMenu">
        <button class="profile-trigger" onclick="document.getElementById('profileDropdown').classList.toggle('open'); this.classList.toggle('open');">
          <span class="avatar-circle"><?= esc($initial) ?></span>
          <span class="profile-label">
            <span class="profile-name"><?= esc($userName) ?></span>
            <span class="profile-role">Member</span>
          </span>
          <svg class="chevron-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
        </button>

        <div class="profile-dropdown" id="profileDropdown">
          <div class="dropdown-header">
            <span class="avatar-circle big"><?= esc($initial) ?></span>
            <div>
              <div class="dropdown-name"><?= esc($userName) ?></div>
              <div class="dropdown-email"><?= esc($userEmail) ?></div>
            </div>
          </div>
          <div class="dropdown-body">
            <a href="<?= site_url('dashboard/laporan') ?>" class="dropdown-item">
              <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#8b7cd6" stroke-width="2"><path d="M3 3v18h18"/><path d="M7 15l4-6 4 3 5-8"/></svg>
              Dashboard
            </a>
            <a href="<?= site_url('donate/history') ?>" class="dropdown-item">
              <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#e0407a" stroke-width="2"><path d="M20.8 4.6c-1.9-1.9-5-1.9-6.9 0L12 6.5l-1.9-1.9c-1.9-1.9-5-1.9-6.9 0-1.9 1.9-1.9 5 0 6.9L12 20.3l8.8-8.8c1.9-1.9 1.9-5 0-6.9z"/></svg>
              Donasi Saya
            </a>
            <a href="#" class="dropdown-item">
              <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#3d8fd9" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 4-6 8-6s8 2 8 6"/></svg>
              Profile
            </a>
            <a href="#" class="dropdown-item">
              <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#e08a3d" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
              Pengaturan
            </a>
            <a href="<?= site_url('logout') ?>" class="dropdown-item logout-item">
              <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#e0407a" stroke-width="2"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
              Logout
            </a>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <button class="menu-toggle" onclick="document.getElementById('navLinks').classList.toggle('open')">
      <span></span><span></span><span></span>
    </button>
    </div>
   </div>
  </nav>

  <script>
    document.addEventListener('click', function (event) {
      const menu = document.getElementById('profileMenu');
      if (menu && !menu.contains(event.target)) {
        document.getElementById('profileDropdown')?.classList.remove('open');
        document.querySelector('.profile-trigger')?.classList.remove('open');
      }
    });
  </script>

  <?= $this->renderSection('content') ?>

  <?php if ($show_footer ?? true): ?>
  <footer id="contact">
    <div class="footer-top">
      <div class="brand-col">
        <span class="name">Mirae</span>
        <span class="tag">SimplePay</span>
        <div class="lang-select">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15 15 0 010 20a15 15 0 010-20"/></svg>
          <span>Indonesian</span>
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
      </div>
      <div class="footer-col">
        <h4>INDUSTRI</h4>
        <ul>
          <li><a href="#">Platform Donasi Online</a></li>
          <li><a href="#">Sistem Manajemen Donatur</a></li>
          <li><a href="#">Crowdfunding Sosial</a></li>
          <li><a href="#">Teknologi Filantropi (Philanthropy Tech)</a></li>
          <li><a href="#">Digital Social Impact</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>BANTUAN</h4>
        <ul>
          <li><a href="#">Cara Donasi</a></li>
          <li><a href="#">FAQ (Pertanyaan Umum)</a></li>
          <li><a href="#">Panduan Pengguna</a></li>
          <li><a href="#">Status Donasi</a></li>
          <li><a href="#">Laporan Transparansi</a></li>
          <li><a href="#">Hubungi Kami</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>PERUSAHAAN</h4>
        <ul>
          <li><a href="<?= site_url('about') ?>">Tentang MIRAE</a></li>
          <li><a href="#">Visi &amp; Misi</a></li>
          <li><a href="<?= site_url('donate') ?>">Program Donasi</a></li>
          <li><a href="#">Blog / Berita (opsional)</a></li>
          <li><a href="#">Karir (opsional)</a></li>
          <li><a href="#">Kebijakan Privasi</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>LEGAL</h4>
        <ul>
          <li><a href="#">Syarat &amp; Ketentuan</a></li>
          <li><a href="#">Kebijakan Privasi</a></li>
          <li><a href="#">Disclaimer</a></li>
          <li><a href="#">Kebijakan Penggunaan Data</a></li>
          <li><a href="#">Keamanan Sistem</a></li>
          <li><a href="#">Hak Cipta</a></li>
        </ul>
      </div>
    </div>
    <div class="divider"></div>
    <div class="footer-bottom">
      <p class="copyright">© <?= date('Y') ?> MIRAE – Kelola Donasi. All Rights Reserved</p>
      <p>MIRAE adalah platform pengelolaan donasi digital yang menghubungkan donatur dengan berbagai program sosial secara aman, transparan, dan terpercaya.</p>
      <p>Terdaftar di PSE Kominfo No. 126400031034800000001</p>
      <p>PT MIRAE Digital Indonesia</p>
      <p>Jl. Jalan kanan belok kiri, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat, Indonesia 40125</p>
      <p>MIRAE International Pte. Ltd.</p>
      <p>160 Robinson Road #14-04, Singapore Business Federation Center, Singapore 068914</p>
    </div>
  </footer>
  <?php endif; ?>

</div>

</body>
</html>
