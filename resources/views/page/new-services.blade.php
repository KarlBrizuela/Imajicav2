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
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet" />

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
                            <form method="post" action="{{ route('service.create') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row g-6">
   


                              <div class="col-md-6">
                                <label class="form-label" for="service_name">Services Name</label>
                                <input
                                  type="text"
                                  id="service_name"
                                  name="service_name"
                                  class="form-control"
                                  placeholder="Services Name"
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
                                  placeholder="Service Description"
                                ></textarea>
                              </div>


                              {{-- <div class="col-md-6">
                                <label class="form-label">Service Category</label>
                                <select
                                  class="select2 form-select"
                                  name="service_category"
                                  id="service_category"
                                  data-allow-clear="true"
                                  required
                                >
                                  <option value="">Select Service Category</option>
                                  <option value="Facials">Facials</option>
                                  <option value="Body Contouring">Body Contouring</option>
                                  <option value="Laser Treatments">Laser Treatments</option>
                                  <option value="Injectables">Injectables</option>
                                  <option value="Others">Others</option>
                                </select>
                              </div> --}}

                              <div class="col-md-6">
                          <label class="form-label" for="acq_pts">Acquisition Points</label>
                    <input
                     type="number"
                     id="acq_pts"
                     name="acq_pts"
                     class="form-control"
                     placeholder="Points earned"
                     value="0"
                     min="0
                       required
                        />
                           </div>

                              <div class="col-md-6">
                                <label class="form-label" for="service_cost">Service Cost <span style="color: gray; font-style: italic;">(optional)</label>
                                <input
                                  type="number"
                                  step="0.01"
                                  min="0"
                                  id="service_cost"
                                  name="service_cost"
                                  class="form-control"
                                  placeholder="Amount"
                                  min="0"
                                 required
                                />
                              </div>

                              {{-- <div class="col-md-6">
                                <label class="form-label" for="loyalty_pts">Loyalty Reward Points</label>
                                <input
                                  type="number"
                                  id="loyalty_pts"
                                  name="loyalty_pts"
                                  class="form-control"
                                  placeholder="Loyalty Reward Points"
                                />
                              </div> --}}
                            </div>

                            <br />
                            <div class="col-sm-2 col-4 d-grid">
                              <button type="submit" class="btn btn-primary" id="addServiceBtn">
                                Add Services
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
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>

     <script src="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-js"></script>

    <script src="{{ asset('vendor/libs/pickr/pickr.js') }}"></script>

     <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

   <script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>
  <script src="{{ asset('vendor/js/menu.js') }}"></script>

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
          
          // Validate required fields
          const requiredFields = ['service_name', 'branch_code','description'];	
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
            text: 'Please wait while we add the service',
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
              Swal.showLoading();
            }
          });

          $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
              if(response.status) {
                Swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: 'Service has been added successfully',
                  confirmButtonColor: '#0A3622',
                  confirmButtonText: 'View Services List',
                  showCancelButton: true,
                  cancelButtonText: 'Add Another Service',
                  cancelButtonColor: '#6c757d'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = "{{ route('page.services-list') }}";
                  } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Reset form for new entry
                    $('form')[0].reset();
                    $('#imagePreview').attr('src', '../../assets/img/services/default-service.png');
                    $('#defaultAvatar').show();
                    $('#imagePreview').hide();
                  }
                });
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Operation Failed',
                  text: response.message || 'Failed to add service. Please try again.',
                  confirmButtonColor: '#0A3622'
                });
              }
            },
            error: function(xhr) {
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

        // Image upload validation with SweetAlert
        $('#service_image').on('change', function() {
          const file = this.files[0];
          if (file) {
            const fileSize = file.size / 1024 / 1024; // in MB
            const fileType = file.type;
            
            if (!fileType.startsWith('image/')) {
              Swal.fire({
                icon: 'error',
                title: 'Invalid File',
                text: 'Please upload an image file',
                confirmButtonColor: '#0A3622'
              });
              this.value = '';
              return;
            }
            
            if (fileSize > 2) {
              Swal.fire({
                icon: 'error',
                title: 'File Too Large',
                text: 'Image size should not exceed 2MB',
                confirmButtonColor: '#0A3622'
              });
              this.value = '';
              return;
            }

            handleImageUpload(this);
          }
        });
      });

      function handleImageUpload(input) {
        const imagePreview = document.getElementById('imagePreview');
        const defaultAvatar = document.getElementById('defaultAvatar');

        if (input.files && input.files[0]) {
          const reader = new FileReader();
          reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block';
            defaultAvatar.style.display = 'none';
          };
          reader.readAsDataURL(input.files[0]);
        } else {
          imagePreview.style.display = 'none';
          defaultAvatar.style.display = 'flex';
        }
      }

      // Show default avatar on page load if no image
      document.addEventListener('DOMContentLoaded', function() {
        const imagePreview = document.getElementById('imagePreview');
        const defaultAvatar = document.getElementById('defaultAvatar');
        
        if (!imagePreview.src || imagePreview.src.endsWith('default-service.png')) {
          imagePreview.style.display = 'none';
          defaultAvatar.style.display = 'flex';
        }
      });

      $('#editServiceForm').on('submit', function(e) {
  e.preventDefault();
  
  // Ensure acq_pts has a value
  if (!$('#edit_acq_pts').val()) {
    $('#edit_acq_pts').val(0);
  }

  // Rest of your submission code...
});
    </script>
  </body>
</html>
