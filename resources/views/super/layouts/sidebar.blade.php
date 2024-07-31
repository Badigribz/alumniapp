<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
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

    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
         <a href="{{ route('profile.edit') }}"><i class="icon-user"></i> Profile </a>
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

    @can('view-role')
    <li>
        <a href="#exampledropdownDropdown1" aria-expanded="false" data-toggle="collapse" class="{{ request()->is('createrole') || request()->is('viewrole') ? '' : 'collapsed' }}">
            <i class="fa fa-user-plus"></i> Roles
        </a>
        <ul id="exampledropdownDropdown1" class="collapse list-unstyled {{ request()->is('add/roles') || request()->is('roles') ? 'show' : '' }}">
            @can('create-role') <!-- Check if the user has permission to create jobs -->
                <li class="{{ request()->is('/add/roles') ? 'active' : '' }}">
                    <a href="{{ route('createrole') }}">Add Role</a>
                </li>
            @endcan
            @can('view-role') <!-- Check if the user has permission to view jobs -->
                <li class="{{ request()->is('roles') ? 'active' : '' }}">
                    <a href="{{ route('viewrole') }}">View Roles</a>
                </li>
            @endcan
        </ul>
    </li>
    @endcan

    @can('view-permission')
    <li>
        <a href="#exampledropdownDropdown2" aria-expanded="false" data-toggle="collapse" class="{{ request()->is('createpermission') || request()->is('viewpermission') ? '' : 'collapsed' }}">
            <i class="fa fa-check-circle"></i> Permissions
        </a>
        <ul id="exampledropdownDropdown2" class="collapse list-unstyled {{ request()->is('add/permissions') || request()->is('permissions') ? 'show' : '' }}">
            @can('create-permission') <!-- Check if the user has permission to create jobs -->
                <li class="{{ request()->is('/add/permissions') ? 'active' : '' }}">
                    <a href="{{ route('createpermission') }}">Add Permission</a>
                </li>
            @endcan
            @can('view-permission') <!-- Check if the user has permission to view jobs -->
                <li class="{{ request()->is('permissions') ? 'active' : '' }}">
                    <a href="{{ route('viewpermission') }}">View Permissions</a>
                </li>
            @endcan
        </ul>
    </li>
    @endcan
</ul>

<span class="heading">Extras</span>
<!-- Add more sections as needed -->

      </nav>
