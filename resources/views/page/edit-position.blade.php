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
    <title>Imajica Booking System - Edit Position</title>
    <meta name="description" content="Imajica Booking System" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset(path:'logo/logo.png') }}" />

    <!-- Include CSS files -->
    <link rel="stylesheet" href="/public/vendor/fonts/iconify-icons.css" />
    <link rel="stylesheet" href="/public/vendor/css/core.css" />
    <link rel="stylesheet" href="/public/css/demo.css" />
    <link rel="stylesheet" href="/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/public/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Helpers -->
    <script src="/public/vendor/js/helpers.js"></script>
    <script src="/public/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
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
                      <h5 class="card-title mb-sm-0 me-2 text-white">Edit Position</h5>
                    </div>
                    <div class="card-body pt-6">
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif

                      <div class="row">
                        <div class="col-lg-8 mx-auto">
                          <form method="post" action="{{ route('position.update') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="position_id" value="{{ $position->position_id }}">
                            
                            <div class="row g-3 mb-4">
                              <div class="col-12">
                                <h6 class="fw-semibold">Position Information</h6>
                                <hr class="mt-0" />
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="position_name">Position Name</label>
                                <input
                                    type="text"
                                    id="position_name"
                                    name="position_name"
                                    class="form-control @error('position_name') is-invalid @enderror"
                                    value="{{ old('position_name', $position->position_name) }}"
                                    required
                                />
                                @error('position_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="department_code">Department</label>
                                <select class="form-select @error('department_code') is-invalid @enderror" 
                                        id="department_code" 
                                        name="department_code" 
                                        required>
                                    <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->department_code }}" 
                                            {{ old('department_code', $position->department_code) == $department->department_code ? 'selected' : '' }}>
                                            {{ $department->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('department_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>

                              <div class="col-12">
                                <label class="form-label" for="description">Description</label>
                                <textarea
                                    class="form-control @error('description') is-invalid @enderror"
                                    id="description"
                                    name="description"
                                    rows="3"
                                    required
                                >{{ old('description', $position->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>

                              <div class="col-12">
                                <div class="form-check">
                                  <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="status"
                                    name="status"
                                    {{ $position->status ? 'checked' : '' }}
                                  />
                                  <label class="form-check-label" for="status">Active Status</label>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-12 d-flex gap-3">
                                <button type="submit" class="btn btn-primary">Update Position</button>
                                <a href="{{ route('page.position-list') }}" class="btn btn-outline-secondary">Cancel</a>
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
          </div>
        </div>
      </div>
    </div>

    <!-- Core JS -->
    <script src="/public/vendor/libs/jquery/jquery.js"></script>
    <script src="/public/vendor/libs/popper/popper.js"></script>
    <script src="/public/vendor/js/bootstrap.js"></script>
    <script src="/public/vendor/js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      $(document).ready(function() {
        const swalConfig = {
          customClass: {
            container: 'swal-container-class',
            popup: 'swal-popup-class'
          },
          backdrop: true,
          allowOutsideClick: false
        };

        // Handle form submission with confirmation
        $('form').on('submit', function(e) {
          e.preventDefault();
          
          Swal.fire({
            ...swalConfig,
            title: 'Confirm Update',
            text: 'Are you sure you want to update this position?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#0a3622',
            cancelButtonColor: '#d33'
          }).then((result) => {
            if (result.isConfirmed) {
              this.submit();
            }
          });
        });

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
            timer: 3000,
            showConfirmButton: false
          });
        @endif
      });
    </script>
  </body>
</html>

