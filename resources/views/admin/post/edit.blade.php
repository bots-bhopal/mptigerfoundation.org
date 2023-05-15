@extends('layouts.backend.portal')

@section('title', 'Edit - Post')

@push('css')
    <style>
        .lang-dropdown {
            display: none !important;
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
                            <h1>Edit Post Page</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Post</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- form start -->
                    <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data"
                        class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- right column -->
                            <div class="col-lg-8 col-md-6">
                                <!-- Horizontal Form -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">EDIT POST</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pb-2 mt-2">
                                        <div class="form-group">
                                            <label for="inputPost">Post Title</label>
                                            <input type="text"
                                                class="form-control {{ $errors->any() && $errors->first('title') ? 'is-invalid' : '' }}"
                                                id="title" name="title" value="{{ $post->title }}"
                                                placeholder="Enter Post Title Here">
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('title') }}</p>
                                            @endif
                                        </div>

                                        <label for="inputImage" class="col-sm-2 col-form-label" hidden>Featured Old
                                            Image</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" id="himage" name="himage" value="{{ $post->image }}">
                                        </div>

                                        <div class="form-group row pt-3">
                                            <label for="inputImage" hidden>Featured Image</label>
                                            <input type="file" class="form-control-file col-8" id="image" name="image">

                                            {{-- <div class="icheck-success d-inline">
                                                <input type="checkbox" id="publish" name="status" value="1"
                                                    {{ $post->status == true ? 'checked' : '' }}>
                                                <label for="publish">
                                                    Publish
                                                </label>
                                            </div> --}}

                                            @if ($errors->any())
                                                <p class="text-danger pl-2">{{ $errors->first('image') }}</p>
                                            @endif
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (right) -->

                            <!-- left column -->
                            <div class="col-lg-4 col-md-6">
                                <!-- Horizontal Form -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">CATEGORIES</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Select Categories</label>
                                            <div class="select2-purple">
                                                <select name="categories[]" id="category"
                                                    class="select2 {{ $errors->any() && $errors->first('categories') ? 'is-invalid' : '' }}"
                                                    multiple="multiple" data-placeholder="Select Categories"
                                                    data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                    @foreach ($categories as $category)
                                                        <option
                                                            @foreach ($post->categories as $postCategory) {{ $postCategory->id == $category->id ? 'selected' : '' }} @endforeach
                                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-12">
                                                @if ($errors->any())
                                                    <p class="text-danger">{{ $errors->first('categories') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer mb-1">
                                        <button type="submit" class="btn btn-success float-right"><i
                                                class="nav-icon fas fa-upload"
                                                style="margin-right: 8px;"></i>PUBLISH</button>
                                        <a href="{{ route('admin.post.index') }}" class="btn btn-danger"><i
                                                class="nav-icon fas fa-arrow-circle-left"
                                                style="margin-right: 8px;"></i>BACK</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (left) -->

                            @foreach ($post->images as $image)
                                <input type="hidden" name="h_images[]" value="{{ $image->image }}">
                            @endforeach

                            <!-- right column -->
                            <div class="col-lg-12 col-md-12">
                                <!-- Horizontal Form -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">CHOOSE MULTIPLE IMAGES</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pb-2 mt-2">
                                        <div class="form-group row">
                                            <input type="file" class="form-control-file col-8" name="images[]" multiple>

                                            @if ($errors->any())
                                                <p class="text-danger col-8 pl-2">{{ $errors->first('images.*') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (right) -->

                            <!-- Body section -->
                            <div class="col-12">
                                <!-- Horizontal Form -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">POST BODY</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <textarea class="ckeditor form-control {{ $errors->any() && $errors->first('pbody') ? 'is-invalid' : '' }}"
                                                id="pbody" name="pbody">{{ $post->body }}</textarea>
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('pbody') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (Body section) -->
                        </div>
                        <!-- /.row -->
                    </form>
                    <!-- /.form end-->
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
                            <h1>एडिट पोस्ट पेज</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">मुख्य पेज</a></li>
                                <li class="breadcrumb-item active">एडिट पोस्ट</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- form start -->
                    <form action="{{ route('admin.post.update', $post->id) }}" method="POST"
                        enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- right column -->
                            <div class="col-lg-8 col-md-6">
                                <!-- Horizontal Form -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">एडिट पोस्ट</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pb-2 mt-2">
                                        <div class="form-group">
                                            <label for="inputPost">पोस्ट शीर्षक</label>
                                            <input type="text"
                                                class="form-control {{ $errors->any() && $errors->first('title') ? 'is-invalid' : '' }}"
                                                id="title" name="title" value="{{ $post->title }}"
                                                placeholder="यहां पोस्ट शीर्षक दर्ज करें">
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('title') }}</p>
                                            @endif
                                        </div>

                                        <label for="inputImage" class="col-sm-2 col-form-label" hidden>Featured Old
                                            Image</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" id="himage" name="himage" value="{{ $post->image }}">
                                        </div>

                                        <div class="form-group row pt-3">
                                            <label for="inputImage" hidden>फीचर्ड इमेज</label>
                                            <input type="file" class="form-control-file col-8" id="image" name="image">

                                            {{-- <div class="icheck-success d-inline">
                                                <input type="checkbox" id="publish" name="status" value="1"
                                                    {{ $post->status == true ? 'checked' : '' }}>
                                                <label for="publish">
                                                    पब्लिश
                                                </label>
                                            </div> --}}

                                            @if ($errors->any())
                                                <p class="text-danger pl-2">{{ $errors->first('image') }}</p>
                                            @endif
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (right) -->

                            <!-- left column -->
                            <div class="col-lg-4 col-md-6">
                                <!-- Horizontal Form -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">कैटेगरीज़</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>सेलेक्ट कैटेगरीज़</label>
                                            <div class="select2-purple">
                                                <select name="categories[]" id="category"
                                                    class="select2 {{ $errors->any() && $errors->first('categories') ? 'is-invalid' : '' }}"
                                                    multiple="multiple" data-placeholder="कैटेगरीज़ का चयन करें"
                                                    data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                    @foreach ($categories as $category)
                                                        <option
                                                            @foreach ($post->categories as $postCategory) {{ $postCategory->id == $category->id ? 'selected' : '' }} @endforeach
                                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-12">
                                                @if ($errors->any())
                                                    <p class="text-danger">{{ $errors->first('categories') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer mb-1">
                                        <button type="submit" class="btn btn-success float-right"><i
                                                class="nav-icon fas fa-upload"
                                                style="margin-right: 8px;"></i>पब्लिश</button>
                                        <a href="{{ route('admin.post.index') }}" class="btn btn-danger"><i
                                                class="nav-icon fas fa-arrow-circle-left"
                                                style="margin-right: 8px;"></i>वापस</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (left) -->

                            @foreach ($post->images as $image)
                                <input type="hidden" name="h_images[]" value="{{ $image->image }}">
                            @endforeach

                            <!-- right column -->
                            <div class="col-lg-12 col-md-12">
                                <!-- Horizontal Form -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">इमेजेज चुनें</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pb-2 mt-2">
                                        <div class="form-group row">
                                            <input type="file" class="form-control-file col-8" name="images[]" multiple>

                                            @if ($errors->any())
                                                <p class="text-danger col-8 pl-2">{{ $errors->first('images.*') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (right) -->

                            <!-- Body section -->
                            <div class="col-12">
                                <!-- Horizontal Form -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">पोस्ट बॉडी</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <textarea class="ckeditor form-control {{ $errors->any() && $errors->first('pbody') ? 'is-invalid' : '' }}"
                                                id="pbody" name="pbody">{{ $post->body }}</textarea>
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('pbody') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (Body section) -->
                        </div>
                        <!-- /.row -->
                    </form>
                    <!-- /.form end-->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        @endif

    </div>
    <!-- /.content-wrapper -->
@endsection

@push('js')
@endpush
