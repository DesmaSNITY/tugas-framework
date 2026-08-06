<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>

.success-page{
    min-height:650px;
    padding:65px 35px 80px;
    background:
        radial-gradient(
            circle at top left,
            rgba(255,255,255,.18),
            transparent 32%
        ),
        linear-gradient(
            180deg,
            #e0407a 0%,
            #f299bc 55%,
            #ffd6e6 100%
        );
}

.success-card{
    width:100%;
    max-width:620px;
    margin:0 auto;
    overflow:hidden;
    border:1px solid rgba(255,255,255,.55);
    border-radius:24px;
    background:#ffffff;
    box-shadow:0 25px 60px rgba(120,10,55,.28);
}

.success-header{
    position:relative;
    padding:42px 35px 38px;
    overflow:hidden;
    color:#ffffff;
    text-align:center;
    background:
        linear-gradient(
            135deg,
            #8e79da,
            #df4b84
        );
}

.success-header::before,
.success-header::after{
    content:"";
    position:absolute;
    border-radius:50%;
    background:rgba(255,255,255,.1);
}

.success-header::before{
    width:180px;
    height:180px;
    top:-95px;
    left:-65px;
}

.success-header::after{
    width:220px;
    height:220px;
    right:-105px;
    bottom:-125px;
}

.success-icon{
    position:relative;
    z-index:1;
    display:flex;
    align-items:center;
    justify-content:center;
    width:82px;
    height:82px;
    margin:0 auto 18px;
    border:6px solid rgba(255,255,255,.25);
    border-radius:50%;
    color:#ffffff;
    background:rgba(255,255,255,.18);
    box-shadow:0 15px 30px rgba(66,36,101,.25);
    font-size:37px;
}

.success-header h1{
    position:relative;
    z-index:1;
    margin-bottom:9px;
    font-size:26px;
    line-height:1.35;
}

.success-header p{
    position:relative;
    z-index:1;
    max-width:450px;
    margin:0 auto;
    color:rgba(255,255,255,.92);
    font-size:13px;
    line-height:1.65;
}

.success-content{
    padding:30px 34px 34px;
}

.success-message{
    margin-bottom:25px;
    color:#705d67;
    font-size:13px;
    line-height:1.75;
    text-align:center;
}

.success-message strong{
    color:#df3977;
}

.success-program{
    display:flex;
    align-items:center;
    gap:14px;
    margin-bottom:22px;
    padding:14px;
    border:1px solid #eee4e9;
    border-radius:14px;
    background:#fcf9fb;
}

.success-program-image{
    display:flex;
    align-items:center;
    justify-content:center;
    width:82px;
    height:70px;
    flex-shrink:0;
    overflow:hidden;
    border-radius:11px;
    color:#ffffff;
    background:
        linear-gradient(
            135deg,
            #f1afc2,
            #927edb
        );
    font-size:24px;
}

.success-program-image img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.success-program-info{
    min-width:0;
}

.success-program-info h2{
    display:-webkit-box;
    margin-bottom:5px;
    overflow:hidden;
    color:#32212b;
    font-size:14px;
    line-height:1.45;
    -webkit-box-orient:vertical;
    -webkit-line-clamp:2;
}

.success-program-info p{
    color:#85717b;
    font-size:11px;
}

.success-category{
    display:inline-flex;
    margin-top:7px;
    padding:4px 9px;
    border-radius:20px;
    color:#654faf;
    background:#eee9fb;
    font-size:9.5px;
    font-weight:750;
}

.success-details{
    overflow:hidden;
    margin-bottom:25px;
    border:1px solid #eee4e9;
    border-radius:14px;
}

.success-detail-row{
    display:flex;
    align-items:flex-start;
    justify-content:space-between;
    gap:18px;
    padding:13px 15px;
    border-bottom:1px solid #f1e9ed;
    color:#7a6670;
    font-size:12px;
}

.success-detail-row:last-child{
    border-bottom:0;
}

.success-detail-row strong{
    max-width:60%;
    color:#382630;
    text-align:right;
    overflow-wrap:anywhere;
}

.success-detail-row .success-amount{
    color:#df3977;
    font-size:15px;
}

.success-status{
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:5px 10px;
    border-radius:20px;
    color:#237044;
    background:#e7f8ed;
    font-size:10px;
    font-weight:800;
    text-transform:capitalize;
}

.success-actions{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:12px;
}

.success-button{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    min-height:47px;
    padding:12px 18px;
    border-radius:11px;
    font-size:13px;
    font-weight:800;
    text-decoration:none;
    transition:
        transform .2s ease,
        box-shadow .2s ease;
}

.success-button:hover{
    transform:translateY(-2px);
}

.success-button-primary{
    color:#ffffff !important;
    background:
        linear-gradient(
            90deg,
            #9f8de0,
            #7057c1
        );
    box-shadow:0 11px 22px rgba(107,84,200,.3);
}

.success-button-secondary{
    border:1px solid #e5d9df;
    color:#654f5a !important;
    background:#ffffff;
}

@media(max-width:600px){
    .success-page{
        padding:35px 18px 60px;
    }

    .success-header{
        padding:35px 22px 31px;
    }

    .success-header h1{
        font-size:22px;
    }

    .success-content{
        padding:25px 20px 27px;
    }

    .success-program{
        align-items:flex-start;
    }

    .success-detail-row{
        flex-direction:column;
        gap:5px;
    }

    .success-detail-row strong{
        max-width:100%;
        text-align:left;
    }

    .success-actions{
        grid-template-columns:1fr;
    }
}

<?= $this->endSection() ?>


<?= $this->section('content') ?>

<?php

$donation  = $donation ?? [];
$program   = $program ?? [];
$donorName = trim((string) ($donorName ?? ''));

if ($donorName === '') {
    $donorName = 'Donatur';
}
$transactionId = max(
    0,
    (int) ($donation['id'] ?? 0)
);

$amount = max(
    0,
    (int) ($donation['amount'] ?? 0)
);

$paymentMethod = trim(
    (string) ($donation['payment_method'] ?? '')
);

if ($paymentMethod === '') {
    $paymentMethod = '-';
}

$status = strtolower(
    trim((string) ($donation['status'] ?? 'success'))
);

$programTitle = trim(
    (string) ($program['title'] ?? '')
);

if ($programTitle === '') {
    $programTitle = 'Program donasi';
}

$foundationName = trim(
    (string) ($program['foundation_name'] ?? '')
);

if ($foundationName === '') {
    $foundationName = 'Yayasan belum tersedia';
}

$category = trim(
    (string) ($program['category'] ?? '')
);

if ($category === '') {
    $category = 'Umum';
}

$pictureUrl = trim(
    (string) ($program['picture_url'] ?? '')
);

$transactionDate = '-';

if (! empty($donation['updated_at'])) {
    $timestamp = strtotime(
        (string) $donation['updated_at']
    );

    if ($timestamp !== false) {
        $transactionDate = date(
            'd M Y, H:i',
            $timestamp
        );
    }
} elseif (! empty($donation['created_at'])) {
    $timestamp = strtotime(
        (string) $donation['created_at']
    );

    if ($timestamp !== false) {
        $transactionDate = date(
            'd M Y, H:i',
            $timestamp
        );
    }
}

$transactionCode = 'MIRAE-'
    . str_pad(
        (string) $transactionId,
        6,
        '0',
        STR_PAD_LEFT
    );

?>

<section class="success-page">

    <div class="success-card">

        <header class="success-header">

            <div class="success-icon">
                <i class="fa-solid fa-check"></i>
            </div>

            <h1>
                Donasi Berhasil!
            </h1>

            <p>
                Terima kasih, <?= esc($donorName) ?>.
                Pembayaran dan donasi Anda telah berhasil
                diproses.
            </p>

        </header>

        <div class="success-content">

            <p class="success-message">
                Donasi sebesar
                <strong>
                    Rp<?= number_format(
                        $amount,
                        0,
                        ',',
                        '.'
                    ) ?>
                </strong>
                telah disalurkan ke program yang dipilih.
                Semoga kontribusi ini memberikan manfaat
                bagi mereka yang membutuhkan.
            </p>

            <div class="success-program">

                <div class="success-program-image">

                    <?php if ($pictureUrl !== ''): ?>

                        <img
                            src="<?= esc($pictureUrl, 'attr') ?>"
                            alt="<?= esc(
                                $programTitle,
                                'attr'
                            ) ?>"
                        >

                    <?php else: ?>

                        <i class="fa-solid fa-hand-holding-heart"></i>

                    <?php endif; ?>

                </div>

                <div class="success-program-info">

                    <h2>
                        <?= esc($programTitle) ?>
                    </h2>

                    <p>
                        oleh <?= esc($foundationName) ?>
                    </p>

                    <span class="success-category">
                        <?= esc($category) ?>
                    </span>

                </div>

            </div>

            <div class="success-details">

                <div class="success-detail-row">
                    <span>Kode transaksi</span>

                    <strong>
                        <?= esc($transactionCode) ?>
                    </strong>
                </div>

                <div class="success-detail-row">
                    <span>Nama donatur</span>

                    <strong>
                        <?= esc($donorName) ?>
                    </strong>
                </div>

                <div class="success-detail-row">
                    <span>Metode pembayaran</span>

                    <strong>
                        <?= esc($paymentMethod) ?>
                    </strong>
                </div>

                <div class="success-detail-row">
                    <span>Waktu pembayaran</span>

                    <strong>
                        <?= esc($transactionDate) ?>
                    </strong>
                </div>

                <div class="success-detail-row">
                    <span>Status transaksi</span>

                    <strong>
                        <span class="success-status">
                            <i class="fa-solid fa-circle-check"></i>
                            <?= esc($status) ?>
                        </span>
                    </strong>
                </div>

                <div class="success-detail-row">
                    <span>Total donasi</span>

                    <strong class="success-amount">
                        Rp<?= number_format(
                            $amount,
                            0,
                            ',',
                            '.'
                        ) ?>
                    </strong>
                </div>

            </div>

            <div class="success-actions">

                <a
                    href="<?= site_url('donate/history') ?>"
                    class="success-button success-button-secondary"
                >
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    Lihat Donasi Saya
                </a>

                <a
                    href="<?= site_url('donate') ?>"
                    class="success-button success-button-primary"
                >
                    Lihat Program Lain
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>

        </div>

    </div>

</section>

<?= $this->endSection() ?>