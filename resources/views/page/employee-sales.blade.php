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
    <link rel="icon" type="image/x-icon" href="{{ asset(path:'logo/logo.png') }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->
    
     <link rel="stylesheet"  href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />
    <link  rel="stylesheet"  href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    
    <!-- Vendors CSS -->
    
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    
    <!-- endbuild -->

     <link  rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}"  />

    <!-- Page CSS -->
    
   <link rel="stylesheet" href="{{ asset('vendor/css/pages/app-invoice.css') }}" />

   
    <!-- Helpers -->
     <script src="{{ asset('vendor/js/helpers.js') }}"></script>
   
    <!-- Config -->
    <script src="../../assets/js/config.js"></script>
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
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
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <h4>{{ $totalMetrics['top_employee']->employee_name }}</h4>
                                    <h4>₱{{ number_format($totalMetrics['top_employee']->total_service_sales, 2) }}</h4>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Total Sales Card -->
                        <div class="col-md-4">
                            <div class="summary-card card-top-sales">
                                <h5>Total Sales</h5>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <h4>All Employees</h4>
                                    <h4>₱{{ number_format($totalMetrics['total_sales'], 2) }}</h4>
                                </div>
                            </div>
                        </div>

                        <!-- Monthly Sales Card -->
                        <div class="col-md-4">
                            <div class="summary-card card-monthly-sales">
                                <h5>Monthly Sales (Current Month)</h5>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <h4>All Services</h4>
                                    <h4>₱{{ number_format($totalMetrics['monthly_sales'], 2) }}</h4>
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
                                        <td class="text-center">{{ number_format($employee->service_count) }}</td>
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
    
  </div>
  <!-- / Layout wrapper -->

    
      
    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/theme.js -->
    
    
      <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('vendor/libs/%40algolia/autocomplete-js.js') }}"></script>
    <script src="{{ asset('vendor/libs/pickr/pickr.js') }}"></script>
    <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('vendor/js/menu.js') }}"></script>
    
    <!-- endbuild -->

    <!-- Vendors JS -->
    < <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
  <script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>
  <script src="{{ asset('vendor/libs/cleave-zen/cleave-zen.js') }}"></script>

    <!-- Main JS -->
    
      <script src="../../assets/js/main.js"></script>
    

    <!-- Page JS -->
  <script src="../../assets/js/employee-sales.js"></script>
 






<link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
     <link  rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}"  />
    <!-- Row Group CSS -->
    <link rel="stylesheet"  href="{{ asset('vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />

<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />


<!-- DataTables Buttons JS -->
<script src="{{ asset('vendor/libs/datatables-buttons/datatables-buttons.js') }}"></script>
<script src="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>
<script src="{{ asset('vendor/libs/jszip/jszip.js') }}"></script>
<script src="{{ asset('vendor/libs/pdfmake/pdfmake.js') }}"></script>
<script src="{{ asset('vendor/libs/datatables-buttons/buttons.html5.js') }}"></script>
<script src="{{ asset('asset/vendor/libs/datatables-buttons/buttons.print.js') }}"></script>


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




<!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/app-invoice-preview.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:26:33 GMT -->
</html>

  <!-- beautify ignore:end -->



