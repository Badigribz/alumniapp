<!DOCTYPE html>
<html>
  <head> 
    <title> Add Gallery Photo </title>
    
    @include('admin.layouts.head')
    @include('admin.layouts.style')
    <style>
        .page-header
        {
            background-color: white;
        }
        .block-body
        {
            background-color: white;
        }
        .block
        {
            background-color: white;
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
            <h2 class="h5 no-margin-bottom">Gallery photo Upload</h2>
            <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <!-- Form Elements -->
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="block-body">
                                <form class="form-horizontal" method="post" action="{{url('storeGallery')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-6 form-control-label">Photo Title</label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" name="title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 form-control-label">Photo Description</label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" name="description">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 form-control-label">Photo Upload</label>
                                        <div class="col-lg-12">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           </div>
        </section>
          </div>
        </div>
      
      @include('admin.layouts.footer')
      </div>
    </div>
    
    @include('admin.layouts.script')
    <script>
        function addQualification() {
            var div = document.createElement('div');
            div.innerHTML = '<input type="text" name="qualifications[]" class="form-control" style=margin-top 10px;":><button type="button" onclick="removeQualification(this)">Remove</button>';
            document.getElementById('qualifications').appendChild(div);
        }

        function removeQualification(button) {
            button.parentElement.remove();
        }
    </script>
  </body>
</html>