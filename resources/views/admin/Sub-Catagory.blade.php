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
            @if(Session::has('message'))
                <p class="alert alert-success">{{Session::get('message')}}</p>
            @endif
                <div class="register-box-body">
                    <p class="login-box-msg">Add Sub-Category</p>

                    <form action="{{route('admin.submit.Sub-Catagory')}}" method="post">
                        @csrf
                        <div class="form-group has-feedback">
                            <select class="form-control" name="catagory_id" id="">
                                <option value="" selected disabled>Select Catagory</option>
                                @foreach($catagory as $value)
                                    <option value="{{$value->id}}">{{$value->catagory_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Entry Sub Catagory Name" name="subcatagory">
                            @error('subcatagory')
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
    <section class="container">
        <div class="row">
            <table class="table" id="Subcategory">
                <tr>
                    <th>S. No.</th>
                    <th>Catagory ID</th>
                    <th>Sub Catagory Name</th>
                    <th>Action</th>
                </tr>
                <?php $id = 1;?>
                @foreach($data as $value)
                    <tr>
                        <td>{{$id}}</td>
                        <td>{{$value->catagory_name}}</td>
                        <td>{{$value->subcatagory_name}}</td>
                        <td>
                            <a href="{{route('admin.edit-subcatagory',$value->id)}}">Edit</a><br>
                            <a href="{{route('admin.delete_subcatagory_link',$value->id)}}">Delete</a>
                        </td>
                    </tr>
                    <?php $id++; ?>
                @endforeach
            </table>    
        </div>
    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@endsection

@push('javascript')
    <script>
        $(document).ready(function(){
            
        })
    </script>
@endpush
