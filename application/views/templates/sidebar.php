<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/user9-128x128.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin BKK</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    
    <li class="<?php echo ($this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>">
        <a href="<?php echo base_url('admin/dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="<?php echo ($this->uri->segment(1) == 'siswa') ? 'active' : ''; ?>">
        <a href="<?php echo base_url('siswa/index'); ?>">
            <i class="fa fa-graduation-cap"></i> <span>Data Siswa</span>
        </a>
    </li>

    <li class="<?php echo ($this->uri->segment(1) == 'perusahaan') ? 'active' : ''; ?>">
        <a href="<?php echo base_url('perusahaan/index'); ?>">
            <i class="fa fa-university"></i> <span>Data Perusahaan</span>
        </a>
    </li>

    <li>
        <a href="<?php echo base_url('auth/logout'); ?>">
            <i class="fa fa-sign-out"></i> <span>Log Out</span>
        </a>
    </li>
</ul>


    </section>
    <!-- /.sidebar -->
    </aside>