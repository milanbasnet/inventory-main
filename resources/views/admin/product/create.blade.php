@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('product.index')}}">Products</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Create</h3>
              <a href="{{route('product.index')}}" class="btn btn-sm btn-primary float-right">Go back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body text-muted">
              <x-input-error />

              <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" >Title</label>
                      <input type="text" name="title" placeholder="title" value="{{old('title')}}" class="form-control" required autofocus>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" >Product Category</label>
    
                      <select name="product_category_id" class="form-control">
                        @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                      </select>
                    </div>
                    
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" >Qty</label>
                      <input type="text" name="qty" placeholder="Qty" value="{{old('qty')}}" required  class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" >Cost Price</label>
                      <input type="text" name="cost_price" placeholder="Cost Price" value="{{old('cost_price')}}"  required class="form-control" >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Tax type</label>
                      
                      <select name="tax_type" class="form-control">
                        <option value="included">Included</option>
                        <option value="excluded">Excluded [adds 13%]</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Minumun stock alert</label>
                      <input type="text" name="minimum" placeholder="Minimum stock" value="{{old('minimum')}}" required  class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                      <label for="" >Margin Type</label>
                      <select name="type" class="form-control" id="">
                        <option value="fixed">Fixed</option>
                        <option value="percent">Percent</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                      <label for="">Margin Value</label>
                      <input type="text" name="margin" placeholder="margin" value="{{old('margin')}}" required class="form-control" >
                    </div>
                  </div>
                </div>

                <br>
                
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea class="textarea form-control" name="description">{{ old('description')}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                
              </form>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
@endpush

@push('js')
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
 $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
@endpush