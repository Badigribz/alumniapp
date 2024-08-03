<!DOCTYPE html>
<html>
  <head> 
    <title> Edit Job posting </title>
    
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
            <h2 class="h5 no-margin-bottom">Edit Job Posting</h2>
            <section class="no-padding-top">
            <div class="container-fluid">
                <div class="row">
                    <!-- Form Elements -->
                    <div class="col-lg-12">
                    <div class="block">
                            <div class="block-body">
                                <form class="form-horizontal" method="post" action="{{url('jobedit',$job->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-6 form-control-label">Name of Company</label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" name="company" value="{{$job->company}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 form-control-label">Job location</label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" name="location" value="{{$job->location}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 form-control-label">Company Description</label>
                                        <div class="col-lg-12">
                                            <textarea type="text" class="form-control" name="description" value="{{$job->description}}">{{$job->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 form-control-label">Job category</label>
                                        <div class="col-lg-12">
                                            <select name="category" class="form-control mb-3 mb-3" value="{{$job->description}}">
                                                <option value="Cyber Security" {{ $job->category == 'Cyber Security' ? 'selected' : '' }}>Cyber Security</option>
                                                <option value="Software Development" {{ $job->category == 'Software Development' ? 'selected' : '' }}>Software Development</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 form-control-label">Job position</label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" name="position" value="{{$job->position}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 form-control-label">Years of Experience</label>
                                        <div class="col-lg-12">
                                            <input type="number" class="form-control" name="experience" value="{{$job->experience}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                                <label class="col-sm-6 form-control-label">Qualifications needed</label>
                                                <div class="col-lg-12" id="qualifications">
                                                    @foreach ($job->qualifications as $qualification)
                                                        <div class="qualification-input">
                                                            <input type="text" name="qualifications[]" class="form-control" value="{{ $qualification->qualification }}">
                                                            <button type="button" onclick="removeQualification(this)">Remove</button>
                                                        </div>
                                                    @endforeach
                                                    <button type="button" onclick="addQualification()">Add More</button>
                                                </div>
                                            </div>
                                    <button type="submit" class="btn btn-secondary">Update</button>
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