<!doctype html>


  
    <!-- =========================================================
* Vuexy - Bootstrap Dashboard PRO | v3.0.0
==============================================================

* Product Page: https://themeforest.net/item/vuexy-vuejs-html-laravel-admin-dashboard-template/23328599
* Created by: Pixinvent

      * License: You must have a valid license purchased in order to legally use the theme for your project.
    
* Copyright Pixinvent (https://pixinvent.com)

=========================================================
 -->
    <!-- beautify ignore:start -->
  


<html
  lang="en"
  class=" layout-navbar-fixed layout-menu-fixed layout-compact "
  dir="ltr"
  data-skin="default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template"
  data-bs-theme="light">
  
<!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/app-ecommerce-order-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:26:18 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Imajica Booking System</title>

    
      <meta name="description" content="Vuexy is the best bootstrap 5 dashboard for responsive web apps. Streamline your app development process with ease." />
      <!-- Canonical SEO -->
      <meta name="keywords" content="Vuexy bootstrap dashboard, vuexy bootstrap 5 dashboard, themeselection, html dashboard, web dashboard, frontend dashboard, responsive bootstrap theme" />
      <meta property="og:title" content="Vuexy bootstrap Dashboard by Pixinvent" />
      <meta property="og:type" content="product" />
      <meta property="og:url" content="https://themeforest.net/item/vuexy-vuejs-html-laravel-admin-dashboard-template/23328599" />
      <meta property="og:image" content="../../../../pixinvent.com/wp-content/uploads/2023/06/vuexy-hero-image.png" />
      <meta property="og:description" content="Vuexy is the best bootstrap 5 dashboard for responsive web apps. Streamline your app development process with ease." />
      <meta property="og:site_name" content="Pixinvent" />
      <link rel="canonical" href="https://themeforest.net/item/vuexy-vuejs-html-laravel-admin-dashboard-template/23328599" />
    
    
      <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
      <script>
        (function (w, d, s, l, i) {
          w[l] = w[l] || [];
          w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' });
          var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
          j.async = true;
          j.src = '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
          f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5J3LMKC');
      </script>
      <!-- End Google Tag Manager -->
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet" />

    />

    <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->
    
    <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    
    <!-- Vendors CSS -->
    
      <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"/>
    
    <!-- endbuild -->

     <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
   <link rel="stylesheet" href="{{ asset('vendor/libs/sweetalert2/sweetalert2.css') }}" />
   <link rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}" />

    <!-- Page CSS -->
    

    <!-- Helpers -->
   <script src="{{ asset('vendor/js/helpers.js') }}"></script>

    
      <script src="../../assets/js/config.js"></script>
    
  </head>

  <body>
    
      <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5J3LMKC" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
    
    <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">
      @include('components.sidebar')
        




<!-- Menu -->

<div class="menu-mobile-toggler d-xl-none rounded-1">
  <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
    <i class="ti tabler-menu icon-base"></i>
    <i class="ti tabler-chevron-right icon-base"></i>
  </a>
</div>
<!-- / Menu -->

      


      <!-- Layout container -->
      <div class="layout-page">
        
          



<!-- Navbar -->


<!-- / Navbar -->

        

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
              <div class="d-flex flex-column justify-content-center">
                <div class="d-flex align-items-center gap-3 mb-1">
                  <span class="h5 mb-0">Order <span id="orderNumber"></span></span>
                  <span id="orderStatus" class="badge bg-label ms-2"></span>
                </div>
                <p class="mb-0" id="orderDate"></p>
              </div>
              <div>
                <a href="{{ route('page.order-list') }}" class="btn btn-primary">
                  <i class="tabler-arrow-left me-1"></i>
                  Back to Orders
                </a>
                <button id="printReceiptBtn" class="btn btn-success ms-2">
                  <i class="tabler-printer me-1"></i>
                  Print Receipt
                </button>
              </div>
            </div>

  <!-- Order Details Table -->
  <div class="row">
    <div class="col-12">
      <div class="card mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="card-title m-0">Order Items</h5>
        </div>
        <div class="card-datatable table-responsive">
          <table class="table table-striped table-hover border-top" id="datatables-order-details">
            <thead>
              <tr>
                <th></th>
                <th>Product/Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
            
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Customer and Order Summary -->
  <div class="row">
    <div class="col-12 col-lg-6">
      <div class="card mb-6">
        <div class="card-header border-bottom">
          <h5 class="card-title m-0">Customer Details</h5>
        </div>
        <div class="card-body m-3">
          <div class="d-flex justify-content-start align-items-center mb-4">
            
            <div class="d-flex flex-column">
              <h6 class="mb-1">{{ $order['customer_name'] ?? 'N/A' }}</h6>
              <span class="text-muted">Customer ID: #{{ $order['customer_id'] ?? 'N/A' }}</span>
            </div>
          </div>
          <div class="mb-4">
            <h6 class="mb-2">Contact Information</h6>
            <p class="mb-1"><i class="tabler-mail me-1 text-muted"></i> { $order['customer_email'] ?? 'N/A' }}</p>
            <p class="mb-1"><i class="tabler-credit-card me-1 text-muted"></i>Payment Method: <span id="orderPayment" class="badge bg-label-success"></span></p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-6">
      <div class="card mb-6">
        <div class="card-header border-bottom">
          <h5 class="card-title m-0">Order Summary</h5>
        </div>
        <div class="card-body m-3">
          <div class="d-flex justify-content-between mb-3">
            <span class="text-muted">Subtotal:</span>
            <span>{{ $order['subtotal'] ? '₱'.number_format($order['subtotal'], 2) : 'N/A' }}</span>
          </div>
          <div class="d-flex justify-content-between mb-3">
            <span class="text-muted">Tax:</span>
            <span>{{ $order['tax'] ? '₱'.number_format($order['tax'], 2) : 'N/A' }}</span>
          </div>
          <hr class="my-3">
          <div class="d-flex justify-content-between fw-bold">
            <span>Total:</span>
            <span class="text-primary h5 mb-0">{{ $order['total'] ? '₱'.number_format($order['total'], 2) : 'N/A' }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
          <!-- / Content -->

          
            

<!-- Footer -->
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

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/theme.js -->
    
    
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
    
    <!-- endbuild -->

    <!-- Vendors JS -->
      <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
  <script src="../../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
   <script src="{{ asset('vendor/libs/cleave-zen/cleave-zen.js') }}"></script>
   <script src="{{ asset('vendor/libs/%40form-validation/popular.js') }}"></script>
    <script src="{{ asset('vendor/libs/%40form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/libs/%40form-validation/auto-focus.js') }}"></script>
  <script src="{{ asset('vendor/libs/select2/select2.js') }}"></script>

    <!-- Main JS -->
    
      <script src="../../assets/js/main.js"></script>
    

    <!-- Page JS -->
    <script>
      $(document).ready(function() {
        function getStatusClass(status) {
            const statusClasses = {
                'Ordered': 'bg-label-warning',
                'Delivered': 'bg-label-success', 
                'Out for Delivery': 'bg-label-primary',
                'Ready to Pickup': 'bg-label-info'
            };
            return statusClasses[status] || 'bg-label-secondary';
        }

        const orderId = window.location.pathname.split('/').pop();
        let orderData = null;

        $.ajax({
            url: `/order/order-details/${orderId}`,
            method: 'GET',
            success: function(orderDetails) {
                console.log('Order Details:', orderDetails);
                
                // Make sure we have the order data with proper totals
                orderData = {
                    ...orderDetails,
                    subtotal: orderDetails.subtotal || 0,
                    tax: orderDetails.tax || 0,
                    total: orderDetails.total || 0
                };
                
                // Update order header information
                $('#orderNumber').text(orderDetails.number || 'N/A');
                $('#orderDate').text(orderDetails.date || 'N/A');
                $('#orderStatus').text(orderDetails.status || 'N/A')
                    .addClass(getStatusClass(orderDetails.status));

                // Update customer details
                if (orderDetails.customer) {
                    $('.card-body h6.mb-0').first().text(orderDetails.customer.name || 'N/A');
                    $('p.mb-1').first().text(`Email: ${orderDetails.customer.email || 'N/A'}`);
                    $('#orderPayment').text(orderDetails.payment || 'N/A');
                }

                // Initialize DataTable
                const table = $('.table').DataTable({
                    data: orderDetails.items || [],
                    columns: [
                        { data: null, defaultContent: '', orderable: false },
                        { 
                            data: null,
                            render: function(data, type, row) {
                                return `
                                    <div class="d-flex justify-content-start align-items-center product-name">
                                        <div class="d-flex flex-column">
                                            <h6 class="text-nowrap mb-0">${row.item_name}</h6>
                                            <small class="text-truncate d-none d-sm-block">${row.description || ''}</small>
                                        </div>
                                    </div>`;
                            }
                        },
                        { 
                            data: 'unit_price',
                            className: 'text-end',
                            render: function(data) {
                                return `₱${parseFloat(data).toFixed(2)}`;
                            }
                        },
                        { 
                            data: 'quantity',
                            className: 'text-center'
                        },
                        { 
                            data: 'total',
                            className: 'text-end fw-semibold',
                            render: function(data) {
                                return `₱${parseFloat(data).toFixed(2)}`;
                            }
                        }
                    ],
                    responsive: true,
                    order: [[1, 'asc']],
                    dom: '<"row mx-1"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row mx-1"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    lengthMenu: [10, 25, 50, 75, 100],
                    pageLength: 10,
                    language: {
                        paginate: {
                            previous: '<i class="tabler-chevron-left"></i>',
                            next: '<i class="tabler-chevron-right"></i>'
                        }
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching order details:', error);
                console.log('Response:', xhr.responseText); // Add this for debugging
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to load order details: ' + (xhr.responseJSON?.message || error)
                });
            }
        });

        // Print Receipt functionality
        $('#printReceiptBtn').on('click', function() {
            if (!orderData) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Error',
                    text: 'Order data not loaded yet. Please try again.'
                });
                return;
            }
            
            printReceipt(orderData);
        });
        
        function printReceipt(orderData) {
            // Debug - log the order data to console
            console.log('Print Receipt - Order Data:', orderData);
            
            // Create a new window for printing
            const printWindow = window.open('', '_blank');
            if (!printWindow) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Please allow pop-ups to print the receipt.'
                });
                return;
            }
            
            // Format the date
            const orderDate = orderData.date ? new Date(orderData.date) : new Date();
            const formattedDate = orderDate.toLocaleDateString('en-PH', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
            
            // Calculate totals from items if not available directly
            let subtotal = 0;
            let tax = 0;
            let total = 0;
            
            // Try to get values from orderData directly
            if (typeof orderData.subtotal !== 'undefined' && orderData.subtotal !== null) {
                subtotal = parseFloat(orderData.subtotal);
            }
            
            if (typeof orderData.tax !== 'undefined' && orderData.tax !== null) {
                tax = parseFloat(orderData.tax);
            }
            
            if (typeof orderData.total !== 'undefined' && orderData.total !== null) {
                total = parseFloat(orderData.total);
            }
            
            // If we still don't have totals, calculate from items
            if (subtotal === 0 && orderData.items && orderData.items.length > 0) {
                subtotal = orderData.items.reduce((sum, item) => sum + parseFloat(item.total || 0), 0);
                // Assuming tax is included in total already
                total = subtotal + tax;
            }
            
            // Create HTML content for the receipt
            let receiptHtml = `
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Receipt - Order #${orderData.number || 'N/A'}</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 0;
                            padding: 20px;
                            font-size: 14px;
                        }
                        .receipt {
                            max-width: 800px;
                            margin: 0 auto;
                            border: 1px solid #ddd;
                            padding: 20px;
                        }
                        .header {
                            text-align: center;
                            margin-bottom: 20px;
                            border-bottom: 1px solid #ddd;
                            padding-bottom: 10px;
                        }
                        .logo {
                            font-size: 24px;
                            font-weight: bold;
                            margin-bottom: 5px;
                        }
                        .order-info {
                            display: flex;
                            justify-content: space-between;
                            margin-bottom: 20px;
                        }
                        .items-table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-bottom: 20px;
                        }
                        .items-table th, .items-table td {
                            border: 1px solid #ddd;
                            padding: 8px;
                            text-align: left;
                        }
                        .items-table th {
                            background-color: #f2f2f2;
                        }
                        .summary {
                            margin-top: 20px;
                            margin-left: auto;
                            width: 40%;
                        }
                        .summary-row {
                            display: flex;
                            justify-content: space-between;
                            padding: 5px 0;
                        }
                        .total {
                            font-weight: bold;
                            border-top: 1px solid #ddd;
                            padding-top: 5px;
                        }
                        .footer {
                            text-align: center;
                            margin-top: 30px;
                            font-size: 12px;
                            color: #777;
                        }
                        @media print {
                            body {
                                padding: 0;
                            }
                            .receipt {
                                border: none;
                            }
                            .no-print {
                                display: none;
                            }
                        }
                    </style>
                </head>
                <body>
                    <div class="receipt">
                        <div class="header">
                            <div class="logo">Imajica Aesthetics Skin Care</div>
                            <div class="logo">&</div>
                            <div class="logo">Medical Clinic</div>
                            <div>Receipt</div>
                        </div>
                        
                        <div class="order-info">
                            <div>
                                <p><strong>Order #:</strong> ${orderData.number || 'N/A'}</p>
                                <p><strong>Date:</strong> ${formattedDate}</p>
                                <p><strong>Status:</strong> ${orderData.status || 'N/A'}</p>
                                <p><strong>Payment Method:</strong> ${orderData.payment || 'N/A'}</p>
                            </div>
                            <div>
                                <p><strong>Customer:</strong> ${orderData.customer?.name || 'N/A'}</p>
                                <p><strong>Email:</strong> ${orderData.customer?.email || 'N/A'}</p>
                                <p><strong>Customer ID:</strong> ${orderData.customer_id || 'N/A'}</p>
                            </div>
                        </div>
                        
                        <table class="items-table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>`;
                            
            // Add items to the receipt
            if (orderData.items && orderData.items.length > 0) {
                orderData.items.forEach(item => {
                    receiptHtml += `
                        <tr>
                            <td>${item.item_name}</td>
                            <td>₱${parseFloat(item.unit_price).toFixed(2)}</td>
                            <td>${item.quantity}</td>
                            <td>₱${parseFloat(item.total).toFixed(2)}</td>
                        </tr>`;
                });
            } else {
                receiptHtml += `
                    <tr>
                        <td colspan="4" style="text-align: center;">No items found</td>
                    </tr>`;
            }
            
            receiptHtml += `
                            </tbody>
                        </table>
                        
                        <div class="summary">
                            <div class="summary-row">
                                <span>Subtotal:</span>
                                <span>₱${parseFloat(subtotal).toFixed(2)}</span>
                            </div>
                            <div class="summary-row">
                                <span>Tax:</span>
                                <span>₱${parseFloat(tax).toFixed(2)}</span>
                            </div>
                            <div class="summary-row total">
                                <span>Total:</span>
                                <span>₱${parseFloat(total).toFixed(2)}</span>
                            </div>
                        </div>
                        
                        <div class="footer">
                            <p>Thank you for your business!</p>
                            <p>© ${new Date().getFullYear()} Imajica Aesthetics</p>
                        </div>
                        
                        <div class="no-print" style="text-align: center; margin-top: 30px;">
                            <button onclick="window.print();" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer; font-size: 16px;">
                                Print Receipt
                            </button>
                            <button onclick="window.close();" style="padding: 10px 20px; margin-left: 10px; background-color: #f44336; color: white; border: none; cursor: pointer; font-size: 16px;">
                                Close
                            </button>
                        </div>
                    </div>
                </body>
                </html>
            `;
            
            // Write to the print window and print
            printWindow.document.open();
            printWindow.document.write(receiptHtml);
            printWindow.document.close();
            
            // Wait for content to load before printing
            printWindow.onload = function() {
                // Automatically print on some browsers
                // printWindow.print();
            };
        }
      });
    </script>
  </body>

<!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/app-ecommerce-order-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:26:20 GMT -->
</html>

  <!-- beautify ignore:end -->

