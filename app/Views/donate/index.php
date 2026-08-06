<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>

.donate-page {
    min-height: 650px;
    padding: 60px 50px 80px;

    text-align: center;

    background:
        linear-gradient(
            180deg,
            #ffe0ea 0%,
            #f78bb0 35%,
            #e0407a 75%,
            #c72868 100%
        );
}

.donate-page-header {
    margin-bottom: 34px;
}

.donate-page-header h1 {
    margin-bottom: 10px;

    color: #2c2c2c;

    font-family: Georgia, "Times New Roman", serif;
    font-size: 38px;
    font-weight: 700;
}

.donate-page-header h1 span {
    color: #8b6ad9;
}

.donate-page-header p {
    color: #5c4550;

    font-size: 15px;
}

/* Filter */

.donate-filter-row {
    display: flex;
    justify-content: flex-end;

    max-width: 1200px;
    margin: 0 auto 35px;
}

.donate-filter {
    position: relative;
}

.donate-filter::after {
    content: "";

    position: absolute;
    top: 100%;
    right: 0;

    width: 270px;
    height: 15px;
}

.donate-filter-button {
    display: inline-flex;
    align-items: center;
    gap: 10px;

    padding: 13px 21px;

    border: none;
    border-radius: 50px;

    color: #ffffff;

    background:
        linear-gradient(
            135deg,
            #f58fb4,
            #8d7be6
        );

    box-shadow:
        0 12px 25px rgba(143, 90, 205, 0.30);

    font-size: 14px;
    font-weight: 700;

    cursor: pointer;
}

.donate-filter-arrow {
    transition: transform 0.25s ease;
}

.donate-filter:hover .donate-filter-arrow,
.donate-filter:focus-within .donate-filter-arrow {
    transform: rotate(180deg);
}

.donate-filter-menu {
    position: absolute;
    top: calc(100% + 12px);
    right: 0;
    z-index: 900;

    width: 270px;

    overflow: hidden;

    border: 1px solid #eee1f5;
    border-radius: 17px;

    background: rgba(255, 255, 255, 0.98);

    box-shadow:
        0 20px 45px rgba(0, 0, 0, 0.18);

    opacity: 0;
    visibility: hidden;
    pointer-events: none;

    transform: translateY(14px);

    transition:
        opacity 0.25s ease,
        visibility 0.25s ease,
        transform 0.25s ease;
}

.donate-filter:hover .donate-filter-menu,
.donate-filter:focus-within .donate-filter-menu {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;

    transform: translateY(0);
}

.donate-filter-menu a {
    display: flex;
    align-items: center;
    gap: 11px;

    padding: 15px 19px;

    color: #5f5260;

    font-size: 14px;
    text-decoration: none;
    text-align: left;

    transition:
        color 0.2s ease,
        background 0.2s ease,
        padding-left 0.2s ease;
}

.donate-filter-menu a:not(:last-child) {
    border-bottom: 1px solid #f1e8ee;
}

.donate-filter-menu a:hover {
    padding-left: 26px;

    color: #7b5bd0;
    background: #f8f4ff;
}

.donate-filter-menu a.active {
    color: #ffffff;

    background:
        linear-gradient(
            90deg,
            #f58fb4,
            #8b6bdf
        );

    font-weight: 800;
}

/* Alert */

.donate-database-error {
    max-width: 900px;
    margin: 0 auto 30px;
    padding: 16px 19px;

    border: 1px solid #f2b8c3;
    border-radius: 14px;

    color: #9d293b;
    background: #fff0f3;

    font-size: 13px;
    line-height: 1.6;
    text-align: left;
}

/* Cards */

.donate-cards {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 28px;

    max-width: 1200px;
    margin: 0 auto;
}

.donate-card {
    display: flex;
    flex-direction: column;

    min-width: 0;

    overflow: hidden;

    border-radius: 18px;

    background: #ffffff;

    box-shadow:
        0 15px 35px rgba(0, 0, 0, 0.15);

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}

.donate-card:hover {
    box-shadow:
        0 22px 45px rgba(0, 0, 0, 0.22);

    transform: translateY(-8px);
}

.donate-card-image {
    position: relative;

    width: 100%;
    height: 240px;

    overflow: hidden;

    background:
        linear-gradient(
            135deg,
            #ffd1e1,
            #a594e4
        );
}

.donate-card-image img {
    display: block;

    width: 100%;
    height: 100%;

    object-fit: cover;

    transition: transform 0.35s ease;
}

.donate-card:hover .donate-card-image img {
    transform: scale(1.04);
}

.donate-image-empty {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 10px;

    width: 100%;
    height: 100%;

    color: rgba(255, 255, 255, 0.95);
}

.donate-image-empty i {
    font-size: 44px;
}

.donate-image-empty span {
    font-size: 13px;
    font-weight: 700;
}

.donate-status {
    position: absolute;
    top: 14px;
    left: 14px;

    padding: 6px 12px;

    border-radius: 20px;

    color: #ffffff;
    background: rgba(44, 24, 40, 0.76);

    font-size: 11px;
    font-weight: 800;
    text-transform: capitalize;

    backdrop-filter: blur(6px);
}

.donate-progress-info {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;

    padding: 10px 75px 10px 14px;

    border-top: 4px solid #9c7de4;

    color: #4d4148;
    background: rgba(255, 255, 255, 0.96);

    font-size: 12px;
    line-height: 1.5;
    text-align: left;
}

.donate-progress-percent {
    position: absolute;
    right: 14px;
    bottom: 13px;

    min-width: 48px;
    padding: 4px 9px;

    border-radius: 20px;

    color: #ffffff;

    background:
        linear-gradient(
            135deg,
            #66c6ff,
            #8d7ce3
        );

    font-size: 12px;
    font-weight: 800;
}

.donate-card-content {
    display: flex;
    flex: 1;
    flex-direction: column;

    padding: 22px;
}

.donate-foundation {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;

    margin-bottom: 10px;

    color: #8c7482;

    font-size: 12px;
    font-weight: 650;
}

.donate-card-title {
    display: flex;
    align-items: center;
    justify-content: center;

    min-height: 55px;
    margin-bottom: 10px;

    color: #2c1828;

    font-size: 18px;
    font-weight: 800;
    line-height: 1.4;
    text-align: center;
}

.donate-category {
    display: inline-flex;
    align-self: center;

    margin-bottom: 17px;
    padding: 6px 13px;

    border-radius: 20px;

    color: #227eaf;
    background: #e3f5ff;

    font-size: 12px;
    font-weight: 750;
}

.donate-description {
    display: -webkit-box;

    min-height: 70px;
    margin-bottom: 20px;

    overflow: hidden;

    color: #6b5964;

    font-size: 14px;
    line-height: 1.65;
    text-align: left;

    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
}

.donate-location {
    display: flex;
    align-items: center;
    gap: 7px;

    margin-bottom: 17px;

    color: #84717b;

    font-size: 12px;
}

.donate-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;

    margin-top: auto;
    margin-bottom: 19px;

    color: #6d5a65;

    font-size: 12px;
}

.donate-meta span {
    display: flex;
    align-items: center;
    gap: 6px;
}

.donate-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;

    min-height: 47px;
    padding: 12px 24px;

    border-radius: 12px;

    color: #ffffff !important;

    background:
        linear-gradient(
            90deg,
            #9f8de0,
            #8367db
        );

    box-shadow:
        0 10px 20px rgba(115, 89, 201, 0.25);

    font-size: 14px;
    font-weight: 750;
    text-decoration: none !important;

    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease;
}

.donate-button:hover {
    box-shadow:
        0 14px 25px rgba(115, 89, 201, 0.36);

    transform: translateY(-2px);
}

.donate-button i {
    transition: transform 0.25s ease;
}

.donate-button:hover i {
    transform: translateX(4px);
}

/* Empty */

.donate-empty {
    grid-column: 1 / -1;

    padding: 48px 25px;

    border: 1px solid rgba(255, 255, 255, 0.4);
    border-radius: 18px;

    color: #ffffff;
    background: rgba(255, 255, 255, 0.14);

    backdrop-filter: blur(8px);
}

.donate-empty i {
    margin-bottom: 15px;

    font-size: 44px;
}

.donate-empty h2 {
    margin-bottom: 8px;

    font-size: 22px;
}

.donate-empty p {
    font-size: 14px;
}

/* Responsive */

@media (max-width: 1100px) {
    .donate-cards {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 768px) {
    .donate-page {
        padding: 45px 20px 65px;
    }

    .donate-page-header h1 {
        font-size: 30px;
    }

    .donate-filter-row {
        justify-content: center;
    }

    .donate-cards {
        grid-template-columns: 1fr;
    }

    .donate-card-image {
        height: 225px;
    }
}

<?= $this->endSection() ?>


<?= $this->section('content') ?>

<?php

$programs = $programs ?? [];

$selectedCategory = trim(
    (string) ($selectedCategory ?? '')
);

$databaseError = $databaseError ?? null;

?>

<section class="donate-page">

    <div class="donate-page-header">
        <h1>
            Program Donasi <span>Terbaru</span>
        </h1>

        <p>
            Mari bersama wujudkan kebaikan untuk yang membutuhkan.
        </p>
    </div>

    <div class="donate-filter-row">

        <div class="donate-filter">

            <button
                type="button"
                class="donate-filter-button"
            >
                <i class="fa-solid fa-filter"></i>

                Filter Program

                <i
                    class="fa-solid fa-chevron-down donate-filter-arrow"
                ></i>
            </button>

            <div class="donate-filter-menu">

                <a
                    href="<?= site_url('donate') ?>"
                    class="<?= $selectedCategory === '' ? 'active' : '' ?>"
                >
                    🌍 Semua Program
                </a>

                <a
                    href="<?= site_url('donate') ?>?category=Medis"
                    class="<?= strcasecmp(
                        $selectedCategory,
                        'Medis'
                    ) === 0 ? 'active' : '' ?>"
                >
                    🏥 Donasi Kesehatan
                </a>

                <a
                    href="<?= site_url('donate') ?>?category=Pendidikan"
                    class="<?= strcasecmp(
                        $selectedCategory,
                        'Pendidikan'
                    ) === 0 ? 'active' : '' ?>"
                >
                    📚 Donasi Pendidikan
                </a>

                <a
                    href="<?= site_url('donate') ?>?category=Bencana"
                    class="<?= strcasecmp(
                        $selectedCategory,
                        'Bencana'
                    ) === 0 ? 'active' : '' ?>"
                >
                    🌊 Bencana Alam
                </a>

                <a
                    href="<?= site_url('donate') ?>?category=Panti%20Asuhan"
                    class="<?= strcasecmp(
                        $selectedCategory,
                        'Panti Asuhan'
                    ) === 0 ? 'active' : '' ?>"
                >
                    🏡 Panti Asuhan
                </a>

            </div>

        </div>

    </div>

    <?php if (! empty($databaseError)): ?>

        <div class="donate-database-error">
            <strong>Kesalahan database:</strong>

            <?= esc($databaseError) ?>
        </div>

    <?php endif; ?>

    <div class="donate-cards">

        <?php if (empty($programs)): ?>

            <div class="donate-empty">

                <i class="fa-solid fa-hand-holding-heart"></i>

                <h2>Program belum tersedia</h2>

                <p>
                    Belum ada program donasi yang sesuai dengan
                    kategori yang dipilih.
                </p>

            </div>

        <?php else: ?>

            <?php foreach ($programs as $program): ?>

                <article class="donate-card">

                    <div class="donate-card-image">

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
                                loading="lazy"
                            >

                        <?php else: ?>

                            <div class="donate-image-empty">
                                <i class="fa-solid fa-image"></i>

                                <span>
                                    Gambar belum tersedia
                                </span>
                            </div>

                        <?php endif; ?>

                        <span class="donate-status">
                            <?= esc($program['status']) ?>
                        </span>

                        <div class="donate-progress-info">

                            <strong>
                                Rp<?= number_format(
                                    (int) $program['current_amount'],
                                    0,
                                    ',',
                                    '.'
                                ) ?>
                            </strong>

                            terkumpul dari

                            <strong>
                                Rp<?= number_format(
                                    (int) $program['target_amount'],
                                    0,
                                    ',',
                                    '.'
                                ) ?>
                            </strong>

                        </div>

                        <div class="donate-progress-percent">
                            <?= (int) $program['progress'] ?>%
                        </div>

                    </div>

                    <div class="donate-card-content">

                        <div class="donate-foundation">
                            <i class="fa-solid fa-building-columns"></i>

                            <?= esc($program['foundation_name']) ?>
                        </div>

                        <h2 class="donate-card-title">
                            <?= esc($program['title']) ?>
                        </h2>

                        <span class="donate-category">
                            <?= esc($program['category']) ?>
                        </span>

                        <p class="donate-description">
                            <?= esc($program['description']) ?>
                        </p>

                        <div class="donate-location">
                            <i class="fa-solid fa-location-dot"></i>

                            <?= esc(
                                $program['foundation_location']
                            ) ?>
                        </div>

                        <div class="donate-meta">

                            <span>
                                <i class="fa-solid fa-users"></i>

                                <?= (int) $program['donor_count'] ?>
                                Donatur
                            </span>

                            <span>
                                <i class="fa-regular fa-calendar"></i>

                                <?= esc(
                                    $program['deadline_label']
                                ) ?>
                            </span>

                        </div>

                        <a
                            href="<?= site_url(
                                'donate/checkout/'
                                . (int) $program['id']
                            ) ?>"
                            class="donate-button"
                        >
                            Donasi Sekarang

                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                </article>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>

</section>

<?= $this->endSection() ?>