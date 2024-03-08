@extends('admin.template')

@section('main-containt')

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
                <p class="alert alert-success">{{Session('message')}}</p>
            @endif
                <div class="register-box-body">
                    <p class="login-box-msg">Add Model Name</p>

                    <form action="{{route('admin.submit.model')}}" method="post">
                        @csrf
                        <div class="form-group has-feedback">
                            <select class="form-control" name="company_id" id="company">
                                <option value="" selected disabled>Select company</option>
                                @foreach($company as $value)
                                    <option value="{{$value->id}}">{{$value->company_name}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Enter Model Name" name="model_name">
                            <!-- @error('subcatagory')
                                <span class="text-danger">{{$message}}</span>
                            @enderror -->
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
            <table class="table" id="model_name">
                <tr>
                  <th>S. No.</th>
                  <th>company_id</th>
                  <th>model Name</th>
                  <th>Action</th>
                </tr>
                
                @foreach($join as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->company_id}}</td>
                    <td>{{$value->model_name}}</td>
                    <td>
                      <a href="#">Edit</a><br>
                      <a href="#">Delete</a>
                    </td>
                  </tr>
                @endforeach
                  
                
            </table>    
        </div>
    </section>
</div>


@endsection