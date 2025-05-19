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

    <!-- Add export libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.15/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

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
        max-width: 1200px;
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
  border: 1px solid #2b2c2d; /* Changed 'border-color' to 'border' for better clarity */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); /* Corrected property name and increased shadow values */
  background: rgba(254, 255, 255, 0.9);
  min-width: 200px;
  max-width: 300px;
  flex: 1;
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
        <h1>Customer Report Summary</h1>
      
      </div>
<div class="card">
        <div class="metrics">
          <div class="metric-card">
            <i class="ti tabler-currency-dollar mb-2" style="font-size: 24px; color: #28a745;"></i>
            <h5>Total Sales</h5>
            <h4>₱191,600.00</h4>
        
          </div>
          <div class="metric-card">
            <i class="ti tabler-users-group mb-2" style="font-size: 24px; color: #007bff;"></i>
            <h5>Top Customers</h5>
            <h4>John Smith</h4>
    
          </div>
        </div>
</div>
        <div class="card mt-4">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h3 class="mb-0">Customer Sales</h3>
              <div class="d-flex gap-2">

              <div class="input-group" style="width: 300px;">
                <span class="input-group-text">
                  <i class="ti tabler-search"></i>
                </span>
                <input 
                  type="text" 
                  class="form-control" 
                  id="searchInput" 
                  placeholder="Search by name or email..."
                  style="border-radius: 0 4px 4px 0;"
                >
              </div>

                <div class="dropdown">
                  <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dateFilterBtn" data-bs-toggle="dropdown" aria-expanded="false">
                    Filter By Date
                  </button>
                  <div class="dropdown-menu p-3" style="min-width: 250px;">
                    <select class="form-select" id="dateFilter" onchange="applyDateFilter()">
                      <option value="">Select Date Range</option>
                      <option value="today">Today</option>
                      <option value="yesterday">Yesterday</option>
                      <option value="last7">Last 7 Days</option>
                      <option value="last30">Last 30 Days</option>
                      <option value="thisMonth">This Month</option>
                      <option value="lastMonth">Last Month</option>
                      <option value="thisYear">This Year</option>
                    </select>
                  </div>
                </div>
                <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" style="background-color: #18332a;">
                                Export
                            </button>
                  <ul class="dropdown-menu" style="min-width: 120px;">
                    <li><a class="dropdown-item" href="#" data-export="pdf">PDF</a></li>
                    <li><a class="dropdown-item" href="#" data-export="excel">Excel</a></li>
                    <li><a class="dropdown-item" href="#" data-export="csv">CSV</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped" id="customerSalesTable">
                <thead style="background-color: #134013;">
                  <tr>
                    <th style="color: white;">Rank</th>
                    <th style="color: white;">Customer Name</th>
                    <th style="color: white;">Contact Number</th>
                    <th style="color: white;">Email</th>
                    <th style="color: white;">Total Transactions</th>
                    <th style="color: white;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Sarah Johnson</td>
                    <td>+1 234-567-8901</td>
                    <td>sarah.j@email.com</td>
                    <td>₱10,234</td>
                    <td>

                      <button class="btn btn-sm btn-success view-customer" 
                        data-name="Sarah Johnson"
                        data-phone="+1 234-567-8901"
                        data-email="sarah.j@email.com"
                        data-total="₱10,234">View</button>

                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Mike Wilson</td>
                    <td>+1 234-567-8902</td>
                    <td>mike.w@email.com</td>
                    <td>₱8,765</td>
                    <td>

                      <button class="btn btn-sm btn-success view-customer" 
                        data-name="Mike Wilson"
                        data-phone="+1 234-567-8902"
                        data-email="mike.w@email.com"
                        data-total="₱8,765">View</button>

                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Emily Brown</td>
                    <td>+1 234-567-8903</td>
                    <td>emily.b@email.com</td>
                    <td>₱7,654</td>
                    <td>

                      <button class="btn btn-sm btn-success view-customer" 
                        data-name="Emily Brown"
                        data-phone="+1 234-567-8903"
                        data-email="emily.b@email.com"
                        data-total="₱7,654">View</button>

                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>David Lee</td>
                    <td>+1 234-567-8904</td>
                    <td>david.l@email.com</td>
                    <td>₱6,543</td>
                    <td>

                      <button class="btn btn-sm btn-success view-customer" 
                        data-name="David Lee"
                        data-phone="+1 234-567-8904"
                        data-email="david.l@email.com"
                        data-total="₱6,543">View</button>
                    </td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Lisa Anderson</td>
                    <td>+1 234-567-8905</td>
                    <td>lisa.a@email.com</td>
                    <td>₱5,987</td>
                    <td>
                      <button class="btn btn-sm btn-success view-customer" 
                        data-name="Lisa Anderson"
                        data-phone="+1 234-567-8905"
                        data-email="lisa.a@email.com"
                        data-total="₱5,987">View</button>
                    </td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>James Wilson</td>
                    <td>+1 234-567-8906</td>
                    <td>james.w@email.com</td>
                    <td>₱5,432</td>
                    <td>
                      <button class="btn btn-sm btn-success view-customer" 
                        data-name="James Wilson"
                        data-phone="+1 234-567-8906"
                        data-email="james.w@email.com"
                        data-total="₱5,432">View</button>
                    </td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>Maria Garcia</td>
                    <td>+1 234-567-8907</td>
                    <td>maria.g@email.com</td>
                    <td>₱4,876</td>
                    <td>
                      <button class="btn btn-sm btn-success view-customer" 
                        data-name="Maria Garcia"
                        data-phone="+1 234-567-8907"
                        data-email="maria.g@email.com"
                        data-total="₱4,876">View</button>
                    </td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>Robert Taylor</td>
                    <td>+1 234-567-8908</td>
                    <td>robert.t@email.com</td>
                    <td>₱4,321</td>
                    <td>
                      <button class="btn btn-sm btn-success view-customer" 
                        data-name="Robert Taylor"
                        data-phone="+1 234-567-8908"
                        data-email="robert.t@email.com"
                        data-total="₱4,321">View</button>
                    </td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>Patricia Martinez</td>
                    <td>+1 234-567-8909</td>
                    <td>patricia.m@email.com</td>
                    <td>₱3,765</td>
                    <td>
                      <button class="btn btn-sm btn-success view-customer" 
                        data-name="Patricia Martinez"
                        data-phone="+1 234-567-8909"
                        data-email="patricia.m@email.com"
                        data-total="₱3,765">View</button>

                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      
      </div>      
    </div>



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
                  `${formatDate(startDate)} - ${formatDate(endDate)}`;
                  
              document.getElementById('selectedDateText').textContent = `: ${filterText}`;
              
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
                  text: `Booking History - ${data.name}`
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
            { name: "Wedding Packages", percentage: 25, color: "primary" },
            { name: "Corporate Events", percentage: 15, color: "info" },
            { name: "Birthday Celebrations", percentage: 10, color: "success" }
          ]
        };

        // Update customer info
        document.getElementById('customerName').textContent = data.name;
        document.getElementById('customerEmail').textContent = data.email;
        document.getElementById('customerPhone').textContent = data.phone;
        document.querySelector('.card-header small').textContent = `ID: #${johnSmithData.customerId}`;
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
            <div class="progress" style="height: 5px;">
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

    <script>
      // Add this after your existing scripts
      document.addEventListener('DOMContentLoaded', function() {
        // Export button click handlers
        document.querySelectorAll('[data-export]').forEach(button => {
          button.addEventListener('click', function() {
            const exportType = this.dataset.export;
            const table = document.getElementById('customerSalesTable');
            const data = Array.from(table.querySelectorAll('tr')).map(row => 
              Array.from(row.querySelectorAll('th, td')).map(cell => cell.textContent.trim())
            );

            switch(exportType) {
              case 'pdf':
                exportToPDF(data);
                break;
              case 'excel':
                exportToExcel(data, 'xlsx');
                break;
              case 'csv':
                exportToExcel(data, 'csv');
                break;
            }
          });
        });

        function exportToPDF(data) {
          const { jsPDF } = window.jspdf;
          const doc = new jsPDF();

          doc.autoTable({
            head: [data[0]],
            body: data.slice(1),
            startY: 20,
            margin: { top: 15 },
            styles: { overflow: 'linebreak' },
            headStyles: { fillColor: [19, 64, 19] },
            didDrawPage: function(data) {
              doc.setFontSize(15);
              doc.text('Customer Sales Report', 14, 15);
            }
          });

          doc.save('customer-sales-report.pdf');
        }

        function exportToExcel(data, type) {
          const ws = XLSX.utils.aoa_to_sheet(data);
          const wb = XLSX.utils.book_new();
          XLSX.utils.book_append_sheet(wb, ws, 'Customer Sales');

          const filename = `customer-sales-report.${type}`;
          if (type === 'csv') {
            XLSX.writeFile(wb, filename, { bookType: 'csv' });
          } else {
            XLSX.writeFile(wb, filename);
          }
        }
      });
    </script>

    <script>
function applyDateFilter() {
  const filterValue = document.getElementById('dateFilter').value;
  const tableRows = document.querySelectorAll('#customerSalesTable tbody tr');
  const today = new Date();
  today.setHours(0, 0, 0, 0);

  tableRows.forEach(row => {
    const dateStr = row.querySelector('td:nth-child(4)').getAttribute('data-date') || '';
    const rowDate = new Date(dateStr);
    rowDate.setHours(0, 0, 0, 0);
    
    let show = false;
    
    switch(filterValue) {
      case 'today':
        show = rowDate.getTime() === today.getTime();
        break;
      case 'yesterday':
        const yesterday = new Date(today);
        yesterday.setDate(today.getDate() - 1);
        show = rowDate.getTime() === yesterday.getTime();
        break;
      case 'last7':
        const last7 = new Date(today);
        last7.setDate(today.getDate() - 7);
        show = rowDate >= last7 && rowDate <= today;
        break;
      case 'last30':
        const last30 = new Date(today);
        last30.setDate(today.getDate() - 30);
        show = rowDate >= last30 && rowDate <= today;
        break;
      case 'thisMonth':
        show = rowDate.getMonth() === today.getMonth() && 
               rowDate.getFullYear() === today.getFullYear();
        break;
      case 'lastMonth':
        const lastMonth = new Date(today.getFullYear(), today.getMonth() - 1, 1);
        const lastMonthEnd = new Date(today.getFullYear(), today.getMonth(), 0);
        show = rowDate >= lastMonth && rowDate <= lastMonthEnd;
        break;
      case 'thisYear':
        show = rowDate.getFullYear() === today.getFullYear();
        break;
      default:
        show = true;
    }
    
    row.style.display = show ? '' : 'none';
  });
}

// Update table cells to include data-date attributes
document.addEventListener('DOMContentLoaded', function() {
  const tableRows = document.querySelectorAll('#customerSalesTable tbody tr');
  tableRows.forEach(row => {
    // Assuming you'll add proper dates to your table data
    const randomDate = getRandomRecentDate(); // Helper function to generate dates
    const dateCell = row.querySelector('td:nth-child(4)'); // Email column
    dateCell.setAttribute('data-date', randomDate.toISOString().split('T')[0]);
  });

  // Add event listener for date filter
  document.getElementById('dateFilter').addEventListener('change', applyDateFilter);
});

// Helper function to generate random recent dates for demonstration
function getRandomRecentDate() {
  const today = new Date();
  const daysBack = Math.floor(Math.random() * 365); // Random day within last year
  const randomDate = new Date(today);
  randomDate.setDate(today.getDate() - daysBack);
  return randomDate;
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


    <!-- Customer Details Modal -->
    <div class="modal fade" id="customerModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content shadow-lg rounded-4">
      <div class="modal-header" style="background-color: #134013;">
        <h4 class="modal-title" style="color: white;">Customer Details</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-4 py-3">
        <div class="row g-4">
          <!-- Customer Info -->
          <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-3">
              <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #f0f0f0;">
                <h5 class="mb-0" style="color: black;">Customer Info</h5>
                <small style="color: black;">ID: #CS12345</small>
              </div>
              <div class="card-body d-flex flex-column gap-2 py-2" style="background-color: white;">
                <p class="fw-semibold mb-1" style="color: black;">Full Name: <span class="text-dark" id="customerName">John Smith</span></p>
                <p class="fw-semibold mb-1" style="color: black;">Email: <span class="text-dark" id="customerEmail">john.smith@email.com</span></p>
                <p class="fw-semibold mb-1" style="color: black;">Phone: <span class="text-dark" id="customerPhone">+1 234-567-8900</span></p>
                <p class="fw-semibold mb-1" style="color: black;">Member Since: <span class="text-dark">January 15, 2023</span></p>
                <p class="fw-semibold mb-1" style="color: black;">Total Bookings: <span class="text-dark">15 events</span></p>
                <p class="fw-semibold mb-0" style="color: black;">Loyalty Status: <span class="badge bg-success">Premium Member</span></p>
              </div>
            </div>
          </div>
          <!-- Recent Transactions -->
          <div class="col-md-6 col-lg-8">
            <div class="card border-0 shadow-sm rounded-3">
              <div class="card-header d-flex justify-content-between" style="background-color: #f0f0f0;">
                <h5 class="mb-0" style="color: black;">Recent Bookings</h5>
                <div>
                </div>
              </div>
              <div class="card-body p-3">
                <div class="table-responsive">
                  <table class="table table-hover align-middle">
                    <thead>
                      <tr style="background-color: #f0f0f0;">
                        <th style="color: black; font-weight: 500;">Booking ID</th>
                        <th style="color: black; font-weight: 500;">Date</th>
                        <th style="color: black; font-weight: 500;">Event Type</th>
                        <th style="color: black; font-weight: 500;">Package</th>
                        <th style="color: black; font-weight: 500;">Status</th>
                        <th style="color: black; font-weight: 500;">Amount</th>
                        <th style="color: black; font-weight: 500;">Monthly Trend</th>
                      </tr>
                    </thead>
                    <tbody id="bookingHistory">
                      <tr>
                        <td>#12345</td>
                        <td>2025-03-27</td>
                        <td>Wedding</td>
                        <td>Gold Package</td>
                        <td><span class="badge bg-success">Confirmed</span></td>
                        <td>$1,500</td>
                        <td>
                          <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-primary" style="width: 70%;"></div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Charts -->
          <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-3" style="min-height: 400px;">
              <div class="card-header" style="background-color: #f0f0f0;">
                <h5 class="mb-0" style="color: black;">Booking History</h5>
              </div>
              <div class="card-body" style="height: 350px; position: relative;">
                <canvas id="customerChart"></canvas>
              </div>
            </div>
          </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const defaultChartConfig = {
      type: "bar",
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
        datasets: [{
          label: "Bookings",
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: "rgba(75, 192, 192, 0.2)",
          borderColor: "rgba(75, 192, 192, 1)",
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    const johnSmithChartConfig = {
      type: "line",
      data: {
        labels: ["Aug", "Sep", "Oct", "Nov", "Dec", "Jan"],
        datasets: [{
          label: "Monthly Bookings",
          data: [85000, 95000, 120000, 45000, 75000, 150000],
          backgroundColor: "rgba(19, 64, 19, 0.2)",
          borderColor: "rgba(19, 64, 19, 1)",
          borderWidth: 2,
          tension: 0.4,
          fill: true
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function(value) {
                return '₱' + value.toLocaleString();
              }
            }
          }
        },
        plugins: {
          title: {
            display: true,
            text: 'John Smith - Booking History',
            font: {
              size: 16
            }
          }
        }
      }
    };

    // Initialize with default config
    let ctx = document.getElementById("customerChart").getContext("2d");
    let customerChart = new Chart(ctx, defaultChartConfig);

    // Update chart when view button is clicked
    document.querySelectorAll('.view-customer').forEach(button => {
      button.addEventListener('click', function() {
        const customerName = this.dataset.name;
        
        // Destroy existing chart
        if (customerChart) {
          customerChart.destroy();
        }
        
        // Create new chart with appropriate config
        if (customerName === "John Smith") {
          customerChart = new Chart(ctx, johnSmithChartConfig);
        } else {
          customerChart = new Chart(ctx, defaultChartConfig);
        }
      });
    });
  });
</script>

          <!-- Package Preferences -->
          <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-3" style="min-height: 400px;">
              <div class="card-header" style="background-color: #f0f0f0;">
                <h5 class="mb-0" style="color: black;">Package Preferences</h5>
              </div>
              <div class="card-body" style="height: 350px;">
                <div class="d-flex flex-column justify-content-around h-100">
                  <div class="package-item">
                    <div class="d-flex justify-content-between mb-1">
                      <span class="fw-semibold">Wedding Packages</span>
                      <span class="badge bg-primary">25%</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                      <div class="progress-bar bg-primary" style="width: 25%"></div>
                    </div>
                  </div>

                  <div class="package-item">
                    <div class="d-flex justify-content-between mb-1">
                      <span class="fw-semibold">Corporate Events</span>
                      <span class="badge bg-info">15%</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                      <div class="progress-bar bg-info" style="width: 15%"></div>
                    </div>
                  </div>

                  <div class="package-item">
                    <div class="d-flex justify-content-between mb-1">
                      <span class="fw-semibold">Birthday Celebrations</span>
                      <span class="badge bg-success">10%</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                      <div class="progress-bar bg-success" style="width: 10%"></div>
                    </div>
                  </div>
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



</body>


</html>
