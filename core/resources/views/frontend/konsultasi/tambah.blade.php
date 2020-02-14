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
    <div class="quick-form">
    <h3>Silahkan Masukan Pertanyaan anda</h3>
        <form id="contactform" method="post" action="{{ route('konsultasi.simpan') }}">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <input type="text" id="field-slug" name="slug" readonly>
                    <div class="form-group">
                        <input name="judul" id="field-judul" type="text" value="{{ old('judul') }}" placeholder="Judul topik" >
                        @if ($errors->has('judul'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('judul') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <select class="control-select" name="kategori" id="field-kategori">
                            <option>Pilih Kategori</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="pertanyaan" id="field-pertanyaan" placeholder="Pertanyaan" ></textarea>
                        @if ($errors->has('pertanyaan'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('pertanyaan') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-submit">
                        <input name="submit" type="submit" id="submit" class="submit" value="Kirim Pertanyaan">
                    </div>


                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </form>
    </div><!-- /.quick -->
    @endsection
    @push('scripts')
    <script>
        jQuery(function ($) {

        $(document).on('keyup', '#field-judul', function() {
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^\w ]+/g, '');
                Text = Text.replace(/ +/g, '-');
                $("#field-slug").val(Text);
            });

            $('#field-judul').change(function(e) {
                console.log('ok');
                $.get("{{ route('konsultasi.check_slug') }}",
                  { 'judul': $(this).val() },
                  function( data ) {
                    $('#field-slug').val(data.slug);
                  }
                );
            });
        });



    </script>
    @endpush

