@extends('layouts.app')

@section('content')
<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default" data-assets-path="../../assets/" data-template="vertical-menu-template" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    
    <title>Imajica Booking System</title>
    
    <meta name="description" content="Vuexy is the best bootstrap 5 dashboard for responsive web apps. Streamline your app development process with ease." />
    <!-- Canonical SEO -->
    <meta name="keywords" content="Vuexy bootstrap dashboard, vuexy bootstrap 5 dashboard, themeselection, html dashboard, web dashboard, frontend dashboard, responsive bootstrap theme" />
    <meta property="og:title" content="Vuexy bootstrap Dashboard by Pixinvent" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="https://themeforest.net/item/vuexy-vuejs-html-laravel-admin-dashboard-template/23328599" />
    <meta property="og:image" content="../../../../pixinvent.com/wp-content/uploads/2023/06/vuexy-hero-image.png" />
    <meta property="og:description" content="Vuexy is the best bootstrap 5 dashboard for responsive web apps. Streamline your app development process with ease." />
    <meta property="og:site_name" content="Pixinvent" />
    <link rel="canonical" href="https://themeforest.net/item/vuexy-vuejs-html-laravel-admin-dashboard-template/23328599" />
    
    <!-- Favicon -->
     <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

   <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <link  rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />
    <link  rel="stylesheet" href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"  />

    <link  rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}"  />

    <!-- Page CSS -->
     <link rel="stylesheet" href="{{ asset('vendor/css/pages/app-invoice.css') }}" />

    <!-- Helpers -->
     <script src="{{ asset('vendor/js/helpers.js') }}"></script>
  
    <!-- Config -->
    <script src="../../assets/js/config.js"></script>
    <script src="../../assets/sales-transaction.json"></script>
    <script src="../../assets/js/sales-transaction.js"></script>

    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />

    <!-- DataTables Buttons JS -->
    <script src="../../assets/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
    <script src="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/jszip/jszip.js"></script>
    <script src="../../assets/vendor/libs/pdfmake/pdfmake.js"></script>
    <script src="../../assets/vendor/libs/datatables-buttons/buttons.html5.js"></script>
    <script src="../../assets/vendor/libs/datatables-buttons/buttons.print.js"></script>

    <style>
      .card-weekly-voided {
        background-color: #d4edda; /* Light green */
      }
      .card-daily-voided {
        background-color: #cce5ff; /* Light blue */
      }
      .card-total-voided {
        background-color: #fff3cd; /* Light yellow */
      }
      .card-monthly-voided {
        background-color: #d1ecf1; /* Light cyan */
      }
      .dark-green-header {
        background-color: #1b392f !important;
        color: white !important;
      }
    </style>        
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    @include('components.sidebar')

    <div class="menu-mobile-toggler d-xl-none rounded-1">
      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
        <i class="ti tabler-menu icon-base"></i>
        <i class="ti tabler-chevron-right icon-base"></i>
      </a>
    </div>

    <!-- Layout container -->
    <div class="layout-page">
      <!-- Content wrapper -->
      <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="col-12">
              <h4 class="fw-bold py-3 mb-4">Logs</h4>

              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="card card-custom card-total-voided">
                        <div class="card-body">
                          <p class="card-text"><strong>Total Voided Sales</strong></p>
                          <h4 class="text-black">₱{{ number_format($voids->where('status', 'Cancelled')->sum(function($void) {
                              return optional($void->service)->service_cost ?? 0;
                          }), 2) }}</h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="card card-custom card-monthly-voided">
                        <div class="card-body">
                          <p class="card-text"><strong>Monthly Voided Sales</strong></p>
                          <h4 class="text-black">₱{{ number_format($voids->where('status', 'Cancelled')
                              ->filter(function($void) {
                                  return \Carbon\Carbon::parse($void->start_date)->isCurrentMonth();
                              })->sum(function($void) {
                                  return optional($void->service)->service_cost ?? 0;
                              }), 2) }}</h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="card card-custom card-weekly-voided">
                        <div class="card-body">
                          <p class="card-text"><strong>Weekly Voided Sales</strong></p>
                          <h4 class="text-black">₱{{ number_format($voids->where('status', 'Cancelled')
                              ->filter(function($void) {
                                  return \Carbon\Carbon::parse($void->start_date)->isCurrentWeek();
                              })->sum(function($void) {
                                  return optional($void->service)->service_cost ?? 0;
                              }), 2) }}</h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="card card-custom card-daily-voided">
                        <div class="card-body">
                          <p class="card-text"><strong>Daily Voided Sales</strong></p>
                          <h4 class="text-black">₱{{ number_format($voids->where('status', 'Cancelled')
                              ->filter(function($void) {
                                  return \Carbon\Carbon::parse($void->start_date)->isToday();
                              })->sum(function($void) {
                                  return optional($void->service)->service_cost ?? 0;
                              }), 2) }}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <div class="container">
                    <table class="table table-striped" id="voidTable">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Service</th>
                          <th>Customer</th>
                          <th>Staff</th>
                          <th>Amount Voided</th>
                          <th>Status</th>
                          <th>Date Voided</th>
                          <th>Branch</th>
                        </tr>
                      </thead>
                      <tbody>
    @foreach ($voids as $void)
    <tr>
        <td>{{ $void->booking_id }}</td>
        <td>{{ optional($void->service)->service_name ?? 'N/A' }}</td>
        <td>{{ optional($void->patient)->firstname ?? 'N/A' }} {{ optional($void->patient)->lastname ?? '' }}</td>
        <td>{{ optional($void->staff)->firstname ?? 'N/A' }} {{ optional($void->staff)->lastname ?? '' }}</td>
        <td>₱{{ number_format(optional($void->service)->service_cost ?? 0, 2) }}</td>
        <td>{{ $void->status }}</td>
        <td>{{ $void->start_date }}</td>
        <td>{{ optional($void->branch)->branch_name ?? 'N/A' }}</td>
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
        <!-- / Content -->

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
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/theme.js -->
  <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../../assets/vendor/libs/popper/popper.js"></script>
  <script src="../../assets/vendor/js/bootstrap.js"></script>
  <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
  <script src="../../assets/vendor/libs/%40algolia/autocomplete-js.js"></script>
  <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
  <script src="../../assets/vendor/libs/pickr/pickr.js"></script>
  <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
  <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
  <script src="../../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../../assets/vendor/libs/moment/moment.js"></script>
  <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
  <script src="../../assets/vendor/libs/cleave-zen/cleave-zen.js"></script>

  <!-- Main JS -->
  <script src="../../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../../assets/js/void-logs.js"></script>
  <script src="../../assets/void-logs.json"></script>

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
  <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
  <link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
  <link rel="stylesheet" href="../../assets/vendor/libs/flatpickr/flatpickr.css" />
  <!-- Row Group CSS -->
  <link rel="stylesheet" href="../../assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css" />

  <script>
    $(document).ready(function () {
      var table = $("#voidTable").DataTable({
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
        columnDefs: [
          { className: "text-center", targets: [0, 5] },
          { className: "text-end", targets: [4] }
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
@endsection