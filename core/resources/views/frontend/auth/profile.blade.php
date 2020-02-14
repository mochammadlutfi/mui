<html>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/stylesheets/profile.css') }}">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile" style="padding-bottom: 200px;">
                <div class="row">
                    <div class="col-md-4">
                    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="profile-img">
                            @if(auth()->user()->avatar <> null)
                                    <img src="{{ asset('uploads/'.auth()->user()->avatar) }}" alt="logo" id="img_profile">
                                @else
                                    <img src="{{ asset('assets/img/placeholder.png') }}" alt="alt" id="img_profile">
                                @endif
                            <div class="file btn btn-md btn-primary">
                                Change Photo
                                <input type="file" id="avatar" name="avatar" />
                                @error('avatar')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            @if (session('status'))
                                <div class="alert alert-success mt-10" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                            <div class="form-group" >
                                <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" placeholder="Username" name="name" value="{{ auth()->user()->name }}">
                                @error('name')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" placeholder="Alamat Email" value="{{ auth()->user()->email }}">
                                @error('email')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" placeholder="Kata sandi" >
                                @error('password')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="Konfirmasi Kata sandi" >
                                @error('password_confirmation')
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-secondary">Ubah</button>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="col-md-2">
                        <a href="{{route('home')}}">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Home"/></a>
                    </div>
                    </div>
                </div>
        </div>

<script>
    jQuery(document).ready(function () {
        $("#avatar").change(function (event) {
            RecurFadeIn();
            readURL(this);
            console.log('asdasdasd');
        });
        $("#avatar").on('click', function (event) {
            RecurFadeIn();
        });

        function RecurFadeIn() {
            FadeInAlert("Wait for it...");
        }

        function FadeInAlert(text) {
            $(".alert").show();
            $(".alert").text(text).addClass("loading");
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var filename = $("#avatar").val();
                filename = filename.substring(filename.lastIndexOf('\\') + 1);
                reader.onload = function (e) {
                    // debugger;
                    $('#img_profile').attr('src', e.target.result);
                    $('#img_profile').hide();
                    $('#img_profile').fadeIn(500);
                    $('.custom-file-label').text(filename);
                }
                reader.readAsDataURL(input.files[0]);
            }
            $(".alert").removeClass("loading").hide();
        }
    });
</script>
