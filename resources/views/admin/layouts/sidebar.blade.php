 
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item" class="{{ Request::is('adminDashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('/adminDashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @if(Auth::guard('admin')->check())
          @if(Auth::guard('admin')->user()->type == 'vendorr')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-vendor" aria-expanded="false" aria-controls="ui-vendor">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Vendor Details</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-vendor">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('vendorUpdate/personal')}}">Personal Details</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('vendorUpdate/bussiness')}}">Bussiness Details</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('vendorUpdate/bank')}}">Bank Details</a></li>
                
              </ul>
            </div>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-setting" aria-expanded="false" aria-controls="ui-setting">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Setting</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-setting">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a  class="nav-link" href="{{url('adminPassword')}}">Update Password</a></li>
<li class="nav-item"> <a class="nav-link" href="{{url('updateDetails')}}">Update Details</a></li>
                
              </ul>
            </div>
          </li>
          @endif
        

          @if (Auth::guard('admin')->user()->type == 'admin')
          <li class="nav-item" >
            <a class="nav-link" data-toggle="collapse" href="#ui-admin" aria-expanded="false" aria-controls="ui-admin">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Admin Managment</span>
              <i class="menu-arrow"></i>
            </a>
    
           <div class="collapse" id="ui-admin">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/superadmin')}}">Super Admins</a></li>
                <li  class="nav-item"> <a class="nav-link" href="{{url('admin/vendorr')}}"> Admins</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/vendorr')}}">Vendors</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/admins')}}">All</a></li>
              </ul>
            </div>

          </li>

  

          <li class="nav-item" class="sidebar">
            <a class="nav-link" data-toggle="collapse" href="#ui-user1" aria-expanded="false" aria-controls="ui-user1">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">User Managment</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-user1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('adminPassword')}}">User</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('adminPassword')}}">Subscribers</a></li>
              </ul>
            </div>
          </li>

          <!-- catoloug managment -->
          <li class="nav-item" class="sidebar">
            <a class="nav-link" data-toggle="collapse" href="#ui-Catoloug" aria-expanded="false" aria-controls="ui-Catoloug">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Catoloug Managment</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-Catoloug">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('adminSection')}}">Section</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('category')}}">Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('brand')}}">Brand</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('products')}}">Products</a></li>
              </ul>
            </div>
          </li>
          @endif

          @endif
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Form elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Charts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Icons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="icon-ban menu-icon"></i>
              <span class="menu-title">Error pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>