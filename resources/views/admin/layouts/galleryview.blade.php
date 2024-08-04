<!DOCTYPE html>
<html>
  <head> 
    <title> View Gallery Posting</title>
    
    @include('admin.layouts.head')
    @include('admin.layouts.style')
    <style>
        .page-header
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
            <h2 class="h5 no-margin-bottom">View Gallery Posting</h2>
            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-9">
                        <div class="block margin-bottom-sm">
                        <div class="table-responsive"> 
                            <table class="table">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($images as $image)
                                    <tr>
                                        <td><img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}" style="width: 100px; height: auto;"></td>
                                        <td>{{ $image->title }}</td>
                                        <td>{{ $image->description }}</td>
                                        <td><a class="btn btn-info" href="{{url('editGallery',$image->id)}}">Edit</a></td>
                                        <td>
                                            <form action="{{url('deleteGallery',$image->id)}}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
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
  </body>
</html>