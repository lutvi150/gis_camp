 <?php $session = \Config\Services::session(); ?>
 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">CAMP </div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="index.html">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">

         Menu <?= $session->get('role'); ?>
     </div>
     <!-- Nav Item - Tables -->
     <?php if ($session->get('role') == 'administrator'): ?>
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('index.php/admin/') ?>">
                 <i class="fas fa-fw fa-table"></i>
                 <span>Dashboard</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('index.php/admin/users') ?>">
                 <i class="fas fa-fw fa-table"></i>
                 <span>Daftar Pengguna</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#" onclick="show_load()">
                 <i class="fas fa-fw fa-table"></i>
                 <span>Daftar Tempat Camping</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#" onclick="show_load()">
                 <i class="fas fa-fw fa-table"></i>
                 <span>Pesanan Masuk</span></a>
         </li>
     <?php elseif ($session->get('role') == 'user'): ?>
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('index.php/user/transaksi') ?>">
                 <i class="fas fa-fw fa-book"></i>
                 <span>Pesanan</span></a>
         </li>
     <?php elseif ($session->get('role') == 'owner'): ?>
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('index.php/owner/') ?>">
                 <i class="fas fa-fw fa-table"></i>
                 <span>Dashboard</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('index.php/owner/produk') ?>">
                 <i class="fas fa-fw fa-table"></i>
                 <span>Produk</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('index.php/owner/transaksi') ?>">
                 <i class="fas fa-fw fa-table"></i>
                 <span>Transaksi</span></a>
         </li>

         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('index.php/owner/detail') ?>">
                 <i class="fas fa-fw fa-map"></i>
                 <span>Detail Lokasi Camping</span></a>
         </li>
     <?php endif; ?>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>


 </ul>
 <!-- End of Sidebar -->