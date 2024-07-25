<!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Navbar</title>

        <style>
          .sidebar-toggle 
          {
            cursor: pointer;
          }
          .sidebar-toggle::before 
          {
            content: "\f0c9"; /* Unicode for the 'bars' icon */
            font-family: "Font Awesome 5 Free";
            font-weight: 900; /* Ensure the correct font weight */
            margin-right: 8px; /* Optional: Add some space between the icon and the text */
          }
        </style>
      </head>
      <body>
      <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Close <i class="fa fa-close"></i></div>
            <form id="searchForm" action="#">
              <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">IST</strong><strong>Alumni site</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">IS</strong><strong>T</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">  
            <div class="list-inline-item"><a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a></div>   
            <!-- Log out               -->
            <div class="list-inline-item logout">
            <form method="POST" action="{{ route('logout') }}" x-data>
              @csrf

              <button class="btn btn-outline-secondary btn-sm"><i class="fas fa-sign-out-alt"href="{{ route('logout') }}"@click.prevent="$root.submit();"></i>Log out</button>

            </form>
          </div>
          </div>
        </div>
      </nav>


      </body>
      </html>