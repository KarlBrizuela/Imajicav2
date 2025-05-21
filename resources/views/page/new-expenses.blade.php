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
    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/flatpickr/flatpickr.css"
    />
    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css"
    />
    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/jquery-timepicker/jquery-timepicker.css"
    />

    <!-- endbuild -->

    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/select2/select2.css"
    />
    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/dropzone/dropzone.css"
    />
    <!-- Page CSS -->

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

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->


          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Sticky Actions -->
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div
                      class="card-header d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row"
                      style="background-color: #0a3622"
                    >
                      <h5 class="card-title mb-sm-0 me-2 text-white">
                        Expense Management
                      </h5>
                    </div>
                    <div class="card-body pt-6">
                      <div class="row">
                        <div class="col-lg-8 mx-auto">
                          <!-- Display validation errors if any -->
                          @if ($errors->any())
                            <div class="alert alert-danger">
                              <ul>
                                @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                @endforeach
                              </ul>
                            </div>
                          @endif

                          <!-- Form Start -->
                          <form action="{{ route('expenses.store') }}" method="POST">
                            @csrf
                            <div class="row g-6">
                              <div class="col-md-6">
                                <label class="form-label" for="expense_name">Expense Name</label>
                                <input
                                  type="text"
                                  id="expense_name"
                                  name="expense_name"
                                  class="form-control @error('expense_name') is-invalid @enderror"
                                  placeholder="Expense Name"
                                  value="{{ old('expense_name') }}"
                                />
                                @error('expense_name')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>

                              <div class="col-md-6">
                                <label class="form-label">Expense Category</label>
                                <select
                                  name="category_expense_id"
                                  class="select2 form-select @error('category_expense_id') is-invalid @enderror"
                                  data-allow-clear="true"
                                >
                                  <option value="">Select Expense Category</option>
                                  @foreach($categories as $category)
                                    <option value="{{ $category->category_expense_id }}" {{ old('category_expense_id') == $category->category_expense_id ? 'selected' : '' }}>
                                      {{ $category->name }}
                                    </option>
                                  @endforeach
                                </select>
                                @error('category_expense_id')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>

                              <div class="col-md-12">
                                <label for="date_expense" class="form-label">Date of Expense</label>
                                <input
                                  type="text"
                                  name="date_expense"
                                  class="form-control @error('date_expense') is-invalid @enderror"
                                  placeholder="YYYY-MM-DD"
                                  id="flatpickr-date"
                                  value="{{ old('date_expense') }}"
                                />
                                @error('date_expense')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="expense_name">Expense Cost</label>
                                <input
                                  type="text"
                                  id="expense_cost"
                                  name="expense_cost"
                                  class="form-control @error('expense_cost') is-invalid @enderror"
                                  placeholder="Expense Cost"
                                  value="{{ old('expense_cost') }}"
                                />
                                @error('expense_cost')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>

                              <div class="col-md-6">
                                <label class="form-label">Payment Status</label>
                                <select
                                  name="payment_status"
                                  class="select2 form-select @error('payment_status') is-invalid @enderror"
                                  data-allow-clear="true"
                                >
                                  <option value="">Select Payment Status</option>
                                  <option value="Paid" {{ old('payment_status') == 'Paid' ? 'selected' : '' }}>Paid</option>
                                  <option value="Pending" {{ old('payment_status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                  <option value="Overdue" {{ old('payment_status') == 'Overdue' ? 'selected' : '' }}>Overdue</option>
                                </select>
                                @error('payment_status')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="invoice_number">Receipt / Invoice Number</label>
                                <input
                                  type="text"
                                  id="invoice_number"
                                  name="invoice_number"
                                  class="form-control @error('invoice_number') is-invalid @enderror"
                                  placeholder="Receipt / Invoice Number"
                                  value="{{ old('invoice_number') }}"
                                />
                                @error('invoice_number')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>

                              <div class="col-12">
                                <label class="form-label" for="remarks">Remarks</label>
                                <textarea
                                  name="remarks"
                                  class="form-control @error('remarks') is-invalid @enderror"
                                  id="remarks"
                                  rows="4"
                                  placeholder="Remarks"
                                >{{ old('remarks') }}</textarea>
                                @error('remarks')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>

                              <div class="col-md-12">
                                <label class="form-label">Branch</label>
                                <select
                                  name="branch_code"
                                  class="select2 form-select @error('branch_code') is-invalid @enderror"
                                  data-allow-clear="true"
                                >
                                  <option value="">Select Branch</option>
                                  @foreach($branches as $branch)
                                    <option value="{{ $branch->branch_code }}" {{ old('branch_code') == $branch->branch_code ? 'selected' : '' }}>
                                      {{ $branch->branch_name }}
                                    </option>
                                  @endforeach
                                </select>
                                @error('branch_code')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>

                            <br />
                            <div class="col-sm-2 col-4 d-grid">
                              <button type="submit" class="btn btn-primary">Add Expense</button>
                            </div>
                          </form>
                          <!-- Form End -->

                          <br />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Sticky Actions -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column"
                >
                  <div class="text-body">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    Developed by
                    <a
                      href="https://intra-code.com/"
                      target="_blank"
                      class="footer-link"
                      >Intracode IT Solutions</a
                    >
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

    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>

    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
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

    <script src="../../assets/vendor/libs/moment/moment.js"></script>
    <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="../../assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="../../assets/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
    <script src="../../assets/vendor/libs/pickr/pickr.js"></script>

    <!-- Main JS -->

    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/form-layouts.js"></script>
    <script src="../../assets/js/forms-pickers.js"></script>

    <script src="../../assets/vendor/libs/dropzone/dropzone.js"></script>
    <script src="../../assets/js/forms-file-upload.js"></script>

    <!-- Custom script for flatpickr initialization -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Initialize flatpickr for date input with single date format
        if (document.getElementById('flatpickr-date')) {
          flatpickr('#flatpickr-date', {
            dateFormat: 'Y-m-d',
            altInput: true,
            altFormat: 'F j, Y',
            enableTime: false,
            mode: 'single' // Ensure single date selection
          });
        }
      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            `)
            .appendTo('head');

        // Handle form submission
        $('form').on('submit', function(e) {
            e.preventDefault();

            // Form validation
            let isValid = true;
            const requiredFields = [
                'expense_name',
                'category_expense_id',
                'date_expense',
                'payment_status',
                'branch_code'
            ];

            requiredFields.forEach(field => {
                if (!$(`[name="${field}"]`).val()) {
                    isValid = false;
                    $(`[name="${field}"]`).addClass('is-invalid');
                } else {
                    $(`[name="${field}"]`).removeClass('is-invalid');
                }
            });

            if (!isValid) {
                Swal.fire({
                    ...swalConfig,
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please fill in all required fields',
                    showConfirmButton: true
                });
                return false;
            }

            // Show confirmation dialog
            Swal.fire({
                ...swalConfig,
                title: 'Confirm Submission',
                text: 'Are you sure you want to add this expense?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, add it!',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#0a3622',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    Swal.fire({
                        ...swalConfig,
                        title: 'Processing...',
                        text: 'Adding new expense',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Submit the form
                    this.submit();
                }
            });
        });

        // Display success/error messages from session
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

        // Display validation errors if any
        @if($errors->any())
            let errorMessage = '';
            @foreach($errors->all() as $error)
                errorMessage += "- {{ $error }}<br>";
            @endforeach

            Swal.fire({
                ...swalConfig,
                icon: 'error',
                title: 'Validation Error',
                html: errorMessage,
                timer: 5000,
                showConfirmButton: true
            });
        @endif
    });
    </script>
  </body>

  <!-- Mirrored from demos.pixinvent.com/vuexy-html-admin-template/html/vertical-menu-template/form-layouts-sticky.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2025 08:27:42 GMT -->
</html>

<!-- beautify ignore:end -->
