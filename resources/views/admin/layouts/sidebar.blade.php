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
                <a href="#examplebookdropdownDropdown" aria-expanded="false" data-toggle="collapse" class="{{ request()->is('add_book') || request()->is('display_book') ? '' : 'collapsed' }}">
                    <i class="fa fa-book"></i> Books
                </a>
                <ul id="examplebookdropdownDropdown" class="collapse list-unstyled {{ request()->is('add_book') || request()->is('display_book') ? 'show' : '' }}">
                    <li class="{{ request()->is('add_book') ? 'active' : '' }}">
                        <a href="{{ url('add_book') }}">Add Book</a>
                    </li>
                    <li class="{{ request()->is('display_book') ? 'active' : '' }}">
                        <a href="{{ url('display_book') }}">Show Books</a>
                    </li>
                </ul>
            </li>
            <li class="{{ request()->is('borrow_request') ? 'active' : '' }}">
                <a href="{{ url('borrow_request') }}"><i class="fas fa-paper-plane"></i> Borrow Requests</a>
            </li>
            <li class="{{ request()->is('extension_request') ? 'active' : '' }}">
                <a href="{{ url('extension_request') }}"><i class="fas fa-clock-o"></i> Extension Requests</a>
            </li>
            <li class="{{ request()->is('reservation_request') ? 'active' : '' }}">
                <a href="{{ url('reservation_request') }}"><i class="fas fa-calendar-check-o"></i> Reservation Requests</a>
            </li>
            <li class="{{ request()->is('fines_page') ? 'active' : '' }}">
                <a href="{{ url('fines_page') }}"><i class="fas fa-exclamation-circle"></i> Penalty Management </a>
            </li>
        </ul><span class="heading">Extras</span>
        


      </nav>
