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
    <link rel="icon" type="image/x-icon" href="{{ asset(path:'logo/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->
    
    <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />
    
    <!-- Vendors CSS -->
    
       <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    
    <!-- endbuild -->

   <link rel="stylesheet" href="{{ asset('vendor/libs/quill/typography.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/quill/katex.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/quill/editor.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/dropzone/dropzone.css') }}" />
   <link rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}" />
   <link rel="stylesheet" href="{{ asset('vendor/libs/tagify/tagify.css') }}" />

    <!-- Page CSS -->
    

    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
   
  
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
    <!-- Edit Product -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1">Edit Product</h4>
            <p class="mb-0">Update product details</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-4">
            <div class="d-flex gap-4">
                <button type="button" class="btn btn-label-secondary" id="discardBtn">Back</button>
                <button type="button" class="btn btn-primary" id="updateProductBtn">Save changes</button>
            </div>
        </div>
    </div>

    <form id="editProductForm" method="POST" action="{{ route('product.update', ['sku' => $product->sku]) }}" enctype="multipart/form-data" data-sku="{{ $product->sku }}">
        @csrf
        <input type="hidden" name="_method" value="POST">
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
                            <input type="text" class="form-control" name="sku" value="{{ $product->sku }}" required>
                        </div>

                        <!-- Item Name -->
                        <div class="mb-4">
                            <label class="form-label">ITEM NAME</label>
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label class="form-label">CATEGORY</label>
                            <select class="form-select" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->category_id }}" {{ $product->category_id == $category->category_id ? 'selected' : '' }}>
                                        {{ $category->categoryTitle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Supplier -->
                        <div class="mb-4">
                            <label class="form-label">SUPPLIER</label>
                            <select class="form-select" name="supplier_id" required>
                                <option value="">Select Supplier</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->suppler_id }}" {{ $product->supplier_id == $supplier->suppler_id ? 'selected' : '' }}>
                                        {{ $supplier->supplier_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Base Price -->
                        <div class="mb-4">
                            <label class="form-label">BASE PRICE</label>
                            <div class="input-group">
                                <span class="input-group-text">₱</span>
                                <input type="number" class="form-control" name="base_price" value="{{ $product->base_price }}" step="0.01" required>
                            </div>
                        </div>

                        <!-- Stock Info -->  
                        <div class="mb-4">
                            <label class="form-label mb-2">STOCK INFORMATION</label>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="quantity" placeholder="Total Stock" value="{{ $product->quantity }}" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="restock_point" placeholder="Restock Point" value="{{ $product->restock_point }}">
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
                            <input type="date" class="form-control" name="manufacturing_date" value="{{ $product->manufacturing_date }}">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">EXPIRATION DATE</label>
                            <input type="date" class="form-control" name="expiry_date" value="{{ $product->expiry_date }}">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">REMOVAL DATE</label>
                            <input type="date" class="form-control" name="removal_date" value="{{ $product->removal_date }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
  </div>
</div>
          <!-- / Content -->
<!-- Offcanvas for Adding New Category -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEcommerceCategoryList">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Add New Category</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <form id="eCommerceCategoryListForm">
      <div class="mb-3">
        <label for="categoryTitle" class="form-label">Category Title</label>
        <input type="text" class="form-control" id="categoryTitle" name="categoryTitle" required>
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" required>
        <small class="text-muted">The slug will be automatically generated from the title. Example: "Home & Garden" → "home-garden"</small>
      </div>
      <button type="submit" class="btn btn-primary">Save Category</button>
    </form>
  </div>
</div>
     
<script>
  document.getElementById('categoryTitle').addEventListener('input', function(e) {
      const title = e.target.value;
      const slug = title.toLowerCase()
          .replace(/[^\w\s-]/g, '') // Remove special characters
          .replace(/\s+/g, '-')     // Replace spaces with hyphens
          .replace(/-+/g, '-');     // Replace multiple hyphens with single hyphen
      
      document.getElementById('slug').value = slug;
  });

 
</script>
     

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

    
   <script src="https://cdn.jsdelivr.net/npm/@algolia/autocomplete-js"></script>>

    
      
     <script src="{{ asset('vendor/libs/pickr/pickr.js') }}"></script>

    <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>

     <script src="{{ asset('vendor/js/menu.js') }}"></script>
    
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/quill/katex.js"></script>
  <script src="../../assets/vendor/libs/quill/quill.js"></script>
  <script src="../../assets/vendor/libs/select2/select2.js"></script>
  <script src="../../assets/vendor/libs/dropzone/dropzone.js"></script>
  <script src="../../assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>
  <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
   <script src="{{ asset('vendor/libs/tagify/tagify.js') }}"></script>

    <!-- Main JS -->
    
      <script src="../../assets/js/main.js"></script>
    

    <!-- Page JS -->
    <script src="../../assets/js/add-product.js"></script>
    

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
            window.location.href = '{{ route("page.product-list") }}';
        });

        // Handle form submission
        $('#updateProductBtn').on('click', function(e) {
            e.preventDefault();
            
            const form = $('#editProductForm');
            const formData = new FormData(form[0]);
            formData.set('_method', 'POST');

            // Validate required fields
            const requiredFields = {
                'name': 'Name',
                'sku': 'SKU',
                'supplier_id': 'Supplier',
                'quantity': 'Quantity',
                'restock_point': 'Restock Point',
                'manufacturing_date': 'Manufacturing Date',
                'expiry_date': 'Expiry Date',
                'removal_date': 'Removal Date',
                'base_price': 'Base price',
                'category_id': 'Category'
            };

            // Validate fields first
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

            // Show confirmation dialog
            Swal.fire({
                ...swalConfig,
                title: 'Confirm Update',
                text: 'Are you sure the details are correct?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'No, cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    Swal.fire({
                        title: 'Updating Product',
                        html: 'Please wait while we update your product...',
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
                                text: 'Product updated successfully!',
                                showConfirmButton: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '{{ route("page.product-list") }}';
                                }
                            });
                        },
                        error: function(xhr) {
                            let errorMessage = 'An error occurred while updating the product.';
                            
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
                }
            });
        });
      });
    </script>
  </body>
</html>

