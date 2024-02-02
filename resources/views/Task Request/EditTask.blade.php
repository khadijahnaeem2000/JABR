@extends('dashboard')
@section('content')

<div class="row">
              <div class="col-lg-12">
                <!-- ---------------------
                                                    start Person Info
                                                ---------------- -->
                <div class="card">
                  <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Edit Task</h4>
                    
                  </div>
                  
                  <form action="{{route('UpdateTask',$task->id)}}" method="post"  enctype="multipart/form-data">
                    @csrf
                        @method('put')
                  
                      <hr />
                      <div class="card-body">
                   <div class="row">
                    <div class="col-md-12">
                            <a href="{{route('Task')}}" class="btn btn-secondary" style="float:right">Back</a>
                    </div>
                   </div>
                         <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Task Name</label>
                              <input type="text" name="TaskName" value="{{$task->TaskName}}" class="form-control" />
                            </div>
                          </div>
                             <div class="col-md-6">
                            <div class="mb-3">
                              <label>Description</label>
                              <input type="text" name="Description" value="{{$task->Description}}" class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                        
                          <!--/span-->
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Membership Type</label>
                              <select name="MembershipTypeId" class="form-control" >
                                @foreach($type as $type)
                                <option value="{{$type->id}}">{{$type->MembershipType}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Link</label>
                              <input type="text" name="Link" value="{{$task->Link}}"  class="form-control"  />
                            </div>
                          </div>
                          <!--/span-->
                        </div>
                     
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Amount</label>
                              <input type="number" name="Amount" value="{{$task->Amount}}" class="form-control" />
                            </div>
                          </div>
                          <!--/span-->
                            <div class="col-md-6">
                            <div class="mb-3">
                              <label>Level</label>
                              <select name="Level" class="form-control" >
                            
                                <option value="Level One">Level One</option>
                             <option value="Level Two">Level Two</option>
                              </select>
                            </div>
                          </div>
                               
                              <input type="text" name="Status" value="Active" class="form-control" hidden />
                          
                          <!--/span-->
                        </div>
                          <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Commission</label>
                              <input type="number" name="Commission" value="{{$task->Commission}}" class="form-control" />
                            </div>
                          </div>
                             <div class="col-md-6">
                            <div class="mb-3">
                              <label>Membership</label>
                          <select name="MembershipId" class="form-control" >
                                @foreach($member as $member)
                                <option value="{{$member->id}}" @if($task->id == $member->id) selected @endif>{{$member->MemberName}}</option>
                                @endforeach
                              </select>
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