@extends('layouts.backend.portal')

@section('title','Settings - User Profile')

@push('css')

@endpush

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @if (session('locale') == 'en')
         <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">User Profile Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                        <!-- Profile Image -->
                        <div class="card card-success card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if (Auth::user()->image)
                                        <img class="profile-user-img img-fluid img-circle"
                                        src="{{asset('public/storage/profile/'.Auth::user()->image)}}"
                                        alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                        src="{{asset('public/storage/profile/avatar.jpg')}}"
                                        alt="User profile picture">
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                                <p class="text-muted text-center">{{ Auth::user()->profession }}</p>

                                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" class="form-control {{($errors->any() && $errors->first('name')) ? 'is-invalid' : ''}}" id="name" name="name" value="{{ Auth::user()->name }}" placeholder="Enter Your Name">
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('name')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Email Address</label>
                                        <input type="email" class="form-control {{($errors->any() && $errors->first('email')) ? 'is-invalid' : ''}}" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="Enter Your Email">
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('email')}}</p>
                                        @endif
                                    </div>
                                    <label for="inputImage" class="col-sm-2 col-form-label" hidden>Old Profile Image</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" id="himage" name="himage" value="{{ Auth::user()->image }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputFile">Profile Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input {{($errors->any() && $errors->first('image')) ? 'is-invalid' : ''}}" id="image" name="image">
                                                <label class="custom-file-label" for="inputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>About</label>
                                        <textarea class="form-control" rows="4" id="about" name="about" placeholder="Enter About Yourself">{{ Auth::user()->about }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right"><i class="nav-icon fas fa-upload" style="margin-right: 5px;"></i>UPDATE</button>
                                        <a href="{{route('user.dashboard')}}" class="btn btn-danger"><i class="nav-icon fas fa-arrow-circle-left" style="margin-right: 5px;"></i>BACK</a>
                                    </div>
                                </form>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col (end) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    @endif

    @if (session('locale') == 'hi')
         <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">यूजर प्रोफाइल पेज</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">मुख्य पेज</a></li>
                    <li class="breadcrumb-item active">यूजर प्रोफाइल</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                        <!-- Profile Image -->
                        <div class="card card-success card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if (Auth::user()->image)
                                        <img class="profile-user-img img-fluid img-circle"
                                        src="{{asset('public/storage/profile/'.Auth::user()->image)}}"
                                        alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                        src="{{asset('public/storage/profile/avatar.jpg')}}"
                                        alt="User profile picture">
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                                <p class="text-muted text-center">{{ Auth::user()->profession }}</p>

                                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="inputName">नाम</label>
                                        <input type="text" class="form-control {{($errors->any() && $errors->first('name')) ? 'is-invalid' : ''}}" id="name" name="name" value="{{ Auth::user()->name }}" placeholder="अपना नाम दर्ज करें">
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('name')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">ईमेल एड्रेस</label>
                                        <input type="email" class="form-control {{($errors->any() && $errors->first('email')) ? 'is-invalid' : ''}}" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="अपना ईमेल दर्ज करें">
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('email')}}</p>
                                        @endif
                                    </div>
                                    <label for="inputImage" class="col-sm-2 col-form-label" hidden>Old Profile Image</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" id="himage" name="himage" value="{{ Auth::user()->image }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputFile">प्रोफाइल इमेज</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input {{($errors->any() && $errors->first('image')) ? 'is-invalid' : ''}}" id="image" name="image">
                                                <label class="custom-file-label" for="inputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>अबाउट</label>
                                        <textarea class="form-control" rows="4" id="about" name="about" placeholder="अपने बारे में दर्ज करें">{{ Auth::user()->about }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right"><i class="nav-icon fas fa-upload" style="margin-right: 5px;"></i>अपडेट करें</button>
                                        <a href="{{route('user.dashboard')}}" class="btn btn-danger"><i class="nav-icon fas fa-arrow-circle-left" style="margin-right: 5px;"></i>वापस</a>
                                    </div>
                                </form>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col (end) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    @endif

</div>
<!-- /.content-wrapper -->

@endsection

@push('js')

@endpush
