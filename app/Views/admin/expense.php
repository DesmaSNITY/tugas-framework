<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Expense</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4/dist/css/adminlte.min.css" />
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
  <!--begin::App Wrapper-->
  <div class="app-wrapper">
    <!--begin::Header-->
    <?= $this->include('partials/header') ?>
    <!--end::Header-->
    <!--begin::Sidebar-->
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
      <!--begin::Sidebar Brand-->
      <?= $this->include('partials/sidebarbrand') ?>
      <!--end::Sidebar Brand-->
      <!--begin::Sidebar Wrapper-->
      <div class="sidebar-wrapper">
        <?= $this->include('partials/sidebar') ?>
      </div>
      <!--end::Sidebar Wrapper-->
    </aside>
    <!--end::Sidebar-->
    <!--begin::App Main-->
    <main class="app-main">
      <div class="app-content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="mb-0 fs-3">Add Expense</h1>
            </div>
            <div class="col-sm-6">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="/admin/expenses">Expenses</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="app-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-lg-7">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">New Expense</h3>
                </div>
                <form id="add-expense-form" novalidate>
                  <div class="card-body">

                    <div id="form-alert" class="alert alert-danger d-none" role="alert"></div>

                    <div class="mb-3">
                      <label for="expense-donationpost" class="form-label">Donation Post</label>
                      <select class="form-select" id="expense-donationpost" name="donationpost_id" required>
                        <option value="" selected disabled>Select a donation post&hellip;</option>
                      </select>
                      <div class="invalid-feedback">Please select a donation post.</div>
                    </div>

                    <div class="mb-3">
                      <label for="expense-beneficiary" class="form-label">Beneficiary</label>
                      <input type="text" class="form-control" id="expense-beneficiary" name="beneficiary"
                        placeholder="e.g. Apotek Sehat Jaya" required>
                      <div class="invalid-feedback">Please enter a beneficiary.</div>
                    </div>

                    <div class="mb-3">
                      <label for="expense-amount" class="form-label">Amount (Rp)</label>
                      <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" id="expense-amount" name="amount" min="1" step="1"
                          placeholder="e.g. 5000000" required>
                        <div class="invalid-feedback">Please enter a valid amount.</div>
                      </div>
                    </div>

                    <div class="mb-0">
                      <label class="form-label">Status</label>
                      <input type="text" class="form-control" value="Pending" disabled>
                      <div class="form-text">New expenses always start as Pending and follow the approval workflow
                        afterward.</div>
                    </div>

                  </div>
                  <div class="card-footer d-flex justify-content-end gap-2">
                    <a href="/admin/expenses" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                      <i class="bi bi-check-lg me-1" aria-hidden="true"></i>
                      Save Expense
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!--end::App Main-->
    <!--begin::Footer-->
    <!--end::Footer-->
  </div>
  <!--end::App Wrapper-->

  <!-- Bootstrap (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <!-- OverlayScrollbars -->
  <script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
  <!-- AdminLTE -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@4/dist/js/adminlte.min.js"></script>

  <script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
      scrollbarTheme: 'os-theme-light',
      scrollbarAutoHide: 'leave',
      scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function () {
      const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
      const isMobile = window.innerWidth <= 992;
      if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined && !isMobile) {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
          scrollbars: {
            theme: Default.scrollbarTheme,
            autoHide: Default.scrollbarAutoHide,
            clickScroll: Default.scrollbarClickScroll,
          },
        });
      }
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {

      // ===== DUMMY: donation post list (replace with fetch to /admin/donationposts/active later) =====
      var donationPostTitles = {
        1: "Bantu Korban Banjir Jakarta",
        2: "Sekolah Gratis Anak Yatim",
        3: "Renovasi Panti Jompo",
        4: "Bantuan Medis Darurat",
        5: "Beasiswa Mahasiswa Kurang Mampu",
      };

      var donationPostSelect = document.getElementById('expense-donationpost');
      Object.keys(donationPostTitles).forEach(function (id) {
        var opt = document.createElement('option');
        opt.value = id;
        opt.textContent = donationPostTitles[id];
        donationPostSelect.appendChild(opt);
      });

      var form = document.getElementById('add-expense-form');
      var formAlert = document.getElementById('form-alert');

      form.addEventListener('submit', function (e) {
        e.preventDefault();
        e.stopPropagation();

        formAlert.classList.add('d-none');

        if (!form.checkValidity()) {
          form.classList.add('was-validated');
          return;
        }

        var payload = {
          donationpost_id: parseInt(donationPostSelect.value, 10),
          beneficiary: document.getElementById('expense-beneficiary').value.trim(),
          amount: parseInt(document.getElementById('expense-amount').value, 10),
          status: "pending",
        };

        // ===== dummy mode: just log + redirect =====
        // ===== real mode: replace this block with a fetch() POST =====
        //
        // fetch('/admin/expenses', {
        //   method: 'POST',
        //   headers: { 'Content-Type': 'application/json' },
        //   body: JSON.stringify(payload)
        // })
        //   .then(function (res) {
        //     if (!res.ok) throw new Error('Save failed');
        //     return res.json();
        //   })
        //   .then(function () {
        //     window.location.href = '/admin/expenses';
        //   })
        //   .catch(function (err) {
        //     formAlert.textContent = 'Something went wrong saving this expense. Please try again.';
        //     formAlert.classList.remove('d-none');
        //   });

        console.log('Dummy submit payload:', payload);
        alert('Dummy mode: expense would be saved. Check console for payload.');
        window.location.href = '/admin/expenses';
      });

    });
  </script>

</body>

</html>