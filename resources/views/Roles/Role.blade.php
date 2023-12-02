@extends('dashboard')
@section('content')

   <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Roles</h4>
                   <a class="btn btn-primary" style="float:right" href="{{route('AddRole')}}">Add Roles</a>
                </div>
                <div class="card-body">
                 
                  <table data-bs-toggle="table"
                    data-url="https://api.github.com/users/wenzhixin/repos?type=owner&amp;sort=full_name&amp;direction=asc&amp;per_page=100&amp;page=1"
                    data-sort-name="stargazers_count" data-height="280" data-mobile-responsive="true"
                    data-sort-order="desc" class="table">
                    <thead>
                      <tr>
                        <th data-field="name" data-sortable="true">Roles</th>
                      
                   
                       <th data-field="forks_count" data-sortable="true" data-width="100">
                        Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($role as $role)
                      
                      
                        <td>
                            {{$role->Role}}                         
                        </td>
                        <td>
                          <a href="{{route('EditRole',$role->id)}}" class="btn btn-primary">Edit</a>
                         
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
    <script>
        function deleteEmployee(id) {
            if (confirm("Are you sure you want to delete?")) {
                document.getElementById('employee-edit-action-'+id).submit();
            }
        }
    </script>
@endsection