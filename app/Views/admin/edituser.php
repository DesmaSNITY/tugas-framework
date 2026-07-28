<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>
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
              <h1 class="mb-0 fs-3">Edit User</h1>
            </div>
            <div class="col-sm-6">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('admin/users') ?>">Users</a></li>
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
                  <h3 class="card-title">Edit User: <?= esc($user['username']) ?></h3>
                </div>
                <form id="edit-user-form" novalidate>
                  <div class="card-body">

                    <div id="form-alert" class="alert alert-danger d-none" role="alert"></div>
                    <div id="form-success" class="alert alert-success d-none" role="alert"></div>

                    <h6 class="text-uppercase text-secondary small fw-bold mb-3">Account (read-only)</h6>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" value="<?= esc($user['username']) ?>" disabled>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" value="<?= esc($email ?? '—') ?>" disabled>
                      </div>
                    </div>

                    <hr class="my-4">

                    <h6 class="text-uppercase text-secondary small fw-bold mb-3">Profile</h6>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="user-first-name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="user-first-name" name="first_name"
                          value="<?= esc($user['first_name'] ?? '') ?>" placeholder="e.g. Budi">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="user-last-name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="user-last-name" name="last_name"
                          value="<?= esc($user['last_name'] ?? '') ?>" placeholder="e.g. Santoso">
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="user-phone" class="form-label">Phone</label>
                      <input type="text" class="form-control" id="user-phone" name="phone"
                        value="<?= esc($user['phone'] ?? '') ?>" placeholder="e.g. 081234567890">
                    </div>

                    <hr class="my-4">

                    <h6 class="text-uppercase text-secondary small fw-bold mb-3">Reset Password</h6>
                    <p class="text-secondary small">Leave blank to keep the current password unchanged.</p>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="user-new-password" class="form-label">New Password</label>
                        <div class="input-group">
                          <input type="password" class="form-control" id="user-new-password" name="new_password" minlength="8">
                          <button type="button" class="btn btn-outline-secondary toggle-password" data-target="user-new-password">
                            <i class="bi bi-eye"></i>
                          </button>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="user-new-password-confirm" class="form-label">Confirm New Password</label>
                        <div class="input-group">
                          <input type="password" class="form-control" id="user-new-password-confirm" name="new_password_confirm" minlength="8">
                          <button type="button" class="btn btn-outline-secondary toggle-password" data-target="user-new-password-confirm">
                            <i class="bi bi-eye"></i>
                          </button>
                        </div>
                      </div>
                    </div>

                    <hr class="my-4">

                    <h6 class="text-uppercase text-secondary small fw-bold mb-3">Access</h6>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="user-role" class="form-label">Role</label>
                        <select class="form-select" id="user-role" name="role">
                          <option value="" <?= empty($role) ? 'selected' : '' ?>>No role assigned</option>
                          <option value="superadmin" <?= $role === 'superadmin' ? 'selected' : '' ?>>Super Admin</option>
                          <option value="admin" <?= $role === 'admin' ? 'selected' : '' ?>>Admin</option>
                          <option value="foundation_admin" <?= $role === 'foundation_admin' ? 'selected' : '' ?>>Foundation Admin</option>
                        </select>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label class="form-label d-block">Status</label>
                        <div class="form-check form-switch mt-2">
                          <input class="form-check-input" type="checkbox" id="user-active" name="active"
                            <?= (int)$user['active'] === 1 ? 'checked' : '' ?>>
                          <label class="form-check-label" for="user-active">Active</label>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="card-footer d-flex justify-content-end gap-2">
                    <a href="<?= base_url('admin/users/view/' . $user['id']) ?>" class="btn btn-secondary">Cancel</a>
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
      var userId = <?= (int) $user['id'] ?>;

      var form = document.getElementById('edit-user-form');
      var formAlert = document.getElementById('form-alert');
      var formSuccess = document.getElementById('form-success');

      document.querySelectorAll('.toggle-password').forEach(function (btn) {
        btn.addEventListener('click', function () {
          var target = document.getElementById(btn.dataset.target);
          var icon = btn.querySelector('i');
          if (target.type === 'password') {
            target.type = 'text';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
          } else {
            target.type = 'password';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
          }
        });
      });

      form.addEventListener('submit', function (e) {
        e.preventDefault();

        formAlert.classList.add('d-none');
        formSuccess.classList.add('d-none');

        var newPassword = document.getElementById('user-new-password').value;
        var newPasswordConfirm = document.getElementById('user-new-password-confirm').value;

        if (newPassword || newPasswordConfirm) {
          if (newPassword.length < 8) {
            formAlert.textContent = 'New password must be at least 8 characters.';
            formAlert.classList.remove('d-none');
            return;
          }
          if (newPassword !== newPasswordConfirm) {
            formAlert.textContent = 'New passwords do not match.';
            formAlert.classList.remove('d-none');
            return;
          }
        }

        var payload = {
          first_name: document.getElementById('user-first-name').value.trim() || null,
          last_name: document.getElementById('user-last-name').value.trim() || null,
          phone: document.getElementById('user-phone').value.trim() || null,
          role: document.getElementById('user-role').value || null,
          active: document.getElementById('user-active').checked ? 1 : 0,
          new_password: newPassword || null,
        };

        var submitBtn = form.querySelector('button[type="submit"]');
        submitBtn.disabled = true;

        fetch(BASE_URL + "admin/users/update/" + userId, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
          },
          body: JSON.stringify(payload)
        })
          .then(function (res) {
            if (!res.ok) throw new Error('Update failed');
            return res.json();
          })
          .then(function () {
            formSuccess.textContent = 'User updated successfully.';
            formSuccess.classList.remove('d-none');
            document.getElementById('user-new-password').value = '';
            document.getElementById('user-new-password-confirm').value = '';
            submitBtn.disabled = false;
          })
          .catch(function () {
            formAlert.textContent = 'Something went wrong saving changes. Please try again.';
            formAlert.classList.remove('d-none');
            submitBtn.disabled = false;
          });
      });

    });
  </script>

</body>

</html>