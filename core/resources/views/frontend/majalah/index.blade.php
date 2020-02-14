
@extends('frontend.layouts.master')
@section('content')
 <!-- Page title -->
 <div class="page-title parallax parallax1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">Majalah</h1>
                            <div class="breadcrumbs">
                                <ul>
                                    <li>You are here:</li>
                                    <li><a href="index.html">Home</a></li>
                                    <li>Majalah</li>
                                </ul>
                            </div>
                        </div><!-- /.page-title-captions -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-title -->

        <div class="main-content blog style">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="content-wrap">
                            <div class="main-content-wrap">
                                @foreach ($majalah as $m)
                                    <article class="post">
                                        <div class="feature-post blog-slider">
                                            <div class="flexslider">
                                                <ul class="slides">
                                                    <li>
                                                        <img src="{{ asset('uploads/'. $m->foto)}}" alt="image">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- /.feature-post -->

                                        <div class="header-post">
                                            <p class="time-post">{{ $m->created_at->format('M, d Y') }}</p>
                                            <h2 class="title-post"><a href="{{ route('majalah.detail', $m->slug) }}">{{ $m->judul }}</a></h2>
                                        </div><!-- /.header-post -->

                                        <div class="content-post">
                                            <p>
                                                <?= str_limit($m->deskripsi, 250) ?>
                                            </p>
                                            <div class="readmore">
                                                <a href="{{ route('majalah.detail', $m->slug) }}">Lanjutkan Membaca</a>
                                            </div>

                                            <div class="meta-post">
                                                <span>By</span>
                                                <span><a href="#">{{ $m->admin->name }}</a></span>
                                                {{-- <span class="comments-link"><a href="#">0</a></span> --}}
                                            </div>

                                        </div><!-- /.content-post -->
                                    </article><!-- /.post -->
                                @endforeach
                            </div><!-- /.main-content-wrap -->
                            {{ $majalah->links() }}
                        </div><!-- /.content-wrap -->
                    </div><!-- /.col-md-9 -->


                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.main-content -->

        @endsection
