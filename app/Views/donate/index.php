<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
 .listing{
    background:linear-gradient(180deg,#ffe0ea 0%,#f78bb0 35%,#e0407a 75%,#c72868 100%);
    padding:60px 50px 80px;
    text-align:center;
}

.listing h1{
    font-family:Georgia,'Times New Roman',serif;
    font-size:38px;
    font-weight:700;
    color:#2c2c2c;
    margin-bottom:10px;
}

.listing h1 span{
    color:#8b6ad9;
}

.listing .subtitle{
    font-size:15px;
    color:#5c4550;
    margin-bottom:35px;
}

.filter-row{
    display:flex;
    justify-content:flex-end;
    max-width:1200px;
    margin:0 auto 25px;
}

.filter-btn{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:10px 20px;
    border:none;
    border-radius:25px;
    background:linear-gradient(90deg,#f38fb6,#8c7bda);
    color:#fff;
    font-size:14px;
    font-weight:600;
    cursor:pointer;
}

.cards{
    max-width:1200px;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:28px;
}

.card{
    background:#fff;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.15);

    display:flex;
    flex-direction:column;

    height:100%;
}

.card:hover{
    transform:translateY(-8px);
}

.card-img{
    position:relative;
    width:100%;
    height:240px;
    overflow:hidden;
}

.card-img img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
}

.progress-pill{
    position:absolute;
    left:0;
    right:0;
    bottom:0;
    background:#fff;
    padding:10px 15px;
    font-size:13px;
    font-weight:600;
    color:#444;
    border-top:4px solid #9c7de4;
}

.progress-percent{
    position:absolute;
    right:15px;
    bottom:12px;
    background:#7fd0ff;
    color:#fff;
    font-size:12px;
    font-weight:bold;
    padding:3px 10px;
    border-radius:20px;
}

.card-body{
    padding:22px;

    display:flex;
    flex-direction:column;

    flex:1;
}

.card-body h3{

    font-size:18px;
    font-weight:700;

    line-height:1.4;

    min-height:100px;

    display:flex;
    justify-content:center;
    align-items:center;

    text-align:center;

    margin-bottom:8px;
}

.tag-category{
    display:block;
    color:#1ba3ff;
    font-size:24px;
    font-weight:600;
    margin-bottom:18px;
}

.card-body .desc{
    color:#666;
    font-size:15px;
    line-height:1.7;
    min-height:70px;
    margin-bottom:22px;
}

.meta-row{

    display:flex;

    justify-content:space-between;

    margin-top:auto;

    margin-bottom:18px;
}

.meta-row span{
    display:flex;
    align-items:center;
    gap:6px;
}

.btn-donasi{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    padding:12px 28px;
    border-radius:12px;
    background:linear-gradient(90deg,#9f8de0,#8367db);
    color:#fff;
    text-decoration:none;
    font-weight:600;
    transition:.3s;
}

.btn-donasi:hover{
    opacity:.9;
    transform:scale(1.03);
}

@media(max-width:1100px){

    .cards{
        grid-template-columns:repeat(2,1fr);
    }

}

@media(max-width:768px){

    .listing{
        padding:40px 20px;
    }

    .cards{
        grid-template-columns:1fr;
    }

    .card-img{
        height:220px;
    }

    .card-body h3{
        font-size:24px;
    }

    .tag-category{
        font-size:18px;
    }

}
.filter-row{
    display:flex;
    justify-content:flex-end;
    max-width:1200px;
    margin:0 auto 35px;
}

.filter-dropdown{
    position:relative;
}

.filter-btn{

    display:flex;
    align-items:center;
    gap:10px;

    padding:14px 22px;

    border:none;
    outline:none;

    border-radius:50px;

    background:linear-gradient(135deg,#f58fb4,#8d7be6);

    color:#fff;

    font-size:15px;
    font-weight:600;

    cursor:pointer;

    transition:.3s;

    box-shadow:0 12px 25px rgba(143,90,205,.30);
}

.filter-btn:hover{

    transform:translateY(-2px);

    box-shadow:0 18px 35px rgba(143,90,205,.45);

}

.filter-btn i:last-child{

    transition:.3s;

}

.filter-dropdown:hover .filter-btn i:last-child{

    transform:rotate(180deg);

}

.filter-menu{

    position:absolute;

    right:0;
    top:115%;

    width:270px;

    background:rgba(255,255,255,.96);

    backdrop-filter:blur(14px);

    border-radius:18px;

    overflow:hidden;

    box-shadow:0 20px 45px rgba(0,0,0,.18);

    opacity:0;
    visibility:hidden;

    transform:translateY(15px);

    transition:.25s;

    z-index:999;

}

.filter-dropdown:hover .filter-menu{

    opacity:1;

    visibility:visible;

    transform:translateY(0);

}

.filter-menu a{

    display:flex;

    align-items:center;

    gap:12px;

    padding:16px 20px;

    text-decoration:none;

    color:#555;

    font-size:15px;

    transition:.25s;

}

.filter-menu a:not(:last-child){

    border-bottom:1px solid #f2f2f2;

}

.filter-menu a:hover{

    background:#f7f4ff;

    color:#8b67df;

    padding-left:28px;

}

.filter-menu a.active{

    background:linear-gradient(90deg,#f58fb4,#8b6bdf);

    color:#fff;

    font-weight:700;

}

.filter-menu a.active:hover{

    padding-left:20px;

}
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="listing">
    <h1>Program Donasi <span>Terbaru</span></h1>
    <p class="subtitle">Mari bersama wujudkan kebaikan untuk yang membutuhkan</p>

    <div class="filter-row">
       <div class="filter-dropdown">

        <button class="filter-btn">
            <i class="fa-solid fa-filter"></i>
            Filter Program
            <i class="fa-solid fa-chevron-down"></i>
        </button>

        <div class="filter-menu">

            <a href="<?= site_url('donate') ?>"
               class="<?= empty($selectedCategory) ? 'active' : '' ?>">
                🌍 Semua Program
            </a>

            <a href="<?= site_url('donate?category=Medis') ?>"
               class="<?= ($selectedCategory=='Medis')?'active':'' ?>">
                🏥 Donasi Kesehatan
            </a>

            <a href="<?= site_url('donate?category=Pendidikan') ?>"
               class="<?= ($selectedCategory=='Pendidikan')?'active':'' ?>">
                📚 Donasi Pendidikan
            </a>

            <a href="<?= site_url('donate?category=Bencana') ?>"
               class="<?= ($selectedCategory=='Bencana')?'active':'' ?>">
                🌊 Bencana Alam
            </a>

            <a href="<?= site_url('donate?category=Panti Asuhan') ?>"
               class="<?= ($selectedCategory=='Panti Asuhan')?'active':'' ?>">
                🏡 Panti Asuhan
            </a>

        </div>

    </div>

    </div>

    <div class="cards">
      <?php if (empty($programs)): ?>
        <p style="color:#fff;">Belum ada program donasi aktif saat ini.</p>
      <?php endif; ?>

      <?php foreach ($programs as $program): ?>
        <div class="card">
          <div class="card-img">
            <img src="<?= base_url('uploads/programs/' . $program['image']) ?>"
         alt="<?= esc($program['title']) ?>">
            <div class="progress-pill">
                <strong>
            Rp<?= number_format($program['collected_amount'],0,',','.') ?>
        </strong>
        terkumpul dari
        <strong>
            Rp<?= number_format($program['target_amount'],0,',','.') ?>
        </strong>
            </div>
                <div class="progress-percent">
        <?= $program['progress'] ?>%
    </div>
          </div>
          <div class="card-body">
            <h3><?= esc($program['title']) ?></h3>
            <span class="tag-category"><?= esc($program['category']) ?></span>
            <p class="desc"><?= esc($program['description']) ?></p>
            <div class="meta-row">
              <span>👥 <?= (int) $program['donor_count'] ?> Donatur</span>
              <span>🗓 <?= (int) $program['days_left'] ?> Hari lagi</span>
            </div>
            <a href="<?= site_url('donate/checkout/' . $program['id']) ?>" class="btn-donasi">Donasi Sekarang →</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
</section>

<?= $this->endSection() ?>
