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
  
<!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/app-ecommerce-category-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:26:17 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
   <link rel="stylesheet" href="/public/vendor/libs/@form-validation/form-validation.css">
  <link rel="stylesheet" href="/public/vendor/libs/quill/typography.css" />
  <link rel="stylesheet" href="/public/vendor/libs/quill/katex.css" />
  <link rel="stylesheet" href="/public/vendor/libs/quill/editor.css" />

    <!-- Page CSS -->
    
  <link rel="stylesheet" href="/public/vendor/pages/app-ecommerce.css">



    <!-- Helpers -->
  <script src="/public/vendor/js/helpers.js"></script>
  
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    
      <script src="/public/assets/js/config.js"></script>
    
  <style>
    /* Make table borders lighter */
    #categoryTable th, #categoryTable td {
      border-color: rgba(0,0,0,0.07) !important;
    }
    #categoryTable {
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
      background: #7367f0 !important;
      color: #fff !important;
      border: 1px solid #7367f0 !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current) {
      background: #f6f6f6 !important;
      border: 1px solid #ddd !important;
      color: #6f6b7d !important;
    }
    /* Hide numbered pagination buttons */
    .dataTables_wrapper .dataTables_paginate .paginate_button:not(.previous):not(.next) {
      display: none;
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
  </style>
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


      

      <!-- Layout container -->
      <div class="layout-page">
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Category List Table -->
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center row">
                  <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Product Category List</h5>
                      <div class="d-flex gap-2">
                        <button id="exportExcel" class="btn btn-primary">
                          <i class="ti tabler-download me-1"></i>Export Excel
                        </button>
                        <button class="btn btn-success" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEcommerceCategoryList" id="eCommerceCategoryListForm">
                          <i class="ti tabler-plus me-1"></i>Add New Category
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-datatable table-responsive">
                <table class="table border-top" id="categoryTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>CATEGORY</th>
                      <th>TOTAL PRODUCTS</th>
                      <th>TOTAL EARNINGS</th>
                      <th>ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody class="text-nowrap">
                    @foreach ($categories as $category)
                    <tr>
                      <td>{{ $category->category_id }}</td>
                      <td>
                        <div class="d-flex flex-column">
                          <h6 class="text-body mb-0" data-search="{{ $category->categoryTitle }}">{{ $category->categoryTitle }}</h6>
                          <small class="text-muted">{{ $category->description ?? 'No description available' }}</small>
                        </div>
                      </td>
                      <td>{{ $category->products_count }}</td>
                      <td>₱{{ number_format($category->total_earnings, 2) }}</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0);" class="text-body edit-category" 
                             data-bs-toggle="modal" 
                             data-bs-target="#editCategoryModal" 
                             data-category-id="{{ $category->category_id }}"
                             data-category-name="{{ $category->categoryTitle }}"
                             data-description="{{ $category->description }}">
                            <i class="ti tabler-edit me-2"></i>
                          </a>
                          <a href="javascript:void(0);" class="text-body delete-category"
                             data-category-id="{{ $category->category_id }}"
                             data-category-name="{{ $category->categoryTitle }}">
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
          </div>
        </div>

                  <form id="deleteCategoryForm" method="POST" action="{{ route('category.delete') }}" style="display: none;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="deleteCategoryId" name="category_id">
                  </form>

                  <!-- Offcanvas for Adding New Category -->
                  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEcommerceCategoryList">
                    <div class="offcanvas-header">
                      <h5 class="offcanvas-title">Add New Category</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" id="offcanvasEcommerceCategoryListClose"></button>
                    </div>
                    <div class="offcanvas-body">
                      <form id="eCommerceCategoryListForm" method="POST" action="{{ route('category.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="categoryTitle" class="form-label">Category Title</label>
                          <input type="text" class="form-control" id="categoryTitle" name="categoryTitle" required>
                        </div>
                        <div class="mb-3">
                          <label for="slug" class="form-label">Slug</label>
                          <input type="text" class="form-control" id="slug" name="slug" required>
                          <small class="text-muted">The slug will be automatically generated from the title.</small>
                        </div>
                        <div class="mb-3">
                          <label for="description" class="form-label">Description</label>
                          <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        {{-- <div class="mb-3">
                          <label for="categoryImage" class="form-label">Category Image</label>
                          <input type="file" class="form-control" id="categoryImage" name="categoryImage" accept="image/*">
                          <div id="imagePreview" class="mt-2" style="max-width: 200px;">
                            <img src="" alt="Preview" style="width: 100%; display: none;">
                          </div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary">Save Category</button>
                      </form>
                    </div>
                  </div>

                  <!-- Edit Category Offcanvas -->
                  <div class="offcanvas offcanvas-end" tabindex="-1" id="editCategoryOffcanvas">
                    <div class="offcanvas-header">
                      <h5 class="offcanvas-title">Edit Category</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" id="editCategoryOffcanvasClose"></button>
                    </div>
                    <div class="offcanvas-body">
                      <form id="editCategoryForm" method="POST" action="{{ route('category.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_category_id" name="category_id">
                        <div class="mb-3">
                          <label for="edit_categoryTitle" class="form-label">Category Title</label>
                          <input type="text" class="form-control" id="edit_categoryTitle" name="categoryTitle" required>
                          <div class="invalid-feedback" id="edit_categoryTitle_error"></div>
                        </div>
                        <div class="mb-3">
                          <label for="edit_description" class="form-label">Description</label>
                          <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
                          <div class="invalid-feedback" id="edit_description_error"></div>
                        </div>
                        <div class="mb-3">
                          <label for="edit_categoryImage" class="form-label">Category Image</label>
                          <input type="file" class="form-control" id="edit_categoryImage" name="categoryImage" accept="image/*">
                          <div id="edit_imagePreview" class="mt-2" style="max-width: 200px;">
                            <img src="" alt="Preview" style="width: 100%; display: none;">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                      </form>
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
                        Developed by
                        <a href="https://intra-code.com/" target="_blank" class="footer-link">Intracode IT Solutions</a>
                      </div>
                    </div>
                  </div>
                </footer>
                <!-- / Footer -->

                <!-- Overlay -->
                <div class="layout-overlay layout-menu-toggle"></div>

                <!-- Drag Target Area To SlideIn Menu On Small Screens -->
                <div class="drag-target"></div>
</div>


<!-- Core JS -->
    
    
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
   <script src="/public/vendor/libs/moment/moment.js"></script>
 <link rel="stylesheet" href="/public/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
  <script src="/public/vendor/libs/select2/select2.js"></script>
  <script src="/public/vendor/libs/@form-validation/popular.js"></script>
     <script src="/public/vendor/libs/@form-validation/bootstrap5.js"></script>
  <script src="/public/vendor/libs/@form-validation/auto-focus.js"></script>
 <script src="/public/vendor/libs/quill/katex.js"></script>
 <script src="/public/vendor/libs/quill/quill.js"></script>

<!-- Add DataTables JS -->
<script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    <!-- Main JS -->
    
      <script src="/public/assets/js/main.js"></script>

    

    <!-- Page JS -->
   


    <script>
      document.getElementById('categoryTitle').addEventListener('input', function(e) {
          const title = e.target.value;
          const slug = title.toLowerCase()
              .replace(/[^\w\s-]/g, '') // Remove special characters
              .replace(/\s+/g, '-')     // Replace spaces with hyphens
              .replace(/-+/g, '-');     // Replace multiple hyphens with single hyphen
          
          document.getElementById('slug').value = slug;
      });
      
      // Handle form submission
      $('#eCommerceCategoryListForm').on('submit', function(e) {
          e.preventDefault();
          const form = $(this);
          const categoryTitle = $('#categoryTitle').val();
          const slug = $('#slug').val();
      
          $.ajax({
              url: form.attr('action'),
              method: 'POST',
              data: {
                  _token: $('input[name="_token"]').val(),
                  categoryTitle: categoryTitle,
                  slug: slug
              },
              success: function(response) {
                  if (response.success) {
                      // Add new row to DataTable
                      dt_category_table.DataTable().ajax.reload();
      
                      // Close offcanvas
                      var offcanvasElement = document.querySelector('#offcanvasEcommerceCategoryList');
                      var offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
                      offcanvas.hide();
      
                      // Reset form
                      form[0].reset();
                      
                      // Show success message
                      alert('Category added successfully!');
                  } else {
                      alert('Error: ' + response.message);
                  }
              },
              error: function(xhr) {
                  alert('Error: ' + xhr.responseJSON.message);
              }
          });
      });
      </script>



<script>
  $(document).ready(function() {
    // SweetAlert default configuration
    const swalConfig = {
      customClass: {
        container: 'swal-container-class',
        popup: 'swal-popup-class',
        confirmButton: 'btn btn-primary me-3',
        cancelButton: 'btn btn-label-secondary'
      },
      buttonsStyling: false,
      backdrop: true,
      allowOutsideClick: false
    };
  
    // Add custom CSS to ensure SweetAlert appears above modal
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
        .modal-backdrop {
          z-index: 1050 !important;
        }
        .modal {
          z-index: 1055 !important;
        }
      `)
      .appendTo('head');
  
    // Handle edit category button clicks
    $('.edit-category').on('click', function() {
      const categoryId = $(this).data('category-id');
      const categoryTitle = $(this).data('category-name');
      const description = $(this).data('description');
      const categoryImage = $(this).data('category-image');
      
      // Set form values directly from data attributes
      $('#edit_category_id').val(categoryId);
      $('#edit_categoryTitle').val(categoryTitle); 
      $('#edit_description').val(description);
      $('#edit_categoryImage').val(''); // Clear the file input

      // Show existing image if available
      if (categoryImage) {
        const imageUrl = categoryImage.startsWith('http') ? categoryImage : `/${categoryImage}`;
        $('#edit_imagePreview img').attr('src', imageUrl).show();
      } else {
        $('#edit_imagePreview img').hide();
      }
      
      // Show edit offcanvas
      const editOffcanvas = new bootstrap.Offcanvas($('#editCategoryOffcanvas'));
      editOffcanvas.show();
    });
  
    // Handle edit form submission
    $('#editCategoryForm').on('submit', function(e) {
      e.preventDefault();
      
      const formData = new FormData(this);
      const editOffcanvas = bootstrap.Offcanvas.getInstance($('#editCategoryOffcanvas'));
      editOffcanvas.hide();
      
      setTimeout(() => {
        Swal.fire({
          ...swalConfig,
          title: 'Confirm Update',  
          text: 'Are you sure you want to update this category?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Yes, update it!',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: $(this).attr('action'),
              method: 'POST', 
              data: formData,
              processData: false,
              contentType: false,
              success: function(response) {
                Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: 'Category updated successfully!'
                }).then(() => {
                  window.location.reload();
                });
              },
              error: function(xhr) {
                editOffcanvas.show();
                Swal.fire({
                  icon: 'error', 
                  title: 'Error',
                  text: xhr.responseJSON?.message || 'Error updating category'
                });
              }
            });
          } else {
            editOffcanvas.show();
          }
        });
      }, 200);
    });
  
    // Handle image preview for edit form
    $('#edit_categoryImage').on('change', function(e) {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          $('#edit_imagePreview img').attr('src', e.target.result).show();
        };
        reader.readAsDataURL(file);
      }
    });
  
    // Reset edit form when offcanvas is closed
    $('#editCategoryOffcanvas').on('hidden.bs.offcanvas', function () {
      $('#editCategoryForm')[0].reset();
      $('#edit_imagePreview img').hide();
    });
  
    // Handle delete category button clicks
    $('.delete-category').on('click', function() {
      const categoryId = $(this).data('category-id');
      const categoryName = $(this).data('category-name');
      const row = $(this).closest('tr');
      
      Swal.fire({
        title: 'Confirm Delete',
        html: `Are you sure you want to delete category <strong>${categoryName}</strong>?<br>This action cannot be undone.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        customClass: {
          confirmButton: 'btn btn-danger me-3',
          cancelButton: 'btn btn-secondary'
        },
        buttonsStyling: false
      }).then((result) => {
        if (result.isConfirmed) {
          // Show loading state
          Swal.fire({
            title: 'Deleting...',
            text: 'Please wait while we delete the category',
            allowOutsideClick: false,
            didOpen: () => {
              Swal.showLoading();
            }
          });

          // Send delete request
          $.ajax({
            url: '{{ route("category.delete") }}',
            type: 'POST',
            data: {
              _token: '{{ csrf_token() }}',
              _method: 'DELETE',
              category_id: categoryId
            },
            success: function(response) {
              // Remove row from table with animation
              row.fadeOut(400, function() {
                row.remove();
                // Show success message
                Swal.fire({
                  icon: 'success',
                  title: 'Deleted!',
                  text: response.message || 'Category has been deleted successfully.',
                  customClass: {
                    confirmButton: 'btn btn-success'
                  },
                  buttonsStyling: false
                });
              });
            },
            error: function(xhr) {
              console.error('Delete error:', xhr);
              
              // Check if this is a constraint error with relatedProductsCount
              if (xhr.responseJSON && xhr.responseJSON.needsForceDelete) {
                Swal.fire({
                  icon: 'warning',
                  title: 'Products Linked',
                  html: xhr.responseJSON.message,
                  showCancelButton: true,
                  showDenyButton: true,
                  confirmButtonText: 'Force Delete',
                  denyButtonText: 'Select Another Category',
                  cancelButtonText: 'Cancel',
                  customClass: {
                    confirmButton: 'btn btn-danger me-2',
                    denyButton: 'btn btn-warning me-2',
                    cancelButton: 'btn btn-secondary'
                  },
                  buttonsStyling: false
                }).then((result) => {
                  if (result.isConfirmed) {
                    // Force delete - products will be moved to another available category
                    $.ajax({
                      url: '{{ route("category.delete") }}',
                      type: 'POST',
                      data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'DELETE',
                        category_id: categoryId,
                        force_delete: 'true'
                      },
                      success: function(response) {
                        row.fadeOut(400, function() {
                          row.remove();
                          Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Category deleted and products reassigned successfully.',
                            customClass: {
                              confirmButton: 'btn btn-success'
                            },
                            buttonsStyling: false
                          });
                        });
                      },
                      error: function(xhr) {
                        Swal.fire({
                          icon: 'error',
                          title: 'Error',
                          text: xhr.responseJSON?.message || 'Error during force deletion',
                          customClass: {
                            confirmButton: 'btn btn-primary'
                          },
                          buttonsStyling: false
                        });
                      }
                    });
                  } else if (result.isDenied) {
                    // Let user select another category first
                    // Get all other categories
                    $.ajax({
                      url: '{{ route("category.getAll") }}',
                      type: 'GET',
                      success: function(categories) {
                        // Filter out the current category
                        const otherCategories = categories.filter(cat => cat.category_id != categoryId);
                        
                        if (otherCategories.length === 0) {
                          Swal.fire({
                            icon: 'error',
                            title: 'No Other Categories',
                            text: 'No other categories available to move products to.',
                            customClass: {
                              confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                          });
                          return;
                        }
                        
                        // Create dropdown HTML for categories
                        let optionsHtml = '';
                        otherCategories.forEach(cat => {
                          optionsHtml += `<option value="${cat.category_id}">${cat.categoryTitle}</option>`;
                        });
                        
                        Swal.fire({
                          title: 'Select Destination Category',
                          html: `
                            <p>Select a category to move the products to:</p>
                            <select id="destination-category" class="form-select">
                              ${optionsHtml}
                            </select>
                          `,
                          showCancelButton: true,
                          confirmButtonText: 'Move & Delete',
                          cancelButtonText: 'Cancel',
                          customClass: {
                            confirmButton: 'btn btn-primary me-3',
                            cancelButton: 'btn btn-secondary'
                          },
                          buttonsStyling: false,
                          preConfirm: () => {
                            return document.getElementById('destination-category').value;
                          }
                        }).then((result) => {
                          if (result.isConfirmed) {
                            const defaultCategoryId = result.value;
                            
                            // Execute force delete with specified default category
                            $.ajax({
                              url: '{{ route("category.delete") }}',
                              type: 'POST',
                              data: {
                                _token: '{{ csrf_token() }}',
                                _method: 'DELETE',
                                category_id: categoryId,
                                force_delete: 'true',
                                default_category_id: defaultCategoryId
                              },
                              success: function(response) {
                                row.fadeOut(400, function() {
                                  row.remove();
                                  Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Category deleted and products moved to selected category.',
                                    customClass: {
                                      confirmButton: 'btn btn-success'
                                    },
                                    buttonsStyling: false
                                  });
                                });
                              },
                              error: function(xhr) {
                                Swal.fire({
                                  icon: 'error',
                                  title: 'Error',
                                  text: xhr.responseJSON?.message || 'Error moving products and deleting category',
                                  customClass: {
                                    confirmButton: 'btn btn-primary'
                                  },
                                  buttonsStyling: false
                                });
                              }
                            });
                          }
                        });
                      },
                      error: function() {
                        Swal.fire({
                          icon: 'error',
                          title: 'Error',
                          text: 'Unable to fetch categories',
                          customClass: {
                            confirmButton: 'btn btn-primary'
                          },
                          buttonsStyling: false
                        });
                      }
                    });
                  }
                });
              } else {
                // Show regular error for other types of errors
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: xhr.responseJSON?.message || 'An error occurred while deleting the category',
                  customClass: {
                    confirmButton: 'btn btn-primary'
                  },
                  buttonsStyling: false
                });
              }
            }
          });
        }
      });
    });
  
    // Display success/error messages
    @if(session('success'))
      Swal.fire({
        ...swalConfig,
        icon: 'success',
        title: 'Success',
        text: "{{ session('success') }}",
        timer: 3000,
        showConfirmButton: false
      });
    @endif
  
    @if(session('error'))
      Swal.fire({
        ...swalConfig,
        icon: 'error',
        title: 'Error',
        text: "{{ session('error') }}",
        timer: 3000,
        showConfirmButton: false
      });
    @endif
  });
  </script>
  
 
  
            
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
  $(document).ready(function() {
    var categoryTable = $('#categoryTable').DataTable({
        responsive: true,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50],
        dom: '<"d-flex justify-content-between align-items-center mx-2 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"table-responsive"t><"d-flex justify-content-end align-items-center mx-2 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6 d-flex justify-content-end"p>>',
        language: {
            search: "",
            searchPlaceholder: "Search Category...",
            lengthMenu: "_MENU_ entries per page",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            paginate: {
                previous: '←',
                next: '→'
            }
        }
    });

    // Excel export button click handler
    $('#exportExcel').on('click', function() {
        // Get the filtered data
        var filteredData = categoryTable.rows({ search: 'applied' }).data();
        
        // Create a new workbook
        var wb = XLSX.utils.book_new();
        
        // Prepare the data for export
        var exportData = [];
        // Add headers
        exportData.push(['ID', 'Category', 'Description', 'Total Products', 'Total Earnings']);
        
        // Add filtered data
        filteredData.each(function(data) {
            // Extract description from the category cell's small tag
            var description = $(data[1]).find('small').text();
            // Extract category name from the h6 tag
            var categoryName = $(data[1]).find('h6').text();
            // Clean up the earnings value by removing ₱ symbol
            var earnings = data[3].replace('₱', '').trim();
            
            exportData.push([
                data[0], // ID
                categoryName, // Category Name
                description, // Description
                data[2], // Total Products
                earnings  // Total Earnings (without ₱ symbol)
            ]);
        });
        
        // Create worksheet
        var ws = XLSX.utils.aoa_to_sheet(exportData);
        
        // Add worksheet to workbook
        XLSX.utils.book_append_sheet(wb, ws, 'Categories');
        
        // Generate Excel file and trigger download
        XLSX.writeFile(wb, 'category_list.xlsx');
    });
  });
</script>

<!-- DataTables core CSS and JS (required for default controls) -->


</body>
</html>


