@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNewPupuk"
                        id="createNewPupuk">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        <span>Tambah</span>
                    </button>
                </div>
            </div>
            <table class="table table-striped table-hover ">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pupuks as $pupuk)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $pupuk->name }}</td>
                            <td>{{ $pupuk->jenis }}</td>
                            <td>{{ $pupuk->harga }}</td>
                            <td>{{ $pupuk->stok }}</td>
                            <td>{{ $pupuk->deskripsi }}</td>
                            <td>
                                <a href="javascript:void(0)" id="editData" class="text-warning" style="cursor: pointer"
                                    onclick="editPupuk(this)" data-id="{{ $pupuk->id }}">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $pupuk->id }}"
                                    onclick="deleteItem(this)" class="text-danger" style="cursor: pointer">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal Edit-->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEdit">Edit Data Pupuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm" name="editProductForm" class="form-horizontal">
                        <input type="hidden" id="pupuk_id">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jenis" name="jenis">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="harga" name="harga">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="stok" name="stok" </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="save_edit()">Save</button>
                </div>
            </div>
        </div>
    </div>
    @include('admin.pupuk.create')
@endsection
<script>
    function editPupuk(element) {
        let pupuk_id = $(element).data('id');
        var url = `/admin/pupuk/${pupuk_id}`;
        $.ajax({
            url: url,
            type: "GET",
            cache: false,
            dataType: 'json',
            success: function(response) {
                $('#editModal').modal('show');
                $('#editmodal').ready(function() {
                    $('#pupuk_id').val(response.pupuk.id);
                    $('#name').val(response.pupuk.name);
                    $('#jenis').val(response.pupuk.jenis);
                    $('#harga').val(response.pupuk.harga);
                    $('#stok').val(response.pupuk.stok);
                    $('#deskripsi').val(response.pupuk.deskripsi);
                });
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function save_edit() {
        var pupuk_id = $('#pupuk_id').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $('#editProductForm').serialize(),
            url: `/admin/pupuk/${pupuk_id}`,
            type: "PUT",
            dataType: 'json',
            success: function(data) {
                $('#editModal').modal('hide');
                alert('Data Berhasil Diubah');
                location.reload();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function deleteItem(element) {
        let pupuk_id = $(element).data('id');
        let token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: `/admin/pupuk/${pupuk_id}`,
            type: "DELETE",
            cache: false,
            data: {
                '_token': token
            },
            success: function(response) {
                console.log(response);
                alert('Data Berhasil Dihapus');
                location.reload();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>
