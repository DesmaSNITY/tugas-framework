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
  <link href="https://unpkg.com/tabulator-tables@6.3.0/dist/css/tabulator_bootstrap5.min.css" rel="stylesheet" />

  <style>
    html[data-bs-theme="dark"] .tabulator,
    html[data-bs-theme="dark"] .tabulator-header,
    html[data-bs-theme="dark"] .tabulator-col,
    html[data-bs-theme="dark"] .tabulator-row,
    html[data-bs-theme="dark"] .tabulator-row .tabulator-cell,
    html[data-bs-theme="dark"] .tabulator-footer {
      background-color: var(--bs-body-bg) !important;
      color: var(--bs-body-color) !important;
      border-color: var(--bs-border-color) !important;
    }

    html[data-bs-theme="dark"] .tabulator-row.tabulator-row-even,
    html[data-bs-theme="dark"] .tabulator-row.tabulator-row-even .tabulator-cell {
      background-color: var(--bs-tertiary-bg) !important;
    }

    html[data-bs-theme="dark"] .tabulator-row:hover,
    html[data-bs-theme="dark"] .tabulator-row:hover .tabulator-cell {
      background-color: var(--bs-secondary-bg) !important;
    }

    html[data-bs-theme="dark"] .tabulator-header .tabulator-col,
    html[data-bs-theme="dark"] .tabulator-col-title {
      background-color: var(--bs-tertiary-bg) !important;
      color: var(--bs-body-color) !important;
    }

    html[data-bs-theme="dark"] .tabulator-paginator,
    html[data-bs-theme="dark"] .tabulator-page {
      background-color: var(--bs-tertiary-bg) !important;
      color: var(--bs-body-color) !important;
    }

.status-select {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  font-size: 0.72rem;
  font-weight: 600;
  letter-spacing: 0.02em;
  text-transform: capitalize;
  border: none;
  border-radius: 999px;
  padding: 4px 28px 4px 12px;
  width: auto;
  min-width: 100px;
  cursor: pointer;
  background-repeat: no-repeat;
  background-position: right 10px center;
  background-size: 10px 10px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12'%3E%3Cpath fill='%23666' d='M6 8.5 1.5 4h9z'/%3E%3C/svg%3E");
  transition: filter 0.15s ease;
}

.status-select:hover {
  filter: brightness(0.95);
}

.status-select:focus {
  outline: 2px solid var(--bs-primary);
  outline-offset: 1px;
}

.status-select:disabled {
  cursor: default;
  opacity: 0.7;
}

.status-pending {
  background-color: #e2e3e5;
  color: #41464b;
}

.status-approved {
  background-color: #cfe2ff;
  color: #084298;
}

.status-paid {
  background-color: #d1e7dd;
  color: #0f5132;
}

.status-rejected {
  background-color: #f8d7da;
  color: #842029;
}

/* Dark mode variants — muted/desaturated so they don't glare against a dark table */
html[data-bs-theme="dark"] .status-pending {
  background-color: #495057;
  color: #e9ecef;
}

html[data-bs-theme="dark"] .status-approved {
  background-color: #1b4173;
  color: #cfe2ff;
}

html[data-bs-theme="dark"] .status-paid {
  background-color: #1e4633;
  color: #d1e7dd;
}

html[data-bs-theme="dark"] .status-rejected {
  background-color: #5c2328;
  color: #f8d7da;
}

html[data-bs-theme="dark"] .status-select {
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12'%3E%3Cpath fill='%23ccc' d='M6 8.5 1.5 4h9z'/%3E%3C/svg%3E");
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
              <h1 class="mb-0 fs-3">Expenses</h1>
            </div>
            <div class="col-sm-6">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Expenses</li>
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
              <h3 class="card-title">Expenses</h3>
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
                <button id="add-expense" type="button" class="btn btn-sm btn-primary">
                  <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>
                  Add Expense
                </button>
              </div>
              <div id="expenses-table"></div>
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
  <script src="https://unpkg.com/tabulator-tables@6.3.0/dist/js/tabulator.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {

      var statusColors = {
        pending: 'bg-secondary',
        approved: 'bg-info',
        paid: 'bg-success',
        rejected: 'bg-danger',
      };

      // maps donationpost_id -> title, just for display in dummy mode
      // (in real app, join this server-side and send donationpost_title in the JSON)
      var donationPostTitles = {
        1: "Bantu Korban Banjir Jakarta",
        2: "Sekolah Gratis Anak Yatim",
        3: "Renovasi Panti Jompo",
        4: "Bantuan Medis Darurat",
        5: "Beasiswa Mahasiswa Kurang Mampu",
      };

      // ===== DUMMY DATA (replace with ajaxURL later) =====
      var dummyData = [
        { id: 1, donationpost_id: 1, beneficiary: "PT Sumber Pangan", amount: 8000000, status: "paid", created_at: "2026-06-05 10:00:00", updated_at: "2026-06-10 09:00:00" },
        { id: 2, donationpost_id: 1, beneficiary: "Apotek Sehat Jaya", amount: 3500000, status: "approved", created_at: "2026-06-12 11:15:00", updated_at: "2026-06-14 08:00:00" },
        { id: 3, donationpost_id: 2, beneficiary: "CV Buku Cerdas", amount: 12000000, status: "paid", created_at: "2026-05-20 09:30:00", updated_at: "2026-05-25 10:00:00" },
        { id: 4, donationpost_id: 3, beneficiary: "Toko Bangunan Jaya", amount: 4500000, status: "pending", created_at: "2026-07-06 13:00:00", updated_at: "2026-07-06 13:00:00" },
        { id: 5, donationpost_id: 4, beneficiary: "RS Harapan Bunda", amount: 9500000, status: "rejected", created_at: "2026-06-22 14:00:00", updated_at: "2026-06-25 09:00:00" },
        { id: 6, donationpost_id: 4, beneficiary: "Apotek Sehat Jaya", amount: 2500000, status: "pending", created_at: "2026-07-09 16:00:00", updated_at: "2026-07-09 16:00:00" },
      ];
      // =====================================================

      var nextExpenseStatus = {
        pending: ['approved', 'rejected'],
        approved: ['paid', 'rejected'],
        paid: [],
        rejected: [],
      };

      function statusActionsHtml(status) {
        var next = nextExpenseStatus[status] || [];
        return next.map(function (s) {
          var label = s.charAt(0).toUpperCase() + s.slice(1);
          var btnClass = s === 'rejected' ? 'btn-outline-danger' : 'btn-outline-success';
          return `<button class="btn btn-xs ${btnClass} btn-status-change me-1" data-status="${s}">${label}</button>`;
        }).join('');
      }

      var table = new Tabulator("#expenses-table", {
        data: dummyData,
        layout: "fitColumns",
        pagination: true,
        paginationSize: 10,
        paginationSizeSelector: [10, 25, 50, 100],
        columns: [
          { title: "ID", field: "id", width: 60, sorter: "number" },
          {
            title: "Donation Post",
            field: "donationpost_id",
            widthGrow: 2,
            formatter: function (cell) {
              var id = cell.getValue();
              var title = donationPostTitles[id] || ("#" + id);
              return `<a href="/admin/donationposts/view/${id}">${title}</a>`;
            }
          },
          { title: "Beneficiary", field: "beneficiary", widthGrow: 1.5 },
          {
            title: "Amount",
            field: "amount",
            hozAlign: "right",
            sorter: "number",
            formatter: function (cell) {
              return "Rp " + Number(cell.getValue() || 0).toLocaleString("id-ID");
            }
          },
          {
            title: "Status",
            field: "status",
            hozAlign: "center",
            width: 140,
            formatter: function (cell) {
              var d = cell.getRow().getData();
              var current = cell.getValue();
              var options = [current].concat(nextExpenseStatus[current] || []);
              options = [...new Set(options)];

              var opts = options.map(function (s) {
                var label = s.charAt(0).toUpperCase() + s.slice(1);
                return `<option value="${s}" ${s === current ? 'selected' : ''}>${label}</option>`;
              }).join('');

              return `<select class="form-select form-select-sm status-select status-${current}" data-id="${d.id}">${opts}</select>`;
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
            width: 220,
            formatter: function (cell) {
              var d = cell.getRow().getData();
              return `
            <div class="d-flex justify-content-center align-items-center flex-wrap gap-1">
              <a href="/admin/expenses/edit/${d.id}" class="btn btn-xs btn-outline-primary">
                <i class="bi bi-pencil"></i>
              </a>
              <button class="btn btn-xs btn-outline-danger btn-delete" data-id="${d.id}">
                <i class="bi bi-trash"></i>
              </button>
            </div>`;
            },
            cellClick: function (e, cell) {
              var row = cell.getRow();
              var data = row.getData();

              if (e.target.closest('.btn-status-change')) {
                var newStatus = e.target.closest('.btn-status-change').dataset.status;
                // dummy mode: update locally
                // real mode: fire a PATCH/PUT to /admin/expenses/{id}/status then update on success
                row.update({ status: newStatus, updated_at: new Date().toISOString().slice(0, 19).replace('T', ' ') });
              }

              if (e.target.closest('.btn-delete')) {
                var id = e.target.closest('.btn-delete').dataset.id;
                if (confirm('Delete this expense record?')) {
                  row.delete();
                }
              }
            }
          },
        ],
      });

      document.getElementById('table-filter').addEventListener('input', function (e) {
        var val = e.target.value.toLowerCase();
        table.setFilter(function (data) {
          var title = donationPostTitles[data.donationpost_id] || '';
          return (
            (data.beneficiary && data.beneficiary.toLowerCase().includes(val)) ||
            (data.status && data.status.toLowerCase().includes(val)) ||
            title.toLowerCase().includes(val)
          );
        });
      });

      document.getElementById('export-csv').addEventListener('click', function () {
        table.download("csv", "expenses.csv");
      });

      document.getElementById('export-json').addEventListener('click', function () {
        table.download("json", "expenses.json");
      });

      document.getElementById('print-table').addEventListener('click', function () {
        table.print(false, true);
      });

      document.getElementById('add-expense').addEventListener('click', function () {
        // wire this to a modal or /admin/expenses/create page when ready
        alert('Hook this up to your "Add Expense" form/modal.');
      });

      document.getElementById('expenses-table').addEventListener('change', function (e) {
        if (e.target.classList.contains('status-select')) {
          var id = e.target.dataset.id;
          var newStatus = e.target.value;
          var row = table.getRow(id);

          if (!row) return;

          var oldStatus = row.getData().status;
          if (newStatus === oldStatus) return;

          // dummy mode: update locally
          // real mode: PATCH /admin/expenses/{id}/status, then row.update() on success,
          // or revert the <select> value on failure
          row.update({
            status: newStatus,
            updated_at: new Date().toISOString().slice(0, 19).replace('T', ' ')
          });
        }
      });

    });
  </script>

</body>

</html>