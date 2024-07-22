<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{ Auth::user()->profile_photo_url }}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">{{Auth::user()->name}}</h1>
            <p>IST SuperAdmin</p>
          </div>
        </div>
<!-- Sidebar Navigation Menus -->
<span class="heading">Main</span>
<ul class="list-unstyled">
    <li class="{{ request()->is('home') ? 'active' : '' }}">
        <a href="/home"><i class="icon-home"></i> Home </a>
    </li>

    @can('view-user') <!-- Check if the user has permission to view jobs -->
        <li>
            <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse" class="{{ request()->is('createuser') || request()->is('viewuser') ? '' : 'collapsed' }}">
                <i class="fa fa-users"></i> Users
            </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled {{ request()->is('add/users') || request()->is('users') ? 'show' : '' }}">
                @can('create-user') <!-- Check if the user has permission to create jobs -->
                    <li class="{{ request()->is('/add/users') ? 'active' : '' }}">
                        <a href="{{ route('createuser') }}">Add User</a>
                    </li>
                @endcan
                @can('view-user') <!-- Check if the user has permission to view jobs -->
                    <li class="{{ request()->is('users') ? 'active' : '' }}">
                        <a href="{{ route('viewuser') }}">View Users</a>
                    </li>
                @endcan
            </ul>
        </li>
    @endcan
</ul>

<span class="heading">Extras</span>
<!-- Add more sections as needed -->

      </nav>
