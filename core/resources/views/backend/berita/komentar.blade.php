@extends('backend.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/backend/js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
@endsection

@section('content')
<div class="content">
    <nav class="breadcrumb bg-white push">
        <a class="breadcrumb-item" href="{{ route('admin.beranda') }}">Beranda</a>
        <a class="breadcrumb-item" href="{{ route('admin.berita') }}">Berita</a>
        <span class="breadcrumb-item active">Komentar</span>
    </nav>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Kelola Komentar</h3>
                </div>
                <div class="block-content">
                    <table class="table table-hover table-striped" id="list-album">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <!-- END Default Elements -->
        </div>
    </div>
</div>
<div class="modal" id="modal_form"tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout modal-lg" role="document">
        <div class="modal-content">
            <div class="block mb-0">
                <div class="block-header block-header-default">
                        <h3 class="block-title modal-title">Tambah Album Baru</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form id="form-album">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-user">User</label>
                                        <input type="text" class="form-control" id="User" name="User" placeholder="User" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label class="col-form-label" for="field-status">Status</label>
                                        <select class="form-control" name="status" id="field-status">
                                            <option value="">Pilih</option>
                                            <option value="1">Publikasi</option>
                                            <option value="0">Tidak Publikasi</option>
                                        </select>
                                        <div class="invalid-feedback" id="error-status">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12" for="description">Deksripsi</label>
                                    <div class="col-12">
                                        <textarea class="form-control" id="description" name="description" maxlength="115" data-always-show="true" data-placement="top" placeholder="Deskripsi" readonly></textarea>
                                        <div class="form-text text-muted font-size-sm text-right">Maksimal 115 Karakter</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-2">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-alt-primary btn-block"><i class="si si-check mr-1"></i>Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('assets/backend/js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
<script>
$(function () {
    $('#list-album').DataTable({
        processing: true,
        serverSide: true,
        ajax: "",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'user',
                name: 'user'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });
});

$('#field-nama').change(function(e) {
    $.get("{{ route('admin.galeri.check_slug') }}",
      { 'nama': $(this).val() },
      function( data ) {
        $('#field-slug').val(data.slug);
      }
    );
  });

jQuery(document).ready(function () {
    $("#field-foto").change(function (event) {
        RecurFadeIn();
        readURL(this);
    });
    $("#field-foto").on('click', function (event) {
        RecurFadeIn();
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#field-foto").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function (e) {
                // debugger;
                $('#img_preview').attr('src', e.target.result);
                $('#img_preview').hide();
                $('#img_preview').fadeIn(500);
                $('.custom-file-label').text(filename);
            }
            reader.readAsDataURL(input.files[0]);
        }
        $(".alert").removeClass("loading").hide();
    }

    function RecurFadeIn() {
        FadeInAlert("Wait for it...");
    }

    function FadeInAlert(text) {
        $(".alert").show();
        $(".alert").text(text).addClass("loading");
    }

    $(document).on('click', '#btn_tambah', function () {
        save_method = 'tambah';
        $('#form-album')[0].reset();
        $('#modal_title').text('Tambah Data Kategori');
        $('#modal_form').modal({
            backdrop: 'static',
            keyboard: false
        })
    });

    $(document).on('keyup', '#field-nama', function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^\w ]+/g, '');
        Text = Text.replace(/ +/g, '-');
        $("#field-slug").val(Text);
    });

    $('#seo_keyword').tagsInput({
        defaultText:'Masukan Keyword!',
        removeWithBackspace: true,
        delimiter: [','],
        height:'34px',
        width: '100%'
    });

    $('#seo_tags').tagsInput({
        defaultText:'Masukan Tags',
        removeWithBackspace: true,
        delimiter: [','],
        height:'34px',
        width: '100%'
    });

    $("#form-album").submit(function (e) {
        e.preventDefault();
        var formData = new FormData($('#form-album')[0]);

        var link;
        var pesan;

        link = "{{ route('admin.berita.komentar.update') }}";
        pesan = "Album Berhasil Diperbaharui";


        $.ajax({
            url: link,
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
                        text: pesan,
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

});

function edit(id){
    save_method = 'update';
    $('#form-album')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();

    $.ajax({
        url : laroute.route('admin.berita.komentar.edit', {id : id}),
        type: "GET",
        dataType: "JSON",
        success: function(response)
        {
            $('#modal_title').text('Perbaharui Data Album');
            $('[name="id"]').val(response.id);
            $('[name="User"]').val(response.User);
            $('[name="description"]').val(response.description);
            $('[name="status"]').val(response.status);
            $('#img_preview').attr('src', response.foto);
            var keyword = response.seo_keyword;
            if(keyword)
            {
                $('#seo_keyword').importTags(response.seo_keyword);
            }
            var seo_tags = response.seo_tags;
            if(seo_tags)
            {
                $('#seo_tags').importTags(response.seo_tags);
            }
            $('#modal_form').modal({
                backdrop: 'static',
                keyboard: false
            })
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error get data from ajax');
        }
    });
}

function hapus(id) {
    swal({
        title: "Anda Yakin?",
        text: "Data Yang Dihapus Tidak Akan Bisa Dikembalikan",
        icon: "warning",
        buttons: ["Batal", "Hapus"],
        dangerMode: true,
        closeOnClickOutside: false
    })
    .then((willDelete) => {
        if (willDelete) {
        $.ajax({
            url: laroute.route('admin.berita.komentar.hapus', { id: id }),
            type: "get",
            dataType: "JSON",
            success: function(data) {
                swal({
                    title: "Berhasil",
                    text: "Album Foto Berhasil Dihapus",
                    timer: 3000,
                    buttons: false,
                    icon: 'success',
                    allowOutsideClick: false
                });
                window.setTimeout(function(){
                    location.reload();
                } ,1500);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting data');
            }
        });
        } else {
            window.setTimeout(function(){
                location.reload();
            } ,1500);
        }
    });
}
</script>
@endpush
