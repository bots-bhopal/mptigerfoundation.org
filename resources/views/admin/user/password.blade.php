@extends('layouts.backend.portal')

@section('title','Settings - Change Password')

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
                        <h1 class="m-0">Change Password Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
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
                    <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                    <!-- Profile Image -->
                        <div class="card card-success card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if ($user->image)
                                        <img class="profile-user-img img-fluid img-circle"
                                        src="{{asset('public/storage/profile/'.$user->image)}}"
                                        alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                        src="{{asset('public/storage/profile/avatar.jpg')}}"
                                        alt="User profile picture">
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                                <p class="text-muted text-center">{{ $user->profession }}</p>

                                <form action="{{ route('admin.user.updatepassword', $user->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    {{-- <div class="form-group">
                                        <label for="old_passwprd">Old Password</label>
                                        <input type="password" class="form-control {{($errors->any() && $errors->first('old_password')) ? 'is-invalid' : ''}}" id="old_password" name="old_password" placeholder="Enter Your Old Password">
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('old_password')}}</p>
                                        @endif
                                    </div> --}}

                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input type="password" class="form-control {{($errors->any() && $errors->first('password')) ? 'is-invalid' : ''}}" id="password" name="password" placeholder="Enter Your New Password">
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('password')}}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control {{($errors->any() && $errors->first('confirm_password')) ? 'is-invalid' : ''}}" id="password_confirmation" name="password_confirmation" placeholder="Enter Your Confirm Password">
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right"><i class="nav-icon fas fa-upload" style="margin-right: 5px;"></i>UPDATE</button>
                                        <a href="{{route('admin.user.list')}}" class="btn btn-danger"><i class="nav-icon fas fa-arrow-circle-left" style="margin-right: 5px;"></i>BACK</a>
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
        </section>
        <!-- /.content -->
    @endif

    @if (session('locale') == 'hi')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">चेंज पासवर्ड पेज</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">मुख्य पेज</a></li>
                        <li class="breadcrumb-item active">चेंज पासवर्ड</li>
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
                    <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                    <!-- Profile Image -->
                        <div class="card card-success card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if ($user->image)
                                        <img class="profile-user-img img-fluid img-circle"
                                        src="{{asset('public/storage/profile/'.$user->image)}}"
                                        alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                        src="{{asset('public/storage/profile/avatar.jpg')}}"
                                        alt="User profile picture">
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                                <p class="text-muted text-center">{{ $user->profession }}</p>

                                <form action="{{ route('admin.user.updatepassword', $user->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    {{-- <div class="form-group">
                                        <label for="old_passwprd">Old Password</label>
                                        <input type="password" class="form-control {{($errors->any() && $errors->first('old_password')) ? 'is-invalid' : ''}}" id="old_password" name="old_password" placeholder="Enter Your Old Password">
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('old_password')}}</p>
                                        @endif
                                    </div> --}}

                                    <div class="form-group">
                                        <label for="password">नया पासवर्ड</label>
                                        <input type="password" class="form-control {{($errors->any() && $errors->first('password')) ? 'is-invalid' : ''}}" id="password" name="password" placeholder="अपना नया पासवर्ड दर्ज करें">
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('password')}}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">कन्फर्म पासवर्ड</label>
                                        <input type="password" class="form-control {{($errors->any() && $errors->first('confirm_password')) ? 'is-invalid' : ''}}" id="password_confirmation" name="password_confirmation" placeholder="अपना पासवर्ड दर्ज करें">
                                        @if ($errors->any())
                                            <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right"><i class="nav-icon fas fa-upload" style="margin-right: 5px;"></i>अपडेट करें</button>
                                        <a href="{{route('admin.user.list')}}" class="btn btn-danger"><i class="nav-icon fas fa-arrow-circle-left" style="margin-right: 5px;"></i>वापस</a>
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
        </section>
        <!-- /.content -->
    @endif

</div>
<!-- /.content-wrapper -->

@endsection

@push('js')

@endpush
