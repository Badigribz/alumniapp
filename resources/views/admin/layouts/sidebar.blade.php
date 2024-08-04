<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="title">
            <h1 class="h5">{{Auth::user()->name}}</h1>
            <p>IST Admin</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
            <li class="{{ request()->is('home') ? 'active' : '' }}">
                <a href="/home"><i class="icon-home"></i> Home </a>
            </li>
            <li class="{{ request()->routeIs('home') ?  : '' }}">
              <a href="{{ route('profile.edit') }}"><i class="icon-user"></i> Profile </a>
            </li>
               
            <li>
                <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse" class="{{ request()->is('createjob') || request()->is('viewjob') ? '' : 'collapsed' }}">
                    <i class="fa fa-briefcase"></i> Jobs
                </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled {{ request()->is('createjob') || request()->is('viewjob') ? 'show' : '' }}">
                    <li class="{{ request()->is('createjob') ? 'active' : '' }}">
                        <a href="{{ url('createjob') }}">Add Job</a>
                    </li>
                    <li class="{{ request()->is('viewjob') ? 'active' : '' }}">
                        <a href="{{ url('viewjob') }}">View Job</a>
                    </li>
                </ul>
            </li>
    
            <li>
                <a href="#exampledropdownDropdown1" aria-expanded="false" data-toggle="collapse" class="{{ request()->is('createGallery') || request()->is('viewGallery') ? '' : 'collapsed' }}">
                    <i class="fas fa-images"></i> Gallery
                </a>
                <ul id="exampledropdownDropdown1" class="collapse list-unstyled {{ request()->is('createGallery') || request()->is('viewGallery') ? 'show' : '' }}">
                    <li class="{{ request()->is('createGallery') ? 'active' : '' }}">
                        <a href="{{ url('createGallery') }}">Upload Photo</a>
                    </li>
                    <li class="{{ request()->is('viewGallery') ? 'active' : '' }}">
                        <a href="{{ url('viewGallery') }}">View Photo</a>
                    </li>
                </ul>
            </li>
    
        </nav>


        