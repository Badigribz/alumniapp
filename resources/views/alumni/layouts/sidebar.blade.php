<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="title">
            <h1 class="h5">{{Auth::user()->name}}</h1>
            <p>IST Alumni</p>
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
                <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse" class="{{ request()->is('addport') || request()->is('viewport') ? '' : 'collapsed' }}">
                    <i class="fas fa-user-tie"></i> My Portfolio
                </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled {{ request()->is('addport') || request()->is('viewport') ? 'show' : '' }}">
                    <li class="{{ request()->is('addport') ? 'active' : '' }}">
                        <a href="{{ url('addport') }}">Add Portfolio</a>
                    </li>
                    <li class="{{ request()->is('viewport') ? 'active' : '' }}">
                        <a href="{{ url('viewport') }}">View Portfolio</a>
                    </li>
                </ul>
            </li>
            <li class="{{ request()->is('viewposting') ? 'active' : '' }}">
                <a href="{{ url('viewposting') }}"><i class="fas fa-briefcase"></i> Jobs </a>
            </li>
        </ul><span class="heading">Extras</span>
        


      </nav>
