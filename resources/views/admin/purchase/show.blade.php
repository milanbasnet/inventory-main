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
            <li class="breadcrumb-item active">Show</li>
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
              <h3 class="card-title">Purchase details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <x-input-error />

              <div class="row">
                <div class="col-12 col-md-6">

                  <ul class="list-group">
                    <li class="list-group-item">
                      <p class="h6">Price: {{$purchase->cost_price}}</p>
                    </li>
                    <li class="list-group-item">
                      <p class="h6 text-danger">Unit/Quantity: {{$purchase->qty}}</p>
                    </li>
                    <li class="list-group-item">
                      <p class="h6">description: {{$purchase->description}}</p>
                    </li>
                    <li class="list-group-item">
                      <p class="h6">Created at: {{$purchase->created_at}}</p>
                    </li>
                    <li class="list-group-item">
                      <p class="h6">Updated at:{{$purchase->updated_at}}</p>
                    </li>
                  </ul>

                  <div class="d-flex mt-4">
                    <form action="{{route('purchase.destroy',$purchase)}}" method="POST">
                      @csrf @method('delete')
                      <button type="submit" class="dltBtn btn btn-danger">Delete</button>
                    </form>
                  </div>
                  
                </div>

                <div class="col-12 col-md-6">
                  <ul class="list-group">
                    <li class="list-group-item">
                      <p class="h6">Product: 
                        <a href="{{route('product.show',$purchase->product->id)}}">{{$purchase->product->title}}<a></p>
                    </li>
                    <li class="list-group-item">
                      <p class="h6">Supplier: <a href="{{route('supplier.show',$purchase->supplier->id)}}">{{$purchase->supplier->name}}</p>
                    </li>
                  </ul>
              </div>
            
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

@push('js')
<script>
  $(document).ready(function(){
    $('.dltBtn').click(function(e){
      e.preventDefault();
      if(confirm('Are you sure to delete!')){
        this.form.submit();
      }
    })
  })
</script>
@endpush