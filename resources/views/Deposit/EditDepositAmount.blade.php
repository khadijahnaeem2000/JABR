@extends('dashboard')
@section('content')

<div class="row">
              <div class="col-lg-12">
                <!-- ---------------------
                                                    start Person Info
                                                ---------------- -->
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Edit Deposit Purpose</h4>
                   
                  </div>
                  
             <form action="{{route('UpdateDepositAmount',$amount->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                   @method('put')
                  
                      <hr />
                      <div class="card-body">
                         <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Deposit Amount</label>
                              <input type="text" name="DepositeAmount" value="{{$amount->DepositeAmount}}" class="form-control" />
                            </div>
                          </div>
                             <div class="col-md-6">
                            <div class="mb-3">
                              <label>Payment Reciept</label>
                              <input type="file" name="PaymentReciept" value="{{$amount->PaymentReciept}}" class="form-control"  />
                         @if($amount->image != '' && file_exists(public_path().'/uploads/Payemnts/'.$amount->image))
                        <img src="{{ url('uploads/Payments/'.$amount->image) }}" alt="" width="100" height="100" class="mt-3">
                        @endif
                            </div>
                          </div>
                          <!--/span-->
                        
                          <!--/span-->
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Deposit Purpose</label>
                              <input type="text" name="DepositePurpose" value="{{$amount->DepositePurpose}}" class="form-control" />
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Deposit Amount Dollar</label>
                              <input type="text" name="DepositAmountDollar"  value="{{$amount->DepositAmountDollar}}" class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>TransactionID</label>
                              <input type="text" name="TransactionID" value="{{$amount->TransactionID}}" class="form-control" />
                            </div>
                          </div>
                          <!--/span-->
                            <div class="col-md-6">
                            <div class="mb-3">
                              <label>Status</label>
                              <input type="text" name="Status" value="{{$amount->Status}}"class="form-control" />
                            </div>
                          </div>
                               
                             
                          
                          <!--/span-->
                        </div>
                         
                          <!--/span-->
                        
                   
               
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