@extends('layouts.app')

<!DOCTYPE html>

<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default"
  data-assets-path="../../assets/" data-template="vertical-menu-template" data-bs-theme="light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

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

  <!-- End Google Tag Manager -->

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet" />

   <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />
<link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />



  <!-- Core CSS -->
  <!-- build:css assets/vendor/css/theme.css  -->

 <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />

 <link rel="stylesheet" href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />

  <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}">

  <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/chartjs/chartjs.css') }}" />

  <!-- Vendors CSS -->

  <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

  <!-- endbuild -->

  <link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/swiper/swiper.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/fonts/flag-icons.css') }}" />

  <!-- Page CSS -->
  <link rel="stylesheet" href="{{ asset('vendor/css/pages/cards-advance.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/sidebar-fix.css') }}" />

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


      <div class="menu-mobile-toggler d-xl-none rounded-1">
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
          <i class="ti tabler-menu icon-base"></i>
          <i class="ti tabler-chevron-right icon-base"></i>
        </a>
      </div>
      <!-- / Menu -->

       @include('components.sidebar')



      <!-- Layout container -->
      <div class="layout-page">


        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- KPI Cards Row -->
            <div class="row g-4 mb-4">
              <div class="col-lg-3 col-sm-6">
                <div class="card card-border-shadow-primary h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-primary">
                          <i class="icon-base ti tabler-calendar icon-28px"></i>
                        </span>
                      </div>
                      <div>
                        <h4 class="mb-0">{{ count($bookings) }}</h4>
                        <!-- <span class="badge bg-label-{{ $bookingGrowth >= 0 ? 'success' : 'danger' }}">{{ $bookingGrowth >= 0 ? '+' : '' }}{{ $bookingGrowth }}%</span> -->
                      </div>
                    </div>
                    <p class="mb-1">Total Completed Bookings</p>
                    <div class="d-flex align-items-center">
                      <div class="ms-auto">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-sm-6">
                <div class="card card-border-shadow-warning h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-warning">
                          <i class="icon-base ti tabler-shopping-cart icon-28px"></i>
                        </span>
                      </div>
                      <div>
                        <h4 class="mb-0">₱{{ number_format($bookings->where('status', 'Completed')->sum(function($booking) {
                            return $booking->services->sum('service_cost');
                        }), 2) }}</h4>
                        <!-- <span class="badge bg-label-success">+8.4%</span> -->
                      </div>
                    </div>
                    <p class="mb-1">Total Revenue</p>
                    <div class="d-flex align-items-center">
                      <div class="ms-auto">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-sm-6">
                <div class="card card-border-shadow-danger h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-danger">
                          <i class="icon-base ti tabler-users icon-28px"></i>
                        </span>
                      </div>
                      <div>
                        <h4 class="mb-0">
                          {{ count($patients) }}
                        </h4>
                      <!-- <span class="badge bg-label-{{ $patientGrowth > 0 ? 'success' : 'danger' }}">
            {{ $patientGrowth > 0 ? '+' : '' }}{{ number_format($patientGrowth, 1) }}%
          </span> -->
                      </div>
                    </div>
                    <p class="mb-1">Total Customers</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-sm-6">
                <div class="card card-border-shadow-danger h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                      <div class="avatar me-4">
                        <span class="avatar-initial rounded bg-label-danger">
                          <i class="icon-base ti tabler-receipt icon-28px"></i>
                        </span>
                      </div>
                      <div>
                        <h4 class="mb-0">₱{{ number_format($totalExpenses, 2) }}</h4>
                        <!-- <span class="badge bg-label-warning">+3.2%</span> -->
                      </div>
                    </div>
                    <p class="mb-1">Total Expenses</p>
                    <div class="d-flex align-items-center">
                      <div class="ms-auto">
                      </div>
                    </div>
                  </div>
                </div>
              </div>






            <!-- Add spacing here -->
            <div class="mb-3"></div>

            <!-- Dynamic Banner Section -->
            <div class="col-12 col-lg-14">
              <div class="col-lg-12">
                @if(count($todayBirthdays) > 0 || count($upcomingBirthdays) > 0)
                  <!-- Birthday Banner (existing code) -->
                  <div class="card text-white border-0 shadow-lg"
                    style="background: linear-gradient(135deg, #47d2b4, #53b5cf); border-radius: 15px;">
                    <div class="card-body p-4 d-flex justify-content-between align-items-center position-relative overflow-hidden">
                      <!-- Confetti Animation -->
                      <div class="position-absolute w-100 h-100" id="confetti-container"></div>

                      <!-- Text Content -->
                      <div>
                        <h3 class="text-white fw-bold">🎉 Happy Birthday to Our Valued Clients! 🎂</h3>
                      </div>

                      <!-- Birthday Image -->
                      <div class="d-none d-md-block">
                        <img src="https://png.pngtree.com/template/20241213/ourmid/pngtree-happy-birthday-greeting-vector-design-lettering-in-blue-space-with-gift-image_2037581.jpg"
                          alt="Birthday celebration"
                          style="max-height: 200px; transform: rotate(-5deg); border-radius: 10px;">
                      </div>
                    </div>
                  </div>
                @else
                  <!-- Imajica Aesthetics Banner -->
                  <div class="card text-white border-0 shadow-lg"
                    style="background: linear-gradient(135deg, #2c3e50, #3498db); border-radius: 15px;">
                    <div class="card-body p-4 d-flex justify-content-between align-items-center position-relative overflow-hidden">
                      <!-- Text Content -->
                      <div>
                        <h3 class="text-white fw-bold mb-2">✨ Welcome to Imajica Aesthetics</h3>
                        <p class="text-white mb-3">Experience luxury beauty and wellness treatments tailored just for you.</p>
                        <a href="{{ route('page.booking') }}" class="btn btn-primary">
                          <i class="ti tabler-calendar-plus me-1"></i>
                          Book an Appointment
                        </a>
                      </div>

                      <!-- Decorative Elements -->
                      <div class="d-none d-md-block">
                        <img src="{{ asset('logo/imajica.png') }}"
                          alt="Imajica Aesthetics"
                          style="max-height: 180px; border-radius: 10px;">
                      </div>

                      <!-- Background Decoration -->
                      <div class="position-absolute top-0 end-0 opacity-25">

                      </div>
                    </div>
                  </div>
                @endif
              </div>
            </div>

            <!-- Confetti Animation Script -->
            <script>
              document.addEventListener("DOMContentLoaded", function () {
                const confettiContainer = document.getElementById("confetti-container");
                for (let i = 0; i < 50; i++) {
                  let confetti = document.createElement("div");
                  confetti.style.position = "absolute";
                  confetti.style.width = "10px";
                  confetti.style.height = "10px";
                  confetti.style.backgroundColor = `hsl(${Math.random() * 360}, 100%, 85%)`;
                  confetti.style.left = `${Math.random() * 100}%`;
                  confetti.style.top = `${Math.random() * 100}%`;
                  confetti.style.opacity = Math.random();
                  confetti.style.animation = `falling ${3 + Math.random() * 3}s linear infinite`;
                  confetti.style.borderRadius = "50%";
                  confettiContainer.appendChild(confetti);
                }
              });

              /* Confetti Animation */
              const style = document.createElement("style");
              style.innerHTML = `
    @keyframes falling {
      0% { transform: translateY(-10px) rotate(0); opacity: 1; }
      100% { transform: translateY(100vh) rotate(360deg); opacity: 0; }
    }
  `;
              document.head.appendChild(style);

            </script>




 <!-- Enhanced Birthday Card -->
 <div class="col-12 col-lg-14">
                <div class="card">
                  <div
                    class="card-header d-flex justify-content-between align-items-center bg-primary bg-opacity-10 p-4">
                    <div>
                      <h5 class="card-title mb-1">
                        <i class="ti tabler-gift me-2 text-primary"></i>
                        Customer Birthdays
                      </h5>
                      <p class="text-muted mb-0 small">
                        Stay connected with your customers on their special day
                      </p>
                    </div>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#allBirthdaysModal">
                      <i class="ti tabler-list me-1"></i>View All
                    </button>
                  </div>

                  <!-- Today's Birthday Section -->
                  <div class="card-body border-bottom p-4">
                    <h6 class="text-primary mb-3">
                      <i class="ti tabler-confetti me-2"></i>
                      Today's Birthdays
                    </h6>
                    <div class="birthday-today">
                      @if(count($todayBirthdays) > 0)
                        @foreach($todayBirthdays as $patient)
                        <li class="d-flex mb-2 pb-1 birthday-item position-relative">
                          <div class="avatar flex-shrink-0 me-3">
                            <span
                              class="avatar-initial rounded-circle bg-label-danger d-flex align-items-center justify-content-center"
                              style="width: 45px; height: 45px">
                              <i class="icon-base ti tabler-confetti icon-md"></i>
                            </span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0 fw-semibold">{{ $patient->firstname }} {{ $patient->lastname }}</h6>
                              <div class="d-flex align-items-center mt-1">
                                <i class="ti tabler-calendar-event text-muted me-1"></i>
                                <small class="text-body-secondary">{{ Carbon\Carbon::parse($patient->birthdate)->format('F d, Y') }} ({{ $patient->age }} years)</small>
                                <span class="badge bg-label-danger ms-2 px-2 py-1">
                                  <i class="ti tabler-party-popper me-1"></i>Today
                                </span>
                              </div>
                            </div>
                          </div>
                        </li>
                        @endforeach
                      @else
                        <p class="text-center text-muted my-3">No birthdays today</p>
                      @endif
                    </div>
                  </div>

                  <!-- Upcoming Birthdays Section -->
                  <div class="card-body p-4">
                    <h6 class="text-primary mb-3">
                      <i class="ti tabler-calendar-event me-2"></i>
                      Upcoming Birthdays
                    </h6>
                    <ul class="p-0 m-0">
                      @if(count($upcomingBirthdays) > 0)
                        @foreach($upcomingBirthdays->take(5) as $patient)
                        <li class="d-flex mb-4 pb-1 birthday-item position-relative">
                          <div class="avatar flex-shrink-0 me-3">
                            <span
                              class="avatar-initial rounded-circle bg-label-{{ $patient->daysUntil <= 7 ? 'primary' : 'success' }} d-flex align-items-center justify-content-center"
                              style="width: 45px; height: 45px">
                              <i class="icon-base ti tabler-cake icon-md"></i>
                            </span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0 fw-semibold">{{ $patient->firstname }} {{ $patient->lastname }}</h6>
                              <div class="d-flex align-items-center mt-1">
                                <i class="ti tabler-calendar-event text-muted me-1"></i>
                                <small class="text-body-secondary">{{ Carbon\Carbon::parse($patient->birthdate)->format('F d, Y') }}</small>
                                <span class="badge bg-label-{{ $patient->daysUntil <= 7 ? 'primary' : 'success' }} ms-2 px-2 py-1">
                                  <i class="ti tabler-clock me-1"></i>In {{ $patient->daysUntil }} days
                                </span>
                              </div>
                            </div>
                            <div class="dropdown">
                              <button class="btn btn-icon btn-text-secondary rounded-pill dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti tabler-dots-vertical"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-end show-on-hover">
                                <li>
                                  <a class="dropdown-item" href="#" data-action="send-wishes" data-patient="{{ $patient->patient_id }}">
                                    <i class="ti tabler-mail me-2"></i>Send Wishes
                                  </a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="#" data-action="send-offers" data-patient="{{ $patient->patient_id }}">
                                    <i class="ti tabler-gift me-2"></i>Send Offer
                                  </a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="#">
                                    <i class="ti tabler-calendar-plus me-2"></i>Schedule Service
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </li>
                        @endforeach
                      @else
                        <p class="text-center text-muted my-3">No upcoming birthdays in the next 30 days</p>
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
            </div>



            <!-- Charts Row -->
            <div class="row g-4 mb-4">
              <div class="col-12 col-lg-13">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Revenue Overview</h5>
                    <div class="d-flex gap-2">
                      <button class="btn btn-sm btn-outline-primary" onclick="exportChartData('revenueChart')">
                        <i class="ti tabler-download me-1"></i>Export Data
                      </button>
                      <!-- <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                          data-bs-toggle="dropdown">
                          2024
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">2024</a></li>
                          <li><a class="dropdown-item" href="#">2023</a></li>
                          <li><a class="dropdown-item" href="#">2022</a></li>
                        </ul>
                      </div> -->
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="revenueChart" class="chartjs" height="350"></canvas>
                  </div>
                </div>
              </div>
              <!-- Add new line chart -->

              <div class="col-15 col-lg-6">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Popular Services</h5>
                    <button class="btn btn-sm btn-outline-primary" onclick="exportChartData('popularServicesChart')">
                      <i class="ti tabler-download me-1"></i>Export Data
                    </button>
                  </div>
                  <div class="card-body">
                    <canvas id="popularServicesChart" class="chartjs" height="350"></canvas>
                  </div>
                </div>
              </div>

              <!-- Add new donut chart -->
              <div class="col-15 col-lg-6">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                      Booking Status Distribution
                    </h5>
                    <button class="btn btn-sm btn-outline-primary" onclick="exportChartData('bookingStatusChart')">
                      <i class="ti tabler-download me-1"></i>Export Data
                    </button>
                  </div>
                  <div class="card-body">
                    <canvas id="bookingStatusChart" class="chartjs" height="350"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Popular Services Gantt Chart -->
            <div class="row g-4 mb-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Popular Services Timeline</h5>
                    <button class="btn btn-sm btn-outline-primary" onclick="exportChartData('servicesGanttChart')">
                      <i class="ti tabler-download me-1"></i>Export Data
                    </button>
                  </div>
                  <div class="card-body">
                    <canvas id="servicesGanttChart" height="400"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Branch Performance Chart -->
            <div class="row g-4 mb-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                      Branch Performance Overview
                    </h5>
                    <div class="d-flex gap-2">
                      <button class="btn btn-sm btn-outline-primary"
                        onclick="exportChartData('branchPerformanceChart')">
                        <i class="ti tabler-download me-1"></i>Export Data
                      </button>
                      <!-- <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                          data-bs-toggle="dropdown">
                          This Month
                        </button>
                        <ul class="dropdown-menu">
                          <li>
                            <a class="dropdown-item" href="#">This Month</a>
                          </li>
                          <li>
                          <li>
                            <a class="dropdown-item" href="#">This Month</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">Last Month</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">This Quarter</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">This Year</a>
                          </li>
                        </ul>
                      </div> -->
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="branchPerformanceChart" height="300"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Recent Bookings Table
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center p-4">
                    <div>
                      <h5 class="card-title mb-1">Recent Bookings</h5>
                      <p class="text-muted mb-0 small">
                        Overview of latest transactions
                      </p>
                    </div>
                    <div class="d-flex gap-2">
                      <div class="dropdown">
                        <ul class="dropdown-menu">
                          <li>
                            <a class="dropdown-item" href="#">All Bookings</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">Completed</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">Pending</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">Cancelled</a>
                          </li>
                        </ul>
                      </div>
                      <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#viewAllBookingsModal">
                        <i class="ti tabler-list me-1"></i>View All
                      </button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover booking-table">
                      <thead class="table-light">
                        <tr>
                          <th>Booking ID</th>
                          <th>Patient</th>
                          <th>Service</th>
                          <th>Date & Time</th>
                          <th>Amount</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
    @foreach($bookings as $booking)
    <tr>
        <td># {{ $booking->booking_id }}</td>
        <td>
            @if($booking->patient)
                {{ $booking->patient->firstname }} {{ $booking->patient->lastname }}
            @else
                <span class="text-muted">No patient data</span>
            @endif
        </td>
        <td>
            @if($booking->services->isNotEmpty())
                {{ $booking->services->pluck('service_name')->join(', ') }}
            @else
                <span class="text-muted">No service data</span>
            @endif
        </td>
        <td>{{ Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }} at {{ Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }}</td>
        <td>
            @if($booking->services->isNotEmpty())
                ₱{{ number_format($booking->services->sum('service_cost'), 2) }}
            @else
                <span class="text-muted">N/A</span>
            @endif
        </td>
        <td>
            <span class="badge bg-label-{{ $booking->status == 'Paid' && 'Completed' ? 'success' : ($booking->status == 'Pending' ? 'warning' : 'danger') }}">
                {{ ucfirst($booking->status) }}
            </span>
        </td>
    </tr>
    @endforeach
</tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
              <div
                class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
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
<script src="{{ asset('vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('vendor/libs/swiper/swiper.js') }}"></script>
<script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset( 'assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('vendor/libs/chartjs/chartjs.js') }}"></script>
<script src="{{ asset('assets/js/charts-chartjs-legend.js') }}"></script>
<script src="{{ asset('assets/js/charts-chartjs.js') }}"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Wait for Chart.js to be available
      const initCharts = () => {
        if (typeof Chart === 'undefined') {
          // If Chart is not loaded yet, try again in 100ms
          setTimeout(initCharts, 100);
          return;
        }

        // Revenue Overview Line Chart
        const revenueCtx = document
          .getElementById("revenueChart")
          .getContext("2d");
        const revenueChart = new Chart(revenueCtx, {
          type: "line",
          data: {
            labels: [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "May",
              "Jun",
              "Jul",
              "Aug",
              "Sep",
              "Oct",
              "Nov",
              "Dec",
            ],
            datasets: [
              {
                label: "Revenue {{ date('Y') }}",
                data: [
                  @php
                    $currentYear = date('Y');
                    $monthlyRevenue = [];

                    // Initialize monthly revenue array with zeros
                    for ($i = 1; $i <= 12; $i++) {
                      $monthlyRevenue[$i] = 0;
                    }

                    // Calculate revenue for each month
                    foreach ($bookings as $booking) {
                      if ($booking->status === 'Completed' || $booking->status === 'Paid') {
                        $month = Carbon\Carbon::parse($booking->booking_date)->month;
                        $year = Carbon\Carbon::parse($booking->booking_date)->year;

                        if ($year == $currentYear) {
                          $monthlyRevenue[$month] += $booking->services->sum('service_cost');
                        }
                      }
                    }

                    // Output the monthly revenue data
                    echo implode(', ', $monthlyRevenue);
                  @endphp
                ],
                borderColor: function (context) {
                  const chart = context.chart;
                  const { ctx, chartArea } = chart;
                  if (!chartArea) {
                    return null;
                  }
                  const gradient = ctx.createLinearGradient(
                    0,
                    0,
                    chartArea.width,
                    0
                  );
                  gradient.addColorStop(0, "#c4cfd9"); // Light blue
                  gradient.addColorStop(1, "#00d761"); // Dark blue
                  return gradient;
                },
                tension: 0.4,
                fill: true,
                backgroundColor: "rgba(105, 108, 255, 0.1)",
              },
              {
                label: "Revenue {{ date('Y') - 1 }}",
                data: [
                  @php
                    $lastYear = date('Y') - 1;
                    $lastYearMonthlyRevenue = [];

                    // Initialize last year's monthly revenue array with zeros
                    for ($i = 1; $i <= 12; $i++) {
                      $lastYearMonthlyRevenue[$i] = 0;
                    }

                    // Calculate revenue for each month of last year
                    foreach ($bookings as $booking) {
                      if ($booking->status === 'Completed' || $booking->status === 'Paid') {
                        $month = Carbon\Carbon::parse($booking->booking_date)->month;
                        $year = Carbon\Carbon::parse($booking->booking_date)->year;

                        if ($year == $lastYear) {
                          $lastYearMonthlyRevenue[$month] += $booking->services->sum('service_cost');
                        }
                      }
                    }

                    // Output the last year's monthly revenue data
                    echo implode(', ', $lastYearMonthlyRevenue);
                  @endphp
                ],
                borderColor: function (context) {
                  const chart = context.chart;
                  const { ctx, chartArea } = chart;
                  if (!chartArea) {
                    return null;
                  }
                  const gradient = ctx.createLinearGradient(
                    0,
                    0,
                    chartArea.width,
                    0
                  );
                  gradient.addColorStop(0, "#c4cfd9"); // Light gray
                  gradient.addColorStop(1, "#da9100"); // Dark slate
                  return gradient;
                },
                tension: 0.4,
                fill: true,
                backgroundColor: "rgba(3, 195, 236, 0.1)",
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                position: "top",
              },
              title: {
                display: true,
                text: "Monthly Revenue Overview",
              },
            },
            scales: {
              y: {
                beginAtZero: true,
                ticks: {
                  callback: function (value) {
                    return "₱" + value.toLocaleString();
                  },
                },
              },
            },
          },
        });

        // Popular Services Pie Chart
        const popularServicesCtx = document.getElementById('popularServicesChart');
        if (popularServicesCtx) {
          const services = @json($services);
          const totalBookings = services.reduce((sum, service) => sum + service.booking_count, 0);

          new Chart(popularServicesCtx, {
            type: 'pie',
            data: {
              labels: services.map(service => service.service_name),
              datasets: [{
                data: services.map(service => service.booking_count),
                backgroundColor: [
                  '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b',
                  '#5a5c69', '#858796', '#6f42c1', '#20c9a6', '#f8f9fc'
                ]
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                legend: {
                  position: 'bottom'
                },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      const value = context.raw;
                      const percentage = ((value / totalBookings) * 100).toFixed(1);
                      return `${context.label}: ${value} bookings (${percentage}%)`;
                    }
                  }
                }
              }
            }
          });
        }

        // Popular Services Gantt Chart
        const servicesGanttCtx = document.getElementById('servicesGanttChart');
        if (servicesGanttCtx) {
          const services = @json($services);

          // Sort services by booking count
          const sortedServices = [...services].sort((a, b) => b.booking_count - a.booking_count);

          // Get the last 6 months
          const months = [];
          for (let i = 5; i >= 0; i--) {
            const date = new Date();
            date.setMonth(date.getMonth() - i);
            months.push(date.toLocaleString('default', { month: 'short' }));
          }

          // Create datasets for each service
          const datasets = sortedServices.slice(0, 5).map((service, index) => {
            // Use the monthly_data from the service if available, otherwise use booking_count
            const data = service.monthly_data || Array(6).fill(service.booking_count / 6);

            return {
              label: service.service_name,
              data: data,
              backgroundColor: `hsla(${index * 72}, 70%, 50%, 0.7)`,
              borderColor: `hsl(${index * 72}, 70%, 50%)`,
              borderWidth: 1,
              borderRadius: 4,
              barPercentage: 0.8,
              categoryPercentage: 0.9
            };
          });

          new Chart(servicesGanttCtx, {
            type: 'bar',
            data: {
              labels: months,
              datasets: datasets
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                legend: {
                  position: 'top',
                },
                title: {
                  display: true,
                  text: 'Service Popularity Over Time'
                },
                tooltip: {
                  callbacks: {
                    label: function(context) {
                      return `${context.dataset.label}: ${context.raw} bookings`;
                    }
                  }
                }
              },
              scales: {
                x: {
                  stacked: true,
                  grid: {
                    display: false
                  }
                },
                y: {
                  stacked: true,
                  beginAtZero: true,
                  title: {
                    display: true,
                    text: 'Number of Bookings'
                  }
                }
              }
            }
          });
        }

        // Branch Performance Chart
        const branchPerformanceChart = new Chart(
          document.getElementById("branchPerformanceChart").getContext("2d"),
          {
            type: "bar",
            data: {
              labels: {!! json_encode($branchData->pluck('name')) !!},
              datasets: [
                {
                  label: "Bookings",
                  data: {!! json_encode($branchData->pluck('bookings')) !!},
                  backgroundColor: "#696cff",
                },
                {
                  label: "Revenue",
                  data: {!! json_encode($branchData->pluck('revenue')) !!},
                  backgroundColor: "#28c76f",
                },
              ],
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                legend: {
                  position: "top",
                },
                title: {
                  display: true,
                  text: "Branch Performance Overview",
                },
              },
              scales: {
                y: {
                  beginAtZero: true,
                  position: "left",
                  ticks: {
                    callback: function (value) {
                      return this.chart.data.datasets[1].label === "Revenue"
                        ? "₱" + value.toLocaleString()
                        : value;
                    },
                  },
                },
              },
            },
          }
        );

        // Booking Status Donut Chart
        const bookingStatusCtx = document.getElementById("bookingStatusChart").getContext("2d");
        const bookingStatusChart = new Chart(bookingStatusCtx, {
          type: "doughnut",
          data: {
            labels: ["Completed", "Pending", "Cancelled", "Paid", "No Show"],
            datasets: [{
              data: [
                {{ $bookings->where('status', 'Completed')->count() }},
                {{ $bookings->where('status', 'Pending')->count() }},
                {{ $bookings->where('status', 'Cancelled')->count() }},
                {{ $bookings->where('status', 'Paid')->count() }},
                {{ $bookings->where('status', 'No Show')->count() }}
              ],
              backgroundColor: [
                "#28c76f",  // Completed - Green
                "#ffab00",  // Pending - Yellow/Orange
                "#ff3e1d",  // Cancelled - Red
                "#00cfe8",  // Paid - Blue
                "#6c757d"   // No Show - Gray
              ],
              borderWidth: 0,
              cutout: "75%",
            }],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                position: "bottom",
              },
              title: {
                display: true,
                text: "Current Month Booking Status",
              },
              tooltip: {
                callbacks: {
                  label: function(context) {
                    const label = context.label || "";
                    const value = context.parsed;
                    const total = context.dataset.data.reduce((acc, curr) => acc + curr, 0);
                    const percentage = ((value / total) * 100).toFixed(1);
                    return `${label}: ${value} (${percentage}%)`;
                  },
                },
              },
            },
          },
        });
      };

      // Start initialization
      initCharts();
    });

    // Export functionality
    function exportChartData(chartId) {
      const chart = Chart.getChart(chartId);
      if (!chart) return;

      let csvContent = "";
      let filename = "";

      if (chart.config.type === "bar") {
        // For bar charts
        csvContent = "Branch,";
        // Add headers for each dataset
        chart.data.datasets.forEach((dataset, index) => {
          csvContent +=
            dataset.label +
            (index < chart.data.datasets.length - 1 ? "," : "\n");
        });
        // Add data rows
        chart.data.labels.forEach((branch, i) => {
          csvContent += branch + ",";
          chart.data.datasets.forEach((dataset, j) => {
            const value =
              dataset.label === "Revenue"
                ? "₱" + dataset.data[i].toLocaleString()
                : dataset.data[i];
            csvContent +=
              value + (j < chart.data.datasets.length - 1 ? "," : "\n");
          });
        });
        filename = "branch_performance_data.csv";
      } else if (
        chart.config.type === "pie" ||
        chart.config.type === "doughnut"
      ) {
        // Existing pie/donut chart logic
        csvContent = "Status,Percentage\n";
        chart.data.labels.forEach((label, i) => {
          const value = chart.data.datasets[0].data[i];
          const total = chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
          const percentage = ((value / total) * 100).toFixed(2);
          csvContent += `${label},${percentage}%\n`;
        });
        filename =
          chartId === "bookingStatusChart"
            ? "booking_status_data.csv"
            : "services_data.csv";
      } else if (chart.config.type === "line") {
        // Existing line chart logic
        csvContent = "Month,";
        chart.data.datasets.forEach((dataset, index) => {
          csvContent +=
            dataset.label +
            (index < chart.data.datasets.length - 1 ? "," : "\n");
        });
        chart.data.labels.forEach((label, i) => {
          csvContent += label + ",";
          chart.data.datasets.forEach((dataset, j) => {
            csvContent +=
              dataset.data[i] +
              (j < chart.data.datasets.length - 1 ? "," : "\n");
          });
        });
        filename = "revenue_data.csv";
      }

      // Create and trigger export
      const blob = new Blob([csvContent], {
        type: "text/csv;charset=utf-8;",
      });
      const link = document.createElement("a");
      const url = URL.createObjectURL(blob);

      link.setAttribute("href", url);
      link.setAttribute("download", filename);
      link.style.visibility = "hidden";
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
  </script>

  <style>
    /* Add these styles to your CSS */
    .birthday-item {
      transition: all 0.3s ease;
      border-radius: 0.5rem;
      padding: 1rem;
    }

    .birthday-item:hover {
      background-color: rgba(105, 108, 255, 0.04);
      transform: translateX(5px);
    }

    .avatar-initial {
      transition: all 0.3s ease;
    }

    .birthday-item:hover .avatar-initial {
      transform: scale(1.1);
    }

    .badge {
      font-size: 0.75rem;
    }

    .dropdown-toggle::after {
      display: none;
    }

    /* Add these additional styles */
    .birthday-today {
      position: relative;
      padding: 1rem;
      background: linear-gradient(to right,
          rgba(105, 108, 255, 0.04),
          rgba(105, 108, 255, 0.08));
      border-radius: 0.5rem;
      border: 1px dashed rgba(105, 108, 255, 0.4);
    }

    .birthday-today::before {
      content: "🎉";
      position: absolute;
      top: -10px;
      right: -10px;
      font-size: 1.5rem;
    }

    .action-buttons .btn {
      transition: all 0.3s ease;
    }

    .action-buttons .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    }


    /* Add to your existing styles */
    .menu-sub {
      display: none;
    }

    .menu-item.open>.menu-sub {
      display: block;
    }

    .menu-item.active>.menu-link {
      background-color: rgba(10, 54, 34, 0.1) !important;
      color: #0a3622 !important;
    }

    .menu-sub .menu-item.active>.menu-link {
      background-color: rgba(10, 54, 34, 0.1) !important;
    }

    /* Add after existing styles */
    .menu-sub {
      display: none;
    }

    .menu-sub.show {
      display: block;
    }

    .menu-toggle {
      cursor: pointer;

      /* Add these styles to your existing CSS */
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

      .btn-hover-scale {
        transition: all 0.2s ease;
      }

      .btn-hover-scale:hover {
        transform: scale(1.15);
      }

      .badge {
        padding: 0.5em 0.9em;
        font-weight: 500;
      }

      .avatar-sm {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .avatar-initial {
        font-size: 0.8rem;
        font-weight: 500;
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

      .table-light {
        --bs-table-bg: rgba(105, 108, 255, 0.04);
      }

      .card-header {
        border-bottom: 1px solid rgba(105, 108, 255, 0.1);
      }

      /* Add these styles to your existing CSS */
      .birthday-calendar {
        max-height: 60vh;
        overflow-y: auto;
      }

      .month-grid {
        display: grid;
        gap: 1.5rem;
      }

      .month-card {
        background: #fff;
        border-radius: 0.5rem;
        border: 1px solid rgba(105, 108, 255, 0.1);
        overflow: hidden;
      }

      .month-card.current-month {
        border: 1px solid rgba(105, 108, 255, 0.3);
        box-shadow: 0 0 0.5rem rgba(105, 108, 255, 0.1);
      }

      .month-title {
        padding: 1rem;
        margin: 0;
        background: rgba(105, 108, 255, 0.04);
        border-bottom: 1px solid rgba(105, 108, 255, 0.1);
      }

      .birthday-list .birthday-item {
        transition: all 0.3s ease;
      }

      .birthday-list .birthday-item:hover {
        background: rgba(105, 108, 255, 0.04);
      }

      .avatar-md {
        width: 45px;
        height: 45px;
      }

      #birthdaySearch:focus,
      #birthdayFilter:focus {
        border-color: #696cff;
        box-shadow: 0 0 0 0.25rem rgba(105, 108, 255, 0.1);
      }

      .modal-dialog-scrollable .modal-content {
        max-height: 80vh;
      }

      /* Custom scrollbar for the birthday calendar */
      .birthday-calendar::-webkit-scrollbar {
        width: 6px;
      }

      .birthday-calendar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
      }

      .birthday-calendar::-webkit-scrollbar-thumb {
        background: #696cff;
        border-radius: 3px;
      }

      .birthday-calendar::-webkit-scrollbar-thumb:hover {
        background: #555;
      }
  </style>

  <!-- Send Wishes Modal -->
  <div class="modal fade" id="sendWishesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary bg-opacity-10">
          <h5 class="modal-title">
            <i class="ti tabler-mail me-2 text-primary"></i>
            Send Birthday Wishes
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 mb-3">
              <div class="d-flex align-items-center mb-3">
                <div class="avatar avatar-sm me-2">
                  <span class="avatar-initial rounded-circle bg-label-primary">JS</span>
                </div>
                <div>
                  <h6 class="mb-0">John Smith</h6>
                  <small class="text-muted">Regular Client</small>
                </div>
              </div>
            </div>
            <div class="col-12 mb-3">
              <label class="form-label">Select Template</label>
              <select class="form-select">
                <option value="1">Birthday Greeting - Standard</option>
                <option value="2">Birthday Greeting - VIP Client</option>
                <option value="3">Birthday Greeting - Premium</option>
                <option value="4">Custom Message</option>
              </select>
            </div>
            <div class="col-12 mb-3">
              <label class="form-label">Message</label>
              <textarea class="form-control" rows="4">
Dear [Client Name],

Happy Birthday! 🎉 We hope your special day is filled with joy and wonderful moments. As a valued client of Imajica, we want to make your birthday extra special.

Best wishes,
The Imajica Team</textarea>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="sendCopy" />
                <label class="form-check-label" for="sendCopy">
                  Send me a copy of this message
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
            Cancel
          </button>
          <button type="button" class="btn btn-primary">
            <i class="ti tabler-send me-1"></i>
            Send Wishes
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Send Offers Modal -->
  <div class="modal fade" id="sendOffersModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary bg-opacity-10">
          <h5 class="modal-title">
            <i class="ti tabler-gift me-2 text-primary"></i>
            Send Birthday Offer
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 mb-3">
              <div class="d-flex align-items-center mb-3">
                <div class="avatar avatar-sm me-2">
                  <span class="avatar-initial rounded-circle bg-label-primary">JS</span>
                </div>
                <div>
                  <h6 class="mb-0">John Smith</h6>
                  <small class="text-muted">Regular Client</small>
                </div>
              </div>
            </div>
            <div class="col-12 mb-3">
              <label class="form-label">Select Offer Type</label>
              <select class="form-select mb-3">
                <option value="1">Birthday Discount - 20% Off</option>
                <option value="2">Birthday Spa Package</option>
                <option value="3">Free Service Add-on</option>
                <option value="4">Custom Offer</option>
              </select>
            </div>
            <div class="col-12 mb-3">
              <label class="form-label">Validity Period</label>
              <div class="input-group">
                <input type="number" class="form-control" value="30" />
                <span class="input-group-text">days</span>
              </div>
              <small class="text-muted">Number of days the offer will be valid</small>
            </div>
            <div class="col-12 mb-3">
              <label class="form-label">Offer Message</label>
              <textarea class="form-control" rows="4">
Dear [Client Name],

As a birthday treat, we're delighted to offer you a special 20% discount on any service of your choice. This exclusive offer is valid for 30 days from your birthday.

Terms & Conditions:
- Valid for one-time use only
- Cannot be combined with other offers
- Must be redeemed within the validity period

Happy Birthday!
The Imajica Team</textarea>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="sendSMS" checked />
                <label class="form-check-label" for="sendSMS">
                  Also send offer via SMS
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
            Cancel
          </button>
          <button type="button" class="btn btn-primary">
            <i class="ti tabler-gift me-1"></i>
            Send Offer
          </button>
        </div>
      </div>
    </div>
  </div>

  <style>
    /* Add these styles to your existing CSS */
    .modal-header {
      border-bottom: 1px solid rgba(105, 108, 255, 0.1);
    }

    .modal-footer {
      border-top: 1px solid rgba(105, 108, 255, 0.1);
    }

    .form-check-input:checked {
      background-color: #696cff;
      border-color: #696cff;
    }

    .modal .btn-close {
      background-color: transparent;
      border-radius: 50%;
      padding: 0.5rem;
      transition: all 0.2s ease;
    }

    .modal .btn-close:hover {
      background-color: rgba(105, 108, 255, 0.1);
      transform: scale(1.1);
    }

    .modal textarea {
      resize: none;
    }

    .modal .form-control:focus,
    .modal .form-select:focus {
      border-color: #696cff;
      box-shadow: 0 0 0 0.25rem rgba(105, 108, 255, 0.1);

    }
  </style>


  <script>
    // Add this to your existing JavaScript
    document.addEventListener("DOMContentLoaded", function () {
      // Function to open Send Wishes Modal
      function openSendWishesModal() {
        const modal = new bootstrap.Modal(
          document.getElementById("sendWishesModal")
        );
        modal.show();
      }

      // Function to open Send Offers Modal
      function openSendOffersModal() {
        const modal = new bootstrap.Modal(
          document.getElementById("sendOffersModal")
        );
        modal.show();
      }

      // Add click event listeners to the menu items
      document
        .querySelectorAll('[data-action="send-wishes"]')
        .forEach((button) => {
          button.addEventListener("click", openSendWishesModal);
        });

      document
        .querySelectorAll('[data-action="send-offers"]')
        .forEach((button) => {
          button.addEventListener("click", openSendOffersModal);
        });
    });
  </script>

  <!-- All Birthdays Modal -->
  <div class="modal fade" id="allBirthdaysModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary bg-opacity-10">
          <h5 class="modal-title">
            <i class="ti tabler-gift me-2 text-primary"></i>
            All Client Birthdays
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Filter Section -->
          <div class="row mb-4">
            <div class="col-md-8">
              <select class="form-select" id="birthdayFilter">
                <option value="all">All Months</option>
                <option value="current">Current Month</option>
                <option value="upcoming">Upcoming Birthdays</option>
                <option value="past">Past Birthdays</option>
              </select>
            </div>

          </div>

          <!-- Birthday Calendar View -->
          <div class="birthday-calendar mb-4">
            <div class="month-grid">
              @foreach($allBirthdays as $month => $patients)
                <div class="month-card {{ $month == Carbon\Carbon::now()->format('F') ? 'current-month' : '' }}">
                  <h6 class="month-title">{{ $month }}</h6>
                  <div class="birthday-list">
                    @foreach($patients as $patient)
                      <div class="birthday-item d-flex align-items-center p-3 border-bottom">
                        <div class="avatar avatar-md me-3">
                          <span class="avatar-initial rounded-circle bg-label-{{ $patient->daysUntil == 0 ? 'danger' : ($patient->daysUntil <= 7 ? 'primary' : 'success') }}">{{ $patient->initials }}</span>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="mb-0">{{ $patient->firstname }} {{ $patient->lastname }}</h6>
                          <div class="d-flex align-items-center">
                            <i class="ti tabler-calendar-event text-muted me-1"></i>
                            <small class="text-muted">{{ Carbon\Carbon::parse($patient->birthdate)->format('F d') }} ({{ $patient->age }} years)</small>
                            @if($patient->daysUntil == 0)
                              <span class="badge bg-label-danger ms-2">Today</span>
                            @elseif($patient->daysUntil > 0 && $patient->daysUntil <= 30)
                              <span class="badge bg-label-{{ $patient->daysUntil <= 7 ? 'primary' : 'success' }} ms-2">In {{ $patient->daysUntil }} days</span>
                            @endif
                          </div>
                        </div>
                        <div class="dropdown">
                          <button class="btn btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow"
                            data-bs-toggle="dropdown">
                            <!-- <i class="ti tabler-dots-vertical"></i> -->
                          </button>
                          <ul class="dropdown-menu">
                            <li>
                              <a class="dropdown-item" href="#" data-action="send-wishes" data-patient="{{ $patient->patient_id }}">
                                <i class="ti tabler-mail me-2"></i>Send Wishes
                              </a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="#" data-action="send-offers" data-patient="{{ $patient->patient_id }}">
                                <i class="ti tabler-gift me-2"></i>Send Offer
                              </a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="#">
                                <i class="ti tabler-calendar-plus me-2"></i>Schedule Service
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Add this to your existing JavaScript
    document.addEventListener("DOMContentLoaded", function() {
      // Update the View All button click handler
      const viewAllButton = document.querySelector(
        "button[data-bs-toggle='modal'][data-bs-target='#allBirthdaysModal']"
      );

      // Function to apply birthday filters
      function applyBirthdayFilter(filterValue = 'all') {
        const monthCards = document.querySelectorAll(".month-card");

        // Get current date information
        const today = new Date();
        const currentMonth = today.getMonth(); // 0-11
        const currentDay = today.getDate();
        const currentMonthName = today.toLocaleString('default', { month: 'long' });
        const currentYear = today.getFullYear();

        // Process each month card
        monthCards.forEach((card) => {
          const monthName = card.querySelector(".month-title").textContent.trim();
          // Get month index (0-11) from month name
          const monthIndex = new Date(Date.parse(monthName + " 1, " + currentYear)).getMonth();
          const birthdayItems = card.querySelectorAll(".birthday-item");

          switch (filterValue) {
            case "all":
              // Show all months and birthdays
              card.style.display = "block";
              birthdayItems.forEach(item => item.style.display = "flex");
              break;

            case "current":
              // Show only current month
              if (monthName === currentMonthName) {
                card.style.display = "block";
                birthdayItems.forEach(item => item.style.display = "flex");
              } else {
                card.style.display = "none";
              }
              break;

            case "upcoming":
              if (monthIndex > currentMonth) {
                // Future months - show all birthdays
                card.style.display = "block";
                birthdayItems.forEach(item => item.style.display = "flex");
              } else if (monthIndex === currentMonth) {
                // Current month - show only upcoming birthdays
                card.style.display = "block";
                birthdayItems.forEach(item => {
                  // Check if this item has a badge with "days" text - these are upcoming
                  const badgeElement = item.querySelector(".badge");
                  if (badgeElement && (badgeElement.textContent.includes("In ") || badgeElement.textContent.includes("Today"))) {
                    item.style.display = "flex";
                  } else {
                    // Otherwise look for the date and compare
                    const dateText = item.querySelector("small.text-muted").textContent;
                    // Extract the day from format like "February 15" or "February 15 (30 years)"
                    const dayMatch = dateText.match(/(\w+)\s+(\d+)/);
                    if (dayMatch && dayMatch[2]) {
                      const day = parseInt(dayMatch[2]);
                      item.style.display = day >= currentDay ? "flex" : "none";
                    } else {
                      item.style.display = "none";
                    }
                  }
                });
              } else {
                // Past months - hide
                card.style.display = "none";
              }
              break;

            case "past":
              if (monthIndex < currentMonth) {
                // Past months - show all birthdays
                card.style.display = "block";
                birthdayItems.forEach(item => item.style.display = "flex");
              } else if (monthIndex === currentMonth) {
                // Current month - show only past birthdays
                card.style.display = "block";
                birthdayItems.forEach(item => {
                  const badgeElement = item.querySelector(".badge");
                  if (badgeElement && (badgeElement.textContent.includes("In ") || badgeElement.textContent.includes("Today"))) {
                    // If has "In X days" badge or "Today" badge, it's not past - hide it
                    item.style.display = "none";
                  } else {
                    // Extract the day and determine if it's past
                    const dateText = item.querySelector("small.text-muted").textContent;
                    const dayMatch = dateText.match(/(\w+)\s+(\d+)/);
                    if (dayMatch && dayMatch[2]) {
                      const day = parseInt(dayMatch[2]);
                      item.style.display = day < currentDay ? "flex" : "none";
                    } else {
                      item.style.display = "none";
                    }
                  }
                });
              } else {
                // Future months - hide
                card.style.display = "none";
              }
              break;
          }

          // Hide empty month cards
          if (card.style.display === "block") {
            const visibleItems = Array.from(birthdayItems).filter(item =>
              item.style.display === "flex"
            ).length;
            if (visibleItems === 0) {
              card.style.display = "none";
            }
          }
        });
      }

      // Apply filter when modal is shown
      const birthdayModal = document.getElementById('allBirthdaysModal');
      if (birthdayModal) {
        birthdayModal.addEventListener('shown.bs.modal', function() {
          const filterSelect = document.getElementById("birthdayFilter");
          // Apply default filter (all)
          applyBirthdayFilter();

          // When filter changes, apply the new filter
          if (filterSelect) {
            filterSelect.value = 'all'; // Reset to "All" when modal opens
            filterSelect.addEventListener("change", function(e) {
              applyBirthdayFilter(e.target.value);
            });
          }
        });
      }

      // Other existing code...
    });
  </script>

  <!-- View All Bookings Modal -->
  <div class="modal fade" id="viewAllBookingsModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">All Bookings</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Filters -->
          <div class="row mb-4">
            <div class="col-md-4">
              <label class="form-label">Filter by Status</label>
              <select class="form-select" id="statusFilter">
                <option value="all">All Status</option>
                <option value="completed">Completed</option>
                <option value="pending">Pending</option>
                <option value="cancelled">Cancelled</option>
                <option value="paid">Paid</option>
                <option value="unpaid">No Show</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Filter by Date</label>
              <input type="date" class="form-control" id="dateFilter">
            </div>
            <div class="col-md-4 d-flex align-items-end">
              <button class="btn btn-primary" id="exportBookings">
                <i class="ti tabler-download me-1"></i>Export Data
              </button>
            </div>
          </div>

          <!-- Bookings Table -->
          <div class="table-responsive">
            <table class="table table-hover booking-table">
              <thead class="table-light">
                <tr>
                  <th>Booking ID</th>
                  <th>Patient</th>
                  <th>Service</th>
                  <th>Date & Time</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($bookings as $booking)
                <tr>
                  <td># {{ $booking->booking_id }}</td>
                  <td>
                    @if($booking->patient)
                      {{ $booking->patient->firstname }} {{ $booking->patient->lastname }}
                    @else
                      <span class="text-muted">No patient data</span>
                    @endif
                  </td>
                  <td>
                    @if($booking->services->isNotEmpty())
                      {{ $booking->services->pluck('service_name')->join(', ') }}
                    @else
                      <span class="text-muted">No service data</span>
                    @endif
                  </td>
                  <td>{{ Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }} at {{ Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }}</td>
                  <td>
                    @if($booking->services->isNotEmpty())
                      ₱{{ number_format($booking->services->sum('service_cost'), 2) }}
                    @else
                      <span class="text-muted">N/A</span>
                    @endif
                  </td>
                  <td>
                    <span class="badge bg-label-{{ $booking->status == 'Paid' && 'Completed' ? 'success' : ($booking->status == 'Pending' ? 'warning' : 'danger') }}">
                      {{ ucfirst($booking->status) }}
                    </span>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="ti tabler-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu">
                        <li>
                          <a class="dropdown-item" href="#">
                            <i class="ti tabler-eye me-2"></i>View Details
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">
                            <i class="ti tabler-edit me-2"></i>Edit Booking
                          </a>
                        </li>
                        @if($booking->status == 'Pending')
                        <li>
                          <a class="dropdown-item text-success" href="#">
                            <i class="ti tabler-check me-2"></i>Mark as Completed
                          </a>
                        </li>
                        @endif
                        <li>
                          <a class="dropdown-item text-danger" href="#">
                            <i class="ti tabler-trash me-2"></i>Cancel Booking
                          </a>
                        </li>
                      </ul>
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


  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Get filter elements
      const statusFilter = document.getElementById("statusFilter");
      const dateFilter = document.getElementById("dateFilter");

      // Function to apply both filters simultaneously
      function applyFilters() {
        const selectedStatus = statusFilter.value.toLowerCase();
        const selectedDate = dateFilter.value ? new Date(dateFilter.value) : null;

        const rows = document.querySelectorAll(".booking-table tbody tr");

        rows.forEach((row) => {
          let showRow = true;

          // Status filter
          if (selectedStatus !== 'all') {
            const statusCell = row.querySelector(".badge").textContent.toLowerCase().trim();
            if (statusCell !== selectedStatus) {
              showRow = false;
            }
          }

          // Date filter
          if (selectedDate) {
            const dateCell = row.querySelector("td:nth-child(4)").textContent; // Get the date cell
            const bookingDate = new Date(dateCell.split(" at")[0]); // Split to remove time and convert to date

            // Compare only the date parts (ignore time)
            if (
              bookingDate.getFullYear() !== selectedDate.getFullYear() ||
              bookingDate.getMonth() !== selectedDate.getMonth() ||
              bookingDate.getDate() !== selectedDate.getDate()
            ) {
              showRow = false;
            }
          }

          // Show/hide row based on combined filter results
          row.style.display = showRow ? "" : "none";
        });
      }

      // Add event listeners to both filters
      if (statusFilter) {
        statusFilter.addEventListener("change", applyFilters);
      }

      if (dateFilter) {
        dateFilter.addEventListener("change", applyFilters);
      }

      // Clear filters function
      function clearFilters() {
        statusFilter.value = "all";
        dateFilter.value = "";
        applyFilters();
      }

      // Add clear filters button to the filter section
      const filterSection = document.querySelector(".modal-body .row.mb-4");
      if (filterSection) {
        const clearButton = document.createElement("div");
        clearButton.className = "col-12 mt-2";
        clearButton.innerHTML = `

        `;
        filterSection.appendChild(clearButton);
      }

      // Make clearFilters function globally available
      window.clearFilters = clearFilters;
    });
  </script>

</body>

</html>
