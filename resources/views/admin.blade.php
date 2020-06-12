
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Inventory</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" type="image/x-icon" href="../image/store.png"/>
<link href="/css/app.css" rel="stylesheet">

</head>


<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

{{--  <!-- Navbar -->  --}}
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>




    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell text-red  "></i>
          {{-- <span class="badge badge-warning navbar-badge">1</span> --}}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
    </ul>
  </nav>


{{--  <!-- /.navbar -->  --}}



  {{--  <!-- Main Sidebar Container -->  --}}

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{--  <!-- Brand Logo -->  --}}
    
    <a href="/admin" class="brand-link">
      <img src="../image/store.png" alt="Logo" class="brand-image img-circle elevation-5"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Inventory</span>
    </a>

    {{--  <!-- Sidebar -->  --}}

    <div class="sidebar">

      {{--  <!-- Sidebar user panel (optional) -->  --}}

<div class="user-panel mt-3 pb-3 mb-3 d-flex ">
        <div class="image">
          <img   src="https://randomuser.me/api/portraits/men/1.jpg"  class="img-circle elevation-2" alt="User Image">
        </div>
          <a href="#" class="d-block brand-text font-weight-light">{{ auth()->user()->Name_En }}</a>
      </div>

      {{--  <!-- Sidebar Menu -->  --}} 

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{--  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->  --}}

         <li class="nav-item">
            <router-link to="/admin" class="nav-link ">
              <i class="fas fa-tachometer-alt green--text nav-icon"></i>
              <p>Dashboard</p>
            </router-link>
          </li>  
@if (auth()->user()->hasrole('Super_Admin'))

          <li class="nav-item has-treeview mt-2">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas cyan--text fa-user-edit"></i>
              <p>
                 User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/admin/faculty" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faculty</p>
                </router-link>
              </li>  
              <li class="nav-item">
                <router-link to="/admin/department" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </router-link>
              </li>

              <li class="nav-item">
                <router-link to="/admin/permissions" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permissions</p>
                </router-link >
              </li>
              <li class="nav-item">
                <router-link to="/admin/roles"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/admin/users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </router-link >
              </li>

            </ul>
          </li>
       @endif
@if (auth()->user()->hasrole('Super_Admin') ||auth()->user()->can('Super_Admin'))
          <li class="nav-item has-treeview mt-2">
           <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-store"></i>
              <p>
                 Store
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/admin/category"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </router-link >
              </li>
              <li class="nav-item">
                <router-link to="/admin/item"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item</p>
                </router-link >
              </li>
            </ul>

          </li>
@endif
           <li class="nav-item">
                <router-link to="/admin/orders"  class="nav-link">
              <i class="nav-icon fas fa-file red--text " ></i>
                  <p> Orders</p>
                </router-link >

          </li>
          
          @if (auth()->user()->hasrole('Super_Admin'))
            
          
          <li class="nav-item" >
                <router-link to="/admin/activities"  class="nav-link">
                  <i class="far fa-bell  blue--text nav-icon"></i>
                  <p>Activity</p>
                </router-link>
              </li>
          @endif

              <li class="nav-item">
      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
                  <i class="fa fa-power-off red--text  nav-icon"></i>
                     <p>
                    {{ __('Logout') }}
                    </p>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>  
        </ul>
      </nav>
      {{--  <!-- /.sidebar-menu -->  --}}
    </div>
    {{--  <!-- /.sidebar -->  --}}
  </aside>



  {{--  <!-- Content Wrapper. Contains page content -->
    --}}
   <div class="content-wrapper">
        <Admin :user="{{auth()->user()->load('notifications')}}"></Admin>      
      
     </div>

  {{--  <!-- Main Footer -->  --}}
  <footer class="main-footer">
    {{--  <!-- To the right -->  --}}
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    {{--  <!-- Default to the left -->  --}}
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
{{--  <!-- ./wrapper -->  --}}


 <script src="{{ asset('js/app.js') }}" defer></script>
     <script>
        window.user = @json(
        [
            'user'=> auth()->user()->load('notifications'),
            'roles'=>auth()->user()->roles,
            'permissions'=> auth()->user()->getAllPermissions()
        ]
        );

    </script>


</body>
</html>
