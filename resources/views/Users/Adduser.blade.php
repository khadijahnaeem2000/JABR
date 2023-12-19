 @extends('dashboard')
@section('content')





            
<div class="row">
              <div class="col-lg-12">
                <!-- ---------------------
                                                    start Person Info
                                                ---------------- -->
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Add Users</h4>
                   
                  </div>
                  
                  <form action="{{route('Userregister')}}" method="post">
                    @csrf
                    <div>
                  
                      <hr />
                      <div class="card-body">
                         <a href="{{route('users')}}" class="btn btn-secondary" style="float:right">Back</a>
                    
                     <div class="row ">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label class="control-label">First Name</label>
                              <input
                                type="text"
                                 id="Name"
                                 name="Name"
                                class="form-control"
                                placeholder="John"
                                required
                              />
                            @error('Name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="mb-3 ">
                              <label class="control-label">Last Name</label>
                              <input
                                type="text"
                                id="LastName"
                                 name="LastName"
                                class="form-control form-control"
                                placeholder="Doe"
                                required
                              />
                               @error('LastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                          </div>
                          <!--/span-->
                        </div>
                                               <div class="row ">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label class="control-label">Email</label>
                              <input
                                type="email"
                                id="Email" name="Email"
                                class="form-control"
                                placeholder="Johndoe@example.com"
                                required
                              />
 
     @if(session('email_error'))
    <div >
        <p style="color: red;">{{ session('email_error') }}</p>
    </div>
@endif
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="mb-3 ">
                              <label class="control-label">Password</label>
                              <input
                               id="password" type="password" name="password"
                                class="form-control form-control"
                                placeholder="*****"
                                required
                              />
                              @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                          </div>
                          <!--/span-->
                        </div>

                            <div class="row ">
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label class="control-label">City</label>
                              <input
                                type="text"
                                id="City"
                                name="City"
                                class="form-control"
                                placeholder="California"
                                required
                              />
                               @error('City')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label class="control-label">Phone Number(+92)</label>
                                <div class="input-group">
                                 
                                             <input
                                              type="text"
                                             id="" name="PhoneNumber"
                                              class="form-control"
                                              placeholder="+9234857901"
                                                aria-label="Text input with dropdown button"
                                                         />
                                                           @if(session('phone_error'))
    <div >
        <p style="color: red;">{{ session('phone_error') }}</p>
    </div>
@endif
                            </div>
                              
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-4">
                            <div class="mb-3 ">
                              <label class="control-label">Address</label>
                              <input
                                type="text"
                                id="Address"
                                name="Address"
                                class="form-control form-control"
                                placeholder="Brigerton,StreetVI.."
                                required
                              />
                               @error('Address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                   @enderror
                            </div>
                          </div>
                          <!--/span-->
                        </div>
                        <div class="row">
                      
                          <!--/span-->
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label class="control-label">CNIC</label>
                              <input type="text"  maxlength="13" id="CNIC" name="CNIC" class="form-control" required placeholder="12345-6789012-3"/>
                            </div>
                             @error('CNIC')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                              <div class="col-md-4">
                            <div class="mb-3">
                              <label class="control-label">Bank Account</label>
                              <input type="text" class="form-control" maxlength="12"  id="BankAccount"required placeholder="DNER80343435" name="BankAccount" />
                               <span id="bank-account-error" class="text-danger"></span>
                            </div>
                          </div>
                               <div class="col-md-4">
                            <div class="mb-3">
                              <label class="control-label">Role</label>
                              <select name="role_Id" class="form-control" >
                                
                                <option value="1">Admin</option>
                                <option value="2">Agent</option>
                                <option value="3">User</option>
                                
                              </select>
                               <span id="bank-account-error" class="text-danger"></span>
                            </div>
                          </div>
                          <!--/span-->
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