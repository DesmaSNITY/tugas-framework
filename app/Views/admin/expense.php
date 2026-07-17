<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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

      <!-- Add Expense Modal -->
      <div class="modal fade" id="addExpenseModal" tabindex="-1" aria-labelledby="addExpenseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="add-expense-form" novalidate>
              <div class="modal-header">
                <h5 class="modal-title" id="addExpenseModalLabel">Add Expense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="mb-3">
                  <label for="expense-donationpost" class="form-label">Donation Post</label>
                  <select class="form-select" id="expense-donationpost" required>
                    <option value="" selected disabled>Select a donation post&hellip;</option>
                  </select>
                  <div class="invalid-feedback">Please select a donation post.</div>
                </div>

                <div class="mb-3">
                  <label for="expense-beneficiary" class="form-label">Beneficiary</label>
                  <input type="text" class="form-control" id="expense-beneficiary"
                    placeholder="e.g. Apotek Sehat Jaya" required>
                  <div class="invalid-feedback">Please enter a beneficiary.</div>
                </div>

                <div class="mb-3">
                  <label for="expense-amount" class="form-label">Amount (Rp)</label>
                  <input type="number" class="form-control" id="expense-amount" min="1" step="1"
                    placeholder="e.g. 5000000" required>
                  <div class="invalid-feedback">Please enter a valid amount.</div>
                </div>

                <div class="mb-0">
                  <label class="form-label">Status</label>