document.addEventListener("DOMContentLoaded", function () {
    let k = isRtl ? "rtl" : "ltr";
    {
        var w = document.getElementById("calendar");
        let t = document.querySelector(".app-calendar-sidebar");
        var x = document.getElementById("addEventSidebar");
        let n = document.querySelector(".app-overlay");
        let a = document.querySelector(".offcanvas-title");
        var T = document.querySelector(".btn-toggle-sidebar");
        let l = document.getElementById("addEventBtn");
        let i = document.querySelector(".btn-delete-event");
        let r = document.querySelector(".btn-cancel");
        let d = document.getElementById("eventTitle");
        let o = document.getElementById("eventStartDate");
        let s = document.getElementById("eventEndDate");
        let c = document.getElementById("eventURL");
        let u = document.getElementById("eventLocation");
        let v = document.getElementById("eventDescription");
        let m = document.querySelector(".allDay-switch");
        let p = document.querySelector(".select-all");
        var D;
        var P;
        var M = Array.from(document.querySelectorAll(".input-filter"));
        var A = document.querySelector(".inline-calendar");
        let g = {
            Pending: "warning", // Yellow for pending
            Paid: "primary", // Blue for paid
            Completed: "success", // Green for completed
            Cancelled: "danger", // Red for cancelled
            "No Show": "secondary", // Gray for no-show
        };
        let f = $("#eventLabel");
        let h = $("#eventGuests");
        let b = events;
        let y = false;
        let E = null;
        let e = null;
        let L = new bootstrap.Offcanvas(x);
        function q(e) {
            if (e.id) {
                return (
                    "<span class='badge badge-dot bg-" +
                    $(e.element).data("label") +
                    " me-2'> </span>" +
                    e.text
                );
            } else {
                return e.text;
            }
        }
        function B(e) {
            if (e.id) {
                return `
    <div class='d-flex flex-wrap align-items-center'>
      <div class='avatar avatar-xs me-2'>
        <img src='${assetsPath}img/avatars/${$(e.element).data("avatar")}'
          alt='avatar' class='rounded-circle' />
      </div>
      ${e.text}
    </div>`;
            } else {
                return e.text;
            }
        }
        function I() {
            var e = document.querySelector(".fc-sidebarToggle-button");
            e.classList.remove("fc-button-primary");
            for (
                e.classList.add("d-lg-none", "d-inline-block", "ps-0");
                e.firstChild;

            ) {
                e.firstChild.remove();
            }
            e.setAttribute("data-bs-toggle", "sidebar");
            e.setAttribute("data-overlay", "");
            e.setAttribute("data-target", "#app-calendar-sidebar");
            e.insertAdjacentHTML(
                "beforeend",
                '<i class="icon-base ti tabler-menu-2 icon-lg text-heading"></i>'
            );
        }
        if (f.length) {
            f.wrap('<div class="position-relative"></div>').select2({
                placeholder: "Select value",
                dropdownParent: f.parent(),
                templateResult: q,
                templateSelection: q,
                minimumResultsForSearch: -1,
                escapeMarkup: function (e) {
                    return e;
                },
            });
        }
        if (h.length) {
            h.wrap('<div class="position-relative"></div>').select2({
                placeholder: "Select value",
                dropdownParent: h.parent(),
                closeOnSelect: false,
                templateResult: B,
                templateSelection: B,
                escapeMarkup: function (e) {
                    return e;
                },
            });
        }
        if (o) {
            D = o.flatpickr({
                monthSelectorType: "static",
                static: true,
                enableTime: true,
                altFormat: "Y-m-dTH:i:S",
                onReady: function (e, t, n) {
                    if (n.isMobile) {
                        n.mobileInput.setAttribute("step", null);
                    }
                },
            });
        }
        if (s) {
            P = s.flatpickr({
                monthSelectorType: "static",
                static: true,
                enableTime: true,
                altFormat: "Y-m-dTH:i:S",
                onReady: function (e, t, n) {
                    if (n.isMobile) {
                        n.mobileInput.setAttribute("step", null);
                    }
                },
            });
        }
        if (A) {
            e = A.flatpickr({
                monthSelectorType: "static",
                static: true,
                inline: true,
            });
        }
        let S = new Calendar(w, {
            initialView: "dayGridMonth",
            events: {
                url: "/get-calendar-bookings",
                method: "GET",
                failure: function () {
                    console.error("Failed to load events");
                },
                extraParams: function () {
                    // Get all checked status filters
                    const checkedFilters = Array.from(
                        document.querySelectorAll(".input-filter:checked")
                    ).map((checkbox) => checkbox.dataset.value);

                    // If no filters are checked, show all events
                    if (checkedFilters.length === 0) {
                        return { status: "all" };
                    }

                    return { status: checkedFilters.join(",") };
                },
            },
            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                meridiem: true,
                hour12: true
            },
            displayEventTime: true,
            displayEventEnd: true,
            eventDisplay: "block",
            plugins: [
                dayGridPlugin,
                interactionPlugin,
                listPlugin,
                timegridPlugin,
            ],
            editable: true,
            dragScroll: true,
            dayMaxEvents: 3,
            eventResizableFromStart: true,
            eventDidMount: function (info) {
                // Get status from event or default to "Pending"
                const status = info.event.extendedProps.status || "Pending";

                // Apply appropriate status color
                const statusColor = g[status] || "warning";
                $(info.el).addClass("bg-label-" + statusColor);

                // Create tooltip content with booking details
                const tooltipTitle =
                    info.event.title || "Booking #" + info.event.id;
                const tooltipContent = `
                    <div class="calendar-tooltip">
                        <div class="tooltip-title fw-semibold">${tooltipTitle}</div>
                        <div class="tooltip-datetime">
                            <i class="ti ti-calendar-event me-1"></i> ${moment(info.event.start).format("MMM D, YYYY")}
                            <br>
                            <i class="ti ti-clock me-1"></i> ${moment(info.event.start).format("hh:mm A")} - ${moment(info.event.end).format("hh:mm A")}
                        </div>
                        <div class="tooltip-status mt-1">
                            <span class="badge bg-label-${statusColor}">${status}</span>
                        </div>
                    </div>
                `;

                // Add tooltip
                $(info.el).tooltip({
                    title: tooltipContent,
                    placement: "top",
                    trigger: "hover",
                    container: "body",
                    html: true,
                });

                // Add booking ID as a data attribute for easy access
                if (info.event.id) {
                    $(info.el).attr("data-booking-id", info.event.id);
                }
            },
            customButtons: { sidebarToggle: { text: "Sidebar" } },
            headerToolbar: {
                start: "sidebarToggle, prev,next, title",
                end: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
            },
            direction: k,
            initialDate: new Date(),
            navLinks: true,
            eventClassNames: function ({ event: e }) {
                return ["bg-label-" + g[e._def.extendedProps.status]];
            },

            eventClick: function (e) {
                e = e;
                if ((E = e.event).url) {
                    e.jsEvent.preventDefault();
                    window.open(E.url, "_blank");
                }

                // Show update form
                const updateEventSidebar =
                    document.getElementById("updateEventSidebar");
                const bsOffcanvas = new bootstrap.Offcanvas(updateEventSidebar);
                bsOffcanvas.show();

                // Set the booking ID first
                document.getElementById("update_booking_id").value = E.id;

                document.getElementById("update_service_id").value =
                    E.extendedProps.service_id;
                document.getElementById("update_status").value =
                    E.extendedProps.status;
                document.getElementById("update_start_date").value = moment(
                    E.start
                ).format("YYYY-MM-DD HH:mm");
                document.getElementById("update_end_date").value = moment(
                    E.extendedProps.end_date
                ).format("YYYY-MM-DD HH:mm");
                document.getElementById("update_patient_id").value =
                    E.extendedProps.patient_id;
                document.getElementById("update_remarks").value =
                    E.extendedProps.remarks;
                document.getElementById("update_staff_id").value =
                    E.extendedProps.staff_id;
                document.getElementById("updateUseRewardYes").checked =
                    E.extendedProps.use_reward_points === "1" ||
                    E.extendedProps.useReward === true;
                document.getElementById("updateUseRewardNo").checked =
                    E.extendedProps.use_reward_points === "0" ||
                    E.extendedProps.useReward === false;
            },
            datesSet: function () {
                I();
            },
            viewDidMount: function () {
                I();
            },
        });

        function F() {
            s.value = "";
            c.value = "";
            o.value = "";
            d.value = "";
            u.value = "";
            m.checked = false;
            h.val("").trigger("change");
            v.value = "";
        }
        S.render();
        I();
        A = document.getElementById("eventForm");
        FormValidation.formValidation(A, {
            fields: {
                eventTitle: {
                    validators: {
                        notEmpty: { message: "Please enter event title " },
                    },
                },
                eventStartDate: {
                    validators: {
                        notEmpty: { message: "Please enter start date " },
                    },
                },
                eventEndDate: {
                    validators: {
                        notEmpty: { message: "Please enter end date " },
                    },
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    eleValidClass: "",
                    rowSelector: function (e, t) {
                        return ".form-control-validation";
                    },
                }),
                submitButton: new FormValidation.plugins.SubmitButton(),
                autoFocus: new FormValidation.plugins.AutoFocus(),
            },
        })
            .on("core.form.valid", function () {
                y = true;
            })
            .on("core.form.invalid", function () {
                y = false;
            });
        if (T) {
            T.addEventListener("click", (e) => {
                r.classList.remove("d-none");
            });
        }
        l.addEventListener("click", (e) => {
            e.preventDefault();
            const form = document.querySelector("#addEventSidebar form");
            const formData = new FormData(form);

            if (l.classList.contains("btn-update-event")) {
                // Update existing event
                fetch(form.action, {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.status) {
                            Swal.fire({
                                icon: "success",
                                title: "Success!",
                                text: "Booking updated successfully",
                                timer: 1500,
                                showConfirmButton: false,
                            }).then(() => {
                                // Refresh events and hide sidebar
                                S.refetchEvents();
                                L.hide();
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: data.message || "Error updating booking",
                            });
                        }
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Failed to update booking",
                        });
                    });
            } else {
                // Add new event
                fetch(form.action, {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.status) {
                            // Show success message
                            Swal.fire({
                                icon: "success",
                                title: "Success!",
                                text: "Booking created successfully",
                                timer: 1500,
                                showConfirmButton: false,
                            }).then(() => {
                                // Refresh events and hide sidebar
                                S.refetchEvents();
                                L.hide();
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: data.message || "Error creating booking",
                            });
                        }
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Failed to create booking",
                        });
                    });
            }
        });

        // Handle form submissions
        document
            .getElementById("addBookingForm")
            .addEventListener("submit", function (e) {
                e.preventDefault();
                const formData = new FormData(this);

                fetch(this.action, {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.status) {
                            S.refetchEvents();
                            bootstrap.Offcanvas.getInstance(
                                document.getElementById("addEventSidebar")
                            ).hide();
                        } else {
                            alert(data.message || "Error creating booking");
                        }
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        alert("Error creating booking");
                    });
            });

        document
            .getElementById("updateBookingForm")
            .addEventListener("submit", function (e) {
                e.preventDefault();
                const formData = new FormData(this);

                fetch(this.action, {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.status) {
                            S.refetchEvents();
                            bootstrap.Offcanvas.getInstance(
                                document.getElementById("updateEventSidebar")
                            ).hide();
                        } else {
                            alert(data.message || "Error updating booking");
                        }
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        alert("Error updating booking");
                    });
            });

        i.addEventListener("click", (e) => {
            var t = parseInt(E.id);
            b = b.filter(function (e) {
                return e.id != t;
            });
            S.refetchEvents();
            L.hide();
        });
        x.addEventListener("hidden.bs.offcanvas", function () {
            F();
        });
        T.addEventListener("click", (e) => {
            if (a) {
                a.innerHTML = "Create New Booking";
            }
            l.innerHTML = "Add";
            l.classList.remove("btn-update-event");
            l.classList.add("btn-add-event");
            i.classList.add("d-none");
            t.classList.remove("show");
            n.classList.remove("show");
        });
        if (p) {
            p.addEventListener("click", (e) => {
                if (e.currentTarget.checked) {
                    document
                        .querySelectorAll(".input-filter")
                        .forEach((e) => (e.checked = 1));
                } else {
                    document
                        .querySelectorAll(".input-filter")
                        .forEach((e) => (e.checked = 0));
                }
                S.refetchEvents();
            });
        }
        if (M) {
            M.forEach((e) => {
                e.addEventListener("change", () => {
                    // Update select all checkbox state
                    const allFilters =
                        document.querySelectorAll(".input-filter");
                    const checkedFilters = document.querySelectorAll(
                        ".input-filter:checked"
                    );

                    if (p) {
                        p.checked = checkedFilters.length === allFilters.length;
                    }

                    // Refresh calendar events with new filters
                    S.refetchEvents();
                });
            });
        }
        if (p) {
            p.addEventListener("change", (e) => {
                const isChecked = e.target.checked;
                document
                    .querySelectorAll(".input-filter")
                    .forEach((checkbox) => {
                        checkbox.checked = isChecked;
                    });
                S.refetchEvents();
            });
        }
        e.config.onChange.push(function (e) {
            S.changeView(S.view.type, moment(e[0]).format("YYYY-MM-DD"));
            I();
            t.classList.remove("show");
            n.classList.remove("show");
        });
    }
});
