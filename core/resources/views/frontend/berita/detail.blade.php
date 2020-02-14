@extends('frontend.layouts.master')
@section('content')
<body class="header-sticky">
    <section class="loading-overlay">
        <div class="Loading-Page">
            <h2 class="loader">Loading...</h2>
        </div>
    </section>

    <!-- Boxed -->
    <div class="boxed">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="flat-address">
                            <ul>
                                <li class="address">66 Nicholson St Buffalo New York Us</li>
                            </ul>
                        </div><!-- /.flat-address -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <div class="top-navigator">
                            <ul>
                                <li><a href="#">About</a></li>
                                <li class="service"><a href="#">Services</a>
                                    <ul>
                                        <li><a href="services-architectural-planning.html">Architectural Planning</a></li>
                                        <li><a href="services-decoration-furniture.html">Decoration &amp; Furniture</a></li>
                                        <li><a href="services-interior-design.html">Interior Design</a></li>
                                        <li><a href="services-landscape-design.html">Landscape Design</a></li>
                                        <li><a href="services-sustainable-design.html">Sustainable Design</a></li>
                                        <li><a href="services-urban-design.html">Urban Design</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div><!-- /.top-navigator -->
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.top -->


        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">{{ $berita->judul }}</h1>
                            <div class="breadcrumbs">
                                <ul>
                                    <li>You are here:</li>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('berita') }}">Berita</a></li>
                                    <li>{{ $berita->judul }}</li>
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
                                    <div class="feature-post blog-slider">
                                        <img src="{{ asset('uploads/'. $berita->foto)}}" alt="image">
                                    </div><!-- /.feature-post -->

                                    <div class="header-post">
                                        <p class="time-post">{{ $berita->created_at->format('M, d Y') }}</p>
                                    </div><!-- /.header-post -->

                                    <div class="content-post">
                                        <?= $berita->deskripsi; ?>
                                    </div><!-- /.content-post -->
                                </article><!-- /.post -->
                            </div><!-- /.main-content-wrap -->

                            <nav class="navigation post-navigation">
                                <ul class="nav-links">
                                    @if($sebelum <> null)
                                    <li class="previous-post">
                                        <a href="{{ route('berita.detail', $sebelum->slug) }}">
                                            <span class="meta-nav">Berita Terdahulu</a>
                                    </li>
                                    @else
                                    <li class="previous-post" style="visibility:hidden">
                                        <a href="">
                                            <span class="meta-nav">Berita Terdahulu</a>
                                    </li>
                                    @endif
                                    @if($sesudah <> null)
                                    <li class="next-post">
                                        <a href="{{ route('berita.detail', $sesudah->slug) }}">
                                            <span class="meta-nav">Berita Terbaru</span>
                                        </a>
                                    </li>
                                    @endif
                                </ul><!-- /.nav-links -->
                            </nav>

                            <div class="comments-area">
                            <div class="comment-respond">
                                <h3 class="comment-reply-title">Tinggalkan Komentar</h3>
                                @if(Auth::guard('web')->check())
                                    <form id="form-event">
                                        @csrf
                                            <input type="hidden" name="berita_id" value="{{ $berita->id }}">
                                            <p class="comment-form-comment">
                                            <label>Komentar</label>
                                            <textarea id="field-description" name="description" name="description"></textarea>
                                            <div class="invalid-feedback" id="error-description" style="color:red"></div>
                                        </p>
                                        <p class="form-submit">
                                            <input name="submit" type="submit" id="submit" class="submit" value="Post Comment">
                                        </p>
                                    </form>
                                @else
                                <p class="comment-notes" style="color:red"><span>*Anda harus login sebelum berkomentar</span></p>
                                @endif
                            </div><!-- /.comment-respond -->
                        </div><!-- /.comments-area -->
                        </div><!-- /.content-wrap -->
                        <article class="post">
                            @foreach ($komentar as $p)
                                <div class="feature-post col-md-1">
                                    @if($p->user->avatar <> null)
                                        <img width="30px" height="30px" src="{{ asset('uploads/'. $p->user->avatar) }}" alt="image">
                                    @else
                                        <img width="30px" height="30px" src="{{ Avatar::create($p->user->name)->toBase64() }}" alt="image">
                                    @endif
                                </div>
                                <div class="col-md-11">
                                <div class="header-post ">
                                    <div class="meta-post">
                                        <span>Oleh: </span>
                                        <span><a href="#">{{ $p->user->name }}</a></span>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                <div class="content-post" style="word-wrap: break-word;">
                                    <p>
                                        {{ $p->description }}
                                    </p>
                                    <p class="time-post col-8">{{ $p->created_at->format('M, d Y') }}</p>
                                </div><!-- /.content-post -->
                                </div>
                                </div>
                            @endforeach
                        </article><!-- /.post -->
                    </div><!-- /.col-md-9 -->

                    <div class="col-md-3">
                        <div class="sidebars">
                            <div class="sidebars-wrap">
                                <div class="sidebar">
                                    <div class="widget widget_search">
                                        <form class="search-form">
                                            <input type="search" class="search-field" placeholder="Search …">
                                            <input type="submit" class="search-submit">
                                        </form>
                                    </div><!-- /.widget_search -->

                                    <div class="widget widget_categories">
                                        <h3 class="widget-title">Kategori Berita</h3>
                                        <ul>
                                            @foreach ($kategori as $k)
                                                <li class="cat-item"><a href="#">{{ $k->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div><!-- /.widget_categories -->

                                    <div class="widget widget_recent_entries">
                                        <h3 class="widget-title">Recent Posts</h3>
                                        <ul>
                                            @foreach ($recent_berita as $r)
                                                <li>
                                                    <a href="{{ route('berita.detail', $r->slug) }}">
                                                        {{ $r->slug }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div><!-- /.widget_recent_entries -->

                                    <div class="widget widget_tag_cloud">
                                        <h3 class="widget-title">Tags</h3>
                                        <div class="tagcloud">
                                            <a href="#">Building</a>
                                            <a href="#">Cover</a>
                                            <a href="#">Decor</a>
                                            <a href="#">Interior</a>
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
@push('scripts')
<script src="{{ asset('assets/backend/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/laroute.js') }}"></script>
<script src="{{ mix('/assets/backend/js/laravel.app.js') }}"></script>
<script>
    $("#form-event").submit(function (e) {
        e.preventDefault();
        var formData = new FormData($('#form-event')[0]);

        $.ajax({
            url: "{{ route('komentar.simpan') }}",
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.is-invalid').removeClass('is-invalid');
                if (response.fail == false) {
                    $('#modal_embed').modal('hide');
                    swal({
                        title: "Berhasil",
                        text: "Foto Berhasil Di Upload",
                        timer: 3000,
                        buttons: false,
                        icon: 'success'
                    });
                    window.setTimeout(function () {
                        location.reload();
                    }, 1500);
                } else {
                    for (control in response.errors) {
                        $('#field-' + control).addClass('is-invalid');
                        $('#error-' + control).html(response.errors[control]);
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                $('#btnSimpan').text('Simpan');
                $('#btnSimpan').attr('disabled', false);
            }
        });
    });
</script>

@endpush
