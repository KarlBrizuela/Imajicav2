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

  <style>
    /* Style the entries dropdown button */
    .dataTables_length select {
      -webkit-appearance: none !important;
      -moz-appearance: none !important;
      appearance: none !important;
      background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3E%3Cpath fill='none' stroke='%23000' stroke-width='2' d='M4 6l4 4 4-4'/%3E%3C/svg%3E") no-repeat right 4px center !important;
      background-size: 16px !important;
      padding-right: 24px !important;
      border: 1px solid #d8d8d8 !important;
      border-radius: 4px !important;
    }

    /* Hide default arrow in IE */
    .dataTables_length select::-ms-expand {
      display: none !important;
    }

    /* Make table borders lighter */
    #servicesTable th, #servicesTable td {
      border-color: rgba(0,0,0,0.07) !important;
    }
    #servicesTable {
      border-color: rgba(0,0,0,0.07) !important;
    }

    /* Style the entries dropdown */
    .dataTables_length select {
      border: 1px solid #d9dee3 !important;
      border-radius: 0.375rem !important;
      padding: 0.3rem 2rem 0.3rem 0.5rem !important;
      font-size: 0.9375rem !important;
      line-height: 1.5;
      background-color: #fff !important;
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23677788' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e") !important;
      background-repeat: no-repeat !important;
      background-position: right 0.5rem center !important;
      background-size: 16px 12px !important;
      appearance: none !important;
    }

    .dataTables_length select:focus {
      border-color: #d9dee3 !important;
      outline: 0 !important;
      box-shadow: none !important;
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
    /* Hide numbered pagination buttons */
    .dataTables_wrapper .dataTables_paginate .paginate_button:not(.previous):not(.next) {
      display: none;
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

    /* Other styles */
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

    /* Button Styling */
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.25rem;
      padding: 0.5rem 1rem;
      font-weight: 500;
      border-radius: 0.375rem;
    }

    .btn-sm {
      padding: 0.25rem 0.5rem;
      font-size: 0.875rem;
    }

    /* Action Button Styling */
    .text-primary {
      color: #03c3ec !important;
      background: transparent;
      border: none;
    }

    .text-danger {
      color: #ff3e1d !important;
      background: transparent;
      border: none;
    }

    .text-primary:hover {
      color: #02b6dc !important;
    }

    .text-danger:hover {
      color: #ff2b0a !important;
    }

    .btn i {
      font-size: 1.25rem;
    }

    .gap-2 {
      gap: 0.5rem !important;
    }
    
    /* Fix for SweetAlert z-index */
    .swal2-container {
      z-index: 99999 !important;
    }
  </style>

  <!-- Add these before the closing </head> tag -->
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      @include('components.sidebar')

      <!-- Keep rest of existing content -->
      <div class="layout-page">
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
              <!-- Header -->
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Services List</h5>
                <div class="d-flex gap-2">
                  <button id="exportExcel" class="btn btn-primary">
                    <i class="ti tabler-download me-1"></i>Export Excel
                  </button>
                  <a href="{{ route('page.new-services') }}" class="btn btn-success">
                    <i class="ti tabler-plus me-1"></i>Add Service
                  </a>
                </div>
              </div>

              <!-- Table -->
              <div class="table-responsive text-nowrap px-3">
                <table class="table border-top" id="servicesTable">
                  <thead>
                    <tr>
                      <th>SERVICE NAME</th>
                      <th>BRANCH NAME</th>
                      <th>DESCRIPTION</th>
                      <th class="text-center">SERVICE COST</th>
                      <th class="text-center">POINTS</th>
                      <th class="text-center">ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($services as $service)
                    <tr>
                      <td>{{ $service->service_name }}</td>
                      <td>{{ $service->branch ? $service->branch->branch_name : $service->branch_code }}</td>
                      <td>{{ $service->description }}</td>
                      <td class="text-end">₱{{ number_format($service->service_cost, 2) }}</td>
                      <td class="text-center">{{ $service->acq_pts }}</td>
                      <td>
                        <div class="d-flex gap-2 justify-content-center">
                          <button type="button" class="btn btn-sm text-secondary p-0 edit-service"
                            data-service-id="{{ $service->service_id }}"
                            data-service-name="{{ $service->service_name }}"
                            data-service-branch="{{ $service->branch_code }}"
                            data-service-description="{{ $service->description }}"
                            data-service-cost="{{ $service->service_cost }}"
                            data-acq-pts="{{ $service->acq_pts }}">
                            <i class="ti tabler-edit"></i>
                          </button>
                          <button type="button" class="btn btn-sm text-danger p-0 delete-service"
                            data-service-id="{{ $service->service_id }}"
                            data-service-name="{{ $service->service_name }}">
                            <i class="ti tabler-trash"></i>
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
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
              <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                <div class="text-body">
                  © <script>document.write(new Date().getFullYear());</script>
                  Developed by
                  <a href="https://intra-code.com/" target="_blank" class="footer-link">Intracode IT Solutions</a>
                </div>
              </div>
            </div>
          </footer>
          <!-- / Footer -->
        </div>
      </div>
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>

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
  

 <script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle delete button click
    document.querySelectorAll('.delete-service').forEach(function(button) {
        button.addEventListener('click', function() {
            const serviceId = this.getAttribute('data-service-id');
            const serviceName = this.getAttribute('data-service-name');
            
            // Update modal content
            document.getElementById('serviceNameToDelete').textContent = serviceName;
            document.getElementById('deleteServiceForm').action = `/services/${serviceId}`;
            
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('deleteServiceModal'));
            modal.show();
        });
    });
});
</script>


  <script type="text/javascript">
    $(document).ready(function() {
      // Initialize Select2
      $('.select2').select2();
      
      // Edit Service Button Click Handler
      $(document).on('click', '.edit-service', function(e) {
        e.preventDefault();
        
        var serviceId = $(this).data('service-id');
        var serviceName = $(this).data('service-name');
        var serviceBranch = $(this).data('service-branch');
        var serviceDescription = $(this).data('service-description');
        var serviceCost = $(this).data('service-cost');
        var acqPts = $(this).data('acq-pts');
        
        // Populate form fields
        $('#edit_service_id').val(serviceId);
        $('#edit_service_name').val(serviceName);
        $('#edit_description').val(serviceDescription);
        $('#edit_service_cost').val(serviceCost);
        $('#edit_acq_pts').val(acqPts || 0);
        
        // Set the branch value
        if (serviceBranch) {
          $('#edit_branch_code').val(serviceBranch).trigger('change');
        }
        
        $('#editServiceModal').modal('show');
      });

      // Form Submission Handler
      $('#editServiceForm').on('submit', function(e) {
        e.preventDefault();
        
        // Ensure points has a value
        if (!$('#edit_acq_pts').val()) {
          $('#edit_acq_pts').val(0);
        }

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
            $.ajax({
              url: $(this).attr('action'),
              method: 'POST',
              data: $(this).serialize(),
              success: function(response) {
                // Close the modal
                $('#editServiceModal').modal('hide');
                
                Swal.fire({
                  title: 'Updated!',
                  text: 'Service has been updated.',
                  icon: 'success',
                  confirmButtonColor: '#0a3622'
                }).then(() => {
                  // Reload the page to see changes
                  location.reload();
                });
              },
              error: function(xhr) {
                let errors = xhr.responseJSON?.errors || {};
                let errorMsg = Object.values(errors).flat().join('<br>') || 
                               'An error occurred while updating the service';
                
                Swal.fire({
                  title: 'Error!',
                  html: errorMsg,
                  icon: 'error',
                  confirmButtonColor: '#0a3622'
                });
              }
            });
          }
        });
      });
    });
  </script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
  $(document).ready(function() {
    var table = $('#servicesTable').DataTable({
      responsive: true,
      pageLength: 10,
      lengthMenu: [5, 10, 25, 50],
      dom: '<"d-flex justify-content-between align-items-center mx-2 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"table-responsive"t><"d-flex justify-content-end align-items-center mx-2 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6 d-flex justify-content-end"p>>',
      language: {
        search: "",
        searchPlaceholder: "Search Services...",
        lengthMenu: "_MENU_ entries per page",
        info: "Showing _START_ to _END_ of _TOTAL_ entries",
        paginate: {
          previous: '←',
          next: '→'
        }
      }
    });

    // Excel export button click handler
    $('#exportExcel').on('click', function() {
      // Get the filtered data
      var filteredData = table.rows({ search: 'applied' }).data();
      
      // Create a new workbook
      var wb = XLSX.utils.book_new();
      
      // Prepare the data for export
      var exportData = [];
      // Add headers
      exportData.push(['Service Name', 'Branch Name', 'Description', 'Service Cost', 'Points']);
      
      // Add filtered data
      filteredData.each(function(data) {
        exportData.push([
          data[0], // Service Name
          data[1], // Branch Name
          data[2], // Description
          data[3].replace('₱', '').trim(), // Service Cost (remove ₱ symbol)
          data[4]  // Points
        ]);
      });
      
      // Create worksheet
      var ws = XLSX.utils.aoa_to_sheet(exportData);
      
      // Add worksheet to workbook
      XLSX.utils.book_append_sheet(wb, ws, 'Services');
      
      // Generate Excel file and trigger download
      XLSX.writeFile(wb, 'services_list.xlsx');
    });
  });
</script>

<!-- DataTables Dependencies -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<!-- Add SheetJS (XLSX) library before the closing </body> tag -->
<script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
</body>
</html>