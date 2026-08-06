<?php

$hide_layout = true;
$show_footer = false;

?>

<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>

body.auth-login-page{
    min-height:100vh !important;
    margin:0;
    padding:0;
    overflow-x:hidden;
    background:
        radial-gradient(
            circle at top right,
            #ff6eb6 0%,
            transparent 28%
        ),
        linear-gradient(
            135deg,
            #e61d7b 0%,
            #f33d91 45%,
            #ff79b7 100%
        ) !important;
}

body.auth-login-page .page{
    width:100%;
    max-width:100%;
    min-height:100vh;
    margin:0;
    overflow:visible;
    background:transparent;
    box-shadow:none;
}

body.auth-login-page .navbar,
body.auth-login-page footer,
body.auth-login-page #contact{
    display:none !important;
}

/* =========================
   WRAPPER
========================= */

.al-wrap{
    display:flex;
    align-items:center;
    justify-content:center;
    width:100%;
    min-height:100vh;
    padding:30px;
}

.al-card{
    position:relative;
    display:grid;
    grid-template-columns:43% 57%;
    width:100%;
    max-width:1020px;
    min-height:610px;
    overflow:hidden;
    border-radius:22px;
    background:#f9ccda;
    box-shadow:0 25px 55px rgba(120,20,70,.28);
}

/* =========================
   PANEL GAMBAR
========================= */

.al-art{
    position:relative;
    min-width:0;
    margin:16px;
    overflow:hidden;
    border-radius:18px;
    background:#ffffff;
}

.al-brand{
    position:absolute;
    top:18px;
    left:22px;
    z-index:20;
    color:#ef4d87;
    font-family:"Brush Script MT","Segoe Script",cursive;
    font-size:34px;
    font-weight:bold;
    text-decoration:none;
}

.al-art-body{
    position:relative;
    width:100%;
    height:100%;
}

.al-art-body .char{
    position:absolute;
    bottom:0;
    left:-15px;
    z-index:2;
    display:block;
    width:88%;
    max-width:none;
    height:auto;
    object-fit:contain;
}

.al-art-body .dcard{
    position:absolute;
    top:28px;
    right:28px;
    z-index:5;
    display:block;
    width:115px;
    height:auto;
    transform:rotate(8deg);
}

/* =========================
   HIASAN TENGAH
========================= */

.middle-button{
    position:absolute;
    top:50%;
    left:43%;
    z-index:100;
    transform:translate(-50%,-50%);
    pointer-events:none;
}

.middle-button span{
    position:relative;
    display:block;
    width:44px;
    height:12px;
    margin:12px 0;
    border-radius:8px;
    background:#8977d9;
    box-shadow:0 2px 5px rgba(0,0,0,.15);
}

.middle-button span::before{
    content:"";
    position:absolute;
    top:0;
    left:-18px;
    width:12px;
    height:12px;
    border-radius:50%;
    background:#8977d9;
}

/* =========================
   PANEL FORM
========================= */

.al-form{
    display:flex;
    flex-direction:column;
    justify-content:center;
    min-width:0;
    padding:58px 56px 42px;
}

.al-form h1{
    margin:0;
    color:#ffffff;
    font-size:58px;
    font-weight:900;
    line-height:1;
}

.al-sub{
    margin:10px 0 30px;
    color:rgba(255,255,255,.88);
    font-size:14px;
    line-height:1.5;
}

.al-form label{
    display:block;
    margin-bottom:8px;
    color:#4d2340;
    font-size:13px;
    font-weight:700;
}

.al-field{
    display:flex;
    align-items:center;
    height:50px;
    margin-bottom:20px;
    padding:0 14px;
    border:2px solid transparent;
    border-radius:9px;
    background:#ffffff;
    transition:
        border-color .2s ease,
        box-shadow .2s ease;
}

.al-field:focus-within{
    border-color:#ef82b2;
    box-shadow:0 0 0 4px rgba(239,130,178,.16);
}

.al-field .fi{
    width:18px;
    height:18px;
    margin-right:10px;
    flex-shrink:0;
    color:#cb6f9d;
}

.al-field input{
    width:100%;
    min-width:0;
    border:none;
    outline:none;
    color:#333333;
    background:transparent;
    font-size:14px;
}

.al-field input::placeholder{
    color:#c39cb0;
}

.al-password-toggle{
    display:flex;
    align-items:center;
    justify-content:center;
    width:36px;
    height:36px;
    margin-left:5px;
    flex-shrink:0;
    border:none;
    border-radius:8px;
    color:#a16f88;
    background:transparent;
    cursor:pointer;
    transition:
        color .2s ease,
        background .2s ease;
}

.al-password-toggle:hover{
    color:#e03b84;
    background:#fff0f6;
}

.al-forgot{
    margin:-8px 0 24px;
    text-align:right;
}

.al-forgot span{
    color:#b56c91;
    font-size:12px;
}

/* =========================
   ALERT
========================= */

.al-alert{
    margin-bottom:20px;
    padding:11px 15px;
    border-radius:9px;
    font-size:13px;
    line-height:1.55;
}

.al-alert ul{
    margin:0;
    padding-left:18px;
}

.al-err{
    border:1px solid #f4b9bd;
    color:#a92522;
    background:#ffe7e8;
}

.al-ok{
    border:1px solid #bde4c6;
    color:#21743c;
    background:#e4f8e7;
}

/* =========================
   BUTTON
========================= */

.al-btn{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:9px;
    width:100%;
    height:54px;
    border:none;
    border-radius:10px;
    color:#ffffff;
    background:linear-gradient(
        180deg,
        #ffd156,
        #f0b228
    );
    box-shadow:0 10px 22px rgba(233,174,40,.35);
    font-size:18px;
    font-weight:800;
    cursor:pointer;
    transition:
        transform .2s ease,
        box-shadow .2s ease,
        opacity .2s ease;
}

.al-btn:hover:not(:disabled){
    box-shadow:0 14px 26px rgba(233,174,40,.43);
    transform:translateY(-2px);
}

.al-btn:active:not(:disabled){
    transform:translateY(0);
}

.al-btn:disabled{
    opacity:.7;
    cursor:not-allowed;
}

/* =========================
   DIVIDER DAN SOCIAL
========================= */

.al-div{
    display:flex;
    align-items:center;
    margin:25px 0 19px;
    color:#ffffff;
    font-size:12px;
}

.al-div::before,
.al-div::after{
    content:"";
    height:1px;
    flex:1;
    background:rgba(255,255,255,.45);
}

.al-div::before{
    margin-right:12px;
}

.al-div::after{
    margin-left:12px;
}

.al-social{
    display:flex;
    justify-content:center;
    gap:16px;
    margin-bottom:23px;
}

.al-sb{
    display:flex;
    align-items:center;
    justify-content:center;
    width:46px;
    height:46px;
    border:1px solid rgba(255,255,255,.5);
    border-radius:12px;
    background:rgba(255,255,255,.18);
    opacity:.65;
    cursor:not-allowed;
}

.al-sb svg{
    width:20px;
    height:20px;
}

.al-social-note{
    margin-top:-14px;
    margin-bottom:22px;
    color:rgba(255,255,255,.72);
    font-size:10.5px;
    text-align:center;
}

/* =========================
   BOTTOM
========================= */

.al-bottom{
    color:#ffffff;
    font-size:13px;
    text-align:center;
}

.al-bottom a{
    color:#ffffff;
    font-weight:bold;
    text-decoration:none;
}

.al-bottom a:hover{
    text-decoration:underline;
}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:900px){

    body.auth-login-page{
        overflow-y:auto;
    }

    .al-wrap{
        padding:24px;
    }

    .al-card{
        grid-template-columns:1fr;
        max-width:650px;
        min-height:0;
    }

    .al-art{
        min-height:290px;
    }

    .al-art-body .char{
        left:20%;
        width:58%;
    }

    .al-art-body .dcard{
        right:25px;
        width:90px;
    }

    .middle-button{
        display:none;
    }

    .al-form{
        padding:38px 32px;
    }

    .al-form h1{
        font-size:45px;
    }
}

@media(max-width:520px){

    .al-wrap{
        padding:14px;
    }

    .al-card{
        border-radius:18px;
    }

    .al-art{
        min-height:230px;
        margin:11px;
    }

    .al-brand{
        top:14px;
        left:17px;
        font-size:29px;
    }

    .al-art-body .char{
        left:14%;
        width:70%;
    }

    .al-art-body .dcard{
        top:22px;
        right:18px;
        width:75px;
    }

    .al-form{
        padding:31px 21px 34px;
    }

    .al-form h1{
        font-size:39px;
    }

    .al-sub{
        margin-bottom:25px;
    }
}

<?= $this->endSection() ?>


<?= $this->section('content') ?>

<?php

$error   = session()->getFlashdata('error');
$errors  = session()->getFlashdata('errors') ?? [];
$success = session()->getFlashdata('success');

?>

<div class="al-wrap">

    <div class="al-card">

        <div class="middle-button" aria-hidden="true">
            <span></span>
            <span></span>
        </div>

        <!-- PANEL GAMBAR -->
        <div class="al-art">

            <a
                href="<?= site_url('/') ?>"
                class="al-brand"
                aria-label="Kembali ke halaman utama"
            >
                Mirae.
            </a>

            <div class="al-art-body">

                <img
                    class="char"
                    src="<?= base_url(
                        'uploads/login/character.png'
                    ) ?>"
                    alt="Ilustrasi donasi"
                >

                <img
                    class="dcard"
                    src="<?= base_url(
                        'uploads/login/donation-card.png'
                    ) ?>"
                    alt="Kartu donasi"
                >

            </div>

        </div>

        <!-- PANEL LOGIN -->
        <main class="al-form">

            <h1>Login</h1>

            <p class="al-sub">
                Selamat datang kembali. Silakan masuk untuk
                melanjutkan.
            </p>

            <?php if (! empty($error)): ?>
                <div
                    class="al-alert al-err"
                    role="alert"
                >
                    <?= esc($error) ?>
                </div>
            <?php endif; ?>

            <?php if (! empty($errors)): ?>
                <div
                    class="al-alert al-err"
                    role="alert"
                >
                    <ul>
                        <?php foreach ($errors as $message): ?>
                            <li><?= esc($message) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (! empty($success)): ?>
                <div
                    class="al-alert al-ok"
                    role="status"
                >
                    <?= esc($success) ?>
                </div>
            <?php endif; ?>

            <form
                id="loginForm"
                action="<?= site_url('login') ?>"
                method="post"
            >
                <?= csrf_field() ?>

                <label for="identity">
                    Email atau Username
                </label>

                <div class="al-field">

                    <svg
                        class="fi"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <rect
                            x="2"
                            y="4"
                            width="20"
                            height="16"
                            rx="3"
                        />

                        <path
                            d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"
                        />
                    </svg>

                    <input
                        id="identity"
                        name="identity"
                        type="text"
                        placeholder="Email atau username"
                        value="<?= esc(
                            old('identity'),
                            'attr'
                        ) ?>"
                        required
                        maxlength="100"
                        autocomplete="username"
                        autofocus
                    >

                </div>

                <label for="password">
                    Password
                </label>

                <div class="al-field">

                    <svg
                        class="fi"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <rect
                            x="3"
                            y="11"
                            width="18"
                            height="11"
                            rx="2"
                        />

                        <path
                            d="M7 11V7a5 5 0 0 1 10 0v4"
                        />
                    </svg>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Masukkan password"
                        required
                        maxlength="255"
                        autocomplete="current-password"
                    >

                    <button
                        type="button"
                        class="al-password-toggle"
                        id="passwordToggle"
                        aria-label="Tampilkan password"
                        aria-controls="password"
                    >
                        <i
                            class="fa-solid fa-eye"
                            aria-hidden="true"
                        ></i>
                    </button>

                </div>

                <div class="al-forgot">
                    <span>
                        Fitur lupa password belum tersedia.
                    </span>
                </div>

                <button
                    class="al-btn"
                    id="loginButton"
                    type="submit"
                >
                    <span>Login</span>

                    <i
                        class="fa-solid fa-arrow-right-to-bracket"
                        aria-hidden="true"
                    ></i>
                </button>

            </form>

            <div class="al-div">
                Login sosial
            </div>

            <div
                class="al-social"
                aria-label="Login sosial belum tersedia"
            >

                <button
                    type="button"
                    class="al-sb"
                    title="Google belum tersedia"
                    disabled
                >
                    <svg
                        viewBox="0 0 24 24"
                        aria-hidden="true"
                    >
                        <path
                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 0 1-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z"
                            fill="#4285F4"
                        />

                        <path
                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                            fill="#34A853"
                        />

                        <path
                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                            fill="#FBBC05"
                        />

                        <path
                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                            fill="#EA4335"
                        />
                    </svg>
                </button>

                <button
                    type="button"
                    class="al-sb"
                    title="Facebook belum tersedia"
                    disabled
                >
                    <svg
                        viewBox="0 0 24 24"
                        aria-hidden="true"
                    >
                        <path
                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                            fill="#1877F2"
                        />
                    </svg>
                </button>

                <button
                    type="button"
                    class="al-sb"
                    title="Apple belum tersedia"
                    disabled
                >
                    <svg
                        viewBox="0 0 24 24"
                        aria-hidden="true"
                    >
                        <path
                            d="M17.05 20.28c-.98.95-2.05.88-3.08.4-1.09-.5-2.08-.48-3.24 0-1.44.62-2.2.44-3.06-.4C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.09zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.32 2.32-2.12 4.52-3.74 4.25z"
                            fill="#000000"
                        />
                    </svg>
                </button>

            </div>

            <p class="al-social-note">
                Login Google, Facebook, dan Apple belum diaktifkan.
            </p>

            <div class="al-bottom">
                Belum mempunyai akun?

                <a href="<?= site_url('register') ?>">
                    Daftar di sini
                </a>
            </div>

        </main>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const passwordToggle = document.getElementById(
        'passwordToggle'
    );

    const loginForm = document.getElementById('loginForm');
    const loginButton = document.getElementById(
        'loginButton'
    );

    if (passwordInput && passwordToggle) {
        passwordToggle.addEventListener(
            'click',
            function () {
                const showPassword =
                    passwordInput.type === 'password';

                passwordInput.type = showPassword
                    ? 'text'
                    : 'password';

                const icon = passwordToggle.querySelector('i');

                if (icon) {
                    icon.classList.toggle(
                        'fa-eye',
                        ! showPassword
                    );

                    icon.classList.toggle(
                        'fa-eye-slash',
                        showPassword
                    );
                }

                passwordToggle.setAttribute(
                    'aria-label',
                    showPassword
                        ? 'Sembunyikan password'
                        : 'Tampilkan password'
                );
            }
        );
    }

    if (loginForm && loginButton) {
        loginForm.addEventListener(
            'submit',
            function () {
                if (! loginForm.checkValidity()) {
                    return;
                }

                loginButton.disabled = true;

                loginButton.innerHTML =
                    '<i class="fa-solid fa-spinner fa-spin"></i>'
                    + '<span>Memproses...</span>';
            }
        );
    }
});
</script>

<?= $this->endSection() ?>