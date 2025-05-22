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

    <title>Imajica Booking System - Department List</title>

    <meta name="description" content="Imajica Booking System" />
    <meta name="keywords" content="Imajica Booking System" />

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
    <link rel="stylesheet"  href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />
    <link  rel="stylesheet"  href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />
    <!-- Add this to your <head> section -->
<link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <!-- Vendors CSS -->
    <link  rel="stylesheet"  href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <!-- Page CSS -->
    <<link  rel="stylesheet"  href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}"  />
    <link  rel="stylesheet"   href="{{ asset('vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link  rel="stylesheet"  href="{{ asset('vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <script src="../../assets/js/config.js"></script>

   
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
              <div class="card">
                <!-- Department Filter -->
                <div class="d-flex justify-content-between align-items-center p-3">
                  <h5 class="card-title mb-0">Department List</h5>
                  <a href="{{ route('page.new-department') }}" class="btn btn-primary">
                    <i class="ti tabler-plus me-1"></i> Add New Department
                  </a>
                </div>

                <!-- Success/Error Messages -->
                <div id="responseMessage" style="display: none;" class="alert mx-3 mt-0 mb-3"></div>

                <!-- Debug Section (Remove in production) -->
                <div class="d-none">
                  <h6>Debug Information:</h6>
                  <pre>{{ print_r($departments->toArray(), true) }}</pre>
                </div>

                <!-- Table -->
                <div class="table-responsive text-nowrap px-3">
                  <table class="table table-striped" id="departmentTable">
                    <thead class="table-light">
                      <tr>
                        <th>Department Code</th>
                        <th>Department Name</th>
                        <th>Description</th>
                        <th>Department Head</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($departments as $department)
                      <tr>
                        <td>{{ $department->department_code }}</td>
                        <td>{{ $department->department_name }}</td>
                        <td>{{ $department->description }}</td>
                        <td>  {{ $department->department_head }} </td>
                       
                        <td>
                          <a href="{{ route('page.edit-department', ['department_code' => $department->department_code]) }}" 
                             class="btn btn-info btn-sm">
                            <i class="ti tabler-edit me-1"></i> Edit
                          </a>
                          <button type="button" class="btn btn-danger btn-sm delete-department" 
                            data-department-code="{{ $department->department_code }}"
                            data-department-name="{{ $department->department_name }}">
                            <i class="ti tabler-trash me-1"></i>Delete
                          </button>
                        </td>
                      </tr>
                      @endforeach
                      @if(count($departments) == 0)
                      <tr>
                        <td colspan="4" class="text-center">No departments found</td>
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

    <!-- Edit Department Modal -->
    <div class="modal fade" id="editDepartmentModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #0a3622">
            <h5 class="modal-title text-white">Edit Department</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editDepartmentForm" method="POST" action="{{ route('department.update') }}">
              @csrf
              @method('PUT')
              <input type="hidden" id="edit_department_code" name="department_code">
              <div class="mb-3">
                <label class="form-label" for="edit_department_name">Department Name</label>
                <input type="text" id="edit_department_name" name="department_name" class="form-control" required>
                <div class="invalid-feedback" id="edit_department_name_error"></div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="edit_description">Description</label>
                <textarea id="edit_description" name="description" class="form-control" rows="3" required></textarea>
                <div class="invalid-feedback" id="edit_description_error"></div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Update Department</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete Department Form (Hidden) -->
    <form id="deleteDepartmentForm" method="POST" action="{{ route('department.delete') }}" style="display: none;">
      @csrf
      @method('DELETE')
      <input type="hidden" id="delete_department_code" name="department_code">
    </form>

    <!-- Core JS -->
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

    <!-- Vendors JS -->
    <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
     <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>
   <script src="{{ asset('vendor/libs/%40form-validation/popular.js') }}"></script>
    <script src="{{ asset('vendor/libs/%40form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/libs/%40form-validation/auto-focus.js') }}"></script>
    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom Script for Department Management -->
    <script>
      $(document).ready(function() {
        // SweetAlert default configuration to appear above the modal
        const swalConfig = {
          customClass: {
            container: 'swal-container-class',
            popup: 'swal-popup-class'
          },
          backdrop: true,
          allowOutsideClick: false
        };
        
        // Add custom CSS to ensure SweetAlert appears above modal
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

        // Display success/error messages
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

        // Display validation errors if any
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

        // Handle edit department button clicks
        $('.edit-department').on('click', function() {
          const departmentCode = $(this).data('department-code');
          const departmentName = $(this).data('department-name');
          const description = $(this).data('description');
          const departmentHead = $(this).data('department-head');
          const departmentHeadId = $(this).data('department-head-id');
          
          // Populate the form fields
          $('#edit_department_code').val(departmentCode);
          $('#edit_department_name').val(departmentName);
          $('#edit_description').val(description);
          
          // Note: We don't populate the department head field because it's a foreign key
          // and changing it would require additional logic to handle the staff relationship
          
          // Show the modal
          $('#editDepartmentModal').modal('show');
        });

        // Handle form submission with confirmation
        $('#editDepartmentForm').on('submit', function(e) {
          e.preventDefault();
          
          // Hide the modal before showing SweetAlert
          $('#editDepartmentModal').modal('hide');
          
          setTimeout(() => {
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
                // Submit the form normally
                this.submit();
              } else {
                // If canceled, show the modal again
                $('#editDepartmentModal').modal('show');
              }
            });
          }, 200); // Small delay to ensure modal is fully hidden
        });

        // Handle delete department button clicks
        $('.delete-department').on('click', function() {
          const departmentCode = $(this).data('department-code');
          const departmentName = $(this).data('department-name');
          
          // Set the department code in the hidden delete form
          $('#delete_department_code').val(departmentCode);
          
          // Show delete confirmation
          Swal.fire({
            ...swalConfig,
            title: 'Confirm Delete',
            html: `Are you sure you want to delete department <strong>${departmentName}</strong>?<br>This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d'
          }).then((result) => {
            if (result.isConfirmed) {
              // Submit the delete form
              $('#deleteDepartmentForm').submit();
            }
          });
        });
      });
    </script>


<script>
  $(document).ready(function() {
    // Initialize DataTable with a very simple configuration
    var table = $('#departmentTable').DataTable({
      "language": {
        "emptyTable": "No departments found"
      },
      "columnDefs": [
        { "orderable": false, "targets": 3 } // Disable ordering for the actions column
      ],
      "order": [[0, 'asc']],
      "pageLength": 10,
      "pageLength": 10,
      
      "scrollX": true,      // Enable horizontal scrolling
      "scrollCollapse": true,
      "autoWidth": false 
    });
  });
</script>

  </body>
</html>
