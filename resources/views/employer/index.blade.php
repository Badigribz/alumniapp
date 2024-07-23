<!DOCTYPE html>
<html>
  <head> 
    <title>Employer Dash </title>
    
    @include('employer.layouts.head')

    <style>
      .page-header
      {
        background-color: #eeeeee;
      }
    </style>
  </head>

  <body>

    <header class="header">   
      @include('employer.layouts.navbar')
    </header>

    <div class="d-flex align-items-stretch">

      <!-- Sidebar Navigation-->
      @include('employer.layouts.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        
        @include('employer.layouts.body')

      
      @include('employer.layouts.footer')
      </div>
    </div>
    
    @include('employer.layouts.script')

  </body>
</html>