@extends('layouts.app')


<!DOCTYPE html>

<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default"
  data-assets-path="../../assets/" data-template="vertical-menu-template" data-bs-theme="light">

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
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- Core CSS -->
  <!-- build:css assets/vendor/css/theme.css  -->
   <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.js') }}" />
   <link rel="stylesheet" href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />
  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  <!-- endbuild -->
 <link rel="stylesheet" href="{{ asset('vendor/libs/fullcalendar/fullcalendar.css') }}">
 <link rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}" />
 <link rel="stylesheet" href="{{ asset('vendor/libs/select2/select2.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/quill/editor.css') }}" />
 <link rel="stylesheet" href="{{ asset('vendor/libs/@form-validation/form-validation.css') }}" />
 <link rel="stylesheet" href="{{ asset('vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
  <!-- Page CSS -->
 <link rel="stylesheet" href="{{ asset('vendor/css/pages/app-calendar.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/booking-view.css') }}" />>
  <!-- Helpers -->
  <script src="{{ asset('vendor/js/helpers.js') }}"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
   <script src="{{ asset('assets/js/config.js') }}"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css">
  <style>
    /* Add these to your existing styles */
    .table-responsive {
      margin: 15px 0;
    }
    
    .badge {
      padding: 0.5em 0.75em;
    }
    
    .btn-sm {
      padding: 0.25rem 0.5rem;
      font-size: 0.75rem;
    }
    
    .table td, .table th {
      vertical-align: middle;
    }

    /* Add to your existing styles */
    .form-select {
        padding: 0.4375rem 2rem 0.4375rem 0.875rem;
        font-size: 0.9375rem;
        border-radius: 0.375rem;
        border: 1px solid #d9dee3;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-select:focus {
        border-color: #696cff;
        box-shadow: 0 0 0.25rem rgba(105, 108, 255, 0.1);
    }

    .form-label {
        font-size: 0.9375rem;
        font-weight: 500;
        color: #566a7f;
    }

    /* Action Buttons Styling */
    .btn-icon.btn-sm {
      width: 30px;
      height: 30px;
      padding: 0;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 0.375rem;
    }
    
    .btn-icon.btn-sm i {
      font-size: 1rem;
    }
    
    .booking-actions .btn {
      transition: all 0.2s;
    }
    
    .booking-actions .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 3px 5px rgba(0,0,0,0.1);
    }
    
    .d-flex.gap-2 {
      column-gap: 0.375rem !important;
    }
    
    /* Status badge colors */
    .bg-label-success {
      background-color: rgba(40, 199, 111, 0.16) !important;
      color: #28c76f !important;
    }

    .bg-label-warning {
      background-color: rgba(255, 171, 0, 0.16) !important;
      color: #ffab00 !important;
    }

    .bg-label-danger {
      background-color: rgba(255, 62, 29, 0.16) !important;
      color: #ff3e1d !important;
    }

    .bg-label-info {
      background-color: rgba(3, 195, 236, 0.16) !important;
      color: #03c3ec !important;
    }

    .bg-label-secondary {
      background-color: rgba(108, 117, 125, 0.16) !important;
      color: #6c757d !important;
    }

    .bg-label-primary {
      background-color: rgba(105, 108, 255, 0.16) !important;
      color: #696cff !important;
    }

    /* Quick Note Form Styling - REMOVED AS PER CLIENT REQUEST */
    /* 
    .swal2-popup {
      width: 32em !important;
    }

    #quickNoteForm .form-label {
      color: #566a7f;
      font-weight: 500;
      font-size: 0.9375rem;
      margin-bottom: 0.5rem;
    }

    #quickNoteForm .form-control,
    #quickNoteForm .form-select {
      padding: 0.4375rem 0.875rem;
      font-size: 0.9375rem;
      border-radius: 0.375rem;
      border: 1px solid #d9dee3;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    #quickNoteForm .form-control:focus,
    #quickNoteForm .form-select:focus {
      border-color: #696cff;
      box-shadow: 0 0 0.25rem rgba(105, 108, 255, 0.1);
    }

    #quickNoteForm textarea {
      resize: vertical;
      min-height: 80px;
    }

    .swal2-styled.swal2-confirm {
      background-color: #696cff !important;
    }

    .swal2-styled.swal2-cancel {
      background-color: #8592a3 !important;
    }

    /* Add this CSS for Quick Note Popup */
    .swal2-popup.quick-note-popup {
      width: 24em !important;
      padding: 1rem;
    }

    .quick-note-form {
      text-align: left;
    }

    .quick-note-form .form-group {
      margin-bottom: 0.75rem;
    }

    .quick-note-form .form-label {
      font-size: 0.8125rem;
      margin-bottom: 0.25rem;
      color: #566a7f;
    }

    .quick-note-form .form-control {
      font-size: 0.8125rem;
      padding: 0.3rem 0.5rem;
      line-height: 1.4;
      min-height: auto;
    }

    .quick-note-form textarea.form-control {
      min-height: 60px;
      resize: vertical;
    }

    .quick-note-form .form-text {
      font-size: 0.75rem;
      margin-top: 0.25rem;
    }

    .swal2-actions.quick-note-actions {
      margin-top: 0.75rem;
    }

    .swal2-actions.quick-note-actions button {
      font-size: 0.8125rem;
      padding: 0.3rem 0.75rem;
    }
    

    /* Add this to your existing styles section */
   

    .quick-note-input {
      border: none !important;
      padding: 8px 0 !important;
      font-size: 14px !important;
      box-shadow: none !important;
    }

    .quick-note-input:focus {
      outline: none !important;
    }

    .quick-note-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 8px 15px;
      border-top: 1px solid #eee;
    }

    .quick-note-epic {
      color: #6563ff !important;
      font-size: 13px;
      text-decoration: none !important;
    }

    .quick-note-create {
      background-color: #eee !important;
      color: #666 !important;
      font-size: 13px !important;
      padding: 4px 12px !important;
    }

    .quick-note-create:hover {
      background-color: #e0e0e0 !important;
    }
    */

    /* Welcome Badge Animation */
    .welcome-badge {
      display: inline-block;
      padding: 0.25rem 0.5rem;
      font-size: 0.75rem;
      font-weight: 600;
      line-height: 1;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      border-radius: 0.25rem;
      color: #fff;
      background-color: #3e97ff;
      box-shadow: 0 2px 4px rgba(62, 151, 255, 0.3);
      animation: welcomePulse 2s infinite;
    }
    
    @keyframes welcomePulse {
      0% {
        transform: scale(1);
        opacity: 1;
      }
      50% {
        transform: scale(1.05);
        opacity: 0.9;
      }
      100% {
        transform: scale(1);
        opacity: 1;
      }
    }

    /* Add these styles to match dashboard design */
    .booking-table {
      --bs-table-hover-bg: rgba(105, 108, 255, 0.04);
    }

    .booking-row {
      vertical-align: middle;
      transition: all 0.3s ease;
    }

    .booking-row:hover {
      transform: translateX(5px);
    }

    .badge {
      padding: 0.5em 0.9em;
      font-weight: 500;
    }

    .table-light {
      --bs-table-bg: rgba(105, 108, 255, 0.04);
    }

    .card-header {
      border-bottom: 1px solid rgba(105, 108, 255, 0.1);
    }

    /* Status badge colors */
    .bg-label-success {
      background-color: rgba(40, 199, 111, 0.16) !important;
      color: #28c76f !important;
    }

    .bg-label-warning {
      background-color: rgba(255, 171, 0, 0.16) !important;
      color: #ffab00 !important;
    }

    .bg-label-danger {
      background-color: rgba(255, 62, 29, 0.16) !important;
      color: #ff3e1d !important;
    }

    .bg-label-info {
      background-color: rgba(3, 195, 236, 0.16) !important;
      color: #03c3ec !important;
    }

    .bg-label-secondary {
      background-color: rgba(108, 117, 125, 0.16) !important;
      color: #6c757d !important;
    }

    .bg-label-primary {
      background-color: rgba(105, 108, 255, 0.16) !important;
      color: #696cff !important;
    }

    /* DataTables styling */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      padding: 0.5em 0.75em;
      margin-left: 2px;
      cursor: pointer;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      background: #696cff !important;
      color: white !important;
      border: 1px solid #696cff !important;
      border-radius: 0.25rem;
    }

    /* DataTables styling */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      padding: 0.5em 0.75em;
      margin-left: 2px;
      cursor: pointer;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      background: #696cff !important;
      color: white !important;
      border: 1px solid #696cff !important;
      border-radius: 0.25rem;
    }
    
    /* Date column styling */
    .date-column {
      min-width: 160px !important;
      max-width: 200px !important;
      width: 180px !important;
    }
    
    /* Hide the duplicate date column */
    #booking-datatable .date-column + .date-column {
      display: none !important;
    }
    
    /* Hide the second date column - more general selector as backup */
    .date-column + .date-column {
      display: none !important;
    }
    
    .date-display {
      font-size: 0.875rem;
      white-space: nowrap;
      display: block;
      margin-bottom: 2px;
    }
    
    
    .time-display {
      font-size: 0.75rem;
      white-space: nowrap;
      display: block;
      line-height: 1.3;
    }

    /* Calendar tooltip styling */
    .calendar-tooltip {
      padding: 5px;
      text-align: left;
    }
    
    .tooltip-title {
      font-weight: 600;
      margin-bottom: 3px;
    }
    
    .tooltip-datetime {
      font-size: 12px;
      color: #666;
      margin-bottom: 5px;
    }
    
    /* Flatpickr improvements */
    .flatpickr-calendar {
      z-index: 1999 !important;
    }
    
    .flatpickr-calendar.open {
      display: inline-block !important;
    }

    .search-box {
      position: relative;
    }
    .search-box .search-icon {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: #b0b0b0;
      pointer-events: none;
    }
    #bookingSearch {
      padding-right: 2.2rem;
    }

    .dataTables_filter {
      display: none !important;
    }
  </style>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <div class="menu-mobile-toggler d-xl-none rounded-1">
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
          <i class="ti tabler-menu icon-base"></i>
          <i class="ti tabler-chevron-right icon-base"></i>
        </a>
      </div>

      <!-- Include sidebar component -->
      @include('components.sidebar')
      
      <!-- Rest of the existing body content -->
      <div class="layout-page">
     
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card app-calendar-wrapper">
              <div class="row g-0">
                <!-- Calendar Sidebar -->
                <div class="col app-calendar-sidebar border-end" id="app-calendar-sidebar">
                  <div class="border-bottom p-6 my-sm-0 mb-4">
                    <button class="btn btn-primary btn-toggle-sidebar w-100" data-bs-toggle="offcanvas" data-bs-target="#addEventSidebar" aria-controls="addEventSidebar">
                      <i class="icon-base ti tabler-plus icon-16px me-2"></i>
                      <span class="align-middle">Create New Booking</span>
                    </button>
                  </div>
                  <div class="px-3 pt-2">
                    <!-- inline calendar (flatpicker) -->
                    <div class="inline-calendar"></div>
                  </div>
                  <hr class="mb-6 mx-n4 mt-3" />
                  <div class="px-6 pb-2">
                    <!-- Filter -->
                    <div>
                      <h5>Legend</h5>
                    </div>
                    <div class="app-calendar-events-filter text-heading">
                      <div class="d-flex align-items-center mb-3">
                        <span style="display:inline-block;width:18px;height:18px;border-radius:50%;background:#ffab00;margin-right:10px;border:2px solid #fff;"></span>
                        <span>Pending</span>
                      </div>
                      <div class="d-flex align-items-center mb-3">
                        <span style="display:inline-block;width:18px;height:18px;border-radius:50%;background:#03c3ec;margin-right:10px;border:2px solid #fff;"></span>
                        <span>Paid</span>
                      </div>
                      <div class="d-flex align-items-center mb-3">
                        <span style="display:inline-block;width:18px;height:18px;border-radius:50%;background:#28c76f;margin-right:10px;border:2px solid #fff;"></span>
                        <span>Completed</span>
                      </div>
                      <div class="d-flex align-items-center mb-3">
                        <span style="display:inline-block;width:18px;height:18px;border-radius:50%;background:#ff3e1d;margin-right:10px;border:2px solid #fff;"></span>
                        <span>Cancelled</span>
                      </div>
                      <div class="d-flex align-items-center mb-3">
                        <span style="display:inline-block;width:18px;height:18px;border-radius:50%;background:#6c757d;margin-right:10px;border:2px solid #fff;"></span>
                        <span>No Show</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Calendar Sidebar -->
                <!-- Calendar & Modal -->
                <div class="col app-calendar-content">
                  <div class="card shadow-none border-0">
                    <div class="card-body pb-0">
                      <!-- FullCalendar -->
                      <div id="calendar"></div>
                    </div>
                  </div>
                  <div class="app-overlay"></div>
                  <!-- FullCalendar Offcanvas -->

                  <!-- Create Booking Sidebar -->
                  <form method='post' 
                        id="addBookingForm"
                        action="{{ route('booking.create')}}" 
                        data-create-route="{{ route('booking.create')}}">
                    @csrf
                    @method('POST')
                    <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1" id="addEventSidebar">
                      <div class="offcanvas-header border-bottom">
                        <h5 class="offcanvas-title">Add Booking</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                        <div class="event-form pt-0">
                          <div class="mb-3">
                            <label class="form-label">Booking Type</label>
                            <div class="btn-group w-100" role="group">
                              <input type="radio" class="btn-check" name="booking_type" id="booking_type_service" value="service" checked autocomplete="off">
                              <label class="btn btn-outline-primary" for="booking_type_service">Service</label>
                              
                              <input type="radio" class="btn-check" name="booking_type" id="booking_type_package" value="package" autocomplete="off">
                              <label class="btn btn-outline-primary" for="booking_type_package">Package</label>
                            </div>
                          </div>

                          <div class="mb-5" id="service_section">
                            <label class="form-label" for="service_id">Select Services</label>
                            <select class="select2 form-select" name="service_id[]" id="service_id" multiple>
                              @foreach ($services as $service)
                              <option value="{{$service->service_id}}"  data-loyalty-pts="{{$service->loyalty_pts}}"    data-service-cost="{{$service->service_cost}}">  {{$service->service_name}} - {{$service->loyalty_pts}}pts - ${{$service->service_cost}} </option>
                              @endforeach
                            </select>
<small id="points_needed_section" class="form-text text-muted">
        Points needed to avail services: <span id="points_needed_display" class="fw-semibold text-success">0</span>
    </small>
    
   
                          </div>

<div class="mb-5" id="package_section" style="display:none;">
    <label class="form-label" for="package_id">Select Package</label>
    <select class="select2 form-select" name="package_id[]" id="package_id" multiple>
        @foreach ($packages as $package)
        <option value="{{$package->package_id}}">{{$package->package_name}}</option>
        @endforeach
    </select>
    <small class="form-text text-muted">Amount needed to avail services: <span id="amount_needed_display_price"></span></small>
</div>
                          
                          <div class="mb-5">
                            <label class="form-label" for="status">Status</label>
                            <select class="select2 form-select" name="status" id="status">
                              <option selected>Pending</option>
                              <option>Paid</option>
                              <option>Cancelled</option>
                              <option>Completed</option>
                              <option>No Show</option>
                            </select>
                          </div>
      <div class="mb-5">
        <label class="form-label" for="payment_amount">Payment Amount</label>
          <div class="input-group">
            <span class="input-group-text">P</span>
            <input type="number" class="form-control" id="payment_amount" name="payment_amount" placeholder="0.00" min="0" step="0.01" readonly>
          </div>
      </div>
                          <div class="mb-5 form-control-validation">
                            <label class="form-label" for="start_date">Start Date and Time</label>
                            <input type="text" class="form-control flatpickr-input" id="start_date" name="start_date" placeholder="YYYY-MM-DD HH:MM" />
                          </div>
                          <div class="mb-5 form-control-validation">
                            <label class="form-label" for="end_date">End Date and Time</label>
                            <input type="text" class="form-control flatpickr-input" id="end_date" name="end_date" placeholder="YYYY-MM-DD HH:MM" />
                          </div>
                          <div class="mb-4">
                            <label for="id" class="form-label">Assigned Staff</label>
                            <select id="id" name="id" class="form-select select2">
                              <option value="">Select a staff member</option>
                              @foreach ($staffs as $staff)
                              <option value="{{ $staff->id }}">{{ $staff->firstname }} {{ $staff->lastname }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="mb-4">
                            <label for="branch_code" class="form-label">Select Branch</label>
                            <select id="branch_code" name="branch_code" class="form-select">
                              @foreach ($branches as $branch)
                              <option value="{{$branch->branch_code}}">{{$branch->branch_name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <!-- Display validation errors with SweetAlert -->
                          @if ($errors->any())
                          <div class="alert alert-danger d-none" id="error-list">
                            <ul>
                              @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>
                          @endif
                          <!-- Patient selection fields in add booking form -->
<div class="mb-4">
    <label for="patient_id" class="form-label">Select Patient</label>
    <select id="patient_id" name="patient_id" class="form-select select2">
        <option value="">Select a patient</option>
        @foreach($patients as $patient)
        <option value="{{ $patient->patient_id }}">{{ $patient->firstname }} {{ $patient->lastname }}</option>
        @endforeach
    </select>
    <!-- Patient information display -->
    <div id="patient_info" class="mt-2 card bg-lighter p-2" style="display: none;">
        <!-- Points (original untouched) -->
        <div class="d-flex justify-content-between">
            <span><i class="bx bx-star me-1"></i> Points:</span>
            <div>
                <span id="patient_points_display" class="fw-semibold text-success"></span>
                <span id="welcome_badge" class="welcome-badge ms-2" style="display: none;">Welcome Bonus!</span>
            </div>
        </div>
        

        <!-- Balance (added below with identical structure) -->
        <div class="d-flex justify-content-between mt-2">
            <span><i class="bx bx-star me-1"></i> Balance:</span>
            <div>
                <span id="patient_balance_display" class="fw-semibold text-success"></span>
            </div>
        </div>
    </div>
</div>
                          <div class="col-xl-12">
                            <label class="form-label">Use Reward Points</label>
                            <div class="row">
                              <div class="col-md mb-md-0 mb-5">
                                <div class="form-check custom-option custom-option-basic">
                                  <label class="form-check-label custom-option-content" for="useRewardYes">
                                    <input name="useReward" class="form-check-input" type="radio" value="1" id="useRewardYes" checked />
                                    <span class="custom-option-header">
                                      <span class="h6 mb-0">Yes</span>
                                    </span>
                                  </label>
                                </div>
                              </div>
                              <div class="col-md">
                                <div class="form-check custom-option custom-option-basic">
                                  <label class="form-check-label custom-option-content" for="useRewardNo">
                                    <input name="useReward" class="form-check-input" type="radio" value="0" id="useRewardNo" />
                                    <span class="custom-option-header">
                                      <span class="h6 mb-0">No</span>
                                    </span>
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Coupon Fields -->
                          <div class="mb-4">
                            <label for="coupon_code" class="form-label">Apply Coupon</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="coupon_code" name="coupon_code" placeholder="Enter coupon code">
                              <button class="btn btn-outline-primary" type="button" id="verifyCoupon">Verify</button>
                            </div>
                            <small id="couponHelp" class="form-text text-muted">Enter a valid coupon code to get discount</small>
                          </div>
                          <div id="couponDetails" class="mb-4 d-none">
                            <div class="card bg-lighter p-3">
                              <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="fw-semibold text-heading">Discount:</span>
                                <span id="discountValue" class="text-primary"></span>
                              </div>
                              <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-semibold text-heading">Valid for:</span>
                                <span id="validService" class="badge bg-label-info"></span>
                              </div>
                              <input type="hidden" id="discount_type" name="discount_type">
                              <input type="hidden" id="discount_value" name="discount_value">
                            </div>
                          </div>

                          <!-- Referral Fields in Add Booking Form -->
                          <div class="mb-4" id="referralSection" style="display: none;">
                            <label for="referrer_id" class="form-label">Referrer (First booking only)</label>
                            <select id="referrer_id" name="referrer_id" class="form-select select2">
                              <option value="">Select referrer</option>
                              @foreach($patients as $patientRef)
                                <option value="{{ $patientRef->patient_id }}">{{ $patientRef->firstname }} {{ $patientRef->lastname }}</option>
                              @endforeach
                            </select>
                            <small id="referralHelp" class="form-text text-muted">Both you and your referrer will receive 100 points</small>
                          </div>
                          <div id="referralDetails" class="mb-4 d-none">
                            <div class="card bg-lighter p-3">
                              <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="fw-semibold text-heading">Referral Bonus:</span>
                                <span id="referralDiscountValue" class="text-primary"></span>
                              </div>
                              <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-semibold text-heading">Referred By:</span>
                                <span id="referredBy" class="badge bg-label-info"></span>
                              </div>
                              <input type="hidden" id="referral_discount_type" name="referral_discount_type">
                              <input type="hidden" id="referral_discount_value" name="referral_discount_value">
                            </div>
                          </div>
                          
                          <div class="mb-5">
                            <label class="form-label" for="remarks">Remarks</label>
                            <textarea class="form-control" name="remarks" id="remarks"></textarea>
                          </div>
                          <div class="mb-4">
  <label class="form-label">Booking Summary</label>
  <div class="form-control bg-light" readonly style="min-height: 110px;">
    
    <div><strong>Coupon Discount:</strong> <span id="summary_coupon_discount">-</span></div>
    <div><strong>Referral Points:</strong> <span id="summary_referral_points">-</span></div>
    <div><strong>Used Points:</strong> <span id="summary_patient_reward">-</span></div>
    <div><strong>Points to Earn:</strong> <span id="points_to_earn_display">-</span></div>
    <div class="mt-2"><strong>Total Price:</strong> <span id="summary_total_price">-</span></div>
  </div>
</div>
                          <div class="d-flex justify-content-sm-between justify-content-start mt-6 gap-2">
                            <div class="d-flex">
                              <button type="submit" class="btn btn-primary btn-add-event me-4">Save</button>
                              <button type="reset" class="btn btn-label-secondary btn-cancel me-sm-0 me-1" data-bs-dismiss="offcanvas">Cancel</button>
                            </div>
                            <button class="btn btn-label-danger btn-delete-event d-none">Delete</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                  <!-- Update Booking Sidebar -->
                  <form method='post' 
                        id="updateBookingForm"
                        action="{{ route('booking.update')}}"
                        data-update-route="{{ route('booking.update')}}">
                    @csrf
                    @method('PUT')
                    <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1" id="updateEventSidebar">
                      <div class="offcanvas-header border-bottom">
                        <h5 class="offcanvas-title">Update Booking</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                        <div class="event-form pt-0">
                          <!-- Add This Above the Edit Event Content Section -->
                          <div class="mb-3" id="editBookingTypeSection">
                            <label class="form-label">Booking Type</label>
                            <div class="btn-group w-100" role="group">
                              <input type="radio" class="btn-check" name="edit_booking_type" id="edit_booking_type_service" value="service" checked autocomplete="off">
                              <label class="btn btn-outline-primary" for="edit_booking_type_service">Service</label>
                              
                              <input type="radio" class="btn-check" name="edit_booking_type" id="edit_booking_type_package" value="package" autocomplete="off">
                              <label class="btn btn-outline-primary" for="edit_booking_type_package">Package</label>
                            </div>
                          </div>

                          <div class="mb-5" id="edit_service_section">
                            <label class="form-label" for="editServiceId">Select Services</label>
                            <select class="select2 form-select" name="service_id[]" id="editServiceId" multiple>
                              @foreach ($services as $service)
                              <option value="{{$service->service_id}}">{{$service->service_name}}</option>
                              @endforeach
                            </select>
                            <small class="form-text text-muted">You can select multiple services</small>
                          </div>

                          <div class="mb-5" id="edit_package_section" style="display:none;">
                            <label class="form-label" for="editPackageId">Select Packages</label>
                            <select class="select2 form-select" name="package_id[]" id="editPackageId" multiple>
                              @foreach ($packages as $package)
                              <option value="{{$package->package_id}}">{{$package->package_name}}</option>
                              @endforeach
                            </select>
                            <small class="form-text text-muted">You can select multiple packages</small>
                          </div>
                          <input type="hidden" id="update_booking_id" name="booking_id">
                          <div class="mb-5">
                            <label class="form-label" for="update_status">Status</label>
                            <select class="select2 form-select" name="status" id="update_status">
                              <option>Pending</option>
                              <option>Paid</option>
                              <option>Cancelled</option>
                              <option>Completed</option>
                              <option>No Show</option>
                            </select>
                          </div>
                          <div class="mb-5">
                            <label class="form-label" for="update_payment_amount">Payment Amount</label>
                            <div class="input-group">
                              <span class="input-group-text">$</span>
                              <input type="number" class="form-control" id="update_payment_amount" name="payment_amount" placeholder="0.00" min="0" step="0.01">
                            </div>
                          </div>
                          <div class="mb-5">
                            <label class="form-label" for="update_start_date">Start Date and Time</label>
                            <input type="text" class="form-control flatpickr-input" id="update_start_date" name="start_date" placeholder="YYYY-MM-DD HH:MM" />
                          </div>
                          <div class="mb-5">
                            <label class="form-label" for="update_end_date">End Date and Time</label>
                            <input type="text" class="form-control flatpickr-input" id="update_end_date" name="end_date" placeholder="YYYY-MM-DD HH:MM" />
                          </div>
                          <div class="mb-4">
                            <label for="update_staff_id" class="form-label">Assigned Staff</label>
                            <select id="update_staff_id" name="id" class="form-select select2">
                              <option value="">Select a staff member</option>
                              @foreach ($staffs as $staff)
                              <option value="{{ $staff->id }}">{{ $staff->firstname }} {{ $staff->lastname }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="mb-4">
                            <label for="update_branch_code" class="form-label">Select Branch</label>
                            <select id="update_branch_code" name="branch_code" class="form-select">
                              @foreach ($branches as $branch)
                              <option value="{{$branch->branch_code}}">{{$branch->branch_name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="mb-4">
                            <label for="update_patient_id" class="form-label">Select Patient</label>
                            <select id="update_patient_id" name="patient_id" class="form-select select2">
                              <option value="">Select a patient</option>
                              @foreach($patients as $patient)
                                <option value="{{ $patient->patient_id }}">{{ $patient->firstname }} {{ $patient->lastname }}</option>
                              @endforeach
                            </select>
                            <!-- Patient information display for update form -->
                            <div id="update_patient_info" class="mt-2 card bg-lighter p-2" style="display: none;">
                              <div class="d-flex justify-content-between">
                                <span><i class="bx bx-star me-1"></i> Points:</span>
                                <div>
                                  <span id="update_patient_points_display" class="fw-semibold text-success"></span>
                                  <span id="update_welcome_badge" class="welcome-badge ms-2" style="display: none;">Welcome Bonus!</span>
                                </div>
                              </div>
                            </div>

                            <!-- Balance (added below with identical structure) --> 
                            <div class="d-flex justify-content-between mt-2"> 
                              <span><i class="bx bx-star me-1"></i> Patient Balance:</span>
                              <div> 
                                <span id="update_patient_balance_display" class="fw-semibold text-success"></span>
                            </div> 
                          </div>
                          </div>
                          
                         <div class="col-xl-12">
    <label class="form-label">Use Reward Points</label>
    <div class="row">
        <div class="col-md mb-md-0 mb-5">
            <div class="form-check custom-option custom-option-basic">
                <label class="form-check-label custom-option-content" for="updateUseRewardYes">
                    <input name="useReward" class="form-check-input" type="radio" value="1" id="updateUseRewardYes" />
                    <span class="custom-option-header">
                        <span class="h6 mb-0">Yes</span>
                    </span>
                </label>
            </div>
        </div>
        <div class="col-md">
            <div class="form-check custom-option custom-option-basic">
                <label class="form-check-label custom-option-content" for="updateUseRewardNo">
                    <input name="useReward" class="form-check-input" type="radio" value="0" id="updateUseRewardNo" />
                    <span class="custom-option-header">
                        <span class="h6 mb-0">No</span>
                    </span>
                </label>
            </div>
        </div>
    </div>
</div>

                          <!-- Coupon Fields -->
                          <div class="mb-4">
                            <label for="update_coupon_code" class="form-label">Apply Coupon</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="update_coupon_code" name="coupon_code" placeholder="Enter coupon code">
                              <button class="btn btn-outline-primary" type="button" id="updateVerifyCoupon">Verify</button>
                            </div>
                            <small id="updateCouponHelp" class="form-text text-muted">Enter a valid coupon code to get discount</small>
                          </div>
                          <div id="updateCouponDetails" class="mb-4 d-none">
                            <div class="card bg-lighter p-3">
                              <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="fw-semibold text-heading">Discount:</span>
                                <span id="updateDiscountValue" class="text-primary"></span>
                              </div>
                              <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-semibold text-heading">Valid for:</span>
                                <span id="updateValidService" class="badge bg-label-info"></span>
                              </div>
                              <input type="hidden" id="update_discount_type" name="discount_type">
                              <input type="hidden" id="update_discount_value" name="discount_value">
                            </div>
                          </div>

                          <!-- Update Booking Referral Fields -->
                          <div class="mb-4" id="updateReferralSection" style="display: none;">
                            <label for="update_referrer_id" class="form-label">Referrer (First booking only)</label>
                            <select id="update_referrer_id" name="referrer_id" class="form-select select2">
                              <option value="">Select referrer</option>
                              @foreach($patients as $patientRef)
                                <option value="{{ $patientRef->patient_id }}">{{ $patientRef->firstname }} {{ $patientRef->lastname }}</option>
                              @endforeach
                            </select>
                            <small id="updateReferralHelp" class="form-text text-muted">Both you and your referrer will receive 100 points</small>
                          </div>
                          <div id="updateReferralDetails" class="mb-4 d-none">
                            <div class="card bg-lighter p-3">
                              <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="fw-semibold text-heading">Referral Bonus:</span>
                                <span id="updateReferralDiscountValue" class="text-primary"></span>
                              </div>
                              <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-semibold text-heading">Referred By:</span>
                                <span id="updateReferredBy" class="badge bg-label-info"></span>
                              </div>
                              <input type="hidden" id="update_referral_discount_type" name="referral_discount_type">
                              <input type="hidden" id="update_referral_discount_value" name="referral_discount_value">
                            </div>
                          </div>
                          
                          <div class="mb-5">
                            <label class="form-label" for="update_remarks">Remarks</label>
                            <textarea class="form-control" name="remarks" id="update_remarks"></textarea>
                          </div>
                         <div class="mb-4">
  <label class="form-label">Booking Summary</label>
  <div class="form-control bg-light" readonly style="min-height: 110px;">
    
    <div><strong>Coupon Discount:</strong> <span id="update_summary_coupon_discount">-</span></div>
    <div><strong>Referral Points:</strong> <span id="update_summary_referral_points">-</span></div>
    <div><strong>Used Points:</strong> <span id="update_summary_patient_reward">-</span></div>
    <div><strong>Points to Earn:</strong> <span id="update_summary_points_to_earn">-</span></div>
    <div class="mt-2"><strong>Total Price:</strong> <span id="update_summary_total_price">-</span></div>
  </div>
</div>
                          <div class="d-flex justify-content-sm-between justify-content-start mt-6 gap-2">
                            <div class="d-flex">
                              <button type="submit" class="btn btn-primary btn-update-event me-4" onclick="return validateUpdateForm()">Update</button>
                              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /Calendar & Modal -->
              </div>
            </div>
            <!-- Recent Bookings Table -->
            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center p-4">
                    <div>
                      <h5 class="card-title mb-1">Booking History</h5>
                      <p class="text-muted mb-0 small">Overview of all appointments</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                      <!-- Add search bar here -->
                      <div class="search-box me-2">
                        <input type="text" class="form-control" id="bookingSearch" placeholder="Search bookings...">
                        <i class="bi bi-search search-icon"></i>
                      </div>
                      <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#addEventSidebar">
                        <i class="bx bx-plus me-1"></i> New Booking
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover booking-table" id="booking-datatable">
                        <thead class="table-light">
                          <tr>
                            <th>ID</th>
                            <th>Patient</th>
                            <th>Service/Package</th>
                            <th width="160">Date & Time</th>
                            <th>Staff</th>
                            <th>Branch</th>
                            <th>Status</th>
                            <th>Payment</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($bookings as $booking)
                            <tr class="booking-row" data-booking-id="{{ $booking->booking_id }}">
                              <td>
                                <span class="fw-medium">#{{ $booking->booking_id }}</span>
                              </td>
                              <td>
                                <div class="d-flex justify-content-start align-items-center">
                                  <div class="d-flex flex-column">
                                    <span class="fw-medium">{{ $booking->patient ? $booking->patient->firstname . ' ' . $booking->patient->lastname : 'N/A' }}</span>
                                    <small class="text-muted">{{ $booking->patient ? $booking->patient->phone : 'N/A' }}</small>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <div class="text-wrap" style="max-width: 200px;">
                                  @if($booking->packages && $booking->packages->count())
                                    {{ $booking->packages->pluck('package_name')->implode(', ') }}
                                  @elseif($booking->services && $booking->services->count())
                                    {{ $booking->services->pluck('service_name')->implode(', ') }}
                                  @else
                                    <span class="text-muted">No service/package data</span>
                                  @endif
                                </div>
                              </td>
                              <td class="date-column">
                                <div class="d-flex flex-column">
                                  <span class="date-display">{{ \Carbon\Carbon::parse($booking->start_date)->format('M d, Y') }}</span>
                                  <small class="text-muted time-display">
                                    <i class="bx bx-time me-1"></i>{{ \Carbon\Carbon::parse($booking->start_date)->format('h:i A') }} - 
                                    {{ \Carbon\Carbon::parse($booking->end_date)->format('h:i A') }}
                                  </small>
                                </div>
                              </td>
                              <td class="date-column">
                                <div class="d-flex flex-column">
                                  <span class="date-display">{{ \Carbon\Carbon::parse($booking->start_date)->format('M d, Y') }}</span>
                                  <small class="text-muted time-display">
                                    <i class="bx bx-time me-1"></i>{{ \Carbon\Carbon::parse($booking->start_date)->format('h:i A') }} - 
                                    {{ \Carbon\Carbon::parse($booking->end_date)->format('h:i A') }}
                                  </small>
                                </div>
                              </td>
                              <td>
                                @if($booking->staff)
                                  <div class="d-flex flex-column">
                                    <span>{{ $booking->staff->firstname }} {{ $booking->staff->lastname }}</span>
                                    <small class="text-muted">{{ $booking->staff->position->position_name ?? 'Staff' }}</small>
                                  </div>
                                @else
                                  <span class="text-muted">Unassigned</span>
                                @endif
                              </td>
                              <td>
                                @if($booking->branch)
                                  {{ $booking->branch->branch_name }}
                                @else
                                  <span class="text-muted">N/A</span>
                                @endif
                              </td>
                              <td>
                                <span class="badge bg-label-{{ 
                                  $booking->status === 'Pending' ? 'warning' : 
                                  ($booking->status === 'Paid' ? 'info' : 
                                  ($booking->status === 'Completed' ? 'success' : 
                                  ($booking->status === 'Cancelled' ? 'danger' : 
                                  ($booking->status === 'No Show' ? 'secondary' : 'primary')))) 
                                }}">
                                  {{ $booking->status }}
                                </span>
                              </td>
                              <td>
                                @if(isset($booking->payment) && $booking->payment > 0)
                                  <span class="text-success fw-medium">₱{{ number_format($booking->payment, 2) }}</span>
                                @else
                                  <span class="text-muted">-</span>
                                @endif
                              </td>
                              <td>
                                <div class="d-flex gap-2 booking-actions">
                                  <button type="button" class="btn btn-icon btn-sm btn-info view-booking-details" data-booking-id="{{ $booking->booking_id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details">
                                    <i class="bi bi-eye" style="color:white"></i>
                                    <span class="visually-hidden">View</span>
                                  </button>
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
            </div>
            <style>
              /* Add these styles to match dashboard design */
              .booking-table {
                --bs-table-hover-bg: rgba(105, 108, 255, 0.04);
              }

              .booking-row {
                vertical-align: middle;
                transition: all 0.3s ease;
              }

              .booking-row:hover {
                transform: translateX(5px);
              }

              .badge {
                padding: 0.5em 0.9em;
                font-weight: 500;
              }

              .table-light {
                --bs-table-bg: rgba(105, 108, 255, 0.04);
              }

              .card-header {
                border-bottom: 1px solid rgba(105, 108, 255, 0.1);
              }

              /* Status badge colors */
              .bg-label-success {
                background-color: rgba(40, 199, 111, 0.16) !important;
                color: #28c76f !important;
              }

              .bg-label-warning {
                background-color: rgba(255, 171, 0, 0.16) !important;
                color: #ffab00 !important;
              }

              .bg-label-danger {
                background-color: rgba(255, 62, 29, 0.16) !important;
                color: #ff3e1d !important;
              }

              .bg-label-info {
                background-color: rgba(3, 195, 236, 0.16) !important;
                color: #03c3ec !important;
              }

              .bg-label-secondary {
                background-color: rgba(108, 117, 125, 0.16) !important;
                color: #6c757d !important;
              }

              .bg-label-primary {
                background-color: rgba(105, 108, 255, 0.16) !important;
                color: #696cff !important;
              }

              /* DataTables styling */
              .dataTables_wrapper .dataTables_paginate .paginate_button {
                padding: 0.5em 0.75em;
                margin-left: 2px;
                cursor: pointer;
              }

              .dataTables_wrapper .dataTables_paginate .paginate_button.current {
                background: #696cff !important;
                color: white !important;
                border: 1px solid #696cff !important;
                border-radius: 0.25rem;
              }

              /* DataTables styling */
              .dataTables_wrapper .dataTables_paginate .paginate_button {
                padding: 0.5em 0.75em;
                margin-left: 2px;
                cursor: pointer;
              }

              .dataTables_wrapper .dataTables_paginate .paginate_button.current {
                background: #696cff !important;
                color: white !important;
                border: 1px solid #696cff !important;
                border-radius: 0.25rem;
              }
              
              /* Date column styling */
              .date-column {
                min-width: 160px !important;
                max-width: 200px !important;
                width: 180px !important;
              }
              
              /* Hide the duplicate date column */
              #booking-datatable .date-column + .date-column {
                display: none !important;
              }
              
              /* Hide the second date column - more general selector as backup */
              .date-column + .date-column {
                display: none !important;
              }
              
              .date-display {
                font-size: 0.875rem;
                white-space: nowrap;
                display: block;
                margin-bottom: 2px;
              }
              
              
              .time-display {
                font-size: 0.75rem;
                white-space: nowrap;
                display: block;
                line-height: 1.3;
              }

              /* Calendar tooltip styling */
              .calendar-tooltip {
                padding: 5px;
                text-align: left;
              }
              
              .tooltip-title {
                font-weight: 600;
                margin-bottom: 3px;
              }
              
              .tooltip-datetime {
                font-size: 12px;
                color: #666;
                margin-bottom: 5px;
              }
              
              /* Flatpickr improvements */
              .flatpickr-calendar {
                z-index: 1999 !important;
              }
              
              .flatpickr-calendar.open {
                display: inline-block !important;
              }

              .search-box {
                position: relative;
              }
              .search-box .search-icon {
                position: absolute;
                right: 12px;
                top: 50%;
                transform: translateY(-50%);
                color: #b0b0b0;
                pointer-events: none;
              }
              #bookingSearch {
                padding-right: 2.2rem;
              }

              .dataTables_filter {
                display: none !important;
              }
            </style>
          </div>
          <!-- / Content -->

          <!-- Custom validation script --> 
          <script>
            function validateUpdateForm() {
              const bookingId = document.getElementById('update_booking_id').value;
              
              if (!bookingId) {
                Swal.fire({
                  icon: 'error',
                  title: 'Form Validation Error', 
                  text: 'Booking ID is missing. Please try again.',
                  confirmButtonText: 'OK'
                });
                return false;
              }

              // Show loading state
              Swal.fire({
                title: 'Updating booking...',
                text: 'Please wait',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                  Swal.showLoading();
                }
              });
              
              return true;
            }
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
                  Developed by
                  <a href="https://intra-code.com/" target="_blank" class="footer-link">Intracode IT Solutions</a>
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
 <script src="{{ asset('vendor/libs/fullcalendar/fullcalendar.js') }}"></script>
  <script src="{{ asset('vendor/libs/@form-validation/popular.js') }}"></script>
   <script src="{{ asset('vendor/libs/@form-validation/bootstrap5.js') }}"></script>
   <script src="{{ asset('vendor/libs/@form-validation/auto-focus.js') }}"></script>
 <script src="{{ asset('vendor/libs/select2/select2.js') }}"></script>
  <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
 <script src="{{ asset('vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
  <script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
  <!-- Main JS -->
  <script src="../../assets/js/main.js"></script>
  <!-- Page JS -->
  <script src="../../assets/js/app-calendar-events.js"></script>
  <script src="../../assets/js/app-calendar.js"></script>
  <script src="../../assets/js/booking-view.js"></script>
  
  <!-- Custom initialization script -->
  <script>

 
$(document).ready(function() {
    // Initialize service prices object
    var servicePrices = {};
    @foreach ($services as $service)
      servicePrices['{{ $service->service_id }}'] = {{ $service->service_cost }};
    @endforeach

    // Initialize select2 for service selection
    $('#service_id').select2({
      placeholder: "Choose services...",
      allowClear: true
    });

    // Handle service selection changes
    $('#service_id').on('change select2:select select2:unselect', function() {
      updateSummary(); // This will update all summary information including service price
    });

    // Add event handler for reward points radio buttons
    $('input[name="useReward"]').on('change', function() {
      updateSummary();
    });

    // Function to calculate service price
    function calculateServicePrice() {
      var servicePrice = 0;
      var bookingType = $('input[name="booking_type"]:checked').val();
      var serviceIds = $('#service_id').val() || [];
      var packageIds = $('#package_id').val() || [];

      if (bookingType === 'service' && serviceIds.length > 0) {
        serviceIds.forEach(function(serviceId) {
          if (servicePrices[serviceId]) {
            servicePrice += parseFloat(servicePrices[serviceId]);
          }
        });
      } else if (bookingType === 'package' && packageIds.length > 0) {
        packageIds.forEach(function(packageId) {
          $.ajax({
            url: '/api/package-price/' + packageId,
            method: 'GET',
            async: false,
            success: function(data) {
              if (data && data.total_price) {
                servicePrice += parseFloat(data.total_price);
              }
            }
          });
        });
      }
      return servicePrice;
    }

    // Function to update booking summary for new bookings
    window.updateSummary = function() {
      var serviceIds = $('#service_id').val() || [];
      var packageIds = $('#package_id').val() || [];
      var pid = $('#patient_id').val();
      var dtype = $('#discount_type').val();
      var dval = $('#discount_value').val();
      var useReward = $('input[name="useReward"]:checked').val();
      var status = $('#status').val();
      var bookingType = $('input[name="booking_type"]:checked').val();
      var referrerId = $('#referrer_id').val();
      
      // Calculate service price
      var servicePrice = calculateServicePrice();
      
      var patient = patientData[pid] || {reward: 0};
      var discount = 0;
      var discountText = '-';
      var referralText = '-';
      
      // Calculate coupon discount
      if (dtype && dval) {
        if (dtype === 'percentage') {
          discount = servicePrice * (parseFloat(dval) / 100);
          discountText = dval + '% (' + formatMoney(discount) + ')';
        } else {
          discount = parseFloat(dval);
          discountText = formatMoney(discount);
        }
      }
      
      // Calculate referral points
      if (referrerId && $('#referralSection').is(':visible')) {
        referralText = '100 points';
      }
      
      var afterCoupon = Math.max(0, servicePrice - discount);
      var rewardPoints = patient.reward || 0;
      var usedPoints = useReward == '1' && rewardPoints > 0 ? Math.min(rewardPoints, afterCoupon) : 0;
      var usedPointsText = usedPoints > 0 ? '- ' + formatMoney(usedPoints) : '-';
      var afterReward = Math.max(0, afterCoupon - usedPoints);
      var total = afterReward;
      
      // Calculate points to earn
      var pointsToEarn = 0;
      var pointsToEarnText = '0 points';
      
      if (useReward === '0') {
        pointsToEarn = Math.floor(servicePrice / 50);
        pointsToEarnText = pointsToEarn > 0 ? pointsToEarn + ' points' : '0 points';
      }
      
      // Update all summary displays
      $('#summary_coupon_discount').text(discountText);
      $('#summary_referral_points').text(referralText);
      $('#summary_patient_reward').text(usedPointsText);
      $('#points_to_earn_display').text(pointsToEarnText);
      $('#summary_total_price').text(formatMoney(total));
      
      // Update the payment amount field
      $('#payment_amount').val(total.toFixed(2));
    }

    // Add event handlers for all form changes that should trigger summary updates
    $('#service_id, #package_id, input[name="booking_type"], #patient_id, #discount_type, #discount_value, input[name="useReward"], #status, #referrer_id').on('change', function() {
      updateSummary();
    });

    // Trigger initial update
    updateSummary();
});

    document.addEventListener('DOMContentLoaded', function() {
      // Check for validation errors on page load and display with SweetAlert
      const errorList = document.getElementById('error-list');
      if (errorList && errorList.textContent.trim()) {
        const errorMessages = Array.from(errorList.querySelectorAll('li')).map(li => li.textContent);
        Swal.fire({
          icon: 'error',
          title: 'Form Validation Error',
          html: errorMessages.join('<br>'),
          confirmButtonText: 'OK'
        });
      }

      // Initialize select2
      function initSelects() {
        if (typeof $.fn.select2 !== 'undefined') {
          // Common select2 options for better performance
          const commonOptions = {
            minimumResultsForSearch: 8, // Only show search box if more than 8 items
            placeholder: "Select an option",
            allowClear: true
          };
          
          // Initialize select2 for the add booking form
          $('#patient_id, #id, #referrer_id').select2({
            ...commonOptions,
            dropdownParent: $('#addEventSidebar .offcanvas-body')
          });
          
          // Initialize service selection with optimized loading
          $('#service_id').select2({
            ...commonOptions,
            dropdownParent: $('#addEventSidebar .offcanvas-body'),
            placeholder: "Select services",
            multiple: true
          });
          
          // Initialize package selection with optimized loading
          $('#package_id').select2({
            ...commonOptions,
            dropdownParent: $('#addEventSidebar .offcanvas-body'),
            placeholder: "Select packages",
            multiple: true
          });
          
          // Initialize select2 for update form with similar optimizations
          $('#update_patient_id, #update_staff_id, #update_referrer_id').select2({
            ...commonOptions,
            dropdownParent: $('#updateEventSidebar .offcanvas-body')
          });
          
          $('#editServiceId').select2({
            ...commonOptions,
            dropdownParent: $('#updateEventSidebar .offcanvas-body'),
            placeholder: "Select services",
            multiple: true
          });
          
          $('#editPackageId').select2({
            ...commonOptions,
            dropdownParent: $('#updateEventSidebar .offcanvas-body'),
            placeholder: "Select packages",
            multiple: true
          });
        }
      }
      
      // Function to initialize flatpickr date pickers properly
      function initDatepickr() {
        console.log('Initializing date pickers...');
        
        // Destroy any existing instances first to prevent duplicates
        if (window.startPicker) {
          window.startPicker.destroy();
        }
        if (window.endPicker) {
          window.endPicker.destroy();
        }
        if (window.updateStartPicker) {
          window.updateStartPicker.destroy();
        }
        if (window.updateEndPicker) {
          window.updateEndPicker.destroy();
        }
        
        // Basic flatpickr initialization with enhanced options
        window.startPicker = flatpickr("#start_date", {
          enableTime: true,
          dateFormat: "Y-m-d H:i",
          minuteIncrement: 15,
          time_24hr: false,
          allowInput: true,
          appendTo: document.getElementById('addEventSidebar'),
          onClose: function(selectedDates, dateStr) {
            // If end date is earlier than start date, update it
            if (window.endPicker && selectedDates[0] && window.endPicker.selectedDates[0] < selectedDates[0]) {
              window.endPicker.setDate(new Date(selectedDates[0].getTime() + 60*60*1000));
            }
          }
        });
        
        window.endPicker = flatpickr("#end_date", {
          enableTime: true,
          dateFormat: "Y-m-d H:i",
          minuteIncrement: 15,
          time_24hr: false,
          allowInput: true,
          appendTo: document.getElementById('addEventSidebar')
        });
        
        window.updateStartPicker = flatpickr("#update_start_date", {
          enableTime: true,
          dateFormat: "Y-m-d H:i",
          minuteIncrement: 15,
          time_24hr: false,
          allowInput: true,
          appendTo: document.getElementById('updateEventSidebar'),
          onClose: function(selectedDates, dateStr) {
            // If end date is earlier than start date, update it
            if (window.updateEndPicker && selectedDates[0] && window.updateEndPicker.selectedDates[0] < selectedDates[0]) {
              window.updateEndPicker.setDate(new Date(selectedDates[0].getTime() + 60*60*1000));
            }
          }
        });
        
        window.updateEndPicker = flatpickr("#update_end_date", {
          enableTime: true,
          dateFormat: "Y-m-d H:i",
          minuteIncrement: 15,
          time_24hr: false,
          allowInput: true,
          appendTo: document.getElementById('updateEventSidebar')
        });
        
        // Initialize inline calendar
        flatpickr('.inline-calendar', {
          inline: true,
          dateFormat: 'Y-m-d'
        });
        
        console.log('Date pickers initialized successfully');
      }
      
      // Setup initialization triggers
      function setupTriggers() {
        // Initialize on modal show
        $('#addEventSidebar').on('shown.bs.offcanvas', function() {
          setTimeout(function() {
            initDatepickr();
            initSelects();
          }, 100);
        });
        
        $('#updateEventSidebar').on('shown.bs.offcanvas', function() {
          setTimeout(function() {
            initDatepickr();
            initSelects();
          }, 100);
        });
      }
      
      // Initial setup
      setupTriggers();
      
      // Always expose reinit function for console debugging
      window.reinitPickers = initDatepickr;
    });
  </script>
  
  <!-- Initialize DataTables -->
  <script>
    $(document).ready(function() {
      // Check if DataTable is already initialized
      if ($.fn.DataTable.isDataTable('#booking-datatable')) {
        $('#booking-datatable').DataTable().destroy();
      }
      
      // Initialize DataTable with enhanced features
      var bookingTable = $('#booking-datatable').DataTable({
        pageLength: 10,
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        responsive: true,
        order: [[0, 'desc']], // Order by booking ID (newest first)
        dom: '<"row mb-3"<"col-md-6"l><"col-md-6"f>>rtip',
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search bookings...",
          lengthMenu: "_MENU_ entries per page",
          zeroRecords: "No bookings found",
          info: "Showing _START_ to _END_ of _TOTAL_ bookings",
          infoEmpty: "Showing 0 to 0 of 0 bookings",
          infoFiltered: "(filtered from _MAX_ total bookings)",
          paginate: {
            first: '«',
            previous: '‹',
            next: '›',
            last: '»'
          }
        },
        columnDefs: [
          { orderable: false, targets: [8] }, // Disable sorting on action column
          { width: "60px", targets: 0 }, // ID column
          { width: "120px", targets: 1 }, // Patient column
          { width: "120px", targets: 2 }, // Service column  
          { width: "180px", targets: 3, className: "date-column" }, // Date column
          { width: "100px", targets: 4 }, // Staff column
          { width: "100px", targets: 5 }, // Branch column
          { width: "90px", targets: 6 }, // Status column
          { width: "80px", targets: 7 }, // Payment column
          { width: "140px", targets: 8 }  // Actions column
        ],
        drawCallback: function() {
          $('[data-bs-toggle="tooltip"]').tooltip();
          // Ensure that the second date column is hidden
          $('.date-column + .date-column').css('display', 'none');
        }
      });

      // Custom search functionality
      $('#bookingSearch').on('keyup', function() {
        const searchValue = $(this).val();
        bookingTable.search(searchValue).draw();
        
        // Log search value for debugging
        console.log('Searching for:', searchValue);
        
        // Update UI to show search is active
        if (searchValue) {
          $(this).addClass('is-searching');
          $('.search-icon').addClass('text-primary');
        } else {
          $(this).removeClass('is-searching');
          $('.search-icon').removeClass('text-primary');
        }
      });

      // Clear search when clicking the X button
      $('#bookingSearch').on('search', function() {
        if (!this.value) {
          bookingTable.search('').draw();
          $(this).removeClass('is-searching');
          $('.search-icon').removeClass('text-primary');
        }
      });

      // Make the default DataTables search box use our custom input
      $('.dataTables_filter input').hide();
      $('#bookingSearch').on('keyup', function() {
        $('.dataTables_filter input').val($(this).val()).trigger('keyup');
      });
    });
  </script>

<script>
$(document).ready(function() {
  var servicePrices = {};
  @foreach ($services as $service)
    servicePrices['{{ $service->service_id }}'] = {{ $service->service_cost }};
  @endforeach

  var patientData = {};
  @foreach($patients as $patient)
    patientData['{{ $patient->patient_id }}'] = {
      reward: {{ $patient->points ?? 0 }}
    };
  @endforeach

  function formatMoney(val) {
    return '₱' + (val ? parseFloat(val).toLocaleString() : '0');
  }

  // Function to update booking summary for new bookings
  window.updateSummary = function() {
    var serviceIds = $('#service_id').val() || [];
    var packageIds = $('#package_id').val() || [];
    var pid = $('#patient_id').val();
    var dtype = $('#discount_type').val();
    var dval = $('#discount_value').val();
    var useReward = $('input[name="useReward"]:checked').val();
    var status = $('#status').val();
    var bookingType = $('input[name="booking_type"]:checked').val();
    
    console.log('updateSummary called with:', {
      serviceIds: serviceIds,
      packageIds: packageIds,
      patientId: pid,
      discountType: dtype,
      discountValue: dval,
      useReward: useReward,
      bookingType: bookingType
    });
    
    // Initialize total price
    var servicePrice = 0;
    var pointsToEarn = 0;
    
    // Calculate total based on booking type
    if (bookingType === 'service' && serviceIds.length > 0) {
      // Calculate for multiple services
      serviceIds.forEach(function(serviceId) {
        if (servicePrices[serviceId]) {
          servicePrice += parseFloat(servicePrices[serviceId]);
        }
      });
    } else if (bookingType === 'package' && packageIds.length > 0) {
      // For packages, we need to make an AJAX call to get package prices
      // For now, we'll use a simplified approach
      packageIds.forEach(function(packageId) {
        // Make AJAX call to get package price
        $.ajax({
          url: '/api/package-price/' + packageId,
          method: 'GET',
          async: false, // Use sync to ensure we have the price before continuing
          success: function(data) {
            if (data && data.total_price) {
              servicePrice += parseFloat(data.total_price);
            }
          },
          error: function() {
            console.error('Failed to fetch package price for ID:', packageId);
          }
        });
      });
    }
    
    var patient = patientData[pid] || {reward: 0};
    var discount = 0;
    var discountText = '-';
    var referralText = '-';
    
    // Calculate coupon discount
    if (dtype && dval) {
      if (dtype === 'percentage') {
        discount = servicePrice * (parseFloat(dval) / 100);
        discountText = dval + '% (' + formatMoney(discount) + ')';
      } else {
        discount = parseFloat(dval);
        discountText = formatMoney(discount);
      }
      console.log('Coupon discount calculated:', {
        type: dtype,
        value: dval,
        calculatedDiscount: discount,
        discountText: discountText
      });
    }
    
    // Check if referrer is selected
    var referrerId = $('#referrer_id').val();
    if (referrerId && $('#referralSection').is(':visible')) {
      referralText = "100 points";
    }
    
    var afterCoupon = Math.max(0, servicePrice - discount);
    var rewardPoints = patient.reward || 0;
    var usedPoints = useReward == '1' && rewardPoints > 0 ? Math.min(rewardPoints, afterCoupon) : 0;
    var usedPointsText = usedPoints > 0 ? '- ' + formatMoney(usedPoints) : '-';
    var afterReward = Math.max(0, afterCoupon - usedPoints);
    var total = afterReward;
    
    // Calculate points to earn based on service price
    var pointsToEarn = 0;
    var pointsToEarnText = '0 points'; // Default to 0 points
    
    // Show points based on reward points selection
    if (useReward === '0') { // When "No" is selected
      pointsToEarn = Math.floor(servicePrice / 100);
      pointsToEarnText = pointsToEarn > 0 ? pointsToEarn + ' points' : '0 points';
    }
    
    // Always show points section, but value changes based on selection
    $('#points_to_earn_section').show();
    $('#points_to_earn_display').text(pointsToEarnText);
    
    // Update summary display
    $('#summary_service_price').text(formatMoney(servicePrice));
    $('#summary_coupon_discount').text(discountText);
    $('#summary_referral_points').text(referralText);
    $('#summary_patient_reward').text(usedPointsText);
    $('#summary_total_price').text(formatMoney(total));
    
    // Update the payment amount field with the calculated total
    $('#payment_amount').val(total.toFixed(2));
  }

  // Function to update booking summary for edit bookings
  window.updateEditSummary = function() {
    var serviceIds = $('#editServiceId').val() || [];
    var packageIds = $('#editPackageId').val() || [];
    var pid = $('#update_patient_id').val();
    var dtype = $('#update_discount_type').val();
    var dval = $('#update_discount_value').val();
    var useReward = $('input[name="update_useReward"]:checked').val();
    var status = $('#update_status').val();
    var bookingType = $('input[name="edit_booking_type"]:checked').val();
    
    console.log('updateEditSummary called with:', {
      serviceIds: serviceIds,
      packageIds: packageIds,
      patientId: pid,
      discountType: dtype,
      discountValue: dval,
      useReward: useReward,
      bookingType: bookingType
    });
    
    // Initialize total price
    var servicePrice = 0;
    
    // Calculate total based on booking type
    if (bookingType === 'service' && serviceIds.length > 0) {
      // Calculate for multiple services
      serviceIds.forEach(function(serviceId) {
        if (servicePrices[serviceId]) {
          servicePrice += parseFloat(servicePrices[serviceId]);
        }
      });
    } else if (bookingType === 'package' && packageIds.length > 0) {
      // For packages, we need to make an AJAX call to get package prices
      // For now, we'll use a simplified approach
      packageIds.forEach(function(packageId) {
        // Make AJAX call to get package price
        $.ajax({
          url: '/api/package-price/' + packageId,
          method: 'GET',
          async: false, // Use sync to ensure we have the price before continuing
          success: function(data) {
            if (data && data.total_price) {
              servicePrice += parseFloat(data.total_price);
            }
          },
          error: function() {
            console.error('Failed to fetch package price for ID:', packageId);
          }
        });
      });
    }
    
    var patient = patientData[pid] || {reward: 0};
    var discount = 0;
    var discountText = '-';
    var referralText = '-';
    
    // Calculate coupon discount
    if (dtype && dval) {
      if (dtype === 'percentage') {
        discount = servicePrice * (parseFloat(dval) / 100);
        discountText = dval + '% (' + formatMoney(discount) + ')';
      } else {
        discount = parseFloat(dval);
        discountText = formatMoney(discount);
      }
      console.log('Coupon discount calculated (edit):', {
        type: dtype,
        value: dval,
        calculatedDiscount: discount,
        discountText: discountText
      });
    }
    
    // Check if referrer is selected
    var referrerId = $('#update_referrer_id').val();
    if (referrerId && $('#updateReferralSection').is(':visible')) {
      referralText = "100 points";
    }
    
    var afterCoupon = Math.max(0, servicePrice - discount);
    var rewardPoints = patient.reward || 0;
    var usedPoints = useReward == '1' && rewardPoints > 0 ? Math.min(rewardPoints, afterCoupon) : 0;
    var usedPointsText = usedPoints > 0 ? '- ' + formatMoney(usedPoints) : '-';
    var afterReward = Math.max(0, afterCoupon - usedPoints);
    var total = afterReward;
    
    // Calculate points to earn based on service price
    var pointsToEarn = 0;
    var pointsToEarnText = '0 points'; // Default to 0 points
    
    // Show points based on reward points selection
    if (useReward === '0') { // When "No" is selected
      pointsToEarn = Math.floor(servicePrice / 100);
      pointsToEarnText = pointsToEarn > 0 ? pointsToEarn + ' points' : '0 points';
    }
    
    // Always show points section, but value changes based on selection
    $('#update_points_to_earn_section').show();
    $('#update_summary_points_to_earn').text(pointsToEarnText);
    
    // Update summary display
    $('#update_summary_service_price').text(formatMoney(servicePrice));
    $('#update_summary_coupon_discount').text(discountText);
    $('#update_summary_referral_points').text(referralText);
    $('#update_summary_patient_reward').text(usedPointsText);
    $('#update_summary_total_price').text(formatMoney(total));
    
    // Update the payment amount field with the calculated total
    $('#update_payment_amount').val(total.toFixed(2));
  }

  // Set up event listeners for form fields
  $('#service_id, #patient_id, #discount_type, #discount_value, input[name="useReward"], #status').on('change keyup', updateSummary);
  $('#editServiceId, #update_patient_id, #update_discount_type, #update_discount_value, input[name="useReward"], #update_status').on('change keyup', updateEditSummary);
  
  // Add listeners for booking type and package selection
  $('#package_id, input[name="booking_type"]').on('change', updateSummary);
  $('#editPackageId, input[name="edit_booking_type"]').on('change', updateEditSummary);
  
  // Initialize summaries
  updateSummary();
  updateEditSummary();

  // Show patient info when a patient is selected
  $('#patient_id').change(function() {
    const patientId = $(this).val();
    if (patientId) {
      const patient = patientData[patientId];
      if (patient) {
        $('#patient_points_display').text(patient.reward);
        $('#patient_info').show();
        
        // Check if patient has exactly 100 points (welcome bonus)
        if (patient.reward === 100) {
          $('#welcome_badge').show();
        } else {
          $('#welcome_badge').hide();
        }
        
        // Set the hidden field for reward points
        $('#patientRewardPoints').val(patient.reward);
      }
    } else {
      $('#patient_info').hide();
    }
    updateSummary();
  });

  // Show patient info when a patient is selected in update form
  $('#update_patient_id').change(function() {
    const patientId = $(this).val();
    if (patientId) {
      const patient = patientData[patientId];
      if (patient) {
        $('#update_patient_points_display').text(patient.reward);
        $('#update_patient_info').show();
        
        // Check if patient has exactly 100 points (welcome bonus)
        if (patient.reward === 100) {
          $('#update_welcome_badge').show();
        } else {
          $('#update_welcome_badge').hide();
        }
        
        // Set the hidden field for reward points
        $('#updatePatientRewardPoints').val(patient.reward);
      }
    } else {
      $('#update_patient_info').hide();
    }
    updateEditSummary();
  });
  
  // Initialize patient info display
  $('#patient_id, #update_patient_id').trigger('change');
  
  // Add event handler for when update modal is opened
  $('#updateEventSidebar').on('shown.bs.offcanvas', function() {
    // Trigger summary update when update modal is opened with pre-populated data
    setTimeout(updateEditSummary, 100);
  });
});
</script>

<script>
$(document).ready(function() {
  // Form submission for new booking
  $('#addBookingForm').on('submit', function(e) {
    e.preventDefault();
    
    // Validate required fields
    if (!$('#start_date').val()) {
      Swal.fire('Error', 'Please select a start date and time', 'error');
      return false;
    }
    
    if (!$('#end_date').val()) {
      Swal.fire('Error', 'Please select an end date and time', 'error');
      return false;
    }
    
    if (!$('#id').val()) {
      Swal.fire('Error', 'Please select a staff member', 'error');
      return false;
    }
    
    if (!$('#patient_id').val()) {
      Swal.fire('Error', 'Please select a patient', 'error');
      return false;
    }
    
    // Validate booking type specific fields
    var bookingType = $('input[name="booking_type"]:checked').val();
    if (bookingType === 'service' && (!$('#service_id').val() || $('#service_id').val().length === 0)) {
      Swal.fire('Error', 'Please select at least one service', 'error');
      return false;
    }
    
    if (bookingType === 'package' && (!$('#package_id').val() || $('#package_id').val().length === 0)) {
      Swal.fire('Error', 'Please select at least one package', 'error');
      return false;
    }
    
    // Show loading alert
    Swal.fire({
      title: 'Saving Booking',
      text: 'Please wait while we create your booking...',
      allowOutsideClick: false,
      allowEscapeKey: false,
      showConfirmButton: false,
      willOpen: () => {
        Swal.showLoading();
      }
    });
    
    // Get form data
    const formData = new FormData(this);
    
    // Ensure the correct service_id/package_id data is included based on booking type
    if (bookingType === 'service') {
      // If service is selected, explicitly include service_id values
      const serviceIds = $('#service_id').val() || [];
      // Remove any package_id values to avoid confusion
      formData.delete('package_id[]');
      // Clear and re-add service_id values to ensure they're included
      formData.delete('service_id[]');
      serviceIds.forEach(id => formData.append('service_id[]', id));
    } else {
      // If package is selected, explicitly include package_id values
      const packageIds = $('#package_id').val() || [];
      // Remove any service_id values to avoid confusion
      formData.delete('service_id[]');
      // Clear and re-add package_id values to ensure they're included
      formData.delete('package_id[]');
      packageIds.forEach(id => formData.append('package_id[]', id));
    }
    
    // Add referrer data if applicable
    if ($('#referrer_id').is(':visible') && $('#referrer_id').val()) {
      formData.append('referrer_id', $('#referrer_id').val());
      formData.append('is_first_time', true);
      formData.append('add_points', true);
    }
    
    // Debug form data
    console.log('Form data being submitted:');
    for (let [key, value] of formData.entries()) {
      console.log(key, value);
    }
    
    // Send AJAX request
    $.ajax({
      url: $(this).attr('action'),
      method: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        console.log('Success response:', response);
        
        // Close loading alert
        Swal.close();
        
        // Show success message
        Swal.fire({
          icon: 'success',
          title: response.success || 'Booking Created',
          text: 'Your booking has been created successfully',
          confirmButtonText: 'OK'
        }).then(() => {
          // Reload page to show new booking
          window.location.reload();
        });
      },
      error: function(xhr) {
        console.error('Error response:', xhr);
        
        // Close loading alert
        Swal.close();
        
        let errorMessage = 'An error occurred while creating the booking.';
        
        // Handle validation errors
        if (xhr.status === 422 && xhr.responseJSON) {
          if (xhr.responseJSON.errors) {
            const errors = xhr.responseJSON.errors;
            const errorList = Object.keys(errors).map(key => errors[key][0]).join('<br>');
            errorMessage = `<strong>Validation Error:</strong><br>${errorList}`;
          } else if (xhr.responseJSON.message) {
            errorMessage = xhr.responseJSON.message;
          }
        } else if (xhr.responseJSON && xhr.responseJSON.message) {
          if (xhr.responseJSON.exception) {
            const exception = xhr.responseJSON.exception;
            const file = xhr.responseJSON.file ? `<br>File: ${xhr.responseJSON.file}` : '';
            const line = xhr.responseJSON.line ? `<br>Line: ${xhr.responseJSON.line}` : '';
            
            errorMessage = `<strong>Server Error:</strong><br>${xhr.responseJSON.message}<br>${exception}${file}${line}`;
            console.error('Exception details:', xhr.responseJSON);
          } else {
            errorMessage = xhr.responseJSON.message;
          }
        }
        
        Swal.fire({
          icon: 'error',
          title: 'Error',
          html: errorMessage,
          confirmButtonText: 'OK'
        });
      }
    });
  });

  // Form submission for update booking
  $('#updateBookingForm').on('submit', function(e) {
    e.preventDefault();
    
    // Validate booking ID exists
    if (!$('#update_booking_id').val()) {
      Swal.fire('Error', 'Booking ID is missing', 'error');
      return false;
    }
    
    // Validate required fields
    if (!$('#update_start_date').val()) {
      Swal.fire('Error', 'Please select a start date and time', 'error');
      return false;
    }
    
    if (!$('#update_end_date').val()) {
      Swal.fire('Error', 'Please select an end date and time', 'error');
      return false;
    }
    
    if (!$('#update_staff_id').val()) {
      Swal.fire('Error', 'Please select a staff member', 'error');
      return false;
    }
    
    if (!$('#update_patient_id').val()) {
      Swal.fire('Error', 'Please select a patient', 'error');
      return false;
    }
    
    // Validate booking type specific fields
    var bookingType = $('input[name="edit_booking_type"]:checked').val();
    if (bookingType === 'service' && (!$('#editServiceId').val() || $('#editServiceId').val().length === 0)) {
      Swal.fire('Error', 'Please select at least one service', 'error');
      return false;
    }
    
    if (bookingType === 'package' && (!$('#editPackageId').val() || $('#editPackageId').val().length === 0)) {
      Swal.fire('Error', 'Please select at least one package', 'error');
      return false;
    }
    
    // Show loading alert
    Swal.fire({
      title: 'Updating Booking',
      text: 'Please wait while we update your booking...',
      allowOutsideClick: false,
      allowEscapeKey: false,
      showConfirmButton: false,
      willOpen: () => {
        Swal.showLoading();
      }
    });
    
    // Get form data
    const formData = new FormData(this);
    
    // Add referrer data if applicable
    if ($('#update_referrer_id').is(':visible') && $('#update_referrer_id').val()) {
      formData.append('referrer_id', $('#update_referrer_id').val());
      formData.append('is_first_time', true);
      formData.append('add_points', true);
    }
    
    // Debug form data
    console.log('Update form data being submitted:');
    for (let [key, value] of formData.entries()) {
      console.log(key, value);
    }
    
    // Send AJAX request
    $.ajax({
      url: $(this).attr('action'),
      method: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        console.log('Success response:', response);
        
        // Close loading alert
        Swal.close();
        
        // Show success message
        Swal.fire({
          icon: 'success',
          title: response.success || 'Booking Updated',
          text: 'Your booking has been updated successfully',
          confirmButtonText: 'OK'
        }).then(() => {
          // Reload page to show updated booking
          window.location.reload();
        });
      },
      error: function(xhr) {
        console.error('Error response:', xhr);
        
        // Close loading alert
        Swal.close();
        
        let errorMessage = 'An error occurred while updating the booking.';
        
        // Handle validation errors
        if (xhr.status === 422 && xhr.responseJSON) {
          if (xhr.responseJSON.errors) {
            const errors = xhr.responseJSON.errors;
            const errorList = Object.keys(errors).map(key => errors[key][0]).join('<br>');
            errorMessage = `<strong>Validation Error:</strong><br>${errorList}`;
          } else if (xhr.responseJSON.message) {
            errorMessage = xhr.responseJSON.message;
          }
        } else if (xhr.responseJSON && xhr.responseJSON.message) {
          if (xhr.responseJSON.exception) {
            const exception = xhr.responseJSON.exception;
            const file = xhr.responseJSON.file ? `<br>File: ${xhr.responseJSON.file}` : '';
            const line = xhr.responseJSON.line ? `<br>Line: ${xhr.responseJSON.line}` : '';
            
            errorMessage = `<strong>Server Error:</strong><br>${xhr.responseJSON.message}<br>${exception}${file}${line}`;
            console.error('Exception details:', xhr.responseJSON);
          } else {
            errorMessage = xhr.responseJSON.message;
          }
        }
        
        Swal.fire({
          icon: 'error',
          title: 'Error',
          html: errorMessage,
          confirmButtonText: 'OK'
        });
      }
    });
  });
});
</script>

<script>
$(document).ready(function() {
  // Coupon verification for new booking
  $('#verifyCoupon').on('click', function() {
    const couponCode = $('#coupon_code').val().trim();
    const serviceIds = $('#service_id').val(); // This will be an array if multiple selection is enabled
    const verifyBtn = $(this);
    
    if (!couponCode) {
      // Show error message in the form instead of SweetAlert
      $('#couponHelp').removeClass('text-success text-muted').addClass('text-danger').text('Please enter a coupon code');
      $('#coupon_code').removeClass('is-valid border-success').addClass('is-invalid');
      return;
    }

    if (!serviceIds || (Array.isArray(serviceIds) && serviceIds.length === 0)) {
      $('#couponHelp').removeClass('text-success text-muted').addClass('text-danger').text('Please select a service first');
      $('#coupon_code').removeClass('is-valid border-success').addClass('is-invalid');
      return;
    }
    
    // Show loading state
    verifyBtn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Verifying...');
    verifyBtn.prop('disabled', true);
    
    // Send AJAX request to verify coupon
    $.ajax({
      url: '/verify-coupon',
      type: 'POST',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        coupon_code: couponCode,
        service_id: serviceIds
      },
      success: function(response) {
        if (response.valid) {
          // Show coupon details
          $('#couponDetails').removeClass('d-none');
          
          // Display discount information based on type
          if (response.discount_type === 'percentage') {
            $('#discountValue').text(response.discount_value + '% off');
          } else {
            $('#discountValue').text('₱' + response.discount_value + ' off');
          }
          
          // Display service name
          $('#validService').text(response.service_name || 'All services');
          
          // Set hidden fields for form submission
          $('#discount_type').val(response.discount_type);
          $('#discount_value').val(response.discount_value);
          
          // Success message
          $('#couponHelp').removeClass('text-muted text-danger').addClass('text-success').html('<i class="bx bx-check-circle me-1"></i> Coupon applied successfully!');
          
          // Add visual indicator for successful coupon application
          $('#coupon_code').removeClass('is-invalid').addClass('is-valid border-success');
          
          // Update summary after a short delay to ensure hidden fields are set
          setTimeout(function() {
            window.updateSummary();
          }, 100);
        } else {
          // Invalid coupon
          $('#couponDetails').addClass('d-none');
          $('#discount_type').val('');
          $('#discount_value').val('');
          $('#couponHelp').removeClass('text-success text-muted').addClass('text-danger').text(response.message || 'Invalid coupon code');
          $('#coupon_code').removeClass('is-valid border-success').addClass('is-invalid');
          
          // Update summary immediately
          window.updateSummary();
        }
      },
      error: function() {
        // Show error message in the form
        $('#couponHelp').removeClass('text-success text-muted').addClass('text-danger').text('Could not verify coupon. Please try again.');
        $('#coupon_code').removeClass('is-valid border-success').addClass('is-invalid');
      },
      complete: function() {
        // Reset button state
        verifyBtn.html('Verify');
        verifyBtn.prop('disabled', false);
      }
    });
  });
  
  // Coupon verification for update booking
  $('#updateVerifyCoupon').on('click', function() {
    const couponCode = $('#update_coupon_code').val().trim();
    const serviceId = $('#update_service_id').val();
    const verifyBtn = $(this);
    
    if (!couponCode) {
      // Show error message in the form instead of SweetAlert
      $('#updateCouponHelp').removeClass('text-success text-muted').addClass('text-danger').text('Please enter a coupon code');
      $('#update_coupon_code').removeClass('is-valid border-success').addClass('is-invalid');
      return;
    }
    
    // Show loading state
    verifyBtn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Verifying...');
    verifyBtn.prop('disabled', true);
    
    // Send AJAX request to verify coupon
    $.ajax({
      url: '/verify-coupon',
      type: 'POST',
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        coupon_code: couponCode,
        service_id: serviceId
      },
      success: function(response) {
        if (response.valid) {
          // Show coupon details
          $('#updateCouponDetails').removeClass('d-none');
          
          // Display discount information based on type
          if (response.discount_type === 'percentage') {
            $('#updateDiscountValue').text(response.discount_value + '% off');
          } else {
            $('#updateDiscountValue').text('₱' + response.discount_value + ' off');
          }
          
          // Display service name
          $('#updateValidService').text(response.service_name || 'All services');
          
          // Set hidden fields for form submission
          $('#update_discount_type').val(response.discount_type);
          $('#update_discount_value').val(response.discount_value);
          
          console.log('Update coupon verified successfully:', {
            discountType: response.discount_type,
            discountValue: response.discount_value,
            hiddenFieldType: $('#update_discount_type').val(),
            hiddenFieldValue: $('#update_discount_value').val()
          });
          
          // Success message
          $('#updateCouponHelp').removeClass('text-muted').addClass('text-success').html('<i class="bx bx-check-circle me-1"></i> Coupon applied successfully!');
          
          // Add visual indicator for successful coupon application
          $('#update_coupon_code').addClass('is-valid border-success');
          
          // Update summary after a short delay to ensure hidden fields are set
          setTimeout(function() {
            console.log('Updating edit summary after successful coupon verification');
            console.log('Hidden fields before update:', {
              discountType: $('#update_discount_type').val(),
              discountValue: $('#update_discount_value').val()
            });
            window.updateEditSummary();
          }, 100);
        } else {
          // Invalid coupon
          $('#updateCouponDetails').addClass('d-none');
          $('#update_discount_type').val('');
          $('#update_discount_value').val('');
          $('#updateCouponHelp').removeClass('text-success').addClass('text-danger').text(response.message || 'Invalid coupon code');
          $('#update_coupon_code').removeClass('is-valid border-success').addClass('is-invalid');
          
          // Update summary immediately
          console.log('Updating edit summary after invalid coupon');
          window.updateEditSummary();
        }
      },
      error: function() {
        // Show error message in the form
        $('#updateCouponHelp').removeClass('text-success text-muted').addClass('text-danger').text('Could not verify coupon. Please try again.');
        $('#update_coupon_code').removeClass('is-valid border-success').addClass('is-invalid');
      },
      complete: function() {
        // Reset button state - ALWAYS runs regardless of success or error
        verifyBtn.html('Verify');
        verifyBtn.prop('disabled', false);
      }
    });
  });
  
  // Prevent form submission when pressing Enter in the coupon field
  $('#coupon_code').on('keydown', function(e) {
    if (e.key === 'Enter') {
      e.preventDefault();
      $('#verifyCoupon').click();
      return false;
    }
  });
  
  $('#update_coupon_code').on('keydown', function(e) {
    if (e.key === 'Enter') {
      e.preventDefault();
      $('#updateVerifyCoupon').click();
      return false;
    }
  });
  
  // Reset coupon fields when modal is hidden
  $('#addEventSidebar').on('hidden.bs.offcanvas', function() {
    $('#coupon_code').val('');
    $('#coupon_code').removeClass('is-valid border-success is-invalid');
    $('#couponDetails').addClass('d-none');
    $('#discount_type').val('');
    $('#discount_value').val('');
    $('#couponHelp').removeClass('text-success text-danger').addClass('text-muted').text('Enter a valid coupon code to get discount');
  });
  
  $('#updateEventSidebar').on('hidden.bs.offcanvas', function() {
    $('#update_coupon_code').val('');
    $('#update_coupon_code').removeClass('is-valid border-success is-invalid');
    $('#updateCouponDetails').addClass('d-none');
    $('#update_discount_type').val('');
    $('#update_discount_value').val('');
    $('#updateCouponHelp').removeClass('text-success text-danger').addClass('text-muted').text('Enter a valid coupon code to get discount');
  });
});
</script>

<script>
$(document).ready(function() {
  // Check if patient is first-time booker and show/hide referral section
  function checkFirstTimePatient(patientId) {
    if (!patientId) {
      $('#referralSection').hide();
      $('#updateReferralSection').hide();
      return;
    }

    $.ajax({
      url: "{{ route('check.first.time.patient') }}",
      method: "POST",
      data: {
        patient_id: patientId,
        _token: "{{ csrf_token() }}"
      },
      success: function(response) {
        if (response.is_first_time) {
          // Show referral dropdown for first-time patients
          $('#referralSection').show();
          $('#updateReferralSection').show();
        } else {
          // Hide referral dropdown for returning patients
          $('#referralSection').hide();
          $('#updateReferralSection').hide();
        }
      },
      error: function(xhr) {
        console.error('Error checking first-time patient status:', xhr);
        // Hide referral section on error
        $('#referralSection').hide();
        $('#updateReferralSection').hide();
      }
    });
  }

  // Add event listeners to patient selectors
  $('#patient_id').change(function() {
    const patientId = $(this).val();
    checkFirstTimePatient(patientId);
  });

  $('#update_patient_id').change(function() {
    const patientId = $(this).val();
    checkFirstTimePatient(patientId);
  });

  // Handle referrer selection for add booking form
  $('#referrer_id').change(function() {
    const referrerId = $(this).val();
    if (referrerId) {
      // Show referrer info but don't apply any discount
      $('#referralDetails').removeClass('d-none');
      $('#referredBy').text($(this).find('option:selected').text());
      $('#referralDiscountValue').text('Earning 100 points');
      
      // Clear discount values - no automatic discount applied
      $('#referral_discount_type').val('');
      $('#referral_discount_value').val('');
      
      // Just update display
      updateSummary();
    } else {
      $('#referralDetails').addClass('d-none');
      $('#referral_discount_type').val('');
      $('#referral_discount_value').val('');
      updateSummary();
    }
  });

  // Handle referrer selection for update booking form
  $('#update_referrer_id').change(function() {
    const referrerId = $(this).val();
    if (referrerId) {
      // Show referrer info but don't apply any discount
      $('#updateReferralDetails').removeClass('d-none');
      $('#updateReferredBy').text($(this).find('option:selected').text());
      $('#updateReferralDiscountValue').text('Earning 100 points');
      
      // Clear discount values - no automatic discount applied
      $('#update_referral_discount_type').val('');
      $('#update_referral_discount_value').val('');
      
      // Just update display
      updateEditSummary();
    } else {
      $('#updateReferralDetails').addClass('d-none');
      $('#update_referral_discount_type').val('');
      $('#update_referral_discount_value').val('');
      updateEditSummary();
    }
  });

  // Check first-time status on page load if patient is already selected
  if ($('#patient_id').val()) {
    checkFirstTimePatient($('#patient_id').val());
  }
  
  if ($('#update_patient_id').val()) {
    checkFirstTimePatient($('#update_patient_id').val());
  }
});
</script>

<!-- After the DataTables initialization script -->
<script>
  // Patient Referral System
  $(document).ready(function() {
    // Function to check if a patient is making their first booking
    function checkFirstTimePatient(patientId) {
      if (!patientId) {
        $('#referralSection').hide();
        $('#updateReferralSection').hide();
        return;
      }

      $.ajax({
        url: "{{ route('check.first.time.patient') }}",
        type: "POST",
        data: {
          patient_id: patientId,
          _token: "{{ csrf_token() }}"
        },
        success: function(response) {
          if (response.is_first_time) {
            // Show referral section for first-time patients
            $('#referralSection').show();
            $('#updateReferralSection').show();
            
            // Reinitialize select2 for referrer dropdowns to ensure they work
            try {
              $('#referrer_id').select2('destroy');
              $('#referrer_id').select2({
                dropdownParent: $('#addEventSidebar .offcanvas-body'),
                width: '100%'
              });
              
              $('#update_referrer_id').select2('destroy');
              $('#update_referrer_id').select2({
                dropdownParent: $('#updateEventSidebar .offcanvas-body'),
                width: '100%'
              });
            } catch (e) {
              console.error('Error reinitializing select2:', e);
            }
          } else {
            // Hide referral section for returning patients
            $('#referralSection').hide();
            $('#updateReferralSection').hide();
          }
        },
        error: function(xhr) {
          console.error('Error checking first-time patient status:', xhr);
          // Hide referral sections on error
          $('#referralSection').hide();
          $('#updateReferralSection').hide();
        }
      });
    }

    // Initialize select2 for referrer dropdowns with the correct parent
    try {
      setTimeout(function() {
        $('#referrer_id').select2({
          dropdownParent: $('#addEventSidebar .offcanvas-body'),
          width: '100%',
          placeholder: 'Select a referrer'
        });
        
        $('#update_referrer_id').select2({
          dropdownParent: $('#updateEventSidebar .offcanvas-body'),
          width: '100%',
          placeholder: 'Select a referrer'
        });
        
        console.log('Select2 initialized for referrer dropdowns');
      }, 500); // Small delay to ensure DOM is ready
    } catch (e) {
      console.error('Error initializing select2 for referrer dropdowns:', e);
    }
    
    // Handle patient selection changes to show/hide referrer section
    $('#patient_id').on('change', function() {
      const patientId = $(this).val();
      checkFirstTimePatient(patientId);
    });
    
    $('#update_patient_id').on('change', function() {
      const patientId = $(this).val();
      checkFirstTimePatient(patientId);
    });
    
    // Handle referrer selection for add booking form
    $('#referrer_id').on('change', function() {
      const referrerId = $(this).val();
      if (referrerId) {
        // Show referrer info but don't apply any discount
        $('#referralDetails').removeClass('d-none');
        $('#referredBy').text($(this).find('option:selected').text());
        $('#referralDiscountValue').text('Earning 100 points');
        
        // Clear discount values - no automatic discount applied
        $('#referral_discount_type').val('');
        $('#referral_discount_value').val('');
        
        // Just update display
        updateSummary();
      } else {
        $('#referralDetails').addClass('d-none');
        $('#referral_discount_type').val('');
        $('#referral_discount_value').val('');
        updateSummary();
      }
    });
    
    // Handle referrer selection for update booking form
    $('#update_referrer_id').on('change', function() {
      const referrerId = $(this).val();
      if (referrerId) {
        // Show referrer info but don't apply any discount
        $('#updateReferralDetails').removeClass('d-none');
        $('#updateReferredBy').text($(this).find('option:selected').text());
        $('#updateReferralDiscountValue').text('Earning 100 points');
        
        // Clear discount values - no automatic discount applied
        $('#update_referral_discount_type').val('');
        $('#update_referral_discount_value').val('');
        
        // Just update display
        updateEditSummary();
      } else {
        $('#updateReferralDetails').addClass('d-none');
        $('#update_referral_discount_type').val('');
        $('#update_referral_discount_value').val('');
        updateEditSummary();
      }
    });
    
    // Check first-time status on page load if patient is already selected
    if ($('#patient_id').val()) {
      checkFirstTimePatient($('#patient_id').val());
    }
    
    if ($('#update_patient_id').val()) {
      checkFirstTimePatient($('#update_patient_id').val());
    }
  });
</script>

<!-- Welcome Badge Script -->
<script>
$(document).ready(function() {
  // Initialize tooltips
  $('[data-bs-toggle="tooltip"]').tooltip();
  
  // Handle patient selection for add booking form
  $('#patient_id').on('change', function() {
    const patientId = $(this).val();
    if (patientId) {
      $.ajax({
        url: "{{ route('patient.get.points') }}",
        type: "GET",
        data: { patient_id: patientId },
        success: function(response) {
          if (response.success) {
            // Show the welcome badge if points are exactly 100
            if (response.points === 100) {
              $('#welcome_badge')
                .attr('data-bs-toggle', 'tooltip')
                .attr('data-bs-placement', 'top')
                .attr('title', 'This patient just received 100 welcome points!')
                .show();
              
              // Re-initialize tooltip
              $('#welcome_badge').tooltip();
            } else {
              $('#welcome_badge').hide();
            }
            
            // Update the points display
            $('#patient_points_display').text(response.points);
            $('#patient_balance_display').text(response.points);
          }
        },
        error: function(xhr) {
          console.error('Error checking patient points:', xhr);
          $('#welcome_badge').hide();
        }
      });
    } else {
      $('#welcome_badge').hide();
    }
  });

  // Handle patient selection for update booking form
  $('#update_patient_id').on('change', function() {
    const patientId = $(this).val();
    if (patientId) {
      $.ajax({
        url: "{{ route('patient.get.points') }}",
        type: "GET",
        data: { patient_id: patientId },
        success: function(response) {
          if (response.success) {
            // Show the welcome badge if points are exactly 100
            if (response.points === 100) {
              $('#update_welcome_badge')
                .attr('data-bs-toggle', 'tooltip')
                .attr('data-bs-placement', 'top')
                .attr('title', 'This patient just received 100 welcome points!')
                .show();
              
              // Re-initialize tooltip
              $('#update_welcome_badge').tooltip();
            } else {
              $('#update_welcome_badge').hide();
            }
            
            // Update the points display
            $('#update_patient_points_display').text(response.points);
            $('#update_patient_balance_display').text(response.points);
          }
        },
        error: function(xhr) {
          console.error('Error checking patient points:', xhr);
          $('#update_welcome_badge').hide();
        }
      });
    } else {
      $('#update_welcome_badge').hide();
    }
  });
});
</script>

<script>
    $(document).ready(function() {
      // Toggle between service and package selections
      $('input[name="booking_type"]').change(function() {
        if ($(this).val() === 'service') {
          $('#service_section').show();
          $('#package_section').hide();
        } else {
          $('#service_section').hide();
          $('#package_section').show();
        }
      });

      // Initialize Edit form service/package toggle
      $('input[name="edit_booking_type"]').change(function() {
        if ($(this).val() === 'service') {
          $('#edit_service_section').show();
          $('#edit_package_section').hide();
        } else {
          $('#edit_service_section').hide();
          $('#edit_package_section').show();
        }
      });

      // Ensure the correct initial state
      $('input[name="booking_type"]:checked').trigger('change');
      
      // ... existing JavaScript code ...
    });
</script>

<script>
    $(document).ready(function() {
      // Initialize Edit form service/package toggle
      $('input[name="edit_booking_type"]').change(function() {
        if ($(this).val() === 'service') {
          $('#edit_service_section').show();
          $('#edit_package_section').hide();
        } else {
          $('#edit_service_section').hide();
          $('#edit_package_section').show();
        }
      });

      // Handle loading event data for editing - update for packages
      $(document).on('click', '.edit-booking, .fc-event-title, .fc-daygrid-event-dot', function(e) {
        const eventData = calendar.getEventById($(this).data('booking-id')) || 
                         ($(this).closest('.fc-event').length > 0 && calendar.getEventById($(this).closest('.fc-event').data('id')));
        
        if (eventData) {
          const eventId = eventData.id;
          const eventProps = eventData.extendedProps;
          
          // Set booking type based on package_id
          if (eventProps.package_id) {
            $('#edit_booking_type_package').prop('checked', true);
            $('#edit_booking_type_service').prop('checked', false);
            $('#edit_service_section').hide();
            $('#edit_package_section').show();
            $('#editServiceId').prop('disabled', true);
            $('#editPackageId').prop('disabled', false);
            $('#editPackageId').val(eventProps.package_id).trigger('change');
          } else {
            $('#edit_booking_type_service').prop('checked', true);
            $('#edit_booking_type_package').prop('checked', false);
            $('#edit_service_section').show();
            $('#edit_package_section').hide();
            $('#editServiceId').prop('disabled', false);
            $('#editPackageId').prop('disabled', true);
            $('#editServiceId').val(eventProps.service_id).trigger('change');
          }
          
          // Set other fields
          $('#update_booking_id').val(eventId);
          $('#update_status').val(eventProps.status).trigger('change');
          $('#update_start_date').val(eventProps.start_date);
          $('#update_end_date').val(eventProps.end_date);
          $('#update_staff_id').val(eventProps.staff_id).trigger('change');
          $('#update_branch_code').val(eventProps.branch_code).trigger('change');
          $('#update_patient_id').val(eventProps.patient_id).trigger('change');
          
          if (eventProps.use_reward_points == 1) {
            $('#update_useRewardYes').prop('checked', true);
          } else {
            $('#update_useRewardNo').prop('checked', true);
          }
          
          $('#update_remarks').val(eventProps.remarks);
          
          // Trigger event edit form
          $('.edit-event-btn').click();
        }
      });
    });
</script>

<!-- Calendar Event Click Handler -->
<script>
$(document).ready(function() {
  // Wait for FullCalendar to be initialized
  setTimeout(function() {
    // Find the calendar instance
    const calendarEl = document.querySelector('.fc');
    
    if (calendarEl) {
      // Add event listener for event clicks
      calendarEl.addEventListener('click', function(e) {
        // Check if the click is on a calendar event
        const eventEl = e.target.closest('.fc-event');
        if (eventEl) {
          // Extract the booking ID from the event
          const bookingId = eventEl.getAttribute('data-booking-id');
          if (bookingId) {
            console.log('Event clicked. Loading booking ID:', bookingId);
            
            // Call AJAX to get booking details
            $.ajax({
              url: `/api/bookings/${bookingId}`,
              method: 'GET',
              success: function(data) {
                if (data) {
                  console.log('Booking data loaded:', data);
                  
                  // Set booking ID
                  $('#update_booking_id').val(data.booking_id);
                  
                  // Set status
                  $('#update_status').val(data.status).trigger('change');
                  
                  // Set dates
                  $('#update_start_date').val(data.start_date);
                  $('#update_end_date').val(data.end_date);
                  
                  // Set staff and branch
                  $('#update_staff_id').val(data.id).trigger('change');
                  $('#update_branch_code').val(data.branch_code);
                  
                  // Set patient
                  $('#update_patient_id').val(data.patient_id).trigger('change');
                  
                  // Clear previous selections
                  $('#editServiceId').val(null).trigger('change');
                  $('#editPackageId').val(null).trigger('change');
                  
                  // Handle service or package selection
                  let serviceIds = data.service_id;
                  let packageIds = data.package_id;
                  
                  // Try to parse JSON if they're strings
                  if (typeof serviceIds === 'string' && serviceIds) {
                    try {
                      serviceIds = JSON.parse(serviceIds);
                    } catch(e) {
                      console.error("Failed to parse service IDs:", e);
                      serviceIds = [serviceIds]; // Fallback
                    }
                  }
                  
                  if (typeof packageIds === 'string' && packageIds) {
                    try {
                      packageIds = JSON.parse(packageIds);
                    } catch(e) {
                      console.error("Failed to parse package IDs:", e);
                      packageIds = [packageIds]; // Fallback
                    }
                  }
                  
                  // Set booking type and related fields
                  if (packageIds && packageIds.length > 0) {
                    // Package booking
                    $('input[name="edit_booking_type"][value="package"]').prop('checked', true).trigger('change');
                    
                    // Select packages
                    if (Array.isArray(packageIds)) {
                      $('#editPackageId').val(packageIds).trigger('change');
                    } else if (packageIds) {
                      $('#editPackageId').val([packageIds]).trigger('change');
                    }
                  } else {
                    // Service booking
                    $('input[name="edit_booking_type"][value="service"]').prop('checked', true).trigger('change');
                    
                    // Select services
                    if (Array.isArray(serviceIds)) {
                      $('#editServiceId').val(serviceIds).trigger('change');
                    } else if (serviceIds) {
                      $('#editServiceId').val([serviceIds]).trigger('change');
                    }
                  }
                  
                  // Set use reward points
                  if (data.useReward == 1) {
                    $('#updateUseRewardYes').prop('checked', true);
                  } else {
                    $('#updateUseRewardNo').prop('checked', true);
                  }
                  
                  // Set remarks
                  $('#update_remarks').val(data.remarks);
                  
                  // Open the sidebar
                  const updateEventSidebar = new bootstrap.Offcanvas(document.getElementById('updateEventSidebar'));
                  updateEventSidebar.show();
                }
              },
              error: function(xhr) {
                console.error('Error loading booking:', xhr);
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'Failed to load booking details'
                });
              }
            });
          }
        }
      });
      
      // Add a listener to the calendar's event rendering to set booking IDs
      const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
          if (mutation.addedNodes.length) {
            mutation.addedNodes.forEach(function(node) {
              if (node.classList && node.classList.contains('fc-event')) {
                // Extract booking ID from the event title or data
                const titleEl = node.querySelector('.fc-event-title');
                if (titleEl) {
                  const title = titleEl.textContent;
                  const match = title.match(/Book (\d+)/);
                  if (match && match[1]) {
                    node.setAttribute('data-booking-id', match[1]);
                  }
                }
              }
            });
          }
        });
      });
      
      // Start observing the calendar
      observer.observe(calendarEl, { childList: true, subtree: true });
    }
  }, 1000); // Wait for calendar to initialize
});
</script>

<script>
    // Initialize select2 elements for the create form
    $('#service_id').select2({
      dropdownParent: $("#addBookingModal"),
      placeholder: "Select Services",
      allowClear: true,
      multiple: true
    });

    $('#package_id').select2({
      dropdownParent: $("#addBookingModal"),
      placeholder: "Select Packages",
      allowClear: true,
      multiple: true
    });

    // Initialize select2 elements for the edit form
    $('#editServiceId').select2({
      dropdownParent: $("#editBookingModal"),
      placeholder: "Select Services",
      allowClear: true,
      multiple: true
    });

    $('#editPackageId').select2({
      dropdownParent: $("#editBookingModal"),
      placeholder: "Select Packages",
      allowClear: true,
      multiple: true
    });
</script>

@section('content')
<!-- Calendar Container -->
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- ... existing calendar header ... -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- ... existing calendar content ... -->

        <!-- View Booking Details Sidebar -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="viewBookingDetailsSidebar" 
             aria-labelledby="viewBookingDetailsSidebarLabel">
          <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="viewBookingDetailsSidebarLabel">Booking Details</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div class="booking-info mb-4">
              <div class="row g-3">
                <div class="col-12 mb-0">
                  <div id="booking-status-badge" class="mb-3"></div>

                  <h4 class="mb-1 fw-semibold" id="view-booking-title">Booking #12345</h4>
                  <p class="text-muted mb-0" id="view-booking-date">Wed, Jul 05, 2023 • 10:30 AM - 11:30 AM</p>
                </div>
              </div>
            </div>

            <div class="mb-4">
              <h6 class="fw-semibold">Patient Information</h6>
              <div class="d-flex align-items-center mb-3">
                <div class="avatar avatar-sm me-3">
                  <div class="avatar-initial rounded-circle bg-label-primary">
                    <i class="bx bx-user"></i>
                  </div>
                </div>
                <div>
                  <h6 class="mb-0" id="view-patient-name">John Doe</h6>
                  <small class="text-muted" id="view-patient-phone">+63 917 123 4567</small>
                </div>
              </div>
            </div>

            <div class="mb-4">
              <h6 class="fw-semibold">Booking Details</h6>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between px-0">
                  <span>Service/Package:</span>
                  <span id="view-service-name" class="text-end fw-medium">Facial Treatment</span>
                </li>
                <li class="list-group-item d-flex justify-content-between px-0">
                  <span>Staff:</span>
                  <span id="view-staff-name" class="text-end fw-medium">Dr. Smith</span>
                </li>
                <li class="list-group-item d-flex justify-content-between px-0">
                  <span>Branch:</span>
                  <span id="view-branch-name" class="text-end fw-medium">Main Branch</span>
                </li>
                <li class="list-group-item d-flex justify-content-between px-0">
                  <span>Price:</span>
                  <span id="view-price" class="text-end fw-medium">₱1,200.00</span>
                </li>
                <li class="list-group-item d-flex justify-content-between px-0">
                  <span>Payment Status:</span>
                  <span id="view-payment-status" class="text-end fw-medium">Paid</span>
                </li>
              </ul>
            </div>

            <!-- Booking Details section in view sidebar -->
            <div class="mb-4">
              <h6 class="fw-semibold">Remarks</h6>
              <p id="view-remarks" class="mb-0">No remarks added.</p>
            </div>

            <!-- Remove the buttons and replace with a single close button -->
            <div class="d-flex mt-4 pt-3 border-top">
              <button class="btn btn-outline-secondary w-100" type="button" data-bs-dismiss="offcanvas">
                <i class="bx bx-x-circle me-1"></i> Close
              </button>
            </div>
          </div>
        </div>
        <!-- /View Booking Details Sidebar -->
        
  <!-- Load our booking form fixes script -->
  <script src="{{ asset('fix-booking-form.js') }}"></script>


  <!-- Booking View & Delete Functionality -->
  <script>
  $(document).ready(function() {
    // Define booking URLs globally to avoid Blade syntax issues in JavaScript
    const rawDeleteBookingUrl = "{{ route('booking.delete') }}";
    const deleteBookingUrl = rawDeleteBookingUrl || "/booking/delete";
    
    // Log the value to help with debugging
    console.log("Delete booking URL initialized as:", deleteBookingUrl);
    
    // Function to handle booking deletion with improved error handling
    function deleteBooking(bookingId, onSuccess) {
      if (!bookingId) {
        console.error("Error: No booking ID provided for deletion");
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'No booking ID provided. Please try again.',
          confirmButtonText: 'OK'
        });
        return;
      }
      
      console.log("Attempting to delete booking ID:", bookingId);
      
      // Show loading state
      Swal.fire({
        title: 'Processing...',
        text: 'Cancelling the booking',
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading();
        }
      });
      
      // Function to attempt deletion with multiple URL formats
      function tryDelete(urlAttempt, isLastAttempt = false) {
        console.log(`Trying delete request to: ${urlAttempt} for booking ID: ${bookingId}`);
        
        $.ajax({
          url: urlAttempt,
          method: 'POST',
          data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            booking_id: bookingId,
            _method: 'DELETE'
          },
          success: function(response) {
            console.log("Success response:", response);
            if (response.success || response.status) {
              Swal.fire({
                icon: 'success',
                title: 'Booking Cancelled',
                text: 'The booking has been successfully cancelled.',
                confirmButtonText: 'OK'
              }).then(() => {
                if (typeof onSuccess === 'function') {
                  onSuccess();
                }
                // Remove the row from the table
                $(`tr[data-booking-id='${bookingId}']`).fadeOut(400, function() { $(this).remove(); });
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message || 'Failed to cancel booking',
                confirmButtonText: 'OK'
              });
            }
          },
          error: function(xhr, status, error) {
            console.error(`Error with URL ${urlAttempt}:`, status, error);
            console.error("Response:", xhr.responseText);
            
            if (!isLastAttempt) {
              // Try next URL format if this isn't the last attempt
              const nextUrl = urlAttempt === deleteBookingUrl ? '/booking/delete' : 
                             (urlAttempt === '/booking/delete' ? 'booking/delete' : '/api/bookings/delete');
              
              tryDelete(nextUrl, nextUrl === '/api/bookings/delete'); // Last attempt if using API endpoint
            } else {
              // Show final error message after trying all URL formats
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while cancelling the booking. Please try again or contact support.',
                confirmButtonText: 'OK'
              });
            }
          }
        });
      }
      
      // Start with the primary URL
      tryDelete(deleteBookingUrl);
    }
    
    // Handle View Booking Details click
    $(document).on('click', '.view-booking-details', function() {
      const bookingId = $(this).data('booking-id');
      
      // Show loading state
      Swal.fire({
        title: 'Loading...',
        text: 'Fetching booking details',
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading();
        }
      });
      
      // Fetch booking details via AJAX
      $.ajax({
        url: `/api/bookings/${bookingId}`,
        method: 'GET',
        success: function(data) {
          Swal.close();
          
          if (data) {
            // Update booking details in the sidebar
            $('#view-booking-title').text(`Booking #${data.booking_id}`);
            
            // Format date and time
            const startDate = new Date(data.start_date);
            const endDate = new Date(data.end_date);
            const formattedDate = startDate.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric', year: 'numeric' });
            const formattedStartTime = startDate.toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit', hour12: true });
            const formattedEndTime = endDate.toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit', hour12: true });
            
            $('#view-booking-date').text(`${formattedDate} • ${formattedStartTime} - ${formattedEndTime}`);
            
            // Set patient information
            if (data.patient) {
              $('#view-patient-name').text(`${data.patient.firstname} ${data.patient.lastname}`);
              $('#view-patient-phone').text(data.patient.phone || 'No phone number');
            } else {
              $('#view-patient-name').text('No patient information');
              $('#view-patient-phone').text('');
            }
            
            // Set service/package information
            let serviceText = 'Not specified';
            if (data.services && data.services.length > 0) {
              serviceText = data.services.map(service => service.service_name).join(', ');
            } else if (data.packages && data.packages.length > 0) {
              serviceText = data.packages.map(pkg => pkg.package_name).join(', ');
            }
            $('#view-service-name').text(serviceText);
            
            // Set staff information
            if (data.staff) {
              $('#view-staff-name').text(`${data.staff.firstname} ${data.staff.lastname}`);
            } else {
              $('#view-staff-name').text('Not assigned');
            }
            
            // Set branch information
            if (data.branch) {
              $('#view-branch-name').text(data.branch.branch_name);
            } else {
              $('#view-branch-name').text('Not specified');
            }
            
            // Set price and payment status
            $('#view-price').text(data.payment ? `₱${parseFloat(data.payment).toFixed(2)}` : 'Not specified');
            $('#view-payment-status').text(data.status || 'Not specified');
            
            // Set remarks
            $('#view-remarks').text(data.remarks || 'No remarks added.');
            
            // Set status badge
            const statusClass = 
              data.status === 'Pending' ? 'bg-label-warning' : 
              data.status === 'Paid' ? 'bg-label-info' : 
              data.status === 'Completed' ? 'bg-label-success' : 
              data.status === 'Cancelled' ? 'bg-label-danger' : 
              data.status === 'No Show' ? 'bg-label-secondary' : 'bg-label-primary';
            
            $('#booking-status-badge').html(`<span class="badge ${statusClass} py-2 px-3">${data.status}</span>`);
            
            // Open view sidebar
            const viewSidebar = new bootstrap.Offcanvas(document.getElementById('viewBookingDetailsSidebar'));
            viewSidebar.show();
          }
        },
        error: function(xhr) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Failed to load booking details: ' + (xhr.responseJSON?.message || 'Unknown error'),
            confirmButtonText: 'OK'
          });
        }
      });
    });
    
    // Handle Delete Booking click
    $(document).on('click', '.delete-booking', function() {
      const bookingId = $(this).data('booking-id');
      
      Swal.fire({
        title: 'Cancel This Booking?',
        text: "This will mark the booking as cancelled. This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ff3e1d',
        cancelButtonColor: '#8592a3',
        confirmButtonText: 'Yes, cancel it!',
        cancelButtonText: 'No, keep it'
      }).then((result) => {
        if (result.isConfirmed) {
          // Show loading state
          Swal.fire({
            title: 'Processing...',
            text: 'Cancelling the booking',
            allowOutsideClick: false,
            didOpen: () => {
              Swal.showLoading();
            }
          });
          
          console.log("Sending delete request for booking ID: " + bookingId + " to URL: " + deleteBookingUrl);
          
          // Send AJAX request to cancel the booking
          deleteBooking(bookingId, function() {
            // Reload page to refresh data
            window.location.reload();
          });
        }
      });
    });
    
    // Handle Delete button click in the edit booking form
    $(document).on('click', '.btn-delete-event', function() {
      const bookingId = $('#update_booking_id').val();
      
      if (!bookingId) {
        console.error("No booking ID found for deletion");
        return;
      }
      
      Swal.fire({
        title: 'Cancel This Booking?',
        text: "This will mark the booking as cancelled. This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ff3e1d',
        cancelButtonColor: '#8592a3',
        confirmButtonText: 'Yes, cancel it!',
        cancelButtonText: 'No, keep it'
      }).then((result) => {
        if (result.isConfirmed) {
          // Show loading state
          Swal.fire({
            title: 'Processing...',
            text: 'Cancelling the booking',
            allowOutsideClick: false,
            didOpen: () => {
              Swal.showLoading();
            }
          });
          
          console.log("Sending delete request from edit form for booking ID: " + bookingId + " to URL: " + deleteBookingUrl);
          
          // Send AJAX request to cancel the booking
          deleteBooking(bookingId, function() {
            // Close the update sidebar
            bootstrap.Offcanvas.getInstance(document.getElementById('updateEventSidebar')).hide();
            // Reload page to refresh data
            window.location.reload();
          });
        }
      });
    });
    
    // Save Quick Note functionality in view modal
    // This section has been removed as the client doesn't want the add note feature
  });
  </script>

  <script>
$(document).ready(function() {
    $('#service_id').on('change', function() {
        const selectedServiceId = $(this).val(); // Get selected service ID(s)

        if (selectedServiceId.length > 0) {
            $.ajax({
                url: "{{ route('loyalty.get_service_points') }}", // New route
                type: "GET",
                data: { service_ids: selectedServiceId },
                success: function(response) {
                    console.log("API Response:", response); // Debug API response
                    
                    if (response.success) {
                      
                        $('#points_needed_display').text(response.loyalty_pts); // Update points display
                    }
                },
                error: function(xhr) {
                    console.error("Error fetching service points:", xhr);
                    $('#points_needed_display').text('-'); // Fallback display
                }
            });
        } else {
            $('#points_needed_display').text('-'); // Reset display when no service is selected
        }
    });
});
  </script>

  <script>
$(document).ready(function() {
    $('input[name="useReward"]').on('change', function() {
        const selectedValue = $(this).val();
        const selectedServiceId = $('#service_id').val();

        if (selectedValue === 'Yes') {
            // Show points section, hide amount section
            $('#points_needed_section').show();
            $('#amount_needed_section').hide();
            $('#points_to_earn_section').hide(); // Hide points to earn when using points

            if (selectedServiceId && selectedServiceId.length > 0) {
                // Fetch points needed
                $.ajax({
                    url: "/service/get-points",
                    type: "GET",
                    data: { service_ids: selectedServiceId },
                    success: function(response) {
                        if (response.success) {
                            $('#points_needed_display').text(response.points_needed + " pts");
                        } else {
                            $('#points_needed_display').text('-');
                        }
                    },
                    error: function(xhr) {
                        console.error("Error fetching points needed:", xhr);
                        $('#points_needed_display').text('-');
                    }
                });
            } else {
                $('#points_needed_display').text('-');
            }
        } else {
            // Show amount section and points to earn, hide points needed
            $('#points_needed_section').hide();
            $('#amount_needed_section').show();
            $('#points_to_earn_section').show();

            if (selectedServiceId && selectedServiceId.length > 0) {
                // Fetch cost and points to earn
                $.ajax({
                    url: "/service/get-cost",
                    type: "GET",
                    data: { service_ids: selectedServiceId },
                    success: function(response) {
                        if (response.success) {
                            $('#amount_needed_display').text('₱' + response.total_cost.toFixed(2));
                            $('#points_to_earn_display').text(response.total_points + " pts");
                        } else {
                            $('#amount_needed_display').text('-');
                            $('#points_to_earn_display').text('-');
                        }
                    },
                    error: function(xhr) {
                        console.error("Error fetching service details:", xhr);
                        $('#amount_needed_display').text('-');
                        $('#points_to_earn_display').text('-');
                    }
                });
            } else {
                $('#amount_needed_display').text('-');
                $('#points_to_earn_display').text('-');
            }
        }
    });

    // Update when service selection changes
    $('#service_id').on('change', function() {
        $('input[name="useReward"]:checked').trigger('change');
    });
});

  </script>


<script>
$(document).ready(function() {
    $('input[name="useReward"]').on('change', function() {
        const useReward = $('input[name="useReward"]:checked').val();
        const selectedServiceId = $('#service_id').val(); // Get selected service(s)

        if (useReward === '1') {  // If "Yes" is selected
            $('#points_needed_section').show();
            $('#amount_needed_section').hide();
        } else {  // If "No" is selected, fetch service cost and points
            $('#points_needed_section').hide();
            $('#amount_needed_section').show();

            if (selectedServiceId.length > 0) {
                $.ajax({
                    url: "{{ route('service.get_cost') }}", // Fetch cost & points from database
                    type: "GET",
                    data: { service_ids: selectedServiceId },
                    success: function(response) {
                        console.log("Service Cost API Response:", response); // Debugging

                        if (response.success) {
                            $('#amount_needed_display').text('₱' + response.total_cost);
                            $('#summary_total_price').text('₱' + response.total_cost);
                            $('#points_to_earn_display').text(response.total_points + " Points"); // Display points
                            
                        } else {
                            $('#amount_needed_display').text('-');
                            $('#summary_total_price').text('₱');
                            $('#points_to_earn_display').text('-');
                        }
                    },
                    error: function(xhr) {
                        console.error("Error fetching service cost:", xhr);
                        $('#amount_needed_display').text('-');
                        $('#points_to_earn_display').text('-');
                    }
                });
            } else {
                $('#amount_needed_display').text('-'); // Reset display if no service is selected
                $('#points_to_earn_display').text('-'); 
            }
        }
    });

    $('#service_id').on('change', function() {
        $('input[name="useReward"]:checked').trigger('change'); // Refresh based on selection
    });
});
</script>

<script>
$(document).ready(function() {
    $('#package_id').on('change', function() {
        const selectedPackageIds = $(this).val();

        if (selectedPackageIds.length > 0) {
            $.ajax({
                url: "{{ route('package.get_cost') }}",
                type: "GET",
                data: { package_ids: selectedPackageIds },
                success: function(response) {
                    console.log("Package Cost API Response:", response); // Debugging output

                    if (response.success && response.total_cost) {
                        let totalCost = Number(response.total_cost);

                        // Update displayed amount and payment field
                        $('#amount_needed_display_price').text('₱' + totalCost);
                        $('#payment_amount').val(totalCost).prop('readonly', true); // Prevent user input
                        $('#summary_total_price').text('₱' + totalCost);
                        $('#summary_total_price_service').text('₱' + totalCost);
                        
                    } else {
                        console.error("Response missing total_cost:", response);
                        $('#amount_needed_display_price').text('-');
                        $('#payment_amount').val('-');
                         $('#summary_total_price').text('-');
                        $('#summary_total_price_service').text('-');
                    }
                },
                error: function(xhr) {
                    console.error("Error fetching package cost:", xhr.responseText);
                    $('#amount_needed_display_price').text('-');
                    $('#payment_amount').val('-');
                }
            });
        } else {
            $('#amount_needed_display_price').text('-');
            $('#payment_amount').val('-');
        }
    });
});
</script>

<!-- Points/Amount Section -->
<div class="mb-4">
    <!-- Points Needed Section (Initially Hidden) -->
    <div id="points_needed_section" style="display: none;">
        <label class="form-label">Points Needed</label>
        <div class="input-group">
            <span id="points_needed_display" class="form-control">-</span>
        </div>
    </div>

    <!-- Amount Needed Section -->
    <div id="amount_needed_section">
        <label class="form-label">Amount</label>
        <div class="input-group">
            <span id="amount_needed_display" class="form-control">-</span>
        </div>
    </div>

    <!-- Points to Earn Section -->
    <div id="points_to_earn_section">
        <label class="form-label">Points to Earn</label>
        <div class="input-group">
            <span id="points_to_earn_display" class="form-control">-</span>
        </div>
    </div>
</div>

</body>

</html>
