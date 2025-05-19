/**
 * Service Management JavaScript
 * Handles CRUD operations for services
 */

$(document).ready(function () {
    // Load all services for service listing page
    if ($("#serviceTable").length) {
        loadServices();
    }

    // Load branches for select dropdowns
    if ($(".branch-select").length) {
        loadBranchOptions();
    }

    // Form submission for adding a service
    $("#addServiceForm").on("submit", function (e) {
        e.preventDefault();

        // Disable submit button during form submission
        $("#addServiceBtn").prop("disabled", true).html("Processing...");

        // Get form data
        const formData = $(this).serialize();

        // Make AJAX request
        $.ajax({
            url: serviceRoutes.add,
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    showMessage("success", response.message);

                    // Reset form
                    $("#addServiceForm")[0].reset();
                    $(".select2").val("").trigger("change");
                } else {
                    showMessage("error", response.message);
                }
            },
            error: function (xhr) {
                handleAjaxError(xhr);
            },
            complete: function () {
                // Re-enable submit button
                $("#addServiceBtn").prop("disabled", false).html("Add Service");
            },
        });
    });

    // Form submission for updating a service
    $("#updateServiceForm").on("submit", function (e) {
        e.preventDefault();

        const serviceId = $("#edit_service_id").val();

        // Disable submit button during form submission
        $("#updateServiceBtn").prop("disabled", true).html("Processing...");

        // Get form data
        const formData = $(this).serialize();

        // Make AJAX request
        $.ajax({
            url: serviceRoutes.update.replace("__ID__", serviceId),
            type: "PUT",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    showMessage("success", response.message);

                    // Close modal if it exists
                    if ($("#editServiceModal").length) {
                        $("#editServiceModal").modal("hide");
                    }

                    // Reload service table if on listing page
                    if ($("#serviceTable").length) {
                        loadServices();
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
                $("#updateServiceBtn")
                    .prop("disabled", false)
                    .html("Update Service");
            },
        });
    });

    // Delete service functionality
    $(document).on("click", ".delete-service", function (e) {
        // Prevent the default handler to avoid double confirmation dialogs
        e.preventDefault();
        e.stopPropagation();

        // Let the SweetAlert in services-list.blade.php handle this
        // The original code is commented out below
        /*
        const serviceId = $(this).data("id");
        const serviceName = $(this).data("name");

        if (
            confirm(
                `Are you sure you want to delete the service: ${serviceName}?`
            )
        ) {
            $.ajax({
                url: serviceRoutes.delete.replace("__ID__", serviceId),
                type: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                dataType: "json",
                success: function (response) {
                    if (response.status) {
                        showMessage("success", response.message);
                        loadServices();
                    } else {
                        showMessage("error", response.message);
                    }
                },
                error: function (xhr) {
                    handleAjaxError(xhr);
                },
            });
        }
        */
    });

    // Get service data for editing
    $(document).on("click", ".edit-service", function () {
        const serviceId = $(this).data("id");

        $.ajax({
            url: serviceRoutes.get.replace("__ID__", serviceId),
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    const service = response.data;

                    // Populate form fields
                    $("#edit_service_id").val(service.id);
                    $("#edit_service_name").val(service.service_name);
                    $("#edit_branch_code")
                        .val(service.branch_code)
                        .trigger("change");
                    $("#edit_description").val(service.description);
                    $("#edit_duration").val(service.duration);
                    $("#edit_service_category")
                        .val(service.service_category)
                        .trigger("change");
                    $("#edit_service_cost").val(service.service_cost);
                    $("#edit_loyalty_pts").val(service.loyalty_pts);

                    // Show modal if it exists
                    if ($("#editServiceModal").length) {
                        $("#editServiceModal").modal("show");
                    }
                } else {
                    showMessage("error", response.message);
                }
            },
            error: function (xhr) {
                handleAjaxError(xhr);
            },
        });
    });

    // Filter services by branch
    $("#filter_branch").on("change", function () {
        const branchCode = $(this).val();

        if (branchCode) {
            loadServicesByBranch(branchCode);
        } else {
            loadServices();
        }
    });

    // Function to load all services
    function loadServices() {
        $.ajax({
            url: serviceRoutes.getAll,
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    populateServiceTable(response.data);
                } else {
                    showMessage("error", response.message);
                }
            },
            error: function (xhr) {
                handleAjaxError(xhr);
            },
        });
    }

    // Function to load services by branch
    function loadServicesByBranch(branchCode) {
        $.ajax({
            url: serviceRoutes.getByBranch.replace(
                "__BRANCH_CODE__",
                branchCode
            ),
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    populateServiceTable(response.data);
                } else {
                    showMessage("error", response.message);
                }
            },
            error: function (xhr) {
                handleAjaxError(xhr);
            },
        });
    }

    // Function to load branch options for select dropdowns
    function loadBranchOptions() {
        $.ajax({
            url: branchRoutes.getAll,
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    populateBranchOptions(response.data);
                } else {
                    console.error("Failed to load branches:", response.message);
                }
            },
            error: function (xhr) {
                console.error("AJAX error when loading branches:", xhr);
            },
        });
    }

    // Function to populate branch select options
    function populateBranchOptions(branches) {
        const selects = $(".branch-select");

        // First clear existing options except the default one
        selects.each(function () {
            const defaultOption = $(this).find("option:first");
            $(this).empty().append(defaultOption);
        });

        // Add branch options
        branches.forEach((branch) => {
            selects.append(
                `<option value="${branch.branch_code}">${branch.branch_name}</option>`
            );
        });

        // Refresh Select2 if it's used
        if ($.fn.select2) {
            selects.trigger("change");
        }
    }

    // Function to populate service table
    function populateServiceTable(services) {
        const table = $("#serviceTable tbody");
        table.empty();

        if (services.length === 0) {
            table.append(
                '<tr><td colspan="8" class="text-center">No services found</td></tr>'
            );
            return;
        }

        // Get all branch codes from the services to fetch their names in one go
        const branchCodes = [
            ...new Set(services.map((service) => service.branch_code)),
        ];
        const branchNames = {};

        // First fetch all branch names
        const fetchBranchNames = async () => {
            const promises = branchCodes.map((code) => {
                return $.ajax({
                    url: branchRoutes.get.replace("__CODE__", code),
                    type: "GET",
                    dataType: "json",
                })
                    .then((response) => {
                        if (response.status && response.data) {
                            branchNames[code] = response.data.branch_name;
                        } else {
                            branchNames[code] = code; // Fallback to code if name not found
                        }
                    })
                    .catch(() => {
                        branchNames[code] = code; // Fallback to code if request fails
                    });
            });

            await Promise.all(promises);
        };

        // Then populate the table with branch names
        fetchBranchNames().then(() => {
            services.forEach((service, index) => {
                const branchName =
                    branchNames[service.branch_code] || service.branch_code;

                table.append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${service.service_name}</td>
                        <td>${branchName}</td>
                        <td>${service.service_category}</td>
                        <td>${service.duration} min</td>
                        <td>₱${parseFloat(service.service_cost).toFixed(2)}</td>
                        <td>${service.loyalty_pts}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-success view-service" data-id="${
                                    service.id
                                }">
                                    <i class="ti tabler-eye me-1"></i> View
                                </button>
                                <button class="btn btn-sm btn-info edit-service" data-id="${
                                    service.id
                                }">
                                    <i class="ti tabler-edit me-1"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-danger delete-service" data-id="${
                                    service.id
                                }" data-name="${service.service_name}">
                                    <i class="ti tabler-trash me-1"></i> Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                `);
            });
        });

        if ($.fn.DataTable.isDataTable("#serviceTable")) {
            $("#serviceTable").DataTable().destroy();
        }

        $("#serviceTable").DataTable({
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
        }

        showMessage("error", errorMessage);
    }
}); // End of document ready handler
