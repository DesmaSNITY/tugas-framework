<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Foundation</title>
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
              <h1 class="mb-0 fs-3">Edit Foundation</h1>
            </div>
            <div class="col-sm-6">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('admin/foundations') ?>">Foundations</a></li>
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
              <h3 class="card-title">Edit: <?= esc($foundation['name']) ?></h3>
            </div>

            <form action="<?= site_url('admin/foundations/update/' . $foundation['id']) ?>" method="post">
              <?= csrf_field() ?>

              <div class="card-body">

                <div class="mb-3">
                  <label for="name" class="form-label">Foundation Name</label>
                  <input type="text" class="form-control" id="name" name="name"
                    value="<?= old('name', $foundation['name']) ?>"
                    placeholder="Example: Red Cross Indonesia" required>
                </div>

                <div class="mb-3">
                  <label for="location" class="form-label">Location</label>
                  <textarea class="form-control" id="location" name="location" rows="3"
                    placeholder="Full address"><?= old('location', $foundation['location']) ?></textarea>
                </div>

                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-select" id="status" name="status">
                    <option value="active" <?= old('status', $foundation['status']) === 'active' ? 'selected' : '' ?>>
                      Active
                    </option>
                    <option value="inactive" <?= old('status', $foundation['status']) === 'inactive' ? 'selected' : '' ?>>
                      Inactive
                    </option>
                  </select>
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-save"></i>
                  Save Changes
                </button>

                <a href="<?= site_url('admin/foundations') ?>" class="btn btn-secondary">
                  <i class="bi bi-arrow-left"></i>
                  Back
                </a>
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

</body>

</html>