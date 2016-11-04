  <!-- Control Sidebar Toggle Button -->
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form -->
      <!--<form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview {{ ($mt == "db") ? "active" : ""}}">
          <a href="{{ URL::Route('index') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa pull-right"></i>
          </a>
        </li> 
        <li class="treeview {{ ($mt == "uam") ? "active" : ""}}">
          <a href="{{ URL::Route('index') }}">
            <i class="fa fa-users"></i> <span>User Access Management</span> <i class="fa pull-right"></i>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $mt == "uam" ? (($cc == "ual") ? "active" : "") : ""}}"><a href="{{ URL::Route('getUAL') }}"><i class="fa fa-users"></i> User Access Level</a></li>
          </ul>
        </li>

        <li class="{{ ($mt == "fm") ? "active" : ""}} treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>File Maintenance</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
                <li class="{{ $mt == "fm" ? (($cc == "pc") ? "active" : "") : ""}}"><a href="{{ URL::Route('getBrgy') }}"><i class="fa fa-globe"></i> Barangay</a></li>
          </ul>
        </li>

        <!--end filemaintenance part -->
        <li class="treeview {{ ($mt == "re") ? "active" : ""}}">
          <a href="{{ URL::Route('getRecord') }}">
            <i class="fa fa-print"></i> <span>Records</span> <i class="fa pull-right"></i>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>