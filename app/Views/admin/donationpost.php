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
        <div class="app-main">
            <div clas="app-content">
                <div class="container-fluid">
                                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Donation Post</h3>
                </div>

                <form action="<?= site_url('admin/donation/create') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="card-body">
                        <div class="row">
                            <!-- LEFT -->
                            <div class="col-lg-8">
                                <!-- Title -->
                                <div class="form-group mb-3">
                                    <label>Donation Title</label>
                                    <input type="text" name="title" class="form-control"
                                        placeholder="Enter donation title">
                                </div>

                                <!-- Description -->
                                <div class="form-group mb-3">
                                    <label>Description</label>

                                    <textarea name="description" rows="7" class="form-control"
                                        placeholder="Write donation description..."></textarea>
                                </div>

                                <!-- Foundation -->
                                <div class="form-group mb-3">
                                    <label>Foundation</label>

                                    <select class="form-control" name="foundation_id">

                                        <option selected disabled>
                                            Select Foundation
                                        </option>
                                        <?php /*
                                        <?php foreach ($foundations as $foundation): ?>
                                            <option value="<?= $foundation['id'] ?>">
                                                <?= esc($foundation['name']) ?>
                                            </option>
                                        <?php endforeach ?>
                                        */?>
                                    </select>
                                </div>

                                <!-- Deadline + Target -->
                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Deadline</label>

                                            <input type="datetime-local" class="form-control" name="deadline">
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Target Amount</label>

                                            <input type="number" class="form-control" name="target_amount"
                                                placeholder="10000000">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- RIGHT -->
                            <div class="col-lg-4">

                                <div class="card">

                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Donation Image
                                        </h3>
                                    </div>

                                    <div class="card-body">

                                        <input type="file" class="filepond" name="image">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">

                        <a href="<?= site_url('admin/donation') ?>" class="btn btn-secondary">

                            Cancel

                        </a>

                        <button type="submit" class="btn btn-primary float-right">

                            Save Donation

                        </button>
                    </div>
                </form>
            </div>
                </div>
            </div>
        </div>


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
    <!-- <script>
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
    </script> -->
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
</body>

</html>