<x-tempelate.app>

    <div class="row">
        <div class="col-md-12">
            <x-card.card>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ url('public') }}/{{ $list->foto }}" alt="" width="100%">
                    </div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>NAMA</th>
                                    <td>:</td>
                                    <td>{{ $list->nama }}</td>
                                </tr>
                                <tr>
                                    <th>NO TELEPON</th>
                                    <td>:</td>
                                    <td>{{ $list->no_tlp }}</td>
                                </tr>
                                <tr>
                                    <th>ALAMAT</th>
                                    <td>:</td>
                                    <td>{{ $list->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>EMAIL</th>
                                    <td>:</td>
                                    <td>{{ $list->email }}</td>
                                </tr>

                                <tr>
                                    <th>PASSWORD</th>
                                    <td>:</td>
                                    <td>{{ Str::limit($list->password, 50) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="right">
                                        <x-button.btnmodal url="update{{ $list->id }}" class="primary"
                                            icons="fa fa-edit" span="EDIT AKUN" />

                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </x-card.card>
        </div>
    </div>
    <!-- Modal TAMBAH Data -->
    <x-modal.modal title="UPDATE AKUN" id="update{{ $list->id }}" class="form-tambah"
        action="{{ url('koordinator/profile/edit', $list->id) }}" method="POST">
        <div class="row">
            <div class="col-md-12">
                <x-input.input label="Nama" plc="Masukan nama ..." type="text" field="nama"
                    value="{{ $list->nama }}" />
            </div>
            <div class="col-md-12">
                <x-input.input label="Alamat" plc="Masukan alamat ..." type="text" field="alamat"
                    value="{{ $list->alamat }}" />
            </div>
            <div class="col-md-12">
                <x-input.input label="No.Telepon" plc="Masukan no.tlp ..." type="text" field="no_tlp"
                    value="{{ $list->no_tlp }}" />
            </div>
            <div class="col-md-12">
                <x-input.input label="Email" plc="Masukan email ..." type="text" field="email"
                    value="{{ $list->email }}" />
            </div>
            <div class="col-md-12">
                <x-input.input label="Password" plc="Masukan password ..." type="text" field="password" />
            </div>
            <div class="col-md-12">
                <x-input.input label="Foto" plc="Masukan foto ..." type="file" field="foto" />
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">BATAL</button>
            <button class="btn btn-sm btn-outline-primary mx-2 btn-simpan">UPDATE</button>
        </div>
    </x-modal.modal>
    <!-- #END Modal Edit Data -->
</x-tempelate.app>
