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
                            <h1 class="title">MUI TV</h1>
                            <div class="breadcrumbs">
                                <ul>
                                    <li>You are here:</li>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li>MUI TV</li>
                                </ul>
                            </div>
                        </div><!-- /.page-title-captions -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-title -->

        <section class="flat-row pad-top1px pad-bottom1px">
            <div class="container">
                <div class="row">
                    @foreach ($video as $vv)
                        <?php
                            $re = '/(?im)\b(?:https?:\/\/)?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)\/(?:(?:\??v=?i?=?\/?)|watch\?vi?=|watch\?.*?&v=|embed\/|)([A-Z0-9_-]{11})\S*(?=\s|$)/';
                            preg_match_all($re, $vv->url, $matches, PREG_SET_ORDER, 0);
                        ?>
                        <div class="col-md-4">
                            <img class="js-modal-video" data-video-id="<?= $matches[0][1] ?>" src=<?= "https://img.youtube.com/vi/". $matches[0][1] ."/hqdefault.jpg"?> alt="">
                        </div><!-- /.col-md-3 -->
                    @endforeach
                </div><!-- /.row -->
                <!-- <button class="js-modal-btn" data-video-id="202177974">Open Vimeo</button> -->
            </div><!-- /.container -->
        </section>
        <!-- Go Top -->
        <a class="go-top">
            <i class="fa fa-chevron-up"></i>
        </a>

    </div>
    @endsection
    @push('scripts')
    <script>
        $(document).ready(function() {
            console.log( "ok" );
            new ModalVideo('.js-modal-video');
        });

    </script>

    @endpush
