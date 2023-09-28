@extends('dashboard')
@section('content')

<div class="row">
              <div class="col-lg-12">
                <!-- ---------------------
                                                    start Person Info
                                                ---------------- -->
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Edit Membership Type</h4>
                  
                  </div>
                  <form action="{{route('UpdateMembershipType',$type->id)}}"method="POST"  >
                     @csrf
                     @method('put')
                    <div>
                  
                      <hr />
                      <div class="card-body">
                          
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Membership Type</label>
                             
                              <input type="text" name="MembershipType" value="{{  $type->MembershipType }}" class="form-control" />
                           
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