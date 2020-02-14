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
                    <div class="projects-single">
                        <div class="projects-sidebar">
                            <div class="projects-sidebar-wrap">
                                <h3 class="projects-title">Recomended</h3>
                                <div class="projects-portfolio-wrap">
                                    <div class="portfolio-img">
                                        <a href="gallery-grid.html"><img src="{{ asset('assets/frontend/images/projects/1.jpg')}}" alt="image"></a>
                                        <div class="flat-button style1">
                                            <a href="gallery-grid.html">Lihat Majalah</a>
                                        </div>
                                        <div class="overlay"></div>
                                    </div>
                                    <div class="portfolio-content">
                                        <h5 class="portfolio-title"><a href="gallery-grid.html">Osaka Japan Castle</a></h5>
                                        <ul class="portfolio-categories">
                                            <li><a href="#">Houses</a></li>
                                        </ul>                                        
                                    </div>
                                </div><!-- /.projects-portfolio-wrap -->
                            </div>
                        </div><!-- /.projects-sidebar -->

                        <div class="project-gallery project-gallery-list">
                            <div class="project-gallery-wrap">
                                <div class="project-media-item">
                                    <a class="popup-gallery" href="images/projects/ps1.jpg"><img src="{{ asset('assets/frontend/images/projects/ps1.jpg')}}" alt="images"></a>
                                </div>
                            </div><!-- /.project-gallery-wrap -->
                        </div><!-- /.project-gallery-list -->
                    </div><!-- /.projects-single -->


                    <div class="flat-projects-portfolio">
                        <h3 class="projects-related-title">Related Projects</h3>
                        <div class="projects-portfolio"> 
                            <div class="projects-portfolio-wrap style1">
                                <div class="item">
                                    <div class="portfolio-img">
                                        <a href="#"><img src="{{ asset('assets/frontend/images/projects/1.jpg')}}" alt="image"></a>
                                        <div class="flat-button style1">
                                            <a href="#">Quick View</a>
                                        </div>
                                        <div class="overlay"></div>
                                        <div class="portfolio-content">
                                            <h5 class="portfolio-title"><a href="#">The Chair of Charlie</a></h5>
                                            <ul class="portfolio-categories">
                                                <li><a href="#">Furniture</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- /.item -->
                            </div><!-- /.projects-portfolio-wrap -->
                        </div><!-- /.projects-portfolio -->
                    </div><!-- /.flat-projects-portfolio -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>
                <!-- Go Top -->
        <a class="go-top">
            <i class="fa fa-chevron-up"></i>
        </a>

    </div>
        @endsection