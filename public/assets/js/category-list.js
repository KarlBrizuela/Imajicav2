let commentEditor=document.querySelector(".comment-editor");commentEditor&&new Quill(commentEditor,{modules:{toolbar:".comment-toolbar"},placeholder:"Write a Comment...",theme:"snow"}),
document.addEventListener("DOMContentLoaded",function(e){var t=document.querySelector(".datatables-category-list"),a=$(".select2");a.length&&a.each(function(){var e=$(this);e.wrap('<div class="position-relative"></div>').select2({dropdownParent:e.parent(),placeholder:e.data("placeholder")})}),t&&new DataTable(t,{ajax:{url:"/api/categories",method:"GET",dataSrc:""},
  columns:[
    {data:"category_id"},
    {
      data: null,
      render: function(data, type, row) {
        return `
          <div class="d-flex align-items-center">
            <div class="avatar-wrapper me-3 rounded-2 bg-label-secondary">
              <div class="avatar">
                ${row.categoryImage 
                  ? `<img src="/storage/categories/${row.categoryImage}" alt="Category-${row.category_id}" class="rounded" style="width: 40px; height: 40px; object-fit: cover;" onerror="this.src='/assets/img/default-category.png'">` 
                  : `<span class="avatar-initial rounded-2 bg-label-${["success","danger","warning","info","dark","primary","secondary"][Math.floor(6*Math.random())]}">${(row.categoryTitle.match(/\b\w/g)||[]).slice(0,2).join("").toUpperCase()}</span>`
                }
              </div>
            </div>
            <div class="d-flex flex-column">
              <h6 class="text-body text-truncate mb-0">${row.categoryTitle}</h6>
              <small class="text-truncate text-muted">${row.description || 'No description'}</small>
            </div>
          </div>`;
      }
    },
    {data:"slug"},
    {data:"description"},
    {data:"category_id"}
  ],columnDefs:[{className:"control",searchable:!1,orderable:!1,responsivePriority:1,targets:0,render:function(e,t,a,o){return""}},{targets:2,
      responsivePriority:2,render:function(e,t,a,o)
      {const imageUrl=a.categoryImage?`/storage/categories/${a.categoryImage}`:null;return`
              <div class="d-flex align-items-center">
                <div class="avatar-wrapper me-3 rounded-2 bg-label-secondary">
                  <div class="avatar">${imageUrl?`<img src="${imageUrl}" alt="Category-${a.category_id}" class="rounded" onerror="this.onerror=null; this.src='/assets/img/default-category.png'">`:`<span class="avatar-initial rounded-2 bg-label-${["success","danger","warning","info","dark","primary","secondary"][Math.floor(6*Math.random())]}">${(a.categoryTitle.match(/\b\w/g)||[]).slice(0,2).join("").toUpperCase()}</span>`}</div>
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <span class="text-heading text-wrap fw-medium">${a.categoryTitle}</span>
                  <span class="text-truncate mb-0 d-none d-sm-block"><small>${a.description||""}</small></span>
                </div>
              </div>`}},{targets:3,responsivePriority:3,render:function(e,t,a,o)
                {return'<div class="text-lg-end">'+"</div>"}},
                {targets:4,orderable:!1,render:function(e,t,a,o){return"<div class='mb-0 text-sm-end'>"+"</div"}},{targets:-1,title:"Actions",searchable:!1,orderable:!1,render:function(e,t,a,o){return`
              <div class='d-flex gap-2'>
                                    <button class='btn btn-success btn-sm' onclick="viewCategory(${a.category_id})">View</button>
                                    <button class='btn btn-info btn-sm' onclick="editCategory(${a.category_id})">Edit</button>
                                    <button class='btn btn-danger btn-sm' onclick="deleteCategory(${a.category_id})">Delete</button>
                                </div>
            `}}],select:{style:"multi",selector:"td:nth-child(2)"},order:[2,"desc"],displayLength:7,layout:{topStart:{rowClass:"row m-3 my-0 justify-content-between",features:[{search:{placeholder:"Search Category",text:"_INPUT_"}}]},topEnd:{rowClass:"row m-3 my-0 justify-content-between",features:{pageLength:{menu:[7,10,25,50,100],text:"_MENU_"},
            buttons:[{
              text:'<i class="icon-base ti tabler-plus icon-16px me-0 me-sm-2"></i><span class="d-none d-sm-inline-block">Add Category</span>',
              className:"add-new btn btn-primary",
              attr:{"data-bs-toggle":"offcanvas","data-bs-target":"#offcanvasEcommerceCategoryList"}}]}},
              bottomStart:{rowClass:"row mx-3 justify-content-between",features:["info"]},bottomEnd:"paging"},language:{paginate:{next:'<i class="icon-base ti tabler-chevron-right scaleX-n1-rtl icon-18px"></i>',previous:'<i class="icon-base ti tabler-chevron-left scaleX-n1-rtl icon-18px"></i>',first:'<i class="icon-base ti tabler-chevrons-left scaleX-n1-rtl icon-18px"></i>',last:'<i class="icon-base ti tabler-chevrons-right scaleX-n1-rtl icon-18px"></i>'}},responsive:{details:{display:DataTable.Responsive.display.modal({header:function(e){return"Details of "+e.data().categories}}),type:"column",renderer:function(e,t,a){var o,s,r,a=a.map(function(e){return""!==e.title?`<tr data-dt-row="${e.rowIndex}" data-dt-column="${e.columnIndex}">
                      <td>${e.title}:</td>
                      <td>${e.data}</td>
                    </tr>`:""}).join("");return!!a&&((o=document.createElement("div")).classList.add("table-responsive"),s=document.createElement("table"),o.appendChild(s),s.classList.add("table"),(r=document.createElement("tbody")).innerHTML=a,s.appendChild(r),o)}}}}),setTimeout(()=>{[{selector:".dt-buttons .btn",classToRemove:"btn-secondary"},{selector:".dt-buttons.btn-group",classToAdd:"mb-md-0 mb-6"},{selector:".dt-search .form-control",classToRemove:"form-control-sm",classToAdd:"ms-0"},{selector:".dt-search",classToAdd:"mb-0 mb-md-6"},{selector:".dt-length .form-select",classToRemove:"form-select-sm"},{selector:".dt-layout-table",classToRemove:"row mt-2",classToAdd:"border-top"},{selector:".dt-layout-end",classToAdd:"gap-md-2 gap-0 mt-0"},{selector:".dt-layout-start",classToAdd:"mt-0"},{selector:".dt-layout-full",classToRemove:"col-md col-12",classToAdd:"table-responsive"}].forEach(({selector:e,classToRemove:a,classToAdd:o})=>{document.querySelectorAll(e).forEach(t=>{a&&a.split(" ").forEach(e=>t.classList.remove(e)),o&&o.split(" ").forEach(e=>t.classList.add(e))})})},100)}),(()=>{var e=document.getElementById("eCommerceCategoryListForm");FormValidation.formValidation(e,{fields:{categoryTitle:{validators:{notEmpty:{message:"Please enter category title"}}},slug:{validators:{notEmpty:{message:"Please enter slug"}}}},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap5:new FormValidation.plugins.Bootstrap5({eleValidClass:"is-valid",rowSelector:function(e,t){return".form-control-validation"}}),submitButton:new FormValidation.plugins.SubmitButton,autoFocus:new FormValidation.plugins.AutoFocus}})})();

// Form handling and validation
(() => {
  const form = document.getElementById('eCommerceCategoryListForm');
  const titleInput = document.getElementById('categoryTitle');
  const slugInput = document.getElementById('slug');
  const imageInput = document.getElementById('categoryImage');
  const imagePreview = document.querySelector('#imagePreview img');

  // Handle image preview
  imageInput?.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        imagePreview.src = e.target.result;
        imagePreview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    }
  });

  // Generate slug from title
  titleInput?.addEventListener('input', function(e) {
    const title = e.target.value;
    const slug = title
      .toLowerCase()
      .replace(/[^a-z0-9-]/g, '-')
      .replace(/-+/g, '-')
      .replace(/^-|-$/g, '');
    slugInput.value = slug;
  });

  // Form validation
  FormValidation.formValidation(form, {
    fields: {
      categoryTitle: {
        validators: {
          notEmpty: {
            message: 'Please enter category title'
          }
        }
      },
      slug: {
        validators: {
          notEmpty: {
            message: 'Please enter slug'
          }
        }
      },
      description: {
        validators: {
          stringLength: {
            max: 500,
            message: 'Description must not exceed 500 characters'
          }
        }
      },
      categoryImage: {
        validators: {
          file: {
            extension: 'jpg,jpeg,png',
            type: 'image/jpeg,image/png',
            message: 'Please choose a valid image file (jpg, jpeg, png)'
          }
        }
      }
    },
    plugins: {
      trigger: new FormValidation.plugins.Trigger(),
      bootstrap5: new FormValidation.plugins.Bootstrap5({
        eleValidClass: 'is-valid',
        rowSelector: '.mb-3'
      }),
      submitButton: new FormValidation.plugins.SubmitButton(),
      autoFocus: new FormValidation.plugins.AutoFocus()
    }
  });

  // Reset form when offcanvas is closed
  document.getElementById('offcanvasEcommerceCategoryListClose')?.addEventListener('click', () => {
    form.reset();
    imagePreview.style.display = 'none';
    imagePreview.src = '';
  });
})();

// Add these functions to handle category actions
function viewCategory(id) {
  fetch(`/api/categories/${id}`)
    .then(response => response.json())
    .then(data => {
      // Create a modal to show category details
      const modal = new bootstrap.Modal(document.getElementById('categoryDetailsModal'));
      document.getElementById('categoryDetailTitle').textContent = data.categoryTitle;
      document.getElementById('categoryDetailImage').src = data.categoryImage 
        ? `/storage/categories/${data.categoryImage}` 
        : '/assets/img/default-category.png';
      document.getElementById('categoryDetailSlug').textContent = data.slug;
      document.getElementById('categoryDetailDescription').textContent = data.description || 'No description available';
      modal.show();
    });
}

function editCategory(id) {
  fetch(`/api/categories/${id}`)
    .then(response => response.json())
    .then(data => {
      // Populate the edit form
      document.getElementById('categoryTitle').value = data.categoryTitle;
      document.getElementById('slug').value = data.slug;
      document.getElementById('description').value = data.description || '';
      if (data.categoryImage) {
        document.querySelector('#imagePreview img').src = `/storage/categories/${data.categoryImage}`;
        document.querySelector('#imagePreview img').style.display = 'block';
      }
      // Open the offcanvas
      const offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasEcommerceCategoryList'));
      offcanvas.show();
    });
}

function deleteCategory(id) {
  if (confirm('Are you sure you want to delete this category?')) {
    fetch(`/api/categories/${id}`, {
      method: 'DELETE',
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
      }
    })
    .then(response => response.json())
    .then(data => {
      // Refresh the DataTable
      document.querySelector('.datatables-category-list').DataTable().ajax.reload();
    });
  }
}

