@extends('layouts.backend.portal')

@section('title','View - Post')

@push('css')
    <style>
        .lang-dropdown{
            display: none!important;
        }
    </style>
@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>View Post Page</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">View Post</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- START ALERTS AND CALLOUTS -->
            <h5 class="mt-4 mb-2">View Post</h5>

            <div class="col-md-12">
                <div class="card  rounded-0">
                <div class="card-header">
                    <a href="{{route('author.post.index')}}" class="btn btn-danger float-left"><i class="nav-icon fas fa-arrow-circle-left" style="margin-right: 8px;"></i>BACK</a>
                    @if($post->is_approved == false)
                        <button type="button" class="btn btn-danger float-right" disabled>
                            <i class="nav-icon fas fa-check-circle" style="margin-right: 8px;"></i>Pending
                        </button>
                    @else
                        <button type="button" class="btn btn-success float-right" disabled>
                            <i class="nav-icon fas fa-check-circle" style="margin-right: 8px;"></i>Approved
                        </button>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header pt-1 pb-0">
                            <h3 class="card-title mt-2" style="font-size: 24px; font-weight: 600; color: #444;">
                                {{ $post->title }}
                                <p class="mt-2" style="font-size: 18px; font-weight:500;">
                                    <small>Posted By
                                        <strong>
                                            <a href="">{{ $post->user->name }}</a>
                                        </strong> on {{ $post->created_at->toFormattedDateString() }}
                                    </small>
                                </p>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body text-justify">
                            {!! $post->body !!}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-list-ul"></i>
                            About Author
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if ($post->user->about)
                                <p class="text-justify">{{ $post->user->about }}</p>
                            @else
                                <p class="text-center text-muted">{{ 'About Yourself' }}</p>
                            @endif

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-list-ul"></i>
                            Categories
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @foreach($post->categories as $category)
                                <span class="badge badge-dark pt-2 pb-2 pl-3 pr-3">{{ $category->name }}</span>
                            @endforeach
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-bullhorn"></i>
                            Featured Image
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (session('locale') == 'en')
                                <img class="img-fluid img-thumbnail" src="{{asset('storage/app/public/post/'.$post->image)}}" alt="Featured-Image">
                            @endif

                            @if (session('locale') == 'hi')
                            <img class="img-fluid img-thumbnail" src="{{asset('storage/app/public/post-hindi/'.$post->image)}}" alt="Featured-Image">
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- END ALERTS AND CALLOUTS -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure, you want to approved this post ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                <button type="button" class="btn btn-success" id="approvalPost">Yes, Approved</button>
            </div>
        </div>
    </div>
</div>
<!-- /.End Modal -->
@endsection

@push('js')
<!-- Approval Function -->
<script>
    function approvePost(id)
    {
        $("#approvalModal").modal('show');

        document.getElementById("approvalPost").addEventListener("click", function(){
            event.preventDefault();
            document.getElementById('approval-form-'+id).submit();
        });
    }
</script>
@endpush
