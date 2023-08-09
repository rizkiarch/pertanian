<!-- Modal -->
<div class="modal fade" id="modalNewPupuk" tabindex="-1" aria-labelledby="modelHeading" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelHeading">{{ $addTitle }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form menthod="post" id="productForm" class="form-horizontal" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name">
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
                            <input type="number" class="form-control" id="harga" name="harga">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="stok" name="stok">
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
                <button type="submit" value="submit" class="btn btn-primary" onclick="save_form()">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    function save_form() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $('#productForm').serialize(),
            url: "{{ route('pupuk.store') }}",
            type: "POST",
            dataType: 'json',
            beforesend: function() {
                $("#productForm").html("<i class='fa fa-spinner fa-spin'></i> Sedang menyimpan data...")
            },
            success: function(data) {
                console.log(data);
                $('#productForm').trigger("reset");
                $('#modalNewPupuk').modal('hide');
                alert('Data berhasil disimpan');
                window.location.reload();
            },
            fail: function(hxr, error) {
                console.log(error);
            },
        });
    }
</script>
