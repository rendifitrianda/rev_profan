<x-app>
    <x-header.contentheader title="DETAIL DATA DPT PROGRES" />

    <div class="row">
        <div class="col-md-4">
            <x-card.card>
                <table class="table">

                    <tr>
                        <th>KECAMATAN</th>
                        <td>:</td>
                        <td>{{ $list->desa[0]->kecamatan->nama_kecamatan }}</td>
                    </tr>
                    <tr>
                        <th>DESA</th>
                        <td>:</td>
                        <td>{{ $list->desa[0]->nama_desa }}</td>
                    </tr>
                    <tr>
                        <th>TPS</th>
                        <td>:</td>
                        <td>{{ $list->no_tps }}</td>
                    </tr>
                    <tr>
                        <th>RT / RW</th>
                        <td>:</td>
                        <td>{{ $list->rt . '/' . $list->rw }}</td>
                    </tr>

                </table>
            </x-card.card>
        </div>
        <div class="col-md-8">
            <x-card.card>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ url('public') }}/{{ $list->foto_ktp }}" alt="" width="100%">
                    </div>
                    <div class="col-md-8">
                        <table class="table">

                            <tr>
                                <th>NIK</th>
                                <td>:</td>
                                <td>{{ $list->nik }}</td>
                            </tr>
                            <tr>
                                <th>NAMA</th>
                                <td>:</td>
                                <td>{{ $list->nama }}</td>
                            </tr>
                            <tr>
                                <th>JENIS KELAMIN</th>
                                <td>:</td>
                                <td>{{ $list->jk }}</td>
                            </tr>
                            <tr>
                                <th>TEMPAT TANGGAL LAHIR</th>
                                <td>:</td>
                                <td>{{ $list->tmp_lahir . ', ' . $list->tgl_lahir }}</td>
                            </tr>
                            <tr>
                                <th>UMUR</th>
                                <td>:</td>
                                <td>{{ $list->umur }}</td>
                            </tr>
                            <tr>
                                <th>TELEPON / HP</th>
                                <td>:</td>
                                <td>{{ $list->tlp }}</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </x-card.card>
        </div>
    </div>

</x-app>
