<?php
Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    /**
     * Admin Auth Route(s)
     */
    Route::namespace('Auth')->group(function(){
        Route::get('/','LoginController@showLoginForm');
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Register Routes
        // Route::get('/register','RegisterController@showRegistrationForm')->name('register');
        // Route::post('/register','RegisterController@register');

        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

        // Email Verification Route(s)
        Route::get('email/verify','VerificationController@show')->name('verification.notice');
        Route::get('email/verify/{id}','VerificationController@verify')->name('verification.verify');
        Route::get('email/resend','VerificationController@resend')->name('verification.resend');
    });

    Route::get('/beranda','HomeController@index')->name('beranda')->middleware('guard.verified:admin,admin.verification.notice');

    Route::group(['prefix' => 'tanya-jawab'], function(){
        Route::get('/pertanyaan', 'QAController@pertanyaan')->name('QA.pertanyaan');
        Route::get('/dijawab', 'QAController@dijawab')->name('QA.dijawab');
        Route::get('/jawab/{id}', 'QAController@jawab')->name('QA.jawab');
        Route::get('/jawab/edit/{id}', 'QAController@edit')->name('QA.edit');
        Route::post('/simpan','QAController@simpan')->name('QA.simpan');
        Route::post('/update','QAController@update')->name('QA.update');
        // Route::match(['get', 'post'], '/jawab', 'QAController@jawab')->name('QA.jawab');

        Route::group(['prefix' => 'kategori'], function(){
            Route::get('/', 'QACategoryController@index')->name('QA.kategori');
            Route::post('/simpan','QACategoryController@simpan')->name('QA.kategori_simpan');
            Route::get('/edit/{id}','QACategoryController@edit')->name('QA.kategori_edit');
            Route::post('/update','QACategoryController@update')->name('QA.kategori_update');
            Route::get('/hapus/{id}','QACategoryController@hapus')->name('QA.kategori_hapus');
        });
    });

    Route::group(['prefix' => 'berita'], function(){
        Route::get('/article', 'BeritaController@index')->name('berita');
        Route::get('/tambah', 'BeritaController@tambah')->name('berita.tambah');
        Route::post('/simpan','BeritaController@simpan')->name('berita.simpan');
        Route::get('/berita/{id}', 'BeritaController@edit')->name('berita.edit');
        Route::post('/update','BeritaController@update')->name('berita.update');
        Route::get('/hapus/{id}','BeritaController@hapus')->name('berita.hapus');
        Route::get('/check_slug','BeritaController@check_slug')->name('berita.check_slug');

        Route::group(['prefix' => 'komentar'], function(){
            Route::get('{slug}', 'BeritaController@komentar')->name('berita.komentar');
            Route::get('/edit/{id}','BeritaController@komenedit')->name('berita.komentar.edit');
            Route::get('/hapus/{id}','BeritaController@komenhapus')->name('berita.komentar.hapus');
            Route::post('/update', 'BeritaController@komenupdate')->name('berita.komentar.update');
        });
        Route::group(['prefix' => 'bkategori'], function(){
            Route::get('/', 'BCategoryController@index')->name('berita.bkategori');
            Route::post('/simpan','BCategoryController@simpan')->name('berita.bkategori_simpan');
            Route::get('/edit/{id}','BCategoryController@edit')->name('berita.bkategori_edit');
            Route::post('/update','BCategoryController@update')->name('berita.bkategori_update');
            Route::get('/hapus/{id}','BCategoryController@hapus')->name('berita.bkategori_hapus');
        });
    });

    Route::group(['prefix' => 'galeri'], function(){
        Route::get('/', 'GaleriController@index')->name('galeri');
        Route::post('/simpan','GaleriController@simpan')->name('galeri.simpan');
        Route::get('/edit/{id}','GaleriController@edit')->name('galeri.edit');
        Route::post('/update','GaleriController@update')->name('galeri.update');
        Route::get('/hapus/{id}','GaleriController@hapus')->name('galeri.hapus');
        Route::get('/check_slug','GaleriController@check_slug')->name('galeri.check_slug');

        Route::group(['prefix' => 'foto'], function(){
            Route::get('/{id}', 'GaleriFotoController@index')->name('galeri.foto');
            // Route::get('/{id}/tambah', 'GaleriFotoController@tambah')->name('galeri.foto_tambah');
            // Route::post('/simpan','GaleriFotoController@simpan')->name('galeri.foto_simpan');
            // Route::get('/edit/{id}','GaleriFotoController@edit')->name('galeri.foto_edit');
            // Route::post('/update','GaleriFotoController@update')->name('galeri.foto_update');
            // Route::get('/hapus/{id}','GaleriFotoController@hapus')->name('galeri.foto_hapus');
            Route::post('/tambah','GaleriFotoController@file_upload')->name('galeri.foto_tambah');
            Route::post('/hapus','GaleriFotoController@hapus_file')->name('galeri.foto_hapus');
        });
    });

    Route::group(['prefix' => 'majalah'], function(){
        Route::get('/', 'MajalahController@index')->name('majalah');
        Route::post('/simpan','MajalahController@simpan')->name('majalah.simpan');
        Route::get('/edit/{id}','MajalahController@edit')->name('majalah.edit');
        Route::post('/update','MajalahController@update')->name('majalah.update');
        Route::get('/hapus/{id}','MajalahController@hapus')->name('majalah.hapus');
        Route::get('/check_slug','MajalahController@check_slug')->name('majalah.check_slug');
    });

    Route::group(['prefix' => 'infografis'], function(){
        Route::get('/', 'InfografisController@index')->name('infografis');
        Route::post('/simpan','InfografisController@simpan')->name('infografis.simpan');
        Route::get('/edit/{id}','InfografisController@edit')->name('infografis.edit');
        Route::post('/update','InfografisController@update')->name('infografis.update');
        Route::get('/hapus/{id}','InfografisController@hapus')->name('infografis.hapus');
        Route::get('/check_slug','InfografisController@check_slug')->name('infografis.check_slug');
    });


    Route::group(['prefix' => 'video'], function(){
        Route::get('/', 'VideoController@index')->name('video');
        Route::post('/simpan','VideoController@simpan')->name('video.simpan');
        Route::get('/edit/{id}','VideoController@edit')->name('video.edit');
        Route::post('/update','VideoController@update')->name('video.update');
        Route::get('/hapus/{id}','VideoController@hapus')->name('video.hapus');
    });

    Route::group(['prefix' => 'event'], function(){
        Route::get('/', 'EventController@index')->name('event');
        Route::get('/tambah', 'EventController@tambah')->name('event.tambah');
        Route::post('/simpan','EventController@simpan')->name('event.simpan');
        Route::get('/edit/{id}','EventController@edit')->name('event.edit');
        Route::post('/update','EventController@update')->name('event.update');
        Route::get('/hapus/{id}','EventController@hapus')->name('event.hapus');
        Route::get('/check_slug','EventController@check_slug')->name('event.check_slug');
    });

    Route::group(['prefix' => 'slider'], function(){
        Route::get('/', 'SliderController@index')->name('slider');
        Route::post('/simpan','SliderController@simpan')->name('slider.simpan');
        Route::get('/edit/{id}','SliderController@edit')->name('slider.edit');
        Route::post('/update','SliderController@update')->name('slider.update');
        Route::get('/hapus/{id}','SliderController@hapus')->name('slider.hapus');
    });

    Route::group(['prefix' => 'member'], function () {
        Route::get('/','PenggunaController@index')->name('member');
        Route::post('/simpan','PenggunaController@simpan')->name('member.simpan');
        Route::get('/edit/{id}','PenggunaController@edit')->name('member.edit');
        Route::post('/update','PenggunaController@update')->name('member.update');
        Route::get('/hapus/{id}','PenggunaController@hapus')->name('member.hapus');
    });

    Route::group(['prefix' => 'pengguna'], function () {
        Route::get('/','AdminController@index')->name('pengguna');
        Route::get('/tambah','AdminController@tambah')->name('pengguna.tambah');
        Route::post('/simpan','AdminController@simpan')->name('pengguna.simpan');
        Route::get('/edit/{id}','AdminController@edit')->name('pengguna.edit');
        Route::post('/update','AdminController@update')->name('pengguna.update');
        Route::get('/hapus/{id}','AdminController@hapus')->name('pengguna.hapus');
    });

    Route::group(['prefix' => 'fraksi'], function () {
        Route::get('/','FraksiController@index')->name('fraksi');
        Route::get('/tambah','FraksiController@tambah')->name('fraksi.tambah');
        Route::post('/simpan','FraksiController@simpan')->name('fraksi.simpan');
        Route::get('/edit/{id}','FraksiController@edit')->name('fraksi.edit');
        Route::post('/update','FraksiController@update')->name('fraksi.update');
        Route::get('/hapus/{id}','FraksiController@hapus')->name('fraksi.hapus');
    });

    Route::group(['prefix' => 'pengaturan'], function () {
        Route::get('/','PengaturanController@umum')->name('pengaturan');
        Route::match(['get', 'post'], '/umum', 'PengaturanController@umum')->name('pengaturan.umum');
    });

});

