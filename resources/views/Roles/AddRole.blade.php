@extends('dashboard')
@section('content')

<div class="row">
              <div class="col-lg-12">
                <!-- ---------------------
                                                    start Person Info
                                                ---------------- -->
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Add Roles</h4>
                   
                  </div>
                  
                  <form action="{{route('StoreRole')}}" method="post">
                    @csrf
                    <div>
                  
                      <hr />
                      <div class="card-body">
                         <a href="{{route('Role')}}" class="btn btn-secondary" style="float:right">Back</a>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Role</label>
                              <input type="text" name="Role" class="form-control" />
                            </div>
                          </div>
                          <!--/span-->
                        
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