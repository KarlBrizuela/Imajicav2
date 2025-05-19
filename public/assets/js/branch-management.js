/**
 * Branch Management JavaScript
 * Handles CRUD operations for branches
 */

$(document).ready(function () {
    // Set up CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Load all branches for branch listing page
    if ($("#branchTable").length) {
        loadBranches();
    }

    // Form submission for adding a branch
    $("#addBranchForm").on("submit", function (e) {
        e.preventDefault();

        // Disable submit button during form submission
        $("#addBranchBtn").prop("disabled", true).html("Processing...");

        // Get form data
        const formData = $(this).serialize();

        // Make AJAX request
        $.ajax({
            url: branchRoutes.add,
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    showMessage("success", response.message);

                    // Reset form
                    $("#addBranchForm")[0].reset();
                } else {
                    showMessage("error", response.message);
                }
            },
            error: function (xhr) {
                handleAjaxError(xhr);
            },
            complete: function () {
                // Re-enable submit button
                $("#addBranchBtn").prop("disabled", false).html("Add Branch");
            },
        });
    });

    // Form submission for updating a branch
    $("#updateBranchForm").on("submit", function (e) {
        e.preventDefault();

        const branchCode = $("#edit_branch_code").val();

        // Disable submit button during form submission
        $("#updateBranchBtn").prop("disabled", true).html("Processing...");

        // Get form data
        const formData = $(this).serialize();

        // Make AJAX request
        $.ajax({
            url: branchRoutes.update.replace("__CODE__", branchCode),
            type: "PUT",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    showMessage("success", response.message);

                    // Close modal if it exists
                    if ($("#editBranchModal").length) {
                        $("#editBranchModal").modal("hide");
                    }

                    // Reload branch table if on listing page
                    if ($("#branchTable").length) {
                        loadBranches();
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
                $("#updateBranchBtn")
                    .prop("disabled", false)
                    .html("Update Branch");
            },
        });
    });

    // Delete branch functionality
    $(document).on("click", ".delete-branch", function () {
        const branchCode = $(this).data("code");
        const branchName = $(this).data("name");

        if (
            confirm(
                `Are you sure you want to delete the branch: ${branchName}?`
            )
        ) {
            $.ajax({
                url: branchRoutes.delete.replace("__CODE__", branchCode),
                type: "DELETE",
                data: { branch_code: branchCode }, // Pass branch_code explicitly in the request body
                dataType: "json",
                success: function (response) {
                    if (response.status) {
                        showMessage("success", response.message);
                        loadBranches();
                    } else {
                        showMessage("error", response.message);
                    }
                },
                error: function (xhr) {
                    handleAjaxError(xhr);
                },
            });
        }
    });

    // Get branch data for editing
    $(document).on("click", ".edit-branch", function () {
        const branchCode = $(this).data("code");

        $.ajax({
            url: branchRoutes.get.replace("__CODE__", branchCode),
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    const branch = response.data;

                    // Populate form fields
                    $("#edit_branch_code").val(branch.branch_code);
                    $("#edit_branch_name").val(branch.branch_name);
                    $("#edit_address").val(branch.address);

                    // Show modal if it exists
                    if ($("#editBranchModal").length) {
                        $("#editBranchModal").modal("show");
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

    // Function to load all branches
    function loadBranches() {
        $.ajax({
            url: branchRoutes.getAll,
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    populateBranchTable(response.data);
                } else {
                    showMessage("error", response.message);
                }
            },
            error: function (xhr) {
                handleAjaxError(xhr);
            },
        });
    }

    // Function to populate branch table
    function populateBranchTable(branches) {
        const table = $("#branchTable tbody");
        table.empty();

        if (branches.length === 0) {
            table.append(
                '<tr><td colspan="5" class="text-center">No branches found</td></tr>'
            );
            return;
        }

        branches.forEach((branch, index) => {
            table.append(`
                <tr>
                    <td>${index + 1}</td>
                    <td>${branch.branch_code}</td>
                    <td>${branch.branch_name}</td>
                    <td>${branch.address}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-info edit-branch" data-code="${
                                branch.branch_code
                            }">
                                <i class="ti tabler-edit me-1"></i> Edit
                            </button>
                            <button class="btn btn-sm btn-danger delete-branch" data-code="${
                                branch.branch_code
                            }" data-name="${branch.branch_name}">
                                <i class="ti tabler-trash me-1"></i> Delete
                            </button>
                        </div>
                    </td>
                </tr>
            `);
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
});
