@extends('layouts.backend.portal')

@section('title','Edit - Category')

@push('css')

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
                    <h1>Edit Category Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Category</li>
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
                    <div class="col-md-8 offset-md-2">
                        <!-- Horizontal Form -->
                        <div class="card card-info">
                            <div class="card-header">
                            <h3 class="card-title">EDIT CATEGORY</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('admin.category.update', $category->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputTag" class="col-sm-2 col-form-label">Category Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control {{($errors->any() && $errors->first('name')) ? 'is-invalid' : ''}}" id="name" name="name" value="{{ $category->name }}" placeholder="Category Name">
                                            @if ($errors->any())
                                                <p class="text-danger">{{$errors->first('name')}}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <label for="inputImage" class="col-sm-2 col-form-label" hidden>Category Old Image</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" id="himage" name="himage" value="{{$category->image}}">
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputImage" class="col-sm-2 col-form-label">Category Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control-file" id="image" name="image">
                                            @if ($errors->any())
                                                <p class="text-danger">{{$errors->first('image')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info"><i class="nav-icon fas fa-save" style="margin-right: 5px;"></i>UPDATE</button>
                                    <a href="{{route('admin.category.index')}}" class="btn btn-warning float-right"><i class="nav-icon fas fa-arrow-circle-left" style="margin-right: 5px;"></i>BACK</a>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
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
                    <h1>एडिट कैटेगरी पेज</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">मुख्य पेज</a></li>
                            <li class="breadcrumb-item active">एडिट कैटेगरी</li>
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
                    <div class="col-md-8 offset-md-2">
                        <!-- Horizontal Form -->
                        <div class="card card-info">
                            <div class="card-header">
                            <h3 class="card-title">एडिट कैटेगरी</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('admin.category.update', $category->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputTag" class="col-sm-2 col-form-label">कैटेगरी का नाम</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control {{($errors->any() && $errors->first('name')) ? 'is-invalid' : ''}}" id="name" name="name" value="{{ $category->name }}" placeholder="कैटेगरी का नाम">
                                            @if ($errors->any())
                                                <p class="text-danger">{{$errors->first('name')}}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <label for="inputImage" class="col-sm-2 col-form-label" hidden>Category Old Image</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" id="himage" name="himage" value="{{$category->image}}">
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputImage" class="col-sm-2 col-form-label">कैटेगरी इमेज</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control-file" id="image" name="image">
                                            @if ($errors->any())
                                                <p class="text-danger">{{$errors->first('image')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a href="{{route('admin.category.index')}}" class="btn btn-danger"><i class="nav-icon fas fa-arrow-circle-left" style="margin-right: 5px;"></i>वापस</a>
                                    <button type="submit" class="btn btn-success float-right"><i class="nav-icon fas fa-save" style="margin-right: 5px;"></i>अपडेट करें</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    @endif

</div>
<!-- /.content-wrapper -->
@endsection

@push('js')

@endpush
