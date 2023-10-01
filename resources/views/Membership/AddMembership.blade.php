@extends('dashboard')
@section('content')

<div class="row">
              <div class="col-lg-12">
                <!-- ---------------------
                                                    start Person Info
                                                ---------------- -->
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Add Membership</h4>
                    
                  </div>
                  
                  <form action="{{route('StoreMembership')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                   
                  
                      <hr />
                      <div class="card-body">
                         <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Member Name</label>
                              <input type="text" name="MemberName" class="form-control" />
                            </div>
                          </div>
                             <div class="col-md-6">
                            <div class="mb-3">
                              <label>Image</label>
                              <input type="file" name="image" class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                        
                          <!--/span-->
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Membership Type</label>
                              <select name="MemberShipType" class="form-control" >
                                @foreach($type as $type)
                                <option value="{{$type->id}}">{{$type->MembershipType}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Price</label>
                              <input type="text" name="price"  class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                        </div>
                     
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Details</label>
                              <input type="text" name="Details" class="form-control" />
                            </div>
                          </div>
                          <!--/span-->
                            <div class="col-md-6">
                            <div class="mb-3">
                              <label>Daily Task</label>
                              <input type="text" name="DailyTask" class="form-control" />
                            </div>
                          </div>
                               
                              <input type="text" name="IsActive" value="1" class="form-control" hidden />
                          
                          <!--/span-->
                        </div>
                          <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Per Task Earning</label>
                              <input type="text" name="PerTaskEarning" class="form-control" />
                            </div>
                          </div>
                             <div class="col-md-6">
                            <div class="mb-3">
                              <label>Refferal Earning</label>
                              <input type="text" name="RefferalEarning" class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                          <!--/span-->
                        </div>
                     <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>Minimum Withdraw</label>
                        <input type="text" name="MinimumWithdraw" class="form-control" />
                      </div>
                    </div>
                       <div class="col-md-6">
                      <div class="mb-3">
                        <label>Minimum Deposit</label>
                        <input type="text" name="MinimumDeposit" class="form-control"  />
                      </div>
                    </div>
                    </div>
                        <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>Tree Bonus</label>
                        <input type="text" name="TreeBonus" class="form-control" />
                      </div>
                    </div>
                       <div class="col-md-6">
                      <div class="mb-3">
                        <label>Plan Earning Limit</label>
                        <input type="text" name="PlanEarningLimit" class="form-control"  />
                      </div>
                    </div>
                    </div>
                        <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>Task Comission For Level One</label>
                        <input type="text" name="TaskComissionForLevelOne" class="form-control" />
                      </div>
                    </div>
                       <div class="col-md-6">
                      <div class="mb-3">
                        <label>Task Comission For Level Two</label>
                        <input type="text" name="TaskComissionForLevelTwo" class="form-control"  />
                      </div>
                    </div>
                    </div>
                       <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label>One Dollar Is Equal To</label>
                        <input type="text" name="OneDollarIsEqualTo" class="form-control" />
                      </div>
                    </div>
                       <div class="col-md-6">
                      <div class="mb-3">
                        <label>One Cent Is Equal To</label>
                        <input type="text" name="OneCentIsEqualTo" class="form-control"  />
                      </div>
                    </div>
                    </div>
                         <div class="row">
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label>Package Validity</label>
                        <input type="text" name="PackageValidity" class="form-control" />
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