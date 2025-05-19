 
<aside id="layout-menu" class="layout-menu menu-vertical menu">


    
    <br />
    <br />
    <div class="app-brand demo">
        <a href="/dashboard" class="app-brand-link">
            <img src="{{ asset('/logo/logo.png') }}" alt="Logo" width="100%" height="30%">
            

        </a>
    </div>
    <br />
    <br />
    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon icon-base ti tabler-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <!-- Apps & Pages -->
        <li class="menu-header small">
            <span class="menu-header-text" data-i18n="Main Menu">Main Menu</span>
        </li>

        <li class="menu-item {{ request()->is('booking') ? 'active' : '' }}">
            <a href="/booking" class="menu-link">
                <i class="menu-icon icon-base ti tabler-calendar"></i>
                <div data-i18n="Booking">Booking</div>
            </a>
        </li>


        <li class="menu-item {{ request()->is('new-services') || request()->is('services-list') || request()->is('new-package') || request()->is('packages-list') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-plus"></i>
                <div data-i18n="Services">Services</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('new-services') ? 'active' : '' }}">
                    <a href="/new-services" class="menu-link">
                        <div data-i18n="New Services">New Services</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('services-list') ? 'active' : '' }}">
                    <a href="/services-list" class="menu-link">
                        <div data-i18n="Services List">Services List</div>
                    </a>
                </li>
                
                <li class="menu-item {{ request()->is('new-package') ? 'active' : '' }}">
                    <a href="/new-package" class="menu-link">
                        <div data-i18n="New Package">New Package</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('packages-list') ? 'active' : '' }}">
                    <a href="/packages-list" class="menu-link">
                        <div data-i18n="Packages List">Packages List</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ request()->is('product-list') || request()->is('add-product') || request()->is('category-list') || request()->is('order-list') || request()->is('add-order') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-shopping-cart"></i>
                <div data-i18n="Product Management">Product Management</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('product-list') || request()->is('add-product') || request()->is('category-list') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="Products">Products</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->is('product-list') ? 'active' : '' }}">
                            <a href="/product-list" class="menu-link">
                                <div data-i18n="Product List">Product List</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('add-product') ? 'active' : '' }}">
                            <a href="/add-product" class="menu-link">
                                <div data-i18n="Add Product">Add Product</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('category-list') ? 'active' : '' }}">
                            <a href="/category-list" class="menu-link">
                                <div data-i18n="Category List">Category List</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('waste-list') ? 'active' : '' }}">
                            <a href="/waste-list" class="menu-link">
                                <div data-i18n="Waste List">Waste List</div>
                            </a>
                    </ul>
                </li>
                <li class="menu-item {{ request()->is('order-list') ||  request()->is('add-order') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="Order">Order</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->is('order-list') ? 'active' : '' }}">
                            <a href="/order-list" class="menu-link">
                                <div data-i18n="Order List">Order List</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('add-order') ? 'active' : '' }}">
                            <a href="/add-order" class="menu-link">
                                <div data-i18n="Add Order">Add Order</div>
                            </a>
                        </li>
                        
                    </ul>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ request()->is('new-supplier') || request()->is('supplier-list') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-truck"></i>
                <div data-i18n="Supplier">Supplier</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('new-supplier') ? 'active' : '' }}">
                    <a href="/new-supplier" class="menu-link">
                        <div data-i18n="New Supplier">New Supplier</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('supplier-list') ? 'active' : '' }}">
                    <a href="/supplier-list" class="menu-link">
                        <div data-i18n="Supplier List">Supplier List</div>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="menu-item {{ request()->is('new-coupon') || request()->is('coupon-list') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-layout-board"></i>
                <div data-i18n="Coupon">Coupon</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('new-coupon') ? 'active' : '' }}">
                    <a href="/new-coupon" class="menu-link">
                        <div data-i18n="New Coupon">New Coupon</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('coupon-list') ? 'active' : '' }}">
                    <a href="/coupon-list" class="menu-link">
                        <div data-i18n="Coupon List">Coupon List</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ request()->is('new-expenses') || request()->is('expenses-list') || request()->is('new category-expenses') || request()->is('categoryexpenses-list') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-layout-board"></i>
                <div data-i18n="Expenses">Expenses</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('new-expenses') ? 'active' : '' }}">
                    <a href="/new-expenses" class="menu-link">
                        <div data-i18n="New Expenses">New Expenses</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('expenses-list') ? 'active' : '' }}">
                    <a href="/expenses-list" class="menu-link">
                        <div data-i18n="Expenses List">Expenses List</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('new category-expenses') ? 'active' : '' }}">
                    <a href="/new category-expenses" class="menu-link">
                        <div data-i18n="New Category Expenses">New Category Expenses</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('categoryexpenses-list') ? 'active' : '' }}">
                    <a href="/categoryexpenses-list" class="menu-link">
                        <div data-i18n="Category Expenses List">Category Expenses List</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ request()->is('new-patient') || request()->is('patient-list') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-users"></i>
                <div data-i18n="Customer">Customer</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('new-patient') ? 'active' : '' }}">
                    <a href="/new-patient" class="menu-link">
                        <div data-i18n="New Customer">New Customer</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('patient-list') ? 'active' : '' }}">
                    <a href="/patient-list" class="menu-link">
                        <div data-i18n="Customer List">Customer List</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ request()->is('new-staff') || request()->is('staff-list') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-user"></i>
                <div data-i18n="Staff">Staff</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('new-staff') ? 'active' : '' }}">
                    <a href="/new-staff" class="menu-link">
                        <div data-i18n="New Staff">New Staff</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('staff-list') ? 'active' : '' }}">
                    <a href="/staff-list" class="menu-link">
                        <div data-i18n="Staff List">Staff List</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('position-list') ? 'active' : '' }}">
                    <a href="/position-list" class="menu-link">
                        <div data-i18n="Position List">Position List</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ request()->is('new-branch') || request()->is('branch-list') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-map"></i>
                <div data-i18n="Branch">Branch</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('new-branch') ? 'active' : '' }}">
                    <a href="/new-branch" class="menu-link">
                        <div data-i18n="New Branch">New Branch</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('branch-list') ? 'active' : '' }}">
                    <a href="/branch-list" class="menu-link">
                        <div data-i18n="Branch List">Branch List</div>
                    </a>
                </li>
            </ul>
        </li>

      

        <li class="menu-item {{ request()->is('department*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-building"></i>
                <div data-i18n="Department">Department</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('new-department') ? 'active' : '' }}">
                    <a href="{{ route('page.new-department') }}" class="menu-link">
                        <div data-i18n="New Department">New Department</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('department-list') ? 'active' : '' }}">
                    <a href="{{ route('page.department-list') }}" class="menu-link">
                        <div data-i18n="Department List">Department List</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{  request()->is('customer-report') || request()->is('service-product') || request()->is('employee-report') || request()->is('expenses-report') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-chart-pie "></i>
                <div data-i18n="Reports">Reports</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('service-product') ? 'active' : '' }}">
                    <a href="/service-product" class="menu-link">
                        <div data-i18n="Service/Product Report">Service/Product Report</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('employee-report') ? 'active' : '' }}">
                    <a href="/employee-report" class="menu-link">
                        <div data-i18n="Employee Report">Employee Report</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('expenses-report') ? 'active' : '' }}">
                    <a href="/expenses-report" class="menu-link">
                        <div data-i18n="Expenses Report">Expenses Report</div>
                    </a>
                </li>

                <li class="menu-item {{  request()->is('sales-transaction') || request()->is('commision-employee') || request()->is('employee-sales') || request()->is('purchase') || request()->is('void-logs') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-chart-pie "></i>
                <div data-i18n="Accounting">Accounting</div>
            </a>

            <ul class="menu-sub">

                
                


                <li class="menu-item {{ request()->is('sales-transaction') ? 'active' : '' }}">
                    <a href="/sales-transaction" class="menu-link">
                        <div data-i18n="Services Transaction">Services Transaction</div>
                    </a>
                </li>

                
                <li class="menu-item {{ request()->is('employee-sales') ? 'active' : '' }}">
                    <a href="/employee-sales" class="menu-link">
                        <div data-i18n="Employee Sales">Employee Sales</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('purchase') ? 'active' : '' }}">
                    <a href="/purchase" class="menu-link">
                        <div data-i18n="Purchase">Purchase</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('void-logs') ? 'active' : '' }}">
                    <a href="/void-logs" class="menu-link">
                        <div data-i18n="Void Logs">Void Logs</div>
                    </a>
                </li>
                </ul>

                </li>



            </ul>
        </li>
        </li>


        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-settings"></i>
                <div data-i18n="Users">Users</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('new-user') ? 'active' : '' }}">
                    <a href="/new-user" class="menu-link">
                        <div data-i18n="New User">New User</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('user-list') ? 'active' : '' }}">
                    <a href="/user-list" class="menu-link">
                        <div data-i18n="Users List">Users List</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item">
            <a onclick="document.getElementById('logout-form').submit()" class="menu-link" style="cursor: pointer;">
                <i class="menu-icon icon-base ti tabler-logout"></i>
                <div data-i18n="Logout">Logout</div>
            </a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
            </form>
        </li>

    </ul>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Clear any previous event listeners from menu toggles
        const menuToggles = document.querySelectorAll('.menu-toggle');
        menuToggles.forEach(toggle => {
            const clonedToggle = toggle.cloneNode(true);
            toggle.parentNode.replaceChild(clonedToggle, toggle);
        });
        
        // Reattach event listeners with improved handling
        document.querySelectorAll('.menu-toggle').forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Find the parent menu item
                const menuItem = this.closest('.menu-item');
                
                // Handle nested menu items properly
                if (this.closest('.menu-sub')) {
                    // If this is a nested submenu toggle, only toggle this specific item
                    menuItem.classList.toggle('open');
                    
                    const subMenu = menuItem.querySelector('.menu-sub');
                    if (subMenu) {
                        if (menuItem.classList.contains('open')) {
                            subMenu.style.display = 'block';
                        } else {
                            subMenu.style.display = 'none';
                        }
                    }
                } else {
                    // For top-level menu items, we need to handle sibling closures
                    // First check if we need to close other open top-level items
                    const isOpen = menuItem.classList.contains('open');
                    
                    // Toggle this menu item's state
                    menuItem.classList.toggle('open');
                    
                    // Show/hide the submenu
                    const subMenu = menuItem.querySelector('.menu-sub');
                    if (subMenu) {
                        subMenu.style.display = !isOpen ? 'block' : 'none';
                    }
                }
                
                // Force a repaint to ensure proper display
                document.body.offsetHeight;
            });
        });
        
        // Force visibility of all menu labels
        document.querySelectorAll('.menu-link div[data-i18n]').forEach(label => {
            label.style.display = 'block';
            label.style.visibility = 'visible';
            label.style.opacity = '1';
        });
        
        // Set active menu items properly
        document.querySelectorAll('.menu-item.active').forEach(item => {
            // Open all parent menu items
            let parent = item.parentElement.closest('.menu-item');
            while (parent) {
                parent.classList.add('open');
                const parentSubMenu = parent.querySelector('.menu-sub');
                if (parentSubMenu) {
                    parentSubMenu.style.display = 'block';
                }
                parent = parent.parentElement.closest('.menu-item');
            }
        });
        
        // Make sure all open menu items have their sub-menus visible
        document.querySelectorAll('.menu-item.open > .menu-sub').forEach(subMenu => {
            subMenu.style.display = 'block';
        });
        
        // Add CSS to fix menu transitions and styling
        const style = document.createElement('style');
        style.textContent = `
            /* Basic menu structure fixes */
            #layout-menu {
                overflow-y: auto !important;
                height: 100vh;
            }
            
            .menu-item .menu-sub {
                display: none;
                max-height: none !important;
                transition: none !important;
            }
            .menu-item.open > .menu-sub {
                display: block !important;
                max-height: none !important;
                visibility: visible !important;
                opacity: 1 !important;
            }
            
            /* Fix menu toggle clicks */
            .menu-toggle {
                cursor: pointer !important;
                user-select: none;
                pointer-events: auto !important;
            }
            
            /* Fix menu item text visibility */
            .menu-link div[data-i18n] {
                visibility: visible !important;
                display: block !important;
                opacity: 1 !important;
            }
            
            /* Fix pointer events for all menu items */
            .menu-link, .menu-toggle, .menu-sub, .menu-item {
                pointer-events: auto !important;
            }
            
            /* Fix z-index of menu items */
            .menu-sub {
                z-index: 10 !important;
                position: relative !important;
            }
            
            /* Fix nested submenu handling */
            .menu-sub .menu-sub {
                margin-left: 1rem !important;
                border-left: 1px solid rgba(0,0,0,0.05) !important;
            }
            
            /* Make the menu links clearly clickable */
            .menu-toggle, .menu-link {
                position: relative !important;
                z-index: 2 !important;
            }
        `;
        document.head.appendChild(style);
    });
</script>