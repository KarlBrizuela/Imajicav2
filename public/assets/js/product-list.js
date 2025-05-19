document.addEventListener("DOMContentLoaded",function(e){
  config.colors.borderColor,config.colors.bodyBg,config.colors.headingColor;
  let t=document.querySelector(".datatables-products"),
  r={
    0:{title:"Out of Stock", class:"bg-label-danger"},
    1:{title:"In Stock", class:"bg-label-success"}
  };

t&&new DataTable(t,{
  ajax: {
    url: '/api/products',
    method: 'GET',
    dataSrc: function(json) {
      // Store categories globally for filter
      window.productCategories = json.categories;
      return json.data;
    }
  },
  columns:[
    {data:"id"},
    {data:"id", orderable:!1, render:DataTable.render.select()},
    {data:"name"},
    {data:"category"},
    {data:"supplier_id"},
    {data:"base_price"},
    {data:"quantity"},
    {data:"restock_point"},
    {data:"manufacturing_date"},
    {data:"expiry_date"},
    {data:"removal_date"},
    {data:"actions"}
  ],
  columnDefs:[
    {
      className:"control",
      searchable:!1,
      orderable:!1,
      responsivePriority:2,
      targets:0,
      render:function(e,t,n,a){return""}
    },
    {
      targets:1,
      orderable:!1,
      searchable:!1,
      responsivePriority:3,
      checkboxes:!0,
      checkboxes:{selectAllRender:'<input type="checkbox" class="form-check-input">'},
      render:function(){return'<input type="checkbox" class="dt-checkboxes form-check-input">'}
    },
    {
      targets: 2,
      responsivePriority: 1,
      render: function(e, t, n, a) {
        return `
          <div class="d-flex justify-content-start align-items-center product-name">
            <div class="avatar-wrapper">
              <div class="avatar avatar me-2 me-sm-4 rounded-2 bg-label-secondary">
                ${n.product_image ? 
                  `<img src="/${n.product_image}" class="rounded">` :
                  `<span class="avatar-initial rounded-2 bg-label-${['success','danger','warning','info','dark','primary','secondary'][Math.floor(6*Math.random())]}">${(n.name.match(/\b\w/g)||[]).slice(0,2).join("").toUpperCase()}</span>`
                }
              </div>
            </div>
            <div class="d-flex flex-column">
              <h6 class="text-nowrap mb-0">${n.name}</h6>
              <small class="text-truncate d-none d-sm-block">SKU: ${n.sku}</small>
            </div>
          </div>
        `;
      }
    },
    {
      targets:3,
      responsivePriority:5,
      render:function(e,t,n,a){
        return n.category;
      }
    },
    {
      targets:4, 
      render:function(e,t,n,a){
        return n.suppler_id;
      }
    },
    {
      targets:5,
      render:function(e,t,n,a){
        return `<span>₱${parseFloat(n.base_price).toFixed(2)}</span>`;
      }
    },
    {
      targets:6,
      render:function(e,t,n,a){
        return n.quantity;
      }
    },
    {
      targets: -1,
      title: "Actions", 
      searchable: false,
      orderable: false,
      render: function(data, type, row) {
        return `
          <div class='d-flex gap-2'>
              <a href="/edit-product/${row.sku}" class='btn btn-info btn-sm'><i class='ti tabler-edit me-1'></i>Edit</a>
              <button class='btn btn-danger btn-sm delete-product' data-id="${row.sku}"><i class='ti tabler-trash me-1'></i>Delete</button>
          </div>
        `;
      }
    }
  ],
  select:{
    style:"multi",
    selector:"td:nth-child(2)"
  },
  order:[2,"asc"],
  displayLength:7,
  layout:{
    topStart:{
      rowClass:"card-header d-flex border-top rounded-0 flex-wrap py-0 flex-column flex-md-row align-items-start",
      features:[{search:{className:"me-5 ms-n4 pe-5 mb-n6 mb-md-0",placeholder:"Search Product",text:"_INPUT_"}}]
    },
    topEnd:{
      rowClass:"row m-3 my-0 justify-content-between",
      features:[{pageLength:{menu:[7,10,25,50,100],text:"_MENU_"},buttons:[{extend:"collection",
        className:"btn btn-label-secondary dropdown-toggle me-4",text:'<span class="d-flex align-items-center gap-1"><i class="icon-base ti tabler-upload icon-xs"></i> <span class="d-none d-sm-inline-block">Export</span></span>',buttons:[{extend:"print",text:'<span class="d-flex align-items-center"><i class="icon-base ti tabler-printer me-1"></i>Print</span>',className:"dropdown-item",exportOptions:{columns:[3,4,5,6,7],format:{body:function(e,t,n){if(e.length<=0||!(-1<e.indexOf("<")))return e;{e=(new DOMParser).parseFromString(e,"text/html");let t="";var a=e.querySelectorAll(".product-name");return 0<a.length?a.forEach(e=>{e=e.querySelector(".fw-medium")?.textContent||e.querySelector(".d-block")?.textContent||e.textContent;t+=e.trim()+" "}):t=e.body.textContent||e.body.innerText,t.trim()}}}},customize:function(e){e.document.body.style.color=config.colors.headingColor,e.document.body.style.borderColor=config.colors.borderColor,e.document.body.style.backgroundColor=config.colors.bodyBg;e=e.document.body.querySelector("table");e.classList.add("compact"),e.style.color="inherit",e.style.borderColor="inherit",e.style.backgroundColor="inherit"}},{extend:"csv",text:'<span class="d-flex align-items-center"><i class="icon-base ti tabler-file me-1"></i>Csv</span>',className:"dropdown-item",exportOptions:{columns:[3,4,5,6,7],format:{body:function(e,t,n){if(e.length<=0)return e;e=(new DOMParser).parseFromString(e,"text/html");let a="";var o=e.querySelectorAll(".product-name");return 0<o.length?o.forEach(e=>{e=e.querySelector(".fw-medium")?.textContent||e.querySelector(".d-block")?.textContent||e.textContent;a+=e.trim()+" "}):a=e.body.textContent||e.body.innerText,a.trim()}}}},{extend:"excel",text:'<span class="d-flex align-items-center"><i class="icon-base ti tabler-upload me-1"></i>Excel</span>',className:"dropdown-item",exportOptions:{columns:[3,4,5,6,7],format:{body:function(e,t,n){if(e.length<=0)return e;e=(new DOMParser).parseFromString(e,"text/html");let a="";var o=e.querySelectorAll(".product-name");return 0<o.length?o.forEach(e=>{e=e.querySelector(".fw-medium")?.textContent||e.querySelector(".d-block")?.textContent||e.textContent;a+=e.trim()+" "}):a=e.body.textContent||e.body.innerText,a.trim()}}}},{extend:"pdf",text:'<span class="d-flex align-items-center"><i class="icon-base ti tabler-file-text me-1"></i>Pdf</span>',className:"dropdown-item",exportOptions:{columns:[3,4,5,6,7],format:{body:function(e,t,n){if(e.length<=0)return e;e=(new DOMParser).parseFromString(e,"text/html");let a="";var o=e.querySelectorAll(".product-name");return 0<o.length?o.forEach(e=>{e=e.querySelector(".fw-medium")?.textContent||e.querySelector(".d-block")?.textContent||e.textContent;a+=e.trim()+" "}):a=e.body.textContent||e.body.innerText,a.trim()}}}},{extend:"copy",text:'<i class="icon-base ti tabler-copy me-1"></i>Copy',className:"dropdown-item",exportOptions:{columns:[3,4,5,6,7],format:{body:function(e,t,n){if(e.length<=0)return e;e=(new DOMParser).parseFromString(e,"text/html");let a="";var o=e.querySelectorAll(".product-name");return 0<o.length?o.forEach(e=>{e=e.querySelector(".fw-medium")?.textContent||e.querySelector(".d-block")?.textContent||e.textContent;a+=e.trim()+" "}):a=e.body.textContent||e.body.innerText,a.trim()}}}}]},{text:'<i class="icon-base ti tabler-plus me-0 me-sm-1 icon-16px"></i><span class="d-none d-sm-inline-block">Add Product</span>',className:"add-new btn btn-primary",action:function(){window.location.href="/add-product"}}]}]},
    bottomStart:{rowClass:"row mx-3 justify-content-between",features:["info"]},
    bottomEnd:"paging"
  },
  language:{
    paginate:{
      next:'<i class="icon-base ti tabler-chevron-right scaleX-n1-rtl icon-18px"></i>',
      previous:'<i class="icon-base ti tabler-chevron-left scaleX-n1-rtl icon-18px"></i>',
      first:'<i class="icon-base ti tabler-chevrons-left scaleX-n1-rtl icon-18px"></i>',
      last:'<i class="icon-base ti tabler-chevrons-right scaleX-n1-rtl icon-18px"></i>'
    }
  },
  responsive:{
    details:{
      display:DataTable.Responsive.display.modal({header:function(e){return"Details of "+e.data().name}}),
      type:"column",
      renderer:function(e,t,n){
        var a,o,s,n=n.map(function(e){
          return""!==e.title?`<tr data-dt-row="${e.rowIndex}" data-dt-column="${e.columnIndex}">
            <td>${e.title}:</td>
            <td>${e.data}</td>
          </tr>`:""
        }).join("");
        return!!n&&((a=document.createElement("div")).classList.add("table-responsive"),o=document.createElement("table"),a.appendChild(o),o.classList.add("table"),(s=document.createElement("tbody")).innerHTML=n,o.appendChild(s),a)
      }
    }
  },
  initComplete:function(){
    var e=this.api();
    e.columns(3).every(function(){
      let t=this,n=document.createElement("select");
      n.id="ProductCategory";
      n.className="form-select text-capitalize";
      n.innerHTML='<option value="">Category</option>';
      document.querySelector(".product_category").appendChild(n);
      
      // Use categories from API response
      if(window.productCategories) {
        window.productCategories.forEach(category => {
          let option = document.createElement("option");
          option.value = category;
          option.textContent = category;
          n.appendChild(option);
        });
      }

      n.addEventListener("change",function(){
        var e=n.value ? n.value : "";
        t.search(e,true,false).draw()
      });
    }),
    
    e.columns(4).every(function(){
      let t=this,n=document.createElement("select");
      n.id="ProductStock",n.className="form-select text-capitalize",n.innerHTML='<option value="">Stock</option>';
      document.querySelector(".product_stock").appendChild(n);
      
      // Add all possible stock options rather than just the ones in use
      Object.values(r).forEach(stock => {
        let option = document.createElement("option");
        option.value = stock.title;
        option.textContent = stock.title.replace('_', ' ');
        n.appendChild(option);
      });

      n.addEventListener("change",function(){
        var e=n.value?`^${n.value}$`:"";
        t.search(e,!0,!1).draw()
      });
    })
  }
}),
setTimeout(()=>{
  [{selector:".dt-buttons .btn",classToRemove:"btn-secondary"},
  {selector:".dt-buttons.btn-group",classToAdd:"mb-md-0 mb-6"},
  {selector:".dt-search .form-control",classToRemove:"form-control-sm",classToAdd:"ms-0"},
  {selector:".dt-search",classToAdd:"mb-0 mb-md-6"},
  {selector:".dt-length .form-select",classToRemove:"form-select-sm"},
  {selector:".dt-layout-end",classToAdd:"gap-md-2 gap-0 mt-0"},
  {selector:".dt-layout-start",classToAdd:"mt-0"},
  {selector:".dt-layout-table",classToRemove:"row mt-2"},
  {selector:".dt-layout-full",classToRemove:"col-md col-12",classToAdd:"table-responsive"}]
  .forEach(({selector:e,classToRemove:n,classToAdd:a})=>{
    document.querySelectorAll(e).forEach(t=>{
      n&&n.split(" ").forEach(e=>t.classList.remove(e)),
      a&&a.split(" ").forEach(e=>t.classList.add(e))
    })
  })
},100);

// Replace the old delete handler with this new one
$(document).on('click', '.delete-product', function() {
    try {
        const sku = $(this).data('id');
        const productName = $(this).closest('tr').find('.product-name h6').text();
        
        if (!sku) {
            throw new Error("Product SKU not found in data attributes");
        }
        
        // Set the SKU in the hidden delete form
        $('#delete_product_sku').val(sku);
        
        // Show delete confirmation
        Swal.fire({
            customClass: {
                confirmButton: 'btn btn-danger me-3', 
                cancelButton: 'btn btn-secondary'
            },
            buttonsStyling: false,
            title: 'Confirm Delete',
            html: `Are you sure you want to delete <strong>${productName}</strong>?<br>This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the delete form
                $('#deleteProductForm').submit();
                
                // Show success message
                Swal.fire({
                    customClass: {
                        confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false,
                    title: 'Deleted!',
                    text: 'Product has been deleted successfully.',
                    icon: 'success',
                    timer: 2000
                }).then(() => {
                    // Reload the page after successful deletion
                    window.location.reload();
                });
            }
        });
    } catch (e) {
        console.error("Error in delete button click handler:", e);
        Swal.fire({
            customClass: {
                confirmButton: 'btn btn-primary'
            },
            buttonsStyling: false,
            icon: 'error',
            title: 'Delete Error',
            html: 'An error occurred while processing your delete request:<br>' + e.message,
            showConfirmButton: true
        });
    }
});

// Add edit form submission handler
$(document).on('submit', '#editProductForm', function(e) {
    e.preventDefault();
    const form = $(this);
    const barCode = form.data('bar-code');
    const formData = new FormData(this);
    
    // Show loading state
    Swal.fire({
        title: 'Updating Product',
        html: 'Please wait while we update the product...',
        allowOutsideClick: false,
        showConfirmButton: false,
        willOpen: () => {
            Swal.showLoading();
        }
    });

    // Submit form via AJAX
    $.ajax({
        url: `/products/${barCode}/update`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Product updated successfully!',
                showConfirmButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/product-list';
                }
            });
        },
        error: function(xhr) {
            let errorMessage = 'An error occurred while updating the product.';
            if (xhr.responseJSON?.message) {
                errorMessage = xhr.responseJSON.message;
            }
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: errorMessage
            });
        }
    });
});

// Update form submission handler
$(document).on('click', '#updateProductBtn', function(e) {
    e.preventDefault();
    const form = $('#editProductForm');
    const sku = form.data('sku');
    const formData = new FormData(form[0]);
    
    // Show loading state
    Swal.fire({
        title: 'Updating Product',
        html: 'Please wait while we update the product...',
        allowOutsideClick: false,
        showConfirmButton: false,
        willOpen: () => {
            Swal.showLoading();
        }
    });

    // Submit form via AJAX
    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Product updated successfully!',
                showConfirmButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/product-list';
                }
            });
        },
        error: function(xhr) {
            let errorMessage = 'An error occurred while updating the product.';
            if (xhr.responseJSON?.message) {
                errorMessage = xhr.responseJSON.message;
            }
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: errorMessage
            });
        }
    });
});
});