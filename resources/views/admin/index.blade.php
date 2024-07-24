<!DOCTYPE html>
<html>
  <head> 
    <title>Admin Dash </title>
    
    @include('admin.layouts.head')
    @include('admin.layouts.style')
    <style>
      .page-header
      {
        background-color: #eeeeee;
      }
    </style>
  </head>

  <body>

    <header class="header">   
      @include('admin.layouts.navbar')
    </header>

    <div class="d-flex align-items-stretch">

      <!-- Sidebar Navigation-->
      @include('admin.layouts.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        
        @include('admin.layouts.body')

      
      @include('admin.layouts.footer')
      </div>
    </div>
    
    @include('admin.layouts.script')

  </body>
</html>