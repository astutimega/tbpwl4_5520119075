@extends('adminlte::page')

@section('title', 'Kategori Skincare')

@section('content_header')
<h1 class="text-center text-bold">KATEGORI SKINCARE</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Categories Setting') }}

                </div>
                <div class="card-body">
                    <button class="btn btn-primary float-left mr-3" data-toggle="modal" data-target="#modalTambahData"><i class="fa fa-plus"></i> Tambah Data</button>

                    {{-- <div class="btn-group mb-5" role="group" aria-label="Basis Example"> --}}

                    </div>
                    <table id="table-data" class="table table-borderer display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>KATEGORI</th>
                                <th>TIPE KULIT</th>
                                <th>KETERANGAN</th>
                                <th>AKSI</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($kategori as $key)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$key->nama}}</td>
                                <td>{{$key->tipeKulit}}</td>
                                <td>{{$key->keterangan}}</td>
                                <td>
                                    <div class="btn-group" roles="group" aria-label="Basic Example">
                                        <button type="button" id="btn-edit-categories" class="btn" data-toggle="modal" data-target="#modalEdit" data-id="{{ $key->id }}" data-nama="{{ $key->nama }}" data-tipeKulit="{{ $key->tipeKulit }}" data-keterangan="{{ $key->keterangan }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" id="btn-delete-categories" class="btn" data-toggle="modal" data-target="#modalDeleteData" data-id="{{ $key->id }}" data-nama="{{$key->nama}}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->

<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.kategori.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Kategori</label>
                        <input type="text" class="form-control" placeholder="Masukan Kategori" name="nama" id="nama" required />
                    </div>
                    <div class="form-group">
                        <label for="tipeKulit">Tipe Kulit</label>
                        <input type="text" class="form-control" placeholder="Masukan Tipe Kulit " name="tipeKulit" id="tipeKulit" required />
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" aria-label="With textarea" placeholder="Masukan keterangan kategori" name="keterangan" id="keterangan" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah Data -->

<!-- Modal Edit Data -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.kategori.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="edit-nama">Kategori</label>
                                <input type="text" class="form-control" name="nama" id="edit-nama" required />
                            </div>
                            <div class="form-group">
                                <label for="edit-tipeKulit">Tipe Kulit</label>
                                <input type="text" class="form-control" name="tipeKulit" id="edit-tipeKulit" required />
                            </div>
                            <div class="form-group">
                                <label for="edit-keterangan">Keterangan</label>
                                <textarea class="form-control" aria-label="With textarea" name="keterangan" id="edit-keterangan" required></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="edit-id" />

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->

<!-- Modal Hapus Data -->
<div class="modal fade" id="modalDeleteData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan menghapus data Kategori <strong class="font-italic" id="delete-nama"></strong>?
                <form method="post" action="{{ route('admin.kategori.delete') }}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="delete-id" value="" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Data -->
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.0
    </div>
    <strong>CopyRight &copy; {{date('Y')}}
    <a href="" target="_blank">MegSkin</a>.</strong> All Right reserved
@stop

@section('js')
<script>
    $(function() {
        $(document).on('click', '#btn-edit-categories', function() {
            let id = $(this).data('id');
            let nama = $(this).data('nama');
            let tipeKulit = $(this).data('tipeKulit');
            let keterangan = $(this).data('keterangan');
            $('#edit-nama').val(nama);
            $('#edit-tipeKulit').val(tipeKulit);
            $('#edit-keterangan').val(keterangan);
            $('#edit-id').val(id);

            // $.ajax({
            //     type: "get",
            //     url: baseurl + '/admin/ajaxadmin/dataCategories/' + id,
            //     dataType: 'json',
            //     success: function(res) {
            //         console.log(res);
            //     },
            // });
        });

        $(document).on('click', '#btn-delete-categories', function() {
            let id = $(this).data('id');
            let nama = $(this).data('nama');
            $('#delete-id').val(id);
            $('#delete-nama').text(nama);
        });
    });
</script>
@stop