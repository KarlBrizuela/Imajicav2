@extends('layouts.app')
<!DOCTYPE html>

<html
  lang="en"
  class="layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-skin="default"
  data-assets-path="{{ asset('assets/') }}"
  data-template="vertical-menu-template"
  data-bs-theme="light"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Imajica Booking System - Edit Loyalty Tier</title>

    <meta name="description" content="Imajica Booking System" />

    <meta name="keywords" content="Imajica Booking System" />
    <meta property="og:title" content="Imajica Booking System" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="Imajica Booking System" />
    <meta
      property="og:image"
      content="{{ asset('assets/img/vuexy-hero-image.png') }}"
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

    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />

    <!-- Add SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
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
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Sticky Actions -->
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div
                      class="card-header d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row"
                      style="background-color: #0a3622"
                    >
                      <h5 class="card-title mb-sm-0 me-2 text-white">
                        Edit Loyalty Tier
                      </h5>
                    </div>
                    <div class="card-body pt-6">
                      <!-- Display validation errors if any -->
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                      
                      <!-- Display success message if any -->
                      @if(session('success'))
                          <div class="alert alert-success">
                              {{ session('success') }}
                          </div>
                      @endif
                      
                      <!-- Display error message if any -->
                      @if(session('error'))
                          <div class="alert alert-danger">
                              {{ session('error') }}
                          </div>
                      @endif
                      
                      <div class="row">
                        <div class="col-lg-8 mx-auto">
                          <!-- Loyalty Tier Form -->
                          <form method="post" action="{{ route('tier.update') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="patient_tier_id" value="{{ $tier->patient_tier_id }}">
                            
                            <div class="row g-3 mb-4">
                              <div class="col-12">
                                <h6 class="fw-semibold">Loyalty Tier Information</h6>
                                <hr class="mt-0" />
                              </div>
                              
                              <div class="col-md-6">
                                <label class="form-label" for="tier_name">Membership Tier Name</label>
                                <input
                                  type="text"
                                  id="tier_name"
                                  name="tier_name"
                                  class="form-control"
                                  value="{{ $tier->tier_name }}"
                                  required
                                />
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="points_required">Points Required to Achieve Tier</label>
                                <input
                                  type="number"
                                  id="points_required"
                                  name="points_required"
                                  class="form-control"
                                  value="{{ $tier->points_required }}"
                                  required
                                />
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="points_to_redeem">Points Required to Redeem</label>
                                <input
                                  type="number"
                                  id="points_to_redeem"
                                  name="points_to_redeem"
                                  class="form-control"
                                  value="{{ $tier->points_to_redeem }}"
                                  required
                                />
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="tier_lenght">Tier Expiry / Downgrade Rule</label>
                                <select
                                  class="select2 form-select"
                                  name="tier_lenght"
                                  id="tier_lenght"
                                  data-allow-clear="true"
                                  required
                                >
                                  <option value="Never Expires" {{ $tier->tier_lenght == 'Never Expires' ? 'selected' : '' }}>Never Expires</option>
                                  <option value="6 Month Inactivity" {{ $tier->tier_lenght == '6 Month Inactivity' ? 'selected' : '' }}>Downgrade if No Activity for 6 Months</option>
                                  <option value="Yearly Reset" {{ $tier->tier_lenght == 'Yearly Reset' ? 'selected' : '' }}>Reset Every Year</option>
                                </select>
                              </div>

                              <div class="col-12">
                                <label class="form-label" for="remarks">Remarks</label>
                                <textarea
                                  name="remarks"
                                  class="form-control"
                                  id="remarks"
                                  rows="4"
                                >{{ $tier->remarks }}</textarea>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-12 d-flex gap-3">
                                <button type="submit" class="btn btn-primary me-1" id="updateBtn">Update Tier</button>
                                <a href="{{ route('page.loyalty-list') }}" class="btn btn-outline-secondary">Cancel</a>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Sticky Actions -->
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

    <!-- Add SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/%40algolia/autocomplete-js.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/cleave-zen/cleave-zen.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
    <script src="{{ asset('assets/js/forms-pickers.js') }}"></script>

    <!-- Add SweetAlert confirmation for update -->
    <script>
      $(document).ready(function() {
        // SweetAlert default configuration to appear above the modal
        const swalConfig = {
          customClass: {
            container: 'swal-container-class',
            popup: 'swal-popup-class'
          },
          backdrop: true,
          allowOutsideClick: false
        };
        
        // Add custom CSS to ensure SweetAlert appears above modal
        $('<style>')
          .prop('type', 'text/css')
          .html(`
            .swal-container-class {
              z-index: 2000 !important;
            }
            .swal-popup-class {
              z-index: 2001 !important;
            }
            .swal2-backdrop-show {
              z-index: 1999 !important;
            }
          `)
          .appendTo('head');

        // Handle form submission with confirmation
        $('form').on('submit', function(e) {
          e.preventDefault();
          
          Swal.fire({
            ...swalConfig,
            title: 'Confirm Update',
            text: 'Are you sure you want to update this loyalty tier?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#0a3622',
            cancelButtonColor: '#d33'
          }).then((result) => {
            if (result.isConfirmed) {
              // Submit the form normally
              this.submit();
            }
          });
        });
        
        // Display success/error messages
        @if(session('success'))
          Swal.fire({
            ...swalConfig,
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: false
          });
        @endif

        @if(session('error'))
          Swal.fire({
            ...swalConfig,
            icon: 'error',
            title: 'Error',
            text: "{{ session('error') }}",
            timer: 3000,
            showConfirmButton: false
          });
        @endif

        // Display validation errors if any
        @if($errors->any())
          Swal.fire({
            ...swalConfig,
            icon: 'error',
            title: 'Validation Error',
            text: 'Please check the form for errors',
            timer: 3000,
            showConfirmButton: false
          });
        @endif
      });
    </script>
  </body>
</html>
