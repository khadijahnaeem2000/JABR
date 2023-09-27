@extends('dashboard')
@section('content')

<div class="row">
              <div class="col-lg-12">
                <!-- ---------------------
                                                    start Person Info
                                                ---------------- -->
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Edit Membership</h4>
                    
                  </div>
                  
                  <form action="{{route('UpdateMembership',$membership->id)}}" method="post"  enctype="multipart/form-data">
                    @csrf
                   @method('put')
                  
                      <hr />
                      <div class="card-body">
                         <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Member Name</label>
                              <input type="text" name="MemberName" value="{{$membership->MemberName}}" class="form-control" />
                            </div>
                          </div>
                             <div class="col-md-6">
                            <div class="mb-3">
                              <label>Image</label>
                              <input type="file" name="image" class="form-control"  />
                                 
                        @if($membership->image != '' && file_exists(public_path().'/uploads/membership/'.$membership->image))
                        <img src="{{ url('uploads/member/'.$membership->image) }}" alt="" width="100" height="100" class="mt-3">
                        @endif
                            </div>
                          </div>
                          <!--/span-->
                        
                          <!--/span-->
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Membership Type</label>
                              <input type="text" name="MemberShipType" value="{{$membership->MemberShipType}}" class="form-control" />
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Price</label>
                              <input type="text" name="price"  value="{{$membership->price}}" class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Details</label>
                              <input type="text" name="Details" value="{{$membership->Details}}" class="form-control" />
                            </div>
                          </div>
                          <!--/span-->
                            <div class="col-md-6">
                            <div class="mb-3">
                              <label>Daily Task</label>
                              <input type="text" name="DailyTask" value="{{$membership->DailyTask}}"class="form-control" />
                            </div>
                          </div>
                               
                              <input type="text" name="IsActive" value="1" class="form-control" hidden />
                          
                          <!--/span-->
                        </div>
                          <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Per Task Earning</label>
                              <input type="text" name="PerTaskEarning" value="{{$membership->PerTaskEarning}}" class="form-control" />
                            </div>
                          </div>
                             <div class="col-md-6">
                            <div class="mb-3">
                              <label>Refferal Earning</label>
                              <input type="text" name="RefferalEarning" value="{{$membership->RefferalEarning}}" class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                          <!--/span-->
                        </div>
                     <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>Minimum Withdraw</label>
                        <input type="text" name="MinimumWithdraw" value="{{$membership->MinimumWithdraw}}" class="form-control" />
                      </div>
                    </div>
                       <div class="col-md-6">
                      <div class="mb-3">
                        <label>Minimum Deposit</label>
                        <input type="text" name="MinimumDeposit" value="{{$membership->MinimumDeposit}}" class="form-control"  />
                      </div>
                    </div>
                    </div>
                        <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>Tree Bonus</label>
                        <input type="text" name="TreeBonus" class="form-control" value="{{$membership->TreeBonus}}"/>
                      </div>
                    </div>
                       <div class="col-md-6">
                      <div class="mb-3">
                        <label>Plan Earning Limit</label>
                        <input type="text" name="PlanEarningLimit" class="form-control" value="{{$membership->PlanEarningLimit}}" />
                      </div>
                    </div>
                    </div>
                        <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>Task Comission For Level One</label>
                        <input type="text" name="TaskComissionForLevelOne" class="form-control"value="{{$membership->TaskComissionForLevelOne}}" />
                      </div>
                    </div>
                       <div class="col-md-6">
                      <div class="mb-3">
                        <label>Task Comission For Level Two</label>
                        <input type="text" name="TaskComissionForLevelTwo" class="form-control" value="{{$membership->TaskComissionForLevelTwo}}" />
                      </div>
                    </div>
                    </div>
                       <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>One Dollar Is Equal To</label>
                        <input type="text" name="OneDollarIsEqualTo" class="form-control"value="{{$membership->OneDollarIsEqualTo}}" />
                      </div>
                    </div>
                       <div class="col-md-6">
                      <div class="mb-3">
                        <label>One Cent Is Equal To</label>
                        <input type="text" name="OneCentIsEqualTo" class="form-control" value="{{$membership->OneCentIsEqualTo}}" />
                      </div>
                    </div>
                    </div>
                         <div class="row">
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label>Package Validity</label>
                        <input type="text" name="PackageValidity" class="form-control"value="{{$membership->PackageValidity}}" />
                      </div>
                    </div>
                     
                    </div>
               
                      <div class="form-actions">
                        <div class="card-body border-top">
                          <button
                            type="submit"
                            class="btn btn-success rounded-pill px-4"
                          >
                            <div class="d-flex align-items-center">
                              <i class="ti ti-device-floppy me-1 fs-4"></i>
                              Save
                            </div>
                          </button>
                          
                        </div>
                      </div>
                     </div>
                  </form>
                </div>
                <!-- ---------------------
                                                    end Person Info
                                                ---------------- -->
              </div>
            </div>
@endsection