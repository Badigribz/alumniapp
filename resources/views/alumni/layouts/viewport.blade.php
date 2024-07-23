<!DOCTYPE html>
<html>
<head> 
    <title>Portfolio List</title>
    @include('alumni.layouts.head')
    <style>
        .page-header {
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

    <!-- Sidebar Navigation-->
    @include('alumni.layouts.sidebar')
    <!-- Sidebar Navigation end-->

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Portfolio List</h2>
                <section class="no-padding-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="block margin-bottom-sm">
                                    <div class="table-responsive"> 
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>My portfolio</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($portfolios as $portfolio)
                                                    <tr>
                                                        <td style="font-weight: bold;">{{ $portfolio->profession }}</td>
                                                        <td>
                                                            <form action="{{ route('deleteport', $portfolio->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                        <td><a class="btn btn-info" href="{{ url('editport', $portfolio->id) }}">Edit</a></td>
                                                        <td><a class="btn btn-warning" href="{{url('myportfolio')}}">View portfolio</a></td>
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
