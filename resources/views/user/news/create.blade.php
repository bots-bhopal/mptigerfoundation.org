@extends('layouts.backend.portal')

@section('title','Create - News')

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
                    <h1>Create News Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add News</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- form start -->
                <form action="{{route('user.news.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="row">
                        <!-- right column -->
                        <div class="col-lg-10 col-md-10 offset-lg-1 offset-md-1">
                            <!-- Horizontal Form -->
                            <div class="card card-info">
                                <div class="card-header">
                                <h3 class="card-title">ADD NEWS</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body pb-2 mt-2">
                                    <div class="form-group">
                                        <label for="inputNews">News Title</label>
                                        <input type="text" class="form-control {{($errors->any() && $errors->first('title')) ? 'is-invalid' : ''}}" id="title" name="title" value="{{old('title')}}" placeholder="Enter News Title Here">
                                        @if ($errors->any())
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('title')}}</strong>
                                            </span>
                                            {{-- <p class="text-danger">{{$errors->first('title')}}</p> --}}
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPbody">News Description</label>
                                    <textarea class="ckeditor form-control {{($errors->any() && $errors->first('pbody')) ? 'is-invalid' : ''}}" id="pbody" name="pbody">{{old('pbody')}}</textarea>
                                        @if ($errors->any())
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('pbody')}}</strong>
                                            </span>
                                            {{-- <p class="text-danger">{{$errors->first('pbody')}}</p> --}}
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="inputImage">Featured Image</label>
                                        <input type="file" class="form-control-file {{($errors->any() && $errors->first('image')) ? 'is-invalid' : ''}}" id="image" name="image">
                                        @if ($errors->any())
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('image')}}</strong>
                                            </span>
                                            {{-- <p class="text-danger pl-2">{{$errors->first('image')}}</p> --}}
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="inputmImage">News Images</label>
                                        <input type="file" class="form-control-file {{($errors->any() && $errors->first('m_image.*')) ? 'is-invalid' : ''}}" id="m_image" name="m_image[]" multiple>
                                        @if ($errors->any())
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('m_image.*')}}</strong>
                                            </span>
                                            {{-- <p class="text-danger pl-2">{{$errors->first('m_image')}}</p> --}}
                                        @endif
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success float-right"><i class="nav-icon fas fa-save" style="margin-right: 5px;"></i>SAVE</button>
                                    <a href="{{route('user.news.index')}}" class="btn btn-danger"><i class="nav-icon fas fa-arrow-circle-left" style="margin-right: 5px;"></i>BACK</a>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (right) -->
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
                    <h1>क्रिएट न्यूज़ पेज</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">मुख्य पेज</a></li>
                            <li class="breadcrumb-item active">क्रिएट न्यूज़</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- form start -->
                <form action="{{route('user.news.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="row">
                        <!-- right column -->
                        <div class="col-lg-10 col-md-10 offset-lg-1 offset-md-1">
                            <!-- Horizontal Form -->
                            <div class="card card-info">
                                <div class="card-header">
                                <h3 class="card-title">क्रिएट न्यूज़</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body pb-2 mt-2">
                                    <div class="form-group">
                                        <label for="inputNews">न्यूज़ शीर्षक</label>
                                        <input type="text" class="form-control {{($errors->any() && $errors->first('title')) ? 'is-invalid' : ''}}" id="title" name="title" value="{{old('title')}}" placeholder="यहां समाचार शीर्षक दर्ज करें">
                                        @if ($errors->any())
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('title')}}</strong>
                                            </span>
                                            {{-- <p class="text-danger">{{$errors->first('title')}}</p> --}}
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPbody">न्यूज़ विवरण</label>
                                    <textarea class="ckeditor form-control {{($errors->any() && $errors->first('pbody')) ? 'is-invalid' : ''}}" id="pbody" name="pbody">{{old('pbody')}}</textarea>
                                        @if ($errors->any())
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('pbody')}}</strong>
                                            </span>
                                            {{-- <p class="text-danger">{{$errors->first('pbody')}}</p> --}}
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="inputImage">फीचर्ड इमेज</label>
                                        <input type="file" class="form-control-file {{($errors->any() && $errors->first('image')) ? 'is-invalid' : ''}}" id="image" name="image">
                                        @if ($errors->any())
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('image')}}</strong>
                                            </span>
                                            {{-- <p class="text-danger pl-2">{{$errors->first('image')}}</p> --}}
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="inputmImage">न्यूज़ इमेजेस</label>
                                        <input type="file" class="form-control-file {{($errors->any() && $errors->first('m_image.*')) ? 'is-invalid' : ''}}" id="m_image" name="m_image[]" multiple>
                                        @if ($errors->any())
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('m_image.*')}}</strong>
                                            </span>
                                            {{-- <p class="text-danger pl-2">{{$errors->first('m_image.*')}}</p> --}}
                                        @endif
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success float-right"><i class="nav-icon fas fa-save" style="margin-right: 5px;"></i>सेव</button>
                                    <a href="{{route('user.news.index')}}" class="btn btn-danger"><i class="nav-icon fas fa-arrow-circle-left" style="margin-right: 5px;"></i>वापस</a>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (right) -->
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
