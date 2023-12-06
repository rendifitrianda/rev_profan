<x-app>
    <style>
       
    </style>
    <x-header.contentheader title="DATA KECAMATAN" />
   
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
                            <th><center>NO.</center></th>
                            <th><center>NAMA KECAMATAN</center></th>
                            <th><center>AKSI</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $kecamatan)
                        <tr>
                            <td><center>{{ $loop->iteration }}</center></td>
                            <td><center>{{ $kecamatan->nama_kecamatan }}</center></td>
                            <td>
                                <center>
                                    <x-button.btnmodal url="update{{ $kecamatan->id }}" class="primary" icons="fa fa-edit" />
                                    <x-button.btnmodal url="delete{{ $kecamatan->id }}" class="danger" icons="fa fa-trash" />
                                </center>
                            </td>
                        </tr>
                        <x-modal.modaldelete
                            id="delete{{ $kecamatan->id }}" 
                            action="{{ url('admin/kecamatan/tambah') }}" 
                            method="POST" 
                        />
                        <!-- Modal Edit Data -->
                        <x-modal.modal title="UPDATE DATA KECAMATAN" id="update{{ $kecamatan->id }}" action="{{ url('admin/kecamatan/tambah') }}" method="POST" >
                            <div class="row">
                                <div class="col-md-12">
                                    <x-input.input 
                                        label="Nama kecamatan" 
                                        plc="Masukan nama kecamatan"
                                        type="text"
                                        field="nama_kecamatan"
                                        value="{{ $kecamatan->nama_kecamatan }}"
                                    />
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">BATAL</button>
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


    <!-- Modal Edit Data -->
    <x-modal.modal title="TAMBAH DATA KECAMATAN" id="tambah" class="form-tambah" action="{{ url('admin/kecamatan/tambah') }}" method="POST">
        <div class="row">
            <div class="col-md-12">
                <x-input.input 
                    label="Nama kecamatan" 
                    plc="Masukan nama kecamatan ..."
                    type="text"
                    field="nama_kecamatan"
                />
                <span class="text-error-add"></span>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">BATAL</button>
            <button class="btn btn-sm btn-outline-primary mx-2 btn-simpan">SIMPAN</button>
        </div>
    </x-modal.modal>
    <!-- #END Modal Edit Data -->

    <script src="{{ url('public') }}/assets/js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
           
        })
    </script>
</x-app>