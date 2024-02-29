
@extends('admin.template')

@section('main-containt')
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contact Us Form
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- ./col -->
            <div class="register-box">
                <div class="register-box-body">
                    <p class="login-box-msg">Edit Contact Details</p>

                    <form action="{{route('admin.submit.contact')}}" method="post">
                        @csrf
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Address" name="address">
                            @error('address')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                            @error('email')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Contact Number" name="phone">
                            @error('phone')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <label>OPENING TIMES
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Monday To Friday" name="monday_to_friday">
                                @error('monday_to_friday')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Saturday" name="saturday">
                                @error('saturday')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Sunday" name="sunday">
                                @error('sunday')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </label>
                        <div class="form-group has-feedback">
                            <textarea class="form-control" name="Comment" placeholder="Comment"></textarea>
                            @error('Comment')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
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
