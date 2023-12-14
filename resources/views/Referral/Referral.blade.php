@extends('dashboard')
@section('content')

   <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Referral  </h4>
            
                </div>
                <div class="card-body">
                 
                  <table data-bs-toggle="table"
                    data-url="https://api.github.com/users/wenzhixin/repos?type=owner&amp;sort=full_name&amp;direction=asc&amp;per_page=100&amp;page=1"
                    data-sort-name="stargazers_count" data-height="280" data-mobile-responsive="true"
                    data-sort-order="desc" class="table">
                    <thead>
                      <tr>
                        <th data-field="name" data-sortable="true">User</th>
                        <th data-field="stargazers_count" data-sortable="true" data-width="100">
                          Referral 
                        </th>
                  
                   
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($referal as $referal)
                      <tr>
                            <td>
                          @if($referal && $referal->user)
                         {{$referal->user->Name}}
                        @else 
                        null
                        @endif
                        </td>
                      
                        <td>{{$referal->RefferalCode}}</td>
                        <td>
                      
                        </td>

         
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

@endsection