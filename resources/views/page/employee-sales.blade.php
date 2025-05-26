<!doctype html>
<html
  lang="en"
  class="layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-skin="default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template"
  data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    
    <title>Imajica Booking System</title>

    <meta name="description" content="Imajica Booking System" />
    <meta name="keywords" content="Imajica Booking System" />
    <meta property="og:title" content="Imajica Booking System" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="Imajica Booking System" />
    <meta property="og:image" content="../../../../pixinvent.com/wp-content/uploads/2023/06/vuexy-hero-image.png" />
    <meta property="og:description" content="Imajica Booking System." />
    <meta property="og:site_name" content="Pixinvent" />
    <link rel="canonical" href="Imajica Booking System" />

    <!-- Google Tag Manager -->
    <script>
      (function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' });
        var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s),
          dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src = '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', 'GTM-5J3LMKC');
    </script>
    <!-- End Google Tag Manager -->
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
     <link rel="stylesheet"  href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />
    <link  rel="stylesheet"  href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />>

    <link  rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}"  />

    <!-- Page CSS -->
   <link rel="stylesheet" href="{{ asset('vendor/css/pages/app-invoice.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
   
    <!-- Config -->
    <script src="../../assets/js/config.js"></script>
    
    <!-- DataTables CSS -->
   <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5J3LMKC" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        @include('components.sidebar')
     
        <div class="menu-mobile-toggler d-xl-none rounded-1">
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
                <i class="ti tabler-menu icon-base"></i>
                <i class="ti tabler-chevron-right icon-base"></i>
            </a>
        </div>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <style>
                .summary-card {
                    border-radius: 0.5rem;
                    padding: 1.5rem;
                    margin-bottom: 1.5rem;
                    height: 150px; /* Fixed height */
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }
                
                .card-top-employee {
                    background-color: #d4edda; /* Light green */
                }

                .card-top-sales {
                    background-color: #cce5ff; /* Light blue */
                }

                .card-monthly-sales {
                    background-color: #fff3cd; /* Light yellow */
                }

                .summary-card h5 {
                    font-size: 1rem;
                    margin-bottom: 0.5rem;
                    color: #333;
                }

                .summary-card h4 {
                    font-size: 1.5rem;
                    margin: 0;
                    color: #333;
                }

                .summary-card .employee-name {
                    font-size: 1.25rem;
                    font-weight: 600;
                    margin-bottom: 0.25rem;
                }

                .summary-card .metric-value {
                    font-size: 1.5rem;
                    font-weight: bold;
                }
                
                /* Adjust table padding */
                .datatable-container {
                    padding: 1.5rem;
                }

                .table {
                    width: 100% !important; 
                    min-width: 1000px;
                }

                .table thead th {
                    background-color: #f8f9fa !important;
                    color: #333 !important;
                }

                /* Responsive adjustments */
                @media (max-width: 768px) {
                    .datatable-card {
                        width: 500%;
                        margin: 0;
                    }
                    
                    .datatable-container {
                        padding: 1rem;
                    }
                }
            </style>

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4">Employee Sales</h4> 

                    <!-- Summary Cards -->
                    <div class="row mb-4">
                        <!-- Top Employee Card -->
                        @if(isset($totalMetrics['top_employee']))
                        <div class="col-md-4">
                            <div class="summary-card card-top-employee">
                                <h5>Top Performing Employee</h5>
                                <div>
                                    <div class="employee-name">{{ $totalMetrics['top_employee']->employee_name }}</div>
                                    <div class="metric-value">₱{{ number_format($totalMetrics['top_employee']->total_service_sales, 2) }}</div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Total Sales Card -->
                        <div class="col-md-4">
                            <div class="summary-card card-top-sales">
                                <h5>Total Sales</h5>
                                <div>
                                    <div class="employee-name">All Employees</div>
                                    <div class="metric-value">₱{{ number_format($totalMetrics['total_sales'], 2) }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Monthly Sales Card -->
                        <div class="col-md-4">
                            <div class="summary-card card-monthly-sales">
                                <h5>Monthly Sales (Current Month)</h5>
                                <div>
                                    <div class="employee-name">All Services</div>
                                    <div class="metric-value">₱{{ number_format($totalMetrics['monthly_sales'], 2) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Sales Table -->
                    <div class="card">
                        <div class="card-body datatable-container table-responsive">
                            <table class="table table-striped" id="employeeSales">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th class="text-center">No. of Service Sales</th>
                                        <th class="text-center">Total Sales</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->employee_name }}</td>
                                        <td class="text-center">{{ $employee->service_count }}</td>
                                        <td class="text-center">₱{{ number_format($employee->total_service_sales, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
                <div class="container-xxl">
                    <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                        <div class="text-body">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            Developed by <a href="https://intra-code.com/" target="_blank" class="footer-link">Intracode IT Solutions</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>

  <!-- Drag Target Area To SlideIn Menu On Small Screens -->
  <div class="drag-target"></div>

  <!-- Core JS -->
  < <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('vendor/libs/%40algolia/autocomplete-js.js') }}"></script>
    <script src="{{ asset('vendor/libs/pickr/pickr.js') }}"></script>
    <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('vendor/js/menu.js') }}"></script>

  <!-- Vendors JS -->
 <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
  <script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>
  <script src="{{ asset('vendor/libs/cleave-zen/cleave-zen.js') }}"></script>
  <!-- Main JS -->
  <script src="../../assets/js/main.js"></script>

  <!-- DataTables Buttons JS -->
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
  <<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

  <script>
    $(document).ready(function() {
      var table = $('#employeeSales').DataTable({
        dom: '<"row"<"col-md-6 d-flex align-items-center justify-content-start gap-2"lB><"col-md-6"f>><"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
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
        language: {
          search: "",
          searchPlaceholder: "Search..."
        }
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