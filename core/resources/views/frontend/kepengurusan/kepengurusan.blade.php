@extends('frontend.layouts.master')
@section('content')
<body class="header-sticky">
    <section class="loading-overlay">
        <div class="Loading-Page">
            <h2 class="loader">Loading...</h2>
        </div>
    </section>
   <!-- Page title -->
   <div class="page-title parallax parallax1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">Judul Majalah</h1>
                            <div class="breadcrumbs">
                                <ul>
                                    <li>You are here:</li>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li>Infografis</li>
                                </ul>
                            </div>
                        </div><!-- /.page-title-captions -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-title -->
        <section class="flat-row flat-projects-single pad-top0px">
            <div class="container">
                <div class="row">
                        <a class="popup-gallery" href="{{ asset('assets/frontend/images/organisasi.png')}}"><img src="{{ asset('assets/frontend/images/mui.jpg')}}" alt="images"></a>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>
                <!-- Go Top -->
        <a class="go-top">
            <i class="fa fa-chevron-up"></i>
        </a>

    </div>
        @endsection