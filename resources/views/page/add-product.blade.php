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
  
<!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/app-ecommerce-product-add.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:26:16 GMT -->
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
  <link rel="stylesheet" href="/public/css/demo.css" />>
    
    <!-- Vendors CSS -->
    
     <link rel="stylesheet" href="/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    
    <!-- endbuild -->

    <link rel="stylesheet" href="/public/vendor/libs/quill/typography.css" />
  <link rel="stylesheet" href="/public/vendor/libs/quill/katex.css" />
  <link rel="stylesheet" href="/public/vendor/libs/quill/editor.css" />
  <link rel="stylesheet" href="/public/vendor/libs/select2/select2.css" />
  <link rel="stylesheet" href="/public/vendor/libs/dropzone/dropzone.css" />
   <link rel="stylesheet" href="/public/vendor/libs/flatpickr/flatpickr.css" />
   <link rel="stylesheet" href="/public/vendor/libs/tagify/tagify.css" />

    <!-- Page CSS -->
    

    <!-- Helpers -->
    <script src="/public/vendor/js/helpers.js"></script>
  
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    
   <script src="/public/assets/js/config.js"></script>
    
  </head>

  <body>
    
      <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5J3LMKC" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
    
    <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">
      @include ('components.sidebar')

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
  <div class="app-ecommerce">
    <!-- Add Product -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
      <div class="d-flex flex-column justify-content-center">
        <h4 class="mb-1">Add a new Product</h4>
        <p class="mb-0">Orders placed across your store</p>
      </div>
      <div class="d-flex align-content-center flex-wrap gap-4">
        <div class="d-flex gap-4">
          <button type="button" class="btn btn-label-secondary" id="discardBtn">Discard</button>
          <button type="button" class="btn btn-primary" id="createProductBtn">Create Product</button>
        </div>
      </div>
    </div>

    <form id="addProductForm" method="POST" action="{{ route('product.create') }}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <!-- First column - Product Info -->
        <div class="col-12 col-lg-8">
          <!-- Product Information -->
          <div class="card mb-6">
            <div class="card-header">
              <h5 class="card-tile mb-0">Product information</h5>
            </div>
            <div class="card-body">
              <!-- Product Picture -->
              <div class="mb-4">
                <label class="form-label">PRODUCT PICTURE</label>
                <input type="file" class="form-control" name="product_image" accept="image/*">
                <small class="text-muted">Upload a profile picture. Max size 2MB</small>
              </div>

              <!-- SKU -->
              <div class="mb-4">
                <label class="form-label">SKU</label>
                <input type="text" class="form-control" name="sku" required>
              </div>

              <!-- Item Name -->
              <div class="mb-4">
                <label class="form-label">ITEM NAME</label> 
                <input type="text" class="form-control" name="name" placeholder="Search Item Name" required>
              </div>

              <!-- Category -->
              <div class="mb-4">
                <label class="form-label">CATEGORY</label>
                <select class="form-select" name="category_id" required>
                  <option value="">Select Category</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->category_id }}">{{ $category->categoryTitle }}</option>
                  @endforeach
                </select>
              </div>

              <!-- Supplier -->
              <div class="mb-4">
                <label class="form-label">SUPPLIER</label>
                <select class="form-select" name="supplier_id" required>
                  <option value="">Select Supplier</option>
                  @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->suppler_id }}">{{ $supplier->supplier_name }}</option>
                  @endforeach
                </select>
              </div>

              <!-- Base Price -->
              <div class="mb-4">
                <label class="form-label">BASE PRICE</label>
                <div class="input-group">
                  <span class="input-group-text">₱</span>
                  <input type="number" class="form-control" name="base_price" placeholder="0.00" step="0.01" required>
                </div>
              </div>

              <!-- Stock Info -->
              <div class="mb-4">
                <label class="form-label mb-2">STOCK INFORMATION</label>
                <div class="row g-3">
                  <div class="col-md-6">
                    <input type="number" class="form-control" name="quantity" placeholder="Total Stock" required>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control" name="restock_point" placeholder="Restock Point">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Second column - Dates -->
        <div class="col-12 col-lg-4">
          <div class="card mb-6">
            <div class="card-header">
              <h5 class="card-title mb-0">Product Dates</h5>
            </div>
            <div class="card-body">
              <div class="mb-4">
                <label class="form-label">MANUFACTURING DATE</label>
                <input type="date" class="form-control" name="manufacturing_date">
              </div>

              <div class="mb-4">
                <label class="form-label">EXPIRATION DATE</label>
                <input type="date" class="form-control" name="expiry_date">
              </div>

              <div class="mb-4">
                <label class="form-label">REMOVAL DATE</label>
                <input type="date" class="form-control" name="removal_date">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
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
    
    
     <script src="/public/vendor/libs/jquery/jquery.js"></script>
   <script src="/public/vendor/libs/popper/popper.js"></script>
<script src="/public/vendor/js/bootstrap.js"></script>
  <script src="/public/vendor/libs/node-waves/node-waves.js"></script>

    
     <script src="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-js"></script>>

    
      
    <script src="/public/vendor/libs/pickr/pickr.js"></script>
  <script src="/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="/public/vendor/libs/hammer/hammer.js"></script>
<script src="/public/vendor/libs/i18n/i18n.js"></script>
  <script src="/public/vendor/js/menu.js"></script>
    
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/public/vendor/libs/quill/katex.js"></script>
 <script src="/public/vendor/libs/quill/quill.js"></script>
   <script src="/public/vendor/libs/select2/select2.js"></script>
   <script src="/public/vendor/libs/dropzone/dropzone.js"></script>
   <script src="/public/vendor/libs/jquery-repeater/jquery-repeater.js"></script>
   <script src="/public/vendor/libs/flatpickr/flatpickr.js"></script>
   <script src="/public/'vendor/libs/tagify/tagify.js"></script>

    <!-- Main JS -->
    
   <script src="/public/assets/js/main.js"></script>
    

    <!-- Page JS -->
    <script src="/public/assets/js/add-product.js"></script>

    <script>
      $(document).ready(function() {
   // Handle variant selection change
   $(document).on('change', '[id^=form-repeater-1-1], [id^=form-repeater-1-2]', function() {
       const variantRow = $(this).closest('.row');
       const variantType = variantRow.find('[id^=form-repeater-1-1]').val();
       const variantValue = variantRow.find('[id^=form-repeater-1-2]').val();
       
       // Log the variant details
       console.log({
           type: variantType,
           value: variantValue
       });

       // Update input placeholder based on selected variant
       const variantInput = variantRow.find('[id^=form-repeater-1-2]');
       const selectedVariant = variantType;
       
       const placeholders = {
           'size': 'Enter size',
           'color': 'Enter color',
           'weight': 'Enter weight in grams',
           'smell': 'Enter smell/fragrance'
       };
       
       variantInput.attr('placeholder', placeholders[selectedVariant]);
       
       // Change input type for specific variants
       if (selectedVariant === 'weight') {
           variantInput.attr('type', 'number');
       } else {
           variantInput.attr('type', 'text');
       }
   });
});
     
     </script>     

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
      $(document).ready(function() {
        // SweetAlert default configuration
        const swalConfig = {
          customClass: {
            confirmButton: 'btn btn-primary me-3',
            cancelButton: 'btn btn-label-secondary' 
          },
          buttonsStyling: false
        };

        // Handle discard button
        $('#discardBtn').on('click', function() {
            Swal.fire({
                ...swalConfig,
                title: 'Discard Changes?',
                text: 'Are you sure you want to discard all changes?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, discard',
                cancelButtonText: 'No, keep editing'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route("page.product-list") }}';
                }
            });
        });

        // Handle form submission
        $('#createProductBtn').on('click', function(e) {
            e.preventDefault();
            
            const form = $('#addProductForm');
            const formData = new FormData(form[0]);

            // Validate required fields
            const requiredFields = {
                'name': 'Name',
                'sku': 'SKU',
                'product_image': 'Product image', 
                'category_id': 'Category',
                'supplier_id': 'Supplier',
                'base_price': 'Base price',
                'quantity': 'Total stock',
                'restock_point': 'Restock point',
                'manufacturing_date': 'Manufacturing date',
                'expiry_date': 'Expiry date',
                'removal_date': 'Removal date'
            };

            // Additional validation for dates
            const mfgDate = new Date(formData.get('manufacturing_date'));
            const expDate = new Date(formData.get('expiry_date')); 
            const remDate = new Date(formData.get('removal_date'));

            if (expDate <= mfgDate) {
                Swal.fire({
                    ...swalConfig,
                    icon: 'error',
                    title: 'Invalid Dates',
                    text: 'Expiry date must be after manufacturing date'
                });
                return;
            }

            if (remDate < expDate) {
                Swal.fire({
                    ...swalConfig,
                    icon: 'error', 
                    title: 'Invalid Dates',
                    text: 'Removal date must be after or equal to expiry date'
                });
                return;
            }

            // Check required fields
            for (const [field, label] of Object.entries(requiredFields)) {
                if (!formData.get(field)) {
                    Swal.fire({
                        ...swalConfig,
                        icon: 'error',
                        title: 'Required Field Missing',
                        text: `${label} is required`
                    });
                    return;
                }
            }

            // Validate numeric fields
            if (parseFloat(formData.get('base_price')) <= 0) {
                Swal.fire({
                    ...swalConfig,
                    icon: 'error',
                    title: 'Invalid Base Price',
                    text: 'Base price must be greater than 0'
                });
                return;
            }

            if (parseInt(formData.get('quantity')) < 0) {
                Swal.fire({
                    ...swalConfig,
                    icon: 'error',
                    title: 'Invalid Quantity',
                    text: 'Quantity cannot be negative'
                });
                return;
            }

            if (parseInt(formData.get('restock_point')) < 0) {
                Swal.fire({
                    ...swalConfig,
                    icon: 'error',
                    title: 'Invalid Restock Point', 
                    text: 'Restock point cannot be negative'
                });
                return;
            }
            
            // Show loading state
            Swal.fire({
                title: 'Creating Product',
                html: 'Please wait while we create your product...',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });

            // Submit form via AJAX
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        ...swalConfig,
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '{{ route("page.product-list") }}';
                        }
                    });
                },
                error: function(xhr) {
                    let errorMessage = 'An error occurred while creating the product.';
                    
                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.errors) {
                            errorMessage = Object.values(xhr.responseJSON.errors).flat().join('\n');
                        } else if (xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                    }

                    Swal.fire({
                        ...swalConfig,
                        icon: 'error',
                        title: 'Error',
                        text: errorMessage
                    });
                }
            });
        });
      });
    </script>
  </body>
</html>

