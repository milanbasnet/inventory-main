@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Account Infomation</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
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
              <h3 class="card-title">Account Information</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body text-muted">
              <x-input-error />
              <x-alert-msg/>

              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="form-group focused">
                    <label for="">Username</label>
    
                    <input type="text"  class="form-control form-control-alternative" disabled
                      placeholder="Username" value="{{auth()->user()->name}}">
                  </div>
    
                </div>
                <div class="col-sm-12 col-md-6">
                 
                  <div class="form-group focused">
                    <label for="">Email</label>
    
                    <input type="text"  class="form-control form-control-alternative" disabled
                      placeholder="Email" value="{{auth()->user()->email}}">
                  </div>
                  
                </div>
              </div>
             
              <hr>

              <form action="{{route('admin-password.update')}}" method="POST">
                @csrf @method('patch')
                <label for="">Change password</label>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="password" placeholder="Current Password *" class="form-control @error('current_password') is-invalid @enderror" name="current_password" value="{{ old('current_password') }}" required>
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="password" placeholder="New Password*" class="form-control @error('new_password') is-invalid @enderror" name="new_password" value="{{ old('new_password') }}" required>
                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="password" placeholder="Confirm Password *" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" value="{{ old('confirm_password') }}" required>
                        @error('confirm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Update</button>
                
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
