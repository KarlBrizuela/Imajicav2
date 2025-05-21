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
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
      rel="stylesheet"
    />

     <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

   <script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}"
 />

    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    <!-- Vendors CSS -->

  <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- endbuild -->

    <link rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}" />

    <!-- Page CSS -->

    <!-- endbuild -->

     <link  rel="stylesheet"  href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet"  href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link  rel="stylesheet"  href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}"  />
    <!-- Row Group CSS -->
     <link rel="stylesheet"  href="{{ asset('vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />
    <!-- Form Validation -->
     <link rel="stylesheet" href="{{ asset('vendor/libs/%40form-validation/form-validation.css') }}"/>

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Helpers -->
   <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="../../assets/js/config.js"></script>
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


          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card">
                <!-- Branch Filter -->
                <div class="d-flex justify-content-between align-items-center p-3">
                  <h5 class="card-title mb-0">Staff List</h5>
                  <a href="{{ route('page.new-staff') }}" class="btn btn-primary">
                    <i class="ti tabler-plus me-1"></i> Add New Staff
                  </a>
                </div>


                <!-- Success/Error Messages -->
                <div id="responseMessage" style="display: none;" class="alert mx-3 mt-0 mb-3"></div>

                <!-- Table -->
                <div class="table-responsive text-nowrap px-3">
                  <table class="table table-striped" id="staffTable">
                    <thead class="table-light">
                      <tr>
                        <th class="text-center">Profile</th>
                        <th class="text-center">Staff Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Position</th>
                        <th class="text-center">Department</th>
                        <th class="text-center">Contact Number</th>
                        <th class="text-center">Branch</th>
                        <th class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($staffs as $staff)
                      <tr>
                        <td>
                          <div class="avatar">
                            @if($staff->image_path)
          <img src="{{ asset($staff->image_path) }}" alt="Avatar" class="rounded-circle">
                            @else
                              <span class="avatar-initial rounded-circle bg-label-success">
                                {{ strtoupper(substr($staff->firstname ?? '', 0, 1) . substr($staff->lastname ?? '', 0, 1)) }}
                              </span>
                            @endif
                          </div>
                        </td>
                        <td>{{ $staff->firstname }} {{ $staff->lastname }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>{{ $staff->position ? $staff->position->position_name : $staff->position_id }}</td>
                        <td>{{ $staff->department ? $staff->department->department_name : $staff->department_code }}</td>
                        <td>{{ $staff->contact_number }}</td>
                        <td>
                          @if($staff->branch_code)
                            {{ $staff->branch ? $staff->branch->branch_name : $staff->branch_code }}
                          @else
                            N/A
                          @endif
                        </td>
                        <td>
                          <div class="d-inline-block">
                          
                            <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-sm btn-info">
                              <i class="ti tabler-edit me-1"></i> Edit
                            </a>
                            <button type="button" class="btn btn-sm btn-danger delete-staff" 
                              data-id="{{ $staff->id }}"
                              data-name="{{ $staff->firstname }} {{ $staff->lastname }}">
                              <i class="ti tabler-trash me-1"></i> Delete
                            </button>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      @if(count($staffs) == 0)
                      <tr>
                        <td colspan="8" class="text-center">No staff found</td>
                      </tr>
                      @endif
                    </tbody>
                  </table>
                  <br />
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
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-js"></script>>

    <script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>

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

    <!-- Vendors JS -->
   <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <!-- Flat Picker -->
    <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
   <script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <!-- Form Validation -->
    <script src="{{ asset('vendor/libs/%40form-validation/popular.js') }}"></script>
    <script src="{{ asset('vendor/libs/%40form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/libs/%40form-validation/auto-focus.js') }}"></script>



    <!-- Initialize DataTable -->
    <script>
      $(document).ready(function() {
        $('#staffTable').DataTable();
      });
    </script>

    <script>
      $(document).ready(function () {
        $("#servicesTable").DataTable();
      });
    </script>

    <!-- Staff Modal -->
    <div class="modal fade" id="staffModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border-0">
          <div class="modal-header bg-primary text-white border-0">
            <h5 class="modal-title text-white fs-4">
              <i class="ti tabler-user me-2"></i>
              <span id="modalStaffName" class="text-white"></span>
            </h5>
            <button
              type="button"
              class="btn-close btn-close-white"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body p-4">
            <div class="row g-3">
              <!-- Profile and Personal Info Column -->
              <div class="col-md-6">
                <div class="patient-detail-card h-100">
                  <!-- Profile Section -->
                  <div class="text-center mb-3">
                    <div class="patient-profile-wrapper mx-auto">
                      <img
                         src="/public/staff/1747365007.png"
                        alt="Staff Profile"
                        class="patient-profile-image"
                        id="modalProfileImage"
                      />
                    </div>
                    <h5 class="mt-3 mb-1" id="modalStaffNameProfile"></h5>
                    <p class="text-muted mb-0" id="modalPosition"></p>
                  </div>
                  <!-- Personal Info -->
                  <div class="patient-info-item">
                    <div class="patient-info-icon">
                      <i class="ti tabler-phone"></i>
                    </div>
                    <div>
                      <small class="text-muted d-block">Contact</small>
                      <span id="modalContact" class="fw-semibold"></span>
                    </div>
                  </div>
                  <div class="patient-info-item">
                    <div class="patient-info-icon">
                      <i class="ti tabler-mail"></i>
                    </div>
                    <div>
                      <small class="text-muted d-block">Email</small>
                      <span id="modalEmail" class="fw-semibold"></span>
                    </div>
                  </div>
                  <div class="patient-info-item">
                    <div class="patient-info-icon">
                      <i class="ti tabler-briefcase"></i>
                    </div>
                    <div>
                      <small class="text-muted d-block">Department</small>
                      <span id="modalDepartment" class="fw-semibold"></span>
                    </div>
                  </div>
                  <div class="patient-info-item">
                    <div class="patient-info-icon">
                      <i class="ti tabler-building"></i>
                    </div>
                    <div>
                      <small class="text-muted d-block">Branch</small>
                      <span id="modalBranch" class="fw-semibold"></span>
                    </div>
                  </div>
                  <div class="patient-info-item mb-0">
                    <div class="patient-info-icon">
                      <i class="ti tabler-map-pin"></i>
                    </div>
                    <div>
                      <small class="text-muted d-block">Address</small>
                      <span id="modalAddress" class="fw-semibold"></span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Additional Information Column -->
              <div class="col-md-6">
                <div class="patient-detail-card h-100">
                  <h6 class="text-primary mb-3">Employment Information</h6>
                  <div class="patient-info-item">
                    <div class="patient-info-icon">
                      <i class="ti tabler-calendar"></i>
                    </div>
                    <div>
                      <small class="text-muted d-block">Join Date</small>
                      <span id="modalJoinDate" class="fw-semibold"></span>
                    </div>
                  </div>
                  <div class="patient-info-item">
                    <div class="patient-info-icon">
                      <i class="ti tabler-id"></i>
                    </div>
                    <div>
                      <small class="text-muted d-block">Employment Type</small>
                      <span id="modalEmploymentType" class="fw-semibold"></span>
                    </div>
                  </div>
                  <div class="patient-info-item mb-0">
                    <div class="patient-info-icon">
                      <i class="ti tabler-emergency"></i>
                    </div>
                    <div>
                      <small class="text-muted d-block">Emergency Contact</small>
                      <span id="modalEmergencyContact" class="fw-semibold"></span>
                      <small id="modalEmergencyNumber" class="text-muted d-block mt-1"></small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="editStaffLink" class="btn btn-info" data-bs-dismiss="modal">
              <i class="ti tabler-edit me-1"></i> Edit Staff
            </button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteStaffModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <h5 class="modal-title text-white">Confirm Delete</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete <span id="deleteStaffName" class="fw-bold"></span>? This action cannot be undone.</p>
          </div>
          <div class="modal-footer">
            <form id="deleteStaffForm" action="" method="POST">
              @csrf
              @method('DELETE')
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Clean modal styles -->
    <style>
      .avatar {
        width: 38px;
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
      }
      
      .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
      
      .avatar-initial {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 500;
        font-size: 0.875rem;
      }
      
      .rounded-circle {
        border-radius: 50% !important;
      }
      
      .modal-header {
        background: linear-gradient(135deg, #0a3622 0%, #1a5c3c 100%) !important;
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
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
      }
      
      .patient-detail-card {
        background: #fff;
        border-radius: 0.75rem;
        padding: 1.25rem;
        height: 100%;
        box-shadow: 0 0.125rem 0.25rem rgba(10, 54, 34, 0.075);
      }
      
      .patient-info-item {
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
      }
      
      /* Profile image edit overlay */
      .profile-image-overlay {
        position: relative;
        width: 100%;
        height: 100%;
      }
      
      .patient-profile-wrapper:hover .patient-profile-image {
        opacity: 0.7;
      }
      
      /* Form styling */
      .modal-lg {
        max-width: 900px;
      }
      
      .form-label {
        font-weight: 500;
      }
      
      .modal-body hr {
        opacity: 0.1;
      }
    </style>

    <!-- JavaScript for staff modals -->
    <script>
      // Add SweetAlert default configuration
      const swalConfig = {
        customClass: {
          container: 'swal-container-class',
          popup: 'swal-popup-class',
          confirmButton: 'btn btn-danger me-3',
          cancelButton: 'btn btn-secondary'
        },
        backdrop: true,
        allowOutsideClick: false,
        buttonsStyling: false
      };

      document.addEventListener("DOMContentLoaded", function() {
        // Create initials avatar when no image is available
        function createInitialsAvatar(name) {
          if (!name) return '';
          
          const canvas = document.createElement("canvas");
          const context = canvas.getContext("2d");
          canvas.width = 120;
          canvas.height = 120;

          context.fillStyle = "#0a3622";

          context.beginPath();
          context.arc(60, 60, 60, 0, Math.PI * 2);
          context.fill();

          const initials = name
            .split(" ")
            .map(word => word[0])
            .join("")
            .toUpperCase();

          context.font = "bold 48px Arial";
          context.fillStyle = "#FFFFFF";
          context.textAlign = "center";
          context.textBaseline = "middle";
          context.fillText(initials, 60, 60);

          return canvas.toDataURL();
        }

        // Handle delete staff button clicks
        const deleteButtons = document.querySelectorAll(".delete-staff");
        
        deleteButtons.forEach(button => {
          button.addEventListener("click", function() {
            const staffId = this.dataset.id;
            const staffName = this.dataset.name;
            
            // Show delete confirmation
            Swal.fire({
              ...swalConfig,
              title: 'Confirm Delete',
              html: `Are you sure you want to delete staff <strong>${staffName}</strong>?<br>This action cannot be undone.`,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'Cancel',
              confirmButtonColor: '#d33',
              cancelButtonColor: '#6c757d'
            }).then((result) => {
              if (result.isConfirmed) {
                try {
                  // Create and submit form
                  const form = document.createElement('form');
                  form.method = 'POST';
                  form.action = `/staff/${staffId}`;
                  
                  const csrfToken = document.createElement('input');
                  csrfToken.type = 'hidden';
                  csrfToken.name = '_token';
                  csrfToken.value = '{{ csrf_token() }}';
                  
                  const method = document.createElement('input');
                  method.type = 'hidden';
                  method.name = '_method';
                  method.value = 'DELETE';
                  
                  form.appendChild(csrfToken);
                  form.appendChild(method);
                  document.body.appendChild(form);
                  
                  form.submit();
                } catch (e) {
                  console.error("Error submitting delete form:", e);
                  Swal.fire({
                    ...swalConfig,
                    icon: 'error',
                    title: 'Delete Error',
                    html: 'An error occurred while deleting the staff:<br>' + e.message,
                    showConfirmButton: true
                  });
                }
              }
            });
          });
        });

        // Display success/error messages
        @if(session('success'))
          Swal.fire({
            ...swalConfig,
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
            timer: 1500,
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
            showConfirmButton: true
          });
        @endif
      });
    </script>
  </body>
</html>
