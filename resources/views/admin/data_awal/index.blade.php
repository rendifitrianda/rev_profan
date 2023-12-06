<x-app>
    <x-header.contentheader title="DATA AWAL" />

    <div class="row">

        <div class="col-md-12">
            <x-card.card>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <x-button.btnmodal url="uploadFile" class="success float-end mx-2" icons="fa fa-file-excel"
                            span="Upload File" />
                        {{-- <x-button.btnmodal url="tambah" class="success float-end" icons="fa fa-plus"
                            span="Tambah data" /> --}}
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
                        {{-- @foreach ($list as $desa)
                            <tr>
                                <td>
                                    <center>{{ $loop->iteration }}</center>
                                </td>
                                <td>
                                    <center>{{ $desa->nik }}</center>
                                </td>
                                <td>
                                    <center>{{ $desa->nama }}</center>
                                </td>
                                <td>
                                    <center>{{ $desa->umur }}</center>
                                </td>
                                <td>
                                    <center>{{ $desa->no_tps . '/' . $desa->rt . '/' . $desa->rw }}</center>
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
                        @endforeach --}}
                    </tbody>
                </table>
            </x-card.card>
        </div>
    </div>

    <!-- Modal upload file Data -->
    <x-modal.modal title="UPLOAD FILE DATA AWAL" id="uploadFile" class="form-tambah"
        action="{{ url('admin/data_awal/uploadFile') }}" method="POST">
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

    <!-- Modal Hapus Data -->

    <!-- #END Modal Hapus Data -->



    <script src="{{ url('public') }}/assets/js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).ready(function() {
                var table = new DataTable('#myTable', {
                    processing: true,
                    serverSide: true,
                    ajax: "{{ url('admin/data_awal/indexData') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'nik',
                            name: 'nik'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'umur',
                            name: 'umur'
                        },
                        {
                            data: 'no_tps',
                            name: 'no_tps'
                        },

                        {
                            "data": null,
                            "sorttable": false,
                            render: function(data, type, row, meta) {
                                console.log(data.id)
                                // return meta.row + meta.settings._iDisplayStart + 1
                                return `
                            <a href="{{ url('admin/data_awal/detail/${data.id}') }} " class="btn btn-sm btn-outline-warning"> <i class="fa fa-eye"></i></a>
                            <a href="{{ url('admin/data_awal/edit/${data.id}') }} " class="btn btn-sm btn-outline-primary btn-edit" id=""> <i class="fa fa-edit"></i></a>
                            <a href="#hapus${data.id}" class="btn btn-sm btn-outline-danger btn-hapus" data-bs-toggle="modal"> <i class="fa fa-trash"></i></a>
                            <x-modal.modaldelete id="hapus${data.id}" action="{{ url('admin/data_awal/hapus/${data.id}') }}" method="POST" />
                            `;
                            }
                        }
                    ],

                });

                var btnUpdate = $('.btn-edit')
                console.log(btnUpdate);

            })
        })
    </script>
</x-app>
