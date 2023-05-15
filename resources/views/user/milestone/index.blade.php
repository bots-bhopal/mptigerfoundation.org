@extends('layouts.backend.portal')

@section('title','Milestones')

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

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Milestone Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Milestone Page</li>
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
                            MILESTONES LIST
                            <span class="badge badge-info pt-1 pb-1 pl-2 pr-2 ml-1" data-toggle="tooltip" data-placement="top" title="Total Number of Milestone's" style="font-size: 18px; font-weight: 500;">{{ $milestones->count() }}</span>
                        </h3>
                        <a class="btn btn-success ml-auto" href="{{ route('user.milestone.create') }}"><i class="nav-icon fas fa-plus-circle" style="margin-right: 5px;"></i>ADD MILESTONE</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <table id="tblPost" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Feature Image</th>
                                    <th class="text-center">Actions</th>
                                    {{-- <th class="text-center">Delete Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($milestones as $key=>$milestone)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ Str::limit($milestone->title, '30') }}</td>
                                        <td>{!! Str::limit($milestone->description, '150') !!}</td>
                                        <td>
                                            <img src="{{ asset('public/storage/milestone_image/'.$milestone->image) }}" alt="Feature-Image" width="200" height="140" class="rounded">
                                        </td>
                                        <td class="text-center">
                                            {{-- <a href="#" class="btn btn-sm btn-success"><i class="nav-icon fas fa-eye"></i></a> --}}

                                            <a href="{{ route('user.milestone.edit', $milestone->id) }}" class="btn btn-sm btn-info"><i class="nav-icon fas fa-edit"></i></a>

                                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteEvent({{ $milestone->id }})"><i class="nav-icon fas fa-trash-alt"></i></button>
                                            <form id="delete-form-{{ $milestone->id }}" action="{{ route('user.milestone.destroy', $milestone->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
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


    {{-- @if (session('locale') == 'hi')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">लेटेस्ट इवेंट्स पेज</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">मुख्य पेज</a></li>
                            <li class="breadcrumb-item active">लेटेस्ट इवेंट्स</li>
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
                                ऑल इवेंट्स लिस्ट
                                <span class="badge badge-info pt-1 pb-1 pl-2 pr-2 ml-1" data-toggle="tooltip" data-placement="top" title="इवेंट्स की कुल संख्या" style="font-size: 18px; font-weight: 500;">{{ $events->count() }}</span>
                            </h3>
                            <a class="btn btn-success ml-auto" href="{{ route('user.event.create') }}"><i class="nav-icon fas fa-plus-circle" style="margin-right: 5px;"></i>नया इवेंट जोड़ें</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <table id="tblPost" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>आईडी</th>
                                        <th>शीर्षक</th>
                                        <th>इवेंट डेट</th>
                                        <th>इवेंट टाईम</th>
                                        <th>इवेंट प्लेस</th>
                                        <th class="text-center">विवरण</th>
                                        <th class="text-center">फीचर्ड इमेज</th>
                                        <th class="text-center">एक्शन्स</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $key=>$event)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ Str::limit($event->title, '30') }}</td>
                                            <td>{{ date('d-M-Y',strtotime($event->date)) }}</td>
                                            <td>{{ date('h:i A',strtotime($event->time)) }}</td>
                                            <td>{{ $event->place }}</td>
                                            <td>{!! Str::limit($event->discription, '150') !!}</td>
                                            <td>
                                                <img src="{{ asset('public/storage/event-hindi/'.$event->image) }}" alt="Feature-Image" width="200" height="140" class="rounded">
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('user.event.edit', $event->id) }}" class="btn btn-sm btn-info"><i class="nav-icon fas fa-edit"></i></a>

                                                <button type="button" class="btn btn-sm btn-danger" onclick="deleteEvent({{ $event->id }})"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                <form id="delete-form-{{ $event->id }}" action="{{ route('user.event.destroy', $event->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
    @endif --}}

</div>
<!-- /.content-wrapper -->


@if (session('locale') == 'en')
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
                    Are you sure, you want to delete this milestone ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                    <button type="button" class="btn btn-danger" id="delEvent">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.End Modal -->
@endif


{{-- @if (session('locale') == 'hi')
    <!-- Modal -->
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
                    क्या आप वाकई इस इवेंट को हटाना चाहते हैं ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">नहीं, रद्द करें</button>
                    <button type="button" class="btn btn-danger" id="delEvent">हाँ, हटाएं</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.End Modal -->
@endif --}}

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

    <script>
        //Delete Function
        function deleteEvent(id)
        {
            $("#delModal").modal('show');

            document.getElementById("delEvent").addEventListener("click", function(){
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            });
        }

        //Initialize Tooltip
        $('[data-toggle=tooltip]').tooltip();
    </script>
@endpush
