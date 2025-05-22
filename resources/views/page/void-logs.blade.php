<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Void Logs</title>

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

  /* Keep all other existing styles exactly the same */
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

  #voidTable thead th {
    background-color: #1b392f;
    color: white;
    border: none;
    font-weight: 600;
    padding: 12px;
  }

  #voidTable tbody td {
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
                    <h4 class="page-title">Void Logs</h4>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="voidTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Service</th>
                                            <th>Customer</th>
                                            <th>Staff</th>
                                            <th>Amount Voided</th>
                                            <th>Status</th>
                                            <th>Date Voided</th>
                                            <th>Branch</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($voids as $void)
                                        <tr>
                                            <td>{{ $void->booking_id ?? 'N/A' }}</td>
                                            <td>{{ optional($void->service)->service_name ?? 'N/A' }}</td>
                                            <td>{{ optional($void->patient)->firstname ?? 'N/A' }} {{ optional($void->patient)->lastname ?? '' }}</td>
                                            <td>{{ optional($void->staff)->firstname ?? 'N/A' }} {{ optional($void->staff)->lastname ?? '' }}</td>
                                            <td>₱{{ number_format(optional($void->service)->service_cost ?? 0, 2) }}</td>
                                            <td>{{ $void->status ?? 'N/A' }}</td>
                                            <td>{{ $void->start_date ?? 'N/A' }}</td>
                                            <td>{{ optional($void->branch)->branch_name ?? 'N/A' }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">No void logs found</td>
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

    <script>
        $(document).ready(function () {
            $('#voidTable').DataTable({
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
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    infoFiltered: "(filtered from _MAX_ total entries)",
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
</body>
</html>
