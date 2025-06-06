document.addEventListener("DOMContentLoaded", function(e) {
  var t = config.colors.cardColor,
      o = config.colors.textMuted,
      a = (config.colors.bodyColor, config.colors.headingColor),
      s = config.colors.borderColor,
      n = config.fontFamily;
  const r = {
      series1: "#24B364",
      series2: "#53D28C",
      series3: "#7EDDA9",
      series4: "#A9E9C5"
  };
  var i = document.querySelector("#expensesChart"),
      l = {
          chart: {
              height: 170,
              sparkline: {
                  enabled: !0
              },
              parentHeightOffset: 0,
              type: "radialBar"
          },
          colors: [config.colors.warning],
          series: [78],
          plotOptions: {
              radialBar: {
                  offsetY: 0,
                  startAngle: -90,
                  endAngle: 90,
                  hollow: {
                      size: "65%"
                  },
                  track: {
                      strokeWidth: "45%",
                      background: s
                  },
                  dataLabels: {
                      name: {
                          show: !1
                      },
                      value: {
                          fontSize: "24px",
                          color: a,
                          fontWeight: 500,
                          offsetY: -5
                      }
                  }
              }
          },
          grid: {
              show: !1,
              padding: {
                  bottom: 5
              }
          },
          stroke: {
              lineCap: "round"
          },
          labels: ["Progress"],
          responsive: [{
              breakpoint: 1442,
              options: {
                  chart: {
                      height: 120
                  },
                  plotOptions: {
                      radialBar: {
                          dataLabels: {
                              value: {
                                  fontSize: "18px"
                              }
                          },
                          hollow: {
                              size: "60%"
                          }
                      }
                  }
              }
          }, {
              breakpoint: 1025,
              options: {
                  chart: {
                      height: 136
                  },
                  plotOptions: {
                      radialBar: {
                          hollow: {
                              size: "65%"
                          },
                          dataLabels: {
                              value: {
                                  fontSize: "18px"
                              }
                          }
                      }
                  }
              }
          }, {
              breakpoint: 769,
              options: {
                  chart: {
                      height: 120
                  },
                  plotOptions: {
                      radialBar: {
                          hollow: {
                              size: "55%"
                          }
                      }
                  }
              }
          }, {
              breakpoint: 426,
              options: {
                  chart: {
                      height: 145
                  },
                  plotOptions: {
                      radialBar: {
                          hollow: {
                              size: "65%"
                          }
                      }
                  },
                  dataLabels: {
                      value: {
                          offsetY: 0
                      }
                  }
              }
          }, {
              breakpoint: 376,
              options: {
                  chart: {
                      height: 105
                  },
                  plotOptions: {
                      radialBar: {
                          hollow: {
                              size: "60%"
                          }
                      }
                  }
              }
          }]
      },
      i = (null !== i && new ApexCharts(i, l).render(), document.querySelector("#profitLastMonth")),
      l = {
          chart: {
              height: 110,
              type: "line",
              parentHeightOffset: 0,
              toolbar: {
                  show: !1
              }
          },
          grid: {
              borderColor: s,
              strokeDashArray: 6,
              xaxis: {
                  lines: {
                      show: !0,
                      colors: "#000"
                  }
              },
              yaxis: {
                  lines: {
                      show: !1
                  }
              },
              padding: {
                  top: -18,
                  left: -4,
                  right: 7,
                  bottom: -10
              }
          },
          colors: [config.colors.info],
          stroke: {
              width: 2
          },
          series: [{
              data: [0, 40, 15, 65, 40, 90]
          }],
          tooltip: {
              shared: !1,
              intersect: !0,
              x: {
                  show: !1
              }
          },
          tooltip: {
              enabled: !1
          },
          xaxis: {
              labels: {
                  show: !1
              },
              axisTicks: {
                  show: !1
              },
              axisBorder: {
                  show: !1
              }
          },
          yaxis: {
              labels: {
                  show: !1
              }
          },
          markers: {
              size: 3.5,
              fillColor: config.colors.info,
              strokeColors: "transparent",
              strokeWidth: 3.2,
              offsetX: -1,
              discrete: [{
                  seriesIndex: 0,
                  dataPointIndex: 5,
                  fillColor: t,
                  strokeColor: config.colors.info,
                  size: 4.5,
                  shape: "circle"
              }],
              hover: {
                  size: 5.5
              }
          },
          responsive: [{
              breakpoint: 768,
              options: {
                  chart: {
                      height: 110
                  }
              }
          }]
      },
      i = (null !== i && new ApexCharts(i, l).render(), document.querySelector("#generatedLeadsChart")),
      l = {
          chart: {
              height: 125,
              width: 120,
              parentHeightOffset: 0,
              type: "donut"
          },
          labels: ["Electronic", "Sports", "Decor", "Fashion"],
          series: [45, 58, 30, 50],
          colors: [r.series1, r.series2, r.series3, r.series4],
          stroke: {
              width: 0
          },
          dataLabels: {
              enabled: !1,
              formatter: function(e, t) {
                  return parseInt(e) + "%"
              }
          },
          legend: {
              show: !1
          },
          tooltip: {
              theme: !1
          },
          grid: {
              padding: {
                  top: 15,
                  right: -20,
                  left: -20
              }
          },
          states: {
              hover: {
                  filter: {
                      type: "none"
                  }
              }
          },
          plotOptions: {
              pie: {
                  donut: {
                      size: "70%",
                      labels: {
                          show: !0,
                          value: {
                              fontSize: "1.5rem",
                              fontFamily: "fontFamily",
                              color: a,
                              fontWeight: 500,
                              offsetY: -15,
                              formatter: function(e) {
                                  return parseInt(e) + "%"
                              }
                          },
                          name: {
                              offsetY: 20,
                              fontFamily: "fontFamily"
                          },
                          total: {
                              show: !0,
                              showAlways: !0,
                              color: config.colors.success,
                              fontSize: ".8125rem",
                              label: "Total",
                              fontFamily: "fontFamily",
                              formatter: function(e) {
                                  return "184"
                              }
                          }
                      }
                  }
              }
          },
          responsive: [{
              breakpoint: 1025,
              options: {
                  chart: {
                      height: 172,
                      width: 160
                  }
              }
          }, {
              breakpoint: 769,
              options: {
                  chart: {
                      height: 178
                  }
              }
          }, {
              breakpoint: 426,
              options: {
                  chart: {
                      height: 147
                  }
              }
          }]
      },
      i = (null !== i && new ApexCharts(i, l).render(), document.querySelector("#totalRevenueChart")),
      l = {
          series: [{
              name: "Earning",
              data: [270, 210, 180, 200, 250, 280, 250, 270, 150]
          }, {
              name: "Expense",
              data: [-140, -160, -180, -150, -100, -60, -80, -100, -180]
          }],
          chart: {
              height: 413,
              parentHeightOffset: 0,
              stacked: !0,
              type: "bar",
              toolbar: {
                  show: !1
              }
          },
          tooltip: {
              enabled: !1
          },
          plotOptions: {
              bar: {
                  horizontal: !1,
                  columnWidth: "40%",
                  borderRadius: 7,
                  startingShape: "rounded",
                  endingShape: "rounded",
                  borderRadiusApplication: "around",
                  borderRadiusWhenStacked: "last"
              }
          },
          colors: [config.colors.primary, config.colors.warning],
          dataLabels: {
              enabled: !1
          },
          stroke: {
              curve: "smooth",
              width: 6,
              lineCap: "round",
              colors: [t]
          },
          legend: {
              show: !0,
              horizontalAlign: "right",
              position: "top",
              fontSize: "13px",
              fontFamily: n,
              markers: {
                  size: 6,
                  offsetY: 0,
                  shape: "circle",
                  strokeWidth: 0
              },
              labels: {
                  colors: a
              },
              itemMargin: {
                  horizontal: 10,
                  vertical: 2
              }
          },
          grid: {
              show: !1,
              padding: {
                  bottom: -8,
                  right: 0,
                  top: 20
              }
          },
          xaxis: {
              categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
              labels: {
                  style: {
                      fontSize: "13px",
                      colors: o,
                      fontFamily: n
                  }
              },
              axisTicks: {
                  show: !1
              },
              axisBorder: {
                  show: !1
              }
          },
          yaxis: {
              labels: {
                  offsetX: -16,
                  style: {
                      fontSize: "13px",
                      colors: o,
                      fontFamily: n
                  }
              },
              min: -200,
              max: 300,
              tickAmount: 5
          },
          responsive: [{
              breakpoint: 1700,
              options: {
                  plotOptions: {
                      bar: {
                          columnWidth: "43%"
                      }
                  }
              }
          }, {
              breakpoint: 1441,
              options: {
                  plotOptions: {
                      bar: {
                          columnWidth: "50%"
                      }
                  }
              }
          }, {
              breakpoint: 1300,
              options: {
                  plotOptions: {
                      bar: {
                          columnWidth: "40%"
                      }
                  }
              }
          }, {
              breakpoint: 991,
              options: {
                  plotOptions: {
                      bar: {
                          columnWidth: "38%"
                      }
                  }
              }
          }, {
              breakpoint: 850,
              options: {
                  plotOptions: {
                      bar: {
                          columnWidth: "50%"
                      }
                  }
              }
          }, {
              breakpoint: 449,
              options: {
                  plotOptions: {
                      bar: {
                          columnWidth: "73%"
                      }
                  },
                  xaxis: {
                      labels: {
                          offsetY: -5
                      }
                  },
                  legend: {
                      show: !0,
                      horizontalAlign: "right",
                      position: "top",
                      itemMargin: {
                          horizontal: 10,
                          vertical: 0
                      }
                  }
              }
          }, {
              breakpoint: 394,
              options: {
                  plotOptions: {
                      bar: {
                          columnWidth: "88%"
                      }
                  },
                  legend: {
                      show: !0,
                      horizontalAlign: "center",
                      position: "bottom",
                      markers: {
                          offsetX: -3,
                          offsetY: 0
                      },
                      itemMargin: {
                          horizontal: 10,
                          vertical: 5
                      }
                  }
              }
          }],
          states: {
              hover: {
                  filter: {
                      type: "none"
                  }
              },
              active: {
                  filter: {
                      type: "none"
                  }
              }
          }
      },
      t = (null !== i && new ApexCharts(i, l).render(), document.querySelector("#budgetChart")),
      a = {
          chart: {
              height: 100,
              toolbar: {
                  show: !1
              },
              zoom: {
                  enabled: !1
              },
              type: "line"
          },
          series: [{
              name: "Last Month",
              data: [20, 10, 30, 16, 24, 5, 40, 23, 28, 5, 30]
          }, {
              name: "This Month",
              data: [50, 40, 60, 46, 54, 35, 70, 53, 58, 35, 60]
          }],
          stroke: {
              curve: "smooth",
              dashArray: [5, 0],
              width: [1, 2]
          },
          legend: {
              show: !1
          },
          colors: [s, config.colors.primary],
          grid: {
              show: !1,
              borderColor: s,
              padding: {
                  top: -30,
                  bottom: -15,
                  left: 25
              }
          },
          markers: {
              size: 0
          },
          xaxis: {
              labels: {
                  show: !1
              },
              axisTicks: {
                  show: !1
              },
              axisBorder: {
                  show: !1
              }
          },
          yaxis: {
              show: !1
          },
          tooltip: {
              enabled: !1
          }
      },
      n = (null !== t && new ApexCharts(t, a).render(), document.querySelector("#reportBarChart")),
      i = {
          chart: {
              height: 230,
              type: "bar",
              toolbar: {
                  show: !1
              }
          },
          plotOptions: {
              bar: {
                  barHeight: "60%",
                  columnWidth: "60%",
                  startingShape: "rounded",
                  endingShape: "rounded",
                  borderRadius: 4,
                  distributed: !0
              }
          },
          grid: {
              show: !1,
              padding: {
                  top: -20,
                  bottom: 0,
                  left: -10,
                  right: -10
              }
          },
          colors: [config.colors_label.primary, config.colors_label.primary, config.colors_label.primary, config.colors_label.primary, config.colors.primary, config.colors_label.primary, config.colors_label.primary],
          dataLabels: {
              enabled: !1
          },
          series: [{
              data: [40, 95, 60, 45, 90, 50, 75]
          }],
          legend: {
              show: !1
          },
          xaxis: {
              categories: ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
              axisBorder: {
                  show: !1
              },
              axisTicks: {
                  show: !1
              },
              labels: {
                  style: {
                      colors: o,
                      fontSize: "13px"
                  }
              }
          },
          yaxis: {
              labels: {
                  show: !1
              }
          },
          responsive: [{
              breakpoint: 1025,
              options: {
                  chart: {
                      height: 190
                  }
              }
          }, {
              breakpoint: 769,
              options: {
                  chart: {
                      height: 250
                  }
              }
          }]
      },
      l = (null !== n && new ApexCharts(n, i).render(), document.querySelector(".datatable-invoice"));
  if (l) {
      let o = new DataTable(l, {
          ajax: assetsPath + "json/invoice-list.json",
          columns: [{
              data: "invoice_id"
          }, {
              data: "invoice_id",
              orderable: !1,
              render: DataTable.render.select()
          }, {
              data: "invoice_id"
          }, {
              data: "invoice_status"
          }, {
              data: "total"
          }, {
              data: "issued_date"
          }, {
              data: "invoice_status"
          }, {
              data: "action"
          }],
          columnDefs: [{
              className: "control",
              responsivePriority: 2,
              searchable: !1,
              targets: 0,
              render: function() {
                  return ""
              }
          }, {
              targets: 1,
              orderable: !1,
              searchable: !1,
              responsivePriority: 4,
              render: function() {
                  return '<input type="checkbox" class="dt-checkboxes form-check-input">'
              }
          }, {
              targets: 2,
              render: function(e, t, o) {
                  return `<a href="app-invoice-preview.html">#${o.invoice_id}</a>`
              }
          }, {
              targets: 3,
              render: function(e, t, o) {
                  var a = o.invoice_status;
                  return `
            <span class="d-inline-block" data-bs-toggle="tooltip" data-bs-html="true" title="<span>${`
            ${a}<br>
            <span class="fw-medium">Balance:</span> ${o.balance}<br>
            <span class="fw-medium">Due Date:</span> ${o.due_date}
          `.replace(/"/g,"&quot;")}">
              ${{Sent:'<span class="badge p-1_5 rounded-pill bg-label-secondary"><i class="icon-base icon-16px ti tabler-circle-check"></i></span>',Draft:'<span class="badge p-1_5 rounded-pill bg-label-primary"><i class="icon-base icon-16px ti tabler-device-floppy"></i></span>',"Past Due":'<span class="badge p-1_5 rounded-pill bg-label-danger"><i class="icon-base icon-16px ti tabler-info-circle"></i></span>',"Partial Payment":'<span class="badge p-1_5 rounded-pill bg-label-success"><i class="icon-base icon-16px ti tabler-circle-half-2"></i></span>',Paid:'<span class="badge p-1_5 rounded-pill bg-label-warning"><i class="icon-base icon-16px ti tabler-chart-pie"></i></span>',Downloaded:'<span class="badge p-1_5 rounded-pill bg-label-info"><i class="icon-base icon-16px ti tabler-arrow-down-circle"></i></span>'}[a]||""}
</span>
            </span>
          `
              }
          }, {
              targets: 4,
              render: function(e, t, o) {
                  o = o.total;
                  return `<span class="d-none">${o}</span>$` + o
              }
          }, {
              targets: 5,
              render: function(e, t, o) {
                  o = new Date(o.due_date);
                  return `
            <span class="d-none">${o.toISOString().slice(0,10).replace(/-/g,"")}</span>
            ${o.toLocaleDateString("en-GB",{day:"2-digit",month:"short",year:"numeric"})}
          `
              }
          }, {
              targets: 6,
              visible: !1
          }, {
              targets: -1,
              title: "Actions",
              searchable: !1,
              orderable: !1,
              render: function() {
                  return '<div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="btn btn-icon delete-record" data-bs-placement="top" title="Delete"><i class="icon-base ti tabler-trash icon-md"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="btn btn-icon" data-bs-placement="top" title="Preview Invoice"><i class="icon-base ti tabler-eye icon-md"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow btn-icon p-0" data-bs-toggle="dropdown"><i class="icon-base ti tabler-dots-vertical icon-md"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a></div></div>'
              }
          }],
          select: {
              style: "multi",
              selector: "td:nth-child(2)"
          },
          order: [
              [2, "desc"]
          ],
          displayLength: 6,
          layout: {
              topStart: {
                  rowClass: "row m-3 justify-content-between",
                  features: [{
                      pageLength: {
                          menu: [6, 10, 25, 50, 100],
                          text: "Show_MENU_"
                      },
                      buttons: [{
                          text: '<i class="icon-base icon-16px ti tabler-plus me-md-2"></i><span class="d-md-inline-block d-none">Create Invoice</span>',
                          className: "btn btn-primary",
                          action: function() {
                              window.location = "app-invoice-add.html"
                          }
                      }]
                  }]
              },
              topEnd: {
                  rowClass: "row mx-3 justify-content-between",
                  features: [{
                      search: {
                          placeholder: "Search Invoice",
                          text: "_INPUT_"
                      }
                  }]
              },
              bottomStart: {
                  rowClass: "row mx-3 justify-content-between",
                  features: ["info"]
              },
              bottomEnd: "paging"
          },
          language: {
              paginate: {
                  next: '<i class="icon-base ti tabler-chevron-right scaleX-n1-rtl icon-18px"></i>',
                  previous: '<i class="icon-base ti tabler-chevron-left scaleX-n1-rtl icon-18px"></i>',
                  first: '<i class="icon-base ti tabler-chevrons-left scaleX-n1-rtl icon-18px"></i>',
                  last: '<i class="icon-base ti tabler-chevrons-right scaleX-n1-rtl icon-18px"></i>'
              }
          },
          responsive: {
              details: {
                  display: DataTable.Responsive.display.modal({
                      header: function(e) {
                          return "Details of " + e.data().client_name
                      }
                  }),
                  type: "column",
                  renderer: function(e, t, o) {
                      var a, s, n, o = o.map(function(e) {
                          return "" !== e.title ? `<tr data-dt-row="${e.rowIndex}" data-dt-column="${e.columnIndex}">
                    <td>${e.title}:</td>
                    <td>${e.data}</td>
                  </tr>` : ""
                      }).join("");
                      return !!o && ((a = document.createElement("div")).classList.add("table-responsive"), s = document.createElement("table"), a.appendChild(s), s.classList.add("table"), (n = document.createElement("tbody")).innerHTML = o, s.appendChild(n), a)
                  }
              }
          },
          initComplete: function() {
              let e = document.querySelector(".invoice_status");
              var t;
              !e && ((e = document.createElement("div")).className = "invoice_status", t = document.querySelector(".dt-layout-end")) && t.appendChild(e), this.api().columns(6).every(function() {
                  let t = this,
                      o = document.createElement("select");
                  o.id = "UserRole", o.className = "form-select", o.innerHTML = '<option value=""> Invoice Status </option>', e.appendChild(o), o.addEventListener("change", function() {
                      var e = o.value ? `^${o.value}$` : "";
                      t.search(e, !0, !1).draw()
                  }), t.data().unique().sort().each(function(e) {
                      var t = document.createElement("option");
                      t.value = e, t.className = "text-capitalize", t.textContent = e, o.appendChild(t)
                  })
              })
          }
      });

      function c(e) {
          let t = document.querySelector(".dtr-expanded");
          (t = e ? e.target.parentElement.closest("tr") : t) && o.row(t).remove().draw()
      }

      function d() {
          var e = document.querySelector(".invoice-list-table");
          let t = document.querySelector(".dtr-bs-modal");
          e && e.classList.contains("collapsed") ? t && t.addEventListener("click", function(e) {
              e.target.parentElement.classList.contains("delete-record") && (c(), e = t.querySelector(".btn-close")) && e.click()
          }) : (e = e ? .querySelector("tbody")) && e.addEventListener("click", function(e) {
              e.target.parentElement.classList.contains("delete-record") && c(e)
          })
      }
      d(), document.addEventListener("show.bs.modal", function(e) {
          e.target.classList.contains("dtr-bs-modal") && d()
      }), document.addEventListener("hide.bs.modal", function(e) {
          e.target.classList.contains("dtr-bs-modal") && d()
      }), o.on("draw", function() {
          document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(e => {
              new bootstrap.Tooltip(e, {
                  boundary: document.body
              })
          })
      })
  }
  setTimeout(() => {
      [{
          selector: ".dt-buttons .btn",
          classToRemove: "btn-secondary"
      }, {
          selector: ".dt-buttons",
          classToRemove: "btn-secondary"
      }, {
          selector: ".dt-buttons.btn-group",
          classToAdd: "mb-0"
      }, {
          selector: ".dt-search .form-control",
          classToRemove: "form-control-sm"
      }, {
          selector: ".dt-length .form-select",
          classToRemove: "form-select-sm"
      }, {
          selector: ".dt-length",
          classToAdd: "me-0 mb-md-6 mb-6"
      }, {
          selector: ".dt-layout-end",
          classToRemove: "justify-content-between ms-auto",
          classToAdd: "justify-content-md-between justify-content-center d-flex flex-wrap gap-4 mb-sm-0 mb-4 mt-0"
      }, {
          selector: ".dt-layout-start",
          classToRemove: "d-md-flex me-auto justify-content-between",
          classToAdd: "col-12 col-md-6 d-flex justify-content-center justify-content-md-start gap-2"
      }, {
          selector: ".dt-layout-table",
          classToRemove: "row mt-2"
      }, {
          selector: ".dt-layout-full",
          classToRemove: "col-md col-12",
          classToAdd: "table-responsive"
      }].forEach(({
          selector: e,
          classToRemove: o,
          classToAdd: a
      }) => {
          document.querySelectorAll(e).forEach(t => {
              o && o.split(" ").forEach(e => t.classList.remove(e)), a && a.split(" ").forEach(e => t.classList.add(e))
          })
      })
  }, 100)
});