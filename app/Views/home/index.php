<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
  /* HERO */
  .hero{
    position:relative;
    background:linear-gradient(160deg, #f78bb0 0%, #ee5a94 40%, #c72868 100%);
    padding:80px 40px 90px 40px;
    text-align:center;
    overflow:hidden;
  }
  .hero::before{content:""; position:absolute; top:-80px; left:-80px; width:260px; height:260px; background:rgba(255,255,255,0.08); border-radius:50%;}
  .hero::after{content:""; position:absolute; bottom:-100px; right:-60px; width:320px; height:320px; background:rgba(255,255,255,0.06); border-radius:50%;}
  .badge{display:inline-block; background:#ffffff; color:#3d8fd9; font-size:13.5px; font-weight:700; padding:10px 24px; border-radius:30px; box-shadow:0 8px 18px rgba(120,20,70,0.18); margin-bottom:34px; position:relative; z-index:1;}
  .hero h1{color:#ffffff; font-family:Georgia, 'Times New Roman', serif; font-weight:700; font-size:38px; line-height:1.35; margin-bottom:18px; position:relative; z-index:1;}
  .hero h1 em{font-style:italic; font-family:'Brush Script MT','Segoe Script',cursive; font-weight:400; font-size:44px;}
  .hero p{color:rgba(255,255,255,0.92); font-size:15.5px; line-height:1.6; max-width:560px; margin:0 auto 40px auto; position:relative; z-index:1;}
  .cta{display:inline-flex; align-items:center; gap:14px; background:linear-gradient(90deg,#f186ad,#e0407a); padding:8px 10px 8px 8px; border-radius:40px; box-shadow:0 14px 30px rgba(120,10,55,0.4); cursor:pointer; text-decoration:none; position:relative; z-index:1;}
  .cta .icon-circle{width:42px; height:42px; border-radius:50%; background:rgba(255,255,255,0.25); display:flex; align-items:center; justify-content:center; color:#fff; flex-shrink:0;}
  .cta .label{color:#fff; font-weight:700; font-size:15.5px; padding-right:6px;}
  .cta .chevron{width:26px; height:26px; border-radius:50%; background:rgba(255,255,255,0.25); display:flex; align-items:center; justify-content:center; color:#fff; margin-right:8px; flex-shrink:0;}

  /* FADE + ABOUT */
  .fade-banner{height:90px; background:linear-gradient(180deg, #c72868 0%, #f7bcd2 55%, #ffffff 100%);}
  .about{display:grid; grid-template-columns:0.95fr 1.05fr; gap:50px; padding:30px 56px 90px 56px; align-items:start;}
  .media{position:relative;}
  .photo-top{width:78%; aspect-ratio:4/3; border-radius:14px; background:linear-gradient(135deg,#e9c9a3,#c98f5b); position:relative; overflow:hidden; box-shadow:0 14px 30px rgba(0,0,0,0.18);}
  .photo-top .box{position:absolute; bottom:14%; left:50%; transform:translateX(-50%); width:58%; background:#c9995f; border-radius:4px; padding:10px 8px; text-align:center; box-shadow:0 8px 16px rgba(0,0,0,0.2);}
  .photo-top .box .heart{font-size:14px;}
  .photo-top .box .label{background:#fff; color:var(--pink-deep); font-weight:800; font-size:11px; letter-spacing:1px; border-radius:3px; padding:3px 6px; margin-top:4px;}
  .photo-top .items{position:absolute; top:10%; left:50%; transform:translateX(-50%); display:flex; gap:6px;}
  .photo-top .items div{width:16px; border-radius:3px;}
  .photo-bottom{width:78%; aspect-ratio:4/3; border-radius:14px; background:linear-gradient(135deg,#2b2b3d,#15151f); position:absolute; right:0; bottom:-60px; overflow:hidden; box-shadow:0 18px 34px rgba(0,0,0,0.3);}
  .laptop-screen{position:absolute; top:8%; left:8%; right:8%; bottom:22%; background:#f4f2f8; border-radius:6px; padding:8px;}
  .laptop-screen .bar{height:5px; background:#e6def5; border-radius:3px; margin-bottom:5px; width:60%;}
  .laptop-chart{margin-top:8px; height:40%;}
  .laptop-base{position:absolute; bottom:0; left:0; right:0; height:22%; background:#3a3a4a;}
  .play-badge{position:absolute; left:50%; top:62%; transform:translate(-50%,-50%); width:120px; height:120px; z-index:3;}
  .play-badge svg{width:100%; height:100%;}
  .play-badge .circle{fill:var(--purple); filter:drop-shadow(0 10px 18px rgba(107,84,200,0.45));}
  .play-badge .play-icon{fill:#ffffff;}
  .curved-text{font-size:8.4px; font-weight:800; fill:#ffffff; letter-spacing:1.5px;}
  .content{padding-top:20px;}
  .kicker{display:flex; align-items:center; gap:8px; color:var(--ink); font-size:15px; font-weight:700; margin-bottom:16px; justify-content:flex-end; text-align:right;}
  .kicker .dot{width:8px; height:8px; border-radius:50%; background:var(--purple);}
  .kicker em{font-style:italic; font-family:Georgia, serif;}
  .content h2{font-family:'Trebuchet MS', 'Segoe UI', sans-serif; font-size:26px; font-weight:800; color:var(--ink); line-height:1.4; text-align:right; margin-bottom:20px;}
  .content p{font-size:13.5px; line-height:1.7; color:var(--muted); margin-bottom:16px;}
  .btn-donate{display:inline-flex; align-items:center; gap:12px; background:linear-gradient(90deg,#9f8de0,var(--purple-dark)); color:#fff; font-weight:800; font-size:14px; padding:13px 22px; border-radius:30px; text-decoration:none; box-shadow:0 12px 24px rgba(107,84,200,0.4); margin-top:14px;}

  @media (max-width:900px){
    .about{grid-template-columns:1fr; padding:30px 28px 60px 28px;}
    .media{height:420px; margin-bottom:70px;}
    .kicker, .content h2{text-align:left; justify-content:flex-start;}
  }
  @media (max-width:820px){
    .nav-links{position:absolute; top:74px; left:0; right:0; background:#ffe7ef; flex-direction:column; gap:0; display:none; z-index:5;}
    .nav-links.open{display:flex;}
    .nav-links li{width:100%; text-align:center;}
    .nav-links a{display:block; padding:16px 0;}
    .menu-toggle{display:flex;}
    .hero h1{font-size:28px;}
    .hero h1 em{font-size:32px;}
  }
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- HERO -->
<section class="hero" id="home">
    <span class="badge">Sistem Terima Donasi Dan Kelola Donatur</span>
    <h1>Kelola Donasi dengan Lebih Mudah<br>Bersama <em>Mirae</em></h1>
    <p>Sederhanakan pengelolaan donatur, transaksi donasi, dan pelaporan dalam satu dashboard yang cepat, aman, dan transparan.</p>

    <a href="<?= site_url('donate') ?>" class="cta">
        <span class="icon-circle">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="8 7 17 7 17 16"/></svg>
        </span>
        <span class="label">Daftar Sekarang</span>
        <span class="chevron">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 6 15 12 9 18"/></svg>
        </span>
    </a>
</section>

<div class="fade-banner"></div>

<!-- ABOUT -->
<section class="about" id="about">
    <div class="media">
        <div class="photo-top">
            <div class="items">
                <div style="height:34px;background:#4f7cc9;"></div>
                <div style="height:26px;background:#e8e2d3;"></div>
                <div style="height:30px;background:#8f8f92;"></div>
            </div>
            <div class="box">
                <span class="heart">🤍</span>
                <div class="label">DONASI</div>
            </div>
        </div>

        <div class="photo-bottom">
            <div class="laptop-screen">
                <div class="bar"></div>
                <div class="bar" style="width:40%;"></div>
                <svg class="laptop-chart" viewBox="0 0 100 30" preserveAspectRatio="none">
                    <polyline points="0,25 15,18 30,22 45,10 60,15 75,5 90,12 100,8" fill="none" stroke="#8b7cd6" stroke-width="2"/>
                </svg>
            </div>
            <div class="laptop-base"></div>
        </div>

        <div class="play-badge">
            <svg viewBox="0 0 120 120">
                <defs><path id="curve" d="M 15,60 A 45,45 0 1,1 105,60" fill="none"/></defs>
                <circle class="circle" cx="60" cy="60" r="45"/>
                <polygon class="play-icon" points="52,45 52,75 78,60"/>
                <text class="curved-text"><textPath href="#curve" startOffset="2%">KELOLA DONASI UNTUK KEBAIKAN</textPath></text>
            </svg>
        </div>
    </div>

    <div class="content">
        <p class="kicker"><span class="dot"></span> About <em>Mirae</em></p>
        <h2>Dedicated to Making Every Donation More Meaningful</h2>

        <p>MIRAE adalah platform pengelolaan donasi yang dirancang untuk membantu organisasi, komunitas, dan yayasan dalam mengelola donatur serta donasi secara lebih mudah, aman, dan transparan. Melalui sistem yang terintegrasi, setiap proses mulai dari pencatatan donasi, pengelolaan data donatur, hingga pelaporan dapat dilakukan secara efisien dalam satu dashboard.</p>

        <p>Kami percaya bahwa transparansi dan akuntabilitas merupakan fondasi utama dalam membangun kepercayaan. Oleh karena itu, MIRAE menghadirkan solusi digital yang mendukung pengelolaan donasi secara profesional, sehingga setiap kontribusi dapat dipantau dengan jelas dan memberikan dampak nyata bagi masyarakat.</p>

        <a href="<?= site_url('donate') ?>" class="btn-donate">
            Donate Sekarang
            <span class="arrow">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </span>
        </a>
    </div>
</section>

<?= $this->endSection() ?>
