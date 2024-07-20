<!DOCTYPE html>
<html>
  <head> 
    <title>Librarian Dash </title>
    
    @include('alumni.layouts.head')
  </head>

  <body>

    <header class="header">   
      @include('alumni.layouts.navbar')
    </header>

    <div class="d-flex align-items-stretch">

      <!-- Sidebar Navigation-->
      @include('alumni.layouts.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        
        @include('alumni.layouts.body')

        <footer class="footer">
          @include('alumni.layouts.footer')
        </footer>

      </div>
    </div>
    
    @include('alumni.layouts.script')

  </body>
</html>