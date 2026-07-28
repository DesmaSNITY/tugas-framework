<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Expense</title>
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
              <h1 class="mb-0 fs-3">Edit Expense</h1>
            </div>
            <div class="col-sm-6">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('admin/expenses') ?>">Expenses</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                  <h3 class="card-title">Edit Expense #<?= esc($expense['id']) ?></h3>
                </div>
                <form id="edit-expense-form" novalidate>
                  <div class="card-body">

                    <div id="form-alert" class="alert alert-danger d-none" role="alert"></div>

                    <div class="mb-3">
                      <label for="expense-donationpost" class="form-label">Donation Post</label>
                      <select class="form-select" id="expense-donationpost" name="donationpost_id" required>
                        <option value="" disabled>Select a donation post&hellip;</option>
                        <?php foreach ($donationposts as $post): ?>
                          <option value="<?= $post['id'] ?>"
                            <?= (int)$expense['donationpost_id'] === (int)$post['id'] ? 'selected' : '' ?>>
                            <?= esc($post['title']) ?>
                          </option>
                        <?php endforeach ?>
                      </select>
                      <div class="invalid-feedback">Please select a donation post.</div>
                    </div>

                    <div class="mb-3">
                      <label for="expense-beneficiary" class="form-label">Beneficiary</label>
                      <input type="text" class="form-control" id="expense-beneficiary" name="beneficiary"
                        value="<?= esc($expense['beneficiary']) ?>" required>
                      <div class="invalid-feedback">Please enter a beneficiary.</div>
                    </div>

                    <div class="mb-3">
                      <label for="expense-amount" class="form-label">Amount (Rp)</label>
                      <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" id="expense-amount" name="amount" min="1" step="1"
                          value="<?= esc($expense['amount']) ?>" required>
                        <div class="invalid-feedback">Please enter a valid amount.</div>
                      </div>
                    </div>

                    <div class="mb-0">
                      <label class="form-label">Status</label>
                      <input type="text" class="form-control text-capitalize" value="<?= esc($expense['status']) ?>" disabled>
                      <div class="form-text">Status changes go through the approval workflow on the Expenses list, not here.</div>
                    </div>

                  </div>
                  <div class="card-footer d-flex justify-content-end gap-2">
                    <a href="<?= base_url('admin/expenses') ?>" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                      <i class="bi bi-check-lg me-1" aria-hidden="true"></i>
                      Save Changes
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

      var BASE_URL = "<?= base_url() ?>";
      var expenseId = <?= (int) $expense['id'] ?>;

      var form = document.getElementById('edit-expense-form');
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
          donationpost_id: parseInt(document.getElementById('expense-donationpost').value, 10),
          beneficiary: document.getElementById('expense-beneficiary').value.trim(),
          amount: parseInt(document.getElementById('expense-amount').value, 10),
        };

        var submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;

        fetch(BASE_URL + "admin/expenses/update/" + expenseId, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
          },
          body: JSON.stringify(payload)
        })
          .then(function (res) {
            if (!res.ok) {
              return res.json().then(function (err) {
                throw new Error(err.errors ? Object.values(err.errors).join(' ') : 'Update failed');
              });
            }
            return res.json();
          })
          .then(function () {
            window.location.href = BASE_URL + "admin/expenses";
          })
          .catch(function (err) {
            formAlert.textContent = err.message || 'Something went wrong saving changes. Please try again.';
            formAlert.classList.remove('d-none');
            submitBtn.disabled = false;
          });
      });

    });
  </script>

</body>

</html>