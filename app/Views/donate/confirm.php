<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>

.payment-page{
    min-height:650px;
    padding:42px 48px 75px;
    background:linear-gradient(
        180deg,
        #e0407a 0%,
        #f299bc 55%,
        #ffd6e6 100%
    );
}

.payment-wrap{
    max-width:1120px;
    margin:0 auto;
}

.payment-grid{
    display:grid;
    grid-template-columns:minmax(0,1.55fr) minmax(290px,1fr);
    gap:24px;
    align-items:start;
}

.payment-card,
.payment-summary{
    background:#fff;
    border-radius:18px;
    box-shadow:0 20px 45px rgba(120,10,55,.25);
}

.payment-card{
    padding:28px 30px 34px;
}

.payment-summary{
    position:sticky;
    top:110px;
    padding:24px;
}

/* Langkah */

.payment-steps{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:18px;
    margin-bottom:26px;
    padding-bottom:21px;
    border-bottom:1px solid #eee4e9;
}

.payment-step{
    display:flex;
    align-items:center;
    gap:10px;
    opacity:.5;
}

.payment-step.done,
.payment-step.active{
    opacity:1;
}

.payment-step-number{
    display:flex;
    align-items:center;
    justify-content:center;
    width:29px;
    height:29px;
    flex-shrink:0;
    border-radius:50%;
    color:#7258c4;
    background:#ebe6f8;
    font-size:12px;
    font-weight:800;
}

.payment-step.done .payment-step-number{
    color:#fff;
    background:#4caf78;
}

.payment-step.active .payment-step-number{
    color:#fff;
    background:linear-gradient(135deg,#9b87df,#7057c1);
}

.payment-step-title{
    color:#2e1c28;
    font-size:13px;
    font-weight:800;
}

.payment-step-desc{
    margin-top:2px;
    color:#85727c;
    font-size:10px;
}

/* Timer */

.payment-timer{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:15px;
    margin-bottom:24px;
    padding:16px 18px;
    border:1px solid #f0c8d7;
    border-radius:13px;
    background:#fff4f8;
}

.payment-timer-info{
    display:flex;
    align-items:center;
    gap:11px;
}

.payment-timer-info i{
    color:#df3977;
    font-size:21px;
}

.payment-timer-info strong{
    display:block;
    margin-bottom:3px;
    color:#3a2631;
    font-size:13px;
}

.payment-timer-info span{
    color:#866f7a;
    font-size:10.5px;
}

.payment-countdown{
    min-width:100px;
    color:#df3977;
    font-size:24px;
    font-weight:900;
    text-align:right;
    font-variant-numeric:tabular-nums;
}

/* Alert */

.payment-alert{
    margin-bottom:20px;
    padding:14px 17px;
    border:1px solid #f1bbc5;
    border-radius:11px;
    color:#982a3b;
    background:#fff0f3;
    font-size:12.5px;
    line-height:1.6;
}

.payment-alert ul{
    padding-left:18px;
}

/* Metode pembayaran */

.payment-title{
    display:flex;
    align-items:center;
    gap:9px;
    margin-bottom:17px;
    color:#2c1926;
    font-size:16px;
    font-weight:800;
}

.payment-title i{
    color:#df3977;
}

.payment-methods{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:12px;
    margin-bottom:24px;
}

.payment-method{
    position:relative;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-direction:column;
    gap:8px;
    min-height:90px;
    padding:13px 10px;
    border:1px solid #e4dae0;
    border-radius:12px;
    color:#69545f;
    background:#fff;
    font-size:11.5px;
    font-weight:750;
    text-align:center;
    cursor:pointer;
    transition:.2s;
}

.payment-method input{
    position:absolute;
    opacity:0;
    pointer-events:none;
}

.payment-method i{
    color:#8068d2;
    font-size:23px;
}

.payment-method:hover{
    border-color:#8068d2;
    transform:translateY(-2px);
}

.payment-method.selected,
.payment-method:has(input:checked){
    border-color:#8068d2;
    color:#fff;
    background:linear-gradient(135deg,#9985df,#7057c1);
    box-shadow:0 10px 20px rgba(112,87,193,.25);
}

.payment-method.selected i,
.payment-method:has(input:checked) i{
    color:#fff;
}

.payment-note{
    display:flex;
    align-items:flex-start;
    gap:10px;
    margin-bottom:22px;
    padding:13px;
    border-radius:11px;
    color:#745f69;
    background:#faf6f8;
    font-size:11px;
    line-height:1.55;
}

.payment-note i{
    margin-top:2px;
    color:#38a86b;
}

.payment-button{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:9px;
    width:100%;
    min-height:49px;
    padding:13px;
    border:0;
    border-radius:11px;
    color:#fff;
    background:linear-gradient(90deg,#9f8de0,#7057c1);
    box-shadow:0 12px 24px rgba(107,84,200,.38);
    font-size:14px;
    font-weight:800;
    cursor:pointer;
    transition:.2s;
}

.payment-button:hover:not(:disabled){
    transform:translateY(-2px);
    box-shadow:0 16px 28px rgba(107,84,200,.45);
}

.payment-button:disabled{
    opacity:.6;
    cursor:not-allowed;
}

/* Ringkasan */

.payment-summary h3{
    margin-bottom:17px;
    color:#2d1b27;
    font-size:15px;
}

.payment-program{
    display:flex;
    gap:13px;
}

.payment-program-image{
    display:flex;
    align-items:center;
    justify-content:center;
    width:84px;
    height:72px;
    flex-shrink:0;
    overflow:hidden;
    border-radius:10px;
    color:#fff;
    background:linear-gradient(135deg,#f1afc2,#927edb);
}

.payment-program-image img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.payment-program-info{
    min-width:0;
}

.payment-program-info h4{
    display:-webkit-box;
    margin-bottom:5px;
    overflow:hidden;
    color:#2d1b27;
    font-size:13px;
    line-height:1.4;
    -webkit-box-orient:vertical;
    -webkit-line-clamp:2;
}

.payment-program-info p{
    color:#806b76;
    font-size:10.5px;
}

.payment-category{
    display:inline-flex;
    margin-top:7px;
    padding:4px 9px;
    border-radius:20px;
    color:#644fae;
    background:#eee9fb;
    font-size:9.5px;
    font-weight:750;
}

.summary-divider{
    height:1px;
    margin:18px 0;
    background:#eee4e9;
}

.summary-row{
    display:flex;
    justify-content:space-between;
    gap:15px;
    margin-bottom:12px;
    color:#74606a;
    font-size:11.5px;
}

.summary-row strong{
    max-width:60%;
    color:#35242e;
    text-align:right;
    overflow-wrap:anywhere;
}

.summary-total{
    display:flex;
    justify-content:space-between;
    gap:15px;
    margin-top:15px;
    padding-top:15px;
    border-top:1px solid #eee4e9;
    color:#2f1d28;
    font-size:14px;
    font-weight:850;
}

.summary-total strong{
    color:#df3977;
}

.status-pending{
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:5px 10px;
    border-radius:20px;
    color:#9b6714;
    background:#fff2d6;
    font-size:10px;
    font-weight:800;
    text-transform:capitalize;
}

@media(max-width:900px){
    .payment-grid{
        grid-template-columns:1fr;
    }

    .payment-summary{
        position:static;
    }
}

@media(max-width:700px){
    .payment-page{
        padding:30px 18px 60px;
    }

    .payment-card{
        padding:22px 19px 27px;
    }

    .payment-steps,
    .payment-methods{
        grid-template-columns:1fr;
    }

    .payment-timer{
        align-items:flex-start;
        flex-direction:column;
    }

    .payment-countdown{
        text-align:left;
    }
}

<?= $this->endSection() ?>


<?= $this->section('content') ?>

<?php

$donation  = $donation ?? [];
$program   = $program ?? [];
$donorName = $donorName ?? 'Pengguna';
$donorEmail = $donorEmail ?? '-';
$expiresAt = $expiresAt ?? '';

$errors = session()->getFlashdata('errors') ?? [];
$error  = session()->getFlashdata('error');

$amount = max(
    0,
    (int) ($donation['amount'] ?? 0)
);

$pictureUrl = (string) (
    $program['picture_url'] ?? ''
);

?>

<section class="payment-page">

    <div class="payment-wrap">

        <div class="payment-grid">

            <main class="payment-card">

                <div class="payment-steps">

                    <div class="payment-step done">
                        <div class="payment-step-number">
                            <i class="fa-solid fa-check"></i>
                        </div>

                        <div>
                            <div class="payment-step-title">
                                Isi Donasi
                            </div>

                            <div class="payment-step-desc">
                                Data telah dilengkapi
                            </div>
                        </div>
                    </div>

                    <div class="payment-step done">
                        <div class="payment-step-number">
                            <i class="fa-solid fa-check"></i>
                        </div>

                        <div>
                            <div class="payment-step-title">
                                Konfirmasi
                            </div>

                            <div class="payment-step-desc">
                                Data telah dikonfirmasi
                            </div>
                        </div>
                    </div>

                    <div class="payment-step active">
                        <div class="payment-step-number">3</div>

                        <div>
                            <div class="payment-step-title">
                                Pembayaran
                            </div>

                            <div class="payment-step-desc">
                                Pilih metode pembayaran
                            </div>
                        </div>
                    </div>

                </div>

                <div class="payment-timer">

                    <div class="payment-timer-info">
                        <i class="fa-regular fa-clock"></i>

                        <div>
                            <strong>
                                Selesaikan pembayaran
                            </strong>

                            <span>
                                Transaksi otomatis gagal setelah
                                waktu berakhir.
                            </span>
                        </div>
                    </div>

                    <div
                        class="payment-countdown"
                        id="paymentCountdown"
                    >
                        15:00
                    </div>

                </div>

                <?php if (! empty($error)): ?>
                    <div class="payment-alert">
                        <?= esc($error) ?>
                    </div>
                <?php endif; ?>

                <?php if (! empty($errors)): ?>
                    <div class="payment-alert">
                        <ul>
                            <?php foreach ($errors as $message): ?>
                                <li><?= esc($message) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form
                    id="paymentForm"
                    action="<?= site_url(
                        'donate/pay/'
                        . (int) ($donation['id'] ?? 0)
                    ) ?>"
                    method="post"
                >
                    <?= csrf_field() ?>

                    <div class="payment-title">
                        <i class="fa-solid fa-wallet"></i>
                        Pilih Metode Pembayaran
                    </div>

                    <div class="payment-methods">

                        <label class="payment-method selected">
                            <input
                                type="radio"
                                name="payment_method"
                                value="QRIS"
                                checked
                                required
                            >

                            <i class="fa-solid fa-qrcode"></i>
                            QRIS
                        </label>

                        <label class="payment-method">
                            <input
                                type="radio"
                                name="payment_method"
                                value="BCA"
                            >

                            <i class="fa-solid fa-building-columns"></i>
                            BCA
                        </label>

                        <label class="payment-method">
                            <input
                                type="radio"
                                name="payment_method"
                                value="Mandiri"
                            >

                            <i class="fa-solid fa-building-columns"></i>
                            Mandiri
                        </label>

                        <label class="payment-method">
                            <input
                                type="radio"
                                name="payment_method"
                                value="BNI"
                            >

                            <i class="fa-solid fa-building-columns"></i>
                            BNI
                        </label>

                        <label class="payment-method">
                            <input
                                type="radio"
                                name="payment_method"
                                value="BRI"
                            >

                            <i class="fa-solid fa-building-columns"></i>
                            BRI
                        </label>

                        <label class="payment-method">
                            <input
                                type="radio"
                                name="payment_method"
                                value="GoPay"
                            >

                            <i class="fa-solid fa-mobile-screen-button"></i>
                            GoPay
                        </label>

                    </div>

                    <div class="payment-note">
                        <i class="fa-solid fa-shield-halved"></i>

                        <span>
                            Untuk simulasi sistem, tombol bayar akan
                            mengubah transaksi menjadi berhasil dan
                            menambahkan nominal ke dana program.
                        </span>
                    </div>

                    <button
                        type="submit"
                        class="payment-button"
                        id="paymentButton"
                    >
                        Bayar Rp<?= number_format(
                            $amount,
                            0,
                            ',',
                            '.'
                        ) ?>

                        <i class="fa-solid fa-arrow-right"></i>
                    </button>

                </form>

                <form
                    id="expirePaymentForm"
                    action="<?= site_url(
                        'donate/expire/'
                        . (int) ($donation['id'] ?? 0)
                    ) ?>"
                    method="post"
                    hidden
                >
                    <?= csrf_field() ?>
                </form>

            </main>

            <aside class="payment-summary">

                <h3>Ringkasan Donasi</h3>

                <div class="payment-program">

                    <div class="payment-program-image">

                        <?php if ($pictureUrl !== ''): ?>
                            <img
                                src="<?= esc(
                                    $pictureUrl,
                                    'attr'
                                ) ?>"
                                alt="<?= esc(
                                    $program['title']
                                        ?? 'Program donasi',
                                    'attr'
                                ) ?>"
                            >
                        <?php else: ?>
                            <i class="fa-solid fa-image"></i>
                        <?php endif; ?>

                    </div>

                    <div class="payment-program-info">

                        <h4>
                            <?= esc(
                                $program['title']
                                    ?? 'Program donasi'
                            ) ?>
                        </h4>

                        <p>
                            oleh <?= esc(
                                $program['foundation_name']
                                    ?? 'Yayasan belum tersedia'
                            ) ?>
                        </p>

                        <span class="payment-category">
                            <?= esc(
                                $program['category'] ?? 'Umum'
                            ) ?>
                        </span>

                    </div>

                </div>

                <div class="summary-divider"></div>

                <div class="summary-row">
                    <span>Nama donatur</span>
                    <strong><?= esc($donorName) ?></strong>
                </div>

                <div class="summary-row">
                    <span>Email</span>
                    <strong><?= esc($donorEmail) ?></strong>
                </div>

                <div class="summary-row">
                    <span>Domisili</span>

                    <strong>
                        <?= esc(
                            $donation['donor_city'] ?? '-'
                        ) ?>
                    </strong>
                </div>

                <div class="summary-row">
                    <span>Status</span>

                    <strong>
                        <span class="status-pending">
                            <i class="fa-regular fa-clock"></i>
                            <?= esc(
                                $donation['status']
                                    ?? 'pending'
                            ) ?>
                        </span>
                    </strong>
                </div>

                <div class="summary-row">
                    <span>Pesan</span>

                    <strong>
                        <?= esc(
                            $donation['message'] ?? '-'
                        ) ?>
                    </strong>
                </div>

                <div class="summary-total">
                    <span>Total Donasi</span>

                    <strong>
                        Rp<?= number_format(
                            $amount,
                            0,
                            ',',
                            '.'
                        ) ?>
                    </strong>
                </div>

            </aside>

        </div>

    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const countdownElement = document.getElementById(
        'paymentCountdown'
    );

    const expireForm = document.getElementById(
        'expirePaymentForm'
    );

    const paymentForm = document.getElementById(
        'paymentForm'
    );

    const paymentButton = document.getElementById(
        'paymentButton'
    );

    const expiresAt = Date.parse(
        <?= json_encode($expiresAt) ?>
    );

    let expiredSubmitted = false;

    function updateCountdown() {
        if (
            Number.isNaN(expiresAt)
            || !countdownElement
        ) {
            return;
        }

        const remainingMilliseconds =
            expiresAt - Date.now();

        if (remainingMilliseconds <= 0) {
            countdownElement.textContent = '00:00';

            if (
                !expiredSubmitted
                && expireForm
            ) {
                expiredSubmitted = true;

                if (paymentButton) {
                    paymentButton.disabled = true;
                }

                expireForm.submit();
            }

            return;
        }

        const remainingSeconds = Math.ceil(
            remainingMilliseconds / 1000
        );

        const minutes = Math.floor(
            remainingSeconds / 60
        );

        const seconds = remainingSeconds % 60;

        countdownElement.textContent =
            String(minutes).padStart(2, '0')
            + ':'
            + String(seconds).padStart(2, '0');
    }

    document.querySelectorAll(
        'input[name="payment_method"]'
    ).forEach(function (radio) {
        radio.addEventListener('change', function () {
            document.querySelectorAll('.payment-method')
                .forEach(function (option) {
                    const input = option.querySelector(
                        'input[name="payment_method"]'
                    );

                    option.classList.toggle(
                        'selected',
                        Boolean(input && input.checked)
                    );
                });
        });
    });

    if (paymentForm) {
        paymentForm.addEventListener(
            'submit',
            function () {
                if (paymentButton) {
                    paymentButton.disabled = true;

                    paymentButton.innerHTML =
                        '<i class="fa-solid fa-spinner fa-spin"></i>'
                        + ' Memproses Pembayaran...';
                }
            }
        );
    }

    updateCountdown();

    window.setInterval(
        updateCountdown,
        1000
    );
});
</script>

<?= $this->endSection() ?>