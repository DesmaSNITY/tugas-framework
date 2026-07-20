<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expenses</title>
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
                  <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
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
                <a href="<?= base_url('admin/expenses/create') ?>" class="btn btn-sm btn-primary">
                  <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>
                  Add Expense
                </a>
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

      var nextExpenseStatus = {
        pending: ['approved', 'rejected'],
        approved: ['paid', 'rejected'],
        paid: [],
        rejected: [],
      };

      var table = new Tabulator("#expenses-table", {
        ajaxURL: BASE_URL + "admin/expenses/data",
        layout: "fitColumns",
        pagination: true,
        paginationSize: 10,
        paginationSizeSelector: [10, 25, 50, 100],
        placeholder: "No expenses found",
        columns: [
          { title: "ID", field: "id", width: 60, sorter: "number" },
          {
            title: "Donation Post",
            field: "donationpost_title",
            widthGrow: 2,
            formatter: function (cell) {
              var d = cell.getRow().getData();
              var title = d.donationpost_title || ("#" + d.donationpost_id);
              return `<a href="${BASE_URL}admin/donationposts/edit/${d.donationpost_id}">${title}</a>`;
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
              var options = [...new Set([current].concat(nextExpenseStatus[current] || []))];
              var isTerminal = (nextExpenseStatus[current] || []).length === 0;

              var opts = options.map(function (s) {
                var label = s.charAt(0).toUpperCase() + s.slice(1);
                return `<option value="${s}" ${s === current ? 'selected' : ''}>${label}</option>`;
              }).join('');

              return `<select class="form-select form-select-sm status-select status-${current}" data-id="${d.id}" ${isTerminal ? 'disabled' : ''}>${opts}</select>`;
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
            width: 110,
            formatter: function (cell) {
              var d = cell.getRow().getData();
              return `
                <div class="d-flex justify-content-center align-items-center gap-1">
                  <a href="${BASE_URL}admin/expenses/edit/${d.id}" class="btn btn-xs btn-outline-primary">
                    <i class="bi bi-pencil"></i>
                  </a>
                  <button class="btn btn-xs btn-outline-danger btn-delete" data-id="${d.id}">
                    <i class="bi bi-trash"></i>
                  </button>
                </div>`;
            },
            cellClick: function (e, cell) {
              if (e.target.closest('.btn-delete')) {
                var id = e.target.closest('.btn-delete').dataset.id;
                if (confirm('Delete this expense record?')) {
                  fetch(BASE_URL + "admin/expenses/" + id, {
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
                      alert("Failed to delete expense. Please try again.");
                    });
                }
              }
            }
          },
        ],
      });

      // ===== Status dropdown change handler — real PATCH request =====
      document.getElementById('expenses-table').addEventListener('change', function (e) {
        if (e.target.classList.contains('status-select')) {
          var select = e.target;
          var id = select.dataset.id;
          var newStatus = select.value;
          var row = table.getRow(id);

          if (!row) return;

          var oldStatus = row.getData().status;
          if (newStatus === oldStatus) return;

          fetch(BASE_URL + "admin/expenses/" + id + "/status", {
            method: "PATCH",
            headers: {
              "Content-Type": "application/json",
              "X-Requested-With": "XMLHttpRequest",
            },
            body: JSON.stringify({ status: newStatus }),
          })
            .then(function (res) {
              if (!res.ok) throw new Error("Status update failed");
              return res.json();
            })
            .then(function (updated) {
              row.update(updated); // refresh with server's actual saved state
            })
            .catch(function () {
              alert("Failed to update status. Please try again.");
              select.value = oldStatus; // revert the dropdown on failure
            });
        }
      });

      document.getElementById('table-filter').addEventListener('input', function (e) {
        var val = e.target.value.toLowerCase();
        table.setFilter(function (data) {
          return (
            (data.beneficiary && data.beneficiary.toLowerCase().includes(val)) ||
            (data.status && data.status.toLowerCase().includes(val)) ||
            (data.donationpost_title && data.donationpost_title.toLowerCase().includes(val))
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

    });
  </script>

</body>

</html>