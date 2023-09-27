@extends('dashboard')
@section('content')

   <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Membership</h4>
                   <a class="btn btn-primary" style="float:right" href="{{route('AddMembership')}}">Add Membership</a>
                </div>
                <div class="card-body">
                 
                  <table data-bs-toggle="table"
                    data-url="https://api.github.com/users/wenzhixin/repos?type=owner&amp;sort=full_name&amp;direction=asc&amp;per_page=100&amp;page=1"
                    data-sort-name="stargazers_count" data-height="280" data-mobile-responsive="true"
                    data-sort-order="desc" class="table">
                    <thead>
                      <tr>
                        <th data-field="name" data-sortable="true">Membership Name</th>
                        <th data-field="stargazers_count" data-sortable="true" data-width="100">
                          Image
                        </th>
                          <th data-field="stargazers_count" data-sortable="true" data-width="100">
                          Membership Type
                        </th>
                         <th data-field="stargazers_count" data-sortable="true" data-width="100">
                          Price
                        </th>
                         <th data-field="stargazers_count" data-sortable="true" data-width="100">
                         Details
                        </th>
                       
                        <th data-field="forks_count" data-sortable="true" data-width="100">
                        IsActive
                        </th>
                       <th data-field="forks_count" data-sortable="true" data-width="100">
                        Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($member as $member)
                      <tr>
                        <td>
                        {{$member->MemberName}}
                        </td>
                        <td>
                             @if($member->image != '' && file_exists(public_path().'/uploads/member/'.$member->image))
                            <img src="{{ url('uploads/member/'.$member->image) }}" alt="" width="40" height="40" class="rounded-circle">
                            @else
                            <img src="{{ url('images/no-image.png') }}" alt="" width="40" height="40" class="rounded-circle">
                            @endif
                        </td>
                        <td>
                          {{$member->MemberShipType}}
                        </td>
                        <td>
                          {{$member->price}}
                        </td>
                        <td>
                          {{$member->Details}}
                        </td>
                      
                        <td>
                          @if($member->IsActive == 1)
                           Active
                           @else
                            Not Active 
                          @endif                          
                        </td>
                        <td>
                          <a href="{{ route('EditMembership',$member->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('DetailMembership',$member->id)}}" class="btn btn-secondary">Detail</a>
                            <a href="#" onclick="deleteEmployee({{ $member->id }})" class="btn btn-danger">Delete</a>
                            <form  id="employee-edit-action-{{ $member->id }}" action="{{ route('DeleteMembership',$member->id) }}" method="post">
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