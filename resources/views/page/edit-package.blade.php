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

    <title>Edit Package - Imajica Booking System</title>

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

    <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                      class="card-header d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row"
                      style="background-color: #0A3622;"
                    >
                      <h5 class="card-title mb-sm-0 me-2 text-white">
                        Edit Package
                      </h5>
                    </div>
                    <div class="card-body pt-6">
                      <div class="row">
                        <div class="col-lg-8 mx-auto">
                          <!-- Form -->
                          <form id="updatePackageForm" method="POST" action="{{ route('package.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="package_id" value="{{ $package->package_id }}">
                            
                            <div class="row g-6">
                              <div class="col-md-6">
                                <label class="form-label" for="package_name">Package Name</label>
                                <input
                                  type="text"
                                  id="package_name"
                                  name="package_name"
                                  class="form-control"
                                  placeholder="Package Name"
                                  value="{{ $package->package_name }}"
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
                                    <option value="{{ $branch->branch_code }}" {{ $package->branch_code == $branch->branch_code ? 'selected' : '' }}>
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
                                  placeholder="Package Description"
                                >{{ $package->description }}</textarea>
                              </div>

                              <div class="col-md-12">
                                <label class="form-label">Inclusions</label>
                                <select
                                  class="select2 form-select"
                                  name="inclusions[]"
                                  id="inclusions"
                                  multiple
                                  data-placeholder="Select services to include"
                                  required
                                >
                                  @foreach($services as $service)
                                    <option value="{{ $service->service_id }}" {{ $package->services->contains('service_id', $service->service_id) ? 'selected' : '' }}>
                                      {{ $service->service_name }}
                                    </option>
                                  @endforeach
                                </select>
                              </div>

                              <div class="col-md-12">
                                <label class="form-label" for="free">Free Items/Services</label>
                                <input
                                  type="text"
                                  id="free"
                                  name="free"
                                  class="form-control"
                                  placeholder="Free items or services included"
                                  value="{{ $package->free }}"
                                />
                              </div>
                            </div>

                            <div class="col-md-12">
                           <label class="form-label" for="price">Price</label>
                             <div class="input-group">
                           <span class="input-group-text">₱</span>
                          <input
                           type="number"
                          id="price"
                          name="price"
                          class="form-control"
                          placeholder="0.00"
                          step="0.01"
                          min="0"
                          value="{{ number_format($package->price, 2, '.', '') }}"
                          required
        />
    </div>
</div>

                            <br />
                            <div class="row">
                              <div class="col-sm-2 col-4 d-grid">
                                <a href="{{ route('page.packages-list') }}" class="btn btn-outline-secondary">Cancel</a>
                              </div>
                              <div class="col-sm-2 col-4 d-grid ms-2">
                                <button type="button" class="btn btn-primary" id="updatePackageBtn">
                                  Update Package
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
    <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('vendor/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('vendor/libs/select2/select2.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
      $(document).ready(function() {
        // Initialize Select2 components
        $('.select2').each(function() {
        $(this).select2({
            width: '100%',
            dropdownParent: $(this).parent()
        });
    });

    // Modify your AJAX data preparation
const formData = new FormData();
formData.append('package_id', $('#package_id').val());
formData.append('package_name', $('#package_name').val());
// Add other fields...

// Handle inclusions array properly
const inclusions = $('#inclusions').val() || [];
inclusions.forEach((value, index) => {
    formData.append(`inclusions[${index}]`, value);
});
        // AJAX form submission
       $('#updatePackageBtn').on('click', function(e) {
    e.preventDefault();
    
    Swal.fire({
        title: 'Confirm Update',
        text: "Are you sure you want to update this package?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0a3622',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, update it!'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById('updatePackageForm');
            const formData = new FormData(form);
            
            // Get inclusions as array
            const inclusions = $('#inclusions').val();
            formData.append('inclusions', JSON.stringify(inclusions));
            
            // Show loading state
            const swalInstance = Swal.fire({
                title: 'Processing...',
                html: 'Please wait while we update the package',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            // AJAX request
            $.ajax({
                url: form.action,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-HTTP-Method-Override': 'PUT'
                },
                success: function(response) {
                    swalInstance.close();
                    
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message || 'Package updated successfully',
                        }).then(() => {
                            window.location.href = "{{ route('page.packages-list') }}";
                        });
                    }
                },
                error: function(xhr) {
                    swalInstance.close();
                    
                    let errorMessage = 'An error occurred while updating the package';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    
                    // Handle validation errors
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorList = '';
                        
                        $.each(errors, function(key, value) {
                            errorList += '<li>' + value[0] + '</li>';
                        });
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error',
                            html: '<ul>' + errorList + '</ul>'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: errorMessage
                        });
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