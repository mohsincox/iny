<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Motor Sheba</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

  <style type="text/css">
    .alert {
        padding: 2px; 
        margin-bottom: 2px;
    }

    .required:after{ 
      content:'*'; 
      color:red; 
      padding-left:5px;
    }
  </style>

     @yield('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">
  
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown">

        <!-- <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="{{ asset('images/user.png') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  @if(isset(Auth::user()->name))
                    {{ Auth::user()->name }}
                  @else
                    Guest User
                  @endif
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
        </div> -->

        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(isset(Auth::user()->name))
                    {{ Auth::user()->name }}
                  @else
                    Guest User
                  @endif
                                </a>

                                @if(isset(Auth::user()->name))
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                @endif

      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <a href="{{ url('/') }}" class="brand-link" style="background-color: white">
      <center><img src="{{ asset('images/new_logo.png') }}" alt="ms Logo"></center>
      <!-- <center><img src="{{ asset('images/Motor-Sheba-Logo_edit.png') }}" alt="ms Logo" width="129" height="30"></center> -->
    </a>

    <div class="sidebar">
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Test
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Test v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Test v2</p>
                </a>
              </li>
            </ul>
          </li> -->

          @php
            if(strpos($_SERVER['HTTP_USER_AGENT'], 'wv') !== FALSE) {
          @endphp
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/product') }}" class="nav-link">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Product List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/product/create') }}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Product Create</p>
                </a>
              </li>
            </ul>
          </li>
          @php
            } else {
          @endphp
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/product') }}" class="nav-link">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Product List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/product/create') }}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Product Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Vendor
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/vendor') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vendor List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/vendor/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Vendor</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Vendor User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!-- <a href="{{ url('/brand') }}" class="nav-link"> -->
                <a href="{{ url('/vendor-user') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vendor User List</p>
                </a>
              </li>
              <li class="nav-item">
                <!-- <a href="{{ url('/brand/create') }}" class="nav-link"> -->
                <a href="{{ url('/vendor-user/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vendor User Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/category') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/category/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Sub Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/sub-category') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Category List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/sub-category/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Category Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Product Type
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/product-type') }}" class="nav-link">
                <!-- <a href="{{ url('#') }}" class="nav-link"> -->
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Type List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/product-type/create') }}" class="nav-link">
                <!-- <a href="{{ url('#') }}" class="nav-link"> -->
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Type Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Product Group
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/product-group') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Group List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/product-group/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Group Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Brand
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/brand') }}" class="nav-link">
                <!-- <a href="{{ url('#') }}" class="nav-link"> -->
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/brand/create') }}" class="nav-link">
                <!-- <a href="{{ url('#') }}" class="nav-link"> -->
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Vehicle Maker
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/vehicle-maker') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vehicle Maker List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/vehicle-maker/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vehicle Maker Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Vehicle Model
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/vehicle-model') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vehicle Model List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/vehicle-model/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vehicle Model Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/report/product-form') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/report/category-form') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Wise</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/report/brand-form') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand Wise</p>
                </a>
              </li>
            </ul>
          </li>

          @php
            }
          @endphp

          <!-- <li class="nav-item">
            <a href="{{ url('/vendor') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Vendor
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/category') }}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/sub-category') }}" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Sub Category
              </p>
            </a>
          </li> -->
          
        </ul>
      </nav>
      
    </div>
    
  </aside>

  
  <div class="content-wrapper">

    <div class="container">
        <div class="col-12 col-sm-8 offset-sm-2">
            <center>@include('flash::message')</center>
        </div>
    </div>

    @yield('content')
    
    
  </div>
  

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <a href="https://motorsheba.com/" target="_blank"><b>Website:</b> www.motorsheba.com</a>
    </div>
    <strong>Copyright &copy; @php echo date('Y') @endphp <a href="https://motorsheba.com/" target="_blank">Motor Sheba</a>.</strong> All rights reserved.
  </footer>

  
  <aside class="control-sidebar control-sidebar-dark">
    
  </aside>
  
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
@yield('script')
</body>
</html>
