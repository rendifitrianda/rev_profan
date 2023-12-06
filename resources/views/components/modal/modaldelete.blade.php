
<div class="modal fade" id="{{ $id ?? '' }}" tabindex="-1" aria-labelledby="{{ $id ?? '' }}" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <form class="{{ $class ?? '' }}" action="{{ $action ?? '' }}" method="{{ $method ?? '' }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body d-flex flex-column align-items-center justify-content-center">
                    <i class="fa fa-bell"></i>
                    <h3>Yakin ingin menghapus data ini ?!</h3>
                    <p class="d-block text-danger text-center">Perlu diingat bahwa data yang akan anda hapus tidak bisa dikembalikan lagi.</p>
                </div>
                <div class="modal-footer d-flex align-items-center justify-content-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-sm btn-danger mx-2">TETAP HAPUS</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .modal-body .fa-bell{
            font-size: 50px !important;
            color: #ff3e1d;
            margin-bottom: 24px;
        }
        .modal-body h3{
            font-size: 22px;
            color: #ff3e1d
        }
    </style>
</div>