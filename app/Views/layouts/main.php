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
  .page{max-width:1200px; margin:0 auto; box-shadow:0 20px 50px rgba(120,20,70,0.15); overflow:hidden;}

  /* NAVBAR */
  .navbar{
    position:sticky; top:0; z-index:50;
    display:flex; align-items:center; justify-content:space-between;
    background:linear-gradient(180deg,#ffe7ef 0%, #ffd6e6 100%);
    padding:22px 48px;
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
  .menu-toggle{display:none; flex-direction:column; gap:5px; cursor:pointer; background:none; border:none;}
  .menu-toggle span{width:26px; height:3px; background:var(--ink); border-radius:2px;}

  /* FOOTER */
  footer{background:linear-gradient(180deg,#fdeef1 0%, #fce3e9 100%); padding:44px 56px 30px 56px;}
  .footer-top{display:grid; grid-template-columns:1.1fr 1fr 1fr 1fr 1fr; gap:24px; padding-bottom:34px;}
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
  .divider{height:1px; background:var(--line); margin-bottom:20px;}
  .footer-bottom p{font-size:11.5px; color:var(--muted); line-height:1.9;}
  .footer-bottom p.copyright{font-weight:700; color:var(--ink);}

  <?= $this->renderSection('styles') ?>
</style>
</head>
<body>

<div class="page">

  <nav class="navbar">
    <a href="<?= site_url('/') ?>" class="logo">
      <span class="name">Mirae</span>
      <span class="tag">SimplePay</span>
    </a>
    <ul class="nav-links" id="navLinks">
      <li><a href="<?= site_url('/') ?>" class="<?= (current_url() == base_url('/')) ? 'active' : '' ?>">Home</a></li>
      <li><a href="<?= site_url('about') ?>">About Me</a></li>
      <li><a href="<?= site_url('donate') ?>">Donate</a></li>
      <li><a href="<?= site_url('/#contact') ?>">Contact</a></li>
      <?php if (session()->get('isLoggedIn')): ?>
        <li><a href="<?= site_url('dashboard/laporan') ?>">Laporan</a></li>
        <li><a href="<?= site_url('logout') ?>">Logout</a></li>
      <?php else: ?>
        <li><a href="<?= site_url('login') ?>">Login</a></li>
      <?php endif; ?>
    </ul>
    <button class="menu-toggle" onclick="document.getElementById('navLinks').classList.toggle('open')">
      <span></span><span></span><span></span>
    </button>
  </nav>

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
