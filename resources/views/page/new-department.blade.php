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

    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        Department Management
                      </h5>
                    </div>
                    <div class="card-body pt-6">
                      <div class="row">
                        <div class="col-lg-8 mx-auto">
                          <!-- Department Information Form -->
                          <form method="post" action="{{ route('department.create') }}">
                            @csrf
                            @method('POST')
                            <div class="row g-3 mb-4">
                              <div class="col-12">
                                <h6 class="fw-semibold">Department Information</h6>
                                <hr class="mt-0" />
                              </div>
                              
                              <div class="col-md-6">
                                <label class="form-label" for="department_code">Department Code</label>
                                <input
                                  type="text"
                                  id="department_code"
                                  name="department_code"
                                  class="form-control"
                                  placeholder="Department Code"
                                  required
                                />
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="department_name">Department Name</label>
                                <input
                                  type="text"
                                  id="department_name"
                                  name="department_name"
                                  class="form-control"
                                  placeholder="Department Name"
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
                                  placeholder="Department Description"
                                  required
                                ></textarea>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="department_head">Department Head</label>
                                <input
                                  type="text"
                                  id="department_head"
                                  name="department_head"
                                  class="form-control"
                                  placeholder="Department Head Name"
                                  required
                                />
                                <small class="text-muted">Enter the full name of the department head</small>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="contact_email">Contact Email</label>
                                <input
                                  type="email"
                                  id="contact_email"
                                  name="contact_email"
                                  class="form-control"
                                  placeholder="department@example.com"
                                  required
                                />
                                <small class="text-muted">This email will be used to create a staff record for the department head</small>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-12 d-flex gap-3">
                                <button type="submit" class="btn btn-primary">Add Department</button>
                              </div>
                            </div>
                          </form>
                          
                          <!-- Success/Error Messages -->
                          <div id="responseMessage" style="display: none;" class="alert mt-3"></div>
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

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/theme.js -->

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

    <!-- AJAX Form Submission Script -->
    <script>
      $(document).ready(function() {
        // Handle form submission
        $('form').on('submit', function(e) {
          e.preventDefault();
          
          // Get form data
          var formData = $(this).serialize();
          
          // Show loading state
          $('button[type="submit"]').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Adding...');
          
          // Submit form via AJAX
          $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
              // Show success message
              $('#responseMessage')
                .removeClass('alert-danger')
                .addClass('alert-success')
                .html('Department added successfully!')
                .show();
              
              // Reset form
              $('form')[0].reset();
              
              // Redirect to department list after 1.5 seconds
              setTimeout(function() {
                window.location.href = "{{ route('page.department-list') }}";
              }, 1500);
            },
            error: function(xhr) {
              // Show error message
              var errorMessage = 'An error occurred while adding the department.';
              
              if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
              } else if (xhr.responseText) {
                try {
                  var response = JSON.parse(xhr.responseText);
                  if (response.message) {
                    errorMessage = response.message;
                  }
                } catch (e) {
                  // If not JSON, use the response text
                  errorMessage = xhr.responseText;
                }
              }
              
              $('#responseMessage')
                .removeClass('alert-success')
                .addClass('alert-danger')
                .html(errorMessage)
                .show();
            },
            complete: function() {
              // Reset button state
              $('button[type="submit"]').prop('disabled', false).html('Add Department');
            }
          });
        });
        
        // Display session messages if any
        @if(session('success'))
          $('#responseMessage')
            .removeClass('alert-danger')
            .addClass('alert-success')
            .html("{{ session('success') }}")
            .show();
        @endif
        
        @if(session('error'))
          $('#responseMessage')
            .removeClass('alert-success')
            .addClass('alert-danger')
            .html("{{ session('error') }}")
            .show();
        @endif
      });
    </script>
  
  </body>

  <!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/form-layouts-sticky.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:27:42 GMT -->
</html>

<!-- beautify ignore:end -->
