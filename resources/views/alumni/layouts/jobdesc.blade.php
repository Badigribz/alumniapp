<!DOCTYPE html>
<html>
  <head> 
    <title>Alumni Dash </title>
    
    @include('admin.layouts.head')

    <style>
      .page-header
      {
        background-color: #eeeeee;
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
            <h2 class="h2 no-margin-bottom"><u>Job Description for {{$job->position}} at {{$job->company}}</u></h2><br><br>
            <p>Company Name:<b>{{$job->company}}</b></p>
            <p>Position:<b>{{$job->position}}</b></p>
            <p>Location:<b>{{$job->location}}</b></p>
            <p>Years of Experience:<b>{{$job->experience}}</b></p><br><br>
            <h2 class="h4 no-margin-bottom">About Company</h2><br><br>
            <p>{{$job->description}}</p><br><br>
            <h2 class="h4 no-margin-bottom">Qualifications</h2><br><br>
            <ul>
                @foreach ($job->qualifications as $qualification)
                    <li>{{$qualification->qualification}}</li>
                @endforeach
            </ul><br><br>

            <a href="" class="btn btn-primary">Apply Job</a>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>

          </div>
        </div>
        
      
      @include('alumni.layouts.footer')
      </div>
    </div>
    
    @include('alumni.layouts.script')

  </body>
</html>