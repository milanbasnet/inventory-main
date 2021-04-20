@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Supplier</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('supplier.index')}}">Supplier</a></li>
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
              <h3 class="card-title">{{$supplier->name}}</h3>
            </div>
                      
            <!-- /.card-header -->
            <div class="card-body">
              <x-input-error />

              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="mb-3">
                    <p>Email: {{$supplier->email}}</p>
                  </div>

                  <div class="mb-3">
                    <p>Phone: {{$supplier->phone}}</p>
                  </div>

                  <div class="mb-3">
                    <p>Address: {{$supplier->address}}</p>
                  </div>

                </div>

                <div class="col-12 col-md-6">
                  <div class="mb-3">
                    <p>Created at: {{$supplier->created_at}}</p>
                  </div>

                  <div class="mb-3">
                    <p>Updated at:{{$supplier->updated_at}}</p>
                  </div>

                  <div class="d-flex">
                    <a href="{{route('supplier.edit',$supplier)}}" class="btn btn-info btn-sm mr-3">Edit supplier</a>
                    <form action="{{route('supplier.destroy',$supplier)}}" method="POST">
                      @csrf @method('delete')
                      <button type="submit" class="dltBtn btn btn-danger btn-sm">Delete Supplier</button>
                    </form>
                  </div>
                </div>
            </div>

            <hr>

            <h4>All purchases</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Sn</th>
                    <th>Product</th>
                    <th>Cost Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Created at</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($purchases as $purchase)
                    <tr>
                      <td>{{$purchase->id}}</td>
                      <td><a href="{{route('product.show',$purchase->product->id)}}">{{$purchase->product->title}}</a></td>
                      <td>{{number_format($purchase->cost_price)}}</td>
                      <td>{{$purchase->qty}}</td>
                      <td>{{number_format($purchase->cost_price*$purchase->qty)}}</td>
                      <td>{{$purchase->updated_at}}</td>
                    </tr>
                  @empty
                    <td>No Purchases Available</td>
                  @endforelse
                </tbody>
              </table>
            </div>
            {{$purchases->links()}}

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