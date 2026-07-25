<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
  .checkout-bg{background:linear-gradient(180deg, #e0407a 0%, #f299bc 55%, #ffd6e6 100%); padding:40px 48px 70px 48px;}
  .checkout-row{display:grid; grid-template-columns:1.7fr 1fr; gap:24px; align-items:start;}
  .form-card{background:#ffffff; border-radius:16px; box-shadow:0 20px 40px rgba(120,10,55,0.25); padding:28px 30px 34px 30px;}
  .steps{display:flex; gap:34px; padding-bottom:20px; margin-bottom:24px; border-bottom:1px solid #eee;}
  .step{display:flex; align-items:center; gap:10px;}
  .step .num{width:26px; height:26px; border-radius:50%; background:var(--purple); color:#fff; font-size:12px; font-weight:800; display:flex; align-items:center; justify-content:center; flex-shrink:0;}
  .step.inactive .num{background:#e2ddf3; color:var(--purple);}
  .step .title{font-size:13px; font-weight:800; color:var(--ink);}
  .step .desc{font-size:10.5px; color:var(--muted);}
  .step.inactive .title, .step.inactive .desc{color:#b7abb2;}
  .form-section h3{font-size:14px; font-weight:800; color:var(--ink); margin-bottom:16px;}
  .row-2{display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px;}
  label{display:block; font-size:12px; font-weight:700; color:var(--ink); margin-bottom:6px;}
  label .req{color:var(--pink-deep);}
  input[type="text"], input[type="email"], select, textarea{width:100%; border:1px solid #e4dde1; border-radius:8px; padding:10px 12px; font-size:12.5px; outline:none; color:#333; font-family:inherit;}
  .phone-row{display:flex; gap:8px;}
  .phone-row select{width:70px; flex-shrink:0;}
  .nominal-row{display:flex; gap:10px; margin-bottom:18px; flex-wrap:wrap;}
  .nominal-chip{border:1px solid #e4dde1; border-radius:8px; padding:9px 16px; font-size:12px; font-weight:600; color:var(--ink); cursor:pointer; background:#fff;}
  .nominal-chip.selected, .nominal-chip:has(input:checked){background:var(--purple); border-color:var(--purple); color:#fff;}
  .nominal-chip input{display:none;}
  .custom-nominal{display:flex; align-items:center; border:1px solid #e4dde1; border-radius:8px; overflow:hidden; margin-bottom:18px;}
  .custom-nominal .prefix{background:var(--purple); color:#fff; font-weight:700; font-size:12.5px; padding:10px 14px;}
  .custom-nominal input{border:none; flex:1; padding:10px 12px; font-size:12.5px; outline:none;}
  textarea{resize:none; height:70px; margin-bottom:4px;}
  .agree{display:flex; align-items:flex-start; gap:8px; font-size:11.5px; color:var(--muted); margin:16px 0 22px 0; line-height:1.5;}
  .btn-continue{width:100%; padding:14px; border:none; border-radius:10px; background:linear-gradient(90deg,#9f8de0,var(--purple-dark)); color:#fff; font-size:14px; font-weight:800; cursor:pointer; box-shadow:0 12px 24px rgba(107,84,200,0.4);}
  .sidebar-card{background:#ffffff; border-radius:16px; box-shadow:0 20px 40px rgba(120,10,55,0.25); padding:22px 24px 26px 24px;}
  .sidebar-card h3{font-size:14px; font-weight:800; color:var(--ink); margin-bottom:16px;}
  .program-item{display:flex; gap:12px; margin-bottom:14px;}
  .program-thumb{width:64px; height:56px; border-radius:8px; background:linear-gradient(135deg,#f2b6b0,#c96a72); flex-shrink:0; position:relative; overflow:hidden;}
  .program-thumb svg{position:absolute; bottom:0; left:50%; transform:translateX(-50%); width:70%; height:80%;}
  .program-info h4{font-size:12.5px; color:var(--ink); line-height:1.35; margin-bottom:2px;}
  .program-info .org{font-size:10.5px; color:var(--muted);}
  .progress-line{display:flex; align-items:center; justify-content:space-between; font-size:10.5px; margin:14px 0;}
  .progress-bar{height:5px; background:#eee; border-radius:4px; margin-bottom:16px; overflow:hidden;}
  .progress-bar .fill{height:100%; background:var(--purple);}
  @media (max-width:900px){.checkout-row{grid-template-columns:1fr;} .row-2{grid-template-columns:1fr;}}
  @media (max-width:820px){.steps{flex-direction:column; gap:14px;}}
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="checkout-bg">
  <div class="checkout-row">

    <div class="form-card">
      <div class="steps">
        <div class="step">
          <div class="num">1</div>
          <div><div class="title">Isi Donasi</div><div class="desc">Lengkapi data donasi anda</div></div>
        </div>
        <div class="step inactive">
          <div class="num">2</div>
          <div><div class="title">Konfirmasi</div><div class="desc">Periksa &amp; Konfirmasi</div></div>
        </div>
        <div class="step inactive">
          <div class="num">3</div>
          <div><div class="title">Pembayaran</div><div class="desc">Pilih metode pembayaran</div></div>
        </div>
      </div>

      <?= form_open('donate/store') ?>
        <input type="hidden" name="program_id" value="<?= $program['id'] ?>">

        <div class="form-section">
          <h3>Informasi Donatur</h3>
          <div class="row-2">
            <div>
              <label>Nama Lengkap<span class="req">*</span></label>
              <input type="text" name="donor_name" placeholder="Contoh : Alridho party" value="<?= old('donor_name') ?>">
            </div>
            <div>
              <label>Email<span class="req">*</span></label>
              <input type="email" name="donor_email" placeholder="Contoh : RidhoCihuyyy@gmail.com" value="<?= old('donor_email') ?>">
            </div>
          </div>
          <div class="row-2">
            <div>
              <label>No Whatsapp<span class="req">*</span></label>
              <div class="phone-row">
                <select name="phone_prefix"><option>+62</option></select>
                <input type="text" name="donor_phone" placeholder="882-1312-14127" value="<?= old('donor_phone') ?>">
              </div>
            </div>
            <div>
              <label>Domisili</label>
              <input type="text" name="donor_city" placeholder="Pilih Kota / Kabupaten" value="<?= old('donor_city') ?>">
            </div>
          </div>
        </div>

        <label>Nominal Donasi</label>
        <div class="nominal-row">
          <label class="nominal-chip"><input type="radio" name="nominal_preset" value="50000">Rp.50.000</label>
          <label class="nominal-chip"><input type="radio" name="nominal_preset" value="100000" checked>Rp.100.000</label>
          <label class="nominal-chip"><input type="radio" name="nominal_preset" value="150000">Rp.150.000</label>
          <label class="nominal-chip"><input type="radio" name="nominal_preset" value="200000">Rp.200.000</label>
        </div>

        <label>Nominal Donasi</label>
        <div class="custom-nominal">
          <span class="prefix">Rp</span>
          <input type="text" name="amount" id="amount" placeholder="Masukkan nominal sendiri" value="100000">
        </div>

        <label>Pesan &amp; Doa Donasi</label>
        <textarea name="message" maxlength="200" placeholder="Masukkan pesan ...."></textarea>

        <label class="agree">
          <input type="checkbox" name="show_name" value="1" checked>
          Tampilkan nama saya sebagai donatur — nama anda akan ditampilkan dalam halaman donasi
        </label>

        <button class="btn-continue" type="submit">Lanjutkan Ke Konfirmasi</button>
      <?= form_close() ?>
    </div>

    <div>
      <div class="sidebar-card">
        <h3>Ringkasan Donasi</h3>
        <div class="program-item">
          <div class="program-thumb">
            <svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMax slice">
              <circle cx="35" cy="30" r="14" fill="#f2d9c7"/>
              <rect x="15" y="42" width="40" height="45" rx="8" fill="#e7e7ea"/>
              <circle cx="70" cy="55" r="12" fill="#8a5a3c"/>
              <rect x="58" y="65" width="24" height="30" rx="7" fill="#f4f1ec"/>
            </svg>
          </div>
          <div class="program-info">
            <h4><?= esc($program['title']) ?></h4>
            <div class="org">oleh <?= esc($program['organizer']) ?></div>
          </div>
        </div>

        <div class="progress-line">
          <span>Rp<?= number_format($program['collected_amount'], 0, ',', '.') ?> dari Rp<?= number_format($program['target_amount'], 0, ',', '.') ?></span>
        </div>
        <div class="progress-bar"><div class="fill" style="width:<?= $program['progress'] ?>%;"></div></div>
      </div>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
