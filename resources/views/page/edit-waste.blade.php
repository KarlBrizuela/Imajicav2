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

    <link rel="stylesheet" href="/public/vendor/fonts/iconify-icons.css" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="/public/vendor/libs/node-waves/node-waves.css" />
 <link rel="stylesheet" href="/public/vendor/libs/pickr/pickr-themes.css" />
  <link rel="stylesheet" href="/public/vendor/css/core.css">
  <link rel="stylesheet" href="/public/css/demo.css" />
    

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <!-- endbuild -->

   <link rel="stylesheet" href="/public/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
  <link rel="stylesheet" href="/public/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
  <link rel="stylesheet" href="/public/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" >
  <link rel="stylesheet" href="/public/vendor/libs/select2/select2.css" />

    <!-- endbuild -->




    <!-- Page CSS -->

    <!-- Helpers -->
  <script src="/public/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/public/assets/js/config.js"></script>
    <!-- Add SweetAlert2 CDN -->
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
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div
                      class="card-header sticky-element d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row"
                      style="background-color: #0a3622"
                    >
                      <h5 class="card-title mb-sm-0 me-2 text-white">
                        Edit Waste Record
                      </h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-8 mx-auto">
                          <form id="editWasteForm" action="{{ route('waste.update', $waste->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                              <div class="col-12">
                                <label class="form-label" for="product_id">ITEM NAME</label>
                                <select id="product_id" name="product_id" class="form-select" required>
                                  <option value="">Search Item</option>
                                  @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ $waste->product_id == $product->id ? 'selected' : '' }}>
                                      {{ $product->name }}
                                    </option>
                                  @endforeach
                                </select>
                              </div>

                              <div class="col-12">
                                <label class="form-label" for="quantity">QUANTITY</label>
                                <input
                                  type="number"
                                  id="quantity"
                                  name="quantity" 
                                  class="form-control"
                                  value="{{ $waste->quantity }}"
                                  required
                                />
                              </div>

                              <div class="col-12">
                                <label class="form-label" for="reason">REASON</label>
                                <textarea
                                  id="reason"
                                  name="reason"
                                  class="form-control"
                                  rows="4"
                                  required
                                >{{ $waste->reason }}</textarea>
                              </div>
                            </div>

                            <div class="row mt-4">
                              <div class="col-12">
                                <button type="button" class="btn btn-secondary" id="cancelBtn">CANCEL</button>
                                <button type="submit" class="btn btn-primary" id="updateItemBtn">UPDATE</button>
                              </div>  
                            </div>
                          </form>
                        </div>
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
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/theme.js -->

    <script src="/public/vendor/libs/jquery/jquery.js"></script>
    <script src="/public/vendor/libs/popper/popper.js"></script>
    <script src="/public/vendor/js/bootstrap.js"></script>
  <script src="/public/vendor/libs/node-waves/node-waves.js"></script>
     <script src="/public/vendor/libs/%40algolia/autocomplete-js.js"></script>
    <script src="/public/vendor/libs/pickr/pickr.js"></script>
  <script src="/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="/public/vendor/libs/hammer/hammer.js"></script>
<script src="/public/vendor/libs/i18n/i18n.js"></script>
  <script src="/public/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
   <script src="/public/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
   <link rel="stylesheet" href="/public/vendor/libs/select2/select2.css" />


    <script src="/public/vendor/libs/moment/moment.js"></script>
    <script src="/public/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="/public/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="/public/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
    <script src="/public/vendor/libs/pickr/pickr.js"></script>

    <!-- Main JS -->

    <script src="/public/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/public/assets/js/form-layouts.js"></script>
    <script src="../../assets/js/forms-pickers.js"></script>


    <script>
      $(document).ready(function() {
        // Initialize select2
        $('#product_id').select2({
          placeholder: "Search for an item...",
          allowClear: true
        });

        // Handle form submission
        $('#editWasteForm').on('submit', function(e) {
          e.preventDefault();
          
          Swal.fire({
            title: 'Confirm Update',
            text: 'Are you sure you want to update this waste record?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0A3622',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'Cancel'
          }).then((result) => {
            if (result.isConfirmed) {
              $('#updateItemBtn').prop('disabled', true).html('Processing...');
              
              $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                  if(response.status) {
                    Swal.fire({
                      icon: 'success',
                      title: 'Success!',
                      text: response.message,
                      showConfirmButton: true,
                      confirmButtonText: 'OK',
                      allowOutsideClick: false
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href = "{{ route('page.waste-list') }}";
                      }
                    });
                  } else {
                    Swal.fire({
                      icon: 'error',
                      title: 'Error!',
                      text: response.message,
                      confirmButtonText: 'Try Again'
                    });
                  }
                },
                error: function(xhr) {
                  let errorMessage = 'An error occurred while processing your request.';
                  
                  if(xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMessage = Object.values(xhr.responseJSON.errors).flat().join('\n');
                  }
                  
                  Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: errorMessage,
                    confirmButtonText: 'Try Again'
                  });
                },
                complete: function() {
                  $('#updateItemBtn').prop('disabled', false).html('UPDATE');
                }
              });
            }
          });
        });

        // Handle cancel button
        $('#cancelBtn').on('click', function() {
          Swal.fire({
            title: 'Are you sure?',
            text: "You will lose any unsaved changes!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0A3622',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, cancel!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "{{ route('page.waste-list') }}";
            }
          });
        });
      });
    </script>
  </body>

  <!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/form-layouts-sticky.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:27:42 GMT -->
</html>

<!-- beautify ignore:end -->
