@extends('dashboard')
@section('content')

   <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Task</h4>
                  <a class="btn btn-primary" style="float:right" href="{{route('AddTask')}}">Add Task</a>
                </div>
                <div class="card-body">
                 
                  <table data-bs-toggle="table"
                    data-url="https://api.github.com/users/wenzhixin/repos?type=owner&amp;sort=full_name&amp;direction=asc&amp;per_page=100&amp;page=1"
                    data-sort-name="stargazers_count" data-height="280" data-mobile-responsive="true"
                    data-sort-order="desc" class="table">
                    <thead>
                      <tr>
                       
                        <th data-field="stargazers_count" data-sortable="true" data-width="100">
                          Task Name
                        </th>
                        <th data-field="forks_count" data-sortable="true" data-width="100">
                         Description
                        </th>
                         <th data-field="forks_count" data-sortable="true" data-width="100">
                          Link

                        </th>
                         <th data-field="forks_count" data-sortable="true" data-width="100">
                         Amount
                        </th>
                         <th data-field="forks_count" data-sortable="true" data-width="100">
                         Level
                        </th>
                         <th data-field="forks_count" data-sortable="true" data-width="100">
                         Commission
                        </th>
                         <th data-field="forks_count" data-sortable="true" data-width="100">
                         Membership Type
                        </th>
                         <th data-field="forks_count" data-sortable="true" data-width="100">
                         Membership
                        </th>
                         <th data-field="forks_count" data-sortable="true" data-width="100">
                         Status
                        </th>
                          <th data-field="forks_count" data-sortable="true" data-width="100">
                         Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($task as $task)
                      <tr>
                        <td>{{$task->TaskName}}</td>
                         <td>{{$task->Description}}</td>
                          <td>{{$task->Link}}</td>
                           <td>{{$task->Amount}}</td>
                            <td>{{$task->Level}}</td>
                             <td>{{$task->Commission}}</td>
                              <td>
                                @if( $task && $task->type)
                              {{$task->type->MembershipType}}
                                @else 
                                null 
                                @endif

</td>
                               <td>
                                @if($task && $task->member)
                               
                               {{$task->member->MemberName}}
                              @else
                              null
                              @endif
                              </td>
                                <td>{{$task->Status}}</td>
                                      <td><a href="{{ route('EditTask',$task->id)}}" class="btn btn-secondary">Edit</a></td>
                                      <td>
                           <a href="#" onclick="deleteEmployee({{ $task->id }})" class="btn btn-danger">Delete</a>
                            <form  id="employee-edit-action-{{ $task->id }}" action="{{ route('DeleteTask',$task->id) }}" method="post">
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