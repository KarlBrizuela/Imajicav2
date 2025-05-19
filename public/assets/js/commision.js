document.addEventListener("DOMContentLoaded", function(e) {
    let t = document.querySelector(".commissionTable"),
        o = {
            1: { title: "Pending", class: "bg-label-warning" },
            2: { title: "Completed", class: "bg-label-success" },
            3: { title: "Cancelled", class: "bg-label-danger" }
        };

    // Mock data for testing
   

    t && new DataTable(t, {
        ajax: assetsPath +"/comissions.json", // Use the AJAX call to fetch data
        columns: [
            { data: "employee_name" }, 
            { data: "sales_service_no" }, 
            { data: "product_sales_no" }, 
            { data: "client_no" }, 
            { data: "total_service_sale" }, 
            { data: "total_product_sale" }, 
            { data: "total_service_commission" }, 
            { data: "total_session_commission" }, 
            { data: "total_product_commission" },
            { data: "total_commision" },
            { data: "action" }
           
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
            <td>${item.employee_name}</td>
            <td>${item.sales_service_no}</td>
            <td>${item.product_sales_no}</td>
             <td>${item.client_no}</td>
            <td>${item.total_service_sale}</td>
                <td>${item.total_product_sale}</td>
            <td>${item.total_service_commission}</td>
             <td>${item.total_session_commission}</td>
            <td>${item.total_product_commission}</td>
            <td>${item.total_commision}</td>
            <td>
                  <div class='d-flex gap-2'>
                                    <button class='btn btn-success'>Vieww</button>
                                    <button class='btn btn-info'>Edit</button>
                                    <button class='btn btn-danger'>Delete</button>
                                </div>
                   <td>
                    </tr>
                `;
    }

    // Fetch JSON data and populate the table
    fetch('/assets/comissions.json') // Use relative path
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById("commissionTableBody");
            const rows = data.map(createRow).join(""); // Create rows using the function
            tableBody.innerHTML = rows; // Set the innerHTML of the table body
        })
        .catch(error => console.error('Error fetching the JSON data:', error));
});
