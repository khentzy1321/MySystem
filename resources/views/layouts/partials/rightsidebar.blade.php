<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="{{ route('profile.index') }}" class="nav-link {{ request()->is('profile*') ? 'active' : ''}}">
          <i class="nav-icon fas fa-user"></i>
            <p>
              Profile
            </p>
          </a>
        </li>
      </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item menu-open">
            <a href="{{ route('logout') }}" class="nav-link {{ request()->is('logout*') ? 'active' : ''}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          <form action="{{ route('logouts') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
        </ul>


      </nav>
