@extends('dashboard')
@section('content')

<div class="row">
              <div class="col-lg-12">
                <!-- ---------------------
                                                    start Person Info
                                                ---------------- -->
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Edit Wallet Transaction</h4>
                    
                  </div>
                  
                  <form action="{{route('UpdateWalletTrans',$trans->id)}}" method="post"  >
                    @csrf
                     @method('put')
                  
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
                              <label>Wallet Id</label>
                              <select name="WalletId" class="form-control" >
                                @foreach($wallet as $wallet)
                                <option value="{{$wallet->id}}">{{$wallet->user->Name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <!--/span-->
                        
                          <!--/span-->
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Deposit Amount</label>
                              <select name="DepositAmount" class="form-control" >
                                @foreach($amount as $amount)
                                <option value="{{$amount->id}}">{{$amount->DepositeAmount}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Status</label>
                            
                                   <select name="Status"  class="form-control" >
                           
                                   
                                <option value="Not Active"  >Not Active</option>
                         
                                 <option value="Active"  >Active</option>
                                 
                              
                              </select>
                            </div>
                          </div>
                          <!--/span-->
                        </div>
                     
                    <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Deposit To</label>
                              <input type="date" name="DepositTo" value="{{$trans->DepositTo}}"  class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Deposit From</label>
                              <input type="date" name="DepositFrom" value="{{$trans->DepositFrom}}"  class="form-control"  />
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