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
                    <p class="alert alert-success">{{Session::get('message')}}</p>
                @endif
                <div class="register-box-body">
                    
                    <p class="login-box-msg">Add Company Name</p>

                    <form action="{{route('admin.submit.company_name')}}" method="post">
                        @csrf
                        <div class="form-group has-feedback">
                            
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Entry Company Name" name="company_name">
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
            <table class="table" id="">
                <tr>
                  <th>S. No.</th>
                  <th>comapny_Name</th>
                  <th>Action</th>
                </tr>
                
                @foreach($company as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->company_name}}</td>
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