@extends('dashboard')
@section('content')

   <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Letter Head</h4>
                   <a class="btn btn-primary" style="float:right" href="{{route('AddLetterHead')}}">Add Bank Information</a>
                </div>
                <div class="card-body">
                 
                  <table data-bs-toggle="table"
                    data-url="https://api.github.com/users/wenzhixin/repos?type=owner&amp;sort=full_name&amp;direction=asc&amp;per_page=100&amp;page=1"
                    data-sort-name="stargazers_count" data-height="280" data-mobile-responsive="true"
                    data-sort-order="desc" class="table">
                    <thead>
                      <tr>
                        <th data-field="name" data-sortable="true">Name</th>
                            <th data-field="stargazers_count" data-sortable="true" data-width="100">
                         Image
                        </th>
                        <th data-field="stargazers_count" data-sortable="true" data-width="100">
                         Address
                        </th>
                          <th data-field="stargazers_count" data-sortable="true" data-width="100">
                         Contact Information
                        </th>
                         <th data-field="stargazers_count" data-sortable="true" data-width="100">
                          Legal Information
                        </th>
                         <th data-field="stargazers_count" data-sortable="true" data-width="100">
                          Additional Information
                        </th>
                       <th data-field="forks_count" data-sortable="true" data-width="100">
                        Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($letter as $letter)
                      <tr>
                        <td>
                     {{$letter->Name}}
                        </td>
                     
                        <td>
                        {{$letter->Image}}
                        </td>
                        <td>
                    {{$letter->Address}}
                        </td>
                          <td>
                    {{$letter->ContactInformation}}
                        </td>
                            <td>
                    {{$letter->LegalInformation}}
                        </td>
                            <td>
                    {{$letter->AdditionalInformation}}
                        </td>
                            
                        <td>
                          <a href="{{route('EditLetterHead',$letter->id)}}" class="btn btn-primary">Edit</a>
                            
                            <a href="#" onclick="deleteEmployee({{ $letter->id }})" class="btn btn-danger">Delete</a>
                            <form  id="employee-edit-action-{{ $letter->id }}" action="{{ route('DeleteLetterHead',$letter->id) }}" method="post">
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