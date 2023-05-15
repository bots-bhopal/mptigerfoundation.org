@extends('layouts.backend.portal')

@section('title','Category')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/portal/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @if(session('locale') == 'en')
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Category</li>
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
                                    ALL CATEGORY LIST
                                    <span class="badge badge-info pt-1 pb-1 pl-2 pr-2 ml-1" data-toggle="tooltip" data-placement="top" title="Total Number of Categories" style="font-size: 18px; font-weight: 500;">{{ $categories->count() }}</span>
                                </h3>
                            <a class="btn btn-success ml-auto" href="{{route('admin.category.create')}}"><i class="nav-icon fas fa-plus-circle" style="margin-right: 5px;"></i>ADD NEW CATEGORY</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tblCategory" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Post Count</th>
                                            <th>Created_At</th>
                                            <th>Updated_At</th>
                                            <th class="text-center">Edit Action</th>
                                            <th class="text-center">Delete Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $key=>$category)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->posts->count() }}</td>
                                                <td>{{ $category->created_at }}</td>
                                                <td>{{ $category->updated_at }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-info"><i class="nav-icon fas fa-edit" style="margin-right: 5px;"></i>Edit</a>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteCategory({{ $category->id }})"><i class="nav-icon fas fa-trash-alt" style="margin-right: 5px;"></i>Delete</button>
                                                    <form id="delete-form-{{ $category->id }}" action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display: none;">
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
    @endif

    @if (session('locale') == 'hi')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1 class="m-0">कैटेगरी पेज</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">मुख्य पेज</a></li>
                        <li class="breadcrumb-item active">कैटेगरी</li>
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
                                ऑल कैटेगरी लिस्ट
                                <span class="badge badge-info pt-1 pb-1 pl-2 pr-2 ml-1" data-toggle="tooltip" data-placement="top" title="कैटेगरीज़ की कुल संख्या" style="font-size: 18px; font-weight: 500;">{{ $categories->count() }}</span>
                                </h3>
                                <a class="btn btn-success ml-auto" href="{{route('admin.category.create')}}"><i class="nav-icon fas fa-plus-circle" style="margin-right: 5px;"></i>नई कैटेगरी जोड़े</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tblCategory" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>आईडी</th>
                                            <th>नाम</th>
                                            <th>पोस्ट कॉउंट</th>
                                            <th>पर बनाया गया</th>
                                            <th>पर सुधारा गया</th>
                                            <th class="text-center">एडिट एक्शन</th>
                                            <th class="text-center">डिलीट एक्शन</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $key=>$category)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->posts->count() }}</td>
                                                <td>{{ $category->created_at }}</td>
                                                <td>{{ $category->updated_at }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-info"><i class="nav-icon fas fa-edit" style="margin-right: 5px;"></i>एडिट</a>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteCategory({{ $category->id }})"><i class="nav-icon fas fa-trash-alt" style="margin-right: 5px;"></i>डिलीट</button>
                                                    <form id="delete-form-{{ $category->id }}" action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display: none;">
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
    @endif
</div>
<!-- /.content-wrapper -->

@if(session('locale') == 'en')
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
                    Are you sure, you want to delete this category ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                    <button type="button" class="btn btn-danger" id="delCategory">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.End Modal -->
@endif

@if(session('locale') == 'hi')
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
                    क्या आप वाकई इस कैटेगरी को हटाना चाहते हैं ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">नहीं, रद्द करें</button>
                    <button type="button" class="btn btn-danger" id="delCategory">हाँ, हटाएं</button>
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
        function deleteCategory(id)
        {
            // console.log(id);
            $("#delModal").modal('show');

            document.getElementById("delCategory").addEventListener("click", function(){
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            });
        }

        //Initialize Tooltip
        $('[data-toggle=tooltip]').tooltip();
    </script>
@endpush
