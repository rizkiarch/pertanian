<!-- Modal -->
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
                        <label for="staticEmail" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
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
<script>
    function editPupuk(element) {
        let pupuk_id = $(element).data('id');
        var url = `/admin/pupuk/${pupuk_id}`;
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            cache: false,
            dataType: 'json',
            success: function(response) {
                console.log(response);
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
</script>
