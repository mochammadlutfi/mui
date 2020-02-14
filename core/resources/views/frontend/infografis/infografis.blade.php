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
                            <h1 class="title">Infografis</h1>
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
        <section class="flat-row pad-top0px">
            <div class="container">
                <div class="row">
                    <div class="flat-projects-portfolio">
                        <div class="projects-portfolio">
                            <div class="projects-portfolio-wrap">
                                @foreach ($infografis as $f)
                                    <div class="item houses">
                                        <div class="portfolio-img">
                                            <a href="gallery-grid.html"><img src="{{ asset('uploads/'. $f->foto)}}" alt="image"></a>
                                            <div class="flat-button style1">
                                                <a href="{{route('infografis.detail', $f->slug)}}">Selengkapnya</a>
                                            </div>
                                            <div class="overlay"></div>
                                        </div>
                                        <div class="portfolio-content">
                                        <h5 class="portfolio-title"><a href="{{route('infografis.detail', $f->slug)}}">{{ $f->judul }}</a></h5>
                                            <ul class="portfolio-categories">
                                                <li><a href="#">{{ $f->created_at->format('M, d Y') }}</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- /.item -->
                                @endforeach
                            </div><!-- /.projects-portfolio-wrap -->
                        </div><!-- /.projects-portfolio -->
                    </div><!-- /.flat-projects-portfolio -->
                </div><!-- /.row -->
            </div><!-- /.container -->
            {{ $infografis->links() }}
        </section>
        @endsection
