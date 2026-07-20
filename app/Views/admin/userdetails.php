<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View User</title>
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
              <h1 class="mb-0 fs-3">User Details</h1>
            </div>
            <div class="col-sm-6">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="/admin/users">Users</a></li>
                  <li class="breadcrumb-item active" aria-current="page">View</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="app-content">
        <div class="container-fluid" id="user-detail-container">

          <!-- Loading state -->
          <div id="user-detail-loading" class="text-center text-secondary py-5">
            <div class="spinner-border" role="status"></div>
            <p class="mt-2 mb-0">Loading user&hellip;</p>
          </div>

          <!-- Content (populated by JS) -->
          <div id="user-detail-content" class="d-none">

            <div class="row">

              <!-- Left: profile summary -->
              <div class="col-lg-4">
                <div class="card card-primary card-outline">
                  <div class="card-body text-center">
                    <img id="user-avatar" src="" alt="Avatar"
                      class="rounded-circle d-none" style="width: 100px; height: 100px; object-fit: cover;">
                    <div id="user-avatar-placeholder"
                      class="rounded-circle bg-secondary-subtle d-flex align-items-center justify-content-center mx-auto"
                      style="width: 100px; height: 100px; font-size: 2rem;">
                      <i class="bi bi-person"></i>
                    </div>
                    <h4 id="user-name" class="mt-3 mb-0"></h4>
                    <p id="user-username" class="text-secondary mb-2"></p>
                    <span id="user-active-badge" class="badge"></span>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                      <span class="text-secondary">User ID</span>
                      <span id="user-id"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                      <span class="text-secondary">Role</span>
                      <span id="user-role"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                      <span class="text-secondary">Created</span>
                      <span id="user-created-at"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                      <span class="text-secondary">Last Active</span>
                      <span id="user-last-active"></span>
                    </li>
                  </ul>
                  <div class="card-footer">
                    <a id="user-edit-link" href="#" class="btn btn-primary btn-sm w-100">
                      <i class="bi bi-pencil me-1"></i> Edit User
                    </a>
                  </div>
                </div>
              </div>

              <!-- Right: full data -->
              <div class="col-lg-8">

                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Contact Information</h3>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col-sm-3 text-secondary">Email</div>
                      <div class="col-sm-9" id="user-email"></div>
                    </div>
                    <div class="row mb-0">
                      <div class="col-sm-3 text-secondary">Phone</div>
                      <div class="col-sm-9" id="user-phone"></div>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Profile</h3>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col-sm-3 text-secondary">First Name</div>
                      <div class="col-sm-9" id="user-first-name"></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-3 text-secondary">Last Name</div>
                      <div class="col-sm-9" id="user-last-name"></div>
                    </div>
                    <div class="row mb-0">
                      <div class="col-sm-3 text-secondary">Status Message</div>
                      <div class="col-sm-9" id="user-status-message"></div>
                    </div>
                  </div>
                </div>

                <div class="card mb-0">
                  <div class="card-header">
                    <h3 class="card-title">Account Metadata</h3>
                  </div>
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col-sm-3 text-secondary">Status</div>
                      <div class="col-sm-9" id="user-status"></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-3 text-secondary">Updated At</div>
                      <div class="col-sm-9" id="user-updated-at"></div>
                    </div>
                    <div class="row mb-0">
                      <div class="col-sm-3 text-secondary">Deleted At</div>
                      <div class="col-sm-9" id="user-deleted-at"></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <!-- Not found state -->
          <div id="user-detail-notfound" class="d-none text-center text-secondary py-5">
            <i class="bi bi-exclamation-triangle fs-1"></i>
            <p class="mt-2 mb-0">User not found.</p>
            <a href="/admin/users" class="btn btn-sm btn-secondary mt-3">Back to Users</a>
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

      // ===== DUMMY DATA (replace with fetch to /admin/users/{id}/data later) =====
      // In real mode, get the id from the URL (CI4 route segment) and fetch that
      // user's full record + joined email from auth_identities + role from groups_users.
      var dummyUsers = {
        1: { id: 1, username: "admin01", first_name: "Budi", last_name: "Santoso", email: "budi@example.com", phone: "081234567890", status: "active", status_message: null, active: 1, role: "Super Admin", avatar: null, last_active: "2026-07-17 09:20:00", created_at: "2026-01-10 08:00:00", updated_at: "2026-07-17 09:20:00", deleted_at: null },
        2: { id: 2, username: "sari.w", first_name: "Sari", last_name: "Wulandari", email: "sari@example.com", phone: "081298765432", status: "active", status_message: null, active: 1, role: "Admin", avatar: null, last_active: "2026-07-16 15:40:00", created_at: "2026-02-05 10:30:00", updated_at: "2026-07-16 15:40:00", deleted_at: null },
        3: { id: 3, username: "rudi_h", first_name: "Rudi", last_name: "Hartono", email: "rudi@example.com", phone: null, status: "pending", status_message: "Pending email verification", active: 0, role: "Foundation Admin", avatar: null, last_active: null, created_at: "2026-06-01 12:00:00", updated_at: "2026-06-01 12:00:00", deleted_at: null },
        4: { id: 4, username: "dewi.k", first_name: "Dewi", last_name: "Kusuma", email: "dewi@example.com", phone: "081355566677", status: "active", status_message: null, active: 1, role: "Foundation Admin", avatar: null, last_active: "2026-07-10 08:15:00", created_at: "2026-03-20 09:00:00", updated_at: "2026-07-10 08:15:00", deleted_at: null },
        5: { id: 5, username: "agus_p", first_name: "Agus", last_name: "Pratama", email: "agus@example.com", phone: "081911122233", status: "suspended", status_message: "Account suspended", active: 0, role: "Admin", avatar: null, last_active: "2026-05-01 14:00:00", created_at: "2026-01-25 11:00:00", updated_at: "2026-06-02 09:00:00", deleted_at: null },
      };
      // =============================================================

      function getUserIdFromUrl() {
        // dummy mode: read ?id=1 from query string for local testing
        // real mode (CI4): the id comes from the route segment, and the server
        // should render this page with the id already known (e.g. via a data
        // attribute or inline JSON), no query string needed
        var params = new URLSearchParams(window.location.search);
        return parseInt(params.get('id'), 10) || 1; // defaults to user 1 for preview
      }

      function fmt(v, fallback) {
        fallback = fallback || '<span class="text-secondary">&mdash;</span>';
        return (v === null || v === undefined || v === '') ? fallback : v;
      }

      function fmtDate(v) {
        return v ? new Date(v).toLocaleString() : '<span class="text-secondary">&mdash;</span>';
      }

      function renderUser(u) {
        document.getElementById('user-detail-loading').classList.add('d-none');

        if (!u) {
          document.getElementById('user-detail-notfound').classList.remove('d-none');
          return;
        }

        document.getElementById('user-detail-content').classList.remove('d-none');

        var fullName = [u.first_name, u.last_name].filter(Boolean).join(' ') || 'No name set';
        document.getElementById('user-name').textContent = fullName;
        document.getElementById('user-username').textContent = '@' + u.username;

        var badge = document.getElementById('user-active-badge');
        badge.textContent = u.active == 1 ? 'Active' : 'Inactive';
        badge.className = 'badge ' + (u.active == 1 ? 'bg-success' : 'bg-secondary');

        if (u.avatar) {
          document.getElementById('user-avatar').src = u.avatar;
          document.getElementById('user-avatar').classList.remove('d-none');
          document.getElementById('user-avatar-placeholder').classList.add('d-none');
        }

        document.getElementById('user-id').textContent = u.id;
        document.getElementById('user-role').textContent = u.role || '—';
        document.getElementById('user-created-at').textContent = new Date(u.created_at).toLocaleDateString();
        document.getElementById('user-last-active').innerHTML = u.last_active ? new Date(u.last_active).toLocaleString() : '<span class="text-secondary">Never</span>';

        document.getElementById('user-email').innerHTML = fmt(u.email);
        document.getElementById('user-phone').innerHTML = fmt(u.phone);

        document.getElementById('user-first-name').innerHTML = fmt(u.first_name);
        document.getElementById('user-last-name').innerHTML = fmt(u.last_name);
        document.getElementById('user-status-message').innerHTML = fmt(u.status_message);

        document.getElementById('user-status').innerHTML = fmt(u.status);
        document.getElementById('user-updated-at').innerHTML = fmtDate(u.updated_at);
        document.getElementById('user-deleted-at').innerHTML = fmtDate(u.deleted_at);

        document.getElementById('user-edit-link').href = '/admin/users/edit/' + u.id;
      }

      // ===== dummy mode: look up locally =====
      // ===== real mode: fetch('/admin/users/' + id + '/data').then(...) =====
      var id = getUserIdFromUrl();
      setTimeout(function () {
        renderUser(dummyUsers[id]);
      }, 300); // small delay just to show the loading state in dummy mode

    });
  </script>

</body>

</html>