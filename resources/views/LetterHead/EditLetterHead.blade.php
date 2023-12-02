@extends('dashboard')
@section('content')

<div class="row">
              <div class="col-lg-12">
                <!-- ---------------------
                                                    start Person Info
                                                ---------------- -->
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Edit LetterHead</h4>
                    
                  </div>
                  
                  <form action="{{route('UpdateLetterHead',$letter->id)}}" method="post"  enctype="multipart/form-data">
                    @csrf
                   
                  @method('put')
                      <hr />
                      <div class="card-body">
                         <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Name</label>
                              <input type="text" name="Name" value="{{$letter->Name}}" class="form-control" />
                            </div>
                          </div>
                             <div class="col-md-6">
                            <div class="mb-3">
                              <label>Address</label>
                              <input type="text" name="Address"  value="{{$letter->Address}}"class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                        
                          <!--/span-->
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Contact Information</label>
                            <input type="text" name="ContactInformation" value="{{$letter->ContactInformation}}" class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-3">
                            <div class="mb-3">
                              <label>Letter Head</label>
                              <input type="file" name="Image"  class="form-control"  />
                            </div>
                          </div>
                             <div class="col-md-3">        <img  id="imagePreview"src="{{ url('uploads/letter/'.$letter->Image) }}" alt="" width="100" height="100" class="mt-3" style="border-radius: 50%;"></div>
                          <!--/span-->
                          <!--/span-->
                        </div>
                              <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Additional Information</label>
                            <input type="text" name="AdditionalInformation" value="{{$letter->AdditionalInformation}}"class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Legal Information</label>
                              <input type="text" name="LegalInformation" value="{{$letter->LegalInformation}}" class="form-control"  />
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