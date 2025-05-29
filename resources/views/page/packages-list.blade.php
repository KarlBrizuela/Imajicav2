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

    /* Make table borders lighter */
    #packagesTable th, #packagesTable td {
      border-color: rgba(0,0,0,0.07) !important;
    }
    #packagesTable {
      border-color: rgba(0,0,0,0.07) !important;
    }
    /* Align DataTables controls */
    .dataTables_wrapper .dataTables_length {
      float: left;
      margin-bottom: 1rem;
      margin-left: 2rem;
    }
    .dataTables_wrapper .dataTables_filter {
      float: right;
      margin-bottom: 1rem;
      margin-right: 2rem;
      max-width: 300px;
    }
    .dataTables_wrapper .dataTables_filter input[type="search"] {
      max-width: 200px;
      display: inline-block;
    }
    /* Align pagination to the right */
    .dataTables_wrapper .dataTables_paginate {
      display: flex;
      justify-content: flex-end;
      width: 100%;
      padding-right: 15px;
    }
    .dataTables_wrapper .dataTables_info {
      padding-left: 15px;
    }
    /* Style pagination buttons */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      padding: 0.5rem 0.75rem;
      margin: 0 2px;
      border-radius: 5px;
      min-width: 36px;
      height: 36px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
      color: #6f6b7d !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      background: #7367f0 !important;
      color: #fff !important;
      border: 1px solid #7367f0 !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current) {
      background: #f6f6f6 !important;
      border: 1px solid #ddd !important;
      color: #6f6b7d !important;
    }
    /* Show all pagination buttons */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      display: inline-flex !important;
    }
    @media (max-width: 767.98px) {
      .dataTables_wrapper .dataTables_paginate {
        justify-content: center;
        padding-right: 0;
      }
      .dataTables_wrapper .dataTables_info {
        text-align: center;
        padding-left: 0;
      }
    }

    /* Add these new styles for the action icons */
    .action-icon {
      display: inline-block;
      width: 20px;
      height: 20px;
      margin: 0 4px;
      cursor: pointer;
    }

    .edit-icon {
      background-color: #6c757d;
      mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24'%3E%3Cpath d='M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z'/%3E%3C/svg%3E") no-repeat center;
      -webkit-mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24'%3E%3Cpath d='M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z'/%3E%3C/svg%3E") no-repeat center;
    }

    .delete-icon {
      background-color: #ff3e1d;
      mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24'%3E%3Cpath d='M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z'/%3E%3C/svg%3E") no-repeat center;
      -webkit-mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24'%3E%3Cpath d='M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z'/%3E%3C/svg%3E") no-repeat center;
    }

    /* Add these specific styles for pagination alignment */
    div.dataTables_wrapper div.dataTables_paginate {
        margin: 0;
        white-space: nowrap;
        text-align: right !important;
        display: flex;
        justify-content: flex-end !important;
        padding-right: 1.5rem;
    }
    
    .dataTables_wrapper .dataTables_info {
        padding-left: 1.5rem;
    }

    /* Ensure pagination buttons stay on the right */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        margin: 0 2px;
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
            <div class="card-header">
              <div class="d-flex justify-content-between align-items-center row">
                <div class="col-12">
                  <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Packages List</h5>
                    <div class="d-flex gap-2">
                      <button id="exportExcel" class="btn btn-primary">
                        <i class="ti tabler-download me-1"></i>Export Excel
                      </button>
                      <a href="{{ route('page.new-package') }}" class="btn btn-success">
                        <i class="ti tabler-plus me-1"></i>Add New Package
                      </a>
                    </div>
                  </div>
                </div>
              </div>
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
              <table class="table border-top" id="packagesTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>PACKAGE NAME</th>
                    <th>BRANCH</th>
                    <th>DESCRIPTION</th>
                    <th>SERVICES</th>
                    <th>FREE ITEMS</th>
                    <th>PRICE</th>
                    <th>ACTIONS</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($packages as $package)
                  <tr>
                    <td>{{ $package->package_id }}</td>
                    <td>
                      <div class="d-flex flex-column">
                        <h6 class="text-body mb-0">{{ $package->package_name }}</h6>
                      </div>
                    </td>
                    <td>{{ $package->branch->branch_name ?? 'N/A' }}</td>
                    <td class="description-cell">{{ $package->description ?: 'N/A' }}</td>
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
                    <td class="free-items-cell">{{ $package->free ?: 'None' }}</td>
                    <td class="price-cell">₱{{ number_format($package->price, 2) }}</td>
                    <td>
                      <div class="d-flex align-items-center">
                        <a href="{{ route('package.edit', $package->package_id) }}" class="text-body">
                          <i class="ti tabler-edit me-2"></i>
                        </a>
                        <button class="btn-link text-body border-0 p-0 bg-transparent delete-package" 
                          data-id="{{ $package->package_id }}" 
                          data-name="{{ $package->package_name }}">
                          <i class="ti tabler-trash text-danger"></i>
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

  <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>

  <script>
    $(document).ready(function() {
        // Setup CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Initialize DataTable with enhanced options
        var table = $('#packagesTable').DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            pageLength: 10,
            order: [[0, "desc"]],
            dom: '<"row mx-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"row mx-4 mb-3"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6 d-flex justify-content-end"p>>',
            language: {
                search: "",
                searchPlaceholder: "Search Package...",
                lengthMenu: "_MENU_ entries per page",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    first: '«',
                    previous: '←',
                    next: '→',
                    last: '»'
                }
            }
        });
        
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        // Delete Package
        $('.delete-package').on('click', function() {
            const packageId = $(this).data('id');
            const packageName = $(this).data('name');
            
            Swal.fire({
                title: 'Are you sure?',
                text: `Do you want to delete the package "${packageName}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send delete request
                    $.ajax({
                        url: '/package/delete',
                        type: 'DELETE',
                        data: JSON.stringify({
                            package_id: packageId
                        }),
                        contentType: 'application/json',
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
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred while deleting the package'
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
        
        // Display success/error messages
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ session('error') }}",
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        // Excel export button click handler
        $('#exportExcel').on('click', function() {
            // Get the filtered data
            var filteredData = table.rows({ search: 'applied' }).data();
            
            // Create a new workbook
            var wb = XLSX.utils.book_new();
            
            // Prepare the data for export
            var exportData = [];
            // Add headers
            exportData.push(['ID', 'Package Name', 'Branch', 'Description', 'Services Count', 'Free Items', 'Price']);
            
            // Add filtered data
            filteredData.each(function(data) {
                // Clean up the price value by removing ₱ symbol and any HTML
                var priceText = data[6].replace('₱', '').replace(/<[^>]*>/g, '').trim();
                
                // Clean up services count from the badge HTML
                var servicesText = data[4].replace(/<[^>]*>/g, '').trim();
                if (servicesText.includes('services')) {
                    servicesText = servicesText.split(' ')[0]; // Get just the number
                } else {
                    servicesText = '0';
                }
                
                exportData.push([
                    data[0], // ID
                    data[1].replace(/<[^>]*>/g, '').trim(), // Package Name (remove HTML)
                    data[2], // Branch
                    data[3], // Description
                    servicesText, // Services Count
                    data[5], // Free Items
                    priceText // Price
                ]);
            });
            
            // Create worksheet
            var ws = XLSX.utils.aoa_to_sheet(exportData);
            
            // Add worksheet to workbook
            XLSX.utils.book_append_sheet(wb, ws, 'Packages');
            
            // Generate Excel file and trigger download
            XLSX.writeFile(wb, 'packages_list.xlsx');
        });
    });
  </script>
</body>
</html> 