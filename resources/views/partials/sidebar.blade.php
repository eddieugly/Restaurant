<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown">
          <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Starter</li>
        <li class="dropdown {{ request()->routeIs('category.*') ? 'active' : '' }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Cateegory</span></a>
          <ul class="dropdown-menu">
            <li class="{{ request('type') == 'menu' ? 'active' : '' }}"><a class="nav-link" href="{{ route('category.index').'?type=menu' }}">Menu Category</a></li>
            <li class="{{ request('type') == 'blog' ? 'active' : '' }}"><a class="nav-link" href="{{ route('category.index').'?type=blog' }}">Blog Category</a></li>
            <li class="{{ request()->routeIs('category.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('category.create') }}">Create Category</a></li>
          </ul>
        </li>
        <li class="dropdown {{ request()->routeIs('menu.*') ? 'active' : '' }}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Menu</span></a>
          <ul class="dropdown-menu">
            <li class="{{ request()->routeIs('menu.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('menu.index') }}">Menu List</a></li>
            <li class="{{ request()->routeIs('menu.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('menu.create') }}">Create Menu</a></li>
          </ul>
        </li>
      </ul>

      </aside>
  </div>