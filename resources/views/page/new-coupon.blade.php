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

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link
      rel="stylesheet"
      href="{{ asset('vendor/libs/node-waves/node-waves.css') }}"
    />

    <link
      rel="stylesheet"
      href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}"
    />

    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    <!-- Vendors CSS -->

    <link
      rel="stylesheet"
      href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('vendor/libs/jquery-timepicker/jquery-timepicker.css') }}"
    />

    <!-- endbuild -->

    <link
      rel="stylesheet"
      href="{{ asset('vendor/libs/select2/select2.css') }}"
    />

    <!-- Add SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="{{ asset('assets/js/config.js') }}"></script>
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
          <!-- Navbar -->

          {{-- <nav
            class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div
              class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none"
            >
              <a
                class="nav-item nav-link px-0 me-xl-6"
                href="javascript:void(0)"
              >
                <i class="icon-base ti tabler-menu-2 icon-md"></i>
              </a>
            </div>

            <div
              class="navbar-nav-right d-flex align-items-center justify-content-end"
              id="navbar-collapse"
            >
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item navbar-search-wrapper px-md-0 px-2 mb-0">
                  <a
                    class="nav-item nav-link search-toggler d-flex align-items-center px-0"
                    href="javascript:void(0);"
                  >
                    <span
                      class="d-inline-block text-body-secondary fw-normal"
                      id="autocomplete"
                    ></span>
                  </a>
                </div>
              </div>

              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                <!--/ Language -->

                <!-- Style Switcher -->
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill"
                    id="nav-theme"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown"
                  >
                    <i
                      class="icon-base ti tabler-sun icon-22px theme-icon-active text-heading"
                    ></i>
                    <span class="d-none ms-2" id="nav-theme-text"
                      >Toggle theme</span
                    >
                  </a>
                  <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="nav-theme-text"
                  >
                    <li>
                      <button
                        type="button"
                        class="dropdown-item align-items-center active"
                        data-bs-theme-value="light"
                        aria-pressed="false"
                      >
                        <span
                          ><i
                            class="icon-base ti tabler-sun icon-22px me-3"
                            data-icon="sun"
                          ></i
                          >Light</span
                        >
                      </button>
                    </li>
                    <li>
                      <button
                        type="button"
                        class="dropdown-item align-items-center"
                        data-bs-theme-value="dark"
                        aria-pressed="true"
                      >
                        <span
                          ><i
                            class="icon-base ti tabler-moon-stars icon-22px me-3"
                            data-icon="moon-stars"
                          ></i
                          >Dark</span
                        >
                      </button>
                    </li>
                    <li>
                      <button
                        type="button"
                        class="dropdown-item align-items-center"
                        data-bs-theme-value="system"
                        aria-pressed="false"
                      >
                        <span
                          ><i
                            class="icon-base ti tabler-device-desktop-analytics icon-22px me-3"
                            data-icon="device-desktop-analytics"
                          ></i
                          >System</span
                        >
                      </button>
                    </li>
                  </ul>
                </li>
                <!-- / Style Switcher-->

                <!-- Quick links  -->

                <!-- Quick links -->

                <!-- Notification -->

                <!--/ Notification -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown"
                  >
                    <div class="avatar avatar-online">
                      <img
                        src="../../assets/img/avatars/1.png"
                        alt
                        class="rounded-circle"
                      />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a
                        class="dropdown-item mt-0"
                        href="pages-account-settings-account.html"
                      >
                        <div class="d-flex align-items-center">
                          <div class="flex-shrink-0 me-2">
                            <div class="avatar avatar-online">
                              <img
                                src="../../assets/img/avatars/1.png"
                                alt
                                class="rounded-circle"
                              />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-0">Rommel Lacap</h6>
                            <small class="text-body-secondary">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider my-1 mx-n2"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="icon-base ti tabler-user me-3 icon-md"></i
                        ><span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="icon-base ti tabler-settings me-3 icon-md"></i
                        ><span class="align-middle">Settings</span>
                      </a>
                    </li>

                    <li>
                      <div class="dropdown-divider my-1 mx-n2"></div>
                    </li>

                    <li>
                      <div class="d-grid px-2 pt-2 pb-1">
                        <a
                          class="btn btn-sm btn-danger d-flex"
                          href="#"
                          target="_blank"
                        >
                          <small class="align-middle">Logout</small>
                          <i
                            class="icon-base ti tabler-logout ms-2 icon-14px"
                          ></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav> --}}

          <!-- / Navbar -->

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
                        Coupon Management
                      </h5>
                    </div>
                    <div class="card-body pt-6">
                      @if ($errors->any())
                          <script>
                              document.addEventListener('DOMContentLoaded', function() {
                                  Swal.fire({
                                      icon: 'error',
                                      title: 'Validation Error',
                                      html: `@foreach ($errors->all() as $error)
                                          - {{ $error }}<br>
                                      @endforeach`,
                                  });
                              });
                          </script>
                      @endif
          
                      @if(session('success'))
                          <script>
                              document.addEventListener('DOMContentLoaded', function() {
                                  Swal.fire({
                                      icon: 'success',
                                      title: 'Success',
                                      text: '{{ session('success') }}',
                                  });
                              });
                          </script>
                      @endif
                      <div class="row">
                        <div class="col-lg-8 mx-auto">
                      
                        <form method="post" action="{{ route('coupon.create') }}">
                            @csrf
                            @method('POST')
                          
                        
                          <div class="row g-6">
                            <div class="col-md-6">
                              <label class="form-label" for="coupon_code"
                                >Coupon Code</label
                              >
                              <input
                                type="text"
                                id="coupon_code"
                                name="coupon_code"
                                class="form-control"
                                placeholder="Coupon Code"
                              />
                            </div>

                            <div class="col-md-6">
                              <label class="form-label" for="discount_name"
                                >Coupon Name</label
                              >
                              <input
                                type="text"
                                id="discount_name"
                                name="discount_name"  
                                class="form-control"
                                placeholder="Coupon Name"
                              />
                            </div>

                            <div class="col-12">
                              <label class="form-label" for="description"
                                >Description</label
                              >
                              <textarea
                                name="description"
                                class="form-control"
                                id="description"

                                rows="4"
                                placeholder="Coupon Description"
                              ></textarea>
                            </div>

                            <div class="col-md-6">
                              <label class="form-label">Discount Type</label>
                              <select
                                class="select2 form-select"
                                data-allow-clear="true"
                                id="discount_type"
                                name="discount_type"
                              >
                                <option value="">Select Discount Type</option>
                                <option value="fixed">Fixed Amount</option>
                                <option value="percentage">Percentage</option>
                              </select>
                            </div>

                            <div class="col-md-6">
                              <label class="form-label" for="discount_value"
                                >Discount Value</label
                              >
                              <input
                                type="text"
                                id="discount_value"
                                name="discount_value"
                                class="form-control"
                                placeholder="Amount"
                              />
                            </div>

                            <div class="col-md-6">
                              <label class="form-label"
                                >Applicable Services</label
                              >
                              <select
                                class="select2 form-select"
                                data-allow-clear="true"
                           
                                name="service_id"
                                id="service_id"
                              >
                                <option value="">
                                  Select Applicable Services
                                </option>
                                @foreach($services as $service)
                                  <option value="{{ $service->service_id }}">{{ $service->service_name }}</option>
                                @endforeach
                              </select>
                            </div>

                            <div class="col-md-6">
                              <label for="start_end_date" class="form-label"
                                >Start and End Date</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                placeholder="YYYY-MM-DD to YYYY-MM-DD"
                                id="start_end_date"
                                name="start_end_date"
                              />
                            </div>

                            <div class="col-xl-12">
                              <label class="form-label"
                                >New Customers Only</label
                              >
                              <div class="row">
                                <div class="col-md mb-md-0 mb-5">
                                  <div
                                    class="form-check custom-option custom-option-basic"
                                  >
                                    <label
                                      class="form-check-label custom-option-content"
                                      for="new_customer"
                                    >
                                      <input
                                        name="new_customer"
                                        class="form-check-input"
                                        type="radio"
                                        value="Yes"
                                        id="new_customer"
                                        checked
                                      />
                                      <span class="custom-option-header">
                                        <span class="h6 mb-0">Yes</span>
                                      </span>
                                    </label>
                                  </div>
                                </div>
                                <div class="col-md">
                                  <div
                                    class="form-check custom-option custom-option-basic"
                                  >
                                    <label
                                      class="form-check-label custom-option-content"
                                      for="new_customer"
                                    >
                                      <input
                                        name="new_customer"
                                        class="form-check-input"
                                        type="radio"
                                        value="No"
                                        id="new_customer"
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
                                data-allow-clear="true"
                                name="branch_code"
                              >
                                <option value="">Select Branch</option>
                                @foreach($branches as $branch)
                                  <option value="{{ $branch->branch_code }}">{{ $branch->branch_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <br />
                          <div class="col-sm-2 col-4 d-grid">
                            <button type="submit" class="btn btn-primary">Add Coupon</button>
                          </div>
                          <br />
                        </form>
                          <!-- 4. Payment Method -->
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
    <script src="{{ asset('vendor/libs/cleave-zen/cleave-zen.js') }}"></script>
    <script src="{{ asset('vendor/libs/select2/select2.js') }}"></script>

    <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
    <script src="{{ asset('vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('vendor/libs/pickr/pickr.js') }}"></script>

    <!-- Main JS -->

    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
    <script src="{{ asset('assets/js/forms-pickers.js') }}"></script>
    <script>
      // Initialize date range picker
      document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#start_end_date", {
          mode: "range",
          dateFormat: "Y-m-d"
        });
        
        // Initialize select2
        $('.select2').select2();
      });
    </script>
  </body>

  <!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/form-layouts-sticky.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:27:42 GMT -->
</html>

<!-- beautify ignore:end -->
