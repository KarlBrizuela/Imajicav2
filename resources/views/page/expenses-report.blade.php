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
    <title>Expenses Report - Imajica</title>
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

    <!-- End Google Tag Manager -->

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
    <!-- build:css assets/vendor/css/theme.css  -->

   <link rel="stylesheet"  href="/public/vendor/libs/node-waves/node-waves.css" />
    <link  rel="stylesheet"  href="/public/vendor/libs/pickr/pickr-themes.css" />
    <link rel="stylesheet" href="/public/vendor/css/core.css" />
    <link rel="stylesheet" href="/public/css/demo.css" />
    <link rel="stylesheet" href="/public/vendor/libs/chartjs/chartjs.css" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- endbuild -->

     <link rel="stylesheet" href="/public/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="/public/vendor/libs/swiper/swiper.css" />
      <link  rel="stylesheet"  href="/public/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="/public/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
  <link rel="stylesheet" href="/public/vendor/fonts/flag-icons.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="/public/vendor/css/pages/cards-advance.css">

    <!-- Helpers -->
    <script src="/public/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="/public/assets/js/config.js"></script>

    <style>
      :root {
        --primary-color: #0ea5e9;
        --primary-light: rgba(14, 165, 233, 0.1);
        --secondary-color: #06b6d4;
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --text-dark: #0f172a;
        --text-light: #64748b;
        --border-radius: 1rem;
        --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.03);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --bg-color: #f8fafc;
      }

      body {
        font-family: 'Public Sans', sans-serif;
        background-color: var(--bg-color);
        color: var(--text-dark);
      }

      .container-p-y {
        padding: 2rem;
        margin-left: 280px;
        width: calc(100% - 280px);
        transition: var(--transition);
        min-height: 100vh;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
      }

      .page-header {
        margin-bottom: 2.5rem;
        position: relative;
      }

      .page-header::after {
        content: '';
        position: absolute;
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        bottom: -12px;
        left: 0;
        border-radius: 10px;
      }

      .page-title {
        font-weight: 700;
        color: var(--text-dark);
        font-size: 2rem;
        margin-bottom: 0.5rem;
        letter-spacing: -0.025em;
      }

      .page-subtitle {
        color: var(--text-light);
        font-weight: 400;
        font-size: 1rem;
      }

      .stats-card {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
      }

      .metric-card {
        background: #fff;
        border-radius: var(--border-radius);
        box-shadow: var(--card-shadow);
        padding: 1.75rem;
        transition: var(--transition);
        border: none;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow: hidden;
      }

      .metric-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 6px;
        height: 100%;
        background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
        border-top-left-radius: var(--border-radius);
        border-bottom-left-radius: var(--border-radius);
      }

      .metric-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
      }

      .metric-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        position: relative;
        z-index: 1;
      }

      .metric-icon::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: currentColor;
        opacity: 0.1;
        border-radius: inherit;
        z-index: -1;
      }

      .metric-icon.expenses {
        color: var(--danger-color);
      }

      .metric-icon.category {
        color: var(--warning-color);
      }

      .metric-icon.trend {
        color: var(--success-color);
      } 

      .metric-label {
        font-size: 0.95rem;
        color: var(--text-light);
        margin-bottom: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-weight: 500;
      }

      .metric-value {
        font-size: 2.25rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 0;
        letter-spacing: -0.025em;
        line-height: 1.2;
      }

      .content-card {
        background: #fff;
        border-radius: var(--border-radius);
        box-shadow: var(--card-shadow);
        padding: 0;
        overflow: hidden;
        transition: var(--transition);
        margin-bottom: 2rem;
        border: 1px solid rgba(0, 0, 0, 0.03);
      }

      .content-card:hover {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.07), 0 10px 10px -5px rgba(0, 0, 0, 0.05);
      }

      .card-header {
        background: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding: 1.5rem 1.75rem;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1.25rem;
      }

      .card-title {
        font-size: 1.35rem;
        font-weight: 600;
        color: var(--text-dark);
        margin: 0;
        padding-top: 0.5rem;
      }

      .filters-wrap {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        align-items: flex-end;
      }

      .filter-item {
        min-width: 180px;
        margin-bottom: 0;
      }

      .filter-label {
        font-size: 0.75rem;
        color: var(--text-light);
        margin-bottom: 0.35rem;
        font-weight: 500;
      }

      .table-responsive {
        padding: 0;
      }

      .table {
        width: 100%;
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0;
      }

      .table th {
        font-weight: 600;
        color: var(--text-dark);
        font-size: 0.875rem;
        padding: 1rem 1.5rem;
        border-top: none;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        background-color: #fff;
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.05);
      }

      .table td {
        vertical-align: middle;
        padding: 1.25rem 1.5rem;
        border-top: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        color: var(--text-dark);
      }

      .table tbody tr {
        transition: var(--transition);
        position: relative;
      }

      .table tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.02);
      }

      .table tbody tr:last-child td {
        border-bottom: none;
      }

      .badge {
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.5em 0.85em;
        border-radius: 50rem;
        letter-spacing: 0.025em;
      }

      .badge-success {
        background-color: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
      }

      .badge-warning {
        background-color: rgba(245, 158, 11, 0.1);
        color: var(--warning-color);
      }

      .badge-danger {
        background-color: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
      }

      .btn {
        font-weight: 500;
        padding: 0.5rem 1.25rem;
        border-radius: 0.75rem;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
      }

      .btn::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.1);
        transform: scale(0);
        opacity: 0;
        border-radius: inherit;
        transition: 0.3s;
      }

      .btn:hover::after {
        transform: scale(1);
        opacity: 1;
      }

      .btn-sm {
        padding: 0.35rem 1rem;
        font-size: 0.875rem;
        border-radius: 0.5rem;
      }

      .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
      }

      .btn-primary:hover, .btn-primary:focus {
        background-color: #0284c7;
        border-color: #0284c7;
      }

      .btn-icon {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
      }

      .form-control, .form-select {
        padding: 0.625rem 1rem;
        border-radius: 0.75rem;
        border: 1px solid rgba(0, 0, 0, 0.1);
        font-size: 0.95rem;
        transition: var(--transition);
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      }

      .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px var(--primary-light);
      }

      .input-group .form-control:not(:first-child) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
      }

      .input-group-text {
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-right: none;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        padding: 0.625rem 1rem;
        border-radius: 0.75rem 0 0 0.75rem;
      }

      /* Animations */
      @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
      }

      .stats-card .metric-card:nth-child(2),
      .stats-card .metric-card:nth-child(3) {
        animation: none;
}

      .content-card {
        animation: fadeIn 0.5s 0.3s both;
      }

      /* Modal styling */
      .modal-content {
        border-radius: var(--border-radius);
        border: none;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        overflow: hidden;
      }

      .modal-header {
        border-bottom: none;
        padding: 1.5rem;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      }
      
      .modal-title {
        font-weight: 600;
        color: white;
      }
      
      .modal-body {
        padding: 1.75rem;
      }
      
      .modal-footer {
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        padding: 1.25rem 1.75rem;
        background-color: #fafafa;
      }

      /* Cards in modal */
      .modal .card {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        height: 100%;
      }
      
      .modal .card-header {
        background-color: #f9fafb;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding: 1rem 1.25rem;
      }
      
      .modal .list-group-item {
        border-color: rgba(0, 0, 0, 0.05);
        padding: 1rem 1.25rem;
      }

      .doc-item {
        display: flex;
        align-items: center;
        background-color: #f9fafb;
        border-radius: 0.75rem;
        padding: 1rem;
        margin-bottom: 1rem;
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: var(--transition);
      }
      
      .doc-item:hover {
        background-color: #f1f5f9;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      }
      
      .doc-icon {
        font-size: 1.75rem;
        margin-right: 1rem;
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      
      .doc-info {
        flex: 1;
      }
      
      .doc-title {
        font-weight: 600;
        margin-bottom: 0.25rem;
      }
      
      .doc-meta {
        font-size: 0.75rem;
        color: var(--text-light);
      }
      
      .doc-action {
        margin-left: auto;
      }

      @media (max-width: 1199px) {
        .container-p-y {
          margin-left: 0;
          width: 100%;
        }
      }

      @media (max-width: 767px) {
        .filters-wrap {
          flex-direction: column;
          width: 100%;
          align-items: stretch;
          margin-top: 0.5rem;
        }
        
        .filter-item {
          width: 100%;
          margin-bottom: 0.75rem;
        }
        
        .card-title {
          width: 100%;
          margin-bottom: 0.5rem;
          padding-top: 0;
        }
        
        .page-title {
          font-size: 1.75rem;
        }
        
        .metric-value {
          font-size: 1.75rem;
        }
      }

      /* Export button styling */
      .export-btn {
        transition: var(--transition);
        min-width: 100px;
        text-align: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 0.4rem;
        width: 100px;
      }

      .export-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
      }
    </style>
    <!-- Add these libraries in the head section -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.29/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
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
    <div class="container rounded">
      <div class="page-header">
        <h1 class="page-title">Expenses Report</h1>
        <p class="page-subtitle">Overview of all company expenses</p>
      </div>

      <div class="stats-card">
        <div class="metric-card">
          <div class="metric-icon expenses">
            <i class="ti tabler-receipt" style="font-size: 26px;"></i>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <span class="metric-label">Total Expenses</span>
            <span class="badge badge-danger px-2 py-1">YTD</span>
          </div>
          <h3 class="metric-value">₱{{ number_format($totalExpenses, 2) }}</h3>
          <div class="metric-trend">
            <small class="d-flex align-items-center mt-2">
              <i class="ti ti-trending-up me-1 text-success"></i> 
            </small>
          </div>
        </div>
        
        <div class="metric-card">
          <div class="metric-icon category">
            <i class="ti tabler-chart-pie" style="font-size: 26px;"></i>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <span class="metric-label">Highest Category</span>
            <span class="badge badge-warning px-2 py-1">Top 1</span>
          </div>
          <h3 class="metric-value">{{ $highestCategoryName }}</h3>
          <div class="metric-trend">
            <small class="d-flex align-items-center mt-2">
              <i class="ti ti-chart-bar me-1 text-primary"></i>
            </small>
          </div>
        </div>
      </div>

      <div class="content-card">
        <div class="card-header d-flex flex-wrap">
          <h5 class="card-title mb-3 mb-md-0 me-auto">Expense Transactions</h5>
          
          <div class="filters-wrap">
            <div class="filter-item">
              <div class="input-group">
                <span class="input-group-text">
                  <i class="ti tabler-search"></i>
                </span>
                <input 
                  type="text" 
                  class="form-control" 
                  id="searchInput" 
                  placeholder="Search expenses..."
                >
              </div>
            </div>

            <div class="filter-item">
              <label class="filter-label">Sort By</label>
              <select class="form-select" id="sortBy">
                <option value="">Default</option>
                <option value="date">Date (Newest First)</option>
                <option value="amount">Amount (High to Low)</option>
                <option value="category">Category (A to Z)</option>
                <option value="status">Payment Status</option>
              </select>
            </div>

            <div class="filter-item">
              <label class="filter-label">Filter by date</label>
              <select class="form-select" id="dateFilter">
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

        <div class="table-responsive">
          <table class="table" id="expenseReport">
            <thead>
              <tr>
                <th>Date</th>
                <th>Receipt/Invoice</th>
                <th>Expense Name</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($expenses as $expense)
              <tr>
                <td>
                  @php
                    try {
                      $date = \Carbon\Carbon::parse($expense->date_expense);
                      echo $date->format('Y-m-d');
                    } catch (\Exception $e) {
                      echo $expense->date_expense;
                    }
                  @endphp
                </td>
                <td>{{ $expense->invoice_number ?? 'N/A' }}</td>
                <td>{{ $expense->expense_name }}</td>
                <td>{{ $expense->category_expense->name ?? 'N/A' }}</td>
                <td class="amount-cell">₱{{ number_format($expense->expense_cost, 2) }}</td>
                <td>
                  @if($expense->payment_status == 'Paid')
                    <span class="badge badge-success">Paid</span>
                  @elseif($expense->payment_status == 'Pending')
                    <span class="badge badge-warning">Pending</span>
                  @elseif($expense->payment_status == 'Overdue')
                    <span class="badge badge-danger">Overdue</span>
                  @endif
                </td>
                <td class="text-center">
                  <button class="btn btn-sm btn-primary btn-icon export-btn" onclick="downloadRow(this, 'excel')">
                    <i class="ti tabler-download"></i> Export
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr class="bg-light">
                <td colspan="4" class="text-end fw-bold">Total</td>
                <td class="fw-bold text-dark" id="filteredTotal">₱{{ number_format($totalExpenses, 2) }}</td>
                <td colspan="2"></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      
      <!-- Category Breakdown Section -->

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Mobile menu toggle
  const menuToggler = document.querySelector('.menu-mobile-toggler');
  if (menuToggler) {
    menuToggler.addEventListener('click', function() {
      document.querySelector('#layout-menu').classList.toggle('show');
    });
  }

  // Initialize all charts
  initializeChart();
  
  // Initialize table functionality
  initializeTable();

  // Initialize modal charts when shown
  const expenseModal = document.getElementById('expenseModal');
  if (expenseModal) {
    expenseModal.addEventListener('shown.bs.modal', function() {
      initializeChart();
    });
  }
});

function initializeTable() {
  const searchInput = document.getElementById('searchInput');
  const sortBy = document.getElementById('sortBy');
  const dateFilter = document.getElementById('dateFilter');
  const table = document.getElementById('expenseReport');
  
  if (!table || !searchInput || !sortBy || !dateFilter) return;

  // Search functionality
  searchInput.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    filterTable(searchTerm, dateFilter.value);
  });

// Sort functionality
sortBy.addEventListener('change', function() {
  const rows = Array.from(table.querySelectorAll('tbody tr'));
  const sortValue = this.value;

  rows.sort((a, b) => {
    let aVal, bVal;

    switch(sortValue) {
      case 'date':
        aVal = new Date(a.cells[0].textContent);
        bVal = new Date(b.cells[0].textContent);
        return bVal - aVal; // Descending (latest first)
        
      case 'amount':
        aVal = parseFloat(a.cells[4].textContent.replace('₱', '').replace(/,/g, ''));
        bVal = parseFloat(b.cells[4].textContent.replace('₱', '').replace(/,/g, ''));
        return bVal - aVal; // Descending (highest first)
        
      case 'category':
        aVal = a.cells[3].textContent.toLowerCase();
        bVal = b.cells[3].textContent.toLowerCase();
        return aVal.localeCompare(bVal); // Ascending A–Z
       
      case 'status':
        aVal = a.cells[5].textContent.trim().toLowerCase();
        bVal = b.cells[5].textContent.trim().toLowerCase();
        return aVal.localeCompare(bVal); // Ascending A–Z

      default:
        return 0;
    }
  });

  // Append sorted rows to tbody
  const tbody = table.querySelector('tbody');
  rows.forEach(row => tbody.appendChild(row));
  
  // Update total after sorting
  updateFilteredTotal();
});


  // Date filter functionality
  dateFilter.addEventListener('change', function() {
    const searchTerm = searchInput.value.toLowerCase();
    filterTable(searchTerm, this.value);
  });
}

function filterTable(searchTerm, dateFilterValue) {
  const table = document.getElementById('expenseReport');
  if (!table) return;
  
  const rows = table.querySelectorAll('tbody tr');
  const today = new Date();
  today.setHours(0, 0, 0, 0);

  rows.forEach(row => {
    // Text search filtering
    const expenseName = row.cells[2].textContent.toLowerCase();
    const category = row.cells[3].textContent.toLowerCase();
    const textMatch = !searchTerm || 
                      expenseName.includes(searchTerm) || 
                      category.includes(searchTerm);
    
    // Date filtering
    let dateMatch = true;
    if (dateFilterValue) {
      const rowDate = new Date(row.cells[0].textContent);
      
      switch (dateFilterValue) {
        case 'today':
          dateMatch = rowDate.toDateString() === today.toDateString();
          break;
        case 'yesterday':
          const yesterday = new Date(today);
          yesterday.setDate(yesterday.getDate() - 1);
          dateMatch = rowDate.toDateString() === yesterday.toDateString();
          break;
        case 'last_week':
          const lastWeek = new Date(today);
          lastWeek.setDate(lastWeek.getDate() - 7);
          dateMatch = rowDate >= lastWeek;
          break;
        case 'last_month':
          const lastMonth = new Date(today);
          lastMonth.setDate(lastMonth.getDate() - 30);
          dateMatch = rowDate >= lastMonth;
          break;
        case 'this_month':
          dateMatch = rowDate.getMonth() === today.getMonth() && 
                     rowDate.getFullYear() === today.getFullYear();
          break;
        case 'last_3months':
          const last3Months = new Date(today);
          last3Months.setMonth(last3Months.getMonth() - 3);
          dateMatch = rowDate >= last3Months;
          break;
      }
    }
    
    // Show/hide row based on both conditions
    row.style.display = textMatch && dateMatch ? '' : 'none';
  });
  
  // Update the total amount after filtering
  updateFilteredTotal();
}

function updateFilteredTotal() {
  const table = document.getElementById('expenseReport');
  if (!table) return;
  
  const visibleRows = table.querySelectorAll('tbody tr:not([style*="display: none"])');
  let total = 0;
  
  visibleRows.forEach(row => {
    const amountText = row.querySelector('.amount-cell').textContent;
    const amount = parseFloat(amountText.replace('₱', '').replace(/,/g, ''));
    total += amount;
  });
  
  // Update the total in the footer
  const totalElement = document.getElementById('filteredTotal');
  if (totalElement) {
    totalElement.textContent = '₱' + total.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
  }
}

function initializeChart() {
  const ctx = document.getElementById('expenseChart')?.getContext('2d');
  if (!ctx) return;
  
  // Define gradient background
  const gradient = ctx.createLinearGradient(0, 0, 0, 300);
  gradient.addColorStop(0, 'rgba(14, 165, 233, 0.2)');
  gradient.addColorStop(1, 'rgba(14, 165, 233, 0)');
  
  // Use the monthly data from PHP if available, or fallback to static data
  const labels = {!! isset($monthlyData) && isset($monthlyData['labels']) ? json_encode($monthlyData['labels']) : '["Aug", "Sep", "Oct", "Nov", "Dec", "Jan"]' !!};
  const values = {!! isset($monthlyData) && isset($monthlyData['values']) ? json_encode($monthlyData['values']) : '[11200, 10800, 11500, 12100, 11900, 12450]' !!};
  
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'Monthly Expenses (₱)',
        data: values,
        backgroundColor: gradient,
        borderColor: "#0ea5e9",
        borderWidth: 2,
        borderRadius: 6,
        barThickness: 16,
        hoverBackgroundColor: 'rgba(14, 165, 233, 0.4)'
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'top',
          labels: {
            usePointStyle: true,
            boxWidth: 6,
            font: {
              size: 12
            }
          }
        },
        tooltip: {
          backgroundColor: 'rgba(0, 0, 0, 0.7)',
          padding: 10,
          titleFont: {
            size: 14
          },
          bodyFont: {
            size: 13
          },
          displayColors: false,
          callbacks: {
            label: function(context) {
              return '₱' + context.parsed.y.toLocaleString();
            }
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            display: true,
            drawBorder: false,
            color: 'rgba(0, 0, 0, 0.05)'
          },
          ticks: {
            font: {
              size: 11
            },
            callback: function(value) {
              return '₱' + value.toLocaleString();
            }
          }
        },
        x: {
          grid: {
            display: false
          },
          ticks: {
            font: {
              size: 11
            }
          }
        }
      },
      animation: {
        duration: 2000,
        easing: 'easeOutQuart'
      }
    }
  });
  
  // Initialize category pie chart if element exists
  initializePieChart();
}

function initializePieChart() {
  const pieCtx = document.getElementById('categoryChart')?.getContext('2d');
  if (!pieCtx) return;
  
  // Use the category data from PHP if available, or fallback to static data
  const categories = {!! isset($categoryBreakdown) && isset($categoryBreakdown['labels']) ? json_encode($categoryBreakdown['labels']) : '["Utilities", "Rent", "Payroll", "Supplies", "Marketing"]' !!};
  const values = {!! isset($categoryBreakdown) && isset($categoryBreakdown['values']) ? json_encode($categoryBreakdown['values']) : '[42000, 32000, 26400, 19200, 15800]' !!};
  const colors = {!! isset($categoryBreakdown) && isset($categoryBreakdown['colors']) ? json_encode($categoryBreakdown['colors']) : '["#0ea5e9", "#f59e0b", "#10b981", "#8b5cf6", "#ef4444"]' !!};
  
  new Chart(pieCtx, {
    type: 'doughnut',
    data: {
      labels: categories,
      datasets: [{
        data: values,
        backgroundColor: colors,
        borderColor: 'white',
        borderWidth: 3,
        borderRadius: 3,
        hoverOffset: 10,
        weight: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      cutout: '65%',
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          backgroundColor: 'rgba(0, 0, 0, 0.7)',
          padding: 12,
          titleFont: {
            size: 14
          },
          bodyFont: {
            size: 13
          },
          callbacks: {
            label: function(context) {
              const value = context.parsed;
              const total = context.dataset.data.reduce((acc, val) => acc + val, 0);
              const percentage = ((value / total) * 100).toFixed(1);
              return `₱${value.toLocaleString()} (${percentage}%)`;
            }
          }
        }
      },
      animation: {
        animateRotate: true,
        animateScale: true,
        duration: 1500,
        easing: 'easeOutQuart'
      }
    }
  });
  
  // Initialize trend line chart
  initializeTrendChart();
}

function initializeTrendChart() {
  const trendCtx = document.getElementById('trendChart')?.getContext('2d');
  if (!trendCtx) return;
  
  // Sample data for the trend chart
  const labels = {!! isset($monthlyData) && isset($monthlyData['labels']) ? json_encode($monthlyData['labels']) : '["Aug", "Sep", "Oct", "Nov", "Dec", "Jan"]' !!};
  const values = {!! isset($monthlyData) && isset($monthlyData['values']) ? json_encode($monthlyData['values']) : '[11200, 10800, 11500, 12100, 11900, 12450]' !!};
  
  // Create gradient
  const gradient = trendCtx.createLinearGradient(0, 0, 0, 300);
  gradient.addColorStop(0, 'rgba(6, 182, 212, 0.25)');
  gradient.addColorStop(1, 'rgba(6, 182, 212, 0)');
  
  new Chart(trendCtx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: 'Expenses',
        data: values,
        borderColor: '#06b6d4',
        backgroundColor: gradient,
        tension: 0.3,
        fill: true,
        borderWidth: 3,
        pointBackgroundColor: '#06b6d4',
        pointBorderColor: '#fff',
        pointBorderWidth: 2,
        pointRadius: 4,
        pointHoverRadius: 6
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
          backgroundColor: 'rgba(0, 0, 0, 0.7)',
          padding: 10,
          titleFont: {
            size: 14
          },
          bodyFont: {
            size: 13
          },
          callbacks: {
            label: function(context) {
              return '₱' + context.parsed.y.toLocaleString();
            }
          }
        }
      },
      scales: {
        y: {
          beginAtZero: false,
          grid: {
            display: true,
            color: 'rgba(0, 0, 0, 0.05)'
          },
          ticks: {
            font: {
              size: 11
            },
            callback: function(value) {
              return '₱' + value.toLocaleString();
            }
          }
        },
        x: {
          grid: {
            display: false
          },
          ticks: {
            font: {
              size: 11
            }
          }
        }
      },
      animation: {
        duration: 2000
      }
    }
  });
}

function downloadRow(button, format) {
  const row = button.closest('tr');
  const rowData = {
    date: row.cells[0].textContent.trim(),
    invoice: row.cells[1].textContent.trim(),
    name: row.cells[2].textContent.trim(),
    category: row.cells[3].textContent.trim(),
    amount: row.cells[4].textContent.trim(),
    status: row.cells[5].querySelector('.badge')?.textContent.trim() || row.cells[5].textContent.trim()
  };

  switch(format) {
    case 'excel':
      saveAsExcel(rowData);
      break;
    case 'pdf':
      saveAsPDF(rowData);
      break;
    case 'csv':
      saveAsCSV(rowData);
      break;
  }
}

function saveAsExcel(data) {
  const wb = XLSX.utils.book_new();
  const headers = ['Date', 'Invoice No', 'Expense Name', 'Category', 'Amount', 'Status'];
  const rowData = [
    headers,
    [data.date, data.invoice, data.name, data.category, data.amount, data.status]
  ];
  
  const ws = XLSX.utils.aoa_to_sheet(rowData);
  XLSX.utils.book_append_sheet(wb, ws, 'Expense Details');
  XLSX.writeFile(wb, `Expense_${data.invoice}.xlsx`);
}

function saveAsPDF(data) {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();
  
  doc.text('Expense Details', 14, 15);
  doc.autoTable({
    head: [['Field', 'Value']],
    body: [
      ['Date', data.date],
      ['Invoice No', data.invoice],
      ['Expense Name', data.name],
      ['Category', data.category],
      ['Amount', data.amount],
      ['Status', data.status]
    ],
    startY: 20,
    theme: 'grid',
    headStyles: { fillColor: [30, 77, 43] }
  });
  
  doc.save(`Expense_${data.invoice}.pdf`);
}

function saveAsCSV(data) {
  const headers = ['Date', 'Invoice No', 'Expense Name', 'Category', 'Amount', 'Status'];
  const rowData = [data.date, data.invoice, data.name, data.category, data.amount, data.status];
  
  const csvContent = [
    headers.join(','),
    rowData.join(',')
  ].join('\n');
  
  const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
  const link = document.createElement('a');
  link.href = URL.createObjectURL(blob);
  link.download = `Expense_${data.invoice}.csv`;
  
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}
</script>

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

  <!-- Footer -->
 
  <!-- / Footer -->

  <script src="/public/vendor/libs/jquery/jquery.js"></script>
    <script src="/public/vendor/libs/popper/popper.js"></script>
    <script src="/public/vendor/js/bootstrap.js"></script>
    <script src="/public/vendor/libs/node-waves/node-waves.js"></script>
    <script src="/public/vendor/libs/%40algolia/autocomplete-js.js"></script>
    <script src="/public/vendor/libs/pickr/pickr.js"></script>
    <script src="/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/public/vendor/libs/hammer/hammer.js"></script>
    <script src="/public/vendor/libs/i18n/i18n.js"></script>
    <script src="/public/'vendor/js/menu.js"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
 <script src="/public/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="/public/vendor/libs/swiper/swiper.js"></script>
<script src="/public/endor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

  <!-- Main JS -->

  <script src="/public/assets/js/main.js"></script>

  <!-- Page JS -->
   <script src="/public/vendor/libs/chartjs/chartjs.js"></script>
  <script src="/public/assets/js/charts-chartjs-legend.js"></script>
  <script src="/public/assets/js/charts-chartjs.js"></script>
  
  
</body>
</html>
