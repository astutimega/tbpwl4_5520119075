@extends('adminlte::page')

@section('title', 'Merek Skincare')

@section('content_header')
<h1 class="text-center text-bold">MEREK SKINCARE</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Brands Setting') }}

                </div>
                <div class="card-body">
                    <button class="btn btn-primary float-left mr-3" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i>Tambah Data</button>

                    <div class="btn-group mb-5" role="group" aria-label="Basis Example">

                    </div>
                    <table id="table-data" class="table table-borderer display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA BRAND</th>
                                <th>KETERANGAN</th>
                                <th>AKSI</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($merek as $key)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$key->brand}}</td>
                                <td>{{$key->keterangan}}</td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-brands" class="btn" data-toggle="modal" data-target="#modalEdit" data-id="{{ $key->id }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" id="btn-delete-brands" class="btn" data-toggle="modal" data-target="#modalDelete" data-id="{{ $key->id }}" data-brand="{{ $key->brand }}"><i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Merek</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.brand.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="brand">Nama Merek</label>
                        <input type="text" class="form-control" placeholder="Masukan nama Merek" name="brand" id="brand" required />
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" aria-label="With textarea" placeholder="Masukan keterangan merek" name="keterangan" id="keterangan" required></textarea>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Merek/Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.brand.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="edit-brand">Nama Merek</label>
                                <input type="text" class="form-control" name="brand" id="edit-brand" required />
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

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-success">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Data -->


<!-- Modal Delete Data -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Merek</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus Data Merek<strong class="" id="delete-brand"></strong>?
                <form method="post" action="{{ route('admin.brand.delete') }}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="delete-id" value="" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete Data -->




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
        $("#datepicker").datepicker({
            format: "yyyy", // Notice the Extra space at the beginning
            viewMode: "years",
            minViewMode: "years"
        });
        $(document).on('click', '#btn-delete-brands', function() {
            let id = $(this).data('id');
            let brand = $(this).data('brand');
            $('#delete-id').val(id);
            $('#delete-brand').text(brand);
            console.log("hallo");
        });


        $(document).on('click', '#btn-edit-brands', function() {
            let id = $(this).data('id');

            $.ajax({
                type: "get",
                url: baseurl + '/admin/ajaxadmin/dataBrands/' + id,
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    // $('#edit-name').val(res.name);
                    $('#edit-brand').val(res.brand);
                    $('#edit-keterangan').val(res.keterangan);
                    $('#edit-id').val(res.id);
                },
            });
        });

    });
</script>
@stop
@section('js')
<script>

</script>
@stop