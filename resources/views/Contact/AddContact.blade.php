@extends('dashboard')
@section('content')

<div class="row">
              <div class="col-lg-12">
                <!-- ---------------------
                                                    start Person Info
                                                ---------------- -->
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Add Contact</h4>
                    
                  </div>
                  
                  <form action="{{route('StoreContact')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                   
                  
                      <hr />
                      <div class="card-body">
                         <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label> Name</label>
                              <input type="text" name="Name" class="form-control" />
                            </div>
                          </div>
                             <div class="col-md-6">
                            <div class="mb-3">
                              <label>Phone Number</label>
                              <input type="text" name="PhoneNumber" class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                        
                          <!--/span-->
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Email</label>
                                   <input type="email" name="Email" class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Subject</label>
                              <input type="text" name="Subject"  class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                               <div class="mb-3">
                                <label>Message</label>
                                <textarea name="Message"class="form-control"  id="" cols="30" rows="10"></textarea>
                               </div>
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