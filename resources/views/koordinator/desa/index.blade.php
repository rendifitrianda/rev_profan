<x-tempelate.app>
    <x-header.contentheader title="DATA DESA / KECAMATAN" />

    <div class="row">

        <div class="col-md-12">
            <x-card.card>

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

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-card.card>
        </div>
    </div>

</x-tempelate.app>
