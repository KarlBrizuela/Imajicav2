@extends('layouts.app')

<!DOCTYPE html>
<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}" />
    
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-ecommerce.css') }}" />

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include ('components.sidebar')

            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <form id="editOrderForm" method="POST" action="{{ route('order.update') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="app-ecommerce">
                                <!-- Edit Order Header -->
                                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h4 class="mb-1">Edit Order #{{ $order->order_number }}</h4>
                                        <p class="mb-0">Update order details</p>
                                    </div>
                                    <div class="d-flex align-content-center flex-wrap gap-4">
                                        <div class="d-flex gap-4">
                                            <button type="button" class="btn btn-label-secondary" onclick="discardChanges()">Cancel</button>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Order</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- First column-->
                                    <div class="col-12 col-lg-8">
                                        <!-- Customer Information -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Customer Information</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Customer Name</label>
                                                        <input type="text" 
                                                        class="form-control"
                                                        placeholder="Customer name"
                                                        name="customer_name"
                                                        id="customer_name"
                                                        value="{{ $order->customer_name }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control" placeholder="customer@example.com" name="customer_email" id="customer_email" value="{{ $order->customer_email }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Order Details -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Order Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row g-4">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Order Date</label>
                                                        <input type="date" class="form-control"
                                                        name="order_date"
                                                        id="order_date"
                                                        value="{{ date('Y-m-d', strtotime($order->order_date)) }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Order Time</label>
                                                        <input type="time" class="form-control"
                                                        name="order_time"
                                                        id="order_time"
                                                        value="{{ date('H:i', strtotime($order->order_date)) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Order Items -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Order Items</h5>
                                            </div>
                                            <div class="card-body">
                                                <div id="orderItems" style="max-height: 400px; overflow-y: auto;">
                                                    @foreach($order->orderItems as $item)
                                                    <div class="order-item mb-3 border rounded p-3">
                                                        <div class="row g-3">
                                                            <div class="col-12 col-md-4">
                                                                <label class="form-label">Item Name</label>
                                                                <select class="form-select" name="items[]">
                                                                    <option value="">Select Item</option>
                                                                    @foreach($products as $product)
                                                                    <option value="{{ $product->id }}" 
                                                                        data-price="{{ $product->base_price }}"
                                                                        {{ $product->name == $item->item_name ? 'selected' : '' }}>
                                                                        {{ $product->name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-md-2">
                                                                <label class="form-label">Quantity</label>
                                                                <input type="number" class="form-control" name="quantities[]" min="1" value="{{ $item->quantity }}">
                                                            </div>
                                                            <div class="col-12 col-md-3">
                                                                <label class="form-label">Unit Price</label>
                                                                <input type="number" class="form-control" name="prices[]" value="{{ $item->unit_price }}" readonly>
                                                            </div>
                                                            <div class="col-12 col-md-2">
                                                                <label class="form-label">Total</label>
                                                                <input type="number" class="form-control" name="totals[]" value="{{ $item->total }}" readonly>
                                                            </div>
                                                            <div class="col-12 col-md-1 d-flex align-items-end">
                                                                <button type="button" class="btn btn-icon btn-label-danger" onclick="removeOrderItem(this)">
                                                                    <i class="ti ti-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    
                                                    @if(count($order->orderItems) == 0)
                                                    <!-- Template for order items if no items -->
                                                    <div class="order-item mb-3 border rounded p-3">
                                                        <div class="row g-3">
                                                            <div class="col-12 col-md-4">
                                                                <label class="form-label">Item Name</label>
                                                                <select class="form-select" name="items[]">
                                                                    <option value="">Select Item</option>
                                                                    @foreach($products as $product)
                                                                    <option value="{{ $product->id }}" data-price="{{ $product->base_price }}">{{ $product->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-md-2">
                                                                <label class="form-label">Quantity</label>
                                                                <input type="number" class="form-control" name="quantities[]" min="1" value="1">
                                                            </div>
                                                            <div class="col-12 col-md-3">
                                                                <label class="form-label">Unit Price</label>
                                                                <input type="number" class="form-control" name="prices[]" readonly>
                                                            </div>
                                                            <div class="col-12 col-md-2">
                                                                <label class="form-label">Total</label>
                                                                <input type="number" class="form-control" name="totals[]" readonly>
                                                            </div>
                                                            <div class="col-12 col-md-1 d-flex align-items-end">
                                                                <button type="button" class="btn btn-icon btn-label-danger" onclick="removeOrderItem(this)">
                                                                    <i class="ti ti-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="mt-3 d-flex justify-content-end gap-2">
                                                    <button type="button" class="btn btn-primary" id="addItemBtn" onclick="addOrderItem()">
                                                        <i class="ti ti-plus me-1"></i> Add Item
                                                    </button>
                                                    <button type="button" class="btn btn-success" id="finalizeItemsBtn" onclick="finalizeItems()">
                                                        <i class="ti ti-check me-1"></i> Finalize Items
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Payment Information -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Payment Information</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Payment Method</label>
                                                        <select class="form-select" name="payment_method" id="payment_method">
                                                            <option value="">Select Method</option>
                                                            <option value="Cash" {{ $order->payment_method == 'Cash' ? 'selected' : '' }}>Cash</option>
                                                            <option value="Paypal" {{ $order->payment_method == 'Paypal' ? 'selected' : '' }}>PayPal</option>
                                                            <option value="Gcash" {{ $order->payment_method == 'Gcash' ? 'selected' : '' }}>Gcash</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Payment Status</label>
                                                        <select class="form-select" name="payment_status" id="payment_status">
                                                            <option value="Paid" {{ $order->payment_status == 'Paid' ? 'selected' : '' }}>Paid</option>
                                                            <option value="Pending" {{ $order->payment_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="Failed" {{ $order->payment_status == 'Failed' ? 'selected' : '' }}>Failed</option>
                                                            <option value="Cancelled" {{ $order->payment_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Second column -->
                                    <div class="col-12 col-lg-4">
                                        <!-- Order Status -->
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Order Status</h5>
                                            </div>
                                            <div class="card-body">
                                                <select class="form-select mb-4" name="order_status" id="order_status">
                                                    <option value="Ordered" {{ $order->order_status == 'Ordered' ? 'selected' : '' }}>Ordered</option>
                                                    <option value="Delivered" {{ $order->order_status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                                    <option value="Out for Delivery" {{ $order->order_status == 'Out for Delivery' ? 'selected' : '' }}>Out for Delivery</option>
                                                    <option value="Ready to Pickup" {{ $order->order_status == 'Ready to Pickup' ? 'selected' : '' }}>Ready to Pickup</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Order Summary -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Order Summary</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Subtotal</label>
                                                    <input type="number" class="form-control" name="subtotal" id="subtotal" value="{{ $order->subtotal }}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tax</label>
                                                    <input type="number" class="form-control" name="tax" id="tax" value="{{ $order->tax }}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Total</label>
                                                    <input type="number" class="form-control" name="total" id="total" value="{{ $order->total }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                                <div class="text-body">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    Developed by <a href="https://intra-code.com/" target="_blank" class="footer-link">Intracode IT Solutions</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    
    <!-- Page JS -->
    <script src="{{ asset('assets/js/app-ecommerce.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

    <script>
        function discardChanges() {
            Swal.fire({
                title: 'Cancel editing?',
                text: "Any unsaved changes will be lost!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                customClass: {
                    confirmButton: 'btn btn-primary me-3',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/order-list'; 
                }
            });
        }

        let orderCount = 10; // Start from 10 instead of 1
        let finalizedOrders = [];
        
        // Load existing order items into finalizedOrders
        document.addEventListener('DOMContentLoaded', function() {
            const existingItems = [];
            document.querySelectorAll('.order-item').forEach(item => {
                const selectElement = item.querySelector('[name="items[]"]');
                if (selectElement && selectElement.selectedIndex >= 0) {
                    const selectedOption = selectElement.options[selectElement.selectedIndex];
                    const itemData = {
                        id: selectElement.value,
                        name: selectedOption.text,
                        quantity: parseInt(item.querySelector('[name="quantities[]"]').value) || 1,
                        price: parseFloat(item.querySelector('[name="prices[]"]').value) || 0,
                        total: parseFloat(item.querySelector('[name="totals[]"]').value) || 0
                    };
                    existingItems.push(itemData);
                }
            });
            
            if (existingItems.length > 0) {
                finalizedOrders.push({
                    id: orderCount,
                    items: existingItems
                });
                orderCount--;
            }
            
            updateTotals();
        });

        function addOrderItem() {
            // Clone the first item template
            const template = document.querySelector('.order-item').cloneNode(true);
            template.querySelectorAll('input').forEach(input => input.value = input.type === 'number' && input.name === 'quantities[]' ? '1' : '');
            template.querySelector('select').value = '';
            document.getElementById('orderItems').appendChild(template);
            updateTotals();
        }

        function removeOrderItem(button) {
            const items = document.querySelectorAll('.order-item');
            if (items.length > 1) {
                button.closest('.order-item').remove();
                updateTotals();
            }
        }

        function finalizeItems() {
            const items = document.querySelectorAll('.order-item');
            if (items.length === 0 || (items.length === 1 && !items[0].querySelector('[name="items[]"]').value)) {
                Swal.fire({
                    icon: 'error',
                    title: 'No Items',
                    text: 'Please add at least one item before finalizing.',
                    confirmButtonText: 'OK'
                });
                return;
            }

            const invalidItems = Array.from(items).filter(item => {
                const price = parseFloat(item.querySelector('[name="prices[]"]').value);
                return isNaN(price) || price <= 0;
            });

            if (invalidItems.length > 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Items',
                    text: 'All items must have valid prices before finalizing',
                    confirmButtonText: 'OK'
                });
                return;
            }

            if (confirm('Do you want to finalize these items?')) {
                const itemsData = Array.from(items).map(item => {
                    const selectElement = item.querySelector('[name="items[]"]');
                    const selectedOption = selectElement.options[selectElement.selectedIndex];
                    return {
                        id: selectElement.value,
                        name: selectedOption.text,
                        quantity: parseInt(item.querySelector('[name="quantities[]"]').value) || 1,
                        price: parseFloat(item.querySelector('[name="prices[]"]').value) || 0,
                        total: parseFloat(item.querySelector('[name="totals[]"]').value) || 0
                    };
                });

                finalizedOrders = []; // Clear previous finalized orders
                const currentOrder = {
                    id: orderCount,
                    items: itemsData
                };
                finalizedOrders.push(currentOrder);

                Swal.fire({
                    icon: 'success',
                    title: 'Items Finalized',
                    text: `Order items have been finalized.`,
                    confirmButtonText: 'OK'
                });
            }
        }

        document.addEventListener('change', function(e) {
            if (e.target.matches('[name="items[]"]')) {
                const item = e.target.closest('.order-item');
                const priceInput = item.querySelector('[name="prices[]"]');
                const selectedOption = e.target.options[e.target.selectedIndex];
                const price = selectedOption.dataset.price || 0;
                priceInput.value = price;
                updateTotals();
            }
        });

        function updateTotals() {
            let subtotal = 0;
            document.querySelectorAll('.order-item').forEach(item => {
                const quantity = parseFloat(item.querySelector('[name="quantities[]"]').value) || 0;
                const price = parseFloat(item.querySelector('[name="prices[]"]').value) || 0;
                const total = quantity * price;
                item.querySelector('[name="totals[]"]').value = total.toFixed(2);
                subtotal += total;
            });
            
            const taxRate = 0.1; // 10% tax rate
            const tax = subtotal * taxRate;
            const total = subtotal + tax;

            document.getElementById('subtotal').value = subtotal.toFixed(2);
            document.getElementById('tax').value = tax.toFixed(2);
            document.getElementById('total').value = total.toFixed(2);
        }

        function submitOrder() {
            const form = document.getElementById('editOrderForm');
            const formData = new FormData(form);

            // Get the currently showing items
            const currentItems = [];
            document.querySelectorAll('.order-item').forEach(item => {
                const selectElement = item.querySelector('[name="items[]"]');
                if (selectElement && selectElement.selectedIndex >= 0) {
                    const selectedOption = selectElement.options[selectElement.selectedIndex];
                    currentItems.push({
                        id: selectElement.value,
                        name: selectedOption.text,
                        quantity: parseInt(item.querySelector('[name="quantities[]"]').value) || 1,
                        price: parseFloat(item.querySelector('[name="prices[]"]').value) || 0,
                        total: parseFloat(item.querySelector('[name="totals[]"]').value) || 0
                    });
                }
            });

            if (currentItems.length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'No Items',
                    text: 'Please add at least one item'
                });
                return;
            }

            // Convert items to JSON string and log for debugging
            const itemsJson = JSON.stringify(currentItems);
            console.log('Items to send:', itemsJson);
            formData.append('items', itemsJson);

            // Log form data for debugging
            console.log('Form data:');
            for (let pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }

            if (!validateForm()) {
                return;
            }

            Swal.fire({
                title: 'Processing Order Update',
                html: 'Please wait...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Get the CSRF token from the meta tag
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            console.log('CSRF Token:', token);
            
            // Create headers object with CSRF token
            const headers = {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            };
            
            // Get the form action URL
            const url = form.getAttribute('action');
            console.log('Form action URL:', url);
            
            fetch(url, {
                method: 'POST',  
                headers: headers,
                body: formData
            })
            .then(response => {
                console.log('Response status:', response.status);
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data);
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: `Order #${data.data.order_number} updated successfully`,
                        confirmButtonText: 'View Orders'
                    }).then(() => {
                        window.location.href = '/order-list';
                    });
                } else {
                    throw new Error(data.message || 'Failed to update order');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error', 
                    title: 'Error',
                    text: error.message || 'Something went wrong'
                });
            });
        }

        function validateForm() {
            const requiredFields = {
                customer_name: 'Customer Name',
                order_date: 'Order Date',
                order_time: 'Order Time',
                payment_method: 'Payment Method'
            };

            for (const [field, label] of Object.entries(requiredFields)) {
                const value = document.getElementById(field)?.value;
                if (!value) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Required Field Missing',
                        text: `Please enter ${label}`
                    });
                    return false;
                }
            }

            return true;
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('editOrderForm').addEventListener('submit', function(e) {
                e.preventDefault();
                submitOrder();
            });

            document.addEventListener('input', function(e) {
                if (e.target.matches('[name="quantities[]"], [name="prices[]"]')) {
                    updateTotals();
                }
            });
            
            // Initialize calculations on page load
            updateTotals();
        });
    </script>
</body>
</html> 