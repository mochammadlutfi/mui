<div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="flat-address">
                            <ul>
                                <li class="address">22 Sekeloa Utara </li>
                            </ul>
                        </div><!-- /.flat-address -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <div class="top-navigator">
                            <ul>
                                <li><a href="{{route('redaksi')}}">Redaksi</a></li>
                                <li ><a href="{{route('agenda')}}">Agenda</a></li>
                                <li><a href="{{route('kontak')}}">Contact</a></li>
                                @if(Auth::guard('web')->check())
                                    <li><a href="{{ route('profile') }}">{{ auth()->user()->name }}</a></li>
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            onclick="event.preventDefault();
                                            document.querySelector('#logout-form').submit();">
                                            Keluar
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @else
                                <li><a href="{{ route('login') }}">Login/Daftar</a></li>
                                @endif
                            </ul>
                        </div><!-- /.top-navigator -->
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.top -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        <!-- </div>  -->

        <!-- Header -->
        <header id="header" class="header clearfix">
            <div class="header-wrap clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="nav-wrap">
                                <div class="btn-menu">
                                    <span></span>
                                </div><!-- /mobile menu button -->
                                <nav id="mainnav" class="mainnav">
                                    <ul class="menu">
                                        <!-- <li class="home">
                                            <a href="{{route('home')}}">Home</a>
                                        </li> -->
                                        <li>
                                        <div >
                                            <a href="{{route('home')}}" rel="home">
                                                <img src="{{ asset('assets/frontend/images/logo.png')}}" alt="image" width="50" height="50">
                                            </a>
                                        </div>
                                        </li>
                                        <li><a href="{{route('home')}}">Home</a></li>
                                        <li class="has-mega-menu has-children"><a href="#">Profile</a>
                                            <div class="sub-menu mega-menu two-columns">
                                               <div class="menu-item">
                                                    <a href="#">Profile</a>
                                                    <ul>
                                                        <li><a href="{{route('sejarah')}}">Sejarah</a></li>
                                                        <li><a href="{{route('kepengurusan')}}">Kepengurusan MUI</a></li>
                                                    </ul>
                                                </div>
                                                <div class="menu-item">
                                                    <a href="#">Lembaga</a>
                                                    <ul>
                                                        <li><a href="{{route('lembaga')}}">LPBKI</a></li>
                                                        <li><a href="https://mui-lplhsda.org/">LPLH & SDA</a></li>
                                                        <li><a href="https://dsnmui.or.id/">Dewan Syariah Nasional</a></li>
                                                        <li><a href="http://www.halalmui.org/mui14/">LPPOM MUI</a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- /.mega-menu -->
                                        </li>
                                        <li class="has-mega-menu has-children "><a href="#">Program</a>
                                            <div class="sub-menu mega-menu two-columns">
                                                <div class="menu-item ">
                                                    <a href="#">Komisi & Program </a>
                                                    <ul>
                                                        <li><a href="{{route('komisi_fatwa')}}">Fatwa</a></li>
                                                        <li><a href="{{route('komisi_informasi')}}">Komunikasi & Informasi</a></li>
                                                        <li><a href="{{route('komisi_hukum')}}">Hukum & Perundang-undangan</a></li>
                                                        <li><a href="{{route('komisi_dakwah')}}">Dakwah & Pengembangan Masyarakat</a></li>
                                                        <li><a href="{{route('komisi_pendidikan')}}">Pendidikan & Kaderisasi</a></li>
                                                        <li><a href="{{route('komisi_pengkajian')}}">Pengkajian & Penelitian</a></li>
                                                    </ul>
                                                </div>
                                                <div class="menu-item ">
                                                    <a href="#"></a>
                                                    <ul>
                                                    <li><a href="{{route('komisi_perempuan')}}">Perempuan,Remaja & Keluarga</a></li>
                                                        <li><a href="{{route('komisi_ukhuwah')}}">Ukhuwah Islamiyah </a></li>
                                                        <li><a href="{{route('komisi_kerukunan')}}">Kerukunan Antar Umat Beragama</a></li>
                                                        <li><a href="{{route('komisi_pembinaan')}}">Pembinaan Seni Budaya Islam</a></li>
                                                        <li><a href="{{route('komisi_pemberdayaan')}}">Pemberdayaan Ekonomi Umat</a></li>
                                                        <li><a href="{{route('komisi_luar_negeri')}}">Luar Negeri & Hubungan International</a></li>
                                                        <li><a href="{{route('komisi_prasarana')}}">Sarana Dan Prasarana</a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- /.mega-menu -->
                                        <li>
                                        <li><a href="{{route('berita')}}">Berita</a></li>
                                        <li class="has-mega-menu has-children "><a href="#">Produk</a>
                                            <div class="sub-menu mega-menu">
                                                <div class="menu-item">
                                                    <ul>
                                                        <li><a href="http://css.islamwasathiyah.com/fatwa.php">Fatwa</a></li>
                                                        <li><a href="{{route('majalah')}}">Majalah </a></li>
                                                        <li><a href="{{route('infografis')}}"> Infografis</a></li>
                                                        <li><a href="{{ route('video') }}">TV MUI</a></li>
                                                    </ul>
                                                </div>
                                            </div><!-- /.mega-menu -->
                                        <li>
                                        <a href="{{ route('konsultasi') }}">Konsultasi</a></li>
                                    </ul><!-- /.menu -->

                                    <div class="social-links">
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    </div>
                                </nav><!-- /.mainnav -->
                            </div><!-- /.nav-wrap -->
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.header-wrap -->
        </header><!-- /.header -->
