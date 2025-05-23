@extends('layouts.app')


<!DOCTYPE html>
<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default"
  data-assets-path="../../assets/" data-template="vertical-menu-template" data-bs-theme="light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Imajica Booking System</title>

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
  <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
    rel="stylesheet" />

   <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />

  <!-- Core CSS -->
  <!-- build:css assets/vendor/css/theme.css  -->

 <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.js') }}" />
   <link rel="stylesheet" href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}">
<link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />

  <!-- Vendors CSS -->

<link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

  <!-- endbuild -->

  <link rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}" />

  <!-- Page CSS -->

  <!-- endbuild -->

   <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
   <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css">
 <link rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}" />
  <!-- Row Group CSS -->
  <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">

  <!-- Form Validation -->
   <link rel="stylesheet" href="{{ asset('vendor/libs/@form-validation/form-validation.css') }}" />

  <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>

  <script src="../../assets/js/config.js"></script>


  </script>

  <style>
    /* Add to your existing styles */
    .client-detail-card {
      background: #fff;
      border-radius: 0.75rem;
      padding: 1.25rem;
      height: 100%;
      box-shadow: 0 0.125rem 0.25rem rgba(10, 54, 34, 0.075);
    }

    .client-info-item {
      display: flex;
      align-items: center;
      margin-bottom: 1rem;
      padding: 0.5rem;
      border-radius: 0.5rem;
    }

    .client-info-icon {
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

    .modal-content {
      border-radius: 1rem;
    }

    .modal-header {
      background: linear-gradient(135deg,
          #0a3622 0%,
          #1a5c3c 100%) !important;
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
      padding: 1.5rem;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.25rem;
    }

    .btn i {
      font-size: 1rem;
    }

    .btn-sm {
      padding: 0.25rem 0.5rem;
      font-size: 0.875rem;
    }

    .gap-2 {
      gap: 0.5rem !important;
    }
  </style>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      @include('components.sidebar')

      <!-- Keep rest of existing content -->
      <div class="layout-page">
   
        <!-- Replace the existing table section with this -->
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="card">
            <!-- Table Header with Search -->
            <div class="d-flex justify-content-between align-items-center p-3">
              <h5 class="card-title mb-0">Services List</h5>
              <a class="btn btn-primary" href="{{ route('page.new-services') }}">
                <i class="ti tabler-plus me-1"></i> Add New Service
              </a>
            </div>

            <!-- Success/Error Messages -->
            <div id="responseMessage" style="display: none;" class="alert mx-3 mt-0 mb-3"></div>

            <!-- Table -->
            <div class="table-responsive text-nowrap px-3">
              <table class="table table-striped" id="servicesTable">
                <thead class="table-light">
                  <tr>
                    <th>Services Name</th>
                    <th>Branch Name</th>
                    <th>Description</th>
                    <th class="text-center">Service Cost</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($services as $service)
                  <tr>
                    <td>{{ $service->service_name }}</td>
                    <td>{{ $service->branch ? $service->branch->branch_name : $service->branch_code }}</td>
                    <td>{{ $service->description }}</td>
                    <td>₱{{ number_format($service->service_cost, 2) }}</td>
                    <td class="text-center">
                      <div class="d-flex gap-2 justify-content-center">
                        <button type="button" class="btn btn-sm btn-info edit-service" 
                          data-service-id="{{ $service->service_id }}"
                          data-service-name="{{ $service->service_name }}"
                          data-service-branch="{{ $service->branch_code }}"
                          data-service-description="{{ $service->description }}"
                          data-service-cost="{{ $service->service_cost }}">
                          <i class="ti tabler-edit me-1"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-danger delete-service" 
                          data-service-id="{{ $service->service_id }}"
                          data-service-name="{{ $service->service_name }}">
                          <i class="ti tabler-trash me-1"></i> Delete
                        </button>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <br />
            </div>
          </div>
        </div>

        <!-- View Service Modal -->
        <div class="modal fade" id="serviceModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header sticky-element bg-primary">
                <h5 class="card-title mb-sm-0 me-2 text-white">
                  <i class="ti tabler-info-circle me-2"></i>
                  <span id="modalServiceName"></span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row g-3">
                  <!-- Image Section -->
                  <div class="col-12 text-center mb-4">
                    <div class="profile-upload-container mx-auto">
                      <div class="avatar-upload">
                        <div class="avatar-preview">
                          <img id="modalServiceImage" src="" alt="Service Preview" class="rounded-circle"/>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Service Details -->
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Branch</label>
                      <p id="modalBranch" class="form-control-static"></p>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Category</label>
                      <p id="modalCategory" class="form-control-static"></p>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Duration</label>
                      <p id="modalDuration" class="form-control-static"></p>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Service Cost</label>
                      <p id="modalCost" class="form-control-static"></p>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="mb-3">
                      <label class="form-label">Description</label>
                      <p id="modalDescription" class="form-control-static"></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Edit Service Modal -->
        <div class="modal fade" id="editServiceModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #0A3622;">
                <h5 class="modal-title text-white" id="serviceModalLabel">Edit Service</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="editServiceForm" method="POST" action="{{ route('service.update') }}">
                  @csrf
                  @method('PUT')
                  <input type="hidden" id="edit_service_id" name="service_id">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label" for="edit_service_name">Services Name</label>
                      <input type="text" id="edit_service_name" name="service_name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Branch</label>
                      <select class="select2 form-select" name="branch_code" id="edit_branch_code" required>
                        <option value="">Select Branch</option>
                        @foreach($branches as $branch)
                          <option value="{{ $branch->branch_code }}">{{ $branch->branch_name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-12">
                      <label class="form-label" for="edit_description">Description</label>
                      <textarea id="edit_description" name="description" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="edit_service_cost">Service Cost</label>
                      <input type="number" step="0.01" min="0" id="edit_service_cost" name="service_cost" class="form-control" required>
                    </div>
                  </div>
                  <div class="text-end mt-4">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary ms-2">Update Service</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Content wrapper -->

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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>
  <script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>
  <script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>
  <script src="{{ asset('vendor/libs/select2/select2.js') }}"></script>
  <script src="{{ asset('vendor/js/menu.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      console.log('Document ready fired');
      
      // Debug click event
      $('.edit-service').on('click', function(e) {
        e.preventDefault();
        console.log('Edit button clicked');
        
        var serviceId = $(this).data('service-id');
        var serviceName = $(this).data('service-name');
        var serviceBranch = $(this).data('service-branch');
        var serviceDescription = $(this).data('service-description');
        var serviceCost = $(this).data('service-cost');
        
        console.log('Service Data:', {
          id: serviceId,
          name: serviceName,
          branch: serviceBranch,
          description: serviceDescription,
          cost: serviceCost
        });
        
        // Populate the form fields
        $('#edit_service_id').val(serviceId);
        $('#edit_service_name').val(serviceName);
        $('#edit_description').val(serviceDescription);
        $('#edit_service_cost').val(serviceCost);
        
        // Set the branch value and trigger Select2 update
        if (serviceBranch) {
          $('#edit_branch_code').val(serviceBranch).trigger('change');
        }
        
        // Show the modal
        $('#editServiceModal').modal('show');
      });

      // Initialize Select2
      $('.select2').select2({
        dropdownParent: $('#editServiceModal'),
        width: '100%'
      });

      // Initialize DataTable
      $('#servicesTable').DataTable();

      // Form submission handling
      $('#editServiceForm').on('submit', function(e) {
        e.preventDefault();
        console.log('Form submitted');
        
        Swal.fire({
          title: 'Confirm Update',
          text: "Are you sure you want to update this service?",
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#0a3622',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, update it!'
        }).then((result) => {
          if (result.isConfirmed) {
            this.submit();
          }
        });
      });
    });
  </script>
</body>

</html>
