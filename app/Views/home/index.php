<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>

/* =========================================================
   HOME HERO
========================================================= */

.home-hero {
    position: relative;

    overflow: hidden;

    padding: 80px 40px 90px;

    text-align: center;

    background:
        linear-gradient(
            160deg,
            #f78bb0 0%,
            #ee5a94 40%,
            #c72868 100%
        );
}

.home-hero::before {
    content: "";

    position: absolute;
    top: -80px;
    left: -80px;

    width: 260px;
    height: 260px;

    border-radius: 50%;

    background: rgba(255, 255, 255, 0.08);
}

.home-hero::after {
    content: "";

    position: absolute;
    right: -60px;
    bottom: -100px;

    width: 320px;
    height: 320px;

    border-radius: 50%;

    background: rgba(255, 255, 255, 0.06);
}

.home-hero-badge {
    position: relative;
    z-index: 2;

    display: inline-block;

    margin-bottom: 34px;
    padding: 10px 24px;

    border-radius: 30px;

    color: #3d8fd9;
    background: #ffffff;

    box-shadow:
        0 8px 18px rgba(120, 20, 70, 0.18);

    font-size: 13.5px;
    font-weight: 700;
}

.home-hero-title {
    position: relative;
    z-index: 2;

    margin-bottom: 18px;

    color: #ffffff;

    font-family: Georgia, "Times New Roman", serif;
    font-size: 38px;
    font-weight: 700;
    line-height: 1.35;
}

.home-hero-title em {
    font-family: "Brush Script MT", "Segoe Script", cursive;
    font-size: 44px;
    font-style: italic;
    font-weight: 400;
}

.home-hero-description {
    position: relative;
    z-index: 2;

    max-width: 560px;
    margin: 0 auto 40px;

    color: rgba(255, 255, 255, 0.92);

    font-size: 15.5px;
    line-height: 1.65;
}

/* =========================================================
   HERO BUTTON
========================================================= */

.home-hero-button {
    position: relative;
    z-index: 2;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 13px;

    min-height: 58px;
    padding: 8px 14px 8px 8px;

    border: 2px solid rgba(255, 255, 255, 0.25);
    border-radius: 50px;

    color: #ffffff !important;

    background:
        linear-gradient(
            135deg,
            #f186ad,
            #e0407a
        );

    box-shadow:
        0 14px 30px rgba(120, 10, 55, 0.4);

    font-size: 15px;
    font-weight: 800;
    text-decoration: none !important;

    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease;
}

.home-hero-button-icon {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 42px;
    height: 42px;

    flex-shrink: 0;

    border-radius: 50%;

    color: #ffffff;

    background: rgba(255, 255, 255, 0.25);
}

.home-hero-button-label {
    color: #ffffff !important;

    white-space: nowrap;
}

.home-hero-button-arrow {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 27px;
    height: 27px;

    flex-shrink: 0;

    border-radius: 50%;

    color: #ffffff;

    background: rgba(255, 255, 255, 0.25);

    transition: transform 0.25s ease;
}

.home-hero-button:hover {
    color: #ffffff !important;

    box-shadow:
        0 18px 38px rgba(120, 10, 55, 0.48);

    transform: translateY(-3px);
}

.home-hero-button:hover .home-hero-button-arrow {
    transform: translateX(4px);
}

.home-hero-button:active {
    transform: translateY(0);
}

/* =========================================================
   FADE
========================================================= */

.home-fade-banner {
    height: 90px;

    background:
        linear-gradient(
            180deg,
            #c72868 0%,
            #f7bcd2 55%,
            #ffffff 100%
        );
}

/* =========================================================
   HOME ABOUT
========================================================= */

.home-about-section {
    display: grid;
    grid-template-columns: 0.95fr 1.05fr;
    align-items: start;
    gap: 50px;

    padding: 30px 56px 100px;

    background: #ffffff;
}

.home-about-media {
    position: relative;

    min-height: 430px;
}

.home-about-photo-top {
    position: relative;

    width: 78%;
    aspect-ratio: 4 / 3;

    overflow: hidden;

    border-radius: 15px;

    background:
        linear-gradient(
            135deg,
            #e9c9a3,
            #c98f5b
        );

    box-shadow:
        0 14px 30px rgba(0, 0, 0, 0.18);
}

.home-about-items {
    position: absolute;
    top: 10%;
    left: 50%;

    display: flex;
    align-items: flex-end;
    gap: 6px;

    transform: translateX(-50%);
}

.home-about-item {
    display: block;

    width: 16px;

    border-radius: 3px;
}

.home-about-item.blue {
    height: 34px;
    background: #4f7cc9;
}

.home-about-item.cream {
    height: 26px;
    background: #e8e2d3;
}

.home-about-item.gray {
    height: 30px;
    background: #8f8f92;
}

.home-about-box {
    position: absolute;
    bottom: 14%;
    left: 50%;

    width: 58%;
    padding: 10px 8px;

    border-radius: 5px;

    background: #c9995f;

    box-shadow:
        0 8px 16px rgba(0, 0, 0, 0.2);

    text-align: center;

    transform: translateX(-50%);
}

.home-about-box-heart {
    display: block;

    margin-bottom: 4px;

    font-size: 15px;
}

.home-about-box-label {
    padding: 4px 7px;

    border-radius: 4px;

    color: var(--pink-deep);
    background: #ffffff;

    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1px;
}

.home-about-photo-bottom {
    position: absolute;
    right: 0;
    bottom: 0;

    width: 78%;
    aspect-ratio: 4 / 3;

    overflow: hidden;

    border-radius: 15px;

    background:
        linear-gradient(
            135deg,
            #2b2b3d,
            #15151f
        );

    box-shadow:
        0 18px 34px rgba(0, 0, 0, 0.3);
}

.home-about-laptop-screen {
    position: absolute;
    top: 8%;
    right: 8%;
    bottom: 22%;
    left: 8%;

    padding: 9px;

    border-radius: 6px;

    background: #f4f2f8;
}

.home-about-laptop-bar {
    width: 60%;
    height: 5px;
    margin-bottom: 5px;

    border-radius: 3px;

    background: #e6def5;
}

.home-about-laptop-bar.small {
    width: 40%;
}

.home-about-chart {
    width: 100%;
    height: 40%;
    margin-top: 8px;
}

.home-about-laptop-base {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;

    height: 22%;

    background: #3a3a4a;
}

.home-about-play-badge {
    position: absolute;
    top: 62%;
    left: 50%;
    z-index: 3;

    width: 120px;
    height: 120px;

    transform: translate(-50%, -50%);
}

.home-about-play-badge svg {
    width: 100%;
    height: 100%;
}

.home-about-play-circle {
    fill: var(--purple);

    filter:
        drop-shadow(
            0 10px 18px rgba(107, 84, 200, 0.45)
        );
}

.home-about-play-icon {
    fill: #ffffff;
}

.home-about-curved-text {
    fill: #ffffff;

    font-size: 8.4px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

/* =========================================================
   HOME ABOUT CONTENT
========================================================= */

.home-about-content {
    padding-top: 20px;
}

.home-about-kicker {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 8px;

    margin-bottom: 16px;

    color: var(--ink);

    font-size: 15px;
    font-weight: 700;
    text-align: right;
}

.home-about-kicker-dot {
    width: 8px;
    height: 8px;

    flex-shrink: 0;

    border-radius: 50%;

    background: var(--purple);
}

.home-about-kicker em {
    font-family: Georgia, serif;
    font-style: italic;
}

.home-about-title {
    margin-bottom: 20px;

    color: var(--ink);

    font-family: "Trebuchet MS", "Segoe UI", sans-serif;
    font-size: 26px;
    font-weight: 800;
    line-height: 1.4;
    text-align: right;
}

.home-about-description {
    margin-bottom: 16px;

    color: var(--muted);

    font-size: 13.5px;
    line-height: 1.75;
}

/* =========================================================
   ABOUT DONATE BUTTON
========================================================= */

.home-about-donate-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 11px;

    min-width: 195px;
    min-height: 50px;
    margin-top: 16px;
    padding: 12px 22px;

    border-radius: 50px;

    color: #ffffff !important;

    background:
        linear-gradient(
            135deg,
            #9a86df,
            #735cc6
        );

    box-shadow:
        0 13px 26px rgba(107, 84, 200, 0.38);

    font-size: 14px;
    font-weight: 800;
    text-decoration: none !important;

    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease,
        background 0.25s ease;
}

.home-about-donate-button i {
    color: #ffffff;
}

.home-about-donate-label {
    color: #ffffff !important;

    white-space: nowrap;
}

.home-about-button-arrow {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 27px;
    height: 27px;

    border-radius: 50%;

    color: #ffffff;

    background: rgba(255, 255, 255, 0.2);

    transition:
        transform 0.25s ease,
        background 0.25s ease;
}

.home-about-donate-button:hover {
    color: #ffffff !important;

    background:
        linear-gradient(
            135deg,
            #e0407a,
            #f56c9f
        );

    box-shadow:
        0 17px 32px rgba(224, 64, 122, 0.35);

    transform: translateY(-3px);
}

.home-about-donate-button:hover .home-about-button-arrow {
    background: rgba(255, 255, 255, 0.3);

    transform: translateX(4px);
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 900px) {
    .home-about-section {
        grid-template-columns: 1fr;

        padding: 30px 28px 70px;
    }

    .home-about-media {
        min-height: 430px;
        margin-bottom: 25px;
    }

    .home-about-kicker {
        justify-content: flex-start;
        text-align: left;
    }

    .home-about-title {
        text-align: left;
    }
}

@media (max-width: 820px) {
    .home-hero {
        padding: 65px 24px 75px;
    }

    .home-hero-title {
        font-size: 28px;
    }

    .home-hero-title em {
        font-size: 33px;
    }
}

@media (max-width: 560px) {
    .home-hero {
        padding: 55px 18px 65px;
    }

    .home-hero-badge {
        padding: 9px 16px;

        font-size: 11px;
        line-height: 1.5;
    }

    .home-hero-title {
        font-size: 25px;
    }

    .home-hero-title em {
        font-size: 31px;
    }

    .home-hero-button-label {
        font-size: 13px;
    }

    .home-about-section {
        padding: 20px 20px 60px;
    }

    .home-about-media {
        min-height: 330px;
    }

    .home-about-photo-top,
    .home-about-photo-bottom {
        width: 85%;
    }

    .home-about-play-badge {
        width: 95px;
        height: 95px;
    }

    .home-about-title {
        font-size: 23px;
    }

    .home-about-donate-button {
        width: 100%;
    }
}

<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section
    class="home-hero"
    id="home"
>
    <span class="home-hero-badge">
        Sistem Terima Donasi dan Kelola Donatur
    </span>

    <h1 class="home-hero-title">
        Kelola Donasi dengan Lebih Mudah
        <br>
        Bersama <em>Mirae</em>
    </h1>

    <p class="home-hero-description">
        Sederhanakan pengelolaan donatur, transaksi donasi, dan
        pelaporan dalam satu dashboard yang cepat, aman, dan transparan.
    </p>

    <a
        href="<?= site_url('donate') ?>"
        class="home-hero-button"
    >
        <span class="home-hero-button-icon">
            <i class="fa-solid fa-heart"></i>
        </span>

        <span class="home-hero-button-label">
            Donate Sekarang
        </span>

        <span class="home-hero-button-arrow">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
    </a>
</section>

<div class="home-fade-banner"></div>

<section
    class="home-about-section"
    id="about"
>
    <div class="home-about-media">

        <div class="home-about-photo-top">

            <div class="home-about-items">
                <span class="home-about-item blue"></span>
                <span class="home-about-item cream"></span>
                <span class="home-about-item gray"></span>
            </div>

            <div class="home-about-box">

                <span class="home-about-box-heart">
                    🤍
                </span>

                <div class="home-about-box-label">
                    DONASI
                </div>

            </div>

        </div>

        <div class="home-about-photo-bottom">

            <div class="home-about-laptop-screen">

                <div class="home-about-laptop-bar"></div>

                <div class="home-about-laptop-bar small"></div>

                <svg
                    class="home-about-chart"
                    viewBox="0 0 100 30"
                    preserveAspectRatio="none"
                    aria-hidden="true"
                >
                    <polyline
                        points="0,25 15,18 30,22 45,10 60,15 75,5 90,12 100,8"
                        fill="none"
                        stroke="#8b7cd6"
                        stroke-width="2"
                    />
                </svg>

            </div>

            <div class="home-about-laptop-base"></div>

        </div>

        <div class="home-about-play-badge">

            <svg
                viewBox="0 0 120 120"
                aria-hidden="true"
            >
                <defs>
                    <path
                        id="homeAboutCurve"
                        d="M 15,60 A 45,45 0 1,1 105,60"
                        fill="none"
                    />
                </defs>

                <circle
                    class="home-about-play-circle"
                    cx="60"
                    cy="60"
                    r="45"
                />

                <polygon
                    class="home-about-play-icon"
                    points="52,45 52,75 78,60"
                />

                <text class="home-about-curved-text">
                    <textPath
                        href="#homeAboutCurve"
                        startOffset="2%"
                    >
                        KELOLA DONASI UNTUK KEBAIKAN
                    </textPath>
                </text>
            </svg>

        </div>

    </div>

    <div class="home-about-content">

        <p class="home-about-kicker">
            <span class="home-about-kicker-dot"></span>
            About <em>Mirae</em>
        </p>

        <h2 class="home-about-title">
            Dedicated to Making Every Donation More Meaningful
        </h2>

        <p class="home-about-description">
            MIRAE adalah platform pengelolaan donasi yang dirancang
            untuk membantu organisasi, komunitas, dan yayasan dalam
            mengelola donatur serta donasi secara lebih mudah, aman,
            dan transparan. Melalui sistem yang terintegrasi, setiap
            proses mulai dari pencatatan donasi, pengelolaan data
            donatur, hingga pelaporan dapat dilakukan secara efisien
            dalam satu dashboard.
        </p>

        <p class="home-about-description">
            Kami percaya bahwa transparansi dan akuntabilitas merupakan
            fondasi utama dalam membangun kepercayaan. Oleh karena itu,
            MIRAE menghadirkan solusi digital yang mendukung pengelolaan
            donasi secara profesional, sehingga setiap kontribusi dapat
            dipantau dengan jelas dan memberikan dampak nyata bagi
            masyarakat.
        </p>

        <a
            href="<?= site_url('donate') ?>"
            class="home-about-donate-button"
        >
            <i class="fa-solid fa-heart"></i>

            <span class="home-about-donate-label">
                Donate Sekarang
            </span>

            <span class="home-about-button-arrow">
                <i class="fa-solid fa-arrow-right"></i>
            </span>
        </a>

    </div>

</section>

<?= $this->endSection() ?>