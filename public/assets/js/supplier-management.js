$(document).ready(function () {
    // Set up CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Load all suppliers for supplier listing page
    if ($("#supplierTable").length) {
        loadSuppliers();
    }

    // Form submission for adding a supplier
    $("#addSupplierForm").on("submit", function (e) {
        e.preventDefault();

        // Disable submit button during form submission
        $("#addSupplierBtn").prop("disabled", true).html("Processing...");

        // Get form data
        const formData = $(this).serialize();

        // Make AJAX request
        $.ajax({
            url: supplierRoutes.add,
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    showMessage("success", response.message);

                    // Reset form
                    $("#addSupplierForm")[0].reset();
                } else {
                    showMessage("error", response.message);
                }
            },
            error: function (xhr) {
                handleAjaxError(xhr);
            },
            complete: function () {
                // Re-enable submit button
                $("#addSupplierBtn")
                    .prop("disabled", false)
                    .html("Add Supplier");
            },
        });
    });

    // Form submission for updating a supplier
    $("#updateSupplierForm").on("submit", function (e) {
        e.preventDefault();

        const supplierId = $("#edit_supplier_id").val();

        // Disable submit button during form submission
        $("#updateSupplierBtn").prop("disabled", true).html("Processing...");

        // Get form data
        const formData = $(this).serialize();

        // Make AJAX request
        $.ajax({
            url: supplierRoutes.update.replace("__ID__", supplierId),
            type: "PUT",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    showMessage("success", response.message);

                    // Close modal if it exists
                    if ($("#editSupplierModal").length) {
                        $("#editSupplierModal").modal("hide");
                    }

                    // Reload supplier table if on listing page
                    if ($("#supplierTable").length) {
                        loadSuppliers();
                    }
                } else {
                    showMessage("error", response.message);
                }
            },
            error: function (xhr) {
                handleAjaxError(xhr);
            },
            complete: function () {
                // Re-enable submit button
                $("#updateSupplierBtn")
                    .prop("disabled", false)
                    .html("Update Supplier");
            },
        });
    });


    // Get supplier data for editing
    $(document).on("click", ".edit-supplier", function () {
        const data = $(this).data();
        
        // Populate form fields with data attributes
        $("#edit_supplier_id").val(data.id);
        $("#edit_supplier_name").val(data.name);
        $("#edit_email").val(data.email);
        $("#edit_contact_person").val(data.contact);
        $("#edit_phone").val(data.phone);
        $("#edit_address").val(data.address);
        $("#edit_status").val(data.status);

        // Show modal
        $("#editSupplierModal").modal("show");
    });

    // Form submission for updating a supplier
    $("#editSupplierForm").on("submit", function (e) {
        e.preventDefault();
        const supplierId = $("#edit_supplier_id").val();

        // Disable submit button 
        $("#updateSupplierBtn").prop("disabled", true).html("Processing...");
        
        // Get form data
        const formData = $(this).serialize();

        $.ajax({
            url: supplierRoutes.update.replace("__ID__", supplierId),
            type: "POST", // Change to POST since we're using @method('PUT') in form
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    // Close modal
                    $("#editSupplierModal").modal("hide");
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.reload();
                    });
                } else {
                    showMessage("error", response.message || "Failed to update supplier");
                }
            },
            error: function (xhr) {
                handleAjaxError(xhr);
                $("#updateSupplierBtn").prop("disabled", false).html("Update Supplier");
            },
            complete: function() {
                $("#updateSupplierBtn").prop("disabled", false).html("Update Supplier");
            }
        });
    });

    // View supplier details 
    $(document).on("click", ".view-supplier", function () {
        // The modal will be handled by the blade template event listener
        // This function can be removed or used for additional functionality
    });

    // Function to load all suppliers
    function loadSuppliers() {
        $.ajax({
            url: supplierRoutes.getAll,
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    populateSupplierTable(response.data);
                } else {
                    showMessage("error", response.message);
                }
            },
            error: function (xhr) {
                handleAjaxError(xhr);
            },
        });
    }

    // Function to populate supplier table
    function populateSupplierTable(suppliers) {
        const table = $("#supplierTable tbody");
        table.empty();

        if (suppliers.length === 0) {
            table.append(
                '<tr><td colspan="6" class="text-center">No suppliers found</td></tr>'
            );
            return;
        }

        suppliers.forEach((supplier, index) => {
            table.append(`
                <tr>
                    <td>${index + 1}</td>
                    <td>${supplier.supplier_name}</td>
                    <td>${supplier.email}</td>
                    <td>${supplier.contactNumber}</td>
                    <td>${supplier.supplier_type}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-success view-supplier" data-id="${
                                supplier.suppler_id
                            }">
                                 View
                            </button>
                            <button class="btn btn-sm btn-info edit-supplier" data-id="${
                                supplier.suppler_id
                            }">
                                <i class="ti tabler-edit me-1"></i> Edit
                            </button>
                            <button class="btn btn-sm btn-danger delete-supplier" data-id="${
                                supplier.suppler_id
                            }" data-name="${supplier.supplier_name}">
                                <i class="ti tabler-trash me-1"></i> Delete
                            </button>
                        </div>
                    </td>
                </tr>
            `);
        });

        // Initialize DataTable if not already initialized
        if ($.fn.DataTable.isDataTable("#supplierTable")) {
            $("#supplierTable").DataTable().destroy();
        }

        $("#supplierTable").DataTable({
            responsive: true,
            ordering: true,
            paging: true,
            language: {
                search: "",
                searchPlaceholder: "Search...",
                paginate: {
                    previous: '<i class="ti tabler-chevron-left"></i>',
                    next: '<i class="ti tabler-chevron-right"></i>',
                },
            },
        });
    }

    // Function to show success/error message
    function showMessage(type, message) {
        const alertClass =
            type === "success" ? "alert-success" : "alert-danger";

        $("#responseMessage")
            .removeClass("alert-success alert-danger")
            .addClass(alertClass)
            .html(message)
            .show();

        // Auto hide after 5 seconds
        setTimeout(() => {
            $("#responseMessage").fadeOut();
        }, 5000);
    }

    // Function to handle AJAX errors
    function handleAjaxError(xhr) {
        let errorMessage = "An error occurred while processing your request.";

        if (xhr.responseJSON && xhr.responseJSON.errors) {
            errorMessage = "<ul>";
            for (let field in xhr.responseJSON.errors) {
                errorMessage += `<li>${xhr.responseJSON.errors[field][0]}</li>`;
            }
            errorMessage += "</ul>";
        } else if (xhr.responseJSON && xhr.responseJSON.message) {
            errorMessage = xhr.responseJSON.message;
        } else if (xhr.responseJSON && xhr.responseJSON.error) {
            errorMessage = xhr.responseJSON.error;
        }

        showMessage("error", errorMessage);
    }
});
