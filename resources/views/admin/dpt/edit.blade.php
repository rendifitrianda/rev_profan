<x-app>
    <x-header.contentheader title="UPDATE DATA DPT PROGRES" />

    <div class="row">

        <div class="col-md-12">
            <x-card.card>
                <form action="{{ url('admin/dpt/edit', $list->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <x-input.select label="Desa" field="desa_id">
                                @foreach ($desa as $d)
                                    <option value="{{ $d->id }}"
                                        @if ($d->id == $list->desa_id) selected @endif>
                                        {{ $d->nama_desa }}</option>
                                @endforeach
                            </x-input.select>
                        </div>
                        <div class="col-md-3">
                            <x-input.select label="Koordinator" field="koordinator_id">
                                @foreach ($koordinator as $d)
                                    <option value="{{ $d->id }}"
                                        @if ($d->id == $list->koordinator_id) selected @endif>{{ $d->nama }}</option>
                                @endforeach
                            </x-input.select>
                        </div>
                        <div class="col-md-3">
                            <x-input.input label="NIK" plc="Masukan NIK ..." type="text" field="nik"
                                value="{{ $list->nik }}" />
                        </div>
                        <div class="col-md-3">
                            <x-input.input label="Nama" plc="Masukan Nama sesuai KTP ..." type="text"
                                field="nama" value="{{ $list->nama }}" />
                        </div>
                        <div class="col-md-3">
                            <x-input.select label="Jenis Kelamin" field="jk">

                                <option value="L" @if ($list->jk == 'L') selected @endif>Laki-laki
                                </option>
                                <option value="P" @if ($list->jk == 'P') selected @endif>Perempuan
                                </option>
                            </x-input.select>
                        </div>
                        <div class="col-md-3">
                            <x-input.input label="Tempat Lahir" plc="Masukan Tempat lahir sesuai KTP ..." type="text"
                                field="tmp_lahir" value="{{ $list->tmp_lahir }}" />
                        </div>
                        <div class="col-md-3">
                            <x-input.input label="Tanggal Lahir" plc="Masukan Tanggal lahir sesuai KTP ..."
                                type="date" field="tgl_lahir" value="{{ $list->tgl_lahir }}" />
                        </div>
                        <div class="col-md-3">
                            <x-input.input label="Umur" plc="Tidak perlu diisi ..." type="text" field="umur"
                                value="{{ $list->umur }}" />
                        </div>
                        <div class="col-md-3">
                            <x-input.input label="No.Telepon" plc="Masukan no.telepon ..." type="text" field="tlp"
                                value="{{ $list->tlp }}" />
                        </div>
                        <div class="col-md-2">
                            <x-input.input label="No.TPS" plc="Masukan no.TPS ..." type="text" field="no_tps"
                                value="{{ $list->no_tps }}" />
                        </div>
                        <div class="col-md-2">
                            <x-input.input label="RT" plc="Masukan RT ..." type="text" field="rt"
                                value="{{ $list->rt }}" />
                        </div>
                        <div class="col-md-2">
                            <x-input.input label="RW" plc="Masukan RW ..." type="text" field="rw"
                                value="{{ $list->rw }}" />
                        </div>
                        <div class="col-md-3">
                            <x-input.input label="Foto KTP" plc="Masukan Foto ..." type="file" field="foto_ktp" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center justify-content-center mt-5 mb-3">
                                <a href="{{ url('admin/dpt') }}" class="btn btn-sm btn-outline-warning">BATAL</a>
                                <button class="btn btn-sm btn-outline-primary mx-2">UPDATE</button>
                            </div>
                        </div>
                    </div>
                </form>
            </x-card.card>
        </div>
    </div>


</x-app>
