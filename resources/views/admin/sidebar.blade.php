<?php
  use App\Models\Admin;
  use Illuminate\Support\Facades\Auth;

  $id = Auth::guard('admin')->id();
  $data = Admin::where('id',$id)->first();
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{URL::TO('admin/')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{$data->name}}</p>
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
        <li class="">
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
          <i class="fa fa-book"></i>
            <span>Display Management</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.add-banner')}}"><i class="fa fa-circle-o"></i>Banner</a></li>
            <li><a href="{{route('admin.edit-contact')}}"><i class="fa fa-circle-o"></i>Contact Us</a></li>
            <li><a href="{{route('admin.edit-about')}}"><i class="fa fa-circle-o"></i>About Us</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Category Management</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.Catagory')}}"><i class="fa fa-circle-o"></i>Main category</a></li>
            <li><a href="{{route('admin.Sub-Catagory')}}"><i class="fa fa-circle-o"></i>Sub Category</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Products</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.add-product')}}"><i class="fa fa-circle-o"></i>Add Product</a></li>
          </ul>
        </li>
        <li>
          <a href="widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>