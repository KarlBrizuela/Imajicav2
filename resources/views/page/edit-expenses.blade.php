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

    <title>Edit Expense - Imajica Booking System</title>

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

    <<link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

   <link rel="stylesheet"  href="{{ asset('vendor/libs/node-waves/node-waves.css') }}"/>
    <link rel="stylesheet" href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet"  href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link  rel="stylesheet"  href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link  rel="stylesheet"  href="{{ asset('vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">

    <!-- endbuild -->

    <link  rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}"  />
  <link rel="stylesheet" href="{{ asset('vendor/libs/dropzone/dropzone.css') }}">

    <!-- Page CSS -->

    <!-- Helpers -->
  <script src="{{ asset('vendor/js/helpers.js') }}"></script>
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
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Sticky Actions -->
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div
                      class="card-header d-flex justify-content-between align-items-center"
                      style="background-color: #0a3622"
                    >
                      <h5 class="card-title mb-0 text-white">
                        Edit Expenses
                      </h5>
                      
                    </div>
                    <div class="card-body pt-4">
                      <!-- Display validation errors if any -->
                      @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif

                      @if(session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                          {{ session('success') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif

                      <!-- Form Start -->
                      <form action="{{ route('expenses.update', $expense->expense_id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row g-3">
                          <div class="col-md-6">
                            <label class="form-label" for="expense_name">Expense Name</label>
                            <input
                              type="text"
                              id="expense_name"
                              name="expense_name"
                              class="form-control @error('expense_name') is-invalid @enderror"
                              placeholder="Expense Name"
                              value="{{ old('expense_name', $expense->expense_name) }}"
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
                                <option value="{{ $category->category_expense_id }}" {{ old('category_expense_id', $expense->category_expense_id) == $category->category_expense_id ? 'selected' : '' }}>
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
                              value="{{ old('date_expense', $expense->date_expense) }}"
                            />
                            @error('date_expense')
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
                              <option value="Paid" {{ old('payment_status', $expense->payment_status) == 'Paid' ? 'selected' : '' }}>Paid</option>
                              <option value="Pending" {{ old('payment_status', $expense->payment_status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                              <option value="Overdue" {{ old('payment_status', $expense->payment_status) == 'Overdue' ? 'selected' : '' }}>Overdue</option>
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
                              value="{{ old('invoice_number', $expense->invoice_number) }}"
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
                            >{{ old('remarks', $expense->remarks) }}</textarea>
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
                                <option value="{{ $branch->branch_code }}" {{ old('branch_code', $expense->branch_code) == $branch->branch_code ? 'selected' : '' }}>
                                  {{ $branch->branch_name }}
                                </option>
                              @endforeach
                            </select>
                            @error('branch_code')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="d-flex gap-3 mt-4">
                          <button type="submit" class="btn btn-primary">Update Expense</button>
                          <a href="{{ route('expenses.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                      </form>
                      <!-- Form End -->
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

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
    <script src="{{ asset('vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('vendor/libs/pickr/pickr.js') }}"></script>

    <!-- Main JS -->

    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/form-layouts.js"></script>
    <script src="../../assets/js/forms-pickers.js"></script>

    <script src="{{ asset('vendor/libs/dropzone/dropzone.js') }}"></script>

    <script src="../../assets/js/forms-file-upload.js"></script>
    
    <!-- Custom script for flatpickr initialization and SweetAlert -->
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
        
        // Handle form submission with confirmation
        $('form').on('submit', function(e) {
          e.preventDefault();
          
          Swal.fire({
            ...swalConfig,
            title: 'Confirm Update',
            text: 'Are you sure you want to update this expense?',
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
            }
          });
        });

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
        
        // Initialize select2
        $('.select2').select2();
      });
    </script>
  </body>
</html>
