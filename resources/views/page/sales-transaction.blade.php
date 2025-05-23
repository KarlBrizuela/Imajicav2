<!doctype html>
<html lang="en" dir="ltr" data-skin="default" data-assets-path="../../assets/" data-template="vertical-menu-template" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Imajica Booking System</title>
    <!-- Favicon -->

    <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />

    <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}" />
    <!-- Fonts and other CSS includes -->
    <!-- ... (keep your existing CSS includes) ... -->
     <link rel="stylesheet"  href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />
    <link  rel="stylesheet"  href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

     <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />>

   <link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />
     <link rel="stylesheet" href="{{ asset('vendor/libs/swiper/swiper.css') }}" />
       <link  rel="stylesheet"  href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/fonts/flag-icons.css') }}" />
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        @include('components.sidebar')

        <!-- Layout container -->
        <div class="layout-page">
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="fw-bold py-3 mb-4">Sales Transactions</h4>

                            <!-- Metrics Cards -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card card-custom card-total-sales">
                                                <div class="card-body">
                                                    <p class="card-text"><strong>Total Sales:</strong></p>
                                                    <h4 class="text-black">₱{{ number_format($metrics['totalSales'], 2) }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card card-custom card-product-sales">
                                                <div class="card-body">
                                                    <p class="card-text"><strong>Product Sales:</strong></p>
                                                    <h4 class="text-black">₱{{ number_format($metrics['productSales'], 2) }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card card-custom card-services-sales">
                                                <div class="card-body">
                                                    <p class="card-text"><strong>Services Sales:</strong></p>
                                                    <h4 class="text-black">₱{{ number_format($metrics['serviceSales'], 2) }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card card-custom card-top-selling">
                                                <div class="card-body">
                                                    <p class="card-text"><strong>Daily Sales:</strong></p>
                                                    <h4 class="text-black">₱{{ number_format($metrics['dailySales'], 2) }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sales Table -->
                            <div class="card">
                                <div class="card-body">
                                    <table id="servicesTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Service / Product</th>
                                                <th>Customer</th>
                                                <th>Staff</th>
                                                <th>Amount</th>
                                                <th>Type</th>
                                                <th>Branch</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sales as $sale)
                                            <tr>
                                                <td>{{ $sale['service_name'] }}</td>
                                                <td>{{ $sale['customer_name'] }}</td>
                                                <td>{{ $sale['staff_name'] }}</td>
                                                <td>₱{{ number_format($sale['amount'], 2) }}</td>
                                                <td>{{ $sale['type'] }}</td>
                                                <td>{{ $sale['branch_name'] }}</td>
                                                <td>{{ $sale['date'] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
                <!-- ... (keep your existing footer) ... -->
            </footer>
        </div>
    </div>

    <!-- Core JS and other scripts -->
    <!-- ... (keep your existing JS includes) ... -->  <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('vendor/libs/%40algolia/autocomplete-js.js') }}"></script>
    <script src="{{ asset('vendor/libs/pickr/pickr.js') }}"></script>
    <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('vendor/js/menu.js') }}"></script>

    <script>
        $(document).ready(function () {
            var table = $("#servicesTable").DataTable({
                dom: '<"row"<"col-md-6 d-flex align-items-center justify-content-start gap-2"lB><"col-md-6"f>><"row"<"col-sm-12"t>><"row"<"col-sm-12"r>><"row"<"col-sm-12"p>>',
                buttons: [
                    {
                        extend: 'collection',
                        className: 'btn dropdown-toggle',
                        text: '<i class="ti tabler-download me-1"></i> Export',
                        buttons: [
                            {
                                extend: 'copy',
                                className: 'dropdown-item',
                                text: '<i class="ti tabler-copy me-1"></i> Copy'
                            },
                            {
                                extend: 'csv',
                                className: 'dropdown-item',
                                text: '<i class="ti tabler-file-text me-1"></i> CSV'
                            },
                            {
                                extend: 'excel',
                                className: 'dropdown-item',
                                text: '<i class="ti tabler-file-spreadsheet me-1"></i> Excel'
                            },
                            {
                                extend: 'pdf',
                                className: 'dropdown-item',
                                text: '<i class="ti tabler-file-type-pdf me-1"></i> PDF'
                            },
                            {
                                extend: 'print',
                                className: 'dropdown-item',
                                text: '<i class="ti tabler-printer me-1"></i> Print'
                            }
                        ]
                    }
                ],
                // Add any other DataTable options you need
            });

            // Add custom styling for the export button
            $('.dt-buttons .btn').css({
                'background-color': '#1b392f',
                'color': '#ffffff',
                'border-color': '#1b392f'
            });

            // Optional: Add hover effect
            $('.dt-buttons .btn').hover(
                function() {
                    $(this).css({
                        'background-color': '#2a5749',
                        'border-color': '#2a5749'
                    });
                },
                function() {
                    $(this).css({
                        'background-color': '#1b392f',
                        'border-color': '#1b392f'
                    });
                }
            );
        });
    </script>
</body>
</html>
