<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Donation Post</title>
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
              <h1 class="mb-0 fs-3">Edit Donation Post</h1>
            </div>
            <div class="col-sm-6">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('admin/donationposts') ?>">Donation Posts</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="app-content">
        <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit: <?= esc($post['title']) ?></h3>
            </div>

            <form id="edit-donationpost-form" novalidate>
              <div class="card-body">

                <div id="form-alert" class="alert alert-danger d-none" role="alert"></div>
                <div id="form-success" class="alert alert-success d-none" role="alert"></div>

                <div class="row">
                  <!-- LEFT -->
                  <div class="col-lg-8">

                    <div class="form-group mb-3">
                      <label for="title">Donation Title</label>
                      <input type="text" class="form-control" id="title" name="title"
                        value="<?= esc($post['title']) ?>" required>
                      <div class="invalid-feedback">Please enter a title.</div>
                    </div>

                    <div class="form-group mb-3">
                      <label for="description">Description</label>
                      <textarea id="description" name="description" rows="7" class="form-control"
                        required><?= esc($post['description']) ?></textarea>
                      <div class="invalid-feedback">Please enter a description.</div>
                    </div>

                    <div class="form-group mb-3">
                      <label for="foundation_id">Foundation</label>
                      <select class="form-select" id="foundation_id" name="foundation_id" required>
                        <option value="" disabled>Select Foundation</option>
                        <?php foreach ($foundations as $foundation): ?>
                          <option value="<?= $foundation['id'] ?>"
                            <?= (int)$post['foundation_id'] === (int)$foundation['id'] ? 'selected' : '' ?>>
                            <?= esc($foundation['name']) ?>
                          </option>
                        <?php endforeach ?>
                      </select>
                      <div class="invalid-feedback">Please select a foundation.</div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group mb-3">
                          <label for="deadline">Deadline</label>
                          <input type="datetime-local" class="form-control" id="deadline" name="deadline"
                            value="<?= date('Y-m-d\TH:i', strtotime($post['deadline'])) ?>" required>
                          <div class="invalid-feedback">Please choose a deadline.</div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group mb-3">
                          <label for="target_amount">Target Amount</label>
                          <input type="number" class="form-control" id="target_amount" name="target_amount"
                            value="<?= esc($post['target_amount']) ?>" min="1" required>
                          <div class="invalid-feedback">Please enter a valid target amount.</div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group mb-3">
                      <label for="status">Status</label>
                      <select class="form-select" id="status" name="status">
                        <?php foreach (['draft', 'pending', 'active', 'completed', 'cancelled'] as $s): ?>
                          <option value="<?= $s ?>" <?= $post['status'] === $s ? 'selected' : '' ?>>
                            <?= ucfirst($s) ?>
                          </option>
                        <?php endforeach ?>
                      </select>
                    </div>

                    <div class="form-group mb-0">
                      <label>Current Amount Raised</label>
                      <input type="text" class="form-control"
                        value="Rp <?= number_format($post['current_amount'], 0, ',', '.') ?>" disabled>
                      <div class="form-text">This updates automatically as donations come in — not editable here.</div>
                    </div>

                  </div>

                  <!-- RIGHT -->
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Donation Image</h3>
                      </div>
                      <div class="card-body">
                        <p class="text-secondary small mb-0">Image upload isn't wired up yet — coming later.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-footer">
                <a href="<?= base_url('admin/donationposts') ?>" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary float-end">
                  <i class="bi bi-save me-1"></i> Save Changes
                </button>
              </div>
            </form>
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
      var postId = <?= (int) $post['id'] ?>;

      var form = document.getElementById('edit-donationpost-form');
      var formAlert = document.getElementById('form-alert');
      var formSuccess = document.getElementById('form-success');

      form.addEventListener('submit', function (e) {
        e.preventDefault();
        e.stopPropagation();

        formAlert.classList.add('d-none');
        formSuccess.classList.add('d-none');

        if (!form.checkValidity()) {
          form.classList.add('was-validated');
          return;
        }

        var payload = {
          title: document.getElementById('title').value.trim(),
          description: document.getElementById('description').value.trim(),
          foundation_id: parseInt(document.getElementById('foundation_id').value, 10),
          deadline: document.getElementById('deadline').value.replace('T', ' ') + ':00',
          target_amount: parseInt(document.getElementById('target_amount').value, 10),
          status: document.getElementById('status').value,
        };

        var submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;

        fetch(BASE_URL + "admin/donationposts/update/" + postId, {
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
            window.location.href = BASE_URL + "admin/donationposts";
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