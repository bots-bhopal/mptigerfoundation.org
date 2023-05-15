@extends('layouts.backend.portal')

@section('title','MPTFS - User Dashboard')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @if (session('locale') == 'en')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
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
                    <div class="col-md-12">
                        <div class="card card-dark">
                            <div class="card-header">
                                <h5 class="card-title">News & Events Information</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                            <h3>{{ $news_count }}</h3>

                                            <p>Total News</p>
                                            </div>
                                            <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                            </div>
                                            <a href="{{ route('user.news.index') }}" class="small-box-footer">View News <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                            <h3>{{ $events_count }}</h3>

                                            <p>Total Event's</p>
                                            </div>
                                            <div class="icon">
                                            <i class="ion ion-bag"></i>
                                            </div>
                                            <a href="{{ route('user.event.index') }}" class="small-box-footer">View Event's <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                            <h3>{{ $awareness_count }}</h3>

                                            <p>Total Awareness Initiatives</p>
                                            </div>
                                            <div class="icon">
                                            <i class="ion ion-bag"></i>
                                            </div>
                                            <a href="{{ route('user.awareness.index') }}" class="small-box-footer">View Awareness <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-danger">
                                            <div class="inner">
                                            <h3>{{ $gallery_count }}</h3>

                                            <p>Total Galleries</p>
                                            </div>
                                            <div class="icon">
                                            <i class="ion ion-bag"></i>
                                            </div>
                                            <a href="{{ route('user.awareness.index') }}" class="small-box-footer">View Galleries <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- ./card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
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
                <h1 class="m-0">डैशबोर्ड</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">मुख्य पेज</a></li>
                    <li class="breadcrumb-item active">डैशबोर्ड</li>
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
                    <div class="col-md-12">
                        <div class="card card-dark">
                            <div class="card-header">
                                <h5 class="card-title">न्यूज़ और इवेंट्स इन्फॉर्मेशन</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                            <h3>{{ $news_count }}</h3>

                                            <p>टोटल न्यूज़</p>
                                            </div>
                                            <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                            </div>
                                            <a href="{{ route('user.news.index') }}" class="small-box-footer">व्यू न्यूज़ <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                            <h3>{{ $events_count }}</h3>

                                            <p>टोटल इवेंट्स</p>
                                            </div>
                                            <div class="icon">
                                            <i class="ion ion-bag"></i>
                                            </div>
                                            <a href="{{ route('user.event.index') }}" class="small-box-footer">व्यू इवेंट्स <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                            <h3>{{ $awareness_count }}</h3>

                                            <p>टोटल अवेयरनेस</p>
                                            </div>
                                            <div class="icon">
                                            <i class="ion ion-bag"></i>
                                            </div>
                                            <a href="{{ route('user.awareness.index') }}" class="small-box-footer">व्यू अवेयरनेस <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-danger">
                                            <div class="inner">
                                            <h3>{{ $gallery_count }}</h3>

                                            <p>टोटल गैलरीज</p>
                                            </div>
                                            <div class="icon">
                                            <i class="ion ion-bag"></i>
                                            </div>
                                            <a href="{{ route('user.awareness.index') }}" class="small-box-footer">व्यू गैलरीज <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- ./card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    @endif

</div>
<!-- /.content-wrapper -->

@endsection
