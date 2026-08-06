<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Mirae — SimplePay') ?></title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    >

    <style>
        :root {
            --pink-deep: #e0407a;
            --pink-primary: #ef4f8d;
            --pink-light: #ff9abd;
            --pink-soft: #fff1f6;
            --purple: #8b7cd6;
            --ink: #2c1828;
            --muted: #7c6874;
            --line: #ecdbe3;
            --white: #ffffff;
            --danger: #dc3545;
            --success: #239657;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            font-family: "Segoe UI", system-ui, -apple-system, sans-serif;
            color: var(--ink);
            background: #ffffff;
        }

        body.modal-open {
            overflow: hidden;
        }

        button,
        input {
            font: inherit;
        }

        .page {
            position: relative;
            max-width: 1200px;
            min-height: 100vh;
            margin: 0 auto;
            overflow: visible;
            background: #ffffff;
            box-shadow: 0 20px 50px rgba(120, 20, 70, 0.15);
        }

        /* LOGIN / REGISTER */
        .login-page,
        .auth-login-page,
        .auth-register-page {
            min-height: 100vh;
            background:
                radial-gradient(
                    circle at top right,
                    rgba(255, 144, 190, 0.9) 0%,
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #e91e8c 0%,
                    #ff4f9e 45%,
                    #ff8ec1 100%
                );
        }

        .login-page .page,
        .auth-login-page .page,
        .auth-register-page .page {
            max-width: 100%;
            margin: 0;
            overflow: visible;
            background: transparent;
            box-shadow: none;
        }

        /* NAVBAR */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 5000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 88px;
            padding: 16px 48px;
            overflow: visible;
            border-bottom: 1px solid rgba(224, 64, 122, 0.08);
            background: linear-gradient(
                180deg,
                rgba(255, 238, 244, 0.97) 0%,
                rgba(255, 216, 231, 0.97) 100%
            );
            box-shadow: 0 8px 25px rgba(91, 35, 65, 0.06);
            backdrop-filter: blur(14px);
        }

        .logo {
            display: flex;
            align-items: baseline;
            gap: 8px;
            flex-shrink: 0;
            text-decoration: none;
        }

        .logo .name {
            font-family: "Brush Script MT", "Segoe Script", cursive;
            font-size: 32px;
            font-style: italic;
            font-weight: 700;
            color: transparent;
            background: linear-gradient(90deg, #e0407a, #f68db4);
            background-clip: text;
            -webkit-background-clip: text;
        }

        .logo .tag {
            align-self: flex-end;
            margin-bottom: 4px;
            color: #5aa8d9;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 32px;
            list-style: none;
        }

        .nav-links > li > a:not(.user-toggle),
        .nav-login-link {
            position: relative;
            color: var(--ink);
            font-size: 15px;
            font-weight: 650;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .nav-links > li > a:not(.user-toggle)::after,
        .nav-login-link::after {
            content: "";
            position: absolute;
            right: 0;
            bottom: -8px;
            left: 0;
            height: 2px;
            border-radius: 20px;
            background: var(--pink-deep);
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.2s ease;
        }

        .nav-links > li > a:hover,
        .nav-links > li > a.active {
            color: var(--pink-deep);
        }

        .nav-links > li > a:hover::after,
        .nav-links > li > a.active::after {
            transform: scaleX(1);
        }

        /* USER MENU */
        .user-menu {
            position: relative;
            list-style: none;
        }

        .user-menu::after {
            content: "";
            position: absolute;
            top: 100%;
            right: 0;
            width: 350px;
            height: 18px;
        }

        .user-toggle {
            display: flex;
            align-items: center;
            gap: 11px;
            min-width: 190px;
            padding: 7px 12px;
            border: 1px solid transparent;
            border-radius: 50px;
            color: var(--ink);
            background: transparent;
            text-align: left;
            cursor: pointer;
            transition:
                background 0.25s ease,
                border-color 0.25s ease,
                box-shadow 0.25s ease;
        }

        .user-toggle:hover,
        .user-toggle:focus-visible,
        .user-menu.is-open .user-toggle {
            outline: none;
            border-color: rgba(224, 64, 122, 0.12);
            background: rgba(255, 255, 255, 0.82);
            box-shadow: 0 12px 28px rgba(89, 32, 62, 0.11);
        }

        .user-avatar,
        .profile-circle,
        .profile-modal-avatar,
        .settings-avatar-circle {
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
            border-radius: 50%;
            font-weight: 800;
        }

        .user-avatar {
            width: 46px;
            height: 46px;
            border: 3px solid rgba(255, 255, 255, 0.9);
            color: #ffffff;
            background: linear-gradient(135deg, #ff5f9e, #8e7dff);
            box-shadow: 0 6px 16px rgba(148, 69, 121, 0.2);
            font-size: 18px;
        }

        .user-avatar img,
        .profile-circle img,
        .profile-modal-avatar img,
        .settings-avatar-circle img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-info {
            display: flex;
            flex: 1;
            flex-direction: column;
            min-width: 0;
        }

        .user-name {
            max-width: 115px;
            overflow: hidden;
            color: #33212d;
            font-size: 14px;
            font-weight: 750;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .user-info small {
            margin-top: 2px;
            color: #967f8c;
            font-size: 12px;
        }

        .user-menu-arrow {
            margin-left: auto;
            color: #8b7480;
            font-size: 12px;
            transition: transform 0.25s ease;
        }

        .user-menu:hover .user-menu-arrow,
        .user-menu:focus-within .user-menu-arrow,
        .user-menu.is-open .user-menu-arrow {
            transform: rotate(180deg);
        }

        /* USER DROPDOWN */
        .user-dropdown {
            position: absolute;
            top: calc(100% + 14px);
            right: 0;
            z-index: 6000;
            display: flex;
            flex-direction: column;
            width: 350px;
            overflow: hidden;
            border: 1px solid rgba(224, 64, 122, 0.08);
            border-radius: 22px;
            background: #ffffff;
            box-shadow: 0 30px 75px rgba(71, 28, 51, 0.22);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transform: translateY(14px) scale(0.98);
            transform-origin: top right;
            transition:
                opacity 0.22s ease,
                visibility 0.22s ease,
                transform 0.22s ease;
        }

        .user-menu:hover .user-dropdown,
        .user-menu:focus-within .user-dropdown,
        .user-menu.is-open .user-dropdown {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transform: translateY(0) scale(1);
        }

        .dropdown-header {
            display: flex;
            align-items: center;
            gap: 16px;
            min-height: 112px;
            padding: 22px;
            color: #ffffff;
            background:
                radial-gradient(
                    circle at top right,
                    rgba(255, 255, 255, 0.3),
                    transparent 38%
                ),
                linear-gradient(135deg, #ec3f80, #ff82ae);
        }

        .profile-circle {
            width: 64px;
            height: 64px;
            border: 4px solid rgba(255, 255, 255, 0.75);
            color: #ed4b88;
            background: #ffffff;
            box-shadow: 0 8px 20px rgba(102, 32, 64, 0.18);
            font-size: 25px;
        }

        .dropdown-header-info {
            min-width: 0;
        }

        .dropdown-header h5 {
            max-width: 220px;
            margin: 0 0 7px;
            overflow: hidden;
            color: #ffffff;
            font-size: 18px;
            font-weight: 800;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .dropdown-header span {
            display: block;
            max-width: 220px;
            overflow: hidden;
            color: rgba(255, 255, 255, 0.92);
            font-size: 13px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .dropdown-menu-body {
            display: flex;
            flex-direction: column;
            padding: 10px 0;
            background: #ffffff;
        }

        .dropdown-divider {
            width: 100%;
            height: 1px;
            background: #f2e6eb;
        }

        .user-dropdown a,
        .user-dropdown .dropdown-action {
            display: flex;
            align-items: center;
            gap: 14px;
            width: 100%;
            min-height: 54px;
            padding: 14px 22px;
            border: none;
            color: #40303a;
            background: #ffffff;
            font-size: 15px;
            font-weight: 650;
            text-align: left;
            text-decoration: none;
            cursor: pointer;
            transition:
                color 0.2s ease,
                background 0.2s ease,
                padding-left 0.2s ease;
        }

        .user-dropdown a i,
        .user-dropdown .dropdown-action i {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 25px;
            color: #f2578e;
            font-size: 17px;
            transition: transform 0.2s ease;
        }

        .user-dropdown a:hover,
        .user-dropdown .dropdown-action:hover {
            padding-left: 29px;
            color: #e42c70;
            background: linear-gradient(90deg, #fff1f6, #fff9fb);
        }

        .user-dropdown a:hover i,
        .user-dropdown .dropdown-action:hover i {
            transform: scale(1.08);
        }

        .user-dropdown .logout,
        .user-dropdown .logout i {
            color: #d9303e;
        }

        .user-dropdown .logout:hover {
            color: #c72130;
            background: #fff0f1;
        }

        .logout-form {
            width: 100%;
            margin: 0;
        }

        /* MOBILE MENU */
        .menu-toggle {
            display: none;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 5px;
            width: 42px;
            height: 42px;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.65);
            cursor: pointer;
        }

        .menu-toggle span {
            width: 24px;
            height: 3px;
            border-radius: 20px;
            background: var(--ink);
        }

        /* MODAL */
        .profile-modal {
            position: fixed;
            inset: 0;
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: rgba(39, 19, 32, 0.6);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            backdrop-filter: blur(7px);
            transition:
                opacity 0.25s ease,
                visibility 0.25s ease;
        }

        .profile-modal.is-open {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .profile-modal-dialog {
            position: relative;
            width: 100%;
            max-width: 620px;
            max-height: calc(100vh - 48px);
            overflow-x: hidden;
            overflow-y: auto;
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 26px;
            background: #ffffff;
            box-shadow: 0 35px 90px rgba(45, 17, 33, 0.35);
            transform: translateY(24px) scale(0.97);
            transition: transform 0.25s ease;
        }

        .profile-modal.is-open .profile-modal-dialog {
            transform: translateY(0) scale(1);
        }

        .profile-modal-close {
            position: absolute;
            top: 16px;
            right: 16px;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border: none;
            border-radius: 50%;
            color: #654556;
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 8px 20px rgba(50, 20, 37, 0.14);
            cursor: pointer;
            transition:
                color 0.2s ease,
                background 0.2s ease,
                transform 0.2s ease;
        }

        .profile-modal-close:hover {
            color: #e33678;
            background: #ffffff;
            transform: rotate(6deg);
        }

        .profile-modal-header {
            padding: 38px 30px 30px;
            color: #ffffff;
            text-align: center;
            background:
                radial-gradient(
                    circle at top right,
                    rgba(255, 255, 255, 0.25),
                    transparent 35%
                ),
                linear-gradient(135deg, #e83d7d, #ff80ac);
        }

        .profile-modal-avatar {
            width: 96px;
            height: 96px;
            margin: 0 auto 16px;
            border: 5px solid rgba(255, 255, 255, 0.8);
            color: #ec4381;
            background: #ffffff;
            box-shadow: 0 14px 30px rgba(90, 25, 55, 0.22);
            font-size: 36px;
        }

        .profile-modal-header h2 {
            margin-bottom: 6px;
            color: #ffffff;
            font-size: 25px;
            font-weight: 850;
        }

        .profile-modal-account {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 7px;
            margin: 0;
            color: rgba(255, 255, 255, 0.92);
            font-size: 14px;
        }

        .profile-modal-account-separator {
            opacity: 0.7;
        }

        .profile-modal-content {
            padding: 26px 30px 30px;
        }

        .profile-data {
            display: flex;
            flex-direction: column;
        }

        .profile-data-row {
            display: grid;
            grid-template-columns: 145px minmax(0, 1fr);
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #f1e5eb;
        }

        .profile-data-row:last-child {
            border-bottom: none;
        }

        .profile-data-row span {
            color: #8b7480;
            font-size: 14px;
        }

        .profile-data-row strong {
            color: #36232f;
            font-size: 14px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .profile-status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            width: max-content;
            color: var(--success) !important;
        }

        .profile-status::before {
            content: "";
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #2bc96d;
            box-shadow: 0 0 0 4px rgba(43, 201, 109, 0.12);
        }

        /* SETTINGS */
        .settings-modal-header {
            padding: 30px 30px 23px;
            border-bottom: 1px solid #f0e2e8;
            background: linear-gradient(180deg, #fff9fb, #ffffff);
        }

        .settings-modal-header h2 {
            margin-bottom: 7px;
            color: #35222e;
            font-size: 25px;
            font-weight: 850;
        }

        .settings-modal-header p {
            color: #89727e;
            font-size: 14px;
            line-height: 1.6;
        }

        .settings-form {
            padding: 25px 30px 30px;
        }

        .settings-avatar-preview {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 22px;
            padding: 18px;
            border: 1px solid #f0dfe7;
            border-radius: 16px;
            background: #fff8fb;
        }

        .settings-avatar-circle {
            width: 82px;
            height: 82px;
            border: 4px solid #ffffff;
            color: #ffffff;
            background: linear-gradient(135deg, #ff5f9e, #8e7dff);
            box-shadow: 0 9px 22px rgba(122, 61, 99, 0.2);
            font-size: 29px;
        }

        .settings-avatar-input {
            flex: 1;
            min-width: 0;
        }

        .settings-avatar-input label,
        .settings-field label {
            display: block;
            margin-bottom: 8px;
            color: #49313e;
            font-size: 13px;
            font-weight: 750;
        }

        .settings-avatar-input input {
            display: block;
            width: 100%;
            color: #6f5965;
            font-size: 12px;
        }

        .settings-avatar-input input::file-selector-button {
            margin-right: 10px;
            padding: 8px 12px;
            border: none;
            border-radius: 8px;
            color: #d93373;
            background: #ffe6ef;
            font-weight: 700;
            cursor: pointer;
        }

        .settings-avatar-input small {
            display: block;
            margin-top: 8px;
            color: #927c87;
            font-size: 11px;
            line-height: 1.5;
        }

        .settings-section {
            margin-bottom: 22px;
            padding: 20px;
            border: 1px solid #f0dce5;
            border-radius: 16px;
            background: linear-gradient(145deg, #fffafd, #ffffff);
        }

        .settings-section-heading {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }

        .settings-section-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border-radius: 12px;
            color: #ffffff;
            background: linear-gradient(135deg, #e0407a, #ff79a7);
            box-shadow: 0 8px 18px rgba(224, 64, 122, 0.22);
        }

        .settings-section-heading h3 {
            margin: 0 0 4px;
            color: #3b2532;
            font-size: 16px;
        }

        .settings-section-heading p {
            margin: 0;
            color: #8a737f;
            font-size: 12px;
            line-height: 1.5;
        }

        .settings-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .settings-field {
            margin-bottom: 18px;
        }

        .settings-field:last-child {
            margin-bottom: 0;
        }

        .settings-field input {
            width: 100%;
            height: 47px;
            padding: 0 14px;
            border: 1px solid #e7d5de;
            border-radius: 11px;
            outline: none;
            color: #36232f;
            background: #ffffff;
            font-size: 14px;
            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .settings-field input:focus {
            border-color: #ef679a;
            box-shadow: 0 0 0 4px rgba(239, 103, 154, 0.12);
        }

        .settings-password-input {
            position: relative;
        }

        .settings-password-input input {
            padding-right: 48px;
        }

        .password-visibility-button {
            position: absolute;
            top: 50%;
            right: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border: none;
            border-radius: 8px;
            color: #947b88;
            background: transparent;
            cursor: pointer;
            transform: translateY(-50%);
            transition:
                color 0.2s ease,
                background 0.2s ease;
        }

        .password-visibility-button:hover {
            color: #e0407a;
            background: #fff0f5;
        }

        .settings-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 18px;
        }

        .settings-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 115px;
            min-height: 44px;
            padding: 11px 18px;
            border: none;
            border-radius: 11px;
            font-size: 14px;
            font-weight: 750;
            cursor: pointer;
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        .settings-button.cancel {
            color: #604957;
            background: #f4edf1;
        }

        .settings-button.cancel:hover {
            background: #ece1e7;
        }

        .settings-button.save {
            color: #ffffff;
            background: linear-gradient(135deg, #e53c7b, #ff719f);
            box-shadow: 0 9px 20px rgba(224, 64, 122, 0.25);
        }

        .settings-button.save:hover {
            box-shadow: 0 12px 25px rgba(224, 64, 122, 0.32);
            transform: translateY(-2px);
        }

        .profile-errors {
            margin-bottom: 20px;
            padding: 14px 17px;
            border: 1px solid #f5c7cd;
            border-radius: 11px;
            color: #a82738;
            background: #fff0f2;
            font-size: 13px;
            line-height: 1.6;
        }

        .profile-errors ul {
            padding-left: 18px;
        }

        /* TOAST */
        .profile-toast {
            position: fixed;
            top: 100px;
            left: 50%;
            z-index: 11000;
            display: flex;
            align-items: center;
            gap: 9px;
            max-width: calc(100% - 30px);
            padding: 13px 21px;
            border: 1px solid #c7eed5;
            border-radius: 12px;
            color: #20733f;
            background: #e7f9ed;
            box-shadow: 0 14px 35px rgba(25, 89, 51, 0.17);
            font-size: 14px;
            font-weight: 700;
            transform: translateX(-50%);
            transition:
                opacity 0.3s ease,
                transform 0.3s ease;
        }

        .profile-toast.hide {
            opacity: 0;
            transform: translate(-50%, -18px);
        }

        /* FOOTER */
        footer {
            padding: 44px 56px 30px;
            background: linear-gradient(180deg, #fdeef1 0%, #fce3e9 100%);
        }

        .footer-top {
            display: grid;
            grid-template-columns: 1.1fr 1fr 1fr 1fr 1fr;
            gap: 24px;
            padding-bottom: 34px;
        }

        .brand-col .name {
            display: block;
            color: transparent;
            background: linear-gradient(90deg, #e0407a, #f4a3c0);
            background-clip: text;
            -webkit-background-clip: text;
            font-family: "Brush Script MT", "Segoe Script", cursive;
            font-size: 32px;
            font-style: italic;
            font-weight: 700;
        }

        .brand-col .tag {
            margin: -4px 0 20px 4px;
            color: #5aa8d9;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .lang-select {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 14px;
            border-radius: 8px;
            background: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
            cursor: pointer;
        }

        .lang-select span {
            color: var(--pink-deep);
            font-size: 13px;
            font-weight: 700;
            text-decoration: underline;
        }

        .footer-col h4 {
            margin-bottom: 14px;
            color: var(--ink);
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col li {
            margin-bottom: 9px;
        }

        .footer-col a {
            color: var(--muted);
            font-size: 12.5px;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-col a:hover {
            color: var(--pink-deep);
        }

        .divider {
            height: 1px;
            margin-bottom: 20px;
            background: var(--line);
        }

        .footer-bottom p {
            color: var(--muted);
            font-size: 11.5px;
            line-height: 1.9;
        }

        .footer-bottom p.copyright {
            color: var(--ink);
            font-weight: 700;
        }

        /* RESPONSIVE */
        @media (max-width: 1050px) {
            .navbar {
                padding-right: 28px;
                padding-left: 28px;
            }

            .nav-links {
                gap: 20px;
            }

            .user-toggle {
                min-width: 170px;
            }

            .footer-top {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 850px) {
            .navbar {
                min-height: 74px;
                padding: 13px 20px;
            }

            .menu-toggle {
                display: flex;
            }

            .nav-links {
                position: absolute;
                top: calc(100% + 1px);
                right: 16px;
                left: 16px;
                display: none;
                align-items: stretch;
                flex-direction: column;
                gap: 0;
                padding: 12px;
                border: 1px solid #f1dce5;
                border-radius: 18px;
                background: #ffffff;
                box-shadow: 0 25px 60px rgba(71, 28, 51, 0.2);
            }

            .nav-links.open {
                display: flex;
            }

            .nav-links > li {
                width: 100%;
            }

            .nav-links > li > a:not(.user-toggle),
            .nav-login-link {
                display: block;
                width: 100%;
                padding: 13px 15px;
                border-radius: 10px;
            }

            .nav-links > li > a::after {
                display: none;
            }

            .nav-links > li > a:hover {
                background: var(--pink-soft);
            }

            .user-menu {
                width: 100%;
            }

            .user-menu::after {
                display: none;
            }

            .user-toggle {
                width: 100%;
                min-width: 0;
                margin-top: 5px;
                padding: 9px 12px;
                border-radius: 14px;
                background: #fff7fa;
            }

            .user-name {
                max-width: none;
            }

            .user-dropdown {
                position: static;
                display: none;
                width: 100%;
                margin-top: 9px;
                opacity: 1;
                visibility: visible;
                pointer-events: auto;
                transform: none;
                box-shadow: 0 12px 30px rgba(71, 28, 51, 0.13);
            }

            .user-menu:hover .user-dropdown,
            .user-menu:focus-within .user-dropdown {
                display: none;
            }

            .user-menu.is-open .user-dropdown {
                display: flex;
            }

            .footer-top {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .logo .name {
                font-size: 28px;
            }

            .profile-modal {
                align-items: flex-end;
                padding: 0;
            }

            .profile-modal-dialog {
                max-width: 100%;
                max-height: 92vh;
                border-radius: 24px 24px 0 0;
                transform: translateY(100%);
            }

            .profile-modal.is-open .profile-modal-dialog {
                transform: translateY(0);
            }

            .profile-modal-content,
            .settings-form,
            .settings-modal-header {
                padding-right: 20px;
                padding-left: 20px;
            }

            .profile-data-row,
            .settings-row {
                grid-template-columns: 1fr;
            }

            .profile-data-row {
                gap: 5px;
            }

            .settings-row {
                gap: 0;
            }

            .settings-avatar-preview {
                align-items: flex-start;
                flex-direction: column;
            }

            .settings-avatar-input {
                width: 100%;
            }

            .settings-section {
                padding: 16px;
            }

            .settings-actions {
                flex-direction: column-reverse;
            }

            .settings-button {
                width: 100%;
            }

            footer {
                padding: 36px 25px 25px;
            }

            .footer-top {
                grid-template-columns: 1fr;
            }
        }

        <?= $this->renderSection('styles') ?>
    </style>
</head>

<?php

$uriSegment = service('uri')->getSegment(1);

$hideMainLayout = (bool) ($hide_layout ?? false)
    || in_array($uriSegment, ['login', 'register'], true);

/*
 * Autentikasi menggunakan session CodeIgniter.
 *
 * Prioritas pertama menggunakan helper session_auth:
 * - logged_in()
 * - current_user()
 *
 * Fallback langsung ke session dan UserModel disediakan agar layout
 * tetap aman ketika helper belum termuat pada suatu controller.
 */
$isLoggedIn = function_exists('logged_in')
    ? logged_in()
    : (
        session()->get('is_logged_in') === true
        && (int) session()->get('user_id') > 0
    );

$profileUser = null;

if ($isLoggedIn) {
    if (function_exists('current_user')) {
        $profileUser = current_user();
    } else {
        $userId = (int) session()->get('user_id');

        if ($userId > 0) {
            $profileUser = model(\App\Models\UserModel::class)
                ->find($userId);
        }
    }
}

if (! is_array($profileUser)) {
    $profileUser = null;
}

$profileEmail    = '';
$profileUsername = '';
$profileName     = '';
$profileInitial  = 'U';
$profileRole     = 'Member';
$profileAvatar   = null;
$profileJoined   = '-';

$profileErrors  = session()->getFlashdata('profile_errors') ?? [];
$profileSuccess = session()->getFlashdata('profile_success');
$openSettings   = (bool) session()->getFlashdata('open_settings');

if ($profileUser !== null) {
    $profileUsername = trim(
        (string) ($profileUser['username'] ?? '')
    );

    if ($profileUsername === '') {
        $profileUsername = 'pengguna';
    }

    $firstName = trim(
        (string) ($profileUser['first_name'] ?? '')
    );

    $lastName = trim(
        (string) ($profileUser['last_name'] ?? '')
    );

    $profileName = trim($firstName . ' ' . $lastName);

    if ($profileName === '') {
        $profileName = $profileUsername;
    }

    $profileInitial = strtoupper(
        substr($profileName, 0, 1)
    );

    $role = trim(
        (string) ($profileUser['role'] ?? '')
    );

    $profileRole = ucfirst(
        $role !== '' ? $role : 'member'
    );

    /* Email dibaca langsung dari kolom users.email. */
    $profileEmail = strtolower(
        trim((string) ($profileUser['email'] ?? ''))
    );

    $avatarPath = trim(
        (string) ($profileUser['avatar'] ?? '')
    );

    if ($avatarPath !== '') {
        $profileAvatar = preg_match('#^https?://#i', $avatarPath)
            ? $avatarPath
            : base_url(ltrim($avatarPath, '/'));
    }

    $createdAt = trim(
        (string) ($profileUser['created_at'] ?? '')
    );

    if ($createdAt !== '') {
        $createdTimestamp = strtotime($createdAt);

        if ($createdTimestamp !== false) {
            $profileJoined = date('d M Y', $createdTimestamp);
        }
    }
}

?>

<body
    class="<?= esc($body_class ?? '') ?>"
    data-open-settings="<?= $openSettings ? '1' : '0' ?>"
>

<div class="page">

    <?php if (! $hideMainLayout): ?>
        <nav class="navbar">
            <a href="<?= site_url('/') ?>" class="logo">
                <span class="name">Mirae</span>
                <span class="tag">SimplePay</span>
            </a>

            <ul class="nav-links" id="navLinks">
                <li>
                    <a
                        href="<?= site_url('/') ?>"
                        class="<?= $uriSegment === '' ? 'active' : '' ?>"
                    >
                        Home
                    </a>
                </li>

                <li>
                    <a
                        href="<?= site_url('about') ?>"
                        class="<?= $uriSegment === 'about' ? 'active' : '' ?>"
                    >
                        About Me
                    </a>
                </li>

                <li>
                    <a
                        href="<?= site_url('donate') ?>"
                        class="<?= $uriSegment === 'donate' ? 'active' : '' ?>"
                    >
                        Donate
                    </a>
                </li>

                <li>
                    <a href="https://wa.me/6287815693767" target="_blank">Contact</a>
                </li>

                <?php if ($profileUser !== null): ?>
                    <li class="user-menu" id="userMenu">
                        <button
                            type="button"
                            class="user-toggle"
                            id="userMenuToggle"
                            aria-expanded="false"
                            aria-controls="userDropdown"
                        >
                            <div class="user-avatar">
                                <?php if ($profileAvatar !== null): ?>
                                    <img
                                        src="<?= esc($profileAvatar, 'attr') ?>"
                                        alt="Foto profil"
                                    >
                                <?php else: ?>
                                    <?= esc($profileInitial) ?>
                                <?php endif; ?>
                            </div>

                            <div class="user-info">
                                <span class="user-name">
                                    <?= esc($profileUsername) ?>
                                </span>
                                <small><?= esc($profileRole) ?></small>
                            </div>

                            <i
                                class="fa-solid fa-chevron-down user-menu-arrow"
                                aria-hidden="true"
                            ></i>
                        </button>

                        <div class="user-dropdown" id="userDropdown">
                            <div class="dropdown-header">
                                <div class="profile-circle">
                                    <?php if ($profileAvatar !== null): ?>
                                        <img
                                            src="<?= esc($profileAvatar, 'attr') ?>"
                                            alt="Foto profil"
                                        >
                                    <?php else: ?>
                                        <?= esc($profileInitial) ?>
                                    <?php endif; ?>
                                </div>

                                <div class="dropdown-header-info">
                                    <h5><?= esc($profileUsername) ?></h5>
                                    <span><?= esc($profileEmail ?: '-') ?></span>
                                </div>
                            </div>

                            <div class="dropdown-menu-body">
                                <a href="<?= site_url('dashboard/laporan') ?>">
                                    <i class="fa-solid fa-chart-line"></i>
                                    <span>Dashboard</span>
                                </a>

                                <a href="<?= site_url('donate/history') ?>"
                                         class="<?= $uriSegment === 'donate' && service('uri')->getSegment(2) === 'history'
                                        ? 'active' : ''?>"
                                        >
                                         <i class="fa-solid fa-heart"></i>
                                          <span>Donasi Saya</span>
                                        </a>

                                <button
                                    type="button"
                                    class="dropdown-action"
                                    data-modal-open="profileModal"
                                >
                                    <i class="fa-solid fa-user"></i>
                                    <span>Profile</span>
                                </button>

                                <button
                                    type="button"
                                    class="dropdown-action"
                                    data-modal-open="settingsModal"
                                >
                                    <i class="fa-solid fa-gear"></i>
                                    <span>Pengaturan</span>
                                </button>
                            </div>

                            <div class="dropdown-divider"></div>

                            <form
                                action="<?= site_url('logout') ?>"
                                method="post"
                                class="logout-form"
                            >
                                <?= csrf_field() ?>

                                <button
                                    type="submit"
                                    class="dropdown-action logout"
                                >
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?= site_url('login') ?>" class="nav-login-link">
                            Login
                        </a>
                    </li>
                <?php endif; ?>
            </ul>

            <button
                type="button"
                class="menu-toggle"
                id="mobileMenuToggle"
                aria-expanded="false"
                aria-controls="navLinks"
                aria-label="Buka menu navigasi"
            >
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>

    <?php if (! $hideMainLayout && ($show_footer ?? true)): ?>
        <footer id="contact">
            <div class="footer-top">
                <div class="brand-col">
                    <span class="name">Mirae</span>
                    <span class="tag">SimplePay</span>

                    <div class="lang-select">
                        <svg
                            width="15"
                            height="15"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="2" y1="12" x2="22" y2="12"/>
                            <path d="M12 2a15 15 0 010 20a15 15 0 010-20"/>
                        </svg>

                        <span>Indonesian</span>

                        <svg
                            width="12"
                            height="12"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.5"
                        >
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </div>
                </div>

                <div class="footer-col">
                    <h4>INDUSTRI</h4>
                    <ul>
                        <li><a href="#">Platform Donasi Online</a></li>
                        <li><a href="#">Sistem Manajemen Donatur</a></li>
                        <li><a href="#">Crowdfunding Sosial</a></li>
                        <li><a href="#">Teknologi Filantropi</a></li>
                        <li><a href="#">Digital Social Impact</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>BANTUAN</h4>
                    <ul>
                        <li><a href="#">Cara Donasi</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Panduan Pengguna</a></li>
                        <li><a href="#">Status Donasi</a></li>
                        <li><a href="#">Laporan Transparansi</a></li>
                        <li><a href="#">Hubungi Kami</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>PERUSAHAAN</h4>
                    <ul>
                        <li><a href="<?= site_url('about') ?>">Tentang MIRAE</a></li>
                        <li><a href="#">Visi &amp; Misi</a></li>
                        <li><a href="<?= site_url('donate') ?>">Program Donasi</a></li>
                        <li><a href="#">Blog / Berita</a></li>
                        <li><a href="#">Karir</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>LEGAL</h4>
                    <ul>
                        <li><a href="#">Syarat &amp; Ketentuan</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Disclaimer</a></li>
                        <li><a href="#">Kebijakan Penggunaan Data</a></li>
                        <li><a href="#">Keamanan Sistem</a></li>
                        <li><a href="#">Hak Cipta</a></li>
                    </ul>
                </div>
            </div>

            <div class="divider"></div>

            <div class="footer-bottom">
                <p class="copyright">
                    © <?= date('Y') ?> MIRAE – Kelola Donasi. All Rights Reserved
                </p>
                <p>
                    MIRAE adalah platform pengelolaan donasi digital yang
                    menghubungkan donatur dengan berbagai program sosial secara
                    aman, transparan, dan terpercaya.
                </p>
                <p>Terdaftar di PSE Kominfo No. 126400031034800000001</p>
                <p>PT MIRAE Digital Indonesia</p>
                <p>
                    Jl. Jalan kanan belok kiri, Citarum, Kec. Bandung Wetan,
                    Kota Bandung, Jawa Barat, Indonesia 40125
                </p>
                <p>MIRAE International Pte. Ltd.</p>
                <p>
                    160 Robinson Road #14-04, Singapore Business Federation
                    Center, Singapore 068914
                </p>
            </div>
        </footer>
    <?php endif; ?>
</div>

<?php if ($profileUser !== null): ?>

    <?php if ($profileSuccess): ?>
        <div class="profile-toast" id="profileToast">
            <i class="fa-solid fa-circle-check"></i>
            <span><?= esc($profileSuccess) ?></span>
        </div>
    <?php endif; ?>

    <!-- MODAL PROFILE -->
    <div class="profile-modal" id="profileModal" aria-hidden="true">
        <div
            class="profile-modal-dialog"
            role="dialog"
            aria-modal="true"
            aria-labelledby="profileModalTitle"
        >
            <button
                type="button"
                class="profile-modal-close"
                data-modal-close
                aria-label="Tutup popup"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="profile-modal-header">
                <div class="profile-modal-avatar">
                    <?php if ($profileAvatar !== null): ?>
                        <img src="<?= esc($profileAvatar, 'attr') ?>" alt="Foto profil">
                    <?php else: ?>
                        <?= esc($profileInitial) ?>
                    <?php endif; ?>
                </div>

                <h2 id="profileModalTitle"><?= esc($profileName) ?></h2>

                <p class="profile-modal-account">
                    <!-- <span>@<?= esc($profileUsername) ?></span>
                    <span class="profile-modal-account-separator">•</span> -->
                    <span><?= esc($profileEmail ?: '-') ?></span>
                </p>
            </div>

            <div class="profile-modal-content">
                <div class="profile-data">
                    <div class="profile-data-row">
                        <span>Username</span>
                        <strong>@<?= esc($profileUsername) ?></strong>
                    </div>

                    <div class="profile-data-row">
                        <span>Nama lengkap</span>
                        <strong><?= esc($profileName) ?></strong>
                    </div>

                    <div class="profile-data-row">
                        <span>Email</span>
                        <strong><?= esc($profileEmail ?: '-') ?></strong>
                    </div>

                    <div class="profile-data-row">
                        <span>Nomor telepon</span>
                        <strong><?= esc(($profileUser['phone'] ?? '') !== '' ? $profileUser['phone'] : '-') ?></strong>
                    </div>

                    <div class="profile-data-row">
                        <span>Role</span>
                        <strong><?= esc($profileRole) ?></strong>
                    </div>

                    <div class="profile-data-row">
                        <span>Status akun</span>

                        <?php if ((int) ($profileUser['active'] ?? 0) === 1): ?>
                            <strong class="profile-status">Aktif</strong>
                        <?php else: ?>
                            <strong>Tidak aktif</strong>
                        <?php endif; ?>
                    </div>

                    <div class="profile-data-row">
                        <span>Bergabung sejak</span>
                        <strong><?= esc($profileJoined) ?></strong>
                    </div>
                </div>

                <div class="settings-actions">
                    <button
                        type="button"
                        class="settings-button cancel"
                        data-modal-close
                    >
                        Tutup
                    </button>

                    <button
                        type="button"
                        class="settings-button save"
                        data-modal-switch="settingsModal"
                    >
                        <i class="fa-solid fa-pen"></i>
                        Edit Profil
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL PENGATURAN -->
    <div class="profile-modal" id="settingsModal" aria-hidden="true">
        <div
            class="profile-modal-dialog"
            role="dialog"
            aria-modal="true"
            aria-labelledby="settingsModalTitle"
        >
            <button
                type="button"
                class="profile-modal-close"
                data-modal-close
                aria-label="Tutup popup"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="settings-modal-header">
                <h2 id="settingsModalTitle">Pengaturan Profil</h2>
                <p>
                    Perbarui username, email, nama, nomor telepon, foto profil,
                    dan password akun Anda.
                </p>
            </div>

            <form
                action="<?= site_url('profile/update') ?>"
                method="post"
                enctype="multipart/form-data"
                class="settings-form"
            >
                <?= csrf_field() ?>

                <?php if (! empty($profileErrors)): ?>
                    <div class="profile-errors">
                        <ul>
                            <?php foreach ($profileErrors as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="settings-avatar-preview">
                    <div class="settings-avatar-circle" id="avatarPreview">
                        <?php if ($profileAvatar !== null): ?>
                            <img
                                src="<?= esc($profileAvatar, 'attr') ?>"
                                alt="Preview foto profil"
                            >
                        <?php else: ?>
                            <?= esc($profileInitial) ?>
                        <?php endif; ?>
                    </div>

                    <div class="settings-avatar-input">
                        <label for="avatar">Ganti foto profil</label>

                        <input
                            id="avatar"
                            name="avatar"
                            type="file"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <small>
                            Gunakan JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                        </small>
                    </div>
                </div>

                <!-- DATA AKUN -->
                <div class="settings-section">
                    <div class="settings-section-heading">
                        <div class="settings-section-icon">
                            <i class="fa-solid fa-user-gear"></i>
                        </div>
                        <div>
                            <h3>Data Akun</h3>
                            <p>Username dan email digunakan untuk identitas akun.</p>
                        </div>
                    </div>

                    <div class="settings-row">
                        <div class="settings-field">
                            <label for="settingsUsername">Username</label>
                            <input
                                id="settingsUsername"
                                name="username"
                                type="text"
                                minlength="3"
                                maxlength="30"
                                pattern="[a-zA-Z0-9.]+"
                                autocomplete="username"
                                value="<?= esc(old('username', $profileUsername), 'attr') ?>"
                                required
                            >
                        </div>

                        <div class="settings-field">
                            <label for="settingsEmail">Email</label>
                            <input
                                id="settingsEmail"
                                name="email"
                                type="email"
                                maxlength="100"
                                autocomplete="email"
                                value="<?= esc(old('email', $profileEmail), 'attr') ?>"
                                required
                            >
                        </div>
                    </div>
                </div>

                <!-- DATA PRIBADI -->
                <div class="settings-section">
                    <div class="settings-section-heading">
                        <div class="settings-section-icon">
                            <i class="fa-solid fa-address-card"></i>
                        </div>
                        <div>
                            <h3>Data Pribadi</h3>
                            <p>Perbarui nama dan nomor telepon Anda.</p>
                        </div>
                    </div>

                    <div class="settings-row">
                        <div class="settings-field">
                            <label for="settingsFirstName">Nama depan</label>
                            <input
                                id="settingsFirstName"
                                name="first_name"
                                type="text"
                                maxlength="100"
                                value="<?= esc(old(
                                    'first_name',
                                    $profileUser['first_name'] ?? ''
                                )) ?>"
                                required
                            >
                        </div>

                        <div class="settings-field">
                            <label for="settingsLastName">Nama belakang</label>
                            <input
                                id="settingsLastName"
                                name="last_name"
                                type="text"
                                maxlength="100"
                                value="<?= esc(old(
                                    'last_name',
                                    $profileUser['last_name'] ?? ''
                                )) ?>"
                            >
                        </div>
                    </div>

                    <div class="settings-field">
                        <label for="settingsPhone">Nomor telepon</label>
                        <input
                            id="settingsPhone"
                            name="phone"
                            type="tel"
                            maxlength="20"
                            autocomplete="tel"
                            placeholder="Contoh: 081234567890"
                            value="<?= esc(old(
                                'phone',
                                $profileUser['phone'] ?? ''
                            )) ?>"
                        >
                    </div>
                </div>

                <!-- PASSWORD -->
                <div class="settings-section">
                    <div class="settings-section-heading">
                        <div class="settings-section-icon">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <div>
                            <h3>Ubah Password</h3>
                            <p>
                                Kosongkan semua kolom password apabila tidak ingin
                                mengganti password.
                            </p>
                        </div>
                    </div>

                    <div class="settings-field">
                        <label for="settingsCurrentPassword">
                            Password saat ini
                        </label>

                        <div class="settings-password-input">
                            <input
                                id="settingsCurrentPassword"
                                name="current_password"
                                type="password"
                                autocomplete="current-password"
                                placeholder="Masukkan password saat ini"
                            >

                            <button
                                type="button"
                                class="password-visibility-button"
                                data-password-toggle="settingsCurrentPassword"
                                aria-label="Tampilkan password saat ini"
                            >
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="settings-row">
                        <div class="settings-field">
                            <label for="settingsNewPassword">Password baru</label>

                            <div class="settings-password-input">
                                <input
                                    id="settingsNewPassword"
                                    name="new_password"
                                    type="password"
                                    autocomplete="new-password"
                                    placeholder="Masukkan password baru"
                                >

                                <button
                                    type="button"
                                    class="password-visibility-button"
                                    data-password-toggle="settingsNewPassword"
                                    aria-label="Tampilkan password baru"
                                >
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="settings-field">
                            <label for="settingsNewPasswordConfirm">
                                Konfirmasi password
                            </label>

                            <div class="settings-password-input">
                                <input
                                    id="settingsNewPasswordConfirm"
                                    name="new_password_confirm"
                                    type="password"
                                    autocomplete="new-password"
                                    placeholder="Ulangi password baru"
                                >

                                <button
                                    type="button"
                                    class="password-visibility-button"
                                    data-password-toggle="settingsNewPasswordConfirm"
                                    aria-label="Tampilkan konfirmasi password"
                                >
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="settings-actions">
                    <button
                        type="button"
                        class="settings-button cancel"
                        data-modal-close
                    >
                        Batal
                    </button>

                    <button type="submit" class="settings-button save">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

<?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const body = document.body;
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const navLinks = document.getElementById('navLinks');
    const userMenu = document.getElementById('userMenu');
    const userMenuToggle = document.getElementById('userMenuToggle');

    if (mobileMenuToggle && navLinks) {
        mobileMenuToggle.addEventListener('click', function () {
            const isOpen = navLinks.classList.toggle('open');

            mobileMenuToggle.setAttribute(
                'aria-expanded',
                isOpen ? 'true' : 'false'
            );
        });
    }

    if (userMenu && userMenuToggle) {
        userMenuToggle.addEventListener('click', function (event) {
            event.stopPropagation();

            const isOpen = userMenu.classList.toggle('is-open');

            userMenuToggle.setAttribute(
                'aria-expanded',
                isOpen ? 'true' : 'false'
            );
        });
    }

    document.addEventListener('click', function (event) {
        if (userMenu && ! userMenu.contains(event.target)) {
            userMenu.classList.remove('is-open');

            if (userMenuToggle) {
                userMenuToggle.setAttribute('aria-expanded', 'false');
            }
        }
    });

    function openModal(modalId) {
        const modal = document.getElementById(modalId);

        if (! modal) {
            return;
        }

        document
            .querySelectorAll('.profile-modal.is-open')
            .forEach(function (openedModal) {
                openedModal.classList.remove('is-open');
                openedModal.setAttribute('aria-hidden', 'true');
            });

        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        body.classList.add('modal-open');

        if (userMenu) {
            userMenu.classList.remove('is-open');
        }

        if (userMenuToggle) {
            userMenuToggle.setAttribute('aria-expanded', 'false');
        }
    }

    function closeModal(modal) {
        if (! modal) {
            return;
        }

        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');

        if (! document.querySelector('.profile-modal.is-open')) {
            body.classList.remove('modal-open');
        }
    }

    document
        .querySelectorAll('[data-modal-open]')
        .forEach(function (button) {
            button.addEventListener('click', function () {
                openModal(button.dataset.modalOpen);
            });
        });

    document
        .querySelectorAll('[data-modal-close]')
        .forEach(function (button) {
            button.addEventListener('click', function () {
                closeModal(button.closest('.profile-modal'));
            });
        });

    document
        .querySelectorAll('[data-modal-switch]')
        .forEach(function (button) {
            button.addEventListener('click', function () {
                openModal(button.dataset.modalSwitch);
            });
        });

    document
        .querySelectorAll('.profile-modal')
        .forEach(function (modal) {
            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    closeModal(modal);
                }
            });
        });

    document.addEventListener('keydown', function (event) {
        if (event.key !== 'Escape') {
            return;
        }

        if (userMenu) {
            userMenu.classList.remove('is-open');
        }

        if (userMenuToggle) {
            userMenuToggle.setAttribute('aria-expanded', 'false');
        }

        document
            .querySelectorAll('.profile-modal.is-open')
            .forEach(function (modal) {
                closeModal(modal);
            });
    });

    if (body.dataset.openSettings === '1') {
        openModal('settingsModal');
    }

    const avatarInput = document.getElementById('avatar');
    const avatarPreview = document.getElementById('avatarPreview');

    if (avatarInput && avatarPreview) {
        avatarInput.addEventListener('change', function () {
            const file = avatarInput.files[0];

            if (! file) {
                return;
            }

            if (! file.type.startsWith('image/')) {
                avatarInput.value = '';
                alert('File avatar harus berupa gambar.');
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                avatarInput.value = '';
                alert('Ukuran avatar maksimal 2 MB.');
                return;
            }

            const reader = new FileReader();

            reader.addEventListener('load', function () {
                avatarPreview.innerHTML = '';

                const image = document.createElement('img');
                image.src = reader.result;
                image.alt = 'Preview foto profil';

                avatarPreview.appendChild(image);
            });

            reader.readAsDataURL(file);
        });
    }

    document
        .querySelectorAll('[data-password-toggle]')
        .forEach(function (button) {
            button.addEventListener('click', function () {
                const input = document.getElementById(
                    button.dataset.passwordToggle
                );

                if (! input) {
                    return;
                }

                const showPassword = input.type === 'password';
                input.type = showPassword ? 'text' : 'password';

                const icon = button.querySelector('i');

                if (icon) {
                    icon.classList.toggle('fa-eye', ! showPassword);
                    icon.classList.toggle('fa-eye-slash', showPassword);
                }

                button.setAttribute(
                    'aria-label',
                    showPassword
                        ? 'Sembunyikan password'
                        : 'Tampilkan password'
                );
            });
        });

    const profileToast = document.getElementById('profileToast');

    if (profileToast) {
        window.setTimeout(function () {
            profileToast.classList.add('hide');
        }, 3500);

        window.setTimeout(function () {
            profileToast.remove();
        }, 4000);
    }
});
</script>

</body>
</html>