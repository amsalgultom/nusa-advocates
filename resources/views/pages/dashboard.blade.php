@extends('layouts.app')
@section('title', 'Nusa Advocates | Dashboard')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card balance-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Redirect</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('practice.create') }}">Add New</a></li>
                                    <li><a class="dropdown-item" href="{{ route('practice.index') }}">Check All</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Practice Area</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-upc-scan"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $data['practice'] }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card balance-card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Redirect</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('lawyer.create') }}">Add New</a></li>
                                    <li><a class="dropdown-item" href="{{ route('lawyer.index') }}">Check All</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Principal Lawyer</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-patch-check-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $data['lawyer'] }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <!-- <div class="col-lg-4">
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Redirect</h6>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('news.create') }}">Add New</a></li>
                            <li><a class="dropdown-item" href="{{ route('news.index') }}">Check All</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">News &amp; Blog</h5>

                        <div class="news">
                            @foreach ($news as $list)
                            <div class="post-item clearfix">
                                <img src="{{ asset('storage/news') . '/' . $list->image }}" alt="">
                                <h4><a href="#">{{ $list->title }}</a></h4>
                                <p>{{ $list->short_desc }}</p>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div> -->

        </div>
    </section>

</main>
@endsection