@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User Management</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Admins</li>
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Admins</h3>
              <a href="{{route('usermanagement.create')}}" class="btn btn-primary btn-sm float-right">Add</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <x-input-error/>
              <x-alert-msg/>

              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Sn</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Role</th>
                  <th>Created at</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->roles->first()->name}}</td>
                    <td>{{$user->created_at->format('d M Y')}}</td>
                    <td>
                      @if($user->id == 1)
                      <span class="badge badge-success p-2">Super admin</span>
                      @elseif($user->id == auth()->id())
                      <span class="badge badge-primary p-2">Currently</span>
                      @else
                      <a href="{{route('usermanagement.edit',$user)}}" class="btn btn-sm btn-info float-left">Edit</a>
                      <form action="{{route('usermanagement.destroy',$user)}}" method="POST" class="float-left">
                        @csrf @method('delete')
                        <button class="btn dltBtn btn-danger btn-sm">Delete</button>
                      </form>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$users->links()}}
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
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<style>
  div.dataTables_wrapper div.dataTables_paginate{
      display: none;
  }
</style>
@endpush

@push('js')
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
  
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "searching": true,
      "paging":false
    });

    $('.dltBtn').click(function(e){
      e.preventDefault()
      if(confirm('Are you sure to delete')){
        this.form.submit();
      }
    })
  });
</script>
@endpush