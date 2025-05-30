    @extends('layouts.app')



<!DOCTYPE html>
<html
  lang="en"
  class="layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-skin="default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template"
  data-bs-theme="light">


        <head>
        <title>Product Report - Imajica</title>
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

        <link rel="stylesheet" href="/public/vendor/fonts/iconify-icons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet"  href="/public/vendor/libs/node-waves/node-waves.css" />
        <link  rel="stylesheet"  href="/public/vendor/libs/pickr/pickr-themes.css" />
        <link rel="stylesheet" href="/public/vendor/css/core.css" />
        <link rel="stylesheet" href="/public/css/demo.css" />
        <script src="/public/vendor/libs/chartjs/chartjs.js"></script>

        <link rel="stylesheet" href="/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />>

    <link rel="stylesheet" href="/public/vendor/libs/apex-charts/apex-charts.css" />
        <link rel="stylesheet" href="/public/vendor/libs/swiper/swiper.css" />
        <link  rel="stylesheet"  href="/public/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
        <link rel="stylesheet" href="/public/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.cs" />
    <link rel="stylesheet" href="/public/vendor/fonts/flag-icons.css" />

        <!-- Page CSS -->
        <link rel="stylesheet" href="/public/vendor/css/pages/cards-advance.css" />


        <!-- Helpers -->
        <script src="/public/vendor/js/helpers.js"></script>
        <script src="/public/assets/js/config.js"></script>
        <script src="https://cdn.sheetjs.com/xlsx-0.20.1/package/dist/xlsx.full.min.js"></script>
        </head>
        <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap");

    <!-- Helpers -->
      <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <script src="../../assets/js/config.js"></script>

    <!-- Add SheetJS for Excel export -->
    <script src="https://cdn.sheetjs.com/xlsx-0.19.3/package/dist/xlsx.full.min.js"></script>
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
            <h1>Product Report Summary</h1>
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
                            <button class="btn btn-sm btn-primary" onclick="exportRowToExcel(this)">
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
  // Export to Excel function for the entire table
  function exportToExcel() {
    // Get the table element
    const table = document.getElementById('servicesTable');

    // Create array to hold the data
    const data = [];

    // Get headers
    const headers = [];
    const headerCells = table.querySelectorAll('thead th');
    headerCells.forEach((cell, index) => {
      if (index < headerCells.length - 1) { // Skip the last column (Actions)
        headers.push(cell.textContent.trim());
      }
    });
    data.push(headers);

    // Get visible rows data
    const rows = table.querySelectorAll('tbody tr');
    rows.forEach(row => {
      if (row.style.display !== 'none' && !row.id.includes('noResultsRow')) {
        const rowData = [];
        const cells = row.querySelectorAll('td');
        cells.forEach((cell, index) => {
          if (index < cells.length - 1) { // Skip the last column (Actions)
            // For status columns, get the badge text
            if (index === 5 || index === 6) {
              const badge = cell.querySelector('.badge');
              rowData.push(badge ? badge.textContent.trim() : '');
            } else {
              rowData.push(cell.textContent.trim());
            }
          }
        });
        data.push(rowData);
      }
    });

    // Create worksheet
    const ws = XLSX.utils.aoa_to_sheet(data);

    // Create workbook
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Service Report");

    // Generate filename with current date
    const today = new Date();
    const dateString = today.toISOString().split('T')[0];
    const fileName = `Service_Report_${dateString}.xlsx`;

    // Export to Excel file
    XLSX.writeFile(wb, fileName);
  }

  // Export single row to Excel
  function exportRowToExcel(button) {
    // Get the row that contains this button
    const row = button.closest('tr');

    // Create headers array
    const headers = [];
    const headerCells = row.closest('table').querySelectorAll('thead th');
    headerCells.forEach((cell, index) => {
      if (index < headerCells.length - 1) { // Skip the Actions column
        headers.push(cell.textContent.trim());
      }
    });

    // Create data object
    const rowData = {};
    const cells = row.querySelectorAll('td');
    cells.forEach((cell, index) => {
      if (index < cells.length - 1) { // Skip the Actions column
        const header = headers[index];
        // For status columns, get the badge text
        if (index === 5 || index === 6) {
          const badge = cell.querySelector('.badge');
          rowData[header] = badge ? badge.textContent.trim() : '';
        } else {
          rowData[header] = cell.textContent.trim();
        }
      }
    });

    // Create worksheet from the single row data
    const ws = XLSX.utils.json_to_sheet([rowData]);

    // Create workbook
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Service Details");

    // Generate filename with service name and date
    const serviceName = rowData[headers[0]].replace(/[^a-z0-9]/gi, '_').toLowerCase();
    const date = new Date().toISOString().split('T')[0];
    const fileName = `service_${serviceName}_${date}.xlsx`;

    // Export to Excel file
    XLSX.writeFile(wb, fileName);
  }

  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterBy = document.getElementById('filterBy');
    const filterByPayment = document.getElementById('filterByPayment');
    const filterByDate = document.getElementById('filterByDate');
    const tableRows = document.querySelectorAll('table tbody tr');

    // Function to calculate sales from visible rows
    function calculateSalesFromVisibleRows() {
        let dailySales = 0;
        let monthlySales = 0;
        let totalSales = 0;
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        const currentMonth = today.getMonth();
        const currentYear = today.getFullYear();

        tableRows.forEach(row => {
            if (row.style.display !== 'none') {
                const amountText = row.querySelector('td:nth-child(5)').textContent;
                const amount = parseFloat(amountText.replace('₱', '').replace(/,/g, ''));
                const dateStr = row.querySelector('td:nth-child(2)').textContent;
                const rowDate = new Date(dateStr);

                if (!isNaN(amount)) {
                    totalSales += amount;

                    if (rowDate.toDateString() === today.toDateString()) {
                        dailySales += amount;
                    }

                    if (rowDate.getMonth() === currentMonth && rowDate.getFullYear() === currentYear) {
                        monthlySales += amount;
                    }
                }
            }
        });

        document.querySelector('.metric-card:nth-child(1) h4').textContent = '₱' + dailySales.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        document.querySelector('.metric-card:nth-child(2) h4').textContent = '₱' + monthlySales.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        document.querySelector('.metric-card:nth-child(3) h4').textContent = '₱' + totalSales.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    // Function to apply filters
    function applyFilters() {
        const searchText = searchInput.value.toLowerCase();
        const filterValue = filterBy.value;
        const paymentFilter = filterByPayment.value;
        const dateFilter = filterByDate.value;

        tableRows.forEach(row => {
            let showRow = true;

            // Search Text Filter
            if (searchText) {
                const searchableColumns = [
                    row.cells[0].textContent.toLowerCase(), // Service Name
                    row.cells[2].textContent.toLowerCase(), // Branch Name
                    row.cells[3].textContent.toLowerCase()  // Payment Category
                ];
                showRow = searchableColumns.some(text => text.includes(searchText));
            }

            // Payment Status Filter
            if (showRow && paymentFilter) {
                const paymentStatus = row.cells[5].querySelector('.badge').textContent.trim().toLowerCase();
                showRow = paymentStatus === paymentFilter;
            }

            // Order Status Filter
            if (showRow && filterValue && !['price_high', 'price_low'].includes(filterValue)) {
                const orderStatus = row.cells[6].querySelector('.badge').textContent.trim().toLowerCase();
                const normalizedFilterValue = filterValue.replace(/_/g, ' ');
                showRow = orderStatus === normalizedFilterValue;
            }

            // Date Filter
            if (showRow && dateFilter) {
                const rowDate = new Date(row.cells[1].textContent.trim());
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                switch (dateFilter) {
                    case 'today':
                        showRow = isSameDay(rowDate, today);
                        break;
                    case 'yesterday':
                        const yesterday = new Date(today);
                        yesterday.setDate(yesterday.getDate() - 1);
                        showRow = isSameDay(rowDate, yesterday);
                        break;
                    case 'last_week':
                        const weekAgo = new Date(today);
                        weekAgo.setDate(weekAgo.getDate() - 7);
                        showRow = rowDate >= weekAgo && rowDate <= today;
                        break;
                    case 'last_month':
                        const monthAgo = new Date(today);
                        monthAgo.setDate(monthAgo.getDate() - 30);
                        showRow = rowDate >= monthAgo && rowDate <= today;
                        break;
                    case 'this_month':
                        showRow = rowDate.getMonth() === today.getMonth() &&
                                rowDate.getFullYear() === today.getFullYear();
                        break;
                    case 'last_3months':
                        const threeMonthsAgo = new Date(today);
                        threeMonthsAgo.setMonth(threeMonthsAgo.getMonth() - 3);
                        showRow = rowDate >= threeMonthsAgo && rowDate <= today;
                        break;
                }
            }

            row.style.display = showRow ? '' : 'none';
        });

        // Update sales metrics after applying filters
        calculateSalesFromVisibleRows();
    }

    // Helper function to compare dates
    function isSameDay(date1, date2) {
        return date1.getFullYear() === date2.getFullYear() &&
               date1.getMonth() === date2.getMonth() &&
               date1.getDate() === date2.getDate();
    }

    // Add event listeners
    searchInput.addEventListener('input', applyFilters);
    filterBy.addEventListener('change', applyFilters);
    filterByPayment.addEventListener('change', applyFilters);
    filterByDate.addEventListener('change', applyFilters);
  });
</script>
    </body>
    </html>
