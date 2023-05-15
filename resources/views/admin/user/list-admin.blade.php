@extends('layouts.backend.portal')

@section('title','Admin List - MPTFS')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
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
                    <h1 class="m-0">Admin List Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
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
                                ALL ADMIN LIST
                                <span class="badge badge-info pt-1 pb-1 pl-2 pr-2 ml-1" data-toggle="tooltip" data-placement="top" title="Total Number of Admin's" style="font-size: 18px; font-weight: 500;">{{ $users->count() }}</span>
                                </h3>
                                <a href="{{route('admin.user.view')}}" class="btn btn-sm btn-success ml-auto"><i class="nav-icon fas fa-user-plus" style="margin-right: 8px;"></i>ADD NEW ADMIN</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{-- <div class="table-responsive"> --}}
                                    <table id="tblCategory" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Active/Deactive</th>
                                                <th>User_Role</th>
                                                <th>Created_At</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $key=>$user)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td class="text-center">
                                                        <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-size="small" data-toggle="toggle" data-style="slow" data-on="Active" data-off="Deactive" {{ $user->status ? '' : 'checked' }}>
                                                    </td>
                                                    <td>{{ $user->role->name }}</td>
                                                    <td>{{ $user->created_at }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-info"><i class="nav-icon fas fa-edit" style="margin-right: 5px;"></i>Edit</a>
                                                        <a href="{{ route('admin.user.changepassword', $user->id) }}" class="btn btn-sm btn-info"><i class="nav-icon fas fa-edit" style="margin-right: 5px;"></i>Change Password</a>

                                                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteUser({{ $user->id }})"><i class="nav-icon fas fa-trash-alt" style="margin-right: 5px;"></i>Delete</button>
                                                        <form id="delete-form-{{ $user->id }}" action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                {{-- </div> --}}
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
                <h1 class="m-0">एडमिन लिस्ट पेज</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">मुख्य पेज</a></li>
                        <li class="breadcrumb-item active">यूजर</li>
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
                                ऑल एडमिन लिस्ट
                            <span class="badge badge-info pt-1 pb-1 pl-2 pr-2 ml-1" data-toggle="tooltip" data-placement="top" title="एडमिन की कुल संख्या" style="font-size: 18px; font-weight: 500;">{{ $users->count() }}</span>
                            </h3>
                            <a href="{{route('admin.user.view')}}" class="btn btn-sm btn-success ml-auto"><i class="nav-icon fas fa-user-plus" style="margin-right: 8px;"></i>नया एडमिन जोड़े</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tblCategory" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>आईडी</th>
                                            <th>नाम</th>
                                            <th>यूजर रोल </th>
                                            <th>पर बनाया गया</th>
                                            <th>एक्टिव/डीएक्टिव</th>
                                            <th class="text-center">एक्शन्स</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key=>$user)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->role->name }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td class="text-center">
                                                    <input id="toggle-demo" data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-size="small" data-toggle="toggle" data-style="slow" data-on="Active" data-off="Deactive" {{ $user->status ? '' : 'checked' }}>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-info"><i class="nav-icon fas fa-edit" style="margin-right: 5px;"></i>एडिट</a>
                                                    <a href="{{ route('admin.user.changepassword', $user->id) }}" class="btn btn-sm btn-info"><i class="nav-icon fas fa-edit" style="margin-right: 5px;"></i>चेंज पासवर्ड</a>

                                                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteUser({{ $user->id }})"><i class="nav-icon fas fa-trash-alt" style="margin-right: 5px;"></i>डिलीट</button>
                                                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
                    Are you sure, you want to delete this user ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                    <button type="button" class="btn btn-danger" id="delUser">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.End Modal -->
@endif


@if (session('locale') == 'hi')
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
                    क्या आप वाकई इस यूजर को हटाना चाहते हैं?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">नहीं, रद्द करें</button>
                    <button type="button" class="btn btn-danger" id="delUser">हाँ, हटाएं</button>
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
            $("#tblCategory").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tblCategory_wrapper .col-md-6:eq(0)');
        });
    </script>

    <!-- Delete Function -->
    <script>
        function deleteUser(id)
        {
            // console.log(id);
            $("#delModal").modal('show');

            document.getElementById("delUser").addEventListener("click", function(){
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            });
        }

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "100",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

    <script>
        //Initialize Tooltip
        $('[data-toggle=tooltip]').tooltip();
    </script>
@endpush
