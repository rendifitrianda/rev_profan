<x-app>
    <style>

    </style>
    <x-header.contentheader title="DATA KOORDINATOR" />

    <div class="row">

        <div class="col-md-12">
            <x-card.card>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <x-button.btnmodal url="tambah" class="success float-end" icons="fa fa-plus" span="Tambah data" />
                    </div>
                </div>
                <table class="table dataTable">
                    <thead>
                        <tr>
                            <th>
                                <center>NO.</center>
                            </th>
                            <th>
                                <center>NAMA</center>
                            </th>
                            <th>
                                <center>TELEPON</center>
                            </th>
                            <th>
                                <center>ALAMAT</center>
                            </th>
                            <th>
                                <center>EMAIL</center>
                            </th>
                            <th>
                                <center>PASSWORD</center>
                            </th>
                            <th>
                                <center>AKUN</center>
                            </th>
                            <th>
                                <center>AKSI</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $koordinator)
                            <tr>
                                <td>
                                    <center>{{ $loop->iteration }}</center>
                                </td>
                                <td>
                                    <center>{{ $koordinator->nama }}</center>
                                </td>
                                <td>
                                    <center>{{ $koordinator->no_tlp }}</center>
                                </td>
                                <td>
                                    <center>{{ $koordinator->alamat }}</center>
                                </td>
                                <td>
                                    <center>{{ $koordinator->email }}</center>
                                </td>
                                <td>
                                    <center>{{ $koordinator->password }}</center>
                                </td>
                                <td>
                                    <center>{{ $koordinator->status_akun }}</center>
                                </td>
                                <td>
                                    <center>
                                        <x-button.btnmodal url="update{{ $koordinator->id }}" class="primary"
                                            icons="fa fa-edit" />
                                        <x-button.btnmodal url="delete{{ $koordinator->id }}" class="danger"
                                            icons="fa fa-trash" />
                                    </center>
                                </td>
                            </tr>
                            <x-modal.modaldelete id="delete{{ $koordinator->id }}"
                                action="{{ url('admin/koordinator/hapus', $koordinator->id) }}" method="POST" />

                            <!-- Modal TAMBAH Data -->
                            <x-modal.modal title="UPDATE DATA KOORDINATOR" id="update{{ $koordinator->id }}"
                                class="form-tambah" action="{{ url('admin/koordinator/edit', $koordinator->id) }}"
                                method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <x-input.input label="Nama" plc="Masukan nama ..." type="text"
                                            field="nama" value="{{ $koordinator->nama }}" />
                                    </div>
                                    <div class="col-md-12">
                                        <x-input.input label="Telepon" plc="Masukan no.tlp ..." type="text"
                                            field="no_tlp" value="{{ $koordinator->no_tlp }}" />
                                    </div>
                                    <div class="col-md-12">
                                        <x-input.input label="Alamat" plc="Masukan alamat ..." type="text"
                                            field="alamat" value="{{ $koordinator->alamat }}" />
                                    </div>
                                    <div class="col-md-12">
                                        <x-input.input label="Foto" plc="Masukan foto ..." type="file"
                                            field="foto" />
                                    </div>
                                    <div class="col-md-12">
                                        <x-input.input label="Email" plc="Masukan email ..." type="email"
                                            field="email" value="{{ $koordinator->email }}" />
                                    </div>
                                    <div class="col-md-12">
                                        <x-input.input label="Password" plc="Masukan password ..." type="password"
                                            field="password" />
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"
                                        data-bs-dismiss="modal">BATAL</button>
                                    <button class="btn btn-sm btn-outline-primary mx-2 btn-simpan">UPDATE</button>
                                </div>
                            </x-modal.modal>
                            <!-- #END Modal Edit Data -->
                        @endforeach
                    </tbody>
                </table>
            </x-card.card>
        </div>
    </div>


    <!-- Modal TAMBAH Data -->
    <x-modal.modal title="TAMBAH DATA KOORDINATOR" id="tambah" class="form-tambah"
        action="{{ url('admin/koordinator/tambah') }}" method="POST">
        <div class="row">
            <div class="col-md-12">
                <x-input.input label="Nama" plc="Masukan nama ..." type="text" field="nama" />
            </div>
            <div class="col-md-12">
                <x-input.input label="Telepon" plc="Masukan no.tlp ..." type="text" field="no_tlp" />
            </div>
            <div class="col-md-12">
                <x-input.input label="Alamat" plc="Masukan alamat ..." type="text" field="alamat" />
            </div>
            <div class="col-md-12">
                <x-input.input label="Foto" plc="Masukan foto ..." type="file" field="foto" />
            </div>
            <div class="col-md-12">
                <x-input.input label="Email" plc="Masukan email ..." type="email" field="email" />
            </div>
            <div class="col-md-12">
                <x-input.input label="Password" plc="Masukan password ..." type="password" field="password" />
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">BATAL</button>
            <button class="btn btn-sm btn-outline-primary mx-2 btn-simpan">SIMPAN</button>
        </div>
    </x-modal.modal>
    <!-- #END Modal Edit Data -->

    <script src="{{ url('public') }}/assets/js/jquery-3.7.1.min.js"></script>
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#tambah').modal('show')
            })
        </script>
    @endif

</x-app>
