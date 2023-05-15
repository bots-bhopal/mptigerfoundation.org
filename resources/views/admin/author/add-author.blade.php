@extends('layouts.backend.portal')

@section('title', 'MPTFS - Add Author')

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
                            <h1 class="m-0">Add Author Page</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Author</li>
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
                                    <form action="{{ route('admin.author.add') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <input type="text"
                                                class="form-control {{ $errors->any() && $errors->first('name') ? 'is-invalid' : '' }}"
                                                id="name" name="name" value="{{ old('name') }}"
                                                placeholder="Enter Your Name">
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Email Address</label>
                                            <input type="email"
                                                class="form-control {{ $errors->any() && $errors->first('email') ? 'is-invalid' : '' }}"
                                                id="email" name="email" value="{{ old('email') }}"
                                                placeholder="Enter Your Email">
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="inputPassword">Password</label>
                                            <input type="password"
                                                class="form-control {{ $errors->any() && $errors->first('email') ? 'is-invalid' : '' }}"
                                                id="password" name="password" placeholder="Enter Your Password"
                                                autocomplete="new-password">
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="inputConfirmPassword">Confirm Password</label>
                                            <input type="password"
                                                class="form-control {{ $errors->any() && $errors->first('password_confirmation') ? 'is-invalid' : '' }}"
                                                id="password-confirm" name="password_confirmation"
                                                placeholder="Enter Your Confirm Password" autocomplete="new-password">
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('password_confirmation') }}
                                                </p>
                                            @endif
                                        </div>

                                        <label for="inputImage" class="col-sm-2 col-form-label" hidden>Old Profile
                                            Image</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" id="himage" name="himage"
                                                value="{{ Auth::user()->image }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputFile">Profile Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file"
                                                        class="custom-file-input {{ $errors->any() && $errors->first('image') ? 'is-invalid' : '' }}"
                                                        id="image" name="image">
                                                    <label class="custom-file-label" for="inputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProfession">Profession</label>
                                            <input type="text"
                                                class="form-control {{ $errors->any() && $errors->first('profession') ? 'is-invalid' : '' }}"
                                                id="profession" name="profession" value="{{ old('profession') }}"
                                                placeholder="Enter Your Profession">
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('profession') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="inputRole">Role</label>
                                            <select name="roles"
                                                class="form-control {{ $errors->any() && $errors->first('roles') ? 'is-invalid' : '' }}">
                                                <option value="">----- Select Role -----</option>
                                                <option value="1">Super Admin</option>
                                                <option value="2">Author</option>
                                                <option value="3">Admin</option>
                                            </select>
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('roles') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Status</label>
                                            <select name="status"
                                                class="form-control {{ $errors->any() && $errors->first('status') ? 'is-invalid' : '' }}">
                                                <option value="">----- Select Status -----</option>
                                                <option value="0">Active</option>
                                                <option value="1">Deactive</option>
                                            </select>
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('status') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success float-right"><i
                                                    class="nav-icon fas fa-save"
                                                    style="margin-right: 5px;"></i>SAVE</button>
                                            <a href="{{ route('admin.user.list') }}" class="btn btn-danger"><i
                                                    class="nav-icon fas fa-arrow-circle-left"
                                                    style="margin-right: 5px;"></i>BACK</a>
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
                            <h1 class="m-0">ऐड लेखक पेज</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">मुख्य पेज</a></li>
                                <li class="breadcrumb-item active">ऐड लेखक</li>
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
                                    <form action="{{ route('admin.author.add') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="inputName">नाम</label>
                                            <input type="text"
                                                class="form-control {{ $errors->any() && $errors->first('name') ? 'is-invalid' : '' }}"
                                                id="name" name="name" value="{{ old('name') }}"
                                                placeholder="अपना नाम दर्ज करें">
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">ईमेल एड्रेस</label>
                                            <input type="email"
                                                class="form-control {{ $errors->any() && $errors->first('email') ? 'is-invalid' : '' }}"
                                                id="email" name="email" value="{{ old('email') }}"
                                                placeholder="अपना ईमेल दर्ज करें">
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="inputPassword">पासवर्ड</label>
                                            <input type="password"
                                                class="form-control {{ $errors->any() && $errors->first('email') ? 'is-invalid' : '' }}"
                                                id="password" name="password" placeholder="अपना पासवर्ड डालें"
                                                autocomplete="new-password">
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="inputConfirmPassword">कन्फर्म पासवर्ड</label>
                                            <input type="password"
                                                class="form-control {{ $errors->any() && $errors->first('password_confirmation') ? 'is-invalid' : '' }}"
                                                id="password-confirm" name="password_confirmation"
                                                placeholder="अपना कन्फर्म पासवर्ड दर्ज करें" autocomplete="new-password">
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('password_confirmation') }}
                                                </p>
                                            @endif
                                        </div>

                                        <label for="inputImage" class="col-sm-2 col-form-label" hidden>Old Profile
                                            Image</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" id="himage" name="himage"
                                                value="{{ Auth::user()->image }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputFile">प्रोफाइल इमेज</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file"
                                                        class="custom-file-input {{ $errors->any() && $errors->first('image') ? 'is-invalid' : '' }}"
                                                        id="image" name="image">
                                                    <label class="custom-file-label" for="inputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputProfession">प्रोफ़ेशन</label>
                                            <input type="text"
                                                class="form-control {{ $errors->any() && $errors->first('profession') ? 'is-invalid' : '' }}"
                                                id="profession" name="profession" value="{{ old('profession') }}"
                                                placeholder="अपना पेशा दर्ज करें">
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('profession') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="inputRole">रोल</label>
                                            <select name="roles"
                                                class="form-control {{ $errors->any() && $errors->first('roles') ? 'is-invalid' : '' }}">
                                                <option value="">----- सेलेक्ट रोल -----</option>
                                                <option value="1">Super Admin</option>
                                                <option value="2">Author</option>
                                                <option value="3">Admin</option>
                                            </select>
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('roles') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">स्टेटस</label>
                                            <select name="status"
                                                class="form-control {{ $errors->any() && $errors->first('status') ? 'is-invalid' : '' }}">
                                                <option value="">----- सेलेक्ट स्टेटस -----</option>
                                                <option value="0">Active</option>
                                                <option value="1">Deactive</option>
                                            </select>
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('status') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success float-right"><i
                                                    class="nav-icon fas fa-save" style="margin-right: 5px;"></i>सेव</button>
                                            <a href="{{ route('admin.user.list') }}" class="btn btn-danger"><i
                                                    class="nav-icon fas fa-arrow-circle-left"
                                                    style="margin-right: 5px;"></i>वापस</a>
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
