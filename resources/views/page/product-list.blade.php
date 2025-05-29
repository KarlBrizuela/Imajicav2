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
      <link rel="icon" type="image/x-icon" href="/public/logo/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet" />

   <link rel="stylesheet" href="/public/vendor/fonts/iconify-icons.css" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->
    
   <link rel="stylesheet" href="/public/vendor/libs/node-waves/node-waves.css" />
 <link rel="stylesheet" href="/public/vendor/libs/pickr/pickr-themes.css" />
  <link rel="stylesheet" href="/public/vendor/css/core.css">
  <link rel="stylesheet" href="/public/css/demo.css" />
  

    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <!-- endbuild -->

   <link rel="stylesheet" href="/public/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
  <link rel="stylesheet" href="/public/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
  <link rel="stylesheet" href="/public/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" >
  <link rel="stylesheet" href="/public/vendor/libs/select2/select2.css" />

    <!-- Page CSS -->
    

    <!-- Helpers -->
  <script src="/public/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    
   
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    
       <script src="/public/assets/js/config.js"></script>
    
    <!-- Add this in the <head> section -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Add these before closing </head> tag -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
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
  <div class="card mt-2">
    <div class="card-header pb-2 pt-3">
      <div class="d-flex justify-content-between align-items-center row">
        <div class="col-12">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Product List</h5>
            <div class="d-flex gap-2">
              <button id="exportExcel" class="btn btn-primary">
                <i class="ti tabler-download me-1"></i>Export Excel
              </button>
              <a href="{{ route('page.add-product') }}" class="btn btn-success">
                <i class="ti tabler-plus me-1"></i>Add Product
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-datatable table-responsive">
      <table class="table border-top" id="prodTable">
        <thead>
          <tr>
            <th>PRODUCT</th>
            <th>CATEGORY</th>
            <th>SUPPLIER</th>
            <th>BASE PRICE</th>
            <th>STOCK</th>
            <th>REORDER LEVEL</th>
            <th>EXPIRY DATE</th>
            <th class="text-center">ACTIONS</th>
          </tr>
        </thead>
        <tbody class="text-nowrap">
          @foreach($products as $product)
          <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category ? $product->category->categoryTitle : $product->category_id }}</td>
            <td>{{ $product->supplier ? $product->supplier->supplier_name : $product->supplier_id }}</td>
            <td>{{ $product->base_price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->restock_point }}</td>
            <td>{{ $product->expiry_date }}</td>
            <td>
              <div class="d-flex justify-content-center gap-2">
                <a href="{{ route('product.edit', ['sku' => $product->sku]) }}" class="text-body">
                  <i class="ti tabler-edit"></i>
                </a>
                <a href="javascript:void(0);" class="text-body delete-product" data-sku="{{ $product->sku }}">
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
    
    
      <script src="/public/vendor/libs/jquery/jquery.js"></script>
   <script src="/public/vendor/libs/popper/popper.js"></script>
<script src="/public/vendor/js/bootstrap.js"></script>
  <script src="/public/vendor/libs/node-waves/node-waves.js"></script>
    
         <script src="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-js"></script>

    
      
     <script src="/public/vendor/libs/pickr/pickr.js"></script>
  <script src="/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="/public/vendor/libs/hammer/hammer.js"></script>
<script src="/public/vendor/libs/i18n/i18n.js"></script>
  <script src="/public/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
     <script src="/public/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
   <link rel="stylesheet" href="/public/vendor/libs/select2/select2.css" />

    <!-- Main JS -->
    
      <script src="/public/assets/js/main.js"></script>
    

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
    var table = $('#prodTable').DataTable({
        responsive: true,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50],
        dom: '<"d-flex justify-content-between align-items-center mx-2 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"table-responsive"t><"d-flex justify-content-end align-items-center mx-2 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6 d-flex justify-content-end"p>>',
        language: {
            search: "",
            searchPlaceholder: "Search Product...",
            lengthMenu: "_MENU_ entries per page",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            paginate: {
                previous: '←',
                next: '→'
            }
        },
        order: [[0, 'asc']]
    });

    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length select').removeClass('form-select-sm');

    // Excel export button click handler
    $('#exportExcel').on('click', function() {
        // Get the filtered data
        var filteredData = table.rows({ search: 'applied' }).data();
        
        // Create a new workbook
        var wb = XLSX.utils.book_new();
        
        // Prepare the data for export
        var exportData = [];
        // Add headers
        exportData.push(['Product', 'Category', 'Supplier', 'Base Price', 'Stock', 'Reorder Level', 'Expiry Date']);
        
        // Add filtered data
        filteredData.each(function(data) {
            exportData.push([
                data[0], // Product
                data[1], // Category
                data[2], // Supplier
                data[3], // Base Price
                data[4], // Stock
                data[5], // Reorder Level
                data[6]  // Expiry Date
            ]);
        });
        
        // Create worksheet
        var ws = XLSX.utils.aoa_to_sheet(exportData);
        
        // Add worksheet to workbook
        XLSX.utils.book_append_sheet(wb, ws, 'Products');
        
        // Generate Excel file and trigger download
        XLSX.writeFile(wb, 'product_list.xlsx');
    });
});
</script>

<style>
/* Make table borders lighter */
#prodTable th, #prodTable td {
    border-color: rgba(0,0,0,0.07) !important;
}
#prodTable {
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

  </body>

<!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/app-ecommerce-product-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:26:16 GMT -->
</html>

  <!-- beautify ignore:end -->

