<x-tempelate.app>
    <x-header.contentheader title="DATA AWAL" />

    <div class="row">

        <div class="col-md-12">
            <x-card.card>

                <div class="table-responsive">
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
                                    <center>TPS</center>
                                </th>
                                <th>
                                    <center>RT</center>
                                </th>
                                <th>
                                    <center>RW</center>
                                </th>
                                <th>
                                    <center>AKSI</center>
                                </th>

                            </tr>
                        </thead>

                    </table>
                </div>
            </x-card.card>
        </div>
    </div>



    <script src="{{ url('public') }}/assets/js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).ready(function() {
                var table = new DataTable('#myTable', {
                    processing: true,
                    serverSide: true,
                    ajax: "{{ url('koordinator/data_awal/indexData') }}",
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
                            data: 'rt',
                            name: 'rt'
                        },
                        {
                            data: 'rw',
                            name: 'rw'
                        },
                        {
                            "data": null,
                            "sorttable": false,
                            render: function(data, type, row, meta) {
                                console.log(data.id)
                                // return meta.row + meta.settings._iDisplayStart + 1
                                return `
                            <a href="{{ url('koordinator/data_awal/detail/${data.id}') }} " class="btn btn-sm btn-outline-warning"> <i class="fa fa-eye"></i>  Detail</a>
                           
                            `;
                            }
                        }
                    ],

                });



            })
        })
    </script>
</x-tempelate.app>
