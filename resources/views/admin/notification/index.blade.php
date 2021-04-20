@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>All Notifications</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Notification</li>
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
            
            <!-- /.card-header -->
            <div class="card-body text-muted">
              <x-input-error />
              <x-alert-msg/>


                <div class="row">
                  <div class="col-md-12">
                    <!-- The time line -->
                    <div class="timeline">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-secondary">{{now()->format('d M, Y')}}</span>
                      </div>
                      <!-- /.timeline-label -->

                      @foreach($notifications as $n)
                      <div>
                        <i class="fas fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fas fa-clock"></i> {{$n->created_at->diffForHumans()}}</span>
                          <h3 class="timeline-header"><a href="{{route('appointment.index')}}">{{ $n->data['user_name'] }}</a>({{$n->data['email']}}) sent an application</h3>
        
                          <div class="timeline-footer">
                            <a href="{{route('notification.destroy',$n->id)}}" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      
                      <div>
                        <i class="fas fa-clock bg-gray"></i>
                      </div>
                    </div>

                    <div class="d-flex justify-content-center">
                      {{$notifications->links()}}
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
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

{{-- @push('css')
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
@endpush --}}