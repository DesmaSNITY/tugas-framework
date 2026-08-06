<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>

/* =========================================================
   ABOUT PAGE
========================================================= */

.about-page-fade {
    height: 110px;
    background:
        linear-gradient(
            180deg,
            #ee5a94 0%,
            #f7bcd2 55%,
            #ffffff 100%
        );
}

.about-page-section {
    display: grid;
    grid-template-columns: 0.95fr 1.05fr;
    align-items: start;
    gap: 50px;

    padding: 50px 56px 100px;

    background: #ffffff;
}

/* =========================================================
   MEDIA
========================================================= */

.about-page-media {
    position: relative;
    min-height: 430px;
}

.about-page-photo-top {
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

.about-page-photo-top::before {
    content: "";

    position: absolute;
    top: -40px;
    right: -40px;

    width: 150px;
    height: 150px;

    border-radius: 50%;

    background: rgba(255, 255, 255, 0.1);
}

.about-page-items {
    position: absolute;
    top: 10%;
    left: 50%;

    display: flex;
    align-items: flex-end;
    gap: 6px;

    transform: translateX(-50%);
}

.about-page-item {
    display: block;

    width: 16px;

    border-radius: 3px;
}

.about-page-item.blue {
    height: 34px;
    background: #4f7cc9;
}

.about-page-item.cream {
    height: 26px;
    background: #e8e2d3;
}

.about-page-item.gray {
    height: 30px;
    background: #8f8f92;
}

.about-page-box {
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

.about-page-box-heart {
    display: block;

    margin-bottom: 4px;

    font-size: 15px;
}

.about-page-box-label {
    padding: 4px 7px;

    border-radius: 4px;

    background: #ffffff;
    color: var(--pink-deep);

    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1px;
}

/* =========================================================
   LAPTOP
========================================================= */

.about-page-photo-bottom {
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

.about-page-laptop-screen {
    position: absolute;
    top: 8%;
    right: 8%;
    bottom: 22%;
    left: 8%;

    padding: 9px;

    border-radius: 6px;

    background: #f4f2f8;
}

.about-page-laptop-bar {
    width: 60%;
    height: 5px;
    margin-bottom: 5px;

    border-radius: 3px;

    background: #e6def5;
}

.about-page-laptop-bar.small {
    width: 40%;
}

.about-page-laptop-chart {
    width: 100%;
    height: 40%;
    margin-top: 8px;
}

.about-page-laptop-base {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;

    height: 22%;

    background: #3a3a4a;
}

/* =========================================================
   PLAY BADGE
========================================================= */

.about-page-play-badge {
    position: absolute;
    top: 62%;
    left: 50%;
    z-index: 3;

    width: 120px;
    height: 120px;

    transform: translate(-50%, -50%);
}

.about-page-play-badge svg {
    width: 100%;
    height: 100%;
}

.about-page-play-circle {
    fill: var(--purple);

    filter:
        drop-shadow(
            0 10px 18px rgba(107, 84, 200, 0.45)
        );
}

.about-page-play-icon {
    fill: #ffffff;
}

.about-page-curved-text {
    fill: #ffffff;

    font-size: 8.4px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

/* =========================================================
   CONTENT
========================================================= */

.about-page-content {
    padding-top: 6px;
}

.about-page-kicker {
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

.about-page-kicker-dot {
    width: 8px;
    height: 8px;

    flex-shrink: 0;

    border-radius: 50%;

    background: var(--purple);
}

.about-page-kicker em {
    font-family: Georgia, serif;
    font-style: italic;
}

.about-page-title {
    margin-bottom: 20px;

    color: var(--ink);

    font-family: "Trebuchet MS", "Segoe UI", sans-serif;
    font-size: 26px;
    font-weight: 800;
    line-height: 1.4;
    text-align: right;
}

.about-page-description {
    margin-bottom: 16px;

    color: var(--muted);

    font-size: 13.5px;
    line-height: 1.75;
}

/* =========================================================
   DONATE BUTTON
========================================================= */

.about-page-donate-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 11px;

    min-width: 195px;
    min-height: 50px;
    margin-top: 16px;
    padding: 12px 22px;

    border: none;
    border-radius: 50px;

    background:
        linear-gradient(
            135deg,
            #9a86df 0%,
            #735cc6 100%
        );

    color: #ffffff !important;

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

.about-page-donate-button i {
    color: #ffffff;
}

.about-page-donate-label {
    display: inline-block;

    color: #ffffff !important;

    white-space: nowrap;
}

.about-page-button-arrow {
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

.about-page-donate-button:hover {
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

.about-page-donate-button:hover .about-page-button-arrow {
    background: rgba(255, 255, 255, 0.3);

    transform: translateX(4px);
}

.about-page-donate-button:active {
    transform: translateY(0);
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 900px) {
    .about-page-section {
        grid-template-columns: 1fr;

        padding: 40px 28px 70px;
    }

    .about-page-media {
        min-height: 430px;
        margin-bottom: 25px;
    }

    .about-page-kicker {
        justify-content: flex-start;
        text-align: left;
    }

    .about-page-title {
        text-align: left;
    }
}

@media (max-width: 560px) {
    .about-page-fade {
        height: 75px;
    }

    .about-page-section {
        padding: 30px 20px 60px;
    }

    .about-page-media {
        min-height: 330px;
    }

    .about-page-photo-top,
    .about-page-photo-bottom {
        width: 85%;
    }

    .about-page-play-badge {
        width: 95px;
        height: 95px;
    }

    .about-page-title {
        font-size: 23px;
    }

    .about-page-donate-button {
        width: 100%;
    }
}

<?= $this->endSection() ?>


<?= $this->section('content') ?>

<div class="about-page-fade"></div>

<section class="about-page-section">

    <div class="about-page-media">

        <div class="about-page-photo-top">

            <div class="about-page-items">
                <span class="about-page-item blue"></span>
                <span class="about-page-item cream"></span>
                <span class="about-page-item gray"></span>
            </div>

            <div class="about-page-box">

                <span class="about-page-box-heart">
                    🤍
                </span>

                <div class="about-page-box-label">
                    DONASI
                </div>

            </div>

        </div>

        <div class="about-page-photo-bottom">

            <div class="about-page-laptop-screen">

                <div class="about-page-laptop-bar"></div>

                <div class="about-page-laptop-bar small"></div>

                <svg
                    class="about-page-laptop-chart"
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

            <div class="about-page-laptop-base"></div>

        </div>

        <div class="about-page-play-badge">

            <svg
                viewBox="0 0 120 120"
                aria-hidden="true"
            >
                <defs>
                    <path
                        id="aboutPageCurve"
                        d="M 15,60 A 45,45 0 1,1 105,60"
                        fill="none"
                    />
                </defs>

                <circle
                    class="about-page-play-circle"
                    cx="60"
                    cy="60"
                    r="45"
                />

                <polygon
                    class="about-page-play-icon"
                    points="52,45 52,75 78,60"
                />

                <text class="about-page-curved-text">
                    <textPath
                        href="#aboutPageCurve"
                        startOffset="2%"
                    >
                        KELOLA DONASI UNTUK KEBAIKAN
                    </textPath>
                </text>
            </svg>

        </div>

    </div>

    <div class="about-page-content">

        <p class="about-page-kicker">
            <span class="about-page-kicker-dot"></span>
            About <em>Mirae</em>
        </p>

        <h1 class="about-page-title">
            Dedicated to Making Every Donation More Meaningful
        </h1>

        <p class="about-page-description">
            MIRAE adalah platform pengelolaan donasi yang dirancang
            untuk membantu organisasi, komunitas, dan yayasan dalam
            mengelola donatur serta donasi secara lebih mudah, aman,
            dan transparan.
        </p>

        <p class="about-page-description">
            Kami percaya bahwa transparansi dan akuntabilitas merupakan
            fondasi utama dalam membangun kepercayaan. Karena itu,
            MIRAE menghadirkan sistem yang membantu setiap donasi
            tercatat dan dikelola secara profesional.
        </p>

        <a
            href="<?= site_url('donate') ?>"
            class="about-page-donate-button"
        >
            <i class="fa-solid fa-heart"></i>

            <span class="about-page-donate-label">
                Donate Sekarang
            </span>

            <span class="about-page-button-arrow">
                <i class="fa-solid fa-arrow-right"></i>
            </span>
        </a>

    </div>

</section>

<?= $this->endSection() ?>