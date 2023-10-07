@extends('dashboard')
@section('content')

   <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Deposit Amount</h4>
                </div>
                <div class="card-body">
                 
                  <table data-bs-toggle="table"
                    data-url="https://api.github.com/users/wenzhixin/repos?type=owner&amp;sort=full_name&amp;direction=asc&amp;per_page=100&amp;page=1"
                    data-sort-name="stargazers_count" data-height="280" data-mobile-responsive="true"
                    data-sort-order="desc" class="table">
                    <thead>
                      <tr>
                        <th data-field="name" data-sortable="true">Deposit Purpose</th>
                        <th data-field="stargazers_count" data-sortable="true" data-width="100">
                          Deposit Amount
                        </th>
                        <th data-field="forks_count" data-sortable="true" data-width="100">
                          Deposit Amount In Dollar
                        </th>
                       <th data-field="forks_count" data-sortable="true" data-width="100">
                          Payment Recipt
                        </th>
                         <th data-field="forks_count" data-sortable="true" data-width="100">
                          Transaction Id
                        </th>
                         <th data-field="forks_count" data-sortable="true" data-width="100">
                         Status
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($amount as $amount)
                      <tr>
                        @if($amount->DepositPurpose == "")
                        <td>Null</td>
                        @else
                        <td>{{$amount->depositPurpose->DepositePurpose}}</td>
                        @endif
                        <td>{{$amount->DepositeAmount}}</td>
                        <td>{{$amount->DepositAmountDollar}}</td>
                          <td>  @if($amount->PaymentRecipt != '' && file_exists(public_path().'/Pay/payments/'.$amount->PaymentRecipt))
                            <img src="{{ url('Pay/payments/'.$amount->PaymentRecipt) }}" alt="" width="40" height="40" class="rounded-circle">
                            @else
                            <img src="{{ url('images/no-image.png') }}" alt="" width="40" height="40" class="rounded-circle">
                            @endif</td>
                            <td>{{$amount->TransactionID}}</td>
                              <td>{{$amount->Status}}</td>
                                   <td>
                      <a href="{{route ('EditDepositAmount',$amount->id)}}" class="btn btn-secondary">Edit</a>
                             <a href="#" onclick="deleteEmployee({{ $amount->id }})" class="btn btn-danger">Delete</a>
                            <form  id="employee-edit-action-{{ $amount->id }}" action="{{ route('DeleteDepositAmount',$amount->id) }}" method="post">
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