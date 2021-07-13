    <!-- START LEFT SIDEBAR NAV-->
  <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation" >
        <li class="user-details cyan darken-2">
        <div class="row">
            <div class="col col s4 m4 l4">
                <img src="images\avatar.jpg" alt="" class="circle responsive-img valign profile-image">
            </div>
            <div class="col col s8 m8 l8">
                <ul id="profile-dropdown" class="dropdown-content">
                    
                    <li><a href="{{ route('logout') }}"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                    </li>
                </ul>
                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">{{$userName}}<i class="mdi-navigation-arrow-drop-down right"></i></a>
                <p class="user-roal">Administrator</p>
            </div>
        </div>
        </li>
        <li class="bold active"><a href="{{ route('admin.dashboard') }}" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
        </li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-image-palette"></i>Content Management</a>
                    <div class="collapsible-body">
                        <ul>
                            @if(in_array("admin.category.index", $permissionUser))
                            <li><a href="{{ route('admin.category.index') }}">Category</a>
                            </li>
                            @endif
                            @if(in_array("admin.post.index", $permissionUser))
                            <li><a href="{{ route('admin.post.index') }}">Post</a>
                            </li>
                            @endif
                            @if(in_array("admin.page.index", $permissionUser))
                            <li><a href="{{ route('admin.page.index') }}">Page</a>
                            </li>
                            @endif
                            @if(in_array("admin.menu.index", $permissionUser))
                            <li><a href="{{ route('admin.menu.index') }}">Menu</a>
                            </li>
                            @endif
                            @if(in_array("admin.koran.index", $permissionUser))
                            <li><a href="{{ route('admin.koran.index') }}">Koran Online</a>
                            </li>
                            @endif
                            @if(in_array("admin.agenda.index", $permissionUser))
                            <li><a href="{{ route('admin.agenda.index') }}">Agenda</a>
                            </li>
                            @endif
                            @if(in_array("admin.user.index", $permissionUser))
                            <li><a href="{{ route('admin.user.index') }}">User</a>
                            </li>
                            @endif
                            @if(in_array("admin.permission.index", $permissionUser))
                            <li><a href="{{ route('admin.permission.index') }}">Permission</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-image-palette"></i>Rida Controller</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('admin.rida.index') }}">Input RIDA</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <!-- <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-carousel"></i> Website</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="layout-fullscreen.htm">Full Screen</a>
                            </li>
                            <li><a href="layout-horizontal-menu.htm">Horizontal Menu</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <li class="bold"><a href="app-email.htm" class="waves-effect waves-cyan"><i class="mdi-communication-email"></i> Grafik Peforma <span class="new badge">4</span></a>
        </li>
        <li class="bold"><a href="app-calendar.htm" class="waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Manajemen Dosen</a>
        </li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-invert-colors"></i> Riset Group & PUSDI</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="css-typography.htm">Typography</a>
                            </li>
                            <li><a href="css-icons.htm">Icons</a>
                            </li>
                            <li><a href="css-animations.htm">Animations</a>
                            </li>
                            <li><a href="css-shadow.htm">Shadow</a>
                            </li>
                            <li><a href="css-media.htm">Media</a>
                            </li>
                            <li><a href="css-sass.htm">Sass</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-image-palette"></i> Kinerja Dosen</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="ui-alerts.htm">Alerts</a>
                            </li>
                            <li><a href="ui-buttons.htm">Buttons</a>
                            </li>
                            <li><a href="ui-badges.htm">Badges</a>
                            </li>
                            <li><a href="ui-breadcrumbs.htm">Breadcrumbs</a>
                            </li>
                            <li><a href="ui-collections.htm">Collections</a>
                            </li>
                            <li><a href="ui-collapsibles.htm">Collapsibles</a>
                            </li>
                            <li><a href="ui-tabs.htm">Tabs</a>
                            </li>
                            <li><a href="ui-navbar.htm">Navbar</a>
                            </li>
                            <li><a href="ui-pagination.htm">Pagination</a>
                            </li>
                            <li><a href="ui-preloader.htm">Preloader</a>
                            </li>
                            <li><a href="ui-toasts.htm">Toasts</a>
                            </li>
                            <li><a href="ui-tooltip.htm">Tooltip</a>
                            </li>
                            <li><a href="ui-waves.htm">Waves</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-av-queue"></i> Kinerja Standar <span class="new badge"></span></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="advanced-ui-chips.htm">Chips</a>
                            </li>
                            <li><a href="advanced-ui-cards.htm">Cards</a>
                            </li>
                            <li><a href="advanced-ui-modals.htm">Modals</a>
                            </li>
                            <li><a href="advanced-ui-media.htm">Media</a>
                            </li>
                            <li><a href="advanced-ui-range-slider.htm">Range Slider</a>
                            </li>
                            <li><a href="advanced-ui-sweetalert.htm">SweetAlert</a>
                            </li>
                            <li><a href="advanced-ui-nestable.htm">Shortable & Nestable</a>
                            </li>
                            <li><a href="advanced-ui-translation.htm">Language Translation</a>
                            </li>
                            <li><a href="advanced-ui-highlight.htm">Highlight</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="bold"><a href="app-widget.htm" class="waves-effect waves-cyan"><i class="mdi-device-now-widgets"></i> Skim Hibah</a>
                </li>
                <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-border-all"></i> Proposal Hibah</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="table-basic.htm">Basic Tables</a>
                            </li>
                            <li><a href="table-data.htm">Data Tables</a>
                            </li>
                            <li><a href="table-jsgrid.htm">jsGrid</a>
                            </li>
                            <li><a href="table-editable.htm">Editable Table</a>
                            </li>
                            <li><a href="table-floatThead.htm">floatThead</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-insert-comment"></i> Desk Evaluasi Proposal Mandiri <span class="new badge"></span></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="form-elements.htm">Form Elements</a>
                            </li>
                            <li><a href="form-layouts.htm">Form Layouts</a>
                            </li>
                            <li><a href="form-validation.htm">Form Validations</a>
                            </li>
                            <li><a href="form-masks.htm">Form Masks</a>
                            </li>
                            <li><a href="form-file-uploads.htm">File Uploads</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-social-pages"></i> Desk Evaluasi Proposal PNBP </a>
                    <div class="collapsible-body">
                        <ul>                                        
                            <li><a href="page-contact.htm">Contact Page</a>
                            </li>
                            <li><a href="page-todo.htm">ToDos</a>
                            </li>
                            <li><a href="page-blog-1.htm">Blog Type 1</a>
                            </li>
                            <li><a href="page-blog-2.htm">Blog Type 2</a>
                            </li>
                            <li><a href="page-404.htm">404</a>
                            </li>
                            <li><a href="page-500.htm">500</a>
                            </li>
                            <li><a href="page-blank.htm">Blank</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-shopping-cart"></i> Proposal Pemenang Hibah</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="eCommerce-products-page.htm">Products Page</a>
                            </li>                                        
                            <li><a href="eCommerce-pricing.htm">Pricing Table</a>
                            </li>
                            <li><a href="eCommerce-invoice.htm">Invoice</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-image-image"></i> Monitoring Kemajuan</a>
                    <div class="collapsible-body">
                        <ul>                                        
                            <li><a href="media-gallary-page.htm">Gallery Page</a>
                            </li>
                            <li><a href="media-hover-effects.htm">Image Hover Effects</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-account-circle"></i> Monitoring Akhir</a>
                    <div class="collapsible-body">
                        <ul>     
                            <li><a href="user-profile-page.htm">User Profile</a>
                            </li>                                   
                            <li><a href="user-login.htm">Login</a>
                            </li>                                        
                            <li><a href="user-register.htm">Register</a>
                            </li>
                            <li><a href="user-forgot-password.htm">Forgot Password</a>
                            </li>
                            <li><a href="user-lock-screen.htm">Lock Screen</a>
                            </li>                                        
                            <li><a href="user-session-timeout.html">Session Timeout</a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-chart"></i> Charts</a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="charts-chartjs.htm">Chart JS</a>
                            </li>
                            <li><a href="charts-chartist.htm">Chartist</a>
                            </li>
                            <li><a href="charts-morris.htm">Morris Charts</a>
                            </li>
                            <li><a href="charts-xcharts.htm">xCharts</a>
                            </li>
                            <li><a href="charts-flotcharts.htm">Flot Charts</a>
                            </li>
                            <li><a href="charts-sparklines.htm">Sparkline Charts</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <li class="li-hover"><div class="divider"></div></li>
        <li class="li-hover"><p class="ultra-small margin more-text">MORE</p></li>
        <li><a href="angular-ui.htm"><i class="mdi-action-verified-user"></i> Angular UI  <span class="new badge"></span></a>
        </li>
        <li><a href="css-grid.htm"><i class="mdi-image-grid-on"></i> Grid</a>
        </li>
        <li><a href="css-color.htm"><i class="mdi-editor-format-color-fill"></i> Color</a>
        </li>
        <li><a href="css-helpers.htm"><i class="mdi-communication-live-help"></i> Helpers</a>
        </li>
        <li><a href="changelogs.htm"><i class="mdi-action-swap-vert-circle"></i> Changelogs</a>
        </li>                    
        <li class="li-hover"><div class="divider"></div></li>
        <li class="li-hover"><p class="ultra-small margin more-text">Daily Sales</p></li>
        <li class="li-hover">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="sample-chart-wrapper">                            
                        <div class="ct-chart ct-golden-section" id="ct2-chart"></div>
                    </div>
                </div>
            </div>
        </li> -->
    </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
    </aside>
    <!-- END LEFT SIDEBAR NAV-->

    
