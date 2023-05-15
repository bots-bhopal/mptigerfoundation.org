@extends('layouts.backend.portal')

@section('title','View Gallery - MPTFS')

@push('css')
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/ekko-lightbox/ekko-lightbox.css')}}">

    <style>
        :root {
            --minimum-width: 300px;
            --ratio: 16/9;
        }

        .card .card-body .image-box img {
            background-color: #ffffff; /* To visualize empty space */
            aspect-ratio: var(--ratio);
            object-fit: contain;
            width: 100%;
            height: 100%;
        }
    </style>
@endpush

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @if (session('locale') == 'en')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>Gallery Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Gallery Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- right column -->
                    <div class="col-lg-12 col-md-12 ">
                        <!-- Horizontal Form -->
                        <div class="card card-info">
                            <div class="card-header">
                            <h3 class="card-title">View Your Images</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body mt-2 mb-2">
                                <!-- Gallery Section Start Here -->
                                <div class="row">
                                    @forelse ($photos as $photo)
                                        <div class="col-md-6 col-sm-12">

                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="image-box">
                                                        <a href="{{asset('public/storage/gallery/'. $photo->filename)}}" data-toggle="lightbox" data-title="{{$photo->original_filename}}" data-gallery="gallery">
                                                            <img class="img-fluid pad rounded" src="{{asset('public/storage/gallery/'. $photo->filename)}}" alt="Gallery Image" style="height: 300px!important;">
                                                        </a>
                                                    </div>
                                                </div><!-- /.card-body -->

                                                <div class="card-footer d-flex">
                                                    <p class="card-title mr-auto">
                                                        {{$photo->original_filename}}
                                                        <span class="badge badge-info">{{ HumanReadable::bytesToHuman($photo->file_size) }}</span>
                                                    </p>

                                                    <!-- Image Tools -->
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteImage({{ $photo->id }})">Delete <i class="fas fa-trash-alt pl-1"></i></button>

                                                    <form id="delete-form-{{ $photo->id }}" action="{{ route('user.images-delete', $photo->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                                <!-- /.card-footer-->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <!-- /.col -->

                                        @empty

                                        <div class="col-md-12">
                                            <h3 class="text-center" style="font-weight: 600;">No Gallery Found !!</h3>
                                        </div>
                                        <!-- /.col -->
                                    @endforelse
                                </div>
                                <!-- Gallery Section End Here -->

                                <!-- Pagination Section Start Here -->
                                <div class="d-flex justify-content-center">
                                    {!! $photos->links() !!}
                                </div>
                                <!-- Pagination Section End Here -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <!-- Modal -->
        <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure, you want to delete this image ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                        <button type="button" class="btn btn-danger" id="delImage">Yes, Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (session('locale') == 'hi')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>गैलरी पृष्ठ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">होम</a></li>
                            <li class="breadcrumb-item active">गैलरी पृष्ठ</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- right column -->
                    <div class="col-lg-12 col-md-12 ">
                        <!-- Horizontal Form -->
                        <div class="card card-info">
                            <div class="card-header">
                            <h3 class="card-title">अपनी छवियाँ देखें</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body mt-2 mb-2">
                                <!-- Gallery Section Start Here -->
                                <div class="row">
                                    @forelse ($photos as $photo)
                                        <div class="col-md-6 col-sm-12">

                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="image-box">
                                                        <a href="{{asset('public/storage/gallery/'. $photo->filename)}}" data-toggle="lightbox" data-title="{{$photo->original_filename}}" data-gallery="gallery">
                                                            <img class="img-fluid pad rounded" src="{{asset('public/storage/gallery/'. $photo->filename)}}" alt="Gallery Image" style="height: 300px!important;">
                                                        </a>
                                                    </div>
                                                </div><!-- /.card-body -->

                                                <div class="card-footer d-flex">
                                                    <p class="card-title mr-auto">
                                                        {{$photo->original_filename}}
                                                        <span class="badge badge-info">{{ HumanReadable::bytesToHuman($photo->file_size) }}</span>
                                                    </p>

                                                    <!-- Image Tools -->
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteImage({{ $photo->id }})">हटाएं <i class="fas fa-trash-alt pl-1"></i></button>

                                                    <form id="delete-form-{{ $photo->id }}" action="{{ route('user.images-delete', $photo->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                                <!-- /.card-footer-->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <!-- /.col -->

                                        @empty

                                        <div class="col-md-12">
                                            <h3 class="text-center" style="font-weight: 600;">कोई गैलरी नहीं मिली !!</h3>
                                        </div>
                                        <!-- /.col -->
                                    @endforelse
                                </div>
                                <!-- Gallery Section End Here -->

                                <!-- Pagination Section Start Here -->
                                <div class="d-flex justify-content-center">
                                    {!! $photos->links() !!}
                                </div>
                                <!-- Pagination Section End Here -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <!-- Modal -->
        <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">पुष्टीकरण</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        क्या आप वास्तव में इस छवि को मिटाना चाहते हैं ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">नहीं, रद्द करें</button>
                        <button type="button" class="btn btn-danger" id="delImage">हाँ, हटाएं</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
<!-- /.content-wrapper -->
@endsection

@push('js')
    <script>
    // Delete Function
    function deleteImage(id)
    {
        $("#delModal").modal('show');

        document.getElementById("delImage").addEventListener("click", function(){
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
        });
    }
    </script>

    <!-- Ekko Lightbox -->
    <script src="{{asset('public/assets/portal/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
    <script>
        $(function () {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });
        })
    </script>
@endpush
