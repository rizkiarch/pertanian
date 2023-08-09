<!-- Modal -->
<div class="modal fade" id="modalNewPeralatan" tabindex="-1" aria-labelledby="modelHeading" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelHeading">Data Peralatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name">
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
                            <input type="number" class="form-control" id="stok" name="stok">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="save_form()">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    // add
    function save_form() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $('#productForm').serialize(),
            url: "{{ route('peralatan.store') }}",
            type: "POST",
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#productForm').trigger("reset");
                $('#modalNewPeralatan').modal('hide');
                alert('Data berhasil disimpan');
                window.location.reload();
            },
            fail: function(hxr, error) {
                console.log(error);
            },
        });
    }
</script>
