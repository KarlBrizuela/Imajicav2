function showViewModal(row) {
    const modal = document.createElement('div');
    modal.className = 'modal fade';
    modal.innerHTML = `
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Transaction Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title mb-3">Transaction Information</h6>
                                    <div class="mb-2">
                                        <small class="text-muted">Transaction ID</small>
                                        <div class="fw-semibold">${row.transaction_id}</div>
                                    </div>
                                    <div class="mb-2">
                                        <small class="text-muted">Transaction Date</small>
                                        <div class="fw-semibold">${row.transaction_date}</div>
                                    </div>
                                    <div class="mb-2">
                                        <small class="text-muted">Amount</small>
                                        <div class="fw-semibold">₱${row.amount.toFixed(2)}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title mb-3">Customer Details</h6>
                                    <div class="mb-2">
                                        <small class="text-muted">Client Name</small>
                                        <div class="fw-semibold">${row.client_name}</div>
                                    </div>
                                    <div class="mb-2">
                                        <small class="text-muted">Service/Product</small>
                                        <div class="fw-semibold">${row.service_product}</div>
                                    </div>
                                    <div class="mb-2">
                                        <small class="text-muted">Payment Terms Amount</small>
                                        <div class="fw-semibold">${row.payment_terms_amount}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    `;
    document.body.appendChild(modal);
    const modalInstance = new bootstrap.Modal(modal);
    modalInstance.show();
    modal.addEventListener('hidden.bs.modal', function () {
        document.body.removeChild(modal);
    });
}






  
  document.addEventListener("DOMContentLoaded", function () {
    const table = document.querySelector(".salesTable");
    const statusClasses = {
      "Pending": { title: "Pending", class: "bg-label-warning" },
      "Completed": { title: "Completed", class: "bg-label-success" },
      "Cancelled": { title: "Cancelled", class: "bg-label-danger" }
    };
  
    if (table) {
      new DataTable(table, {
        ajax: "/assets/sales-transaction.json",
        columns: [
          { data: "transaction_id" },
          { data: "client_name" },
          { data: "service_product" },
          { data: "payment_terms_amount" },
          { data: "customer" },
          { data: "cashier" },
          { data: "amount" },
          { data: "transaction_date" },
          { data: "action" }
        ],
        columnDefs: [
          {
            targets: 4,
            render: (data, type, row) => `<span class="badge ${statusClasses[row.status]?.class || ''}">${statusClasses[row.status]?.title || row.status}</span>`
          },
          {
            targets: -1,
            title: "Actions",
            searchable: false,
            orderable: false,
            render: (data, type, row) => `
                <div class="d-inline-block text-nowrap">
                    <button class="btn btn-success btn-sm">
                        <i class="ti tabler-eye me-1"></i>View
                    </button>
                    <button class="btn btn-info btn-sm">
                        <i class="ti tabler-edit me-1"></i>Edit
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="ti tabler-trash me-1"></i>Delete
                    </button>
                </div>`
        }
        ],
        select: { style: "multi", selector: "td:nth-child(2)" },
        order: [[1, "asc"]],
        displayLength: 7,
        language: {
          paginate: {
            next: '<i class="icon-base ti tabler-chevron-right icon-18px"></i>',
            previous: '<i class="icon-base ti tabler-chevron-left icon-18px"></i>'
          }
        }
      });
    }
  });
  