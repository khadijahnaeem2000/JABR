@extends('dashboard')
@section('content')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .profile-card {
      border: 1px solid grey;
      border-radius: 10px;
      padding: 10px;
      text-align: center;
    }

    .profile-img {
      border-radius: 50%;
      width: 180px;
      height: 180px;
      object-fit: cover;
    }

    .user-name {
      font-weight: bold;
      margin-top: 10px;
    }

    .main-content {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
    }

    .tabs {
      display: flex;
      margin-top: 20px;
    }

    .tab {
      padding: 10px 20px;
      cursor: pointer;
      border: none;
      outline: none;
      background-color: #f2f2f2;
      transition: background-color 0.3s;
    }

    .tab:hover {
      background-color: #ddd;
    }

    .tab-content {
      padding: 20px;
      border: 1px solid #ccc;
      display: none;
    }
  </style>

  <div class="container-fluid">
    <div class="row">
      <!-- Left Column (col-md-3) -->
      <div class="col-md-3">
        <div class="profile-card">
          <img src="{{ asset('dist/images/profile/user-1.jpg') }}" class="rounded-circle" width="80" height="80" alt="" />
          <br>
          <br>
          <div>
            @if(session('user_name'))
            <h2 >{{ session('user_name') }}</h2>
            <p class="align-items-center gap-2" style="color:lightgrey">
              user
            </p>
            @endif
          </div>
        </div>
        <br>
        <div class="row">
               <div class="profile-card">
                <h5 style="color:lightgrey">Membership Plan</h5>
                <br>
                <div class="container" style="width:50%;height:40%;background-color:green;color:white ;font-size:17px;border-radius:14px">
                                     @if($user && $user->member)
    {{$user->member->MemberName}}
@else
    null
@endif

              </div>
            
            <h6 style="color:ligthgrey"> Activated at : {{$user->created_at}}</h6>
  </div>
        </div>
        <br>
              <div class="row">
               <div class="profile-card">
                <h5 style="color:lightgrey">Cnic / BForm</h5>
                <br>
                @if($user->cnic_img != '' && file_exists(public_path().'/uploads/CNIC/'.$user->cnic_img))
                            <img src="{{ url('uploads/CNIC/'.$user->cnic_img) }}" alt="" width="90%" height="70%" >
                            @elseif($user->bform != '' && file_exists(public_path().'/uploads/BForm/'.$user->bform))
                                  <img src="{{ url('uploads/BForm/'.$user->bform) }}" alt="" width="90%" height="70%" >
                            @else
                             <div class="container" style="width:50%;height:30%;background-color:darkred;color:white ;font-size:12px;font-weight:bold;border-radius:14px">
                 Upload Cnic/Bfrom 
              </div>
                            @endif
               
            <br>
            
            <h6 style="color:ligthgrey"> Updated at : {{$user->updated_at}}</h6>
  </div>
        </div>
      </div>

      <!-- Right Column (col-md-9) -->
      <div class="col-md-9">
        <div class="main-content">
          <!-- Your existing content here -->
             
                        <h2>Update Profile</h2>
                       <form method="POST" action="{{ route('UpdateProfile',$user->id) }}" enctype="multipart/form-data">
                      @csrf
                    @method('put')
                    <div>
                      <div class="card-body">

                        <div class="row pt-3">
                          <div class="col-md-12">
                            <div class="mb-3">
                              <label class="control-label" style="color:lightgrey">Referral Code</label>
                              <input
                                type="text"
                                 id="Name"
                                 name="RefferalLink"
                                class="form-control"
                                value="{{ $user->RefferalLink }}"
                                
                              />
                            @error('Name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                          </div>
                          <!--/span-->
                         
                        
                          <!--/span-->
                        </div>

                        <div class="row pt-3">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label class="control-label" style="color:lightgrey">First Name</label>
                              <input
                                type="text"
                                 id="Name"
                                 name="Name"
                                class="form-control"
                                value="{{ $user->Name }}"
                                
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
                              <label class="control-label" style="color:lightgrey">Last Name</label>
                              <input
                                type="text"
                                id="LastName"
                                 name="LastName"
                                class="form-control form-control"
                                value="{{ $user->LastName }}"
                                
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
                        <div class="row pt-3">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label class="control-label" style="color:lightgrey">Phone Number(+92)</label>
                              <input
                                type="PhoneNumber"
                                id="PhoneNumber" name="PhoneNumber"
                                class="form-control"
                                value="{{ $user->PhoneNumber }}"
                               
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
                              <label class="control-label" style="color:lightgrey">Password</label>
                              <input
                               id="password" type="password" name="password"
                                class="form-control form-control"
                                value="{{ $user->password }}"
                                
                              />
                              @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                            
                            <div class="mb-3">
                              <label class="control-label" style="color:lightgrey">Email</label>
                                <div class="input-group">
                                 
                                             <input
                                              type="text"
                                             id="" name="Email"
                                              class="form-control"
                                              value="{{ $user->Email}}"
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
                          </div>
                          <!--/span-->
                        </div>
                         <div class="row pt-3">
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label class="control-label" style="color:lightgrey">City</label>
                              <input
                                type="text"
                                id="City"
                                name="City"
                                class="form-control"
                                value="{{ $user->City }}"
                                
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
                              <label class="control-label" style="color:lightgrey">Bank Account</label>
                              <input type="text" class="form-control" maxlength="12"  id="BankAccount" value="{{ $user->BankAccount }}" name="BankAccount" />
                               <span id="bank-account-error" class="text-danger"></span>
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-4">
                            <div class="mb-3 ">
                              <label class="control-label"style="color:lightgrey">Address</label>
                              <input
                                type="text"
                                id="Address"
                                name="Address"
                                class="form-control form-control"
                                value="{{ $user->Address }}"
                                
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
                       
                        <!--/row-->
                        <div class="row">
                        
                          <!--/span-->
                     
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label class="control-label" style="color:lightgrey">Bank Name</label>
                              <input type="text" class="form-control" maxlength="12"  id="BankName" value="{{ $user->BankName }}" name="BankName" />
                              <span id="bank-account-error" class="text-danger"></span>
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-4">
                        <div class="mb-3">
                          <label class="control-label" style="color:lightgrey">CNIC</label>
                          <input type="file" class="form-control"  id="cnic_img"  name="cnic_img" />
                           <span id="bank-account-error" class="text-danger"></span>
                        </div>
                      </div>
                         <div class="col-md-4">
                        <div class="mb-3">
                          <label class="control-label" style="color:lightgrey">B-Form</label>
                          <input type="file" class="form-control"   id="bform" value="{{ $user->bform }}" name="bform" />
                           <span id="bank-account-error" class="text-danger"></span>
                        </div>
                      </div>
                        </div>
                        <!--/row-->
                      
                    <div class="col-md-9"></div>

                         <div class="float-right" style="margin-bottom:12px" >
                              <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                        <br>
                        <br>
                        <br>
                        <div></div>
                       
                        </div>
                      </div>
                    
                    
                     
                    </div>
                  </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    function openTab(tabName) {
      // Hide all tab contents
      var tabContents = document.getElementsByClassName('tab-content');
      for (var i = 0; i < tabContents.length; i++) {
        tabContents[i].style.display = 'none';
      }

      // Show the selected tab content
      document.getElementById(tabName).style.display = 'block';
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
