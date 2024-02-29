
@extends('admin.template')

@push('css')
  <style>
    .form-group {
      margin-bottom: 30px !important;
    }
    input[type=checkbox], input[type=radio] {
      margin: 0px 0 0;
      line-height: normal;
      vertical-align: middle;
    }
    
    .imageadd {
      margin-left: 13px;
      margin-bottom: 20px;
    }
  </style>
@endpush

@section('main-containt')
  <!-- Left side column. contains the logo and sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Product
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- ./col -->
            <div class="product-box">
                <div class="register-box-body">
                  @if(Session::has('message'))
                    <p class="alert alert-info">{{ Session::get('message') }}</p>
                  @endif
                    <p class="login-box-msg">Add Product</p>

                    <form action="{{route('admin.submit.product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group has-feedback">
                          <div class="row">
                            <div class="col-md-12 mb-5">
                              <select name="" id="Category" class="form-control">
                                <option value selected disabled>Select Category</option>
                                @foreach($catagory as $value)
                                    <option value="{{$value->id}}">{{$value->catagory_name}}</option>
                                @endforeach
                              </select>
                              @error('Category')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <div class="row">
                            <div class="col-md-12 mb-5">
                              <select name="Subcategory" id="subcatagory" class="form-control">
                                <option value="" selected disabled>Select Category</option>
                              </select>
                              @error('Category')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <div class="row">
                            <label class="form-label col-md-2 text-right">Product Name : </label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" id="product" placeholder="Product Name" name="Product Name" value="{{old('Product_Name')}}">
                              @error('Product_Name')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                              <div id="error-section-product">

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <div class="row">
                            <label class="form-label col-md-2 text-right">Short Discription :</label>
                            <div class="col-md-10">
                              <textarea class="form-control" name="Short Discription" cols="30" rows="3">{{old('Short_Discription')}}</textarea>
                              @error('Short_Discription')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <div class="row">
                            <label class="form-label col-md-2 text-right">Discription : </label>
                            <div class="col-md-10">
                            <textarea class="form-control" name="discription" cols="30" rows="5">{{old('discription')}}</textarea>
                              @error('discription')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <div class="row">
                            <label class="form-label col-md-2 text-right">Key Features : </label>
                            <div class="col-md-10">
                            <textarea class="form-control" id="features" name="features" cols="30" rows="5">{{old('features')}}</textarea>
                              @error('features')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <div class="row">
                            <label class="form-label col-md-2 text-right">Specification : </label>
                            <div class="col-md-10">
                            <textarea class="form-control" id="specification" name="specification" cols="30" rows="5">{{old('specification')}}</textarea>
                              @error('specification')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <div class="row">
                            <label class="form-label col-md-2 text-right">SKU Code : </label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" name="sku code" value="{{old('sku_code')}}">
                              @error('sku_code')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <div class="row">
                            <label class="form-label col-md-2 text-right">Brand Name : </label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" name="brand name" value="{{old('brand_name')}}">
                              @error('brand_name')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <div class="row">
                            <label class="form-label col-md-2 text-right">Thumbnail : </label>
                            <div class="col-md-9">
                              <input type="file" class="form-control" name="thumbnail">
                              @error('thumbnail')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <div class="row">
                            <div class="col-md-2"></div>
                            <input type="button" class="btn btn-primary col-md-2 imageadd" value="Add Image">
                            <div class="col-md-8"></div>
                          </div>
                          <div id="sub-image">

                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <div class="row">
                            <label class="form-label col-md-2 text-right">Select Sections : </label>
                            <div class="col-md-10">
                              <label>Featured - <input type="checkbox" name="section[]" value="1"></label>&nbsp;&nbsp;&nbsp;
                              <label>Best Seller - <input type="checkbox" name="section[]" value="2"></label>&nbsp;&nbsp;&nbsp;
                              <label>Popular - <input type="checkbox" name="section[]" value="3"></label><br>
                              @error('section')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="form-group has-feedback">
                          <div class="row">
                            <label class="form-label col-md-2 text-right">Price : </label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" name="price" value="{{old('price')}}">
                              @error('price')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                          </div>
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

@push('javascript')
    <script>
      $(document).ready(function(){
        var image = "<div class='image_section'><div class='form-group has-feedback'><div class='row'><label class='form-label col-md-2 text-right'>Image : </label><div class='col-md-9'><input type='file' class='form-control' name='sub_image[]'>@error('sub_image')<span class='text-danger'>{{$message}}</span>@enderror</div><div class='col-md-1'><input type='button' class='btn btn-danger delete_input' value='x'></div></div></div></div>";

        $('.imageadd').click(function(){

          $('#sub-image').append(image);

        })

        $(document).on('click', '.delete_input', function() {

          $(this).parentsUntil('.image_section').html('');
        })

        $('#features').richText({
          bold:true,
          italic:true,
          underline:true,

          removeStyles:false,
          code:false,
           
          valueEmbed:false,

          table:false,

          urls:false,

          imageUpload:false,
          fileUpload:false,

          fonts:false,

          justify:false,
          rightAlign:false,
          centerAlign:false,
          leftAlign:false,

          heading:false,

          fontColor:false,
          backgroundColor:false,
          fontSize:false,

          adaptiveHeight:true,
        });

        $('#specification').richText({
          bold:true,
          italic:true,
          underline:true,

          removeStyles:false,
          code:false,
           
          valueEmbed:false,

          table:false,

          urls:false,

          imageUpload:false,
          fileUpload:false,

          fonts:false,

          justify:false,
          rightAlign:false,
          centerAlign:false,
          leftAlign:false,

          heading:true,

          fontColor:false,
          backgroundColor:false,
          fontSize:true
        });

        $('#product').focusout(function(){
          var data = $(this).val();

          $.ajax({
            url:"{{route('admin.product_ajax')}}",
            type:'POST',
            data: {
              "_token": "{{ csrf_token() }}",
              data: data
            },
            success:function(response){
              if(response == ''){
                $('#error-section-product').html('');
                $('#product').removeAttr('style');
              }else{
                $('#error-section-product').html('<span class="text-danger">'+response.msg+'</span>');
                $('#product').css("border" , "2px solid red");
              }
            }
          })
        })

        $('#Category').change(function(){
          var id = $(this).val();
          $.ajax({
            url:"{{route('admin.catagory_ajax')}}",
            type:'POST',
            data:{
              "_token": "{{ csrf_token() }}",
              data: id
            },
            success:function(response){
              var subdata = [];
              
              if (response == '') {
                subdata += "<option value selected disabled>Add Sub-Category First</option>";
                $('#subcatagory').html(subdata);
              }else{
                
                response.forEach(element => {
                  subdata += "<option value selected disabled>Select Sub-Category</option>";
                  subdata += "<option value='"+element.id+"'>"+element.subcatagory_name+"</option>";
                });
                 
                $('#subcatagory').html(subdata);
                
              }
            }
          })
        })
      })
    </script>
@endpush
