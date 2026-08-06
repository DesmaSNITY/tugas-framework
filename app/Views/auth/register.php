<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
body.auth-register-page{
    min-height:100vh;
    margin:0;
    background:linear-gradient(135deg,#e91e8c 0%,#ff4f9e 40%,#ff8ec1 100%) !important;
}
body.auth-register-page .page{
    max-width:100% !important;
    margin:0 !important;
    box-shadow:none !important;
    background:transparent !important;
}
.auth-wrap{min-height:100vh;display:flex;align-items:center;justify-content:center;padding:40px;}
.auth-card{width:100%;max-width:980px;background:#fbd6e4;border-radius:24px;display:grid;grid-template-columns:1fr 1fr;overflow:hidden;box-shadow:0 25px 55px rgba(0,0,0,.2);}
.form-panel{padding:44px 50px;display:flex;flex-direction:column;justify-content:center;}
.form-panel h1{font-size:34px;margin-bottom:8px;font-weight:800;}
.subtitle{font-size:14px;margin-bottom:24px;}
.subtitle a{color:#d63384;text-decoration:none;font-weight:700;}
.row-2{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
.field{background:#fff;border:2px solid transparent;border-radius:10px;padding:0 14px;margin-bottom:14px;transition:.2s;}
.field:focus-within{border-color:#ed8db6;box-shadow:0 0 0 4px rgba(237,141,182,.14);}
.field input{width:100%;height:48px;border:none;outline:none;background:none;font-size:14px;}
.agree{display:flex;align-items:flex-start;gap:8px;margin:8px 0 20px;font-size:13px;line-height:1.5;}
.agree input{margin-top:3px;accent-color:#d63384;}
.agree a{color:#d63384;font-weight:700;text-decoration:none;}
.btn-create{width:100%;padding:15px;border:none;border-radius:10px;background:linear-gradient(180deg,#ff738c,#d93d5b);color:#fff;font-size:16px;font-weight:700;cursor:pointer;box-shadow:0 8px 20px rgba(217,58,88,.35);}
.art-panel{overflow:hidden;background:#fff;}
.art-panel img{width:100%;height:100%;object-fit:cover;display:block;}
.alert{padding:12px 14px;margin-bottom:14px;border-radius:8px;font-size:13px;line-height:1.5;}
.alert-error{background:#fde2e2;color:#b3261e;}
.alert-success{background:#dff7df;color:#21743c;}
.errors{margin-bottom:14px;padding:12px 12px 12px 32px;border-radius:8px;color:#b3261e;background:#fde2e2;font-size:13px;line-height:1.55;}
@media(max-width:768px){.auth-card{grid-template-columns:1fr}.art-panel{order:-1;height:250px}.form-panel{padding:30px}.row-2{grid-template-columns:1fr}.auth-wrap{padding:20px}}
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="auth-wrap">
    <div class="auth-card">
        <div class="form-panel">
            <h1>Create An Account</h1>
            <p class="subtitle">Already Have Account? <a href="<?= site_url('login') ?>">Login</a></p>

            <?php if ($error = session()->getFlashdata('error')): ?>
                <div class="alert alert-error"><?= esc($error) ?></div>
            <?php endif; ?>

            <?php if ($errors = session()->getFlashdata('errors')): ?>
                <ul class="errors">
                    <?php foreach ($errors as $message): ?>
                        <li><?= esc($message) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if ($success = session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= esc($success) ?></div>
            <?php endif; ?>

            <?= form_open('register') ?>
                <div class="row-2">
                    <div class="field">
                        <input type="text" name="first_name" placeholder="First name" value="<?= esc(old('first_name'), 'attr') ?>" required maxlength="100" autocomplete="given-name">
                    </div>
                    <div class="field">
                        <input type="text" name="last_name" placeholder="Last name" value="<?= esc(old('last_name'), 'attr') ?>" maxlength="100" autocomplete="family-name">
                    </div>
                </div>

                <div class="field">
                    <input type="text" name="username" placeholder="Username" value="<?= esc(old('username'), 'attr') ?>" required minlength="3" maxlength="30" pattern="[a-zA-Z0-9._-]+" autocomplete="username">
                </div>

                <div class="field">
                    <input type="email" name="email" placeholder="Email address" value="<?= esc(old('email'), 'attr') ?>" required maxlength="100" autocomplete="email">
                </div>

                <div class="row-2">
                    <div class="field">
                        <input type="password" name="password" placeholder="Password" required minlength="8" maxlength="255" autocomplete="new-password">
                    </div>
                    <div class="field">
                        <input type="password" name="password_confirm" placeholder="Confirm password" required minlength="8" maxlength="255" autocomplete="new-password">
                    </div>
                </div>

                <label class="agree">
                    <input type="checkbox" name="agree" value="1" <?= old('agree', '1') === '1' ? 'checked' : '' ?> required>
                    <span>I agree to the <a href="#">terms &amp; conditions</a></span>
                </label>

                <button class="btn-create" type="submit">Create an account</button>
            <?= form_close() ?>
        </div>

        <div class="art-panel">
            <img src="<?= base_url('uploads/register/registerimg.png') ?>" alt="Register Illustration">
        </div>
    </div>
</div>
<?= $this->endSection() ?>