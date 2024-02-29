@extends('admin.template')

@section('main-containt')
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
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
                    <p class="login-box-msg">Edit Data</p>

                    <form action="{{route('admin.submit.edit-subcatagory',$edit_data->id)}}" method="post">
                        @csrf
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Enter Catagory Name" value="{{$edit_data->subcatagory_name}}" name="editsubcategory">
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


