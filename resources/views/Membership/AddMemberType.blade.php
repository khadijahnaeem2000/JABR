@extends('dashboard')
@section('content')

<div class="row">
              <div class="col-lg-12">
                <!-- ---------------------
                                                    start Person Info
                                                ---------------- -->
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Add Membership Type</h4>
                   
                  </div>
                  
                  <form action="{{route('Type-store')}}" method="post">
                    @csrf
                    <div>
                  
                      <hr />
                      <div class="card-body">
                         <a href="{{route('MembershipType')}}" class="btn btn-secondary" style="float:right">Back</a>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Membership Type</label>
                              <input type="text" name="MembershipType" class="form-control" />
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="mb-3">
                              
                              <input type="text" name="IsActive" value="1" class="form-control" hidden />
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