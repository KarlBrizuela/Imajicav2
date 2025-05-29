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

    <title>Edit Coupon - Imajica Booking System</title>

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
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.png') }}" />

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

    <link rel="stylesheet"  href="/public/vendor/libs/node-waves/node-waves.css}"/>
    <link rel="stylesheet" href="/public/vendor/libs/pickr/pickr-themes.css}" />
    <link rel="stylesheet" href="/public/vendor/css/core.css" />
    <link rel="stylesheet" href="/public/css/demo.css" />

    <!-- Vendors CSS -->

    <link rel="stylesheet"  href="/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link  rel="stylesheet"  href="/public/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="/public/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
    <link  rel="stylesheet"  href="/public/vendor/libs/jquery-timepicker/jquery-timepicker.css" />

    <!-- endbuild -->

    <link  rel="stylesheet" href="/public/vendor/libs/select2/select2.css"  />

    <!-- Add SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/public/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="/public/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

               @include('components.sidebar')

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
                      class="card-header bg-dark-green d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row"
                      style="background-color: #0a3622"
                    >
                      <h5 class="card-title mb-sm-0 me-2 text-white">
                        Edit Coupon
                      </h5>
                      <div>
                        <a href="{{ route('page.coupon-list') }}" class="btn btn-sm btn-light">
                          <i class="ti tabler-arrow-left me-1"></i> Back to List
                        </a>
                      </div>
                    </div>
                    <div class="card-body pt-6">
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul class="mb-0">
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
          
                      @if(session('success'))
                          <div class="alert alert-success">
                              {{ session('success') }}
                          </div>
                      @endif

                      @if(session('error'))
                          <div class="alert alert-danger">
                              {{ session('error') }}
                          </div>
                      @endif
                      
                      <div class="row">
                        <div class="col-lg-8 mx-auto">
                      
                        <form method="post" action="{{ route('coupon.update') }}">
                            @csrf
                            @method('PUT')
                          
                            <input type="hidden" name="coupon_code" value="{{ $coupon->coupon_code }}">
                          
                            <div class="row g-6">
                              <div class="col-md-6">
                                <label class="form-label" for="coupon_code_display">Coupon Code</label>
                                <input
                                  type="text"
                                  id="coupon_code_display"
                                  class="form-control"
                                  value="{{ $coupon->coupon_code }}"
                                  disabled
                                />
                                <small class="text-muted">Coupon code cannot be changed</small>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="discount_name">Coupon Name</label>
                                <input
                                  type="text"
                                  id="discount_name"
                                  name="discount_name"  
                                  class="form-control"
                                  placeholder="Coupon Name"
                                  value="{{ $coupon->discount_name }}"
                                  required
                                />
                              </div>

                              <div class="col-12">
                                <label class="form-label" for="description">Description</label>
                                <textarea
                                  name="description"
                                  class="form-control"
                                  id="description"
                                  rows="4"
                                  placeholder="Coupon Description"
                                  required
                                >{{ $coupon->description }}</textarea>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label">Discount Type</label>
                                <select
                                  class="select2 form-select"
                                  id="discount_type"
                                  name="discount_type"
                                  required
                                >
                                  <option value="fixed" {{ $coupon->discount_type == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                                  <option value="percentage" {{ $coupon->discount_type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                </select>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="discount_value">Discount Value</label>
                                <input
                                  type="text"
                                  id="discount_value"
                                  name="discount_value"
                                  class="form-control"
                                  placeholder="Amount"
                                  value="{{ $coupon->discount_value }}"
                                  required
                                />
                              </div>

                              <div class="col-md-6">
                                <label class="form-label">Applicable Services</label>
                                <select
                                  class="select2 form-select"
                                  name="service_id"
                                  id="service_id"
                                  required
                                >
                                  <option value="">Select Applicable Services</option>
                                  @foreach($services as $service)
                                    <option value="{{ $service->service_id }}" {{ $coupon->service_id == $service->service_id ? 'selected' : '' }}>
                                      {{ $service->service_name }}
                                    </option>
                                  @endforeach
                                </select>
                              </div>

                              <div class="col-md-6">
                                <label for="start_end_date" class="form-label">Start and End Date</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="YYYY-MM-DD to YYYY-MM-DD"
                                  id="start_end_date"
                                  name="start_end_date"
                                  value="{{ $coupon->start_end_date }}"
                                  required
                                />
                              </div>

                              <div class="col-xl-12">
                                <label class="form-label">New Customers Only</label>
                                <div class="row">
                                  <div class="col-md mb-md-0 mb-5">
                                    <div class="form-check custom-option custom-option-basic">
                                      <label
                                        class="form-check-label custom-option-content"
                                        for="new_customer_yes"
                                      >
                                        <input
                                          name="new_customer"
                                          class="form-check-input"
                                          type="radio"
                                          value="Yes"
                                          id="new_customer_yes"
                                          {{ $coupon->new_customer == 'Yes' ? 'checked' : '' }}
                                        />
                                        <span class="custom-option-header">
                                          <span class="h6 mb-0">Yes</span>
                                        </span>
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-md">
                                    <div class="form-check custom-option custom-option-basic">
                                      <label
                                        class="form-check-label custom-option-content"
                                        for="new_customer_no"
                                      >
                                        <input
                                          name="new_customer"
                                          class="form-check-input"
                                          type="radio"
                                          value="No"
                                          id="new_customer_no"
                                          {{ $coupon->new_customer == 'No' ? 'checked' : '' }}
                                        />
                                        <span class="custom-option-header">
                                          <span class="h6 mb-0">No</span>
                                        </span>
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-12">
                                <label class="form-label">Branch</label>
                                <select
                                  class="select2 form-select"
                                  name="branch_code"
                                  required
                                >
                                  <option value="">Select Branch</option>
                                  @foreach($branches as $branch)
                                    <option value="{{ $branch->branch_code }}" {{ $coupon->branch_code == $branch->branch_code ? 'selected' : '' }}>
                                      {{ $branch->branch_name }}
                                    </option>
                                  @endforeach
                                </select>
                              </div>
                            </div>

                            <br />
                            <div class="d-flex gap-3">
                              <div class="col-sm-2 col-4 d-grid">
                                <button type="submit" class="btn btn-primary">Update Coupon</button>
                              </div>
                              <div class="col-sm-2 col-4 d-grid">
                                <a href="{{ route('page.coupon-list') }}" class="btn btn-outline-secondary">Cancel</a>
                              </div>
                            </div>
                            <br />
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

    <!-- Add SweetAlert JS before closing body -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/theme.js -->

    <script src="/public/vendor/libs/jquery/jquery.js"></script>
    <script src="/public/vendor/libs/popper/popper.js"></script>
<script src="/public/vendor/js/bootstrap.js"></script>
  <script src="/public/vendor/libs/node-waves/node-waves.js"></script>
  <script src="{{ asset('vendor/libs/%40algolia/autocomplete-js.js') }}"></script>
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

    <!-- Main JS -->

    <script src="/public/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/public/'assets/js/form-layouts.js"></script>
    <script src="/public/assets/js/forms-pickers.js"></script>
    <script>
      // Initialize date range picker
      document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#start_end_date", {
          mode: "range",
          dateFormat: "Y-m-d",
          defaultDate: "{{ $coupon->start_end_date }}".split(' to ')
        });
        
        // Initialize select2
        $('.select2').select2();
      });
    </script>
  </body>
</html>