<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>

.checkout-page{
    min-height:650px;
    padding:42px 48px 75px;
    background:linear-gradient(180deg,#e0407a,#f299bc 55%,#ffd6e6);
}

.checkout-wrap{
    max-width:1120px;
    margin:auto;
}

.checkout-grid{
    display:grid;
    grid-template-columns:minmax(0,1.65fr) minmax(280px,1fr);
    gap:24px;
    align-items:start;
}

.checkout-card,
.checkout-summary{
    background:#fff;
    border-radius:18px;
    box-shadow:0 20px 45px rgba(120,10,55,.25);
}

.checkout-card{
    padding:28px 30px 34px;
}

.checkout-summary{
    position:sticky;
    top:110px;
    padding:24px;
}

/* Stepper */

.checkout-steps{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:18px;
    padding-bottom:21px;
    margin-bottom:25px;
    border-bottom:1px solid #eee4e9;
}

.checkout-step{
    display:flex;
    align-items:center;
    gap:10px;
    opacity:.45;
}

.checkout-step.active{
    opacity:1;
}

.checkout-step-number{
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

.checkout-step.active .checkout-step-number{
    color:#fff;
    background:linear-gradient(135deg,#9b87df,#7057c1);
}

.checkout-step-title{
    color:#2e1c28;
    font-size:13px;
    font-weight:800;
}

.checkout-step-desc{
    margin-top:2px;
    color:#85727c;
    font-size:10px;
}

/* Form */

.checkout-section{
    margin-bottom:26px;
}

.checkout-section-title{
    display:flex;
    align-items:center;
    gap:9px;
    margin-bottom:17px;
    color:#2c1926;
    font-size:15px;
    font-weight:800;
}

.checkout-section-title i{
    color:#df3977;
}

.checkout-columns{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:16px;
}

.checkout-field{
    margin-bottom:17px;
}

.checkout-field label,
.nominal-label{
    display:block;
    margin-bottom:7px;
    color:#30202a;
    font-size:12px;
    font-weight:750;
}

.required{
    color:#df3977;
}

.checkout-field input,
.checkout-field textarea{
    width:100%;
    border:1px solid #e3d9de;
    border-radius:10px;
    outline:none;
    color:#3c3036;
    background:#fff;
    font:12.5px inherit;
}

.checkout-field input{
    height:45px;
    padding:0 12px;
}

.checkout-field textarea{
    min-height:82px;
    padding:11px 12px;
    resize:vertical;
}

.checkout-field input:focus,
.checkout-field textarea:focus{
    border-color:#df6692;
    box-shadow:0 0 0 4px rgba(223,102,146,.12);
}

.checkout-field input[readonly]{
    color:#7d6873;
    background:#f8f3f5;
}

.checkout-hint{
    display:block;
    margin-top:7px;
    color:#917c86;
    font-size:10.5px;
}

/* Nominal */

.remaining-box{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:15px;
    margin-bottom:18px;
    padding:15px 17px;
    border:1px solid #ddd3f4;
    border-radius:12px;
    background:linear-gradient(135deg,#faf7ff,#fff8fb);
}

.remaining-box span{
    color:#705d68;
    font-size:12px;
}

.remaining-box strong{
    color:#7258c4;
    font-size:16px;
}

.nominal-list{
    display:flex;
    flex-wrap:wrap;
    gap:10px;
    margin-bottom:18px;
}

.nominal-option{
    position:relative;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-height:40px;
    padding:9px 16px;
    border:1px solid #e2d8dd;
    border-radius:9px;
    color:#30202a;
    background:#fff;
    font-size:12px;
    font-weight:700;
    cursor:pointer;
    transition:.2s;
}

.nominal-option input{
    position:absolute;
    opacity:0;
}

.nominal-option:hover:not(.disabled){
    border-color:#8068d2;
    transform:translateY(-2px);
}

.nominal-option.selected{
    border-color:#8068d2;
    color:#fff;
    background:linear-gradient(135deg,#9b87df,#7057c1);
}

.nominal-option.disabled{
    color:#afa4aa;
    background:#f2edef;
    opacity:.65;
    cursor:not-allowed;
}

.custom-amount{
    display:flex;
    overflow:hidden;
    border:1px solid #e1d7dc;
    border-radius:10px;
}

.custom-amount:focus-within{
    border-color:#8068d2;
    box-shadow:0 0 0 4px rgba(128,104,210,.12);
}

.custom-amount span{
    display:flex;
    align-items:center;
    justify-content:center;
    width:57px;
    flex-shrink:0;
    color:#fff;
    background:linear-gradient(135deg,#9b87df,#7057c1);
    font-size:13px;
    font-weight:800;
}

.custom-amount input{
    width:100%;
    height:46px;
    padding:0 13px;
    border:0;
    outline:0;
    font-size:13px;
}

/* Alert */

.checkout-alert{
    margin-bottom:20px;
    padding:14px 17px;
    border:1px solid #f1bbc5;
    border-radius:11px;
    color:#982a3b;
    background:#fff0f3;
    font-size:12.5px;
    line-height:1.6;
}

.checkout-alert ul{
    padding-left:18px;
}

/* Checkbox dan tombol */

.checkout-agreement{
    display:flex;
    align-items:flex-start;
    gap:9px;
    margin:18px 0 22px;
    color:#76616c;
    font-size:11.5px;
    line-height:1.55;
    cursor:pointer;
}

.checkout-agreement input{
    width:16px;
    height:16px;
    margin-top:2px;
    flex-shrink:0;
    accent-color:#8068d2;
}

.checkout-button{
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
    text-decoration:none;
    cursor:pointer;
}

.checkout-button:hover{
    transform:translateY(-2px);
}

.checkout-button:disabled{
    opacity:.6;
    cursor:not-allowed;
    transform:none;
}

/* Ringkasan */

.checkout-summary h3{
    margin-bottom:17px;
    color:#2d1b27;
    font-size:15px;
}

.program-info{
    display:flex;
    gap:13px;
}

.program-image{
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

.program-image img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.program-description{
    min-width:0;
}

.program-description h4{
    display:-webkit-box;
    margin-bottom:5px;
    overflow:hidden;
    color:#2d1b27;
    font-size:13px;
    line-height:1.4;
    -webkit-box-orient:vertical;
    -webkit-line-clamp:2;
}

.program-description p{
    color:#806b76;
    font-size:10.5px;
}

.program-category{
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

.summary-row,
.progress-heading{
    display:flex;
    justify-content:space-between;
    gap:12px;
    margin-bottom:11px;
    color:#74606a;
    font-size:11.5px;
}

.summary-row strong{
    color:#35242e;
    text-align:right;
}

.progress-heading{
    margin-top:16px;
    margin-bottom:8px;
    font-size:10.5px;
}

.progress-heading strong{
    color:#7057c1;
}

.progress-bar{
    height:7px;
    overflow:hidden;
    border-radius:10px;
    background:#eee9f1;
}

.progress-fill{
    height:100%;
    border-radius:inherit;
    background:linear-gradient(90deg,#a493e2,#735ac8);
}

.secure-note{
    display:flex;
    gap:9px;
    margin-top:19px;
    padding:12px;
    border-radius:10px;
    color:#75616b;
    background:#faf6f8;
    font-size:10.5px;
    line-height:1.5;
}

.secure-note i{
    margin-top:2px;
    color:#35ab69;
}

/* Modal konfirmasi */

.confirm-modal{
    position:fixed;
    inset:0;
    z-index:20000;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:22px;
    background:rgba(42,18,33,.65);
    opacity:0;
    visibility:hidden;
    pointer-events:none;
    backdrop-filter:blur(6px);
    transition:.2s;
}

.confirm-modal.open{
    opacity:1;
    visibility:visible;
    pointer-events:auto;
}

.confirm-card{
    width:100%;
    max-width:540px;
    max-height:90vh;
    overflow:auto;
    border-radius:20px;
    background:#fff;
    box-shadow:0 30px 75px rgba(35,12,27,.4);
}

.confirm-header{
    position:relative;
    padding:26px 28px 22px;
    color:#fff;
    background:linear-gradient(135deg,#df3977,#f076a3);
}

.confirm-header h2{
    margin-bottom:6px;
    font-size:21px;
}

.confirm-header p{
    color:rgba(255,255,255,.9);
    font-size:12px;
    line-height:1.5;
}

.confirm-close{
    position:absolute;
    top:15px;
    right:15px;
    width:36px;
    height:36px;
    border:0;
    border-radius:50%;
    color:#fff;
    background:rgba(255,255,255,.18);
    cursor:pointer;
}

.confirm-body{
    padding:24px 28px 28px;
}

.confirm-warning{
    display:flex;
    gap:10px;
    margin-bottom:18px;
    padding:13px;
    border:1px solid #efd092;
    border-radius:10px;
    color:#765719;
    background:#fff8e6;
    font-size:11.5px;
    line-height:1.5;
}

.confirm-data{
    overflow:hidden;
    border:1px solid #eee3e8;
    border-radius:12px;
}

.confirm-row{
    display:grid;
    grid-template-columns:145px 1fr;
    gap:12px;
    padding:12px 14px;
    border-bottom:1px solid #f0e6eb;
    font-size:12px;
}

.confirm-row:last-child{
    border-bottom:0;
}

.confirm-row span{
    color:#88747e;
}

.confirm-row strong{
    color:#382630;
    overflow-wrap:anywhere;
}

.confirm-actions{
    display:flex;
    justify-content:flex-end;
    gap:10px;
    margin-top:20px;
}

.confirm-actions button{
    min-height:43px;
    padding:10px 17px;
    border:0;
    border-radius:10px;
    font-size:12.5px;
    font-weight:750;
    cursor:pointer;
}

.confirm-edit{
    color:#654f5a;
    background:#f0e8ec;
}

.confirm-submit{
    color:#fff;
    background:linear-gradient(135deg,#927cda,#7057c1);
}

body.modal-open{
    overflow:hidden;
}

@media(max-width:900px){
    .checkout-grid{
        grid-template-columns:1fr;
    }

    .checkout-summary{
        position:static;
    }
}

@media(max-width:700px){
    .checkout-page{
        padding:30px 18px 60px;
    }

    .checkout-card{
        padding:22px 19px 27px;
    }

    .checkout-steps,
    .checkout-columns{
        grid-template-columns:1fr;
    }

    .confirm-row{
        grid-template-columns:1fr;
        gap:4px;
    }

    .confirm-actions{
        flex-direction:column-reverse;
    }

    .confirm-actions button{
        width:100%;
    }
}

<?= $this->endSection() ?>


<?= $this->section('content') ?>

<?php

$program = $program ?? [];

$remainingAmount = max(
    0,
    (int) ($program['remaining_amount'] ?? 0)
);

$targetAmount = max(
    0,
    (int) ($program['target_amount'] ?? 0)
);

$currentAmount = min(
    max(0, (int) ($program['current_amount'] ?? 0)),
    $targetAmount
);

$progress = max(
    0,
    min(100, (int) ($program['progress'] ?? 0))
);

$donor = is_array($donor ?? null)
    ? $donor
    : [];

$fullName = trim(
    (string) ($donor['name'] ?? '')
);

if ($fullName === '') {
    $fullName = 'Pengguna';
}

$email = trim(
    (string) ($donor['email'] ?? '')
);

$phone = trim(
    (string) ($donor['phone'] ?? '')
);

$presetAmounts = [50000, 100000, 150000, 200000];

$selectedAmount = max(
    1,
    (int) old(
        'amount',
        (string) min(100000, $remainingAmount)
    )
);

$selectedAmount = min(
    $selectedAmount,
    $remainingAmount
);

$errors = session()->getFlashdata('errors') ?? [];
$error  = session()->getFlashdata('error');

?>

<section class="checkout-page">

    <div class="checkout-wrap">

        <div class="checkout-grid">

            <main class="checkout-card">

                <div class="checkout-steps">

                    <div
                        class="checkout-step active"
                        data-step="1"
                    >
                        <div class="checkout-step-number">1</div>

                        <div>
                            <div class="checkout-step-title">
                                Isi Donasi
                            </div>

                            <div class="checkout-step-desc">
                                Lengkapi data donasi
                            </div>
                        </div>
                    </div>

                    <div
                        class="checkout-step"
                        data-step="2"
                    >
                        <div class="checkout-step-number">2</div>

                        <div>
                            <div class="checkout-step-title">
                                Konfirmasi
                            </div>

                            <div class="checkout-step-desc">
                                Periksa data donasi
                            </div>
                        </div>
                    </div>

                    <div class="checkout-step">
                        <div class="checkout-step-number">3</div>

                        <div>
                            <div class="checkout-step-title">
                                Pembayaran
                            </div>

                            <div class="checkout-step-desc">
                                Pilih metode pembayaran
                            </div>
                        </div>
                    </div>

                </div>

                <?php if (! empty($error)): ?>
                    <div class="checkout-alert">
                        <?= esc($error) ?>
                    </div>
                <?php endif; ?>

                <?php if (! empty($errors)): ?>
                    <div class="checkout-alert">
                        <ul>
                            <?php foreach ($errors as $message): ?>
                                <li><?= esc($message) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form
                    id="checkoutForm"
                    action="<?= site_url('donate/store') ?>"
                    method="post"
                >
                    <?= csrf_field() ?>

                    <input
                        type="hidden"
                        name="donationpost_id"
                        value="<?= (int) ($program['id'] ?? 0) ?>"
                    >

                    <input
                        type="hidden"
                        name="confirmed"
                        id="confirmedInput"
                        value="0"
                    >

                    <section class="checkout-section">

                        <div class="checkout-section-title">
                            <i class="fa-solid fa-user"></i>
                            Informasi Donatur
                        </div>

                        <div class="checkout-columns">

                            <div class="checkout-field">
                                <label>Nama akun</label>

                                <input
                                    id="donorName"
                                    type="text"
                                    value="<?= esc($fullName, 'attr') ?>"
                                    readonly
                                >
                            </div>

                            <div class="checkout-field">
                                <label>Email</label>

                                <input
                                    id="donorEmail"
                                    type="email"
                                    value="<?= esc($email, 'attr') ?>"
                                    readonly
                                >
                            </div>

                            <div class="checkout-field">
                                <label>Nomor telepon</label>

                                <input
                                    id="donorPhone"
                                    type="text"
                                    value="<?= esc($phone, 'attr') ?>"
                                    placeholder="-"
                                    readonly
                                >
                            </div>

                            <div class="checkout-field">
                                <label for="donorCity">
                                    Domisili
                                </label>

                                <input
                                    id="donorCity"
                                    name="donor_city"
                                    type="text"
                                    maxlength="100"
                                    placeholder="Kota atau kabupaten"
                                    value="<?= esc(
                                        old('donor_city'),
                                        'attr'
                                    ) ?>"
                                >
                            </div>

                        </div>

                    </section>

                    <section class="checkout-section">

                        <div class="checkout-section-title">
                            <i class="fa-solid fa-hand-holding-heart"></i>
                            Target Donasi
                        </div>

                        <div class="remaining-box">
                            <span>
                                Sisa target yang dapat didonasikan
                            </span>

                            <strong>
                                Rp<?= number_format(
                                    $remainingAmount,
                                    0,
                                    ',',
                                    '.'
                                ) ?>
                            </strong>
                        </div>

                        <label class="nominal-label">
                            Pilih nominal
                            <span class="required">*</span>
                        </label>

                        <div class="nominal-list">

                            <?php foreach ($presetAmounts as $preset): ?>

                                <?php
                                $disabled = $preset > $remainingAmount;
                                $checked  = ! $disabled
                                    && $selectedAmount === $preset;
                                ?>

                                <label
                                    class="nominal-option
                                    <?= $disabled ? 'disabled' : '' ?>
                                    <?= $checked ? 'selected' : '' ?>"
                                >
                                    <input
                                        type="radio"
                                        name="nominal_preset"
                                        value="<?= $preset ?>"
                                        <?= $checked ? 'checked' : '' ?>
                                        <?= $disabled ? 'disabled' : '' ?>
                                    >

                                    Rp<?= number_format(
                                        $preset,
                                        0,
                                        ',',
                                        '.'
                                    ) ?>
                                </label>

                            <?php endforeach; ?>

                        </div>

                        <label
                            for="amountInput"
                            class="nominal-label"
                        >
                            Nominal donasi
                            <span class="required">*</span>
                        </label>

                        <div class="custom-amount">
                            <span>Rp</span>

                            <input
                                id="amountInput"
                                name="amount"
                                type="number"
                                min="1"
                                max="<?= $remainingAmount ?>"
                                step="1"
                                value="<?= $selectedAmount ?>"
                                required
                            >
                        </div>

                        <small class="checkout-hint">
                            Maksimal Rp<?= number_format(
                                $remainingAmount,
                                0,
                                ',',
                                '.'
                            ) ?>.
                        </small>

                    </section>

                    <div class="checkout-field">
                        <label for="messageInput">
                            Pesan dan doa
                        </label>

                        <textarea
                            id="messageInput"
                            name="message"
                            maxlength="200"
                            placeholder="Tuliskan pesan atau doa..."
                        ><?= esc(old('message')) ?></textarea>
                    </div>

                    <label class="checkout-agreement">
                        <input
                            id="showNameInput"
                            type="checkbox"
                            name="show_name"
                            value="1"
                            <?= old('show_name', '1') === '1'
                                ? 'checked'
                                : '' ?>
                        >

                        <span>
                            Tampilkan nama akun saya pada daftar
                            donatur program.
                        </span>
                    </label>

                    <button
                        type="submit"
                        class="checkout-button"
                        id="continueButton"
                    >
                        Lanjutkan ke Konfirmasi
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>

                </form>

            </main>

            <aside class="checkout-summary">

                <h3>Ringkasan Donasi</h3>

                <div class="program-info">

                    <div class="program-image">

                        <?php if (! empty($program['picture_url'])): ?>
                            <img
                                src="<?= esc(
                                    $program['picture_url'],
                                    'attr'
                                ) ?>"
                                alt="<?= esc(
                                    $program['title'],
                                    'attr'
                                ) ?>"
                            >
                        <?php else: ?>
                            <i class="fa-solid fa-image"></i>
                        <?php endif; ?>

                    </div>

                    <div class="program-description">

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

                        <span class="program-category">
                            <?= esc(
                                $program['category'] ?? 'Umum'
                            ) ?>
                        </span>

                    </div>

                </div>

                <div class="summary-divider"></div>

                <div class="summary-row">
                    <span>Dana terkumpul</span>

                    <strong>
                        Rp<?= number_format(
                            $currentAmount,
                            0,
                            ',',
                            '.'
                        ) ?>
                    </strong>
                </div>

                <div class="summary-row">
                    <span>Target donasi</span>

                    <strong>
                        Rp<?= number_format(
                            $targetAmount,
                            0,
                            ',',
                            '.'
                        ) ?>
                    </strong>
                </div>

                <div class="summary-row">
                    <span>Sisa target</span>

                    <strong>
                        Rp<?= number_format(
                            $remainingAmount,
                            0,
                            ',',
                            '.'
                        ) ?>
                    </strong>
                </div>

                <div class="progress-heading">
                    <span>Progres program</span>
                    <strong><?= $progress ?>%</strong>
                </div>

                <div class="progress-bar">
                    <div
                        class="progress-fill"
                        style="width:<?= $progress ?>%"
                    ></div>
                </div>

                <div class="secure-note">
                    <i class="fa-solid fa-shield-halved"></i>

                    <span>
                        Metode pembayaran dipilih pada halaman
                        pembayaran setelah data dikonfirmasi.
                    </span>
                </div>

            </aside>

        </div>

    </div>

</section>

<!-- Popup konfirmasi -->
<div
    class="confirm-modal"
    id="confirmModal"
    aria-hidden="true"
>
    <div
        class="confirm-card"
        role="dialog"
        aria-modal="true"
        aria-labelledby="confirmTitle"
    >

        <header class="confirm-header">

            <button
                type="button"
                class="confirm-close"
                id="closeModalButton"
                aria-label="Tutup"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>

            <h2 id="confirmTitle">
                Konfirmasi Data Donasi
            </h2>

            <p>
                Periksa kembali data sebelum membuat transaksi
                pembayaran.
            </p>

        </header>

        <div class="confirm-body">

            <div class="confirm-warning">
                <i class="fa-solid fa-triangle-exclamation"></i>

                <span>
                    Setelah data dikonfirmasi, transaksi akan dibuat
                    dengan status pending. Pembayaran harus
                    diselesaikan dalam waktu 15 menit.
                </span>
            </div>

            <div class="confirm-data">

                <div class="confirm-row">
                    <span>Program</span>

                    <strong>
                        <?= esc(
                            $program['title']
                                ?? 'Program donasi'
                        ) ?>
                    </strong>
                </div>

                <div class="confirm-row">
                    <span>Nama akun</span>
                    <strong id="confirmName">-</strong>
                </div>

                <div class="confirm-row">
                    <span>Email</span>
                    <strong id="confirmEmail">-</strong>
                </div>

                <div class="confirm-row">
                    <span>Nomor telepon</span>
                    <strong id="confirmPhone">-</strong>
                </div>

                <div class="confirm-row">
                    <span>Domisili</span>
                    <strong id="confirmCity">-</strong>
                </div>

                <div class="confirm-row">
                    <span>Nominal</span>
                    <strong id="confirmAmount">Rp0</strong>
                </div>

                <div class="confirm-row">
                    <span>Pesan</span>
                    <strong id="confirmMessage">-</strong>
                </div>

                <div class="confirm-row">
                    <span>Tampilkan nama</span>
                    <strong id="confirmShowName">Ya</strong>
                </div>

            </div>

            <div class="confirm-actions">

                <button
                    type="button"
                    class="confirm-edit"
                    id="editButton"
                >
                    Kembali Edit
                </button>

                <button
                    type="button"
                    class="confirm-submit"
                    id="confirmButton"
                >
                    Konfirmasi dan Lanjutkan
                </button>

            </div>

        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('checkoutForm');
    const amountInput = document.getElementById('amountInput');
    const confirmedInput = document.getElementById('confirmedInput');
    const modal = document.getElementById('confirmModal');
    const confirmButton = document.getElementById('confirmButton');
    const maximumAmount = <?= $remainingAmount ?>;

    const radios = document.querySelectorAll(
        'input[name="nominal_preset"]'
    );

    const rupiah = value => new Intl.NumberFormat(
        'id-ID',
        {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0
        }
    ).format(value);

    const updateChips = () => {
        document.querySelectorAll('.nominal-option')
            .forEach(option => {
                const radio = option.querySelector('input');

                option.classList.toggle(
                    'selected',
                    Boolean(radio?.checked)
                );
            });
    };

    radios.forEach(radio => {
        radio.addEventListener('change', () => {
            amountInput.value = radio.value;
            updateChips();
        });
    });

    amountInput.addEventListener('input', () => {
        let amount = parseInt(amountInput.value, 10) || 0;

        if (amount > maximumAmount) {
            amount = maximumAmount;
            amountInput.value = maximumAmount;
        }

        radios.forEach(radio => {
            radio.checked = Number(radio.value) === amount;
        });

        updateChips();
    });

    const setStep = step => {
        document.querySelectorAll('[data-step]')
            .forEach(item => {
                item.classList.toggle(
                    'active',
                    Number(item.dataset.step) === step
                );
            });
    };

    const openModal = () => {
        const amount = parseInt(amountInput.value, 10) || 0;

        if (amount <= 0) {
            alert('Nominal donasi harus lebih dari Rp0.');
            amountInput.focus();
            return;
        }

        if (amount > maximumAmount) {
            alert('Nominal melebihi sisa target.');
            amountInput.focus();
            return;
        }

        document.getElementById('confirmName').textContent =
            document.getElementById('donorName').value || '-';

        document.getElementById('confirmEmail').textContent =
            document.getElementById('donorEmail').value || '-';

        document.getElementById('confirmPhone').textContent =
            document.getElementById('donorPhone').value || '-';

        document.getElementById('confirmCity').textContent =
            document.getElementById('donorCity').value || '-';

        document.getElementById('confirmAmount').textContent =
            rupiah(amount);

        document.getElementById('confirmMessage').textContent =
            document.getElementById('messageInput').value || '-';

        document.getElementById('confirmShowName').textContent =
            document.getElementById('showNameInput').checked
                ? 'Ya'
                : 'Tidak';

        modal.classList.add('open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('modal-open');

        setStep(2);
    };

    const closeModal = () => {
        modal.classList.remove('open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');

        confirmedInput.value = '0';
        setStep(1);
    };

    form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            return;
        }

        if (confirmedInput.value !== '1') {
            event.preventDefault();
            openModal();
        }
    });

    document.getElementById('closeModalButton')
        .addEventListener('click', closeModal);

    document.getElementById('editButton')
        .addEventListener('click', closeModal);

    confirmButton.addEventListener('click', () => {
        confirmedInput.value = '1';
        confirmButton.disabled = true;
        confirmButton.innerHTML =
            '<i class="fa-solid fa-spinner fa-spin"></i> Memproses...';

        form.requestSubmit();
    });

    modal.addEventListener('click', event => {
        if (event.target === modal) {
            closeModal();
        }
    });

    document.addEventListener('keydown', event => {
        if (
            event.key === 'Escape'
            && modal.classList.contains('open')
        ) {
            closeModal();
        }
    });

    updateChips();
});
</script>

<?= $this->endSection() ?>