@extends('dashboard')
@section('content')

   <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Withdraw</h4>
                </div>
                <div class="card-body">
    <div class="table-responsive">
    <table data-bs-toggle="table" data-url="https://api.github.com/users/wenzhixin/repos?type=owner&amp;sort=full_name&amp;direction=asc&amp;per_page=100&amp;page=1" data-sort-name="stargazers_count" data-height="280" data-sort-order="desc" class="table">
        <thead>
            <tr>
                <th data-field="forks_count" data-sortable="true" data-width="100">User</th>
                <th data-field="forks_count" data-sortable="true" data-width="100">Deposite Purpose</th>
                <th data-field="forks_count" data-sortable="true" data-width="100">Bank Title</th>
                <th data-field="stargazers_count" data-sortable="true" data-width="100">Withdraw Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($with as $withdraw)
            <tr>
                <td>{{ optional($withdraw->user)->Name ?? 'User Not Found' }}</td>
                <td>{{ optional($withdraw->purpose)->DepositePurpose ?? 'Purpose Not Found' }}</td>
                <td>{{ $withdraw->BankTitle }}</td>
                <td>{{ $withdraw->WithdrawAmount }}</td>
                <td>
                    @if ($withdraw->Status == 'pending')
                    <form action="{{ route('approvedWithDraw', ['with' => $withdraw->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger">Pending</button>
                    </form>
                    @else
                    {{ $withdraw->Status }}
                    @endif
                </td>
                <td>
                    <a href="#" onclick="deleteEmployee({{ $withdraw->id }})" class="btn btn-danger">Delete</a>
                    <form id="employee-edit-action-{{ $withdraw->id }}" action="{{ route('DeleteWithdraw',$withdraw->id) }}" method="post">
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
              </div>
        <script>
        function deleteEmployee(id) {
            if (confirm("Are you sure you want to delete?")) {
                document.getElementById('employee-edit-action-'+id).submit();
            }
        }
    </script>

@endsection