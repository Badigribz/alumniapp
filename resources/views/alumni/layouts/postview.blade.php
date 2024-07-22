<!DOCTYPE html>
<html>
  <head> 
    <title> View Job Posting</title>
    
    @include('alumni.layouts.head')
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
      @include('alumni.layouts.navbar')
    </header>

    <div class="d-flex align-items-stretch">

      <!-- Sidebar Navigation-->
      @include('alumni.layouts.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Job Posting</h2>
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
                                    <th>Years of Experience</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                    <tr>
                                        <td style="font-weight: bold;">{{$job->company}}</td>
                                        <td>{{$job->location}}</td>
                                        <td>{{$job->position}}</td>
                                        <td>{{$job->experience}}</td>
                                        <td><a class="btn btn-warning" href="{{url('jobdesc',$job->id)}}">More Info</a></td>
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
      
      @include('alumni.layouts.footer')
      </div>
    </div>
    
    @include('alumni.layouts.script')
  </body>
</html>