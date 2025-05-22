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
  
<!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/app-ecommerce-product-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:26:15 GMT -->
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
  <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" >
  <link rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}" />

    <!-- Page CSS -->
    

    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    
   
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    
      <script src="../../assets/js/config.js"></script>
    
    <!-- Add this in the <head> section -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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


  <!-- Product List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <div class="d-flex justify-content-between align-items-center">
        <h4 class="card-title">Product List</h4>
        <a href="{{ route('page.add-product') }}" class="btn btn-primary">
          <i class="ti tabler-plus me-1"></i>Add Product
        </a>
      </div>
      <div class="d-flex justify-content-between align-items-center row pt-4 gap-6 gap-md-0 g-md-6">
        <div class="col-md-4 product_category"></div>
      </div>
    </div>
    <div class="card-datatable table-responsive pt-0">
      <table class="table table-striped" id="prodTable">
        <thead class="border-top table-light">
          <tr>
          
            <th>Product</th>
            <th>Category</th>
            <th>Supplier</th>
            <th>Base Price</th>
            <th>Stock</th>
            <th>Reorder Level</th>
            <th>Manufacturing Date</th>
            <th>Expiry Date</th>
            <th>Removal Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr>
          
            <td>
      
                  {{ $product->name }}
            </td>
            <td>{{ $product->category ? $product->category->categoryTitle : $product->category_id }}</td>
            <td>{{ $product->supplier ? $product->supplier->supplier_name : $product->supplier_id }}</td>
            <td>{{ $product->base_price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->restock_point }}</td>
            <td>{{ $product->manufacturing_date }}</td>
            <td>{{ $product->expiry_date }}</td>
            <td>{{ $product->removal_date }}</td>
            <td>
              <div class="d-flex align-items-sm-center justify-content-sm-center">
                <a href="{{ route('product.edit', ['sku' => $product->sku]) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Product">
                  <i class="ti tabler-edit me-1"></i>Edit
                </a>
                <button class="btn btn-sm btn-danger delete-product" data-sku="{{ $product->sku }}">
                    <i class="ti tabler-trash me-1"></i>Delete
                </button>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Delete Product Form (Hidden) -->
  <form id="deleteProductForm" method="POST" action="{{ route('product.delete') }}" style="display: none;">
      @csrf
      @method('DELETE')
      <input type="hidden" id="delete_product_sku" name="sku">
      <input type="hidden" id="force_delete" name="force_delete" value="0">
  </form>

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

    
         <script src="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-js"></script>

    
      
     <script src="{{ asset('vendor/libs/pickr/pickr.js') }}"></script>

    <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>

     <script src="{{ asset('vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
     <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
   <link rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}" />

    <!-- Main JS -->
    
      <script src="../../assets/js/main.js"></script>
    

    {{-- <!-- Page JS -->
    <script src="../../assets/js/product-list.js"></script> --}}


    <img src="{{ asset('assets/img/product-8.png') }}" alt="Product Image">

    
    <!-- Add these before closing </body> tag -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Add the delete form -->
    <form id="deleteProductForm" method="POST" action="{{ route('product.delete') }}" style="display: none;">
        @csrf
        @method('DELETE')
        <input type="hidden" id="delete_product_sku" name="sku">
        <input type="hidden" id="force_delete" name="force_delete" value="0">
    </form>

<script>
$(document).ready(function() {
  $('#prodTable').DataTable();
  
    // SweetAlert default configuration
    const swalConfig = {
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-secondary',
            denyButton: 'btn btn-danger'
        },
        buttonsStyling: false,
        backdrop: true,
        allowOutsideClick: false
    };

    // Handle delete product button clicks using event delegation
    $(document).on('click', '.delete-product', function() {
        try {
            const sku = $(this).data('sku');
            const productName = $(this).closest('tr').find('td:first').text().trim();
            
            if (!sku) {
                throw new Error("Product SKU not found in data attributes");
            }
            
            // Set the SKU in the hidden delete form
            $('#delete_product_sku').val(sku);
            $('#force_delete').val(0); // Reset force delete flag
            
            // Show delete confirmation
            Swal.fire({
                ...swalConfig,
                title: 'Confirm Delete',
                html: `Are you sure you want to delete product <strong>${productName}</strong>?<br>This action cannot be undone.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the delete form
                    $('#deleteProductForm').submit();
                }
            });
        } catch (e) {
            console.error("Error in delete button click handler:", e);
            Swal.fire({
                ...swalConfig,
                icon: 'error',
                title: 'Delete Error',
                html: 'An error occurred while processing your delete request:<br>' + e.message,
                showConfirmButton: true
            });
        }
    });

    // Handle success/error messages from server
    @if(session('success'))
        Swal.fire({
            ...swalConfig,
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
            timer: 1500,
            showConfirmButton: false
        });
    @endif

    @if(session('error'))
        @if(session('show_force_delete'))
            Swal.fire({
                ...swalConfig,
                icon: 'warning',
                title: 'Cannot Delete Product',
                html: `
                    <div class="text-start">
                        <p class="mb-3">{{ session('error') }}</p>

                        @if(!empty(session('related_records')))
                            <div class="alert alert-warning mb-3">
                                <h6 class="fw-bold mb-2">Related Records:</h6>
                                <div style="max-height: 200px; overflow-y: auto;">
                                    @foreach(session('related_records') as $tableName => $records)
                                        <div class="mb-2">
                                            <strong>{{ $tableName }}</strong>
                                            <ul class="mb-1 ps-3">
                                                @foreach($records as $record)
                                                    <li>{{ $record['name'] }} (ID: {{ $record['id'] }})</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="alert alert-info mb-0 mt-3">
                            <h6 class="fw-bold mb-2">Options:</h6>
                            <ol class="ps-3 mb-0">
                                <li>Go to the referenced areas and remove all product references manually first</li>
                                <li>Use <strong>"Force Delete"</strong> to delete anyway (may cause data inconsistency)</li>
                            </ol>
                        </div>
                    </div>
                `,
                showDenyButton: true,
                confirmButtonText: 'Cancel',
                denyButtonText: '<i class="ti tabler-trash me-1"></i> Force Delete',
                customClass: {
                    confirmButton: 'btn btn-secondary',
                    denyButton: 'btn btn-danger'
                },
                width: '42em',
            }).then((result) => {
                if (result.isDenied) {
                    // Set the SKU and force_delete flag
                    $('#delete_product_sku').val("{{ session('sku') }}");
                    $('#force_delete').val(1);
                    
                    // Show force delete confirmation
                    Swal.fire({
                        ...swalConfig,
                        title: 'Force Delete Confirmation',
                        html: `
                            <div class="text-start">
                                <p>This will <strong class="text-danger">permanently delete</strong> the product and may leave related data in an inconsistent state.</p>
                                
                                <div class="alert alert-danger mt-3">
                                    <h6 class="fw-bold mb-2">Warning:</h6>
                                    <ul class="ps-3 mb-0">
                                        <li>Records referencing this product will have invalid references</li>
                                        <li>This may cause errors when viewing or processing those records</li>
                                        <li>This action cannot be undone</li>
                                    </ul>
                                </div>
                                
                                <p class="mt-3 fw-bold">Are you absolutely sure you want to proceed?</p>
                            </div>
                        `,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: '<i class="ti tabler-alert-triangle me-1"></i> Yes, Force Delete!',
                        cancelButtonText: 'Cancel',
                        customClass: {
                            confirmButton: 'btn btn-danger',
                            cancelButton: 'btn btn-secondary'
                        },
                        width: '42em',
                    }).then((confirmResult) => {
                        if (confirmResult.isConfirmed) {
                            // Submit the form with force delete
                            $('#deleteProductForm').submit();
                        }
                    });
                }
            });
        @else
            Swal.fire({
                ...swalConfig,
                icon: 'error',
                title: 'Error',
                text: "{{ session('error') }}",
                showConfirmButton: true
            });
        @endif
    @endif
});
</script>

  </body>

<!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/app-ecommerce-product-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:26:16 GMT -->
</html>

  <!-- beautify ignore:end -->

