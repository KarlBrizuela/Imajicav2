/**
 * Booking View Details JS
 * Handles display of booking details in the view sidebar
 */

$(document).ready(function () {
    // Handle view booking click
    $(document).on("click", ".view-booking", function () {
        const bookingId = $(this).data("booking-id");
        loadBookingDetails(bookingId);
    });

    // Handle edit button in view sidebar
    $("#edit-booking-btn").on("click", function () {
        const bookingId = $(this).data("booking-id");

        // Close the view sidebar
        const viewSidebar = bootstrap.Offcanvas.getInstance(
            document.getElementById("viewBookingDetailsSidebar")
        );
        viewSidebar.hide();

        // Load booking details into the edit form and show it
        loadBookingToEdit(bookingId);
    });

    // Handle cancel booking button
    $("#cancel-booking-btn").on("click", function () {
        const bookingId = $(this).data("booking-id");
        cancelBooking(bookingId);
    });

    // Function to load booking details into the view sidebar
    function loadBookingDetails(bookingId) {
        if (!bookingId) {
            console.error("No booking ID provided");
            return;
        }

        // Show loading state
        $("#view-booking-title").text("Loading booking details...");
        $("#view-booking-date").text("");
        $("#view-patient-name").text("Loading...");
        $("#view-patient-phone").text("");
        $("#view-service-name").text("Loading...");
        $("#view-staff-name").text("Loading...");
        $("#view-branch-name").text("Loading...");
        $("#view-price").text("-");
        $("#view-payment-status").text("-");
        $("#view-remarks").text("Loading...");
        // Quick notes removed as per client request
        /*
        $("#view-quick-notes").html(
            '<p class="text-muted fst-italic">Loading notes...</p>'
        );
        */

        // Store booking ID for actions
        $("#edit-booking-btn").data("booking-id", bookingId);
        $("#cancel-booking-btn").data("booking-id", bookingId);
        // Quick note removed as per client request
        // $("#save-quick-note").data("booking-id", bookingId);

        // Open the sidebar
        const viewSidebar = new bootstrap.Offcanvas(
            document.getElementById("viewBookingDetailsSidebar")
        );
        viewSidebar.show();

        // Fetch booking details via AJAX
        $.ajax({
            url: `/api/bookings/${bookingId}`,
            method: "GET",
            success: function (data) {
                if (data) {
                    console.log("Booking details loaded:", data);

                    // Format dates
                    const startDate = moment(data.start_date);
                    const endDate = moment(data.end_date);
                    const formattedDate = startDate.format("ddd, MMM D, YYYY");
                    const formattedTime =
                        startDate.format("h:mm A") +
                        " - " +
                        endDate.format("h:mm A");

                    // Update booking header
                    $("#view-booking-title").text(
                        `Booking #${data.booking_id}`
                    );
                    $("#view-booking-date").text(
                        `${formattedDate} • ${formattedTime}`
                    );

                    // Set status badge
                    const statusClass = getStatusClass(data.status);
                    $("#booking-status-badge").html(`
                        <span class="badge ${statusClass} fs-6">
                            ${data.status}
                        </span>
                    `);

                    // Update patient info if available
                    if (data.patient) {
                        $("#view-patient-name").text(
                            `${data.patient.firstname} ${data.patient.lastname}`
                        );
                        $("#view-patient-phone").text(
                            data.patient.phone || "-"
                        );
                        $("#view-patient-email").text(
                            data.patient.email || "-"
                        );
                        $("#view-patient-points").text(
                            data.patient.points || "0"
                        );
                    } else {
                        $("#view-patient-name").text(
                            "Patient information not available"
                        );
                        $("#view-patient-phone").text("-");
                    }

                    // Update service/package info
                    let serviceOrPackageName = "";

                    // Check for packages
                    if (data.packages && data.packages.length) {
                        serviceOrPackageName = data.packages
                            .map((pkg) => pkg.package_name)
                            .join(", ");
                        $("#view-service-name").html(
                            '<span class="badge bg-label-success me-1">Package</span> ' +
                                serviceOrPackageName
                        );
                    }
                    // Check for services
                    else if (data.services && data.services.length) {
                        serviceOrPackageName = data.services
                            .map((svc) => svc.service_name)
                            .join(", ");
                        $("#view-service-name").html(
                            '<span class="badge bg-label-info me-1">Service</span> ' +
                                serviceOrPackageName
                        );
                    }
                    // Fallback for older data format
                    else if (data.service && data.service[0]) {
                        serviceOrPackageName = data.service[0].service_name;
                        $("#view-service-name").html(
                            '<span class="badge bg-label-info me-1">Service</span> ' +
                                serviceOrPackageName
                        );
                    } else {
                        $("#view-service-name").text(
                            "No service/package information"
                        );
                    }

                    // Update staff info
                    if (data.staff) {
                        $("#view-staff-name").text(
                            `${data.staff.firstname} ${data.staff.lastname}`
                        );
                    } else {
                        $("#view-staff-name").text("Unassigned");
                    }

                    // Update branch info
                    if (data.branch) {
                        $("#view-branch-name").text(data.branch.branch_name);
                    } else {
                        $("#view-branch-name").text("N/A");
                    }

                    // Update payment info
                    $("#view-price").text(
                        data.price
                            ? "₱" + parseFloat(data.price).toLocaleString()
                            : "-"
                    );
                    $("#view-payment").text(
                        data.payment
                            ? "₱" + parseFloat(data.payment).toLocaleString()
                            : "-"
                    );
                    $("#view-payment-status").text(
                        data.status === "Paid" ? "Paid" : "Pending"
                    );

                    // Update coupon info
                    $("#view-coupon").text(data.coupon_code || "None");

                    // Calculate points used
                    let pointsUsed = 0;
                    if (
                        data.useReward == "1" &&
                        data.patient &&
                        data.patient.points
                    ) {
                        const maxPoints = Math.min(
                            data.patient.points,
                            data.price
                        );
                        pointsUsed =
                            data.price - data.payment > 0
                                ? data.price - data.payment
                                : 0;
                        pointsUsed = Math.min(pointsUsed, maxPoints);
                    }

                    $("#view-points-used").text(pointsUsed || "0");

                    // Update remarks
                    $("#view-remarks").text(
                        data.remarks || "No remarks added."
                    );

                    // Load notes (implementation depends on your backend API)
                    loadBookingNotes(bookingId);
                } else {
                    $("#view-booking-title").text("Booking not found");
                }
            },
            error: function (xhr) {
                console.error("Error loading booking details:", xhr);
                $("#view-booking-title").text("Error loading booking");

                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Failed to load booking details. Please try again.",
                });
            },
        });
    }

    // Function to load booking notes - REMOVED AS PER CLIENT REQUEST
    /*
    function loadBookingNotes(bookingId) {
        if (!bookingId) {
            console.error("No booking ID provided for notes");
            return;
        }

        // Show loading state
        $("#view-quick-notes").html(
            '<p class="text-muted fst-italic">Loading notes...</p>'
        );

        // Fetch notes via AJAX
        $.ajax({
            url: `/api/booking-notes/${bookingId}`,
            method: "GET",
            success: function (data) {
                if (data && data.notes && data.notes.length > 0) {
                    // Format and display notes
                    let notesHtml = "";
                    data.notes.forEach((note) => {
                        const noteDate = moment(note.created_at).format("MMM D, YYYY [at] h:mm A");
                        notesHtml += `
                            <div class="note-item mb-3">
                                <div class="d-flex justify-content-between">
                                    <span class="fw-semibold">${note.created_by}</span>
                                    <small class="text-muted">${noteDate}</small>
                                </div>
                                <p class="mb-0">${note.note_text}</p>
                            </div>
                        `;
                    });
                    $("#view-quick-notes").html(notesHtml);
                } else {
                    $("#view-quick-notes").html(
                        '<p class="text-muted fst-italic">No notes found</p>'
                    );
                }
            },
            error: function () {
                $("#view-quick-notes").html(
                    '<p class="text-danger">Failed to load notes</p>'
                );
            },
        });
    }
    */

    // Function to load booking data into the edit form
    function loadBookingToEdit(bookingId) {
        // Make AJAX request to get booking details (same endpoint as view)
        $.ajax({
            url: `/api/bookings/${bookingId}`,
            method: "GET",
            success: function (data) {
                if (data) {
                    // Set booking ID
                    $("#update_booking_id").val(data.booking_id);

                    // Set status
                    $("#update_status").val(data.status).trigger("change");

                    // Set dates
                    $("#update_start_date").val(data.start_date);
                    $("#update_end_date").val(data.end_date);

                    // Set staff and branch
                    $("#update_staff_id").val(data.id).trigger("change");
                    $("#update_branch_code").val(data.branch_code);

                    // Set patient
                    $("#update_patient_id")
                        .val(data.patient_id)
                        .trigger("change");

                    // Clear previous selections
                    $("#editServiceId").val(null).trigger("change");
                    $("#editPackageId").val(null).trigger("change");

                    // Handle service or package selection
                    let serviceIds = [];
                    let packageIds = [];

                    // Using relationships
                    if (data.services && data.services.length > 0) {
                        serviceIds = data.services.map(
                            (service) => service.service_id
                        );
                    }

                    if (data.packages && data.packages.length > 0) {
                        packageIds = data.packages.map((pkg) => pkg.package_id);
                    }

                    // Set booking type and related fields
                    if (packageIds && packageIds.length > 0) {
                        // Package booking
                        $('input[name="edit_booking_type"][value="package"]')
                            .prop("checked", true)
                            .trigger("change");
                        $("#editPackageId").val(packageIds).trigger("change");
                    } else {
                        // Service booking
                        $('input[name="edit_booking_type"][value="service"]')
                            .prop("checked", true)
                            .trigger("change");
                        $("#editServiceId").val(serviceIds).trigger("change");
                    }

                    // Set use reward points
                    if (data.useReward == 1) {
                        $("#updateUseRewardYes").prop("checked", true);
                    } else {
                        $("#updateUseRewardNo").prop("checked", true);
                    }

                    // Set remarks
                    $("#update_remarks").val(data.remarks);

                    // Open the edit sidebar
                    const updateEventSidebar = new bootstrap.Offcanvas(
                        document.getElementById("updateEventSidebar")
                    );
                    updateEventSidebar.show();
                }
            },
            error: function (xhr) {
                console.error("Error loading booking for edit:", xhr);

                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Failed to load booking details for editing. Please try again.",
                });
            },
        });
    }

    // Function to cancel a booking
    function cancelBooking(bookingId) {
        Swal.fire({
            title: "Cancel Booking?",
            text: "Are you sure you want to cancel this booking? This action cannot be undone.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Yes, cancel it!",
            cancelButtonText: "No, keep it",
        }).then((result) => {
            if (result.isConfirmed) {
                // Make AJAX request to cancel the booking
                $.ajax({
                    url: "/booking/delete",
                    method: "DELETE",
                    data: {
                        booking_id: bookingId,
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function (response) {
                        // Success handling
                        Swal.fire({
                            icon: "success",
                            title: "Booking Cancelled",
                            text: "The booking has been cancelled successfully.",
                            timer: 1500,
                            showConfirmButton: false,
                        }).then(() => {
                            // Close the sidebar
                            const viewSidebar = bootstrap.Offcanvas.getInstance(
                                document.getElementById(
                                    "viewBookingDetailsSidebar"
                                )
                            );
                            viewSidebar.hide();

                            // Reload page to reflect the change
                            window.location.reload();
                        });
                    },
                    error: function (xhr) {
                        console.error("Error cancelling booking:", xhr);

                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Failed to cancel booking. Please try again.",
                        });
                    },
                });
            }
        });
    }

    // Helper function to get status badge class
    function getStatusClass(status) {
        switch (status) {
            case "Pending":
                return "bg-label-warning";
            case "Paid":
                return "bg-label-info";
            case "Completed":
                return "bg-label-success";
            case "Cancelled":
                return "bg-label-danger";
            case "No Show":
                return "bg-label-secondary";
            default:
                return "bg-label-primary";
        }
    }
});
