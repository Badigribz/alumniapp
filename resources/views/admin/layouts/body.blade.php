<section class="no-padding-top no-padding-bottom">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-user-1"></i></div><strong>No. of SuperUser</strong>
            </div>
            <div class="number dashtext-1">{{$super}}</div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-user-1"></i></div><strong>No. of Admins</strong>
            </div>
            <div class="number dashtext-2">{{$admin}}</div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-user-1"></i></div><strong>No. of Alumni</strong>
            </div>
            <div class="number dashtext-3">{{$alumni}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="no-padding-top no-padding-bottom">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-md-6">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-clipboard"></i></div>
              <strong>View Users</strong>
            </div>
          </div>
          
          <div class="borrow-request-preview">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userDetails as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->role }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><br>
          
        </div>
      </div>

      
      <div class="col-md-6">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-clipboard"></i></div>
              <strong>View Roles </strong>
            </div>
          </div>
          
          <div class="borrow-request-preview">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Role ID</th>
                                <th>Role Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roleDetails as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><br>
         
        </div>
      </div>
    </div>
  </div>



  <div class="col-md-6">
        <div class="statistic-block block">
          <div class="progress-details d-flex align-items-end justify-content-between">
            <div class="title">
              <div class="icon"><i class="icon-clipboard"></i></div>
              <strong>View Permissions </strong>
            </div>
          </div>
          
          <div class="borrow-request-preview">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Permission ID</th>
                                <th>Permission Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permDetails as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div><br>
        </div>
      </div>
    </div>
  </div>
        
    </div>
    </div>
</section>
