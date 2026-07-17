<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- In <head> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4/dist/css/adminlte.min.css" />
<link href="https://unpkg.com/tabulator-tables@6.3.0/dist/css/tabulator_bootstrap5.min.css" rel="stylesheet"/>

<style>
  html[data-bs-theme="dark"] #foundations-table.tabulator,
  html[data-bs-theme="dark"] #foundations-table .tabulator-header,
  html[data-bs-theme="dark"] #foundations-table .tabulator-col,
  html[data-bs-theme="dark"] #foundations-table .tabulator-row,
  html[data-bs-theme="dark"] #foundations-table .tabulator-row .tabulator-cell,
  html[data-bs-theme="dark"] #foundations-table .tabulator-footer {
    background-color: var(--bs-body-bg) !important;
    color: var(--bs-body-color) !important;
    border-color: var(--bs-border-color) !important;
  }

  html[data-bs-theme="dark"] #foundations-table .tabulator-row.tabulator-row-even,
  html[data-bs-theme="dark"] #foundations-table .tabulator-row.tabulator-row-even .tabulator-cell {
    background-color: var(--bs-tertiary-bg) !important;
  }

  html[data-bs-theme="dark"] #foundations-table .tabulator-row:hover,
  html[data-bs-theme="dark"] #foundations-table .tabulator-row:hover .tabulator-cell {
    background-color: var(--bs-secondary-bg) !important;
  }

  html[data-bs-theme="dark"] #foundations-table .tabulator-header .tabulator-col,
  html[data-bs-theme="dark"] #foundations-table .tabulator-col-title {
    background-color: var(--bs-tertiary-bg) !important;
    color: var(--bs-body-color) !important;
  }

  html[data-bs-theme="dark"] #foundations-table .tabulator-paginator,
  html[data-bs-theme="dark"] #foundations-table .tabulator-page {
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
              <h1 class="mb-0 fs-3">Foundations</h1>
            </div>
            <div class="col-sm-6">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Foundations</li>
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
              <h3 class="card-title">Foundations</h3>
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
              <div class="d-flex gap-2 mb-3">
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
              <div id="foundations-table"></div>
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
  <!--begin::Script-->
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
  <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->

  <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
  <!--end::Required Plugin(AdminLTE)-->
  <!--begin::OverlayScrollbars Configure-->
  <script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
      scrollbarTheme: 'os-theme-light',
      scrollbarAutoHide: 'leave',
      scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function () {
      const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

      // Disable OverlayScrollbars on mobile devices to prevent touch interference
      const isMobile = window.innerWidth <= 992;

      if (
        sidebarWrapper &&
        OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
        !isMobile
      ) {
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
  <!--end::OverlayScrollbars Configure-->

  <!--begin::Color Mode Toggle-->
  <!-- The light/dark/auto switcher ships in adminlte.js as the ColorMode
     module (since 4.1) — no page script needed. Only the no-flash snippet
     in <head> stays inline, because it must run before first paint. -->
  <!--end::Color Mode Toggle-->

  <!-- OPTIONAL SCRIPTS -->

  <!-- apexcharts -->

  <!--end::Script-->
  <!-- Before </body> -->

  <!-- Bootstrap (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <!-- OverlayScrollbars -->
  <script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
  <!-- AdminLTE -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@4/dist/js/adminlte.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
    integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/tabulator-tables@6.3.0/dist/js/tabulator.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {

      var statusColors = {
        active: 'bg-success',
        inactive: 'bg-danger',
      };

      // ===== DUMMY DATA (replace with ajaxURL later) =====
      var dummyData = [
        { id: 101, name: "Yayasan Peduli Kasih", location: "Jakarta Selatan", status: "active", created_at: "2026-03-01 09:00:00", updated_at: "2026-06-15 10:00:00" },
        { id: 102, name: "Yayasan Anak Bangsa", location: "Bandung", status: "active", created_at: "2026-02-14 11:20:00", updated_at: "2026-05-20 08:30:00" },
        { id: 103, name: "Yayasan Harapan Sejahtera", location: "Surabaya", status: "inactive", created_at: "2026-01-05 08:00:00", updated_at: "2026-04-01 13:00:00" },
        { id: 104, name: "Yayasan Cahaya Umat", location: "Yogyakarta", status: "active", created_at: "2026-04-10 14:45:00", updated_at: "2026-07-01 09:15:00" },
        { id: 105, name: "Yayasan Sahabat Alam", location: "Malang", status: "active", created_at: "2026-05-22 10:00:00", updated_at: "2026-07-05 16:00:00" },
      ];
      // =====================================================

      var table = new Tabulator("#foundations-table", {
        data: dummyData,
        layout: "fitColumns",
        pagination: true,
        paginationSize: 10,
        paginationSizeSelector: [10, 25, 50, 100],
        columns: [
          { title: "ID", field: "id", width: 70, sorter: "number" },
          { title: "Name", field: "name", widthGrow: 2 },
          { title: "Location", field: "location", widthGrow: 1 },
          {
            title: "Status",
            field: "status",
            hozAlign: "center",
            width: 110,
            formatter: function (cell) {
              var v = cell.getValue();
              var cls = statusColors[v] || 'bg-secondary';
              return `<span class="badge ${cls} text-capitalize">${v}</span>`;
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
            width: 130,
            formatter: function (cell) {
              var id = cell.getRow().getData().id;
              return `
            <a href="/admin/foundations/edit/${id}" class="btn btn-xs btn-outline-primary me-1">
              <i class="bi bi-pencil"></i>
            </a>
            <button class="btn btn-xs btn-outline-danger btn-delete" data-id="${id}">
              <i class="bi bi-trash"></i>
            </button>`;
            },
            cellClick: function (e, cell) {
              if (e.target.closest('.btn-delete')) {
                var id = e.target.closest('.btn-delete').dataset.id;
                if (confirm('Delete this foundation?')) {
                  cell.getRow().delete();
                }
              }
            }
          },
        ],
      });

      document.getElementById('table-filter').addEventListener('input', function (e) {
        var val = e.target.value.toLowerCase();
        table.setFilter(function (data) {
          return (
            (data.name && data.name.toLowerCase().includes(val)) ||
            (data.location && data.location.toLowerCase().includes(val)) ||
            (data.status && data.status.toLowerCase().includes(val))
          );
        });
      });

      document.getElementById('export-csv').addEventListener('click', function () {
        table.download("csv", "foundations.csv");
      });

      document.getElementById('export-json').addEventListener('click', function () {
        table.download("json", "foundations.json");
      });

      document.getElementById('print-table').addEventListener('click', function () {
        table.print(false, true);
      });

    });
  </script>


</body>


</html>