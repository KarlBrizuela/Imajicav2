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
    
    <!-- Include the same CSS as staff-list -->
   <link rel="stylesheet" href="/public/vendor/fonts/iconify-icons.css" />
    <link rel="stylesheet" href="/public/vendor/css/core.css" />
    <link rel="stylesheet" href="/public/css/demo.css" />
    <link rel="stylesheet" href="/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"  />
    <link  rel="stylesheet" href="/public/vendor/libs/flatpickr/flatpickr.css"  />
    <link  rel="stylesheet" href="/public/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
    <link  rel="stylesheet" href="/public/vendor/libs/jquery-timepicker/jquery-timepicker.css">
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
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center p-3">
                  <h4 class="card-title mb-5">Position List</h4>
                  <a href="{{ route('page.new-position') }}" class="btn btn-primary">
                    <i class="ti tabler-plus me-1"></i> Add New Position
                  </a>
                </div>

                <!-- Response Messages -->
                <div id="responseMessage" style="display: none;" class="alert mx-3 mt-0 mb-3"></div>

                <!-- Table -->
                <div class="table-responsive text-nowrap px-3" >
                  <table class="table table-striped" id="positionTable" style="width: 100%;">
                    <thead class="table-light">
                      <tr>
                        <th>Position Title</th>
                        <th>Department</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(isset($positions) && count($positions) > 0)
                        @foreach($positions as $position)
                        <tr>
                          <td>{{ $position->position_name }}</td>
                          <td>{{ $position->department ? $position->department->department_name : $position->department_id }}</td>
                          <td>{{ $position->description }}</td>
                          <td>
                            <span class="badge bg-label-{{ $position->status ? 'success' : 'danger' }}">
                              {{ $position->status ? 'Active' : 'Inactive' }}
                            </span>
                          </td>
                          <td>
                            <div class="d-inline-block">
                              <button type="button" class="btn btn-sm btn-info">
                                <a href="{{ route('position.edit', $position->position_id) }}" class="text-white">
                                  <i class="ti tabler-edit me-1"></i> Edit
                                </a>
                              </button>
                              
                              <button class="btn btn-sm btn-danger delete-position" 
                                data-position-id="{{ $position->position_id }}"
                                data-position-title="{{ $position->position_name }}">
                                <i class="ti tabler-trash me-1"></i> Delete
                              </button>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      @else
                        <tr>
                          <td colspan="5" class="text-center">No positions found</td>
                        </tr>
                      @endif
                    </tbody>
                  </table>
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

    <!-- Add Position Modal -->
    <div class="modal fade" id="addPositionModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form 
          id="addPositionForm" method="POST" action="{{ route('position.create') }}"
          >
            @csrf
            <div class="modal-header" style="background-color: #0a3622">
              <h5 class="modal-title text-white">
                <i class="ti tabler-plus me-1"></i> Add New Position
              </h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label" for="position_name">Position Name</label>
                  <input type="text" id="position_name" name="position_name" class="form-control" required>
                </div>

                <div class="col-12">
                  <label class="form-label" for="department">Department</label>
                  <select class="form-select" id="department_code" name="department_code" required>
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                      <option value="{{ $department->department_code }}">{{ $department->department_name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-12">
                  <label class="form-label" for="description">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>

                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="status" name="status" checked>
                    <label class="form-check-label" for="status">Active Status</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Add Position</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Edit Position Modal -->
    <div class="modal fade" id="editPositionModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form id="editPositionForm" method="POST" action="{{ route('position.update') }}">
            @csrf
            @method('PUT')
            <input type="hidden" id="edit_position_id" name="position_id">
            
            <div class="modal-header" style="background-color: #0a3622">
              <h5 class="modal-title text-white">
                <i class="ti tabler-edit me-1"></i> Edit Position
              </h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label" for="edit_position_name">Position Name</label>
                  <input type="text" id="edit_position_name" name="position_name" class="form-control" required>
                </div>

                <div class="col-12">
                  <label class="form-label" for="edit_department_code">Department</label>
                  <select class="form-select" id="edit_department_code" name="department_code" required>
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                      <option value="{{ $department->department_code }}">{{ $department->department_name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-12">
                  <label class="form-label" for="edit_description">Description</label>
                  <textarea class="form-control" id="edit_description" name="description" rows="3" required></textarea>
                </div>

                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="edit_status" name="status">
                    <label class="form-check-label" for="edit_status">Active Status</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Update Position</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Delete Position Form (Hidden) -->
    <form id="deletePositionForm" method="POST" action="/position/delete" style="display: none;">
      @csrf
      @method('DELETE')
      <input type="hidden" id="delete_position_id" name="position_id">
    </form>


    <!-- Include Scripts -->
   <script src="/public/vendor/libs/jquery/jquery.js"></script>
    <script src="/public/vendor/libs/popper/popper.js"></script>
   <script src="/public/vendor/js/bootstrap.js"></script>
    < <script src="/public/vendor/js/menu.js"></script>
    <script src="./public/assets/js/main.js"></script>

    <!-- DataTables Scripts -->
     <script src="/public/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
     <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
   <link  rel="stylesheet"  href="/public/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="/public/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    
    <!-- Add SweetAlert2 library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link  rel="stylesheet"  href="/public/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="/public/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet"  href="/public/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link  rel="stylesheet"  href="/public/vendor/libs/flatpickr/flatpickr.css"  />
  <!-- Row Group CSS -->
   <link rel="stylesheet"  href="/public/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css" />
  <!-- Form Validation -->
<link rel="stylesheet" href="/public/vendor/libs/%40form-validation/form-validation.cs"/>
 <link  rel="stylesheet"  href="/public/vendor/libs/select2/select2.css" />

    <script>
      $(document).ready(function() {
        // SweetAlert default configuration
        const swalConfig = {
          customClass: {
            container: 'swal-container-class',
            popup: 'swal-popup-class',
            confirmButton: 'btn btn-primary me-3',
            cancelButton: 'btn btn-label-secondary'
          },
          buttonsStyling: false,
          backdrop: true,
          allowOutsideClick: false
        };

        // Add custom CSS for SweetAlert z-index
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

        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Display success/error messages
        @if(session('success'))
            Swal.fire({
                ...swalConfig,
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                timer: 1000,
                showConfirmButton: false
            });
        @endif

        @if(session('error'))
            Swal.fire({
                ...swalConfig,
                icon: 'error',
                title: 'Error',
                text: "{{ session('error') }}",
                timer: 1000,
                showConfirmButton: false
            });
        @endif

        // Add Position Form Submit
        $('#addPositionForm').on('submit', function(e) {
            e.preventDefault();
            const submitBtn = $(this).find('button[type="submit"]');
            submitBtn.prop('disabled', true);
            
            // Clear any existing error messages
            $('.error-feedback').remove();
            
            $.ajax({
                url: '{{ route("position.create") }}',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        ...swalConfig,
                        icon: 'success',
                        title: 'Success',
                        text: 'Position created successfully!',
                        timer: 1500
                    }).then(() => {
                        $('#addPositionModal').modal('hide');
                        location.reload();
                    });
                },
                error: function(xhr) {
                    submitBtn.prop('disabled', false);
                    
                    if (xhr.status === 422) { // Validation error
                        const errors = xhr.responseJSON.errors;
                        Object.keys(errors).forEach(field => {
                            const input = $(`[name="${field}"]`);
                            input.addClass('is-invalid');
                            input.after(`<div class="invalid-feedback error-feedback">${errors[field][0]}</div>`);
                        });
                        
                        Swal.fire({
                            ...swalConfig,
                            icon: 'error',
                            title: 'Validation Error',
                            text: 'Please check the form for errors'
                        });
                    } else {
                        Swal.fire({
                            ...swalConfig,
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to create position. Please try again.'
                        });
                    }
                }
            });
        });

        // Handle delete position button clicks 
        $('.delete-position').on('click', function(e) {
            e.preventDefault();
            
            const positionId = $(this).data('position-id');
            const positionTitle = $(this).data('position-title');
            
            // Show delete confirmation dialog
            Swal.fire({
                ...swalConfig,
                title: 'Confirm Delete',
                html: `Are you sure you want to delete position <strong>${positionTitle}</strong>?<br>This action cannot be undone.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/position/delete',
                        type: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            _method: 'DELETE', 
                            position_id: positionId
                        },
                        success: function(response) {
                            Swal.fire({
                                ...swalConfig,
                                icon: 'success',
                                title: 'Success',
                                text: 'Position deleted successfully!',
                                timer: 1500
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire({
                                ...swalConfig,
                                icon: 'error',
                                title: 'Delete Error',
                                text: 'Failed to delete position'
                            });
                        }
                    });
                }
            });
        });

        // Replace the existing edit-position click handler with this:
        $('.edit-position').on('click', function() {
            const positionId = $(this).data('position-id');
            const positionName = $(this).data('position-title');
            const departmentCode = $(this).data('position-department');
            const description = $(this).data('position-description');
            const status = $(this).data('position-status');

            // Populate the edit form
            $('#edit_position_id').val(positionId);
            $('#edit_position_name').val(positionName);
            $('#edit_department_code').val(departmentCode);
            $('#edit_description').val(description);
            $('#edit_status').prop('checked', status == 1);
        });

        // Add this edit form submit handler
        $('#editPositionForm').on('submit', function(e) {
            e.preventDefault();
            const submitBtn = $(this).find('button[type="submit"]');
            submitBtn.prop('disabled', true);

            // Clear previous error messages
            $('.error-feedback').remove();
            $('.is-invalid').removeClass('is-invalid');

            // Show confirmation dialog
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
                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            Swal.fire({
                                ...swalConfig,
                                icon: 'success',
                                title: 'Success',
                                text: 'Position updated successfully!',
                                timer: 1500
                            }).then(() => {
                                $('#editPositionModal').modal('hide');
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            submitBtn.prop('disabled', false);
                            if (xhr.status === 422) {
                                const errors = xhr.responseJSON.errors;
                                Object.keys(errors).forEach(field => {
                                    const input = $(`[name="${field}"]`);
                                    input.addClass('is-invalid');
                                    input.after(`<div class="invalid-feedback error-feedback">${errors[field][0]}</div>`);
                                });
                                
                                Swal.fire({
                                    ...swalConfig,
                                    icon: 'error',
                                    title: 'Validation Error',
                                    text: 'Please check the form for errors'
                                });
                            } else {
                                Swal.fire({
                                    ...swalConfig,
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Failed to update position'
                                });
                            }
                        }
                    });
                } else {
                    submitBtn.prop('disabled', false);
                }
            });
        });

        function showAlert(type, message) {
            const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
            $('#responseMessage').removeClass('alert-success alert-danger').addClass(alertClass).html(message).fadeIn().delay(3000).fadeOut();
        }

    
      });
    </script>


<script>
  $(document).ready(function() {
    var table = $('#positionTable').DataTable({
      responsive: true,
      searching: true,
      lengthChange: true,
      info: true
    });
  });
</script>

  </body>
</html>
