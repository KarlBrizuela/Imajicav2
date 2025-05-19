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
    <link rel="stylesheet" href="../../assets/vendor/fonts/iconify-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/core.css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    
    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/js/config.js"></script>
    
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
                            <!-- Table Header with Search -->
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <h5 class="card-title mb-0">Supplier List</h5>
                                <a class="btn btn-primary" href="{{ route('page.new-supplier') }}">
                                    <i class="ti tabler-plus me-1"></i> Add New Supplier
                                </a>
                            </div>

                            <!-- Success/Error Messages -->
                            <div id="responseMessage" style="display: none;" class="alert mx-3 mt-0 mb-3"></div>

                            <!-- Table -->
                            <div class="table-responsive text-nowrap px-3">
                                <table class="table table-striped" id="supplierTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Supplier Name</th>
                                            <th>Company</th>
                                            <th>Contact Person</th>
                                            <th>Address</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Description</th>
                                            <th class="text-center" style="min-width: 150px;">Actions</th>
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
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <a href="{{ route('supplier.edit', ['id' => $supplier->suppler_id]) }}" 
                                                       class="btn btn-sm btn-info">
                                                        <i class="ti tabler-edit me-1"></i> Edit
                                                    </a>
                                                    <button class="btn btn-sm btn-danger delete-supplier" 
                                                            data-id="{{ $supplier->suppler_id }}"
                                                            data-name="{{ $supplier->supplier_name }}">
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

                    <!-- Add this CSS to match the services table styling -->
                    <style>
                        .table th {
                            font-weight: 600;
                            background-color: #f5f5f9;
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

                    <!-- Update the DataTable initialization script -->
              
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
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>



    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
    <script src="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/jszip/jszip.js"></script>
    <script src="../../assets/vendor/libs/pdfmake/pdfmake.js"></script>
    <script src="../../assets/vendor/libs/datatables-buttons/buttons.html5.js"></script>
    <script src="../../assets/vendor/libs/datatables-buttons/buttons.print.js"></script>

    <script src="../../assets/vendor/libs/moment/moment.js"></script>
    <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="../../assets/vendor/libs/%40form-validation/popular.js"></script>
    <script src="../../assets/vendor/libs/%40form-validation/bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/%40form-validation/auto-focus.js"></script>



    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Define supplier routes -->
    <script>
        const supplierRoutes = {
            add: "{{ route('add.supplier') }}",
            getAll: "{{ route('get.suppliers') }}",
            get: "{{ route('get.supplier', ['id' => ':id']) }}".replace(':id', '__ID__'),
            update: "{{ route('update.supplier', ['id' => ':id']) }}".replace(':id', '__ID__'),
            delete: "{{ route('delete.supplier', ['id' => ':id']) }}".replace(':id', '__ID__')
        };
    </script>

    {{-- <script src="../../assets/js/supplier-management.js"></script> --}}

    <script>
      $(document).ready(function() {
        // SweetAlert default configuration
        const swalConfig = {
          customClass: {
            container: 'swal-container-class',
            popup: 'swal-popup-class'
          },
          backdrop: true,
          allowOutsideClick: false
        };
        
        // Add custom CSS for z-index
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

        // Handle edit supplier button clicks
        $('.edit-supplier').on('click', function() {
          try {
            const supplierId = $(this).data('id');
            const supplierName = $(this).data('name');
            const supplierType = $(this).data('type');
            const contactNumber = $(this).data('contact');
            const email = $(this).data('email');
            const address = $(this).data('address');
            const productOffered = $(this).data('supplier-products');
            
            // Pre-fill form fields
            $('#edit_supplier_id').val(supplierId);
            $('#edit_supplier_name').val(supplierName);
            $('#edit_supplier_type').val(supplierType);
            $('#edit_contact_number').val(contactNumber);
            $('#edit_email').val(email);
            $('#edit_address').val(address);
            $('#edit_product_offered').val(productOffered);
            
            // Show the modal
            $('#editSupplierModal').modal('show');
            
          } catch (e) {
            console.error("Error in edit button click handler:", e);
            Swal.fire({
              ...swalConfig,
              icon: 'error',
              title: 'Error',
              html: 'An error occurred while loading supplier data:<br>' + e.message,
              showConfirmButton: true
            });
          }
        });

        // Handle form submission with confirmation
        $('#editSupplierForm').on('submit', function(e) {
          e.preventDefault();
          
          const supplierId = $('#edit_supplier_id').val();
          const form = $(this);
          const formData = form.serialize();
          const action = supplierRoutes.update.replace('__ID__', supplierId);

          // Hide the modal before showing SweetAlert
          $('#editSupplierModal').modal('hide');
          
          setTimeout(() => {
            Swal.fire({
              ...swalConfig,
              title: 'Confirm Update',
              text: 'Are you sure you want to update this supplier?',
              icon: 'question',
              showCancelButton: true,
              confirmButtonText: 'Yes, update itttt!', 
              cancelButtonText: 'Cancel',
              confirmButtonColor: '#0a3622',
              cancelButtonColor: '#d33'
            }).then((result) => {
              if (result.isConfirmed) {
                // Make AJAX request
                $.ajax({
                  url: action,
                  type: 'POST',
                  data: formData,
                  success: function(response) {
                    if(response.status) {
                      Swal.fire({
                        ...swalConfig,
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                      }).then(() => {
                        window.location.href = response.redirect;
                      });
                    } else {
                      showErrorAlert(response.message);
                    }
                  },
                  error: function(xhr) {
                    let errorMessage = 'An error occurred while updating the supplier.';
                    if(xhr.responseJSON && xhr.responseJSON.message) {
                      errorMessage = xhr.responseJSON.message;
                    }
                    showErrorAlert(errorMessage);
                  }
                });
              } else {
                $('#editSupplierModal').modal('show');
              }
            });
          }, 200);
        });

        function showErrorAlert(message) {
          Swal.fire({
            ...swalConfig,
            icon: 'error',
            title: 'Error',
            text: message,
            confirmButtonColor: '#d33'
          });
        }

        // Handle delete supplier button clicks
        $('.delete-supplier').on('click', function() {
            const supplierId = $(this).data('id');
            const supplierName = $(this).data('name');

            Swal.fire({
                title: 'Are you sure?',
                text: `You won't be able to revert the deletion of supplier "${supplierName}"!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0a3622',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform AJAX request to delete supplier
                    $.ajax({
                        url: supplierRoutes.delete.replace('__ID__', supplierId),
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: response.message || 'Supplier has been deleted successfully.',
                                confirmButtonColor: '#0a3622'
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: xhr.responseJSON ? xhr.responseJSON.message : 'An error occurred while deleting the supplier',
                                confirmButtonColor: '#d33'
                            });
                        }
                    });
                }
            });
        });

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#0a3622'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "{{ session('error') }}",
                confirmButtonColor: '#d33'
            });
        @endif

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


<script>
    $(document).ready(function() {
      var table = $('#supplierTable').DataTable({
        responsive: true,
        searching: true,
        lengthChange: true,
        info: true
      });
    });
  </script>



</body>
</html>
``` 

