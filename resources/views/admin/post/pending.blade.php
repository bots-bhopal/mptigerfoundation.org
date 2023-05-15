@extends('layouts.backend.portal')

@section('title','Pending- Post')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    <style>
        .tooltip-inner {
            padding: 5px 20px!important;
            opacity: 1;
        }

        .bs-tooltip-left .arrow::before, .bs-tooltip-auto[x-placement^="left"] .arrow::before {
            opacity: 1;
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
                <h1 class="m-0">Pending Post Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Pending Post</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <h3 class="card-title">
                        ALL PENDING POST LIST
                        <span class="badge badge-info pt-1 pb-1 pl-2 pr-2 ml-1" data-toggle="tooltip" data-placement="top" title="Total Number of Pending Posts" style="font-size: 18px; font-weight: 500;">{{ $posts->count() }}</span>
                        </h3>
                        <a class="btn btn-success ml-auto" href="{{route('admin.post.create')}}"><i class="nav-icon fas fa-plus-circle" style="margin-right: 5px;"></i>ADD NEW POST</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tblPost" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th class="text-center"><i class="nav-icon fas fa-user-tag" data-toggle="tooltip" data-placement="left" title="Author"></i></th>
                                <th class="text-center"><i class="nav-icon fas fa-eye" data-toggle="tooltip" data-placement="left" title="Views"></i></th>
                                <th class="text-center"><i class="nav-icon fas fa-check-circle" data-toggle="tooltip" data-placement="left" title="Is_Approved"></i></th>
                                <th class="text-center"><i class="nav-icon fas fa-info-circle" data-toggle="tooltip" data-placement="left" title="Status"></i></th>
                                <th>Created_At</th>
                                <th>Updated_At</th>
                                <th class="text-center">Actions</th>
                                {{-- <th class="text-center">Delete Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key=>$post)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ Str::limit($post->title, '20') }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->view_count }}</td>
                                    <td>
                                        @if ($post->is_approved == true)
                                            <span class="badge badge-success">Approved</span>
                                        @else
                                            <span class="badge badge-danger">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->status == true)
                                            <span class="badge badge-success">Published</span>
                                        @else
                                            <span class="badge badge-danger">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                    <td class="text-center">
                                        @if($post->is_approved == false)
                                            <button type="button" class="btn btn-sm btn-success"  data-toggle="tooltip" data-placement="top" title="Approval" onclick="approvePost({{ $post->id }})">
                                                <i class="nav-icon fas fa-check-circle"></i>
                                            </button>
                                            <form method="POST" action="{{ route('admin.post.approve', $post->id) }}" id="approval-form" style="display: none">
                                                @csrf
                                                @method('PUT')
                                            </form>
                                        @endif

                                        <a href="{{ route('admin.post.show', $post->id) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="View"><i class="nav-icon fas fa-eye"></i></a>

                                        <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="nav-icon fas fa-edit"></i></a>

                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deletePost({{ $post->id }})"><i class="nav-icon fas fa-trash-alt"></i></button>
                                        <form id="delete-form-{{ $post->id }}" action="{{ route('admin.post.destroy', $post->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    @endif

    @if (session('locale') == 'hi')
         <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">पेन्डिंग पोस्ट पेज</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">मुख्य पेज</a></li>
                    <li class="breadcrumb-item active">पेन्डिंग पोस्ट</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <h3 class="card-title">
                            ऑल पेन्डिंग पोस्ट लिस्ट
                        <span class="badge badge-info pt-1 pb-1 pl-2 pr-2 ml-1" data-toggle="tooltip" data-placement="top" title="कुल पेन्डिंग पोस्ट की  संख्या" style="font-size: 18px; font-weight: 500;">{{ $posts->count() }}</span>
                        </h3>
                        <a class="btn btn-success ml-auto" href="{{route('admin.post.create')}}"><i class="nav-icon fas fa-plus-circle" style="margin-right: 5px;"></i>नई पोस्ट जोड़ें</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tblPost" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>आईडी</th>
                                <th>शीर्षक</th>
                                <th class="text-center"><i class="nav-icon fas fa-user-tag" data-toggle="tooltip" data-placement="left" title="Author"></i></th>
                                <th class="text-center"><i class="nav-icon fas fa-eye" data-toggle="tooltip" data-placement="left" title="Views"></i></th>
                                <th class="text-center"><i class="nav-icon fas fa-check-circle" data-toggle="tooltip" data-placement="left" title="Is_Approved"></i></th>
                                <th class="text-center"><i class="nav-icon fas fa-info-circle" data-toggle="tooltip" data-placement="left" title="Status"></i></th>
                                <th>Created_At</th>
                                <th>Updated_At</th>
                                <th class="text-center">Actions</th>
                                {{-- <th class="text-center">Delete Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key=>$post)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ Str::limit($post->title, '20') }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->view_count }}</td>
                                    <td>
                                        @if ($post->is_approved == true)
                                            <span class="badge badge-success">एप्रूव्ड</span>
                                        @else
                                            <span class="badge badge-danger">पेन्डिंग</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->status == true)
                                            <span class="badge badge-success">पब्लिश्ड</span>
                                        @else
                                            <span class="badge badge-danger">पेन्डिंग</span>
                                        @endif
                                    </td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                    <td class="text-center">
                                        @if($post->is_approved == false)
                                            <button type="button" class="btn btn-sm btn-success"  data-toggle="tooltip" data-placement="top" title="Approval" onclick="approvePost({{ $post->id }})">
                                                <i class="nav-icon fas fa-check-circle"></i>
                                            </button>
                                            <form method="POST" action="{{ route('admin.post.approve', $post->id) }}" id="approval-form" style="display: none">
                                                @csrf
                                                @method('PUT')
                                            </form>
                                        @endif

                                        <a href="{{ route('admin.post.show', $post->id) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="View"><i class="nav-icon fas fa-eye"></i></a>

                                        <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="nav-icon fas fa-edit"></i></a>

                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deletePost({{ $post->id }})"><i class="nav-icon fas fa-trash-alt"></i></button>
                                        <form id="delete-form-{{ $post->id }}" action="{{ route('admin.post.destroy', $post->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    @endif

</div>
<!-- /.content-wrapper -->


@if (session('locale') == 'en')
    <!-- Delete Modal -->
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
                    Are you sure, you want to delete this record ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                    <button type="button" class="btn btn-danger" id="delPost">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.End Modal -->
@endif

@if (session('locale') == 'hi')
    <!-- Delete Modal -->
    <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">कन्फर्मेशन</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    क्या आप वाकई इस पोस्ट को हटाना चाहते हैं ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">नहीं, रद्द करें</button>
                    <button type="button" class="btn btn-danger" id="delPost">हाँ, हटाएं</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.End Modal -->
@endif


@if (session('locale') == 'en')
    <!-- Approval Modal -->
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
                    <button type="button" class="btn btn-success" id="approvalPost">Yes, Approve</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.End Modal -->
@endif

@if (session('locale') == 'hi')
    <!-- Approval Modal -->
    <div class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">कन्फर्मेशन</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    क्या आप वाकई इस पोस्ट को स्वीकृत करना चाहते हैं ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">नहीं, रद्द करें</button>
                    <button type="button" class="btn btn-success" id="approvalPost">हां, मंजूर है</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.End Modal -->
@endif


@endsection

@push('js')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('public/assets/portal/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/assets/portal/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/assets/portal/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/assets/portal/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/assets/portal/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/assets/portal/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/assets/portal/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('public/assets/portal/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/assets/portal/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/assets/portal/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/assets/portal/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/assets/portal/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
        $("#tblPost").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tblPost_wrapper .col-md-6:eq(0)');
        });
    </script>

    <!-- Delete Function -->
    <script>
        function deletePost(id)
        {
            $("#delModal").modal('show');

            document.getElementById("delPost").addEventListener("click", function(){
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            });
        }
    </script>

    <!-- Approval Function -->
    <script>
        function approvePost(id)
        {
            $("#approvalModal").modal('show');

            document.getElementById("approvalPost").addEventListener("click", function(){
                event.preventDefault();
                document.getElementById('approval-form').submit();
            });
        }
    </script>

    <script>
        //Initialize Tooltip
        $('[data-toggle=tooltip]').tooltip();
    </script>
@endpush
