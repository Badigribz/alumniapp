<!DOCTYPE html>
<html>
<head> 
    <title>Edit Portfolio</title>
    @include('alumni.layouts.head')
    <style>
        .page-header {
            background-color: white;
        }
        .block-body {
            background-color: white;
        }
        .block {
            background-color: white;
        }
    </style>
</head>
<body>
    <header class="header">   
        @include('alumni.layouts.navbar')
    </header>
    <div class="d-flex align-items-stretch">
        @include('alumni.layouts.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Edit Portfolio</h2>
                    <section class="no-padding-top">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="block">
                                        <div class="block-body">
                                            <form method="post" action="{{ url('portedit', $portfolio->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ old('name', $portfolio->user->name) }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $portfolio->phone_number) }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{ old('email', $portfolio->user->email) }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Profession</label>
                                                    <input type="text" name="profession" class="form-control" value="{{ old('profession', $portfolio->profession) }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <textarea name="about_me" class="form-control" required>{{ old('about_me', $portfolio->about_me) }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Services Offered</label>
                                                    <div id="services">
                                                        @foreach($portfolio->services as $index => $service)
                                                            <div class="service">
                                                                <input type="text" name="services[{{ $index }}][service]" class="form-control" value="{{ old('services.'.$index.'.service', $service->service) }}" placeholder="Service" required><br>
                                                                <textarea name="services[{{ $index }}][description]" class="form-control" placeholder="Description">{{ old('services.'.$index.'.description', $service->description) }}</textarea><br>
                                                                <button type="button" class="btn btn-secondary" onclick="removeElement(this)">Remove</button><br>
                                                            </div>
                                                        @endforeach
                                                    </div><br>
                                                    <button type="button" class="btn btn-warning" onclick="addService()">Add Service</button>
                                                </div>
                                                <div class="form-group">
                                                    <label>Links to Previous Works</label>
                                                    <div id="links">
                                                        @foreach($portfolio->links as $index => $link)
                                                            <div class="link">
                                                                <input type="text" name="links[{{ $index }}][work_category]" class="form-control" value="{{ old('links.'.$index.'.work_category', $link->work_category) }}" placeholder="Work Category"><br>
                                                                <input type="text" name="links[{{ $index }}][link]" class="form-control" value="{{ old('links.'.$index.'.link', $link->link) }}" placeholder="Link" required><br>
                                                                <button type="button" class="btn btn-secondary" onclick="removeElement(this)">Remove</button><br>
                                                            </div>
                                                        @endforeach
                                                    </div><br>
                                                    <button type="button" class="btn btn-warning" onclick="addLink()">Add Link</button>
                                                </div>
                                                <div class="form-group">
                                                    <label>CV Upload</label>
                                                    <input type="file" name="cv" class="form-control">
                                                </div><br><br>
                                                <button type="submit" class="btn btn-primary">Update Portfolio</button>
                                            </form>
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
    <script>
        function addService() {
            var index = document.querySelectorAll('.service').length;
            var div = document.createElement('div');
            div.className = 'service';
            div.innerHTML = '<input type="text" name="services[' + index + '][service]" class="form-control" placeholder="Service" required><br>' +
                            '<textarea name="services[' + index + '][description]" class="form-control" placeholder="Description"></textarea><br>' +
                            '<button type="button" class="btn btn-secondary" onclick="removeElement(this)">Remove</button><br>';
            document.getElementById('services').appendChild(div);
        }

        function addLink() {
            var index = document.querySelectorAll('.link').length;
            var div = document.createElement('div');
            div.className = 'link';
            div.innerHTML = '<input type="text" name="links[' + index + '][work_category]" class="form-control" placeholder="Work Category"><br>' +
                            '<input type="text" name="links[' + index + '][link]" class="form-control" placeholder="Link" required><br>' +
                            '<button type="button" class="btn btn-secondary" onclick="removeElement(this)">Remove</button><br>';
            document.getElementById('links').appendChild(div);
        }

        function removeElement(button) {
            button.parentElement.remove();
        }
    </script>
</body>
</html>
