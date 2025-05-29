@extends('layouts.app')
<!DOCTYPE html>
<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default" 
    data-assets-path="../../assets/" data-template="vertical-menu-template" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Imajica Booking System</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset(path:'logo/logo.png') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />

    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    
    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <script src="../../assets/js/config.js"></script>
    
    <!-- Excel Export Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <div class="card">
                            <div class="card-header border-bottom">
                                <div class="d-flex justify-content-between align-items-center row">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">Supplier List</h5>
                                            <div class="d-flex gap-2">
                                                <button id="exportExcel" class="btn btn-primary">
                                                    <i class="ti tabler-download me-1"></i>Export Excel
                                                </button>
                                                <a href="{{ route('page.new-supplier') }}" class="btn btn-success">
                                                    <i class="ti tabler-plus me-1"></i>Add New Supplier
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Success/Error Messages -->
                            <div id="responseMessage" style="display: none;" class="alert mx-3 mt-0 mb-3"></div>

                            <!-- Table -->
                            <div class="card-datatable table-responsive">
                                <table class="table border-top" id="supplierTable">
                                    <thead>
                                        <tr>
                                            <th>Supplier Name</th>
                                            <th>Company</th>
                                            <th>Contact Person</th>
                                            <th>Address</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Description</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($suppliers as $supplier)
                                        <tr>
                                            <td>{{ $supplier->supplier_name }}</td>
                                            <td>{{ $supplier->company }}</td>
                                            <td>{{ $supplier->contact_person }}</td>
                                            <td>{{ $supplier->address }}</td>
                                            <td>{{ $supplier->mobile_number }}</td>
                                            <td>{{ $supplier->email }}</td>
                                            <td>{{ $supplier->description }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ route('supplier.edit', ['id' => $supplier->suppler_id]) }}" 
                                                       class="text-body">
                                                        <i class="ti tabler-edit text-secondary"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" 
                                                       class="text-body delete-supplier"
                                                       data-id="{{ $supplier->suppler_id }}"
                                                       data-name="{{ $supplier->supplier_name }}">
                                                        <i class="ti tabler-trash text-danger"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Add this CSS to match the order list table styling -->
                    <style>
                        .btn-success {
                            background-color: #28C66F !important;
                            border-color: #28C66F !important;
                            color: #fff !important;
                        }
                        .btn-success:hover {
                            background-color: #28C66F !important;
                            border-color: #28C66F !important;
                        }

                        /* DataTables custom styling */
                        div.dataTables_wrapper div.dataTables_filter {
                            padding: 1rem 2rem !important;
                        }

                        div.dataTables_wrapper div.dataTables_length {
                            padding: 1rem 2rem !important;
                        }

                        div.dataTables_wrapper div.dataTables_paginate {
                            padding: 1rem 2rem !important;
                        }

                        div.dataTables_wrapper div.dataTables_info {
                            padding: 1rem 2rem !important;
                        }

                        div.dataTables_wrapper div.dataTables_filter input {
                            width: 100% !important;
                            max-width: 300px !important;
                            margin-left: 0 !important;
                            padding: 0.5rem 1rem !important;
                        }

                        .btn-icon {
                            padding: 0.4rem;
                            line-height: 1;
                        }

                        .btn-icon i {
                            font-size: 1.25rem;
                        }

                        .card-header {
                            padding: 1rem;
                            border-bottom: 1px solid #d9dee3;
                        }

                        /* Make table borders lighter */
                        #supplierTable th, #supplierTable td {
                            border-color: rgba(0,0,0,0.07) !important;
                        }
                        #supplierTable {
                            border-color: rgba(0,0,0,0.07) !important;
                            width: 100% !important;
                            margin: 0 !important;
                        }
                        .table-responsive {
                            overflow-x: auto;
                        }

                        /* Remove any responsive classes */
                        .dtr-inline,
                        .dtr-column,
                        .dtr-responsive {
                            display: none !important;
                        }
                        /* Ensure all cells are visible */
                        #supplierTable td {
                            display: table-cell !important;
                            white-space: nowrap;
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
                            background: #1a5f2c !important;
                            color: #fff !important;
                            border: 1px solid #1a5f2c !important;
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

                        .table td {
                            white-space: normal;
                            word-wrap: break-word;
                        }
                    </style>

                    <script>
                        $(document).ready(function() {
                            $('#supplierTable').DataTable({
                                processing: true,
                                pageLength: 10,
                                lengthMenu: [5, 10, 25, 50],
                                language: {
                                    search: "",
                                    searchPlaceholder: "Search Supplier...",
                                    lengthMenu: "_MENU_ entries per page",
                                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                                    paginate: {
                                        previous: '←',
                                        next: '→'
                                    }
                                },
                                responsive: false,
                                ordering: true,
                                columnDefs: [
                                    {
                                        targets: -1,
                                        orderable: false
                                    }
                                ]
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

    <!-- View Supplier Modal -->
    <div class="modal fade" id="supplierModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header  text-white border-0" style="background-color: #0a3622">
                    <h5 class="modal-title text-white fs-4">
                        <i class="ti tabler-info-circle me-2"></i>
                        <span id="modalSupplierName"></span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <!-- Supplier Details -->
                        <div class="col-md-6">
                            <div class="client-detail-card h-100">
                                <h6 class="text-primary mb-3">Supplier Information</h6>
                                <div class="client-info-item">
                                    <div class="client-info-icon">
                                        <i class="ti tabler-id"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Supplier ID</small>
                                        <span id="modalSupplierId" class="fw-semibold"></span>
                                    </div>
                                </div>
                                <div class="client-info-item">
                                    <div class="client-info-icon">
                                        <i class="ti tabler-building"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block"> Supplier Type</small>
                                        <span id="modalSupplierType" class="fw-semibold"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="client-detail-card">
                                        <h6 class="text-primary mb-3">Address</h6>
                                        <p id="modalAddress" class="mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contact Details -->
                        <div class="col-md-6">
                            <div class="client-detail-card h-100">
                                <h6 class="text-primary mb-3">Contact Information</h6>
                                <div class="client-info-item">
                                    <div class="client-info-icon">
                                        <i class="ti tabler-phone"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Contact Number</small>
                                        <span id="modalContactNumber" class="fw-semibold"></span>
                                    </div>
                                </div>
                                <div class="client-info-item">
                                    <div class="client-info-icon">
                                        <i class="ti tabler-mail"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Email</small>
                                        <span id="modalEmail" class="fw-semibold"></span>
                                    </div>
                                </div>
                                <div class="client-info-item">
                                    <div class="client-info-icon">
                                        <i class="ti tabler-package"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Products/Services Offered</small>
                                        <span id="modalProducts" class="fw-semibold"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Address -->
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Supplier Modal -->
    <div class="modal fade" id="editSupplierModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #0a3622">
            <h5 class="modal-title text-white">Edit Supplier</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editSupplierForm" method="POST">
              @csrf
              @method('PUT')
              <input type="hidden" id="edit_supplier_id" name="suppler_id">
              <div class="mb-3">
                <label class="form-label" for="edit_supplier_name">Supplier Name</label>
                <input type="text" id="edit_supplier_name" name="supplier_name" class="form-control" required>
                <div class="invalid-feedback" id="edit_supplier_name_error"></div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="edit_supplier_type">Supplier Type</label>
                <input type="text" id="edit_supplier_type" name="supplier_type" class="form-control" required>
                <div class="invalid-feedback" id="edit_supplier_type_error"></div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="edit_contact_number">Contact Number</label>
                <input type="text" id="edit_contact_number" name="contactNumber" class="form-control" required>
                <div class="invalid-feedback" id="edit_contact_number_error"></div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="edit_email">Email</label>
                <input type="email" id="edit_email" name="email" class="form-control" required>
                <div class="invalid-feedback" id="edit_email_error"></div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="edit_address">Address</label>
                <textarea id="edit_address" name="address" class="form-control" rows="3" required></textarea>
                <div class="invalid-feedback" id="edit_address_error"></div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="edit_product_offered">Products/Services Offered</label>
                <textarea id="edit_product_offered" name="product_offered" class="form-control" rows="3"></textarea>
                <div class="invalid-feedback" id="edit_product_offered_error"></div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Update Supplier</button>
            </form>
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
    <script src="{{ asset('vendor/js/menu.js') }}"></script>

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- Excel Export Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#supplierTable').DataTable({
                processing: true,
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50],
                language: {
                    search: "",
                    searchPlaceholder: "Search Supplier...",
                    lengthMenu: "_MENU_ entries per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    paginate: {
                        previous: '←',
                        next: '→'
                    }
                },
                responsive: false,
                ordering: true,
                columnDefs: [
                    {
                        targets: -1,
                        orderable: false
                    }
                ]
            });
        });
    </script>

    <!-- Remove any duplicate DataTable initialization -->
    <script>
        // Define supplier routes
        const supplierRoutes = {
            add: "{{ route('add.supplier') }}",
            getAll: "{{ route('get.suppliers') }}",
            get: "{{ route('get.supplier', ['id' => ':id']) }}".replace(':id', '__ID__'),
            update: "{{ route('update.supplier', ['id' => ':id']) }}".replace(':id', '__ID__'),
            delete: "{{ route('delete.supplier', ['id' => ':id']) }}".replace(':id', '__ID__')
        };
    </script>

    <!-- Your other scripts -->
    <script>
      $(document).ready(function() {
        // SweetAlert default configuration and other functionality
        // ... (keep the rest of your existing scripts)
      });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".view-supplier").forEach((button) => {
                button.addEventListener("click", function() {
                    // Debug: Log all data attributes
                    console.log('View Supplier Clicked - Data Attributes:', {
                        name: this.dataset.supplierName,
                        id: this.dataset.supplierId,
                        company: this.dataset.supplierCompany,
                        contact: this.dataset.supplierContact,
                        mobile: this.dataset.supplierMobile,
                        email: this.dataset.supplierEmail,
                        address: this.dataset.supplierAddress,
                        description: this.dataset.supplierDescription
                    });

                    // Update modal content with data attributes
                    const modalSupplierName = document.getElementById("modalSupplierName");
                    const modalSupplierId = document.getElementById("modalSupplierId");
                    const modalSupplierType = document.getElementById("modalSupplierType");
                    const modalContactNumber = document.getElementById("modalContactNumber");
                    const modalEmail = document.getElementById("modalEmail");
                    const modalAddress = document.getElementById("modalAddress");
                    const modalProducts = document.getElementById("modalProducts");
                  
                    // Debug: Log DOM elements
                    console.log('Modal Elements:', {
                        modalSupplierName,
                        modalSupplierId,
                        modalSupplierType,
                        modalContactNumber,
                        modalEmail,
                        modalAddress,
                        modalProducts
                    });

                    // Update content and log assignments
                    modalSupplierName.textContent = this.dataset.supplierName;
                    modalSupplierId.textContent = this.dataset.supplierId;
                    modalSupplierType.textContent = this.dataset.supplierCompany;
                    modalContactNumber.textContent = this.dataset.supplierContact;
                    modalEmail.textContent = this.dataset.supplierEmail;
                    modalAddress.textContent = this.dataset.supplierAddress;
                    modalProducts.textContent = this.dataset.supplierDescription || 'No description provided';

                    // Debug: Log final content
                    console.log('Updated Modal Content:', {
                        name: modalSupplierName.textContent,
                        id: modalSupplierId.textContent,
                        type: modalSupplierType.textContent,
                        contact: modalContactNumber.textContent,
                        email: modalEmail.textContent,
                        address: modalAddress.textContent,
                        products: modalProducts.textContent
                    });

                    // Show modal
                    $('#supplierModal').modal('show');
                });
            });
        });
    </script>

</body>
</html>
``` 

