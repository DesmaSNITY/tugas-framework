<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Admin</title>
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
              <h1 class="mb-0 fs-3">Add Admin</h1>
            </div>
            <div class="col-sm-6">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="/admin/users">Users</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Admin</li>
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
                  <h3 class="card-title">New Admin Account</h3>
                </div>
                <form id="add-admin-form" novalidate>
                  <div class="card-body">

                    <div id="form-alert" class="alert alert-danger d-none" role="alert"></div>

                    <h6 class="text-uppercase text-secondary small fw-bold mb-3">Account</h6>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="admin-username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="admin-username" name="username"
                          placeholder="e.g. admin01" required>
                        <div class="invalid-feedback">Please enter a username.</div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="admin-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="admin-email" name="email"
                          placeholder="e.g. admin@example.com" required>
                        <div class="invalid-feedback">Please enter a valid email.</div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="admin-password" class="form-label">Password</label>
                        <div class="input-group">
                          <input type="password" class="form-control" id="admin-password" name="password"
                            minlength="8" required>
                          <button type="button" class="btn btn-outline-secondary toggle-password" data-target="admin-password">
                            <i class="bi bi-eye"></i>
                          </button>
                          <div class="invalid-feedback">Password must be at least 8 characters.</div>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="admin-password-confirm" class="form-label">Confirm Password</label>
                        <div class="input-group">
                          <input type="password" class="form-control" id="admin-password-confirm"
                            name="password_confirm" minlength="8" required>
                          <button type="button" class="btn btn-outline-secondary toggle-password" data-target="admin-password-confirm">
                            <i class="bi bi-eye"></i>
                          </button>
                          <div class="invalid-feedback" id="password-confirm-feedback">Passwords do not match.</div>
                        </div>
                      </div>
                    </div>

                    <hr class="my-4">

                    <h6 class="text-uppercase text-secondary small fw-bold mb-3">Profile</h6>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="admin-first-name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="admin-first-name" name="first_name"
                          placeholder="e.g. Budi">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="admin-last-name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="admin-last-name" name="last_name"
                          placeholder="e.g. Santoso">
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="admin-phone" class="form-label">Phone</label>
                      <input type="text" class="form-control" id="admin-phone" name="phone"
                        placeholder="e.g. 081234567890">
                    </div>

                    <hr class="my-4">

                    <h6 class="text-uppercase text-secondary small fw-bold mb-3">Access</h6>

                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="admin-role" class="form-label">Role</label>
                        <select class="form-select" id="admin-role" name="role" required>
                          <option value="" selected disabled>Select a role&hellip;</option>
                          <option value="superadmin">Super Admin</option>
                          <option value="admin">Admin</option>
                          <option value="foundation_admin">Foundation Admin</option>
                        </select>
                        <div class="invalid-feedback">Please select a role.</div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label class="form-label d-block">Status</label>
                        <div class="form-check form-switch mt-2">
                          <input class="form-check-input" type="checkbox" id="admin-active" name="active" checked>
                          <label class="form-check-label" for="admin-active">Active immediately</label>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="card-footer d-flex justify-content-end gap-2">
                    <a href="/admin/users" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                      <i class="bi bi-check-lg me-1" aria-hidden="true"></i>
                      Save Admin
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

      var form = document.getElementById('add-admin-form');
      var formAlert = document.getElementById('form-alert');
      var passwordEl = document.getElementById('admin-password');
      var passwordConfirmEl = document.getElementById('admin-password-confirm');

      // Show/hide password toggles
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

      // Keep confirm-password validity in sync as the user types
      function syncPasswordMatch() {
        if (passwordConfirmEl.value && passwordConfirmEl.value !== passwordEl.value) {
          passwordConfirmEl.setCustomValidity('Passwords do not match.');
        } else {
          passwordConfirmEl.setCustomValidity('');
        }
      }
      passwordEl.addEventListener('input', syncPasswordMatch);
      passwordConfirmEl.addEventListener('input', syncPasswordMatch);

      form.addEventListener('submit', function (e) {
        e.preventDefault();
        e.stopPropagation();

        syncPasswordMatch();
        formAlert.classList.add('d-none');

        if (!form.checkValidity()) {
          form.classList.add('was-validated');
          return;
        }

        var payload = {
          username: document.getElementById('admin-username').value.trim(),
          email: document.getElementById('admin-email').value.trim(),
          password: passwordEl.value,
          first_name: document.getElementById('admin-first-name').value.trim() || null,
          last_name: document.getElementById('admin-last-name').value.trim() || null,
          phone: document.getElementById('admin-phone').value.trim() || null,
          role: document.getElementById('admin-role').value,
          active: document.getElementById('admin-active').checked ? 1 : 0,
        };

        // ===== dummy mode: just log + redirect =====
        // ===== real mode: replace this block with a fetch() POST =====
        //
        // Server side (CI4 + Shield), roughly:
        //   $users = auth()->getProvider();
        //   $user = new User([
        //       'username' => $payload['username'],
        //       'active'   => $payload['active'],
        //   ]);
        //   $user->createEmailIdentity([
        //       'email'    => $payload['email'],
        //       'password' => $payload['password'],
        //   ]);
        //   $users->save($user);
        //   $user->syncGroups($payload['role']); // Shield group/role assignment
        //   // then update first_name/last_name/phone via your own users model or entity
        //
        // fetch('/admin/users', {
        //   method: 'POST',
        //   headers: { 'Content-Type': 'application/json' },
        //   body: JSON.stringify(payload)
        // })
        //   .then(function (res) {
        //     if (!res.ok) throw new Error('Save failed');
        //     return res.json();
        //   })
        //   .then(function () {
        //     window.location.href = '/admin/users';
        //   })
        //   .catch(function (err) {
        //     formAlert.textContent = 'Something went wrong saving this admin. Please try again.';
        //     formAlert.classList.remove('d-none');
        //   });

        console.log('Dummy submit payload:', payload);
        alert('Dummy mode: admin would be created. Check console for payload.');
        window.location.href = '/admin/users';
      });

    });
  </script>

</body>

</html>