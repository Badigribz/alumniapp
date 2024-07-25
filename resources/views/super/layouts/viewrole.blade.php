<!DOCTYPE html>
<html>
  <head>
    <title> Roles</title>

    @include('super.layouts.head')
    <style>
        .cat_table {
          text-align: center;
          margin: auto;
          width: 100%;
        }
        th {
          background: #b5406c;
          color: white;
        }
        .img_book {
          width: 80px;
          height: auto;
        }
        table {
          width: 100%;
        }
        .filter-form {
          margin-bottom: 20px;
          text-align: center;
        }
        .filter-form input,
        .filter-form select {
          margin: 5px;
          padding: 5px;
          border-radius: 5px;
          border: 1px solid #ccc;
        }
        .filter-form button {
          padding: 5px 10px;
          border-radius: 5px;
          border: none;
          background-color: #b5406c;
          color: #fff;
          cursor: pointer;
        }
        .btn-sm:disabled {
          pointer-events: none;
          opacity: 0.5;
          color: #aaa; /* Optional: change the color to a lighter grey */
        }
        @media (max-width: 768px) {

          .filter-form input,
          .filter-form select,
          .filter-form button {
            width: 100%;
            margin: 5px 0;
          }

        }

      </style>
  </head>

  <body>

    <header class="header">
      @include('super.layouts.navbar')
    </header>

    <div class="d-flex align-items-stretch">

      <!-- Sidebar Navigation-->
      @include('super.layouts.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Roles</h2>
            <a href="{{ route('createrole') }}" class="btn btn-primary">Add Role</a>
            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-9">
                        <div class="block margin-bottom-sm">
                            <div class="table-responsive">
                                <table class="table" id="borrowTable">
                                  <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                            @can('update-role')
                                                <a href="{{ route('editrole', $role->id) }}" class="btn btn-warning">Edit</a>
                                            @endcan
                                            @can('delete-role')
                                                <form action="{{ route('deleterole', $role->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            @endcan
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

      @include('super.layouts.footer')
      </div>
    </div>

    @include('super.layouts.script')
  </body>
</html>




