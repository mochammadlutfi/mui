@extends('frontend.layouts.master')
@section('content')
<!-- Slider -->
<div class="tp-banner-container">
    <div class="tp-banner ">
        <ul>
            @foreach ($slider as $s)
            <li data-transition="random-static" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                <img src="{{ asset('uploads/' . $s->path)}}" alt="slider-image" />
            </li>
            @endforeach
        </ul>
    </div>
</div>

<!-- Flat imagebox -->
<section class="flat-row flat-imagebox pad-bottom20px">
    <div class="container">
        <div class="row">
            <div class="item">
                <div class="box-services">
                    <div class="box-services-wrap">
                        <h2 class="title-box-services"><strong>Berita</strong></h2>
                        <p>Baca lebih banyak berita mengenai Majelis Ulama Indonesia Kabupaten Bandung Barat</p>
                        <div class="flat-button">
                            <a href="{{ route('berita') }}">Lihat Semua Berita</a>
                        </div>
                    </div>
                </div>
            </div><!-- /.item -->
            @foreach ($berita as $b)
            <div class="item">
                <div class="imagebox">
                    <div class="box-wrap">
                        <div class="box-image">
                            <div class="box-header">
                                <h4 class="box-title"><a href="{{route('berita.detail', $b->slug)}}">{{ $b->judul }}</a>
                                </h4>
                            </div>
                            <a href="{{ route('berita.detail', $b->slug) }}"><img src="{{ asset('uploads/'. $b->foto)}}" alt="images"></a>
                        </div>
                        <div class="box-content">
                            <p class="box-desc">
                                <?= str_limit($b->deskripsi, 150); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div><!-- /.item -->
            @endforeach
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

<!-- Flat projects portfolio -->
<section class="flat-row">
    <div class="container">
        <div class="row">
            <div class="flat-projects-portfolio style2">
                <ul class="portfolio-filter">
                    <li class="active"><a data-filter="*" href="#">Infografis Fatwa MUI</a></l>
                        <!-- <li><a data-filter=".decoration" href="#">Pojok MUI</a></li> -->
                </ul><!-- /.project-filter -->
                <div class="projects-portfolio">
                    <div class="projects-portfolio-wrap style1">
                        @foreach ($infografis as $ff)
                        <div class="item houses">
                            <div class="portfolio-img">
                                <a href="gallery-list.html"><img src="{{ asset('uploads/'. $ff->foto)}}"
                                        alt="image"></a>
                                <div class="flat-button style1">
                                    <a href="{{ route('infografis.detail', $ff->slug) }}">Lihat Infografis</a>
                                </div>
                                <div class="overlay"></div>
                                <div class="portfolio-content">
                                    <h5 class="portfolio-title"><a
                                            href="{{ route('infografis.detail', $ff->slug) }}">{{ $ff->judul }}</a></h5>
                                    <ul class="portfolio-categories">
                                        <li><a href="#">{{ $ff->created_at->format('M, d Y') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- /.item -->
                        @endforeach

                    </div><!-- /.projects-portfolio-wrap -->
                </div><!-- /.projects-portfolio -->
            </div><!-- /.flat-projects-portfolio -->
            <div class="flat-button col-md-12">
                <a href="{{ route('infografis') }}">Lihat Semua Infografis</a>
            </div>
        </div><!-- /.row -->

        <div class="flat-divider flat-border d50px"></div>
    </div><!-- /.container -->
</section>

<section class="flat-row" style="background-color: #f2f2f2;">
    <div class="container">
        <div class="row">
            <div class="flat-tabs">
                <ul class="menu-tab">
                    <li class="active"><a href="#"><i class="fa fa-newspaper-o"></i><br><span>Pojok MUI</span></a></li>
                    <li><a href="#"><i class="fa fa-qrcode"></i><br><span>Artikel Halal</span></a></li>
                    <li><a href="#"><i class="fa fa-bar-chart"></i><br><span>Ekonomi Syariah</span></a></li>
                </ul><!-- /.menu-tab -->
                <div class="content-tab">

                    <div class="content-inner">
                        <div class="main-content blog-grid">
                            <div class="content-wrap">
                                <div class="main-content-wrap">
                                    @foreach ($pojok as $po)
                                    <div class="item">
                                        <article class="post">
                                            <div class="feature-post">
                                                <a href="{{ route('berita.detail', $po->slug) }}"><img
                                                        src="{{ asset('uploads/'. $po->foto)}}" alt="image"></a>
                                            </div><!-- /.feature-post -->
                                            <div class="header-post">
                                                <h4 class="title-post"><a
                                                        href="{{ route('berita.detail', $po->slug) }}">{{ $po->judul }}</a>
                                                </h4>
                                                <p class="time-post">{{ $po->created_at->format('M, d Y') }}</p>
                                            </div><!-- /.header-post -->
                                            <div class="content-post">
                                                <?= str_limit($po->deskripsi, 150) ?>
                                                <div class="readmore">
                                                    <a href="{{ route('berita.detail', $po->slug) }}">Read more</a>
                                                </div>
                                            </div><!-- /.content-post -->
                                        </article>
                                    </div><!-- /.item -->
                                    @endforeach
                                </div><!-- /.main-content-wrap -->
                            </div><!-- /.content-wrap -->
                        </div><!-- /.blog-grid -->
                    </div><!-- /.content-inner -->

                    <div class="content-inner">
                        <div class="main-content blog-grid">
                            <div class="content-wrap">
                                <div class="main-content-wrap">
                                    @foreach ($eko as $ek)
                                    <div class="item">
                                        <article class="post">
                                            <div class="feature-post">
                                                <a href="{{ route('berita.detail', $ek->slug) }}"><img
                                                        src="{{ asset('uploads/'. $ek    ->foto)}}" alt="image"></a>
                                            </div><!-- /.feature-post -->
                                            <div class="header-post">
                                                <h4 class="title-post"><a
                                                        href="{{ route('berita.detail', $ek->slug) }}">{{ $ek->judul }}</a>
                                                </h4>
                                                <p class="time-post">{{ $ek->created_at->format('M, d Y') }}</p>
                                            </div><!-- /.header-post -->
                                            <div class="content-post">
                                                <?= str_limit($ek->deskripsi, 150) ?>
                                                <div class="readmore">
                                                    <a href="{{ route('berita.detail', $ek->slug) }}">Read more</a>
                                                </div>
                                            </div><!-- /.content-post -->
                                        </article>
                                    </div><!-- /.item -->
                                    @endforeach
                                </div><!-- /.main-content-wrap -->
                            </div><!-- /.content-wrap -->
                        </div><!-- /.blog-grid -->
                    </div><!-- /.content-inner -->

                    <div class="content-inner">
                        <div class="main-content blog-grid">
                            <div class="content-wrap">
                                <div class="main-content-wrap">
                                    @foreach ($art as $ar)
                                    <div class="item">
                                        <article class="post">
                                            <div class="feature-post">
                                                <a href="{{ route('berita.detail', $ar->slug) }}"><img
                                                        src="{{ asset('uploads/'. $ar->foto)}}" alt="image"></a>
                                            </div><!-- /.feature-post -->
                                            <div class="header-post">
                                                <h4 class="title-post"><a
                                                        href="{{ route('berita.detail', $ar->slug) }}">{{ $ar->judul }}</a>
                                                </h4>
                                                <p class="time-post">{{ $ar->created_at->format('M, d Y') }}</p>
                                            </div><!-- /.header-post -->
                                            <div class="content-post">
                                                <?= str_limit($ar->deskripsi, 150) ?>
                                                <div class="readmore">
                                                    <a href="{{ route('berita.detail', $ar->slug) }}">Read more</a>
                                                </div>
                                            </div><!-- /.content-post -->
                                        </article>
                                    </div><!-- /.item -->
                                    @endforeach
                                </div><!-- /.main-content-wrap -->
                            </div><!-- /.content-wrap -->
                        </div><!-- /.blog-grid -->
                    </div><!-- /.content-inner -->
                </div><!-- /.content-tab -->
            </div><!-- /.flat-tabs -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

<section class="flat-row pad-top1px pad-bottom0px">
    <div class="container">
        <div class="col-md-8">
            <H3>TV MUI</H3>
        </div>
    </div>
    <!-- Flat clients -->
    <section class="flat-row pad-top1px pad-bottom1px">
        <div class="container">
            <div class="row">
                @foreach ($video as $vv)
                <?php
                            $re = '/(?im)\b(?:https?:\/\/)?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)\/(?:(?:\??v=?i?=?\/?)|watch\?vi?=|watch\?.*?&v=|embed\/|)([A-Z0-9_-]{11})\S*(?=\s|$)/';
                            preg_match_all($re, $vv->url, $matches, PREG_SET_ORDER, 0);
                        ?>
                <div class="col-md-4">
                    <img class="js-modal-video" data-video-id="<?= $matches[0][1] ?>"
                        src=<?= "https://img.youtube.com/vi/". $matches[0][1] ."/hqdefault.jpg"?> alt="">

                </div><!-- /.col-md-3 -->
                @endforeach
            </div><!-- /.row -->
            <!-- <button class="js-modal-btn" data-video-id="202177974">Open Vimeo</button> -->
        </div><!-- /.container -->
    </section>

    @endsection
    @push('scripts')
    <script>
        $(document).ready(function () {
            console.log("ok");
            new ModalVideo('.js-modal-video');
        });
    </script>

    @endpush
