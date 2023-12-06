<x-tempelate.app>
    <style>
        .listdata {
            margin-bottom: 32px;
        }

        .listdata li {
            display: flex;
            align-items: center
        }

        .listdata li span {
            display: block
        }

        .listdata span:nth-child(1) {

            width: 200px;
            font-size: 14px;
            font-weight: 500
        }

        .listdata span:nth-child(2) {

            width: 20px;
            display: flex;
            align-items: center;
            justify-content: center
        }
    </style>
    <x-header.contentheader title="TAMBAH DATA DPT PROGRES" />

    <div class="row">
        <div class="col-md-12">
            <x-card.card>
                <form class="form-cari">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <x-input.input label="Desa" plc="Nama desa ..." type="text" field="desa" />
                        </div>
                        <div class="col-md-3">
                            <x-input.input label="Nama" plc="Nama sesuai KTP ..." type="text" field="nama" />
                        </div>
                        <div class="col-md-3">
                            <x-input.input label="Tanggal Lahir" plc="Tanggal lahir ..." type="date"
                                field="tgl_lahir" />
                        </div>
                        <div class="col-md-3">
                            <span class="btn btn-sm btn-outline-primary mt-4 float-start btn-cari">CARI</span>
                        </div>
                        <div class="col-md-12" id="textErrors">
                            <h5 class="text-danger my-3 text-center">Data yang anda cari tidak ditemukan, coba cari data
                                yang lain
                                !.
                            </h5>
                        </div>
                    </div>
                </form>
            </x-card.card>
        </div>
    </div>
    <div class="col-md-12" id="cardinput">
        <x-card.card>
            <form action="{{ url('koordinator/dpt/tambah') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <ul class="listdata"></ul>
                    </div>
                    <div class="col-md-4">
                        <x-input.select label="Koordinator" field="koordinator_id">
                            @foreach ($koordinator as $d)
                                <option value="{{ $d->id }}">{{ $d->nama }}</option>
                            @endforeach
                        </x-input.select>
                    </div>

                    <div class="col-md-4">
                        <x-input.input label="NIK" plc="Masukan NIK ..." type="text" field="nik" />
                    </div>
                    <div class="col-md-4">
                        <x-input.input label="Foto KTP" plc="Masukan Foto ..." type="file" field="foto_ktp" />
                    </div>

                    <input type="hidden" name="desa_id" id="desa_id" />
                    <input type="hidden" name="nama" id="nama" />
                    <input type="hidden" name="jk" id="jk" />
                    <input type="hidden" name="tmp_lahir" id="tmp_lahir" />
                    <input type="hidden" name="tgl_lahir" id="tgl_lahir" />
                    <input type="hidden" name="umur" id="umur" />
                    <input type="hidden" name="tlp" id="tlp" />
                    <input type="hidden" name="no_tps" id="no_tps" />
                    <input type="hidden" name="rt" id="rt" />
                    <input type="hidden" name="rw" id="rw" />
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-center mt-5 mb-3">
                            <a href="{{ url('koordinator/dpt') }}" class="btn btn-sm btn-outline-warning">BATAL</a>
                            <button class="btn btn-sm btn-outline-primary mx-2">SIMPAN</button>
                        </div>
                    </div>
                </div>
            </form>
        </x-card.card>

    </div>
    <script src="{{ url('public') }}/assets/js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cardinput').hide()
            $('#textErrors').hide()

            $('.btn-cari').click(function() {
                var data = $('.form-cari').serialize();
                var listdata = '';
                $.ajax({
                    type: 'POST',
                    url: "{{ url('koordinator/dpt/cari') }}",
                    data: data,
                    success: function(datas) {
                        if (datas.data && datas.data.length > 0) {

                            $('#cardinput').show('slow')

                            var dataDpt = datas.data[0];
                            var namadesa = dataDpt.desa.nama_desa;
                            var namakecamatan = dataDpt.desa.kecamatan.nama_kecamatan;
                            listdata += `
                                <li>
                                    <span>Nama Lengkap</span>
                                    <span>:</span>
                                    <span>${dataDpt.nama}</span>
                                </li>
                                <li>
                                    <span>Jenis Kelamin</span>
                                    <span>:</span>
                                    <span>${dataDpt.jk == 'L' ? 'Laki-laki' : 'Perempuan'}</span>
                                </li>
                                <li>
                                    <span>Tempat Tanggal Lahir</span>
                                    <span>:</span>
                                    <span>${dataDpt.tmp_lahir}, ${dataDpt.tgl_lahir}</span>
                                </li>
                                <li>
                                    <span>Umur</span>
                                    <span>:</span>
                                    <span>${dataDpt.umur} Tahun</span>
                                </li>
                                <li>
                                    <span>Kecamatan / Desa</span>
                                    <span>:</span>
                                    <span>${namakecamatan} / ${namadesa}</span>
                                </li>
                                <li>
                                    <span>RT / RW</span>
                                    <span>:</span>
                                    <span>${dataDpt.rt} / ${dataDpt.rw}</span>
                                </li>
                                <li>
                                    <span>No.TPS</span>
                                    <span>:</span>
                                    <span>${dataDpt.no_tps}</span>
                                </li>
                            `;
                            $('#desa_id').val(datas.data[0].desa.id);
                            $('#nama').val(dataDpt.nama);
                            $('#jk').val(dataDpt.jk);
                            $('#tmp_lahir').val(dataDpt.tmp_lahir);
                            $('#tgl_lahir').val(dataDpt.tgl_lahir);
                            $('#umur').val(dataDpt.umur);
                            $('#tlp').val(dataDpt.tlp);
                            $('#no_tps').val(dataDpt.no_tps);
                            $('#rt').val(dataDpt.rt);
                            $('#rw').val(dataDpt.rw);
                            $('.listdata').html(listdata)
                        } else {
                            console.log(datas)
                            setTimeout(() => {
                                $('#textErrors').show('slow')
                            }, 2000);
                        }
                    }
                });
            })
        });
    </script>

</x-tempelate.app>
