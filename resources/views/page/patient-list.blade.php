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

    <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.css') }}"/>

    <link rel="stylesheet" href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />

    <!-- Vendors CSS -->

   <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- endbuild -->

    <link rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}" />

    <!-- Page CSS -->

    <!-- endbuild -->

    <link  rel="stylesheet"  href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet"  href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link  rel="stylesheet"  href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}"  />
    <!-- Row Group CSS -->
    <link rel="stylesheet"  href="{{ asset('vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />
    <!-- Form Validation -->
     <link rel="stylesheet" href="{{ asset('vendor/libs/%40form-validation/form-validation.css') }}"/>

    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="../../assets/js/config.js"></script>
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

          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Header Card -->
              <div class="card mb-4">
                <div class="d-flex justify-content-between align-items-center p-3">
                  <h5 class="card-title mb-0">Customer List</h5>
                  <a href="{{ route('page.new-patient') }}" class="btn btn-primary">
                    <i class="ti tabler-plus me-1"></i> Add New Customer
                  </a>
                </div>
              </div>

              <!-- Success/Error Messages -->
              <div id="responseMessage" style="display: none;" class="alert mb-4"></div>

              <!-- Patient Cards Grid -->
              <div class="row g-4">
                @foreach ($patients as $patient)
                <div class="col-md-6 col-lg-4">
                  <div class="card h-100">
                    <div class="card-body">
                      <!-- Patient Header -->
                      <div class="d-flex align-items-center mb-3">
                          <div class="avatar-wrapper">
                              <div class="avatar rounded-circle bg-label-secondary">
                                  @if($patient->image_path)
                                      <img src="{{ asset($patient->image_path) }}" 
                                           alt="{{ $patient->firstname }} {{ $patient->lastname }}"
                                           class="rounded-circle"
                                           onerror="this.src='{{ asset('assets/img/avatars/default.jpg') }}'"
                                           style="width: 100%; height: 100%; object-fit: cover;">
                                  @else
                                      <div class="avatar-placeholder">
                                          <div class="avatar-circle">
                                              <span class="initials">
                                                  {{ strtoupper(substr($patient->firstname ?? '', 0, 1) . substr($patient->lastname ?? '', 0, 1)) }}
                                              </span>
                                          </div>
                                      </div>
                                  @endif
                              </div>
                          </div>
                          <div>
                              <h5 class="mb-1">{{ $patient->firstname }} {{ $patient->lastname }}</h5>
                              <p class="text-muted mb-0">{{ $patient->email ?? 'No email provided' }}</p>
                          </div>
                      </div>

                      <!-- Patient Details -->
                      <div class="patient-details mb-3">
                        <div class="detail-item">
                          <span class="detail-label"><i class="ti tabler-phone text-muted me-2"></i>Contact:</span>
                          <span class="detail-value">{{ $patient->contact_number ?? 'N/A' }}</span>
                        </div>
                        <div class="detail-item">
                          <span class="detail-label"><i class="ti tabler-user text-muted me-2"></i>Gender:</span>
                          <span class="detail-value">{{ $patient->gender ?? 'N/A' }}</span>
                        </div>
                        <div class="detail-item">
                          <span class="detail-label"><i class="ti tabler-calendar text-muted me-2"></i>Birthdate:</span>
                          <span class="detail-value">{{ $patient->birthdate ?? 'N/A' }}</span>
                        </div>
                      </div>

                      <!-- Current Medications -->
                      @if($patient->current_medications)
                      <div class="medications-section mb-3">
                        <h6 class="medications-title">
                          <i class="ti tabler-pills text-primary me-2"></i>Current Medications
                        </h6>
                        <div class="medications-content">
                          {{ $patient->current_medications }}
                        </div>
                      </div>
                      @endif

                      <!-- Action Buttons -->
                      <div class="action-buttons">
                        <a href="{{ route('patient.view', $patient->patient_id) }}" class="btn btn-sm btn-primary">
                          <i class="ti tabler-eye me-1"></i> View
                        </a>
                       
                        <button type="button" class="btn btn-sm btn-danger delete-patient" 
                          data-id="{{ $patient->patient_id }}"
                          data-name="{{ $patient->firstname }} {{ $patient->lastname }}">
                          <i class="ti tabler-trash me-1"></i> Delete
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach

                @if(count($patients) == 0)
                <div class="col-12">
                  <div class="card">
                    <div class="card-body text-center py-5">
                      <i class="ti tabler-users-off fs-1 text-muted mb-2"></i>
                      <h6 class="mb-0">No Customers found</h6>
                    </div>
                  </div>
                </div>
                @endif
              </div>

              <!-- Delete Patient Form (Hidden) -->
              <form id="deletePatientForm" method="POST" style="display: none;">
                  @csrf
                  @method('DELETE')
              </form>

              <style>
                .avatar-wrapper {
                  width: 150px;
                  height: 150px;
                  overflow: hidden;
                  border-radius: 50%;
                  border: 3px solid #FFFFFF;
                  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  margin: 0 auto 1rem;
                }

                .avatar-preview {
                  width: 100%;
                  height: 100%;
                  position: relative;
                  border-radius: 50%;
                  overflow: hidden;
                }

                .avatar-preview img {
                  width: 100%;
                  height: 100%;
                  object-fit: cover;
                  border-radius: 50%;
                }

                .profile-upload-container {
                  width: 200px;
                  margin-bottom: 2rem;
                }

                .avatar-upload {
                  position: relative;
                  text-align: center;
                }

                .avatar-placeholder {
                  width: 100%;
                  height: 100%;
                  background: #E6EEFF;
                  border-radius: 50%;
                  position: relative;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                }

                .avatar-circle {
                  width: 100%;
                  height: 100%;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  position: relative;
                }

                .avatar-silhouette {
                  position: absolute;
                  width: 100%;
                  height: 100%;
                }

                .avatar-head {
                  position: absolute;
                  width: 60px;
                  height: 60px;
                  background: #1B3F8F;
                  border-radius: 50%;
                  top: 20%;
                  left: 50%;
                  transform: translateX(-50%);
                }

                .avatar-body {
                  position: absolute;
                  width: 90px;
                  height: 45px;
                  background: #1B3F8F;
                  border-radius: 45px 45px 0 0;
                  bottom: 10%;
                  left: 50%;
                  transform: translateX(-50%);
                }

                .initials {
                  color: #FFFFFF;
                  font-size: 3.5rem; /* Larger font size for initials */
                  font-weight: 600;
                  position: relative;
                  z-index: 2;
                  text-transform: uppercase;
                }

                .card-body {
                  text-align: center;
                  padding: 1.5rem;
                }

                .d-flex.align-items-center.mb-3 {
                  display: flex !important;
                  flex-direction: column;
                  align-items: center !important;
                  text-align: center;
                  width: 100%;
                }

                .d-flex.align-items-center.mb-3 > div:last-child {
                  margin-top: 1rem;
                  text-align: center;
                  width: 100%;
                }

                .avatar-wrapper.me-3 {
                  margin-right: 0 !important;
                }

                .patient-details {
                  background-color: #f8f9fa;
                  border-radius: 8px;
                  padding: 1rem;
                }

                .detail-item {
                  display: flex;
                  margin-bottom: 0.5rem;
                  padding: 0.25rem 0;
                }

                .detail-label {
                  color: #666;
                  min-width: 100px;
                  font-weight: 500;
                  display: flex;
                  align-items: center;
                }

                .detail-value {
                  color: #333;
                  flex: 1;
                }

                .medications-section {
                  background-color: #f8f9fa;
                  border-radius: 8px;
                  padding: 1rem;
                }

                .medications-title {
                  font-size: 0.875rem;
                  font-weight: 600;
                  color: #333;
                  margin-bottom: 0.5rem;
                  display: flex;
                  align-items: center;
                }

                .medications-content {
                  font-size: 0.875rem;
                  color: #666;
                  line-height: 1.4;
                  white-space: pre-wrap;
                  max-height: 80px;
                  overflow-y: auto;
                }

                .action-buttons {
                  display: flex;
                  justify-content: center;
                  gap: 0.5rem;
                  margin-top: 1rem;
                  width: 100%;
                }

                .action-buttons .btn {
                  min-width: 80px;
                }
              </style>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                  <div class="text-body">
                    © <script>document.write(new Date().getFullYear());</script>
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
    <script src="{{ asset('vendor/libs/cleave-zen/cleave-zen.js') }}"></script>
    <script src="{{ asset('vendor/libs/select2/select2.js') }}"></script>

    <!-- Main JS -->

    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/form-layouts.js"></script>

    <!-- Vendors JS -->
   <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <!-- Flat Picker -->
    <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <!-- Form Validation -->
    <script src="{{ asset('vendor/libs/%40form-validation/popular.js') }}"></script>
    <script src="{{ asset('vendor/libs/%40form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/libs/%40form-validation/auto-focus.js') }}"></script>
    
    <script>
      $(document).ready(function () {
        $("#servicesTable").DataTable();
      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).ready(function() {
        // SweetAlert default configuration
        const swalConfig = {
            customClass: {
                container: 'swal-container-class',
                popup: 'swal-popup-class'
            },
            backdrop: true,
            allowOutsideClick: false
        };

        // Handle delete patient button clicks
        $('.delete-patient').on('click', function() {
            try {
                const patientId = $(this).data('id');
                const patientName = $(this).data('name');
                
                if (!patientId) {
                    throw new Error("Patient ID not found in data attributes");
                }
                
                // Set the form action dynamically
                $('#deletePatientForm').attr('action', `/patient/${patientId}`);
                
                // Show delete confirmation
                Swal.fire({
                    ...swalConfig,
                    title: 'Confirm Delete',
                    html: `Are you sure you want to delete patient <strong>${patientName}</strong>?<br>This action cannot be undone.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d'
                }).then((result) => {
                    if (result.isConfirmed) {
                        try {
                            $('#deletePatientForm').submit();
                        } catch (e) {
                            console.error("Error submitting delete form:", e);
                            Swal.fire({
                                ...swalConfig,
                                icon: 'error',
                                title: 'Delete Error',
                                html: 'Error submitting delete form:<br>' + e.message,
                                showConfirmButton: true
                            });
                        }
                    }
                });
            } catch (e) {
                console.error("Error in delete button click handler:", e);
                Swal.fire({
                    ...swalConfig,
                    icon: 'error',
                    title: 'Delete Error',
                    html: 'An error occurred while processing your delete request:<br>' + e.message,
                    showConfirmButton: true
                });
            }
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
                showConfirmButton: true
            });
        @endif
    });
    </script>

    <style>
      .avatar {
        width: 150px !important; /* Override any default avatar sizes */
        height: 150px !important;
        display: inline-flex;
        align-items: center;
        justify-content: center;
      }

      .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .avatar-initial {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 500;
        font-size: 1rem;
      }

      .patient-info {
        background-color: #f8f9fa;
        border-radius: 0.5rem;
        padding: 1rem;
      }

      .card {
        transition: transform 0.2s, box-shadow 0.2s;
      }

      .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
      }
    </style>
  </body>
</html>