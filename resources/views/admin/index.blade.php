<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.layouts.head')
  </head>
  <body>


    <div class="wrapper">
        @include('admin.layouts.sidebar')
        <x-app-layout> </x-app-layout>
    </div>
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              @include('admin.layouts.body')
            </div>
        </div>
    </div>

    <footer class="footer">
     @include('admin.layouts.footer')
    </footer>
    <!-- End Custom template --> 

    @include('admin.layouts.script')

  </body>
</html>

