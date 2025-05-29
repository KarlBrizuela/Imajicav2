@extends('layouts.app')
@extends('layouts.layout-collapsed-menu-dark')
@extends('layouts.layout-container-dark')
@extends('layouts.layout-content-navbar-and-sidebar-dark')
@extends('layouts.layout-without-navbar-dark')
@extends('layouts.layout-content-navbar-dark')
@extends('layouts.layout-fluid-dark')
@extends('layouts.layout-without-menu-dark')

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

     <link rel="stylesheet" href="/public/vendor/fonts/iconify-icons.css" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <script src="/public/vendor/libs/node-waves/node-waves.js"></script>
    <link rel="stylesheet" href="/public/vendor/libs/pickr/pickr-themes.css"/>
    <link rel="stylesheet" href="/public/vendor/css/core.css" />
    <link rel="stylesheet" href="/public/css/demo.css" />
    <!-- Vendors CSS -->

    <link rel="stylesheet" href="/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"  />
    <link  rel="stylesheet" href="/public/vendor/libs/flatpickr/flatpickr.css"  />
    <link  rel="stylesheet" href="/public/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
    <link  rel="stylesheet" href="/public/vendor/libs/jquery-timepicker/jquery-timepicker.css">

    <!-- endbuild -->

    <link rel="stylesheet" href="/public/vendor/libs/select2/select2.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/public/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="/public/assets/js/config.js"></script>

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
                    <div class="card-header d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row"
                      style="background-color: #0a3622">
                      <h5 class="card-title mb-sm-0 me-2 text-white">
                        Edit Staff
                      </h5>
                     
                    </div>

                    <div class="card-body pt-6">
                      <div class="row">
                        <div class="col-lg-8 mx-auto">
                          <form method="POST" action="{{ route('staff.update', $staff->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="staff_id" value="{{ $staff->id }}">
                            
                            <div class="row g-6">
                              <!-- Profile Image -->
                              <div class="col-12 text-center mb-4">
                                <div class="profile-upload-container mx-auto">
                                  <div class="avatar-upload">
                                    <div class="avatar-preview">
                                      <img id="imagePreview" 
                                           src="{{ $staff->image_path ? asset('public/'.$staff->image_path) : asset('assets/img/avatars/default-avatar.png') }}"
                                           alt="Profile Preview"
                                           class="rounded-circle"
                                           style="width: 100%; height: 100%; object-fit: cover;"
                                      />
                                    </div>
                                    <div class="avatar-edit">
                                      <input type="file" id="imageUpload" name="image_path" accept=".png, .jpg, .jpeg" class="d-none" />
                                      <label for="imageUpload" class="btn btn-primary btn-sm mt-2">
                                        <i class="ti tabler-upload me-1"></i>Change Photo
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- Staff Information Fields -->
                              <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" name="firstname" class="form-control" value="{{ $staff->firstname }}" required>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="lastname" class="form-control" value="{{ $staff->lastname }}" required>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $staff->email }}" required>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label">Contact Number</label>
                                <input type="text" name="contact_number" class="form-control" value="{{ $staff->contact_number }}" required>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label">Position</label>
                                <select name="position_id" class="form-select" required>
                                  <option value="">Select Position</option>
                                  @foreach($positions as $position)
                                    <option value="{{ $position->position_id }}" {{ $staff->position_id == $position->position_id ? 'selected' : '' }}>
                                      {{ $position->position_name }}
                                    </option>
                                  @endforeach
                                </select>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label">Department</label>
                                <select name="department_code" class="form-select" required>
                                  <option value="">Select Department</option>
                                  @foreach($departments as $department)
                                    <option value="{{ $department->department_code }}" {{ $staff->department_code == $department->department_code ? 'selected' : '' }}>
                                      {{ $department->department_name }}
                                    </option>
                                  @endforeach
                                </select>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label">Branch</label>
                                <select name="branch_code" class="form-select" required>
                                  <option value="">Select Branch</option>
                                  @foreach($branches as $branch)
                                    <option value="{{ $branch->branch_code }}" {{ $staff->branch_code == $branch->branch_code ? 'selected' : '' }}>
                                      {{ $branch->branch_name }}
                                    </option>
                                  @endforeach
                                </select>
                              </div>

                              <!-- Additional Fields -->
                              <div class="col-12">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control" rows="3" required>{{ $staff->address }}</textarea>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label">Emergency Contact Name</label>
                                <input type="text" name="emergency_contact_name" class="form-control" value="{{ $staff->emergency_contact_name }}">
                              </div>

                              <div class="col-md-6">
                                <label class="form-label">Emergency Contact Number</label>
                                <input type="text" name="emergency_contact_number" class="form-control" value="{{ $staff->emergency_contact_number }}">
                              </div>

                              <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary me-1">Update Staff</button>
                                <a href="{{ route('page.staff-list') }}" class="btn btn-outline-secondary">Cancel</a>
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

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/theme.js -->

    <script src="/public/vendor/libs/jquery/jquery.js"></script>
    <script src="/public/vendor/libs/popper/popper.js"></script>
   <script src="/public/vendor/js/bootstrap.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="/public/vendor/libs/node-waves/node-waves.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-js"></script>>

    <script src="/public/vendor/libs/flatpickr/flatpickr.js"></script>

    <script src="/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

     <script src="/public/vendor/libs/hammer/hammer.js"></script>

    <script src="/public/vendor/libs/i18n/i18n.js"></script>

    <script src="/public/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/public/vendor/libs/cleave-zen/cleave-zen.js"></script>
    <script src="/public/vendor/libs/select2/select2.js"></script>

    <script src="/public/vendor/libs/moment/moment.js"></script>
    <script src="/public/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="/public/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="/public/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
    <script src="/public/vendor/libs/pickr/pickr.js"></script>

    <!-- Main JS -->

    <script src="/public/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/public/assets/js/form-layouts.js"></script>
    <script src="/public/assets/js/forms-pickers.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const imageUpload = document.getElementById("imageUpload");
        const imagePreview = document.getElementById("imagePreview");
        const firstName = document.getElementById("firstName");
        const lastName = document.getElementById("lastName");

        function getInitials(first, last) {
          return (
            ((first ? first[0] : "") + (last ? last[0] : "")).toUpperCase() ||
            "NA"
          );
        }

        function createInitialsAvatar(initials) {
          const canvas = document.createElement("canvas");
          const context = canvas.getContext("2d");
          canvas.width = 150;
          canvas.height = 150;

          // Draw background circle
          context.fillStyle = "#0a3622";
          context.beginPath();
          context.arc(75, 75, 75, 0, Math.PI * 2);
          context.fill();

          // Draw initials
          context.font = "bold 60px Arial";
          context.fillStyle = "#FFFFFF";
          context.textAlign = "center";
          context.textBaseline = "middle";
          context.fillText(initials, 75, 75);

          return canvas.toDataURL();
        }

        // Generate avatar when names change
        [firstName, lastName].forEach((input) => {
          input.addEventListener("input", function () {
            if (!imageUpload.files.length) {
              const initials = getInitials(firstName.value, lastName.value);
              imagePreview.src = createInitialsAvatar(initials);
            }
          });
        });

        // Handle photo upload
        imageUpload.addEventListener("change", function (e) {
          const file = e.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
              imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
          } else {
            const initials = getInitials(firstName.value, lastName.value);
            imagePreview.src = createInitialsAvatar(initials);
          }
        });

        // Set default avatar on page load
        imagePreview.src = createInitialsAvatar("NA");
      });
    </script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Display success message using SweetAlert2
        @if(session('success'))
          Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
          });
        @endif

        // Display error message using SweetAlert2
        @if(session('error'))
          Swal.fire({
            title: 'Error!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'OK'
          });
        @endif

        // Display validation errors if any
        @if($errors->any())
          let errorMessage = '<ul>';
          @foreach($errors->all() as $error)
            errorMessage += '<li>{{ $error }}</li>';
          @endforeach
          errorMessage += '</ul>';
          
          Swal.fire({
            title: 'Validation Error',
            html: errorMessage,
            icon: 'error',
            confirmButtonText: 'OK'
          });
        @endif
      });
    </script>
  </body>

  <!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/form-layouts-sticky.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:27:42 GMT -->
</html>

<!-- beautify ignore:end -->
