@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Purchase</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('purchase.index')}}">Purchase</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Create</h3>
              <a href="{{route('purchase.index')}}" class="btn btn-sm btn-primary float-right">Go back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body text-muted">
              <x-input-error />

              <form action="{{route('purchase.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" >Product</label>
                      <select name="product_id" class="form-control" id="selectProduct">
                        @foreach ($products as $product)
                          <option value="{{$product->id}}">{{$product->title}} ----- Cost Price Rs{{$product->cost_price}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Supplier</label>
                      <select name="supplier_id" class="form-control" id="selectSupplier">
                        @foreach ($suppliers as $s)
                          <option value="{{$s->id}}">{{$s->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Cost Price</label>
                      <input type="text" name="cost_price" placeholder="Cost price" value="{{old('cost_price')}}" required class="form-control" >
                    </div>
                  </div>   
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Qty</label>
                      <input type="text" name="qty" placeholder="Qty" value="{{old('qty')}}" required class="form-control" >
                    </div>
                  </div>   
                </div>

                <div class="form-group">
                  <label for="">Description (optional)</label>
                  <textarea class="form-control" name="description" placeholder="Short Description here">{{ old('description')}}</textarea>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script>
 $(function () {

    $('#selectProduct').selectize({
        sortField: 'text'
    });
    $('#selectSupplier').selectize({
        sortField: 'text'
    });

  })
</script>
@endpush