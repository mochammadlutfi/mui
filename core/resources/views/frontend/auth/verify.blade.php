@extends('frontend.layouts.master')
@section('content')
        <!-- Page title -->
        <div class="page-title">
        </div><!-- /.page-title -->
        <section class="flat-row about pad-top0px">
            <div class="container ">
                <div class="row col-md-12">
                    <div class="">
                        <div class="about-right">
                            @if (session('resent'))
                                <h5 style="text-align: center;">Tautan verifikasi baru telah dikirim ke alamat email Anda.</h5>
                            @endif
                            <h5 style="text-align: center;">Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi.</h5>
                            <h5 style="text-align: center;">Jika Anda tidak menerima email, Silahkan Verifikasi Email Anda dengan klik tombol dibawh ini</h5>

                            <div class="container-login100-form-btn" style="text-align: center;">
                                    <a href="{{ route($resendRoute) }}">
                                        <button class="btn btn-success">
                                            Verifikasi
                                        </button>
                                    </a>
                            </div>
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>
        @endsection
