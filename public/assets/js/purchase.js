document.addEventListener("DOMContentLoaded", function(e) {
    let t = document.querySelector(".purchaseTable"),
        o = {
            1: { title: "Pending", class: "bg-label-warning" },
            2: { title: "Completed", class: "bg-label-success" },
            3: { title: "Cancelled", class: "bg-label-danger" }
        };

    // Mock data for testing
   

    t && new DataTable(t, {
        ajax: assetsPath +"/purchase.json", // Use the AJAX call to fetch data
        columns: [
            { data: "trans_no" }, 
            { data: "vendor_name" },
            { data: "product_ordered" }, 
            { data: "date_recieved" },
            { data: "received_by" },
            { data: "qty" } ,
            { data: "amount" },
            { data: "payment_terms" }
        ],
        columnDefs: [
            {
                className: "control",
                searchable: !1,
                orderable: !1,
                responsivePriority: 2,
                targets: 0,
                render: function(e, t, n, a) { return ""; }
            },
            {
                targets: 0,
                orderable: !1,
                searchable: !1,
                responsivePriority: 3,
                checkboxes: !0,
                checkboxes: { selectAllRender: '<input type="checkbox" class="form-check-input">' },
                render: function() { return '<input type="checkbox" class="dt-checkboxes form-check-input">'; }
            },
            {
                targets: 1,
                render: function(e, t, n, a) {
                    return `<div class="d-flex flex-column">
                                <h6 class="text-nowrap mb-0">${n.name}</h6>
                            </div>`;
                }
            },
            {
                targets: 5,
                render: function(e, t, n, a) {
                    n = n.status;
                    return `<span class="badge ${o[n].class}" text-capitalized>${o[n].title}</span>`;
                }
            },
            {
                targets: -1,
                title: "Actions",
                searchable: !1,
                orderable: !1,
                render: function(e, t, n, a) {
                    return `<div class="d-inline-block text-nowrap">
                                <button class="btn btn-text-secondary rounded-pill waves-effect btn-icon">
                                    <i class="icon-base ti tabler-edit icon-22px"></i>
                                </button>
                                <button class="btn btn-text-secondary rounded-pill waves-effect btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="icon-base ti tabler-dots-vertical icon-22px"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end m-0">
                                    <a href="javascript:void(0);" class="dropdown-item">View</a>
                                    <a href="javascript:void(0);" class="dropdown-item">Cancel</a>
                                </div>
                            </div>`;
                }
            }
        ],
        select: { style: "multi", selector: "td:nth-child(2)" },
        order: [1, "asc"],
        displayLength: 7,
        language: {
            paginate: {
                next: '<i class="icon-base ti tabler-chevron-right icon-18px"></i>',
                previous: '<i class="icon-base ti tabler-chevron-left icon-18px"></i>'
            }
        }
    });

    function createRow(item) {
        return `
            <tr>
            <td>${item.trans_no}</td>
            <td>${item.vendor_name}</td>
            <td>${item.product_ordered}</td>
            <td>${item.date_recieved}</td>
            <td>${item.received_by}</td>
            <td>${item.qty}</td>
            <td>${item.amount}</td>
            <td>${item.payment_terms}</td>

                <td>
                <div class='d-flex gap-2'>
                            <button class='btn btn-success btn-sm'></i>View</button>
                            <button class='btn btn-info btn-sm'>Edit</button>
                            <button class='btn btn-danger btn-sm'></i>Delete</button>
                        </div>
                  </td>
            </tr>
        `;
    }

    // Fetch JSON data and populate the table
    fetch('/assets/purchase.json') // Use relative path
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('purchaseTable');
            const rows = data.map(createRow).join(''); // Create rows using the function
            tableBody.innerHTML = rows; // Set the innerHTML of the table body
        })
        .catch(error => console.error('Error fetching the JSON data:', error));
});

