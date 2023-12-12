        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $foto; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $nama; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU <?php echo $level; ?></li>
            <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-send"></i> <span>Send SMS</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="index.php?view=sms"><i class="fa fa-circle-o"></i> Single SMS</a></li>
                <li><a href="index.php?view=broadcast"><i class="fa fa-circle-o"></i> Broadcast SMS</a></li>
                <li><a href="index.php?view=boom"><i class="fa fa-circle-o"></i> Booom SMS</a></li>
                <li><a href="index.php?view=autoreply"><i class="fa fa-circle-o"></i> Autoreply SMS</a></li>
                <li><a href="index.php?view=polling"><i class="fa fa-circle-o"></i> Polling SMS</a></li>
              </ul>
            </li>
            <li><a href="index.php?view=group"><i class="fa fa-th-list"></i> Groups Contact <span class="badge"><?php echo $e[total]; ?></span></a></li>
            <li><a href="index.php?view=contact"><i class="fa fa-th-list"></i> Contacts List<span class="badge"><?php echo $f[total]; ?></span></a></li>

            <li><a href="index.php?view=inbox"><i class="fa fa-th-list"></i> Inbox <span class="badge"><?php echo $a[total]; ?></span></a></li>
            <li><a href="index.php?view=outbox"><i class="fa fa-list"></i> Outbox <span class="badge"><?php echo $b[total]; ?></span></a></li>
            <li><a href="index.php?view=sentitems"><i class="fa fa-share-alt"></i> Sent Items <span class="badge"><?php echo $c[total]; ?></span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-cog"></i> <span>Setting</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="index.php?view=admin"><i class="fa fa-circle-o"></i> Data Users</a></li>
                <li><a href="index.php?view=setting"><i class="fa fa-circle-o"></i> Modem Setting</a></li>
              </ul>
            </li>
            <li><a href="index.php?view=dokumentasi"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
          </ul>
        </section>