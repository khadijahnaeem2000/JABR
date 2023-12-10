@extends('dashboard')
@section('content')

<div class="row">
              <div class="col-lg-12">
                <!-- ---------------------
                                                    start Person Info
                                                ---------------- -->
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Add LetterHead</h4>
                    
                  </div>
                  
                  <form action="{{route('StoreLetterHead')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                   
                  
                      <hr />
                      <div class="card-body">
                         <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Name</label>
                              <input type="text" name="Name" class="form-control" />
                            </div>
                          </div>
                             <div class="col-md-6">
                            <div class="mb-3">
                              <label>Address</label>
                              <input type="text" name="Address" class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                        
                          <!--/span-->
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Contact Information</label>
                            <input type="text" name="ContactInformation" class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Letter Head</label>
                              <input type="file" name="Image"  class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                        </div>
                              <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Additional Information</label>
                            <input type="text" name="AdditionalInformation" class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Legal Information</label>
                              <input type="text" name="LegalInformation"  class="form-control"  />
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