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

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
     <link rel="stylesheet"  href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />
    <link  rel="stylesheet"  href="{{ asset('vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />
       <script src="{{ asset('vendor/libs/chartjs/chartjs.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />>

   <link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />
     <link rel="stylesheet" href="{{ asset('vendor/libs/swiper/swiper.css') }}" />
       <link  rel="stylesheet"  href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
  <link rel="stylesheet" href="{{ asset('vendor/fonts/flag-icons.css') }}" />

    <!-- Page CSS -->
     <link rel="stylesheet" href="{{ asset('vendor/css/pages/cards-advance.css') }}" />

    <!-- Helpers -->
      <script src="{{ asset('vendor/js/helpers.js') }}"></script>
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
                  <label class="form-label text-muted small mb-1">Filter by Status</label>
                  <select class="form-select form-select-sm" id="filterBy">
                    <option value="">All</option>
                    <optgroup label="Order Status">
                      <option value="ordered">Ordered</option>
                      <option value="delivered">Delivered</option>
                      <option value="out_for_delivery">Out for Delivery</option>
                      <option value="ready_to_pickup">Ready to Pickup</option>
                    </optgroup>
                    <optgroup label="Price">
                      <option value="price_high">Price: (High to Low)</option>
                      <option value="price_low">Price: (Low to High)</option>
                    </optgroup>
                  </select>
                </div>

                <!-- Filter by Payment -->
                <div class="d-flex flex-column" style="width: 160px;">
                  <label class="form-label text-muted small mb-1">Filter by Payment</label>
                  <select class="form-select form-select-sm" id="filterByPayment">
                    <option value="">All</option>
                    <option value="paid">Paid</option>
                    <option value="pending">Pending</option>
                    <option value="failed">Failed</option>
                    <option value="cancelled">Cancelled</option>
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
                    <th>Payment Category</th>
                    <th>Service Cost</th>
                    <th>Payment Status</th>
                    <th>Order Status</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($services as $service)
                  <tr>
                    <td>{{ $service->service_name }}</td>
                    <td>{{ $service->date }}</td>
                    <td>{{ $service->branch_name }}</td>
                    <td>{{ $service->service_category }}</td>
                    <td>{{ $service->formatted_cost }}</td>
                    <td>
                      <span class="badge {{ $service->payment_status === 'Paid' ? 'bg-label-success' : ($service->payment_status === 'Pending' ? 'bg-label-warning' : ($service->payment_status === 'Failed' ? 'bg-label-danger' : 'bg-label-secondary')) }}">
                        {{ $service->payment_status }}
                      </span>
                    </td>
                    <td>
                      <span class="badge {{ $service->order_status === 'Delivered' ? 'bg-label-success' : ($service->order_status === 'Out for Delivery' ? 'bg-label-info' : ($service->order_status === 'Ready to Pickup' ? 'bg-label-warning' : ($service->order_status === 'Ordered' ? 'bg-label-success' : 'bg-label-primary'))) }}">
                        {{ $service->order_status }}
                      </span>
                    </td>
                    <td class="text-center">
                      <div class="d-flex gap-2 justify-content-center">
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
      </div>
    </div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('searchInput');
  const filterBy = document.getElementById('filterBy');
  const filterByPayment = document.getElementById('filterByPayment');
  const filterByDate = document.getElementById('filterByDate');
  const tableBody = document.querySelector('#servicesTable tbody');
  const tableRows = Array.from(tableBody.querySelectorAll('tr'));

  // Apply filters on input/change
  [searchInput, filterBy, filterByPayment, filterByDate].forEach(el => {
      el.addEventListener('change', applyFilters);
  });
  searchInput.addEventListener('input', applyFilters);

  function applyFilters() {
      const searchText = searchInput.value.trim().toLowerCase();
      const filterValue = filterBy.value;
      const paymentFilter = filterByPayment.value;
      const dateFilter = filterByDate.value;

      // First, show all rows to reset any previous filtering
      tableRows.forEach(row => {
          row.style.display = '';
      });

      // === SEARCH FILTER ===
      if (searchText) {
          tableRows.forEach(row => {
              const serviceName = row.cells[0].textContent.toLowerCase();
              const branchName = row.cells[2].textContent.toLowerCase();
              const paymentCategory = row.cells[3].textContent.toLowerCase();

              if (!serviceName.includes(searchText) &&
                  !branchName.includes(searchText) &&
                  !paymentCategory.includes(searchText)) {
                  row.style.display = 'none';
              }
          });
      }

      // === FILTER BY PAYMENT STATUS ===
      if (paymentFilter) {
          tableRows.forEach(row => {
              if (row.style.display === 'none') return;

              const paymentStatusBadge = row.cells[5].querySelector('.badge');
              const paymentStatus = paymentStatusBadge ? paymentStatusBadge.textContent.trim().toLowerCase() : '';

              if (paymentStatus !== paymentFilter.toLowerCase()) {
                  row.style.display = 'none';
              }
          });
      }

      // === FILTER BY ORDER STATUS ===
      if (filterValue) {
          if (['ordered', 'delivered', 'out_for_delivery', 'ready_to_pickup'].includes(filterValue)) {
              tableRows.forEach(row => {
                  if (row.style.display === 'none') return;

                  const orderStatusBadge = row.cells[6].querySelector('.badge');
                  const orderStatus = orderStatusBadge ? orderStatusBadge.textContent.trim().toLowerCase() : '';
                  const filterText = filterValue.replace(/_/g, ' ').toLowerCase();

                  if (orderStatus !== filterText) {
                      row.style.display = 'none';
                  }
              });
          } else if (filterValue === 'price_high' || filterValue === 'price_low') {
              // Get visible rows first
              const visibleRows = tableRows.filter(row => row.style.display !== 'none');

              // Convert to array of objects with row and price for easier sorting
              const rowsWithPrices = visibleRows.map(row => {
                  const priceText = row.cells[4].textContent;
                  // Extract numeric value from price (removing currency symbol and commas)
                  const price = parseFloat(priceText.replace(/[₱,]/g, ''));
                  return { row, price };
              });

              // Sort by price
              rowsWithPrices.sort((a, b) => {
                  return filterValue === 'price_high' ? b.price - a.price : a.price - b.price;
              });

              // Hide all visible rows first
              visibleRows.forEach(row => {
                  row.style.display = 'none';
              });

              // Then show them in the sorted order
              rowsWithPrices.forEach(item => {
                  // Get the parent tbody
                  const tbody = item.row.parentNode;
                  // Reorder in the DOM
                  tbody.appendChild(item.row);
                  // Make visible
                  item.row.style.display = '';
              });
          }
      }

      // === FILTER BY DATE RANGE ===
      if (dateFilter) {
          const now = new Date();
          const today = new Date(now.getFullYear(), now.getMonth(), now.getDate());

          tableRows.forEach(row => {
              if (row.style.display === 'none') return;

              const dateText = row.cells[1].textContent.trim();
              const rowDate = new Date(dateText);

              if (isNaN(rowDate.getTime())) {
                  // Skip this row if date is invalid
                  return;
              }

              // Reset time part for proper date comparison
              const rowDateOnly = new Date(rowDate.getFullYear(), rowDate.getMonth(), rowDate.getDate());

              switch (dateFilter) {
                  case 'today':
                      if (rowDateOnly.getTime() !== today.getTime()) {
                          row.style.display = 'none';
                      }
                      break;
                  case 'yesterday':
                      const yesterday = new Date(today);
                      yesterday.setDate(yesterday.getDate() - 1);
                      if (rowDateOnly.getTime() !== yesterday.getTime()) {
                          row.style.display = 'none';
                      }
                      break;
                  case 'last_week':
                      const weekAgo = new Date(today);
                      weekAgo.setDate(weekAgo.getDate() - 7);
                      if (rowDateOnly < weekAgo || rowDateOnly > today) {
                          row.style.display = 'none';
                      }
                      break;
                  case 'last_month':
                      const monthAgo = new Date(today);
                      monthAgo.setDate(monthAgo.getDate() - 30);
                      if (rowDateOnly < monthAgo || rowDateOnly > today) {
                          row.style.display = 'none';
                      }
                      break;
                  case 'this_month':
                      if (rowDateOnly.getMonth() !== today.getMonth() ||
                          rowDateOnly.getFullYear() !== today.getFullYear()) {
                          row.style.display = 'none';
                      }
                      break;
                  case 'last_3months':
                      const threeMonthsAgo = new Date(today);
                      threeMonthsAgo.setMonth(threeMonthsAgo.getMonth() - 3);
                      if (rowDateOnly < threeMonthsAgo || rowDateOnly > today) {
                          row.style.display = 'none';
                      }
                      break;
              }
          });
      }

      // Show message if no results found
      const visibleRowsCount = tableRows.filter(row => row.style.display !== 'none').length;
      const noResultsRow = document.getElementById('noResultsRow');

      if (visibleRowsCount === 0) {
          if (!noResultsRow) {
              const newRow = document.createElement('tr');
              newRow.id = 'noResultsRow';
              const cell = document.createElement('td');
              cell.colSpan = 8; // Updated to match new number of columns
              cell.textContent = 'No matching records found';
              cell.style.textAlign = 'center';
              newRow.appendChild(cell);
              tableBody.appendChild(newRow);
          }
      } else if (noResultsRow) {
          noResultsRow.remove();
      }
  }
});
</script>
</body>
</html>