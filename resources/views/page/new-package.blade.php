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
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}" />

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

     <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.js') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />
    <!-- Vendors CSS -->

   <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- endbuild -->

 <link rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
   <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="../../assets/js/config.js"></script>

    <style>
      .profile-upload-container {
        width: 200px;
        margin-bottom: 2rem;
      }

      .avatar-upload {
        position: relative;
        text-align: center;
      }

      .avatar-preview {
        width: 150px;
        height: 150px;
        position: relative;
        border-radius: 50%;
        overflow: hidden;
        border: 4px solid #0a3622;
        box-shadow: 0 0 20px rgba(10, 54, 34, 0.15);
        margin: 0 auto;
      }

      .avatar-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .avatar-edit label {
        transition: all 0.3s ease;
      }

      .avatar-edit label:hover {
        background-color: #0a3622;
        border-color: #0a3622;
      }

      .default-avatar {
        width: 100%;
        height: 100%;
        background-color: #0a3622;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .avatar-initials {
        color: white;
        font-size: 3rem;
        font-weight: bold;
      }
    </style>

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
                      class="card-header  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row"
                      style="background-color: #0A3622;"
                    >
                      <h5 class="card-title mb-sm-0 me-2 text-white">
                        Services Management
                      </h5>
                    </div>
                    <div class="card-body pt-6">
                      <div class="row">
                        <div class="col-lg-8 mx-auto">
                          <!-- 1. Delivery Address -->
                            <form method="post" action="{{ route('package.create') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row g-6">
                              <div class="col-md-6">
                                <label class="form-label" for="package_name">Package Name</label>
                                <input
                                  type="text"
                                  id="package_name"
                                  name="package_name"
                                  class="form-control"
                                  placeholder="Package Name"
                                  required
                                />
                              </div>
                              <div class="col-md-6">
                                <label class="form-label">Branch</label>
                                <select
                                  class="select2 form-select branch-select"
                                  name="branch_code"
                                  id="branch_code"
                                  data-allow-clear="true"
                                  required
                                >
                                  <option value="">Select Branch</option>
                                  @foreach($branches as $branch)
                                    <option value="{{ $branch->branch_code }}">{{ $branch->branch_name }}</option>
                                  @endforeach
                                </select>
                              </div>

                              <div class="col-12">
                                <label class="form-label" for="description">Description</label>
                                <textarea
                                  name="description"
                                  class="form-control"
                                  id="description"
                                  rows="4"
                                  placeholder="Package Description"
                                ></textarea>
                              </div>

                              <div class="col-md-12">
                                <label class="form-label">Inclusion</label>
                                <select
                                  class="select2 form-select"
                                  name="inclusions[]"
                                  id="inclusions"
                                  multiple
                                  data-placeholder="Select services to include"
                                  required
                                >
                                  @foreach($services as $service)
                                    <option value="{{ $service->service_id }}">{{ $service->service_name }}</option>
                                  @endforeach
                                </select>
                              </div>

                              <div class="col-md-12">
                                <label class="form-label" for="free">Free</label>
                                <input
                                  type="text"
                                  id="free"
                                  name="free"
                                  class="form-control"
                                  placeholder="Free items or services included"
                                />
                              </div>
                            </div>

                            <br />
                            <div class="col-sm-2 col-4 d-grid">
                              <button type="submit" class="btn btn-primary" id="addPackageBtn">
                                Add Package
                              </button>
                            </div>
                          </form>
                          <br />
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

    <!-- Main JS -->

    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/form-layouts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      $(document).ready(function() {
        // Define routes object for API endpoints
        const branchRoutes = {
          getAll: "{{ route('branch.getAllBranches') }}"
        };
        
        // Initialize select2 for multiselect fields
        if ($.fn.select2) {
          $('.select2').each(function() {
            $(this).select2({
              dropdownParent: $(this).parent()
            });
          });
        }
        
        // Load branches for select dropdown
        loadBranchOptions();

        // Function to load branch options for select dropdown
        function loadBranchOptions() {
          $.ajax({
            url: branchRoutes.getAll,
            type: "GET",
            dataType: 'json',
            success: function(response) {
              if(response.status) {
                populateBranchOptions(response.data);
              } else {
                console.error('Failed to load branches:', response.message);
                $('#responseMessage')
                  .removeClass()
                  .addClass('alert alert-danger')
                  .text('Failed to load branches: ' + response.message)
                  .show();
              }
            },
            error: function(xhr) {
              console.error('AJAX error when loading branches:', xhr);
              $('#responseMessage')
                .removeClass()
                .addClass('alert alert-danger')
                .text('Error loading branches. Please try again later.')
                .show();
            }
          });
        }
        
        // Function to populate branch select options
        function populateBranchOptions(branches) {
          const select = $('#branch_code');
          
          // Clear existing options except the default one
          const defaultOption = select.find('option:first');
          select.empty().append(defaultOption);
          
          // Add branch options
          branches.forEach(branch => {
            select.append(`<option value="${branch.branch_code}">${branch.branch_name}</option>`);
          });
          
          // Refresh Select2 if it's used
          if ($.fn.select2) {
            select.trigger('change');
          }
        }

        // Form submission handler
        $('form').on('submit', function(e) {
          e.preventDefault();
          
          // Log the state of the inclusions field before submission
          console.log('Select2 inclusions value before submission:', $('#inclusions').val());
          console.log('Select2 inclusions selectedData:', $('#inclusions').select2('data'));
          
          // Validate required fields
          const requiredFields = ['package_name', 'branch_code', 'description', 'inclusions'];	
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

          let formData = new FormData(this);

          // Show loading state
          Swal.fire({
            title: 'Processing...',
            text: 'Please wait while we add the package',
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
              Swal.showLoading();
            }
          });

          // Debug form data
          const formDataDebug = {};
          formData.forEach((value, key) => {
            formDataDebug[key] = value;
          });
          console.log('Form data being submitted:', formDataDebug);

          $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json', // Explicitly request JSON response
            success: function(response) {
              console.log('Response received:', response);
              
              if(response && response.status === true) {
                Swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: 'Package has been added successfully',
                  confirmButtonColor: '#0A3622',
                  confirmButtonText: 'View Packages List',
                  showCancelButton: true,
                  cancelButtonText: 'Add Another Package',
                  cancelButtonColor: '#6c757d'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = "{{ route('page.packages-list') }}";
                  } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Reset form for new entry
                    $('form')[0].reset();
                    // Reset the inclusions select
                    $('#inclusions').val(null).trigger('change');
                  }
                });
              } else {
                console.error('Error in success response:', response);
                let errorMsg = 'Failed to add package properly. The package may have been created but with some issues.';
                if (response && response.message) {
                  errorMsg = response.message;
                }
                
                Swal.fire({
                  icon: 'warning', // Changed to warning since package is saved
                  title: 'Partial Success',
                  text: errorMsg,
                  confirmButtonColor: '#0A3622',
                  showCancelButton: true,
                  confirmButtonText: 'View Packages List',
                  cancelButtonText: 'Stay on this page'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = "{{ route('page.packages-list') }}";
                  }
                });
              }
            },
            error: function(xhr, status, error) {
              console.error('AJAX error:', {xhr, status, error});
              console.error('Response text:', xhr.responseText);
              
              // Handle case where server returns HTML instead of JSON
              if (xhr.responseText && xhr.responseText.trim().startsWith('<!DOCTYPE html>')) {
                console.error('Received HTML response instead of JSON');
                
                Swal.fire({
                  icon: 'warning',
                  title: 'Partial Success',
                  text: 'Failed to add package properly. The package may have been created but with some issues.',
                  confirmButtonColor: '#0A3622',
                  showCancelButton: true,
                  confirmButtonText: 'View Packages List',
                  cancelButtonText: 'Stay on this page'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = "{{ route('page.packages-list') }}";
                  }
                });
                return;
              }
              
              let errorMessage = 'Something went wrong!';
              if(xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
              }
              
              if(xhr.status === 422) { // Validation error
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
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: errorMessage,
                  confirmButtonColor: '#0A3622'
                });
              }
            }
          });
        });
      });
    </script>
  </body>
</html>
