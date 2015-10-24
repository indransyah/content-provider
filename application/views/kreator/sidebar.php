<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?php echo base_url('kreator'); ?>"><i class="fa fa-home"></i> Home</a></li>
        </ul>
      </li>
      <li class="">
        <a href="#">
          <i class="fa fa-lightbulb-o"></i> <span>Job</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?php echo base_url('kreator/job/view'); ?>"><i class="fa fa-server"></i> Lihat Job</a></li>
          <!-- <li class="active"><a href="#"><i class="fa  fa-desktop"></i> My Job</a></li> -->
        </ul>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-gift"></i> <span>Konten</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?php echo base_url('kreator/konten/kirim'); ?>"><i class="fa fa-cloud"></i> Kirim Konten Konten </a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-male"></i> <span>Profil</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="#"><i class="fa fa-user"></i> My Profil </a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

