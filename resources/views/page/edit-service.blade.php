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

    <title>Edit Service - Imajica Booking System</title>

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

    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
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
                        Edit Service
                      </h5>
                      
                    </div>
                    <div class="card-body pt-6">
                      <div class="row">
                        <div class="col-lg-8 mx-auto">
                          <!-- Form -->
                          <form id="updateServiceForm" method="POST" action="{{ route('service.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="service_id" value="{{ $service->service_id }}">
                            <input type="hidden" name="id" value="{{ $service->id }}">
                       
                            
                            <div class="row g-6">
                  
                                

                              <div class="col-md-6">
                                <label class="form-label" for="service_name">Services Name</label>
                                <input
                                  type="text"
                                  id="service_name"
                                  name="service_name"
                                  class="form-control"
                                  placeholder="Services Name"
                                  value="{{ $service->service_name }}"
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
                                    <option value="{{ $branch->branch_code }}" {{ $service->branch_code == $branch->branch_code ? 'selected' : '' }}>
                                      {{ $branch->branch_name }}
                                    </option>
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
                                >{{ $service->description }}</textarea>
                              </div>



     

                              <div class="col-md-6">
                                <label class="form-label" for="service_cost">Service Cost</label>
                                <input
                                  type="text"
                                  step="0.01"
                                  id="service_cost"
                                  name="service_cost"
                                  class="form-control"
                                  placeholder="Amount"
                                  value="{{ $service->service_cost }}"
           
                                />
                              </div>


                            </div>

                            <br />
                            <div class="row">
                              <div class="col-sm-2 col-4 d-grid">
                                <a href="{{ route('page.services-list') }}" class="btn btn-outline-secondary">Cancel</a>
                              </div>
                              <div class="col-sm-2 col-4 d-grid ms-2">
                                <button type="button" class="btn btn-primary" id="updateServiceBtn">
                                  Update Service
                                </button>
                              </div>
                            </div>
                          </form>
                          <br />
                          <!-- Success/Error Messages -->
                          @if(session('success'))
                            <div class="alert alert-success mt-3">{{ session('success') }}</div>
                          @endif
                          @if(session('error'))
                            <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                          @endif
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
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
      $(document).ready(function() {
        // Define routes object for API endpoints
        const branchRoutes = {
          getAll: "{{ route('branch.getAllBranches') }}"
        };
        
        // Initialize Select2 components
        if ($.fn.select2) {
          $('.select2').select2();
        }

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
          const currentValue = select.val();
          
          // Clear existing options except the default one
          const defaultOption = select.find('option:first');
          select.empty().append(defaultOption);
          
          // Add branch options
          branches.forEach(branch => {
            const selected = branch.branch_code === currentValue ? 'selected' : '';
            select.append(`<option value="${branch.branch_code}" ${selected}>${branch.branch_name}</option>`);
          });
          
          // Refresh Select2 if it's used
          if ($.fn.select2) {
            select.trigger('change');
          }
        }
      });

      document.addEventListener("DOMContentLoaded", function () {
        const imageUpload = document.getElementById("service_image");
        const imagePreview = document.getElementById("imagePreview");

        // Handle photo upload
        imageUpload.addEventListener("change", function (e) {
          const file = e.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
              imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
          }
        });
        
        // AJAX form submission
        $('#updateServiceBtn').on('click', function(e) {
          e.preventDefault();
          
          Swal.fire({
            title: 'Confirm Update',
            text: "Are you sure you want to update this service?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0a3622',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
          }).then((result) => {
            if (result.isConfirmed) {
              // Create FormData object for file uploads
              const form = document.getElementById('updateServiceForm');
              const formData = new FormData(form);
              
              // Display loading state
              Swal.fire({
                title: 'Processing...',
                text: 'Updating service information',
                allowOutsideClick: false,
                didOpen: () => {
                  Swal.showLoading();
                }
              });
              
              // Send AJAX request
              $.ajax({
                url: "{{ route('service.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                  'X-HTTP-Method-Override': 'PUT', // Override method to PUT
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                  Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Service updated successfully',
                  }).then(() => {
                    window.location.href = "{{ route('page.services-list') }}";
                  });
                },
                error: function(xhr, status, error) {
                  console.error(xhr.responseText);
                  let errorMessage = 'An error occurred while updating the service';
                  
                  if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                  }
                  
                  Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage,
                  });
                  
                  // Display validation errors if any
                  if (xhr.responseJSON && xhr.responseJSON.errors) {
                    const errors = xhr.responseJSON.errors;
                    let errorHtml = '<ul>';
                    for (const field in errors) {
                      errors[field].forEach(error => {
                        errorHtml += `<li>${error}</li>`;
                      });
                    }
                    errorHtml += '</ul>';
                    
                    $('#responseMessage')
                      .removeClass()
                      .addClass('alert alert-danger')
                      .html(errorHtml)
                      .show();
                  }
                }
              });
            }
          });
        });
      });
    </script>
  </body>
</html>