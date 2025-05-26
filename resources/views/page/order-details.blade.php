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
  
<!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/app-ecommerce-order-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:26:18 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Order Details</title>

    
      <meta name="description" content="View order details in the Imajica Booking System" />
      <!-- Canonical SEO -->
      <meta name="keywords" content="Vuexy bootstrap dashboard, vuexy bootstrap 5 dashboard, themeselection, html dashboard, web dashboard, frontend dashboard, responsive bootstrap theme" />
      <meta property="og:title" content="Vuexy bootstrap Dashboard by Pixinvent" />
      <meta property="og:type" content="product" />
      <meta property="og:url" content="https://themeforest.net/item/vuexy-vuejs-html-laravel-admin-dashboard-template/23328599" />
      <meta property="og:image" content="../../../../pixinvent.com/wp-content/uploads/2023/06/vuexy-hero-image.png" />
      <meta property="og:description" content="Vuexy is the best bootstrap 5 dashboard for responsive web apps. Streamline your app development process with ease." />
      <meta property="og:site_name" content="Pixinvent" />
      <link rel="canonical" href="https://themeforest.net/item/vuexy-vuejs-html-laravel-admin-dashboard-template/23328599" />
    
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />

    <!-- Page CSS -->
    

    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    
  
    
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    
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
        

<div class="menu-mobile-toggler d-xl-none rounded-1">
  <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
    <i class="ti tabler-menu icon-base"></i>
    <i class="ti tabler-chevron-right icon-base"></i>
  </a>
</div>
<!-- / Menu -->

      

      <!-- Layout container -->
      <div class="layout-page">

        

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Order Details -->
            <div class="row">
              <div class="col-12">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Order #{{ $order->order_number }}</h5>
                    <a href="{{ route('page.order-list') }}" class="btn btn-secondary">
                      <i class="ti ti-arrow-left me-1"></i> Back to Orders
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="row mb-4">
                      <div class="col-md-6">
                        <h6 class="fw-semibold">Customer Information</h6>
                        <p class="mb-1">Name: {{ $order->customer_name }}</p>
                        <p>Email: {{ $order->customer_email }}</p>
                      </div>
                      <div class="col-md-6">
                        <h6 class="fw-semibold">Order Information</h6>
                        <p class="mb-1">Date: {{ $order->order_date }}</p>
                        <p class="mb-1">Status: 
                          <span class="badge bg-label-{{ 
                            $order->order_status == 'Delivered' ? 'success' : 
                            ($order->order_status == 'Ordered' ? 'primary' : 
                            ($order->order_status == 'Out for Delivery' ? 'warning' : 
                            ($order->order_status == 'Ready to Pickup' ? 'info' : 'secondary'))) 
                          }}">
                            {{ $order->order_status }}
                          </span>
                        </p>
                        <p class="mb-1">Payment Status: 
                          <span class="badge bg-label-{{ 
                            $order->payment_status == 'Paid' ? 'success' : 
                            ($order->payment_status == 'Pending' ? 'warning' : 
                            ($order->payment_status == 'Failed' ? 'danger' : 
                            ($order->payment_status == 'Cancelled' ? 'secondary' : 'info'))) 
                          }}">
                            {{ $order->payment_status }}
                          </span>
                        </p>
                        <p>Payment Method: {{ $order->payment_method }}</p>
                      </div>
                    </div>

                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($order->orderItems as $item)
                          <tr>
                            <td>{{ $item->item_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>₱{{ number_format($item->unit_price, 2) }}</td>
                            <td>₱{{ number_format($item->total, 2) }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="3" class="text-end fw-semibold">Subtotal:</td>
                            <td>₱{{ number_format($order->subtotal, 2) }}</td>
                          </tr>
                          <tr>
                            <td colspan="3" class="text-end fw-semibold">Tax:</td>
                            <td>₱{{ number_format($order->tax, 2) }}</td>
                          </tr>
                          <tr>
                            <td colspan="3" class="text-end fw-semibold">Total:</td>
                            <td>₱{{ number_format($order->total, 2) }}</td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>

                    <div class="mt-4">
                      <a href="{{ route('page.edit-order', $order->order_id) }}" class="btn btn-primary me-2">
                        <i class="ti ti-edit me-1"></i> Edit Order
                      </a>
                      <button class="btn btn-danger delete-order" data-id="{{ $order->order_id }}" data-number="{{ $order->order_number }}">
                        <i class="ti ti-trash me-1"></i> Delete Order
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

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
  <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
   <script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>
  <script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>
  <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
  <script src="{{ asset('vendor/js/menu.js') }}"></script>

       
<script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>

     <script src="{{ asset('vendor/js/menu.js') }}"></script>
    
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

    <!-- Main JS -->
    
      <script src="../../assets/js/main.js"></script>
    

    <!-- Page JS -->
    <script src="../../assets/js/order-list.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


<script>
$(document).ready(function () {
  // Add custom CSS styling for the primary button
  $('<style>')
    .prop('type', 'text/css')
    .html(`
      .btn-primary {
        background-color: var(--bs-primary) !important;
        border-color: var(--bs-primary) !important;
        color: var(--bs-primary-contrast) !important;
      }
      .btn-primary:hover {
        background-color: color-mix(in sRGB, #000 10%, var(--bs-primary)) !important;
        border-color: color-mix(in sRGB, #000 10%, var(--bs-primary)) !important;
      }
    `)
    .appendTo('head');

  // Existing DataTable initialization 
  $('#orderTable').DataTable({
    layout: {
      topStart: {
        rowClass: "card-header d-flex border-top rounded-0 flex-wrap py-0 flex-column flex-md-row align-items-center",
        features: [{
          pageLength: { menu: [7, 10, 25, 50, 100] }
        }]
      },
      topEnd: {
        rowClass: "row m-3 my-0 justify-content-between",
        features: [{
          search: {
            className: "me-5 ms-n4 pe-5 mb-n6 mb-md-0",
            placeholder: "Search Order"
          },
          buttons: [{
            text: '<span class="d-flex align-items-center gap-1"><i class="ti tabler-plus me-1"></i>Add Order</span>',
            className: "btn btn-primary",
            action: function() {
              window.location.href = "/add-order";
            }
          }]
        }]
      }
    }
  });

  // Enhanced click handler for view buttons
  $('.view-order').on('click', function(e) {
    e.preventDefault();
    const row = $(this).closest('tr');
    const orderId = row.data('id');
    const orderItems = row.data('items');
    
    // Store all order details in session storage
    const orderDetails = {
      id: orderId,
      items: orderItems,
      number: row.find('td:eq(1)').text().trim(),
      date: row.find('td:eq(2)').text().trim(),
      customer: {
        name: row.find('td:eq(3) h6').text().trim(),
        email: row.find('td:eq(3) small').text().trim()
      },
      total: row.find('td:eq(4)').text().trim(),
      status: row.find('td:eq(5)').text().trim(),
      payment: row.find('td:eq(6)').text().trim()
    };
    
    sessionStorage.setItem('orderDetails', JSON.stringify(orderDetails));
    sessionStorage.setItem('currentOrderItems', JSON.stringify(orderItems));
    console.log("Order details from order list:", orderDetails);
    // Redirect to order details page
    window.location.href = $(this).attr('href');
  });

  // Handle delete order button clicks - COMPLETE IMPLEMENTATION
  $(document).on('click', '.delete-order', function() {
    const orderId = $(this).data('id');
    const orderNumber = $(this).data('number');

    Swal.fire({
      title: 'Are you sure?',
      text: `You want to delete order ${orderNumber}? This action cannot be undone!`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'Cancel',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        // Show loading state
        Swal.fire({
          title: 'Deleting...',
          text: 'Please wait while we delete the order',
          allowOutsideClick: false,
          allowEscapeKey: false,
          showConfirmButton: false,
          didOpen: () => {
            Swal.showLoading()
            
            // Submit delete request
            $.ajax({
              type: "POST",
              url: "{{ route('order.delete') }}",
              data: {
                _token: "{{ csrf_token() }}",
                _method: "DELETE",
                order_id: orderId,
                void_reason: 'Order deleted by staff'
              },
              success: function(response) {
                if(response.status) {
                  // Success message
                  Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: `Order ${orderNumber} has been deleted successfully`,
                    timer: 2000,
                    showConfirmButton: false
                  }).then(() => {
                    // Reload the page to refresh the order list
                    window.location.href = "{{ route('page.order-list') }}";
                  });
                } else {
                  // Error message
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.message || 'Something went wrong!'
                  });
                }
              },
              error: function(xhr) {
                let errorMessage = 'Failed to delete order';
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
      }
    });
  });
});
</script>
  </body>

<!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/app-ecommerce-order-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:26:18 GMT -->
</html>

  <!-- beautify ignore:end -->