@extends('dashboard')
@section('content')

   <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Membership Type</h4>
                  <a class="btn btn-primary" style="float:right" href="{{route('AddMemberType')}}">Add Type</a>
                </div>
                <div class="card-body">
                 
                  <table data-bs-toggle="table"
                    data-url="https://api.github.com/users/wenzhixin/repos?type=owner&amp;sort=full_name&amp;direction=asc&amp;per_page=100&amp;page=1"
                    data-sort-name="stargazers_count" data-height="280" data-mobile-responsive="true"
                    data-sort-order="desc" class="table">
                    <thead>
                      <tr>
                        <th data-field="name" data-sortable="true">Membership Type</th>
                        <th data-field="stargazers_count" data-sortable="true" data-width="100">
                          IsActive
                        </th>
                        <th data-field="forks_count" data-sortable="true" data-width="100">
                          Created At
                        </th>
                       <th data-field="forks_count" data-sortable="true" data-width="100">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($type as $type)
                      <tr>
                        <td>{{$type->MembershipType}}</td>
                        @if($type->IsActive==1)
                        <td>Active</td>
                        @else
                        <td>Not Active</td>
                        @endif
                        <td>{{$type->created_at}}</td>
                        <td><a href="{{route ('EditMembershipType',$type->id)}}" class="btn btn-secondary">Edit</a>
                             <a href="#" onclick="deleteEmployee({{ $type->id }})" class="btn btn-danger">Delete</a>
                            <form  id="employee-edit-action-{{ $type->id }}" action="{{ route('DeleteMembershipType',$type->id) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>
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