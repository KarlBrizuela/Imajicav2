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

   <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />

    
    <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.js') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" >
  <link rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}" />
  
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="../../assets/js/config.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  
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
                  <a href="{{ route('page.new-waste') }}" class="btn btn-primary">
                    <i class="ti tabler-plus me-1"></i> Add New Waste
                  </a>
                </div>

                <!-- Table -->
                <div class="table-responsive text-nowrap px-3">
                  <table class="table table-striped" id="wasteTable">
                    <thead class="table-light">
                      <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Reason</th>
                        <th>Date Added</th>
                        <th>Actions</th>
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


   <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
   <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
 <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>

     <script src="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-js"></script>

    <script src="{{ asset('vendor/libs/pickr/pickr.js') }}"></script>

    <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>

     <script src="{{ asset('vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
   <script src="{{ asset('vendor/libs/cleave-zen/cleave-zen.js') }}"></script>
     <script src="{{ asset('vendor/libs/select2/select2.js') }}"></script>

    <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
    <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
     <script src="{{ asset('vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
     <script src="{{ asset('vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
   <script src="{{ asset('vendor/libs/pickr/pickr.js') }}"></script>



    <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="../../assets/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>
     <script src="{{ asset('vendor/libs/jszip/jszip.js') }}"></script>
  <script src="{{ asset('vendor/libs/pdfmake/pdfmake.js') }}"></script>
    <script src="../../assets/vendor/libs/datatables-buttons/buttons.html5.js"></script>
    <script src="../../assets/vendor/libs/datatables-buttons/buttons.print.js"></script>

    <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
    <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="{{ asset('vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="../../assets/vendor/libs/%40form-validation/bootstrap5.js"></script>
  <script src="{{ asset('vendor/libs/@form-validation/auto-focus.js') }}"></script>

    <!-- Main JS -->

    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/form-layouts.js"></script>
    <script src="../../assets/js/forms-pickers.js"></script>

    <!-- Custom Script for Waste Management -->
    <script>
      $(document).ready(function() {
        var table = $('#wasteTable').DataTable({
          responsive: true,
          searching: true,
          lengthChange: true,
          info: true
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

        // Handle delete waste button clicks
        $('.delete-waste').on('click', function() {
          const wasteId = $(this).data('id');
          
          Swal.fire({
            ...swalConfig,
            title: 'Confirm Delete',
            text: 'Are you sure you want to delete this waste record? This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
          }).then((result) => {
            if (result.isConfirmed) {
              // Send AJAX delete request
              $.ajax({
                url: `/waste/${wasteId}`,
                type: 'DELETE',
                data: {
                  _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                  Swal.fire({
                    ...swalConfig,
                    icon: 'success',
                    title: 'Deleted!',
                    text: response.message || 'Waste record has been deleted.',
                    timer: 1500,
                    showConfirmButton: false
                  }).then(() => {
                    location.reload();
                  });
                },
                error: function(xhr) {
                  Swal.fire({
                    ...swalConfig,
                    icon: 'error',
                    title: 'Error',
                    text: xhr.responseJSON?.message || 'Failed to delete waste record'
                  });
                }
              });
            }
          });
        });

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

  </body>

  <!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/form-layouts-sticky.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:27:42 GMT -->
</html>

