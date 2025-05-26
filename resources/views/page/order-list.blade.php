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
  <!-- Order List Widget -->

  <div class="card mb-6">
    <div class="card-widget-separator-wrapper">
      <div class="card-body card-widget-separator">
        <div class="row gy-4 gy-sm-1">
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-4 pb-sm-0">
              <div>
                <h4 class="mb-0">{{ $paymentCounts['pending'] }}</h4>
                <p class="mb-0">Pending Payment</p>
              </div>
              <span class="avatar me-sm-6">
                <span class="avatar-initial bg-label-warning rounded text-heading">
                  <i class="icon-base ti tabler-calendar-stats icon-26px text-heading"></i>
                </span>
              </span>
            </div>
            <hr class="d-none d-sm-block d-lg-none me-6" />
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-4 pb-sm-0">
              <div>
                <h4 class="mb-0">{{ $paymentCounts['paid'] }}</h4>
                <p class="mb-0">Paid</p>
              </div>
              <span class="avatar p-2 me-lg-6">
                <span class="avatar-initial bg-label-success rounded"><i class="icon-base ti tabler-checks icon-26px text-heading"></i></span>
              </span>
            </div>
            <hr class="d-none d-sm-block d-lg-none" />
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start border-end pb-4 pb-sm-0 card-widget-3">
              <div>
                <h4 class="mb-0">{{ $paymentCounts['cancelled'] > 0 ? $paymentCounts['cancelled'] : 'None' }}</h4>
                <p class="mb-0">Cancelled</p>
              </div>
              <span class="avatar p-2 me-sm-6">
                <span class="avatar-initial bg-label-secondary rounded"><i class="icon-base ti tabler-wallet icon-26px text-heading"></i></span>
              </span>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h4 class="mb-0">{{ $paymentCounts['failed'] > 0 ? $paymentCounts['failed'] : 'None' }}</h4>
                <p class="mb-0">Failed</p>
              </div>
              <span class="avatar p-2">
                <span class="avatar-initial bg-label-danger rounded"><i class="icon-base ti tabler-alert-octagon icon-26px text-heading"></i></span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Order List Table -->
  <div class="card">
    <table class="table border-top table-striped table-responsive" id="orderTable">
      <thead class="table-light">
        <tr>
          <th></th>
          <th>order</th>
          <th>date</th>
          <th>customers</th>
          <th>payment</th>
          <th>payment status</th>
          <th>method</th>
          <th>actions</th>
        </tr>
        <tbody>
         @foreach ($orders as $order)
          <tr
            data-id="{{ $order->order_id }}"
            data-items='@json($order->orderItems)'>
            <td></td>
            <td>
              <a href="javascript:void(0)" class="text-heading fw-bold">#{{ $order->order_number }}</a>
            </td>
            <td>{{ $order->order_date }}</td>
            <td>
            <div class="d-flex flex-column">
              <h6 class="mb-0">{{ $order->customer_name }}</h6>
              <small class="text-muted">{{ $order->customer_email ?? 'No email available' }}</small>
            </div>

          </td>

            <td>₱{{ $order->total }}</td>
            <td>
              <span class="badge bg-label-{{
                $order->payment_status == 'Paid' ? 'success' :
                ($order->payment_status == 'Pending' ? 'warning' :
                ($order->payment_status == 'Failed' ? 'danger' :
                ($order->payment_status == 'Cancelled' ? 'secondary' : 'info')))
            }} me-1">
                {{ ucfirst($order->payment_status) }}
            </span>

            </td>
            <td>{{ $order->payment_method }}</td>
            <td>
              <div class="d-flex gap-2">
                <a href="{{ route('page.order-details', $order->order_id) }}"
                   class="btn btn-sm btn-success view-order">
                  <i class="ti tabler-eye me-1"></i> View
                </a>

                <a href="{{ route('page.edit-order', $order->order_id) }}"
                   class="btn btn-sm btn-primary edit-order">
                  <i class="ti tabler-edit me-1"></i> Edit
                </a>

                <button class="btn btn-sm btn-danger delete-order">
                  <i class="ti tabler-trash me-1"></i> Delete
                </button>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </thead>
    </table>
  </div>
</div>

<!-- Delete Order Form (Hidden) -->
<form id="deleteOrderForm" method="POST" action="{{ route('order.delete') }}" style="display: none;">
    @csrf
    @method('DELETE')
    <input type="hidden" id="delete_order_id" name="order_id">
    <input type="hidden" id="delete_void_reason" name="void_reason">
</form>

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
    const orderId = $(this).closest('tr').data('id');
    const orderNumber = $(this).closest('tr').find('td:eq(1)').text().trim();

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
            
            // Set the order ID in the hidden form
            $('#delete_order_id').val(orderId);
            $('#delete_void_reason').val('Order deleted by staff');
            
            // Submit the form via AJAX
            $.ajax({
              type: "POST",
              url: "{{ route('order.delete') }}",
              data: $('#deleteOrderForm').serialize(),
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
                    location.reload();
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