<x-app>
    <x-header.contentheader title="EDIT DATA AWAL" />

    <div class="row">

        <div class="col-md-12">
            <x-card.card>
                <form action="{{ url('admin/data_awal/edit', $list->id) }}" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-md-3 mb-3">
                            <x-input.input label="NIK" value="{{ $list->nik }}" plc="NIK ..." type="text"
                                field="nik" />
                        </div>
                        <div class="col-md-3 mb-3">
                            <x-input.input label="NAMA" value="{{ $list->nama }}" plc="Nama ..." type="text"
                                field="nama" />
                        </div>
                        <div class="col-md-3 mb-3">
                            <x-input.input label="JENIS KELAMIN" value="{{ $list->jk }}" plc="Jenis Kelamin ..."
                                type="text" field="jk" />
                        </div>
                        <div class="col-md-3 mb-3">
                            <x-input.input label="TEMPAT LAHIR" value="{{ $list->tmp_lahir }}" plc="Tempat Lahir ..."
                                type="text" field="tmp_lahir" />
                        </div>
                        <div class="col-md-3 mb-3">
                            <x-input.input label="TANGGAL LAHIR" value="{{ $list->tgl_lahir }}" plc="Tangga Lahir ..."
                                type="date" field="tgl_lahir" />
                        </div>
                        <div class="col-md-3 mb-3">
                            <x-input.input label="UMUR" value="{{ $list->umur }}" plc="Umur ..." type="text"
                                field="umur" />
                        </div>
                        <div class="col-md-3 mb-3">
                            <x-input.input label="NO.TELEPON / HP" value="{{ $list->tlp }}" plc="No.Telepon ..."
                                type="number" field="tlp" />
                        </div>
                        <div class="col-md-3 mb-3">
                            <x-input.input label="NO.TPS" value="{{ $list->no_tps }}" plc="Nomor Tps ..." type="text"
                                field="no_tps" />
                        </div>
                        <div class="col-md-3 mb-3">
                            <x-input.input label="RT" value="{{ $list->rt }}" plc="Rt ..." type="number"
                                field="rt" />
                        </div>
                        <div class="col-md-3 mb-3">
                            <x-input.input label="RW" value="{{ $list->rw }}" plc="Rw ..." type="number"
                                field="rw" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="{{ url('admin/data_awal') }}" class="btn btn-sm btn-outline-warning">BATAL</a>
                                <button type="submit" class="btn btn-sm btn-outline-primary mx-2">UPDATE</button>
                            </div>
                        </div>
                    </div>
                </form>
            </x-card.card>
        </div>
    </div>

</x-app>
