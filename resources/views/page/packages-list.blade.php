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
  <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />

 <link rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}" />
  <!-- Row Group CSS -->
   <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">

  <!-- Form Validation -->
   <link rel="stylesheet" href="{{ asset('vendor/libs/@form-validation/form-validation.css') }}">
  <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>

  <script src="../../assets/js/config.js"></script>

  <meta name="csrf-token" content="{{ csrf_token() }}">

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

/* Add to your existing styles */
.text-truncate:hover {
  white-space: normal;
  overflow: visible;
  word-wrap: break-word;
  max-width: none;
  cursor: pointer;
}

    /* Table text wrapping and responsive styles */
    .table {
      width: 100%;
      margin-bottom: 1rem;
      white-space: normal;
    }

    .table td {
      max-width: 200px; /* Adjust this value based on your needs */
      white-space: normal;
      word-wrap: break-word;
      vertical-align: middle;
    }

    .table td.description-cell {
      max-width: 300px;
    }

    .table td.services-cell {
      max-width: 250px;
    }

    .table td.free-items-cell {
      max-width: 200px;
    }

    /* Price column alignment */
    .table td.price-cell {
      text-align: right;
      white-space: nowrap;
    }

    /* Actions column */
    .table td.actions-cell {
      white-space: nowrap;
      min-width: 160px;
    }

    /* Make table responsive */
    .table-responsive {
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
    }

    @media (max-width: 992px) {
      .table td {
        min-width: 150px;
      }
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
            <!-- Card Header with Title and Add Button -->
            <div class="card-header d-flex justify-content-between align-items-center py-3">
              <h5 class="card-title mb-0">Packages List</h5>
              <a class="btn btn-primary" href="{{ route('page.new-package') }}">
                <i class="ti tabler-plus me-1"></i> Add New Package
              </a>
            </div>

            <!-- Success/Error Messages -->
            @if (session('success'))
            <div class="alert alert-success mx-3 mt-0 mb-3">
              {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger mx-3 mt-0 mb-3">
              {{ session('error') }}
            </div>
            @endif
            
            <!-- Table -->
            <div class="card-datatable table-responsive">
              <table class="table table-striped border-top" id="packagesTable">
                <thead>
                  <tr>
                    <th style="width: 60px;">ID</th>
                    <th style="width: 200px;">Package Name</th>
                    <th style="width: 200px;">Branch</th>
                    <th style="width: 300px;">Description</th>
                    <th style="width: 250px;">Services</th>
                    <th style="width: 200px;">Free Items</th>
                    <th style="width: 120px;">Price</th>
                    <th style="width: 160px;" class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($packages as $package)
                  <tr>
                    <td>{{ $package->package_id }}</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="fw-medium text-wrap">{{ $package->package_name }}</span>
                      </div>
                    </td>
                    <td class="text-wrap">{{ $package->branch->branch_name ?? 'N/A' }}</td>
                    <td class="description-cell text-wrap">
                      {{ $package->description ?: 'N/A' }}
                    </td>
                    <td class="services-cell">
                      @if($package->services->count() > 0)
                        <span class="badge bg-label-info">{{ $package->services->count() }} services</span>
                        <button type="button" class="btn btn-xs btn-text" data-bs-toggle="tooltip" data-bs-html="true" 
                          title="@foreach($package->services as $service){{ $service->service_name }}<br>@endforeach">
                          <i class="ti tabler-info-circle"></i>
                        </button>
                      @else
                        <span class="text-muted">No services</span>
                      @endif
                    </td>
                    <td class="free-items-cell text-wrap">{{ $package->free ?: 'None' }}</td>
                    <td class="price-cell">₱{{ number_format($package->price, 2) }}</td>
                    <td class="actions-cell text-center">
                      <div class="d-flex gap-2 justify-content-center">
                        <a href="{{ route('package.edit', $package->package_id) }}" class="btn btn-sm btn-info">
                          <i class="ti tabler-edit me-1"></i> Edit
                        </a>
                        <button class="btn btn-sm btn-danger delete-package" 
                          data-id="{{ $package->package_id }}" 
                          data-name="{{ $package->package_name }}">
                          <i class="ti tabler-trash me-1"></i> Delete
                        </button>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- View Package Modal -->
        <div class="modal fade" id="packageModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header sticky-element bg-primary">
                <h5 class="card-title mb-sm-0 me-2 text-white">
                  <i class="ti tabler-info-circle me-2"></i>
                  <span id="modalPackageName"></span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row g-3">
                  <!-- Package Details -->
                  <div class="col-md-6">
                    <div class="client-detail-card">
                      <h6 class="fw-semibold mb-3">Package Information</h6>
                      <div class="client-info-item">
                        <div class="client-info-icon">
                          <i class="ti tabler-id"></i>
                        </div>
                        <div>
                          <small class="text-muted d-block">Package ID</small>
                          <span id="modalPackageId" class="fw-medium"></span>
                        </div>
                      </div>
                      <div class="client-info-item">
                        <div class="client-info-icon">
                          <i class="ti tabler-map-pin"></i>
                        </div>
                        <div>
                          <small class="text-muted d-block">Branch</small>
                          <span id="modalBranchName" class="fw-medium"></span>
                        </div>
                      </div>
                      <div class="client-info-item">
                        <div class="client-info-icon">
                          <i class="ti tabler-gift"></i>
                        </div>
                        <div>
                          <small class="text-muted d-block">Free Items</small>
                          <span id="modalFreeItems" class="fw-medium"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="client-detail-card">
                      <h6 class="fw-semibold mb-3">Description</h6>
                      <p id="modalDescription" class="mb-0"></p>
                    </div>
                  </div>
                  
                  <div class="col-12">
                    <div class="client-detail-card">
                      <h6 class="fw-semibold mb-3">Included Services</h6>
                      <div id="modalServices" class="row g-2">
                        <!-- Services will be populated here dynamically -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <a id="editPackageBtn" href="#" class="btn btn-primary">
                  <i class="ti tabler-edit me-1"></i> Edit Package
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deletePackageModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header bg-danger text-white d-flex justify-content-between align-items-center rounded-top">
                <h5 class="modal-title d-flex align-items-center m-0">
                  <i class="ti tabler-alert-triangle me-2 "></i>
                  Confirm Delete
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete <span id="packageNameToDelete" class="fw-bold"></span>?</p>
                <p class="text-danger">This action cannot be undone.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deletePackageForm" method="POST">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="package_id" id="packageIdToDelete">
                  <button type="submit" class="btn btn-danger">
                    <i class="ti tabler-trash me-1"></i> Delete Package
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Core JS -->
    <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
   <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
 <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
   <script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>
  <script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>
  <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
  <script src="{{ asset('vendor/js/menu.js') }}"></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Main JS -->
  <script src="../../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../../assets/js/tables-datatables-basic.js"></script>

  <script>
    $(document).ready(function() {
        // Setup CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Initialize DataTable with enhanced options
        $('#packagesTable').DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            pageLength: 10,
            order: [[0, "desc"]],
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-label-primary dropdown-toggle',
                    text: '<i class="ti tabler-download me-1"></i> Export',
                    buttons: [
                        {
                            extend: 'print',
                            text: '<i class="ti tabler-printer me-1"></i> Print',
                            className: 'dropdown-item'
                        },
                        {
                            extend: 'csv',
                            text: '<i class="ti tabler-file-spreadsheet me-1"></i> Csv',
                            className: 'dropdown-item'
                        },
                        {
                            extend: 'excel',
                            text: '<i class="ti tabler-file-spreadsheet me-1"></i> Excel',
                            className: 'dropdown-item'
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="ti tabler-file-description me-1"></i> Pdf',
                            className: 'dropdown-item'
                        },
                        {
                            extend: 'copy',
                            text: '<i class="ti tabler-copy me-1"></i> Copy',
                            className: 'dropdown-item'
                        }
                    ]
                }
            ]
        });
        
        // Initialize tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();

        // Delete Package
        $('.delete-package').on('click', function() {
            const packageId = $(this).data('id');
            const packageName = $(this).data('name');
            
            // Show confirmation dialog using SweetAlert2
            Swal.fire({
                title: 'Confirm Delete',
                html: `Are you sure you want to delete <strong>${packageName}</strong>?<br><br><span class="text-danger">This action cannot be undone.</span>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    Swal.fire({
                        title: 'Deleting...',
                        html: 'Please wait while we delete the package',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Send delete request
                    $.ajax({
                        url: '/package/delete',
                        type: 'DELETE',
                        data: JSON.stringify({
                            package_id: packageId
                        }),
                        contentType: 'application/json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.status) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: response.message || 'Package deleted successfully',
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message || 'Failed to delete package'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Delete request failed:', {
                                status: status,
                                error: error,
                                response: xhr.responseText
                            });
                            
                            let errorMessage = 'An error occurred while deleting the package';
                            try {
                                const response = JSON.parse(xhr.responseText);
                                if (response.message) {
                                    errorMessage = response.message;
                                }
                            } catch (e) {
                                console.error('Error parsing error response:', e);
                            }
                            
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: errorMessage
                            });
                        }
                    });
                }
            });
        });
        
        // View Package Details
        $('.view-package').on('click', function() {
            const packageId = $(this).data('id');
            const packageName = $(this).data('name');
            const branchName = $(this).data('branch');
            const description = $(this).data('description');
            const free = $(this).data('free');
            const services = $(this).data('services');
            
            // Set modal content
            $('#modalPackageName').text(packageName);
            $('#modalPackageId').text(packageId);
            $('#modalBranchName').text(branchName);
            $('#modalDescription').text(description || 'No description available');
            $('#modalFreeItems').text(free || 'None');
            
            // Set edit link
            $('#editPackageBtn').attr('href', "{{ route('package.edit', '') }}/" + packageId);
            
            // Clear and populate services
            const $servicesContainer = $('#modalServices');
            $servicesContainer.empty();
            
            if (services && services.length > 0) {
                services.forEach(service => {
                    $servicesContainer.append(`
                        <div class="col-md-6">
                            <div class="client-info-item">
                                <div class="client-info-icon">
                                    <i class="ti tabler-check"></i>
                                </div>
                                <div>
                                    <span class="fw-medium">${service.service_name}</span>
                                </div>
                            </div>
                        </div>
                    `);
                });
            } else {
                $servicesContainer.append('<p class="text-muted">No services included in this package.</p>');
            }
            
            $('#packageModal').modal('show');
        });
        
        // Handle session flash messages
        @if(session('success') || session('error'))
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
        @endif
    });
  </script>
</body>
</html> 