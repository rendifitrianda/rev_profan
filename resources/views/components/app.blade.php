<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact " dir="ltr" data-bs-theme="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('public') }}/assets/plugins/font-family/font.css">
    <link rel="stylesheet" href="{{ url('public') }}/assets/plugins/fontawesome/css/all.css">
    <link rel="stylesheet" href="{{ url('public') }}/assets/plugins/apex-chart/apexcharts.css">
    <link rel="stylesheet" href="{{ url('public') }}/assets/plugins/data-tables/ataTables.bootstrap5.css">

    <link rel="stylesheet" href="{{ url('public') }}/assets/css/default-theme.css">
    <link rel="stylesheet" href="{{ url('public') }}/assets/css/app.css">

</head>

<body>

    <!-- header -->
    <header>
        <x-header.navbar />
    </header>
    <!-- END header -->

    <!-- Content container -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-end justify-content-end">
                        @foreach (['success', 'danger', 'warning', 'info'] as $status)
                            @if (session($status))
                                <div class="alert alert-{{ $status }} alert-dismissible fade show" role="alert">
                                    @if ($status == 'success')
                                        <i class="mdi mdi-check-all me-2"></i>
                                    @else
                                        <i class="mdi mdi-alert-circle-outline me-2"></i>
                                    @endif

                                    {{ session($status) }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            {{ $slot }}
        </div>
    </section>
    <!-- END Content container -->


    <script src="{{ url('public') }}/assets/js/jquery-3.7.1.min.js"></script>
    <script src="{{ url('public') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ url('public') }}/assets/plugins/data-tables/jquery.dataTables.min.js"></script>
    <script src="{{ url('public') }}/assets/plugins/data-tables/dataTables.bootstrap5.min.js"></script>

    <script src="{{ url('public') }}/assets/js/theme.js"></script>
    <script src="{{ url('public') }}/assets/js/app.js"></script>

</body>

</html>
