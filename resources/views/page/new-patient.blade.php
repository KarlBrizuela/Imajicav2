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
      content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
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

   <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.css') }}"/>

    <link rel="stylesheet" href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />

    <!-- Vendors CSS -->

   <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link  rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}" />
     <link rel="stylesheet"  href="{{ asset('vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
   <link rel="stylesheet" href="{{ asset('vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />

    <!-- endbuild -->

    <link rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
     <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="../../assets/js/config.js"></script>

    <!-- Add this CSS to the head section -->
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
        color: #ffffff;
      }

      /* Add to your existing styles */
      /* .menu-item.active > .menu-link {
        background-color: rgba(10, 54, 34, 0.1) !important;
        color: #0a3622 !important;
      }

      .menu-sub .menu-item.active > .menu-link {
        background-color: rgba(10, 54, 34, 0.1) !important;
      } */

      /* Add to your existing styles in new-patient.html */
      .patient-detail-card {
        background: #fff;
        border-radius: 0.75rem;
        padding: 1.25rem;
        height: 100%;
        box-shadow: 0 0.125rem 0.25rem rgba(10, 54, 34, 0.075);
      }

      /* .patient-info-item {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
        padding: 0.5rem;
        border-radius: 0.5rem;
      }

      .patient-info-icon {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e7efe9;
        color: #0a3622;
        border-radius: 0.5rem;
        margin-right: 0.75rem;
      } */

      .medical-concerns-content {
        background-color: #f8f9fa;
        border-radius: 0.75rem;
        padding: 1rem;
      }

      .alert-info-custom {
        background-color: rgba(10, 54, 34, 0.05);
        border: 1px solid rgba(10, 54, 34, 0.1);
        border-radius: 0.75rem;
      }

      .medical-concerns-list {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
      }

      .medical-concern-item {
        display: flex;
        align-items: start;
        padding: 0.5rem;
        background: white;
        border-radius: 0.5rem;
        border: 1px solid rgba(10, 54, 34, 0.1);
      }

      .medical-concern-item i {
        color: #0a3622;
        margin-top: 0.25rem;
      }

      .patient-profile-wrapper {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid #0a3622;
        box-shadow: 0 4px 15px rgba(10, 54, 34, 0.2);
        margin: 0 auto 1rem;
      }

      .patient-profile-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        background-color: #0a3622;
      }

      .modal-xl {
        max-width: 1140px;
      }

      .modal-content {
        border-radius: 1rem;
      }

      .modal-header {
        background: linear-gradient(
          135deg,
          #0a3622 0%,
          #1a5c3c 100%
        ) !important;
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
        padding: 1.5rem;
      }

      /* Add to your existing styles in new-patient.html */
      /* .menu-item.active > .menu-link {
        background-color: rgba(10, 54, 34, 0.1) !important;
        color: #0a3622 !important;
      }

      .menu-item.active.open > .menu-link {
        background-color: rgba(10, 54, 34, 0.1) !important;
        color: #0a3622 !important;
      }

      .menu-sub .menu-item.active > .menu-link {
        background-color: rgba(10, 54, 34, 0.1) !important;
        color: #0a3622 !important;
      }

      .menu-vertical .menu-item .menu-link:hover {
        background-color: rgba(10, 54, 34, 0.1) !important;
        color: #0a3622 !important;
      }

      .menu-sub .menu-item .menu-link:hover {
        background-color: rgba(10, 54, 34, 0.1) !important;
        color: #0a3622 !important;
      } */

      /* Add these shared avatar styles */
      .avatar-wrapper,
      .avatar-preview {
        width: 120px;
        height: 120px;
        overflow: hidden;
        border-radius: 50%;
        border: 3px solid #FFFFFF;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .avatar-placeholder {
        width: 100%;
        height: 100%;
        background: #E6EEFF;
        border-radius: 50%;
        position: relative;
      }

      .avatar-circle {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
      }

      .avatar-silhouette {
        position: absolute;
        width: 100%;
        height: 100%;
      }

      .avatar-head {
        position: absolute;
        width: 60px;
        height: 60px;
        background: #1B3F8F;
        border-radius: 50%;
        top: 20%;
        left: 50%;
        transform: translateX(-50%);
      }

      .avatar-body {
        position: absolute;
        width: 90px;
        height: 45px;
        background: #1B3F8F;
        border-radius: 45px 45px 0 0;
        bottom: 10%;
        left: 50%;
        transform: translateX(-50%);
      }

      .initials {
        color: #1B3F8F;
        font-size: 2.5rem;
        font-weight: 600;
        position: relative;
        z-index: 2;
        text-transform: uppercase;
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

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

        

          <!-- / Navbar -->

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
                        Customer Information
                      </h5>
                    </div>
                    <div class="card-body pt-6">
                      <div class="row">
                        <div class="col-lg-8 mx-auto">
                          <!-- Notification about welcome points -->
                          <div class="alert alert-info mb-4">
                            <div class="d-flex">
                              <i class="ti ti-gift me-2 fs-3"></i>
                              <div>
                                <h5 class="alert-heading mb-1">Welcome Bonus!</h5>
                                <p class="mb-0">All new customers now receive <strong>100 points</strong> as a welcome gift upon registration. These points can be used for discounts on future bookings!</p>
                              </div>
                            </div>
                          </div>
                          
                          <!-- Update the form tag to include enctype -->
                          <form method="POST" action="{{ route('patient.create') }}" enctype="multipart/form-data" id="patientForm">
                            @csrf
                            <div class="row g-6">
                              <div class="col-12 text-center mb-4">
                                <div class="profile-upload-container mx-auto">
                                  <div class="avatar-upload">
                                    <div class="avatar-preview">
                                      <img
                                        id="imagePreview"
                                        alt="Profile Preview"
                                        class="rounded-circle"
                                        style="width: 100%; height: 100%; object-fit: cover; display: none;"
                                      />
                                    </div>
                                    <div class="avatar-edit">
                                      <input
                                        type="file"
                                        id="imageUpload"
                                        name="image_path"
                                        accept=".png, .jpg, .jpeg"
                                        class="d-none"
                                      />
                                      <label
                                        for="imageUpload"
                                        class="btn btn-outline-primary btn-sm mt-2"
                                      >
                                        <i class="ti tabler-upload me-1"></i>Upload Photo (Optional)
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="firstname">First Name</label>
                                <input type="text" id="firstname" name="firstname" class="form-control" value="{{ old('firstname') }}" required />
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="lastname">Last Name</label>
                                <input type="text" id="lastname" name="lastname" class="form-control" value="{{ old('lastname') }}" required />
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="email">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required />
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="phone">Contact Number</label>
                                <input type="tel" id="phone" name="contact_number" class="form-control" value="{{ old('contact_number') }}" required />
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="birthDate">Date of Birth</label>
                                <input type="date" id="birthDate" name="birthdate" class="form-control" value="{{ old('birthdate') }}" required />
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="gender">Gender</label>
                                <select id="gender" name="gender" class="form-select" required>
                                  <option value="">Select Gender</option>
                                  <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                  <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                              </div>

                              {{-- <div class="col-md-6">
                                <label class="form-label">Membership Tier</label>
                                <select class="form-select" name="patient_tier_id" id="patient_tier_id" required>
                                  <option value="">Select Membership Tier</option>
                                  @foreach($tiers as $tier)
                                      <option value="{{ $tier->patient_tier_id }}" {{ old('patient_tier_id') == $tier->patient_tier_id ? 'selected' : '' }}>{{ $tier->tier_name }}</option>
                                  @endforeach
                                </select>
                              </div> --}}

                              <div class="col-md-6">
                                <label class="form-label" for="occupation">Occupation</label>
                                <input type="text" id="occupation" name="occupation" class="form-control" value="{{ old('occupation') }}" />
                              </div>

                              <div class="col-12">
                                <label class="form-label" for="address">Address</label>
                                <textarea name="address" class="form-control" id="address" rows="3" required>{{ old('address') }}</textarea>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="emergencyContact">Emergency Contact Name</label>
                                <input type="text" id="emergencyContact" name="emergency_contact_name" class="form-control" value="{{ old('emergency_contact_name') }}" />
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="emergencyPhone">Emergency Contact Number</label>
                                <input type="tel" id="emergencyPhone" name="emergency_contact_number" class="form-control" value="{{ old('emergency_contact_number') }}" />
                              </div>

                              {{-- <div class="col-12">
                                <label class="form-label" for="allergies">Allergies / Medical Concerns</label>
                                <textarea name="medical_concerns" class="form-control" id="allergies" rows="3">{{ old('medical_concerns') }}</textarea>
                              </div> --}}

                              {{-- <div class="col-12">
                                <label class="form-label" for="medications">Current Medications</label>
                                <textarea name="current_medications" class="form-control" id="medications" rows="2">{{ old('current_medications') }}</textarea>
                              </div> --}}

                              <div class="col-12">
                                <label class="form-label" for="adminNotes">Notes From Admin</label>
                                <textarea name="note_from_admin" class="form-control" id="adminNotes" rows="3">{{ old('note_from_admin') }}</textarea>
                              </div>



                              <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary">Add Customer</button>
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
    <script src="{{ asset('assets/vendor/libs/cleave-zen/cleave-zen.js') }}"></script>
    <script src="{{ asset('vendor/libs/select2/select2.js') }}"></script>

     <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
    <script src="{{ asset('vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('vendor/libs/pickr/pickr.js') }}"></script>

    <!-- Main JS -->

    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/form-layouts.js"></script>
    <script src="../../assets/js/forms-pickers.js"></script>

    <!-- Add this JavaScript before the closing body tag -->
    <script>
document.addEventListener("DOMContentLoaded", function () {
  const imageUpload = document.getElementById("imageUpload");
  const imagePreview = document.getElementById("imagePreview");
  const firstnameInput = document.getElementById("firstname");
  const lastnameInput = document.getElementById("lastname");

  function getInitials(first, last) {
    return ((first ? first[0] : "") + (last ? last[0] : "")).toUpperCase() || "NA";
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
  [firstnameInput, lastnameInput].forEach((input) => {
    input.addEventListener("input", function () {
      if (!imageUpload.files.length) {
        const initials = getInitials(firstnameInput.value, lastnameInput.value);
        imagePreview.src = createInitialsAvatar(initials);
        imagePreview.style.display = 'block';
      }
    });
  });

  // Handle photo upload
  imageUpload.addEventListener("change", function (e) {
    const file = e.target.files[0];
    if (file) {
      const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
      const maxSize = 10 * 1024 * 1024; // 2MB

      if (!validTypes.includes(file.type)) {
        Swal.fire({
          icon: 'error',
          title: 'Invalid File Type',
          text: 'Please upload a JPEG, PNG, or JPG image'
        });
        this.value = '';
        const initials = getInitials(firstnameInput.value, lastnameInput.value);
        imagePreview.src = createInitialsAvatar(initials);
        return;
      }

      if (file.size > maxSize) {
        Swal.fire({
          icon: 'error',
          title: 'File Too Large',
          text: 'Image must be less than 10MB'
        });
        this.value = '';
        const initials = getInitials(firstnameInput.value, lastnameInput.value);
        imagePreview.src = createInitialsAvatar(initials);
        return;
      }

      const reader = new FileReader();
      reader.onload = function (e) {
        imagePreview.src = e.target.result;
        imagePreview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    } else {
      const initials = getInitials(firstnameInput.value, lastnameInput.value);
      imagePreview.src = createInitialsAvatar(initials);
    }
  });

  // Set default avatar on page load
  imagePreview.src = createInitialsAvatar("NA");
  imagePreview.style.display = 'block';
});
</script>
    <button
      class="btn btn-sm btn-success view-patient"
      data-bs-toggle="modal"
      data-bs-target="#patientModal"
      data-name="Sofia Mendoza"
      data-contact="+63 917 123 4567"
      data-email="sofia.mendoza@email.com"
      data-address="123 Makati Avenue, Makati City"
      data-membership="Gold"
      data-points="750"
      data-joined="2023-01-15"
      data-medical="Allergic to certain essential oils, Sensitive skin, High blood pressure, Currently taking anticoagulants"
    >
      View
    </button>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Get current page filename
        const currentPage = window.location.pathname.split("/").pop();

        // Remove active class from all menu items
        document.querySelectorAll(".menu-item").forEach((item) => {
          item.classList.remove("active");
        });

        // Add active class based on current page
        if (currentPage === "new-patient.html") {
          document.getElementById("newPatientMenuItem").classList.add("active");
          document
            .querySelector('a[href="new-patient.html"]')
            .parentElement.parentElement.parentElement.classList.add(
              "active",
              "open"
            );
        } else if (currentPage === "patient-list.html") {
          document
            .getElementById("patientListMenuItem")
            .classList.add("active");
          document
            .querySelector('a[href="patient-list.html"]')
            .parentElement.parentElement.parentElement.classList.add(
              "active",
              "open"
            );
        }
      });
    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Get current page filename
        const currentPage = window.location.pathname.split("/").pop();

        // Remove active class from all menu items
        document.querySelectorAll(".menu-item").forEach((item) => {
          item.classList.remove("active");
        });

        // Add active class based on current page
        if (currentPage === "new-patient.html") {
          document.getElementById("newPatientMenuItem").classList.add("active");
          document
            .querySelector('a[href="new-patient.html"]')
            .parentElement.parentElement.parentElement.classList.add(
              "active",
              "open"
            );
        }
      });
    </script>
    <script>
      // Add to your existing script
      document.addEventListener("DOMContentLoaded", function () {
        // Get current page filename
        const currentPage = window.location.pathname.split("/").pop();

        // Remove active class from all menu items
        document.querySelectorAll(".menu-item").forEach((item) => {
          item.classList.remove("active");
        });

        // Add active class based on current page
        if (currentPage === "new-patient.html") {
          document.getElementById("newPatientMenuItem").classList.add("active");
          document
            .querySelector('a[href="new-patient.html"]')
            .parentElement.parentElement.parentElement.classList.add(
              "active",
              "open"
            );
        }
      });
    </script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Add form submission handler for debugging
        document.querySelector('form').addEventListener('submit', function(e) {
          console.log('Form submitted');
          // Don't prevent default - let the form submit
        });
      
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

    <!-- Add this debugging code to display request info -->
    <script>
      // Check the CSRF token is correctly set
      document.addEventListener("DOMContentLoaded", function() {
        console.log("CSRF Token check:", document.querySelector('input[name="_token"]') ? "Token exists" : "Token missing");
        
        // Form method check
        const formMethod = document.querySelector('input[name="_method"]');
        console.log("Form method:", formMethod ? formMethod.value : "No method override");
      });
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('patientForm');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Disable submit button to prevent double submission
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        
        // Show loading indicator
        Swal.fire({
            title: 'Processing...',
            text: 'Please wait while we create the customer record',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        
        // Submit the form
        this.submit();
    });
});
</script>
  </body>

  <!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/form-layouts-sticky.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:27:42 GMT -->
</html>

