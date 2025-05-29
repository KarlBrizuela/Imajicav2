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

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Favicon -->

    <link rel="icon" type="image/x-icon" href="{{ asset(path:'logo/logo.png') }}" />



    <!-- Include CSS -->

   <link rel="stylesheet" href="/public/vendor/fonts/iconify-icons.css" />

     <link rel="stylesheet" href="/public/vendor/css/core.css">

  <link rel="stylesheet" href="/public/css/demo.css" />

      <link rel="stylesheet" href="/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

       <link  rel="stylesheet"  href="/public/vendor/libs/select2/select2.css"  />

     <link rel="stylesheet"  href="/public/vendor/libs/flatpickr/flatpickr.css" />



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

                      <h5 class="card-title mb-sm-0 me-2 text-white">

                        Add New Position

                      </h5>

                    </div>

                    <div class="card-body">

                      <div class="row">

                        <div class="col-lg-8 mx-auto">

                          <!-- Position Form -->

                          <form id="addPositionForm" method="POST" action="{{ route('position.store') }}">

                            @csrf

                            <div class="row g-3">

                              <div class="col-12">

                                <h6 class="fw-semibold">Position Information</h6>

                                <hr class="mt-0" />

                              </div>



                              <div class="col-12">

                                <label class="form-label" for="position_name">Position Name</label>

                                <input 

                                  type="text" 

                                  id="position_name" 

                                  name="position_name" 

                                  class="form-control" 

                                  required

                                  placeholder="Enter position name"

                                >

                              </div>



                              <div class="col-12">

                                <label class="form-label" for="department_code">Department</label>

                                <select class="form-select" id="department_code" name="department_code" required>

                                  <option value="">Select Department</option>

                                  @foreach($departments as $department)

                                    <option value="{{ $department->department_code }}">

                                      {{ $department->department_name }}

                                    </option>

                                  @endforeach

                                </select>

                              </div>



                              <div class="col-12">

                                <label class="form-label" for="description">Description</label>

                                <textarea 

                                  class="form-control" 

                                  id="description" 

                                  name="description" 

                                  rows="3" 

                                  required

                                  placeholder="Enter position description"

                                ></textarea>

                              </div>



                              <div class="col-12">

                                <div class="form-check">

                                  <input 

                                    class="form-check-input" 

                                    type="checkbox" 

                                    id="status" 

                                    name="status" 

                                    checked

                                  >

                                  <label class="form-check-label" for="status">

                                    Active Status

                                  </label>

                                </div>

                              </div>



                              <div class="col-12 mt-4">

                                <button type="submit" class="btn btn-primary me-2">Add Position</button>

                                <a href="{{ route('page.position-list') }}" class="btn btn-secondary">Cancel</a>

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



    <!-- Include Scripts -->

     <script src="/public/vendor/libs/jquery/jquery.js"></script>

    <script src="/public/vendor/libs/popper/popper.js"></script>

   <script src="/public/vendor/js/bootstrap.js"></script>

       <script src="/public/vendor/js/menu.js"></script>

    <script src="/public/assets/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script>

      $(document).ready(function() {

        // Add CSRF token to all AJAX requests

        $.ajaxSetup({

          headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

        });



        // Form submission handling

        $('#addPositionForm').on('submit', function(e) {

          e.preventDefault();

          

          const requiredFields = ['position_name', 'department_code', 'description'];

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

            text: 'Please wait while we add the position',

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

            dataType: 'json',  // Add this line

            success: function(response) {

              if(response.status) {

                Swal.fire({

                  icon: 'success',

                  title: 'Success!',

                  text: 'Position has been added successfully',

                  confirmButtonColor: '#0A3622',

                  confirmButtonText: 'OK',

                  showCancelButton: false,

                  cancelButtonText: 'Add Another Position',

                  cancelButtonColor: '#6c757d'

                }).then((result) => {

                  if (result.isConfirmed) {

                    window.location.href = "{{ route('page.position-list') }}";

                  } else if (result.dismiss === Swal.DismissReason.cancel) {

                    $('#addPositionForm')[0].reset();

                    $('#status').prop('checked', true);

                  }

                });

              } else {

                Swal.fire({

                  icon: 'error',

                  title: 'Operation Failed',

                  text: response.message || 'Failed to add position. Please try again.',

                  confirmButtonColor: '#0A3622'

                });

              }

            },

            error: function(xhr, status, error) {  // Expanded error handling

              console.error('Ajax Error:', error);  // Add debugging

              

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



              Swal.fire({

                icon: 'error',

                title: 'Error',

                text: xhr.responseJSON?.message || 'An unexpected error occurred. Please try again.',

                confirmButtonColor: '#0A3622'

              });

            }

          });

        });

      });

    </script>

  </body>

</html>