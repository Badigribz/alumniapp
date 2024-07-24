<!DOCTYPE html>
<html>
<head>
    <title>Edit Permission</title>
    @include('super.layouts.head')
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
        @include('super.layouts.navbar')
    </header>

    <div class="d-flex align-items-stretch">
        @include('super.layouts.sidebar')

        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Edit Permission</h2>
                    <section class="no-padding-top">
                        <div class="container-fluid">
                            <form action="{{ route('updatepermission', $permission->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Permission Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $permission->name }}" required>
                                </div>
                                <button type="submit" class="btn btn-success">Update Permission</button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    @include('super.layouts.footer')
    @include('super.layouts.script')
</body>
</html>

