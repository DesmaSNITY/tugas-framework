<nav class="mt-2" aria-label="Main navigation">
          <!--begin::Sidebar Menu-->
          <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" data-accordion="false" id="navigation">

            <li class="nav-header">PAGES</li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-file-earmark-text"></i>
                <p>
                  Table List
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/foundations') ?>" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>List Yayasan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/donationposts') ?>" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>List Donation</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/expenses') ?>" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>List Expenses</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('admin/users') ?>" class="nav-link">
                <i class="nav-icon bi bi-people"></i>
                <p>Users</p>
              </a>
            </li>

        </nav>