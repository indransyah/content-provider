<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      
      <div class="pull-left info">
        <p>Alexander Pierce</p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="<?php if ($this->uri->segment(2)=='' OR $this->uri->segment(2)=='index') echo 'active'; ?>">
        <a href="<?php echo base_url('dashboard'); ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
        <!-- <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2)=='' OR $this->uri->segment(2)=='index') echo 'active'; ?>"><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
        </ul> -->
      </li>
      <li class="<?php if ($this->uri->segment(2)=='order') echo 'active'; ?> treeview">
        <a href="#">
          <i class="fa fa-shopping-cart"></i> <span>Order</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2)=='order' AND $this->uri->segment(3)=='view') echo 'active'; ?>"><a href="<?php echo base_url('dashboard/order/view'); ?>"><i class="fa fa-server"></i> Lihat Order</a></li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(2)=='job' || $this->uri->segment(2)=='konten') echo 'active'; ?> treeview">
        <a href="#">
          <i class="fa fa-lightbulb-o"></i> <span>Job</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2)=='job' AND $this->uri->segment(3)=='view') echo 'active'; ?>"><a href="<?php echo base_url('dashboard/job/view'); ?>"><i class="fa fa-server"></i> Lihat Job</a></li>
          <!-- <li class="<?php if ($this->uri->segment(2)=='job' AND $this->uri->segment(3)=='add') echo 'active'; ?>"><a href="<?php echo base_url('dashboard/job/add'); ?>"><i class="fa fa-user-plus"></i> Tambah Job</a></li> -->
          <li class="<?php if ($this->uri->segment(2)=='konten' AND $this->uri->segment(3)=='view') echo 'active'; ?>"><a href="<?php echo base_url('dashboard/konten/view'); ?>"><i class="fa fa-server"></i> Konten</a></li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(2)=='pemesan') echo 'active'; ?> treeview">
        <a href="#">
          <i class="fa fa-user"></i> <span>Customer</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2)=='pemesan' AND $this->uri->segment(3)=='view') echo 'active'; ?>"><a href="<?php echo base_url('dashboard/pemesan/view'); ?>"><i class="fa fa-server"></i> Lihat Pemesan</a></li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(2)=='kreator') echo 'active'; ?> treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Kreator</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2)=='kreator' AND $this->uri->segment(3)=='view') echo 'active'; ?>"><a href="<?php echo base_url('dashboard/kreator/view'); ?>"><i class="fa fa-server"></i> Lihat Kreator</a></li>
          <!-- <li class="<?php if ($this->uri->segment(2)=='kreator' AND $this->uri->segment(3)=='add') echo 'active'; ?>"><a href="<?php echo base_url('dashboard/kreator/add'); ?>"><i class="fa fa-user-plus"></i> Tambah Kreator</a></li> -->
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(2)=='pembayaran') echo 'active'; ?> treeview">
        <a href="#">
          <i class="fa fa-money"></i> <span>Pembayaran</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2)=='pembayaran' AND $this->uri->segment(3)=='view') echo 'active'; ?>"><a href="<?php echo base_url('dashboard/pembayaran/view'); ?>"><i class="fa fa-server"></i> Verifikasi Pembayaran</a></li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(2)=='pendapatan') echo 'active'; ?> treeview">
        <a href="#">
          <i class="fa fa-money"></i> <span>Pendapatan</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2)=='pendapatan' AND $this->uri->segment(3)=='view') echo 'active'; ?>"><a href="<?php echo base_url('dashboard/pendapatan/view'); ?>"><i class="fa fa-server"></i> Pendapatan</a></li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(2)=='paket') echo 'active'; ?> treeview">
        <a href="#">
          <i class="fa fa-gift"></i> <span>Paket</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2)=='paket' AND $this->uri->segment(3)=='view') echo 'active'; ?>"><a href="<?php echo base_url('dashboard/paket/view'); ?>"><i class="fa fa-server"></i> Lihat Paket</a></li>
          <li class="<?php if ($this->uri->segment(2)=='paket' AND $this->uri->segment(3)=='add') echo 'active'; ?>"><a href="<?php echo base_url('dashboard/paket/add'); ?>"><i class="fa fa-plus-circle"></i> Tambah Paket</a></li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(2)=='admin') echo 'active'; ?> treeview">
        <a href="#">
          <i class="fa fa-male"></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2)=='admin' AND $this->uri->segment(3)=='view') echo 'active'; ?>"><a href="<?php echo base_url('dashboard/admin/view'); ?>"><i class="fa fa-server"></i> Lihat Admin</a></li>
          <li class="active"><a href="#"><i class="fa fa-user-plus"></i> Tambah Admin</a></li>
          <li class="active"><a href="#"><i class="fa fa-user"></i> Profil</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

