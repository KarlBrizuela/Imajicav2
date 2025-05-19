document.addEventListener("DOMContentLoaded", function() {
    const orderItemsTable = new DataTable('.datatables-order-items', {
        columns: [
            { data: null, defaultContent: '' }, // Control column
            { data: null, defaultContent: '' }, // Checkbox column
            { 
                data: null,
                render: function(data, type, row) {
                    return `
                    <div class="d-flex justify-content-start align-items-center text-nowrap">
                        <div class="avatar-wrapper">
                            <div class="avatar avatar-sm me-3">
                                <img src="${row.image ? assetsPath + 'img/products/' + row.image : ''}" class="rounded-2">
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <h6 class="text-body mb-0">${row.product_name}</h6>
                            <small>${row.product_info || ''}</small>
                        </div>
                    </div>`
                }
            },
            { 
                data: 'price',
                render: function(data) {
                    return `<span>$${parseFloat(data).toFixed(2)}</span>`;
                }
            },
            { 
                data: 'quantity',
                render: function(data, type, row) {
                    return `<input type="number" class="form-control form-control-sm quantity-input" 
                           value="${data}" min="1" style="width: 80px" 
                           onchange="updateItemQuantity(this, ${row.id})">`;
                }
            },
            { 
                data: null,
                render: function(data, type, row) {
                    return `<span>$${(row.price * row.quantity).toFixed(2)}</span>`;
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<button type="button" class="btn btn-icon btn-label-danger" onclick="removeItem(${row.id})">
                        <i class="ti ti-trash"></i>
                    </button>`;
                }
            }
        ],
        data: [], // Initial empty data
        responsive: true,
        order: [[2, 'asc']],
    });

    // Make orderItemsTable globally accessible
    window.orderItemsTable = orderItemsTable;
});

function addItemToOrder() {
    const productSelect = document.getElementById('productSelect');
    const quantity = document.getElementById('productQuantity').value;
    
    // Get selected product details (you'll need to implement this based on your product data)
    const product = getProductDetails(productSelect.value);
    
    if (product) {
        orderItemsTable.row.add({
            id: Date.now(), // Temporary ID
            product_name: product.name,
            product_info: product.info,
            image: product.image,
            price: product.price,
            quantity: quantity
        }).draw();
        
        updateOrderTotals();
        $('#addItemModal').modal('hide');
    }
}

function updateItemQuantity(input, itemId) {
    const quantity = parseInt(input.value);
    const row = orderItemsTable.row($(input).closest('tr'));
    const data = row.data();
    data.quantity = quantity;
    row.data(data).draw(false);
    updateOrderTotals();
}

function removeItem(itemId) {
    orderItemsTable.rows((idx, data) => data.id === itemId).remove().draw();
    updateOrderTotals();
}

function updateOrderTotals() {
    let subtotal = 0;
    orderItemsTable.rows().every(function() {
        const data = this.data();
        subtotal += data.price * data.quantity;
    });
    
    const taxRate = 0.1; // 10% tax rate
    const tax = subtotal * taxRate;
    const total = subtotal + tax;

    // Update the order summary fields
    document.querySelector('[placeholder="0.00"]').value = subtotal.toFixed(2);
    document.querySelectorAll('[placeholder="0.00"]')[1].value = tax.toFixed(2);
    document.querySelectorAll('[placeholder="0.00"]')[2].value = total.toFixed(2);
}

// Helper function to get product details - implement this based on your product data
function getProductDetails(productId) {
    // This should fetch product details from your database or product list
    // Return example:
    return {
        name: 'Product Name',
        info: 'Product Description',
        image: 'product-1.png',
        price: 99.99
    };
}
