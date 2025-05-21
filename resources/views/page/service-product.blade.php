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

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="../../assets/vendor/fonts/iconify-icons.css" />

    <!-- Core CSS -->
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
    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/chartjs/chartjs.css"
    />

    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"
    />

    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/apex-charts/apex-charts.css"
    />
    <link rel="stylesheet" href="../../assets/vendor/libs/swiper/swiper.css" />
    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css"
    />
    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css"
    />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Page CSS -->
    <link
      rel="stylesheet"
      href="../../assets/vendor/css/pages/cards-advance.css"
    />

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/js/config.js"></script>
    </head>
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
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
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

      /* Modal styles */
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

      /* Table styles */
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
            <h4>₱{{ number_format($dailySales, 2) }}</h4>
          </div>
          <div class="metric-card">
            <i class="ti tabler-calendar-month mb-2" style="font-size: 24px; color: #007bff;"></i>
            <h5>Monthly Sales</h5>
            <h4>₱{{ number_format($monthlySales, 2) }}</h4>
          </div>
          <div class="metric-card">
            <i class="ti tabler-chart-pie mb-2" style="font-size: 24px; color: #dc3545;"></i>
            <h5>Overall Sales</h5>
            <h4>₱{{ number_format($totalSales, 2) }}</h4>
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
                    <th>Service Category</th>
                    <th>Service Cost</th>
                    <th>Type</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($services as $service)
<tr>
    <td>{{ $service->service_name }}</td>
    <td>{{ $service->date }}</td>
    <td>{{ $service->branch_name }}</td>
    <td>{{ $service->description }}</td>
    <td>{{ $service->service_category }}</td>
    <td>{{ $service->formatted_cost }}</td> <!-- Using your accessor -->
    <td>
        <span class="badge {{ $service->type === 'service' ? 'bg-label-warning' : 'bg-label-success' }}">
            {{ ucfirst($service->type) }}
        </span>
                    </td>
                    <td class="text-center">
                      <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-sm btn-info view-details" data-service-id="{{ $service->id }}">
                          <i class="ti tabler-eye me-1"></i> View
                        </button>
                        <button class="btn btn-sm btn-primary" onclick="downloadRow(this, 'excel')">
                          <i class="ti tabler-download me-1"></i> Export
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
                          <small style="color: rgba(7, 5, 5, 0.8);">ID: <span id="serviceId"></span></small>
                        </div>
                      </div>
                      <div class="card-body d-flex flex-column" style="gap: 0.5rem; padding-top: 0.75rem; padding-bottom: 0.75rem;">
                        <div style="margin-bottom: 0.35rem;"><strong>Name:</strong> <span id="serviceName"></span></div>
                        <div style="margin-bottom: 0.35rem;"><strong>Category:</strong> <span id="serviceType"></span></div>
                        <div style="margin-bottom: 0.35rem;"><strong>Base Price:</strong> <span class="text-success" id="servicePrice"></span></div>
                        <div style="margin-bottom: 0.35rem;"><strong>Total Sales:</strong> <span class="text-primary" id="serviceTotalSales"></span></div>
                        <div><strong>Status:</strong> <span class="badge" id="serviceStatus"></span></div>
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
                            <tr><td><strong>Total Quantity Sold:</strong></td><td id="serviceQuantity"></td></tr>
                            <tr><td><strong>Total Discounts Given:</strong></td><td id="serviceDiscounts"></td></tr>
                            <tr><td><strong>Gift Card Usage:</strong></td><td id="serviceGiftCards"></td></tr>
                            <tr><td><strong>Average Rating:</strong></td><td id="serviceRating"></td></tr>
                            <tr><td><strong>Customer Satisfaction:</strong></td><td id="serviceSatisfaction"></td></tr>
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
                    rows = rows.filter(row => row.cells[6].textContent.toLowerCase().includes('service'));
                    break;
                case 'products':
                    rows = rows.filter(row => row.cells[6].textContent.toLowerCase().includes('product'));
                    break;
                case 'discounts':
                    rows = rows.filter(row => row.innerHTML.toLowerCase().includes('discount'));
                    break;
                case 'giftcards':
                    rows = rows.filter(row => row.innerHTML.toLowerCase().includes('gift card'));
                    break;
                default:
                    break;
            }
        }

        // === FILTER BY TYPE / PRICE ===
        if (filterValue && filterValue !== '') {
            switch (filterValue) {
                case 'service':
                    rows = rows.filter(row => row.cells[6].textContent.toLowerCase().includes('service'));
                    break;
                case 'product':
                    rows = rows.filter(row => row.cells[6].textContent.toLowerCase().includes('product'));
                    break;
                case 'price_high':
                case 'price_low':
                    rows = sortRowsByPrice(rows, filterValue);
                    break;
                default:
                    break;
            }
        }

        function sortRowsByPrice(rows, sortOrder) {
            return rows.sort((a, b) => {
                const priceA = parseFloat(a.cells[5].textContent.replace(/[^0-9.-]/g, ''));
                const priceB = parseFloat(b.cells[5].textContent.replace(/[^0-9.-]/g, ''));
                return sortOrder === 'price_high' ? priceB - priceA : priceA - priceB;
            });
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
                        return true;
                }
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

    // View details button click handler
    document.querySelectorAll('.view-details').forEach(button => {
        button.addEventListener('click', function() {
            const serviceId = this.dataset.serviceId;
            fetchServiceDetails(serviceId);
        });
    });

    function fetchServiceDetails(serviceId) {
        // This would be replaced with an actual API call in a real application
        console.log('Fetching details for service ID:', serviceId);

        // For demo purposes, we'll just show the modal with empty data
        const modal = new bootstrap.Modal(document.getElementById('serviceDetailsModal'));
        modal.show();
    }
});
</script>

<script>
  document
    .querySelector(".menu-mobile-toggler")
    .addEventListener("click", function () {
      document.querySelector("#layout-menu").classList.toggle("show");
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.15/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
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
    const filename = `${data[0].toLowerCase().replace(/\s+/g, '-')}-details.xlsx`;
    XLSX.writeFile(workbook, filename);
}
</script>
</body>
</html>
