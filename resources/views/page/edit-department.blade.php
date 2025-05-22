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

    <title>Imajica Booking System - Edit Department</title>

    <meta name="description" content="Imajica Booking System" />
    <meta name="keywords" content="Imajica Booking System" />
    <meta property="og:title" content="Imajica Booking System" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="Imajica Booking System" />
    <meta property="og:image" content="../../../../pixinvent.com/wp-content/uploads/2023/06/vuexy-hero-image.png" />
    <meta property="og:description" content="Imajica Booking System." />
    <meta property="og:site_name" content="Pixinvent" />
    <link rel="canonical" href="Imajica Booking System" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset(path:'logo/logo.png') }}" />

    <!-- Add all CSS links from edit-branch.blade.php -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        @include('components.sidebar')
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
                      <h5 class="card-title mb-sm-0 me-2 text-white">Edit Department</h5>
                    </div>
                    <div class="card-body">
                      @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
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
                          <form method="POST" action="{{ route('department.update') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="department_code" value="{{ $department->department_code }}">
                            
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
                                  class="form-control"
                                  value="{{ $department->department_code }}"
                                  readonly
                                />
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="department_name">Department Name</label>
                                <input
                                  type="text"
                                  id="department_name"
                                  name="department_name"
                                  class="form-control"
                                  value="{{ $department->department_name }}"
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
                                  required
                                >{{ $department->description }}</textarea>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-12 d-flex gap-3">
                                <button type="submit" class="btn btn-primary">Update Department</button>
                                <a href="{{ route('page.department-list') }}" class="btn btn-outline-secondary">Cancel</a>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <!-- ... Footer content ... -->
            </footer>
            <!-- / Footer -->
          </div>
        </div>
      </div>
    </div>

    <!-- Add all JS scripts from edit-branch.blade.php -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <!-- Add all other JS scripts as in edit-branch.blade.php -->

    <!-- Update the SweetAlert confirmation script -->
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
        
        // Add custom CSS
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

        // Handle form submission with confirmation and redirect
        $('form').on('submit', function(e) {
          e.preventDefault();
          
          Swal.fire({
            ...swalConfig,
            title: 'Confirm Update',
            text: 'Are you sure you want to update this department?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#0a3622',
            cancelButtonColor: '#d33'
          }).then((result) => {
            if (result.isConfirmed) {
              // Submit form via AJAX
              $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                  Swal.fire({
                    ...swalConfig,
                    icon: 'success',
                    title: 'Success',
                    text: 'Department updated successfully',
                    timer: 1500,
                    showConfirmButton: false
                  }).then(() => {
                    // Redirect to department list page
                    window.location.href = "{{ route('page.department-list') }}";
                  });
                },
                error: function(xhr) {
                  Swal.fire({
                    ...swalConfig,
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while updating the department'
                  });
                }
              });
            }
          });
        });

        // Display messages
        @if(session('success'))
          Swal.fire({
            ...swalConfig,
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
            timer: 1500,
            showConfirmButton: false
          }).then(() => {
            window.location.href = "{{ route('page.department-list') }}";
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
    <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    </script>
  </body>
</html>