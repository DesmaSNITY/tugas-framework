<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donation Posts</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4/dist/css/adminlte.min.css" />
  <link href="https://unpkg.com/tabulator-tables@6.3.0/dist/css/tabulator_bootstrap5.min.css" rel="stylesheet" />

  <style>
    html[data-bs-theme="dark"] #donationposts-table.tabulator,
    html[data-bs-theme="dark"] #donationposts-table .tabulator-header,
    html[data-bs-theme="dark"] #donationposts-table .tabulator-col,
    html[data-bs-theme="dark"] #donationposts-table .tabulator-row,
    html[data-bs-theme="dark"] #donationposts-table .tabulator-row .tabulator-cell,
    html[data-bs-theme="dark"] #donationposts-table .tabulator-footer {
      background-color: var(--bs-body-bg) !important;
      color: var(--bs-body-color) !important;
      border-color: var(--bs-border-color) !important;
    }

    html[data-bs-theme="dark"] #donationposts-table .tabulator-row.tabulator-row-even,
    html[data-bs-theme="dark"] #donationposts-table .tabulator-row.tabulator-row-even .tabulator-cell {
      background-color: var(--bs-tertiary-bg) !important;
    }

    html[data-bs-theme="dark"] #donationposts-table .tabulator-row:hover,
    html[data-bs-theme="dark"] #donationposts-table .tabulator-row:hover .tabulator-cell {
      background-color: var(--bs-secondary-bg) !important;
    }

    html[data-bs-theme="dark"] #donationposts-table .tabulator-header .tabulator-col,
    html[data-bs-theme="dark"] #donationposts-table .tabulator-col-title {
      background-color: var(--bs-tertiary-bg) !important;
      color: var(--bs-body-color) !important;
    }

    html[data-bs-theme="dark"] #donationposts-table .tabulator-paginator,
    html[data-bs-theme="dark"] #donationposts-table .tabulator-page {
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
              <h1 class="mb-0 fs-3">Donation Posts</h1>
            </div>
            <div class="col-sm-6">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Donation Posts</li>
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
              <h3 class="card-title">Donation Posts</h3>
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
                <a href="<?= base_url('admin/donationposts/create') ?>" class="btn btn-sm btn-primary">
                  <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>
                  Add Donation Post
                </a>
              </div>
              <div id="donationposts-table"></div>
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

      var statusColors = {
        pending: 'bg-secondary',
        draft: 'bg-secondary',
        active: 'bg-success',
        completed: 'bg-primary',
        cancelled: 'bg-danger',
      };

      var table = new Tabulator("#donationposts-table", {
        ajaxURL: BASE_URL + "admin/donationposts/data",
        layout: "fitColumns",
        pagination: true,
        paginationSize: 10,
        paginationSizeSelector: [10, 25, 50, 100],
        placeholder: "No donation posts found",
        columns: [
          { title: "ID", field: "id", width: 70, sorter: "number" },
          {
            title: "Foundation",
            field: "foundation_name",
            widthGrow: 1,
            formatter: function (cell) {
              var d = cell.getRow().getData();
              return d.foundation_name || ("#" + d.foundation_id);
            }
          },
          { title: "Title", field: "title", widthGrow: 2 },
          {
            title: "Deadline",
            field: "deadline",
            sorter: "datetime",
            sorterParams: { format: "yyyy-MM-dd HH:mm:ss" },
            formatter: function (cell) {
              var v = cell.getValue();
              return v ? new Date(v).toLocaleString() : "";
            }
          },
          {
            title: "Target Amount",
            field: "target_amount",
            hozAlign: "right",
            sorter: "number",
            formatter: function (cell) {
              return "Rp " + Number(cell.getValue() || 0).toLocaleString("id-ID");
            }
          },
          {
            title: "Current Amount",
            field: "current_amount",
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
                <a href="${BASE_URL}admin/donationposts/edit/${id}" class="btn btn-xs btn-outline-primary me-1">
                  <i class="bi bi-pencil"></i>
                </a>
                <button class="btn btn-xs btn-outline-danger btn-delete" data-id="${id}">
                  <i class="bi bi-trash"></i>
                </button>`;
            },
            cellClick: function (e, cell) {
              if (e.target.closest('.btn-delete')) {
                var id = e.target.closest('.btn-delete').dataset.id;
                if (confirm('Delete this donation post?')) {
                  fetch(BASE_URL + "admin/donationposts/" + id, {
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
                      alert("Failed to delete donation post. Please try again.");
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
          return (
            (data.title && data.title.toLowerCase().includes(val)) ||
            (data.status && data.status.toLowerCase().includes(val)) ||
            (data.foundation_name && data.foundation_name.toLowerCase().includes(val))
          );
        });
      });

      document.getElementById('export-csv').addEventListener('click', function () {
        table.download("csv", "donation_posts.csv");
      });

      document.getElementById('export-json').addEventListener('click', function () {
        table.download("json", "donation_posts.json");
      });

      document.getElementById('print-table').addEventListener('click', function () {
        table.print(false, true);
      });

    });
  </script>

</body>

</html>