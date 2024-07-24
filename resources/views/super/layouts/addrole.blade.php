<!DOCTYPE html>
<html>
<head>
    <title>Add Role</title>
    @include('super.layouts.head')
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
                    <h2 class="h5 no-margin-bottom">Add Role</h2>
                    <section class="no-padding-top">
                        <div class="container-fluid">
                            <!-- Display validation errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Display success message -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('storerole') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Role Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="permissions">Permissions</label>
                                    <div id="permissions">
                                        @foreach($permissions as $permission)
                                            <div class="form-check">
                                                <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}"
                                                    class="form-check-input">
                                                <label for="permission_{{ $permission->id }}" class="form-check-label">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success">Create Role</button>
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



