@extends('dashboard')
@section('content')
 <div class="row">
            <!-- Weekly Stats -->
            <div class="col-lg-12 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-body">
                  <h5 class="card-title fw-semibold">Membership Plan Detail</h5>
                  <p class="card-subtitle mb-0"></p>
                    <a href="{{ route('EditMembership',$member->id)}}" class="btn btn-primary" style="float:right ;">Edit</a>

                    <a href="#" onclick="deleteEmployee({{ $member->id }})" class="btn btn-danger" style="float:right">Delete</a>
                            <form  id="employee-edit-action-{{ $member->id }}" action="{{ route('DeleteMembership',$member->id) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                  <div class="position-relative " style="top:30px">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">MemberName</h6>
                          <p class="fs-3 mb-0">{{$member->MemberName}}</p>
                        </div>
                      </div>
                      
                    </div>
                  
                  </div>
                   
                  <div class="position-relative " style="top:20px">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">MemberShip Type</h6>
                          <p class="fs-3 mb-0">{{$member->MemberShipType}}</p>
                        </div>
                      </div>
                      
                    </div>
                  
                  </div> 
                  <div class="position-relative " style="top:20px">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">Package Price</h6>
                          <p class="fs-3 mb-0">{{$member->price}}</p>
                        </div>
                      </div>
                      
                    </div>
                  
                  </div> 
                  <div class="position-relative " style="top:20px">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">Details</h6>
                          <p class="fs-3 mb-0">{{$member->Details}}</p>
                        </div>
                      </div>
                      
                    </div>
                  
                  </div> 
                  <div class="position-relative " style="top:20px">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">Daily Task</h6>
                          <p class="fs-3 mb-0">{{$member->DailyTask}}</p>
                        </div>
                      </div>
                      
                    </div>
                  
                  </div> 
                  <div class="position-relative " style="top:20px">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">Per Task Earning</h6>
                          <p class="fs-3 mb-0">{{$member->PerTaskEarning}}</p>
                        </div>
                      </div>
                      
                    </div>
                  
                  </div> 
                  <div class="position-relative " style="top:20px">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">Refferal Earning</h6>
                          <p class="fs-3 mb-0">{{$member->RefferalEarning}}</p>
                        </div>
                      </div>
                      
                    </div>
                  
                  </div> 
                  <div class="position-relative " style="top:20px">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">Tree Bonus</h6>
                          <p class="fs-3 mb-0">{{$member->TreeBonus}}</p>
                        </div>
                      </div>
                      
                    </div>
                  
                  </div> 
                  <div class="position-relative " style="top:20px">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">Plan EarningL imit</h6>
                          <p class="fs-3 mb-0">{{$member->PlanEarningLimit}}</p>
                        </div>
                      </div>
                      
                    </div>
                  
                  </div> 
                  <div class="position-relative " style="top:20px">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">Minimum Withdraw</h6>
                          <p class="fs-3 mb-0">{{$member->MinimumWithdraw}}</p>
                        </div>
                      </div>
                      
                    </div>
                  
                  </div> 
                  <div class="position-relative " style="top:20px">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">Minimum Deposit</h6>
                          <p class="fs-3 mb-0">{{$member->MinimumDeposit}}</p>
                        </div>
                      </div>
                      
                    </div>
                  
                  </div> 
                  <div class="position-relative " style="top:20px">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">Task Comission For Level One</h6>
                          <p class="fs-3 mb-0">{{$member->TaskComissionForLevelOne}}</p>
                        </div>
                      </div>
                      
                    </div>
                  
                  </div> 
                  <div class="position-relative " style="top:20px">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">Task Comission For Level Two</h6>
                          <p class="fs-3 mb-0">{{$member->TaskComissionForLevelTwo}}</p>
                        </div>
                      </div>
                      
                    </div>
                  
                  </div> 
                  <div class="position-relative " style="top:20px">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">One Dollar Is Equal To</h6>
                          <p class="fs-3 mb-0">{{$member->OneDollarIsEqualTo}}</p>
                        </div>
                      </div>
                      
                    </div>
                  
                  </div> 
                  <div class="position-relative " style="top:20px">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">One Cent Is Equal To</h6>
                          <p class="fs-3 mb-0">{{$member->OneCentIsEqualTo}}</p>
                        </div>
                      </div>
                      
                    </div>
                  
                  </div> 
                  <div class="position-relative " style="top:20px">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-light-primary rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-primary fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">Package Validity</h6>
                          <p class="fs-3 mb-0">{{$member->PackageValidity}}</p>
                        </div>
                      </div>
                      
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>
            <!-- Top Performers -->
          
          </div>
            <script>
        function deleteEmployee(id) {
            if (confirm("Are you sure you want to delete?")) {
                document.getElementById('employee-edit-action-'+id).submit();
            }
        }
    </script>
@endsection