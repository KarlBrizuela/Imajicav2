@extends('layouts.app')

<!DOCTYPE html>
<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default"
  data-assets-path="../../assets/" data-template="vertical-menu-template" data-bs-theme="light">
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

    <link rel="stylesheet" href="../../assets/vendor/fonts/iconify-icons.css" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/node-waves/node-waves.css"
    />

    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/pickr/pickr-themes.css"
    />

    <link rel="stylesheet" href="../../assets/vendor/css/core.css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->

    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"
    />
    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/flatpickr/flatpickr.css"
    />
    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css"
    />
    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/jquery-timepicker/jquery-timepicker.css"
    />

    <!-- endbuild -->

    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/select2/select2.css"
    />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="../../assets/js/config.js"></script>
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Replace entire sidebar with component -->
            @include('components.sidebar')

            <!-- Keep rest of existing content -->
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
                            class="card-header sticky-element d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row"
                            style="background-color: #0a3622"
                          >
                            <h5 class="card-title mb-sm-0 me-2 text-white">
                              User Management
                            </h5>
                          </div>
                          <div class="card-body pt-6">
                            <div class="row">
                              <div class="col-lg-8 mx-auto">
                                <!-- 1. Delivery Address -->
                                <form method="post" action="{{ route('user.create') }}" method="post">
                                  @csrf
                                  <div class="row g-6">
                                    <div class="col-md-6">
                                      <label class="form-label" for="fullname"
                                        >Full Name</label
                                      >
                                      <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        class="form-control"
                                        placeholder="Full Name"
                                      />
                                    </div>

                                    <div class="col-md-6">
                                      <label class="form-label" for="email"
                                        >Email Address</label
                                      >
                                      <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="Email Address"
                                      />
                                    </div>

                                    <div class="col-md-6">
                                      <label class="form-label" for="password"
                                        >Password</label
                                      >
                                      <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        class="form-control"
                                        placeholder="Password"
                                      />
                                    </div>

                                    <div class="col-md-6">
                                      <label class="form-label">Role</label>
                                      <select
                                        class="select2 form-select"
                                        data-allow-clear="true"
                                        id="user_type"
                                        name="user_type"
                                      >
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="staff">Front Desk</option>
                                      </select>
                                    </div>

                                    <div class="col-md-6">
                                      <label class="form-label">Link to Staff</label>
                                      <select
                                        class="select2 form-select"
                                        data-allow-clear="true"
                                        id="staff"
                                        name="staff"
                                      >
                                        <option value="">Select Staff</option>
                                        @foreach ($staffs as $staff)
                                          <option value="{{ $staff->id }}">
                                            {{ $staff->firstname }} {{ $staff->lastname }}
                                          </option>
                                        
                                        @endforeach
                                      </select>
                                    </div>

                                    <div class="col-md-6">
                                      <label class="form-label">Branch</label>
                                      <select
                                        class="select2 form-select"
                                        data-allow-clear="true"
                                        id="branch"
                                        name="branch"
                                      >
                                        <option value="">Select Branch</option>
                                        @foreach ($branches as $branch)
                                          <option value="{{ $branch->branch_code }}">
                                            {{ $branch->branch_name }}
                                          </option>
                                        
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>

                                  <!-- 2. Delivery Type -->

                                  <br />
                                  <div class="col-sm-2 col-4 d-grid">
                                    <button type="submit" class="btn btn-primary">Add User</button>
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
        </div>
    </div>

    <!-- Keep existing scripts -->
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>

    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="../../assets/vendor/libs/%40algolia/autocomplete-js.js"></script>

    <script src="../../assets/vendor/libs/pickr/pickr.js"></script>

    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>

    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>

    <script src="../../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/cleave-zen/cleave-zen.js"></script>
    <script src="../../assets/vendor/libs/select2/select2.js"></script>

    <script src="../../assets/vendor/libs/moment/moment.js"></script>
    <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="../../assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="../../assets/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
    <script src="../../assets/vendor/libs/pickr/pickr.js"></script>

    <!-- Main JS -->

    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/form-layouts.js"></script>
    <script src="../../assets/js/forms-pickers.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      $(document).ready(function() {
        $('form').on('submit', function(e) {
          e.preventDefault();
          
          const requiredFields = ['name', 'email', 'password', 'user_type','branch'];
          let isValid = true;
          
          requiredFields.forEach(field => {
            if (!$(`#${field}`).val()) {
              isValid = false;
              $(`#${field}`).addClass('is-invalid');
            } else {
              $(`#${field}`).removeClass('is-invalid');
            }
          });

          if (!isValid) {
            Swal.fire({
              icon: 'warning',
              title: 'Required Fields',
              text: 'Please fill in all required fields',
              confirmButtonColor: '#0A3622'
            });
            return;
          }

          Swal.fire({
            title: 'Processing...',
            text: 'Please wait while we add the user',
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
              Swal.showLoading();
            }
          });

          $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
              if(response.status) {
                Swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: 'User has been added successfully',
                  confirmButtonColor: '#0A3622',
                  confirmButtonText: 'View User List',
                  showCancelButton: true,
                  cancelButtonText: 'Add Another User',
                  cancelButtonColor: '#6c757d'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = "{{ route('page.user-list') }}";
                  } else if (result.dismiss === Swal.DismissReason.cancel) {
                    $('form')[0].reset();
                  }
                });
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Operation Failed',
                  text: response.message || 'Failed to add user. Please try again.',
                  confirmButtonColor: '#0A3622'
                });
              }
            },
            error: function(xhr) {
              // Handle duplicate entry error
              if(xhr.responseText.includes('Duplicate entry')) {
                Swal.fire({
                  icon: 'error',
                  title: 'Email error',
                  text: 'Email already registered.',
                  confirmButtonColor: '#0A3622'
                }).then(() => {
                  // Clear only the branch_code field
                  $('#email').val('').focus();
                });
                return;
              }

              // Handle validation errors
              if(xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                let errorList = '<ul class="text-start">';
                Object.keys(errors).forEach(key => {
                  errorList += `<li>${errors[key][0]}</li>`;
                });
                errorList += '</ul>';
                
                Swal.fire({
                  icon: 'error',
                  title: 'Validation Error',
                  html: errorList,
                  confirmButtonColor: '#0A3622'
                });
                return;
              }

              // Handle other errors
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An unexpected error occurred. Please try again.',
                confirmButtonColor: '#0A3622'
              });
            }
          });
        });
      });
    </script>
</body>
</html>
