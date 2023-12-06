<x-tempelate.app>
    <style>

    </style>
    <x-header.contentheader title="DATA KECAMATAN" />

    <div class="row">

        <div class="col-md-12">
            <x-card.card>

                <table class="table dataTable">
                    <thead>
                        <tr>
                            <th>
                                <center>NO.</center>
                            </th>
                            <th>
                                <center>NAMA KECAMATAN</center>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $kecamatan)
                            <tr>
                                <td>
                                    <center>{{ $loop->iteration }}</center>
                                </td>
                                <td>
                                    <center>{{ $kecamatan->nama_kecamatan }}</center>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-card.card>
        </div>
    </div>
</x-tempelate.app>
