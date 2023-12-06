<x-tempelate.app>
    <x-header.contentheader title="DATA DPT PROGRES" />

    <div class="row">

        <div class="col-md-12">
            <x-card.card>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <a href="{{ url('koordinator/dpt/tambah') }}" class="btn btn-sm btn-outline-success float-end">
                            <i class="fa fa-plus"></i>
                            Tambah Data
                        </a>
                    </div>
                </div>
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>
                                <center>NO.</center>
                            </th>
                            <th>
                                <center>NIK</center>
                            </th>
                            <th>
                                <center>NAMA</center>
                            </th>
                            <th>
                                <center>UMUR</center>
                            </th>
                            <th>
                                <center>TPS / RT / RW</center>
                            </th>
                            <th>
                                <center>AKSI</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $dpt)
                            <tr>
                                <td>
                                    <center>{{ $loop->iteration }}</center>
                                </td>
                                <td>
                                    <center>{{ $dpt->nik }}</center>
                                </td>
                                <td>
                                    <center>{{ $dpt->nama }}</center>
                                </td>
                                <td>
                                    <center>{{ $dpt->umur }}</center>
                                </td>
                                <td>
                                    <center>{{ $dpt->no_tps . '/' . $dpt->rt . '/' . $dpt->rw }}</center>
                                </td>
                                <td>
                                    <center>
                                        <x-button.btndefault class="warning" icons="fa-eye"
                                            url="koordinator/dpt/detail/{{ $dpt->id }}" />
                                        <x-button.btndefault class="primary" icons="fa-edit"
                                            url="koordinator/dpt/edit/{{ $dpt->id }}" />


                                        <x-button.btnmodal url="delete{{ $dpt->id }}" class="danger"
                                            icons="fa fa-trash" />
                                    </center>
                                </td>
                            </tr>
                            <x-modal.modaldelete id="delete{{ $dpt->id }}"
                                action="{{ url('koordinator/dpt/hapus', $dpt->id) }}" method="POST" />
                        @endforeach
                    </tbody>
                </table>
            </x-card.card>
        </div>
    </div>

    <!-- Modal upload file Data -->
    <x-modal.modal title="UPLOAD FILE DATA AWAL" id="uploadFile" class="form-tambah"
        action="{{ url('koordinator/data_awal/uploadFile') }}" method="POST">
        <div class="row">
            <div class="col-md-12">
                <x-input.input label="Upload file excell" plc="Masukan data awal ..." type="file" field="file" />
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">BATAL</button>
            <button class="btn btn-sm btn-outline-primary mx-2 btn-simpan">UPLOAD</button>
        </div>
    </x-modal.modal>
    <!-- #END Modal upload Data -->


</x-tempelate.app>
