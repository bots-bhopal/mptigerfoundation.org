@extends('layouts.backend.portal')

@section('title','Edit - News')

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

    @if (session('locale') == 'en')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>Edit News Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit News</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- form start -->
                <form action="{{route('user.news.update', $news->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- right column -->
                        <div class="col-lg-10 col-md-10 offset-lg-1 offset-md-1">
                            <!-- Horizontal Form -->
                            <div class="card card-info">
                                <div class="card-header">
                                <h3 class="card-title">EDIT NEWS</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body pb-2 mt-2">
                                    <div class="form-group">
                                        <label for="inputNews">News Title</label>
                                        <input type="text" class="form-control {{($errors->any() && $errors->first('title')) ? 'is-invalid' : ''}}" id="title" name="title" value="{{ $news->title }}" placeholder="Enter News Title Here">
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('title')}}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPbody">News Description</label>
                                    <textarea class="ckeditor form-control {{($errors->any() && $errors->first('pbody')) ? 'is-invalid' : ''}}" id="pbody" name="pbody">{{ $news->discription }}</textarea>
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('pbody')}}</p>
                                        @endif
                                    </div>

                                    <label for="inputImage" class="col-sm-2 col-form-label" hidden>Featured Old Image</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" id="himage" name="himage" value="{{$news->image}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputImage">Featured Image</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                        @if ($errors->any())
                                            <p class="text-danger pl-2">{{$errors->first('image')}}</p>
                                        @endif
                                    </div>

                                    <label for="inputImage" class="col-sm-2 col-form-label" hidden>News Old Image</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" id="hmimage" name="hmimage" value="{{$news->m_image}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputmImage">News Images</label>
                                        <input type="file" class="form-control-file" id="m_image" name="m_image[]" multiple>
                                        @if ($errors->any())
                                            <p class="text-danger pl-2">{{$errors->first('m_image')}}</p>
                                        @endif
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success float-right"><i class="nav-icon fas fa-save" style="margin-right: 5px;"></i>UPDATE</button>
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
                    <h1>एडिट न्यूज़ पेज</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">मुख्य पेज</a></li>
                            <li class="breadcrumb-item active">एडिट न्यूज़</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- form start -->
                <form action="{{route('user.news.update', $news->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- right column -->
                        <div class="col-lg-10 col-md-10 offset-lg-1 offset-md-1">
                            <!-- Horizontal Form -->
                            <div class="card card-info">
                                <div class="card-header">
                                <h3 class="card-title">एडिट न्यूज़</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body pb-2 mt-2">
                                    <div class="form-group">
                                        <label for="inputNews">न्यूज़ शीर्षक</label>
                                        <input type="text" class="form-control {{($errors->any() && $errors->first('title')) ? 'is-invalid' : ''}}" id="title" name="title" value="{{ $news->title }}" placeholder="यहां समाचार शीर्षक दर्ज करें">
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('title')}}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPbody">न्यूज़ विवरण</label>
                                    <textarea class="ckeditor form-control {{($errors->any() && $errors->first('pbody')) ? 'is-invalid' : ''}}" id="pbody" name="pbody">{{ $news->discription }}</textarea>
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('pbody')}}</p>
                                        @endif
                                    </div>

                                    <label for="inputImage" class="col-sm-2 col-form-label" hidden>Featured Old Image</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" id="himage" name="himage" value="{{$news->image}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputImage">फीचर्ड इमेज</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                        @if ($errors->any())
                                            <p class="text-danger pl-2">{{$errors->first('image')}}</p>
                                        @endif
                                    </div>

                                    <label for="inputImage" class="col-sm-2 col-form-label" hidden>News Old Image</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" id="hmimage" name="hmimage" value="{{$news->m_image}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputmImage">न्यूज़ इमेजेस</label>
                                        <input type="file" class="form-control-file" id="m_image" name="m_image[]" multiple>
                                        @if ($errors->any())
                                            <p class="text-danger pl-2">{{$errors->first('m_image')}}</p>
                                        @endif
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success float-right"><i class="nav-icon fas fa-save" style="margin-right: 5px;"></i>अपडेट करें</button>
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
