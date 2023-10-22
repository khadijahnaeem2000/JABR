@extends('dashboard')
@section('content')

   <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Wallet Transaction</h4>
<a class="btn btn-primary" style="float:right" href="{{route('AddWalletTrans')}}">Add Wallet Transaction</a>
                </div>
                <div class="card-body">
                 
                  <table data-bs-toggle="table"
                    data-url="https://api.github.com/users/wenzhixin/repos?type=owner&amp;sort=full_name&amp;direction=asc&amp;per_page=100&amp;page=1"
                    data-sort-name="stargazers_count" data-height="280" data-mobile-responsive="true"
                    data-sort-order="desc" class="table">
                    <thead>
                      <tr>
                        <th data-field="name" data-sortable="true">User </th>
                        <th data-field="stargazers_count" data-sortable="true" data-width="100">
                          Deposit Amount
                        </th>
                        <th data-field="forks_count" data-sortable="true" data-width="100">
                          Wallet 
                        </th>
                          <th data-field="forks_count" data-sortable="true" data-width="100">
                          Deposit From
                        </th>
                          <th data-field="forks_count" data-sortable="true" data-width="100">
                         Deposit To
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
                      @foreach($trans as $trans)
                      <tr>
                       @if($trans->UserId)
            <td>{{ $trans->user->Name }}</td>
        @else
            <td>Null</td>
        @endif
                        
                          @if($trans->DepositAmount )
                            <td>{{$trans->depositamount->DepositeAmount}}</td>
                        
                        @else
                      <td>Null</td>
                        @endif

                    <td>
            @if ($trans->WalletId)
                @if ($trans->wallet->UserId)
                    {{ $trans->wallet->user->Name }}
                @else
                    Null
                @endif
            @else
                Null
            @endif
        </td>
                       <td>{{$trans->DepositFrom}}</td>
                        <td>{{$trans->DepositTo}}</td>
                    

                         <td>{{$trans->Status}}</td>
                        <td><a href="{{route ('EditWalletTrans',$trans->id)}}" class="btn btn-secondary">Edit</a>
                             <a href="#" onclick="deleteEmployee({{ $trans->id }})" class="btn btn-danger">Delete</a>
                            <form  id="employee-edit-action-{{ $trans->id }}" action="{{ route('DeleteWalletTrans',$trans->id) }}" method="post">
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