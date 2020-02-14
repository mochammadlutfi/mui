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
                            <h1 class="title">Konsultasi</h1>
                            <div class="breadcrumbs">
                                <ul>
                                    <li>You are here:</li>
                                    <li><a href="index.html">Home</a></li>
                                    <li>Konsultasi</li>
                                </ul>
                            </div>
                        </div><!-- /.page-title-captions -->

                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-title -->

        <div class="main-content blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="content-wrap">
                            <div class="main-content-wrap">
                                <article class="post">
                                    <nav class="navigation post-navigation">
                                        <ul class="nav-links">
                                            <li class="previous-post">
                                                <a href="{{ route('konsultasi.tambah') }}">
                                                    <span class="meta-nav">Buat Pertanyaan</a>
                                            </li>
                                        </ul><!-- /.nav-links -->
                                    </nav>
                                    @foreach ($pertanyaan as $p)
                                        <div class="feature-post col-md-1">
                                            @if($p->user->avatar <> null)
                                                <img width="30px" height="30px" src="{{ asset('uploads/'. $p->user->avatar) }}" alt="image">
                                            @else
                                                <img width="30px" height="30px" src="{{ Avatar::create($p->user->name)->toBase64() }}" alt="image">
                                            @endif
                                        </div>
                                        <div class="col-md-11">
                                        <div class="header-post ">
                                            <a href="{{ route('konsultasi.detail', $p->slug) }}">
                                                <h4 class="title-post">{{ $p->judul }}</h4>
                                            </a>
                                            <div class="meta-post">
                                                <span>Oleh: </span>
                                                <span><a href="#">{{ $p->user->name }}</a></span>
                                            </div>
                                        </div>
                                        <div class="content-post">
                                            <p>
                                                <?= str_limit($p->deskripsi, 250) ?>
                                            </p>
                                            <p class="time-post col-8">{{ $p->created_at->format('M, d Y') }}</p>
                                        </div><!-- /.content-post -->
                                        </div>
                                    @endforeach
                                </article><!-- /.post -->
                                {{ $pertanyaan->links() }}
                            </div><!-- /.main-content-wrap -->
                        </div><!-- /.content-wrap -->
                    </div><!-- /.col-md-9 -->

                    <div class="col-md-3">
                        <div class="sidebars">
                            <div class="sidebars-wrap">
                                <div class="sidebar">
                                    <div class="widget widget_tag_cloud">
                                        <h3 class="widget-title">Kategori</h3>
                                        <div class="tagcloud">
                                            @foreach($kategori as $k)
                                                <a href="{{ route('konsultasi.kategori', $k->slug) }}">{{ $k->nama }}</a>
                                            @endforeach
                                        </div>
                                    </div><!-- /.widget_tag_cloud -->
                                </div><!-- .sidebar -->
                            </div><!-- /.sidebars-wrap -->
                        </div><!-- /.sidebars -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.main-content -->
        @endsection
