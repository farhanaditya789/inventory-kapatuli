<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/dashboard') ?>">
        <img src="<?= base_url('assets/template/img/bread-white.png') ?>" width="60" height="60">
        <div class="sidebar-brand-text mx-3">Inventory Kapatuli</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $this->uri->uri_string() == 'dashboard' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('/dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Super Admin Role -->
    <?php if ($this->session->userdata('roles_id') == 1) : ?>

        <div class="sidebar-heading">
            MASTER DATA
        </div>

        <!-- Nav Item - Supplier -->
        <li class="nav-item <?= $this->uri->uri_string() == 'supplier' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('supplier') ?>">
                <i class="fas fa-fw fa-cart-plus"></i>
                <span>Supplier</span></a>
        </li>

        <!-- Nav Item - Merchant -->
        <li class="nav-item <?= $this->uri->uri_string() == 'merchant' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('merchant') ?>">
                <i class="fas fa-fw fa-shopping-bag"></i>
                <span>Merchant</span></a>
        </li>

        <!-- Nav Item - Product -->
        <li class="nav-item <?= $this->uri->uri_string() == 'products' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('products') ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Product Kapatuli</span></a>
        </li>

        <!-- Heading -->
        <div class="sidebar-heading">
            MENU
        </div>

        <!-- Nav Item - Report Delivery -->
        <li class="nav-item <?= $this->uri->uri_string() == 'report_delivery' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('report_delivery') ?>">
                <i class="fas fa-fw fa-truck"></i>
                <span>Report Delivery</span></a>
        </li>

        <!-- Nav Item - Stock In -->
        <li class="nav-item ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-fw fa-arrow-left"></i>
                <span>Stock In</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">STOCK IN MENU</h6>
                    <a class="collapse-item <?= $this->uri->uri_string() == 'supplier_product' ? 'active' : '' ?>" href="<?= base_url('supplier_product') ?>">Supplier Product</a>
                    <a class="collapse-item <?= $this->uri->uri_string() == 'inventaris_pendataan' ? 'active' : '' ?>" href="<?= base_url('inventaris_pendataan') ?>">Inventaris Pendataan</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Stock Out -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-arrow-right"></i>
                <span>Stock Out</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">STOCK OUT MENU</h6>
                    <a class="collapse-item <?= $this->uri->uri_string() == 'supplier_product' ? 'active' : '' ?>" href="<?= base_url('supplier_product') ?>">Supplier Product</a>
                    <a class="collapse-item <?= $this->uri->uri_string() == 'inventaris_pendataan_out' ? 'active' : '' ?>" href="<?= base_url('inventaris_pendataan_out') ?>">Inventaris Pendataan</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Users Management
        </div>

        <!-- Nav Item - Roles Management -->
        <li class="nav-item <?= $this->uri->uri_string() == 'roles' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('roles') ?>">
                <i class="fas fa-fw fa-key"></i>
                <span>Roles</span></a>
        </li>

        <!-- Nav Item - Users Management -->
        <li class="nav-item <?= $this->uri->uri_string() == 'users' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('users') ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span></a>
        </li>

        <hr class="sidebar-divider">

    <!-- Admin Role -->
    <?php elseif ($this->session->userdata('roles_id') == 2) : ?>

        <!-- Heading -->
        <div class="sidebar-heading">
            MENU
        </div>

        <!-- Nav Item - Report Delivery -->
        <li class="nav-item <?= $this->uri->uri_string() == 'report_delivery' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('report_delivery') ?>">
                <i class="fas fa-fw fa-truck"></i>
                <span>Report Delivery</span></a>
        </li>

        <!-- Nav Item - Stock In -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-fw fa-arrow-left"></i>
                <span>Stock In</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">STOCK IN MENU</h6>
                    <a class="collapse-item <?= $this->uri->uri_string() == 'supplier_product' ? 'active' : '' ?>" href="<?= base_url('supplier_product') ?>">Partner</a>
                    <a class="collapse-item <?= $this->uri->uri_string() == 'inventaris_pendataan' ? 'active' : '' ?>" href="<?= base_url('inventaris_pendataan') ?>"> Pendataan</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Stock Out -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-arrow-right"></i>
                <span>Stock Out</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">STOCK OUT MENU</h6>
                    <a class="collapse-item <?= $this->uri->uri_string() == 'supplier_product' ? 'active' : '' ?>" href="<?= base_url('supplier_product') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'supplier_product') echo 'active' ?>">Partner</a>
                    <a class="collapse-item <?= $this->uri->uri_string() == 'inventaris_pendataan_out' ? 'active' : '' ?>" href="<?= base_url('inventaris_pendataan_out') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'inventaris_pendataan_out') echo 'active' ?>">Inventaris Pendataan</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Users Management
        </div>

        <!-- Nav Item - Users Management -->
        <li class="nav-item <?= $this->uri->uri_string() == 'users' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('users') ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span></a>
        </li>

        <hr class="sidebar-divider">

    <!-- Employee Role -->
    <?php else : ?>

        <!-- Heading -->
        <div class="sidebar-heading">
            MENU
        </div>

        <!-- Nav Item - Stock In -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-fw fa-arrow-left"></i>
                <span>Stock In</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">STOCK IN MENU</h6>
                    <a class="collapse-item <?= $this->uri->uri_string() == 'supplier_product' ? 'active' : '' ?>" href="<?= base_url('supplier_product') ?>">Partner</a>
                    <a class="collapse-item <?= $this->uri->uri_string() == 'inventaris_pendataan' ? 'active' : '' ?>" href="<?= base_url('inventaris_pendataan') ?>"> Pendataan</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Stock Out -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-arrow-right"></i>
                <span>Stock Out</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">STOCK OUT MENU</h6>
                    <a class="collapse-item <?= $this->uri->uri_string() == 'supplier_product' ? 'active' : '' ?>" href="<?= base_url('supplier_product') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'supplier_product') echo 'active' ?>">Partner</a>
                    <a class="collapse-item <?= $this->uri->uri_string() == 'inventaris_pendataan_out' ? 'active' : '' ?>" href="<?= base_url('inventaris_pendataan_out') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'inventaris_pendataan_out') echo 'active' ?>">Inventaris Pendataan</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

    <?php endif; ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>