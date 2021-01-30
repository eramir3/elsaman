<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Panel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Users
    </div>

    <!-- Nav Item - Users -->
    <li class="nav-item {{ Route::is('users.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
    </li>

    <!-- Nav Item - Users -->
    <li class="nav-item {{ Route::is('customers.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('customers.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Ecommerce
    </div>

    <!-- Nav Item - Products -->
    <li class="nav-item {{ Route::is('products.*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
            aria-expanded="true" aria-controls="collapseProducts">
            <i class="fas fa-box"></i>
            <span>Products</span>
        </a>
        <div id="collapseProducts" class="collapse {{ Route::is('products.*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product Actions</h6>
                <a class="collapse-item {{ Route::is('products.create') ? 'active' : '' }}" href="{{route('products.create')}}">Create Product</a>
                <a class="collapse-item {{ Route::is('products.index') ? 'active' : '' }}" href="{{route('products.index')}}">All Products</a>
            </div>
        </div>
    </li>

    <!-- Posts -->
    <li class="nav-item">
        <a class="nav-link collapsed {{ Route::is('posts.*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapsePosts"
            aria-expanded="true" aria-controls="collapsePosts">
            <i class="fas fa-fw fa-sticky-note"></i>
            <span>Posts</span>
        </a>
        <div id="collapsePosts" class="collapse {{ Route::is('posts.*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Post Actions</h6>
                <a class="collapse-item {{ Route::is('posts.create') ? 'active' : '' }}" href="{{route('posts.create')}}">Create Post</a>
                <a class="collapse-item {{ Route::is('posts.index') ? 'active' : '' }}" href="{{route('posts.index')}}">All Posts</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Categories -->
    <li class="nav-item {{ Route::is('categories.*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
            aria-expanded="true" aria-controls="collapseCategories">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Categories</span>
        </a>
        <div id="collapseCategories" class="collapse {{ Route::is('categories.*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Post Categories</h6>
                <a class="collapse-item {{ Route::is('categories.posts.index') ? 'active' : '' }}" href="{{route('categories.posts.index')}}">Post</a>
                <h6 class="collapse-header">Product Categories</h6>
                <a class="collapse-item {{ Route::is('categories.products.index') ? 'active' : '' }}" href="{{route('categories.products.index')}}">Product</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Coupons -->
    <li class="nav-item {{ Route::is('coupons.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('coupons.index') }}">
            <i class="fas fa-tags"></i>
            <span>Coupons</span>
        </a>
    </li>

     <!-- Divider -->
     <hr class="sidebar-divider">    

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>