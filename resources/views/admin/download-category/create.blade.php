@extends('layouts.backend.portal')

@section('title', 'Create - Category')

@push('css')
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('panel.create-category') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ __('panel.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('panel.add-category') }}</li>
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
                                <h3 class="card-title">{{ __('panel.category-title') }}</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form action="{{ route('admin.download-category.store') }}" method="POST" enctype="multipart/form-data"
                                class="form-horizontal">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputCategory"
                                            class="col-sm-2 col-form-label">{{ __('panel.category-name') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                class="form-control {{ $errors->any() && $errors->first('cname') ? 'is-invalid' : '' }}"
                                                id="name" name="name" value="{{ old('name') }}"
                                                placeholder="{{ __('panel.category-name') }}">
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label for="inputImage"
                                            class="col-sm-2 col-form-label">{{ __('panel.category-image') }}</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control-file" id="image" name="image">
                                            @if ($errors->any())
                                                <p class="text-danger">{{ $errors->first('image') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">{{ __('panel.btn-add') }}</button>
                                    <a href="{{ route('admin.download-category.index') }}"
                                        class="btn btn-warning">{{ __('panel.btn-back') }}</a>
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
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('js')
@endpush
