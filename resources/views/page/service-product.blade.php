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

  <head>

    <title>Service/Product Report - Imajica</title>
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
  <meta property="og:image" content="../../../../pixinvent.com/wp-content/uploads/2023/06/vuexy-hero-image.png" />
  <meta property="og:description" content="Imajica Booking System." />
  <meta property="og:site_name" content="Pixinvent" />
  <link rel="canonical" href="Imajica Booking System" />

    <!-- End Google Tag Manager -->

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset(path:'logo/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />>

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

   <link rel="stylesheet"  href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />
    <link  rel="stylesheet"  href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/chartjs/chartjs.css') }}" />

    <!-- Vendors CSS -->

   <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- endbuild -->

   <link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/swiper/swiper.css') }}" />
    <link  rel="stylesheet"  href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet"  href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
  
    
     <link rel="stylesheet" href="{{ asset('vendor/fonts/flag-icons.css') }}" />>


    <!-- Page CSS -->
   <link rel="stylesheet" href="{{ asset('vendor/css/pages/cards-advance.css') }}">


    <!-- Helpers -->
     <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="../../assets/js/config.js"></script>

    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap");

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Poppins", sans-serif;
        background: linear-gradient(135deg, #eef2f3, #d0d0d2);
        color: #333;
        padding: 0;
        display: flex;
        min-height: 100vh;
      }

      .container {
        max-width: 1000px;
        margin: auto;
        flex: 1;
        padding: 2rem;
        background: linear-gradient(135deg, #eef2f3, #f5f5f5);
        margin-left: auto;
        margin-right: auto;
        margin-top: 15px;
        width: 100%;
      }

      .container-p-y {
        display: flex;
        justify-content: center;
        width: 100%;
        padding: 0 20px;
        margin-left: 280px;
      }

      @media (max-width: 1199px) {
        .container-p-y {
          margin-left: 0;
        }
      }

      .card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        max-width: 100%;
        width: 100%;
        margin: 0 auto;
      }

      .header {
        text-align: center;
        margin-bottom: 30px;
      }

      .header h1 {
        font-weight: 600;
      }

      .btn {
        display: inline-block;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease-in-out;
      }

      .btn-primary {
        background: #007bff;
        color: #fff;
      }

      .btn-primary:hover {
        background: #0056b3;
      }

      .metrics {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
      }

.metric-card {
  text-align: center;
  padding: 15px;
  border-radius: 10px;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); /* Corrected property name and increased shadow values */
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  background: rgba(254, 255, 255, 0.9);
  min-width: 200px;
  max-width: 300px;
  flex: 1;
}

.metric-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);

}

      .metric-card i {
        font-size: 24px;
        margin-bottom: 1rem;

      }

      .metric-card h5 {
        margin-bottom: 1.5rem;
        color: #2b2c2d;
      }

      .metric-card h4 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
      }

      #layout-menu {
        width: 280px;
        background: white;
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        padding: 1rem;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        overflow-y: auto;
      }

      .menu-mobile-toggler {
        display: none;
        position: fixed;
        top: 1rem;
        left: 1rem;
        z-index: 1000;
      }

      /* Mobile responsiveness */
      @media (max-width: 1199px) {
        #layout-menu {
          transform: translateX(-100%);
          transition: transform 0.3s ease;
          z-index: 999;
        }

        #layout-menu.show {
          transform: translateX(0);
        }

        .container {
          margin-left: 0;
          padding-top: 4rem;
        }

        .menu-mobile-toggler {
          display: block;
        }
      }

      .mini-chart {
        position: relative;
        width: 100%;
        min-width: 100px;
      }

      .booking-trend {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
      }

      /* Add these styles for centering the modal */
      .modal-dialog.modal-xl {
        display: flex;
        align-items: center;
        min-height: calc(100% - 1rem);
        margin: 0 auto;
      }

      @media (min-width: 1200px) {
        .modal-dialog.modal-xl {
          min-height: calc(100% - 3.5rem);
        }
      }

      /* Add these styles */
      .table {
        margin-bottom: 0;
      }

      .table th {
        font-weight: 500;
        font-size: 14px;
        vertical-align: middle;
      }

      .badge {
        padding: 0.4em 0.7em;
        font-size: 12px;
        font-weight: 500;
      }

      .bg-label-info {
        background-color: rgba(3, 195, 236, 0.16) !important;
        color: #03c3ec !important;
      }

      .bg-label-warning {
        background-color: rgba(255, 171, 0, 0.16) !important;
        color: #ffab00 !important;
      }

      .bg-label-success {
        background-color: rgba(113, 221, 55, 0.16) !important;
        color: #71dd37 !important;
      }

      .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        border-radius: 0.25rem;
      }

      .btn-info {
        background-color: #03c3ec;
        border-color: #03c3ec;
        color: #fff;
      }

      .btn-primary {
        background-color: #134013;
        border-color: #134013;
        color: #fff;
      }

      .form-select-sm {
        font-size: 0.875rem;
        padding: 0.25rem 2rem 0.25rem 0.5rem;
      }

      .input-group-sm > .form-control {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
      }

      .input-group-text {
        background-color: #f0f0f0;
        border-right: none;
      }

      .form-control:focus {
        border-color: #134013;
        box-shadow: 0 0 0 0.2rem rgba(19, 64, 19, 0.25);
      }
    </style>
  </head>

  <body>
    @include('components.sidebar')
    <div class="menu-mobile-toggler d-xl-none rounded-1 layout-wrapper">
      <a
        href="javascript:void(0);"
        class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1"
      >
        <i class="ti tabler-menu icon-base"></i>
        <i class="ti tabler-chevron-right icon-base"></i>
      </a>
    </div>
<div class="container-p-y">
       <div class="container rounded  ">
      <div class="header">
        <h1>Service/Product Report Summary</h1>

      </div>

        <div class="metrics">
  <div class="metric-card">
    <i class="ti tabler-cash mb-2" style="font-size: 24px; color: #28a745;"></i>
    <h5>Daily Sales</h5>
    <h4>₱385,750.00</h4>
  </div>
  <div class="metric-card">
    <i class="ti tabler-calendar-month mb-2" style="font-size: 24px; color: #007bff;"></i>
    <h5>Monthly Sales</h5>
    <h3>Hair Color Treatment</h3>
  </div>
  <div class="metric-card">
    <i class="ti tabler-chart-pie mb-2" style="font-size: 24px; color: #dc3545;"></i>
    <h5>Overall Sales</h5>
    <h3>Shampoo Premium</h3>
  </div>
</div>


        <div class="card mt-4">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h3 class="mb-0">All Sales</h3>

              <!-- Search and Filters -->
              <div class="d-flex gap-2 align-items-end">
                <!-- Search Bar -->
                <div class="d-flex flex-column" style="width: 180px;">
                  <div class="input-group input-group-sm">
                    <span class="input-group-text">
                      <i class="ti tabler-search"></i>
                    </span>
                    <input
                      type="text"
                      class="form-control"
                      id="searchInput"
                      placeholder="Search items..."
                    >
                  </div>
                </div>

                <!-- Filter by -->
                <div class="d-flex flex-column" style="width: 160px;">
                  <label class="form-label text-muted small mb-1">Filter by</label>
                  <select class="form-select form-select-sm" id="filterBy">
                    <option value="">All</option>
                    <option value="service">Services</option>
                    <option value="product">Products</option>
                    <option value="price_high">Price: (High to Low)</option>
                    <option value="price_low">Price: (Low to High)</option>
                  </select>
                </div>

                <!-- Filter by date -->
                <div class="d-flex flex-column" style="width: 160px;">
                  <label class="form-label text-muted small mb-1">Filter by date</label>
                  <select class="form-select form-select-sm" id="filterByDate">
                    <option value="">All time</option>
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="last_week">Last 7 days</option>
                    <option value="last_month">Last 30 days</option>
                    <option value="this_month">This month</option>
                    <option value="last_3months">Last 3 months</option>
                  </select>
                </div>

                <!-- Report Type -->
                <div class="d-flex flex-column" style="width: 180px;">
                  <label class="form-label text-muted small mb-1">Report Type</label>
                  <select class="form-select form-select-sm" id="reportType">
                    <option value="overall">Overall Sales</option>
                    <option value="services">Services Only</option>
                    <option value="products">Products Only</option>
                    <option value="discounts">Discounts Report</option>
                    <option value="giftcards">Gift Card Usage</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Table -->
            <div class="table-responsive text-nowrap">
              <table class="table table-striped" id="servicesTable">
                <thead>
                  <tr class="table-light">
                    <th>Services Name</th>
                    <th>Date</th>
                    <th>Branch Name</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Service Category</th>
                    <th>Service Cost</th>
                    <th>Type</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Hair Color Treatment</td>
                    <td>2024-01-25</td>
                    <td>Main Branch</td>
                    <td>Professional hair coloring service</td>
                    <td><span class="badge bg-label-info">2h</span></td>
                    <td>Hair Care</td>
                    <td>₱1,500.00</td>
                    <td><span class="badge bg-label-warning">Service</span></td>
                    <td class="text-center">
                      <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-sm btn-info view-details" data-service-id="1">
                          <i class="ti tabler-eye me-1"></i> View
                        </button>
                        <button class="btn btn-sm btn-primary" onclick="downloadRow(this, 'excel')">
                          <i class="ti tabler-download me-1"></i> Export
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Professional Shampoo</td>
                    <td>2024-01-20</td>
                    <td>East Branch</td>
                    <td>Premium hair care product</td>
                    <td><span class="badge bg-label-info">--</span></td>
                    <td>Hair Care</td>
                    <td>₱850.00</td>
                    <td><span class="badge bg-label-success">Product</span></td>
                    <td class="text-center">
                      <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-sm btn-info view-details" data-service-id="2">
                          <i class="ti tabler-eye me-1"></i> View
                        </button>
                        <button class="btn btn-sm btn-primary" onclick="downloadRow(this, 'excel')">
                          <i class="ti tabler-download me-1"></i> Export
                        </button>
                      </div>
                    </td>
                  </tr>
                  <!-- Add more rows as needed -->
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Service/Product Details Modal -->
        <div class="modal fade" id="serviceDetailsModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content shadow-lg rounded-3">
              <div class="modal-header" style="background-color: #134013;">
                <h4 class="modal-title" style="color: white;">Service/Product Details</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body p-4">
                <div class="row g-4">
                  <!-- Service/Product Info Card -->
                  <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                      <div class="card-header" style="background-color: #f0f0f0;">
                        <div class="d-flex align-items-center justify-content-between">
                          <h6 class="card-title mb-0" style="color: black;">Basic Information</h6>
                          <small style="color: rgba(7, 5, 5, 0.8);">ID: #SRV-2024-001</small>
                        </div>
                      </div>
                      <div class="card-body d-flex flex-column" style="gap: 0.5rem; padding-top: 0.75rem; padding-bottom: 0.75rem;">
                        <div style="margin-bottom: 0.35rem;"><strong>Name:</strong> <span id="serviceName">Hair Color Treatment</span></div>
                        <div style="margin-bottom: 0.35rem;"><strong>Category:</strong> <span id="serviceType">Beauty Services</span></div>
                        <div style="margin-bottom: 0.35rem;"><strong>Base Price:</strong> <span class="text-success" id="servicePrice">₱1,500.00</span></div>
                        <div style="margin-bottom: 0.35rem;"><strong>Total Sales:</strong> <span class="text-primary" id="serviceTotalSales">₱147,000.00</span></div>
                        <div><strong>Status:</strong> <span class="badge bg-success">Active</span></div>
                      </div>
                    </div>
                  </div>

                  <!-- Performance Metrics -->
                  <div class="col-md-6 col-lg-8">
                    <div class="card border-0 shadow-sm h-100">
                      <div class="card-header" style="background-color: #f0f0f0;">
                        <h6 class="card-title mb-0" style="color: black;">Performance Metrics</h6>
                      </div>
                      <div class="card-body">
                        <table class="table table-striped">
                          <tbody>
                            <tr><td><strong>Total Quantity Sold:</strong></td><td id="serviceQuantity">98 units</td></tr>
                            <tr><td><strong>Total Discounts Given:</strong></td><td id="serviceDiscounts">₱14,700.00</td></tr>
                            <tr><td><strong>Gift Card Usage:</strong></td><td id="serviceGiftCards">₱5,000.00</td></tr>
                            <tr><td><strong>Average Rating:</strong></td><td>4.8/5.0 ⭐</td></tr>
                            <tr><td><strong>Customer Satisfaction:</strong></td><td>96% Positive</td></tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <!-- Monthly Sales Trend -->
                  <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                      <div class="card-header" style="background-color: #f0f0f0;">
                        <h6 class="card-title mb-0" style="color: black;">Monthly Sales Trend</h6>
                      </div>
                      <div class="card-body p-3" style="position: relative;">
                        <div style="height: 250px;">
                          <canvas id="salesTrendChart"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Recent Transactions -->
                  <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                      <div class="card-header" style="background-color: #f0f0f0;">
                        <h6 class="card-title mb-0" style="color: black;">Recent Transactions</h6>
                      </div>
                      <div class="card-body" style="height: 300px; overflow-y: auto;">
                        <div class="table-responsive h-100">
                          <table class="table table-sm">
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody id="transactionsList">
                              <!-- Transactions will be populated via JavaScript -->
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="modal-footer bg-light" style="padding: 1rem 1.5rem;">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>

        </div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const filterBy = document.getElementById('filterBy');
    const filterByDate = document.getElementById('filterByDate');
    const reportType = document.getElementById('reportType');
    const tableBody = document.querySelector('#servicesTable tbody');

    [searchInput, filterBy, filterByDate, reportType].forEach(el => {
        el.addEventListener('change', applyFilters);
    });
    searchInput.addEventListener('input', applyFilters);

    function applyFilters() {
        const searchText = searchInput.value.trim().toLowerCase();
        const filterValue = filterBy.value;
        const dateFilter = filterByDate.value;
        const reportValue = reportType.value;

        // Get all original rows - important to ensure we're not filtering already filtered rows
        let rows = Array.from(tableBody.querySelectorAll('tr'));

        // First, show all rows to reset any previous filtering
        rows.forEach(row => {
            row.style.display = '';
        });

        // === SEARCH FILTER ===
        if (searchText) {
            rows = rows.filter(row => {
                const serviceName = row.cells[0].textContent.toLowerCase();
                const description = row.cells[3].textContent.toLowerCase();
                return serviceName.includes(searchText) || description.includes(searchText);
            });
        }

        // === REPORT TYPE FILTER ===
        if (reportValue && reportValue !== 'overall') {
            switch (reportValue) {
                case 'services':
                    rows = rows.filter(row => row.cells[7].textContent.toLowerCase().includes('service'));
                    break;
                case 'products':
                    rows = rows.filter(row => row.cells[7].textContent.toLowerCase().includes('product'));
                    break;
                case 'discounts':
                    rows = rows.filter(row => row.innerHTML.toLowerCase().includes('discount'));
                    break;
                case 'giftcards':
                    rows = rows.filter(row => row.innerHTML.toLowerCase().includes('gift card'));
                    break;
                default:
                    // No filtering for 'overall' or empty value
                    break;
            }
        }

       // === FILTER BY TYPE / PRICE ===
        if (filterValue && filterValue !== '') {
            switch (filterValue) {
                case 'service':
                    rows = rows.filter(row => row.cells[7].textContent.toLowerCase().includes('service'));
                    break;
                case 'product':
                    rows = rows.filter(row => row.cells[7].textContent.toLowerCase().includes('product'));
                    break;
                case 'price_high':
                case 'price_low':
                    rows = sortRowsByPrice(rows, filterValue);
                    break;
                default:
                    // 'All' selected or empty value – do nothing
                    break;
            }
        }

        function sortRowsByPrice(rows, sortOrder) {
            return rows.sort((a, b) => {
                const priceA = parseFloat(a.cells[6].textContent.replace(/[^0-9.-]/g, ''));
                const priceB = parseFloat(b.cells[6].textContent.replace(/[^0-9.-]/g, ''));
                return sortOrder === 'price_high' ? priceB - priceA : priceA - priceB;
            });
        }

       if (filterValue && filterValue !== '') {
    switch (filterValue) {
        case 'service':
            rows = rows.filter(row =>
                row.cells[7].textContent.toLowerCase().includes('service')
            );
            break;
        case 'product':
            rows = rows.filter(row =>
                row.cells[7].textContent.toLowerCase().includes('product')
            );
            break;
        case 'price_low':
            rows.sort((a, b) => {
                const priceA = parseFloat(a.cells[6].textContent.replace(/[^\d.]/g, '')) || 0;
                const priceB = parseFloat(b.cells[6].textContent.replace(/[^\d.]/g, '')) || 0;
                return priceA - priceB;
            });
            // Re-render rows after sorting
            const tbody = document.querySelector('#servicesTable tbody');
            tbody.innerHTML = '';
            rows.forEach(row => tbody.appendChild(row));
            break;
        case 'price_high':
            rows.sort((a, b) => {
                const priceA = parseFloat(a.cells[6].textContent.replace(/[^\d.]/g, '')) || 0;
                const priceB = parseFloat(b.cells[6].textContent.replace(/[^\d.]/g, '')) || 0;
                return priceB - priceA;
            });
            // Re-render rows after sorting
            const tbodyHigh = document.querySelector('#servicesTable tbody');
            tbodyHigh.innerHTML = '';
            rows.forEach(row => tbodyHigh.appendChild(row));
            break;
        default:
            // Do nothing for 'All'
            break;
    }
}






        // === FILTER BY DATE RANGE ===
        if (dateFilter && dateFilter !== '') {
            const now = new Date();
            rows = rows.filter(row => {
                const dateText = row.cells[1].textContent.trim();
                const rowDate = new Date(dateText);
                if (isNaN(rowDate)) return false;

                switch (dateFilter) {
                    case 'today':
                        return isSameDate(rowDate, now);
                    case 'yesterday':
                        const yesterday = new Date(now);
                        yesterday.setDate(yesterday.getDate() - 1);
                        return isSameDate(rowDate, yesterday);
                    case 'last_week':
                        const weekAgo = new Date(now);
                        weekAgo.setDate(weekAgo.getDate() - 7);
                        return rowDate >= weekAgo && rowDate <= now;
                    case 'last_month':
                        const monthAgo = new Date(now);
                        monthAgo.setDate(monthAgo.getDate() - 30);
                        return rowDate >= monthAgo && rowDate <= now;
                    case 'this_month':
                        return rowDate.getMonth() === now.getMonth() &&
                               rowDate.getFullYear() === now.getFullYear();
                    case 'last_3months':
                        const threeMonthsAgo = new Date(now);
                        threeMonthsAgo.setMonth(threeMonthsAgo.getMonth() - 3);
                        return rowDate >= threeMonthsAgo && rowDate <= now;
                    default:
                        return true; // Show all for empty value or 'all'
                }
            });
        }

        // === PRICE SORTING ===
        if (filterValue === 'price_high' || filterValue === 'price_low') {
            rows.sort((a, b) => {
                const priceA = parsePrice(a.cells[6].textContent);
                const priceB = parsePrice(b.cells[6].textContent);
                return filterValue === 'price_high' ? priceB - priceA : priceA - priceB;
            });
        }

        // === UPDATE TABLE ===
        // First hide all rows
        Array.from(tableBody.querySelectorAll('tr')).forEach(row => {
            row.style.display = 'none';
        });

        // Then show only the filtered rows
        rows.forEach(row => {
            row.style.display = '';
        });
    }

    function parsePrice(priceStr) {
        if (!priceStr) return 0;
        return parseFloat(priceStr.replace(/[₱,]/g, '')) || 0;
    }

    function isSameDate(d1, d2) {
        return d1.getFullYear() === d2.getFullYear() &&
               d1.getMonth() === d2.getMonth() &&
               d1.getDate() === d2.getDate();
    }

    // Initial load
    applyFilters();
});
</script>



    <script>
      document
        .querySelector(".menu-mobile-toggler")
        .addEventListener("click", function () {
          document.querySelector("#layout-menu").classList.toggle("show");
        });

      // Search functionality
      document.getElementById('searchInput').addEventListener('keyup', function() {
        let searchValue = this.value.toLowerCase();
        let tableRows = document.querySelectorAll('tbody tr');

        tableRows.forEach(row => {
          let name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
          let email = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

          if (name.includes(searchValue) || email.includes(searchValue)) {
            row.style.display = '';
          } else {
            row.style.display = 'none';
          }
        });
      });

      // Update the script section - remove calendar input related code
      document.addEventListener('DOMContentLoaded', function() {
          // Custom range toggle
          document.getElementById('customRangeBtn').addEventListener('click', function(e) {
              e.stopPropagation();
              document.querySelector('.custom-range-inputs').classList.toggle('d-none');
          });

          document.querySelectorAll('[data-filter]').forEach(button => {
              button.addEventListener('click', function(e) {
                  if (this.getAttribute('data-filter') === 'custom') return;

                  const filterType = this.getAttribute('data-filter');
                  const now = new Date();
                  let startDate, endDate;

                  switch(filterType) {
                      case 'tomorrow':
                          startDate = endDate = new Date(now.setDate(now.getDate() + 1));
                          break;
                      case 'today':
                          startDate = endDate = now;
                          break;
                      case 'yesterday':
                          startDate = endDate = new Date(now.setDate(now.getDate() - 1));
                          break;
                      case 'last7days':
                          endDate = new Date();
                          startDate = new Date(now.setDate(now.getDate() - 7));
                          break;
                      case 'last30days':
                          endDate = new Date();
                          startDate = new Date(now.setDate(now.getDate() - 30));
                          break;
                      case 'thisMonth':
                          startDate = new Date(now.getFullYear(), now.getMonth(), 1);
                          endDate = new Date(now.getFullYear(), now.getMonth() + 1, 0);
                          break;
                      case 'lastMonth':
                          startDate = new Date(now.getFullYear(), now.getMonth() - 1, 1);
                          endDate = new Date(now.getFullYear(), now.getMonth(), 0);
                          break;
                  }

                  updateFilterText(startDate, endDate);
              });
          });

          document.getElementById('applyCustomRange').addEventListener('click', function(e) {
              e.stopPropagation();
              const startDate = new Date(document.getElementById('dateFrom').value);
              const endDate = new Date(document.getElementById('dateTo').value);
              updateFilterText(startDate, endDate);
          });

          function updateFilterText(startDate, endDate) {
              const formatDate = date => date.toLocaleDateString('en-US', {
                  month: 'short',
                  day: 'numeric',
                  year: 'numeric'
              });

              const filterText = startDate.getTime() === endDate.getTime() ?
                  formatDate(startDate) :
                  ${formatDate(startDate)} - ${formatDate(endDate)};

              document.getElementById('selectedDateText').textContent = : ${filterText};

              // Hide dropdown after selection
              document.querySelector('.dropdown-menu').classList.remove('show');
              document.querySelector('.custom-range-inputs').classList.add('d-none');
          }
      });

      // Customer modal functionality
      document.addEventListener('DOMContentLoaded', function() {
        const customerModal = new bootstrap.Modal(document.getElementById('customerModal'));

        // Sample customer data with specific details
        const customerDetails = {
          'John Smith': {
            purchases: [
              { date: '2024-01-15', item: 'Garden Wedding Package (150 guests)', amount: 150000 },
              { date: '2023-12-20', item: 'Anniversary Celebration Package', amount: 75000 },
              { date: '2023-11-30', item: 'Premium Photo & Video Coverage', amount: 45000 },
              { date: '2023-10-15', item: 'Corporate Year-End Event', amount: 120000 }
            ],
            monthlyData: {
              labels: ['Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan'],
              values: [85000, 95000, 120000, 45000, 75000, 150000]
            }
          },
          'Sarah Johnson': {
            purchases: [
              { date: '2024-01-12', item: 'Luxe Debut Package (200 guests)', amount: 180000 },
              { date: '2023-12-15', item: 'Christmas Party Setup & Catering', amount: 85000 },
              { date: '2023-11-25', item: 'Family Reunion Package', amount: 65000 },
              { date: '2023-10-08', item: 'Product Launch Event', amount: 95000 }
            ],
            monthlyData: {
              labels: ['Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan'],
              values: [45000, 75000, 95000, 65000, 85000, 180000]
            }
          },
          'Mike Wilson': {
            purchases: [
              { date: '2024-01-10', item: 'Corporate Conference Full Package', amount: 250000 },
              { date: '2023-12-18', item: 'Business Summit & Catering', amount: 175000 },
              { date: '2023-11-28', item: 'Team Building Event Package', amount: 85000 },
              { date: '2023-10-20', item: 'Award Ceremony Setup', amount: 120000 }
            ],
            monthlyData: {
              labels: ['Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan'],
              values: [95000, 110000, 120000, 85000, 175000, 250000]
            }
          },
          'Emily Brown': {
            purchases: [
              { date: '2024-01-08', item: 'Sweet 16 Celebration Package', amount: 95000 },
              { date: '2023-12-12', item: 'New Year Party All-In Package', amount: 150000 },
              { date: '2023-11-20', item: 'Baby Shower Premium Setup', amount: 45000 },
              { date: '2023-10-05', item: 'Halloween Party Package', amount: 75000 }
            ],
            monthlyData: {
              labels: ['Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan'],
              values: [55000, 65000, 75000, 45000, 150000, 95000]
            }
          },
          'David Lee': {
            purchases: [
              { date: '2024-01-05', item: 'Silver Wedding Anniversary Package', amount: 200000 },
              { date: '2023-12-22', item: 'Holiday Corporate Dinner', amount: 145000 },
              { date: '2023-11-15', item: 'Engagement Party Package', amount: 85000 },
              { date: '2023-10-28', item: 'Birthday Milestone Celebration', amount: 95000 }
            ],
            monthlyData: {
              labels: ['Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan'],
              values: [65000, 75000, 95000, 85000, 145000, 200000]
            }
          }
        };

        // View button click handler
        document.querySelectorAll('.view-customer').forEach(button => {
          button.addEventListener('click', function() {
            const customerName = this.dataset.name;
            const data = {
              name: customerName,
              email: this.dataset.email,
              phone: this.dataset.phone,
              total: this.dataset.total,
              purchases: customerDetails[customerName]?.purchases || [],
              monthlyData: customerDetails[customerName]?.monthlyData || {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                values: [0, 0, 0, 0, 0, 0]
              }
            };

            // Update modal content
            updateModalContent(data);
            customerModal.show();
            setTimeout(initializeSparklines, 100);
          });
        });

        // Helper function to update modal content
        function updateModalContent(data) {
          document.getElementById('customerName').textContent = data.name;
          document.getElementById('customerEmail').textContent = data.email;
          document.getElementById('customerPhone').textContent = data.phone;
          document.getElementById('customerTotal').textContent = data.total;

          // Update purchase history table
          const tbody = document.querySelector('#customerModal .table tbody');
          tbody.innerHTML = data.purchases.map(purchase => `
            <tr>
              <td>${purchase.date}</td>
              <td>${purchase.item}</td>
              <td>₱${purchase.amount.toLocaleString()}</td>
            </tr>
          `).join('');

          // Update chart
          updateChart(data);
        }

        // Helper function to update chart
        function updateChart(data) {
          const ctx = document.getElementById('customerChart').getContext('2d');
          if (window.customerChart) {
            window.customerChart.destroy();
          }

          window.customerChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: data.monthlyData.labels,
              datasets: [{
                label: 'Monthly Bookings',
                data: data.monthlyData.values,
                borderColor: '#007bff',
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                tension: 0.3,
                fill: true
              }]
            },
            options: {
              responsive: true,
              plugins: {
                legend: { position: 'top' },
                title: {
                  display: true,
                  text: Booking History - ${data.name}
                }
              },
              scales: {
                y: {
                  beginAtZero: true,
                  ticks: {
                    callback: value => '₱' + value.toLocaleString()
                  }
                }
              },
              animation: {
                duration: 1000,
                easing: 'easeInOutQuart'
              }
            }
          });
        }
      });

    </script>

<script>
// Customer modal functionality
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.view-customer').forEach(button => {
    button.addEventListener('click', function() {
      const data = this.dataset;
      const modal = new bootstrap.Modal(document.getElementById('customerModal'));

      if (data.name === "John Smith") {
        // Special data for John Smith
        const johnSmithData = {
          customerId: "CS12345",
          memberSince: "January 15, 2023",
          totalBookings: "15 events",
          loyaltyStatus: "Premium Member",
          bookings: [
            {
              id: "BK00123",
              date: "2024-01-15",
              eventType: "Wedding",
              package: "Garden Wedding Package (150 guests)",
              status: "Completed",
              amount: 150000
            },
            {
              id: "BK00122",
              date: "2023-12-20",
              eventType: "Corporate",
              package: "Year-End Party Package",
              status: "Completed",
              amount: 85000
            },
            {
              id: "BK00121",
              date: "2023-11-30",
              eventType: "Wedding",
              package: "Premium Photo & Video Coverage",
              status: "Completed",
              amount: 45000
            },
            {
              id: "BK00120",
              date: "2023-10-15",
              eventType: "Corporate",
              package: "Corporate Conference Package",
              status: "Completed",
              amount: 120000
            }
          ],
          packagePreferences: [
            { name: "Wedding Packages", percentage: 45, color: "primary" },
            { name: "Corporate Events", percentage: 30, color: "info" },
            { name: "Birthday Celebrations", percentage: 25, color: "success" }
          ]
        };

        // Update customer info
        document.getElementById('customerName').textContent = data.name;
        document.getElementById('customerEmail').textContent = data.email;
        document.getElementById('customerPhone').textContent = data.phone;
        document.querySelector('.card-header small').textContent = ID: #${johnSmithData.customerId};
        document.querySelector('.info-item:nth-child(4) p').textContent = johnSmithData.memberSince;
        document.querySelector('.info-item:nth-child(5) p').textContent = johnSmithData.totalBookings;

        // Update booking history table
        const tbody = document.querySelector('#bookingHistory');
        tbody.innerHTML = johnSmithData.bookings.map(booking => `
          <tr>
            <td>${booking.id}</td>
            <td>${booking.date}</td>
            <td>${booking.eventType}</td>
            <td>${booking.package}</td>
            <td>${booking.package}</td>
            <td><span class="badge bg-success">${booking.status}</span></td>
            <td>₱${booking.amount.toLocaleString()}</td>
            <td>
              <canvas class="booking-sparkline"
                      width="100"
                      height="30"
                      data-values="${generateSparklineData()}"
              ></canvas>
            </td>
          </tr>
        `).join('');

        // Update package preferences
        const preferencesContainer = document.querySelector('.package-item').parentElement;
        preferencesContainer.innerHTML = johnSmithData.packagePreferences.map(pref => `
          <div class="package-item">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <span class="fw-semibold">${pref.name}</span>
              <span class="badge bg-${pref.color}">${pref.percentage}%</span>
            </div>
            <div class="progress" style="height: 8px;">
              <div class="progress-bar bg-${pref.color}" role="progressbar" style="width: ${pref.percentage}%"></div>
            </div>
          </div>
        `).join('');
      }

      modal.show();
      setTimeout(initializeSparklines, 100);
      setTimeout(() => {
        initializeMiniCharts();
      }, 100);
    });
  });
});

function generateSparklineData() {
  // Generate random trend data for demonstration
  return JSON.stringify(Array.from({length: 7}, () => Math.floor(Math.random() * 100)));
}

// Initialize sparklines after table population
function initializeSparklines() {
  document.querySelectorAll('.booking-sparkline').forEach(canvas => {
    const ctx = canvas.getContext('2d');
    const values = JSON.parse(canvas.dataset.values);

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: Array(values.length).fill(''),
        datasets: [{
          data: values,
          borderColor: '#28a745',
          borderWidth: 1,
          fill: true,
          backgroundColor: 'rgba(30, 89, 44, 0.1)',
          pointRadius: 0,
          tension: 0.4
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          },
          tooltip: {
            enabled: false
          }
        },
        scales: {
          x: {
            display: false
          },
          y: {
            display: false
          }
        },
        animation: {
          duration: 1000,
          easing: 'easeOutQuart'
        }
      }
    });
  });
}

function generateTrendData(baseAmount) {
  // Generate 6 months of trend data based on the booking amount
  const values = [];
  for (let i = 0; i < 6; i++) {
    // Create some variation around the base amount
    const variation = baseAmount * (0.5 + Math.random() * 0.5);
    values.push(Math.round(variation));
  }
  return JSON.stringify(values);
}

function initializeMiniCharts() {
  document.querySelectorAll('.booking-trend').forEach(canvas => {
    const ctx = canvas.getContext('2d');
    const values = JSON.parse(canvas.dataset.values);

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: Array(values.length).fill(''),
        datasets: [{
          data: values,
          borderColor: '#1e4d2b',
          borderWidth: 1.5,
          fill: true,
          backgroundColor: 'rgba(30, 77, 43, 0.1)',
          pointRadius: 0,
          tension: 0.4
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          },
          tooltip: {
            enabled: true,
            callbacks: {
              label: function(context) {
                return '₱' + context.raw.toLocaleString();
              }
            }
          }
        },
        scales: {
          x: {
            display: false
          },
          y: {
            display: false,
            min: 0
          }
        },
        animation: {
          duration: 800,
          easing: 'easeOutQuart'
        }
      }
    });
  });
}

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.15/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
document.querySelectorAll('.dropdown-item[data-export]').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const exportType = this.dataset.export;
        const table = document.querySelector('.table');
        const rows = Array.from(table.querySelectorAll('tbody tr'));
        const headers = Array.from(table.querySelectorAll('thead th')).map(th => th.textContent);

        // Get data excluding the last column (action buttons)
        const data = rows.map(row => {
            const cells = Array.from(row.querySelectorAll('td'));
            return cells.slice(0, -1).map(td => td.textContent.trim());
        });

        switch(exportType) {
            case 'excel':
                exportToExcel(headers.slice(0, -1), data);
                break;
        }
    });
});

function exportToExcel(headers, data) {
    const worksheet = XLSX.utils.aoa_to_sheet([headers, ...data]);
    const workbook = XLSX.utils.book_new();

    // Adjust column widths
    const colWidths = headers.map(h => ({wch: Math.max(h.length, 15)}));
    worksheet['!cols'] = colWidths;

    XLSX.utils.book_append_sheet(workbook, worksheet, 'Service_Product_Report');
    XLSX.writeFile(workbook, 'service-product-report.xlsx');
}
</script>

<script>
function downloadRow(element, format) {
    const row = element.closest('tr');
    const cells = Array.from(row.cells);
    const headers = Array.from(row.parentElement.parentElement.querySelector('thead tr').cells)
                        .map(th => th.textContent.trim());

    // Get data excluding the last column (action button)
    const data = cells.slice(0, -1).map(cell => cell.textContent.trim());

    // Create workbook
    const worksheet = XLSX.utils.aoa_to_sheet([headers.slice(0, -1), data]);
    const workbook = XLSX.utils.book_new();

    // Set column widths
    const colWidths = headers.map(h => ({wch: Math.max(h.length, 15)}));
    worksheet['!cols'] = colWidths;

    XLSX.utils.book_append_sheet(workbook, worksheet, 'Service_Product_Details');

    // Generate filename from service/product name
    const filename = ${data[0].toLowerCase().replace(/\s+/g, '-')}-details.xlsx;
    XLSX.writeFile(workbook, filename);
}
</script>

    <script>
      // Add this function to filter table rows by date
      function applyDateFilter() {
        const filterValue = document.getElementById('dateFilter').value;
        const tableRows = document.querySelectorAll('tbody tr');
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        tableRows.forEach(row => {
          const dateCell = row.cells[0]; // Get first column containing the date
          const [year, month, day] = dateCell.textContent.split('-').map(Number);
          const rowDate = new Date(year, month - 1, day);
          rowDate.setHours(0, 0, 0, 0);

          let showRow = false;

          switch(filterValue) {
            case 'today':
              showRow = rowDate.getTime() === today.getTime();
              break;
            case 'yesterday':
              const yesterday = new Date(today);
              yesterday.setDate(today.getDate() - 1);
              showRow = rowDate.getTime() === yesterday.getTime();
              break;
            case 'last7':
              const last7 = new Date(today);
              last7.setDate(today.getDate() - 7);
              showRow = rowDate >= last7 && rowDate <= today;
              break;
            case 'last30':
              const last30 = new Date(today);
              last30.setDate(today.getDate() - 30);
              showRow = rowDate >= last30 && rowDate <= today;
              break;
            case 'thisMonth':
              showRow = rowDate.getMonth() === today.getMonth() &&
                       rowDate.getFullYear() === today.getFullYear();
              break;
            case 'lastMonth':
              const lastMonth = new Date(today.getFullYear(), today.getMonth() - 1, 1);
              const lastMonthEnd = new Date(today.getFullYear(), today.getMonth(), 0);
              showRow = rowDate >= lastMonth && rowDate <= lastMonthEnd;
              break;
            case 'thisYear':
              showRow = rowDate.getFullYear() === today.getFullYear();
              break;
            default:
              showRow = true;
          }

          row.style.display = showRow ? '' : 'none';
        });

        // Update dropdown button text
        const filterText = document.getElementById('dateFilter').options[document.getElementById('dateFilter').selectedIndex].text;
        document.getElementById('dateFilterBtn').textContent = Filter: ${filterText};
      }

      // Initialize filter on page load
      document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('dateFilter').addEventListener('change', applyDateFilter);
      });
    </script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tableBody = document.querySelector('tbody');
    const searchInput = document.getElementById('searchInput');
    const dateFrom = document.getElementById('dateFrom');
    const dateTo = document.getElementById('dateTo');
    const filterBy = document.getElementById('filterBy');
    const filterByDate = document.getElementById('filterByDate');
    const reportType = document.getElementById('reportType');

    function updateTable() {
        const rows = Array.from(tableBody.getElementsByTagName('tr'));
        const searchValue = searchInput.value.toLowerCase();
        const fromDate = dateFrom.value ? new Date(dateFrom.value) : null;
        const toDate = dateTo.value ? new Date(dateTo.value) : null;
        const filterDateValue = filterByDate.value;
        const filterByValue = filterBy.value;
        const reportTypeValue = reportType.value;

        rows.forEach(row => {
            const rowData = Array.from(row.cells).map(cell => cell.textContent.toLowerCase());
            const dateStr = row.cells[1].textContent;
            const date = new Date(dateStr);
            const typeCell = row.cells[7].textContent.toLowerCase(); // Loyalty Points column contains Service/Product type
            const costValue = parseFloat(row.cells[6].textContent.replace('₱', '').replace(',', '')); // Service Cost column
            const description = row.cells[3].textContent.toLowerCase(); // Description column

            let showRow = true;

            // Apply search filter
            if (searchValue) {
                showRow = rowData.some(text => text.includes(searchValue));
            }

            // Apply filter by type and price
            if (showRow && filterByValue) {
                switch(filterByValue) {
                    case 'service':
                        showRow = typeCell.includes('service');
                        break;
                    case 'product':
                        showRow = typeCell.includes('product');
                        break;
                    case 'price_high':
                        // Sort by price high to low
                        const rows = Array.from(tableBody.getElementsByTagName('tr'));
                        rows.sort((a, b) => {
                            const priceA = parseFloat(a.cells[6].textContent.replace('₱', '').replace(',', ''));
                            const priceB = parseFloat(b.cells[6].textContent.replace('₱', '').replace(',', ''));
                            return priceB - priceA;
                        });
                        rows.forEach(row => tableBody.appendChild(row));
                        break;
                    case 'price_low':
                        // Sort by price low to high
                        const rowsLow = Array.from(tableBody.getElementsByTagName('tr'));
                        rowsLow.sort((a, b) => {
                            const priceA = parseFloat(a.cells[6].textContent.replace('₱', '').replace(',', ''));
                            const priceB = parseFloat(b.cells[6].textContent.replace('₱', '').replace(',', ''));
                            return priceA - priceB;
                        });
                        rowsLow.forEach(row => tableBody.appendChild(row));
                        break;
                }
            }

            // Apply date filters
            if (showRow) {
                if (fromDate || toDate) {
                    // Custom date range filter
                    if (fromDate && toDate) {
                        showRow = date >= fromDate && date <= toDate;
                    } else if (fromDate) {
                        showRow = date >= fromDate;
                    } else if (toDate) {
                        showRow = date <= toDate;
                    }
                } else if (filterDateValue) {
                    // Preset date filters
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);

                    switch(filterDateValue) {
                        case 'today':
                            showRow = date.toDateString() === today.toDateString();
                            break;
                        case 'yesterday':
                            const yesterday = new Date(today);
                            yesterday.setDate(today.getDate() - 1);
                            showRow = date.toDateString() === yesterday.toDateString();
                            break;
                        case 'last_week':
                            const lastWeek = new Date(today);
                            lastWeek.setDate(today.getDate() - 7);
                            showRow = date >= lastWeek;
                            break;
                        case 'last_month':
                            const lastMonth = new Date(today);
                            lastMonth.setDate(today.getDate() - 30);
                            showRow = date >= lastMonth;
                            break;
                        case 'this_month':
                            showRow = date.getMonth() === today.getMonth() &&
                                    date.getFullYear() === today.getFullYear();
                            break;
                        case 'last_3months':
                            const last3Months = new Date(today);
                            last3Months.setMonth(today.getMonth() - 3);
                            showRow = date >= last3Months;
                            break;
                    }
                }
            }

            // Apply report type filter
            if (showRow && reportTypeValue) {
                switch(reportTypeValue) {
                    case 'services':
                        showRow = typeCell.includes('service');
                        break;
                    case 'products':
                        showRow = typeCell.includes('product');
                        break;
                    case 'discounts':
                        // Assuming items with discounts have "discount" in description
                        showRow = description.includes('discount');
                        break;
                    case 'giftcards':
                        // Assuming gift card usage is mentioned in description
                        showRow = description.includes('gift card');
                        break;
                    case 'overall':
                        showRow = true;
                        break;
                }
            }

            row.style.display = showRow ? '' : 'none';
        });
    }

    // Add event listeners for date inputs
    dateFrom.addEventListener('change', function() {
        filterByDate.value = ''; // Clear preset filter
        updateTable();
    });
    dateTo.addEventListener('change', function() {
        filterByDate.value = ''; // Clear preset filter
        updateTable();
    });
    filterByDate.addEventListener('change', function() {
        // Clear custom date range when using preset filters
        if (this.value) {
            dateFrom.value = '';
            dateTo.value = '';
        }
        updateTable();
    });
    searchInput.addEventListener('input', updateTable);

    // Add event listener for Filter By dropdown
    filterBy.addEventListener('change', updateTable);

    // Add event listener for Report Type dropdown
    reportType.addEventListener('change', updateTable);

    // Initialize the table
    updateTable();
});
</script>
</body>
</html>
