@extends('layouts.backend.portal')

@section('title','Edit - Awareness Initiatives')

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
                    <h1>Edit Awareness Initiatives Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Awareness Initiatives</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- form start -->
                <form action="{{route('user.awareness.update', $awareness->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- right column -->
                        <div class="col-lg-10 col-md-10 offset-lg-1 offset-md-1">
                            <!-- Horizontal Form -->
                            <div class="card card-info">
                                <div class="card-header">
                                <h3 class="card-title">EDIT AWARENESS</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body pb-2 mt-2">
                                    <div class="form-group">
                                        <label for="inputTitle">Title</label>
                                        <input type="text" class="form-control {{($errors->any() && $errors->first('title')) ? 'is-invalid' : ''}}" id="title" name="title" value="{{ $awareness->title }}" placeholder="Enter Title Here">
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('title')}}</p>
                                        @endif
                                    </div>

                                    {{-- <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group date" id="date" data-target-input="nearest">
                                            <input type="text" name="edate" value="{{ date('Y-m-d',strtotime($awareness->date)) }}" class="form-control datetimepicker-input {{($errors->any() && $errors->first('edate')) ? 'is-invalid' : ''}}" data-target="#date" placeholder="Select Date Here"/>
                                            <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('edate')}}</p>
                                        @endif
                                    </div> --}}

                                    {{-- <div class="form-group">
                                        <label>Time</label>

                                        <div class="input-group date" id="time" value="{{$awareness->time}}" data-target-input="nearest">
                                            <input type="text" name="etime" value="{{ date('h:i A',strtotime($awareness->time)) }}" class="form-control datetimepicker-input {{($errors->any() && $errors->first('etime')) ? 'is-invalid' : ''}}" data-target="#time" placeholder="Select Time Here"/>
                                            <div class="input-group-append" data-target="#time" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                        </div>
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('etime')}}</p>
                                        @endif
                                    </div> --}}

                                    <div class="form-group">
                                        <label for="inputTitle">Place</label>
                                        <input type="text" class="form-control {{($errors->any() && $errors->first('place')) ? 'is-invalid' : ''}}" id="place" name="place" value="{{$awareness->place}}" placeholder="Enter Place Here">
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('place')}}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPbody">Description</label>
                                    <textarea class="ckeditor form-control {{($errors->any() && $errors->first('pbody')) ? 'is-invalid' : ''}}" id="pbody" name="pbody">{{ $awareness->discription }}</textarea>
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('pbody')}}</p>
                                        @endif
                                    </div>

                                    <label for="inputImage" class="col-sm-2 col-form-label" hidden>Featured Old Image</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" id="himage" name="himage" value="{{$awareness->image}}">
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
                                        <input type="hidden" id="hmimage" name="hmimage" value="{{$awareness->m_image}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputmImage">Images</label>
                                        <input type="file" class="form-control-file" id="m_image" name="m_image[]" multiple>
                                        @if ($errors->any())
                                            <p class="text-danger pl-2">{{$errors->first('m_image')}}</p>
                                        @endif
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success float-right"><i class="nav-icon fas fa-save" style="margin-right: 5px;"></i>UPDATE</button>
                                    <a href="{{route('user.awareness.index')}}" class="btn btn-danger"><i class="nav-icon fas fa-arrow-circle-left" style="margin-right: 5px;"></i>BACK</a>
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
                    <h1>एडिट अवेयरनेस पेज</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">मुख्य पेज</a></li>
                            <li class="breadcrumb-item active">एडिट अवेयरनेस</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- form start -->
                <form action="{{route('user.awareness.update', $awareness->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- right column -->
                        <div class="col-lg-10 col-md-10 offset-lg-1 offset-md-1">
                            <!-- Horizontal Form -->
                            <div class="card card-info">
                                <div class="card-header">
                                <h3 class="card-title">एडिट इवेंट</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body pb-2 mt-2">
                                    <div class="form-group">
                                        <label for="inputTitle">शीर्षक</label>
                                        <input type="text" class="form-control {{($errors->any() && $errors->first('title')) ? 'is-invalid' : ''}}" id="title" name="title" value="{{ $awareness->title }}" placeholder="यहां शीर्षक दर्ज करें">
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('title')}}</p>
                                        @endif
                                    </div>

                                    {{-- <div class="form-group">
                                        <label>डेट</label>
                                        <div class="input-group date" id="date" data-target-input="nearest">
                                            <input type="text" name="edate" value="{{ date('Y-m-d',strtotime($awareness->date)) }}" class="form-control datetimepicker-input {{($errors->any() && $errors->first('edate')) ? 'is-invalid' : ''}}" data-target="#date" placeholder="यहां डेट सिलेक्ट करें"/>
                                            <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('edate')}}</p>
                                        @endif
                                    </div> --}}

                                    {{-- <div class="form-group">
                                        <label>टाईम</label>

                                        <div class="input-group date" id="time" value="{{$awareness->time}}" data-target-input="nearest">
                                            <input type="text" name="etime" value="{{ date('h:i A',strtotime($awareness->time)) }}" class="form-control datetimepicker-input {{($errors->any() && $errors->first('etime')) ? 'is-invalid' : ''}}" data-target="#time" placeholder="यहां टाइम सिलेक्ट करें"/>
                                            <div class="input-group-append" data-target="#time" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                        </div>
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('etime')}}</p>
                                        @endif
                                    </div> --}}

                                    <div class="form-group">
                                        <label for="inputTitle">प्लेस</label>
                                        <input type="text" class="form-control {{($errors->any() && $errors->first('place')) ? 'is-invalid' : ''}}" id="place" name="place" value="{{$awareness->place}}" placeholder="यहां प्लेस डालें">
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('place')}}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPbody">विवरण</label>
                                    <textarea class="ckeditor form-control {{($errors->any() && $errors->first('pbody')) ? 'is-invalid' : ''}}" id="pbody" name="pbody">{{ $awareness->discription }}</textarea>
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('pbody')}}</p>
                                        @endif
                                    </div>

                                    <label for="inputImage" class="col-sm-2 col-form-label" hidden>Featured Old Image</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" id="himage" name="himage" value="{{$awareness->image}}">
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
                                        <input type="hidden" id="hmimage" name="hmimage" value="{{$awareness->m_image}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputmImage">इमेजेस</label>
                                        <input type="file" class="form-control-file" id="m_image" name="m_image[]" multiple>
                                        @if ($errors->any())
                                            <p class="text-danger pl-2">{{$errors->first('m_image')}}</p>
                                        @endif
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success float-right"><i class="nav-icon fas fa-save" style="margin-right: 5px;"></i>अपडेट करें</button>
                                    <a href="{{route('user.awareness.index')}}" class="btn btn-danger"><i class="nav-icon fas fa-arrow-circle-left" style="margin-right: 5px;"></i>वापस</a>
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
<script>
    $(function(){
        //Date range picker
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD'
        });

        //Timepicker
        $('#time').datetimepicker({
            use24hours: true,
            format: 'HH:mm'
            // format: 'LT'
        })
    });
</script>
@endpush
