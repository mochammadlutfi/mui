<ul class="nav-main">
    <li>
        <a class="{{ Request::is('admin/beranda') ? 'active' : null }}" href="{{ route('admin.beranda') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Beranda</span></a>
    </li>
    <li>
        <a class="{{ Request::is('admin/member') ? 'active' : null }}" href="{{ route('admin.member') }}"><i class="si si-people"></i><span class="sidebar-mini-hide">Pengguna</span></a>
    </li>
    <li>
        <a class="{{ Request::is('admin/slider', 'admin/slider/*') ? 'active' : null }}" href="{{ route('admin.slider') }}"><i class="si si-picture"></i><span class="sidebar-mini-hide">Slider</span></a>
    </li>
    <li class="{{ Request::is('admin/berita/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
            <i class="si si-flag"></i>
            <span class="sidebar-mini-hide">Berita</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/berita/article') ? 'active' : null}}"
                    href="{{ route('admin.berita') }}">Kelola Berita</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/berita/bkategori') ? 'active' : null}}"
                    href="{{ route('admin.berita.bkategori') }}">Kategori</a>
            </li>
        </ul>
    </li>
    <li class="{{ Request::is('admin/tanya-jawab/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
            <i class="si si-bubbles"></i>
            <span class="sidebar-mini-hide">Tanya Jawab</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/tanya-jawab/pertanyaan') ? 'active' : null}}"
                    href="{{ route('admin.QA.pertanyaan') }}">Kelola Pertanyaan</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/tanya-jawab/kategori') ? 'active' : null}}"
                    href="{{ route('admin.QA.kategori') }}">Kategori</a>
            </li>
        </ul>
    </li>


    <li class="{{ Request::is('admin/majalah', 'admin/majalah/*', 'admin/video', 'admin/video/*', 'admin/infografis', 'admin/infografis/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
            <i class="si si-film"></i>
            <span class="sidebar-mini-hide">Produk</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/majalah', 'admin/majalah/*') ? 'active' : null }}"
                    href="{{ route('admin.majalah') }}">Majalah</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/infografis', 'admin/infografis/*') ? 'active' : null}}"
                    href="{{ route('admin.infografis') }}">Infografis</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/video', 'admin/video/*') ? 'active' : null}}"
                    href="{{ route('admin.video') }}">Video</a>
            </li>
        </ul>
    </li>

    <li>
        <a class="{{ Request::is('') ? 'active' : null }}" href="{{ route('admin.pengguna') }}">
            <i class="fa fa-user-secret"></i><span class="sidebar-mini-hide">Admin</span>
        </a>
    </li>
    <li class="{{ Request::is('admin/pengaturan/*', 'admin/pengaturan') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
            <i class="si si-wrench"></i>
            <span class="sidebar-mini-hide">Pengaturan</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/pengaturan/umum') ? 'active' : null}}"
                    href="{{ route('admin.pengaturan.umum') }}">Umum</a>
            </li>
        </ul>
    </li>
</ul>
