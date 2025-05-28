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



    <title>Imajica Booking System - Edit User</title>



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



    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('assets/js/config.js') }}"></script>

    

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

                      style="background-color: #0a3622"

                    >

                      <h5 class="card-title mb-sm-0 me-2 text-white">

                        Edit User

                      </h5>

                    </div>

                    <div class="card-body pt-6">

                      <!-- Display validation errors if any -->

                      @if ($errors->any())

                          <div class="alert alert-danger">

                              <ul>

                                  @foreach ($errors->all() as $error)

                                      <li>{{ $error }}</li>

                                  @endforeach

                              </ul>

                          </div>

                      @endif

                      

                      <!-- Display success message if any -->

                      @if(session('success'))

                          <div class="alert alert-success">

                              {{ session('success') }}

                          </div>

                      @endif

                      

                      <!-- Display error message if any -->

                      @if(session('error'))

                          <div class="alert alert-danger">

                              {{ session('error') }}

                          </div>

                      @endif

                      

                      <div class="row">

                        <div class="col-lg-8 mx-auto">

                          <!-- Branch Information Form -->

                          <form method="post" action="{{ route('user.update') }}">

                            @csrf

                            <input type="hidden" name="user_id" value="{{ $user->id }}">

                            <div class="row g-3 mb-4">

                              <div class="col-12">

                                <h6 class="fw-semibold">User Information</h6>

                                <hr class="mt-0" />

                              </div>

                              

                              <div class="col-md-6">

                                <label class="form-label" for="branch_code">Full Name</label>

                                <input

                                  type="text"

                                  id="name"

                                  name="name"

                                  class="form-control"

                                  value="{{ $user->name ?? '' }}"

                                />

                              </div>



                              <div class="col-md-6">

                                <label class="form-label" for="branch_name">Email Address</label>

                                <input

                                  type="text"

                                  id="email"

                                  name="email"

                                  class="form-control"

                                  value="{{ $user->email ?? '' }}"

                                  readonly

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

                                    autocomplete="new-password"

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

                                    <option value="{{ $user->user_type }}" {{ $user->user_type == 'admin' ? 'selected' : '' }}>

                                        Admin

                                    </option>

                                    <option value="{{ $user->user_type }}" {{ $user->user_type == 'staff' ? 'selected' : '' }}>

                                        Front Desk

                                    </option>

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

                                          <option value="{{ $branch->branch_code }}" {{ $branch->branch_code == $user->branch_id ? 'selected' : '' }}>

                                            {{ $branch->branch_name }}

                                          </option>

                                        

                                        @endforeach

                                      </select>

                                    </div>

                            </div>



                            <div class="row">

                              <div class="col-12 d-flex gap-3">

                                <button type="submit" class="btn btn-primary" id="updateBtn">Update User</button>

                                <a href="{{ route('page.user-list') }}" class="btn btn-outline-secondary">Cancel</a>

                              </div>

                            </div>

                          </form>

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



    <!-- Add SweetAlert JS -->

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



    <!-- Add SweetAlert confirmation for update -->

    <script>

      $(document).ready(function() {

        $('form').on('submit', function(e) {

          e.preventDefault();

          

          const requiredFields = ['name', 'email', 'user_type','branch'];

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

            text: 'Please wait while we update the user',

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

                  text: 'User has been updated successfully',

                  confirmButtonColor: '#0A3622',

                  confirmButtonText: 'View User List',

                  showCancelButton: true,

                  cancelButtonText: 'Cancel',

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



<!-- beautify ignore:end -->