<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4/dist/css/adminlte.min.css" />
  <link href="https://unpkg.com/tabulator-tables@6.3.0/dist/css/tabulator_bootstrap5.min.css" rel="stylesheet" />

  <style>
    html[data-bs-theme="dark"] #users-table.tabulator,
    html[data-bs-theme="dark"] #users-table .tabulator-header,
    html[data-bs-theme="dark"] #users-table .tabulator-col,
    html[data-bs-theme="dark"] #users-table .tabulator-row,
    html[data-bs-theme="dark"] #users-table .tabulator-row .tabulator-cell,
    html[data-bs-theme="dark"] #users-table .tabulator-footer {
      background-color: var(--bs-body-bg) !important;
      color: var(--bs-body-color) !important;
      border-color: var(--bs-border-color) !important;
    }

    html[data-bs-theme="dark"] #users-table .tabulator-row.tabulator-row-even,
    html[data-bs-theme="dark"] #users-table .tabulator-row.tabulator-row-even .tabulator-cell {
      background-color: var(--bs-tertiary-bg) !important;
    }

    html[data-bs-theme="dark"] #users-table .tabulator-row:hover,
    html[data-bs-theme="dark"] #users-table .tabulator-row:hover .tabulator-cell {
      background-color: var(--bs-secondary-bg) !important;
    }

    html[data-bs-theme="dark"] #users-table .tabulator-header .tabulator-col,
    html[data-bs-theme="dark"] #users-table .tabulator-col-title {
      background-color: var(--bs-tertiary-bg) !important;
      color: var(--bs-body-color) !important;
    }

    html[data-bs-theme="dark"] #users-table .tabulator-paginator,
    html[data-bs-theme="dark"] #users-table .tabulator-page {
      background-color: var(--bs-tertiary-bg) !important;
      color: var(--bs-body-color) !important;
    }
  </style>
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
              <h1 class="mb-0 fs-3">Users</h1>
            </div>
            <div class="col-sm-6">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="app-content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users</h3>
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 16rem">
                  <span class="input-group-text">
                    <i class="bi bi-search" aria-hidden="true"></i>
                  </span>
                  <input id="table-filter" type="search" class="form-control" placeholder="Filter rows&hellip;"
                    aria-label="Filter rows" />
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex gap-2">
                  <button id="export-csv" type="button" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-filetype-csv me-1" aria-hidden="true"></i>
                    Export CSV
                  </button>
                  <button id="export-json" type="button" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-filetype-json me-1" aria-hidden="true"></i>
                    Export JSON
                  </button>
                  <button id="print-table" type="button" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-printer me-1" aria-hidden="true"></i>
                    Print
                  </button>
                </div>
                <a href="<?= base_url('admin/users/create') ?>" class="btn btn-sm btn-primary">
                  <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>
                  Add User
                </a>
              </div>
              <div id="users-table"></div>
            </div>
            <div class="card-footer text-secondary small">
              Powered by
              <a href="https://tabulator.info/" target="_blank" rel="noopener">Tabulator</a>
              &mdash; vanilla JS, no jQuery required.
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
  <!-- Tabulator -->
  <script src="https://unpkg.com/tabulator-tables@6.3.0/dist/js/tabulator.min.js"></script>

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

      var activeColors = {
        1: 'bg-success',
        0: 'bg-secondary',
      };

      var table = new Tabulator("#users-table", {
        ajaxURL: BASE_URL + "admin/users/data",
        layout: "fitColumns",
        pagination: true,
        paginationSize: 10,
        paginationSizeSelector: [10, 25, 50, 100],
        placeholder: "No users found",
        columns: [
          {
            title: "Name",
            field: "name",
            widthGrow: 1.5,
            formatter: function (cell) {
              var d = cell.getRow().getData();
              var name = [d.first_name, d.last_name].filter(Boolean).join(' ');
              return name || '<span class="text-secondary fst-italic">No name set</span>';
            },
            sorter: function (a, b, aRow, bRow) {
              var an = [aRow.getData().first_name, aRow.getData().last_name].filter(Boolean).join(' ');
              var bn = [bRow.getData().first_name, bRow.getData().last_name].filter(Boolean).join(' ');
              return an.localeCompare(bn);
            }
          },
          { title: "Username", field: "username", widthGrow: 1 },
          {
            title: "Active",
            field: "active",
            hozAlign: "center",
            width: 100,
            formatter: function (cell) {
              var v = cell.getValue();
              var cls = activeColors[v] || 'bg-secondary';
              var label = v == 1 ? 'Active' : 'Inactive';
              return `<span class="badge ${cls}">${label}</span>`;
            }
          },
          {
            title: "Last Active",
            field: "last_active",
            sorter: "datetime",
            formatter: function (cell) {
              var v = cell.getValue();
              return v ? new Date(v).toLocaleString() : '<span class="text-secondary">Never</span>';
            }
          },
          {
            title: "Created At",
            field: "created_at",
            sorter: "datetime",
            formatter: function (cell) {
              var v = cell.getValue();
              return v ? new Date(v).toLocaleString() : "";
            }
          },
          {
            title: "Actions",
            field: "actions",
            hozAlign: "center",
            width: 150,
            formatter: function (cell) {
              var id = cell.getRow().getData().id;
              return `
                <a href="${BASE_URL}admin/users/view/${id}" class="btn btn-xs btn-outline-secondary me-1">
                  <i class="bi bi-eye"></i>
                </a>
                <a href="${BASE_URL}admin/users/edit/${id}" class="btn btn-xs btn-outline-primary me-1">
                  <i class="bi bi-pencil"></i>
                </a>
                <button class="btn btn-xs btn-outline-danger btn-delete" data-id="${id}">
                  <i class="bi bi-trash"></i>
                </button>`;
            },
            cellClick: function (e, cell) {
              if (e.target.closest('.btn-delete')) {
                var id = e.target.closest('.btn-delete').dataset.id;
                if (confirm('Delete this user?')) {
                  fetch(BASE_URL + "admin/users/" + id, {
                    method: "DELETE",
                    headers: {
                      "X-Requested-With": "XMLHttpRequest",
                    },
                  })
                    .then(function (res) {
                      if (!res.ok) throw new Error("Delete failed");
                      cell.getRow().delete();
                    })
                    .catch(function () {
                      alert("Failed to delete user. Please try again.");
                    });
                }
              }
            }
          },
        ],
      });

      document.getElementById('table-filter').addEventListener('input', function (e) {
        var val = e.target.value.toLowerCase();
        table.setFilter(function (data) {
          var name = [data.first_name, data.last_name].filter(Boolean).join(' ').toLowerCase();
          return (
            name.includes(val) ||
            (data.username && data.username.toLowerCase().includes(val))
          );
        });
      });

      document.getElementById('export-csv').addEventListener('click', function () {
        table.download("csv", "users.csv");
      });

      document.getElementById('export-json').addEventListener('click', function () {
        table.download("json", "users.json");
      });

      document.getElementById('print-table').addEventListener('click', function () {
        table.print(false, true);
      });

    });
  </script>

</body>

</html>