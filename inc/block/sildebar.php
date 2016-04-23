<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo $rowUserInfo['picture']; ?>" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p><?php echo utf8_decode($rowUserInfo['name']." ".$rowUserInfo['last_name']); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>

      </li>

      <li>
        <a href="#">
          <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">Hot</small>
        </a>
      </li>

      <li>
        <a href="mailbox/mailbox.html">
          <i class="fa fa-envelope"></i> <span>Box</span>
          <small class="label pull-right bg-yellow">12</small>
        </a>
      </li>


    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<!-- =============================================== -->
