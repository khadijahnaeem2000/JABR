@extends('dashboard')
@section('content')

   <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Upload Task</h4>
                  
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
                        User
                        </th>
                         <th data-field="forks_count" data-sortable="true" data-width="100">
                        Image
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
                      @foreach($upload as $upload)
                      <tr>
                        <td>
                      @if($upload && $upload->task)
    {{$upload->task->TaskName}}
@else
    null
@endif


                  </td>
                         <td>
                          @if($upload && $upload->user)
                         {{$upload->user->Name}}
                        @else 
                        null
                        @endif
                        </td>
                          <td>{{$upload->Image}}</td>
                                            <td>@if ($upload->Status == 'pending')

        <form action="{{ route('approvedTask', ['upload' => $upload->id]) }}" method="POST">
            @csrf
            @method('PUT') {{-- Use the appropriate HTTP method, e.g., PUT or POST --}}
            
            {{-- Add your form fields here, e.g., input fields or other form elements --}}
            
            <button type="submit" class="btn btn-danger" >Pending</button>
        </form>

    @else
                           {{$upload->Status}}
@endif</td>   
                                     
                                      <td>
                           <a href="#" onclick="deleteEmployee({{ $upload->id }})" class="btn btn-danger">Delete</a>
                            <form  id="employee-edit-action-{{ $upload->id }}" action="{{ route('DeleteUploadTask',$upload->id) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                       </td>
                        

                      </tr>
                      @endforeach
                    </tbody>
                                            @if(session('success'))
   
        <p style="color: green;">{{ session('success') }}</p>
  
@elseif(session('error'))
        <p style="color: red;">{{ session('error') }}</p>

@endif
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