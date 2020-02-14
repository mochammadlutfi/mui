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
                        <h1 class="title">{{ $tanya->judul }}</h1>
                            <div class="breadcrumbs">
                                <ul>
                                    <li>You are here:</li>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('konsultasi') }}">Konsultasi</a></li>
                                    <li>{{ $tanya->judul }}</li>
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
                                <div class="col-md-11">
                                    <div class="header-post ">
                                    <h2 class="title-post">{{ $tanya->judul }}</h2>
                                    </div>
                                    <div class="feature-post col-md-1">
                                        @if($tanya->user->avatar <> null)
                                            <img width="30px" height="30px" src="{{ asset('uploads/'. $tanya->user->avatar) }}" alt="image">
                                        @else
                                            <img width="30px" height="30px" src="{{ Avatar::create($tanya->user->name)->toBase64() }}" alt="image">
                                        @endif
                                    </div>
                                   <div class="content-post">
                                   <h3>{{ $tanya->user->name }}</h3>
                                    </div><!-- /.content-post -->
                                    <div class="content-post">
                                        <p>
                                            {{ $tanya->deskripsi }}
                                        </p>
                                        <p class="time-post col-8">{{ $tanya->created_at->format('M, d Y') }}</p>
                                    </div><!-- /.content-post -->
                                    </div>
                                </article><!-- /.post -->

                            </div><!-- /.main-content-wrap -->
                            <nav class="navigation post-navigation">
                                <ul class="nav-links">
                                    <li class="previous-post">

                                    </li>

                                    </li>
                                </ul><!-- /.nav-links -->
                            </nav>

                            <div class="comments-area">
                            <div class="comment-respond">
                                <h3 class="comment-reply-title">Jawaban</h3>
                                <div class="main-content-wrap">
                                    <article class="post">
                                        @if($jawab <> null)
                                        <div class="feature-post col-md-1">
                                            @if($jawab->admin->avatar <> null)
                                                <img width="30px" height="30px" src="{{ asset('uploads/'. $jawab->admin->avatar) }}" alt="image">
                                            @else
                                                <img width="30px" height="30px" src="{{ Avatar::create($jawab->admin->name)->toBase64() }}" alt="image">
                                            @endif
                                        </div>
                                        <div class="col-md-11">
                                        <div class="header-post ">
                                            <h4 class="title-post">{{ $jawab->judul }}</h4>
                                            <div class="meta-post">
                                                <span>Oleh: </span>
                                                <span><a href="#">{{ $jawab->admin->name }}</a></span>
                                            </div>
                                        </div>
                                        <div class="content-post">
                                            <p>
                                                <?= str_limit($jawab->deskripsi, 250) ?>
                                            </p>
                                            <p class="time-post col-8">{{ $jawab->created_at->format('M, d Y') }}</p>
                                        </div><!-- /.content-post -->
                                        </div>
                                        @endif
                                    </article><!-- /.post -->
                                </div><!-- /.main-content-wrap -->
                            </div><!-- /.comment-respond -->
                        </div><!-- /.comments-area -->
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
