@extends('dashboard')
@section('content')

<div class="row">
              <div class="col-lg-12">
                <!-- ---------------------
                                                    start Person Info
                                                ---------------- -->
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Edit User</h4>
                  
                  </div>
                  <form action="{{route('UpdateUser',$user->id)}}"method="POST"  >
                     @csrf
                     @method('put')
                    <div>
                  
                      <hr />
                      <div class="card-body">
                                <a href="{{route('users')}}" class="btn btn-secondary" style="float:right">Back</a>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Name</label>
                             
                              <input type="text" name="Name" value="{{  $user->Name }}" class="form-control" />
                           
                            </div>
                               <div class="col-md-6">
                            <div class="mb-3">
                              <label>Role</label>
                                 <select name="role_Id" class="form-control" >
                               
                                <option value="2">Agent</option>
                                  <option value="3">User</option>
                              </select>
                        
                           
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