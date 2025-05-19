document.addEventListener("DOMContentLoaded",function(e){
    
    document.addEventListener("click", function (event) {
        const selectedItem = event.target.closest(".dropdown-item.status");

        if (selectedItem) {
            event.preventDefault();

            const newStatus = selectedItem.getAttribute("data-status");
            const rowId = selectedItem.getAttribute("data-row-id");

            // Update UI
            const badge = selectedItem.closest("div").querySelector("span.badge");
            if (badge) {
                badge.innerText = o[newStatus].title;
                badge.className = `badge px-2 ${o[newStatus].class} text-capitalized`;
            }

            // If status is "Ordered", ask for confirmation
            if (newStatus === "Ordered") {
                const confirmInvoice = confirm("Do you want to generate an invoice?");
                if (confirmInvoice) {
                    // Generate invoice from invoice-add.   html
                    generateInvoice(rowId); // Call the function to generate the invoice
                }
            }
        }
    });
    // Function to simulate invoice generation
    function generateInvoice(rowId) {
        alert(`Invoice generated for Order ID: ${rowId}`);
        
    
        // Example: Send request to backend for invoice generation
        // fetch(`/generate-invoice/${rowId}`, { method: "POST" })
        // .then(response => response.json())
        // .then(data => alert(`Invoice ID: ${data.invoiceId}`));
    }
    
    let s,a,r,n=(s=config.colors.borderColor,a=config.colors.bodyBg,r=config.colors.headingColor,document.querySelector(".datatables-order")),o={1:{title:"Ordered",class:"bg-label-warning"},2:{title:"Delivered",class:"bg-label-success"},3:{title:"Out for Delivery",class:"bg-label-primary"},4:{title:"Ready to Pickup",class:"bg-label-info"}},l={1:{title:"Paid",class:"text-success"},2:{title:"Pending",class:"text-warning"},3:{title:"Failed",class:"text-danger"},4:{title:"Cancelled",class:"text-secondary"}};if(n){let t=new DataTable(n,{ajax:assetsPath+"/",columns:[{data:"id"},{data:"id",orderable:!1,render:DataTable.render.select()},{data:"order"},{data:"date"},{data:"customer"},{data:"payment"},{data:"status"},{data:"method"},{data:"id"}],columnDefs:[{className:"control",searchable:!1,orderable:!1,responsivePriority:2,targets:0,render:function(e,t,s,a){return""}},{targets:1,orderable:!1,searchable:!1,responsivePriority:3,checkboxes:!0,checkboxes:{selectAllRender:'<input type="checkbox" class="form-check-input">'},render:function(){return'<input type="checkbox" class="dt-checkboxes form-check-input">'}},{targets:2,render:function(e,t,s,a){return'<a href="/order-details"><span>#'+s.order+"</span></a>"}},{targets:3,render:function(e,t,s,a){var r=new Date(s.date),s=s.time.substring(0,5);return`<span class="text-nowrap">${r.toLocaleDateString("en-US",{month:"short",day:"numeric",year:"numeric"})}, ${s}</span>`}},{targets:4,responsivePriority:1,render:function(e,t,s,a){var r=s.customer,n=s.email,s=s.avatar;let o;return`
              <div class="d-flex justify-content-start align-items-center order-name text-nowrap">
                <div class="avatar-wrapper">
                  <div class="avatar avatar-sm me-3">
                    ${o=s?`<img src="${assetsPath}img/avatars/${s}" alt="Avatar" class="rounded-circle">`:`<span class="avatar-initial rounded-circle bg-label-${["success","danger","warning","info","dark","primary","secondary"][Math.floor(6*Math.random())]}">${(r.match(/\b\w/g)||[]).slice(0,2).join("").toUpperCase()}</span>`}
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="m-0"><a href="pages-profile-user.html" class="text-heading">${r}</a></h6>
                  <small>${n}</small>
                </div>
              </div>`}},{ //for payment
                targets: 5,
                render: function (e, t, s, a) {
                    const payment = s.payment;
                    const paymentObj = l[payment];
            
                    return paymentObj ? `
                        <h6 class="mb-0 align-items-center d-flex w-px-100 ${paymentObj.class}">
                            <i class="icon-base ti tabler-circle-filled icon-12px me-1"></i>${paymentObj.title}
                        </h6>
                    ` : e;
                }
            }
                ,{
                    targets: -3,
                    render: function (e, t, s, a) {
                        const status = s.status;
                        const statusObj = o[status];
                
                        return statusObj ? `
                        <div>
                            <button class="btn p-0 cursor-pointer" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="badge px-2 ${statusObj.class} text-capitalized">
                                    ${statusObj.title}
                                </span>
                            </button>
                            <ul class="dropdown-menu">
                                ${Object.entries(o).map(([key, value]) => `
                                    <li><a class="dropdown-item status cursor-pointer"
                                          data-status="${key}"
                                          data-row-id="${s.id}">
                                        <span class="badge px-2 ${value.class} text-capitalized">
                                            ${value.title}
                                        </span>
                                    </a></li>
                                `).join('')}
                            </ul>
                        </div>` : e;
                    }
                }
                
        ,{targets:-2,render:function(e,t,s,a){var r=s.method;let n="paypal"===r?"@gmail.com":s.method_number;return`
              <div class="d-flex align-items-center text-nowrap">
                <img src="${assetsPath}img/icons/payments/${r}.png" alt="${r}" width="29">
                <span><i class="icon-base ti tabler-dots mt-1 me-1"></i>${n}</span>
              </div>`}},{targets:-1,title:"Actions",searchable:!1,orderable:!1,render:function(e,t,s,a){return`
              <div class='d-flex gap-2'>
                                    <button class='btn btn-success'>View</button>
                                    <button class='btn btn-info'>Edit</button>
                                    <button class='btn btn-danger'>Delete</button>
                                </div>
              </div>`}}],
              
                  layout:{
                      topStart: {
                          rowClass: "card-header d-flex border-top rounded-0 flex-wrap py-0 flex-column flex-md-row align-items-center",
                          features: [{
                            pageLength: { menu: [7, 10, 25, 50, 100] },
                            
                          }]
                      },
                      topEnd: {
                          rowClass: "row m-3 my-0 justify-content-between",
                          features: [{
                            search: {
                                className: "me-5 ms-n4 pe-5 mb-n6 mb-md-0",
                                placeholder: "Search Order"
                            },
                              buttons: [
                                  
                                 
                               {
                                  text: '<span class="d-flex align-items-center gap-1"><i class="ti tabler-plus me-1"></i>Add Order</span>',
                                  className: "btn btn-primary",
                                  action: function() {
                                      window.location.href = "/add-order";
                                  }
                              }]
                          }]
                      }
                  },
                  language:{paginate:{next:'<i class="icon-base ti tabler-chevron-right scaleX-n1-rtl icon-18px"></i>',previous:'<i class="icon-base ti tabler-chevron-left scaleX-n1-rtl icon-18px"></i>',first:'<i class="icon-base ti tabler-chevrons-left scaleX-n1-rtl icon-18px"></i>',last:'<i class="icon-base ti tabler-chevrons-right scaleX-n1-rtl icon-18px"></i>'}},
                           
                            responsive:{details:{display:DataTable.Responsive.display.modal({header:function(e)
                                {return"Details of "+e.data().customer}}),type:"column",renderer:function(e,t,s){var a,r,n,s=s.map(function(e){return""!==e.title?`<tr data-dt-row="${e.rowIndex}" data-dt-column="${e.columnIndex}">
                      
                      
                      <td>${e.title}:</td>
                      <td>${e.data}</td>
                    </tr>`:""}).join("");return!!s&&((a=document.createElement("div")).classList.add("table-responsive"),r=document.createElement("table"),a.appendChild(r),r.classList.add("table"),(n=document.createElement("tbody")).innerHTML=s,r.appendChild(n),a)}}}});document.addEventListener("click",function(e){e.target.classList.contains("delete-record")&&(t.row(e.target.closest("tr")).remove().draw(),e=document.querySelector(".dtr-bs-modal"))&&e.classList.contains("show")&&bootstrap.Modal.getInstance(e)?.hide()})

   
        t.on('click', '.payment', function(e) {
            e.preventDefault();
            const paymentId = this.dataset.paymentId;
            const rowId = this.dataset.rowId;
            const row = t.row($(this).closest('tr'));
            const rowData = row.data();
            
            // Update the payment status
            rowData.payment = parseInt(paymentId);
            
            // Redraw the row with new data
            row.data(rowData).draw();
        });
    }

    setTimeout(() => {
        [{selector:".dt-buttons .btn",classToRemove:"btn-primary",classToAdd:"btn-label-primary"},{selector:".dt-search .form-control",classToRemove:"form-control-sm",classToAdd:"ms-0"},{selector:".dt-length .form-select",classToRemove:"form-select-sm"},{selector:".dt-layout-table",classToRemove:"row mt-2"},{selector:".dt-layout-end",classToAdd:"gap-md-2 gap-0"},{selector:".dt-layout-full",classToRemove:"col-md col-12",classToAdd:"table-responsive"}].forEach(({selector:e,classToRemove:s,classToAdd:a})=>{document.querySelectorAll(e).forEach(t=>{s&&s.split(" ").forEach(e=>t.classList.remove(e)),a&&a.split(" ").forEach(e=>t.classList.add(e))})})},100)});

