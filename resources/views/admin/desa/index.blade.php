<x-app>
    <x-header.contentheader title="DATA KECAMATAN" />

    <div class="row">

        <div class="col-md-12">
            <x-card.card>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <x-button.btnmodal url="uploadFile" class="success float-end mx-2" icons="fa fa-file-excel"
                            span="Upload File" />
                        <x-button.btnmodal url="tambah" class="success float-end" icons="fa fa-plus"
                            span="Tambah data" />
                    </div>
                </div>
                <table class="table table-hover dataTable" id="myTable">
                    <thead>
                        <tr>
                            <th>
                                <center>NO.</center>
                            </th>
                            <th>
                                <center>NAMA KECAMATAN</center>
                            </th>
                            <th>
                                <center>NAMA DESA</center>
                            </th>
                            <th>
                                <center>JUMLAH DPT</center>
                            </th>
                            <th>
                                <center>TARGET</center>
                            </th>
                            <th>
                                <center>AKSI</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbody-table">
                        @foreach ($list as $desa)
                            <tr>
                                <td>
                                    <center>{{ $loop->iteration }}</center>
                                </td>
                                <td>
                                    <center>{{ $desa->kecamatan->nama_kecamatan }}</center>
                                </td>
                                <td>
                                    <center>{{ $desa->nama_desa }}</center>
                                </td>
                                <td>
                                    <center>{{ $desa->jumlah_dpt }}</center>
                                </td>
                                <td>
                                    <center>{{ $desa->target }}</center>
                                </td>
                                <td>
                                    <center>
                                        <x-button.btnmodal url="update{{ $desa->id }}" class="primary"
                                            icons="fa fa-edit" />
                                        <x-button.btnmodal url="delete{{ $desa->id }}" class="danger"
                                            icons="fa fa-trash" />
                                    </center>
                                </td>
                            </tr>
                            <x-modal.modaldelete id="delete{{ $desa->id }}"
                                action="{{ url('admin/kecamatan/tambah') }}" method="POST" />
                            <!-- Modal Edit Data -->
                            <x-modal.modal title="UPDATE DATA KECAMATAN" id="update{{ $desa->id }}"
                                action="{{ url('admin/kecamatan/tambah') }}" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <x-input.input label="Nama kecamatan" plc="Masukan nama kecamatan"
                                            type="text" field="nama_kecamatan"
                                            value="{{ $desa->nama_kecamatan }}" />
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"
                                        data-bs-dismiss="modal">BATAL</button>
                                    <button type="submit" class="btn btn-sm btn-outline-primary mx-2">UPDATE</button>
                                </div>
                            </x-modal.modal>
                            <!-- #END Modal Edit Data -->
                        @endforeach
                    </tbody>
                </table>
            </x-card.card>
        </div>
    </div>

    <!-- Modal upload file Data -->
    <x-modal.modal title="UPLOAD FILE DESA" id="uploadFile" class="form-tambah"
        action="{{ url('admin/desa/uploadFile') }}" method="POST">
        <div class="row">
            <div class="col-md-12">
                <x-input.input label="Upload file excell" plc="Masukan nama kecamatan ..." type="file"
                    field="file" />
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">BATAL</button>
            <button class="btn btn-sm btn-outline-primary mx-2 btn-simpan">UPLOAD</button>
        </div>
    </x-modal.modal>
    <!-- #END Modal upload Data -->


    <!-- Modal Tambah Data -->
    <x-modal.modal title="TAMBAH DATA DESA" id="tambah" class="form-tambah" action="{{ url('admin/desa/tambah') }}"
        method="POST">
        <div class="row">
            <div class="col-md-12">
                <x-input.input label="Nama Desa" plc="Masukan nama desa ..." type="text" field="nama_desa" />
                <x-input.input label="Jumlah DPT" plc="Masukan jumlah DPT ..." type="number" field="jumlah_dpt" />
                <x-input.input label="Target" plc="Tidak perlu diisi ..." type="text" field="target" />
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">BATAL</button>
            <button class="btn btn-sm btn-outline-primary mx-2 btn-simpan">SIMPAN</button>
        </div>
    </x-modal.modal>
    <!-- #END Modal Tambah Data -->

    <script src="{{ url('public') }}/assets/js/jquery-3.7.1.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            var table = new DataTable('#myTable', {
                processing: true,
                serverSide: true,
                ajax: "{{ url('admin/desa/ambilDataIndex') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'kecamatan_nama',
                        name: 'kecamatan_nama'
                    },
                    {
                        data: 'nama_desa',
                        name: 'nama_desa'
                    },
                    {
                        data: 'jumlah_dpt',
                        name: 'jumlah_dpt'
                    },
                    {
                        data: 'target',
                        name: 'target'
                    },

                    {
                        render: function(data) {
                            console.log(data)
                            return `
                                <button class="btn btn-sm btn-outline-primary btn-edit"> <i class="fa fa-edit"></i></button>
                                <button class="btn btn-sm btn-outline-danger btn-hapus"> <i class="fa fa-trash"></i></button>
                                `;
                        }
                    }
                ],

            });

            var btnUpdate = $('.btn-edit')
            table.on('click', btnUpdate, function(e) {
                let data = e;
                // let data = table.row(e.target.closest('tr')).data();

                console.log(data)
            });

        })
    </script> --}}
</x-app>
