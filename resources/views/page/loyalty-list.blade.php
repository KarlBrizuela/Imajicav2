@extends('layouts.app')


<!DOCTYPE html>

<html
  lang="en"
  class="layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-skin="default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template"
  data-bs-theme="light"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Imajica Booking System</title>

    <meta name="description" content="Imajica Booking System" />

    <meta name="keywords" content="Imajica Booking System" />
    <meta property="og:title" content="Imajica Booking System" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="Imajica Booking System" />
    <meta
      property="og:image"
      content="../../../../pixinvent.com/wp-content/uploads/2023/06/vuexy-hero-image.png"
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

    <link rel="stylesheet" href="../../assets/vendor/fonts/iconify-icons.css" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/node-waves/node-waves.css"
    />

    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/pickr/pickr-themes.css"
    />

    <link rel="stylesheet" href="../../assets/vendor/css/core.css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->

    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"
    />

    <!-- endbuild -->

    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/select2/select2.css"
    />

    <!-- Page CSS -->

    <!-- endbuild -->

    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css"
    />
    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css"
    />
    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css"
    />
    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/flatpickr/flatpickr.css"
    />
    <!-- Row Group CSS -->
    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css"
    />
    <!-- Form Validation -->
    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/%40form-validation/form-validation.css"
    />

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="../../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        @include('components.sidebar')
        <!-- / Menu -->

        <div class="menu-mobile-toggler d-xl-none rounded-1">
          <a
            href="javascript:void(0);"
            class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1"
          >
            <i class="ti tabler-menu icon-base"></i>
            <i class="ti tabler-chevron-right icon-base"></i>
          </a>
        </div>
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
{{-- 


          <!-- / Navbar --> --}}

          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card">
                <div class="d-flex justify-content-between align-items-center p-3">
                  <h5 class="card-title mb-0">Loyalty Tiers</h5>
                  <a href="{{ route('page.loyalty-list') }}" class="btn btn-primary">
                    <i class="ti tabler-plus me-1"></i> Add New Tier
                  </a>
                </div>

                <!-- Table -->
                <div class="table-responsive text-nowrap px-3">
                  <table id="servicesTable" class="table table-striped">
                    <thead class="table-light">
                      <tr>
                        <th>Loyalty Points Name</th>
                        <th>Points Required to Achieve Tier</th>
                        <th>Points Required to Redeem</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($tiers as $tier)
                        <tr>
                          <td>{{ $tier->tier_name }}</td>
                          <td>{{ $tier->points_required }}</td>
                          <td>{{ $tier->points_to_redeem }}</td>
                          <td>
                            <div class="d-flex gap-2">
                              <a href="{{ route('tier.edit', ['patient_tier_id' => $tier->patient_tier_id]) }}" class="btn btn-info btn-sm">
                                <i class="ti tabler-edit me-1"></i>Edit
                              </a>
                              <button type="button" class="btn btn-danger btn-sm delete-tier" 
                                data-tier-id="{{ $tier->patient_tier_id }}"
                                data-tier-name="{{ $tier->tier_name }}">
                                <i class="ti tabler-trash me-1"></i>Delete
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

    <!-- Edit Tier Modal -->
    <div class="modal fade" id="editTierModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #0a3622">
            <h5 class="modal-title text-white">Edit Loyalty Tier</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editTierForm" method="POST" action="{{ route('tier.update') }}">
              @csrf
              @method('PUT')
              <input type="hidden" id="edit_tier_id" name="patient_tier_id">
              <div class="mb-3">
                <label class="form-label" for="edit_tier_name">Loyalty Name</label>
                <input type="text" id="edit_tier_name" name="tier_name" class="form-control" required>
                <div class="invalid-feedback" id="edit_tier_name_error"></div>
              </div>
              <div class="row g-2">
                <div class="col mb-3">
                  <label class="form-label" for="edit_points_required">Points Required</label>
                  <input type="number" id="edit_points_required" name="points_required" class="form-control" required>
                  <div class="invalid-feedback" id="edit_points_required_error"></div>
                </div>
                <div class="col mb-3">
                  <label class="form-label" for="edit_points_to_redeem">Points to Redeem</label>
                  <input type="number" id="edit_points_to_redeem" name="points_to_redeem" class="form-control" required>
                  <div class="invalid-feedback" id="edit_points_to_redeem_error"></div>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="edit_tier_lenght">Tier Length</label>
                <input type="text" id="edit_tier_lenght" name="tier_lenght" class="form-control" required>
                <div class="invalid-feedback" id="edit_tier_lenght_error"></div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="edit_remarks">Remarks</label>
                <textarea id="edit_remarks" name="remarks" class="form-control" rows="3"></textarea>
                <div class="invalid-feedback" id="edit_remarks_error"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update Tier</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete Tier Form (Hidden) -->
    <form id="deleteTierForm" method="POST" action="{{ route('tier.delete') }}" style="display: none;">
      @csrf
      @method('DELETE')
      <input type="hidden" id="delete_tier_id" name="patient_tier_id">
    </form>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/theme.js -->
    
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    
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
            timer: 3000,
            showConfirmButton: false
          });
        @endif

        // Display validation errors if any
        @if($errors->any())
          Swal.fire({
            ...swalConfig,
            icon: 'error',
            title: 'Validation Error',
            text: 'Please check the form for errors',
            timer: 3000,
            showConfirmButton: false
          });
        @endif

        // Handle edit tier button clicks
        $('.edit-tier').on('click', function() {
          const tierId = $(this).data('tier-id');
          const tierName = $(this).data('tier-name');
          const pointsRequired = $(this).data('points-required');
          const pointsToRedeem = $(this).data('points-to-redeem');
          const tierLength = $(this).data('tier-length');
          const remarks = $(this).data('remarks');
          
          // Populate the form fields
          $('#edit_tier_id').val(tierId);
          $('#edit_tier_name').val(tierName);
          $('#edit_points_required').val(pointsRequired);
          $('#edit_points_to_redeem').val(pointsToRedeem);
          $('#edit_tier_lenght').val(tierLength);
          $('#edit_remarks').val(remarks);
          
          // Show the modal
          $('#editTierModal').modal('show');
        });

        // Handle form submission with confirmation
        $('#editTierForm').on('submit', function(e) {
          e.preventDefault();
          
          // Hide the modal before showing SweetAlert
          $('#editTierModal').modal('hide');
          
          setTimeout(() => {
            Swal.fire({
              ...swalConfig,
              title: 'Confirm Update',
              text: 'Are you sure you want to update this loyalty tier?',
              icon: 'question',
              showCancelButton: true,
              confirmButtonText: 'Yes, update it!',
              cancelButtonText: 'Cancel',
              confirmButtonColor: '#0a3622',
              cancelButtonColor: '#d33'
            }).then((result) => {
              if (result.isConfirmed) {
                // Submit the form normally
                this.submit();
              } else {
                // If canceled, show the modal again
                $('#editTierModal').modal('show');
              }
            });
          }, 200); // Small delay to ensure modal is fully hidden
        });

        // Delete tier functionality
        $('.delete-tier').on('click', function() {
          const tierId = $(this).data('tier-id');
          const tierName = $(this).data('tier-name');
          
          // Set the tier ID in the hidden delete form
          $('#delete_tier_id').val(tierId);
          
          // Show delete confirmation
          Swal.fire({
            ...swalConfig,
            title: 'Confirm Delete',
            html: `Are you sure you want to delete tier <strong>${tierName}</strong>?<br>This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d'
          }).then((result) => {
            if (result.isConfirmed) {
              // Submit the delete form
              $('#deleteTierForm').submit();
            }
          });
        });
        
        // DataTable initialization
        var table = $("#servicesTable").DataTable();

        // Filter by branch
        $("#branchFilter").on("change", function () {
          var selectedBranch = $(this).val();
          table.column(0).search(selectedBranch).draw();
        });
      });
    </script>

    <!-- Other scripts -->
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/%40algolia/autocomplete-js.js"></script>
    <script src="../../assets/vendor/libs/pickr/pickr.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/cleave-zen/cleave-zen.js"></script>
    <script src="../../assets/vendor/libs/select2/select2.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>
    <!-- Page JS -->
    <script src="../../assets/js/form-layouts.js"></script>
    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <!-- Flat Picker -->
    <script src="../../assets/vendor/libs/moment/moment.js"></script>
    <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <!-- Form Validation -->
    <script src="../../assets/vendor/libs/%40form-validation/popular.js"></script>
    <script src="../../assets/vendor/libs/%40form-validation/bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/%40form-validation/auto-focus.js"></script>
  </body>
</html>
