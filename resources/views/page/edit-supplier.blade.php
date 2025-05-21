@extends('layouts.app')

<!DOCTYPE html>
<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default" 
    data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Edit Supplier | Imajica Booking System</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset(path:'logo/logo.png') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    
    <!-- Include other necessary CSS -->
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('components.sidebar')

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Sticky Actions -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row"
                                         style="background-color: #0A3622;">
                                        <h5 class="card-title mb-sm-0 me-2 text-white">
                                            Edit Supplier
                                        </h5>
                                        
                                    </div>
                                    
                                    <div class="card-body pt-6">
                                        <div class="row">
                                            <div class="col-lg-8 mx-auto">
                                                <!-- Form -->
                                                <form action="{{ route('supplier.update', $supplier->suppler_id) }}" 
                                                      method="POST" 
                                                      id="updateSupplierForm">
                                                    @csrf
                                                    @method('PUT')
                                                    
                                                    <div class="row g-6">
                                                        <!-- Supplier Name -->
                                                        <div class="col-md-6">
                                                            <label class="form-label">Supplier Name</label>
                                                            <input type="text" 
                                                                   name="supplier_name" 
                                                                   class="form-control" 
                                                                   value="{{ old('supplier_name', $supplier->supplier_name) }}" 
                                                                   required>
                                                        </div>

                                                        <!-- Company -->
                                                        <div class="col-md-6">
                                                            <label class="form-label">Company</label>
                                                            <input type="text" 
                                                                   name="company" 
                                                                   class="form-control"
                                                                   value="{{ old('company', $supplier->company) }}">
                                                        </div>

                                                        <!-- Contact Person -->
                                                        <div class="col-md-6">
                                                            <label class="form-label">Contact Person</label>
                                                            <input type="text" 
                                                                   name="contact_person" 
                                                                   class="form-control"
                                                                   value="{{ old('contact_person', $supplier->contact_person) }}">
                                                        </div>

                                                        <!-- Mobile Number -->
                                                        <div class="col-md-6">
                                                            <label class="form-label">Mobile Number</label>
                                                            <input type="text" 
                                                                   name="mobile_number" 
                                                                   class="form-control"
                                                                   value="{{ old('mobile_number', $supplier->mobile_number) }}">
                                                        </div>

                                                        <!-- Email -->
                                                        <div class="col-md-12">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" 
                                                                   name="email" 
                                                                   class="form-control"
                                                                   value="{{ old('email', $supplier->email) }}">
                                                        </div>

                                                        <!-- Address -->
                                                        <div class="col-12">
                                                            <label class="form-label">Address</label>
                                                            <textarea name="address" 
                                                                      class="form-control" 
                                                                      rows="3">{{ old('address', $supplier->address) }}</textarea>
                                                        </div>

                                                        <!-- Description -->
                                                        <div class="col-12">
                                                            <label class="form-label">Description</label>
                                                            <textarea name="description" 
                                                                      class="form-control" 
                                                                      rows="4">{{ old('description', $supplier->description) }}</textarea>
                                                        </div>
                                                    </div>

                                                    <br />
                                                    <div class="row">
                                                        <div class="col-sm-2 col-4 d-grid">
                                                            <a href="{{ route('page.supplier-list') }}" 
                                                               class="btn btn-outline-secondary">Cancel</a>
                                                        </div>
                                                        <div class="col-sm-2 col-4 d-grid ms-2">
                                                            <button type="button" 
                                                                    class="btn btn-primary" 
                                                                    id="updateSupplierBtn">
                                                                Update Supplier
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <br />
                                                <!-- Messages -->
                                                <div id="responseMessage" style="display: none;" class="alert mt-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Handle form submission
            $('#updateSupplierBtn').on('click', function(e) {
                e.preventDefault();
                
                Swal.fire({
                    title: 'Confirm Update',
                    text: 'Are you sure you want to update this supplier?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, update it!',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#0a3622',
                    cancelButtonColor: '#d33'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = $('#updateSupplierForm');
                        const formData = form.serialize();

                        // Show loading state
                        Swal.fire({
                            title: 'Processing...',
                            text: 'Updating supplier information',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        $.ajax({
                            url: form.attr('action'),
                            type: 'POST',
                            data: formData,
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Supplier updated successfully',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(() => {
                                    window.location.href = "{{ route('page.supplier-list') }}";
                                });
                            },
                            error: function(xhr) {
                                let errorMessage = 'An error occurred while updating the supplier.';
                                if(xhr.responseJSON && xhr.responseJSON.message) {
                                    errorMessage = xhr.responseJSON.message;
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
        });
    </script>
</body>
</html>