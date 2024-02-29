@extends('admin.template')

@section('main-containt')
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Addtion Form
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- ./col -->
            <div class="register-box">
                <div class="register-logo">
                    <a href="index2.html"><b>{{env('APP_NAME')}}</b></a>
                </div>

                <div class="register-box-body">
                    <p class="login-box-msg">Add a new Admin</p>

                    <form action="{{route('admin.submit.register')}}" method="post">
                        @csrf
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Full name" name="name">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            @error('name')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @error('email')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @error('password')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            @error('password_confirmation')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <br>
                    <a href="{{route('admin.login')}}" class="text-center">I already have a membership</a>
                </div>
            <!-- /.form-box -->
            </div>
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@endsection
