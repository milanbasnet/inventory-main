@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('product-category.index')}}">Product Category</a></li>
            <li class="breadcrumb-item active">Update</li>
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
              <h3 class="card-title">Update</h3>
              <a href="{{route('product-category.index')}}" class="btn btn-sm btn-primary float-right">Go back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body text-muted">
              <x-input-error />

              <form action="{{route('product-category.update',$productCategory)}}" method="POST" enctype="multipart/form-data">
                @csrf @method('put')
                <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" name="title" placeholder="Title" value="{{$productCategory->title??old('title')}}" class="form-control" required autofocus>
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
