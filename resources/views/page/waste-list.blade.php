@extends('layouts.app')



<!DOCTYPE html>

<html
  lang="en"
  class="layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-skin="default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template"
  data-bs-theme="light"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Imajica Booking System</title>

    <meta name="description" content="Imajica Booking System" />

    <meta name="keywords" content="Imajica Booking System" />
    <meta property="og:title" content="Imajica Booking System" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="Imajica Booking System" />
    <meta
      property="og:image"
      content="../../../../pixinvent.com/wp-content/uploads/2023/06/vuexy-hero-image.png"
    />
    <meta property="og:description" content="Imajica Booking System." />
    <meta property="og:site_name" content="Pixinvent" />
    <link rel="canonical" href="Imajica Booking System" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset(path:'logo/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
      rel="stylesheet"
    />

  <link rel="stylesheet" href="/public/vendor/libs/node-waves/node-waves.css" />
 <link rel="stylesheet" href="/public/vendor/libs/pickr/pickr-themes.css" />
  <link rel="stylesheet" href="/public/vendor/css/core.css">
  <link rel="stylesheet" href="/public/css/demo.css" />

    <link rel="stylesheet" href="/public/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
  <link rel="stylesheet" href="/public/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
  <link rel="stylesheet" href="/public/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" >
  <link rel="stylesheet" href="/public/vendor/libs/select2/select2.css" />

 
  
  <script src="/public/vendor/js/helpers.js"></script>
 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="../../assets/js/config.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>

  
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        @include('components.sidebar')
        <!-- / Menu -->

        <div class="menu-mobile-toggler d-xl-none rounded-1">
          <a
            href="javascript:void(0);"
            class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1"
          >
            <i class="ti tabler-menu icon-base"></i>
            <i class="ti tabler-chevron-right icon-base"></i>
          </a>
        </div>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">


          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card">
                <!-- Header -->
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="card-title mb-0">Inventory Waste List</h5>
                  <div class="d-flex gap-2">
                    <button id="exportExcel" class="btn btn-primary">
                      <i class="ti tabler-download me-1"></i>Export Excel
                    </button>
                    <a href="{{ route('page.new-waste') }}" class="btn btn-success">
                      <i class="ti tabler-plus me-1"></i> Add New Waste
                    </a>
                  </div>
                </div>

                <!-- Table -->
                <div class="table-responsive text-nowrap px-3">
                  <table class="table border-top" id="wasteTable">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>PRODUCT NAME</th>
                        <th>QUANTITY</th>
                        <th>REASON</th>
                        <th>DATE ADDED</th>
                        <th>ACTIONS</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($wastes as $waste)
                      <tr>
                        <td>{{ $waste->id }}</td>
                        <td>{{ $waste->product ? $waste->product->name : 'N/A' }}</td>
                        <td>{{ $waste->quantity }}</td>
                        <td>{{ $waste->reason }}</td>
                        <td>{{ $waste->date_added }}</td>
                        <td>
                          <div class="d-flex gap-2">
                            <a href="{{ route('waste.edit', $waste->id) }}" class="btn btn-sm btn-info">
                              <i class="ti tabler-edit me-1"></i>Edit
                            </a>
                            <button type="button" class="btn btn-sm btn-danger delete-waste"
                                    data-id="{{ $waste->id }}">
                              <i class="ti tabler-trash me-1"></i>Delete
                            </button>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column"
                >
                  <div class="text-body">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    Developed by
                    <a
                      href="https://intra-code.com/"
                      target="_blank"
                      class="footer-link"
                      >Intracode IT Solutions</a
                    >
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


  <script src="/public/vendor/libs/jquery/jquery.js"></script>
   <script src="/public/vendor/libs/popper/popper.js"></script>
<script src="/public/vendor/js/bootstrap.js"></script>
  <script src="/public/vendor/libs/node-waves/node-waves.js"></script>

     <script src="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-js"></script>

    <script src="/public/vendor/libs/pickr/pickr.js"></script>
  <script src="/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="/public/vendor/libs/hammer/hammer.js"></script>
<script src="/public/vendor/libs/i18n/i18n.js"></script>
  <script src="/public/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
   <script src="/public/vendor/libs/cleave-zen/cleave-zen.js"></script>
     <script src="/public/vendor/libs/select2/select2.js"></script>

    <script src="/public/vendor/libs/moment/moment.js"></script>
    <script src="/public/vendor/libs/flatpickr/flatpickr.js"></script>
     <script src="/public/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
     <script src="/public/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
   <script src="/public/vendor/libs/pickr/pickr.js"></script>



    <script src="/public/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="/public/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
    <script src="/public/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
     <script src="/public/vendor/libs/jszip/jszip.j"></script>
  <script src="/public/vendor/libs/pdfmake/pdfmake.js"></script>
    <script src="/public/vendor/libs/datatables-buttons/buttons.html5.js"></script>
    <script src="/public/assets/vendor/libs/datatables-buttons/buttons.print.js"></script>

    <script src="/public/vendor/libs/moment/moment.js"></script>
    <script src="/public/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="/public/vendor/libs/@form-validation/popular.js"></script>
    <script src="/publicvendor/libs/%40form-validation/bootstrap5.js"></script>
  <script src="/public/vendor/libs/@form-validation/auto-focus.js"></script>

    <!-- Main JS -->

    <script src="/public/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/public/assets/js/form-layouts.js"></script>
    <script src="/public/assets/js/forms-pickers.js"></script>

    <!-- Custom Script for Waste Management -->
    <script>
      $(document).ready(function() {
        var wasteTable = $('#wasteTable').DataTable({
          responsive: true,
          pageLength: 10,
          lengthMenu: [5, 10, 25, 50],
          dom: '<"d-flex justify-content-between align-items-center mx-2 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"table-responsive"t><"d-flex justify-content-end align-items-center mx-2 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6 d-flex justify-content-end"p>>',
          language: {
            search: "",
            searchPlaceholder: "Search Waste...",
            lengthMenu: "_MENU_ entries per page",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            paginate: {
              previous: '←',
              next: '→'
            }
          }
        });

        // Excel export button click handler
        $('#exportExcel').on('click', function() {
            // Get the filtered data
            var filteredData = wasteTable.rows({ search: 'applied' }).data();
            
            // Create a new workbook
            var wb = XLSX.utils.book_new();
            
            // Prepare the data for export
            var exportData = [];
            // Add headers
            exportData.push(['ID', 'Product Name', 'Quantity', 'Reason', 'Date Added']);
            
            // Add filtered data
            filteredData.each(function(data) {
                exportData.push([
                    data[0], // ID
                    data[1], // Product Name
                    data[2], // Quantity
                    data[3], // Reason
                    data[4]  // Date Added
                ]);
            });
            
            // Create worksheet
            var ws = XLSX.utils.aoa_to_sheet(exportData);
            
            // Add worksheet to workbook
            XLSX.utils.book_append_sheet(wb, ws, 'Waste List');
            
            // Generate Excel file and trigger download
            XLSX.writeFile(wb, 'waste_list.xlsx');
        });

        // Delete waste functionality
        $('.delete-waste').on('click', function() {
          var wasteId = $(this).data('id');
          
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
              confirmButton: 'btn btn-danger me-3',
              cancelButton: 'btn btn-secondary'
            },
            buttonsStyling: false
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: '/waste/' + wasteId,
                type: 'DELETE',
                data: {
                  _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                  Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: 'Waste has been deleted.',
                    customClass: {
                      confirmButton: 'btn btn-success'
                    }
                  }).then(() => {
                    location.reload();
                  });
                },
                error: function(xhr) {
                  Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Something went wrong.',
                    customClass: {
                      confirmButton: 'btn btn-primary'
                    }
                  });
                }
              });
            }
          });
        });
      });
    </script>

    <script>
           $('.edit-waste').on('click', function() {
          const wasteId = $(this).data('id');
          window.location.href = `/waste/${wasteId}/edit`;
        });
    </script>

    <script>
           // SweetAlert2 confirmation config
           const swalConfig = {
          customClass: {
            confirmButton: 'btn btn-danger me-3',
            cancelButton: 'btn btn-secondary'
          },
          buttonsStyling: false,
          backdrop: true,
          allowOutsideClick: false
        };

        // Display success/error messages from session
        @if(session('success'))
          Swal.fire({
            ...swalConfig,
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
            timer: 1500,
            showConfirmButton: false
          });
        @endif

        @if(session('error'))
          Swal.fire({
            ...swalConfig,
            icon: 'error',
            title: 'Error',
            text: "{{ session('error') }}"
          });
        @endif
    </script>

    <!-- Add the same styling as category list -->
    <style>
      /* Make table borders lighter */
      #wasteTable th, #wasteTable td {
        border-color: rgba(0,0,0,0.07) !important;
      }
      #wasteTable {
        border-color: rgba(0,0,0,0.07) !important;
      }
      /* Align DataTables controls */
      .dataTables_wrapper .dataTables_length {
        float: left;
        margin-bottom: 1rem;
        margin-left: 2rem;
      }
      .dataTables_wrapper .dataTables_filter {
        float: right;
        margin-bottom: 1rem;
        margin-right: 2rem;
        max-width: 300px;
      }
      .dataTables_wrapper .dataTables_filter input[type="search"] {
        max-width: 200px;
        display: inline-block;
      }
      /* Align pagination to the right */
      .dataTables_wrapper .dataTables_paginate {
        display: flex;
        justify-content: flex-end;
        width: 100%;
        padding-right: 15px;
      }
      .dataTables_wrapper .dataTables_info {
        padding-left: 15px;
      }
      /* Style pagination buttons */
      .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0.5rem 0.75rem;
        margin: 0 2px;
        border-radius: 5px;
        min-width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        color: #6f6b7d !important;
      }
      .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #7367f0 !important;
        color: #fff !important;
        border: 1px solid #7367f0 !important;
      }
      .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current) {
        background: #f6f6f6 !important;
        border: 1px solid #ddd !important;
        color: #6f6b7d !important;
      }
      /* Hide numbered pagination buttons */
      .dataTables_wrapper .dataTables_paginate .paginate_button:not(.previous):not(.next) {
        display: none;
      }
      @media (max-width: 767.98px) {
        .dataTables_wrapper .dataTables_paginate {
          justify-content: center;
          padding-right: 0;
        }
        .dataTables_wrapper .dataTables_info {
          text-align: center;
          padding-left: 0;
        }
      }
    </style>

  </body>

  <!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/form-layouts-sticky.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:27:42 GMT -->
</html>

