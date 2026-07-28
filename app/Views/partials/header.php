<nav class="app-header navbar navbar-expand bg-body">
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button" aria-label="Toggle sidebar">
              <i class="bi bi-list"></i>
            </a>
          </li>
        </ul>
        <!--end::Start Navbar Links-->

        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">

          <!--begin::Fullscreen Toggle-->
          <li class="nav-item">
            <a class="nav-link" href="#" data-lte-toggle="fullscreen" aria-label="Toggle fullscreen">
              <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
              <i data-lte-icon="minimize" class="bi bi-fullscreen-exit d-none"></i>
            </a>
          </li>
          <!--end::Fullscreen Toggle-->

          <!--begin::Color Mode Toggle (#6010)-->
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="bd-theme" aria-label="Toggle color scheme" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="bi bi-sun-fill" data-lte-theme-icon="light"></i>
              <i class="bi bi-moon-fill d-none" data-lte-theme-icon="dark"></i>
              <i class="bi bi-circle-half d-none" data-lte-theme-icon="auto"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme"
              style="--bs-dropdown-min-width: 8rem">
              <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                  aria-pressed="false">
                  <i class="bi bi-sun-fill me-2"></i>
                  Light
                  <i class="bi bi-check-lg ms-auto d-none"></i>
                </button>
              </li>
              <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                  aria-pressed="false">
                  <i class="bi bi-moon-fill me-2"></i>
                  Dark
                  <i class="bi bi-check-lg ms-auto d-none"></i>
                </button>
              </li>
              <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                  aria-pressed="true">
                  <i class="bi bi-circle-half me-2"></i>
                  Auto
                  <i class="bi bi-check-lg ms-auto d-none"></i>
                </button>
              </li>
            </ul>
          </li>
          <!--end::Color Mode Toggle-->

          <?php $currentUser = auth()->user(); ?>

          <!--begin::User Menu Dropdown-->
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <?php if (! empty($currentUser->avatar)): ?>
                <img src="<?= esc($currentUser->avatar) ?>" class="user-image rounded-circle shadow"
                  alt="<?= esc($currentUser->username) ?>" />
              <?php else: ?>
                <i class="bi bi-person-circle fs-4"></i>
              <?php endif; ?>
              <span class="d-none d-md-inline">
                <?php
                  $displayName = trim(($currentUser->first_name ?? '') . ' ' . ($currentUser->last_name ?? ''));
                  echo esc($displayName !== '' ? $displayName : $currentUser->username);
                ?>
              </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
              <!--begin::User Image-->
              <li class="user-header text-bg-primary">
                <?php if (! empty($currentUser->avatar)): ?>
                  <img src="<?= esc($currentUser->avatar) ?>" class="rounded-circle shadow"
                    alt="<?= esc($currentUser->username) ?>" />
                <?php else: ?>
                  <i class="bi bi-person-circle" style="font-size: 90px;"></i>
                <?php endif; ?>
                <p>
                  <?= esc($displayName !== '' ? $displayName : $currentUser->username) ?>
                  <small>@<?= esc($currentUser->username) ?></small>
                </p>
              </li>
              <!--end::User Image-->
              <!--begin::Menu Footer-->
              <li class="user-footer">
                <a href="<?= base_url('admin/users/view/' . $currentUser->id) ?>" class="btn btn-outline-secondary">
                  <i class="bi bi-person me-1"></i> Profile
                </a>
                <a href="<?= base_url('logout') ?>" class="btn btn-outline-danger float-end">
                  <i class="bi bi-box-arrow-right me-1"></i> Sign out
                </a>
              </li>
              <!--end::Menu Footer-->
            </ul>
          </li>
          <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
      </div>
      <!--end::Container-->
    </nav>