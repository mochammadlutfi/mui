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
                            <h1 class="title">Berita</h1>
                            <div class="breadcrumbs">
                                <ul>
                                    <li>You are here:</li>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li>Berita</li>
                                </ul>
                            </div>
                        </div><!-- /.page-title-captions -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-title -->

        <section class="main-content blog blog-grid mag-top-50px">
            <div class="container">
                <div class="row">
                    <div class="content-wrap">
                        <div class="main-content-wrap">
                        @foreach ($berita as $b)
                            <div class="item w3c">
                                <article class="post">
                                    <div class="feature-post">
                                        <a href="{{ route('berita.detail', $b->slug) }}"><img src="{{ asset('uploads/'. $b->foto)}}" alt="image"></a>
                                    </div><!-- /.feature-post -->
                                    <div class="header-post">
                                        <h4 class="title-post"><a href="{{ route('berita.detail', $b->slug) }}">{{ $b->judul }}</a></h4>
                                        <p class="time-post">{{ $b->created_at->format('M, d Y') }}</p>
                                    </div><!-- /.header-post -->
                                    <div class="content-post">
                                        <?= str_limit($b->deskripsi, 250) ?>
                                        <div class="readmore">
                                            <a href="{{ route('berita.detail', $b->slug) }}">Read more</a>
                                        </div>
                                    </div><!-- /.content-post -->
                                </article>
                            </div><!-- /.item -->
                            @endforeach
                        </div><!-- /.main-content-wrap -->
                    </div><!-- /.content-wrap -->
                </div><!-- /.row -->
                {{ $berita->links() }}
            </div><!-- /.container -->
        </section>
        <!-- Go Top -->
        <a class="go-top">
            <i class="fa fa-chevron-up"></i>
        </a>

    </div>
    @endsection
