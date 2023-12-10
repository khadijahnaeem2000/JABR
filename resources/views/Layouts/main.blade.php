@extends('dashboard')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
  body{
    overflow-x:hidden;
  }
</style>


          <!--  Owl carousel -->
          <div class="owl-carousel counter-carousel owl-theme">
            <div class="item">
              <div class="card border-0 zoom-in bg-light-primary shadow-none">
                <div class="card-body">
                  <div class="text-center">
                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-user-male.svg" width="50" height="50" class="mb-3" alt="" />
                    <p class="fw-semibold fs-3 text-primary mb-1"> Roles </p>
                    <h5 class="fw-semibold text-primary mb-0">{{$role}}</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="card border-0 zoom-in bg-light-warning shadow-none">
                <div class="card-body">
                  <div class="text-center">
                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-briefcase.svg" width="50" height="50" class="mb-3" alt="" />
                    <p class="fw-semibold fs-3 text-warning mb-1">Membership</p>
                    <h5 class="fw-semibold text-warning mb-0">{{$membership}}</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="card border-0 zoom-in bg-light-info shadow-none">
                <div class="card-body">
                  <div class="text-center">
                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-mailbox.svg" width="50" height="50" class="mb-3" alt="" />
                    <p class="fw-semibold fs-3 text-info mb-1">Total Deposit</p>
                    <h5 class="fw-semibold text-info mb-0">{{$depositAmount}}</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="card border-0 zoom-in bg-light-danger shadow-none">
                <div class="card-body">
                  <div class="text-center">
                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-favorites.svg" width="50" height="50" class="mb-3" alt="" />
                    <p class="fw-semibold fs-3 text-danger mb-1">Task Request</p>
                    <h5 class="fw-semibold text-danger mb-0">{{$task}}</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="card border-0 zoom-in bg-light-success shadow-none">
                <div class="card-body">
                  <div class="text-center">
                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-speech-bubble.svg" width="50" height="50" class="mb-3" alt="" />
                    <p class="fw-semibold fs-3 text-success mb-1">Wallet</p>
                    <h5 class="fw-semibold text-success mb-0">{{$wallet}}</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="card border-0 zoom-in bg-light-info shadow-none">
                <div class="card-body">
                  <div class="text-center">
                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-connect.svg" width="50" height="50" class="mb-3" alt="" />
                    <p class="fw-semibold fs-3 text-info mb-1">LetterHead</p>
                    <h5 class="fw-semibold text-info mb-0">{{$letterHead}}</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--  Row 1 -->
    <!-- In the dashboard.blade.php -->

<div class="row">
 
    <!-- ... (existing code) ... -->
</div>

<!-- JavaScript to render the graph -->

        <!-- ... (existing code) ... -->
    </div>
          <!--  Row 2 -->
          <div class="row">
            <!-- Employee Salary -->
         
            <!-- Project -->
            <div class="col-lg-6">
              <div class="row">
                    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                      <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-7 pb-2">
                    <div class="me-3 pe-1">
                      <img src="{{asset('dist/images/profile/user-1.jpg')}}" class="shadow-warning rounded-2" alt="" width="72" height="72" />
                    </div>
                    
                          @if(session('user_name'))
                    <div>
                      <h5 class="fw-semibold fs-5 mb-2">Welcome {{ session('user_name') }} </h5>
                      <p class="fs-3 mb-0">{{$todayDate}}</p>
                    </div>
                  </div>
                    @endif
                        
                
                </div>
              </div>
                <!-- Customers -->
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body pb-0 mb-xxl-4 pb-1">
                      <p class="mb-1 fs-3">Total Users</p>
                      <h4 class="fw-semibold fs-7">{{$totalusers}}</h4>
                      <div class="d-flex align-items-center mb-3">
                        <span class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                          <i class="ti ti-arrow-down-right text-danger"></i>
                        </span>
                        <p class="text-dark fs-3 mb-0">+9%</p>
                      </div>
                    </div>
                    <div id="customers"></div>
                  </div>
                </div>
      
                <!-- Projects -->
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <p class="mb-1 fs-3">Roles</p>
                      <h4 class="fw-semibold fs-7">{{$role}}</h4>
                      <div class="d-flex align-items-center mb-3">
                        <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                          <i class="ti ti-arrow-up-left text-success"></i>
                        </span>
                        <p class="text-dark fs-3 mb-0">+9%</p>
                      </div>
                      <div id="projects"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Comming Soon -->
            
            </div>
            <!-- Selling Products -->
            <div class="col-lg-6 d-flex align-items-strech">
              <div class="card bg-primary border-0 w-100">
                <div class="card-body pb-0">
                  <h5 class="fw-semibold mb-1 text-white card-title"> </h5>
                  <p class="fs-3 mb-3 text-white">Overview 2023</p>
                  <div class="text-center mt-3">
                    <img src="{{asset('dist/images/backgrounds/piggy.png')}}" class="img-fluid" alt="" />
                  </div>
                </div>
                <div class="card mx-2 mb-2 mt-n2">
                  <div class="card-body">
                    <div class="mb-7 pb-1">
                    <div class="d-flex justify-content-between align-items-center mb-6">
                <div>
                    <h6 class="mb-1 fs-4 fw-semibold">Task</h6>
                    <p class="fs-3 mb-0">${{ number_format($tasksThisMonth, 2) }}</p>
                </div>
                <div>
                    <span class="badge bg-light-primary text-primary fw-semibold fs-3">{{ number_format($taskCompletionPercentage, 2) }}%</span>
                </div>
            </div>
            <div class="progress bg-light-primary" style="height: 4px;">
                <div class="progress-bar" role="progressbar" style="width: {{ $taskCompletionPercentage }}%;" aria-valuenow="{{ $taskCompletionPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
                    </div>
                    <div>
                          <div class="d-flex justify-content-between align-items-center mb-6">
                <div>
                    <h6 class="mb-1 fs-4 fw-semibold">Membership</h6>
                    <p class="fs-3 mb-0">${{ number_format($memeberThisMonth, 2) }}</p>
                </div>
                <div>
                    <span class="badge bg-light-primary text-primary fw-semibold fs-3">{{ number_format($memberCompletionPercentage, 2) }}%</span>
                </div>
            </div>
            <div class="progress bg-light-primary" style="height: 4px;">
                <div class="progress-bar" role="progressbar" style="width: {{ $memberCompletionPercentage }}%;" aria-valuenow="{{ $memberCompletionPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--  Row 3 -->
          <div class="row">
            <!-- Weekly Stats -->
       
            <!-- Top Performers -->
            <!-- <div class="col-lg-12 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-body">
                  <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                    <div class="mb-3 mb-sm-0">
                      <h5 class="card-title fw-semibold">Users This Month</h5>
                     
                    </div>
                    <div>
                
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table align-middle text-nowrap mb-0">
                      <thead>
                        <tr class="text-muted fw-semibold">
                          <th scope="col" class="ps-0">User</th>
                          <th scope="col">Project</th>
                          <th scope="col">Priority</th>
                          <th scope="col">Budget</th>
                        </tr>
                      </thead>
                      <tbody class="border-top">
                        <tr>
                          <td class="ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="{{asset('dist/images/profile/user-1.jpg')}}" class="rounded-circle" width="40" height="40" alt="" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">Sunil Joshi</h6>
                                <p class="fs-2 mb-0 text-muted">Web Designer</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0 fs-3">Elite Admin</p>
                          </td>
                          <td>
                            <span class="badge fw-semibold py-1 w-85 bg-light-primary text-primary">Low</span>
                          </td>
                          <td>
                            <p class="fs-3 text-dark mb-0">$3.9K</p>
                          </td>
                        </tr>
                        <tr>
                          <td class="ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="{{asset('dist/images/profile/user-2.jpg')}}" class="rounded-circle" width="40" height="40" alt="" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">John Deo</h6>
                                <p class="fs-2 mb-0 text-muted"> Web Developer </p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0 fs-3">Flexy Admin</p>
                          </td>
                          <td>
                            <span class="badge fw-semibold py-1 w-85 bg-light-warning text-warning">Medium</span>
                          </td>
                          <td>
                            <p class="fs-3 text-dark mb-0">$24.5K</p>
                          </td>
                        </tr>
                        <tr>
                          <td class="ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="{{asset('dist/images/profile/user-3.jpg')}}" class="rounded-circle" width="40" height="40" alt="" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">Nirav Joshi</h6>
                                <p class="fs-2 mb-0 text-muted">Web Manager</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0 fs-3">Material Pro</p>
                          </td>
                          <td>
                            <span class="badge fw-semibold py-1 w-85 bg-light-info text-info">High</span>
                          </td>
                          <td>
                            <p class="fs-3 text-dark mb-0">$12.8K</p>
                          </td>
                        </tr>
                        <tr>
                          <td class="ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="{{asset('dist/images/profile/user-4.jpg')}}" class="rounded-circle" width="40" height="40" alt="" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">Yuvraj Sheth</h6>
                                <p class="fs-2 mb-0 text-muted"> Project Manager </p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0 fs-3">Xtreme Admin</p>
                          </td>
                          <td>
                            <span class="badge fw-semibold py-1 w-85 bg-light-success text-success">Low</span>
                          </td>
                          <td>
                            <p class="fs-3 text-dark mb-0">$4.8K</p>
                          </td>
                        </tr>
                        <tr>
                          <td class="border-0 ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="{{asset('dist/images/profile/user-5.jpg')}}" class="rounded-circle" width="40" height="40" alt="" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">Micheal Doe</h6>
                                <p class="fs-2 mb-0 text-muted"> Content Writer </p>
                              </div>
                            </div>
                          </td>
                          <td class="border-0">
                            <p class="mb-0 fs-3">Helping Hands WP Theme</p>
                          </td>
                          <td class="border-0">
                            <span class="badge fw-semibold py-1 w-85 bg-light-danger text-danger">High</span>
                          </td>
                          <td class="border-0">
                            <p class="fs-3 text-dark mb-0">$9.3K</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div> -->
</div>
<!-- In the dashboard.blade.php -->

<!-- JavaScript to render the graph -->


       
@endsection