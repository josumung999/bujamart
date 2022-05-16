
{{-- Start SideBar --}}

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
      <img src="backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BujaMart - Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
              <a href="#" class="d-block">Alex Irakoze</a>
          </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Rechercher" aria-label="Rechercher">
              <div class="input-group-append">
                  <button class="btn btn-sidebar">
                      <i class="fas fa-search fa-fw"></i>
                  </button>
              </div>
          </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item">
                  <a href="{{ url('/admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                          Tableau de Bord
                      </p>
                  </a>
              </li>
              <li class="nav-header">GESTION</li>

              <li class="nav-item {{ request()->is('categories') || request()->is('addcategory') ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link {{ request()->is('categories') || request()->is('addcategory') ? 'active' : '' }}">
                      <i class="nav-icon far fa-folder"></i>
                      <p>
                          Catégories
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ url('/categories') }}" class="nav-link {{ request()->is('categories') ? 'active' : '' }}">
                              <p>Toutes Les Catégories</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ url('/addcategory') }}" class="nav-link {{ request()->is('addcategory') ? 'active' : '' }}">
                              <p>Créer Catégorie</p>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item {{ request()->is('sliders') || request()->is('addslider') ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link nav-item {{ request()->is('sliders') || request()->is('addslider') ? 'active' : '' }}">
                      <i class="nav-icon far fa-folder"></i>
                      <p>
                          Slides
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ url('/sliders') }}" class="nav-link {{ request()->is('sliders') ? 'active' : '' }}">
                              <p>Toutes les Slides</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ url('/addslider') }}" class="nav-link {{ request()->is('addslider') ? 'active' : '' }}">
                              <p>Créer Slider</p>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item {{ request()->is('products') || request()->is('addproduct') ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link {{ request()->is('products') || request()->is('addproduct') ? 'active' : '' }}">
                      <i class="nav-icon far fa-folder"></i>
                      <p>
                          Produits
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ url('/products') }}" class="nav-link {{ request()->is('products') ? 'active' : '' }}">
                              <p>Tous les Produits</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ url('/addproduct') }}" class="nav-link {{ request()->is('addproduct') ? 'active' : '' }}">
                              <p>Créer un Produit</p>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item {{ request()->is('orders') ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link {{ request()->is('orders') ? 'active' : '' }}">
                      <i class="nav-icon far fa-folder"></i>
                      <p>
                          Commandes
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ url('/orders') }}" class="nav-link {{ request()->is('orders') ? 'active' : '' }}">
                              <p>Toutes les Commandes</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="pages/examples/profile.html" class="nav-link">
                              <p>Les Comamndes terminées</p>
                          </a>
                      </li>
                  </ul>
              </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

{{-- End SideBar --}}