  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(2) == 'admin-dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(2) == 'admin-practice') ? '' : 'collapsed' }}" href="{{ route('practice.index') }}">
          <i class="bi bi-patch-check-fill"></i>
          <span>Practice Area</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(2) == 'admin-lawyer') ? '' : 'collapsed' }}" href="{{ route('lawyer.index') }}">
          <i class="bi bi-people-fill"></i>
          <span>Prancipal Lawyer</span>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link {{ (request()->segment(2) == 'admin-gallery') ? '' : 'collapsed' }}" href="{{ route('gallery.index') }}">
          <i class="bi bi-images"></i>
          <span>Gallery</span>
        </a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(2) == 'admin-news') ? '' : 'collapsed' }}" href="{{ route('news.index') }}">
          <i class="bi bi-newspaper"></i>
          <span>News</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->segment(2) == 'admin-general') ? '' : 'collapsed' }}" href="{{ route('general.index') }}">
          <i class="bi bi-gear"></i>
          <span>Setup General</span>
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->