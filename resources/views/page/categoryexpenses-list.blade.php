@extends('layouts.app')

<!DOCTYPE html>

<html
  lang="en"
  class="layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-skin="default"
  data-assets-path="{{ asset('assets/') }}"
  data-template="vertical-menu-template"
  data-bs-theme="light"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Imajica Booking System</title>

    <meta name="description" content="Imajica Booking System" />

    <meta name="keywords" content="Imajica Booking System" />
    <meta property="og:title" content="Imajica Booking System" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="Imajica Booking System" />
    <meta
      property="og:image"
      content="{{ asset('assets/img/vuexy-hero-image.png') }}"
    />
    <meta property="og:description" content="Imajica Booking System." />
    <meta property="og:site_name" content="Pixinvent" />
    <link rel="canonical" href="Imajica Booking System" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset(path:'logo/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet"  href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />
    <link  rel="stylesheet"  href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
   <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"/>

    <!-- endbuild -->

    <link  rel="stylesheet"  href="{{ asset('vendor/libs/select2/select2.css') }}" />

    <!-- Page CSS -->

    <!-- endbuild -->

    <link  rel="stylesheet"  href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet"  href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link  rel="stylesheet"  href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}"  />
    <!-- Row Group CSS -->
    <link rel="stylesheet"  href="{{ asset('vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />
    <!-- Form Validation -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/%40form-validation/form-validation.css') }}"/>

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="{{ asset('assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('components.sidebar')

        <div class="menu-mobile-toggler d-xl-none rounded-1">
          <a
            href="javascript:void(0);"
            class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1"
          >
            <i class="ti tabler-menu icon-base"></i>
            <i class="ti tabler-chevron-right icon-base"></i>
          </a>
        </div>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">


          <!-- / Navbar -->

          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card">
                <!-- Table Header with Search -->
                <div class="d-flex justify-content-between align-items-center p-3">
                  <h5 class="card-title mb-0">Category Expenses List</h5>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                    <i class="ti tabler-plus me-1"></i> Add New Category
                  </button>
                </div>

                <!-- Success/Error Messages -->
                <div id="responseMessage" style="display: none;" class="alert mx-3 mt-0 mb-3"></div>

                <!-- Table -->
                <div class="table-responsive text-nowrap px-3">
                  <table class="table table-striped" id="categoryTable">
                    <thead class="table-light">
                      <tr>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $category)
                        <tr>
                          <td>{{ $category->name }}</td>
                          <td>{{ $category->description }}</td>
                          <td class="text-center">
                            <div class="d-flex gap-2 justify-content-center">
                              <a href="{{ route('category_expense.edit', $category->category_expense_id) }}" class="btn btn-sm btn-info">
                                <i class="ti tabler-edit me-1"></i> Edit
                              </a>
                              <button class="btn btn-sm btn-danger delete-category" 
                                data-category-id="{{ $category->category_expense_id }}"
                                data-category-name="{{ $category->name }}">
                                <i class="ti tabler-trash me-1"></i> Delete
                              </button>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <br />
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Delete Category Form -->
    <form id="deleteCategoryForm" method="POST" style="display: none;">
      @csrf
      @method('DELETE')
      <input type="hidden" id="delete_category_id" name="category_expense_id">
    </form>

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
    <script src="{{ asset('vendor/libs/cleave-zen/cleave-zen.js') }}"></script>
    <script src="{{ asset('vendor/libs/select2/select2.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <!-- Flat Picker -->
    <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <!-- Form Validation -->
    <script src="{{ asset('vendor/libs/%40form-validation/popular.js') }}"></script>
    <script src="{{ asset('vendor/libs/%40form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/libs/%40form-validation/auto-focus.js') }}"></script>
    
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Filter Branch Script -->
    <script>
      $(document).ready(function() {
        $('#branchFilter').change(function() {
          var branchCode = $(this).val();
          window.location.href = '/coupon-list' + branchCode;
        });
      });
    </script>
    
 
    
    <!-- Custom Script for Category Management -->
    <script>
      $(document).ready(function() {
        // SweetAlert default configuration to appear above the modal
        const swalConfig = {
          customClass: {
            container: 'swal-container-class',
            popup: 'swal-popup-class'
          },
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
            timer: 5000,
            showConfirmButton: true
          });
        @endif

        // Check for SweetAlert2 library
        if (typeof Swal === 'undefined') {
          console.error('SweetAlert2 library is missing even though it was included in the page');
          alert('SweetAlert2 library failed to load properly. Please check your internet connection.');
        } else {
          console.log("SweetAlert2 is correctly loaded");
        }

        // Debug information
        console.log("Document ready triggered");
        console.log("Delete category buttons found:", $('.delete-category').length);

        // Handle delete category button clicks
        $('.delete-category').on('click', function() {
          try {
            const categoryId = $(this).data('category-id');
            const categoryName = $(this).data('category-name');
            
            console.log("Delete button clicked for category:", categoryId);
            console.log("Button data attributes:", { categoryId, categoryName });
            
            if (!categoryId) {
              throw new Error("Category ID not found in data attributes");
            }
            
            // Set the category ID in the hidden delete form
            $('#delete_category_id').val(categoryId);
            
            // Set the form action dynamically with the category ID
            $('#deleteCategoryForm').attr('action', `/category_expense/delete/${categoryId}`);
            
            console.log("Delete form category_id set to:", $('#delete_category_id').val());
            console.log("Delete form action set to:", $('#deleteCategoryForm').attr('action'));
            
            // Show delete confirmation
            Swal.fire({
              ...swalConfig,
              title: 'Confirm Delete',
              html: `Are you sure you want to delete category <strong>${categoryName}</strong>?<br>This action cannot be undone.`,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'Cancel',
              confirmButtonColor: '#d33',
              cancelButtonColor: '#6c757d'
            }).then((result) => {
              if (result.isConfirmed) {
                // Submit the delete form
                try {
                  console.log("Submitting delete form for category ID:", categoryId);
                  console.log("Delete form action:", $('#deleteCategoryForm').attr('action'));
                  console.log("Delete form method:", $('#deleteCategoryForm').attr('method'));
                  $('#deleteCategoryForm').submit();
                } catch (e) {
                  console.error("Error submitting delete form:", e);
                  Swal.fire({
                    ...swalConfig,
                    icon: 'error',
                    title: 'Delete Error',
                    html: 'Error submitting delete form:<br>' + e.message +
                          '<br>Form action: ' + $('#deleteCategoryForm').attr('action'),
                    showConfirmButton: true
                  });
                }
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
        
        // Verify that SweetAlert2 is loaded
        if (typeof Swal !== 'undefined') {
          console.log("SweetAlert2 is loaded correctly");
        }
      });
    </script>


<script>
  $(document).ready(function() {
    var table = $('#categoryTable').DataTable({
      responsive: true,
      searching: true,
      lengthChange: true,
      info: true
    });
  });
</script>

  </body>
</html>
