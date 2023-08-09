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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNewPeralatan"
                        id="NewPeralatan">
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
                        <th scope="col">Kondisi</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peralatans as $peralatan)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $peralatan->name }}</td>
                            <td>{{ $peralatan->kondisi }}</td>
                            <td>{{ $peralatan->stok }}</td>
                            <td>
                                <a href="javascript:void(0)" id="editData" class="text-warning" style="cursor: pointer"
                                    onclick="editItem(this)" data-id="{{ $peralatan->id }}">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $peralatan->id }}"
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
                    <h5 class="modal-title" id="modalEdit">Edit Data Peralatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm" name="editProductForm" class="form-horizontal">
                        <input type="hidden" id="peralatan_id">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kondisi" name="kondisi">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="stok" name="stok" </div>
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
    @include('admin.peralatan.create')
@endsection
<script>
    function editItem(element) {
        let peralatan_id = $(element).data('id');
        var url = `/admin/peralatan/${peralatan_id}`;
        $.ajax({
            url: url,
            type: "GET",
            cache: false,
            dataType: 'json',
            success: function(response) {
                $('#editModal').modal('show');
                $('#editmodal').ready(function() {
                    $('#peralatan_id').val(response.peralatan.id);
                    $('#name').val(response.peralatan.name);
                    $('#kondisi').val(response.peralatan.kondisi);
                    $('#stok').val(response.peralatan.stok);
                });
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function save_edit() {
        var peralatan_id = $('#peralatan_id').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $('#editProductForm').serialize(),
            url: `/admin/peralatan/${peralatan_id}`,
            type: "PUT",
            dataType: 'json',
            success: function(data) {
                console.log(data);
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
        let peralatan_id = $(element).data('id');
        let token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: `/admin/peralatan/${peralatan_id}`,
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
