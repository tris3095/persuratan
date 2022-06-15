<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('img/logo_sumsel.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">{{ __('Persuratan') }}</h4>
        </div>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-inboxes-fill" viewBox="0 0 16 16">
                        <path
                            d="M4.98 1a.5.5 0 0 0-.39.188L1.54 5H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0A.5.5 0 0 1 10 5h4.46l-3.05-3.812A.5.5 0 0 0 11.02 1H4.98zM3.81.563A1.5 1.5 0 0 1 4.98 0h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1 .106.374l-.39 3.124A1.5 1.5 0 0 1 14.117 10H1.883A1.5 1.5 0 0 1 .394 8.686l-.39-3.124a.5.5 0 0 1 .106-.374L3.81.563zM.125 11.17A.5.5 0 0 1 .5 11H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0 .5.5 0 0 1 .5-.5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 16H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .121-.393z" />
                    </svg>
                </div>
                <div class="menu-title">Surat</div>
            </a>
            <ul>
                <li> <a href="{{ route('surat.masuk.index') }}"><i class="bi bi-circle"></i>Masuk</a>
                </li>
                @if (Auth::user()->id_jabatan == '1' || Auth::user()->id_jabatan == '2')
                    <li> <a href="{{ route('surat.keluar.index') }}"><i class="bi bi-circle"></i>Keluar</a>
                    </li>
                @endif
            </ul>
        </li>
        @if (Auth::user()->id_jabatan == '1' || Auth::user()->id_jabatan == '2')
            <li>
                <a href="{{ route('arsip.index') }}">
                    <div class="parent-icon"><i class="bi bi-calendar-week-fill"></i>
                    </div>
                    <div class="menu-title">Arsip</div>
                </a>
            </li>
            @if (Auth::user()->id_jabatan == '1')
                <li>
                    <a href="{{ route('jabatan.index') }}">
                        <div class="parent-icon"><i class="bi bi-award-fill"></i>
                        </div>
                        <div class="menu-title">Jabatan</div>
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('user.index') }}">
                    <div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
                    </div>
                    <div class="menu-title">User</div>
                </a>
            </li>
        @endif
        {{-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                </div>
                <div class="menu-title">Application</div>
            </a>
            <ul>
                <li> <a href="app-emailbox.html"><i class="bi bi-circle"></i>Email</a>
                </li>
                <li> <a href="app-chat-box.html"><i class="bi bi-circle"></i>Chat Box</a>
                </li>
                <li> <a href="app-file-manager.html"><i class="bi bi-circle"></i>File Manager</a>
                </li>
                <li> <a href="app-to-do.html"><i class="bi bi-circle"></i>Todo List</a>
                </li>
                <li> <a href="app-invoice.html"><i class="bi bi-circle"></i>Invoice</a>
                </li>
                <li> <a href="app-fullcalender.html"><i class="bi bi-circle"></i>Calendar</a>
                </li>
            </ul>
        </li> --}}
        {{-- <li class="menu-label">UI Elements</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                </div>
                <div class="menu-title">Widgets</div>
            </a>
            <ul>
                <li> <a href="widgets-static-widgets.html"><i class="bi bi-circle"></i>Static Widgets</a>
                </li>
                <li> <a href="widgets-data-widgets.html"><i class="bi bi-circle"></i>Data Widgets</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                </div>
                <div class="menu-title">eCommerce</div>
            </a>
            <ul>
                <li> <a href="ecommerce-products-list.html"><i class="bi bi-circle"></i>Products List</a>
                </li>
                <li> <a href="ecommerce-products-grid.html"><i class="bi bi-circle"></i>Products Grid</a>
                </li>
                <li> <a href="ecommerce-products-categories.html"><i class="bi bi-circle"></i>Categories</a>
                </li>
                <li> <a href="ecommerce-orders.html"><i class="bi bi-circle"></i>Orders</a>
                </li>
                <li> <a href="ecommerce-orders-detail.html"><i class="bi bi-circle"></i>Order details</a>
                </li>
                <li> <a href="ecommerce-add-new-product.html"><i class="bi bi-circle"></i>Add New Product</a>
                </li>
                <li> <a href="ecommerce-add-new-product-2.html"><i class="bi bi-circle"></i>Add New Product 2</a>
                </li>
                <li> <a href="ecommerce-transactions.html"><i class="bi bi-circle"></i>Transactions</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-award-fill"></i>
                </div>
                <div class="menu-title">Components</div>
            </a>
            <ul>
                <li> <a href="component-alerts.html"><i class="bi bi-circle"></i>Alerts</a>
                </li>
                <li> <a href="component-accordions.html"><i class="bi bi-circle"></i>Accordions</a>
                </li>
                <li> <a href="component-badges.html"><i class="bi bi-circle"></i>Badges</a>
                </li>
                <li> <a href="component-buttons.html"><i class="bi bi-circle"></i>Buttons</a>
                </li>
                <li> <a href="component-cards.html"><i class="bi bi-circle"></i>Cards</a>
                </li>
                <li> <a href="component-carousels.html"><i class="bi bi-circle"></i>Carousels</a>
                </li>
                <li> <a href="component-list-groups.html"><i class="bi bi-circle"></i>List Groups</a>
                </li>
                <li> <a href="component-media-object.html"><i class="bi bi-circle"></i>Media Objects</a>
                </li>
                <li> <a href="component-modals.html"><i class="bi bi-circle"></i>Modals</a>
                </li>
                <li> <a href="component-navs-tabs.html"><i class="bi bi-circle"></i>Navs & Tabs</a>
                </li>
                <li> <a href="component-navbar.html"><i class="bi bi-circle"></i>Navbar</a>
                </li>
                <li> <a href="component-paginations.html"><i class="bi bi-circle"></i>Pagination</a>
                </li>
                <li> <a href="component-popovers-tooltips.html"><i class="bi bi-circle"></i>Popovers & Tooltips</a>
                </li>
                <li> <a href="component-progress-bars.html"><i class="bi bi-circle"></i>Progress</a>
                </li>
                <li> <a href="component-spinners.html"><i class="bi bi-circle"></i>Spinners</a>
                </li>
                <li> <a href="component-notifications.html"><i class="bi bi-circle"></i>Notifications</a>
                </li>
                <li> <a href="component-avtars-chips.html"><i class="bi bi-circle"></i>Avatrs & Chips</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                </div>
                <div class="menu-title">Icons</div>
            </a>
            <ul>
                <li> <a href="icons-line-icons.html"><i class="bi bi-circle"></i>Line Icons</a>
                </li>
                <li> <a href="icons-boxicons.html"><i class="bi bi-circle"></i>Boxicons</a>
                </li>
                <li> <a href="icons-feather-icons.html"><i class="bi bi-circle"></i>Feather Icons</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Forms & Tables</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-file-earmark-break-fill"></i>
                </div>
                <div class="menu-title">Forms</div>
            </a>
            <ul>
                <li> <a href="form-elements.html"><i class="bi bi-circle"></i>Form Elements</a>
                </li>
                <li> <a href="form-input-group.html"><i class="bi bi-circle"></i>Input Groups</a>
                </li>
                <li> <a href="form-layouts.html"><i class="bi bi-circle"></i>Forms Layouts</a>
                </li>
                <li> <a href="form-validations.html"><i class="bi bi-circle"></i>Form Validation</a>
                </li>
                <li> <a href="form-wizard.html"><i class="bi bi-circle"></i>Form Wizard</a>
                </li>
                <li> <a href="form-date-time-pickes.html"><i class="bi bi-circle"></i>Date Pickers</a>
                </li>
                <li> <a href="form-select2.html"><i class="bi bi-circle"></i>Select2</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-file-earmark-spreadsheet-fill"></i>
                </div>
                <div class="menu-title">Tables</div>
            </a>
            <ul>
                <li> <a href="table-basic-table.html"><i class="bi bi-circle"></i>Basic Table</a>
                </li>
                <li> <a href="table-advance-tables.html"><i class="bi bi-circle"></i>Advance Tables</a>
                </li>
                <li> <a href="table-datatable.html"><i class="bi bi-circle"></i>Data Table</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Pages</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-lock-fill"></i>
                </div>
                <div class="menu-title">Authentication</div>
            </a>
            <ul>
                <li> <a href="authentication-signin.html" target="_blank"><i class="bi bi-circle"></i>Sign In</a>
                </li>
                <li> <a href="authentication-signup.html" target="_blank"><i class="bi bi-circle"></i>Sign Up</a>
                </li>
                <li> <a href="authentication-signin-with-header-footer.html" target="_blank"><i
                            class="bi bi-circle"></i>Sign In with Header & Footer</a>
                </li>
                <li> <a href="authentication-signup-with-header-footer.html" target="_blank"><i
                            class="bi bi-circle"></i>Sign Up with Header & Footer</a>
                </li>
                <li> <a href="authentication-forgot-password.html" target="_blank"><i class="bi bi-circle"></i>Forgot
                        Password</a>
                </li>
                <li> <a href="authentication-reset-password.html" target="_blank"><i class="bi bi-circle"></i>Reset
                        Password</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="pages-user-profile.html">
                <div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
                </div>
                <div class="menu-title">User Profile</div>
            </a>
        </li>
        <li>
            <a href="pages-timeline.html">
                <div class="parent-icon"><i class="bi bi-collection-play-fill"></i>
                </div>
                <div class="menu-title">Timeline</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-exclamation-triangle-fill"></i>
                </div>
                <div class="menu-title">Errors</div>
            </a>
            <ul>
                <li> <a href="pages-errors-404-error.html" target="_blank"><i class="bi bi-circle"></i>404 Error</a>
                </li>
                <li> <a href="pages-errors-500-error.html" target="_blank"><i class="bi bi-circle"></i>500 Error</a>
                </li>
                <li> <a href="pages-errors-coming-soon.html" target="_blank"><i class="bi bi-circle"></i>Coming
                        Soon</a>
                </li>
                <li> <a href="pages-blank-page.html" target="_blank"><i class="bi bi-circle"></i>Blank Page</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="pages-faq.html">
                <div class="parent-icon"><i class="bi bi-question-lg"></i>
                </div>
                <div class="menu-title">FAQ</div>
            </a>
        </li>
        <li>
            <a href="pages-pricing-tables.html">
                <div class="parent-icon"><i class="bi bi-tags-fill"></i>
                </div>
                <div class="menu-title">Pricing Tables</div>
            </a>
        </li>
        <li class="menu-label">Charts & Maps</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-bar-chart-line-fill"></i>
                </div>
                <div class="menu-title">Charts</div>
            </a>
            <ul>
                <li> <a href="charts-apex-chart.html"><i class="bi bi-circle"></i>Apex</a>
                </li>
                <li> <a href="charts-chartjs.html"><i class="bi bi-circle"></i>Chartjs</a>
                </li>
                <li> <a href="charts-highcharts.html"><i class="bi bi-circle"></i>Highcharts</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-pin-map-fill"></i>
                </div>
                <div class="menu-title">Maps</div>
            </a>
            <ul>
                <li> <a href="map-google-maps.html"><i class="bi bi-circle"></i>Google Maps</a>
                </li>
                <li> <a href="map-vector-maps.html"><i class="bi bi-circle"></i>Vector Maps</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Others</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-music-note-list"></i>
                </div>
                <div class="menu-title">Menu Levels</div>
            </a>
            <ul>
                <li> <a class="has-arrow" href="javascript:;"><i class="bi bi-circle"></i>Level One</a>
                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class="bi bi-circle"></i>Level Two</a>
                            <ul>
                                <li> <a href="javascript:;"><i class="bi bi-circle"></i>Level Three</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="https://codervent.com/skodash/documentation/index.html" target="_blank">
                <div class="parent-icon"><i class="bi bi-file-code-fill"></i>
                </div>
                <div class="menu-title">Documentation</div>
            </a>
        </li>
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bi bi-telephone-fill"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li> --}}
    </ul>
    <!--end navigation-->
</aside>
