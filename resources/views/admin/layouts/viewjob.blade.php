<!DOCTYPE html>
<html>
  <head> 
    <title>Admin Dash </title>
    
    @include('admin.layouts.head')

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
            <div class="title"><strong>View Jobs</strong></div>
          </div>
        </div>
        
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-9">
                <div class="block margin-bottom-sm">
                  <div class="table-responsive"> 
                    <table class="table">
                      <thead>
                            <tr>
                            <th>Company</th>
                            <th>Location</th>
                            <th>Position</th>
                            <th>Category</th>
                            <th></th>
                            <th></th>
                            </tr>
                      </thead>
                      <tbody>
                            @foreach ($job as $job)
                                <tr>
                                    <td style="font-weight: bold;">{{$job->company}}</td>
                                    <td>{{$job->location}}</td>
                                    <td>{{$job->position}}</td>
                                    <td>{{$job->category}}</td>
                                    <td><a class="btn btn-danger" href="{{url('deletejob',$job->id)}}">Delete</a></td>
                                    <td><a class="btn btn-info" href="{{url('editjob',$job->id)}}">Edit</a></td>
                                </tr>
                            @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
      </section>
       @include('admin.layouts.footer')
      </div>
    </div>
    
    @include('admin.layouts.script')

  </body>
</html>