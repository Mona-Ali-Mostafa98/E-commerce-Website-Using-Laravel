    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="bi bi-house-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.categories.index') }}">
                    <i class="bi bi-menu-button-wide"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.products.index') }}">
                    <i class="bi bi-shop"></i>
                    <span>Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.settings.index') }}">
                    <i class="bi bi-gear"></i>
                    <span>Settings</span>
                </a>
            </li>

            <l class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.features.index') }}">
                    <i class="bi bi-list-stars"></i>
                    <span>Features</span>
                </a>
            </l>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.social-links.index') }}">
                    <i class="bi bi-link-45deg"></i>
                    <span>Social Links</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.statistics.index') }}">
                    <i class="bi bi-info-circle"></i>
                    <span>Statistics</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.contact-us.index') }}">
                    <i class="bi bi-envelope"></i>
                    <span>Contact Us</span>
                </a>
            </li>

        </ul>

    </aside><!-- End Sidebar-->
