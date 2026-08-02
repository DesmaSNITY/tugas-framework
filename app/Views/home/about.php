<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
  .fade-banner{height:110px; background:linear-gradient(180deg, #ee5a94 0%, #f7bcd2 55%, #ffffff 100%);}
  .about{max-width:1200px; margin:0 auto; display:grid; grid-template-columns:0.95fr 1.05fr; gap:50px; padding:50px 56px 80px 56px; align-items:start;}
  .media{position:relative;}
  .photo-top{width:78%; aspect-ratio:4/3; border-radius:14px; background:linear-gradient(135deg,#e9c9a3,#c98f5b); position:relative; overflow:hidden; box-shadow:0 14px 30px rgba(0,0,0,0.18);}
  .photo-top .box{position:absolute; bottom:14%; left:50%; transform:translateX(-50%); width:58%; background:#c9995f; border-radius:4px; padding:10px 8px; text-align:center; box-shadow:0 8px 16px rgba(0,0,0,0.2);}
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
  .content{padding-top:6px;}
  .kicker{display:flex; align-items:center; gap:8px; color:var(--ink); font-size:15px; font-weight:700; margin-bottom:16px; justify-content:flex-end; text-align:right;}
  .kicker .dot{width:8px; height:8px; border-radius:50%; background:var(--purple);}
  .kicker em{font-style:italic; font-family:Georgia, serif;}
  .content h1{font-family:'Trebuchet MS', 'Segoe UI', sans-serif; font-size:26px; font-weight:800; color:var(--ink); line-height:1.4; text-align:right; margin-bottom:20px;}
  .content p{font-size:13.5px; line-height:1.7; color:var(--muted); margin-bottom:16px;}
  .btn-donate{display:inline-flex; align-items:center; gap:12px; background:linear-gradient(90deg,#9f8de0,var(--purple-dark)); color:#fff; font-weight:800; font-size:14px; padding:13px 22px; border-radius:30px; text-decoration:none; box-shadow:0 12px 24px rgba(107,84,200,0.4); margin-top:14px;}
  @media (max-width:900px){
    .about{grid-template-columns:1fr; padding:40px 28px 60px 28px;}
    .media{height:420px; margin-bottom:70px;}
    .kicker, .content h1{text-align:left; justify-content:flex-start;}
  }
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="fade-banner"></div>

<section class="about">
    <div class="media">
        <div class="photo-top">
            <div class="items">
                <div style="height:34px;background:#4f7cc9;"></div>
                <div style="height:26px;background:#e8e2d3;"></div>
                <div style="height:30px;background:#8f8f92;"></div>
            </div>
            <div class="box"><span>🤍</span><div class="label">DONASI</div></div>
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
                <defs><path id="curve2" d="M 15,60 A 45,45 0 1,1 105,60" fill="none"/></defs>
                <circle class="circle" cx="60" cy="60" r="45"/>
                <polygon class="play-icon" points="52,45 52,75 78,60"/>
                <text class="curved-text"><textPath href="#curve2" startOffset="2%">KELOLA DONASI UNTUK KEBAIKAN</textPath></text>
            </svg>
        </div>
    </div>

    <div class="content">
        <p class="kicker"><span class="dot"></span> About <em>Mirae</em></p>
        <h1>Dedicated to Making Every Donation More Meaningful</h1>
        <p>MIRAE adalah platform pengelolaan donasi yang dirancang untuk membantu organisasi, komunitas, dan yayasan dalam mengelola donatur serta donasi secara lebih mudah, aman, dan transparan.</p>
        <p>Kami percaya bahwa transparansi dan akuntabilitas merupakan fondasi utama dalam membangun kepercayaan.</p>
        <a href="<?= site_url('donate') ?>" class="btn-donate">Donate Sekarang</a>
    </div>
</section>

<?= $this->endSection() ?>
