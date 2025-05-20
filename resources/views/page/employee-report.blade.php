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
    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/chartjs/chartjs.css"
    />

    <!-- Vendors CSS -->

    <link
      rel="stylesheet"
      href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"
    />

    <!-- endbuild -->

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
        border: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.07);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #fff;
      }

      .card:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      }

      .header {
        text-align: center;
        margin-bottom: 30px;
      }

      .header h1 {
        font-weight: 700;
        color: #1e4d2b;
        margin-bottom: 1.5rem;
        font-size: 2.2rem;
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
        background-color: #1e4d2b;
        border-color: #1e4d2b;
        color: #fff;
        transition: all 0.3s ease;
      }

      .btn-primary:hover {
        background-color: #16391f;
        border-color: #16391f;
      }

      .metrics {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
      }

.metric-card {
  text-align: center;
  padding: 20px;
  border-radius: 12px;
  border: none;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  background: #fff;
  min-width: 200px;
  max-width: 300px;
  flex: 1;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
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

      .table {
        margin-bottom: 0;
        --bs-table-striped-bg: rgba(0, 0, 0, 0.02);
      }

      .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.5px;
        color: #495057;
      }

      .table td {
        vertical-align: middle;
        padding: 0.75rem 1rem;
      }

      .table tbody tr {
        transition: background-color 0.15s ease;
        cursor: pointer;
      }

      .table tbody tr:hover {
        background-color: rgba(19, 64, 19, 0.05) !important;
      }

      .badge {
        font-weight: 500;
        padding: 0.4em 0.8em;
        border-radius: 6px;
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
    <div class="container rounded">
        <div class="header">
            <h1>Employee Report Summary</h1>
        </div>

        <div class="card">
        <div class="metrics">
            <div class="metric-card">
                <i class="ti tabler-cash mb-2" style="font-size: 24px; color: #28a745;"></i>
                <h5>Monthly Sales</h5>
                <h4 id="totalSalesMetric">₱{{ number_format($totalSales, 0) }}</h4>
            </div>
            <div class="metric-card">
                <i class="ti tabler-trophy mb-2" style="font-size: 24px; color: #007bff;"></i>
                <h5>Total Sales</h5>
                <h4 id="topEmployeeSalesMetric">₱{{ number_format($topEmployeeSales, 0) }}</h4>
            </div>
            <div class="metric-card">
                <i class="ti tabler-user-star mb-2" style="font-size: 24px; color: #dc3545;"></i>
                <h5>Top Employee</h5>
                <h4 id="topEmployeeMetric">{{ $topEmployeeName }}</h4>
            </div>
        </div>

      </div>

        <div class="card mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Employee Sales</h3>
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
                            placeholder="Search employees..."
                        >
                    </div>
                </div>

                <!-- Filter by -->
                <div class="d-flex flex-column" style="width: 160px;">
                    <label class="form-label text-muted small mb-1">Sort By</label>
                    <select class="form-select form-select-sm" id="sortBy">
                        <option value="">Default</option>
                        <option value="totalSales">Total Sales (High to Low)</option>
                        <option value="quantity">Quantity (High to Low)</option>
                        <option value="productService">Product/Service</option>
                        <option value="client">Client</option>
                        <option value="name">Employee Name (A to Z)</option>
                    </select>
                </div>

                <!-- Filter by date -->
                <div class="d-flex flex-column" style="width: 160px;">
                    <label class="form-label text-muted small mb-1">Filter by date</label>
                    <select class="form-select form-select-sm" id="dateFilter">
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

        <div class="table-responsive text-nowrap">
            <table class="table table-striped" id="employeeReport">
                <thead>
                    <tr class="table-light">
                        <th>No.</th>
                        <th>Employee Name</th>
                        <th>Date</th>
                        <th>Products/Services</th>
                        <th>Service/Product Name</th>
                        <th>Quantity</th>
                        <th>Client</th>
                        <th>Total Sales</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $rowNumber = 1; @endphp
                    @foreach($employeeReports as $report)
                    <tr data-employee-id="{{ $report->id }}">
                        <td>{{ $rowNumber++ }}</td>
                        <td>{{ $report->employeeName }}</td>
                        <td>{{ \Carbon\Carbon::parse($report->date)->format('Y-m-d') }}</td>
                        <td><span class="badge bg-label-info">{{ $report->product_service }}</span></td>
                        <td>{{ $report->product_serviceName }}</td>
                        <td><span class="badge bg-label-warning">{{ $report->quantity }}</span></td>
                        <td><span class="badge bg-label-success">{{ $report->client }}</span></td>
                        <td>₱{{ number_format($report->totalSales, 0) }}</td>
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

<div class="modal fade" id="employeeViewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg rounded-3">
      <div class="modal-header" style="background-color: #1e4d2b; color: white;">
        <h5 class="modal-title fw-bold">Employee Details</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-4">
          <!-- Employee Info Card -->
          <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 rounded-lg">
              <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-semibold">Employee Information</h6>
                <span class="badge bg-secondary" id="employeeId">ID: #EMP0000</span>
              </div>
              <div class="card-body p-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><strong>Full Name:</strong> <span class="text-muted" id="modalEmployeeName"></span></li>
                  <li class="list-group-item"><strong>Position:</strong> <span class="text-muted" id="employeePosition"></span></li>
                  <li class="list-group-item"><strong>Email:</strong> <span class="text-muted" id="employeeEmail"></span></li>
                  <li class="list-group-item"><strong>Phone:</strong> <span class="text-muted" id="employeePhone"></span></li>
                  <li class="list-group-item"><strong>Employed Since:</strong> <span class="text-muted" id="employeeStartDate"></span></li>
                  <li class="list-group-item"><strong>Total Sales:</strong> <span class="text-muted" id="modalEmployeeTotalSales"></span></li>
                  <li class="list-group-item d-flex align-items-center">
                    <strong>Performance:</strong>
                    <div class="ms-2 text-warning" id="employeeRating">
                      <i class="ti tabler-star"></i>
                      <i class="ti tabler-star"></i>
                      <i class="ti tabler-star"></i>
                      <i class="ti tabler-star"></i>
                      <i class="ti tabler-star-half"></i>
                      <span class="text-muted ms-1">(4.5)</span>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Recent Transactions -->
          <div class="col-md-6 col-lg-8">
            <div class="card shadow-sm border-0 rounded-lg">
              <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-semibold">Recent Sales</h6>
                <div class="btn-group">
                  <button class="btn btn-sm btn-outline-primary"><i class="ti tabler-filter"></i> Filter</button>
                  <button class="btn btn-sm btn-outline-primary" id="exportEmployeeTransactions"><i class="ti tabler-download"></i> Export</button>
                </div>
              </div>
              <div class="card-body p-3">
                <div class="table-responsive">
                  <table class="table align-middle" id="employeeTransactionsTable">
                    <thead class="table-light">
                      <tr>
                        <th>Transaction ID</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Client</th>
                        <th>Status</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    <tbody id="employeeTransactionsBody">
                      <!-- Transactions will be loaded dynamically -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dateFilter = document.getElementById('dateFilter');
    const searchInput = document.getElementById('searchInput');
    const sortBy = document.getElementById('sortBy');
    const table = document.getElementById('employeeReport');
    const tbody = table.getElementsByTagName('tbody')[0];
    const rows = tbody.getElementsByTagName('tr');

    // Add click event to table rows to open modal with employee details
    Array.from(rows).forEach(row => {
        row.addEventListener('click', function(e) {
            // Don't trigger when clicking action buttons
            if (e.target.tagName === 'BUTTON' || e.target.closest('button')) {
                return;
            }
            
            const employeeId = this.dataset.employeeId;
            const employeeName = this.cells[1].textContent;
            const totalSales = this.cells[7].textContent;
            
            // Update modal with employee data
            document.getElementById('employeeId').textContent = 'ID: #EMP' + employeeId;
            document.getElementById('modalEmployeeName').textContent = employeeName;
            document.getElementById('modalEmployeeTotalSales').textContent = totalSales;
            
            // Fetch additional employee details
            fetch(`/api/employees/${employeeId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('employeePosition').textContent = data.position;
                    document.getElementById('employeeEmail').textContent = data.email;
                    document.getElementById('employeePhone').textContent = data.phone;
                    document.getElementById('employeeStartDate').textContent = data.start_date;
                    
                    // Load recent transactions
                    loadEmployeeTransactions(employeeId);
                })
                .catch(error => {
                    console.error('Error fetching employee details:', error);
                });
            
            // Show the modal
            const employeeModal = new bootstrap.Modal(document.getElementById('employeeViewModal'));
            employeeModal.show();
        });
    });
    
    function loadEmployeeTransactions(employeeId) {
        const tableBody = document.getElementById('employeeTransactionsBody');
        tableBody.innerHTML = '<tr><td colspan="6" class="text-center">Loading...</td></tr>';
        
        fetch(`/api/employees/${employeeId}/transactions`)
            .then(response => response.json())
            .then(data => {
                tableBody.innerHTML = '';
                if (data.length === 0) {
                    tableBody.innerHTML = '<tr><td colspan="6" class="text-center">No transactions found</td></tr>';
                    return;
                }
                
                data.forEach(transaction => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>#${transaction.id}</td>
                        <td>${transaction.date}</td>
                        <td>${transaction.type}</td>
                        <td>${transaction.client_name}</td>
                        <td><span class="badge bg-${getStatusColor(transaction.status)}">${transaction.status}</span></td>
                        <td>₱${transaction.amount.toLocaleString()}</td>
                    `;
                    tableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error fetching transactions:', error);
                tableBody.innerHTML = '<tr><td colspan="6" class="text-center text-danger">Error loading transactions</td></tr>';
            });
    }
    
    function getStatusColor(status) {
        switch(status.toLowerCase()) {
            case 'completed': return 'success';
            case 'pending': return 'warning';
            case 'cancelled': return 'danger';
            default: return 'secondary';
        }
    }
    
    // Search functionality
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        Array.from(rows).forEach(row => {
            const nameCell = row.cells[1]; // Employee name is in the second column
            const name = nameCell.textContent.toLowerCase();
            
            // Show/hide row based on whether the name contains the search term
            row.style.display = name.includes(searchTerm) ? '' : 'none';
        });

        // Update rankings for visible rows
        updateRanks();
    });
    
    // Date filter functionality
    dateFilter.addEventListener('change', function() {
        filterRows();
        updateRanks();
    });
    
    // Sort functionality
    sortBy.addEventListener('change', function() {
        sortRows();
        updateRanks();
    });
    
    function filterRows() {
    const selectedFilter = dateFilter.value;
    if (!selectedFilter) {
        // Show all rows if no filter selected
        Array.from(rows).forEach(row => row.style.display = '');
        return;
    }
    
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    Array.from(rows).forEach(row => {
        const dateCell = row.cells[2]; // Date is in the third column
        // Ensure proper date parsing by handling the format consistently
        const dateParts = dateCell.textContent.split('-');
        if (dateParts.length === 3) {
            // Ensure YYYY-MM-DD format
            const rowDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);
            rowDate.setHours(0, 0, 0, 0);
            let showRow = true;
            
            switch(selectedFilter) {
                case 'today':
                    showRow = rowDate.getTime() === today.getTime();
                    break;
                case 'yesterday':
                    const yesterday = new Date(today);
                    yesterday.setDate(yesterday.getDate() - 1);
                    showRow = rowDate.getTime() === yesterday.getTime();
                    break;
                case 'last_week':
                    const lastWeek = new Date(today);
                    lastWeek.setDate(lastWeek.getDate() - 7);
                    showRow = rowDate >= lastWeek;
                    break;
                case 'last_month':
                    const lastMonth = new Date(today);
                    lastMonth.setDate(lastMonth.getDate() - 30);
                    showRow = rowDate >= lastMonth;
                    break;
                case 'this_month':
                    showRow = rowDate.getMonth() === today.getMonth() && 
                             rowDate.getFullYear() === today.getFullYear();
                    break;
                case 'last_3months':
                    const last3Months = new Date(today);
                    last3Months.setMonth(last3Months.getMonth() - 3);
                    showRow = rowDate >= last3Months;
                    break;
                default:
                    showRow = true;
            }
            
            row.style.display = showRow ? '' : 'none';
        }
    });
}
    
    function sortRows() {
        const selectedSort = sortBy.value;
        if (!selectedSort) return;
        
        const rows = Array.from(tbody.getElementsByTagName('tr'));
        
        rows.sort((a, b) => {
            let aVal, bVal;
            
            switch(selectedSort) {
                case 'totalSales':
                    aVal = parseCurrency(a.cells[7].textContent);
                    bVal = parseCurrency(b.cells[7].textContent);
                    return bVal - aVal;
                case 'quantity':
                    aVal = parseInt(a.cells[5].querySelector('.badge').textContent);
                    bVal = parseInt(b.cells[5].querySelector('.badge').textContent);
                    return bVal - aVal;
                case 'productService':
                    aVal = a.cells[3].querySelector('.badge').textContent.toLowerCase();
                    bVal = b.cells[3].querySelector('.badge').textContent.toLowerCase();
                    return aVal.localeCompare(bVal);
                case 'client':
                    aVal = a.cells[6].querySelector('.badge').textContent.toLowerCase();
                    bVal = b.cells[6].querySelector('.badge').textContent.toLowerCase();
                    return aVal.localeCompare(bVal);
                case 'name':
                    aVal = a.cells[1].textContent.toLowerCase();
                    bVal = b.cells[1].textContent.toLowerCase();
                    return aVal.localeCompare(bVal);
                default:
                    return 0;
            }
        });
        
        // Clear and re-append rows in new order
        while (tbody.firstChild) {
            tbody.removeChild(tbody.firstChild);
        }
        
        rows.forEach(row => {
            tbody.appendChild(row);
        });
    }
    
    function updateRanks() {
        let rank = 1;
        Array.from(rows).forEach(row => {
            if (row.style.display !== 'none') {
                row.cells[0].textContent = rank++;
            }
        });
    }
    
    function parseCurrency(value) {
        return parseFloat(value.replace(/[₱,]/g, '')) || 0;
    }
});

// Export row data to Excel
function downloadRow(button, format) {
    // Get the parent row
    const row = button.closest('tr');
    
    // Create data object from row
    const data = {
        'No.': row.cells[0].textContent,
        'Employee Name': row.cells[1].textContent,
        'Date': row.cells[2].textContent,
        'Product/Service': row.cells[3].textContent.trim(),
        'Product/Service Name': row.cells[4].textContent,
        'Quantity': row.cells[5].textContent.trim(),
        'Client': row.cells[6].textContent.trim(),
        'Total Sales': row.cells[7].textContent
    };

    // Create worksheet
    const ws = XLSX.utils.json_to_sheet([data]);

    // Create workbook
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Employee Report");

    // Generate filename
    const fileName = `employee_report_${data['Employee Name'].replace(/\s+/g, '_')}_${new Date().toISOString().split('T')[0]}.xlsx`;

    // Save the file
    XLSX.writeFile(wb, fileName);
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dateFilter = document.getElementById('dateFilter');
    const searchInput = document.getElementById('searchInput');
    const sortBy = document.getElementById('sortBy');
    const table = document.getElementById('employeeReport');
    const tbody = table.getElementsByTagName('tbody')[0];
    const rows = tbody.getElementsByTagName('tr');

    // Add click event to table rows to open modal with employee details
    Array.from(rows).forEach(row => {
        row.addEventListener('click', function(e) {
            // Don't trigger when clicking action buttons
            if (e.target.tagName === 'BUTTON' || e.target.closest('button')) {
                return;
            }
            
            const employeeId = this.dataset.employeeId;
            const employeeName = this.cells[1].textContent;
            const totalSales = this.cells[8].textContent;
            
            // Update modal with employee data
            document.getElementById('employeeId').textContent = 'ID: #EMP' + employeeId;
            document.getElementById('modalEmployeeName').textContent = employeeName;
            document.getElementById('modalEmployeeTotalSales').textContent = totalSales;
            
            // Fetch additional employee details
            fetch(`/api/employees/${employeeId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('employeePosition').textContent = data.position;
                    document.getElementById('employeeEmail').textContent = data.email;
                    document.getElementById('employeePhone').textContent = data.phone;
                    document.getElementById('employeeStartDate').textContent = data.start_date;
                    
                    // Load recent transactions
                    loadEmployeeTransactions(employeeId);
                })
                .catch(error => {
                    console.error('Error fetching employee details:', error);
                });
            
            // Show the modal
            const employeeModal = new bootstrap.Modal(document.getElementById('employeeViewModal'));
            employeeModal.show();
        });
    });
    
    function loadEmployeeTransactions(employeeId) {
        const tableBody = document.getElementById('employeeTransactionsBody');
        tableBody.innerHTML = '<tr><td colspan="6" class="text-center">Loading...</td></tr>';
        
        fetch(`/api/employees/${employeeId}/transactions`)
            .then(response => response.json())
            .then(data => {
                tableBody.innerHTML = '';
                if (data.length === 0) {
                    tableBody.innerHTML = '<tr><td colspan="6" class="text-center">No transactions found</td></tr>';
                    return;
                }
                
                data.forEach(transaction => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>#${transaction.id}</td>
                        <td>${transaction.date}</td>
                        <td>${transaction.type}</td>
                        <td>${transaction.client_name}</td>
                        <td><span class="badge bg-${getStatusColor(transaction.status)}">${transaction.status}</span></td>
                        <td>₱${transaction.amount.toLocaleString()}</td>
                    `;
                    tableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error fetching transactions:', error);
                tableBody.innerHTML = '<tr><td colspan="6" class="text-center text-danger">Error loading transactions</td></tr>';
            });
    }
    
    function getStatusColor(status) {
        switch(status.toLowerCase()) {
            case 'completed': return 'success';
            case 'pending': return 'warning';
            case 'cancelled': return 'danger';
            default: return 'secondary';
        }
    }
    
    // Existing functionality for search, sort and filter
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        Array.from(rows).forEach(row => {
            const nameCell = row.cells[1]; // Employee name is in the second column
            const name = nameCell.textContent.toLowerCase();
            
            // Show/hide row based on whether the name contains the search term
            row.style.display = name.includes(searchTerm) ? '' : 'none';
        });

        // Update rankings for visible rows
        updateRanks();
    });
    
    dateFilter.addEventListener('change', function() {
        filterRows();
        updateRanks();
    });
    
    sortBy.addEventListener('change', function() {
        sortRows();
        updateRanks();
    });
    
    function filterRows() {
    const selectedFilter = dateFilter.value;
    if (!selectedFilter) {
        // Show all rows if no filter selected
        Array.from(rows).forEach(row => row.style.display = '');
        return;
    }
    
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    Array.from(rows).forEach(row => {
        const dateCell = row.cells[2]; // Date is in the third column
        // Parse the date properly
        const dateParts = dateCell.textContent.split('-');
        if (dateParts.length === 3) {
            const rowDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);
            rowDate.setHours(0, 0, 0, 0);
            let showRow = true;
            
            switch(selectedFilter) {
                case 'today':
                    showRow = rowDate.getTime() === today.getTime();
                    break;
                case 'yesterday':
                    const yesterday = new Date(today);
                    yesterday.setDate(yesterday.getDate() - 1);
                    showRow = rowDate.getTime() === yesterday.getTime();
                    break;
                case 'last_week':
                    const lastWeek = new Date(today);
                    lastWeek.setDate(lastWeek.getDate() - 7);
                    showRow = rowDate >= lastWeek;
                    break;
                case 'last_month':
                    const lastMonth = new Date(today);
                    lastMonth.setDate(lastMonth.getDate() - 30);
                    showRow = rowDate >= lastMonth;
                    break;
                case 'this_month':
                    showRow = rowDate.getMonth() === today.getMonth() && 
                             rowDate.getFullYear() === today.getFullYear();
                    break;
                case 'last_3months':
                    const last3Months = new Date(today);
                    last3Months.setMonth(last3Months.getMonth() - 3);
                    showRow = rowDate >= last3Months;
                    break;
                default:
                    showRow = true;
            }
            
            row.style.display = showRow ? '' : 'none';
        }
    });
}
    
    function sortRows() {
        const selectedSort = sortBy.value;
        if (!selectedSort) return;
        
        const rows = Array.from(tbody.getElementsByTagName('tr'));
        
        rows.sort((a, b) => {
            let aVal, bVal;
            
            switch(selectedSort) {
                case 'totalSales':
                    aVal = parseCurrency(a.cells[8].textContent);
                    bVal = parseCurrency(b.cells[8].textContent);
                    return bVal - aVal;
                case 'serviceSales':
                    aVal = parseCurrency(a.cells[6].textContent);
                    bVal = parseCurrency(b.cells[6].textContent);
                    return bVal - aVal;
                case 'productSales':
                    aVal = parseCurrency(a.cells[7].textContent);
                    bVal = parseCurrency(b.cells[7].textContent);
                    return bVal - aVal;
                case 'clients':
                    aVal = parseInt(a.cells[5].querySelector('.badge').textContent);
                    bVal = parseInt(b.cells[5].querySelector('.badge').textContent);
                    return bVal - aVal;
                case 'name':
                    aVal = a.cells[1].textContent.toLowerCase();
                    bVal = b.cells[1].textContent.toLowerCase();
                    return aVal.localeCompare(bVal);
                default:
                    return 0;
            }
        });
        
        // Clear and re-append rows in new order
        while (tbody.firstChild) {
            tbody.removeChild(tbody.firstChild);
        }
        
        rows.forEach(row => {
            tbody.appendChild(row);
        });
    }
    
    function updateRanks() {
        let rank = 1;
        Array.from(rows).forEach(row => {
            if (row.style.display !== 'none') {
                row.cells[0].textContent = rank++;
            }
        });
    }
    
    function parseCurrency(value) {
        return parseFloat(value.replace(/[₱,]/g, '')) || 0;
    }
});
</script>

  </body>
        

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
  <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>
  <script src="../../assets/vendor/libs/swiper/swiper.js"></script>
  <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

  <!-- Main JS -->

  <script src="../../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../../assets/vendor/libs/chartjs/chartjs.js"></script>
  <script src="../../assets/js/charts-chartjs-legend.js"></script>
  <script src="../../assets/js/charts-chartjs.js"></script>

  <!-- Export Libraries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.29/jspdf.plugin.autotable.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle export button clicks
        document.querySelectorAll('[data-export]').forEach(button => {
            button.addEventListener('click', function() {
                const format = this.getAttribute('data-export');
                const table = document.getElementById('employeeReport');
                
                switch(format) {
                    case 'pdf':
                        exportToPDF(table);
                        break;
                    case 'excel':
                        exportToExcel(table);
                        break;
                    case 'csv':
                        exportToCSV(table);
                        break;
                }
            });
        });

        function exportToPDF(table) {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            
            doc.text('Employee Report', 14, 15);
            
            doc.autoTable({
                html: table,
                startY: 20,
                styles: {
                    fontSize: 8,
                    cellPadding: 2,
                },
                columnStyles: {
                    0: {cellWidth: 10}, // Rank
                    1: {cellWidth: 30}, // Name
                    2: {cellWidth: 20}, // Service Sales
                    3: {cellWidth: 20}, // Product Sales
                    4: {cellWidth: 20}, // Clients
                    5: {cellWidth: 25}, // Service Sales Total
                    6: {cellWidth: 25}, // Product Sales Total
                    7: {cellWidth: 25}, // Total Sales
                }
            });
            
            doc.save('employee-report.pdf');
        }

        function exportToExcel(table) {
            const wb = XLSX.utils.book_new();
            const ws = XLSX.utils.table_to_sheet(table);
            
            // Format currency columns
            const currencyColumns = ['F', 'G', 'H'];
            const range = XLSX.utils.decode_range(ws['!ref']);
            
            for (let R = range.s.r + 1; R <= range.e.r; ++R) {
                currencyColumns.forEach(col => {
                    const cell = ws[col + (R + 1)];
                    if (cell && cell.v) {
                        cell.v = cell.v.replace('₱', '').replace(',', '');
                        cell.t = 'n';
                    }
                });
            }
            
            XLSX.utils.book_append_sheet(wb, ws, 'Employee Report');
            XLSX.writeFile(wb, 'employee-report.xlsx');
        }

        function exportToCSV(table) {
            const wb = XLSX.utils.book_new();
            const ws = XLSX.utils.table_to_sheet(table);
            XLSX.utils.book_append_sheet(wb, ws, 'Employee Report');
            XLSX.writeFile(wb, 'employee-report.csv');
        }
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dateFilter = document.getElementById('dateFilter');
    const dateFilterBtn = document.getElementById('dateFilterBtn');
    const table = document.getElementById('employeeReport');
    const tbody = table.getElementsByTagName('tbody')[0];

    dateFilter.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const selectedText = selectedOption.text;
        const selectedValue = this.value;
        
        dateFilterBtn.textContent = selectedText;
        
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        
        const rows = Array.from(tbody.getElementsByTagName('tr'));
        
        rows.forEach(row => {
            const dateCell = row.cells[2]; // Get the date cell
            // Fix the date parsing
            const dateParts = dateCell.textContent.split('-');
            if (dateParts.length === 3) {
                const rowDate = new Date(dateParts[0], parseInt(dateParts[1]), parseInt(dateParts[2]));
                rowDate.setHours(0, 0, 0, 0);
                
                let showRow = true;
                
                switch(selectedValue) {
                    case 'today':
                        showRow = rowDate.getTime() === today.getTime();
                        if (showRow) dateCell.textContent = 'Today';
                        break;
                    case 'yesterday':
                        const yesterday = new Date(today);
                        yesterday.setDate(yesterday.getDate() - 1);
                        showRow = rowDate.getTime() === yesterday.getTime();
                        if (showRow) dateCell.textContent = 'Yesterday';
                        break;
                    case 'last7days':
                        const last7Days = new Date(today);
                        last7Days.setDate(last7Days.getDate() - 7);
                        showRow = rowDate >= last7Days;
                        if (showRow) dateCell.textContent = 'Last 7 Days';
                        break;
                    case 'last30days':
                        const last30Days = new Date(today);
                        last30Days.setDate(last30Days.getDate() - 30);
                        showRow = rowDate >= last30Days;
                        if (showRow) dateCell.textContent = 'Last 30 Days';
                        break;
                    case 'thisMonth':
                        showRow = rowDate.getMonth() === today.getMonth() && 
                                 rowDate.getFullYear() === today.getFullYear();
                        if (showRow) dateCell.textContent = 'This Month';
                        break;
                    case 'lastMonth':
                        const lastMonth = new Date(today);
                        lastMonth.setMonth(lastMonth.getMonth() - 1);
                        showRow = rowDate.getMonth() === lastMonth.getMonth() && 
                                 rowDate.getFullYear() === lastMonth.getFullYear();
                        if (showRow) dateCell.textContent = 'Last Month';
                        break;
                    case 'thisYear':
                        showRow = rowDate.getFullYear() === today.getFullYear();
                        if (showRow) dateCell.textContent = 'This Year';
                        break;
                    default:
                        // Reset to original date format
                        dateCell.textContent = `${rowDate.getFullYear()}-${(rowDate.getMonth() + 1).toString().padStart(2, '0')}-${rowDate.getDate().toString().padStart(2, '0')}`;
                        showRow = true;
                }
                
                row.style.display = showRow ? '' : 'none';
            }
        });

        // Update ranks for visible rows
        let rank = 1;
        rows.forEach(row => {
            if (row.style.display !== 'none') {
                row.cells[0].textContent = rank++;
            }
        });

        // Update metrics
        updateMetrics(rows.filter(row => row.style.display !== 'none'));
    });
});
</script>

<script>
function downloadRow(button, format) {
    // Get the parent row
    const row = button.closest('tr');
    
    // Create data object from row
    const data = {
        Rank: row.cells[0].textContent,
        'Employee Name': row.cells[1].textContent,
        Date: row.cells[2].textContent,
        'Service Sales Count': row.cells[3].textContent,
        'Product Sales Count': row.cells[4].textContent,
        'Client Count': row.cells[5].textContent,
        'Total Service Sales': row.cells[6].textContent,
        'Total Product Sales': row.cells[7].textContent,
        'Total Sales': row.cells[8].textContent
    };

    // Create worksheet
    const ws = XLSX.utils.json_to_sheet([data]);

    // Create workbook
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Employee Report");

    // Generate filename
    const fileName = `employee_report_${data['Employee Name'].replace(/\s+/g, '_')}_${new Date().toISOString().split('T')[0]}.xlsx`;

    // Save the file
    XLSX.writeFile(wb, fileName);
}
</script>

</body>
</html>
