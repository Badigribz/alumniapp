<!DOCTYPE html>
<html>
  <head> 
    <title>Librarian Dash </title>
    
    @include('super.layouts.head')
  </head>

  <body>

    <header class="header">   
      @include('super.layouts.navbar')
    </header>

    <div class="d-flex align-items-stretch">

      <!-- Sidebar Navigation-->
      @include('super.layouts.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        
        @include('super.layouts.body')

        <footer class="footer">
          @include('super.layouts.footer')
        </footer>

      </div>
    </div>
    
    @include('super.layouts.script')

  </body>
</html>