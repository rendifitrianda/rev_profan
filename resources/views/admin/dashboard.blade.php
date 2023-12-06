<x-app>
    <x-header.contentheader title="DASHBOARD" />
    <div class="row">
        <div class="col-md-12">
            <x-card.card cardtitle="STATISTIK DATA PROGRES KECAMATAN">
                <div style="overflow-x: auto !important;width:100%">
                    <div class="chart" id="chart"></div>
                </div>
            </x-card.card>
        </div>
    </div>
    <div class="row tampilBox"></div>

    <script src="{{ url('public') }}/assets/js/jquery-3.7.1.min.js"></script>
    <script src="{{ url('public') }}/assets/plugins/apex-chart/apexcharts.min.js"></script>
    <script>
        var datas = [];

        var options = {
            chart: {
                type: 'bar',
                height: 250,
                width: '220%',
            },
            plotOptions: {
                bar: {
                    horizontal: false
                }
            },
            series: [{
                data: datas
            }],

        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();

        $.ajax({
            url: "{{ url('admin/tampilGrafik') }}",
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.length > 0) {
                    var updateData = data.map(function(item) {
                        return {
                            x: item.Kecamatan,
                            y: item.persentasePencapaian,
                            fillColor: item.jumlahTarget > item.jumlahPencapaian ? '#ef4444' :
                                '#22c55e',
                            strokeColor: '#b91c1c'
                        };
                    });

                    chart.updateSeries([{
                        data: updateData
                    }]);

                    var listsData = '';
                    for (const d of data) {
                        listsData += `
                        <div class="col-md-3 mb-4">

<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        ${d.Kecamatan}
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Desa
        <span class="badge bg-primary rounded-pill">${d.jumlahDesa}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        DPT
        <span class="badge bg-primary rounded-pill">${d.jumlahDpt}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Target
        <span class="badge bg-primary rounded-pill">${d.jumlahTarget}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Pencapaian
        <span class="badge bg-primary rounded-pill">${d.jumlahPencapaian}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Persentase Pencapaian
        <span class="badge bg-primary rounded-pill">${d.persentasePencapaian}</span>
    </li>
</ul>

</div>
                        `;
                    }

                    $('.tampilBox').html(listsData);
                } else {
                    // Handle case where data is empty
                    console.log('No data received from the server.');
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    </script>
</x-app>
