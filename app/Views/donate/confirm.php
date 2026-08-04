<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>
  .checkout-bg{background:linear-gradient(180deg, #e0407a 0%, #f299bc 55%, #ffd6e6 100%); padding:40px 48px 70px 48px;}
  .checkout-row{display:grid; grid-template-columns:1.7fr 1fr; gap:24px; align-items:start;}
  .form-card, .sidebar-card{background:#ffffff; border-radius:16px; box-shadow:0 20px 40px rgba(120,10,55,0.25); padding:24px 26px;}
  .summary-row{display:flex; justify-content:space-between; font-size:12.5px; color:var(--muted); margin-bottom:10px;}
  .summary-row .amount{color:var(--pink-deep); font-weight:700;}
  .summary-total{display:flex; justify-content:space-between; font-size:14px; font-weight:800; color:var(--ink); padding-top:10px; border-top:1px solid #eee;}
  .payment-methods{display:grid; grid-template-columns:1fr 1fr 1fr; gap:10px; margin-bottom:20px;}
  .payment-methods label{border:1px solid #e4dde1; border-radius:8px; padding:12px 6px; display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:700; color:var(--ink); cursor:pointer;}
  .payment-methods input{display:none;}
  .payment-methods label:has(input:checked){border-color:var(--purple); background:#f4f1fc;}
  .btn-continue{width:100%; padding:14px; border:none; border-radius:10px; background:linear-gradient(90deg,#9f8de0,var(--purple-dark)); color:#fff; font-size:14px; font-weight:800; cursor:pointer; box-shadow:0 12px 24px rgba(107,84,200,0.4);}
  @media (max-width:900px){.checkout-row{grid-template-columns:1fr;}}
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="checkout-bg">
  <div class="checkout-row">

    <div class="form-card">
      <h3 style="margin-bottom:18px;">Pilih Metode Pembayaran</h3>

      <?= form_open('donate/pay/' . $donation['id']) ?>
        <div class="payment-methods">
          <label><input type="radio" name="payment_method" value="QRIS" checked>QRIS</label>
          <label><input type="radio" name="payment_method" value="BCA">BCA</label>
          <label><input type="radio" name="payment_method" value="Mandiri">Mandiri</label>
          <label><input type="radio" name="payment_method" value="BNI">BNI</label>
          <label><input type="radio" name="payment_method" value="BRI">BRI</label>
          <label><input type="radio" name="payment_method" value="GoPay">GoPay</label>
        </div>
        <button class="btn-continue" type="submit">Bayar Sekarang</button>
      <?= form_close() ?>
    </div>

    <div class="sidebar-card">
      <h3 style="margin-bottom:16px;">Ringkasan Donasi</h3>
      <p style="font-size:12.5px; color:var(--muted); margin-bottom:12px;"><?= esc($program['title']) ?></p>

      <div class="summary-row">
        <span>Nama Donatur</span>
        <span><?= esc($donation['donor_name']) ?></span>
      </div>
      <div class="summary-row">
        <span>Nominal donasi</span>
        <span class="amount">Rp<?= number_format($donation['amount'], 0, ',', '.') ?></span>
      </div>
      <div class="summary-row">
        <span>Biaya admin</span>
        <span>Rp<?= number_format($donation['admin_fee'], 0, ',', '.') ?></span>
      </div>
      <div class="summary-total">
        <span>Total Donasi</span>
        <span class="amount">Rp<?= number_format($donation['amount'] + $donation['admin_fee'], 0, ',', '.') ?></span>
      </div>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
