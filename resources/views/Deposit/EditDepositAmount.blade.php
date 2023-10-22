@extends('dashboard')
@section('content')

<div class="row">
              <div class="col-lg-12">
                <!-- ---------------------
                                                    start Person Info
                                                ---------------- -->
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Edit Deposit Amount</h4>
                   
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
                              <input type="number" name="DepositeAmount" value="{{$amount->DepositeAmount}}" class="form-control" />
                              
                            </div>
                          </div>
                  
                                                   <div class="col-md-3">
                            <div class="mb-3">
                              <label>Payment Reciept</label>
                              <input type="file" name="PaymentReciept"id="imageInput" class="form-control"  />

                            </div>
                          </div>
                          <div class="col-md-3">        <img  id="imagePreview"src="{{ url('Pay/payments/'.$amount->PaymentReciept) }}" alt="" width="100" height="100" class="mt-3" style="border-radius: 50%;"></div>
                          <!--/span-->
                        </div>
                   
                              <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>User</label>
                             
                                 <select name="user_Id"  class="form-control" >
                                @foreach($user as $user)
                              
                                <option value="{{$user->id}}"  @if($user->id == $amount->user_Id) selected @endif>{{$user->Name}}</option>
                             
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Deposit Amount Dollar</label>
                              <input type="number" name="DepositAmountDollar"  value="{{$amount->DepositAmountDollar}}" class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>TransactionID</label>
                              <input type="number" name="TransactionID" value="{{$amount->TransactionID}}" class="form-control" />
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
                               
                                  <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Deposit Purpose</label>
                            
                                <select name="DepositePurpose"  class="form-control" >
                                @foreach($purpose as $purpose)
                              
                                <option value="{{$purpose->id}}"  @if($purpose->id == $amount->DepositePurpose) selected @endif>{{$purpose->DepositePurpose}}</option>
                             
                                @endforeach
                              </select>
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

                     <script>
    // Get references to the file input and image elements
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');

    // Add an event listener to the file input field
    imageInput.addEventListener('change', function () {
        const file = imageInput.files[0]; // Get the selected file

        if (file) {
            // Create a URL for the selected file and set it as the src of the image
            const imageURL = URL.createObjectURL(file);
            imagePreview.src = imageURL;
        }
    });
</script>
@endsection