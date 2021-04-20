@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('product-category.index')}}">Product category</a></li>
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
              <h3 class="card-title font-weight-bold">{{$productCategory->title}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <x-input-error />

              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="mb-3">
                    <p>Created at: {{$productCategory->created_at}}</p>
                  </div>
    
                  <div class="mb-3">
                    <p>Updated at:{{$productCategory->updated_at}}</p>
                  </div>

                  <div class="d-flex">
                    <a href="{{route('product-category.edit',$productCategory)}}" class="btn btn-info btn-sm mr-3">Edit Customer</a>
                    <form action="{{route('product-category.destroy',$productCategory)}}" method="POST">
                      @csrf @method('delete')
                      <button type="submit" class="dltBtn btn btn-danger btn-sm">Delete Customer</button>
                    </form>
                  </div>
                </div>
            </div>

            <hr>

            <h4>All Products of this category</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Sn</th>
                    <th>Title</th>
                    <th>Qty</th>
                    <th>Cost Price</th>
                    <th>Type/Margin</th>
                    <th>Tax</th>
                    <th>Sale Price</th>
                    <th>Created at</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse($products as $product)
                    <tr>
                      <td>{{$product->id}}</td>
                      <td><a href="{{route('product.show',$product->id)}}">{{$product->title}}</a></td>
                      <td>{{$product->qty}}</td>
                      <td>{{$product->cost_price}}</td>
                      <td>{{$product->type.' ['.$product->margin.']'}}</td>
                      <td>{{$product->tax_type == 'excluded'?'13%':''}}</td>
                      <td>{{$product->price}}</td>
                      <td>{{$product->created_at->format('Y m d')}}</td>
                      <td>
                        <a href="{{route('product.edit',$product)}}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{route('product.destroy',$product)}}" method="POST">
                          @csrf @method('delete')
                          <button class="btn dltBtn btn-danger btn-sm">Delete</button>
                        </form>
                      </td>
                    </tr>
                    @empty
                    <td>No Sales Available</td>
                    @endforelse
                </tbody>
              </table>
            </div>
            {{$products->links()}}
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