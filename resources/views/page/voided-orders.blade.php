<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voided Orders</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/iconify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />

    <style>
  .layout-wrapper {
    display: flex;
    min-height: 100vh;
    background-color: #f8f9fa;
  }

  .layout-menu {
    width: 260px;
    flex-shrink: 0;
    background: #fff;
    border-right: 1px solid #e7eaf3;
    height: 100vh;
    position: fixed;
    overflow-y: auto;
  }

  .layout-page {
    flex: 1;
    margin-left: 260px; /* Same as sidebar width */
    padding: 20px;
    min-height: 100vh;
  }

  .content-wrapper {
    background: #f8f9fa;
  }

  .container-xxl {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
  }

  .page-title {
    color: #5a6acf;
    font-weight: 700;
    margin-bottom: 1.5rem;
    font-size: 1.5rem;
  }

  .card {
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border: none;
    margin-bottom: 1.5rem;
    background: #fff;
  }

  .card-body {
    padding: 1.5rem;
  }

  .table-responsive {
    border-radius: 8px;
    overflow: hidden;
  }

  #voidedOrdersTable thead th {
    background-color: #1b392f;
    color: white;
    border: none;
    font-weight: 600;
    padding: 12px;
  }

  #voidedOrdersTable tbody td {
    padding: 12px;
    vertical-align: middle;
  }

  .dataTables_wrapper .dataTables_filter input {
    margin-left: 0.5em;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px 10px;
  }

  .dataTables_wrapper .dataTables_length select {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
  }

  .dt-buttons .btn {
    margin-right: 5px;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .layout-menu {
      width: 100%;
      position: relative;
      height: auto;
      border-right: none;
    }

    .layout-page {
      margin-left: 0;
      padding: 15px;
    }
  }
</style>
</head>

<body>
    <div class="layout-wrapper">
        <!-- Sidebar -->
        <aside class="layout-menu">
            @include('components.sidebar')
        </aside>

        <!-- Main Content -->
        <div class="layout-page">
            <div class="content-wrapper">
                <div class="container-xxl">
                    <h4 class="page-title">Voided Orders</h4>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="voidedOrdersTable">
                                    <thead>
                                        <tr>
                                            <th>Order No.</th>
                                            <th>Date Voided</th>
                                            <th>Customer</th>
                                            <th>Amount</th>
                                            <th>Payment Method</th>
                                            <th>Order Status</th>
                                            <th>Payment Status</th>
                                            <th>Reason</th>
                                            <th>Deleted By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($voidedOrders as $order)
                                        <tr>
                                            <td>{{ $order->order_number ?? 'N/A' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($order->voided_at)->format('M d, Y h:i A') }}</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span>{{ $order->customer_name ?? 'N/A' }}</span>
                                                    <small class="text-muted">{{ $order->customer_email ?? '' }}</small>
                                                </div>
                                            </td>
                                            <td>₱{{ number_format($order->total_amount ?? 0, 2) }}</td>
                                            <td>{{ $order->payment_method ?? 'N/A' }}</td>
                                            <td>
                                                <span class="badge bg-label-{{ 
                                                    $order->order_status == 'Delivered' ? 'success' : 
                                                    ($order->order_status == 'Ordered' ? 'primary' : 
                                                    ($order->order_status == 'Out for Delivery' ? 'warning' : 
                                                    ($order->order_status == 'Ready to Pickup' ? 'info' : 'secondary'))) 
                                                }} me-1">
                                                    {{ $order->order_status ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-label-{{ 
                                                    $order->payment_status == 'Paid' ? 'success' : 
                                                    ($order->payment_status == 'Pending' ? 'warning' : 
                                                    ($order->payment_status == 'Failed' ? 'danger' : 
                                                    ($order->payment_status == 'Cancelled' ? 'secondary' : 'info'))) 
                                                }} me-1">
                                                    {{ $order->payment_status ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td>{{ $order->void_reason ?? 'No reason provided' }}</td>
                                            <td>{{ $order->voided_by_name ?? 'N/A' }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9" class="text-center text-muted">No voided orders found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/js/menu.js') }}"></script>

    <!-- DataTables Buttons JS -->
    <script src="{{ asset('vendor/libs/datatables-buttons/datatables-buttons.js') }}"></script>
    <script src="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/libs/jszip/jszip.js') }}"></script>
    <script src="{{ asset('vendor/libs/pdfmake/pdfmake.js') }}"></script>
    <script src="{{ asset('vendor/libs/datatables-buttons/buttons.html5.js') }}"></script>
    <script src="{{ asset('vendor/libs/datatables-buttons/buttons.print.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>

    @if($voidedOrders->isNotEmpty())
    <script>
        $(document).ready(function () {
            $('#voidedOrdersTable').DataTable({
                responsive: true,
                pageLength: 25,
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                dom: '<"row mb-3"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>><"row"<"col-sm-12"B>>',
                buttons: [
                    {
                        extend: 'copy',
                        className: 'btn btn-outline-secondary btn-sm me-2',
                        text: '<i class="ti ti-copy me-1"></i>Copy'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-outline-secondary btn-sm me-2',
                        text: '<i class="ti ti-file-text me-1"></i>CSV'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-outline-secondary btn-sm me-2',
                        text: '<i class="ti ti-file-excel me-1"></i>Excel'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-outline-secondary btn-sm me-2',
                        text: '<i class="ti ti-file-pdf me-1"></i>PDF'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-outline-secondary btn-sm',
                        text: '<i class="ti ti-printer me-1"></i>Print'
                    }
                ],
                language: {
                    search: "Search:",
                    lengthMenu: "Show MENU entries",
                    info: "Showing START to END of TOTAL entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    infoFiltered: "(filtered from MAX total entries)",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                }
            });
        });
    </script>
    @endif
</body>
</html> 