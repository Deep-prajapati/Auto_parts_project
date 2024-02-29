@extends('admin.template')

@section('main-containt')
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Banner Form
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
                    <b>Add a New Banner</b>
                </div>

                <div class="register-box-body">
                    <p class="login-box-msg"></p>

                    <form action="{{route('admin.submit.banner')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group has-feedback">
                            <input type="file" class="form-control" name="image" accept="image/JPG image/png">
                            @error('image')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Upload</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
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
