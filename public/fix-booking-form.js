/**
 * Fix for booking form issues
 * - Ensures services and packages are saved correctly
 * - Improves select2 performance to prevent freezing
 */
$(document).ready(function () {
    console.log("Loading booking form fixes...");

    // Fix for booking type toggles - don't disable fields
    $('input[name="booking_type"]').on("change", function () {
        const isService = $(this).val() === "service";

        // Show/hide without disabling
        if (isService) {
            $("#service_section").show();
            $("#package_section").hide();
        } else {
            $("#service_section").hide();
            $("#package_section").show();
        }
    });

    // Fix for edit booking type toggles
    $('input[name="edit_booking_type"]').on("change", function () {
        const isService = $(this).val() === "service";

        // Show/hide without disabling
        if (isService) {
            $("#edit_service_section").show();
            $("#edit_package_section").hide();
        } else {
            $("#edit_service_section").hide();
            $("#edit_package_section").show();
        }
    });

    // Reinitialize select2 with performance optimizations for packages
    function optimizeSelect2() {
        // Only proceed if select2 is loaded
        if (typeof $.fn.select2 === "undefined") return;

        console.log("Optimizing select2 for packages...");

        // Optimized config for package selections
        const packageConfig = {
            placeholder: "Select packages",
            multiple: true,
            maximumSelectionLength: 10,
            minimumInputLength: 0,
            allowClear: true,
            selectOnClose: false,
            closeOnSelect: false,
            // Simpler template to prevent rendering issues
            templateResult: function (data) {
                if (!data.element) return data.text;
                return $("<span>").text(data.text);
            },
        };

        // Apply optimizations to package selections
        if (!$("#package_id").data("select2-optimized")) {
            // Destroy existing select2 if any
            if ($("#package_id").hasClass("select2-hidden-accessible")) {
                $("#package_id").select2("destroy");
            }

            // Reinitialize with optimized config
            $("#package_id")
                .select2({
                    ...packageConfig,
                    dropdownParent: $("#addEventSidebar .offcanvas-body"),
                })
                .data("select2-optimized", true);
        }

        if (!$("#editPackageId").data("select2-optimized")) {
            // Destroy existing select2 if any
            if ($("#editPackageId").hasClass("select2-hidden-accessible")) {
                $("#editPackageId").select2("destroy");
            }

            // Reinitialize with optimized config
            $("#editPackageId")
                .select2({
                    ...packageConfig,
                    dropdownParent: $("#updateEventSidebar .offcanvas-body"),
                })
                .data("select2-optimized", true);
        }
    }

    // Major fix for form submission to ensure packages/services are correctly submitted
    // This has been updated to work with the new pivot table structure
    $("#addBookingForm")
        .off("submit")
        .on("submit", function (e) {
            e.preventDefault();

            // Get booking type
            const bookingType = $('input[name="booking_type"]:checked').val();
            console.log("Submitting form with booking type:", bookingType);

            // Validate required fields first
            if (!$("#start_date").val()) {
                Swal.fire(
                    "Error",
                    "Please select a start date and time",
                    "error"
                );
                return false;
            }

            if (!$("#end_date").val()) {
                Swal.fire(
                    "Error",
                    "Please select an end date and time",
                    "error"
                );
                return false;
            }

            if (!$("#id").val()) {
                Swal.fire("Error", "Please select a staff member", "error");
                return false;
            }

            if (!$("#patient_id").val()) {
                Swal.fire("Error", "Please select a patient", "error");
                return false;
            }

            // Validate booking type specific fields
            if (
                bookingType === "service" &&
                (!$("#service_id").val() || $("#service_id").val().length === 0)
            ) {
                Swal.fire(
                    "Error",
                    "Please select at least one service",
                    "error"
                );
                return false;
            }

            if (
                bookingType === "package" &&
                (!$("#package_id").val() || $("#package_id").val().length === 0)
            ) {
                Swal.fire(
                    "Error",
                    "Please select at least one package",
                    "error"
                );
                return false;
            }

            // Show loading alert
            Swal.fire({
                title: "Saving Booking",
                text: "Please wait while we create your booking...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                },
            });

            // Create formData properly for pivot table handling
            const form = this;
            const formData = new FormData(form);

            // Ensure the proper arrays are sent based on booking type
            if (bookingType === "service") {
                // Get selected services as array
                const serviceIds = $("#service_id").val() || [];

                // Ensure service_id[] is properly formatted while removing package_id[]
                formData.delete("package_id[]");
                formData.delete("package_id");

                // Ensure service_id[] is ready for new values
                formData.delete("service_id[]");
                formData.delete("service_id");

                // Add each service ID with array notation
                serviceIds.forEach((id) => {
                    formData.append("service_id[]", id);
                });

                // Debug info
                console.log("Adding services:", serviceIds);
            } else {
                // Get selected packages as array
                const packageIds = $("#package_id").val() || [];

                // Ensure package_id[] is properly formatted while removing service_id[]
                formData.delete("service_id[]");
                formData.delete("service_id");

                // Ensure package_id[] is ready for new values
                formData.delete("package_id[]");
                formData.delete("package_id");

                // Add each package ID with array notation
                packageIds.forEach((id) => {
                    formData.append("package_id[]", id);
                });

                // Debug info
                console.log("Adding packages:", packageIds);
            }

            // Log all form data for debugging
            console.log("Form data being submitted:");
            for (let [key, value] of formData.entries()) {
                console.log(`${key}: ${value}`);
            }

            // Submit the form with the properly formatted data
            $.ajax({
                url: $(form).attr("action"),
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log("Form submitted successfully:", response);

                    Swal.close();

                    Swal.fire({
                        icon: "success",
                        title: "Booking Created",
                        text: "Your booking has been created successfully",
                        confirmButtonText: "OK",
                    }).then(() => {
                        window.location.reload();
                    });
                },
                error: function (xhr) {
                    console.error("Error submitting form:", xhr);

                    Swal.close();

                    let errorMessage =
                        "An error occurred while creating the booking.";

                    if (
                        xhr.status === 422 &&
                        xhr.responseJSON &&
                        xhr.responseJSON.errors
                    ) {
                        const errors = xhr.responseJSON.errors;
                        // Print each validation error in detail for debugging
                        console.log("Validation errors:", errors);

                        const errorList = Object.keys(errors)
                            .map((key) => {
                                return `${key}: ${errors[key][0]}`;
                            })
                            .join("<br>");
                        errorMessage = `<strong>Validation Errors:</strong><br>${errorList}`;
                    } else if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;

                        if (xhr.responseJSON.exception) {
                            console.error(
                                "Exception:",
                                xhr.responseJSON.exception
                            );
                            console.error("File:", xhr.responseJSON.file);
                            console.error("Line:", xhr.responseJSON.line);
                        }
                    }

                    Swal.fire({
                        icon: "error",
                        title: "Error Creating Booking",
                        html: errorMessage,
                        confirmButtonText: "OK",
                    });
                },
            });

            return false; // Prevent default submission
        });

    // Similar fix for update form
    $("#updateBookingForm")
        .off("submit")
        .on("submit", function (e) {
            e.preventDefault();

            // Get booking type
            const bookingType = $(
                'input[name="edit_booking_type"]:checked'
            ).val();
            console.log(
                "Submitting update form with booking type:",
                bookingType
            );

            // Validate booking ID
            if (!$("#update_booking_id").val()) {
                Swal.fire("Error", "No booking ID specified", "error");
                return false;
            }

            // Show loading alert
            Swal.fire({
                title: "Updating Booking",
                text: "Please wait while we update your booking...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                },
            });

            // Create formData properly for pivot table handling
            const form = this;
            const formData = new FormData(form);

            // CRITICAL: Make sure we keep edit_booking_type for controller to decide which relationship to update

            // Ensure the proper arrays are sent based on booking type
            if (bookingType === "service") {
                // Get selected services as array
                const serviceIds = $("#editServiceId").val() || [];

                // Keep edit_booking_type
                formData.set("edit_booking_type", "service");

                // Ensure service_id[] is properly formatted while removing package_id[]
                formData.delete("package_id[]");
                formData.delete("package_id");

                // Ensure service_id[] is ready for new values
                formData.delete("service_id[]");
                formData.delete("service_id");

                // Add each service ID with array notation
                serviceIds.forEach((id) => {
                    formData.append("service_id[]", id);
                });

                // Debug info
                console.log("Updating with services:", serviceIds);
            } else {
                // Get selected packages as array
                const packageIds = $("#editPackageId").val() || [];

                // Keep edit_booking_type
                formData.set("edit_booking_type", "package");

                // Ensure package_id[] is properly formatted while removing service_id[]
                formData.delete("service_id[]");
                formData.delete("service_id");

                // Ensure package_id[] is ready for new values
                formData.delete("package_id[]");
                formData.delete("package_id");

                // Add each package ID with array notation
                packageIds.forEach((id) => {
                    formData.append("package_id[]", id);
                });

                // Debug info
                console.log("Updating with packages:", packageIds);
            }

            // Log all form data for debugging
            console.log("Update form data being submitted:");
            for (let [key, value] of formData.entries()) {
                console.log(`${key}: ${value}`);
            }

            // Submit the form with the properly formatted data
            $.ajax({
                url: $(form).attr("action"),
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(
                        "Update form submitted successfully:",
                        response
                    );

                    Swal.close();

                    Swal.fire({
                        icon: "success",
                        title: "Booking Updated",
                        text: "Your booking has been updated successfully",
                        confirmButtonText: "OK",
                    }).then(() => {
                        window.location.reload();
                    });
                },
                error: function (xhr) {
                    console.error("Error submitting update form:", xhr);

                    Swal.close();

                    let errorMessage =
                        "An error occurred while updating the booking.";

                    if (
                        xhr.status === 422 &&
                        xhr.responseJSON &&
                        xhr.responseJSON.errors
                    ) {
                        const errors = xhr.responseJSON.errors;
                        // Print each validation error in detail for debugging
                        console.log("Validation errors:", errors);

                        const errorList = Object.keys(errors)
                            .map((key) => {
                                return `${key}: ${errors[key][0]}`;
                            })
                            .join("<br>");
                        errorMessage = `<strong>Validation Errors:</strong><br>${errorList}`;
                    } else if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;

                        if (xhr.responseJSON.exception) {
                            console.error(
                                "Exception:",
                                xhr.responseJSON.exception
                            );
                            console.error("File:", xhr.responseJSON.file);
                            console.error("Line:", xhr.responseJSON.line);
                        }
                    }

                    Swal.fire({
                        icon: "error",
                        title: "Error Updating Booking",
                        html: errorMessage,
                        confirmButtonText: "OK",
                    });
                },
            });

            return false; // Prevent default submission
        });

    // Initialize optimizations when form is shown
    $("#addEventSidebar").on("shown.bs.offcanvas", function () {
        setTimeout(optimizeSelect2, 100);

        // Pre-select the service radio option by default for new bookings
        $('input[name="booking_type"][value="service"]')
            .prop("checked", true)
            .trigger("change");
    });

    $("#updateEventSidebar").on("shown.bs.offcanvas", function () {
        setTimeout(optimizeSelect2, 100);
    });

    // Initial optimization
    setTimeout(optimizeSelect2, 500);

    console.log("Booking form fixes loaded successfully!");
});
