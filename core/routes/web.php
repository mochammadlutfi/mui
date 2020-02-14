<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Auth::routes([ 'verify' => true ]);

Route::namespace('User')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'berita'], function(){
        Route::get('/', 'BeritaController@berita')->name('berita');
        Route::get('/{slug}', 'BeritaController@detail')->name('berita.detail');

        Route::group(['prefix' => 'komentar'], function(){
            Route::post('/komentar', 'BeritaController@komentar')->middleware('auth','verified')->name('komentar.simpan');
        });
    });

    Route::group(['prefix' => 'video'], function(){
        Route::get('/', 'VideoController@index')->name('video');
        // Route::get('/{slug}', 'BeritaController@detail')->name('berita.detail');
    });

    Route::group(['prefix' => 'konsultasi'], function(){
        Route::get('/', 'KonsultasiController@index')->name('konsultasi');
        Route::get('/tanya', 'KonsultasiController@tambah')->middleware('auth','verified')->name('konsultasi.tambah');
        Route::post('/simpan', 'KonsultasiController@simpan')->middleware('auth','verified')->name('konsultasi.simpan');
        Route::get('/check_slug','KonsultasiController@check_slug')->middleware('auth','verified')->name('konsultasi.check_slug');
        Route::get('/{slug}', 'KonsultasiController@detail')->name('konsultasi.detail');
        Route::get('/k/{slug}', 'KonsultasiController@tambah')->name('konsultasi.kategori');

    });

    Route::group(['prefix' => 'komisi'], function(){
        Route::get('/komisi_fatwa', 'KomisiController@komisi_fatwa')->name('komisi_fatwa');
        Route::get('/komisi_informasi', 'KomisiController@komisi_informasi')->name('komisi_informasi');
        Route::get('/komisi_hukum', 'KomisiController@komisi_hukum')->name('komisi_hukum');
        Route::get('/komisi_dakwah', 'KomisiController@komisi_dakwah')->name('komisi_dakwah');
        Route::get('/komisi_pendidikan', 'KomisiController@komisi_pendidikan')->name('komisi_pendidikan');
        Route::get('/komisi_pengkajian', 'KomisiController@komisi_pengkajian')->name('komisi_pengkajian');
        Route::get('/komisi_perempuan', 'KomisiController@komisi_perempuan')->name('komisi_perempuan');
        Route::get('/komisi_ukhuwah', 'KomisiController@komisi_ukhuwah')->name('komisi_ukhuwah');
        Route::get('/komisi_kerukunan', 'KomisiController@komisi_kerukunan')->name('komisi_kerukunan');
        Route::get('/komisi_pembinaan', 'KomisiController@komisi_pembinaan')->name('komisi_pembinaan');
        Route::get('/komisi_pemberdayaan', 'KomisiController@komisi_pemberdayaan')->name('komisi_pemberdayaan');
        Route::get('/komisi_luar_negeri', 'KomisiController@komisi_luar_negeri')->name('komisi_luar_negeri');
        Route::get('/komisi_prasarana', 'KomisiController@komisi_prasarana')->name('komisi_prasarana');
    });

    Route::group(['prefix' => 'infografis'], function(){
        Route::get('/', 'InfografisController@index')->name('infografis');
        Route::get('/{slug}', 'InfografisController@detail')->name('infografis.detail');
    });

    Route::group(['prefix' => 'majalah'], function(){
        Route::get('/', 'MajalahController@index')->name('majalah');
        Route::get('/{slug}', 'MajalahController@detail')->name('majalah.detail');
    });


    Route::get('/sejarah', 'SejarahController@sejarah')->name('sejarah');
    Route::get('/kepengurusan', 'KepengurusanController@kepengurusan')->name('kepengurusan');

    Route::get('/redaksi', 'RedaksiController@redaksi')->name('redaksi');
    Route::get('/agenda', 'AgendaController@agenda')->name('agenda');
    Route::get('/kontak', 'KontakController@kontak')->name('kontak');


    Route::group(['prefix' => 'lembaga'], function(){
        Route::get('/', 'LembagaController@index')->name('lembaga');
        Route::get('/detail', 'LembagaController@detail')->name('lembaga.detail');
    });

});

// Route::namespace('User\Auth')->group(function(){

//     Route::get('/register', 'SignupController@register')->name('register');
//     Route::get('/login', 'LoginController@login')->name('login');
//     Route::get('/profile', 'ProfileController@profile')->name('profile');
//     });

    Route::namespace('Auth')->group(function(){
        //profile
        Route::get('/profile','ProfileController@index')->name('profile');
        Route::post('/profile/update', 'ProfileController@update')->name('profile.update');

        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Register Routes
        Route::get('/daftar','RegisterController@showRegistrationForm')->name('register');
        Route::post('/daftar','RegisterController@register');

        //Forgot Password Routes
        Route::get('/lupa','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/lupa/email','ForgotPasswordController@sendResetLinkEmail')->name('lupa.email');

        //Reset Password Routes
        Route::get('/lupa/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/lupa','ResetPasswordController@reset')->name('password.update');

        // Email Verification Route(s)
        Route::get('email/verify','VerificationController@show')->name('verification.notice');
        Route::get('email/verify/{id}','VerificationController@verify')->name('verification.verify');
        Route::get('email/resend','VerificationController@resend')->name('verification.resend');

    });
?>
