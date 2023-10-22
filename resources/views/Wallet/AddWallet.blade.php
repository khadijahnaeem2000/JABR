@extends('dashboard')
@section('content')

<div class="row">
              <div class="col-lg-12">
                <!-- ---------------------
                                                    start Person Info
                                                ---------------- -->
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Add Wallet</h4>
                    
                  </div>
                  
                  <form action="{{route('StoreWallet')}}" method="post"  >
                    @csrf
                   
                  
                      <hr />
                      <div class="card-body">
                         <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>User Id</label>
                               <select name="UserId" class="form-control" >
                                @foreach($user as $user)
                                <option value="{{$user->id}}">{{$user->Name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                             <div class="col-md-6">
                            <div class="mb-3">
                              <label>Amount</label>
                              <input type="text" name="Amount" class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                        
                          <!--/span-->
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>DepositPurpose</label>
                              <select name="DepositPurpose" class="form-control" >
                                @foreach($purpose as $purpose)
                                <option value="{{$purpose->id}}">{{$purpose->DepositePurpose}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Status</label>
                              <input type="text" name="price"  class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
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